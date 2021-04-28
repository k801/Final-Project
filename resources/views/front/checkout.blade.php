@extends('front.master')
@section('style') @endsection

<link href="{{asset('css/details.css')}}" rel="stylesheet">
<link href="{{asset('css/recipes.css')}}" rel="stylesheet">
<link href="{{asset('css/signin.css')}}" rel="stylesheet">
@section('content')
<section id="details_main">
    <div class="details_inner clearfix container">
      <div class="row">
          <div class="details_main_1">
               <h1>Paying Page</h1>
               <ul>
                    <li><a href="{{route('homePage.index')}}">Home</a></li>
                    <li><i class="fa fa-angle-double-right"></i></li>
                    <li> Paying Page </li>
               </ul>
          </div>
      </div>
    </div>
</section>
<div class="row">
    <div style="text-align:center">
        <h1>CheckOut</h1>
        <h4>your total price is :{{$total}}$</h4>
        <form action=""method="POST">
            <div class="col-sm-12 forms">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control"
                           value="{{old('name')}}"  placeholder="Enter Your Name"/ required>
                    <label class="text-danger">{{$errors->first('name')}}</label>
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control"
                           value="{{old('name')}}"  placeholder="Enter Your Email"/ required>
                    <label class="text-danger">{{$errors->first('email')}}</label>
                </div>
                <div class="form-group">
                    <textarea name="address" class="form-control"
                    placeholder="Enter Your Address" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <input type="text" name="card-name" class="form-control" placeholder="Enter Your card Holder Name"/ required>
                </div>
                <div class="form-group">
                    <input type="text" name="credit-number" class="form-control" placeholder="Enter Your credit card number"/ required>
                </div>
                <div class="form-group">
                    <label for="expiration-date">Expiration Date</label> <input type="date" name="expiration-date" class="form-control" placeholder="Enter Your Expiration Date"/ required>
                </div>
                <div class="form-group">
                    <input type="text" name="CVC" class="form-control" placeholder="Enter Your CVC"/ required>
                </div>
            </div>
{{csrf_field()}}
<button type="submit" class="btn btn-success">Buy Now</button>
        </form>
    </div>
</div>


@endsection
