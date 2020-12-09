@push('styles')
    <link rel="stylesheet" href="{{asset('css/admin/admin.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('js/admin/admin.js')}}"></script>
@endpush

@extends('layouts.site')

@section('breadcrumbs')
    {{ DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('admin') }}
@endsection

@section('main')
    <div class="container">

        <div class="admin_actions">

            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <span class="nav-link section-link active" id="users-settings">Пользователи</span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link section-link" id="products-settings">Товары</span>
                        </li>
                        <li class="nav-item dropdown">
                            <span id="sections-title" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre>
                                Разделы сайта
                            </span>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="sections">
                                <span class="dropdown-item section-link" id="sections-settings">Секции</span>
                                <span class="dropdown-item section-link" id="categories-settings">Категории</span>
                                <span class="dropdown-item section-link" id="brands-settings">Бренды</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-body">

                    <div class="content active" id="users">
                        <h5 class="card-title">Список пользователей: </h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>№</th>
                                <th>Логин</th>
                                <th>Email</th>
                                <th>Роль</th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    @if($user->admin)
                                        <td>Администратор</td>
                                    @else
                                        <td>Пользователь</td>
                                    @endif
                                    <td>
                                        <form action="" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                                <i class="fa fa-trash fa-2x text-danger"></i>
                                            </button>
                                        </form>
                                        <span class="mx-0"></span>
                                        <form action="" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                                <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="content" id="products">
                        <h5 class="card-title">Список товаров: </h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>№</th>
                                <th>Название</th>
                                <th>Секция</th>
                                <th>Категория</th>
                                <th>Бренд</th>
                            </tr>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{route('products.show', ['id' => $product->id])}}">{{$product->title}}</a></td>
                                    <td>{{$product->category->section->name}}</td>
                                    <td>{{$product->category->title}}</td>
                                    <td>{{$product->brand->title}}</td>
                                    <td>
                                        <form action="" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                                <i class="fa fa-trash fa-2x text-danger"></i>
                                            </button>
                                        </form>
                                        <span class="mx-0"></span>
                                        <form action="" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                                <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="content" id="sections">
                        <h5 class="card-title">Список секций: </h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>№</th>
                                <th>Название</th>
                            </tr>
                            @foreach($sections as $section)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$section->name}}</td>
                                    <td>
                                        <form action="" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                                <i class="fa fa-trash fa-2x text-danger"></i>
                                            </button>
                                        </form>
                                        <span class="mx-0"></span>
                                        <form action="" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                                <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="content" id="categories">
                        <h5 class="card-title">Список секций: </h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>№</th>
                                <th>Название</th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$category->title}}</td>
                                    <td>
                                        <form action="" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                                <i class="fa fa-trash fa-2x text-danger"></i>
                                            </button>
                                        </form>
                                        <span class="mx-0"></span>
                                        <form action="" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                                <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="content" id="brands">
                        <h5 class="card-title">Список брендов: </h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>№</th>
                                <th>Название</th>
                                <th>Логотип</th>
                            </tr>
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$brand->title}}</td>
                                    <td><img src="{{$brand->img}}" alt="Image"></td>
                                    <td>
                                        <form action="" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                                <i class="fa fa-trash fa-2x text-danger"></i>
                                            </button>
                                        </form>
                                        <span class="mx-0"></span>
                                        <form action="" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                                <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

            </div>

        </div>

    </div>
@endsection
