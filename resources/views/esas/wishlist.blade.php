@extends('esas.index')
@section('main')

@if($wishlists->count() > 0)
    <section class="special-offers ">
        <div class="container ">
            <div class="row justify-content-between align-items-center spec">
                <div class="col-md-9 col-12  special-bg special">
                    <div class="special-header d-flex h-100 justify-content-between  align-items-center special">
                        <div class="special-title ">
                            <h4 class="align-self-center pt-2 spec_offr">İstək listi</h4>
                        </div>
                    </div>
                </div>
                <div class=" my-2 d-flex justify-content-between align-items-center slider_links">
                    <div class="arrow-border changeLeft rounded-circle links">
                        <div class="left-arrow arrow ">

                        </div>
                    </div>
                    <div class="arrow-border  changeRight rounded-circle links">
                        <div class="right-arrow arrow ">

                        </div>
                    </div>

                </div>
            </div>

            <div class="row my-5 text-center wishlist">


                @foreach($wishlists as $wishlist)
                    @if($wishlist->status == 1)
                            <div class="col-md-3 my-2 product p-2" id="{{$wishlist->id}}">
                                <div class="head-product  justify-content-center align-items-center">
                                    <div class="product-image">
                                        @if($wishlist->endirim > 0)
                                            <span class="discount font-weight-bold p-1 mt-2 ml-1">{{$wishlist->endirim}}% endirim</span>
                                        @endif
                                            <span class="delete_wish p-1 mt-2 ml-1 "><button class="btn btn-danger" style="margin-left: 180px"><i class="fa fa-trash"></i></button></span>
                                            <a href="single/{{$wishlist->prod_id}}">
                                                <img src="{{asset('images/'.$wishlist->sekil1.'')}}" data-id="1" class="img-fluid rounded-top main-img"
                                             alt="">
                                            </a>
                                    </div>
                                </div>
                                <div class="bottom-product text-center pt-3 ">
                                    <h1>{{$wishlist->istehsalci}}</h1>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div data-rateyo-read-only="true" class="rating mb-1 rateYo1"  data-rateyo-rating="{{$wishlist->reytinq}}"></div>
                                    </div>
                                    <p class="w-75 m-auto" style="overflow: hidden;max-height: 30px">
                                        {{$wishlist->ad}}
                                    </p>
                                    @if($wishlist->endirim > 0)
                                        <div class="endirimler mt-1 ">
                                            <h6 class="font-weight-bold esl_qiymet">
                                                ₼ {{$wishlist->qiymet}}
                                            </h6>
                                            <h6 class="font-weight-bold endirimli_qiymet">
                                                ₼ {{($wishlist->qiymet)*(100-$wishlist->endirim)/100}}
                                            </h6>
                                        </div>
                                    @else
                                        <h6 class="font-weight-bold ml-1">
                                            ₼ {{$wishlist->qiymet}}
                                        </h6>
                                    @endif

                                    <div class="hover-image py-3">
                                        @if($wishlist->sekil1 != 'default.png')
                                            <img data-id="1" id="image1" src="{{asset('images/'.$wishlist->sekil1.'')}}" class="img-fluid clickeable-image active-image" alt="">
                                        @endif
                                        @if($wishlist->sekil2 != 'default.png')
                                            <img data-id="1" id="image2" src="{{asset('images/'.$wishlist->sekil2.'')}}" class="img-fluid clickeable-image" alt="">
                                        @endif
                                        @if($wishlist->sekil3 != 'default.png')
                                            <img data-id="1" id="image3" src="{{asset('images/'.$wishlist->sekil3.'')}}" class="img-fluid clickeable-image" alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                    @endif
                @endforeach
            </div>

        </div>
    </section>
@else
    <div class="wish">İstək listiniz boşdur!</div>
@endif

@endsection
