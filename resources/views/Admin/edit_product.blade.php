@extends('Admin.index')
@section('body')
<!--Product Detail start-->
<div id="myConfirm" class="modal fade alma" name="confirm">
    <div class="modal-dialog modal-confirm alma">
        <div class="modal-content alma">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Bu şəkili silmək istədiyinə əminsən?</p>
            </div>
            <div class="modal-footer armud">
                <button type="button" class="btn btn-info" data-dismiss="modal">Xeyr</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Bəli</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog" name="mdl">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Şəkillər</h4>
                <button type="button" class="close bagla" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <form id="main_form">
                    @csrf
                    <label class="form-control">Əsas şəkil</label>
                    <div class="image_upsert" id="image_upsert1">
                        <img src="">
                        <div class="btns_upsert">
                            <button type="button" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-danger" href="#myConfirm" data-toggle="modal"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                    <label class="form-control">İkinci şəkil</label>
                    <div class="image_upsert" id="image_upsert2">
                        <img src="">
                        <div class="btns_upsert">
                            <button type="button" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-danger" href="#myConfirm" data-toggle="modal"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                    <label class="form-control">Üçüncü şəkil</label>
                    <div class="image_upsert" id="image_upsert3">
                        <img src="">
                        <div class="btns_upsert">
                            <button type="button" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-danger" href="#myConfirm" data-toggle="modal"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success bagla" data-dismiss="modal">Yadda saxla</button>
            </div>
        </div>

    </div>
</div>
@foreach($products as $product)
<div class="container conteynr" id="{{$product->id}}">
    <div class="row justify-content-between">
        <div class="col-md-6 ">


            <button class="btn btn-info float-right edit-image" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i></button>

            <div class="fixed ">
                <div class="head-product  head-product-bottom-radius">
                    <div class="product-image pt-1">
                        @if($product->endirim != 0)
                            <span class="discount font-weight-bold p-2 font-size-14 mt-3 ml-3">{{$product->endirim}}% endirim</span>
                        @endif
                        <img @if($product->sekil1 != 'default.png') src="{{asset('images/'.$product->sekil1.'')}}" @elseif($product->sekil2 != 'default.png') src="{{asset('images/'.$product->sekil2.'')}}" @elseif($product->sekil3 != 'default.png') src="{{asset('images/'.$product->sekil3.'')}}" @elseif($product->sekil1 == 'default.png' && $product->sekil2 == 'default.png' && $product->sekil3 == 'default.png') src="{{asset('images/default.png')}}" @endif data-id="1"
                             class="img-fluid rounded-top single-img " alt="">

                    </div>
                </div>
                <div class="text-center pt-3 ">


                    <div class="hover-image py-3">
                        <span class="picture1">
                        @if($product->sekil1 != 'default.png')
                                <img data-id="1" id="image1" src="{{asset('images/'.$product->sekil1.'')}}" class="img-fluid clickeable-image active-image" alt="">
                        @endif
                        </span>
                        <span class="picture2">
                        @if($product->sekil2 != 'default.png')

                                    <img data-id="1" id="image2" src="{{asset('images/'.$product->sekil2.'')}}" class="img-fluid clickeable-image" alt="">
                            @endif
                        </span>
                        <span class="picture3">
                        @if($product->sekil3 != 'default.png')
                                    <img data-id="1" id="image3" src="{{asset('images/'.$product->sekil3.'')}}" class="img-fluid clickeable-image" alt="">
                        @endif
                        </span>

                    </div>
                </div>

            </div>



        </div>

        <div class="pl-4 col-md-6 sag">


            <button class="btn btn-info edit-texts float-right"><i class="fa fa-pencil"></i></button>


            <div class="item-cod">
                <strong>SKU: </strong><span class="anbar"><span class="text-muted">{{$product->ambar_kodu}}</span></span>
                <div class="feedback d-flex my-3">
                    <div class="rating ">
                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>

                    </div>
                    <div class="review mx-1">
                        <strong>{{$product->reytinq}}</strong>
                    </div>

                </div>

            </div>
            <div class="ad"><h3 class=" my-2 font-weight-bold name">{{$product->ad}}</h3></div>
            <div class="category my-3">
                <a href="">{{$product->istehsalci}}</a>
            </div>
            <div class="part">
                İstehsalçı kodu: # <a href="">{{$product->istehsalci_kodu}}</a>
            </div><br>
            <div class="teyinatsahesi">
                Təyinat Sadəsi: <a href="">{{$product->teyinat}}</a>
            </div><br>
            <div class="filternovu">
                Filter növü: <a href="">{{$product->filtr}}</a>
            </div>
            <div class="price my-3">
                <div class="number">
                    {{$product->qiymet}}
                    <span class="currency">
                    ₼
                </span>
                </div>


                <div class="product-decription mb-3">
                    <h5 class="font-weight-bold features-head">Product details</h5>
                    <p class="text-muted description-text ">
                        {{$product->haqqinda}}
                    </p>
                </div>


            </div>
        </div>
    </div>
@endforeach
    <script>
        $(document).on('click', '.edit-texts',function () {
            @foreach($products as $product)
            $('.anbar .text-muted').remove();
            $('.anbar ').append('<input type="text" name="ambar_kodu" class="form-control ml-2 d-inline" value="{{$product->ambar_kodu}}" style="width: auto">');
            $('.feedback ').remove();
            $('.category a').remove();
            $('.category').prepend('<label for="">Istehsalçı:</label><select style="width: auto" name="istehsalci" class="form-control d-inline istehsalci ml-2" id="">\n' +
                '                                                            @foreach($producers as $producer) <option value="{{$producer->id}}">{{$producer->istehsalci}}</option> @endforeach \n' +
                '                                                        </select>');
            $('.teyinatsahesi a').remove();
            $('.teyinatsahesi').append('<select name="teyinat" class="form-control teyinat d-inline" style="width: auto" id="">\n' +
                '                                                            @foreach($category as $cat) <option value="{{$cat->id}}">{{$cat->teyinat}}</option> @endforeach \n' +
                '                                                        </select>');
            $('.filternovu a').remove();
            $('.filternovu').append('<select name="filtr" class="form-control filtr d-inline" style="width: auto" id="">\n' +
                '                                                            @foreach($filters as $filter) <option value="{{$filter->id}}">{{$filter->filter}}</option> @endforeach \n' +
                '                                                        </select>');
            $('.col-md-6 .name').remove();
            $('select[name=istehsalci]').val('{{$producer->id}}');
            $('select[name=teyinat]').val('{{$cat->id}}');
            $('select[name=filtr]').val('{{$filter->id}}');
            $('.ad').append('<label for="" class="mt-2">Ad:</label><input type="text" name="ad" value="{{$product->ad}}"  class="form-control d-inline " >');
            $('.part a').remove();
            $('.part').append('<input type="text" name="istehsalci_kodu"   class="form-control d-inline" value="{{$product->istehsalci_kodu}}" style="width: auto">');
            $('.number').remove();
            $('.price').prepend('<label for="">Qiymət:</label><input type="text" name="qiymet" value="{{$product->qiymet}}" class="form-control d-inline ml-2 mb-3" style="width: auto"><br><label for="">Endirim (%):</label><input type="text" name="endirim" value="{{$product->endirim}}" class="form-control d-inline ml-2 mb-3" style="width: auto">');
            $('.description-text').remove();
            $('.product-decription').append('<textarea name="haqqinda" id=""   class="form-control mt-3"></textarea>');
            $('.product-decription textarea').val(`{{$product->haqqinda}}`);
            $('.edit-texts').remove();
            $('.sag').prepend('<button type="button" class="btn btn-warning float-right"><i class="fa fa-save"></i></button><button type="button" class="btn btn-danger float-right mr-2"><i class="fa fa-times"></i></button>');
            @endforeach
            $('.item-cod .text-muted').html('<input type="text"  class="form-control d-inline ml-2" style="width: auto">');
            $('.category a').html('<label for="">Istehsalçı:</label><input type="text"  class="form-control " style="width: auto">');
            $('.col-md-6 .name').html('<label for="">Ad:</label><input type="text"  class="form-control d-inline " >');
            $('.part a').html('<input type="text"  class="form-control d-inline" style="width: auto">');
            $('.number').html('<label for="">Qiymət:</label><input type="text"  class="form-control d-inline ml-2" style="width: auto">');
            $('.description-text').html('<textarea name="" id="" class="form-control"></textarea>');
            $('.edit-texts').remove();
        });

        $('.sag').on('click' , '.btn-danger', function () {
            @foreach($products as $product)
            $('.item-cod .text-muted').remove();
            $('.sag .btn-warning').remove();
            $('.sag .btn-danger').remove();
            $('.sag').prepend('<button class="btn btn-info edit-texts float-right"><i class="fa fa-pencil"></i></button>');
            $('.category label').remove();
            $('.category select').remove();
            $('.teyinatsahesi select').remove();
            $('.filternovu select').remove();
            $('.anbar input').remove();
            $('.ad label').remove();
            $('.ad input').remove();
            $('.part input').remove();
            $('.price label').remove();
            $('.price input').remove();
            $('.product-decription textarea').remove();
            $('.anbar').append('<span class="text-muted">{{$product->ambar_kodu}}</span>');
            $('.item-cod').append('<div class="feedback d-flex my-3">\n' +
                '                    <div class="rating ">\n' +
                '                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>\n' +
                '\n' +
                '                    </div>\n' +
                '                    <div class="review mx-1">\n' +
                '                        <strong>{{$product->reytinq}}</strong>\n' +
                '                    </div>\n' +
                '\n' +
                '                </div>');
            $('.ad').append('<h3 class=" my-2 font-weight-bold name">{{$product->ad}}</h3>');
            $('.category').append('<a href="">{{$product->istehsalci}}</a>');
            $('.teyinatsahesi').append('<a href="">{{$product->teyinat}}</a>');
            $('.filternovu').append('<a href="">{{$product->filtr}}</a>');
            $('.part').append('<a href="">{{$product->istehsalci_kodu}}</a>');
            $('.price').prepend('<div class="number">\n' +
                '                    {{$product->qiymet}}\n' +
                '                    <span class="currency">\n' +
                '                    ₼\n' +
                '                </span>\n' +
                '                </div>');
            $('.product-decription').append(`<p class="text-muted description-text my-2">\n` +
                `                        {{$product->haqqinda}}\n` +
                `                    </p>`);
            @endforeach
        });

        $('.sag').on('click' , '.btn-warning', function () {
            var id = $('.conteynr').attr('id');
            var ad = $('input[name=ad]').val().trim();
            var ambar_kodu = $('input[name=ambar_kodu]').val().trim();
            var istehsalci_kodu= $('input[name=istehsalci_kodu]').val().trim();
            var haqqinda = $('textarea[name=haqqinda]').val();
            var filtr = $('.filtr').children("option:selected").val();
            var teyinat = $('.teyinat').children("option:selected").val();
            var qiymet = $('input[name=qiymet]').val().trim();
            var endirim = $('input[name=endirim]').val().trim();
            var istehsalci = $('.istehsalci').children("option:selected").val();
            $.ajax({
                type: "POST",
                url: "/edit_products",
                data: {'id':id ,'ad':ad,'ambar_kodu':ambar_kodu,'istehsalci_kodu':istehsalci_kodu,'haqqinda':haqqinda,'filtr':filtr,'teyinat':teyinat,'qiymet':qiymet,'endirim':endirim,'istehsalci':istehsalci,'_token':'{{csrf_token()}}'},
                success:function (response){
                    if (response.message == 'success') {
                        $('.item-cod .text-muted').remove();
                        $('.sag .btn-warning').remove();
                        $('.sag .btn-danger').remove();
                        $('.sag').prepend('<button class="btn btn-info edit-texts float-right"><i class="fa fa-pencil"></i></button>');
                        $('.category label').remove();
                        $('.category select').remove();
                        $('.teyinatsahesi select').remove();
                        $('.filternovu select').remove();
                        $('.anbar input').remove();
                        $('.ad label').remove();
                        $('.ad input').remove();
                        $('.part input').remove();
                        $('.price label').remove();
                        $('.price input').remove();
                        $('.product-decription textarea').remove();
                        $('.anbar').append('<span class="text-muted">'+ ambar_kodu +'</span>');
                        $('.item-cod').append('<div class="feedback d-flex my-3">\n' +
                            '                    <div class="rating ">\n' +
                            '                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>\n' +
                            '\n' +
                            '                    </div>\n' +
                            '                    <div class="review mx-1">\n' +
                            '                        <strong>@foreach($products as $product)  {{$product->reytinq}} @endforeach </strong>\n' +
                            '                    </div>\n' +
                            '\n' +
                            '                </div>');
                        $('.ad').append('<h3 class=" my-2 font-weight-bold name">'+ad+'</h3>');
                        $('.category').append('<a href="">'+istehsalci+'</a>');
                        $('.teyinatsahesi').append('<a href="">'+teyinat+'</a>');
                        $('.filternovu').append('<a href="">'+filtr+'</a>');
                        $('.part').append('<a href="">'+istehsalci_kodu+'</a>');
                        $('.price').prepend('<div class="number">\n' +
                            '                    '+qiymet+' \n' +
                            '                    <span class="currency">\n' +
                            '                    ₼\n' +
                            '                </span>\n' +
                            '                </div>');
                        $('.product-decription').append('<p class="text-muted description-text my-2">\n' +
                            '                        `+haqqinda+` \n' +
                            '                    </p>');
                        toastr.success('Uğurlu Əməliiyat!');
                    }
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }
            });
        });
        $('.row .col-md-6').on('click','.edit-image',function(){
            var id = $(this).parents('.conteynr').attr('id');
            $('#myModal').attr('name',id);
            $('#myConfirm').attr('name', id);
            if ($('#image1').html() != ''){
                $('#image_upsert1').html('<input accept="image/*" id="img1" type="file" name="sekil1" class="form-control"><br>');
            }
            else{
                $a = $('#image1').attr('src');
                $('#image_upsert1 img').attr('src',$a);
            }
            if ($('#image2').html() != ''){
                $('#image_upsert2').html('<input accept="image/*" id="img2" type="file" name="sekil2" class="form-control"><br>');
            }
            else{
                $b = $('#image2').attr('src');
                $('#image_upsert2 img').attr('src',$b);
            }
            if ($('#image3').html() != ''){
                $('#image_upsert3').html('<input accept="image/*" id="img3" type="file" name="sekil3" class="form-control"><br>');
            }
            else{
                $c = $('#image3').attr('src');
                $('#image_upsert3 img').attr('src',$c);
            }

            $(document).on('click','#image_upsert1 .btns_upsert .btn-danger',function(){
                $('.armud').attr('id','confirm1');
                $('#confirm1').on('click','.btn-danger', function () {
                    var id = $(this).parents('#myConfirm').attr('name');
                    $.ajax({
                        type: "POST",
                        url: "{{route('delete_image1')}}",
                        data: {
                            'id':id, "_token": "{{ csrf_token() }}"
                        },
                        success:function(response)
                        {
                            if(response.message == 'success')
                            {
                                toastr.success('Şəkil silindi');
                                $('.product-image img').attr('src','{{asset('images/default.png')}}');
                                $('#image_upsert1').html('<input type="file" name="sekil1" class="form-control"><br>');
                                $('#image1').remove();
                            }
                        },
                        error: function (request, error, response) {
                            toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                        }
                    });
                });
            });

            $(document).on('click','#image_upsert2 .btns_upsert .btn-danger',function(){
                $('.armud').attr('id','confirm2');
                $('#confirm2').on('click','.btn-danger', function () {
                    var id = $(this).parents('#myConfirm').attr('name');
                    $.ajax({
                        type: "POST",
                        url: "{{route('delete_image2')}}",
                        data: {
                            'id':id, "_token": "{{ csrf_token() }}"
                        },
                        success:function(response)
                        {
                            if(response.message == 'success')
                            {
                                toastr.success('Şəkil silindi');
                                $('#image_upsert2').html('<input type="file" name="sekil2" class="form-control"><br>');
                                $('#image2').remove();
                            }
                        },
                        error: function (request, error, response) {
                            toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                        }
                    });
                });
            });

            $(document).on('click','#image_upsert3 .btns_upsert .btn-danger',function(){
                $('.armud').attr('id','confirm3');
                $('#confirm3').on('click','.btn-danger', function () {
                    var id = $(this).parents('#myConfirm').attr('name');
                    $.ajax({
                        type: "POST",
                        url: "{{route('delete_image3')}}",
                        data: {
                            'id':id, "_token": "{{ csrf_token() }}"
                        },
                        success:function(response)
                        {
                            if(response.message == 'success')
                            {
                                toastr.success('Şəkil silindi');
                                $('#image_upsert3').html('<input accept="image/*" type="file" name="sekil3" class="form-control"><br>');
                                $('#image3').remove();
                            }
                        },
                        error: function (request, error, response) {
                            toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                        }
                    });
                });
            });

            $('.bagla').on('click',function (){
                $('.modal-backdrop').css('display','none');
            });

            $(document).on('click','#image_upsert1 .btns_upsert .btn-info',function(){
                $('#image_upsert1').html('<input accept="image/*" type="file" name="sekil1" class="form-control"><br><button class="btn btn-warning"><i class="fa fa-times"></i></button>');
            });

            $(document).on('click','#image_upsert1 .btn-warning', function(){
                $src = $('#image1').attr('src');
                $('#image_upsert1').html('<img src="'+$src+'">\n' +
                    '<div class="btns_upsert">\n' +
                    '<button type="button" class="btn btn-info"><i class="fa fa-pencil"></i></button>\n' +
                    '<button type="button" class="btn btn-danger" href="#myConfirm" data-toggle="modal"><i class="fa fa-trash"></i></button>\n' +
                    '</div>');
            });




            $('#image_upsert2 .btns_upsert').on('click','.btn-info',function(){
                $('#image_upsert2').html('<input accept="image/*" type="file" name="sekil2" class="form-control"><br><button class="btn btn-warning"><i class="fa fa-times"></i></button>');

                $('#image_upsert2').on('click','.btn-warning', function(){
                    $src = $('#image2').attr('src');
                    $('#image_upsert2').html('<img src="'+$src+'">\n' +
                        '<div class="btns_upsert">\n' +
                        '<button type="button" class="btn btn-info"><i class="fa fa-pencil"></i></button>\n' +
                        '<button type="button" class="btn btn-danger" href="#myConfirm" data-toggle="modal"><i class="fa fa-trash"></i></button>\n' +
                        '</div>');
                });
            });

            $('#image_upsert3 .btns_upsert').on('click','.btn-info',function(){
                $('#image_upsert3').html('<input accept="image/*" type="file" name="sekil3" class="form-control"><br><button class="btn btn-warning"><i class="fa fa-times"></i></button>');

                $('#image_upsert3').on('click','.btn-warning', function(){
                    $src = $('#image3').attr('src');
                    $('#image_upsert3').html('<img src="'+$src+'">\n' +
                        '<div class="btns_upsert">\n' +
                        '<button type="button" class="btn btn-info"><i class="fa fa-pencil"></i></button>\n' +
                        '<button type="button" class="btn btn-danger" href="#myConfirm" data-toggle="modal"><i class="fa fa-trash"></i></button>\n' +
                        '</div>');

                });
            });

            $('.modal-footer').on('click','.btn-success',function (){
                var formData = new FormData($('#main_form')[0]);
                if($('input[name=sekil1]').length){
                    if ($('input[name=sekil1]').get(0).files.length !== 0){
                        var sekil1 = $('input[name=sekil1]').val().replace(/C:\\fakepath\\/i, '');
                    }
                }
                if($('input[name=sekil2]').length) {
                    if ($('input[name=sekil2]').get(0).files.length !== 0) {
                        var sekil2 = $('input[name=sekil2]').val().replace(/C:\\fakepath\\/i, '');
                    }
                }
                if($('input[name=sekil3]').length) {
                    if ($('input[name=sekil3]').get(0).files.length !== 0) {
                        var sekil3 = $('input[name=sekil3]').val().replace(/C:\\fakepath\\/i, '');
                    }
                }
                formData.append('id', id);
                $.ajax({
                    type: "POST",
                    url: "/edit_images",
                    data: formData,
                    cache:false,
                    processData:false,
                    contentType:false,
                    success:function (response){
                        if (response.message == 'success') {
                            if($('input[name=sekil1]').length) {
                                if($('input[name=sekil1]').get(0).files.length !== 0){
                                    var src1 =URL.createObjectURL($('input[name=sekil1]').get(0).files[0]);
                                    if ($('#image1').length){
                                        $('#image1').attr('src' , src1);
                                    }
                                    else {
                                        $('.picture1').prepend('<img data-id="1" id="image1" src="'+src1+'" class="img-fluid clickeable-image " alt="">')
                                    }
                                }
                            }
                            if($('input[name=sekil2]').length) {
                                if($('input[name=sekil2]').get(0).files.length !== 0){
                                    var src2 =URL.createObjectURL($('input[name=sekil2]').get(0).files[0]);
                                    if ($('#image2').length){
                                        $('#image2').attr('src' , src2);
                                    }
                                    else {
                                        $('.picture2').prepend('<img data-id="1" id="image2" src="'+src2+'" class="img-fluid clickeable-image " alt="">')
                                    }
                                }

                            }
                            if($('input[name=sekil3]').length) {
                                if($('input[name=sekil3]').get(0).files.length !== 0) {
                                    var src3 =URL.createObjectURL($('input[name=sekil3]').get(0).files[0]);
                                    if ($('#image3').length){
                                        $('#image3').attr('src' , src3);
                                    }
                                    else {
                                        $('.picture3').prepend('<img data-id="1" id="image1" src="'+src3+'" class="img-fluid clickeable-image " alt="">')
                                    }
                                }
                            }
                            toastr.success('Dəyişikliklər yadda saxlanıldı');
                        }
                    },
                    error: function (request, error, response) {
                        toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                    }
                });
            });
        });
        $(document).on('click','.clickeable-image', function () {
            src= $(this).attr('src');
            $('.single-img').attr('src' , src);
            $('.active-image').removeClass('active-image');
            $(this).addClass('active-image');
        });
    </script>
@endsection

