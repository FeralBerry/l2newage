<!-- Object Fit Polyfill -->
<script src="{{ asset('front/vendor/object-fit-images/dist/ofi.min.js') }}"></script>

<!-- jQuery -->
<script src="{{ asset('front/vendor/jquery/dist/jquery.min.js') }}"></script>

<!-- Hexagon Progress -->
<script src="{{ asset('front/vendor/HexagonProgress/jquery.hexagonprogress.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('front/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Jarallax -->
<script src="{{ asset('front/vendor/jarallax/dist/jarallax.min.js') }}"></script>

<!-- Flickity -->
<script src="{{ asset('front/vendor/flickity/dist/flickity.pkgd.min.js') }}"></script>

<!-- jQuery Countdown -->
<script src="{{ asset('front/vendor/jquery-countdown/dist/jquery.countdown.min.js') }}"></script>

<!-- Moment.js -->
<script src="{{ asset('front/vendor/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('front/vendor/moment-timezone/builds/moment-timezone-with-data.min.js') }}"></script>

<!-- Magnific Popup -->
<script src="{{ asset('front/vendor/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>

<!-- Revolution Slider -->
<script src="{{ asset('front/vendor/slider-revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('front/vendor/slider-revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- ImagesLoaded -->
<script src="{{ asset('front/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>

<!-- Isotope -->
<script src="{{ asset('front/vendor/isotope-layout/dist/isotope.pkgd.min.js') }}"></script>

<!-- Bootstrap Validator -->
<script src="{{ asset('front/vendor/bootstrap-validator/dist/validator.min.js') }}"></script>

<!-- Bootstrap Sweetalert -->
<script src="{{ asset('front/vendor/bootstrap-sweetalert/dist/sweetalert.min.js') }}"></script>

<!-- Social Likes -->
<script src="{{ asset('front/vendor/social-likes/dist/social-likes.min.js') }}"></script>

<!-- Youplay -->
<script src="{{ asset('front/js/youplay.min.js') }}"></script>
<script src="{{ asset('front/js/youplay-init.js') }}"></script>

<!-- init youplay -->
<script>
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
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function rules_change(id) {
        var iframe = document.getElementById("rules_ifr");
        var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
        var rules = iframeDocument.getElementById("tinymce").innerHTML;
        $.ajax({
            url: "{{ route('admin-index') }}/rules/edit/" + id,
            dataType: 'html',
            method: 'post',
            data: {
                _token: '{{ csrf_token() }}',
                rules: rules,
            },
            success: function (data) {
                if(data === "success"){
                    alert("Успешно изменено")
                }
                document.getElementById('rul_desc' + id).innerHTML = rules;
            }
        });
    }
    function seoDelete(id){
        $.ajax({
            type: "POST",
            url: "{{ route('admin-seo-index') }}/delete/" + id,
            data:{
                _token: '{{ csrf_token() }}',
            },
            beforeSend:function(){
                return confirm("Точно удалить SEO описание?");
            },
            success: function (data) {
                alert(data)
            }
        });
    }
    function seoEdit(id){
        let formData = new FormData;
        formData.append('route_name',document.getElementById('route_name' + id).value);
        formData.append('title',document.getElementById('title' + id).value);
        formData.append('description',document.getElementById('description' + id).value);
        formData.append('keywords',document.getElementById('keywords' + id).value);
        formData.append('img',document.getElementById('img' + id).files[0]);
        formData.append('old_img',document.getElementById('old_img' + id).value);
        $.ajax({
            url: "{{ route('admin-seo-index') }}/edit/" + id,
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            beforeSend:function(){
                return confirm("Точно изменить SEO описание?");
            },
            success: function (data) {
                alert(data)
            }
        });
    }
</script>

