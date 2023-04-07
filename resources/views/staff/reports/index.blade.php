@extends('layout.staff.layout-staff', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layout.staff.topnav', ['title' => 'Tables'])
<div class=" container-fluid py-4">

    {{-- All Reports Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>All Reports</h6>
                </div>
                <div>
                    <a href="/staff/reports/create">
                        <button class="text-uppercase text-secondary text-xxs font-weight-bolder btn btn-sm fas fa-plus"
                            style="position:absolute; top:1rem; right:1rem"></button></a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            @unless (count($reports) == 0)
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Report ID</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Description</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Priority</th>
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

                                @foreach ($reports as $report)
                                <tr>
                                    <td>
                                        <div class="ps-3">
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
                                        <a href="/staff/reports/?priority={{$report->priority}}">
                                            @if($report->priority == 'Unassigned')
                                            <span class="badge badge-sm bg-gradient-faded-dark"
                                                style="width:85px">unassigned</span>

                                            @elseif($report->priority == 'Low')
                                            <span class="badge badge-sm bg-gradient-faded-info"
                                                style="width:85px">Low</span>

                                            @elseif($report->priority == 'Medium')
                                            <span class="badge badge-sm bg-gradient-faded-warning"
                                                style="width:85px">Medium</span>

                                            @elseif($report->priority == 'High')
                                            <span class="badge badge-sm bg-gradient-faded-danger"
                                                style="width:85px">High</span>

                                            @endif
                                        </a>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <a href="/staff/reports/?status={{$report->status}}">
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
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{$report->created_at->format('d/m/Y')}}</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="/staff/reports/{{$report->id}}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit user">
                                            View
                                        </a>
                                        {{-- <a href="/staff/reports/{{$report->id}}/"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="/staff/reports/{{$report->id}}/edit"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form method="POST" action="/staff/reports/{{$report->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="fa fa-trash text-secondary font-weight-bold text-xs bg-white"
                                                style="border: none"></button>
                                        </form> --}}
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
                        {{$reports->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.staff.footer')
</div>
@endsection