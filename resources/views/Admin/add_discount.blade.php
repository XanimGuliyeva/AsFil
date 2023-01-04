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
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success">Yadda saxla</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between">
                                <div class="col-2">
                                    <p  style="color: #00acee;cursor: pointer;font-size: 20px"><input class="hamisi" type="checkbox"> Hamısını Seç</p>
                                </div>
                                <div class=" col-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="axtar" placeholder="Məsulun adı">
                                        <div class="input-group-append">
                                            <button style="background-color: #233242; color: white" class="btn axtar" type="button">Axtar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="endirim" placeholder="Endirim(%)">
                                        <div class="input-group-append">
                                            <button style="background-color: #233242; color: white" class="btn elave" type="button">Əlavə et</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr id="less_info">
                                        <th class="text-center" scope="col">Seç</th>
                                        <th class="text-center" scope="col">#</th>
                                        <th class="text-center" scope="col">ID</th>
                                        <th class="text-center" scope="col">Şəkil</th>
                                        <th class="text-center" scope="col">Ad</th>
                                        <th class="text-center" scope="col">Qiymət</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $key=>$product)
                                        <tr class="tr" >
                                            <th class="text-center" scope="row"><input class="sec" id="{{$product->id}}" type="checkbox"></th>
                                            <th class="text-center" scope="row">{{$key+1}}</th>
                                            <th class="text-center" scope="row">{{$product->id}}</th>
                                            <td class="text-center"><input class="product-img" type="image" src="{{asset('images/'.$product->sekil1.'')}}"></td>
                                            <td class="text-center name">{{$product->ad}}</td>
                                            <td class="text-center">{{$product->qiymet}}</td>
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
        $('.hamisi').change(function (){
            if(this.checked){
                $('.sec').prop('checked', true);
            }
            else {
                $('.sec').prop('checked', false);
            }

        })
        $(document).on('click' , '.elave' , function (){
            var ids = [];
            $('.sec:checked').each(function (){
                ids.push($(this).attr('id'));
            })
            var endirim = $('input[name=endirim]').val();
            $.ajax({
                type: "POST",
                url: "add_discount",
                data: {'ids':ids , 'endirim':endirim ,"_token": "{{ csrf_token() }}"
                },
                success: function (response) {
                    if (response.message == 'success') {
                        $('.sec:checked').each(function (){
                            $(this).parents('tr').remove();
                        })

                        toastr.success('Endirim Əlavə olundu');
                        sehifele();
                    }
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                }
            });
        });

    </script>
@endsection
