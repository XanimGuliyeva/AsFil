@extends('esas.index')
@section('main')
    <div class="sexsi">
        <div class="container">
            <div class="text">
                <p>ŞƏXSİ HESABA GİRİŞ</p>
            </div>
        </div>
    </div>
    <div class="Loginmain">
        <div class="sexsimelumatlar">
            <div class="container logintext">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 left yenisxsm">
                            <p class="sxsm" style="margin-left: 35px">Şəxsi məlumatlar</p>
                            <p class="mutleqxana" style="margin-right: 90px;">* mütləq xanalar </p>
                            <div class="inpdiv">
                                <span style="margin-right: 90px;position: absolute;font-size: 20px;z-index: 15;right: 15px;top: 25px;color: #698aab;">*</span>
                                <input id="email" type="text" placeholder="Email" class="textinput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> <br>
                                @error('email')
                                    <div style="display: inline;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="inpdiv">
                                <span style="margin-right: 90px;position: absolute;font-size: 20px;z-index: 15;right: 15px;top: 25px;color: #698aab;">*</span>
                                <input id="password" type="password" placeholder="Şifrə" class="textinput @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> <br>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <button style="width: 360px;height: 50px" type="submit">İRƏLİ</button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" style="margin-right: 225px;border: none"  href="{{ route('password.request') }}">
                                    {{ __('Şifrənizi unutmusunuz?') }}
                                </a><br>
                            @endif
                            <a href="/register" style="margin-left: -173px;border: none" class="btn btn-link">Şəxsi yoxdur? Yeni hesab yarat</a>
                        </div>
                        <div class="col-lg-6 right yeniright">
                            <p class="sosial">Sosial şəbəkələrlə qeydiyyat</p>
                            <button style="padding:15px 120px" class="Facebook">Facebook</button>
                            <button style="padding:15px 130px" class="Google ">Google</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
