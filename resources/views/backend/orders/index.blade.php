@extends('backend.layout.master')
@section('css')

@section('title')
Dinner Club
@stop

<!-- Internal Data table css -->

<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">orders</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                orders List</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- row opened -->
<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="col-sm-1 col-md-2">
                        <a class="btn btn-primary btn" href="{{ route('orders.create') }}"> New</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0"> order Number</th>
                                <th class="wd-15p border-bottom-0"> user name</th>
                                <th class="wd-15p border-bottom-0"> user email </th>
                                <th class="wd-20p border-bottom-0" colspan="2"> orderdetails</th>
                                <th class="wd-20p border-bottom-0"> countreceipes </th>
                                <th class="wd-20p border-bottom-0"> Total Price </th>
                                <th class="wd-15p border-bottom-0" colspan="2"> Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php  $i=0 ?>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $order->id}}</td>
                                    <td>{{ $order->username}}</td>
                                    <td>{{ $order->useremail}}</td>
                                    <td colspan="2">{{ $order->orderdetails}}</td>
                                    <td>{{ $order->countreceipes}}</td>
                                    <td>{{ $order->totalprice}}</td>
                                    <td colspan="2">
                                        <form action="{{ route('orders.edit', $order->id) }}" class="d-inline" method="POST">
                                       @csrf
                                       @method("get")
                                            <button class="btn btn-sm text-light btn-success"
                                           ><i class="las la-pen"></i></button>

                                        </form>
                                        <form action="{{ route('orders.destroy', $order->id) }}" class="d-inline" method="POST">
                                            @csrf
                                            @method("delete")
                                                 <button class="btn btn-sm text-light btn-danger"
                                                ><i class="las la-trash"></i></button>

                                             </form>

                                             <form action="{{ route('ordersDetails.show', $order->id) }}" class="d-inline" method="POST">
                                                @csrf
                                                @method("get")
                                                     <button class="btn btn-sm text-light btn-info"
                                                    > <i class="fas fa-eye"></i>

                                                 </form>

                                        </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->

</div>

</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>

@endsection
