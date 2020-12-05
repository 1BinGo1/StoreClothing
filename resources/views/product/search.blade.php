@extends('layouts.site')

@section('main')
    <h1 class="mt-2 mb-3">Результаты поиска</h1>
    <div class="products">
        @if (isset($products) && count($products))
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-6 mb-4">
                        <div class="product">
                            <div class="card">
                                <div class="card-header">
                                    <h3>{{ $product->title ?? 'Название товара' }}</h3>
                                    <div class="card-header-category">
                                        <p>Категория: {{$product->category->title}} @if (!empty($product->brand->img)) <img src="{{asset($product->brand->img)}}" alt="Image"> @endif </p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-body-img">
                                        <img src="{{ $product->img ?? asset('storage/app/Default.png') }}" alt="Image" class="img-fluid">
                                    </div>
                                    <div class="card-body-excerpt">
                                        <p class="mt-3 mb-0">{{ $product->excerpt ?? 'Краткое описание' }}</p>
                                    </div>
                                    <div class="card-body-detail">
                                        <a href="{{ route('products.show', ['id' => $product->id]) }}" class="btn btn-dark">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    @else
        <p>По вашему запросу ничего не найдено</p>
    @endif
@endsection

