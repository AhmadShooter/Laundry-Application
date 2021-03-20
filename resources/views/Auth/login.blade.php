@extends('layouts.login.app')
@section('title','Login | Laundry Application')
@section('content')
    <div class="account-pages w-100 mt-5 mb-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mb-0">

                        <div class="card-body p-4">

                            <div class="account-box">
                                <div class="account-logo-box">
                                    <div class="text-center">
                                        <a href="">
                                            <img src="assets/images/cropped-mazaya.JPG" alt="" height="100">
                                        </a>
                                    </div>
                                    <h5 class="text-uppercase mb-1 mt-4">Sign In</h5>
                                    <p class="mb-0">Login to your Laundry Application</p>
                                </div>

                                <div class="account-content mt-4">
                                    <form method="POST" action="{{ route('login') }}">
                                      @csrf

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="emailaddress">Email address</label>
                                                <input class="form-control" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus required="" placeholder="john@deo.com">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">

                                               @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="text-muted float-right"><small>Forgot your password?</small></a>
                                               @endif

                                                <label for="password">Password</label>
                                                <input class="form-control" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">

                                                <div class="checkbox checkbox-success">
                                                    <input id="remember" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label for="remember">
                                                        Remember me
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group row text-center mt-2">
                                            <div class="col-12">
                                                <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                            </div>
                                        </div>

                                    </form>

                                  <!--   <div class="row">
                                        <div class="col-sm-12">
                                            <div class="text-center">
                                                <button type="button" class="btn mr-1 btn-facebook waves-effect waves-light">
                                                    <i class="fab fa-facebook-f"></i>
                                                </button>
                                                <button type="button" class="btn mr-1 btn-googleplus waves-effect waves-light">
                                                    <i class="fab fa-google"></i>
                                                </button>
                                                <button type="button" class="btn mr-1 btn-twitter waves-effect waves-light">
                                                    <i class="fab fa-twitter"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
 -->
                                   <!--  <div class="row mt-4 pt-2">
                                        <div class="col-sm-12 text-center">
                                            <p class="text-muted mb-0">Don't have an account? <a href="page-register.html" class="text-dark ml-1"><b>Sign Up</b></a></p>
                                        </div>
                                    </div> -->

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
    </div>
    <!-- end page -->
    @endsection