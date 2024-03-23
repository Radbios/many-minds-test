@extends('layouts.main')

@section('title', "MANYMINDS - Ver Produto")

@section('styles')

@endsection

@section('content')

<h1 class="title-page">Produtos do Fornecedor : {{$supplier->name}}</h1>
<div class="actions-table">
    <a href="{{route("supplier.create_product", [$supplier->id])}}" class="btn-resource">Adicionar Produto</a>
</div>
<table>

    <thead>
        <tr>
            <th id="table-col1">Nome</th>
            <th id="table-col3">Código do produto</th>
            <th id="table-col4">Valor Un.</th>
            <th id="table-col4">Em estoque</th>
            <th id="table-col5">Status</th>
            <th id="table-actions">Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($suppliers_relationship as $supplier_relationship)
            <tr>
                <td>{{$supplier_relationship->product->name}}</td>
                <td>{{$supplier_relationship->code}}</td>
                <td>{{$supplier_relationship->value_un}}</td>
                <td>{{$supplier_relationship->inventory}}</td>
                <td>
                    @if ($supplier_relationship->status)
                        <div class="status status-active">Ativo</div>
                    @else
                        <div class="status status-inative">Inativo</div>
                    @endif
                </td>
                <td>
                    <div class="column-actions">
                        <a href="{{route("product_supplier.edit", [$supplier_relationship->id])}}" class="btn-resource">Editar</a>
                        <form action="{{route("product_supplier.destroy", [$supplier_relationship->id])}}" method="post">
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

@include('includes.paginate', ['page' => $suppliers_relationship])

@endsection

@section('scripts')

@endsection
