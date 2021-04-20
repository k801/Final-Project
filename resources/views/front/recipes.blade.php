@extends('front.master')
@section('style') @endsection

<link href="{{asset('css/recipes.css')}}" rel="stylesheet">

@section('content')

<section id="recipes_main" >
 <div class="recipes_inner clearfix">
  <div class="container">
   <div class="row">
    <div class="recipes_main_1">
     <h1>Recipes</h1>
	<ul>
	     <li><a href="/home">Home</a></li>
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
			<option value="Religion"> {{$item->name}} </option>
			@endforeach
		 </select>
	  </div>
	 </div>
</section>

{{-- <section id="recipes">
 <div class="container">
  <div class="row">
   <div class="recipes_1 clearfix">
 </div>
</section> --}}


<div class="container-fluid">
	<div class="row">
		@foreach($rc_data as $item)
		<div class="col-sm-4 mr-2 p-2 card">
			<a> <img src="{{asset('images')}}/{{$item->image}}" alt="Card image" 
				    class=" img-responsive rounded" width="98%" height="320px"></a>
			<div class="card-body">
				<h5 class=" mb-2 p-3"> This Is  Form Best Brands {{$item->name}}</h5> 
				<p class="text-center mt-3"><a href="{{route ('rcps.show',$item)}}"class="button">View More</a></p>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection


{{-- <script>
	$(document).ready(function() {
		$('select[name="section"]').on('change', function() {
			var SectionId = $(this).val();
			console.log(SectionId);
			if (SectionId) {
				$.ajax({
					url: "{{ URL::to('section') }}/" + SectionId,
					type: "GET",
					dataType: "json",
					success: function(data) {
						
						// $('select[name="product"]').empty();
						// $.each(data, function(key, value) {
						//     $('select[name="product"]').append('<option value="' +
						//         value + '">' + value + '</option>');
						// });
					},
				});
			} else {
				console.log('AJAX load did not work');
			}
		});
	});
</script> --}}





