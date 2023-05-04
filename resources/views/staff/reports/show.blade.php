{{-- <p>Test {{$report['category']}}</p> --}}

@extends('layout.staff.layout-staff', ['class' => 'g-sidenav-show bg-gray-100'])

@section('title', 'View Ticket')
@section('content')
@include('layout.staff.topnav', ['title' => 'View Ticket'])

<main class="main-content mt-0">
    <div class="container pt-3">
        <div class="col d-flex justify-content-center mx-auto">
            <div class="mx-auto">
                <div class="card z-index-0" style="width:590px">
                    <div class="card-header text-center pt-4">
                        <h5>Ticket ID: {{$report->id}}</h5>
                        @if($exist)

                        @else
                        <span class="form-control badge badge-sm bg-gradient-faded-danger" style="width:160px">Student
                            Deleted</span>
                        @endif
                    </div>
                    <a href="/staff/reports"> <button class="text-uppercase text-secondary ni ni-bold-left"
                            style="position:absolute; top:1.3rem; left:1rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
                    <a href="/staff/reports/{{$report->id}}/edit">
                        <button class="text-uppercase text-secondary text-s font-weight-bolder fa fa-pencil"
                            style="position:absolute; top:1.3rem; right:1rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
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
                            <span class="form-control">{{$report->name}}</span>
                        </div>
                        <div style="float:left; display:flex;">
                            <div class="mb-3 me-3">
                                <label>Email:</label>
                                <span class="form-control" style="width:262px">{{$report->email}}</span>
                            </div>
                            <div class="mb-3 me-3">
                                <label>Contact:</label>
                                <span class="form-control" style="width:262px">{{$report->contact}}</span>
                            </div>
                        </div>
                        <div style="float:left; display:flex;">
                            <div class="mb-3 me-3">
                                <label>Block:</label>
                                <span class="form-control" style="width:170px">{{$report->block}}</span>
                            </div>
                            <div class="mb-3 me-3">
                                <label>Floor:</label>
                                <span class="form-control" style="width:170px">{{$report->floor}}</span>
                            </div>
                            <div class="mb-3 me-3">
                                <label>Room:</label>
                                <span class="form-control" style="width:170px">{{$report->room}}</span>
                            </div>
                        </div>

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

                            <div class="mb-3">
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

                            <div class="mb-3">
                                <label>Assigned To:</label>
                                <span class="form-control" style="width:170px">{{$report->assign}}</span>
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
                        <div class="text-center">
                            <form method="POST" action="/staff/reports/{{$report->id}}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')"
                                    class="btn bg-gradient-dark w-100 my-4 mb-2">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('layout.staff.footer')
@endsection