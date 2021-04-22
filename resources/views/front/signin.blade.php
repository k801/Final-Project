@extends('front.master')
@section('style')
@endsection

<link href="{{asset('css/signin.css')}}" rel="stylesheet">

@section('content')
<!-- Material form register -->
<div class="card">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Sign up</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="#!">

            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormFirstName" class="form-control">
                        <label for="materialRegisterFormFirstName">First name</label>
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input type="email" id="materialRegisterFormLastName" class="form-control">
                        <label for="materialRegisterFormLastName">Last name</label>
                    </div>
                </div>
            </div>

            <!-- E-mail -->
            <div class="md-form mt-0">
                <input type="email" id="materialRegisterFormEmail" class="form-control">
                <label for="materialRegisterFormEmail">E-mail</label>
            </div>

            <!-- Password -->
            <div class="md-form">
                <input type="password" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <label for="materialRegisterFormPassword">Password</label>
                <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                    At least 8 characters and 1 digit
                </small>
            </div>

            <!-- Phone number -->
            <div class="md-form">
                <input type="password" id="materialRegisterFormPhone" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
                <label for="materialRegisterFormPhone">Phone number</label>
                <small id="materialRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                    Optional - for two step authentication
                </small>
            </div>

            <!-- Newsletter -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="materialRegisterFormNewsletter">
                <label class="form-check-label" for="materialRegisterFormNewsletter">Subscribe to our newsletter</label>
            </div>

            <!-- Sign up button -->
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>

            <!-- Social register -->
            <p>or sign up with:</p>

            <a type="button" class="btn-floating btn-fb btn-sm">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a type="button" class="btn-floating btn-tw btn-sm">
                <i class="fab fa-twitter"></i>
            </a>
            <a type="button" class="btn-floating btn-li btn-sm">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a type="button" class="btn-floating btn-git btn-sm">
                <i class="fab fa-github"></i>
            </a>

            <hr>

            <!-- Terms of service -->
            <p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form register -->
{{-- <div class="container">
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
                        <div class="form-group mt-2">
                            <label class="label" > <h5 style="display: none"> Phone Number : </h5> </label>
                            <input type="hidden" />
                        </div>
                        <div class="form-group mt-2">
                            <label class="label" > <h5 style="display: none"> Phone Number : </h5> </label>
                            <input type="hidden" />
                        </div>
                        <div class="form-group mt-2">
                            <label class="label" > <h5 style="display: none"> Phone Number : </h5> </label>
                            <input type="hidden" />
                        </div>
                        <div class="form-group ">
                            <label class="label" for="name" > <h5 style="display: none">  Name :  </h5></label>
<<<<<<< HEAD
                            <input type="text" name="name" style="height:40px" class="form-control" value="{{old('name')}}" placeholder="Enter Your Name"style="width: 450px;" />
=======
                            <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Your Name"style="width: 450px;" />
>>>>>>> 90f9f72676f86d14b417efe0f03588531fe21a68
                            <label class="text-danger">{{$errors->first('name')}}</label>

                        </div>

                        <div class="form-group ">
                            <label class="label"> <h5  style="display: none">  Email :  </h5></label>
<<<<<<< HEAD
                            <input type="text" name="email" style="height:40px" class="form-control" value="{{old('email')}}" placeholder="Enter Your Email"style="width: 450px;" />
=======
                            <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter Your Email"style="width: 450px;" />
>>>>>>> 90f9f72676f86d14b417efe0f03588531fe21a68
                            <label class="text-danger">{{$errors->first('email')}}</label>
                        </div>

                        <div class="form-group  mt-2">
                            <label class="label" > <h5 style="display: none"> PassWord : </h5> </label>
<<<<<<< HEAD
                            <input type="text" name="password" style="height:40px" class="form-control" value="{{old('password')}}"placeholder="Enter Your PassWord"style="width: 450px;" />
=======
                            <input type="text" name="password" class="form-control" value="{{old('password')}}"placeholder="Enter Your PassWord"style="width: 450px;" />
>>>>>>> 90f9f72676f86d14b417efe0f03588531fe21a68
                            <label class="text-danger">{{$errors->first('password')}}</label>
                        </div>

                        <div class="form-group ">
                            <label class="label" > <h5 style="display: none">  Address: </h5> </label>
                            <textarea name="address" class="form-control" placeholder="Enter Your Address"style="width: 450px;"></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <label class="label" > <h5 style="display: none"> Phone Number : </h5> </label>
                            <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="Enter Your Phone" style="width: 450px;"/>
                            <label class="text-danger">{{$errors->first('phone')}}</label>
                        </div>
                        <div class="form-group mt-2">
<<<<<<< HEAD
                            <label class="label" > <h5 style="display: none ; height:40px"> Phone Number : </h5> </label>
=======
                            <label class="label" > <h5 style="display: none"> Phone Number : </h5> </label>
>>>>>>> 90f9f72676f86d14b417efe0f03588531fe21a68
                            <input type="hidden" />

                        </div>

                        <div class="form-group  mt-3" style="padding-left: 100px;">
                            <input type="submit" class="btn text-warning btn-lg"/>
                            <a class="btn  text-warning btn-lg" href="{{route('contact.create')}}"><button> Already Registered</button>  </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


@endsection


