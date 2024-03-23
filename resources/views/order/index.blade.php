@extends('layouts.main')

@section('title', "MANYMINDS - Pedidos de compra")

@section('styles')

@endsection

@section('content')

<h1 class="title-page">Lista de Pedidos</h1>

<table>

    <thead>
        <tr>
            @can('isAdmin', auth()->user())
                <th>Comprador</th>
                <th>Email</th>
            @endcan
            <th>Itens comprados</th>
            <th>Valor total (R$)</th>
            <th>Data da compra</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($orders as $order)
            <tr>
                @can('isAdmin', auth()->user())
                    <td>{{$order->buyer->name}}</td>
                    <td>{{$order->buyer->email}}</td>
                @endcan
                <td>{{$order->items_sum_quantity}}</td>
                <td>{{$order->total_price}}</td>
                <td>{{$order->created_at->format('d/m/Y')}}</td>
                <td>
                    @if ($order->status)
                        <div class="status status-active">Ativo</div>
                    @else
                        <div class="status status-inative">Finalizado</div>
                    @endif
                </td>
                <td>
                    <div class="column-actions">
                        <a href="{{route("order.show", [$order->id])}}" class="btn-resource">Ver pedido</a>
                        @if ($order->status && auth()->user()->isAdmin())
                            <form action="{{route("order.finish_order", [$order->id])}}" method="post">
                                @csrf
                                <button class="btn-resource">
                                    Finalizar pedido
                                </button>
                            </form>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@include('includes.paginate', ['page' => $orders])

@endsection

@section('scripts')

@endsection
