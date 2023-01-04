@extends('esas.index')
@section('main')
    <!--Product Detail start-->
    <section class="product-detail my-3" style="padding-top: 0px">
        @foreach($products as $product)
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-3 ml-1">
                    <a href="/">Ana səhifə</a>
                    <span> > </span>
                    <a href="/category/{{$product->filtr}}">{{$product->filtr}}</a>
                    <span> > </span>
                    <span>{{$product->ad}}</span>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-md-6 single_product">
                    <div class="fixed ">
                        <div class="head-product  head-product-bottom-radius">
                            <div class="product-image">
                                @if($product->endirim != 0)
                                    <span class="discount font-weight-bold p-2 font-size-14 mt-3 ml-3">{{$product->endirim}}% endirim</span>
                                @endif
                                    <img @if($product->sekil1 != 'default.png') src="{{asset('images/'.$product->sekil1.'')}}" @elseif($product->sekil2 != 'default.png') src="{{asset('images/'.$product->sekil2.'')}}" @elseif($product->sekil3 != 'default.png') src="{{asset('images/'.$product->sekil3.'')}}" @elseif($product->sekil1 == 'default.png' && $product->sekil2 == 'default.png' && $product->sekil3 == 'default.png') src="{{asset('images/default.png')}}" @endif data-id="1" class="img-fluid rounded-top single-img " alt="">
                            </div>
                        </div>
                        <div class="text-center pt-3 ">
{{--                            <div class="hover-image py-3">--}}
{{--                                @if($product->sekil1 != 'default.png')--}}
{{--                                    <img data-id="1" id="image1" src="{{asset('images/'.$product->sekil1.'')}}" class="img-fluid clickeable-image active-image" alt="">--}}
{{--                                @endif--}}
{{--                                    @if($product->sekil2 != 'default.png')--}}

{{--                                        <img data-id="1" id="image2" src="{{asset('images/'.$product->sekil2.'')}}" class="img-fluid clickeable-image" alt="">--}}
{{--                                    @endif--}}
{{--                                    @if($product->sekil3 != 'default.png')--}}
{{--                                        <img data-id="1" id="image3" src="{{asset('images/'.$product->sekil3.'')}}" class="img-fluid clickeable-image" alt="">--}}
{{--                                    @endif--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>

                <div class="pl-4 col-md-6">
                    <div class="item-cod">
                        <strong>SKU: </strong> <span class="text-muted">{{$product->ambar_kodu}}</span>
                        <div class="feedback d-flex my-3">
                            <div class="rateYo1" data-rateyo-read-only="true" data-rateyo-rating="{{$product->reytinq}}" ></div>
                            <div class="review mx-1 average">
                                <strong>{{$product->reytinq}}</strong>
                                <a href="#main_form">Write Review</a>
                            </div>

                        </div>

                    </div>
                    <h3 class=" my-2 font-weight-bold">{{$product->ad}}</h3>
                    <div class="category my-3">
                        <a href="/category/{{$product->istehsalci}}">{{$product->istehsalci}}</a>

                    </div>
                    <div class="part">
                        PART NUMBER: # <a href="">{{$product->istehsalci_kodu}}</a>
                    </div>
                    <div class="price my-3">
                        <div class="number">
                            {{$product->qiymet}}
                            <span class="currency">
                                ₼
                            </span>
                        </div>
                        @if( \Illuminate\Support\Facades\Auth::id() && \Illuminate\Support\Facades\Auth::user()->category=='agent')
                            <p>Diller qiyməti: {{$product->qiymet - $product->qiymet*15/100}} ₼</p>

                        @endif

                        <div class="product__details__quantity d-flex my-3 flex-sm-row flex-column ">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <span class="dec qtybtn">-</span>
                                        <input type="text" value="1" name="quantityvalue" class="quantityvalue">
                                    <span class="inc qtybtn">+</span>
                                </div>
                            </div>
                            <div class=" ml-3 card-holder">
                                @if(!isset($_COOKIE['cart'][$product->id]))
                                    <button class="btn addcard text-white ml-1 sebete" data-toggle="modal"
                                            data-target=".bd-example-modal-lg">
                                        Səbətə at
                                    </button>
                                @else
                                    <button style="color: #8c8c8c" class="btn addcard text-white ml-1 sebetde" >
                                        Səbətdə
                                    </button>
                                @endif
                            </div>



                            <div class="modal fade bd-example-modal-lg" style="overflow-y: hidden;" tabindex="-1" role="dialog"
                                 aria-hidden="true">

                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content ">
                                        <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">X</span>
                                            </button>

                                          </div>
                                          <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 mt-5 border-add">


                                                    <div class="title ml-5 pl-4 d-flex mt-2 mb-5">

                                                        <h3 class="ml-2 ">

                                                            Məhsul səbətə əlavə olundu</h3>
                                                    </div>

                                                    <div class=" mt-3 ml-3 d-flex justify-content-center align-items-center">
                                                        <div class="added-image  d-flex justify-content-center align-items-center">
                                                            <img src="{{asset('images/'.$product->sekil1.'')}}" class="img-fluid" alt="">
                                                        </div>

                                                    </div>
                                                    <div class="product-text text-center">
                                                        <h5 class="my-3"> </h5>
                                                    <h6>{{$product->ad}}</h6>
                                                    <span>₼{{$product->qiymet}}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-flex justify-content-center align-items-center">
                                                    <div class="text-center right-modal mt-2">
                                                        @if(isset($_COOKIE['cart']))
                                                        <h6>Kartınızda {{count($_COOKIE['cart'])}} məhsul var</h6>
                                                    <h5>CƏMİ MƏBLƏĞ: <span> manat</span></h5>
                                                        @endif
                                                    <div class="buttons">
                                                        <button class="btn mt-5 mb-3 add-card-5 text-white " data-toggle="modal" data-target=".bd-example-modal-lg">
                                                            Səbətə əlavə et
                                                        </button>
                                                        <a href="/" class="btn font-weight-bold font-size-14 addcard-4 d-flex justify-content-center align-items-center">
                                                            ALIŞ-VERİŞİ DAVAM ET
                                                        </a>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-2 buttonlar" id="{{$product->id}}">
                            <button class="btn font-weight-bold font-size-14 addcard-2  ">
                                İstək listinə əlavə et
                            </button>

                        </div>

                        <div class="checkout">
                            <h6 class="font-weight-bold " style="margin-top: 20px">Guaranteed Safe Checkout</h6>
                        </div>
                        <div class="payment-method mt-3 mb-5">
                            <img src="{{asset('/img/stripe.png')}}" class="img-fluid mr-1" alt="">
                            <img src="{{asset('/img/paypal.png')}}" class="img-fluid" alt="">
                        </div>
                        <div class="warranty my-5">
                            <a href="">Warranty details</a>
                        </div>

                        <div class="product-decription mb-3">
                            <h5 class="font-weight-bold features-head">Product details</h5>
                            <p style="word-wrap: break-word" class="text-muted description-text my-2">
                                {{$product->haqqinda}}
                            </p>
                        </div>

                        <div class="divider-2"></div>
                        <div class="divider-2 mb-3"></div>
                        <div class="reviews mt-4">
                            <h4 class="text-muted mb-3">Reviews</h4>
                            <h4 class="font-weight-bold mt-4">Customer reviews</h4>
                            <div class="feedback d-flex my-3">
                                <div class="review mx-1">
                                    <strong>{{count($comments)}} reviews</strong>
                                </div>
                                <div class="write-reveiew">
                                    <a href="#main_form">Write Review</a>
                                </div>
                                <div class="showall" style="margin-left: 100px; cursor: pointer; color: deepskyblue">
                                    <p style="height: 0 !important;" class="show">Hamısını göstər</p>
                                </div>
                            </div>
                        </div>
                        <div class="comments">
                            <div class="existing_comments">
                            @foreach($comments as $comment)
                                <div class="my-4">
                                    <h6 class="font-weight-bold font-size-18">{{$comment->ad}}</h6>
                                    <div class="rateYo1" data-rateyo-read-only="true" data-rateyo-rating="{{$comment->reytinq}}"></div>
                                    <div class="date my-2">
                                        <span class="font-weight-bolder font-size-17">{{date("d-m-Y", strtotime($comment->created_at))}}</span>
                                    </div>
                                    <div class="comment-body" style="word-wrap: break-word">
                                        <p class="text-muted font-size-14" >{{$comment->movzu}}</p>
                                    </div>
                                </div>
                                <div class="divider-2"></div>
                            @endforeach
                            </div>

                        <div class="write-review">
                            <h4 class="font-weight-bold">Write a review</h4>
                            <form id="main_form" class="">
                                @csrf
                                <div class="form-group">
                                    <input value="{{$product->id}}" name="id" type="hidden">
                                    <label for="Name" class="font-weight-bold">Name</label>
                                    <input type="text" name="name" class="form-control" id="Name"
                                        placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="font-weight-bold">Email</label>
                                    <input type="email"  class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="email" placeholder="Enter your email">

                                </div>
                                <div class="form-group">
                                    <label for="Name" class="font-weight-bold">Review Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        placeholder="Give your review a title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="font-weight-bold">Review
                                        body(1500)</label>
                                    <textarea class="form-control" name="subject" id="exampleFormControlTextarea1"
                                        placeholder="Write your comments here" rows="5"></textarea>
                                </div>
                                <h6 class="font-weight-bold">Rating</h6>
                                <div style="width: 600px; margin: 30px auto">
                                    <div id="rateYo" data-rating="3" class="rateyo"></div>
                                </div>
                            </form>
                            <button class="btn submit-review text-white mt-3">Submit review</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
        @endforeach
    </section>
    <!--Product Detail END-->

    <section class="social-media my-5">
        <div class="container ">
            <div class="row">
                <div class="col-md-12 text-center py-4">
                    <i class="fab fa-twitter-square fa-2x tw"></i>
                    <i class="fab fa-facebook-square fa-2x fb"></i>
                    <i class="fab fa-pinterest-square fa-2x pin"></i>
                    <i class="fab fa-linkedin fa-2x linkedin"></i>
                </div>
            </div>

        </div>
    </section>
    <!--SPECIAL offer START-->
    @if(isset($_COOKIE['products']))
        <section class="special-offers mt-5">
            <div class="container ">
                <div class="row  justify-content-between align-items-center">
                    <div class="col-md-9 col-12  special-bg special">
                        <div class="special-header d-flex h-100 justify-content-between  align-items-center special">
                            <div class="special-title ">
                                <h4 class="align-self-center pt-2 spec_offr">Öncə Baxdığınız <span style="font-weight: normal; font-size: 24px;">Məhsullar</span></h4>
                            </div>
                            <div style="width: 85%;margin-right: -13rem; height: 1px;background-color: #e1e1e1;"></div>
                        </div>
                    </div>
                    <div class=" my-2 d-flex justify-content-between align-items-center slider_links">
                        <div class="arrow-border  changeLeft  links">
                            <div class="left-arrow arrow">

                            </div>
                        </div>
                        <div class="arrow-border  changeRight links">
                            <div class="right-arrow arrow">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($cookie_products as $cookie_product)
                        @if($cookie_product->status == 1)
                            <div class="col-md-3 my-2 product p-2">
                                <div class="head-product" name="{{$cookie_product->status}}">
                                    <div class="product-image">
                                        @if($cookie_product->endirim > 0)
                                            <span class="discount font-weight-bold p-1 mt-2 ml-3 font-weight-bold">{{$cookie_product->endirim}}% endirim</span>
                                        @endif
                                        <a href="/single/{{$cookie_product->id}}">
                                            <img src="{{asset('images/'.$cookie_product->sekil1.'')}}" data-id="1"
                                                 class="img-fluid rounded-top main-img" alt="">
                                        </a>

                                        <span id="{{$cookie_product->id}}"
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
                                    <a href="/product"><h1>İstehsalçı: {{$cookie_product->istehsalci}}</h1></a>
                                    <p>
                                        Model: {{substr($cookie_product->ad, 0, 20)}}
                                    </p>
                                    <div style="padding-left: 0;" data-rateyo-read-only="true" class="rate_width rating mb-2 rateYo1"  data-rateyo-rating="{{$cookie_product->reytinq}}"></div>
                                    @if($cookie_product->endirim > 0)
                                        <div class="endirimler">
                                            <h6 class="font-weight-bold esl_qiymet" style="color: #e81038 !important; letter-spacing: 0;">
                                                ₼ {{$cookie_product->qiymet}}@if(strpos($cookie_product->qiymet,".") === false).00 @endif
                                            </h6>
                                            <h6 class="font-weight-bold endirimli_qiymet" style="color: #e81038 !important; letter-spacing: 0;">
                                                ₼ {{($cookie_product->qiymet)*(100-$cookie_product->endirim)/100}}
                                            </h6>
                                        </div>
                                    @else
                                        <h6 class="font-weight-bold" style="color: #e81038 !important; letter-spacing: 0;">
                                            ₼ {{$cookie_product->qiymet}}@if(strpos($cookie_product->qiymet,".") === false).00 @endif
                                        </h6>
                                    @endif

{{--                                    <div class="hover-image py-3">--}}
{{--                                        @if($cookie_product->sekil1 != 'default.png')--}}
{{--                                            <img data-id="1" id="image1" src="{{asset('images/'.$cookie_product->sekil1.'')}}" class="img-fluid clickeable-image active-image" alt="">--}}
{{--                                        @endif--}}
{{--                                        @if($cookie_product->sekil2 != 'default.png')--}}
{{--                                            <img data-id="1" id="image2" src="{{asset('images/'.$cookie_product->sekil2.'')}}" class="img-fluid clickeable-image" alt="">--}}
{{--                                        @endif--}}
{{--                                        @if($cookie_product->sekil3 != 'default.png')--}}
{{--                                            <img data-id="1" id="image3" src="{{asset('images/'.$cookie_product->sekil3.'')}}" class="img-fluid clickeable-image" alt="">--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
                                </div>

                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--SPECIAL offer END-->

    <!--ECOGARD  START-->


    <!--ECOGARD END-->

    <!--New Products Start-->


    <section class="new-products my-5">
        <div class="container h-100">
            <div class="row  h-100 justify-content-between align-items-center ">
                <div class="col-md-9 col-12  special-bg special">
                    <div class="special-header d-flex h-100 justify-content-between  align-items-center special">
                        <div class="special-title ">
                            <h4 class="align-self-center pt-2 spec_offr">Bu Kateqriyanın Ən Populyar <span style="font-weight: normal; font-size: 24px;">Məhsulları</span></h4>
                        </div>
                        <div style="width: 65%;margin-right: -13rem; height: 1px;background-color: #e1e1e1;"></div>
                    </div>
                </div>
                <div class=" my-2 d-flex justify-content-between align-items-center slider_links">
                    <div class="arrow-border  changeLeft  links">
                        <div class="left-arrow arrow">

                        </div>
                    </div>
                    <div class="arrow-border  changeRight links">
                        <div class="right-arrow arrow">

                        </div>
                    </div>

                </div>

            </div>

            <div class="row my-5 te">
                @foreach($category_products as $category_product)
                    @if($category_product->status == 1)
                        <div class="col-md-3 my-2 product-new p-2">
                            <div class="head-product" name="{{$category_product->status}}">
                                <div class="product-image">
                                    @if($category_product->endirim > 0)
                                        <span class="discount font-weight-bold p-1 mt-2 ml-3 font-weight-bold">{{$category_product->endirim}}% endirim</span>
                                    @endif
                                    <a href="/single/{{$category_product->id}}">
                                        <img src="{{asset('images/'.$category_product->sekil1.'')}}" data-id="1"
                                             class="img-fluid rounded-top main-img" alt="">
                                    </a>

                                    <span id="{{$category_product->id}}"
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
                                <a href="/single/{{$category_product->id}}"><h1>İstehsalçı: {{$category_product->istehsalci}}</h1></a>
                                <p>
                                    Model: {{substr($category_product->ad, 0, 20)}}
                                </p>
                                <div style="padding-left: 0;" data-rateyo-read-only="true" class="rate_width rating mb-2 rateYo1"  data-rateyo-rating="{{$category_product->reytinq}}"></div>
                                @if($category_product->endirim > 0)
                                    <div class="endirimler">
                                        <h6 class="font-weight-bold esl_qiymet" style="color: #e81038 !important; letter-spacing: 0;">
                                            ₼ {{$category_product->qiymet}}@if(strpos($category_product->qiymet,".") === false).00 @endif
                                        </h6>
                                        <h6 class="font-weight-bold endirimli_qiymet" style="color: #e81038 !important; letter-spacing: 0;">
                                            ₼ {{($category_product->qiymet)*(100-$category_product->endirim)/100}}
                                        </h6>
                                    </div>
                                @else
                                    <h6 class="font-weight-bold" style="color: #e81038 !important; letter-spacing: 0;">
                                        ₼ {{$category_product->qiymet}}@if(strpos($category_product->qiymet,".") === false).00 @endif
                                    </h6>
                                @endif

{{--                                <div class="hover-image py-3">--}}
{{--                                    @if($category_product->sekil1 != 'default.png')--}}
{{--                                        <img data-id="1" id="image1" src="{{asset('images/'.$category_product->sekil1.'')}}" class="img-fluid clickeable-image active-image" alt="">--}}
{{--                                    @endif--}}
{{--                                    @if($category_product->sekil2 != 'default.png')--}}
{{--                                        <img data-id="1" id="image2" src="{{asset('images/'.$category_product->sekil2.'')}}" class="img-fluid clickeable-image" alt="">--}}
{{--                                    @endif--}}
{{--                                    @if($category_product->sekil3 != 'default.png')--}}
{{--                                        <img data-id="1" id="image3" src="{{asset('images/'.$category_product->sekil3.'')}}" class="img-fluid clickeable-image" alt="">--}}
{{--                                    @endif--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!--New Products END-->
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
    <!--Brends START-->
{{--    <section class="brends my-4" style="padding-top: 50px">--}}
{{--        <div class="container h-100">--}}
{{--            <div class="row  h-100 justify-content-between align-items-center spec">--}}
{{--                <div class="col-md-9 col-12  special-bg special">--}}
{{--                    <div class="special-header d-flex h-100 justify-content-between  align-items-center special">--}}
{{--                        <div class="special-title ">--}}
{{--                            <h4 class="align-self-center pt-2 spec_offr" >Brendlər</h4>--}}
{{--                        </div>--}}
{{--                        <div style="width: 105%;margin-right: -13rem; height: 1px;background-color: #e1e1e1;"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="my-2 d-flex justify-content-between slider_links">--}}
{{--                    <div class="arrow-border changeLeft brendLeft links">--}}
{{--                        <div class="left-arrow arrow ">--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="arrow-border changeRight brendRight links">--}}
{{--                        <div class="right-arrow arrow">--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row h-100 justify-content-between my-4 align-items-center ">--}}
{{--                @foreach($producers as $producer)--}}
{{--                    @if($producer->id != 7)--}}
{{--                        <div class="col-md-2 col-12 hold-logo text-center">--}}
{{--                            <a href="category/{{$producer->istehsalci}}">--}}
{{--                                <img src="{{asset('images/'.$producer->sekil.'')}}" class="img-fluid" alt="">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <script>
        $(document).ready(function (){
            @if(isset($_COOKIE['cart']))
            var cemi = 0;
            @foreach($cart_products as $cart)
            var qiymet = {{$cart->qiymet}}
            parseInt(qiymet);
            cemi = cemi + qiymet;
            @endforeach
            $('.right-modal h5 span').prepend(cemi);
            @endif
        })
    </script>
@endsection
