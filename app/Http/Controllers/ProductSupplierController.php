<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSupplierStoreUpdateRequest;
use App\Models\ProductSupplier;
use Illuminate\Http\Request;

class ProductSupplierController extends Controller
{

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

    public function edit($product_supplier_id)
    {
        $product_supplier = ProductSupplier::with(['product', 'supplier'])->findOrFail($product_supplier_id);
        // --- CRIAR UMA POLICY AQUI ---
        if(!$product_supplier->product->product_is_active() || !$product_supplier->product_is_active())
        {
            return redirect()->back()->with("error", "Produtos inativos não podem ser alterados.");
        }

        return view("product.supplier_edit", compact('product_supplier'));
    }

    public function update(ProductSupplierStoreUpdateRequest $request, $product_supplier_id)
    {
        $product_supplier = ProductSupplier::with('product')->findOrFail($product_supplier_id);

        $product_supplier->update([
            'code' => $request->code,
            'value_un' => $request->value_un,
        ]);

        return redirect()->route('product.show', [$product_supplier->product->id])->with("success", "Produto editado com sucesso!");
    }

    public function destroy($product_supplier_id)
    {
        $product_supplier = ProductSupplier::with('product')->findOrFail($product_supplier_id);

        $product_supplier->update([
            'status' => !$product_supplier->status,
        ]);
        return redirect()->route('product.show', [$product_supplier->product->id])->with("success", "Status do produto foi alterado com sucesso!");
    }
}
