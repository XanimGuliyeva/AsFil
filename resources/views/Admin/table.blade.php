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
                    <h4 class="page-title">Məhsullar Cədvəli</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="admin_main_table">Ev</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Əsas Cədvəl</li>
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
                                        @can('isAdmin')
                                        <th class="text-center" scope="col">Düzəlt/Sil</th>
                                            <th class="text-center" scope="col">#</th>
                                        <th class="text-center" scope="col">ID</th>
                                        <th class="text-center" scope="col">Mövcudluq</th>
                                        <th class="text-center" scope="col">Status</th>
                                        @endcan
                                        <th class="text-center" scope="col">Ad</th>
                                        <th class="text-center" scope="col">Şəkil</th>
                                        <th class="text-center" scope="col">Ambar kodu</th>
                                        <th class="text-center" scope="col">İstehsalçı kodu</th>
                                        <th class="text-center" scope="col">Filtr</th>
                                        <th class="text-center" scope="col">Təyinat</th>
                                        <th class="text-center" scope="col">Qiymət</th>
                                        <th class="text-center" scope="col">Reytinq</th>
                                        <th class="text-center" scope="col">İstehsalçı</th>
                                        <th class="text-center" scope="col">Baxış</th>
                                        <th class="text-center" scope="col">Endirim</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $key=>$product)
                                        <tr class="tr" id="{{$product->id}}">
                                            @can('isAdmin')
                                            <td class="text-center"><a href="edit_product/{{$product->id}}"><button class="btn btn-info"><i class="fa fa-pencil"></i></button></a><br><br><button class="btn btn-danger" href="#myConfirm" data-toggle="modal"><i class="fa fa-trash"></i></button></td>
                                            <th class="text-center" scope="row">{{$key+1}}</th>
                                                <th class="text-center" scope="row">{{$product->id}}</th>
                                            <th class="text-center existence" scope="row">@if($product->movcudluq == 1) <button class="btn btn-dark close_product">Açıqdır</button> @else <button class="btn btn-dark open_product">Bağlıdır</button> @endif</th>
                                            <th class="text-center status" scope="row">@if($product->status == 1) <button class="btn btn-dark bagla_status"><i class="fa fa-power-off"></i></button> @else <button class="btn btn-dark ac_status"><i class="fa fa-power-off"></i></button> @endif</th>
                                            @endcan
                                            <td class="text-center name">{{$product->ad}}</td>
                                            <td class="text-center"><input class="product-img" type="image" src="{{asset('images/'.$product->sekil1.'')}}"></td>
                                            <td class="text-center">{{$product->ambar_kodu}}</td>
                                            <td class="text-center">{{$product->istehsalci_kodu}}</td>
                                            <td class="text-center">{{$product->filtr}}</td>
                                            <td class="text-center">{{$product->teyinat}}</td>
                                            <td class="text-center">{{$product->qiymet}}</td>
                                            <td class="text-center">{{$product->reytinq}}</td>
                                            <td class="text-center">{{$product->istehsalci}}</td>
                                            <td class="text-center">{{$product->baxis}}</td>
                                            <td class="text-center">{{$product->endirim}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 d-flex justify-content-around my-5" id="pagination_links">
                                {{ $products->links() }}
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

        $('#myConfirm').on("click", ".btn-danger" ,function()
        {
            var id = $(this).parents('#myConfirm').attr('name');
            var tr = $('#'+id+'');
            $.ajax({
                type: "POST",
                url: "{{route('delete_product')}}",
                data: {
                    'id':id, "_token": "{{ csrf_token() }}"
                },
                success:function(response)
                {
                    if(response.message == 'success')
                    {
                        toastr.success('Məhsul silindi');
                        tr.remove();
                        sehifele();
                    }
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }
            })
        });


        $(document).on("click", ".close_product" ,function()
        {
            var id = $(this).parents('tr').attr('id');
            $.ajax({
                type: "POST",
                url: "{{route('close_existence')}}",
                data: {
                    'id':id, "_token": "{{ csrf_token() }}"
                },
                success:function(response)
                {
                    if(response.message == 'success')
                    {
                        toastr.success('Məhsul artıq mövcud deyil');
                        $('#'+id+'').find('.existence').html('<button class="btn btn-dark open_product">Bağlıdır</button>');
                    }
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }
            })
        });

        $(document).on("click", ".open_product" ,function()
        {
            var id = $(this).parents('tr').attr('id');
            $.ajax({
                type: "POST",
                url: "{{route('open_existence')}}",
                data: {
                    'id':id, "_token": "{{ csrf_token() }}"
                },
                success:function(response)
                {
                    if(response.message == 'success')
                    {
                        toastr.success('Məhsul artıq mövcuddur');
                        $('#'+id+'').find('.existence').html('<button class="btn btn-dark close_product">Açıqdır</button>');

                    }
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }

            });
        });
        $(document).on("click", ".plus_div .btn-light" ,function()
        {
            $('.plus_div').html('<input type="text" class="form-control" name="filter" placeholder="Filter növü daxil edin">');
            $('.plus_div').append('<button class="btn btn-light artir">Əlavə et</button>');
        });

        $(document).on("click", ".ac_status" ,function()
        {
            var id = $(this).parents('tr').attr('id');
            $.ajax({
                type: "POST",
                url: "{{route('open_status')}}",
                data: {
                    'id':id, "_token": "{{ csrf_token() }}"
                },
                success:function(response)
                {
                    if(response.message == 'success')
                    {
                        toastr.success('Məhsul aktivləşdirildi');
                        $('#'+id+'').find('.status').html('<button class="btn btn-dark bagla_status"><i class="fa fa-power-off"></i></button>');
                    }
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }
            })
        });

        $(document).on("click", ".bagla_status" ,function()
        {
            var id = $(this).parents('tr').attr('id');
            $.ajax({
                type: "POST",
                url: "{{route('close_status')}}",
                data: {
                    'id': id, "_token": "{{ csrf_token() }}"
                },
                success: function (response) {
                    if (response.message == 'success') {
                        toastr.success('Məhsul deaktivləşdirildi');
                        $('#'+id+'').find('.status').html('<button class="btn btn-dark ac_status"><i class="fa fa-power-off"></i></button>');
                    }
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }
            })
        })
        $(document).on('click' , '.axtar' ,  function () {
            var axtarissozu = $('input[name=axtar]').val().toLowerCase();
            $(".table .tr ").filter(function() {
                $(this).toggle($(this).children('.name').text().toLowerCase().indexOf(axtarissozu) > -1)
            });
        })
    </script>
@endsection
