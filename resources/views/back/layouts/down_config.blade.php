<!-- jQuery -->
<script type="text/javascript" src="{{ asset('front/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Hexagon Progress -->
<script type="text/javascript" src="{{ asset('front/bower_components/HexagonProgress/jquery.hexagonprogress.min.js') }}"></script>
<!-- Bootstrap -->
<script type="text/javascript" src="{{ asset('front/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Jarallax -->
<script type="text/javascript" src="{{ asset('front/bower_components/jarallax/dist/jarallax.min.js') }}"></script>
<!-- Smooth Scroll -->
<script type="text/javascript" src="{{ asset('front/bower_components/smoothscroll-for-websites/SmoothScroll.js') }}"></script>
<!-- Owl Carousel -->
<script type="text/javascript" src="{{ asset('front/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<!-- Countdown -->
<script type="text/javascript" src="{{ asset('front/bower_components/jquery.countdown/dist/jquery.countdown.min.js') }}"></script>
<!-- Youplay -->
<script type="text/javascript" src="{{ asset('front/youplay/js/youplay.min.js') }}"></script>
<!-- ImagesLoaded -->
<script type="text/javascript" src="{{ asset('front/bower_components/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<!-- Isotope -->
<script type="text/javascript" src="{{ asset('front/bower_components/isotope/dist/isotope.pkgd.min.js') }}"></script>
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
</script>
