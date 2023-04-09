@extends('layout.student.layout-student', ['class' => 'g-sidenav-show bg-gray-100'])

@section('title', 'View Ticket')
@section('content')
@include('layout.student.topnav', ['title' => 'View Ticket'])

<main class="main-content mt-0">
    <div class="container pt-3">
        <div class="justify-content-center">
            <div class="col-xl-8 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0" style="width:590px">
                    <div class="card-header text-center pt-4">
                        <h5>Ticket ID: {{$report['id']}}</h5>
                    </div>
                    <a href="/reports">
                        <button class="text-uppercase text-secondary ni ni-bold-left"
                            style="position:absolute; top:1.3rem; left:1rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Category:</label>
                            <span class="form-control">{{$report->category}}</span>
                        </div>
                        <div class="mb-3">
                            <label>Description:</label>
                            <span class="form-control">{{$report->description}}</span>
                        </div>
                        <div class="mb-3">
                            <label>Name:</label>
                            <span class="form-control">{{$student->name}}</span>
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

                        <div class="mb-3">
                            <label for="priority">Priority:</label>
                            <select name="priority" class="form-control">
                                <option value="" disabled selected>Priority</option>
                                <option value="High" {{ old('priority')=='High' ? 'selected' : '' }}>High</option>
                                <option value="Medium" {{ old('priority')=='Medium' ? 'selected' : '' }}>Medium
                                </option>
                                <option value="Low" {{ old('priority')=='Low' ? 'selected' : '' }}>Low</option>
                            </select>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="hostel">Hostel:</label>
                            <select name="hostel" class="form-control" disabled>
                                <option value="Kolej Tun Fatimah" {{ $report->hostel=='Kolej Tun Fatimah' ?
                                    'selected' : '' }}>Kolej Tun Fatimah</option>
                                <option value="Kolej Tun Dr Ismail" {{ $report->hostel=='Kolej Tun Dr Ismail' ?
                                    'selected' : '' }}>Kolej Tun Dr Ismail
                                </option>
                                <option value="Kolej Tun Hussein Onn" {{ $report->hostel=='Kolej Tun Hussein Onn' ?
                                    'selected' : '' }}>Kolej Tun Hussein Onn
                                </option>
                                <option value="Kolej Datin Seri Endon" {{ $report->hostel=='Kolej Datin Seri Endon'
                                    ? 'selected' : '' }}>Kolej Datin Seri Endon
                                </option>
                                <option value="Kolej Perdana" {{ $report->hostel=='Kolej Perdana' ? 'selected' : ''
                                    }}>Kolej Perdana
                                </option>
                                <option value="Kolej Tun Razak" {{ $report->hostel=='Kolej Tun Razak' ? 'selected'
                                    : '' }}>Kolej Tun Razak
                                </option>
                                <option value="Kolej Rahman Putra" {{ $report->hostel=='Kolej Rahman Putra' ?
                                    'selected' : '' }}>Kolej Rahman Putra
                                </option>
                                <option value="Kolej Tuanku Canselor" {{ $report->hostel=='Kolej Tuanku Canselor' ?
                                    'selected' : ''
                                    }}>Kolej Tuanku Canselor</option>
                                <option value="Kolej Dato Onn Jaafar" {{ $report->hostel=='Kolej Dato Onn Jaafar' ?
                                    'selected' : '' }}>Kolej Dato Onn Jaafar
                                </option>
                                <option value="Kolej 9" {{ $report->hostel=='Kolej 9' ? 'selected' : '' }}>Kolej 9
                                </option>
                                <option value="Kolej 10" {{ $report->hostel=='Kolej 10' ? 'selected' : '' }}>Kolej
                                    10
                                </option>
                            </select>
                        </div> --}}

                        <div style="float:left; display:flex">
                            <div class="mb-3">
                                <label>Priority:</label>
                                @if($report->priority == 'Unassigned')
                                <span class="form-control badge badge-sm bg-gradient-faded-dark"
                                    style="width:170px">unassigned</span>

                                @elseif($report->priority == 'Low')
                                <span class="form-control badge badge-sm bg-gradient-faded-info"
                                    style="width:170px">Low</span>

                                @elseif($report->priority == 'Medium')
                                <span class="form-control badge badge-sm bg-gradient-faded-warning"
                                    style="width:170px">Medium</span>

                                @elseif($report->priority == 'High')
                                <span class="form-control badge badge-sm bg-gradient-faded-danger"
                                    style="width:170px">High</span>
                                @endif
                            </div>

                            <div class="mb-3" style="margin-right: 11rem">
                                <label>Status:</label>
                                @if($report->status == 'Pending')
                                <span class="form-control badge badge-sm bg-gradient-faded-dark"
                                    style="width:170px">Pending</span>

                                @elseif($report->status == 'In Review')
                                <span class="form-control badge badge-sm bg-gradient-secondary" style="width:170px">In
                                    Review</span>

                                @elseif($report->status == 'In Progress')
                                <span class="form-control badge badge-sm bg-gradient-info" style="width:170px">In
                                    Progress</span>

                                @elseif($report->status == 'Fixing Day')
                                <span class="form-control badge badge-sm bg-gradient-warning" style="width:170px">Fixing
                                    Day</span>

                                @elseif($report->status == 'Resolved')
                                <span class="form-control badge badge-sm bg-gradient-success"
                                    style="width:170px">Resolved</span>
                                @endif
                            </div>
                        </div>

                        <div style="float:left; display:flex;">
                            <div class="mb-3 me-3">
                                <label>Created At:</label>
                                <span class="form-control" style="width:262px">{{$report->created_at->format('d/m/Y
                                    h:i:s')}}</span>
                            </div>
                            <div class="mb-3 me-3">
                                <label>Updated At:</label>
                                <span class="form-control" style="width:262px">{{$report->updated_at->format('d/m/Y
                                    h:i:s')}}</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="evidence">Evidence:</label><br>
                            <button id="show-image-button" class="badge badge-sm bg-gradient-light mb-3"
                                style="border:none; color:black">Click Here</button><br>
                            <img id="my-image"
                                style="display: block; margin-left: auto; margin-right: auto; width: 50%;"
                                src="{{$report->evidence ? asset('storage/'.$report->evidence) : asset('/images/noimage.jpg')}}"
                                alt="" hidden />
                            <script>
                                const showImageButton = document.getElementById("show-image-button");
                                const myImage = document.getElementById("my-image");
                                showImageButton.addEventListener("click", () => {
                                    myImage.hidden = !myImage.hidden;
                                });
                            </script>
                        </div>

                        {{-- <label for="files">Select files:</label>
                        <input type="file" id="files" name="files" multiple> --}}

                        {{-- <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Category" aria-label="Category">
                        </div> --}}
                        {{-- <div class="form-check form-check-info text-start">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and
                                    Conditions</a>
                            </label>
                        </div> --}}
                        <form method="POST" action="/staff/reports/{{$report->id}}">
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
@include('layout.student.footer')
@endsection