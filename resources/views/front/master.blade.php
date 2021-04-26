<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Final Version </title>
    
    
   
    
    
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}


    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/global.css')}}" rel="stylesheet">
    <link href="{{asset('fonts/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/ken-burns.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" 
          rel="stylesheet">
          @yield('style')
          @yield('title')  
  </head>

  <body>
    <section id="header">
        <nav class="navbar navbar-default navbar-fixed-top bg-info">
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
                            <img src="{{asset('images/Logo3.jpg')}}" class="logo rounded-circle">
                       </a>
                   </div>
                </div>
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <div>
                   <ul class="nav navbar-nav navbar">
                       <li class="active" ><a href="{{route('homePage.index')}}">HOME</a></li>
                       <li><a href="{{route('rcps.index')}}">RECIPES</a></li>
                       <li><a href="{{route('sign.create')}}">Sign Up</a></li>
                       <li><a href="{{route('contact.create')}}">CONTACT</a></li>
                       <li><a href="{{route('reservation.create')}}"> Reserve Table </a></li>
                       <li><a href="/login"> Log in </a></li>
                       <li><a href="/register"> Sign Up </a></li>
                   </ul>
               </div>
               
           </div>
       </nav>
</section>

@yield('content')

<section id="footer">
    <div class="container">
     <div class="row">
      <div class="footer_1 clearfix">
       <div class="col-sm-2">
        <div class="footer_2">
         <h4>Home</h4>
         <ul>
              <li><a href="#">Our Range</a></li>
              <li><a href="#">From our kitchen</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms of Use</a></li>
         </ul>
        </div>
       </div>
       <div class="col-sm-2">
        <div class="footer_2">
         <h4>Favourites</h4>
         <ul>
              <li><a href="#">Chicken Recipes</a></li>
              <li><a href="#">Aloo Recipes</a></li>
              <li><a href="#">MAGGI Noodle Recipes</a></li>
        
         </ul>
        </div>
       </div>
       <div class="col-sm-2">
        <div class="footer_2">
         <h4>Recipes</h4>
         <ul>
              <li><a href="#">Palak Paneer Recipe</a></li>
              <li><a href="#">Matar Paneer Recipe</a></li>
              <li><a href="#">Chicken Biryani Recipe</a></li>
         </ul>
        </div>
       </div>
       <div class="col-sm-3">
        <div class="footer_2">
         <h4>Talk To Us</h4>
         <ul>
              <li><a href="#">Copyright</a></li>
              <li><a href="#">About Nestlé</a></li>
              <li><a href="#">Creating Shared Value at Nestlé</a></li>
         </ul>
        </div>
       </div>

       <div class="col-sm-3">
        <div class="footer_3">
         <h4>Follow Us</h4>
         <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
         </ul>
        </div>
       </div>
      </div>
     </div>
    </div>
   </section>
   <section id="footer_main" class="clearfix">
     <div class="footer_main_1"> 
         <p> © 2021 Dinner Club . All Rights Reserved . Design by M.Alrays </p>
     </div>
   </section>

<script src="./js/jquery-2.1.1.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/custom.js"></script>

@yield('scripts')

</body>
</html>
