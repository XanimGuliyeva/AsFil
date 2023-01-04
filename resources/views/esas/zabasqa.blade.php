@extends('esas.index')
@section('main')
    <div class="sexsi">
        <div class="container">
            <div class="text">
                <p>ŞƏXSİ HESABIN YARADILMASI</p>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="rd-btns">
            <div class="container login">
                <div class="row">
                    <div class="col-lg-4 ">
                        <input type="radio" id="category" class="input @error('category') is-invalid @enderror"   name="category" checked="checked" deyer="fizikisexskimi" value="normal" required autocomplete="normal">
                        <label for="fzk" class=" text1">Fiziki  şəxs kimi alış-veriş üçün</label>
                    </div>
                    <div class="col-lg-4 " >
                        <input type="radio" id="category" class="input @error('category') is-invalid @enderror"  name="category" value="company" deyer="sirketkimi" required autocomplete="company">
                        <label for="srkt" class="text ">Şirkət kimi aliş-veriş üçün</label>
                    </div>
                    <div class="col-lg-4 ">
                        <input type="radio" id="category" class="input @error('category') is-invalid @enderror"  name="category"  value="agent" deyer="satisagentikimi" required autocomplete="agent">
                        <label for="sts" class="text ">Satış agenti kimi</label>
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
                                <input id="name" type="text" placeholder="Adınız" class="textinput @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> <br>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input id="surname" type="text" placeholder="Soyadınız" class="textinput @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus> <br>
                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input id="phone" type="text" placeholder="Telefon" class="textinput  @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus> <br>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input id="email" type="email" placeholder="Email" class="textinput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> <br>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input id="password" type="password" placeholder="Şifrə təyin edin" class="textinput @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus> <br>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input id="password-confirm" type="password" placeholder="Təkrar şifrə" class="textinput" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <button type="submit">İRƏLİ</button>
                            <a href="/login" class="sxshsb">Şəxsi hesabınız artıq var? </a>
                        </div>
                        <div class="col-lg-6 right right_change">
                            <p class="sosial">Sosial şəbəkələrlə qeydiyyat</p>
                            <button class="Facebook">Facebook</button>
                            <button class="Google ">Google</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="sirketkimi radioinfo">
            <div class="sexsimelumatlar">
                <div class="container logintext">
                    <div class="row">
                        <div class="col-lg-6 left main_inputs">
                            <p class="sxsm">Şəxsi məlumatlar</p>
                            <p class="mutleqxana">* mütləq xanalar </p>
                            <div class="inpdiv">
                                <span>*</span>
                                <input id="name" type="text" placeholder="Adınız" class="textinput @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> <br>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input id="surname" type="text" placeholder="Soyadınız" class="textinput @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus> <br>
                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input id="phone" type="text" placeholder="Telefon" class="textinput  @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus> <br>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input id="email" type="email" placeholder="Email" class="textinput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> <br>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input id="password" type="password" placeholder="Şifrə təyin edin" class="textinput @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus> <br>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input id="password-confirm" type="password" placeholder="Təkrar şifrə" class="textinput" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="col-lg-6 right right_change">
                            <p class="sxsm">Şirkət məlumatları</p>
                            <div class="inpdiv">
                                <span>*</span>
                                <input type="text" placeholder="Şirkət" class="textinput"> <br>
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input type="text" placeholder="Ünvan" class="textinput"> <br>

                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input type="text" placeholder="VÖEN" class="textinput"> <br>
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input type="text" placeholder="Rəhbər vəzifə" class="textinput"> <br>
                            </div>
                            <div class="inpdiv">
                                <span>*</span>
                                <input type="text" placeholder="Rəhbərin Soyadı Adı" class="textinput"> <br>
                            </div>
                        </div>
                    </div>
                    <button>İRƏLİ</button> <br>
                    <a href="/login">Şəxsi hesabınız artıq var? </a>
                </div>
            </div>

        </div>

        <div class="satisagentikimi radioinfo">
            <div class="container logintext">
                <div class="row">
                    <div class="col-lg-6 left main_inputs">
                        <p class="sxsm">Şəxsi məlumatlar</p>
                        <p class="mutleqxana">* mütləq xanalar </p>
                        <div class="inpdiv">
                            <span>*</span>
                            <input id="name" type="text" placeholder="Adınız" class="textinput @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> <br>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="inpdiv">
                            <span>*</span>
                            <input id="surname" type="text" placeholder="Soyadınız" class="textinput @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus> <br>
                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="inpdiv">
                            <span>*</span>
                            <input id="phone" type="text" placeholder="Telefon" class="textinput  @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus> <br>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="inpdiv">
                            <span>*</span>
                            <input id="email" type="email" placeholder="Email" class="textinput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> <br>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="inpdiv">
                            <span>*</span>
                            <input id="password" type="password" placeholder="Şifrə təyin edin" class="textinput @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus> <br>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="inpdiv">
                            <span>*</span>
                            <input id="password-confirm" type="password" placeholder="Təkrar şifrə" class="textinput" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="col-lg-6 right_change">
                        <p class="sxsm">Şirkət məlumatları</p>
                        <select name="teskilatlar" class="teskilatlar" id="selectBox">
                            <option value="Hüquqi təşkilat" disabled selected hidden>Hüquqi təşkilat</option>
                            <option  value="mmc">MMC</option>
                            <option  value="fzksxs">Fiziki şəxs</option>
                        </select>
                        <div class="inpdiv inputs mmc" id="mmc">
                            <span>*</span>
                            <input type="text" placeholder="MMC-nin adı" class="textinput"> <br>
                        </div>
                        <div class="inpdiv inputs fzksx yeni" id="fzksxs" style="display: none;">
                            <span>*</span>
                            <input type="text" placeholder="Fiziki şəxsin adı" class="textinput"> <br>
                        </div>
                        <div class="inpdiv">
                            <span>*</span>
                            <input type="text" placeholder="Ünvan" class="textinput"> <br>
                        </div>
                        <div class="inpdiv">
                            <span>*</span>
                            <input type="text" placeholder="VÖEN" class="textinput"> <br>
                        </div>
                        <div class="inpdiv rehber" >
                            <span>*</span>
                            <input type="text" placeholder="Rəhbər vəzifə " class="textinput"> <br>
                        </div>
                        <div class="inpdiv rehber">
                            <span>*</span>
                            <input type="text" placeholder="Rəhbərin Soyadı Adı" class="textinput"> <br>
                        </div>
                        <div class="inpdiv">
                            <span>*</span>
                            <input type="text" placeholder="Bank" class="textinput"> <br>
                        </div>
                        <div class="inpdiv">
                            <span>*</span>
                            <input type="text" placeholder="H/Hesab" class="textinput"> <br>
                        </div>
                        <div class="inpdiv">
                            <span>*</span>
                            <input type="text" placeholder="M/Hesab" class="textinput"> <br>
                        </div>
                    </div>
                </div>
                <button>İRƏLİ</button> <br>
                <a href="/login">Şəxsi hesabınız artıq var? </a>
            </div>
        </div>
    </form>

@endsection
