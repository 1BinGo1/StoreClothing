@extends('layouts.site')

@section('main')
    <div class="container">
        <div class="row show">
            <div class="col-12">
                <div class="card mt-4 mb-4">

                    <div class="card-header">
                        <h1>{{ $product->title }}</h1>
                        <div class="card-header-category">
                            <p>Категория: {{$product->category->title}} @if (!empty($product->brand->img)) <img src="{{asset($product->brand->img)}}" alt="Image"> @endif </p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body-img">
                            <img src="{{ $product->img ?? asset('storage/products/Default.png') }}" alt="Image" class="img-fluid">
                        </div>
                        <div class="card-body-text">
                            <p class="mt-3 mb-0">{{ $product->text }}</p>
                        </div>
                        <br>
                        <div class="card-body-price">
                            <p>Цена: {{ number_format($product->price, 2, '.', '') }}</p>
                        </div>
                        <div class="card-body-edit">
                            <a href="{{route('products.edit', ['id' => $product->id])}}" class="btn btn-dark float-left">Редактировать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
