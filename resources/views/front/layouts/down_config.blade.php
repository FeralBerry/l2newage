<!-- jQuery -->
<script type="text/javascript" src="{{ asset('front/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Hexagon Progress -->
<script type="text/javascript" src="{{ asset('front/bower_components/HexagonProgress/jquery.hexagonprogress.min.js') }}"></script>
<!-- Bootstrap -->
<script type="text/javascript" src="{{ asset('front/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
@if(Route::is('front-index') || Route::is('shop-product') || Route::is('news-article'))
    <!-- Jarallax -->
    <script type="text/javascript" src="{{ asset('front/bower_components/jarallax/dist/jarallax.min.js') }}"></script>
    <!-- Smooth Scroll -->
    <script type="text/javascript" src="{{ asset('front/bower_components/smoothscroll-for-websites/SmoothScroll.js') }}"></script>
    <!-- Owl Carousel -->
    <script type="text/javascript" src="{{ asset('front/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <!-- Countdown -->
    <script type="text/javascript" src="{{ asset('front/bower_components/jquery.countdown/dist/jquery.countdown.min.js') }}"></script>
@endif
<!-- Youplay -->
<script type="text/javascript" src="{{ asset('front/youplay/js/youplay.min.js') }}"></script>
<!-- ImagesLoaded -->
<script type="text/javascript" src="{{ asset('front/bower_components/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<!-- Isotope -->
<script type="text/javascript" src="{{ asset('front/bower_components/isotope/dist/isotope.pkgd.min.js') }}"></script>
@if(Route::is('front-index') || Route::is('shop-index') || Route::is('shop-product'))
<!-- rating -->
<script type="text/javascript" src="{{ asset('front/js/rating.js') }}"></script>
@endif
<!-- init youplay -->
<script>
    $(window).load(function(){
        $('.main-preloader').delay(1000).fadeOut('slow');
    });
    function plus_f(id){
        var num_value = document.getElementById("num_f"+id).value;
        var max = document.getElementById("count_f"+id).innerHTML;
        var maximum = max.replace('Количество: ','');
        if(num_value < Number(maximum)){
            document.getElementById("num_f"+id).value = Number(num_value) + 1;
        }
    }
    function minus_f(id){
        var num_value = document.getElementById("num_f"+id).value;
        if(num_value > 1){
            document.getElementById("num_f"+id).value = Number(num_value) - 1;
        }
    }
    function plus_h(id){
        var num_value = document.getElementById("num_h"+id).value;
        var max = document.getElementById("count_h"+id).innerHTML;
        var maximum = max.replace('Количество: ','');
        if(num_value < Number(maximum)){
            document.getElementById("num_h"+id).value = Number(num_value) + 1;
        }
    }
    function minus_h(id){
        var num_value = document.getElementById("num_h"+id).value;
        if(num_value > 1){
            document.getElementById("num_h"+id).value = Number(num_value) - 1;
        }
    }
    if(typeof youplay !== 'undefined') {
        youplay.init({
            // enable parallax
            parallax:         true,
            // set small navbar on load
            navbarSmall:      false,
            // enable fade effect between pages
            fadeBetweenPages: true,
        });
    }
</script>
@if(Route::is('front-index'))
<script type="text/javascript">
    $(".countdown").each(function() {
        $(this).countdown($(this).attr('data-end'), function(event) {
            $(this).text(
                event.strftime('%D days %H:%M:%S')
            );
        });
    });
</script>
@endif
@if(Route::is('login') || Route::is('users-index'))
    <script type="text/javascript" src="{{ asset('front/js/only_en.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/js/password_show.js') }}"></script>
@endif
@if(Route::is('register'))
    <script type="text/javascript" src="{{ asset('front/js/only_en.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front/js/password_confirm_show.js') }}"></script>
@endif
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('#reg_account').on("click", function () {
            let login = document.getElementById('login').value;
            let pass = document.getElementById('pass').value;
            $.ajax({
                url: "{{ route('users-reg-account') }}",
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    login: login,
                    pass: pass,
                },
                success: function (data) {
                    document.getElementById('myModal').style.display = 'block';
                    setTimeout(function(){
                        document.getElementById('myModal').style.display = 'none';
                    }, 5000);
                    let myModalLabel = $('#myModalLabel');
                    let modalGerBody = $('#modal_ger_body');
                    if (data === 'Ваш аккаунт успешно зарестрирован!') {
                        myModalLabel.html('Успешная регистрация игрового аккаунта');
                        modalGerBody.html(data);
                    } else {
                        myModalLabel.html('Ошибка регистрации');
                        modalGerBody.html(data);
                    }
                },
            });
        });
    });
    @if(Route::is('cart-index'))
    function new_price(id){
        var num = document.getElementById('num'+id).value;
        var price = document.getElementById('price'+id);
        var price_main = document.getElementById('price-main');
        var price_header = document.getElementById('price');
        var amount_header = document.getElementById('amount'+id);
        $.ajax({
                url: "{{ route('cart-update-price') }}",
                dataType: 'html',
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    num: num,
                },
                success: function (data){
                    if(num > 0){
                        var obj = JSON.parse(data);
                        price.innerHTML = "<span class=\"amount\">&#8381;" + obj.price + "</span><sup><del> &#8381;"+ obj.max_price +"</del></sup></span>";
                        price_main.innerHTML = "Всего: <strong>&#8381;" + obj.over_price + "</strong>";
                        price_header.innerHTML = "<strong>Всего:</strong>  <span class=\"amount\">&#8381;"+ obj.over_price +"</span>";
                        amount_header.innerHTML = num +" × <span class=\"amount\">&#8381;"+ obj.price +"</span><sup><del> &#8381;"+ obj.max_price +"</del></sup></span>";
                    }
                    if(num <= 0){
                        alert(data);
                    }
                },
        });
    }
    function cartDelete(id) {
        var cart_main = document.getElementById('cart-main');
        var product_main = document.getElementById('product-main' + id);
        var price_main = document.getElementById('price-main');
        var product = document.getElementById('product' + id);
        var cart = document.getElementById('cart');
        var price = document.getElementById('price');
        $.ajax({
            url: "{{ route('cart-index') }}/delete/" + id,
            dataType: 'html',
            method: 'post',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function (data){
                cart_main.removeChild(product_main);
                cart.removeChild(product);
                price_main.innerHTML = "Всего: <strong>&#8381;"+ data +"</strong>\n";
                price.innerHTML = "<strong>Всего:</strong>  <span class=\"amount\">&#8381;"+ data +"</span>\n";
            }
        });
    }
    @else
    function cartDelete(id) {
        var product = document.getElementById('product' + id);
        var cart = document.getElementById('cart');
        var price = document.getElementById('price');
        $.ajax({
            url: "{{ route('cart-index') }}/delete/" + id,
            dataType: 'html',
            method: 'post',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function (data){
                cart.removeChild(product);
                price.innerHTML = "<strong>Всего:</strong>  <span class=\"amount\">&#8381;"+ data +"</span>\n";
            }
        });
    }
    @endif
</script>
<script>
    @if(isset($shop) && isset($mag))
    @foreach($shop as $item)
    $("#cart{{ $item->id }}").on("click",function(){
        id = $(this).attr("for");
        $("#item{{ $item->id }}")
            .clone()
            .css({'position' : 'absolute', 'z-index' : '11100', top: $(this).offset().top-400, left:$(this).offset().left-100})
            .appendTo("body")
            .animate({opacity: 0.05,
                left: $(".fa-shopping-cart").offset()['left'],
                top: $(".fa-shopping-cart").offset()['top'],
                width: 30}, 1500, function() {
                $(this).remove();
            });

    });
    $(document).ready(function(){
        $('#cart{{ $item->id }}').click(function (){
            var cart = document.getElementById("cart");
            cart.innerHTML = "";

            $.ajax({
                url: "{{ route('cart-add',$item->id) }}",
                dataType: 'html',
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (data){
                    var obj = JSON.parse(data);
                    var length = obj.length;
                    var over = 0;
                    var sum = 0;
                    for (var i = 0; i < length; i++) {
                        if(obj[i].percent > 0){
                            sum = obj[i].price * obj[i].count;
                            over = over + sum - (sum * obj[i].percent / 100);
                        } else {
                            sum = obj[i].price * obj[i].count;
                            over = over + sum;
                        }
                    }
                    for (var i = 0; i < length; i++) {
                        if(i < 4){
                            var min = obj[i].price - (obj[i].price * obj[i].percent / 100);
                            cart.innerHTML += "<div class=\"row youplay-side-news\" id=\"product" + obj[i].id + "\">\n" +
                                "            <div class=\"col-xs-3 col-md-4\">\n" +
                                "                <a href=\"#\" class=\"angled-img\">\n" +
                                "                    <div class=\"img\">\n" +
                                "                        <img src=\"{{ asset('front/img/shop/') }}/"+ obj[i].img +"\" alt=\"\">\n" +
                                "                    </div>\n" +
                                "                </a>\n" +
                                "            </div>\n" +
                                "            <div class=\"col-xs-9 col-md-8\">\n" +
                                "                <a href=\"#\" onclick=\"cartDelete(" + obj[i].id + ")\" style=\"text-decoration: none;\" class=\"pull-right mr-10\"><i class=\"fa fa-times\"></i></a>\n" +
                                "                <h4 class=\"ellipsis\"><a href=\"#\">"+ obj[i].title+"</a></h4>\n" +
                                "                <span class=\"quantity\">" + obj[i].count + " × <span class=\"amount\">&#8381;" + min + "</span><sup><del> &#8381;"+ obj[i].price +"</del></sup></span>\n" +
                                "            </div>\n" +
                                "        </div>\n";
                        }
                    }
                    if(length < 5){
                        cart.innerHTML += "<div class=\"ml-20 mr-20 pull-right\" id=\"price\"><strong>Всего:</strong>  <span class=\"amount\" id=\"price\">&#8381;"+ over +"</span>\n" +
                            "        </div>" +
                            "           <div class=\"btn-group pull-right m-15\">\n" +
                            "                        <a href=\"{{ route('cart-index') }}\" class=\"btn btn-default btn-sm\">Корзина</a>\n" +
                            "                    <a href=\"{{ route('front-index') }}/payment/create\" class=\"btn btn-default btn-sm\">Оплата</a>\n" +
                            "                        </div>";
                    }
                    if(length >= 5){
                        cart.innerHTML += "<div class=\"col-md-12\">Остальные товары можно посмотреть в корзине</div>" +
                            "<div class=\"ml-20 mr-20 pull-right\" id=\"price\"><strong>Всего:</strong>  <span class=\"amount\" id=\"price\">&#8381;"+ over +"</span>\n" +
                            "        </div>" +
                            "           <div class=\"btn-group pull-right m-15\">\n" +
                            "                        <a href=\"{{ route('cart-index') }}\" class=\"btn btn-default btn-sm\">Корзина</a>\n" +
                            "                    <a href=\"{{ route('front-index') }}/payment/create\" class=\"btn btn-default btn-sm\">Оплата</a>\n" +
                            "                        </div>";
                    }
                }
            });
        });
    });
    @endforeach
    @endif
    @if(isset($product_name))
        @foreach($product as $item)
        @php
            $id = $item->id;
            $img = explode('||', $item->img);
        @endphp
            $("#add_cart").on("click",function(){
                id = $(this).attr("for");
                $("#item")
                    .clone()
                    .css({'position' : 'absolute', 'z-index' : '11100', top: $(this).offset().top-400, left:$(this).offset().left-100})
                    .appendTo("body")
                    .animate({opacity: 0.05,
                        left: $(".fa-shopping-cart").offset()['left'],
                        top: $(".fa-shopping-cart").offset()['top'],
                        width: 30}, 1500, function() {
                        $(this).remove();
                    });

            });
            $(document).ready(function() {
                $('#add_cart').click(function () {
                    var cart = document.getElementById('cart');
                    cart.innerHTML = '';
                    $.ajax({
                        url: "{{ route('cart-add',$id) }}",
                        dataType: 'html',
                        method: 'post',
                        data:{
                            _token: '{{ csrf_token() }}',
                        },
                        success: function (data){
                            var obj = JSON.parse(data);
                            var length = obj.length;
                            var over = 0;
                            var sum = 0;
                            for (var i = 0; i < length; i++) {
                                if(obj[i].percent > 0){
                                    sum = obj[i].price * obj[i].count;
                                    over = over + sum - (sum * obj[i].percent / 100);
                                } else {
                                    sum = obj[i].price * obj[i].count;
                                    over = over + sum;
                                }
                            }
                            for (var i = 0; i < length; i++) {
                                if(i < 4){
                                    var min = obj[i].price - (obj[i].price * obj[i].percent / 100);
                                    img = obj[i].img.split('||');
                                    cart.innerHTML += "<div class=\"row youplay-side-news\" id=\"product" + obj[i].id + "\">\n" +
                                        "            <div class=\"col-xs-3 col-md-4\">\n" +
                                        "                <a href=\"#\" class=\"angled-img\">\n" +
                                        "                    <div class=\"img\">\n" +
                                        "                        <img src=\"{{ asset('front/img/shop/') }}/"+ img[0] +"\" alt=\"\">\n" +
                                        "                    </div>\n" +
                                        "                </a>\n" +
                                        "            </div>\n" +
                                        "            <div class=\"col-xs-9 col-md-8\">\n" +
                                        "                <a href=\"#\" onclick=\"cartDelete(" + obj[i].id + ")\" style=\"text-decoration: none;\" class=\"pull-right mr-10\"><i class=\"fa fa-times\"></i></a>\n" +
                                        "                <h4 class=\"ellipsis\"><a href=\"#\">"+ obj[i].title+"</a></h4>\n" +
                                        "                <span class=\"quantity\">" + obj[i].count + " × <span class=\"amount\">&#8381;" + min + "</span><sup><del> &#8381;"+ obj[i].price +"</del></sup></span>\n" +
                                        "            </div>\n" +
                                        "        </div>\n";
                                }
                            }
                            if(length < 5){
                                cart.innerHTML += "<div class=\"ml-20 mr-20 pull-right\" id=\"price\"><strong>Всего:</strong>  <span class=\"amount\" id=\"price\">&#8381;"+ over +"</span>\n" +
                                    "        </div>" +
                                    "           <div class=\"btn-group pull-right m-15\">\n" +
                                    "                        <a href=\"{{ route('cart-index') }}\" class=\"btn btn-default btn-sm\">Корзина</a>\n" +
                                    "                    <a href=\"{{ route('front-index') }}/payment/create\" class=\"btn btn-default btn-sm\">Оплата</a>\n" +
                                    "                        </div>";
                            }
                            if(length >= 5){
                                cart.innerHTML += "<div class=\"col-md-12\">Остальные товары можно посмотреть в корзине</div>" +
                                    "<div class=\"ml-20 mr-20 pull-right\" id=\"price\"><strong>Всего:</strong>  <span class=\"amount\" id=\"price\">&#8381;"+ over +"</span>\n" +
                                    "        </div>" +
                                    "           <div class=\"btn-group pull-right m-15\">\n" +
                                    "                        <a href=\"{{ route('cart-index') }}\" class=\"btn btn-default btn-sm\">Корзина</a>\n" +
                                    "                    <a href=\"{{ route('front-index') }}/payment/create\" class=\"btn btn-default btn-sm\">Оплата</a>\n" +
                                    "                        </div>";
                            }
                        }
                    });
                });
            });
        @endforeach
    @endif
</script>
<script>
    $(document).ready(function(){
        $('#new_password_button').click(function (){
            var new_password = document.getElementById('new_password').value;
            var cur_password = document.getElementById('cur_password').value;
            var error_cur_password = document.getElementById('error_cur_password');
            $.ajax({
                url: "{{ route('users-new-password') }}",
                dataType: 'html',
                method: 'post',
                data:{
                    _token: '{{ csrf_token() }}',
                    new_password: new_password,
                    cur_password: cur_password,
                },
                success: function (data) {
                    if(data !== "Пароль успешно изменен!!"){
                        error_cur_password.innerHTML = "<span style=\"color:red\">"+data+"</span>";
                    }
                }
            });
        });
    });
    $(document).ready(function(){
        $('#tel').click(function (){
            var phone = document.getElementById('phone').value;
            $.ajax({
                url: "{{ route('users-new-phone') }}",
                dataType: 'html',
                method: 'post',
                data:{
                    _token: '{{ csrf_token() }}',
                    phone: phone,
                },
                success: function (data) {
                    alert(data);
                }
            });
        });
    });
    $('#move_character').click(function (){
        let char = $(".char:checked").val();
        let elem_id = '';
        let elem_count = '';
        let moveCharacterLabel = $('#moveCharacterLabel');
        let moveCharacterBody = $('#moveCharacterBody');
        if(typeof char == 'undefined'){
            document.getElementById('moveCharacterModal').style.display = 'block';
            document.getElementById('moveCharacterModal').style.opacity = '1';
            moveCharacterLabel.html('Ошибка выбора персонажа.');
            moveCharacterBody.html("Для перевода итемов на персонажа надо выбрать персонажа.");
            setTimeout(function(){
                document.getElementById('moveCharacterModal').style.display = 'none';
                document.getElementById('moveCharacterModal').style.opacity = '0';
            }, 5000);
        }
        document.querySelectorAll('.item').forEach(function(elem) {
            if(elem.checked){
                elem_id = elem_id + elem.value + ' ';
                elem_count = elem_count + document.getElementById('item_count'+elem.value).value + " ";
            }
        });
        if(elem_id === '' || elem_count === '' && elem_count === 0){
            document.getElementById('moveCharacterModal').style.display = 'block';
            document.getElementById('moveCharacterModal').style.opacity = '1';
            moveCharacterLabel.html('Ошибка.');
            moveCharacterBody.html("Для перевода итемов надо выбрать хотя бы 1 итем.");
            setTimeout(function(){
                document.getElementById('moveCharacterModal').style.display = 'none';
                document.getElementById('moveCharacterModal').style.opacity = '0';
            }, 5000);
        }
        $.ajax({
            url: "{{ route('user-character-add-item') }}",
            dataType: 'html',
            method: 'post',
            data:{
                _token: '{{ csrf_token() }}',
                item_id: elem_id,
                item_count: elem_count,
                char: char,
            },
            success: function (data) {
                document.getElementById('moveCharacterModal').style.display = 'block';
                document.getElementById('moveCharacterModal').style.opacity = '1';
                moveCharacterLabel.html('Успешная отпрака итемов');
                moveCharacterBody.html(data);
                setTimeout(function(){
                    document.getElementById('moveCharacterModal').style.opacity = '0';
                    document.getElementById('moveCharacterModal').style.display = 'none';
                }, 5000);
                let elements = elem_id.split(" ");
                let elements_count = elem_count.split(" ");
                for (let i = 0; i < elements.length; i++){
                    if(elements[i] !== ''){
                        let inputMax = document.getElementById("item_count" + elements[i]);
                        let max = inputMax.getAttribute("max");

                        if(max === elements_count[i]){
                            document.getElementById("item" + elements[i]).remove();
                        } else {
                            let newMax = Number(max - elements_count[i]);
                            inputMax.setAttribute("max", newMax);
                            inputMax.value = newMax;
                        }
                    }
                }
            }
        });
    });
    function accountEdit(login){
        let data = "<form>" +
            "<div class='form-horizontal mt-30 mb-40'>" +
                "<div class='form-group'>" +
                "<label class='control-label col-sm-2' for='new_password_for_account'>Новый пароль:</label>" +
                    "<div class='col-sm-10'>" +
                        "<div class='youplay-input'>" +
                            "<input class='input-en' type='password' id='new_password_for_account' name='new_password_for_account' placeholder='Новый пароль:'>" +
                        "</div>" +
                    "</div>" +
                "</div>" +
                "<div class='form-group'>" +
                    "<div class='col-sm-offset-2 col-sm-10'>" +
                        "<a onclick='new_password_for_account(`"+login+"`)' class='btn btn-primary btn-lg'>Изменить</a>" +
                    "</div>" +
                "</div>"+
            "</div></form>";
        document.getElementById('newPasswordModal').style.display = 'block';
        let newPasswordLabel = $('#newPasswordLabel');
        let newPasswordBody = $('#newPasswordBody');
        newPasswordLabel.html('Изменение пароля от игрового аккаунта ' + login);
        newPasswordBody.html(data);
    }
    function new_password_for_account(login){
        let new_password_for_account = document.getElementById('new_password_for_account').value;
        let newPasswordLabel = $('#newPasswordLabel');
        let newPasswordBody = $('#newPasswordBody');
        $.ajax({
            url: "{{ route('user-account-new-password') }}",
            dataType: 'html',
            method: 'post',
            data:{
                _token: '{{ csrf_token() }}',
                new_password_for_account: new_password_for_account,
                login: login,
            },
            success: function (data) {
                newPasswordLabel.html('Изменение пароля от игрового аккаунта ' + login);
                newPasswordBody.html(data);
                setTimeout(function(){
                    document.getElementById('newPasswordModal').style.display = 'none';
                }, 3000);
            }
        });
    }
</script>

