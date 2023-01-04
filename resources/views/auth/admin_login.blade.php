<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="{{asset('slick/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('slick/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('slick/css/bootstrap.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('/css/mediaquery.css')}}">
    <link rel="stylesheet" href="{{asset('/css/simple-rating.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/jquery.rateyo.min.css')}}">
    <script src="{{asset('/js/fontawasome.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/toast.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('/js/index.js')}}"></script>


    <title>Admin</title>
</head>
    <div class="Loginmain" style="margin-top: 100px;">
        <div class="sexsimelumatlar">
            <div class="container logintext">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 left">
                            <p style="font-size: 25px;color: black; text-align: center; font-weight: bold; margin-top: 30px" >Daxil ol</p>
                            <div class="inpdiv">
                                <input id="email" type="text" placeholder="Email" class="textinput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> <br>
                                @error('email')
                                <div style="display: inline;" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="inpdiv">
                                <input id="password" type="password" placeholder="Şifrə" class="textinput @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> <br>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <button type="submit">İRƏLİ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

