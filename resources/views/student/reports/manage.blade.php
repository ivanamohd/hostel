@extends('layout.staff.layout-staff', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layout.staff.topnav', ['title' => 'Tables'])
<div class=" container-fluid py-4">

    {{-- All Reports Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Allll Reports</h6>
                </div>
                <div>
                    <a href="/reports/create">
                        <button class="text-uppercase text-secondary text-xxs font-weight-bolder btn btn-sm fas fa-plus"
                            style="position:absolute; top:1rem; right:1rem"></button></a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
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
                                @unless (count($reports) == 0)
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
                                        <span class="badge badge-sm bg-gradient-success">Urgent</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <a href="/reports/?status={{$report->status}}">
                                            <span class="badge badge-sm bg-gradient-success">{{$report->status}}</span>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                    </td>
                                    <td class="align-middle">
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