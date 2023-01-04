@extends('esas.index')
@section('main')
    <!--Product Detail start-->

    <section class="cart my-3">
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
                    <h6 class="title-top">SƏBƏTİNİZ</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="top col-md-12 col-lg-12  ">
                        <div class="row justify-content-between">
                            <div class="mehsul col-lg-6 col-md-6 pl-3" style="text-align: center">
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
                        </div>
                    </div>
                    <div class="cart-border my-3">

                    </div>
                    @foreach($products as $key =>$product)
                        <div class="body mehsull d-flex justify-content-between align-items-center flex-sm-row flex-column">

                            <div class="product-side col-lg-6 col-md-6 d-flex justify-content-between align-items-center" style="text-align: center">
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
                            <div class="price-side col-lg-2 col-md-2 " style="text-align: center; padding-left: 0px">
                                <span class="amount">₼ <span class="qiymet1">{{$product->qiymet}}</span></span>
                            </div>
                            <div class="amount-side col-lg-2 col-md-2 " style="text-align: center;">
                                <div class="product__details__quantity d-flex my-3 flex-sm-row flex-column ">
                                    <div class="quantity">
                                        <div id="{{$product->id}}" class="pro-qty">
                                            <input disabled type="text" name="quantity" value="{{$_COOKIE['cart'][$product->id]}}" class="quantityvalue qaunatity-black">
                                            </div>
                                    </div>

                                </div>
                            </div>
                            <div class="total-side col-lg-2 col-md-2" style="text-align: center;">
                                <span class="amount">₼ <span class="cemi"></span></span>
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
            <div>
                <div class="col-md-12 text-center mt-5">
                    <div class="purchase my-3">
                        <a @if(\Illuminate\Support\Facades\Auth::guest()) href="#resmilesdirme" @else href="#unvan" @endif>
                            <button  class="btn addcard-3 text-white ml-1">
                                ÖDƏ
                            </button>
                        </a>
                    </div>
                    <div class="continue">
                        <a href="/">
                            <button class="btn font-weight-bold font-size-14 addcard-4">
                                ALIŞ-VERİŞİ DAVAM ET
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(\Illuminate\Support\Facades\Auth::guest())
    <section class="resmilesdirme mt-5 pt-5" id="resmilesdirme">
        <div class="container ">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h6 class="title-top">RƏSMLƏŞDİRMƏ</h6>
                </div>
            </div>
{{--            <div class="row mt-5 pt-3">--}}
{{--                <div class="col-md-12 d-flex checkboxes">--}}
{{--                    <div class="form-check  pl-5rem mr-5">--}}
{{--                        <input type="radio" id="exampleRadios" value="option1" name="radio" checked>--}}
{{--                        <label class="form-check-label label-first ml-3 mt-1" for="exampleRadios">--}}
{{--                            Qeydiyyatdan keçərək--}}
{{--                        </label>--}}
{{--                    </div>--}}

{{--                    <div class="form-check ml-4">--}}
{{--                        <input type="radio" id="exampleRadios1" value="option2" name="radio">--}}
{{--                        <label class="form-check-label label-second ml-3 mt-2" for="exampleRadios1 ">--}}
{{--                            Qeydiyyatsız almaq istəyirəm--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--            </div>--}}
            <div class="row my-5 cart-bg qeydiyyat">
                <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <div class="form-group mb-4">

                                    <input type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="ad" placeholder="Adınız">

                                </div>
                                <div class="form-group ">


                                    <input type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="nomre" placeholder="Telefon">

                                </div>
                            </div>
                            <div class="col-md-6 my-2">
                                <div class="form-group mb-4">


                                    <input type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="soyad" placeholder="Soyadınız">

                                </div>
                                <div class="form-group">


                                    <input type="email" class="form-control input pl-4" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="email" placeholder="Email">

                                </div>
                            </div>

                            <div class="col-md-12 text-center mt-5">
                                <a href="#unvan">
                                    <button class="btn addcard-3 text-white ml-1">
                                        İRƏLİ
                                    </button>
                                </a>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </section>
@endif

    <section class="resmilesdirme mt-5 pt-5" id="unvan">
        <div class="container ">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h6 class="title-top">ÇATDIRILACAQ ÜNVAN</h6>
                </div>
            </div>



            <div class="row my-5 cart-bg">
                <div class="col-md-12">
                        @if(isset($address))
                            <div class="row">
                                <div class="col-md-6 my-2">
                                    <div class="form-group mb-4">

                                        <input type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                               aria-describedby="emailHelp" name="unvan" placeholder="Ünvan (küçə, ev, mənzil)" value="{{$address->address}}">

                                    </div>
                                    <div class="form-group mb-4">

                                        <input type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                               aria-describedby="emailHelp" name="sexs" value="{{$address->reciever}}" placeholder="Təhvil alacaq şəxs S.A.">

                                    </div>

                                    <div class="form-group mb-4">

                                        <input type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                               value="{{$address->post_code}}"   aria-describedby="emailHelp" name="poct" placeholder="Post kodu">

                                    </div>
                                </div>
                                <div class="col-md-6 my-2">

                                    <div class="form-group mb-4">



                                        <div class="select d-flex " >
                                            <span class="arr"></span>
                                            <input type="hidden" name="city" value="{{$address->city}}">
                                            <select name="seher" class="pl-4 form-control seher">
                                                <option disabled value="" class="d-none" selected>Şəhər</option>
                                                <option value="Bakı">Bakı</option>
                                                <option value="Sumqayıt">Sumqayıt</option>
                                                <option value="Gəncə">Gəncə</option>
                                            </select>
                                        </div>

                                    </div>


                                    <div class="form-group mb-4">

                                        <div class="select justify-content-center">
                                            <span class="arr"></span>
                                            <input type="hidden" name="country" value="{{$address->country}}">
                                            <select name="olke" class="pl-4 olke form-control">
                                                <option disabled selected class="d-none" value="">Ölkə</option>
                                                <option value="Azərbaycan">Azərbaycan</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12 text-center mt-5">
                                    <a href="#odeme">
                                        <button class="btn addcard-3 text-white ml-1">
                                            İRƏLİ
                                        </button>
                                    </a>
                                </div>

                            </div>
                            @else
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <div class="form-group mb-4">

                                    <input type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="unvan" placeholder="Ünvan (küçə, ev, mənzil)">

                                </div>
                                <div class="form-group mb-4">


                                    <input type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="sexs" placeholder="Təhvil alacaq şəxs S.A.">

                                </div>

                                <div class="form-group mb-4">

                                    <input type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="poct" placeholder="Post kodu">

                                </div>
                            </div>
                            <div class="col-md-6 my-2">

                                <div class="form-group mb-4">



                                    <div class="select d-flex">
                                        <span class="arr"></span>
                                        <select class="pl-4 form-control seher">
                                            <option disabled selected value="" class="d-none">Şəhər</option>
                                            <option>Bakı</option>
                                            <option>Sumqayıt</option>
                                            <option>Gəncə</option>
                                        </select>
                                    </div>

                                </div>


                                <div class="form-group mb-4">



                                    <div class="select">
                                        <span class="arr"></span>
                                        <select class="pl-4 olke form-control">
                                            <option disabled selected value="" class="d-none">Ölkə</option>
                                            <option>Azərbaycan</option>
                                        </select>
                                    </div>

                                </div>
                            </div>




                            <div class="col-md-12 text-center mt-5">
                                <a href="#odeme">
                                    <button class="btn addcard-3 text-white ml-1">
                                        İRƏLİ
                                    </button>
                                </a>
                            </div>
                        </div>
                            @endif
                </div>
            </div>
        </div>
    </section>


    <section class="resmilesdirme mt-5 pt-5" id="odeme">
        <div class="container ">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h6 class="title-top">ÇATDIRILACAQ ÜNVAN</h6>
                </div>
            </div>

            <div class="row mt-5 pt-3">
                <div class="col-md-12 d-flex  pl-5rem pay justify-content-between">

                    <div class="form-check mr-5 d-flex justify-content-between align-items-center">
                        <input class="form-check-input" type="radio" name="odenis" id="exampleRadios1"
                            value="Nağd" checked>
                        <label class="form-check-label label-first ml-3 mt-1 label-first" for="exampleRadios1">
                            Nağd ödəmə
                        </label>
                    </div>
                    <div class="form-check mr-5 d-flex justify-content-between align-items-center">
                        <input class="form-check-input" type="radio" name="odenis" id="exampleRadios2"
                               value="Onlayn" >
                        <label class="form-check-label label-first ml-3 mt-1 " for="exampleRadios2">
                            Onlayn
                        </label>
                    </div>
                    <div class="form-check mr-5 d-flex justify-content-between align-items-center">
                        <input class="form-check-input" type="radio" name="odenis" id="exampleRadios3"
                            value="Paypal">
                        <label class="form-check-label label-first ml-3 mt-1 " for="exampleRadios3">

{{--                            <?xml version="1.0" encoding="iso-8859-1"?>--}}
{{--                            <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->--}}
                            <svg style="margin-top: -10px;margin-right: 5px;
" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                xml:space="preserve" width="33px" height="33px">
                                <g>
                                    <g>
                                        <path
                                            d="M409.713,38.624C385.842,11.584,342.642,0,287.377,0H126.993c-11.296,0-20.896,8.16-22.688,19.2L37.522,439.392
			c-1.312,8.288,5.152,15.776,13.6,15.776h99.008l24.864-156.48l-0.768,4.928c1.76-11.04,11.328-19.2,22.624-19.2h47.04
			c92.448,0,164.8-37.248,185.952-144.992c0.64-3.2,1.632-9.344,1.632-9.344C437.489,90.208,431.441,63.168,409.713,38.624z" />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M456.529,150.496c-22.976,106.08-96.288,162.208-212.64,162.208h-42.176L170.225,512h68.416
			c9.888,0,18.304-7.136,19.84-16.832l0.8-4.224l15.744-98.912l1.024-5.44c1.536-9.696,9.952-16.832,19.808-16.832h12.512
			c80.864,0,144.16-32.576,162.656-126.816C478.449,205.12,474.865,173.408,456.529,150.496z" />
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                            Paypal
                        </label>
                    </div>
                </div>


            </div>

            <div class="row my-5 cart-bg">
                <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <div class="form-group">
                                    <label class="label" for="exampleInputEmail1">Kart nömrəsi</label>
                                    <input type="text" placeholder="XXXX-XXXX-XXXX-XXXX" class="form-control input pl-4"
                                        id="exampleInputEmail1">

                                </div>

                                <div class="form-group d-flex justify-content-between flex-sm-row flex-column">

                                    <div class="left d-flex justify-content-between align-items-center">
                                        <div class="head">
                                            <label class="label" for="exampleInputEmail1">Etibarlıdır</label>
                                            <input type="text" placeholder="MM" class="form-control input mr-3 pl-4"
                                                id="exampleInputEmail1">
                                        </div>
                                        <div class="body mt-4">

                                            <input type="text" class="form-control input mt-2" id="exampleInputEmail1"
                                                placeholder="YY">
                                        </div>
                                    </div>
                                    <div class="right">
                                        <label class="label" for="exampleInputEmail1">CVV</label>
                                        <input type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                            placeholder="XXX">
                                    </div>
                                </div>
                                <div class="form-group mt-4">

                                    <input type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                        placeholder="Kart sahibi S.A.">

                                </div>
                            </div>
                            <div class="col-md-6 my-2 ">
                                <div class="tehlukesiz-holder d-flex  justify-content-center">
                                    <div class="tehlukesiz ">
                                        <h4 class="label">
                                            Təhlükəsiz onlayn ödəmə
                                        </h4>
                                        <div class="payment-methods">

<!--                                            --><?//xml version="1.0" encoding="UTF-8" standalone="no"?>
                                            <svg xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                xmlns:cc="http://creativecommons.org/ns#"
                                                xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg"
                                                version="1.1" id="svg10306" viewBox="0 0 500.00001 162.81594" height="50"
                                                width="50">
                                                <defs id="defs10308">
                                                    <clipPath id="clipPath10271" clipPathUnits="userSpaceOnUse">
                                                        <path id="path10273"
                                                            d="m 413.742,90.435 c -0.057,-4.494 4.005,-7.002 7.065,-8.493 3.144,-1.53 4.2,-2.511 4.188,-3.879 -0.024,-2.094 -2.508,-3.018 -4.833,-3.054 -4.056,-0.063 -6.414,1.095 -8.289,1.971 l -1.461,-6.837 c 1.881,-0.867 5.364,-1.623 8.976,-1.656 8.478,0 14.025,4.185 14.055,10.674 0.033,8.235 -11.391,8.691 -11.313,12.372 0.027,1.116 1.092,2.307 3.426,2.61 1.155,0.153 4.344,0.27 7.959,-1.395 l 1.419,6.615 c -1.944,0.708 -4.443,1.386 -7.554,1.386 -7.98,0 -13.593,-4.242 -13.638,-10.314 m 34.827,9.744 c -1.548,0 -2.853,-0.903 -3.435,-2.289 l -12.111,-28.917 8.472,0 1.686,4.659 10.353,0 0.978,-4.659 7.467,0 -6.516,31.206 -6.894,0 m 1.185,-8.43 2.445,-11.718 -6.696,0 4.251,11.718 m -46.284,8.43 -6.678,-31.206 8.073,0 6.675,31.206 -8.07,0 m -11.943,0 -8.403,-21.24 -3.399,18.06 c -0.399,2.016 -1.974,3.18 -3.723,3.18 l -13.737,0 -0.192,-0.906 c 2.82,-0.612 6.024,-1.599 7.965,-2.655 1.188,-0.645 1.527,-1.209 1.917,-2.742 l 6.438,-24.903 8.532,0 13.08,31.206 -8.478,0" />
                                                    </clipPath>
                                                    <linearGradient id="linearGradient10277" spreadMethod="pad"
                                                        gradientTransform="matrix(84.1995,31.0088,31.0088,-84.1995,19.512,-27.4192)"
                                                        gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0" x1="0">
                                                        <stop id="stop10279" offset="0"
                                                            style="stop-opacity:1;stop-color:#222357" />
                                                        <stop id="stop10281" offset="1"
                                                            style="stop-opacity:1;stop-color:#254aa5" />
                                                    </linearGradient>
                                                </defs>
                                                <metadata id="metadata10311">
                                                    <rdf:RDF>
                                                        <cc:Work rdf:about="">
                                                            <dc:format>image/svg+xml</dc:format>
                                                            <dc:type
                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                                            <dc:title></dc:title>
                                                        </cc:Work>
                                                    </rdf:RDF>
                                                </metadata>
                                                <g transform="translate(-333.70157,-536.42431)" id="layer1">
                                                    <g id="g10267"
                                                        transform="matrix(4.9846856,0,0,-4.9846856,-1470.1185,1039.6264)">
                                                        <g clip-path="url(#clipPath10271)" id="g10269">
                                                            <g transform="translate(351.611,96.896)" id="g10275">
                                                                <path id="path10283"
                                                                    style="fill:url(#linearGradient10277);fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                    d="M 0,0 98.437,36.252 120.831,-24.557 22.395,-60.809" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>




{{--                                            <?xml version="1.0" encoding="UTF-8" standalone="no"?>--}}
{{--                                            <!-- Created with Inkscape (http://www.inkscape.org/) -->--}}

                                            <svg xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                xmlns:cc="http://creativecommons.org/ns#"
                                                xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                                                xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" width="50"
                                                height="50" viewBox="0 0 726.00001 428.81382" id="svg2" version="1.1"
                                                inkscape:version="0.48.5 r10040" sodipodi:docname="mastercard1979.svg">
                                                <defs id="defs4" />
                                                <sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666"
                                                    borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2"
                                                    inkscape:zoom="0.5216835" inkscape:cx="-56.571982"
                                                    inkscape:cy="293.98156" inkscape:document-units="px"
                                                    inkscape:current-layer="layer1" showgrid="false"
                                                    inkscape:window-width="1366" inkscape:window-height="706"
                                                    inkscape:window-x="-8" inkscape:window-y="-8"
                                                    inkscape:window-maximized="1" inkscape:snap-global="false"
                                                    fit-margin-top="0" fit-margin-left="0" fit-margin-right="0"
                                                    fit-margin-bottom="0" />
                                                <metadata id="metadata7">
                                                    <rdf:RDF>
                                                        <cc:Work rdf:about="">
                                                            <dc:format>image/svg+xml</dc:format>
                                                            <dc:type
                                                                rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                                            <dc:title />
                                                        </cc:Work>
                                                    </rdf:RDF>
                                                </metadata>
                                                <g inkscape:label="Capa 1" inkscape:groupmode="layer" id="layer1"
                                                    transform="translate(-469.9492,-145.56025)">
                                                    <g id="g3102">
                                                        <g id="g3369"
                                                            transform="matrix(1.0071264,0,0,0.99512205,455.71579,-90.072937)">
                                                            <circle r="215.4579" cy="452.24612" cx="229.59059"
                                                                id="circle3371"
                                                                style="fill:#fc1010;fill-opacity:1;stroke:none"
                                                                sodipodi:cx="229.59059" sodipodi:cy="452.24612"
                                                                sodipodi:rx="215.4579" sodipodi:ry="215.4579"
                                                                d="m 445.04849,452.24612 c 0,118.99412 -96.46379,215.45791 -215.4579,215.45791 -118.99411,0 -215.4579,-96.46379 -215.4579,-215.45791 0,-118.99411 96.46379,-215.4579 215.4579,-215.4579 118.99411,0 215.4579,96.46379 215.4579,215.4579 z"
                                                                transform="matrix(0.97806889,0,0,1,0.30994553,0)" />
                                                            <circle r="215.4579"
                                                                style="fill:#cf7914;fill-opacity:1;stroke:none"
                                                                id="circle3373" cx="519.53766" cy="452.24612"
                                                                sodipodi:cx="519.53766" sodipodi:cy="452.24612"
                                                                sodipodi:rx="215.4579" sodipodi:ry="215.4579"
                                                                d="m 734.99556,452.24612 c 0,118.99412 -96.46379,215.45791 -215.4579,215.45791 -118.99411,0 -215.4579,-96.46379 -215.4579,-215.45791 0,-118.99411 96.46379,-215.4579 215.4579,-215.4579 118.99411,0 215.4579,96.46379 215.4579,215.4579 z"
                                                                transform="matrix(0.98276842,0,0,1,12.665137,0)" />
                                                            <path inkscape:connector-curvature="0"
                                                                style="fill:#aa0805;fill-opacity:1;stroke:none"
                                                                d="m 1007.0312,208.53125 c -13.63817,13.67989 -22.0937,32.60072 -22.0937,53.5 0,20.89909 8.45575,39.78888 22.0937,53.46875 C 1020.604,301.82013 1029,282.93034 1029,262.03125 c 0,-20.89928 -8.3957,-39.82011 -21.9688,-53.5 z"
                                                                transform="matrix(2.817228,0,0,2.8512127,-2463.3071,-294.825)"
                                                                id="path3375" />
                                                        </g>
                                                        <g id="g3081">
                                                            <g id="g3377"
                                                                transform="matrix(2.8373046,0,0,2.8373046,-2065.2445,-1055.3001)">
                                                                <g style="font-size:111.41083527px;font-style:normal;font-weight:normal;text-align:center;line-height:125%;letter-spacing:0px;word-spacing:0px;text-anchor:middle;fill:white;fill-opacity:1;stroke:none;font-family:Sans;-inkscape-font-specification:Sans"
                                                                    id="g3379"
                                                                    transform="matrix(0.40666475,0,0,0.39936681,875.50331,193.7368)">
                                                                    <path
                                                                        d="m 65.492168,714.55257 0,78.65605 18.048555,0 0,-30.97221 c -0.111411,-7.24171 -0.334232,-14.372 -0.445643,-21.5023 1.671162,5.34772 3.342325,10.80686 4.902077,15.93175 1.33693,4.12221 2.562449,7.91017 3.787968,11.69814 l 8.355815,24.84462 14.48341,0 c 1.67116,-4.90208 3.34232,-9.91557 5.01348,-14.81764 2.0054,-5.79337 4.01079,-11.69814 5.90478,-17.4915 2.22821,-6.90748 4.34502,-13.81495 6.46183,-20.72242 -0.22283,7.01888 -0.44565,14.14918 -0.44565,21.27947 l 0,31.75209 18.82843,0 0,-78.65605 -26.7386,0 c -1.33693,4.1222 -2.67386,8.35581 -4.1222,12.58942 -1.78257,5.68196 -3.78797,11.36391 -5.57054,17.15727 -2.1168,6.79606 -4.1222,13.48071 -6.01618,20.16536 -2.11681,-6.79606 -4.1222,-13.59212 -6.35042,-20.49959 -3.119505,-9.80415 -6.350419,-19.60831 -9.692744,-29.41246 l -26.404368,0 z"
                                                                        style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;letter-spacing:-5.68623877px;fill:white;font-family:Avant Garde BQ;-inkscape-font-specification:Avant Garde BQ Bold"
                                                                        id="path3381" inkscape:connector-curvature="0" />
                                                                    <path
                                                                        d="m 198.73524,736.72332 c -2.45104,-1.67116 -7.13029,-4.90207 -14.92905,-4.90207 -9.02428,0 -17.26868,4.45643 -22.72781,11.58672 -5.90478,8.02158 -6.57324,16.15458 -6.57324,19.71972 0,12.92366 7.13029,20.94524 10.58403,24.06474 7.01888,6.46183 13.92635,7.24171 17.71432,7.24171 8.91287,0 13.70353,-3.89938 16.60021,-6.01619 l 0,4.79067 17.49151,0 0,-60.16185 -18.15997,0 0,3.67655 z m -22.17076,36.09712 c -2.67386,-2.56245 -4.1222,-6.01619 -4.1222,-9.58134 0,-7.46452 6.1276,-13.70353 13.59212,-13.70353 7.57594,0 13.59213,6.1276 13.70354,13.59212 0,7.57594 -6.01619,13.59212 -13.59213,13.70354 -3.56514,0 -7.13029,-1.55976 -9.58133,-4.01079 z"
                                                                        style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;letter-spacing:-5.68623877px;fill:white;font-family:Avant Garde BQ;-inkscape-font-specification:Avant Garde BQ Bold"
                                                                        id="path3383" inkscape:connector-curvature="0" />
                                                                    <path
                                                                        d="m 266.4113,750.76109 c -0.11141,-0.89129 -0.11141,-3.23091 -1.00269,-5.79336 -1.67117,-5.1249 -7.1303,-13.03507 -20.61101,-13.03507 -8.35581,0 -17.04586,3.67656 -21.05665,11.47531 -0.89128,1.55976 -2.00539,4.23362 -2.00539,8.57864 0,2.22822 0.22282,7.46453 4.67925,11.92096 2.45104,2.33963 5.57055,4.1222 12.47802,5.90477 4.79066,1.22552 7.46452,1.55975 9.13569,3.56515 0.77987,1.11411 1.00269,2.33963 1.00269,2.89668 0,1.33693 -1.00269,4.67926 -5.01348,4.79067 -0.44565,0 -1.67117,-0.11141 -2.78528,-0.77988 -2.56244,-1.33693 -2.67386,-4.23361 -2.89668,-5.1249 l -18.27137,0 c 0.22282,1.33693 0.44564,4.56785 2.22821,7.91017 1.11411,2.22822 2.89668,4.23361 4.79067,5.79337 2.89668,2.45103 8.02158,5.68195 16.93445,5.68195 10.47261,0 16.4888,-4.56785 19.27407,-7.68735 4.56784,-4.90208 4.90208,-9.80415 4.90208,-12.58942 0,-5.45913 -1.89399,-9.91557 -6.46183,-13.14648 -4.01079,-3.00809 -7.79876,-3.89938 -12.47802,-5.01349 -3.56514,-1.0027 -5.90477,-1.67116 -7.2417,-2.56245 -1.22552,-0.89129 -2.00539,-2.22822 -2.00539,-3.89938 0,-2.45104 1.78257,-4.56784 4.34502,-4.56784 0.77987,0 1.67116,0.22282 2.33963,0.66846 1.89398,1.11411 2.22821,2.89668 2.45103,5.01349 l 17.26868,0 z"
                                                                        style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;letter-spacing:-5.68623877px;fill:white;font-family:Avant Garde BQ;-inkscape-font-specification:Avant Garde BQ Bold"
                                                                        id="path3385" inkscape:connector-curvature="0" />
                                                                    <path
                                                                        d="m 273.26052,714.55257 0,18.27138 -6.68465,0 0,14.03776 6.46183,0 0,46.34691 18.27137,0 0,-46.2355 7.79876,0 0,-14.03776 -7.68735,0 0,-18.38279 -18.15996,0 z"
                                                                        style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;letter-spacing:-5.68623877px;fill:white;font-family:Avant Garde BQ;-inkscape-font-specification:Avant Garde BQ Bold"
                                                                        id="path3387" inkscape:connector-curvature="0" />
                                                                    <path
                                                                        d="m 317.74467,756.10881 c 0.55706,-1.11411 1.11411,-2.11681 2.0054,-3.00809 0.22282,-0.33424 1.33693,-1.55975 2.67386,-2.33963 2.67386,-1.89398 5.45913,-2.78527 8.69004,-2.78527 8.57864,0 12.03237,5.45913 13.48071,8.13299 l -26.85001,0 z m 44.00728,13.14648 c 0.22282,-2.11681 0.44565,-4.1222 0.44565,-6.23901 0,-9.02428 -4.34503,-17.93714 -11.14109,-23.6191 -7.79876,-6.68465 -16.4888,-7.46452 -20.05395,-7.46452 -9.2471,0 -18.27138,4.23361 -24.17615,11.3639 -6.46183,7.79876 -7.2417,16.15458 -7.2417,19.94254 0,9.2471 4.34502,18.38279 11.3639,24.17615 7.91017,6.46183 16.4888,7.1303 20.27677,7.1303 11.58673,0 18.38279,-5.68195 21.50229,-8.80146 4.56785,-4.45643 6.1276,-8.35581 7.24171,-10.91826 l -18.60561,0 c -1.11411,1.11411 -1.55975,1.44834 -2.33963,1.89398 -2.1168,1.44835 -5.1249,2.11681 -7.79876,2.11681 -4.79066,0 -9.35851,-2.00539 -12.25519,-5.90477 -1.0027,-1.33693 -2.00539,-3.45374 -2.1168,-3.67656 l 44.89856,0 z"
                                                                        style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;letter-spacing:-5.68623877px;fill:white;font-family:Avant Garde BQ;-inkscape-font-specification:Avant Garde BQ Bold"
                                                                        id="path3389" inkscape:connector-curvature="0" />
                                                                    <path
                                                                        d="m 364.3251,733.15818 0,60.05044 18.15997,0 0,-33.53466 c 0.11141,-3.0081 0.44564,-4.23361 1.33693,-5.57055 2.78527,-4.23361 9.91556,-4.45643 10.47262,-4.45643 1.44834,-0.11141 2.56245,0.11141 3.78796,0.22282 l 0,-16.93444 c -2.33962,0 -8.35581,-0.44565 -13.70353,4.90207 -1.44834,1.44834 -2.78527,3.23092 -3.1195,3.67656 l 0,-8.35581 -16.93445,0 z"
                                                                        style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;letter-spacing:-5.68623877px;fill:white;font-family:Avant Garde BQ;-inkscape-font-specification:Avant Garde BQ Bold"
                                                                        id="path3391" inkscape:connector-curvature="0" />
                                                                    <path
                                                                        d="m 479.40819,743.96503 c -1.33693,-4.56785 -4.1222,-13.81494 -13.81495,-21.72511 -10.3612,-8.46723 -20.83382,-9.35851 -25.95872,-9.35851 -10.02698,0 -17.26868,3.45373 -20.49959,5.34772 -6.35042,3.78796 -20.38819,14.81764 -20.38819,36.20852 0,11.25249 4.23362,18.4942 6.79606,22.17075 4.01079,5.79337 14.59482,18.04856 34.53736,18.04856 4.56785,0 8.13299,-0.66847 9.80416,-1.11411 5.57054,-1.33693 18.15996,-6.23901 25.7359,-20.27677 1.22552,-2.33963 2.22822,-4.56785 3.89938,-9.69274 l -21.83652,0 c -1.22552,2.00539 -1.67117,2.67386 -2.45104,3.67655 -3.0081,3.56515 -7.35312,5.57055 -8.57864,6.01619 -1.33693,0.44564 -3.56514,1.11411 -6.79606,1.11411 -12.14378,0 -17.71432,-9.13569 -19.27407,-12.81225 -0.55706,-1.33693 -1.44834,-3.89938 -1.55975,-7.68735 0,-8.2444 4.67925,-15.70892 12.3666,-18.93984 1.44834,-0.66846 4.34502,-1.78257 8.46722,-1.78257 6.35042,0 12.03237,2.78527 15.82034,7.79876 0.66847,1.00269 1.33693,1.89398 1.89398,3.00809 l 21.83653,0 z"
                                                                        style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;letter-spacing:-5.68623877px;fill:white;font-family:Avant Garde BQ;-inkscape-font-specification:Avant Garde BQ Bold"
                                                                        id="path3393" inkscape:connector-curvature="0" />
                                                                    <path
                                                                        d="m 524.52703,736.72332 c -2.45104,-1.67116 -7.1303,-4.90207 -14.92906,-4.90207 -9.02427,0 -17.26868,4.45643 -22.72781,11.58672 -5.90477,8.02158 -6.57324,16.15458 -6.57324,19.71972 0,12.92366 7.1303,20.94524 10.58403,24.06474 7.01889,6.46183 13.92636,7.24171 17.71433,7.24171 8.91286,0 13.70353,-3.89938 16.60021,-6.01619 l 0,4.79067 17.4915,0 0,-60.16185 -18.15996,0 0,3.67655 z m -22.17076,36.09712 c -2.67386,-2.56245 -4.1222,-6.01619 -4.1222,-9.58134 0,-7.46452 6.12759,-13.70353 13.59212,-13.70353 7.57594,0 13.59212,6.1276 13.70353,13.59212 0,7.57594 -6.01618,13.59212 -13.59212,13.70354 -3.56515,0 -7.13029,-1.55976 -9.58133,-4.01079 z"
                                                                        style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;letter-spacing:-5.68623877px;fill:white;font-family:Avant Garde BQ;-inkscape-font-specification:Avant Garde BQ Bold"
                                                                        id="path3395" inkscape:connector-curvature="0" />
                                                                    <path
                                                                        d="m 549.19851,733.15818 0,60.05044 18.15997,0 0,-33.53466 c 0.11141,-3.0081 0.44564,-4.23361 1.33693,-5.57055 2.78527,-4.23361 9.91557,-4.45643 10.47262,-4.45643 1.44834,-0.11141 2.56245,0.11141 3.78797,0.22282 l 0,-16.93444 c -2.33963,0 -8.35581,-0.44565 -13.70353,4.90207 -1.44835,1.44834 -2.78528,3.23092 -3.11951,3.67656 l 0,-8.35581 -16.93445,0 z"
                                                                        style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;letter-spacing:-5.68623877px;fill:white;font-family:Avant Garde BQ;-inkscape-font-specification:Avant Garde BQ Bold"
                                                                        id="path3397" inkscape:connector-curvature="0" />
                                                                    <path
                                                                        d="m 627.07038,736.83474 c -2.56245,-1.67117 -7.13029,-4.90208 -14.92905,-4.90208 -9.02428,0 -17.38009,4.45643 -22.72781,11.58673 -6.01619,7.91016 -6.57324,16.15457 -6.57324,19.71971 0,12.92366 7.13029,20.94524 10.47262,24.06474 7.01888,6.46183 13.92635,7.24171 17.82573,7.24171 8.80146,0 13.70354,-3.89938 16.48881,-6.01619 l 0.11141,4.67926 17.38009,0 0,-78.65605 -18.04856,0 0,22.28217 z m -22.28216,36.09711 c -2.56245,-2.67386 -4.0108,-6.1276 -4.0108,-9.69275 0,-7.46452 6.01619,-13.59212 13.59213,-13.59212 7.46452,-0.11141 13.59212,6.01619 13.59212,13.59212 0,7.46453 -6.01619,13.59213 -13.59212,13.59213 -3.56515,0 -7.1303,-1.55976 -9.58133,-3.89938 z"
                                                                        style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;letter-spacing:-5.68623877px;fill:white;font-family:Avant Garde BQ;-inkscape-font-specification:Avant Garde BQ Bold"
                                                                        id="path3399" inkscape:connector-curvature="0" />
                                                                </g>
                                                                <g id="g3401"
                                                                    transform="matrix(0.69368352,0,0,0.69368352,1138.3221,504.5545)"
                                                                    style="fill:white">
                                                                    <g style="font-size:13.80000019px;font-style:normal;font-weight:normal;text-align:start;text-anchor:start;fill:white;font-family:Times New Roman"
                                                                        id="g3403" />
                                                                    <g style="font-size:13.80000019px;font-style:normal;font-weight:normal;text-align:start;text-anchor:start;fill:white;font-family:Times New Roman"
                                                                        id="g3407" />
                                                                </g>
                                                            </g>
                                                            <g id="g3045" transform="translate(1164.1019,379.33749)"
                                                                style="fill:white">
                                                                <g style="font-size:15px;font-style:normal;font-weight:bold;text-align:start;text-anchor:start;fill:white;font-family:TeXGyreAdventor"
                                                                    id="text3047">
                                                                    <path
                                                                        d="m 5.2349326,8.8070094 0,-1.4399815 -4.42494303,0 0,1.4399815 1.36498243,0 0,5.0399356 1.6949782,0 0,-5.0399356 z m 8.9548844,-1.4399815 -2.144972,0 -1.844976,4.3949431 -1.8749762,-4.3949431 -2.1449724,0 0,6.4799171 1.6949782,0 0,-3.9449497 1.6499788,3.9449497 1.3199826,0 1.649979,-3.9449497 0,3.9449497 1.694978,0 z"
                                                                        style="font-size:15px;font-style:normal;font-weight:bold;text-align:start;text-anchor:start;fill:white;font-family:TeXGyreAdventor"
                                                                        id="path3059" />
                                                                </g>
                                                                <g style="font-size:15px;font-style:normal;font-weight:bold;text-align:start;text-anchor:start;fill:white;font-family:TeXGyreAdventor"
                                                                    id="text3049" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    <div class="col-md-12 odenis text-center mt-5">
                        <button class="btn ode addcard-3 text-white ml-1">
                            ÖDƏ
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function total(){
            $('.mehsull').each(function(){
                var qiymet = $(this).find('.qiymet1').text();
                qiymet = parseInt(qiymet);
                var say = $(this).find('.quantityvalue').val();
                say = parseInt(say);
                var cemi = say*qiymet;
                $(this).find('.cemi').text(cemi);
            });
        }
        function sum(){
            var sum = 0;
            $('.mehsull').each(function(){
                var cemi = $(this).find('.cemi').text();
                cemi = parseInt( cemi);
                sum = sum + cemi;
            });
            $('.general').text(sum);
        }
        $(document).ready(function (){
            total();
            sum();
        })
        $('.odenis').on('click' , '.ode' , function (){
             var order_token = Date.now();
             var name = $('input[name=ad]').val();
             var surname = $('input[name=soyad]').val();
             var number = $('input[name=nomre]').val();
             var email = $('input[name=email]').val();
             var address = $('input[name=unvan]').val();
             var reciever = $('input[name=sexs]').val();
             var city = $('.seher').children("option:selected").val();
             var country = $('.olke').children("option:selected").val();
             var post_code = $('input[name=poct]').val();
             var payment = $('input[name=odenis]:checked').val();
             var points =Math.floor(parseInt($('.general').text()) *5/100);
            var products=[];
            $('.mehsull').each(function (){
                var id = $(this).find('.pro-qty').attr('id');
                var say = $(this).find('.quantityvalue').val();
                var qiymet = $(this).find('.qiymet1').text();
                products.push({'id':id , 'say':say , 'qiymet':qiymet });
            })
            products = JSON.stringify(products);
            $.ajax({
                type: "POST",
                url: "/order",
                dataType: "json",
                data: {
                    'order_token':order_token ,'name':name,'surname':surname,'number':number,'email':email,'address':address,'reciever':reciever,'city':city,'country':country,'post_code':post_code,'payment':payment, 'products':products,'points':points, "_token": "{{ csrf_token() }}"
                },
                success:function(response)
                {
                    if(response.message == 'success')
                    {
                        console.log('success');
                        $('input[name=ad]').val('');
                        $('input[name=soyad]').val('');
                        $('input[name=email]').val('');
                        $('input[name=unvan]').val('');
                        $('input[name=sexs]').val('');
                        $('input[name=poct]').val('');
                        toastr.success("Sifarişiniz uğurla başa çatdı");
                        setTimeout(function(){
                            window.location.replace('/');
                        }, 1500);
                    }
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }
            });
        })
        @if(isset($address))
        $(document).ready(function (){
            var city = $('input[name=city]').val();
            var country = $('input[name=country]').val();
            $('.seher').val(city);
            $('.olke').val(country);
        });
        @endif

    </script>
@endsection
