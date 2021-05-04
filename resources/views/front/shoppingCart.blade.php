@extends('front.master')
@section('style') @endsection

<link href="{{asset('css/shoping-cart.css')}}" rel="stylesheet">
{{-- <link href="{{asset('css/recipes.css')}}" rel="stylesheet"> --}}
@section('content')
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

@if(Session::has('cart'))

<section class="items">
    <div class="title">
		<h2 class="text-center"> All Recieps You Orderd its </h2>
	</div>
    
<div class="container">
	<div class="row div_row">
        @foreach($reciepe as $reciepe)
		<div class="col-xs-10 col-sm-6 col-md-4">
			<div class="card clearfix">
			<ul class="list-group">

                  <li class="lis-group-item">
                  <h5>Number Of Meals : <span class="badge text-center ">{{$reciepe['qty']}}</span></h5>
                  <h5 class="rec_name"> Meals Name : {{$reciepe['item']['name']}}</h5>
                  <h5><span class="label label-success">{{$reciepe['item']['price']}}</span></h5>

                  <img src="{{asset('images')}}/{{$reciepe['item']['image']}}"
                       alt="Card image"class="img-responsive" 
                       style="height: 200px ;  width: 100% ">

                  <div class="btn-group">
                      <button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown">Remove
                          <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" style="margin: 10px" >
                          <li ><a href="{{route('rcps.reduceByOne',['id'=>$reciepe['item']['id']])}}">Remove by 1</a></li>
                          <li><a href="{{route('rcps.RemoveAll',['id'=>$reciepe['item']['id']])}}"> Remove  All</a></li>
                      </ul>
                  </div>
                  </li>

            </ul>
			</div>
		</div>
		@endforeach
	</div>
</div>


<div class="row" style="text-align: center ; margin:20px 0px">
    <strong class="alert alert-success">Total Price :  {{$totalPrice}} &dollar;</strong>
    <a href="{{route('rcps.cash')}}" class="btn btn-primary" style="font-size: 25px">Pay cash</a>
</div>

@else

<section style="background-color:rgb(112, 198, 204)">
<div class="container">
    <div class="row">
        <div class="col-xs-10" style="margin: 2% 0px">
            <p class="alert alert-danger"> No Items In Cart yet</p>
        </div>
    </div>
</div>
</section>
@endif
</section>

@endsection
