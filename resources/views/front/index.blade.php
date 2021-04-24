@extends('front.master')
@section('style')
@endsection

<link href="{{asset('css/index.css')}}" rel="stylesheet">

@section('content')
  <section id="center" class="center_home h-50">
     <div class="banner">
        <div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">
			<!-- Wrapper-for-Slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active"><!-- First-Slide -->
                    <img src="{{asset('images/bg45.jpg')}}" alt="" class="img-responsive">
                    <div class="carousel-caption kb_caption kb_caption_right">
                        <h1 data-animation="animated flipInX" class="">Dinner Club Restaurant</h1>
                        <p data-animation="animated flipInX" class="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy  text ever since the when an unknown printer took a galley of type and scrambled [...]</p>
						<h4><a href="#"class="button hvr-shutter-out-horizontal">Read More</a></h4>
                    </div>
                </div>
                <div class="item"> <!-- Second-Slide -->
                    <img src="{{asset('images/8.jpg')}}" alt="" class="img-responsive">
                    <div class="carousel-caption kb_caption kb_caption_right">
                        <h1 data-animation="animated fadeInDown">We Provide Our best</h1>
                        <p data-animation="animated fadeInUp">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						Lorem Ipsum has been the industry's standard dummy  text ever since the when an unknown printer took a galley of type and scrambled [...]</p>
						<h4><a href="#"class="button hvr-shutter-out-horizontal">Read More</a></h4>
                    </div>
                </div>
                <div class="item"><!-- Third-Slide -->
                    <img src="{{asset('images/bg51.jpg')}}" alt="" class="img-responsive">
                    <div class="carousel-caption kb_caption kb_caption_right">
                        <h1 data-animation="animated fadeInDown">Printing And Typesetting</h1>
                        <p data-animation="animated fadeInUp">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy  text ever since the when an unknown printer took a galley of type and scrambled [...]</p>
						<h4><a href="#"class="button">Read More</a></h4>
                    </div>
                </div>
            </div>
            <!-- Left-Button -->
            <a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev">
				<span class="fa fa-angle-left kb_icons" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <!-- Right-Button -->
            <a class="right carousel-control kb_control_right" href="#kb" role="button" data-slide="next">
                <span class="fa fa-angle-right kb_icons" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
	</div>
  </section>
  

  <div class="container first-section">
    <div class="text-center header">
		<h3> Quick & Easy Recipes </h3>
        <h3> ـــــــــــ O ـــــــــــ </h3>
	</div>
	<div class="row div_row">
		@foreach($rc_data as $item)
        @if($item->id <4)
		<div class="col-sm-4">
			<div class="card">
				<a> 
					<img src="{{asset('images')}}/{{$item->image}}" alt="Card image" 
				    class=" img-responsive rounded"  height="100px">
				</a>
				<h5 class="rec_name">  This Recipe Named  "{{$item->name}}"</h5> 
				<p class="text-center btn"><a href="{{route ('rcps.show',$item)}}"class="button">View More</a></p>
			</div>
		</div>
        @endif
		@endforeach
	</div>
</div>
 

<div class="container-fluid second-section">
    <div class="text-center header">
		<h3> Quick &  Recipes </h3>
        <h3> ـــــــــــ O ـــــــــــ </h3>
	</div>
	<div class="row div_row2">
        @if($rc_data->id =5 )
		<div class="col-sm-6">
			<div class="card2">
				<a> 
					<img src="{{asset('images')}}/{{$item->image}}" alt="Card image" 
				    class=" img-responsive rounded">
				</a>
			</div>
		</div>
        <div class="col-sm-6">
			<div class="card3">
				<h5 class="rec_name">  This Recipe Named  "{{$item->name}}"</h5> 
				<p class="text-center btn"><a href="{{route ('rcps.show',$item)}}"class="button">View More</a></p>
			</div>
		</div>
        @endif
	</div>
</div>
    

<div class="container third-section">
    <div class="text-center header">
		<h3> All FavouriteRecipes </h3>
        <h3> ـــــــــــ O ـــــــــــ </h3>
	</div>
	<div class="row div_row4">
        @if($rc_data->id =5 )
		<div class="col-sm-6">
			<div class="card4"> 
					<img src="{{asset('images')}}/{{$item->image}}" alt="Card image" 
				    class=" img-responsive rounded">
			</div>
		</div>
        <div class="col-sm-6">
			<div class="card4"> 
					<img src="{{asset('images')}}/{{$item->image}}" alt="Card image" 
				    class=" img-responsive rounded">
			</div>
		</div>
        @endif
	</div>
</div>
@endsection

