@extends('esas.index')
@section('main')

<!--Slide start-->
<section class="slides">

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                @if(session()->exists('brand'))
                    @if(session()->get('brand') == '5')
                        <div class="img-fluid w-100 h-100 d-block" style="background-image: url('/img/asas1.jpg'); background-position: center;"></div>
                    @elseif(session()->get('brand') == '2')
                        <div class="img-fluid w-100 h-100 d-block" style="background-image: url('/img/donaldson1.jpg'); background-position: center;"></div>
                    @elseif(session()->get('brand') == '3')
                        <div class="img-fluid w-100 h-100 d-block" style="background-image: url('/img/fleet1.jpg'); background-position: center;"></div>
                    @else
                        <div class="img-fluid w-100 h-100 d-block" style="background-image: url('/img/fleet1.jpg'); background-position: center;"></div>
                    @endif
                @else
                    <div class="img-fluid w-100 h-100 d-block" style="background-image: url('/img/fleet1.jpg'); background-position: center;"></div>
                @endif
                <div class="carousel-caption d-none d-md-block">
                    <button style="margin-left: -864px;margin-top: -121px;" class="btn btn-primary order forget_session">SİFARİŞ ET</button>
                </div>
            </div>
{{--            <div class="carousel-item">--}}
{{--                <img src="./img/maxresdefault.jpg" class="img-fluid w-100 d-block" alt="...">--}}
{{--                <div class="carousel-caption d-none d-md-block">--}}
{{--                    <h5>Second slide label</h5>--}}
{{--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
{{--                    <button class="btn btn-primary order">SİFARİŞ ET</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="carousel-item">--}}
{{--                <img src="./img/green.jpg" class="img-fluid w-100 d-block" alt="...">--}}
{{--                <div class="carousel-caption d-none d-md-block">--}}
{{--                    <h5>Third slide label</h5>--}}
{{--                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>--}}
{{--                    <button class="btn btn-primary order">SİFARİŞ ET</button>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

    </div>
</section>
<!--Slide end-->

<!--WHat we offer-->

<section class="weoffer" style="margin-top: 2rem;">
    <div class="container offers" style="border: 1px solid #e6e6e6;">
        <div class="row justify-content-between">
            <div class="col-md-3  d-flex mt-3 justify-content-around offer">
                <img src="./img/transports.svg" class="img-flud" alt="">
                <div class="offer-text ml-1">
                    <h1 class="mt-2">Pulsuz Çatdırılma</h1>
                    <h2>yuxarı bütün sifarişlər</h2>
                </div>
            </div>
            <div class="h_line"></div>
            <div class="col-md-3 d-flex mt-3 justify-content-around offer">
                <img src="./img/transports.svg" class="img-flud" alt="">
                <div class="offer-text ml-1">
                    <h1 class="mt-2">Pulsuz Çatdırılma</h1>
                    <h2>yuxarı bütün sifarişlər</h2>
                </div>
            </div>
            <div class="col-md-3 d-flex mt-3 justify-content-around offer">
                <img src="./img/interface.svg" class="img-flud" alt="">
                <div class="offer-text ml-1">
                    <h1 class="mt-2">Pulsuz Çatdırılma</h1>
                    <h2>yuxarı bütün sifarişlər</h2>
                </div>
            </div>
            <div class="col-md-3 d-flex mt-3 justify-content-around offer">
                <img src="./img/edit-tools.svg" class="img-flud" alt="">
                <div class="offer-text ml-1">
                    <h1 class="mt-2">Pulsuz Çatdırılma</h1>
                    <h2> yuxarı bütün sifarişlər</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade modal_iframe" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal_iframe-dialog modal-dialog" role="document">
        <div class="modal_iframe-content modal-content">
            <button type="button" class="close absolute_times" data-dismiss="modal" aria-label="Close">
                <span data-dismiss="modal" aria-label="Close" class="btn btn-lg" style="font-size: 30px;float: right;" aria-hidden="true">&times;</span>
            </button>
            <div class="modal_iframe-body modal-body">
                <iframe style="border-radius: 5px;" class="iframe_main" width="100%" height="100%" src="" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>

<section class="ecogard" style="margin-top: 2rem; margin-bottom: 2rem;">
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

{{--<section class="ecogard" style="margin-top: 2rem; margin-bottom: 2rem;">--}}
{{--    <div class="container">--}}
{{--        <div class="row iframe_links">--}}
{{--            <div class="col-md-4  my-1 pro_imgs_d">--}}
{{--                <a class="iframe_link" data-toggle="modal" data-target="#exampleModalLong" id="http://www.asascatalog.com/">--}}
{{--                    <img src="./img/group-4@2x.png"  class="img-fluid pro_imgs" alt="">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-4 my-1 pro_imgs_d">--}}
{{--                <a class="iframe_link" data-toggle="modal" data-target="#exampleModalLong" id="https://shop.donaldson.com/store/en-az/home;jsessionid=0cJmqEoYvh9juqQ838mYhdgR4DypBiYnv52lh8WR.gdcplecatg01:store-server-1?_requestid=1906798">--}}
{{--                    <img src="./img/group-3@2x.jpg" class="img-fluid pro_imgs" alt="">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-4 my-1 pro_imgs_d">--}}
{{--                <a class="iframe_link" data-toggle="modal" data-target="#exampleModalLong" id="https://catalog.cumminsfiltration.com/catalog/CatalogSearch.do?_locale=en&_region=&_ga=2.15916214.1613751226.1611753614-214968612.1611753614">--}}
{{--                    <img src="./img/group@2x.jpg" class="img-fluid pro_imgs" alt="">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<section class="teyinat-saheleri my-5">
    <div class="container h-100 fltr">
        <div class="row my-4 justify-content-center align-items-center">
            <div class="col-md-12 text-center" style="padding-top: 40px;">
                <h1 class="teyinat-header ">TƏYİNƏT SAHƏSİ ÜZRƏ FİLTRLƏR</h1>
            </div>
        </div>
        <div class="appointment_box">
            <a href="/category/kənd">
                <div class="rgba">
                    <div class="rgba_inner">
                        <p>Təyinat</p>
                        <h3>Kənd təsərrüfatı</h3>
                        <button class="appointment_link">İndİ al</button>
                    </div>
                </div>
                <div class="app_box"></div>
            </a>
            <a href="/category/yük">
                <div class="rgba">
                    <div class="rgba_inner">
                        <p>Təyinat</p>
                        <h3>Yük texnikası</h3>
                        <button class="appointment_link">İndİ al</button>
                    </div>
                </div>
                <div class="app_box"></div>
            </a>
            <a href="/category/minik">
                <div class="rgba">
                    <div class="rgba_inner">
                        <p>Təyinat</p>
                        <h3>Minik avtomobilləri</h3>
                        <button class="appointment_link">İndİ al</button>
                    </div>
                </div>
                <div class="app_box"></div>
            </a>
            <a href="/category/dizel">
                <div class="rgba">
                    <div class="rgba_inner">
                        <p>Təyinat</p>
                        <h3>Dizel/generator</h3>
                        <button class="appointment_link">İndİ al</button>
                    </div>
                </div>
                <div class="app_box"></div>
            </a>
            <a href="/category/tikinti">
                <div class="rgba">
                    <div class="rgba_inner">
                        <p>Təyinat</p>
                        <h3>Tikinti texnikası</h3>
                        <button class="appointment_link">İndİ al</button>
                    </div>
                </div>
                <div class="app_box"></div>
            </a>
            <a href="/category/digər">
                <div class="rgba">
                    <div class="rgba_inner">
                        <p>Təyinat</p>
                        <h3>Digər</h3>
                        <button class="appointment_link">İndİ al</button>
                    </div>
                </div>
                <div class="app_box"></div>
            </a>
        </div>
    </div>

</section>
<!--WHat we offer END-->
<!--SPECIAL offer START-->
@if($discount > 0)
    <section class="special-offers ">
        <div class="container ">
            <div class="row justify-content-between align-items-center spec">
                <div class="col-md-9 col-12  special-bg special">
                    <div class="special-header d-flex h-100 justify-content-between  align-items-center special">
                        <div class="special-title ">
                            <h4 class="align-self-center pt-2 spec_offr">Endirimli <span style="font-weight: normal; font-size: 24px;">Məhsullar</span></h4>
                        </div>
                        <div style="width: 90%;margin-right: -13rem; height: 1px;background-color: #e1e1e1;"></div>
                    </div>
                </div>
                <div class=" my-2 d-flex justify-content-between align-items-center slider_links">
                    <div class="arrow-border changeLeft links">
                        <div class="left-arrow arrow ">

                        </div>
                    </div>
                    <div class="arrow-border  changeRight links">
                        <div class="right-arrow arrow ">

                        </div>
                    </div>

                </div>
            </div>

            <div class="row my-5">


                @foreach($products as $product)
                    @if($product->status == 1)
                        @if($product->endirim > 0)
                            <a href="single/{{$product->id}}">
                            <div class="col-md-3 my-2 product  p-2" id="{{$product->id}}">
                                <div class="head-product  justify-content-center align-items-center">
                                    <div class="product-image " >
                                        <span class="discount font-weight-bold p-1 mt-2 ml-1">{{$product->endirim}}% endirim</span>
                                        <a href="/single/{{$product->id}}">
                                            <img src="{{asset('images/'.$product->sekil1.'')}}" data-id="1"  class="img-fluid rounded-top main-img"
                                                 alt="">
                                        </a>
                                        <span id="{{$product->id}}"
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
                                    <h1>İstehsalçı: {{$product->istehsalci}}</h1>
                                    <p>
                                        Model: {{substr($product->ad, 0, 20)}}
                                    </p>
                                    <div style="padding-left: 0;" data-rateyo-read-only="true" class="rate_width rating mb-3 rateYo1"  data-rateyo-rating="{{$product->reytinq}}"></div>
                                    <div class="endirimler">
                                        <h6 class="font-weight-bold esl_qiymet" style="color: #e81038 !important; letter-spacing: 0;">
                                            ₼ {{$product->qiymet}}@if(strpos($product->qiymet,".") === false).00 @endif
                                        </h6>
                                        <h6 class="font-weight-bold endirimli_qiymet" style="color: #e81038 !important; letter-spacing: 0;">
                                            ₼ {{($product->qiymet)*(100-$product->endirim)/100}}
                                        </h6>
                                    </div>

{{--                                    <div class="hover-image py-3">--}}
{{--                                        @if($product->sekil1 != 'default.png')--}}
{{--                                                <img data-id="1" id="image1" src="{{asset('images/'.$product->sekil1.'')}}" class="img-fluid clickeable-image active-image" alt="">--}}
{{--                                        @endif--}}
{{--                                        @if($product->sekil2 != 'default.png')--}}
{{--                                                <img data-id="1" id="image2" src="{{asset('images/'.$product->sekil2.'')}}" class="img-fluid clickeable-image" alt="">--}}
{{--                                        @endif--}}
{{--                                        @if($product->sekil3 != 'default.png')--}}
{{--                                                <img data-id="1" id="image3" src="{{asset('images/'.$product->sekil3.'')}}" class="img-fluid clickeable-image" alt="">--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
                                </div>

                            </div>
                        @endif
                    @endif
                @endforeach
            </div>

        </div>
    </section>
@endif

<section class="new-products my-5">
    <div class="container h-100">
        <div class="row justify-content-between align-items-center spec">
            <div class="col-md-9 col-12  special-bg special">
                <div class="special-header d-flex h-100 justify-content-between  align-items-center special">
                    <div class="special-title ">
                        <h4 class="align-self-center pt-2 spec_offr">Yeni <span style="font-weight: normal; font-size: 24px;">Məhsullar</span></h4>
                    </div>
                    <div style="width: 95%;margin-right: -13rem; height: 1px;background-color: #e1e1e1;"></div>
                </div>
            </div>
            <div class="my-2 d-flex justify-content-between align-items-center slider_links">
                <div class="arrow-border changeLeft links">
                    <div class="left-arrow arrow new-left">

                    </div>
                </div>
                <div class="arrow-border changeRight links">
                    <div class="right-arrow arrow new-right">

                    </div>
                </div>

            </div>
        </div>

        <div class="row my-5 te]">

            @foreach($last_inserted_products as $last_inserted_product)
                @if($last_inserted_product->status == 1)
                    <a href="single/{{$last_inserted_product->id}}">
                    <div class="col-md-3 my-2 product-new p-2" id="{{$last_inserted_product->id}}">
                        <div class="head-product  justify-content-center align-items-center">
                            <div class="product-image">
                                @if($last_inserted_product->endirim > 0)
                                    <span class="discount font-weight-bold p-1 mt-2 ml-1">{{$last_inserted_product->endirim}}% endirim</span>
                                @endif
                                    <a href="single/{{$last_inserted_product->id}}">
                                        <img src="{{asset('images/'.$last_inserted_product->sekil1.'')}}" data-id="1" class="img-fluid rounded-top main-img">
                                    </a>
                                    <span id="{{$last_inserted_product->id}}"
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
                        <div class="bottom-product d-flex flex-column pt-3  justify-content-center">
                            <a href="single/{{$last_inserted_product->id}}"><h1>İstehsalçı: {{$last_inserted_product->istehsalci}}</h1></a>
                            <p>
                                Model: {{substr($last_inserted_product->ad, 0, 20)}}
                            </p>
                            <div style="padding-left: 0;" data-rateyo-read-only="true" class="rate_width rating mb-3 rateYo1"  data-rateyo-rating="{{$last_inserted_product->reytinq}}"></div>
                            @if($last_inserted_product->endirim > 0)
                                <div class="endirimler">
                                    <h6 class="font-weight-bold esl_qiymet" style="color: #e81038 !important; letter-spacing: 0;">
                                        ₼{{$last_inserted_product->qiymet}}@if(strpos($last_inserted_product->qiymet,".") === false).00 @endif
                                    </h6>
                                    <h6 class="font-weight-bold endirimli_qiymet" style="color: #e81038 !important; letter-spacing: 0;">
                                        ₼{{($last_inserted_product->qiymet)*(100-$last_inserted_product->endirim)/100}}
                                    </h6>
                                </div>
                            @else
                                <h6 class="font-weight-bold" style="color: #e81038 !important; letter-spacing: 0;">
                                    ₼{{$last_inserted_product->qiymet}}@if(strpos($last_inserted_product->qiymet,".") === false).00 @endif
                                </h6>
                            @endif

{{--                            <div class="hover-image py-3">--}}
{{--                                @if($last_inserted_product->sekil1 != 'default.png')--}}
{{--                                    <img data-id="1" id="image1" src="{{asset('images/'.$last_inserted_product->sekil1.'')}}" class="img-fluid clickeable-image active-image" alt="">--}}
{{--                                @endif--}}
{{--                                @if($last_inserted_product->sekil2 != 'default.png')--}}
{{--                                    <img data-id="1" id="image2" src="{{asset('images/'.$last_inserted_product->sekil2.'')}}" class="img-fluid clickeable-image" alt="">--}}
{{--                                @endif--}}
{{--                                @if($last_inserted_product->sekil3 != 'default.png')--}}
{{--                                    <img data-id="1" id="image3" src="{{asset('images/'.$last_inserted_product->sekil3.'')}}" class="img-fluid clickeable-image" alt="">--}}
{{--                                @endif--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    </a>
                @endif
            @endforeach

        </div>
    </div>
</section>

<!--New Products END-->

<!--Brends START-->
<section class="brends my-4" style="padding-top: 50px">
    <div class="container h-100">
        <div class="row  h-100 justify-content-between align-items-center spec">
            <div class="col-md-9 col-12  special-bg special">
                <div class="special-header d-flex h-100 justify-content-between  align-items-center special">
                    <div class="special-title ">
                        <h4 class="align-self-center pt-2 spec_offr" >Brendlər</h4>
                    </div>
                    <div style="width: 105%;margin-right: -13rem; height: 1px;background-color: #e1e1e1;"></div>
                </div>
            </div>
            <div class="my-2 d-flex justify-content-between slider_links">
                <div class="arrow-border changeLeft brendLeft links">
                    <div class="left-arrow arrow ">

                    </div>
                </div>
                <div class="arrow-border changeRight brendRight links">
                    <div class="right-arrow arrow">

                    </div>
                </div>

            </div>
        </div>
{{--        <div class="row h-100 justify-content-between my-4 align-items-center ">--}}
{{--            @foreach($producers as $producer)--}}
{{--                @if($producer->id != 7)--}}
{{--                    <div class="col-md-2 col-12 hold-logo text-center">--}}
{{--                        <a href="category/{{$producer->istehsalci}}">--}}
{{--                        <img src="{{asset('images/'.$producer->sekil.'')}}" class="img-fluid" alt="">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            @endforeach--}}
{{--        </div>--}}
    </div>
</section>

<section class="ecogard mg-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 advs">
                <a href="/adv1" class="adv_img">
                    <img src="./temp/first_image.png" alt="">
                </a>
            </div>
            <div class="col-md-4 advs">
                <a href="/adv2" class="adv_imgs">
                    <img src="./temp/second1_image.png" alt="">
                </a>
                <a href="/adv3" class="adv_imgs">
                    <img src="./temp/second2_image.png" alt="">
                </a>
            </div>
            <div class="col-md-4 advs">
                <a href="/adv4" class="adv_img">
                    <img src="./temp/third_image.jpg" alt="">
                </a>
            </div>
        </div>
    </div>
</section>

@if(!empty($news))
    <h3 class="news_header">Xəbərlər</h3>
    <div class="container news">
        @foreach($news as $new)
            <div class="news_box">
                <a style="width: 100%; overflow: hidden;" href="/new/{{$new->id}}">
                    <div style="background-image: url('../images/{{$new->image}}');" class="news_image"></div>
                </a>
                <a href="/new/{{$new->id}}">{{$new->header}}</a>
                <p>{{date("d.m.Y", strtotime($new->created_at))}}</p>
            </div>
        @endforeach
    </div>
@endif
<section class="info">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h6 class="asfil">AsFil filterlər internet-mağazası</h6>
                <p>
                    Motorlu tikintinin inkişafı həm sıx bağlı idi, həm də yanacaq-sürtkü materialları kimyası
                    sahəsində irəliləyiş əhəmiyyətli dərəcədə müəyyən edilirdi, eyni zamanda, sürtkü yağlarının yeni
                    növlərinin daha yüksək istismar keyfiyyətlərinə malik olması onların təmizlənməsi sisteminin
                    təkmilləşdirilməsini tələb edirdi.

                </p>
                <p>
                <p>
                    Mühərrikin şəfəqində və avtomobillərdə yağ filterləri quraşdırılmamışdır. İlk avtomobil yağı
                    filtri 1923-cü ildə Ernest Svitlend və Corc H. Ginhald tərəfindən təklif edilmiş və Purolator
                    ticarət markası altında patentləşdirilmişdir. Bu filtr tamamlanmamışdır: filtr vasitəsilə yağın
                    yalnız kiçik bir hissəsi axdı, nasosdan mühərrik yağının əsas həcmi isə yağ magistralına
                    filtrasiya olmadan birbaşa daxil oldu. İyirmi il sonra ilk tam dəqiqliyə malik filtr meydana
                    gəldi, hansında ki, bütün yağ, mühərrikə düşməzdən əvvəl filtrasiya proseduru keçirilirdi.
                    Serial maşınlarında onların birincilərindən biri 1940-cı illərin sonunda Chrysler firmasını
                    quraşdırmağa başladı. Buna baxmayaraq, 1950-ci illərin ortalarına qədər yağ filtri bir çox
                    avtomobillərdə əlavə ödəniş üçün təklif olunan avadanlıqla qalırdı: yağın çox qısa xidmət
                    müddəti təmizlənmədən keçməyə imkan verirdi, hesab edilirdi ki, filtr yalnız ağır istismar
                    şəraitində tələb olunur. Məsələn, Chevrolet 235 Blue Flame (1941-1962) — in sıravi altı
                    silindrli mühərriki Ford Flathead V8 (1932-1953) kimi heç vaxt ştat yağ filtri olmayıb-natamam
                    mühərrik yalnız əlavə ödəniş üçün təklif olunurdu.
                </p>
               <div id="text">
                   <p>
                       Onun üçün xarakterik olan ağır yol şəraiti olan SSRİ-də yağ təmizləmə sistemi kifayət qədər tez
                       avtomobilin ayrılmaz tərkib hissəsinə çevrilib. Belə ki, 100%-lik qaz-11 mühərrik yağının
                       təmizlənməsi ilə orijinal ikipilləli filtrasiya sistemi məhz qazda layihələndirilmişdir —
                       Amerika prototipi mühərrik yalnız neft magistralına paralel şəkildə qoşulmuş natamam dəqiq
                       təmizləmə filtrinə malik idi, belə ki, yağlama sistemində hər dövrədə yağın yalnız kiçik bir
                       hissəsinə məruz qalırdı. 1950-ci illərin sonlarına qədər işlənib hazırlanmış avtomobillərdə iki
                       pilləli filtrasiya ilə eyni sistemdən istifadə olunub.

                   </p>
                   <p>
                       Kobud təmizləmə filtri çubuqda yığılmış alternativ polad lövhələr və ulduzlardan ibarət idi,
                       hansı ki, tutacağa döndərilə bilərdi — belə filtr yalnız 120 mikron (0,12 mm) və daha çox ölçülü
                       hissəcikləri saxlayırdı. Filtrasiya lövhələrinin arasındakı boşluqlara hərəkətsiz təmizləyici
                       lövhələr daxil idi, bu lövhələr Xüsusi qulp vasitəsilə çatlardan çıxarılırdı və durulmaya
                       düşürdü — istismar üzrə bu prosedur təlimat səfərdən sonra hər gün həyata keçirilməsini tövsiyə
                       edirdi.
                   </p>
                   <p>
                       İncə təmizləmə filtri kobud təmizləmə filtri ilə paralel olaraq birləşdirilmişdir, filtr
                       kartonundan Dəyişkən bir element var idi, 5 mikron ölçüsü və daha az hissəcikləri yığdı. Onun
                       vasitəsilə yağın ümumi həcminin yalnız 10% - i keçirilirdi, özü də filtrasiyadan sonra yağ
                       magistralına göndərilmirdi, orada təmizlənməmiş Mühərrikin karterinə boşalılırdı.
                   </p>
                   <p>
                       Yağ dəyişdirilərkən yivli tıxacların fırlanması və filtrlərin korpuslarından boşaldılması tələb
                       olunurdu.
                   </p>
                   <p>
                       Belə ikipilləli təmizləmə sistemi (xarici avtomobillərdə isə incə təmizləmə natamam filtri) o
                       illərin yağlarının disperqasiya edən (ayıran) xüsusiyyətlərə malik olmadığından istifadə
                       edilirdi ki, onlarda çirklənmə iri asfalt — qatranlılara tez bir zamanda yapışıb, nazik
                       təmizləmənin istənilən filtresini tez vura bilir (məhz buna görə də tam dəqiqləşdirilmiş kobud
                       təmizləmənin filtrində filtr lövhələrin təmizlənməsi üçün dayaq var idi). İncə təmizləmə
                       filtrinin xidmət müddətini artırmaq, eləcə də onun aşağı ötürücülük qabiliyyətini artırmaq üçün
                       onun vasitəsilə yağ axını təmizləmənin keyfiyyətini qurban verərək süni şəkildə
                       məhdudlaşdırılmalı idi.
                   </p>
               </div>

                <div class="text-right tam" id="toggle">
                    <span class="font-weight-bold oxu">&#8594;</span>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
