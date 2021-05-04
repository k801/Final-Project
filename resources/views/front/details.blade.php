@extends('front.master')
@section('style')

<link href="{{asset('css/details.css')}}" rel="stylesheet">
@endsection

@section('navbar')
<section id="header">
    <nav class=" navbar-default navbar-fixed-top">

    <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="navbar-brand navbar-brand-centered ">
            <a href="{{route('homePage.index')}}">
                 <img src="{{asset('images/final_logo.jpg')}}" class="logo">
            </a>
        </div>
     </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <div>
        <ul class="nav  w-50 ml-auto nav-recipe">
            <li class="active" ><a href="{{route('homePage.index')}}"class="text-danger">HOME</a></li>
            <li><a href="{{route('reciepes.index')}}">RECIPES</a></li>
            <li><a href="{{route('sign.create')}}">Sign Up</a></li>
            {{-- <li><a href="{{route('contact.create')}}">Contact Us </a></li> --}}
            <li><a href="{{route('reservation.create')}}"> Reserve Table </a></li>
            <li><a href="{{route('rcps.shoppingCart')}}">
             <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                 fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                 <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89
                 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0
                 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102
                 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7
                 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7
                 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
             </svg>
            <span class="badge text-warning cart_count">{{Session::has('cart')?Session::get('cart')->totalQty:''}}</span></a></li>
            {{-- <li><a href="/login"> Log in </a></li>
            <li><a href="/register"> Sign Up </a></li> --}}

        </ul>
    </div>

</div>
    </nav>
  </div>
</section>

  @stop
@section('content')

<section id="details_main">
    <div class="details_inner clearfix container">
      <div class="row">
          <div class="details_main_1 col-sm-12">
               <h1>Recipe Detail</h1>
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
                         <div class="div_name">
                              <h4 class=""><ins> Recipe Name </ins></h4>
                              <p> {{$rc_data->name}} </p>
                         </div>
                         <div class="div_name">
                            <h4 class="div_name"><ins> Recipe Rating </ins></h4>
                            <p  class="text-center">
                            @for($i = 0; $i<$rc_data->averageRating; $i++)
                            <i class="fas fa-star" style="font-size:20px;color:orange"></i>

                            @endfor
                        </p>
                                   </div>
                         <div class="div_descrip">
                              <h4 class=""><ins> About Recipe </ins></h4>
                              <p> {{$rc_data->description}} </p>
                         </div>

                         <div class="div_ingreds">
                              <h4 class=""><ins> Ingredients List </ins></h4>
                              <p> {{$rc_data->ingrediens}} </p>
                         </div>

                    </div>
               </div>

               <div class="col-sm-12 col-md-6">
                    {{-- <h3>  The Easy Steps </h3> --}}
               <div class="div_img-price">
                         <div class="div_img">
                              <img src="{{asset('images')}}/{{$rc_data->image}}" alt="Card image"
                              class="" height="65%" width="100%">
                         </div>
                         <div class="div_price">
                              <p class="text-center alert-danger price1">List Price : <s>{{$rc_data->price+($rc_data->price*0.2)}}</s></p>
                              <p class="text-center alert-success price2">After Discount : {{$rc_data->price}} </p>
                         </div>

                         <div id="show-rting" style="text-align:center">
                              <x-rating></x-Rating>
                         </div>


                       <div class="cart">
                              <p class="bi bi-cart pull-right btn">
                                        <a href="url('rcps.addToCart/{{$rc_data->id}}')" class="button"> Buy
                                   <svg xmlns="http://www.w3.org/2000/svg"
                                   width="16" height="16"
                                   fill="currentColor" class="bi bi-cart " viewBox="0 0 16 16">
                                   <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5
                                                  0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607
                                                  1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0
                                                  1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2
                                                  1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                   </svg></a>
                              </p>
                         </div>
               </div>
               </div>
          </div>
     </div>
</section>

@endsection




@section('scripts')


<script>
     //    $(document).on('click', '#dstar', function (e) {
     //        console.log("data");
     //          e.preventDefault();
     //         $.ajax({
     //            type: 'get',
     //            url: "{{route('stars-checkout')}}",
     //            data: {
     //                // price: $('#price').text(),
     //            },
     //            success: function (data) {
     //                // console.log(data);

     //                    $('#show-rating').html(data);

     //            }, error: function (reject) {
     //            }
     //        });
     //    });
     </script>

@endsection







