{{-- <p>Test {{$report['category']}}</p> --}}

@extends('layout.staff.layout-staff', ['class' => 'g-sidenav-show bg-gray-100'])

@section('title', 'Edit Ticket')
@section('content')
@include('layout.staff.topnav', ['title' => 'Edit Ticket'])

<main class="main-content mt-0">
    <div class="container pt-3">
        <div class="col d-flex justify-content-center mx-auto">
            <div class="mx-auto">
                <div class="card z-index-0" style="width:590px">
                    <div class="card-header text-center pt-4">
                        <h5>Edit Ticket ID {{$report->id}}</h5>
                    </div>
                    <a href="/staff/reports/{{$report->id}}"> <button
                            class="text-uppercase text-secondary ni ni-bold-left"
                            style="position:absolute; top:1.3rem; left:1rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
                    <div class="card-body">
                        <form method="POST" action="/staff/reports/{{$report->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="category">Category:</label>
                                <select name="category" class="form-control" disabled>
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
                                    placeholder="Description" disabled>{{$report->description}}</textarea>
                            </div>
                            @error('description')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

                            <div class="mb-3">
                                <label for="assign">Assigned To:</label>
                                <select name="assign" class="form-control">
                                    <option value="Unassigned" {{ old('assign')=='Unassigned' ? 'selected' : '' }}>
                                        Unassigned</option>
                                    @foreach($staff as $staf)
                                    <option value="{{ $staf->name }}" {{$staf->name == $staf->name ?
                                        'selected' : ''}}>{{ $staf->name}}</option>
                                    @endforeach
                                    <option hidden value="{{ $report->assign }}" {{$report->assign ==
                                        $report->assign
                                        ?
                                        'selected' : ''}}>{{ $report->assign}}</option>
                                </select>
                            </div>
                            @error('assign')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

                            <div class="mb-3">
                                <label for="priority">Priority:</label>
                                <select name="priority" class="form-control">
                                    <option value="Unassigned" {{ $report->priority=='Unassigned' ? 'selected' : ''
                                        }}>Unassigned</option>
                                    <option value="Low" {{ $report->priority=='Low' ? 'selected' : '' }}>Low</option>
                                    <option value="Medium" {{ $report->priority=='Medium' ? 'selected' : '' }}>Medium
                                    </option>
                                    <option value="High" {{ $report->priority=='High' ? 'selected' : '' }}>High</option>
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

                            <div class="text-center">
                                <button class="btn bg-gradient-dark w-100 my-4 mb-2">Update</button>
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