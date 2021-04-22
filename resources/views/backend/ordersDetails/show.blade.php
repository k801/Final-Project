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
                order detail </span>
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
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0"> id</th>
                                <th class="wd-10p border-bottom-0"> order id</th>
                                <th class="wd-10p border-bottom-0"> meals_numbers</th>
                                <th class="wd-10p border-bottom-0">status</th>
                                <th class="wd-10p border-bottom-0"> total price</th>
                                <th class="wd-15p border-bottom-0"> total price</th>
                                <th class="wd-15p border-bottom-0">  user</th>
                                {{-- <th class="wd-20p border-bottom-0"> count</th>
                                <th class="wd-20p border-bottom-0"> Tatal</th> --}}


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetails as $orderDetail )

                                <tr>
                                    {{-- <td>{{ ++$i }}</td> --}}
                                    <td>{{ $orderDetail->id }}</td>
                                    <td>{{ $orderDetail->order_id }}</td>
                                    <td>{{ $orderDetail->meals_numbers }}</td>
                                    <td>{{ $orderDetail->status}}</td>
                                      <td>{{ $orderDetail->total_price }}</td>

                                    <td>{{ $orderDetail->order->order_time}}</td>
                                    <td>{{ $orderDetail->order->user_id}}</td>
                                    {{-- <td> --}}
                                        {{-- @foreach ($orderDetail->roles as $role) {
                                            echo $role->pivot->created_at;
                                        } --}}




                                        {{-- {{ $orderDetail->receipes->name }} --}}

                                    {{-- </td> --}}
                                    {{-- <td>{{ $orderDetail->count }}</td>
                                    <td>{{ $orderDetail->count*$orderDetail->price }}L.E</td> --}}


                                </tr>

                                @endforeach
<tr>
    <td>Total price</td>

    <td colspan="4"></td>

    <td><span>563</span></td>
</tr>
<tr>

<td>
<a href="{{route('Print_order',$orderDetail->order_id)}}">print</a>
</td>
</tr>
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
