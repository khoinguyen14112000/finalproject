@extends('front.layout.master')
@section('title','register')
@section('body')


    <!--Breadcrumb Section Begin  -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i>Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Section End  -->

    <!-- Register section begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        @if (count($errors) >0)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="text-danger"> {{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if (session('status'))
                            <ul>
                                <li class="text-danger"> {{ session('status') }}</li>
                            </ul>
                        @endif
                        <h2>Register</h2>
                        <form action="{{ route('storeUser') }}" method="post">
                            {{csrf_field()}}
                            <div class="group-input">
                                <label for="username">Username or Email * </label>
                                <input type="text" id="username" name="txtEmail">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" class="form-control" placeholder="Password" name="txtPassword">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="password" class="form-control" placeholder="Password" name="txtPassword_confirmation">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <button type="submit" class="site-btn register-btn text-center">Create Account </button>
                        </form>
                        <div class="switch-login">
                            <a href="./login" class="or-login">Back To Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register section end -->

@endsection
