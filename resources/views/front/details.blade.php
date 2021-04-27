@extends('front.master')
@section('style')
@endsection


<link href="{{asset('css/details.css')}}" rel="stylesheet">


@section('content')

<section id="details_main">
    <div class="details_inner clearfix container">
      <div class="row">
          <div class="details_main_1 col-sm-12 col-md-6">
               <h1>Recipes Details</h1>
               <ul>
                    <li><a href="{{route('homePage.index')}}">Home</a></li>
                    <li><i class="fa fa-angle-double-right"></i></li>
                    <li>Details</li>
               </ul>
          </div>
      </div>
    </div>
</section>

<section class="details-section">
     <div class="container">
          <div class="text-center header">
               <h3> The Recipe Story  </h3>
               <h3> ـــــــــــ O ـــــــــــ </h3>
          </div>
          
          <div class="row">
               <div class="col-sm-12 col-md-6">
                    <div class="alldetails">
                         <h3 class="text-center"> All Details </h3>

                         <div class="div_name">
                              <h4 class=""><ins> Recipe Name </ins></h4>
                              <p> {{$rc_data->name}} </p>
                         </div>
                         <div class="div_descrip">
                              <h4 class=""><ins> About Recipe </ins></h4>
                              <p> {{$rc_data->description}} </p>
                         </div>
                         
                         <div class="div_ingreds">
                              <h4 class=""><ins> Ingredients List </ins></h4>
                              <p> {{$rc_data->ingrediens}} </p>
                         </div>

                         {{-- <div class="div_price">
                              <h4>  Price is :  <span class="pp">{{$rc_data->price}} &dollar; </span>  </h4>
                         </div> --}}
                    </div>
               </div>
               <div class="col-sm-12 col-md-6">
                    {{-- <h3>  The Easy Steps </h3> --}}
                    <div class="div_img">
                         <img src="{{asset('images')}}/{{$rc_data->image}}" alt="Card image" 
                         class=" img-responsive" >
                    </div>
               </div>
          </div>
     </div>
</section>
      
<section class="details2-section">
     <div class="container">
          <div class="row">
               <div class="col-sm-12 col-md-4">
                         <div class="form">
                              <form method="POST" action="" class="orderform">
                                   <label class="label"> <h5 class="lable-text">  How Many Recipes You Need ? </h5></label>
                                   <input type="number" name="name" class="form-control" required/>
                                   <input type="submit" value ="Enter" class="btn btn-danger"/> 
                              <form>
                         </div>
               </div>
          </div>
     </div>
</section>

          
     
          
          
      
@endsection 