<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductSupplierStoreUpdateRequest;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::withCount(['product_supplier' => function($query){
            $query->where("status", 1);
        }])->paginate(10);
        return view("product.index", compact('products'));
    }

    public function create()
    {
        return view("product.create");
    }

    public function store(ProductRequest $request)
    {
        Product::create([
            "name" => $request->name
        ]);

        return redirect()->route('product.index')->with("success", "Produto criado com sucesso!");
    }

    public function show($product_id)
    {
        $product = Product::findOrFail($product_id);
        $suppliers_relationship = $product->product_supplier()->with("supplier")->paginate(10);
        return view("product.show", compact("product", 'suppliers_relationship'));
    }

    public function create_supplier($product_id)
    {
        $product = Product::findOrFail($product_id);
        $suppliers = Supplier::all();
        return view("product.supplier_create", compact("product", "suppliers"));
    }

    public function store_supplier(ProductSupplierStoreUpdateRequest $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->product_supplier()->create([
            'supplier_id' => $request->supplier_id,
            'code' => $request->code,
            'value_un' => $request->value_un
        ]);
        return redirect()->route('product.show', [$product_id])->with("success", "Fornecedor adicionado com sucesso!");
    }

    public function edit($product_id)
    {
        $product = Product::findOrFail($product_id);

        // --- CRIAR UMA POLICY AQUI ---
        if(!$product->product_is_active())
        {
            return redirect()->back()->with("error", "Produtos inativos não podem ser alterados.");
        }

        return view("product.edit", compact('product'));
    }

    public function update(ProductRequest $request, $product_id)
    {
        $product = Product::findOrFail($product_id);

        $product->update([
            'name' => $request->name
        ]);

        return redirect()->route('product.index')->with("success", "Produto editado com sucesso!");
    }

    public function destroy($product_id)
    {
        $product = Product::findOrFail($product_id);

        $product->update([
            'status' => !$product->status,
        ]);
        return redirect()->route('product.index')->with("success", "Status do produto foi alterado com sucesso!");
    }
}
