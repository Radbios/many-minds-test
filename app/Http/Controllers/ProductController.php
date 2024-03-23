<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(10);

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

    public function edit($product_id)
    {
        $product = Product::findOrFail($product_id);

        // --- CRIAR UMA POLICY AQUI ---
        if(!$product->product_is_active())
        {
            return redirect()->route('product.index')->with("error", "Produtos inativos não podem ser alterados.");
        }

        return view("product.edit", compact('product'));
    }

    public function update(ProductRequest $request, $product_id)
    {
        $product = Product::findOrFail($product_id);

        // --- CRIAR UMA POLICY AQUI ---
        if(!$product->product_is_active())
        {
            return redirect()->route('product.index')->with("error", "Produtos inativos não podem ser alterados.");
        }

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
