@extends('esas.index')
@section('main')
  @foreach($about as $aboutus)
      <div class="col-9 container" style="margin-top: 50px;">
          <p style="font-family: Helvetica;
          margin-bottom: 50px;
    font-size: 22px;
    font-weight: bold;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    letter-spacing: -0.4px;
    text-align: center;
    color: #000000;">HAQQIMIZDA</p>
          {!! $aboutus->content !!}
      </div>
  @endforeach
@endsection
