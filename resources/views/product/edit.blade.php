@extends('layouts.main')

@section('title', "MANYMINDS - Editar Produto")

@section('styles')

@endsection

@section('content')
    <h1 class="title-page">Editar Produto - {{$product->name}}</h1>
        <form action="{{route("product.update", [$product->id])}}" method="POST" class="item-form">
            @csrf
            @method('PUT')
            <input type="text" name="name" id="name" placeholder="Nome do produto" value="{{$product->name}}" required>
            <div class="btn-content">
                <a href="{{url()->previous()}}" class="btn-resource">Voltar</a>
                <button class="btn-resource">Editar</button>
            </div>
        </form>
@endsection

@section('scripts')

@endsection
