@extends('front.master')
@section('style')
@endsection

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
                    <li>Shpping Cart</li>
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
                  <span class="label label-success">{{$reciepe['item']['price']}}</span>
                  <img src="{{asset('images')}}/{{$reciepe['item']['image']}}" alt="Card image"class=" img-responsive rounded"  height="100px">
                  <div class="btn-group">
                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                          <li ><a href="#">Reduce by 1</a></li>
                          <li><a href="#"> Reduce All</a></li>
                      </ul>
                  </div>
                  </li>

            </ul>
			</div>
		</div>
		@endforeach
	</div>
</div>
<div class="row" style="text-align: center">

<strong >Total:{{$totalPrice}}$</strong>

</div>
<div class="row" style="text-align: center">

<button class="btn btn-success ">CheckOut</button>

</div>
@else
<div class="row">

        <strong>No Items In Cart</strong>

</div>

@endif




@endsection
