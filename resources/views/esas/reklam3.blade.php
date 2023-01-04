@extends('esas.index')
@section('main')
    @foreach($reklam3 as $reklam)
        <div class="col-9 container">
            {!! $reklam->content !!}
        </div>

    @endforeach
@endsection
