@extends('esas.index')
@section('main')
    <!--Product Detail start-->



    <section class="cart my-3">
        @if(isset($_COOKIE['cart']))
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-3 ml-1">
                    <a href="">Home</a>
                    <span> > </span>
                    <a href="">FRAM Titanium</a>
                    <span> > </span>
                    <span>Titanium Spin-On Oil Filter</span>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-12 text-center">
                    <h6>SƏBƏTİNİZ</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="top col-md-12 col-lg-12  ">
                        <div class="row justify-content-between">
                            <div class="mehsul col-lg-4 col-md-4 pl-3" style="text-align: center">
                                <span>Məhsul</span>
                            </div>
                            <div class="qiymet col-lg-2 col-md-2" style="text-align: center">
                                <span>Qiymət</span>
                            </div>
                            <div class="say col-lg-2 col-md-2" style="text-align: center">
                                <span>Sayı</span>
                            </div>
                            <div class="cem col-lg-2 col-md-2" style="text-align: center">
                                <span>Cəmi</span>
                            </div>
                            <div class="legv col-lg-2 col-md-2" style="text-align: center">
                                <span>Ləğv</span>
                            </div>
                        </div>
                    </div>
                    <div class="cart-border my-3">

                    </div>
                    @foreach($products as $key =>$product)
                    <div class="body col-md-12 col-lg-12 row ">

                        <div class="product-side col-lg-4 col-md-4 d-flex justify-content-between align-items-center" style="text-align: center">
                            <div class=" d-flex ">
                                <div class="image ml-2 d-flex align-items-center">
                                    <img src="{{asset('images/'.$product->sekil1.'')}}" class="img-fluid p-2" alt="">
                                </div>

                                <div class="text d-flex justify-content-center align-items-center ml-4">
                                    <div class="hold-text">
                                        <h4>{{$product->ad}}</h4>
                                <a href="">{{$product->istehsalci}}</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="price-side col-lg-2 col-md-2 " style="padding-top: 45px;text-align: center">
                            <span class="amount">₼ <span class="qiymet1">{{$product->qiymet}}</span></span>
                        </div>
                        <div class="amount-side col-lg-2 col-md-2 " style="padding-top: 20px;text-align: center;margin-left: 10px">
                            <div class="product__details__quantity d-flex my-3 flex-sm-row flex-column ">
                                <div class="quantity">
                                    <div id="{{$product->id}}" class="pro-qty"><span class="dec qtybtn">-</span>
                                        <input type="text" name="quantity" value="{{$_COOKIE['cart'][$product->id]}}" class="quantityvalue qaunatity-black">
                                        <span class="inc qtybtn">+</span></div>
                                </div>

                            </div>
                        </div>
                        <div class="total-side col-lg-2 col-md-2" style="padding-top: 45px;text-align: center;margin-left: 20px">
                            <span class="amount">₼ <span class="cemi"></span></span>
                        </div>
                        <div class="cancel-side col-lg-1 col-md-1" style="padding-top: 45px;">
                            <div class="circle-close text-center" style="margin-left: 55px">
                                <span class="d-flex justify-content-center align-items-center" id="{{$product->id}}" style="cursor: pointer;">X</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="cart-border my-3">

                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12 total">
                    <div class="h-100 total-amount d-flex justify-content-end align-items-center">
                        <h4 class="mr-5">Cəmi:</h4>
                        <h4 class="mx-5">₼ <span class="general"></span></h4>
                    </div>
                </div>
            </div>
            <div class="row buttons my-5">
                <div class="col-md-12 text-center d-flex justify-content-around align-items-center flex-column">
                    <div class="purchase my-3">
                        <a href="/checkout" class="btn addcard-3 text-white ml-1 ">
                            ÖDƏ
                        </a>
                    </div>
                   <div class="continue">
                    <a href="/" class="btn font-weight-bold font-size-14 addcard-4 d-flex justify-content-center align-items-center">
                        ALIŞ-VERİŞİ DAVAM ET
                    </a>
                   </div>
                </div>
            </div>
            </div>
        @else
            <div class="wish">Səbətiniz boşdur!</div><div class="continue d-flex align-items-center justify-content-center"><a href="/" class="btn d-flex align-items-center justify-content-center font-weight-bold font-size-14 addcard-4">ALIŞ-VERİŞİ DAVAM ET</a></div>
            @endif
    </section>
    <script>
        function total(){
            $('.body').each(function(){
                var qiymet = $(this).find('.qiymet1').text();
                qiymet = parseFloat(qiymet);
                var say = $(this).find('.quantityvalue').val();
                say = parseInt(say);
                var cemi = say*qiymet;
                $(this).find('.cemi').text(cemi);
            });
        }
        function sum(){
            var sum = 0;
            $('.body').each(function(){
                var cemi = $(this).find('.cemi').text();
                cemi = parseFloat(cemi);
                sum = sum + cemi;
            });
            $('.general').text(sum);
        }
        $(document).ready(function (){
            total();
            sum();
        })
        $('.pro-qty').on('click' , '.dec' , function () {
            var div = $(this).parent('div');
            var id = div.attr('id');
            var input = div.children('input');
            var newquantity1 = parseInt(input.val()) - 1;
            if (newquantity1>0){
                input.val(newquantity1);
                total();
                sum();
                $.ajax({
                    type: "POST",
                    url: "/decrease",
                    data: {
                        'id':id ,'quantity':newquantity1, "_token": "{{ csrf_token() }}"
                    },
                    success:function(response)
                    {
                        if(response.message == 'success')
                        {
                            console.log('success');
                        }
                    }
                });
            }
            console.log(newquantity1)
        })

        $('.pro-qty').on('click' , '.inc' , function () {
            var div = $(this).parent('div');
            var input = div.children('input');
            var id = div.attr('id');
            var newquantity = parseInt(input.val()) + 1;
            input.val(newquantity);
            $.ajax({
                type: "POST",
                url: "/increase",
                data: {
                    'id':id ,'quantity':newquantity, "_token": "{{ csrf_token() }}"
                },
                success:function(response)
                {
                    if(response.message == 'success')
                    {
                        console.log('success');
                    }
                },
                error: function (request, error, response) {
                    console.log('banan')
                }
            });
            total();
            sum();
        })
        $('.circle-close').on('click' , 'span' , function (){
            var id = $(this).attr('id');
            var div = $(this).parents('.body');
            var count = $('.body').length;

            $.ajax({
                type: "POST",
                url: "/remove_cart",
                data: {
                    'id':id, "_token": "{{ csrf_token() }}"
                },
                success:function(response)
                {
                    if(response.message == 'success')
                    {
                        div.remove();
                        sum();
                        toastr.success('Məhsul səbətdən silindi');
                        $('.cart .count').text(count - 1);
                        if ($('.body').length==0){
                            $('.cart .container').html('<div class="wish">Səbətiniz boşdur!</div><div class="continue d-flex align-items-center justify-content-center"><a href="/" class="btn d-flex align-items-center justify-content-center font-weight-bold font-size-14 addcard-4">ALIŞ-VERİŞİ DAVAM ET</a></div>')
                            $('.cart .count').remove();
                        }
                    }
                },
                error: function (request, error, response) {
                    console.log('banan')
                }
            });
        })
    </script>
    <!--Product Detail END-->
@endsection
