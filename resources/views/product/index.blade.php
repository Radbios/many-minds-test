@extends('layouts.main')

@section('title', "MANYMINDS - Produtos")

@section('styles')

@endsection

@section('content')

<h1 class="title-page">Lista de Produtos</h1>
<div class="actions-table">
    <a href="{{route("product.create")}}" class="btn-resource">Adicionar Produto</a>
</div>
<table>

    <thead>
        <tr>
            <th id="table-col1">Nome</th>
            <th id="table-col2">Qnt. de Fornecedores</th>
            <th id="table-col3">Status</th>
            <th id="table-actions">Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>#</td>
                <td>
                    @if ($product->status)
                        <div class="status status-active">Ativo</div>
                    @else
                        <div class="status status-inative">Inativo</div>
                    @endif
                </td>
                <td>
                    <div class="column-actions">
                        <a href="{{route("product.edit", [$product->id])}}" class="btn-resource">Editar</a>
                        <form action="{{route("product.destroy", [$product->id])}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn-resource">
                                Mudar status
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@include('includes.paginate', ['page' => $products])

@endsection

@section('scripts')

@endsection
