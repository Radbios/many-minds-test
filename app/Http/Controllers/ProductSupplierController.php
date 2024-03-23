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

    public function edit($product_supplier_id)
    {
        $product_supplier = ProductSupplier::with(['product', 'supplier'])->findOrFail($product_supplier_id);
        // --- CRIAR UMA POLICY AQUI ---
        if(!$product_supplier->product_is_active())
        {
            return redirect()->back()->with("error", "Produtos inativos não podem ser alterados.");
        }

        return view("product.product_supplier_edit", compact('product_supplier'));
    }

    public function update(ProductSupplierStoreUpdateRequest $request, $product_supplier_id)
    {
        $product_supplier = ProductSupplier::with('product')->findOrFail($product_supplier_id);
        $product_supplier->update([
            'code' => $request->code,
            'value_un' => $request->value_un,
            'inventory' => $request->inventory
        ]);

        return redirect()->route('product.show', [$product_supplier->product->id])->with("success", "Produto editado com sucesso!");
    }

    // --- MUDA O STATUS DO ITEM (DELETA LOGICAMENTE) ---
    public function destroy($product_supplier_id)
    {
        $product_supplier = ProductSupplier::with('product')->findOrFail($product_supplier_id);

        $product_supplier->update([
            'status' => !$product_supplier->status,
        ]);
        return redirect()->route('product.show', [$product_supplier->product->id])->with("success", "Status do produto foi alterado com sucesso!");
    }
}
