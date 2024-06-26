@extends('layouts.main')

@section('title', "MANYMINDS - Editar Produto")

@section('styles')

@endsection

@section('content')
    <h1 class="title-page">Editar Produto - {{$product_supplier->product->name}} - de {{$product_supplier->supplier->name}}</h1>
        <form action="{{route("product.update_supplier", [$product_supplier->id])}}" method="POST" class="item-form">
            @csrf
            @method('PUT')
            <div class="group-input">
                <input type="text" name="value_un" id="value_un" placeholder="Valor do produto" value="{{$product_supplier->value_un}}" required>
                <input type="number" name="inventory" id="inventory" placeholder="Quantidade do produto" value="{{$product_supplier->inventory}}" required>

            </div>
            <div class="btn-content">
                <a href="{{url()->previous()}}" class="btn-resource">Voltar</a>
                <button class="btn-resource">Editar</button>
            </div>
        </form>
@endsection

@section('scripts')

@endsection
