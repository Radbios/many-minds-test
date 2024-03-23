@extends('layouts.main')

@section('title', "MANYMINDS - Produtos")

@section('styles')

@endsection

@section('content')

<table>

    <h1 class="title-page">Lista de Produtos</h1>
    {{-- <div class="actions-table">
        <a href="">Adicionar Produto</a>
    </div> --}}
    <thead>
        <tr>
            <th id="table-col1">Código</th>
            <th id="table-col2">Nome</th>
            <th id="table-col3">Valor Unitário (R$)</th>
            <th id="table-col4">Status</th>
            <th id="table-col5">Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->code}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->value_un}}</td>
                <td>{{$product->status}}</td>
                <td>#</td>
            </tr>
        @endforeach
    </tbody>
</table>

@include('includes.paginate', ['page' => $products])

@endsection

@section('scripts')

@endsection
