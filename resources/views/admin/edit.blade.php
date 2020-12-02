@extends('layouts.site')

@section('main')
    <div class="container">

        <form action="{{route('products.edit', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label class="mr-sm-2" for="category">Category</label>
                <select class="form-control form-control-lg" name="category" id="category" required>
                    @foreach($categories as $category)
                        @if (!empty($category->title))
                            <option value="{{ $category->id }}" @if($category->title === $product->category->title) selected @endif>{{ old('category') ?? $category->title}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="mr-sm-2" for="brand">Brand</label>
                <select class="form-control form-control-lg" name="brand" id="brand" required>
                    @foreach($brands as $brand)
                        @if(!empty($brand->title))
                            <option value="{{ $brand->id }}" @if($brand->title === $product->brand->title) selected @endif>{{ old('brand') ?? $brand->title}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" required value="{{ old('title') ?? $product->title ?? '' }}">
            </div>
            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                <textarea class="form-control" name="excerpt" id="excerpt" placeholder="Excerpt" rows="7" required>{{ old('excerpt') ?? $product->excerpt ?? ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" id="price" placeholder="Price" required value="{{ old('price') ?? $product->price ?? ''}}">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control-file" id="image">
            </div>
            @isset($product->img)
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="remove" id="remove">
                    <label class="form-check-label" for="remove">
                        Удалить загруженное <a href="{{ $product->img }}" target="_blank">изображение</a>
                    </label>
                </div>
            @endisset
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" name="body" id="body" placeholder="Body" rows="7" required>{{ old('body') ?? $product->text ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="edit">Edit</button>
            </div>
        </form>

    </div>
@endsection
