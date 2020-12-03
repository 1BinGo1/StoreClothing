@extends('layouts.site')

@section('main')
    <form action="" method="post" enctype="multipart/form-data" novalidate id="form-create">
        {{csrf_field()}}
        <div class="form-group">
            <label class="mr-sm-2" for="category">Category</label>
            <select class="form-control form-control-lg" name="category" id="category">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if(!empty(old('$category'))) @if(old('$category') == $category->id) selected @endif @endif>{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="mr-sm-2" for="brand">Brand</label>
            <select class="form-control form-control-lg" name="brand" id="brand">
                @foreach($brands as $brand)
                    <option value="{{$brand->id}}" @if(!empty(old('brand'))) @if(old('brand') == $brand->id) selected @endif @endif>{{$brand->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <textarea class="form-control" name="excerpt" id="excerpt" placeholder="Excerpt" rows="7">{{old('excerpt')}}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" id="price" placeholder="Price" value="{{old('price')}}">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control-file" id="image">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" name="body" id="body" placeholder="Body" rows="7">{{old('body')}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="create">Create</button>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="{{asset('js/product/cr_up_product.js')}}"></script>
@endpush
