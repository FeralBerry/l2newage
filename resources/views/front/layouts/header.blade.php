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
                <li class="dropdown dropdown-hover">
                    <a class="dropdown-toggle" href="{{ route('front-index') }}">Главная</a>
                </li>
                <li class="dropdown dropdown-hover ">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Файлы <span class="caret"></span> <span class="label">игры</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            <li><a href="{{ config('global.client_high_five') }}">Полный клиент</a>
                            </li>
                            <li><a href="{{ config('global.patch_high_five') }}">Патч для игры</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown dropdown-hover ">
                    <a href="{{ route('news-index') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Новости <span class="caret"></span> <span class="label">проекта</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            <li><a href="{{ route('news-index') }}">Все новости</a></li>
                            @if(isset($latest_news))
                                @foreach($latest_news as $new)
                                    <li><a href="{{ route('news-article',$new->id) }}">{{ $new->name }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                        <ul role="menu">
                            <li><a href="{{ route('forum-index') }}">Форум</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown dropdown-hover ">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Магазин <span class="caret"></span> <span class="label">полезностей</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            {{--<li class="dropdown dropdown-submenu pull-left ">
                                <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">User</a>
                                <div class="dropdown-menu">
                                    <ul role="menu">
                                        <li><a href="users-activity.html">Activity</a>
                                        </li>
                                        <li><a href="users-profile.html">Profile</a>
                                        </li>
                                        <li><a href="users-messages.html">Messages</a>
                                        </li>
                                        <li><a href="users-messages-compose.html">Messages Compose</a>
                                        </li>
                                        <li><a href="users-settings.html">Settings</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>--}}
                            <li><a href="{{ route('shop-index') }}">В магазин</a></li>
                            @if(Auth::user())
                            <li><a href="{{ route('cart-index') }}">В корзину</a></li>
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="dropdown dropdown-hover ">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Документы <span class="caret"></span> <span class="label">и правила</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            <li><a href="{{ route('rules-index',1) }}">Лицензионное соглашение</a></li>
                            <li><a href="{{ route('rules-index',2) }}">Правила пользования</a></li>
                            <li><a href="{{ route('rules-index',3) }}">Условия установки дополнительных компонентов</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route('knowledge-base-index') }}">
                        База знаний<span class="label">сервера</span>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(isset(Auth::user()->name))
                <li class="dropdown dropdown-hover">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} {{--<span class="badge bg-default">2</span>--}} <span class="caret"></span> <span class="label">it is you</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">
                            <li><a href="{{ route('users-index') }}">Кабинет</a>
                            </li>
                            <li class="divider"></li>
                            @if(isset($header_cart))
                                @php $count = count($header_cart); @endphp
                            <li><a href="{{ route('cart-index') }}">Корзина <span class="badge pull-right bg-default">{{ $count }}</span></a>
                            </li>
                            @endif
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
                @else
                    <li class="dropdown dropdown-hover">
                        <a href="{{ route('login') }}" class="dropdown-toggle">Вход</a>
                    </li>
                    <li class="dropdown dropdown-hover">
                        <a href="{{ route('register') }}" class="dropdown-toggle">Регистрация</a>
                    </li>
                @endif
                <li class="dropdown dropdown-hover dropdown-cart" >
                    <a href="{{ route('cart-index') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                    <div class="dropdown-menu" style="width: 300px;" id="cart">
                        @if(isset($header_cart))
                        @foreach($header_cart as $cart)
                            @foreach($header_shop as $shop)
                                @if($shop->id == $cart->shop_id)
                                <div class="row youplay-side-news" id="product{{ $cart->shop_id }}">
                                    <div class="col-xs-3 col-md-4">
                                        <a href="{{ route('shop-product',$cart->shop_id) }}" class="angled-img">
                                            <div class="img">
                                                @php $img = explode('||',$shop->img); @endphp
                                                @if($shop->img !== NULL)
                                                    <img src="{{ asset('front/img/shop') }}/{{ $img[0] }}" alt="{{ $shop->title }}">
                                                @else
                                                    <img src="{{ asset('front/img/shop/mo-img.jpg') }}" alt="{{ $shop->title }}">
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xs-9 col-md-8">
                                        <a href="#" onclick="cartDelete({{ $cart->shop_id }})" style="text-decoration: none;" class="pull-right mr-10"><i class="fa fa-times"></i></a>
                                        <h4 class="ellipsis"><a href="{{ route('shop-product',$cart->shop_id) }}">{{ $shop->title }}</a></h4>
                                        <span class="quantity" id="amount{{$cart->shop_id}}">{{ $cart->count }} × <span class="amount">&#8381;{{ $shop->price - ($shop->price * $shop->percent / 100) }}</span><sup><del> &#8381;{{ $shop->price }}</del></sup></span>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endforeach
                        @endif
                        @if(isset($header_count) && $header_count >= 5)
                        <div class="col-md-12">Остальные товары можно посмотреть в корзине</div>
                        @endif
                        <div class="ml-20 mr-20 pull-right" id="price"><strong>Всего:</strong>  <span class="amount">&#8381;@if(isset($header_price)){{ $header_price }}@else 0 @endif</span>
                        </div>
                        <div class="btn-group pull-right m-15">
                            <a href="{{ route('cart-index') }}" class="btn btn-default btn-sm">Корзина</a>
                            <a href="{{ route('payment-create') }}" class="btn btn-default btn-sm">Оплата</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- /Navbar -->
