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
