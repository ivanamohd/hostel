@extends('layout.layout-login', ['class' => 'g-sidenav-show bg-gray-100'])

@section('title', 'Sign In')
@section('content')
<div class="main-content mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Sign In</h4>
                                <p class="mb-0">Enter your email and password to sign in</p>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="/users/authenticate">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="email" class="form-control form-control-lg" placeholder="Email"
                                            name="email" value="{{old('email')}}">
                                    </div>
                                    @error('email')
                                    <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                                    @enderror

                                    <div class="mb-3">
                                        <input type="password" class="form-control form-control-lg"
                                            placeholder="Password" name="password" value="{{old('password')}}">
                                        <p class="mt-2 text-sm mx-2"><a href="{{ route('password.request') }}">Forgot
                                                your password?</a>
                                        </p>
                                    </div>
                                    @error('password')
                                    <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                                    @enderror

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-3 mb-0">Sign
                                            in</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-2 text-sm mx-auto">
                                    Don't have an account?
                                    <a href="/register" class="text-primary text-gradient font-weight-bold">Sign
                                        up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                            style="background-image: url({{ asset('images/utm2.jpg'); }}); background-size: cover;">
                            <span class="mask bg-gradient-primary opacity-6"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection