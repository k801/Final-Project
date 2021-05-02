@extends('front.master')
@section('style') @endsection

<link href="{{asset('css/details.css')}}" rel="stylesheet">
<link href="{{asset('css/recipes.css')}}" rel="stylesheet">
@section('content')
<section id="details_main">
    <div class="details_inner clearfix container">
      <div class="row">
          <div class="details_main_1">
               <h1>Shpping Cart</h1>
               <ul>
                    <li><a href="{{route('homePage.index')}}">Home</a></li>
                    <li><i class="fa fa-angle-double-right"></i></li>
                    <li> Shoping Cart </li>
               </ul>
          </div>
      </div>
    </div>
</section>
@if(Session::has('cart'))
<div class="container-fluid   bg-danger">
	<div class="row div_row col-md-8">
        @foreach($reciepe as $reciepe)
		<div class="col-sm-4">
			<div class="card clearfix">
			<ul class="list-group">

                  <li class="lis-group-item">
                  <span class="badge text-center ">{{$reciepe['qty']}}</span>
                  <h5 class="rec_name">{{$reciepe['item']['name']}}</h5>
                  <span class="label label-success" id="price">{{$reciepe['item']['price']}}</span>
                  <img src="{{asset('images')}}/{{$reciepe['item']['image']}}" alt="Card image"class=" img-responsive rounded"  height="100px">
                  <div class="btn-group">
                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Remove<span class="cart"></span></button>
                      {{-- <ul class="dropdown-menu">
                          <li ><a href="#">Remove by 1</a></li>
                          <li><a href="#"> Remove by All</a></li>
                      </ul> --}}
                  </div>
                  </li>

            </ul>

            <div class="row" style="text-align: center ; margin:20px 0px">

            </div>
			</div>

		</div>
		@endforeach

	</div>

    <div class="col-md-4" style="margin-top:20px">
        <div id="showPayForm" >
        <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId=38CF45B689EEFAA922F39BB7C3C05B7D.uat01-vm-tx04"></script>
            <form action="{shopperResultUrl}" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>
        </div>
    </div>
            <a  id="checkout" href="{{route('offers-checkout',$reciepe['qty'])}}" class="btn btn-success" style="font-size: 25px">CheckOut</a>
            <a  id="price" class="btn btn-success" style="font-size: 25px">Total Price:{{$totalPrice}}</a>

        </div>

    </div>
</div>
@else

<div class="row">
    <strong class="alert alert-danger"> No Items In Cart</strong>
</div>
@endif



</div>


@if(session('success'))
<div class="alert alert-success text-center">
       تم الدفع بنجاح
</div>
@endif


@if(session('fail'))
<div class="alert alert-danger text-center">
 فشلت عملية الدفع
</div>
@endif
@endsection

@section('scripts')

    <script>
        $(document).on('click', '#checkout', function (e) {
              e.preventDefault();
             $.ajax({
                type: 'get',
                url: "{{route('offers-checkout')}}",
                data: {
                    price: $('#price').text(),
                },
                success: function (data) {
                    console.log(data.content);
                    if (data.status == true) {

                        $('#showPayForm').html('data.content');

                    } else {
                        $('#showPayForm').html('fail');

                     }
                }, error: function (reject) {
                }
            });
        });
    // </script>


@stop

