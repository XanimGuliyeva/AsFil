


@extends('Admin.index')
@section('body')
    <script src="/assets/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <textarea name="text" id="myTextarea" class="tinymce">
                        Welcome to TinyMCE!
                    </textarea>
                    <div class="container-fluid d-flex justify-content-center mt-2">
                        <button  class=" btn btn-success">Yadda Saxla</button>
                    </div>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="admin_main_table">Ev</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Endirimli Məhsullar Cədvəli</li>
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

                            <!-- Modal HTML -->
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
    <script>


        tinymce.init({
            selector: '.tinymce',
            height: 400,
            verify_html: false,
            theme: 'silver',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen table',
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help | tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
            image_advtab: true,
            templates: [{
                title: 'Test template 1',
                content: 'Test 1'
            },
                {
                    title: 'Test template 2',
                    content: 'Test 2'
                }
            ],
            content_css: []
        });

        $(document).on('click' , '.btn-success' , function (){
            var myContent = tinymce.get("myTextarea").getContent();
            $.ajax({
                type: "POST",
                url: "/about_us",
                data: myContent,
                cache: false,
                processData: false,
                contentType: false,
                success: function (response) {
                    toastr.success('Məlumatlar yeniləndi');
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }
            });

        })

    </script>

    <!-- ============================================================== -->
    <!-- End Container fluid  -->
@endsection

