@extends('layouts.site')

@section('breadcrumbs')

@endsection

@section('main')
    <form action="" method="post" enctype="multipart/form-data" novalidate class="form-edit" id="form_edit-{{$product->id}}">
        {{csrf_field()}}
        <div class="form-group">
            <label class="mr-sm-2" for="category">Category</label>
            <select class="form-control form-control-lg" name="category" id="category">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if(!empty(old('category'))) @if(old('category') == $category->id) selected @endif
                        @elseif ($category->id == $product->category_id) selected  @endif>{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="mr-sm-2" for="brand">Brand</label>
            <select class="form-control form-control-lg" name="brand" id="brand">
                @foreach($brands as $brand)
                    <option value="{{$brand->id}}" @if(!empty(old('brand'))) @if(old('brand') == $brand->id) selected @endif
                        @elseif ($brand->id == $product->brand_id) selected @endif>{{$brand->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ old('title') ?? $product->title ?? ''}}">
        </div>
        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <textarea class="form-control" name="excerpt" id="excerpt" placeholder="Excerpt" rows="7">{{ old('excerpt') ?? $product->excerpt ?? ''}}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" id="price" placeholder="Price" value="{{ old('price') ?? $product->price ?? ''}}">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control-file" id="image">
        </div>

        @isset($product->img)
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="remove" id="remove" value="check" @if(old('remove')) checked @endif>
                <label class="form-check-label" for="remove">
                    Удалить загруженное <a href="{{ $product->img }}" target="_blank">изображение</a>
                </label>
            </div>
        @endisset
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" name="body" id="body" placeholder="Body" rows="7">{{ old('body') ?? $product->text ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="edit">Edit</button>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="{{asset('js/product/cr_up_product.js')}}"></script>
@endpush
