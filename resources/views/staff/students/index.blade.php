@extends('layout.staff.layout-staff', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layout.staff.topnav', ['title' => 'Students'])
<div class=" container-fluid py-4">

    {{-- All Reports Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>All Students</h6>
                </div>
                <div>
                    <a href="/staff/students/create">
                        <button class="text-uppercase text-secondary text-xxs font-weight-bolder btn btn-sm fas fa-plus"
                            style="position:absolute; top:1rem; right:1rem"></button></a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            @unless (count($students) == 0)
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Student ID</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Name</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Email</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Contact</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Block</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Floor</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Room</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($students as $student)
                                <tr>
                                    <td>
                                        <div class="ps-3">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$student->id}}</span>
                                        </div>
                                    </td>

                                    <td class="text-secondary text-xs font-weight-bold">
                                        <span class="text-secondary text-xs font-weight-bold">{{$student->name}}</span>
                                    </td>

                                    <td class="text-secondary text-xs font-weight-bold">
                                        <span class="text-secondary text-xs font-weight-bold">{{$student->email}}</span>
                                    </td>

                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$student->contact ?
                                            $student->contact : 'N/A'}}</span>
                                    </td>

                                    <td class="align-middle text-center">
                                        <a href="/staff/students?block={{$student->block}}">
                                            <span class="text-secondary text-xs font-weight-bold">{{$student->block ?
                                                $student->email : 'N/A'}}</span>
                                        </a>
                                    </td>

                                    <td class="align-middle text-center">
                                        <a href="/staff/students?floor={{$student->floor}}">
                                            <span class="text-secondary text-xs font-weight-bold">{{$student->floor ?
                                                $student->floor : 'N/A'}}</span>
                                        </a>
                                    </td>

                                    <td class="align-middle text-center">
                                        <a href="/staff/students?room={{$student->room}}">
                                            <span class="text-secondary text-xs font-weight-bold">{{$student->room ?
                                                $student->room : 'N/A'}}</span>
                                        </a>
                                    </td>

                                    <td class="align-middle">
                                        <a href="/staff/students/{{$student->id}}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
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
                        {{$students->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.staff.footer')
</div>
@endsection