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
			<div class="card clearfix">
				<a>
					<img src="{{asset('images')}}/{{$item->image}}" alt="Card image"
				    class=" img-responsive rounded"  height="100px">
				</a>
				<h5 class="rec_name">  This Recipe Named  "{{$item->name}}"</h5>
				<p class="text-center btn  " ><a href="{{route ('rcps.show',$item)}}"class="button">View More</a></p>
                {{-- <i class="bi bi-cart"></i> <p class="text-center btn"><a href="{{route ('rcps.show',$item)}}"class="button">Add To Cart</a></p> --}}
                <p class="bi bi-cart pull-right" ><a href="{{route ('rcps.show',$item)}}"class="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                  </svg></a></p>
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







