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
                    <h4 class="page-title">Endirimli Məhsullar Cədvəli</h4>
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
                                                <input type="text" name="endirim" placeholder="Endirim" class="form-control"><br>

                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success">Yadda saxla</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="container col-6">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="axtar" placeholder="Məsulun adı">
                                    <div class="input-group-append">
                                        <button style="background-color: #233242; color: white" class="btn axtar" type="button">Axtar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr id="less_info">
                                        <th class="text-center" scope="col">#</th>
                                        <th class="text-center" scope="col">ID</th>
                                        <th class="text-center" scope="col">Şəkil</th>
                                        <th class="text-center" scope="col">Ad</th>
                                        <th class="text-center" scope="col">Qiymət</th>
                                        <th class="text-center" scope="col">Endirim</th>
                                        @can('isAdmin')
                                        <th class="text-center" scope="col">Düzəlt/Sil</th>
                                        @endcan
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $key=>$product)
                                        <tr class="tr" id="{{$product->id}}">
                                            <th class="text-center" scope="row">{{$key+1}}</th>
                                            <th class="text-center" scope="row">{{$product->id}}</th>
                                            <td class="text-center"><input class="product-img" type="image" src="{{asset('images/'.$product->sekil1.'')}}"></td>
                                            <td class="text-center name">{{$product->ad}}</td>
                                            <td class="text-center">{{$product->qiymet}}</td>
                                            <td class="text-center">{{$product->endirim}}</td>
                                            @can('isAdmin')
                                            <td class="text-center"><button class="btn btn-info" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil"></i></button><br><br><button class="btn btn-danger" href="#myConfirm" data-toggle="modal"><i class="fa fa-trash"></i></button></td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Modal HTML -->
                            <div id="myConfirm" class="modal fade" name="confirm">
                                <div class="modal-dialog modal-confirm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="icon-box">
                                                <i class="material-icons">&#xE5CD;</i>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Endirimi silmək istədiyinə əminsən?</p>
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

        $('#myConfirm').on("click", ".btn-danger" ,function()
        {
            var endirim = 0;
            var id = $(this).parents('#myConfirm').attr('name');
            var tr = $('#'+id+'');
            $.ajax({
                type: "POST",
                url: "/edit_discount",
                data: {
                    'id':id, 'endirim':endirim, "_token": "{{ csrf_token() }}"
                },
                success:function(response)
                {
                    if(response.message == 'success')
                    {
                        toastr.success('Endirim silindi');
                        tr.remove();
                        sehifele();
                    }
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }
            })
        });




        $(document).on('click' , '.axtar' ,  function () {
            var axtarissozu = $('input[name=axtar]').val().toLowerCase();
            $(".table .tr ").filter(function() {
                $(this).toggle($(this).children('.name').text().toLowerCase().indexOf(axtarissozu) > -1)
            });
        })
        $('table tbody').on('click','.btn-info', function (){
            var id = $(this).parents('tr').attr('id');
            $('#myModal2').attr('name',id);
        });
        $('#myModal2 .modal-footer').on('click','.btn-success',function() {
            var formData = new FormData($('#main_form2')[0]);
            var id = $(this).parents('#myModal2').attr('name');
            var endirim = $('#myModal2 input[name=endirim]').val().trim();
            var tr = $('#'+id+'');
            formData.append('id',id);
            $.ajax({
                type: "POST",
                url: "/edit_discount",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.message == 'success') {
                        toastr.success('Məlumatlar yeniləndi');
                        tr.find('td:eq(3)').text(endirim);
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
