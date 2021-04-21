@extends('front.master')
@section('style')
@endsection

<link href="{{asset('css/details.css')}}" rel="stylesheet">

@section('content')

<section id="details_main">
    <div class="details_inner clearfix container">
      <div class="row">
          <div class="details_main_1">
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

   <section id="details">
    <div class="container-fluid">
     <div class="row details_1">
          <div class="details_1">
               <h3>The Recipe Story</h3>
               <div class=" content-top2">
                    <h4 class="text-center">O</h4>
               </div>
          </div>
      
          <div class="details_2 clearfix">
               <div class="col-sm-12 details_3">
                    <h3>{{$rc_data->name}}</h3>
                    <div class="details_4">
                        
                         <ul>
                              <li> <img src="{{asset('images')}}/{{$rc_data->image}}"  
                                        width="100%" height="400px" > </li>
                              <li class="well_1"> <i class="fa fa-leaf"> </i> </li> 
                         
                              <li class="well_2 alert-info mt-3 p-4 rounded"><h5> {{$rc_data->description}} </h5></li>
                              <li class="well_2 alert-warning mt-3 p-4 rounded"><h5> ingrediants of This reciepe IS :{{$rc_data->ingrediens}} </h5></li>
                              <li class="well_2 alert-success mt-3 p-4 rounded"><h5> The Price after Discount Is: {{$rc_data->price}} &dollar; </h5></li>
                         </ul>

                         <div class="form-group mt-4">
                              <form method="POST" action="" class="orderform">
                                   <label class="label"> <h5>  How Much Recipes You Need :  </h5></label>
                                   <input type="number" name="name" class="form-control" required/>
                                   <input type="submit" value ="Enter" class="btn btn-danger"/> <i class="fas fa-car"></i>
                              <form>
                         </div>
                    
                    </div>
               </div>
          </div>
          
      </div>
@endsection 