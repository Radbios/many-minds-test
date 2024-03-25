<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductSupplierStoreUpdateRequest;
use App\Http\Services\LoggerService;
use App\Models\Product;
use App\Models\ProductSupplier;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::withCount(['product_supplier' => function($query){
            $query->where("status", 1);
        }])->orderBy('id', 'desc')->paginate(8);
        return view("product.index", compact('products'));
    }

    public function create()
    {
        return view("product.create");
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create([
            "name" => $request->name
        ]);

        LoggerService::log('info', "PRODUCT CREATE", "Produto [" . $product->id . "] criado.");

        return redirect()->route('product.index')->with("success", "Produto criado com sucesso!");
    }

    public function show($product_id)
    {
        $product = Product::findOrFail($product_id);
        $suppliers_relationship = $product->product_supplier()->with("product")->paginate(8);
        return view("product.show", compact("product", 'suppliers_relationship'));
    }

    public function create_supplier($product_id)
    {
        $product = Product::findOrFail($product_id);
        $suppliers = Supplier::all();
        return view("product.product_supplier_create", compact("product", "suppliers"));
    }

    public function store_supplier(ProductSupplierStoreUpdateRequest $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->product_supplier()->create([
            'supplier_id' => $request->supplier_id,
            'code' => $request->code,
            'value_un' => $request->value_un,
            'inventory' => $request->inventory
        ]);

        LoggerService::log('info', "PRODUCT_SUPPLIER CREATE", "Adição do produto [" . $product->id . "] ao fornecedor [" . $request->supplier_id . "].");

        return redirect()->route('product.show', [$product_id])->with("success", "Fornecedor adicionado com sucesso!");
    }

    public function edit($product_id)
    {
        $product = Product::findOrFail($product_id);

        return view("product.edit", compact('product'));
    }

    public function update(ProductRequest $request, $product_id)
    {
        $product = Product::findOrFail($product_id);

        $product->update([
            'name' => $request->name
        ]);

        LoggerService::log('info', "PRODUCT EDIT", "Produto [" . $product->id . "] editado.");

        return redirect()->route('product.index')->with("success", "Produto editado com sucesso!");
    }

    public function edit_supplier($product_supplier_id)
    {
        $product_supplier = ProductSupplier::with(['product', 'supplier'])->findOrFail($product_supplier_id);
        // --- CRIAR UMA POLICY AQUI ---
        if(!$product_supplier->product_is_active())
        {
            return redirect()->back()->with("error", "Produtos inativos não podem ser alterados.");
        }

        return view("product.product_supplier_edit", compact('product_supplier'));
    }

    public function update_supplier(ProductSupplierStoreUpdateRequest $request, $product_supplier_id)
    {
        $product_supplier = ProductSupplier::with('product')->findOrFail($product_supplier_id);
        $product_supplier->update([
            'value_un' => $request->value_un,
            'inventory' => $request->inventory
        ]);

        LoggerService::log('info', "PRODUCT_SUPPLIER EDIT", "Edição do produto [" . $product_supplier->product_id . "] do fornecedor [" . $product_supplier->supplier_id . "] .");

        return redirect()->route('product.show', [$product_supplier->product->id])->with("success", "Produto editado com sucesso!");
    }

    // --- EXCLUIR LOGICAEMNTE ---
    public function destroy($product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->delete();

        LoggerService::log('info', "PRODUCT DELETE", "Produto [" . $product->id . "] deletado.");

        return redirect()->route('product.index')->with("success", "Produto deletado com sucesso!");
    }
}
