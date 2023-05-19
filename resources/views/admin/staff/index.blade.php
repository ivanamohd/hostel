@extends('layout.admin.layout-admin', ['class' => 'g-sidenav-show bg-gray-100'])

@section('title', 'Staff')
@section('content')
@include('layout.admin.topnav', ['title' => 'Staff'])
<div class=" container-fluid py-4">

    {{-- All Staff Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>All Staff</h6>
                </div>
                <div>
                    <a href="/admin/staff/create">
                        <button class="text-uppercase text-secondary text-xxs font-weight-bolder btn btn-sm fas fa-plus"
                            style="position:absolute; top:1rem; right:1rem"></button></a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            @unless (count($staff) == 0)
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Staff ID</th>
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
                                        Hostel</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Head</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($staff as $staff)
                                <tr>
                                    <td>
                                        <div class="ps-3">
                                            <span class="text-secondary text-xs font-weight-bold">{{$staff->id}}</span>
                                        </div>
                                    </td>

                                    <td class="text-secondary text-xs font-weight-bold">
                                        <span class="text-secondary text-xs font-weight-bold">{{$staff->name}}</span>
                                    </td>

                                    <td class="text-secondary text-xs font-weight-bold">
                                        <span class="text-secondary text-xs font-weight-bold">{{$staff->email}}</span>
                                    </td>

                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$staff->contact ?
                                            $staff->contact : 'N/A'}}</span>
                                    </td>

                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$staff->hostel}}</span>
                                    </td>

                                    <td class="align-middle text-center">
                                        @if($staff->head == "1")
                                        <span class="text-secondary text-xs font-weight-bold">Yes</span>
                                        @else
                                        <span class="text-secondary text-xs font-weight-bold">No</span>
                                        @endif
                                    </td>

                                    <td class="align-middle">
                                        <a href="/admin/staff/{{$staff->id}}"
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
                        {{-- {{$staff->links()}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.admin.footer')
</div>
@endsection