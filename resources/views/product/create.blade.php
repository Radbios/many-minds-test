@extends('layouts.main')

@section('title', "MANYMINDS - Criar Produto")

@section('styles')

@endsection

@section('content')
    <h1 class="title-page">Criar Produto</h1>
        <form action="{{route("product.store")}}" method="POST" class="item-form">
            @csrf
            @method('post')
            <input type="text" name="name" id="name" placeholder="Nome do produto" required>
            <div class="btn-content">
                <a href="{{url()->previous()}}" class="btn-resource">Voltar</a>
                <button class="btn-resource">Criar</button>
            </div>
        </form>
@endsection

@section('scripts')

@endsection
