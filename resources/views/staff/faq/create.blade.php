@extends('layout.staff.layout-staff', ['class' => 'g-sidenav-show bg-gray-100'])

@section('title', 'Add FAQ')
@section('content')
@include('layout.staff.topnav', ['title' => 'Add FAQ'])

<main class="main-content mt-0">
    <div class="container pt-3">
        <div class="col d-flex justify-content-center mx-auto">
            <div class="mx-auto">
                <div class="card z-index-0" style="width:590px">
                    <div class="card-header text-center pt-4">
                        <h5>Add New FAQ</h5>
                    </div>
                    <a href="/staff/faqlist">
                        <button class="text-uppercase text-secondary ni ni-bold-left"
                            style="position:absolute; top:1.3rem; left:1rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
                    <div class="card-body">
                        <form method="POST" action="/staff/faq" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="question">Question:</label>
                                <input type="text" maxlength="200" class="form-control" name="question"
                                    value="{{old('question')}}">
                            </div>
                            @error('question')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="question">Answer:</label>
                                <textarea class="form-control" name="answer"
                                    maxlength="300">{{old('answer')}}</textarea>
                            </div>
                            @error('answer')
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