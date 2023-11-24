var num;
var item;
function rate1(num,item) {
    var rating = document.getElementById('rating'+item);
    $.ajax({
        url: "{{ route('shop-index') }}"+"/rate/"+num+"/"+item,
        dataType: 'html',
        method: 'post',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function (data) {
            rating.innerHTML = '';
            if(data < 0.5){
                rating.innerHTML = '<i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(0.5 <= data && data < 1){
                rating.innerHTML = '<i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(1 <= data && data < 1.5){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(1.5 <= data && data < 2) {
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(2 <= data && data < 2.5) {
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(2.5 <= data && data < 3){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(3 <= data && data < 3.5){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(3.5 <= data && data < 4){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(4 <= data && data < 4.5){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(4.5 <= data && data < 4.9){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>';
            } else if(data >= 4.9){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>';
            }
        },
    });
};
function rate2(num,item) {
    var rating = document.getElementById('rating'+item);
    $.ajax({
        url: "{{ route('shop-index') }}"+"/rate/"+num+"/"+item,
        dataType: 'html',
        method: 'post',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function (data) {
            rating.innerHTML = '';
            if(data < 0.5){
                rating.innerHTML = '<i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(0.5 <= data && data < 1){
                rating.innerHTML = '<i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(1 <= data && data < 1.5){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(1.5 <= data && data < 2) {
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(2 <= data && data < 2.5) {
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(2.5 <= data && data < 3){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(3 <= data && data < 3.5){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(3.5 <= data && data < 4){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(4 <= data && data < 4.5){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(4.5 <= data && data < 4.9){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>';
            } else if(data >= 4.9){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>';
            }
        },
    });
};
function rate3(num,item) {
    var rating = document.getElementById('rating'+item);
    $.ajax({
        url: "{{ route('shop-index') }}"+"/rate/"+num+"/"+item,
        dataType: 'html',
        method: 'post',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function (data) {
            rating.innerHTML = '';
            if(data < 0.5){
                rating.innerHTML = '<i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(0.5 <= data && data < 1){
                rating.innerHTML = '<i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(1 <= data && data < 1.5){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(1.5 <= data && data < 2) {
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(2 <= data && data < 2.5) {
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(2.5 <= data && data < 3){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(3 <= data && data < 3.5){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(3.5 <= data && data < 4){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(4 <= data && data < 4.5){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(4.5 <= data && data < 4.9){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>';
            } else if(data >= 4.9){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>';
            }
        },
    });
};
function rate4(num,item) {
    var rating = document.getElementById('rating'+item);
    $.ajax({
        url: "{{ route('shop-index') }}"+"/rate/"+num+"/"+item,
        dataType: 'html',
        method: 'post',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function (data) {
            rating.innerHTML = '';
            if(data < 0.5){
                rating.innerHTML = '<i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(0.5 <= data && data < 1){
                rating.innerHTML = '<i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(1 <= data && data < 1.5){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(1.5 <= data && data < 2) {
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(2 <= data && data < 2.5) {
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(2.5 <= data && data < 3){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(3 <= data && data < 3.5){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(3.5 <= data && data < 4){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(4 <= data && data < 4.5){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(4.5 <= data && data < 4.9){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>';
            } else if(data >= 4.9){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>';
            }
        },
    });
};
function rate5(num,item) {
    var rating = document.getElementById('rating'+item);
    $.ajax({
        url: "{{ route('shop-index') }}"+"/rate/"+num+"/"+item,
        dataType: 'html',
        method: 'post',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function (data) {
            rating.innerHTML = '';
            if(data < 0.5){
                rating.innerHTML = '<i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(0.5 <= data && data < 1){
                rating.innerHTML = '<i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(1 <= data && data < 1.5){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(1.5 <= data && data < 2) {
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(2 <= data && data < 2.5) {
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(2.5 <= data && data < 3){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(3 <= data && data < 3.5){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(3.5 <= data && data < 4){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(4 <= data && data < 4.5){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-o"></i>';
            } else if(4.5 <= data && data < 4.9){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star-half-o"></i>';
            } else if(data >= 4.9){
                rating.innerHTML = '<i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>\n' +
                    '                <i class="fa fa-star"></i>';
            }
        },
    });
};
