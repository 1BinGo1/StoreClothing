@extends('layouts.site')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card mt-4 mb-4">
                <div class="card-body error">
                    <img src="{{ asset('storage/app/404.jpg') }}" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection
