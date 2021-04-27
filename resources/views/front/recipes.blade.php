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
		<div class="col-sm-4">
			<div class="card">
				<a> 
					<img src="{{asset('images')}}/{{$item->image}}" alt="Card image" 
				    class=" img-responsive rounded"  height="100px">
				</a>
				{{-- <h5 class="rec_name">  This Recipe Named  "{{$item->name}}"</h5> --}}
				<p class="text-center alert-danger price1"><s>{{$item->price+2.5}} </s></p>
				<p class="text-center alert-success price2">{{$item->price}}</p>
				<p class="text-center btn"><a href="{{route ('rcps.show',$item)}}"class="button"> More Details </a></p>
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







