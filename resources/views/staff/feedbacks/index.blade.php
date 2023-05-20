@extends('layout.staff.layout-staff', ['class' => 'g-sidenav-show bg-gray-100'])

@section('title', 'Feedback')
@section('content')
@include('layout.staff.topnav', ['title' => 'Feedback'])
<div class=" container-fluid py-4">

    {{-- All Feedback Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>All Feedback</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            @unless (count($feedbacks) == 0)
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Feedback ID</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Name</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Email</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Message</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($feedbacks as $feedback)
                                <tr>
                                    <td>
                                        <div class="ps-3">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$feedback->id}}</span>
                                        </div>
                                    </td>

                                    <td class="text-secondary text-xs font-weight-bold">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{Str::limit($feedback->name,
                                            '70', '...')}}</span>
                                    </td>

                                    <td class="text-secondary text-xs font-weight-bold">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{Str::limit($feedback->email,
                                            '50', '...')}}</span>
                                    </td>

                                    <td class="text-secondary text-xs font-weight-bold">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{Str::limit($feedback->feedback,
                                            '50', '...')}}</span>
                                    </td>

                                    <td class="align-middle">
                                        <a href="/staff/feedbacks/{{$feedback->id}}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                            View
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <p class="mx-4 text-xs">No Records Found</p>
                                @endunless
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer pb-0">
                        {{$feedbacks->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.staff.footer')
</div>
@endsection