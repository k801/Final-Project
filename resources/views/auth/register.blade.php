@extends('layouts.app')

{{-- <link href="{{asset('css/signin.css')}}" rel="stylesheet"> --}}

@section('content')
{{-- <section class="serve-form">
    <div class="container">
        <div class="row">
        
        <div class="col-sm-12 forms">            
                    <form method="POST"  class="form" action="{{route('sign.store')}}">
                        @csrf
                        
                       <div class="form-group">
                            <h3 class="alert"> Sign Up Form </h3>
                        </div>

                        <div class="form-group">
                            <input type="text" name="name" class="form-control" 
                                   value="{{old('name')}}"  placeholder="Enter Your Name"/>
                            <label class="text-danger">{{$errors->first('name')}}</label>
                        </div>

                        <div class="form-group ">
                            <input type="text" name="email" class="form-control" 
                                   value="{{old('email')}}"  placeholder="Enter Your Email" />
                            <label class="text-danger">{{$errors->first('email')}}</label>
                        </div>
                        <div class="form-group ">
                            <input type="password" name="password" class="form-control" 
                                   value="{{old('password')}}"  placeholder="Enter Your PassWord" required autocomplete="new-password" />
                            <label class="text-danger">{{$errors->first('password')}}</label>
                        </div>

                        <div class="form-group">
                            <input type="number" name="phone" class="form-control" value="{{old('phone')}}"
                                   placeholder="Enter Your Phone Number" />
                            <label class="error-lable">{{$errors->first('phone')}}</label>
                        </div>
                        
                        <div class="form-group">
                            <textarea name="address" class="form-control" 
                            placeholder="Enter Your Address" rows="4"></textarea>
                        </div>


                        <div class="form-group">
                            <a><input type="submit" class="btn" value="Sign in"></a>
                            <a class="btn" href="/login"> Already Registered </a> 
                        </div>
                    </form>
                </div>
        </div>
    </div>
</section> --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                {{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid 
                                       @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                {{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">
                                {{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid 
                                       @enderror" name="phone" value="{{ old('name') }}" 
                                      required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
