@extends('layout.staff.layout-staff', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layout.staff.topnav', ['title' => 'Edit Ticket'])

<main class="main-content mt-0">
    <div class="container pt-3">
        <div class="justify-content-center">
            <div class="col-xl-7 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0" style="width:550px">
                    <div class="card-header text-center pt-4">
                        <h5>Edit Ticket ID {{$report['id']}}</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/reports/{{$report->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="category">Category:</label>
                                <select name="category" class="form-control">
                                    <option value="Awam" {{ $report->category=='Awam' ? 'selected' : '' }}>Awam</option>
                                    <option value="Elektrik" {{ $report->category=='Elektrik' ? 'selected' : ''
                                        }}>Elektrik</option>
                                    <option value="Perabot" {{ $report->category=='Perabot' ? 'selected' : '' }}>Perabot
                                    </option>
                                </select>
                            </div>
                            @error('category')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

                            <div class="mb-3">
                                <label for="description">Description:</label>
                                <textarea class="form-control" name="description" maxlength="150"
                                    placeholder="Description">{{$report->description}}</textarea>
                            </div>
                            @error('description')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

                            <div class="mb-3">
                                <label for="priority">Priority:</label>
                                <select name="priority" class="form-control">
                                    <option value="High" {{ $report->priority=='High' ? 'selected' : '' }}>High</option>
                                    <option value="Medium" {{ $report->priority=='Medium' ? 'selected' : '' }}>Medium
                                    </option>
                                    <option value="Low" {{ $report->priority=='Low' ? 'selected' : '' }}>Low</option>
                                </select>
                            </div>
                            @error('priority')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

                            <div class="mb-3">
                                <label for="status">Status:</label>
                                <select name="status" class="form-control">
                                    <option value="Pending" {{ $report->status=='Pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="In Review" {{ $report->status=='In Review' ? 'selected' : ''
                                        }}>In Review
                                    </option>
                                    <option value="In Progress" {{ $report->status=='In Progress' ? 'selected' : ''
                                        }}>In Progress
                                    </option>
                                    <option value="Fixing Day" {{ $report->status=='Fixing Day' ? 'selected' : ''
                                        }}>Fixing Day
                                    </option>
                                    <option value="Resolved" {{ $report->status=='Resolved' ? 'selected' : ''
                                        }}>Resolved
                                    </option>
                                </select>
                            </div>
                            @error('priority')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

                            <div class="mb-3">
                                <label for="evidence">Evidence:</label>
                                <input type="file" class="form-control" name="evidence">
                            </div>
                            <img class="w-45 mr-6 mb-1"
                                src="{{$report->evidence ? asset('storage/'.$report->evidence) : asset('/images/logo-black.png')}}"
                                alt="" />
                            @error('evidence')
                            <p class=" text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

                            <input type="hidden" name="hostel" value="KTDI">

                            <div class="text-center">
                                <button class="btn bg-gradient-dark w-50 my-4 mb-2 mt-2">Edit</button>
                                <a href="/reports" class="btn bg-white w-30 my-4 mb-2 mt-2">Back</a>
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