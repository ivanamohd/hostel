@extends('layout.staff.layout-staff', ['class' => 'g-sidenav-show bg-gray-100'])

@section('title', 'Profile')
@section('content')
@include('layout.staff.topnav', ['title' => 'Profile'])

<main class="main-content mt-0">
    <div class="container pt-3">
        <div class="col d-flex justify-content-center mx-auto">
            <div class="mx-auto">
                <div class="card z-index-0" style="width:590px">
                    <div class="card-header text-center pt-4">
                        <h5>Profile Information</h5>
                    </div>
                    <a href="/staff/profile/{{auth()->user()->id}}/edit">
                        <button class="text-uppercase text-secondary text-s font-weight-bolder fa fa-pencil"
                            style="position:absolute; top:1rem; right:1rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name">Name:</label>
                            <span class="form-control" name="name" placeholder="Name">{{$staff->name}}</span>
                        </div>

                        <div style="float:left; display:flex;">
                            <div class="mb-3 me-3">
                                <label for="email">Email:</label>
                                <span class="form-control" name="email" style="width:262px">{{$staff->email}}</span>
                            </div>

                            <div class="mb-3 me-3">
                                <label for="contact">Contact:</label>
                                <span class="form-control" name="contact" style="width:262px">{{$staff->contact ?
                                    $staff->contact :
                                    'N/A' }}</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="hostel">Hostel:</label>
                            <select name="hostel" class="form-control bg-white" disabled>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('layout.staff.footer')
@endsection