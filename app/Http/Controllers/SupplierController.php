<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSupplierStoreUpdateRequest;
use App\Http\Requests\SupplierStoreUpdateRequest;
use App\Http\Services\LoggerService;
use App\Models\Product;
use App\Models\ProductSupplier;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::withCount(['product_supplier' => function($query){
            $query->where("status", 1);
        }])->orderBy('id', 'desc')->paginate(8);

        return view("supplier.index", compact('suppliers'));
    }

    public function create()
    {
        return view("supplier.create");
    }

    public function store(SupplierStoreUpdateRequest $request)
    {
        $supplier = Supplier::create([
            "name" => $request->name,
            "cnpj" => $request->cnpj,
        ]);

        LoggerService::log('info', "SUPPLIER CREATE", "Fornecedor [" . $supplier->id . "] criado.");

        return redirect()->route('supplier.index')->with("success", "Fornecedor criado com sucesso!");
    }

    public function show($supplier_id)
    {
        $supplier = Supplier::findOrFail($supplier_id);
        $suppliers_relationship = $supplier->product_supplier()->with("product")->paginate(8);
        return view("supplier.show", compact("supplier", 'suppliers_relationship'));
    }

    public function create_product($supplier_id)
    {
        $supplier = Supplier::findOrFail($supplier_id);
        $products = Product::all();
        return view("supplier.product_supplier_create", compact("supplier", "products"));
    }

    public function store_product(ProductSupplierStoreUpdateRequest $request, $supplier_id)
    {
        $supplier = Supplier::findOrFail($supplier_id);
        $product_supplier = $supplier->product_supplier()->create([
            'product_id' => $request->product_id,
            'code' => $request->code,
            'value_un' => $request->value_un,
            'inventory' => $request->inventory
        ]);

        LoggerService::log('info', "PRODUCT_SUPPLIER CREATE", "Adição do produto [" . $product_supplier->product_id . "] ao fornecedor [" . $product_supplier->supplier_id . "].");

        return redirect()->route('supplier.show', [$supplier_id])->with("success", "Fornecedor adicionado com sucesso!");
    }

    public function edit($supplier_id)
    {
        $supplier = Supplier::findOrFail($supplier_id);

        return view("supplier.edit", compact('supplier'));
    }

    public function update(SupplierStoreUpdateRequest $request, $supplier_id)
    {
        Supplier::findOrFail($supplier_id)->update($request->all());
        LoggerService::log('info', "SUPPLIER EDIT", "Fornecedor [" . $supplier_id . "] editado.");

        return redirect()->route('supplier.index')->with("success", "Fornecedor editado com sucesso!");
    }

    public function edit_product($product_supplier_id)
    {
        $product_supplier = ProductSupplier::with(['product', 'supplier'])->findOrFail($product_supplier_id);
        // --- CRIAR UMA POLICY AQUI ---
        if(!$product_supplier->product_is_active())
        {
            return redirect()->back()->withErrors("Produtos inativos não podem ser alterados.");
        }

        return view("supplier.product_supplier_edit", compact('product_supplier'));
    }

    public function update_product(ProductSupplierStoreUpdateRequest $request, $product_supplier_id)
    {
        $product_supplier = ProductSupplier::with('product')->findOrFail($product_supplier_id);
        $product_supplier->update([
            'value_un' => $request->value_un,
            'inventory' => $request->inventory
        ]);

        LoggerService::log('info', "PRODUCT_SUPPLIER EDIT", "Edição do produto [" . $product_supplier->product_id . "] do fornecedor [" . $product_supplier->supplier_id . "] .");

        return redirect()->route('supplier.show', [$product_supplier->supplier->id])->with("success", "Produto editado com sucesso!");
    }

    public function destroy($supplier_id)
    {
        Supplier::findOrFail($supplier_id)->delete();
        LoggerService::log('info', "SUPPLIER DELETE", "Fornecedor [" . $supplier_id . "] deletado.");

        return redirect()->route('supplier.index')->with("success", "Fornecedor deletado com sucesso!");
    }
}
