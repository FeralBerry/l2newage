<!-- Navbar -->
<nav class="navbar-youplay navbar navbar-default navbar-fixed-top ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="off-canvas" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('front-index') }}">
                <img src="{{ asset('front/img/logo.png') }}" alt="">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown dropdown-hover ">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Базовые <span class="caret"></span> <span class="label">настройки</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            <li><a href="{{ route('admin-seo-index') }}">Seo</a></li>
                            <li><a href="#">Пользователи</a></li>
                            <li><a href="#">Подарки</a></li>
                        </ul>
                        <ul role="menu">
                            <li><a href="#">Аккаунты</a></li>
                            <li><a href="#">Партнеры</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown dropdown-hover ">
                    <a href="{{ route('news-index') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Новости <span class="caret"></span> <span class="label">проекта</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            <li><a href="#">Все новости</a></li>
                            <li><a href="#">Форум</a></li>
                            <li><a href="#">Теги</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown dropdown-hover ">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Магазин <span class="caret"></span> <span class="label">полезностей</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            <li><a href="#">Магазин</a></li>
                            <li><a href="#">Товары</a></li>
                            <li><a href="#">На аккаунтах</a></li>
                            <li><a href="#">Ордера</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown dropdown-hover ">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Документы <span class="caret"></span> <span class="label">и правила</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            <li><a href="{{ route('admin-rules-index',1) }}">Лицензионное соглашение</a></li>
                            <li><a href="{{ route('admin-rules-index',2) }}">Правила пользования</a></li>
                            <li><a href="{{ route('admin-rules-index',3) }}">Условия установки дополнительных компонентов</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-hover">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} {{--<span class="badge bg-default">2</span>--}} <span class="caret"></span> <span class="label">it is you</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            <li><a href="{{ route('users-index') }}">Кабинет</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- /Navbar -->
