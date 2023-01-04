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
                    <h4 class="page-title">Məhsul Əlavə et</h4>
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
                            <div class="container col-6">
                                <br>
                                <!-- Modal -->
                                <form id="main_form">
                                    @csrf
                                    <label class="form-control">Excel faylını daxil edin</label>
                                    <input type="file" class="form-control" name="excel">
                                </form>
                                <button type="button" class="btn btn-lg btn-dark offset-5 add_excel">Əlavə et</button>
                            </div><br>

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
        $('.col-6').on('click','.add_excel',function(){
            var formData = new FormData($('#main_form')[0]);
            $.ajax({
                type: "POST",
                url: "add_product_excel",
                data: formData,
                cache:false,
                processData:false,
                contentType:false,
                success:function (response){
                    if (response.message == 'success') {
                        toastr.success('Məhsullar Əlavə olundu');
                        $('input[name=excel]').val('');
                    }
                },
                error: function (request, error, response) {
                    toastr.error('Xəta baş verdi!');
                }
            });
        });

    </script>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
@endsection
