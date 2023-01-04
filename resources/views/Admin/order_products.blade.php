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
                    <h4 class="page-title">Sifariş №{{$order->id}} </h4>
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
                            <div class="container col-2">
                                <br>
                                <!-- Modal -->

                            </div><br>
                            <div class="table-responsive">
                                <table  class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <td >{{$order->id}}</td>
                                        </tr>
                                        <tr>
                                            <th  scope="col">Istifadəçi</th>
                                            <td>{{$order->name." ".$order->surname}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Poçt</th>
                                            <td>{{$order->email}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Telefon nömrəsi</th>
                                            <td>{{$order->phone_number}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Ünvan</th>
                                            <td>{{$order->address}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Təhvil alacaq şəxs</th>
                                            <td>{{$order->reciever}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Poçt kodu</th>
                                            <td>{{$order->post_code}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Şəhər</th>
                                            <td>{{$order->city}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Ödəmə növü</th>
                                            <td>{{$order->payment}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="col">Menecer</th>
                                            <td >{{$order->manager}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Yaranma tarixi</th>
                                            <td>{{$order->created_at}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br><br>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr id="less_info">
                                        <th class="text-center" scope="col">ID</th>
                                        <th class="text-center" scope="col">Məhsul</th>
                                        <th class="text-center" scope="col">Qiymət</th>
                                        <th class="text-center" scope="col">Miqdar</th>
                                        <th class="text-center" scope="col">Cəmi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order_products as $order_product)
                                        <tr>
                                            <td class="text-center">{{$order_product->id}}</td>
                                            <td class="text-center">{{$order_product->ad}}</td>
                                            <td class="text-center">{{$order_product->price}}</td>
                                            <td class="text-center">{{$order_product->quantity}}</td>
                                            <td class="text-center total">{{$order_product->quantity*$order_product->price}}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">Cəmi: <span class="cemi"></span> AZN</td>
                                    </tr>
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
        $(document).ready(function (){
            var sum = 0;
            $('.total').each(function (){
                var price = parseInt($(this).text());
                sum+=price;
            })
            $('.cemi').text(sum);
        })


    </script>

    <!-- ============================================================== -->
    <!-- End Container fluid  -->
@endsection
