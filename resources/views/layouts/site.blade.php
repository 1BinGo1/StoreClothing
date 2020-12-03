<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title ?? 'Страница сайта'}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/product/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/product/products.css')}}">
    <link rel="stylesheet" href="{{asset('css/product/show.css')}}">
</head>
<body>

<div class="container">
    @include('layouts.header')
    <div class="main">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ $message }}
            </div>
        @endif
        @yield('main')
    </div>
    @include('layouts.footer')
</div>

