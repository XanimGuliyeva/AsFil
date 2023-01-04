@extends('esas.index')
@section('main')
    @foreach($users as $user)
        <div class="sexsihesab">
            <div class="sexsimelumatlar">
                <div class="container logintext">
                    <div class="row">
                        <div class="col-lg-6 left">
                            <p class="sxsm">Şəxsi məlumatlar</p>
                            <div class="inpdiv">
                                <input name="user_name" value="{{$user->name}}" type="text" style="height: 40px;width: 360px;margin-bottom: 10px;" placeholder="Ad" class="textinput"> <br>
                            </div>
                            <div class="inpdiv">
                                <input name="user_surname" value="{{$user->surname}}" type="text" style="height: 40px;width: 360px;margin-bottom: 10px" placeholder="Soyad" class="textinput"> <br>
                            </div>
                            <div class="inpdiv">
                                <input disabled name="user_phone" value="{{$user->phone}}" type="text" style="height: 40px;width: 360px;margin-bottom: 10px" placeholder="Nömrə" class="textinput"> <br>
                            </div>
                            <div class="inpdiv">
                                <input disabled name="user_email" value="{{$user->email}}" type="email" style="height: 40px;width: 360px;margin-bottom: 10px" placeholder="Email" class="textinput"> <br>
                            </div>
                            <div class="inpdiv">
                                <input name="user_password" value="{{$user->password}}" type="password" style="height: 40px;width: 360px;margin-bottom: 10px" placeholder="Şifrə" class="textinput"> <br>
                            </div>
                        </div>
                        <div class="col-lg-6 right topzr" style="padding-top: 75px !important;">

                            @if(isset($companies))
                                @foreach($companies as $company)

                                    <div class="inpdiv company_id" style="margin-left: 60px !important;" id="{{$company->company_id}}">
                                        <input name="company_name" value="{{$company->company_name}}" type="text" placeholder="Şirkətin adı" class="textinput"> <br>
                                    </div>
                                    <div class="inpdiv" style="margin-left: 60px !important;">
                                        <input name="company_address" value="{{$company->address}}" type="text" placeholder="Ünvan" class="textinput"> <br>
                                    </div>
                                    <div class="inpdiv" style="margin-left: 60px !important;">
                                        <input name="company_voen" value="{{$company->voen}}" type="text" placeholder="VÖEN" class="textinput"> <br>
                                    </div>
                                    <div class="inpdiv" style="margin-left: 60px !important;">
                                        <input name="company_leader" value="{{$company->leader}}" type="text" placeholder="Rəhbər vəzifə" class="textinput"> <br>
                                    </div>
                                    <div class="inpdiv" style="margin-left: 60px !important;">
                                        <input name="company_leader_ns" value="{{$company->leader_ns}}" type="text" placeholder="Rəhbərin Soyadı Adı" class="textinput"> <br>
                                    </div>
                                @endforeach
                            @endif
                            @if(isset($agents))
                                @foreach($agents as $agent)
                                    @if($agent->agent_category == 'personal')
                                        <div class="inpdiv agent_id">
                                            <input style="margin-left: 60px !important;" type="hidden" name="agent_id" value="{{$agent->agent_id}}">
                                            <input style="margin-left: 60px !important;" name="agent_name" value="{{$agent->agent_name}}" type="text" placeholder="Fiziki şəxsin adı" class="textinput"> <br>
                                        </div>
                                    @else
                                        <div class="inpdiv agent_id" >
                                            <input style="margin-left: 60px !important;" type="hidden" name="agent_id" value="{{$agent->agent_id}}">
                                            <input style="margin-left: 60px !important;" name="agent_name" value="{{$agent->agent_name}}" type="text" placeholder="MMC-nin adı" class="textinput"> <br>
                                        </div>
                                    @endif
                                    <div class="inpdiv">
                                        <input style="margin-left: 60px !important;" name="agent_address" value="{{$agent->address}}" type="text" placeholder="Ünvan" class="textinput"> <br>

                                    </div>
                                    <div class="inpdiv">
                                        <input style="margin-left: 60px !important;" name="agent_voen" value="{{$agent->voen}}" type="text" placeholder="VÖEN" class="textinput"> <br>
                                    </div>
                                    @if($agent->agent_category == 'mmc')
                                        <div class="inpdiv">
                                            <input style="margin-left: 60px !important;" name="agent_leader" value="{{$agent->leader}}" type="text" placeholder="Rəhbər vəzifə" class="textinput"> <br>
                                        </div>
                                        <div class="inpdiv">
                                            <input style="margin-left: 60px !important;" name="agent_leader_ns" value="{{$agent->leader_ns}}" type="text" placeholder="Rəhbərin Soyadı Adı" class="textinput"> <br>
                                        </div>
                                    @endif
                                    <div class="inpdiv">
                                        <input style="margin-left: 60px !important;" name="agent_bank" value="{{$agent->bank}}" type="text" placeholder="Bank" class="textinput"> <br>
                                    </div>
                                    <div class="inpdiv">
                                        <input style="margin-left: 60px !important;" name="agent_h_account" value="{{$agent->h_account}}" type="text" placeholder="H_Hesab" class="textinput"> <br>
                                    </div>
                                    <div class="inpdiv">
                                        <input style="margin-left: 60px !important;" name="agent_m_account" value="{{$agent->m_account}}" type="text" placeholder="M_Hesab" class="textinput"> <br>

                                    </div>
                                @endforeach
                            @endif
                                <br>
                            <span class="span1 mstr" style="margin-right: 135px;">Müştəri kodunuz
                            <span class="span2">#{{$user->id}}</span>
                            </span>
                            <br>
                            <br><br>
                            <span class="span1 bns" style="margin-right: 70px;">Bonuslarınız
                                <span class="span2">{{$user->points}} bonus xalınız</span>
                            </span>

                        </div>
                    </div>
                    <div class="register">
                        <button type="submit" id="update_user" class="{{$user->id}}">Dəyiş</button>
                    </div>
                </div>
            </div>

        </div>


        <div class="table-list">
            <div class="container lists">
                <p>Alış tarixçəniz</p>
                <table class="tarixce">
                    <tr>
                        <th>№</th>
                        <th>Məhsul</th>
                        <th>Miqdarı</th>
                        <th>Qiyməti</th>
                        <th>Cəmi</th>
                        <th>Tarix</th>
                    </tr>
                    @foreach($orders as $key=>$order)
                    <tr class="tr">
                        <td>{{$key+1}}</td>
                        <td class="name">{{$order->ad}}</td>
                        <td><span class="quantity" style="font-size: 20px">{{$order->quantity}}</span> ədəd</td>
                        <td class="price">{{$order->price}}</td>
                        <td class="total"></td>
                        <td>{{date("d-m-Y", strtotime($order->created_at))}}</td>
                    </tr>
                    @endforeach
                </table>
                <div class="text">
                    <span class="span1">Cəmi:</span>
                    <span class="span2"><span class="cemieded" style="font-size: 20px"></span> məhsul, <span style="font-size: 20px" class="cemimebleg"></span> manat məbləğində</span>
                </div>
            </div>
        </div>
    @endforeach
    <section class="resmilesdirme mt-5 pt-5">
        <div class="container ">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h6 class="title-top">ÇATDIRILACAQ ÜNVAN</h6>
                </div>
            </div>



            <div class="row my-5 cart-bg">
                <div class="col-md-12">
                    <form id="address" action="">
                        @csrf
                        @if(isset($address))
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <div class="form-group mb-4">

                                    <input style="margin-left: 60px !important;"  type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                           aria-describedby="emailHelp" name="unvan" placeholder="Ünvan (küçə, ev, mənzil)" value="{{$address->address}}">

                                </div>
                                <div class="form-group mb-4">

                                    <input  style="margin-left: 60px !important;" type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                           aria-describedby="emailHelp" name="sexs" value="{{$address->reciever}}" placeholder="Təhvil alacaq şəxs S.A.">

                                </div>

                                <div class="form-group mb-4">

                                    <input  style="margin-left: 60px !important;" type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                          value="{{$address->post_code}}"   aria-describedby="emailHelp" name="poct" placeholder="Post kodu">

                                </div>
                            </div>
                            <div class="col-md-6 my-2">

                                <div class="form-group mb-4">



                                    <div class="select d-flex">
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



                                    <div class="select">
                                        <span class="arr"></span>
                                        <input type="hidden" name="country" value="{{$address->country}}">
                                        <select name="olke" class="pl-4 olke form-control">
                                            <option disabled selected class="d-none" value="">Ölkə</option>
                                            <option value="Azərbaycan">Azərbaycan</option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                        </div>
                        @else
                            <div class="row">
                                <div class="col-md-6 my-2">
                                    <div class="form-group mb-4">

                                        <input style="margin-left: 60px !important;" type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                               aria-describedby="emailHelp" name="unvan" placeholder="Ünvan (küçə, ev, mənzil)">

                                    </div>
                                    <div class="form-group mb-4">

                                        <input style="margin-left: 60px !important;" type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                               aria-describedby="emailHelp" name="sexs"  placeholder="Təhvil alacaq şəxs S.A.">

                                    </div>

                                    <div class="form-group mb-4">

                                        <input style="margin-left: 60px !important;" type="text" class="form-control input pl-4" id="exampleInputEmail1"
                                               aria-describedby="emailHelp" name="poct" placeholder="Post kodu">

                                    </div>
                                </div>
                                <div class="col-md-6 my-2">

                                    <div class="form-group mb-4">



                                        <div class="select d-flex ">
                                            <span class="arr"></span>
                                            <select name="seher" class="pl-4 form-control seher">
                                                <option disabled value="" class="d-none" selected>Şəhər</option>
                                                <option value="Bakı">Bakı</option>
                                                <option value="Sumqayıt">Sumqayıt</option>
                                                <option value="Gəncə">Gəncə</option>
                                            </select>
                                        </div>

                                    </div>


                                    <div class="form-group mb-4">



                                        <div class="select">
                                            <span class="arr"></span>
                                            <select name="olke" class="pl-4 olke form-control">
                                                <option disabled selected class="d-none" value="">Ölkə</option>
                                                <option value="Azərbaycan">Azərbaycan</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            @endif

                    </form>
                    <div class="col-md-12 text-center mt-5 yeniunvan">
                        <button  class="btn yaddasaxla addcard-3 text-white ml-1">
                            Yadda Saxla
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="qeydler">
        <div class="container" style="padding: 0px;">
            <div class="esasqeyd">
                <p>Bildirişlər və elanlar</p>
                <div class="row box" >
                    <div class="col-lg-2 left">
                        <span class="span1">i</span>
                    </div>
                    <div class="col-lg-9 right">
                        <span class="tarix">14.09.2020</span> <br>
                        <span class="span2">Hüquqi şəxs kimi alış-veriş edərkən, şirkətin məlumatlarını daxil etməyiniz xahiş olunur. Bu, avtomatik rejimdə sizinlə müqavilənin və qaimə-fakturanın yaradılması üçün lazımdır. Seçdiyiniz məhsulları səbətə atıb, sifarişiniz təsdiqləyərkən, sizinlə aramızda müqavilə və hesab faktura generasıya olunacaq. Tərəfimizdən onlar imzalanıb, möhürlənib, qeyd etdiyiniz ünvanınıza göndəriləcək. </span>
                    </div>
                </div>
                <div class="row box" >
                    <div class="col-lg-2 left">
                        <span class="span1">i</span>
                    </div>
                    <div class="col-lg-9 right">
                        <span class="tarix">14.09.2020</span> <br>
                        <span class="span2">Hüquqi şəxs kimi alış-veriş edərkən, şirkətin məlumatlarını daxil etməyiniz xahiş olunur. Bu, avtomatik rejimdə sizinlə müqavilənin və qaimə-fakturanın yaradılması üçün lazımdır. Seçdiyiniz məhsulları səbətə atıb, sifarişiniz təsdiqləyərkən, sizinlə aramızda müqavilə və hesab faktura generasıya olunacaq. Tərəfimizdən onlar imzalanıb, möhürlənib, qeyd etdiyiniz ünvanınıza göndəriləcək. </span>
                    </div>
                </div>
                <div class="row box" >
                    <div class="col-lg-2 left">
                        <span class="span1">i</span>
                    </div>
                    <div class="col-lg-9 right">
                        <span class="tarix">14.09.2020</span> <br>
                        <span class="span2">Hüquqi şəxs kimi alış-veriş edərkən, şirkətin məlumatlarını daxil etməyiniz xahiş olunur. Bu, avtomatik rejimdə sizinlə müqavilənin və qaimə-fakturanın yaradılması üçün lazımdır. Seçdiyiniz məhsulları səbətə atıb, sifarişiniz təsdiqləyərkən, sizinlə aramızda müqavilə və hesab faktura generasıya olunacaq. Tərəfimizdən onlar imzalanıb, möhürlənib, qeyd etdiyiniz ünvanınıza göndəriləcək. </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function (){
            var cemieded = 0;
            var cemimebleg = 0;
            $('.tarixce .tr').each(function () {
                var say = $(this).find('.quantity').text();
                var qiymet = $(this).find('.price').text();
                var cemi = parseInt(say)*parseInt(qiymet);
                $(this).find('.total').text(cemi);
                cemieded =cemieded + parseInt(say);
                cemimebleg = cemimebleg + cemi;
            });
            $('.cemieded').text(cemieded);
            $('.cemimebleg').text(cemimebleg);
        })

        $('.yeniunvan').on('click' , '.yaddasaxla' , function (){
            var formData = new FormData($('#address')[0]);
            $.ajax({
                type: "POST",
                url: "/address",
                data: formData,
                cache:false,
                processData:false,
                contentType:false,
                success:function (response){
                    if (response.message == 'success') {
                        toastr.success('Ünvan Əlavə olundu');
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

