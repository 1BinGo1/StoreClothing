<header>
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('products.home')}}"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
                </li>
                @auth
                    @if(auth()->user()->role_id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('office.index')}}"><i class="fa fa-wrench fa-2x" aria-hidden="true"></i></a>
                        </li>
                    @endif
                @endauth
                <li class="nav-item dropdown">
                    <a id="navbarDropdownCatalog" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" v-pre>
                        Каталог
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownCatalog">
                        @php
                            $sections =\App\Models\Section::all();
                        @endphp
                        @foreach($sections as $section)
                            <a class="dropdown-item" href="{{route('products.index', ['title' => __('messages.' . $section->name)])}}">{{$section->name}}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Доставка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Контакты</a>
                </li>
                @auth
                    @if(auth()->id())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('basket.index')}}">Корзина</a>
                        </li>
                    @endif
                @endauth
            </ul>
            <form class="form-inline my-2 my-lg-0" action="{{ route('products.search') }}">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Поиск..." aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="send_search">Поиск...</button>
            </form>
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="{{route('user.index')}}">Личный кабинет</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
