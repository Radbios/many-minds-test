@extends('layouts.main')

@section('title', "MANYMINDS - Criar Fornecedor")

@section('styles')

@endsection

@section('content')
    <h1 class="title-page">Criar Produto do Fornecedor - {{$supplier->name}}</h1>

        <form action="{{route("supplier.store_product", [$supplier->id])}}" method="POST" class="item-form">
            @csrf
            <div class="group-input">
                <select name="product_id" id="product_id" required>
                    <option value="" disabled selected>Selecione um produto</option>
                    @foreach ($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
                <input type="text" name="code" id="code" placeholder="Código do produto" required>
                <input type="text" name="value_un" id="value_un" placeholder="Valor do produto" required>
                <input type="number" name="inventory" id="inventory" placeholder="Quantidade do produto" required>
            </div>
            <div class="btn-content">
                <a href="{{url()->previous()}}" class="btn-resource">Voltar</a>
                <button class="btn-resource">Criar</button>
            </div>
        </form>
@endsection

@section('scripts')

@endsection
