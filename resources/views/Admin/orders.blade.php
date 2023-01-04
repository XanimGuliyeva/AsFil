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
                    <h4 class="page-title">Sifarişlər Cədvəli</h4>
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
                                    <input id="myInput" type="text" class="form-control" name="axtar" placeholder="Məsulun adı">
                                    <div class="input-group-append">
                                        <select  style="background-color: #233242; color: white; width: 150px;" class="btn select" type="button">
                                            <option value="email">Poçta görə</option>
                                            <option value="number">Nömrəyə  görə</option>
                                            <option value="created_at">Yaranma tarixinə görə</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr id="less_info">
                                        <th class="text-center" scope="col">#</th>
                                        <th class="text-center" scope="col">ID</th>
                                        <th class="text-center" scope="col">Poçt</th>
                                        <th class="text-center" scope="col">Telefon nömrəsi</th>
                                        <th class="text-center" scope="col">Ünvan</th>
                                        <th class="text-center" scope="col">Menecer</th>
                                        <th class="text-center" scope="col">Yaranma tarixi</th>
                                        <th class="text-center" scope="col">Bax @can('isAdmin')/Düzəlt/Sil @endcan </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $key=>$order)
                                        <tr class="tr" data-token="{{$order->order_token}}" id="{{$order->id}}">
                                            <td class="text-center">{{$key + 1}}</td>
                                            <td class="text-center">{{$order->id}}</td>
                                            <td class="text-center email">{{$order->email}}</td>
                                            <td class="text-center number">{{$order->phone_number}}</td>
                                            <td class="text-center address">{{$order->address}}</td>
                                            <td class="text-center">{{$order->manager}}</td>
                                            <td class="text-center created_at">{{date("d-m-Y h:i", strtotime($order->created_at))}}</td>
                                            <td style="width: 200px" class="text-center"><a href="order_products/{{$order->order_token}}"><button class="btn btn-warning"><i class="fa fa-eye"></i></button></a>@can('isAdmin')<a><button class="btn btn-info ml-1"><i class="fa fa-pencil"></i></button></a><button class="btn btn-danger ml-1" href="#myConfirm" data-toggle="modal"><i class="fa fa-trash"></i></button>@endcan</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Modal HTML -->
                            <div id="myConfirm" class="modal fade" data-token="" name="confirm">
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
    <script>
        function sehifele() {
            var i = 0;
            $('tbody tr').each(function () {
                $(this).find('th:eq(0)').text(++i);
            })
        }
        $('table tbody').on('click','.btn-danger',function(){
            var id = $(this).parents('tr').attr('id');
            var token = $(this).parents('tr').data('token');
            $('#myConfirm').attr('name',id);
            $('#myConfirm').data('token',token);
        });
        $('#myConfirm').on("click", ".btn-danger" ,function()
        {
            var id = $(this).parents('#myConfirm').attr('name');
            var token = $(this).parents('#myConfirm').data('token');
            console.log(id)
            var tr = $('#'+id+'');

            $.ajax({
                type: "POST",
                url: "delete_order",
                data: {
                    'id':id, 'token':token, "_token": "{{ csrf_token() }}"
                },
                success:function(response)
                {
                    if(response.message == 'success')
                    {
                        toastr.success('Sifariş silindi!')
                        $(tr).remove();
                        sehifele();
                    }
                }
            })
        });
        $('table tbody').on('click','.btn-info', function (){
            var id = $(this).parents('tr').attr('id');
            var tr = $('#' + id);
            var emailtd = tr.find('.email');
            var email = emailtd.text();
            var numbertd = tr.find('.number');
            var number = numbertd.text();
            var addersstd = tr.find('.address');
            var address = addersstd.text();
            emailtd.html('<input type="email" class="form-control" name = "email" value="'+email+'">');
            numbertd.html('<input type="text" class="form-control" name = "number" value="'+number+'">');
            addersstd.html('<input type="text" class="form-control" name = "adderss" value="'+address+'">');
            $(this).removeClass('btn-info').addClass('btn-success');
            $(this).html('<i class="fa fa-save"></i>');
        });
        $('table tbody').on('click','.btn-success', function () {
            var id = $(this).parents('tr').attr('id');
            var tr = $('#' + id);
            var button = $(this);
            var email = tr.children('.email').children('input').val();
            var number = tr.children('.number').children('input').val();
            var address = tr.children('.address').children('input').val();
            var emailtd = tr.find('.email');
            var numbertd = tr.find('.number');
            var addersstd = tr.find('.address');
            $.ajax({
                type: "POST",
                url: "edit_order",
                data: {'id':id,'email':email,'number':number,'address':address , "_token": "{{ csrf_token() }}"
                },
                success: function (response) {
                    if (response.message == 'success') {
                        toastr.success('Dəyişikliklər yadda saxlanıldı!');
                        button .removeClass('btn-success').addClass('btn-info');
                        button.html('<i class="fa fa-pencil"></i>');
                        emailtd.html(email);
                        numbertd.html(number);
                        addersstd.html(address);

                    }
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }
            });
        });

        $(document).ready(function(){
            $("#myInput").on("keyup", function () {
                var axtarissozu = $('input[name=axtar]').val().toLowerCase();
                var td = $('.select').children("option:selected").val();
                    $(".table .tr").filter(function() {
                        $(this).toggle($(this).children('.'+td).text().toLowerCase().indexOf(axtarissozu) > -1)
                    });
            });
        });

    </script>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
@endsection
