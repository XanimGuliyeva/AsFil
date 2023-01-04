@extends('esas.index')
@section('main')
    <!--Product Detail start-->
    <style>
        .loader {
            position: relative;
            margin-top: 150px;
            margin-bottom: 150px;
            left: 43%;
            right: 43%;
            animation: loader 800ms step-end infinite;
            width: 100px;
            height: 100px;
            transform: rotate(0deg);
        }
        .loader path {
            fill: #4468d6;
        }
        @keyframes loader {
            12.5% {
                transform: rotate(45deg);
            }
            25% {
                transform: rotate(90deg);
            }
            37.5% {
                transform: rotate(135deg);
            }
            50% {
                transform: rotate(180deg);
            }
            62.5% {
                transform: rotate(225deg);
            }
            75% {
                transform: rotate(270deg);
            }
            87.5% {
                transform: rotate(315deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <section class=" my-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-4 ml-1">
                    <a href="/">Home</a>
                    <span> > </span>
                    <span>{{$cat_type}}</span>
                </div>
            </div>

            <div class="row ">
                <div class="col-md-3 p-0 cat_div">
                    <div class="left-sidebar">

                    <div class="divider-2"></div>

                    <div class="purposes py-3">
                        <div class="use-purpose">
                            <h3 class="font-size-22 font-weight-bold">Təyinat sahəsi </h3>
                            <div class="divider-2" style="margin-top: 15px;margin-bottom: 15px"></div>
                        </div>
                        @foreach($category as $cat)
                            <div class="ticker">
                                <label class="container-tick font-size-17 active-category" id="{{$cat->id}}">{{$cat->teyinat}}
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="typeoffilter py-3">
                        <div class="use-purpose my-3">
                            <h3 class="font-size-22 font-weight-bold">Filtr növü </h3>
                            <div class="divider-2"></div>
                        </div>
                        @foreach($filters as $filter)
                            <div class="ticker">
                                <label class="container-tick font-size-17 active-category" id="{{$filter->id}}">{{$filter->filter}}
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="brendoffilter pt-3">
                        <div class="use-purpose my-3">
                            <h3 class="font-size-22 font-weight-bold">Brend </h3>
                            <div class="divider-2"></div>
                        </div>
                        @foreach($producers as $producer)
                            <div class="ticker">
                                <label class="container-tick font-size-17 active-category" id="{{$producer->id}}">{{$producer->istehsalci}}
                                    <input type="checkbox" @if($producer->id == session()->get('brand')) checked @endif>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                        <a class="btn btn-primary btn-lg cat_btn">Axtar</a>
                </div>
                </div>

                <div class="col-md-9" style="margin-top: 20px">
                    <div class="head-category d-flex justify-content-between flex-sm-row flex-column
                    ">
                        <div class="count say">
                            <h4 class="font-size-22 font-weight-bold">@if($cat_products->count() > 0) {{$cat_type}} ({{$cat_count}}) @endif</h4>
                        </div>


                        <div class="type d-flex justify-content-center align-items-center">
                            <span class="font-size-14 mr-2">Çeşidləmə:</span>
                            <div class="select-2">
                                <select class="minimal pl-4 form-control sira">
                                    <option  disabled selected hidden>Qiymətə görə</option>
                                    <option   value="artan">Artan sıra ilə</option>
                                    <option  value="azalan">Azalan sıra ilə</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="products" style="position: relative;">
                    @if(isset($cat_products))
                        @if($cat_products->count() > 0)
                            @foreach($cat_products as $cat_product)
                                @if($cat_product->status == 1)
                                    <div class="col-md-4 my-3 prdct  p-2" data-price="" id="{{$cat_product->id}}">
                                        <div class="head-product" name="{{$cat_product->status}}">
                                            <div class="product-image">
                                                @if($cat_product->endirim > 0)
                                                <span class="discount font-weight-bold p-1 mt-2 ml-3 font-weight-bold">{{$cat_product->endirim}}% endirim</span>
                                                @endif
                                                    <a href="/single/{{$cat_product->id}}">
                                                        <img src="{{asset('images/'.$cat_product->sekil1.'')}}" data-id="1"
                                                             class="img-fluid rounded-top main-img" alt="">
                                                    </a>

                                                <span id="{{$cat_product->id}}"
                                                    class="special-border heart d-flex align-items-center justify-content-center font-size-10 "
                                                    data-toggle="tooltip" data-placement="left" title="Seçilmişlər">
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
                                            <a href="/single/{{$cat_product->id}}"><h1>İstehsalçı: {{$cat_product->istehsalci}}</h1></a>
                                            <p>
                                                Model: {{substr($cat_product->ad, 0, 20)}}
                                            </p>
                                            <div style="padding-left: 0;" data-rateyo-read-only="true" class="rating mb-3 rateYo1"  data-rateyo-rating="{{$cat_product->reytinq}}"></div>
                                            @if($cat_product->endirim > 0)
                                                <div class="endirimler">
                                                    <h6 class="font-weight-bold esl_qiymet" style="color: #e81038 !important; letter-spacing: 0;">
                                                        ₼ {{$cat_product->qiymet}}@if(strpos($cat_product->qiymet,".") === false).00 @endif
                                                    </h6>
                                                    <h6 class="font-weight-bold endirimli_qiymet" style="color: #e81038 !important; letter-spacing: 0;">
                                                        ₼ <span class="qymt" style="font-size: 16px;">{{($cat_product->qiymet)*(100-$cat_product->endirim)/100}}</span>
                                                    </h6>
                                                </div>
                                            @else
                                                <h6 class="font-weight-bold" style="color: #e81038 !important; letter-spacing: 0;">
                                                    ₼ <span class="qymt" style="font-size: 16px;">{{$cat_product->qiymet}}@if(strpos($cat_product->qiymet,".") === false).00 @endif</span>
                                                </h6>
                                            @endif

{{--                                            <div class="hover-image py-3">--}}
{{--                                                @if($cat_product->sekil1 != 'default.png')--}}
{{--                                                    <img data-id="1" id="image1" src="{{asset('images/'.$cat_product->sekil1.'')}}" class="img-fluid clickeable-image active-image" alt="">--}}
{{--                                                @endif--}}
{{--                                                @if($cat_product->sekil2 != 'default.png')--}}
{{--                                                    <img data-id="1" id="image2" src="{{asset('images/'.$cat_product->sekil2.'')}}" class="img-fluid clickeable-image" alt="">--}}
{{--                                                @endif--}}
{{--                                                @if($cat_product->sekil3 != 'default.png')--}}
{{--                                                    <img data-id="1" id="image3" src="{{asset('images/'.$cat_product->sekil3.'')}}" class="img-fluid clickeable-image" alt="">--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
                                        </div>

                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="alca">Axtarışa uyğun nəticə tapılmadı!</div>
                        @endif
                    @endif
                    </div>
                    @if(isset($cat_products))
                    <div class="col-md-12 d-flex justify-content-around my-5" id="pagination_links">
                        {{ $cat_products->links() }}
                    </div>
                    @endif
                    <div class="divider-2"></div>

                    <div class="additional-info mt-5 mb-3">
                        <h4 class="font-size-16 font-weight-bold">Yağ filtrləri harada istifadə olunur</h4>

                        <p class="font-size-13 ">Motorlu tikintinin inkişafı həm sıx bağlı idi, həm də yanacaq-sürtkü materialları kimyası
                            sahəsində irəliləyiş əhəmiyyətli dərəcədə müəyyən edilirdi, eyni zamanda, sürtkü yağlarının
                            yeni növlərinin daha yüksək istismar keyfiyyətlərinə malik olması onların təmizlənməsi
                            sisteminin təkmilləşdirilməsini tələb edirdi.

                           </p>
                        <p class="font-size-13 ">
                            Mühərrikin şəfəqində və avtomobillərdə yağ filterləri quraşdırılmamışdır. İlk avtomobil yağı
                            filtri 1923-cü ildə Ernest Svitlend və Corc H. Ginhald tərəfindən təklif edilmiş və
                            Purolator ticarət markası altında patentləşdirilmişdir. Bu filtr tamamlanmamışdır: filtr
                            vasitəsilə yağın yalnız kiçik bir hissəsi axdı, nasosdan mühərrik yağının əsas həcmi isə yağ
                            magistralına filtrasiya olmadan birbaşa daxil oldu. İyirmi il sonra ilk tam dəqiqliyə malik
                            filtr meydana gəldi, hansında ki, bütün yağ, mühərrikə düşməzdən əvvəl filtrasiya proseduru
                            keçirilirdi. Serial maşınlarında onların birincilərindən biri 1940-cı illərin sonunda
                            Chrysler firmasını quraşdırmağa başladı. Buna baxmayaraq, 1950-ci illərin ortalarına qədər
                            yağ filtri bir çox avtomobillərdə əlavə ödəniş üçün təklif olunan avadanlıqla qalırdı: yağın
                            çox qısa xidmət müddəti təmizlənmədən keçməyə imkan verirdi, hesab edilirdi ki, filtr yalnız
                            ağır istismar şəraitində tələb olunur. Məsələn, Chevrolet 235 Blue Flame (1941-1962) — in
                            sıravi altı silindrli mühərriki Ford Flathead V8 (1932-1953) kimi heç vaxt ştat yağ filtri
                            olmayıb-natamam mühərrik yalnız əlavə ödəniş üçün təklif olunurdu.

                        </p>

                        <p class="font-size-13 ">


                            Onun üçün xarakterik olan ağır yol şəraiti olan SSRİ-də yağ təmizləmə sistemi kifayət qədər
                            tez avtomobilin ayrılmaz tərkib hissəsinə çevrilib. Belə ki, 100%-lik qaz-11 mühərrik
                            yağının təmizlənməsi ilə orijinal ikipilləli filtrasiya sistemi məhz qazda
                            layihələndirilmişdir — Amerika prototipi mühərrik yalnız neft magistralına paralel şəkildə
                            qoşulmuş natamam dəqiq təmizləmə filtrinə malik idi, belə ki, yağlama sistemində hər dövrədə
                            yağın yalnız kiçik bir hissəsinə məruz qalırdı. 1950-ci illərin sonlarına qədər işlənib
                            hazırlanmış avtomobillərdə iki pilləli filtrasiya ilə eyni sistemdən istifadə olunub.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Product Detail END-->

    <!--SPECIAL offer START-->
    @if(isset($_COOKIE['products']))
    <section class="special-offers mt-5">
        <div class="container ">
            <div class="row  justify-content-between align-items-center spec">
                <div class="col-md-9 col-12  special-bg special">
                    <div class="special-header d-flex h-100 justify-content-between  align-items-center special">
                        <div class="special-title ">
                            <h4 class="align-self-center pt-2 font-weight-bold font-size-22">ÖNCƏ BAXDIQ</h4>
                        </div>
                    </div>
                </div>
                <div class=" my-2 d-flex justify-content-between align-items-center slider_links">
                    <div class="arrow-border-2  changeLeft rounded-circle  links">
                        <div class="left-arrow arrow border-white">

                        </div>
                    </div>
                    <div class="arrow-border-2  changeRight rounded-circle links">
                        <div class="right-arrow arrow border-white">

                        </div>
                    </div>

                </div>
            </div>

            <div class="row my-5 text-center ">
                @foreach($cookie_products as $cookie)
                    <div id="{{$cookie->id}}" class="col-md-3 my-2 product p-2">
                        <div class="head-product  justify-content-center align-items-center">
                            <div class="product-image">
                                @if($cookie->endirim > 0)
                                    <span class="discount font-weight-bold p-1 mt-2 ml-1">{{$cookie->endirim}}% endirim</span>
                                @endif
                                    <a href="/single/{{$cookie->id}}">
                                        <img src="{{asset('images/'.$cookie->sekil1.'')}}" data-id="1" class="img-fluid rounded-top main-img"
                                             alt="">
                                    </a>

                            </div>
                        </div>
                        <div class="bottom-product d-flex flex-column pt-3 justify-content-center">
                            <h1>İstehsalçı: {{$cookie->istehsalci}}</h1>
                            <p>
                                Model: {{substr($cookie->ad, 0, 20)}}
                            </p>
                            <div style="padding-left: 0;" data-rateyo-read-only="true" class="rating mb-3 rateYo1"  data-rateyo-rating="{{$cookie->reytinq}}"></div>
                            @if($cookie->endirim > 0)
                                <div class="endirimler">
                                    <h6 class="font-weight-bold esl_qiymet" style="color: #e81038 !important; letter-spacing: 0;">
                                        ₼ {{$cookie->qiymet}}@if(strpos($cookie->qiymet,".") === false).00 @endif
                                    </h6>
                                    <h6 class="font-weight-bold endirimli_qiymet" style="color: #e81038 !important; letter-spacing: 0;">
                                        ₼ {{($cookie->qiymet)*(100-$cookie->endirim)/100}}
                                    </h6>
                                </div>
                            @else
                                <h6 class="font-weight-bold" style="color: #e81038 !important; letter-spacing: 0;">
                                    ₼ {{$cookie->qiymet}}@if(strpos($cookie->qiymet,".") === false).00 @endif
                                </h6>
                            @endif

{{--                            <div class="hover-image py-3">--}}
{{--                                @if($cookie->sekil1 != 'default.png')--}}
{{--                                    <img data-id="1" id="image1" src="{{asset('images/'.$cookie->sekil1.'')}}" class="img-fluid clickeable-image active-image" alt="">--}}
{{--                                @endif--}}
{{--                                @if($cookie->sekil2 != 'default.png')--}}
{{--                                    <img data-id="1" id="image2" src="{{asset('images/'.$cookie->sekil2.'')}}" class="img-fluid clickeable-image" alt="">--}}
{{--                                @endif--}}
{{--                                @if($cookie->sekil3 != 'default.png')--}}
{{--                                    <img data-id="1" id="image3" src="{{asset('images/'.$cookie->sekil3.'')}}" class="img-fluid clickeable-image" alt="">--}}
{{--                                @endif--}}
{{--                            </div>--}}
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </section>
    @endif
    <!--SPECIAL offer END-->

    <!--ECOGARD  START-->
    <section class="ecogard">
        <div class="container">
            <div class="row">
                <div class="col-md-4  my-1">
                    <img src="./img/group-4@2x.png" class="img-fluid" alt="">
                </div>
                <div class="col-md-4 my-1">
                    <img src="./img/group-3@2x.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-md-4 my-1">
                    <img src="./img/group@2x.jpg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <!--ECOGARD END-->

    <!--New Products Start-->

@if(isset($cat_products))
    @if($cat_products->count() > 0)
    <section class="new-products my-5">
        <div class="container h-100">
            <div class="row  justify-content-between align-items-center spec">
                <div class="col-md-9 col-12  special-bg special">
                    <div class="special-header d-flex h-100 justify-content-between  align-items-center special">
                        <div class="special-title ">
                            <h4 class="align-self-center pt-2 spec_offr">BU KATEQORİYANIN ƏN POPULAR
                                MƏHSULLARI</h4>
                        </div>
                    </div>
                </div>
                <div class=" my-2 d-flex justify-content-between align-items-center slider_links">
                    <div class="arrow-border-2  changeLeft-2 rounded-circle links">
                        <div class="left-arrow arrow  border-white">

                        </div>
                    </div>
                    <div class="arrow-border-2  changeRight-2 rounded-circle links">
                        <div class="right-arrow arrow  border-white">

                        </div>
                    </div>

                </div>
            </div>

            <div class="row my-5 te">
                @foreach($cat_products as $cat)
                    <div id="{{$cat->id}}" class="col-md-3 my-2 product-new p-2">
                        <div class="head-product  justify-content-center align-items-center">
                            <div class="product-image ">
                                @if($cat->endirim > 0)
                                    <span class="discount font-weight-bold p-1 mt-2 ml-1">{{$cat->endirim}}% endirim</span>
                                @endif
                                <img src="{{asset('images/'.$cat->sekil1.'')}}" data-id="1" class="img-fluid rounded-top main-img"
                                     alt="">

                            </div>
                        </div>
                        <div class="bottom-product d-flex flex-column pt-3 justify-content-center">
                            <a href="/single/{{$cat->id}}"><h1>İstehsalçı: {{$cat->istehsalci}}</h1></a>
                            <p>
                                Model: {{substr($cat->ad, 0, 20)}}
                            </p>
                            <div style="padding-left: 0;" data-rateyo-read-only="true" class="rating mb-3 rateYo1"  data-rateyo-rating="{{$cat->reytinq}}"></div>
                            @if($cat->endirim > 0)
                                <div class="endirimler">
                                    <h6 class="font-weight-bold esl_qiymet" style="color: #e81038 !important; letter-spacing: 0;">
                                        ₼ {{$cat->qiymet}}@if(strpos($cat->qiymet,".") === false).00 @endif
                                    </h6>
                                    <h6 class="font-weight-bold endirimli_qiymet" style="color: #e81038 !important; letter-spacing: 0;">
                                        ₼ {{($cat->qiymet)*(100-$cat->endirim)/100}}
                                    </h6>
                                </div>
                            @else
                                <h6 class="font-weight-bold" style="color: #e81038 !important; letter-spacing: 0;">
                                    ₼ {{$cat->qiymet}}@if(strpos($cat->qiymet,".") === false).00 @endif
                                </h6>
                            @endif

{{--                            <div class="hover-image py-3">--}}
{{--                                @if($cat->sekil1 != 'default.png')--}}
{{--                                    <img data-id="1" id="image1" src="{{asset('images/'.$cat->sekil1.'')}}" class="img-fluid clickeable-image active-image" alt="">--}}
{{--                                @endif--}}
{{--                                @if($cat->sekil2 != 'default.png')--}}
{{--                                    <img data-id="1" id="image2" src="{{asset('images/'.$cat->sekil2.'')}}" class="img-fluid clickeable-image" alt="">--}}
{{--                                @endif--}}
{{--                                @if($cat->sekil3 != 'default.png')--}}
{{--                                    <img data-id="1" id="image3" src="{{asset('images/'.$cat->sekil3.'')}}" class="img-fluid clickeable-image" alt="">--}}
{{--                                @endif--}}
{{--                            </div>--}}
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endif
    <!--New Products END-->

{{--    <!--Brends START-->--}}
{{--    <section class="brends my-4" style="padding-top: 50px">--}}
{{--        <div class="container h-100">--}}
{{--            <div class="row  h-100 justify-content-between align-items-center spec">--}}
{{--                <div class="col-md-9 col-12  special-bg special">--}}
{{--                    <div class="special-header d-flex h-100 justify-content-between  align-items-center special">--}}
{{--                        <div class="special-title ">--}}
{{--                            <h4 class="align-self-center pt-2 spec_offr">BRENDLƏR</h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="my-2 d-flex justify-content-between slider_links">--}}
{{--                    <div class="arrow-border-2  changeLeft brendLeft rounded-circle links">--}}
{{--                        <div class="left-arrow arrow border-white">--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="arrow-border-2  changeRight brendRight rounded-circle links">--}}
{{--                        <div class="right-arrow arrow border-white">--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row h-100 justify-content-between my-4 align-items-center ">--}}
{{--                @foreach($producers as $producer)--}}
{{--                    @if($producer->id != 7)--}}
{{--                        <div class="col-md-2 col-12 hold-logo text-center">--}}
{{--                            <img src="{{asset('images/'.$producer->sekil.'')}}" class="img-fluid" alt="">--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <section class="ecogard" style="margin-top: 10rem; margin-bottom: 2rem;">
        <div class="container">
            <div class="row iframe_links">
                <div class="col-md-4  my-1 pro_imgs_d  add_session" id="5">
                    <a class="iframe_link">
                        <div class="img-fluid pro_imgs" style="background-image: url('/img/asas_route.png'); background-position: center; background-size: cover;"></div>
                    </a>
                </div>
                <div class="col-md-4 my-1 pro_imgs_d  add_session" id="2">
                    <a class="iframe_link">
                        <div class="img-fluid pro_imgs" style="background-image: url('/img/donaldson_route.png'); background-position: center; background-size: cover;"></div>
                    </a>
                </div>
                <div class="col-md-4 my-1 pro_imgs_d add_session" id="3">
                    <a class="iframe_link">
                        <div class="img-fluid pro_imgs" style="background-image: url('/img/fleetguard_route.png'); background-position: center; background-size: cover;"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <script>

        $(document).on("change", ".sira", function() {
            $('.prdct').each(function ()
            {
                var qiymet = $(this).find('.qymt').text().trim();
                $(this).attr('data-price' , qiymet);
                console.log(qiymet);
            })

            var sortingMethod = $(this).val();

            if(sortingMethod == 'artan')
            {
                sortProductsPriceAscending();
            }
            else if(sortingMethod == 'azalan')
            {
                sortProductsPriceDescending();
            }

        });
        function sortProductsPriceAscending()
        {
            var products = $('.prdct');
            products.sort(function(a, b){ return $(a).data("price")-$(b).data("price")});
            $("#products").html(products);
        }

        function sortProductsPriceDescending()
        {
            var products = $('.prdct');
            products.sort(function(a, b){ return $(b).data("price") - $(a).data("price")});
            $("#products").html(products);
        }
    </script>
@endsection
