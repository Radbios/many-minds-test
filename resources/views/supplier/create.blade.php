@extends('layouts.main')

@section('title', "MANYMINDS - Criar Fornecedor")

@section('styles')

@endsection

@section('content')
    <h1 class="title-page">Criar Fornecedor</h1>
        <form action="{{route("supplier.store")}}" method="POST" class="item-form">
            @csrf
            @method('post')
            <div class="group-input">
                <input type="text" name="name" id="name" placeholder="Nome do Fornecedor" value="{{old("name")}}" required>
                <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ do Fornecedor" value="{{old("cnpj")}}" required>
            </div>
            <div class="btn-content">
                <a href="{{url()->previous()}}" class="btn-resource">Voltar</a>
                <button class="btn-resource">Criar</button>
            </div>
        </form>
@endsection

@section('scripts')

@endsection
