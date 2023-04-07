@extends('layout.staff.layout-staff', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layout.staff.topnav', ['title' => 'Add Student'])

<main class="main-content mt-0">
    <div class="container pt-3">
        <div class="col d-flex justify-content-center mx-auto">
            <div class="mx-auto">
                <div class="card z-index-0" style="width:590px">
                    <div class="card-header text-center pt-4">
                        <h5>Add New Student</h5>
                    </div>
                    <a href="/staff/students">
                        <button class="text-uppercase text-secondary ni ni-bold-left"
                            style="position:absolute; top:1.3rem; left:1rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
                    <div class="card-body">
                        <form method="POST" action="/staff/students" enctype="multipart/form-data">
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

                            <div class="mb-3">
                                <select name="hostel" class="form-control">
                                    <option value="" disabled selected>Hostel</option>
                                    <option value="Kolej Tun Fatimah" {{ old('priority')=='Kolej Tun Fatimah'
                                        ? 'selected' : '' }}>Kolej Tun Fatimah</option>
                                    <option value="Kolej Tun Dr Ismail" {{ old('priority')=='Kolej Tun Dr Ismail'
                                        ? 'selected' : '' }}>Kolej Tun
                                        Dr Ismail
                                    </option>
                                    <option value="Kolej Tun Hussein Onn" {{ old('priority')=='Kolej Tun Hussein Onn'
                                        ? 'selected' : '' }}>Kolej Tun
                                        Hussein Onn
                                    </option>
                                    <option value="Kolej Datin Seri Endon" {{ old('priority')=='Kolej Datin Seri Endon'
                                        ? 'selected' : '' }}>Kolej
                                        Datin Seri Endon
                                    </option>
                                    <option value="Kolej Perdana" {{ old('priority')=='Kolej Perdana' ? 'selected' : ''
                                        }}>Kolej Perdana
                                    </option>
                                    <option value="Kolej Tun Razak" {{ old('priority')=='Kolej Tun Razak' ? 'selected'
                                        : '' }}>Kolej Tun Razak
                                    </option>
                                    <option value="Kolej Rahman Putra" {{ old('priority')=='Kolej Rahman Putra'
                                        ? 'selected' : '' }}>Kolej Rahman Putra
                                    </option>
                                    <option value="Kolej Tuanku Canselor" {{ old('priority')=='Kolej Tuanku Canselor'
                                        ? 'selected' : '' }}>Kolej
                                        Tuanku Canselor
                                    </option>
                                    <option value="Kolej Dato Onn Jaafar" {{ old('priority')=='Kolej Dato Onn Jaafar'
                                        ? 'selected' : '' }}>Kolej Dato
                                        Onn Jaafar
                                    </option>
                                    <option value="Kolej 9" {{ old('priority')=='Kolej 9' ? 'selected' : '' }}>
                                        Kolej 9
                                    </option>
                                    <option value="Kolej 10" {{ old('priority')=='Kolej 10' ? 'selected' : '' }}>Kolej
                                        10
                                    </option>
                                </select>
                            </div>
                            @error('hostel')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

                            <div style="float:left; display:flex;">
                                <div class="mb-3 me-3">
                                    <label for="email">Block:</label>
                                    <input type="text" class="form-control" name="block" style="width:170px"
                                        value="{{old('block')}}">
                                </div>
                                @error('block')
                                <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                                @enderror

                                <div class="mb-3 me-3">
                                    <label for="floor">Floor:</label>
                                    <input type="text" class="form-control" name="floor" style="width:170px"
                                        value="{{old('floor')}}">
                                </div>
                                @error('floor')
                                <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                                @enderror

                                <div class="mb-3 me-3">
                                    <label for="room">Room:</label>
                                    <input type="text" class="form-control" name="room" style="width:170px"
                                        value="{{old('room')}}">
                                </div>
                                @error('room')
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