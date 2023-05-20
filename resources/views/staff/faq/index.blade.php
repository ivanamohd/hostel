@extends('layout.staff.layout-staff', ['class' => 'g-sidenav-show bg-gray-100'])

@section('title', 'FAQ')
@section('content')
@include('layout.staff.topnav', ['title' => 'FAQ'])
<div class=" container-fluid py-4">

    {{-- All FAQ Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>FAQ List</h6>
                </div>
                <div>
                    <a href="/staff/faq/create">
                        <button class="text-uppercase text-secondary text-xxs font-weight-bolder btn btn-sm fas fa-plus"
                            style="position:absolute; top:1rem; right:1rem"></button></a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            @unless (count($faq) == 0)
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        FAQ ID</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Question</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Answer</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($faq as $fa)
                                <tr>
                                    <td>
                                        <div class="ps-3">
                                            <span class="text-secondary text-xs font-weight-bold">{{$fa->id}}</span>
                                        </div>
                                    </td>

                                    <td class="text-secondary text-xs font-weight-bold">
                                        <span
                                            class="text-secondary text-xs font-weight-bold">{{Str::limit($fa->question,
                                            '70', '...')}}</span>
                                    </td>

                                    <td class="text-secondary text-xs font-weight-bold">
                                        <span class="text-secondary text-xs font-weight-bold">{{Str::limit($fa->answer,
                                            '50', '...')}}</span>
                                    </td>



                                    <td class="align-middle">
                                        <a href="/staff/faq/{{$fa->id}}" class="text-secondary font-weight-bold text-xs"
                                            data-toggle="tooltip">
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
                        {{$faq->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.staff.footer')
</div>
@endsection