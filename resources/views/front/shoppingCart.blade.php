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

<div class="container">
	<div class="row div_row">
        @foreach($reciepe as $reciepe)
		<div class="col-sm-4">
			<div class="card clearfix">
			<ul class="list-group">

                  <li class="lis-group-item">
                  <span class="badge text-center ">{{$reciepe['qty']}}</span>
                  <h5 class="rec_name">{{$reciepe['item']['name']}}</h5>
                  <h5 style="margin-bottom: 10px "><span class="label label-success">{{$reciepe['item']['price']}}</span></h5>
                  <img src="{{asset('images')}}/{{$reciepe['item']['image']}}"
                       alt="Card image"class=""  height="40%" width="100%">
                  <div class="btn-group">
                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Remove<span class="caret"></span></button>
                      <ul class="dropdown-menu" style="margin: 10px" >
                          <li ><a href="{{route('rcps.reduceByOne',['id'=>$reciepe['item']['id']])}}">Remove by 1</a></li>
                          <li><a href="#"> Remove by All</a></li>
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
    <a href="{{route('rcps.checkout')}}" class="btn btn-success" style="font-size: 25px">CheckOut</a>
</div>
<div class="row" style="text-align: center ; margin:20px 0px">
    <strong class="alert alert-success">Total Price :  {{$totalPrice}} &dollar;</strong>
    <a href="{{route('rcps.cash')}}" class="btn btn-primary" style="font-size: 25px">Pay cash</a>
</div>

@else

<div class="container">
    <div class="row">
        <div class="col-sm-10" style="margin: 10% 0px">
            <p class="alert alert-danger"> No Items In Cart</p>
        </div>
    </div>
</div>
@endif




@endsection
