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
	    <select class="input-text" name="category">
			@foreach($cat_data as $item)
			<option value="{{$item->id}}"> {{$item->name}} </option>
			@endforeach
		 </select>
	  </div>
	 </div>
</section>
<div class="container">
    <div class="row">
	<div class="row div_row" id="div_row">
		{{-- @foreach($rc_data as $item)
		<div class="col-sm-4">
			<div class="card clearfix" >
				<img src="{{asset('images')}}/{{$item->image}}" alt="Card image"
				class="img-responsive reciepeImge" style="height: 300px ;  width: 100% ">

				<p class="text-center alert-danger price1">List Price : <s>{{$item->price+2.5}} </s></p>
				<p class="text-center alert-success price2" >After Discount : {{$item->price}}</p>
				<p style="text-align:center">
                @for($i = 0; $i<$item->averageRating; $i++)
                <i class="fas fa-star" style="font-size:20px;color:orange"></i>

                @endfor --}}
            {{-- </p> --}}
                {{-- <x-rating></x-rating> --}}

                {{-- <p style="text-align:center">
                @for($i=1;$i<=5;$i++)

                <span class="reciepeStar">
                    <i class="far fa-star" style="font-size:20px;color:orange"></i>

                </span>


                     @endfor

                     <p> --}}
				{{-- <p class="text-center btn"><a href="{{route ('rcps.show',$item)}}"class="button"> Details </a></p>
                <p class="bi bi-cart pull-right btn">
					<a href="{{route ('rcps.addToCart',['id'=>$item->id])}}"
					class="button"> Buy

					<svg xmlns="http://www.w3.org/2000/svg"
					width="16" height="16"
					fill="currentColor" class="bi bi-cart " viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5
							0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607
							1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0
							1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2
							1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                  </svg></a></p>
			</div>
		</div> --}}
		{{-- @endforeach --}}
	</div>
</div>
</div>

@endsection


@section('scripts')
<script>
	// $(document).ready(function()
	// {

	// 	$('select[name="section"]').on('change', function()
	// 	{
	// 		var sectionId = $(this).val();
	// 		// console.log(sectionId);
	// 		if (sectionId) {
	// 			$.ajax({
	// 				url: "{{ URL::to('section') }}/" + sectionId,
	// 				type: "GET",
	// 				dataType: "json",
	// 				success: function(data) {
    //                     console.log(data);

	// 				},
	// 			});
	// 		} else {
	// 			console.log('AJAX load did not work');
	// 		}
	// 	});
	// });


// $('.reciepeStar').click(function(){
// alert("ok");
// $(this).html('<i class="fas fa-star" style="color:orange;font-size:20px"></i>')


// });


 </script>


<script>
    $(document).ready(function() {

        $('select[name="category"]').on('change', function() {

			var cartoona;
            var SectionId = $(this).val();
            // console.log(SectionId);
            if (SectionId) {
                $.ajax({
                    url: "{{ URL::to('getRecipes') }}/" + SectionId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#div_row').empty();

        jQuery.each(data, function(index, item) {
            console.log(item);

		var cartoona =`<div class="col-sm-4">
                          <div class="card clearfix" >
				<img src="{{asset('images/${item.image}')}}" class="img-responsive reciepeImge" style="height: 300px ;  width: 100%">
				<p>item name:${item.name}</p>
				<p> description:${item.description}</p>
                <p class="text-center alert-danger price1">List Price : <s>{{$item->price+2.5}} </s></p>
                <p class="text-center alert-success price2" >After Discount : ${item.price}</p>
				<p class="text-center btn"><a href="{{url('getRecipesDetails/${item.id}')}}"class="button"> Details </a></p>

                <p class="bi bi-cart pull-right btn">

					<a href="{{url('rcps.addToCart/${item.id}')}}"class="button"> Buy
					<svg xmlns="http://www.w3.org/2000/svg"
					width="16" height="16"
					fill="currentColor" class="bi bi-cart " viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5
							0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607
							1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0
							1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2
							1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                  </svg></a></p>



                  </div>`;
                $('#div_row').append(cartoona);

        });
        console.log(cartoona);


	},


	// $('div_row').text('ss');
    error: function(XMLHttpRequest, textStatus, errorThrown) {
        alert("some error");
    }
                });

            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


@endsection







