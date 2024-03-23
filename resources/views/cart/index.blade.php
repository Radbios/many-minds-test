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
    <form action="{{route('cart.store')}}" class="btn-resource" method="POST">
        @csrf
        @method('post')
        <button type="submit">Finalizar pedido</button>
    </form>
</div>
<table>

    <thead>
        <tr>
            <th id="table-col1">Code</th>
            <th id="table-col2">Nome</th>
            <th id="table-col3">Qnt.</th>
            <th id="table-col4">Valor uni. (R$)</th>
            <th id="table-col5">Valor total (R$)</th>
            <th id="table-actions">Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($cart as $item)
            <tr>
                <td>{{$item->product_supplier->code}}</td>
                <td>{{$item->product_supplier->product->name}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->product_supplier->value_un}}</td>
                <td>{{number_format($item->product_supplier->value_un * $item->quantity, 2, '.', '')}}</td>

                <td>
                    <div class="column-actions">

                        <form action="{{route("cart.destroy", [$item->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn-resource">
                                Retirar do carrinho
                            </button>

                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@include('includes.paginate', ['page' => $cart])

@endsection

@section('scripts')

@endsection
