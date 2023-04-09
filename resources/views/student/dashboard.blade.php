@extends('layout.student.layout-student', ['class' => 'g-sidenav-show bg-gray-100'])

@section('title', 'Dashboard')
@section('content')
@include('layout.staff.topnav', ['title' => 'Dashboard'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-5 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Hello
                                </p>
                                <h5 class="font-weight-bolder">
                                    {{$user->name}}
                                </h5>
                                <p class="mb-0">
                                    Have something to report? <a href="/reports/create">
                                        <button class="text-uppercase text-secondary ni ni-bold-right"
                                            style="position:absolute; top:2.5rem; right:0.5rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7 col-sm-6 mb-xl-0 mb-4" style="width:56%">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                @if($report)
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">The status of your report with
                                    ID
                                    {{$report->id}} is
                                </p>
                                <h5 class="font-weight-bolder text-secondary">
                                    {{$report->status}}
                                </h5>
                                <p class="mb-0">
                                    Last Updated {{$report->updated_at->format('d/m/Y h:i:s')}}
                                </p>
                                <a href="/reports">
                                    <button class="text-uppercase text-secondary ni ni-bold-right"
                                        style="position:absolute; top:2.5rem; right:0.5rem; border:none; background:none; margin-top:10px; margin-right:10px"></button></a>
                                @else
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">You have no report</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Active Tickets</h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            @unless (count($active) == 0)
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Report ID</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Description</th>
                                    <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder
                                            opacity-7">
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
                                @foreach ($active as $report)
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
                                            class="text-secondary text-xs font-weight-bold">{{$report->created_at->format('d/m/Y
                                            h:i:s')}}</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="/reports/{{$report->id}}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit user">
                                            View
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <p class="mx-3 text-xs">No Records Found</p>
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
            {{-- <div class="col-lg-5">
                <div class="card card-carousel overflow-hidden h-100 p-0">
                    <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner border-radius-lg h-100">
                            <div class="carousel-item h-100 active" style="background-image: url({{ asset('images/utm-lake.png'); }});
            background-size: cover;">
                            </div>
                            <div class="carousel-item h-100" style="background-image: url({{ asset('images/utm-hill.jpg'); }});
            background-size: cover;">
                            </div>
                            <div class="carousel-item h-100" style="background-image: url({{ asset('images/utm-lake2.png'); }});
            background-size: cover;">
                            </div>
                        </div>
                        <button class="carousel-control-prev w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div> --}}
        </div>
        @include('layout.staff.footer')
    </div>
    @endsection

    @push('js')
    <script src="{{ asset('js/staff/plugins/chartjs.min.js') }}"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    @endpush