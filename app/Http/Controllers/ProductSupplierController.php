<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSupplierStoreUpdateRequest;
use App\Http\Services\LoggerService;
use App\Models\ProductSupplier;
use Illuminate\Http\Request;

class ProductSupplierController extends Controller
{
    // --- MUDA O STATUS DO ITEM (DELETA LOGICAMENTE) ---
    public function destroy($product_supplier_id)
    {
        $product_supplier = ProductSupplier::with('product')->findOrFail($product_supplier_id);

        $product_supplier->update([
            'status' => !$product_supplier->status,
        ]);

        LoggerService::log('info', "PRODUCT_SUPPLIER CHANGE STATUS", "Mudança de status do produto [" . $product_supplier->product_id . "] do fornecedor [" . $product_supplier->supplier_id . "].");

        return redirect()->back()->with("success", "Status do produto foi alterado com sucesso!");
    }
}
