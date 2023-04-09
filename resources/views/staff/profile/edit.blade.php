@extends('layout.staff.layout-staff', ['class' => 'g-sidenav-show bg-gray-100'])

@section('title', 'Edit Profile')
@section('content')
@include('layout.staff.topnav', ['title' => 'Edit Profile'])

<main class="main-content mt-0">
    <div class="container pt-3">
        <div class="col d-flex justify-content-center mx-auto">
            <div class="mx-auto">
                <div class="card z-index-0" style="width:590px">
                    <div class="card-header text-center pt-4">
                        <h5>Edit Profile</h5>
                    </div>
                    <a href="/staff/profile/{{$staff->id}}">
                        <button class="text-uppercase text-secondary ni ni-bold-left"
                            style="position:absolute; top:1.3rem; left:1rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
                    <div class="card-body">
                        <form method="POST" action="/staff/profile/{{$staff->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{$staff->name}}"
                                    placeholder="Name">
                            </div>
                            @error('name')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

                            <div style="float:left; display:flex;">
                                <div class="mb-3 me-3">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" name="email" style="width:262px"
                                        value="{{$staff->email}}" readonly>
                                </div>
                                @error('email')
                                <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                                @enderror

                                <div class="mb-3 me-3">
                                    <label for="contact">Contact:</label>
                                    <input type="text" class="form-control" name="contact" style="width:262px"
                                        value="{{$staff->contact}}">
                                </div>
                                @error('contact')
                                <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="hostel">Hostel:</label>
                                <select name="hostel" class="form-control">
                                    <option value="Kolej Tun Fatimah" {{ $staff->hostel=='Kolej Tun Fatimah' ?
                                        'selected' : '' }}>Kolej Tun Fatimah</option>
                                    <option value="Kolej Tun Dr Ismail" {{ $staff->hostel=='Kolej Tun Dr Ismail' ?
                                        'selected' : '' }}>Kolej Tun Dr Ismail
                                    </option>
                                    <option value="Kolej Tun Hussein Onn" {{ $staff->hostel=='Kolej Tun Hussein Onn' ?
                                        'selected' : '' }}>Kolej Tun Hussein Onn
                                    </option>
                                    <option value="Kolej Datin Seri Endon" {{ $staff->hostel=='Kolej Datin Seri Endon'
                                        ? 'selected' : '' }}>Kolej Datin Seri Endon
                                    </option>
                                    <option value="Kolej Perdana" {{ $staff->hostel=='Kolej Perdana' ? 'selected' : ''
                                        }}>Kolej Perdana
                                    </option>
                                    <option value="Kolej Tun Razak" {{ $staff->hostel=='Kolej Tun Razak' ? 'selected'
                                        : '' }}>Kolej Tun Razak
                                    </option>
                                    <option value="Kolej Rahman Putra" {{ $staff->hostel=='Kolej Rahman Putra' ?
                                        'selected' : '' }}>Kolej Rahman Putra
                                    </option>
                                    <option value="Kolej Tuanku Canselor" {{ $staff->hostel=='Kolej Tuanku Canselor' ?
                                        'selected' : ''
                                        }}>Kolej Tuanku Canselor</option>
                                    <option value="Kolej Dato Onn Jaafar" {{ $staff->hostel=='Kolej Dato Onn Jaafar' ?
                                        'selected' : '' }}>Kolej Dato Onn Jaafar
                                    </option>
                                    <option value="Kolej 9" {{ $staff->hostel=='Kolej 9' ? 'selected' : '' }}>Kolej 9
                                    </option>
                                    <option value="Kolej 10" {{ $staff->hostel=='Kolej 10' ? 'selected' : '' }}>Kolej
                                        10
                                    </option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button class="btn bg-gradient-dark w-100 my-4 mb-2">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('layout.staff.footer')
@endsection