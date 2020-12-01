@extends('layouts.site')

@section('main')
    <div class="container">
        <div class="products">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>{{ $product->title ?? 'Название товара' }}</h3>
                            </div>
                            <div class="card-body">
                                <img src="{{ $product->img ?? asset('img/products/Default.png') }}" alt="Image" class="img-fluid">
                                <p class="mt-3 mb-0">{{ $product->excerpt ?? 'Краткое описание' }}</p>
                            </div>
                            <div class="card-footer">
                                <div class="clearfix">
                                    <span class="float-left">
                                        Автор: {{ $product->author ?? 'Имя автора' }}
                                        <br>
                                        @if(!empty($product->created_at))
                                            Дата: {{ date_format($product->created_at, 'd.m.Y H:i') }}
                                        @else
                                            Дата: {{ date('d.m.Y H:i') }}
                                        @endif
                                    </span>
                                    <a href="#" class="btn btn-dark float-right">Читать дальше</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
