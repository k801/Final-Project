@extends('front.master')
@section('style') @endsection

<link href="{{asset('css/details.css')}}" rel="stylesheet">
<link href="{{asset('css/shoping-cart.css')}}" rel="stylesheet">

<section id="details_main">
    <div class="details_inner clearfix container">
      <div class="row">
          <div class="details_main_1">
               <h1>Shopping Cart</h1>
               <ul>
                    <li><a href="{{route('homePage.index')}}">Home</a></li>
                    <li><i class="fa fa-angle-double-right"></i></li>
                    <li> Shopping Cart </li>
               </ul>
          </div>
      </div>
    </div>
</section>


@section('content')

@if(Session::has('cart'))

<section class="items">
    <div class="title">
		<h2 class="text-center"> All Recieps You Orderd Yet  </h2>
	</div>
    
<div class="container">

	<div class="row div_row">
	<div class="col-md-8">
        @foreach($reciepe as $reciepe)
		<div class="col-xs-10 col-sm-6 col-md-6">
			<div class="card clearfix">
			<ul class="list-group">

                  <li class="lis-group-item">
                  <h5>Number Of Meals : <span class="badge text-center">{{$reciepe['qty']}}</span></h5>
                  <h5 class="rec_name"> Meal Name : 
                      <span class="badge text-center">{{$reciepe['item']['name']}}</span>
                </h5>
                  <h5><span class="label label-success">{{$reciepe['item']['price']}}</span></h5>

                  <img src="{{asset('images')}}/{{$reciepe['item']['image']}}"
                       alt="Card image"class="img-responsive" 
                       style="height: 170px ;  width: 100% ">

                  <div class="btn-group">
                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Remove<span class="cart"></span></button>
                      <ul class="dropdown-menu">
                          <li ><a href="{{route('receipes.reduceByOne',$reciepe['item']['id'])}}">Remove One Of Its</a></li>
                          <li><a href="{{route('receipes.RemoveAll',$reciepe['item']['id'])}}"> Remove All Meals</a></li>
                      </ul>
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
           <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId=F8E5E310F657289E138F6E2CF18803E4.uat01-vm-tx02"></script>
           <form action="{shopperResultUrl}" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form> 
        </div>
        </div>
                <a  id="price" class="btn btn-success" style="font-size: 25px">Total Price:{{$totalPrice}}</a>
                <a href="{{route('receipes.cash')}}" class="btn btn-primary" style="font-size: 25px">order later</a>  <br>
                {{-- <a  id="checkout" href="{{route('offers-checkout',$reciepe['qty'])}}" class="btn btn-success" style="font-size: 25px">CheckOut</a> --}}
        </div>      
    </div>
</div>


    @else
    <div class="container">
    <div class="row">
        <div class="col-xs-10" style="margin: 2% 0px">
            <p class="alert alert-danger"> No Items In Cart yet</p>
        </div>
    </div>
    </div>
</div>
@endif


@if(session('fail'))
<div class="alert alert-danger text-center">
 Payment Fieled
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

                        $('showPayForm').html('data.content');

                    } else {
                        $('#showPayForm').html('fail');

                     }
                }, error: function (reject) {
                }
            });
        });
    // </script>


@stop

