@extends('layouts.site')

@section('main')
    <h1>Ваша корзина</h1>
    @if (count($basket->products))
        @php
            $basketCost = 0;
        @endphp
        <table class="table table-bordered">
            <tr>
                <th>№</th>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Кол-во</th>
                <th>Стоимость</th>
            </tr>
            @foreach($basket->products as $product)
                @php
                    $itemPrice = $product->price;
                    $itemQuantity =  $product->pivot->quantity;
                    $itemCost = $itemPrice * $itemQuantity;
                    $basketCost = $basketCost + $itemCost;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('products.show', [$product->id]) }}">{{ $product->title ?? 'Название товара' }}</a>
                    </td>
                    <td>{{ number_format($itemPrice, 2, '.', '') }}</td>
                    <td>
                        <form action="{{ route('basket.minus', ['id' => $product->id]) }}"
                              method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fa fa-minus-square fa-2x"></i>
                            </button>
                        </form>
                        <span class="mx-1">{{ $itemQuantity }}</span>
                        <form action="{{ route('basket.plus', ['id' => $product->id]) }}"
                              method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fa fa-plus-square fa-2x"></i>
                            </button>
                        </form>
                    </td>
                    <td>{{ number_format($itemCost, 2, '.', '') }}</td>
                    <td>
                        <form action="{{ route('basket.clear', ['id' => $product->id]) }}"
                              method="post">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fa fa-trash fa-2x text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <th colspan="4" class="text-right">Итого</th>
                <th>{{ number_format($basketCost, 2, '.', '') }}</th>
            </tr>
        </table>
    @else
        <p>Ваша корзина пуста</p>
    @endif
@endsection
