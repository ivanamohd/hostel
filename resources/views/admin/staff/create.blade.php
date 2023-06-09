@extends('layout.admin.layout-admin', ['class' => 'g-sidenav-show bg-gray-100'])

@section('title', 'Add Staff')
@section('content')
@include('layout.admin.topnav', ['title' => 'Add Staff'])

<main class="main-content mt-0">
    <div class="container pt-3">
        <div class="col d-flex justify-content-center mx-auto">
            <div class="mx-auto">
                <div class="card z-index-0" style="width:590px">
                    <div class="card-header text-center pt-4">
                        <h5>Add New Staff</h5>
                    </div>
                    <a href="javascript:history.back()">
                        <button class="text-uppercase text-secondary ni ni-bold-left"
                            style="position:absolute; top:1.3rem; left:1rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
                    <div class="card-body">
                        <form method="POST" action="/admin/staff" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}"
                                    placeholder="Name">
                            </div>
                            @error('name')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

                            <div style="float:left; display:flex;">
                                <div class="mb-3 me-3">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" name="email" style="width:262px"
                                        value="{{old('email')}}">
                                </div>
                                @error('email')
                                <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                                @enderror

                                <div class="mb-3 me-3">
                                    <label for="contact">Contact:</label>
                                    <input type="text" class="form-control" name="contact" style="width:262px"
                                        value="{{old('contact')}}">
                                </div>
                                @error('contact')
                                <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div style="float:left; display:flex;">
                                <div class="mb-3 me-3" style="width:262px">
                                    <select name="hostel" class="form-control">
                                        <option value="" disabled selected>Hostel</option>
                                        <option value="Kolej Tun Fatimah" {{ old('hostel')=='Kolej Tun Fatimah'
                                            ? 'selected' : '' }}>Kolej Tun Fatimah</option>
                                        <option value="Kolej Tun Dr Ismail" {{ old('hostel')=='Kolej Tun Dr Ismail'
                                            ? 'selected' : '' }}>Kolej Tun
                                            Dr Ismail
                                        </option>
                                        <option value="Kolej Tun Hussein Onn" {{ old('hostel')=='Kolej Tun Hussein Onn'
                                            ? 'selected' : '' }}>Kolej Tun
                                            Hussein Onn
                                        </option>
                                        <option value="Kolej Datin Seri Endon" {{
                                            old('hostel')=='Kolej Datin Seri Endon' ? 'selected' : '' }}>Kolej
                                            Datin Seri Endon
                                        </option>
                                        <option value="Kolej Perdana" {{ old('hostel')=='Kolej Perdana' ? 'selected'
                                            : '' }}>Kolej Perdana
                                        </option>
                                        <option value="Kolej Tun Razak" {{ old('hostel')=='Kolej Tun Razak' ? 'selected'
                                            : '' }}>Kolej Tun Razak
                                        </option>
                                        <option value="Kolej Rahman Putra" {{ old('hostel')=='Kolej Rahman Putra'
                                            ? 'selected' : '' }}>Kolej Rahman Putra
                                        </option>
                                        <option value="Kolej Tuanku Canselor" {{ old('hostel')=='Kolej Tuanku Canselor'
                                            ? 'selected' : '' }}>Kolej
                                            Tuanku Canselor
                                        </option>
                                        <option value="Kolej Dato Onn Jaafar" {{ old('hostel')=='Kolej Dato Onn Jaafar'
                                            ? 'selected' : '' }}>Kolej Dato
                                            Onn Jaafar
                                        </option>
                                        <option value="Kolej 9" {{ old('hostel')=='Kolej 9' ? 'selected' : '' }}>
                                            Kolej 9
                                        </option>
                                        <option value="Kolej 10" {{ old('hostel')=='Kolej 10' ? 'selected' : '' }}>
                                            Kolej
                                            10
                                        </option>
                                    </select>
                                </div>
                                @error('hostel')
                                <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                                @enderror

                                <div class="mb-3 me-3" style="width:262px">
                                    <select name="head" class="form-control">
                                        <option value="" disabled selected>Head</option>
                                        <option value="1" {{ old('head')=='1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('priority')=='0' ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                </div>
                                @error('head')
                                <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button class="btn bg-gradient-dark w-100 my-4 mb-2">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
@include('layout.staff.footer')
@endsection