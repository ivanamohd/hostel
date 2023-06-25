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
                            <span class="form-control">{{$report->name}}</span>
                        </div>

                        <div style="float:left; display:flex;">
                            <div class="mb-3 me-3">
                                <label for="email">Email:</label>
                                <span class="form-control" name="email" style="width:262px">{{$report->email}}</span>
                            </div>

                            <div class="mb-3 me-3">
                                <label for="contact">Contact:</label>
                                <span class="form-control" name="contact" style="width:262px">{{$report->contact ?
                                    $report->contact :
                                    'N/A' }}</span>
                            </div>
                        </div>

                        <div style="float:left; display:flex;">
                            <div class="mb-3 me-3">
                                <label for="email">Block:</label>
                                <span type="text" class="form-control" name="block" style="width:170px">{{$report->block
                                    ?
                                    $report->block :
                                    'N/A' }}</span>
                            </div>

                            <div class="mb-3 me-3">
                                <label for="floor">Floor:</label>
                                <span type="text" class="form-control" name="floor" style="width:170px">{{$report->floor
                                    ?
                                    $report->floor :
                                    'N/A' }}</span>
                            </div>

                            <div class="mb-3 me-3">
                                <label for="room">Room:</label>
                                <span type="text" class="form-control" name="room" style="width:170px">{{$report->room
                                    ?
                                    $report->room :
                                    'N/A' }}</span>
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
                                <label>Person in Charge:</label>
                                <span class="form-control" style="width:170px">{{$report->assign}}</span>
                            </div>
                        </div>

                        <div style="float:left; display:flex;">
                            <div class="mb-3 me-3">
                                <label>Created At:</label>
                                <span class="form-control" style="width:262px">{{$report->created_at->format('d/m/Y
                                    H:i:s')}}</span>
                            </div>
                            <div class="mb-3 me-3">
                                <label>Updated At:</label>
                                <span class="form-control" style="width:262px">{{$report->updated_at->format('d/m/Y
                                    H:i:s')}}</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="evidence">Evidence:</label><br>
                            <button id="show-image-button" class="badge badge-sm bg-gradient-light mb-3"
                                style="border:none; color:black">Click Here</button><br>
                            <img id="my-image"
                                style="display: block; margin-left: auto; margin-right: auto; width: 50%;"
                                src="{{$report->evidence ? Storage::disk('s3')->url($report->evidence) : asset('/images/noimage.jpg')}}"
                                alt="" hidden />
                            <script>
                                const showImageButton = document.getElementById("show-image-button");
                                const myImage = document.getElementById("my-image");
                                showImageButton.addEventListener("click", () => {
                                    myImage.hidden = !myImage.hidden;
                                });
                            </script>
                        </div>
                        <form method="POST" action="/reports/{{$report->id}}">
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
</main>
@include('layout.student.footer')
@endsection