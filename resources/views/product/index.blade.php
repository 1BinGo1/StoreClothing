@extends('layouts.site')

@section('breadcrumbs')
    {{ DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('section') }}
@endsection

@section('main')
    <div class="categories">
        @foreach($categories as $category)
            <div class="category">

                <div class="products">
                    <h1>{{$category->title}}</h1>
                    <div class="row">
                        @foreach($category->products as $product)
                            <div class="col-6 mb-4">
                                <div class="product">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>{{ $product->title ?? 'Название товара' }}</h3>
                                            <div class="card-header-category">
                                                <p>Брэнд: {{$product->brand->title}} @if (!empty($product->brand->img)) <img src="{{asset($product->brand->img)}}" alt="Image"> @endif </p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-body-img">
                                                <img src="{{ $product->img ?? asset('storage/app/Default.png') }}" alt="Image" class="img-fluid">
                                            </div>
                                            <div class="card-body-excerpt">
                                                <p class="mt-3 mb-0">{{ $product->excerpt ?? 'Краткое описание' }}</p>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('products.show', ['id' => $product->id]) }}" class="btn btn-dark">Подробнее</a>
                                            <form action="{{ route('basket.add', ['id' => $product->id]) }}"
                                                  method="post" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Добавить в корзину</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        @endforeach
    </div>

@endsection

