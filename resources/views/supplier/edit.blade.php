@extends('layouts.main')

@section('title', "MANYMINDS - Editar Produto")

@section('styles')

@endsection

@section('content')
    <h1 class="title-page">Editar Produto - {{$supplier->name}}</h1>
        <form action="{{route("supplier.update", [$supplier->id])}}" method="POST" class="item-form">
            @csrf
            @method('PUT')
            <div class="group-input">
                <input type="text" name="name" id="name" placeholder="Nome do produto" value="{{$supplier->name}}" required>
                <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ do Fornecedor" value="{{$supplier->cnpj}}" required>
            </div>
            <div class="btn-content">
                <a href="{{url()->previous()}}" class="btn-resource">Voltar</a>
                <button class="btn-resource">Editar</button>
            </div>
        </form>
@endsection

@section('scripts')

@endsection
