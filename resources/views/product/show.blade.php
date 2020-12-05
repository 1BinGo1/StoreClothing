@extends('layouts.site')

@section('breadcrumbs')

@endsection

@section('main')
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
                        <img src="{{ $product->img ?? asset('storage/app/Default.png') }}" alt="Image" class="img-fluid">
                    </div>
                    <div class="card-body-text">
                        <p class="mt-3 mb-0">{{ $product->text }}</p>
                    </div>
                    <br>
                    <div class="card-body-price">
                        <p>Цена: {{ number_format($product->price, 2, '.', '') }} руб.</p>
                    </div>
                    <div class="card-body-add">
                        <form action="{{ route('basket.add', ['id' => $product->id]) }}" method="post" class="form-inline">
                            @csrf
                            <label for="input-quantity">Количество</label>
                            <input type="text" name="quantity" id="input-quantity" value="1"
                                   class="form-control mx-2 w-25">
                            <button type="submit" class="btn btn-success">Добавить в корзину</button>
                        </form>
                    </div>
                    <br>
                    @auth
                        @if(auth()->id() == $product->user_id || Auth::id() == 2)
                            <div class="card-body-settings float-left">
                                <div class="card-body-edit">
                                    <a href="{{route('products.edit', ['id' => $product->id])}}" class="btn btn-dark">Редактировать</a>
                                </div>
                                <div class="card-body-delete">
                                    <form action="{{ route('products.destroy', ['id' => $product->id]) }}"
                                          method="post" onsubmit="return confirm('Удалить этот пост?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Удалить">
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>

            </div>
        </div>
    </div>
@endsection

