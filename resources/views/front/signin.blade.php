@extends('front.master')
@section('style') @endsection

<link href="{{asset('css/signin.css')}}" rel="stylesheet">

   



@section('content')


<section class="serve-form">
    <div class="container">
        <div class="row">
        <div class="col-sm-10  col-md-6 forms">            
                    <form method="POST"  class="form" action="{{route('sign.store')}}">
                        @csrf
                        
                       <div class="form-group">
                            <h3 class="alert"> Registeration Form </h3>
                        </div>

                        <div class="form-group">
                            <input type="text" name="name" class="form-control" 
                                   value=""  placeholder="Enter Your Name" autocomplete="no" required/>
                            <label class="text-danger">{{$errors->first('name')}}</label>
                        </div>

                        <div class="form-group ">
                            <input type="text" name="email" class="form-control" 
                                   value="{{old('email')}}"  placeholder="Enter Your Email" 
                                   autocomplete="no" required/>
                            <label class="text-danger">{{$errors->first('email')}}</label>
                        </div>
    
                        <div class="form-group ">
                            <input type="password" name="password" class="form-control" 
                                   value="{{old('password')}}"  placeholder="Enter Your PassWord" 
                                   autocomplete="no" required />
                            <label class="text-danger">{{$errors->first('password')}}</label>
                        </div>

                        <div class="form-group">
                            <input type="number" name="phone" class="form-control" value="{{old('phone')}}"
                                   placeholder="Enter Your Phone Number" autocomplete required/>
                            <label class="error-lable">{{$errors->first('phone')}}</label>
                        </div>
                        
                        <div class="form-group">
                            <textarea name="address" class="form-control" 
                            placeholder="Enter Your Address" rows="4"></textarea>
                        </div>


                        <div class="form-group">
                            <a href="#"><input type="submit" class="btn" value="Sign in"></a>
                            <a href="/login"  class="btn-login"> Already Register ? <a>
                        </div>
                    </form>
                </div>
        </div>


    </div>
</section>

@endsection