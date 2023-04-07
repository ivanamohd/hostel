@extends('layout.layout-login', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
<div class="main-content  mt-0">
    <section>
        <div class="page-header" style="min-height: 120vh">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Sign Up</h4>
                                <p class="mb-0">Create an account to make reports</p>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="/users">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control form-control-lg" placeholder="Name"
                                            name="name" value="{{old('name')}}">
                                    </div>
                                    @error('name')
                                    <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                                    @enderror

                                    <div class="mb-3">
                                        <input type="email" class="form-control form-control-lg" placeholder="Email"
                                            name="email" value="{{old('email')}}">
                                    </div>
                                    @error('email')
                                    <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                                    @enderror

                                    <div class="mb-3">
                                        <select name="hostel" class="form-control">
                                            <option value="" disabled selected>Hostel</option>
                                            <option value="Kolej Tun Fatimah" {{ old('priority')=='Kolej Tun Fatimah'
                                                ? 'selected' : '' }}>Kolej Tun Fatimah</option>
                                            <option value="Kolej Tun Dr Ismail" {{
                                                old('priority')=='Kolej Tun Dr Ismail' ? 'selected' : '' }}>Kolej Tun
                                                Dr Ismail
                                            </option>
                                            <option value="Kolej Tun Hussein Onn" {{
                                                old('priority')=='Kolej Tun Hussein Onn' ? 'selected' : '' }}>Kolej Tun
                                                Hussein Onn
                                            </option>
                                            <option value="Kolej Datin Seri Endon" {{
                                                old('priority')=='Kolej Datin Seri Endon' ? 'selected' : '' }}>Kolej
                                                Datin Seri Endon
                                            </option>
                                            <option value="Kolej Perdana" {{ old('priority')=='Kolej Perdana'
                                                ? 'selected' : '' }}>Kolej Perdana
                                            </option>
                                            <option value="Kolej Tun Razak" {{ old('priority')=='Kolej Tun Razak'
                                                ? 'selected' : '' }}>Kolej Tun Razak
                                            </option>
                                            <option value="Kolej Rahman Putra" {{ old('priority')=='Kolej Rahman Putra'
                                                ? 'selected' : '' }}>Kolej Rahman Putra
                                            </option>
                                            <option value="Kolej Tuanku Canselor" {{
                                                old('priority')=='Kolej Tuanku Canselor' ? 'selected' : '' }}>Kolej
                                                Tuanku Canselor
                                            </option>
                                            <option value="Kolej Dato Onn Jaafar" {{
                                                old('priority')=='Kolej Dato Onn Jaafar' ? 'selected' : '' }}>Kolej Dato
                                                Onn Jaafar
                                            </option>
                                            <option value="Kolej 9" {{ old('priority')=='Kolej 9' ? 'selected' : '' }}>
                                                Kolej 9
                                            </option>
                                            <option value="Kolej 10" {{ old('priority')=='Kolej 10' ? 'selected' : ''
                                                }}>Kolej 10
                                            </option>
                                        </select>
                                    </div>
                                    @error('hostel')
                                    <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                                    @enderror

                                    <div class="mb-3">
                                        <input type="password" class="form-control form-control-lg"
                                            placeholder="Password" name="password" value="{{old('password')}}">
                                    </div>
                                    @error('password')
                                    <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                                    @enderror

                                    <div class="mb-3">
                                        <input type="password" class="form-control form-control-lg"
                                            placeholder="Confirm Password" name="password_confirmation"
                                            value="{{old('password_confirmation')}}">
                                    </div>
                                    @error('password_confirmation')
                                    <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                                    @enderror

                                    {{-- <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div> --}}
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign
                                            Up</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Already have an account?
                                    <a href="/login" class="text-primary text-gradient font-weight-bold">Login</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
                            <span class="mask bg-gradient-primary opacity-6"></span>
                            <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new
                                currency"</h4>
                            <p class="text-white position-relative">The more effortless the writing looks, the more
                                effort the writer actually put into the process.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection