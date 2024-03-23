@extends('layouts.main')

@section('title', "MANYMINDS - Criar Fornecedor")

@section('styles')

@endsection

@section('content')
    <h1 class="title-page">Criar Fornecedor do Produto - {{$product->name}}</h1>

        <form action="{{route("product.store_supplier", [$product->id])}}" method="POST" class="item-form">
            @csrf
            <div class="group-input">
                <select name="supplier_id" id="supplier_id" required>
                    <option value="" disabled selected>Selecione um fornecedor</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->cnpj . " - " . $supplier->name}}</option>
                    @endforeach
                </select>
                <input type="text" name="code" id="code" placeholder="Código do produto" required>
                <input type="text" name="value_un" id="value_un" placeholder="Valor do produto" required>
            </div>
            <div class="btn-content">
                <a href="{{url()->previous()}}" class="btn-resource">Voltar</a>
                <button class="btn-resource">Criar</button>
            </div>
        </form>
@endsection

@section('scripts')

@endsection
