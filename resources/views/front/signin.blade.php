@extends('front.master')
@section('style') @endsection

<link href="{{asset('css/signin.css')}}" rel="stylesheet">

   



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mb-3">
            <div class="card">
                <div class="card-header text-danger text-center"><h3> Registration Page</h3></div>
                <div class="card-body">
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif --}}

                    <form method="POST"  class="form" action="{{route('sign.store')}}">
                        @csrf

                        <div class="form-group " style="padding-top: 45px">

                            <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Your Name"style="width: 450px;" />
                            <label class="text-danger">{{$errors->first('name')}}</label>

                        </div>

                        <div class="form-group ">

                            <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter Your Email"style="width: 450px;" />
                            <label class="text-danger">{{$errors->first('email')}}</label>
                        </div>

                        <div class="form-group  mt-2">

                            <input type="text" name="password" class="form-control" value="{{old('password')}}"placeholder="Enter Your PassWord"style="width: 450px;" />
                            <label class="text-danger">{{$errors->first('password')}}</label>
                        </div>

                        <div class="form-group ">

                            <textarea name="address" class="form-control" placeholder="Enter Your Address"style="width: 450px;"></textarea>
                        </div>
                        <div class="form-group mt-2">

                            <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="Enter Your Phone" style="width: 450px;"/>
                            <label class="text-danger">{{$errors->first('phone')}}</label>
                        </div>

                        <div class="form-group  mt-3" style="padding-left: 100px;">
                            <input type="submit" class="btn text-warning btn-lg bg-info"/>
                            <a class="btn  text-warning btn-lg" href="{{route('contact.create')}}"><button> Already Registered</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection