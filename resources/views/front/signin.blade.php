@extends('front.master')
@section('style')
@endsection

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
                        <div class="form-group ">
                            <label class="label"> <h5>  Name :  </h5></label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}" />
                            <label class="text-danger">{{$errors->first('name')}}</label>

                        </div>

                        <div class="form-group ">
                            <label class="label"> <h5>  Email :  </h5></label>
                            <input type="text" name="email" class="form-control" value="{{old('email')}}" />
                            <label class="text-danger">{{$errors->first('email')}}</label>
                        </div>
        
                        <div class="form-group  mt-2">
                            <label class="label"> <h5> PassWord : </h5> </label>
                            <input type="text" name="password" class="form-control" value="{{old('password')}}" />
                            <label class="text-danger">{{$errors->first('password')}}</label>
                        </div>

                        <div class="form-group">
                            <label class="label"> <h5>  Address: </h5> </label>
                            <textarea name="address" class="form-control"></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <label class="label"> <h5> Phone Numberr : </h5> </label>
                            <input type="text" name="phone" class="form-control" value="{{old('phone')}}"/>
                            <label class="text-danger">{{$errors->first('phone')}}</label>
                        </div>


                        <div class="form-group text-center mt-3">
                            <input type="submit" class="btn btn-success"/>
                            <a class="text-bold p-3" href="{{route('contact.create')}}">Alreay Register </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

