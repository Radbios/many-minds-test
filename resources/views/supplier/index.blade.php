@extends('layouts.main')

@section('title', "MANYMINDS - Produtos")

@section('styles')

@endsection

@section('content')

<h1 class="title-page">Lista de Fornecedores</h1>
<div class="actions-table">
    <a href="{{route("supplier.create")}}" class="btn-resource">Adicionar Fornecedor</a>
</div>
<table>

    <thead>
        <tr>
            <th id="table-col1">Nome</th>
            <th id="table-col3">CNPJ</th>
            <th id="table-col2">Qnt. de Produtos</th>
            <th id="table-actions">Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($suppliers as $supplier)
            <tr>
                <td>{{$supplier->name}}</td>
                <td>{{$supplier->cnpj}}</td>
                <td>#</td>
                <td>
                    <div class="column-actions">
                        <a href="{{route("supplier.edit", [$supplier->id])}}" class="btn-resource">Editar</a>
                        <form action="{{route("supplier.destroy", [$supplier->id])}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn-resource">
                                Deletar
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@include('includes.paginate', ['page' => $suppliers])

@endsection

@section('scripts')

@endsection
