@extends('layout.staff.layout-staff', ['class' => 'g-sidenav-show bg-gray-100'])

@section('title', 'Create Ticket')
@section('content')
@include('layout.staff.topnav', ['title' => 'Add Ticket'])

<main class="main-content mt-0">
    <div class="container pt-3">
        <div class="justify-content-center">
            <div class="col-xl-7 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0" style="width:550px">
                    <div class="card-header text-center pt-4">
                        <h5>New Ticket</h5>
                    </div>
                    <a href="javascript:history.back()"> <button class="text-uppercase text-secondary ni ni-bold-left"
                            style="position:absolute; top:1.3rem; left:1rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
                    <div class="card-body">
                        <form method="POST" action="/staff/reports/by/{{$student->id}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <select name="category" class="form-control" value="{{old('category')}}">
                                    <option value="" disabled selected>Category</option>
                                    <option value="Awam" {{ old('category')=='Awam' ? 'selected' : '' }}>Awam</option>
                                    <option value="Elektrik" {{ old('category')=='Elektrik' ? 'selected' : '' }}>
                                        Elektrik</option>
                                    <option value="Perabot" {{ old('category')=='Perabot' ? 'selected' : '' }}>Perabot
                                    </option>
                                    <option value="Lain-lain" {{ old('category')=='Lain-lain' ? 'selected' : '' }}>
                                        Lain-lain
                                    </option>
                                </select>
                            </div>
                            @error('category')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

                            <div class="mb-3">
                                <textarea class="form-control" name="description" maxlength="150"
                                    placeholder="Description">{{old('description')}}</textarea>
                            </div>
                            @error('description')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

                            <div class="mb-3">
                                <select name="priority" class="form-control">
                                    <option value="" disabled selected>Priority</option>
                                    <option value="High" {{ old('priority')=='High' ? 'selected' : '' }}>High</option>
                                    <option value="Medium" {{ old('priority')=='Medium' ? 'selected' : '' }}>Medium
                                    </option>
                                    <option value="Low" {{ old('priority')=='Low' ? 'selected' : '' }}>Low</option>
                                    <option value="Unassigned" {{ old('priority')=='Unassigned' ? 'selected' : '' }}>
                                        Unassigned</option>
                                </select>
                            </div>
                            @error('priority')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

                            <label for="assign">Assign To:</label>
                            <div class="mb-3">
                                <select name="assign" class="form-control">
                                    <option value="Unassigned" {{ old('assign')=='Unassigned' ? 'selected' : '' }}>
                                        Unassigned</option>
                                    @foreach($staff as $staf)
                                    <option value="{{ $staf->name }}" {{$staf->name == $staf->name ?
                                        'selected' : ''}}>{{ $staf->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('assign')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

                            <label for="evidence">Evidence:</label>
                            <div class="mb-3">
                                <input type="file" class="form-control" name="evidence">
                            </div>
                            @error('evidence')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

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
@include('layout.staff.footer')
@endsection