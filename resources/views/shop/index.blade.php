@extends('layouts.main')

@section('title', "MANYMINDS - Loja")

@section('styles')
<link rel="stylesheet" href="{{asset("assets/css/shop.css")}}">

@endsection

@section('content')
<h1 class="title-page">Lista de Produtos</h1>
<div class="products">
    @foreach ($items as $item)
        <div class="product-item">
            <form action="{{route("shop.store")}}" method="POST">
                @csrf
                @method('post')
                <input type="hidden" name="product_supplier_id" value="{{$item->id}}">
                <div class="title">
                    9x - {{$item->product->name}}
                    <p class="supplier-name">CNPJ: {{$item->supplier->cnpj}}</p>
                </div>

                <div class="values">
                    <div class="lower">
                        <p>Valor uni. (R$)</p>
                        <p>{{$item->value_un}}</p>
                    </div>
                    <div class="bigger">
                        <p>Valor total (R$)</p>
                        <input type="text" class="quantity" id="value-{{$item->id}}" data-un="{{$item->value_un}}" value="0.00" style="pointer-events: none;" readonly>
                    </div>
                </div>
                <div class="actions">
                    <div class="counter">
                        <button type="button" class="btn-lower" data-id="lower-{{$item->id}}">-</button>
                        <input type="text" class="quantity" name="quantity" id="quantity-{{$item->id}}" value="0" style="pointer-events: none;" readonly>
                        <button type="button" class="btn-bigger" data-max="4" data-id="bigger-{{$item->id}}">+</button>
                    </div>
                    <button type="submit">Adicionar</button>
                </div>
            </form>
        </div>
    @endforeach
</div>

@include('includes.paginate', ['page' => $items])

@endsection

@section('scripts')

<script>
    const btns_lower = document.querySelectorAll('.btn-lower');
    const btns_bigger = document.querySelectorAll('.btn-bigger');

    btns_lower.forEach( element => {
        element.addEventListener("click", (e) => {
            const target = e.target;
            const product_id = target.getAttribute('data-id').split('-')[1];

            const input = document.getElementById("quantity-" + product_id);
            const total_value = document.getElementById("value-" + product_id);

            input.value = parseInt(input.value) - 1;

            if(input.value < 0)
            {
                input.value = 0;
            }
            else total_value.value = (parseFloat(total_value.value) - parseFloat(total_value.getAttribute("data-un"))).toFixed(2);



        });
    })

    btns_bigger.forEach( element => {
        element.addEventListener("click", (e) => {
            const target = e.target;
            const product_id = target.getAttribute('data-id').split('-')[1];
            const max = target.getAttribute('data-max');

            const input = document.getElementById("quantity-" + product_id);
            const total_value = document.getElementById("value-" + product_id);

            input.value = parseInt(input.value) + 1;

            if(input.value > max)
            {
                input.value = max;
            }
            else total_value.value = (parseFloat(total_value.value) + parseFloat(total_value.getAttribute("data-un"))).toFixed(2);

        });
    })
</script>

@endsection
