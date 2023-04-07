@extends('layout.staff.layout-staff', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layout.staff.topnav', ['title' => 'Student Information'])

<main class="main-content mt-0">
    <div class="container pt-3">
        <div class="col d-flex justify-content-center mx-auto">
            <div class="mx-auto">
                <div class="card z-index-0" style="width:590px">
                    <div class="card-header text-center pt-4">
                        <h5>Student Information</h5>
                    </div>
                    <a href="/staff/students"> <button class="text-uppercase text-secondary ni ni-bold-left"
                            style="position:absolute; top:1.3rem; left:1rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
                    <a href="/staff/students/{{$student->id}}/edit">
                        <button class="text-uppercase text-secondary text-s font-weight-bolder fa fa-pencil"
                            style="position:absolute; top:1rem; right:1rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name">Name:</label>
                            <span class="form-control" name="name" placeholder="Name">{{$student->name}}</span>
                        </div>

                        <div style="float:left; display:flex;">
                            <div class="mb-3 me-3">
                                <label for="email">Email:</label>
                                <span class="form-control" name="email" style="width:262px">{{$student->email}}</span>
                            </div>

                            <div class="mb-3 me-3">
                                <label for="contact">Contact:</label>
                                <span class="form-control" name="contact" style="width:262px">{{$student->contact ?
                                    $student->contact :
                                    'N/A' }}</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="hostel">Hostel:</label>
                            <select name="hostel" class="form-control bg-white" disabled>
                                <option value="Kolej Tun Fatimah" {{ $student->hostel=='Kolej Tun Fatimah' ?
                                    'selected' : '' }}>Kolej Tun Fatimah</option>
                                <option value="Kolej Tun Dr Ismail" {{ $student->hostel=='Kolej Tun Dr Ismail' ?
                                    'selected' : '' }}>Kolej Tun Dr Ismail
                                </option>
                                <option value="Kolej Tun Hussein Onn" {{ $student->hostel=='Kolej Tun Hussein Onn' ?
                                    'selected' : '' }}>Kolej Tun Hussein Onn
                                </option>
                                <option value="Kolej Datin Seri Endon" {{ $student->hostel=='Kolej Datin Seri Endon'
                                    ? 'selected' : '' }}>Kolej Datin Seri Endon
                                </option>
                                <option value="Kolej Perdana" {{ $student->hostel=='Kolej Perdana' ? 'selected' : ''
                                    }}>Kolej Perdana
                                </option>
                                <option value="Kolej Tun Razak" {{ $student->hostel=='Kolej Tun Razak' ? 'selected'
                                    : '' }}>Kolej Tun Razak
                                </option>
                                <option value="Kolej Rahman Putra" {{ $student->hostel=='Kolej Rahman Putra' ?
                                    'selected' : '' }}>Kolej Rahman Putra
                                </option>
                                <option value="Kolej Tuanku Canselor" {{ $student->hostel=='Kolej Tuanku Canselor' ?
                                    'selected' : ''
                                    }}>Kolej Tuanku Canselor</option>
                                <option value="Kolej Dato Onn Jaafar" {{ $student->hostel=='Kolej Dato Onn Jaafar' ?
                                    'selected' : '' }}>Kolej Dato Onn Jaafar
                                </option>
                                <option value="Kolej 9" {{ $student->hostel=='Kolej 9' ? 'selected' : '' }}>Kolej 9
                                </option>
                                <option value="Kolej 10" {{ $student->hostel=='Kolej 10' ? 'selected' : '' }}>Kolej
                                    10
                                </option>
                            </select>
                        </div>

                        <div style="float:left; display:flex;">
                            <div class="mb-3 me-3">
                                <label for="email">Block:</label>
                                <span type="text" class="form-control" name="block"
                                    style="width:170px">{{$student->block ?
                                    $student->block :
                                    'N/A' }}</span>
                            </div>

                            <div class="mb-3 me-3">
                                <label for="floor">Floor:</label>
                                <span type="text" class="form-control" name="floor"
                                    style="width:170px">{{$student->floor ?
                                    $student->floor :
                                    'N/A' }}</span>
                            </div>

                            <div class="mb-3 me-3">
                                <label for="room">Room:</label>
                                <span type="text" class="form-control" name="room" style="width:170px">{{$student->room
                                    ?
                                    $student->room :
                                    'N/A' }}</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <form method="POST" action="/staff/students/{{$student->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn bg-gradient-dark w-100 my-4 mb-2">Delete</button>
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