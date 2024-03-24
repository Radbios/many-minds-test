@extends('layouts.main')

@section('title', "MANYMINDS - Pedidos de compra")

@section('styles')

@endsection

@section('content')

<h1 class="title-page">Lista de Produtos</h1>
<div class="actions-table">
    <div class="number-value">
        Valor total: R$ {{number_format($total_price, 2, '.', '')}}
    </div>
</div>
<table>

    <thead>
        <tr>
            <th id="table-col1">Code</th>
            <th id="table-col2">Nome</th>
            <th id="table-col3">Qnt.</th>
            <th id="table-col4">Valor uni. (R$)</th>
            <th id="table-col5">Valor total (R$)</th>
            @can('isClient', auth()->user())
                <th id="table-actions">Ações</th>
            @endcan
        </tr>
    </thead>

    <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->product_supplier->code}}</td>
                <td>{{$item->product_supplier->product->name}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->product_supplier->value_un}}</td>
                <td>{{number_format($item->product_supplier->value_un * $item->quantity, 2, '.', '')}}</td>
                @can('isClient', auth()->user())
                    <td>
                        <div class="column-actions">
                            @if ($order->status)
                                <form action="{{route("cart.remove_item_from_order", [$item->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn-resource">
                                        Retirar do pedido
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                @endcan
            </tr>
        @endforeach
    </tbody>
</table>

@include('includes.paginate', ['page' => $items])

@endsection

@section('scripts')

@endsection
