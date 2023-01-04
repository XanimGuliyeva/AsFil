@extends('esas.index')
@section('main')
    <div class="sexsi">
        <div class="container">
            <div class="text">
                <p>ŞƏXSİ HESABIN YARADILMASI</p>
            </div>
        </div>
    </div>

        <div class="rd-btns">
            <div class="container login">
                <div class="row justify-content-around align-items-center">
                    <div class="col-lg-4 align-items-center" style="text-align: left">
                        <input class="categorytype" type="radio" name="odenis" deyer="fizikisexskimi" id="exampleRadios1"
                               value="normal" checked>
                        <label class="text" for="exampleRadios1">
                            Fiziki  şəxs kimi alış-veriş üçün
                        </label>
                    </div>
                    <div class="col-lg-4  align-items-center" style="text-align: center" >
                        <input class="categorytype" type="radio" name="odenis" deyer="sirketkimi" id="exampleRadios2"
                               value="company" >
                        <label class="text  " for="exampleRadios2">
                            Şirkət kimi aliş-veriş üçün
                        </label>
                    </div>
                    <div class="col-lg-4 align-items-center" >
                        <input class="categorytype" type="radio" name="odenis" deyer="agentkimi" id="exampleRadios3"
                               value="agent">
                        <label class="text  " for="exampleRadios3">
                            Satış agenti kimi
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="qeyd">
            <div class="container esasqeyd">
                <div class="row esasqeyd">
                    <div class="col-lg-2 left">
                        <span class="span1">i</span>
                    </div>
                    <div class="col-lg-9 right">
                        <span class="span2">Hüquqi şəxs kimi alış-veriş edərkən, şirkətin məlumatlarını daxil etməyiniz xahiş olunur. Bu, avtomatik rejimdə sizinlə müqavilənin və qaimə-fakturanın yaradılması üçün lazımdır. Seçdiyiniz məhsulları səbətə atıb, sifarişiniz təsdiqləyərkən, sizinlə aramızda müqavilə və hesab faktura generasıya olunacaq. Tərəfimizdən onlar imzalanıb, möhürlənib, qeyd etdiyiniz ünvanınıza göndəriləcək. </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="fizikisexskimi radioinfo">
            <div class="sexsimelumatlar">
                <div class="container logintext">
                    <div class="row">
                        <div class="col-lg-6 left main_inputs">
                            <p class="sxsm">Şəxsi məlumatlar</p>
                            <p class="mutleqxana">* mütləq xanalar </p>
                            <div class="inpdiv">
                                <span>*</span>
                                <input cla id="name" type="text" placeholder="Adınız" class="textinput" name="name"> <br>
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input cla id="surname" type="text" placeholder="Soyadınız" class="textinput" name="surname"> <br>
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input cla id="phone" type="text" placeholder="Telefon" class="textinput" name="phone"> <br>
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input type="email" placeholder="Email" class="textinput" name="email"> <br>
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input cla id="password" type="password" placeholder="Şifrə təyin edin" class="textinput" name="password"> <br>
                            </div>
                        </div>
                        <div class="col-lg-6 right right_change">
                            <p class="sosial">Sosial şəbəkələrlə qeydiyyat</p>
                            <button class="Facebook">Facebook</button>
                            <button class="Google ">Google</button>
                        </div>
                    </div>
                    <div class="register">
                        <button id="registration">İRƏLİ</button>
                        <a href="/login" class="sxshsb">Şəxsi hesabınız artıq var?</a>
                    </div>
                </div>
            </div>
        </div>

@endsection
