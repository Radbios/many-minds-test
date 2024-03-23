<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSupplierStoreUpdateRequest;
use App\Http\Requests\SupplierStoreUpdateRequest;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::withCount(['product_supplier' => function($query){
            $query->where("status", 1);
        }])->paginate(10);

        return view("supplier.index", compact('suppliers'));
    }

    public function create()
    {
        return view("supplier.create");
    }

    public function store(SupplierStoreUpdateRequest $request)
    {
        Supplier::create([
            "name" => $request->name,
            "cnpj" => $request->cnpj,
        ]);

        return redirect()->route('supplier.index')->with("success", "Fornecedor criado com sucesso!");
    }

    public function show($supplier_id)
    {
        $supplier = Supplier::findOrFail($supplier_id);
        $suppliers_relationship = $supplier->product_supplier()->with("product")->paginate(10);
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
        $supplier->product_supplier()->create([
            'product_id' => $request->product_id,
            'code' => $request->code,
            'value_un' => $request->value_un
        ]);
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

        return redirect()->route('supplier.index')->with("success", "Fornecedor editado com sucesso!");
    }

    public function destroy($supplier_id)
    {
        Supplier::findOrFail($supplier_id)->delete();

        return redirect()->route('supplier.index')->with("success", "Fornecedor deletado com sucesso!");
    }
}
