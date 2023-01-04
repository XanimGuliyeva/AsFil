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
                                <form id="add_product">
                                    @csrf
                                    <p>Əsas şəkil:</p>
                                    <input type="file" name="sekil1" accept="image/*" placeholder="Şəkil1" class="form-control"><br>
                                    <p>İnkinci şəkil:</p>
                                    <input type="file" name="sekil2" accept="image/*" placeholder="Şəkil2" class="form-control"><br>
                                    <p>Üçüncü şəkil:</p>
                                    <input type="file" name="sekil3" accept="image/*" placeholder="Şəkil3" class="form-control"><br>
                                    <input type="text" name="ad" placeholder="Məsul adı" class="form-control"><br>
                                    <input type="text" name="ambar_kodu" placeholder="Anbar kodu" class="form-control"><br>
                                    <input type="text" name="istehsalci_kodu" placeholder="İstehsalçı kodu" class="form-control"><br>
                                    <textarea name="haqqinda"  placeholder="Haqqında məlumat" class="form-control "></textarea><br>
                                    <select name="filtr" class="form-control filtr" id="">
                                        @foreach($filters as $filter)
                                            <option disabled selected value="" class="d-none">Filtr növü</option>
                                            <option value="{{$filter->id}}">{{$filter->filter}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <select name="teyinat" class="form-control teyinat" id="">
                                        @foreach($categories as $category)
                                            <option disabled selected value="" class="d-none">Təyinat sahəsi</option>
                                            <option value="{{$category->id}}">{{$category->teyinat}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <select name="istehsalci" class="form-control istehsalci" id="">
                                        <option disabled selected value="" class="d-none">Istehsalçı adı</option>
                                        @foreach($producers as $producer)
                                            <option value="{{$producer->id}}">{{$producer->istehsalci}}</option>
                                        @endforeach
                                    </select><br>
                                    <input type="text" name="qiymet" placeholder="Qiymət" class="form-control"><br>
                                </form>
                                <button type="button" class="btn btn-lg btn-dark offset-5">Əlavə et</button>
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



        $('.col-6').on('click','.btn-dark',function(){
            var formData = new FormData($('#add_product')[0]);
            $.ajax({
                type: "POST",
                url: "/add_product",
                data: formData,
                cache:false,
                processData:false,
                contentType:false,
                success:function (response){
                    if (response.message == 'success') {
                        toastr.success('Məhsul Əlavə olundu');
                        $('input[name=sekil1]').val('');
                        $('input[name=sekil2]').val('');
                        $('input[name=sekil3]').val('');
                        $('input[name=ad]').val('');
                        $('input[name=ambar_kodu]').val('');
                        $('input[name=istehsalci_kodu]').val('');
                        $('textarea[name=haqqinda]').val('');
                        $('input[name=qiymet]').val('');
                        $('select[name=istehsalci]').val('');
                        $('select[name=filtr]').val('');
                        $('select[name=teyinat]').val('');
                    }
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }
            });
        });

    </script>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
@endsection
