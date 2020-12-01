@extends('layouts.site')

@section('main')
    <div class="container">

        <form action="{{route('admin.index')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label class="mr-sm-2" for="category">Category</label>
                <select class="form-control form-control-lg" name="category" id="category" required>
                    @foreach($categories as $category)
                        <option @if($loop->first) selected @endif>{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="mr-sm-2" for="brand">Brand</label>
                <select class="form-control form-control-lg" name="brand" id="brand" required>
                    @foreach($brands as $brand)
                        <option @if($loop->first) selected @endif>{{$brand->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" required>
            </div>
            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                <textarea class="form-control" name="excerpt" id="excerpt" placeholder="Excerpt" rows="7" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" id="price" placeholder="Price" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control-file" id="image">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" name="body" id="body" placeholder="Body" rows="7" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="create">Create</button>
            </div>
        </form>

    </div>
@endsection
