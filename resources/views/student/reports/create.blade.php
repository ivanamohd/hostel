@extends('layout.student.layout-student', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layout.student.topnav', ['title' => 'Add Ticket'])

<main class="main-content mt-0">
    <div class="container pt-3">
        <div class="justify-content-center">
            <div class="col-xl-7 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0" style="width:550px">
                    <div class="card-header text-center pt-4">
                        <h5>New Ticket</h5>
                    </div>
                    <a href="/reports">
                        <button class="text-uppercase text-secondary ni ni-bold-left"
                            style="position:absolute; top:1.3rem; left:1rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
                    <div class="card-body">
                        <form method="POST" action="/reports" enctype="multipart/form-data">
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

                            <label for="evidence">Evidence:</label>
                            <div class="mb-3">
                                <input type="file" class="form-control" name="evidence" accept="image/*" required>
                            </div>
                            @error('evidence')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

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
@include('layout.student.footer')
@endsection