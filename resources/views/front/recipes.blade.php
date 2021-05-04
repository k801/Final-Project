@extends('front.master')
@section('style')  @endsection


<link href="{{asset('css/recipes.css')}}" rel="stylesheet">

@section('content')

<section id="recipes_main" >
 <div class="recipes_inner clearfix">
  <div class="container">
   <div class="row">
    <div class="recipes_main_1">
     <h1>Recipes</h1>
	<ul>
	     <li><a href="{{route('homePage.index')}}">Home</a></li>
		 <li><i class="fa fa-angle-double-right"></i></li>
		 <li>Recipes</li>
	</ul>
   </div>
  </div>
 </div>
 </div>
</section>



<section id="cooking">
 <div class="container">
  <div class="row">
   <div class="cooking_1 clearfix">
	 <div class="col-sm-4">
	 <div class="cooking_2">
	    <select class="input-text" name="section">
			@foreach($cat_data as $item) 
			<option value="{{$item->id}}"> {{$item->name}} </option>
			@endforeach
		 </select>
	  </div>
	 </div>
</section>



	<div class="container">
	<div class="row div_row">
		@foreach($rc_data as $item)
		<div class="col-sx-12 col-sm-6 col-md-4">
			<div class="card clearfix">
				
				<img src="{{asset('images')}}/{{$item->image}}" alt="Card image"
				class="img-responsive" style="height: 300px ;  width: 100% ">

				<p class="text-center alert-danger price1">List Price : <s>{{$item->price+($item->price*0.2)}}</s></p>
				<p class="text-center alert-success price2">After Discount : {{$item->price}} </p>
				<p class="detls"><a href="{{route ('reciepes.show',$item)}}"class="button"> Details  </a></p>
				<p class="bi bi-cart">
					<a href="{{route ('rcps.addToCart',['id'=>$item->id])}}"
					   class="button"> Buy
					<svg xmlns="http://www.w3.org/2000/svg" 
					width="50" height="16" 
					fill="currentColor" class="bi bi-cart " viewBox="0 0 50 16">
					<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 
							0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 
							1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 
							1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 
							1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
					  </svg></a>
				</p>

			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection


@section('scripts')
<script>
	$(document).ready(function()
	{

		$('select[name="section"]').on('change', function()
		{
			var sectionId = $(this).val();
			// console.log(sectionId);
			if (sectionId) {
				$.ajax({
					url: "{{ URL::to('section') }}/" + sectionId,
					type: "GET",
					dataType: "json",
					success: function(data) {
                        console.log(data);

					},
				});
			} else {
				console.log('AJAX load did not work');
			}
		});
	});

</script>

@endsection 







