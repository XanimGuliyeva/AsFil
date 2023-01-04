<!doctype html>
<html lang="en" xmlns="">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/modal_iframe.css')}}">
    <link rel="stylesheet" href="{{asset('css/mediaquery.css')}}">
    <link rel="stylesheet" href="{{asset('css/simple-rating.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.rateyo.min.css')}}">
    <script src="{{asset('js/fontawasome.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/toast.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('js/index.js')}}"></script>


    <title>Asfil</title>
</head>

<body>
<header>
    <!--Main Nav Start-->
    <nav class="navbar navbar-container navbar-expand-lg navbar-dark divider" style="background-color: #f5f5f5;" id="mainNav">
        <div class="container nav_bar">
            <a class="navbar-brand" href="/" style="color: #222 !important;letter-spacing: 0.5px;">
                14 S.Vurğun küç. AsFil satış salonu
            </a>
            <button class="navbar-toggler navbar-togler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Tooglenavigation">Menu <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse nav_right" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                        @if(\Illuminate\Support\Facades\Auth::id())
                            <a class="nav-link" style="color: #222 !important;" href="/cabinet">Şəxsi kabinet</a>
                        @else
                            <a class="nav-link" style="color: #222 !important;" href="/login">Şəxsi kabinet</a>
                        @endif
                    </li>
                    <li class="nav-item dropdown" id="remove_show">
                        @if(\Illuminate\Support\Facades\Auth::id())
                            <a style="color: #222 !important;" id="navbarDropdown" class="nav-link text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" style="height: 40px !important;" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Çıxış et') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <a style="color: #222 !important;" class="nav-link" href="/register">Qeydiyyat</a>
                        @endif
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::id())
                        <li class="nav-item">
                            <a class="nav-link" style="color: #222 !important;" href="/wishlist">İstək listi</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link last" style="color: #222 !important;" href="/aboutus">Haqqımızda</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Main Nav end-->
    <div class="container  logo-area h-100 sec_nav">
        <!--Logo Saerch Area start-->
        <div class="row h-100 justify-content-center align-items-center" style="margin-bottom: 0;">
            <div class="col-md-4 ">
                <a href="/">
                    @if(session()->exists('brand'))
                        @if(session()->get('brand') == '5')
                            <img src="{{asset('/img/asfil+asas.png')}}" class="img-fluid logo" alt="">
                        @elseif(session()->get('brand') == '2')
                            <img src="{{asset('/img/asfil+donaldson.png')}}" class="img-fluid logo" alt="">
                        @elseif(session()->get('brand') == '3')
                            <img src="{{asset('/img/asfil+fleet.png')}}" class="img-fluid logo" alt="">
                        @else
                            <img src="{{asset('/img/asfil.png')}}" class="img-fluid logo" alt="">
                        @endif
                    @else
                        <img src="{{asset('/img/asfil.png')}}" class="img-fluid logo" alt="">
                    @endif
                </a>
            </div>
            <div class="col-md-8" style="display: flex; align-items: center; justify-content: space-between;">
                <div style="display: flex; align-items: center; justify-content: space-between; width: 180px;">
                    <svg style="margin-right: 10px;" xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34"
                         class="call text-white">
                        <path
                            d="M29.43 12.93v-1.307c0-3.129-1.157-6.036-3.254-8.193-2.15-2.214-5.104-3.428-8.328-3.428H16.72c-3.224 0-6.18 1.214-8.329 3.428C6.295 5.587 5.14 8.494 5.14 11.623v1.307C2.594 13.094.57 15.123.57 17.602v2.042c0 2.579 2.194 4.679 4.888 4.679h2.754c.493 0 .896-.386.896-.857v-9.693c0-.471-.403-.857-.896-.857H6.93v-1.293c0-5.65 4.209-9.907 9.783-9.907h1.127c5.582 0 9.784 4.257 9.784 9.907v1.293H26.34c-.492 0-.895.386-.895.857v9.686c0 .471.403.857.895.857h1.254c-.366 4.471-3.582 5.507-5.075 5.743-.41-1.207-1.597-2.079-2.992-2.079h-2.239c-1.731 0-3.142 1.35-3.142 3.007s1.41 3.015 3.142 3.015h2.246c1.448 0 2.664-.943 3.03-2.215.732-.1 1.888-.35 3.038-.993 1.619-.907 3.537-2.757 3.79-6.485 2.56-.15 4.59-2.186 4.59-4.672v-2.043c.008-2.471-2.007-4.507-4.552-4.664zM7.333 22.602H5.474c-1.709 0-3.097-1.33-3.097-2.965v-2.043c0-1.635 1.388-2.964 3.097-2.964h1.859v7.972zm12.201 9.685h-2.246c-.746 0-1.35-.578-1.35-1.293 0-.714.604-1.292 1.35-1.292h2.246c.747 0 1.351.578 1.351 1.292 0 .715-.604 1.293-1.35 1.293zM32.2 19.637c0 1.636-1.388 2.965-3.097 2.965h-1.859V14.63h1.859c1.709 0 3.097 1.329 3.097 2.964v2.043z" />
                    </svg>

                    <div class="qaynar text-white">
                        <p style="margin: 0; color: #999;">Qaynar xətt:</p>
                        <p style="font-weight: 900; color: #222;">(+99412) 555-66-77</p>
                    </div>
                </div>
                <form action="" class="d-flex" style="width: 500px;">
                    <input class="form-control search-input p-3 search" type="search" placeholder="AXTARIŞ SÖZÜ"
                           id="example-search-input2">
                    <a href="/category/all_" class="btn axtar text-uppercase p-1 d-flex align-items-center justify-content-center" id="search">axtar</a>
                </form>
                <div class="cart">
                    @if(isset($_COOKIE['cart']))<span class=" count">{{count($_COOKIE['cart'])}}</span>@endif
                    <a href="/cart"><img src="{{asset('img/shopping-basket.ico')}}" class="img-fluid ml-4 basket" alt=""></a>
                </div>
            </div>


        </div>


        <!--Logo Saerch Area end-->

    </div>
    <div class="divider ">

    </div>
    <!--Second Nav Area start-->
    <div class="third_nav_main">
        <div class="container nav-2 h-100 third_nav">

            <div class="row h-100 justify-content-center align-items-center">

                <div class="col-md-3 col-lg-3 d-flex active justify-content-center menu_div align-items-cente remove_show" >
                    <div class="m-auto" style="width: 218px !important; height: 40px !important;">
                        <img src="{{asset('/img/menu.png')}}" class="img-fluid menu-icon" data-toggle="dropdown">
                        <a style="color: #fff;" class="dropdown-toggle product_catalog absolute_dd_a" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            MƏHSUL KATALOQU
                        </a>
                        <div class="dropdown-menu w-100 drop_menu absolute_dd" style="height: 1000% !important;" aria-labelledby="navbarDropdown2">
                            @foreach($filters as $key => $filter)
                                @if($key <= 3)
                                    <a class="dropdown-item" href="/category/{{$filter->filter}}">{{$filter->filter}}</a>
                                @endif
                            @endforeach

                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" style="background-color: #e81038; color: #fff;">Təyinatı üzrə</a>
                            @foreach($categories as $category)
                                @if(strpos($category->teyinat, '/') === false)
                                    <a class="dropdown-item" href="/category/{{$category->teyinat}}">{{$category->teyinat}}</a>
                                @else
                                    <a class="dropdown-item" href="/category/{{substr($category->teyinat, 0, strpos($category->teyinat, '/'))}}">{{$category->teyinat}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 row justify-content-between">
                    <a class=" nav-linkk col-md-3 col-lg-3 pl-0" href="/category/yag">
                        <div class=" text-center nav-items-2">
                            <span class=" nav-link-2" >YAĞ FİLTERLƏRİ</span>
                        </div>
                    </a>
                    <a class=" nav-linkk col-md-3 col-lg-3 pl-0" href="/category/hava">
                        <div class=" text-center nav-items-2">
                            <span class=" nav-link-2" style="margin-right: 12px;">HAVA FİLTERLƏRİ</span>
                        </div>
                    </a>
                    <a class=" nav-linkk col-md-3 col-lg-3 pl-0" href="/category/yanacaq">
                        <div class=" text-center nav-items-2">
                            <span class=" nav-link-2 " style="margin-right: 15px;" >YANACAQ FİLTERLƏRİ</span>
                        </div>
                    </a>
                    <a class=" nav-linkk col-md-3 col-lg-3 pl-0" href="/category/digər">
                        <div class=" text-center nav-items-2">
                            <span class="nav-link-2" style="margin-right: 15px;">DİGƏR FİLTERLƏR</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-1 col-lg-1 text-center language d-flex justify-content-between align-items-center langs">
                    <a class="nav-link-2 diller" href="">RU</a>
                    <span class="mx-1 slash">/</span>
                    <a class="nav-link-2 diller" href="">AZ</a>
                </div>
            </div>

        </div>
    </div>
    <!--Second Nav Area end-->
</header>

@yield('main')
<!--iNFO END-->
<!--SOCIAL START-->
<section class="social my-5" style="padding-top: 45px;padding-bottom: 45px; background-color: #e81038;">
    <div class="container  logo-area">
        <!--Logo Saerch Area start-->
        <div class="row h-100 justify-content-between align-items-center">
            <div class="col-md-5 my-2">
                <h5 class="pt-3 new">Yeniliklərə Abunə Ol</h5>
            </div>
            <div class="col-md-5 my-2 email_box">
                <form action="" class="d-flex">
                    <input style="font-size: 12px;" class="form-control search-input p-3 email" type="email" placeholder="Email ünvanınız..."
                           id="example-search-input2">
                    <button class="btn send  p-1 gonder">Göndər</button>
                </form>
            </div>
            <div class="col-md-2 my-2 ftr_logos">
                <div class="d-flex justify-content-between align-items-center we">
                    <h5 class="pt-3 new">Bizi İzləyin</h5>
                    <a href=""><i class="fab fa-facebook-square fa-2x fb"></i></a>
                    <a href=""><i class="fab fa-instagram fa-2x insta"></i></a>
                    <a href=""><i class="fab fa-youtube fa-2x yt"></i></a>
                    <a href=""><i class="fab fa-twitter fa-2x tw"></i></a>

                </div>
            </div>
        </div>
    </div>
</section>

<!--SOCIAL END-->

<!--Footer-->

<footer class="py-5" >
    <div class="container">
        <div class="row" style="padding-top: 30px;">
            <div class="col-md-6 my-2">
                <img src="{{asset('img/logofooter.png')}}" class="img-fluid asfil_img" alt="">
                <p class="info my-4">
                    All the lorem ipsum generators on the Internet tend to repeat
                    predefined chunks as necessary making the first true generator on
                    the Internet.
                </p>
                <div class="hotline d-flex align-items-center">
                    <img src="{{asset('img/shape.svg')}}" class="headphone" alt="">
                    <div class="number ml-2 d-flex align-items-start justify-content-around flex-column">
                        <p class="qaynar">Qaynar xətt:</p>
                        <h4 class="num">(+99412) 555-66-77</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6 my-2">
                <h4 class="ftr_hdr">
                    FİLTER NÖVLƏRİ
                </h4>
                <ul class="navbar-nav">
                    @foreach($filters as $key => $filter)
                        @if($key <= 3)
                            <li class="nav-item"><a class="ftr_txt" href="/category/{{$filter->filter}}">{{$filter->filter}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-md-2  my-2">
                <h4 class="ftr_hdr">
                    TƏYİNAT SAHƏSİ
                </h4>
                <ul class="navbar-nav" >

                    @foreach($categories as $category)
                        <li class="nav-item"><a class="ftr_txt" href="/category/{{$category->teyinat}}">{{$category->teyinat}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-2 col-6 my-2">
                <h4 class="ftr_hdr">
                    İSTEHSALÇI
                </h4>
                <ul class="navbar-nav">
                    <ul class="navbar-nav">
                        @foreach($producers as $key => $producer)
                            @if($key <= 5)
                                <li class="nav-item"><a class="ftr_txt" href="/category/{{$producer->istehsalci}}">{{$producer->istehsalci}}</a></li>
                            @endif
                        @endforeach
                    </ul>

                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('/js/jquery.rateyo.min.js')}}"></script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/slider.js')}}"></script>
<script src="{{asset('/js/slideYeniMehsullar.js')}}"></script>
<script src="{{asset('/js/clickable.js')}}"></script>
<script src="{{asset('/js/simple-rating.js')}}"></script>
<script src="{{asset('/js/brendSlide.js')}}"></script>
<script src="{{asset('js/toast.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jquery.rateyo.min.js')}}"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{asset('js/script2.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>


<script>
    $('.pro-qty').on('click' , '.dec' , function () {
        var newquantity1 = parseInt($('input[name=quantityvalue]').val()) - 1;
        if (newquantity1>0){
            $('input[name=quantityvalue]').val(newquantity1);
            $('.product-text .my-3').text(newquantity1 + ' ədəd');
        }
    })
    $('.pro-qty').on('click' , '.inc' , function () {
        var newquantity = parseInt($('input[name=quantityvalue]').val()) + 1
        $('input[name=quantityvalue]').val(newquantity);
        $('.product-text .my-3').text(newquantity + ' ədəd');

    })
    $('.buttons').on('click' , '.add-card-5' , function(){
        var id = $('input[name=id]').val();
        var say = $('input[name=quantityvalue]').val();
        var count = parseInt($('.cart .count').text());
        $.ajax({
            type: "POST",
            url: "/add_to_cart",
            data: {
                'id':id, 'say':say , "_token": "{{ csrf_token() }}"
            },
            success:function(response)
            {
                if(response.message == 'success')
                {
                    $('.card-holder .sebete').remove();
                    $('.card-holder').append('<button style="color: #8c8c8c"  class="btn addcard text-white ml-1 sebetde " >Səbətdə</button>');
                    if ($('.cart .count').length<1){
                        $('.cart').prepend('<span class=" count">1</span>')
                    }
                    else {
                        $('.cart .count').text(count + 1);
                    }
                    toastr.success('Məhsul səbətə əlavə olundu');
                }
            },
            error: function (request, error, response) {
                console.log('banan')
            }
        });
    })
</script>
<script>
    $('.buttonlar').on('click','.addcard-2', function (){
        var id = $(this).parents('.buttonlar').attr('id');
        $.ajax({
            type: "GET",
            url: "{{route('add_wishlist')}}",
            data: {
                'id':id, "_token": "{{ csrf_token() }}"
            },
            success:function(response)
            {
                if(response.message == 'success')
                {
                    toastr.success('Məhsul istək listinə əlavə olundu');
                }
            },
            error: function (request, error, response) {
                window.location.href = '/register'
                toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
            }
        })
    });

    $('.product-image').on('click','.heart', function (){
        var id = $(this).attr('id');
        $.ajax({
            type: "GET",
            url: "{{route('add_wishlist')}}",
            data: {
                'id':id, "_token": "{{ csrf_token() }}"
            },
            success:function(response)
            {
                if(response.message == 'success')
                {
                    toastr.success('Məhsul istək listinə əlavə olundu');
                }
            },
            error: function (request, error, response) {
                window.location.href = '/register'
                toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
            }
        })
    });
</script>
<script>
    function rate(){
        $(".rateYo1").rateYo({
            starWidth: "20px"
        });
    }
    $(".rateYo1").rateYo({
        starWidth: "20px"
    });
    var rating = 0;
    $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
        rating = data.rating;
    });
    $("#rateYo").rateYo("option", "fullStar", true);
    var normalFill = $("#rateYo").rateYo("option", "fullStar");
    $('.submit-review').click(function () {
        if (rating>0){
            $('.rateyo').append('<input type="hidden" name="rating" value="'+rating+'">');
        }
        var name = $('input[name=name]').val();
        var subject = $('textarea[name=subject]').val();
        var formData = new FormData($('#main_form')[0]);
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var output = (day<10 ? '0' : '') + day + '-' +
            (month<10 ? '0' : '') + month + '-' +d.getFullYear();
        $.ajax({
            type: "POST",
            url: "/add_comment",
            data: formData,
            cache:false,
            processData:false,
            contentType:false,
            success:function (response){
                if (response.message == 'success') {
                    toastr.success('Şərhiniz Əlavə olundu');
                    $('input[name=name]').val('');
                    $('input[name=email]').val('');
                    $('input[name=title]').val('');
                    $('textarea[name=subject]').val('');
                    $('.existing_comments').prepend('<div class="my-4">\n' +
                        '                                <h6 class="font-weight-bold font-size-18">'+name+'</h6>\n' +
                        '                                <div class="rateYo1" data-rateyo-read-only="true" data-rateyo-rating="'+rating+'"></div>\n' +
                        '                                <div class="date my-2">\n' +
                        '                                    <span class="font-weight-bolder font-size-17">'+output+'</span>\n' +
                        '                                </div>\n' +
                        '                                <div class="comment-body"  style="word-wrap: break-word">\n' +
                        '                                    <p class="text-muted font-size-14" >'+subject+'</p>\n' +
                        '                                </div>\n' +
                        '                            </div>\n' +
                        '                                <div class="divider-2"></div>')
                    rate();
                }
            },
            error: function (request, error, response) {
                toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
            }
        });
    })

</script>
<script>
    $('.my-5 .product').click(function () {
        var id =$(this).attr('id');
        $.ajax({
            type: "POST",
            url: "/add_cookie",
            data: {
                'id':id, "_token": "{{ csrf_token() }}"
            },
            success:function(response)
            {
                console.log(response.message);
            },
            error: function (request, error, response) {
                console.log('banan')
            }
        });
    });
    $('.my-3 .product-new').click(function () {
        var id =$(this).attr('id');
    })

    $('.product-image .delete_wish').on('click','.btn-danger',function () {
        var id =$(this).parents('.product').attr('id');
        var wish_product = $(this).parents('.product');

        $.ajax({
            type: "POST",
            url: "/delete_wish",
            data: {
                'id':id, "_token": "{{ csrf_token() }}"
            },
            success:function(response)
            {
                toastr.success('Məhsul istək listindən silindi');
                wish_product.remove();
                var count = 0
                $('.wishlist .product').each(function (){
                    count+=1;
                })
                if (count <= 0){
                    $('.wishlist').parents('.special-offers').html('<div class="wish">İstək listiniz boşdur!</div>');
                }
            },
            error: function (request, error, response) {
                toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
            }
        });
    });


    $('.d-flex').on('click','.axtar',function () {
        var name = $(this).parents('.d-flex').find('.search-input').val().trim();
        var _href = $("#search").attr("href");
        $("#search").attr("href", _href + ''+name+'');
    })

    $('.left-sidebar').on('click','.cat_btn', function (){
        $('#products').html('');
        $('#products').append('' +
            '<svg class="loader" version="1.1" xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">\n' +
            '    <path fill="#4468d6" d="M256.011 0c-12.852 0-23.273 10.42-23.273 23.273v93.091c0 12.854 10.421 23.274 23.273 23.274 12.853 0 23.272-10.421 23.272-23.274v-93.091c0-12.853-10.419-23.273-23.272-23.273z"></path>\n' +
            '    <path fill="#4468d6" opacity="0.4" d="M256.011 372.363c-12.852 0-23.273 10.421-23.273 23.272v93.091c0 12.853 10.421 23.274 23.273 23.274 12.853 0 23.272-10.421 23.272-23.274v-93.091c0-12.853-10.419-23.272-23.272-23.272z"></path>\n' +
            '    <path fill="#4468d6" opacity="0.8" d="M173.725 140.809l-65.826-65.828c-9.086-9.089-23.822-9.089-32.912 0-9.089 9.089-9.089 23.824 0 32.912l65.826 65.828c4.544 4.544 10.5 6.816 16.455 6.816s11.912-2.273 16.455-6.816c9.090-9.089 9.090-23.823 0.001-32.912z"></path>\n' +
            '    <path fill="#4468d6" opacity="0.1" d="M459.806 232.727h-46.546c-12.853 0-23.272 10.421-23.272 23.273 0 12.853 10.419 23.272 23.272 23.272h46.546c12.853 0 23.272-10.419 23.272-23.273 0-12.852-10.421-23.273-23.272-23.273z"></path>\n' +
            '    <path fill="#4468d6" opacity="0.3" d="M365.557 338.281c-9.087-9.089-23.823-9.087-32.913 0-9.088 9.089-9.087 23.823 0 32.913l65.828 65.825c4.544 4.544 10.502 6.817 16.457 6.817 5.957 0 11.913-2.274 16.455-6.817 9.089-9.089 9.089-23.825 0-32.913l-65.828-65.825z"></path>\n' +
            '    <path fill="#4468d6" opacity="0.6" d="M139.637 256c0-12.852-10.421-23.273-23.273-23.273h-93.091c-12.853 0-23.273 10.421-23.273 23.273 0 12.853 10.42 23.272 23.273 23.272h93.091c12.852 0 23.273-10.419 23.273-23.273z"></path>\n' +
            '    <path fill="#4468d6" opacity="0.5" d="M173.735 338.283c-9.087-9.089-23.825-9.089-32.912 0l-65.825 65.825c-9.089 9.087-9.089 23.825 0 32.913 4.544 4.544 10.501 6.815 16.457 6.815s11.913-2.271 16.455-6.815l65.825-65.825c9.089-9.087 9.089-23.822 0-32.911z"></path>\n' +
            '</svg>' +
        '');
        $('#pagination_links').remove();
        const appointment = [];
        const filter = [];
        const brand = [];
        $('.purposes .ticker input[type=checkbox]').each(function(){
            if ($(this).prop('checked') == true){
                appointment.push(''+$(this).parents('.ticker').find('label').attr('id').replace(/\s/g, '')+'');
            }
        });
        $('.typeoffilter .ticker input[type=checkbox]').each(function(){
            if ($(this).prop('checked') == true){
                filter.push(''+$(this).parents('.ticker').find('label').attr('id').replace(/\s/g, '')+'');
            }
        });
        $('.brendoffilter .ticker input[type=checkbox]').each(function(){
            if ($(this).prop('checked') == true){
                brand.push(''+$(this).parents('.ticker').find('label').attr('id').replace(/\s/g, '')+'');
            }
        });
        if(appointment.length == 0){
            $('.purposes .ticker input[type=checkbox]').each(function(){
                appointment.push(''+$(this).parents('.ticker').find('label').attr('id').replace(/\s/g, '')+'');
            });
        }
        if(filter.length == 0){
            $('.typeoffilter .ticker input[type=checkbox]').each(function(){
                filter.push(''+$(this).parents('.ticker').find('label').attr('id').replace(/\s/g, '')+'');
            });
        }
        if(brand.length == 0){
            $('.brendoffilter .ticker input[type=checkbox]').each(function(){
                brand.push(''+$(this).parents('.ticker').find('label').attr('id').replace(/\s/g, '')+'');
            });
        }
        var jsonappointment = JSON.stringify(appointment);
        var jsonfilter = JSON.stringify(filter);
        var jsonbrand = JSON.stringify(brand);
        $.ajax({
            type: "GET",
            url: "/category_filter",
            dataType: 'json',
            data: {
                'appointment': jsonappointment, 'filter': jsonfilter, 'brand': jsonbrand,  "_token": "{{ csrf_token() }}"
            },
            cache: false,
            success:function(response) {
                if (response.status == true) {
                    $('#products').html('');
                    response.cat_products.data.forEach(filter);
                    var say = response.cat_count;
                    function filter(item, index) {
                        var picture1 = item['sekil1'];
                        var picture2 = item['sekil2'];
                        var picture3 = item['sekil3'];
                        $('#products').append(`
                            <div class="col-md-4 my-3 prdct p-2" id=${item['id']} data-price="">
                                <div class="head-product" name="${item['status']}">
                                    <div class="product-image">
                                        <span id="discount${item['id']}" class="discount font-weight-bold p-1 mt-2 ml-3 font-weight-bold">${item['endirim']}% endirim</span>
                                        <a href="/single/${item['id']}">
                                            <img src="{{asset('images/${picture1}')}}" data-id="1"
                                                 class="img-fluid rounded-top main-img" alt="">
                                        </a>

                                        <span id="${item['id']}" class="special-border heart d-flex align-items-center justify-content-center font-size-10 " data-toggle="tooltip" data-placement="left" title="Seçilmişlər">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="19"
                                                 viewBox="0 0 22 19">
                                                <g fill="none" fill-rule="evenodd">
                                                    <g fill="#5B5B5B" fill-rule="nonzero">
                                                        <g>
                                                            <path
                                                                d="M10.208 17.833l-.36-.3C2.101 11.228 0 9.007 0 5.404 0 2.402 2.402 0 5.404 0c2.462 0 3.843 1.381 4.804 2.462C11.168 1.38 12.549 0 15.01 0c3.003 0 5.404 2.402 5.404 5.404 0 3.603-2.101 5.824-9.847 12.13l-.36.3zM5.404 1.201c-2.342 0-4.203 1.861-4.203 4.203 0 3.062 1.921 5.104 9.007 10.868 7.085-5.764 9.006-7.806 9.006-10.868 0-2.342-1.861-4.203-4.203-4.203-2.101 0-3.242 1.26-4.143 2.282l-.66.78-.66-.78C8.645 2.462 7.505 1.2 5.403 1.2z"
                                                                transform="translate(-930 -393) translate(930.45 393.652)" />
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>

                                        </span>

                                    </div>
                                </div>
                                <div class="bottom-product d-flex flex-column pt-3 justify-content-center">
                                    <a href="/single/${item['id']}"><h1>İstehsalçı: ${item['istehsalci']}</h1></a>
                                <p>
                                    Model: ${item['ad'].substring(0, 20)}
                                </p>
                                <div style="padding-left: 0;" data-rateyo-read-only="true" class="rating rateYo1"  data-rateyo-rating="${item['reytinq']}"></div>
                                <div id="endirimler${item['id']}" class="endirimler">
                                    <h6 class="font-weight-bold esl_qiymet" style="color: #e81038 !important; letter-spacing: 0;">
                                        ₼ ${item['qiymet']}
                                    </h6>
                                    <h6 class="font-weight-bold endirimli_qiymet" style="color: #e81038 !important; letter-spacing: 0;">
                                        ₼ <span class="qymt" style="font-size: 16px;">${(item['qiymet'])*(100-item['endirim'])/100}</span>
                                    </h6>
                                </div>
                                <h6 style="color: #e81038 !important; letter-spacing: 0;" id="price${item['id']}" class="font-weight-bold">₼ <span style="font-size: 16px;" class="qymt">${item['qiymet']}</span></h6>

                                {{--<div class="hover-image">--}}
                                {{--    <img data-id="1" id="image1${item['id']}" src="{{asset('images/${picture1}')}}" class="img-fluid clickeable-image active-image" alt="">--}}
                                {{--    <img data-id="1" id="image2${item['id']}" src="{{asset('images/${picture2}')}}" class="img-fluid clickeable-image" alt="">--}}
                                {{--    <img data-id="1" id="image3${item['id']}" src="{{asset('images/${picture3}')}}" class="img-fluid clickeable-image" alt="">--}}
                                {{--</div>--}}
                            </div>`
                        );
                        if (item['endirim'] == 0){
                            $('#discount'+item['id']+'').remove();
                        }
                        if (item['endirim'] > 0){
                            $('#price'+item['id']+'').remove();
                        }
                        else{
                            $('#endirimler'+item['id']+'').remove();
                        }
                        if (item['sekil1'] == 'default.png'){
                            $('#image1'+item['id']+'').remove();
                        }
                        if (item['sekil2'] == 'default.png'){
                            $('#image2'+item['id']+'').remove();
                        }
                        if (item['sekil3'] == 'default.png'){
                            $('#image3'+item['id']+'').remove();
                        }
                    }
                    if ($('#products').html() == ''){
                        $('#products').append('<div class="alca">Axtarışa uyğun nəticə tapılmadı!</div>');
                    }
                    if (say > 0){
                        $('.say').html('<h4 class="font-size-22 font-weight-bold">Filterlər ('+say+')</h4>')
                    }
                    else{
                        $('.say').html('');
                    }
                    rate();
                    $('.loader').remove()
                }
            }
        });
    });
</script>

<script>
    var csrf_token = "{{ csrf_token() }}";

    $('.showall').on('click' , '.show' , function() {
        $('.existing_comments').css('max-height' , 'max-content');
        $(this).remove();
        $('.showall').append('<p class="hide">Gizlət</p>');
    })
    $('.showall').on('click' , '.hide' , function() {
        $('.existing_comments').css('max-height' , '360px');
        $(this).remove();
        $('.showall').append('<p class="show">Hamısını göstər</p>');
    })


    $('.register').on('click', '#registration', function (){

        $('.categorytype').each(function(){
            if ($(this).prop('checked') == true){
                var category = $(this).attr('value');
                if (category == 'normal'){
                    var name = $('input[name=name]').val().trim();
                    var surname = $('input[name=surname]').val().trim();
                    var phone = $('input[name=phone]').val().trim();
                    var email = $('input[name=email]').val().trim();
                    var password = $('input[name=password]').val().trim();
                    console.log(email)
                    $.ajax({
                        type: "GET",
                        url: "{{route('add_user')}}",
                        data: {
                            'name':name, 'surname':surname, 'phone':phone, 'email':email, 'password':password, "_token": "{{ csrf_token() }}"
                        },
                        success:function(response)
                        {
                            if(response.message == 'success')
                            {
                                window.location.href = '/cabinet';
                            }
                        },
                        error: function (request, error, response) {
                            toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                        }
                    });
                }
                if (category == 'company'){
                    var name = $('input[name=name]').val().trim();
                    var surname = $('input[name=surname]').val().trim();
                    var phone = $('input[name=phone]').val().trim();
                    var email = $('input[name=email]').val().trim();
                    var password = $('input[name=password]').val().trim();
                    var company_name = $('input[name=company_name]').val().trim();
                    var company_address = $('input[name=company_address]').val().trim();
                    var company_voen = $('input[name=company_voen]').val().trim();
                    var company_leader = $('input[name=company_leader]').val().trim();
                    var company_leader_ns = $('input[name=company_leader_ns]').val().trim();

                    $.ajax({
                        type: "GET",
                        url: "{{route('add_company')}}",
                        data: {
                            'name':name, 'surname':surname, 'phone':phone, 'email':email, 'password':password, 'company_name':company_name, 'company_address':company_address, 'company_voen':company_voen, 'company_leader':company_leader, 'company_leader_ns':company_leader_ns, "_token": "{{ csrf_token() }}"
                        },
                        success:function(response)
                        {
                            if(response.message == 'success')
                            {
                                window.location.href = '/cabinet';
                            }
                        },
                        error: function (request, error, response) {
                            toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                        }
                    });
                }
                else if(category == 'agent'){
                    var name = $('input[name=name]').val().trim();
                    var surname = $('input[name=surname]').val().trim();
                    var phone = $('input[name=phone]').val().trim();
                    var email = $('input[name=email]').val().trim();
                    var password = $('input[name=password]').val().trim();
                    var agent_name = $('input[name=agent_name]').val().trim();
                    var agent_address = $('input[name=agent_address]').val().trim();
                    var agent_voen = $('input[name=agent_voen]').val().trim();
                    var agent_leader = $('input[name=agent_leader]').val().trim();
                    var agent_leader_ns = $('input[name=agent_leader_ns]').val().trim();
                    if(agent_leader == ''){
                        agent_leader = 'asfil';
                    }
                    if(agent_leader_ns == ''){
                        agent_leader_ns = 'asfil asfil';
                    }
                    var agent_bank = $('input[name=agent_bank]').val().trim();
                    var agent_h_account = $('input[name=agent_h_account]').val().trim();
                    var agent_m_account = $('input[name=agent_m_account]').val().trim();
                    var agent_cat = $('.teskilatlar option:selected').val().trim();

                    $.ajax({
                        type: "GET",
                        url: "{{route('add_agent')}}",
                        data: {
                            'name':name, 'surname':surname, 'phone':phone, 'email':email, 'password':password, 'agent_cat':agent_cat, 'agent_name':agent_name, 'agent_address':agent_address, 'agent_voen':agent_voen, 'agent_leader':agent_leader, 'agent_leader_ns':agent_leader_ns, 'agent_bank':agent_bank, 'agent_h_account':agent_h_account, 'agent_m_account':agent_m_account, "_token": "{{ csrf_token() }}"
                        },
                        success:function(response)
                        {
                            if(response.message == 'success')
                            {
                                window.location.href = '/cabinet';
                            }
                        },
                        error: function (request, error, response) {
                            toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                        }
                    })
                }
            }
        })
    });

    $('.register').on('click', '#update_user', function (){
        if ($('.company_id').length){
            var user_id = $('#update_user').attr('class');
            var company_id = $('.company_id').attr('id');
            var name = $('input[name=user_name]').val().trim();
            var surname = $('input[name=user_surname]').val().trim();
            var password = $('input[name=user_password]').val().trim();
            var company_name = $('.topzr input[name=company_name]').val().trim();
            var company_address = $('.topzr input[name=company_address]').val().trim();
            var company_voen = $('.topzr input[name=company_voen]').val().trim();
            var company_leader = $('.topzr input[name=company_leader]').val().trim();
            var company_leader_ns = $('.topzr input[name=company_leader_ns]').val().trim();

            $.ajax({
                type: "GET",
                url: "{{route('update_company')}}",
                data: {
                    'user_id':user_id, 'company_id':company_id, 'password':password,  'name':name, 'surname':surname, 'company_name':company_name, 'company_address':company_address, 'company_voen':company_voen, 'company_leader':company_leader, 'company_leader_ns':company_leader_ns, "_token": "{{ csrf_token() }}"
                },
                success:function(response)
                {
                    if(response.message == 'success')
                    {
                        toastr.success('Şirkət məlumatlarınız yeniləndi');
                    }
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }
            });
        }
        else if($('.agent_id').length){
            var user_id = $('#update_user').attr('class');
            var agent_id = $('input[name=agent_id]').val().trim();
            var name = $('input[name=user_name]').val().trim();
            var surname = $('input[name=user_surname]').val().trim();
            var password = $('input[name=user_password]').val().trim();
            var agent_name = $('.topzr input[name=agent_name]').val().trim();
            var agent_address = $('.topzr input[name=agent_address]').val().trim();
            var agent_voen = $('.topzr input[name=agent_voen]').val().trim();
            if ($('.topzr input[name=agent_leader]').length){
                var agent_leader = $('.topzr input[name=agent_leader]').val().trim();
            }
            if ($('.topzr input[name=agent_leader_ns]').length){
                var agent_leader_ns = $('.topzr input[name=agent_leader_ns]').val().trim();
            }
            var agent_bank = $('.topzr input[name=agent_bank]').val().trim();
            var agent_h_account = $('.topzr input[name=agent_h_account]').val().trim();
            var agent_m_account = $('.topzr input[name=agent_m_account]').val().trim();
            console.log(agent_id);
            $.ajax({
                type: "GET",
                url: "{{route('update_agent')}}",
                data: {
                    'user_id':user_id, 'agent_id':agent_id, 'name':name, 'password':password, 'surname':surname, 'agent_name':agent_name, 'agent_address':agent_address, 'agent_voen':agent_voen, 'agent_leader':agent_leader, 'agent_leader_ns':agent_leader_ns, 'agent_bank':agent_bank, 'agent_h_account':agent_h_account, 'agent_m_account':agent_m_account, "_token": "{{ csrf_token() }}"
                },
                success:function(response)
                {
                    if(response.message == 'success')
                    {
                        toastr.success('Agent məlumatlarınız yeniləndi');
                    }
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }
            })
        }
        else{
            var user_id = $('#update_user').attr('class');
            var name = $('input[name=user_name]').val().trim();
            var surname = $('input[name=user_surname]').val().trim();
            var password = $('input[name=user_password]').val().trim();
            $.ajax({
                type: "GET",
                url: "{{route('update_user')}}",
                data: {
                    'user_id':user_id, 'name':name, 'surname':surname, 'password':password, "_token": "{{ csrf_token() }}"
                },
                success:function(response)
                {
                    if(response.message == 'success')
                    {
                        toastr.success('İstifadəçi məlumatlarınız yeniləndi');
                    }
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }
            })
        }
    });
    $(document).on('click','.clickeable-image', function () {
        src= $(this).attr('src');
        var product = $(this).parents('.product');
        product.find( $('.main-img')).attr('src' , src);
        var productnew = $(this).parents('.product-new');
        productnew.find( $('.main-img')).attr('src' , src);
        var single = $(this).parents('.single_product');
        single.find( $('.single-img')).attr('src' , src);
        $('.active-image').removeClass('active-image');
        $(this).addClass('active-image');
    });

</script>
<script src="{{asset('js/toast.js')}}"></script>
<script>
    $('.iframe_link').on('click', function (){
        var src = $(this).attr('id');
        $('.iframe_main').attr('src',src);
    });
    $('#remove_show').on('click', function (){
        setTimeout(function (){ $('#remove_show').removeClass('show')} , 0);
    });
    $('.remove_show').on('click', function (){
        $('.remove_show').find('.m-auto').css('width','217px !important');
        $('.remove_show').find('.m-auto').css('height','40px !important');
    });
    $('.menu-icon').on('click', function (){
        setTimeout(function () {
            $('.absolute_dd').removeClass('mt_ml');
            $('.absolute_dd').addClass('ml_mt');
            // $('.absolute_dd').css('margin-left', '42px !important');
            // $('.absolute_dd').css('margin-top', '-5px !important');
        },0);
    });
    $('.absolute_dd_a').on('click', function (){
        setTimeout(function () {
            $('.absolute_dd').removeClass('ml_mt');
            $('.absolute_dd').addClass('mt_ml');
            // $('.absolute_dd').css('margin-left', '-10px !important');
            // $('.absolute_dd').css('margin-top', '0px !important');
        },0);
    });
</script>
<script src="{{asset('js/session.js')}}"></script>
</body>
</html>
