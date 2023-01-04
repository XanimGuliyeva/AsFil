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
                    <h4 class="page-title">İstifadəçilər Cədvəli</h4>
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
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center" scope="col">ID</th>
                                        <th class="text-center" scope="col">Ad</th>
                                        <th class="text-center" scope="col">Email</th>
                                        @can('isAdmin')<th class="text-center" scope="col">Düzəlt</th>@endcan
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $key=>$user)
                                        <tr id="{{$user->id}}">
                                            <th class="text-center" scope="row">{{$key+1}}</th>
                                            <td class="text-center">{{$user->name}}</td>
                                            <td class="text-center">{{$user->email}}</td>
                                            @can('isAdmin')<td class="text-center"><button class="btn btn-info add_admin" id="{{$user->id}}">Admin et</button></td>@endcan
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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

        $('.add_admin').on("click", function()
        {
            var id = $(this).attr('id');
            var tr = $('#'+id+'');
            $.ajax({
                type: "POST",
                url: "add_admin",
                data: {
                    'id':id, "_token": "{{ csrf_token() }}"
                },
                success:function(response)
                {
                    if(response.message == 'success')
                    {
                        toastr.success('Admin əlavə olundu!');
                        tr.remove();
                        sehifele();
                    }
                }
            })
        });
    </script>
@endsection
