@extends('Admin.index')
@section('body')
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Xəbərlər düzəliş et</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/admin">Ev</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Xəbərlər düzəliş et</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(isset($new))
                                    <form id="edit_news">
                                        @csrf
                                        <input class="form-control" name="header" type=text placeholder="Başlıq" value="{{$new->header}}"><br>
                                        <label>Başlıq şəkli (Dəyişmək istəyirsinizsə)</label><br>
                                        <img class="header_pic" style="width: 250px; height: 310px;" src="{{asset('images/'.$new->image)}}"><br><br>
                                        <input type="file" name="image_"><br><br>
                                        <textarea name="text" id="myTextarea" class="tinymce">{!! $new->content !!}</textarea>
                                        <br>
                                        <input name=image type=file id="upload" hidden onchange=""><br>
                                    </form>
                                    <button type="button" class="edit_news btn btn-lg btn-dark offset-5" name="{{$new->id}}">Yerləşdir</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
    </div>
@endsection
