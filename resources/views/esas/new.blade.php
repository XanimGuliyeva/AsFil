@extends('esas.index')
@section('main')
    @if(isset($new))
        <h1 class="news_header">{{$new->header}}</h1>
        <div class="col-9 container">
            {!! $new->content !!}
        </div>
    @endif
@endsection
