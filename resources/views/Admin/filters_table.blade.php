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
                    <h4 class="page-title">Filterlər Cədvəli</h4>
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
                            <div class="elave_divi">
                                @can('isAdmin')<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Əlavə et</button>@endcan
                            </div>


                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Əlavə etmə</h4>
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="main_form">
                                                @csrf
                                                <input type="text" name="filter" placeholder="Filter növü" class="form-control"><br>

                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark">Əlavə et</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="modal fade" id="myModal2" role="dialog" name="">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Düzəliş etmə</h4>
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="main_form2">
                                                @csrf
                                                <input type="text" name="filter" placeholder="Filter növü" class="form-control"><br>

                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success">Yadda saxla</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="table-responsive container">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center" scope="col">ID</th>
                                        <th class="text-center" scope="col">İstehsalçı</th>
                                        @can('isAdmin')<th class="text-center" scope="col">Düzəlt / Sil</th>@endcan
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($filters as $key=>$filter)
                                        <tr id="{{$filter->id}}">
                                            <th class="text-center" scope="row">{{$key+1}}</th>
                                            <td class="text-center">{{$filter->filter}}</td>
                                            @can('isAdmin')<td class="text-center"><button class="btn btn-info" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil"></i></button> <button class="btn ml-1 btn-danger" href="#myConfirm" data-toggle="modal"><i class="fa fa-trash"></i></button></td>@endcan
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Modal HTML -->
                            <div id="myConfirm" class="modal fade" name="">
                                <div class="modal-dialog modal-confirm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="icon-box">
                                                <i class="material-icons">&#xE5CD;</i>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Bu məlumatları silmək istədiyinə əminsən?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info" data-dismiss="modal">Xeyr</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Bəli</button>
                                        </div>
                                    </div>
                                </div>
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
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <script>
        function sehifele() {
            var i = 0;
            $('tbody tr').each(function () {
                $(this).find('th:eq(0)').text(++i);
            })
        }

        $('table tbody').on('click','.btn-danger',function(){
            var id = $(this).parents('tr').attr('id');
            $('#myConfirm').attr('name',id);
        });

        $('.modal-footer').on('click','.btn-dark',function(){
            var formData = new FormData($('#main_form')[0]);
            var filter = $('input[name=filter]').val().trim();
            $.ajax({
                type: "POST",
                url: "add_filter",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.message == 'success') {
                        toastr.success('İstehsalçı Əlavə olundu');
                        $('tbody').append('<tr id="' + response.id + '">' +
                            '<th class="text-center" scope="row"></th>\n' +
                            '<td class="text-center">' + filter + '</td>\n' +
                            '<td class="text-center"><button class="btn btn-info" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil"></i></button><button class="btn btn-danger ml-1" href="#myConfirm" data-toggle="modal"><i class="fa fa-trash"></i></button></td>\n' +
                            '</tr>');
                        $('#myModal').modal('hide');
                        sehifele();
                    }
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }
            });
        });

        $('#myConfirm').on("click", ".btn-danger" ,function()
        {
            var id = $(this).parents('#myConfirm').attr('name');
            var tr = $('#'+id+'');
            $.ajax({
                type: "POST",
                url: "delete_filter",
                data: {
                    'id':id, "_token": "{{ csrf_token() }}"
                },
                success:function(response)
                {
                    if(response.message == 'success')
                    {
                        toastr.success('Filter növü silindi')
                        tr.remove();
                        sehifele();
                    }
                }
            })
        });
        $('table tbody').on('click','.btn-info', function (){
            var id = $(this).parents('tr').attr('id');
            $('#myModal2').attr('name',id);
        });
        $('#myModal2 .modal-footer').on('click','.btn-success',function() {
            var formData = new FormData($('#main_form2')[0]);
            var id = $(this).parents('#myModal2').attr('name');
            var filter = $('#myModal2 input[name=filter]').val().trim();
            var tr = $('#'+id+'');
            formData.append('id',id);
            $.ajax({
                type: "POST",
                url: "/edit_filter",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.message == 'success') {
                        toastr.success('Məlumatlar yeniləndi');
                        tr.find('td:eq(0)').text(filter);
                        $('#myModal2').modal('hide');
                    }
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }
            });
        });
    </script>
@endsection
