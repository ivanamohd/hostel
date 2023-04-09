@extends('layout.student.layout-student', ['class' => 'g-sidenav-show bg-gray-100'])

@section('title', 'Reports')
@section('content')
@include('layout.student.topnav', ['title' => 'Reports'])
<div class=" container-fluid py-4">

    {{-- Urgent Reports Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Active Reports</h6>
                </div>
                <div>
                    <a href="/reports/create">
                        <button class="text-uppercase text-secondary text-xxs font-weight-bolder btn btn-sm fas fa-plus"
                            style="position:absolute; top:1rem; right:1rem"></button></a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            @unless (count($active) == 0)
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Report ID</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Description</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Block</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Room</th>
                                    <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder
                                        opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($active as $report)
                                <tr>
                                    <td>
                                        <div class="ps-3">
                                            {{-- <p class="text-xs font-weight-bold mb-0">
                                                {{$report->id}}</p> --}}
                                            <span class="text-secondary text-xs font-weight-bold">{{$report->id}}</span>
                                        </div>
                                    </td>
                                    {{-- <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{$report->category}}</p>
                                        <p class="text-xs text-secondary mb-0">Organization</p>
                                    </td> --}}
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{$report->category}}</p>
                                        <p class="text-xs text-secondary mb-0">{{
                                            Str::limit($report->description, '50', '...') }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold">{{$report->block}}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold">{{$report->room}}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if($report->status == 'Pending')
                                        <span class="badge badge-sm bg-gradient-faded-dark"
                                            style="width:85px">{{$report->status}}</span>
                                        @elseif($report->status == 'In Review')
                                        <span class="badge badge-sm bg-gradient-faded-secondary"
                                            style="width:85px">{{$report->status}}</span>
                                        @elseif($report->status == 'In Progress')
                                        <span class="badge badge-sm bg-gradient-info"
                                            style="width:85px">{{$report->status}}</span>
                                        @elseif($report->status == 'Fixing Day')
                                        <span class="badge badge-sm bg-gradient-warning"
                                            style="width:85px">{{$report->status}}</span>
                                        @elseif($report->status == 'Resolved')
                                        <span class="badge badge-sm bg-gradient-success"
                                            style="width:85px">{{$report->status}}</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{$report->created_at->format('d/m/Y
                                            h:i:s')}}</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="/reports/{{$report->id}}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                            View
                                        </a>
                                        {{-- <form method="POST" action="/reports/{{$report->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="fa fa-trash text-secondary font-weight-bold text-xs bg-white"
                                                style="border: none"></button>
                                        </form> --}}
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <p class="mx-4 text-xs">No records found</p>
                                @endunless
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer pb-0">
                        {{$active->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Past Reports Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Past Reports</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            @unless (count($past) == 0)
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Report ID</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Description</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Block</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Room</th>
                                    <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder
                                            opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($past as $report)
                                <tr>
                                    <td>
                                        <div class="ps-3">
                                            {{-- <p class="text-xs font-weight-bold mb-0">
                                                {{$report->id}}</p> --}}
                                            <span class="text-secondary text-xs font-weight-bold">{{$report->id}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{$report->category}}</p>
                                        <p class="text-xs text-secondary mb-0">{{
                                            Str::limit($report->description, '50', '...') }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold">{{$report->block}}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold">{{$report->room}}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if($report->status == 'Pending')
                                        <span class="badge badge-sm bg-gradient-faded-dark"
                                            style="width:85px">{{$report->status}}</span>
                                        @elseif($report->status == 'In Review')
                                        <span class="badge badge-sm bg-gradient-faded-secondary"
                                            style="width:85px">{{$report->status}}</span>
                                        @elseif($report->status == 'In Progress')
                                        <span class="badge badge-sm bg-gradient-info"
                                            style="width:85px">{{$report->status}}</span>
                                        @elseif($report->status == 'Fixing Day')
                                        <span class="badge badge-sm bg-gradient-warning"
                                            style="width:85px">{{$report->status}}</span>
                                        @elseif($report->status == 'Resolved')
                                        <span class="badge badge-sm bg-gradient-success"
                                            style="width:85px">{{$report->status}}</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{$report->created_at->format('d/m/Y
                                            h:i:s')}}</span>
                                    </td>
                                    <td class="align-middle">
                                        {{-- <a href="/reports/{{$report->id}}/edit"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit user">
                                            Edit
                                        </a> --}}
                                        <a href="/reports/{{$report->id}}/edit"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="/reports/{{$report->id}}/edit"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form method="POST" action="/reports/{{$report->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="fa fa-trash text-secondary font-weight-bold text-xs bg-white"
                                                style="border: none"></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <p class="mx-4 text-xs">No records found</p>
                                @endunless
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer pb-0">
                        {{$past->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.staff.footer')
</div>
@endsection