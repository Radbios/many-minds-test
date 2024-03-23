<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierStoreUpdateRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(10);

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