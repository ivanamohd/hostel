@extends('layout.staff.layout-staff', ['class' => 'g-sidenav-show bg-gray-100'])

@section('title', 'FAQ Information')
@section('content')
@include('layout.staff.topnav', ['title' => 'FAQ Information'])

<main class="main-content mt-0">
    <div class="container pt-3">
        <div class="col d-flex justify-content-center mx-auto">
            <div class="mx-auto">
                <div class="card z-index-0" style="width:590px">
                    <div class="card-header text-center pt-4">
                        <h5>FAQ Information</h5>
                    </div>
                    <a href="/staff/faqlist"> <button class="text-uppercase text-secondary ni ni-bold-left"
                            style="position:absolute; top:1.3rem; left:1rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
                    <a href="/staff/faq/{{$faq->id}}/edit">
                        <button class="text-uppercase text-secondary text-s font-weight-bolder fa fa-pencil"
                            style="position:absolute; top:1rem; right:1rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="question">Question:</label>
                            <span class="form-control" name="question">{{$faq->question}}</span>
                        </div>

                        <div class="mb-3">
                            <label>Answer:</label>
                            <span class="form-control">{{$faq->answer}}</span>
                        </div>

                        <div style="float:left; display:flex;">
                            <div class="mb-3 me-3">
                                <label>Created At:</label>
                                <span class="form-control" style="width:262px">{{$faq->created_at->format('d/m/Y
                                    h:i:s')}}</span>
                            </div>
                            <div class="mb-3 me-3">
                                <label>Updated At:</label>
                                <span class="form-control" style="width:262px">{{$faq->updated_at->format('d/m/Y
                                    h:i:s')}}</span>
                            </div>
                        </div>

                        <div class="text-center">
                            <form method="POST" action="/staff/faq/{{$faq->id}}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')"
                                    class="btn bg-gradient-dark w-100 my-2 mb-2">Delete</button>
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