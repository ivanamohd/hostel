@extends('layout.layout-homepage')

@section('content')

<body class="profile-page sidebar-collapse">
    <div class="page-header page-header-xs" data-parallax="true"
        style="background-image: url({{ asset('images/utm-lake.png'); }});">
        <div class="motto text-center">
            <h1>Frequently Asked Questions</h1>
        </div>
        <div class="filter"></div>
    </div>
    <div class="profile-content">
        <div class="container" style="margin-bottom:50pt">
            <br />
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" style="color: black" data-toggle="tab" href="#krp"
                                role="tab">KRP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" data-toggle="tab" href="#ktf" role="tab">KTF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" data-toggle="tab" href="#krp" role="tab">KTR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" data-toggle="tab" href="#ktho" role="tab">KTHO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" data-toggle="tab" href="#ktdi" role="tab">KTDI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" data-toggle="tab" href="#krc" role="tab">KTC</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" data-toggle="tab" href="#kp" role="tab">KP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" data-toggle="tab" href="#k9" role="tab">K9</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" data-toggle="tab" href="#k10" role="tab">K10</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" data-toggle="tab" href="#kdse" role="tab">KDSE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" data-toggle="tab" href="#kdoj" role="tab">KDOJ</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Tab -->
            <div class="tab-content following">
                <!-- Tab ALL -->
                {{-- <div class="tab-pane active" id="all" role="tabpanel">
                    <div class="row">
                        <div>
                            @unless (count($all) == 0)
                            @foreach ($all as $faq)
                            <div class="faq-question">
                                <input id="{{$faq->id}}" type="checkbox" class="panel">
                                <div class="plus">+</div>
                                <label for="{{$faq->id}}" class="panel-title">{{$faq->question}}</label>
                                <div class="panel-content">{{$faq->answer}}</div>
                            </div>
                            @endforeach
                            @else
                            <p class="mx-4 text-xs">No Records Found</p>
                            @endunless
                        </div>
                    </div>
                </div> --}}
                <!-- Tab KRP -->
                <div class="tab-pane active" id="krp" role="tabpanel">
                    <div class="row">
                        <div>
                            @unless (count($krp) == 0)
                            @foreach ($krp as $faq)
                            <div class="faq-question">
                                <input id="{{$faq->id}}" type="checkbox" class="panel">
                                <div class="plus">+</div>
                                <label for="{{$faq->id}}" class="panel-title">{{$faq->question}}</label>
                                <div class="panel-content">{{$faq->answer}}</div>
                            </div>
                            @endforeach
                            @else
                            <p class="mx-4 text-xs">No Records Found</p>
                            @endunless
                        </div>
                    </div>
                </div>
                <!-- Tab KTF -->
                <div class="tab-pane" id="ktf" role="tabpanel">
                    <div class="row">
                        <div>
                            @unless (count($ktf) == 0)
                            @foreach ($ktf as $faq)
                            <div class="faq-question">
                                <input id="{{$faq->id}}" type="checkbox" class="panel">
                                <div class="plus">+</div>
                                <label for="{{$faq->id}}" class="panel-title">{{$faq->question}}</label>
                                <div class="panel-content">{{$faq->answer}}</div>
                            </div>
                            @endforeach
                            @else
                            <p class="mx-4 text-xs">No Records Found</p>
                            @endunless
                        </div>
                    </div>
                </div>
                <!-- Tab KTR -->
                <div class="tab-pane" id="ktr" role="tabpanel">
                    <div class="row">
                        <div>
                            @unless (count($ktr) == 0)
                            @foreach ($ktr as $faq)
                            <div class="faq-question">
                                <input id="{{$faq->id}}" type="checkbox" class="panel">
                                <div class="plus">+</div>
                                <label for="{{$faq->id}}" class="panel-title">{{$faq->question}}</label>
                                <div class="panel-content">{{$faq->answer}}</div>
                            </div>
                            @endforeach
                            @else
                            <p class="mx-4 text-xs">No Records Found</p>
                            @endunless
                        </div>
                    </div>
                </div>
                <!-- Tab KTHO -->
                <div class="tab-pane" id="ktho" role="tabpanel">
                    <div class="row">
                        <div>
                            @unless (count($ktho) == 0)
                            @foreach ($ktho as $faq)
                            <div class="faq-question">
                                <input id="{{$faq->id}}" type="checkbox" class="panel">
                                <div class="plus">+</div>
                                <label for="{{$faq->id}}" class="panel-title">{{$faq->question}}</label>
                                <div class="panel-content">{{$faq->answer}}</div>
                            </div>
                            @endforeach
                            @else
                            <p class="mx-4 text-xs">No Records Found</p>
                            @endunless
                        </div>
                    </div>
                </div>
                <!-- Tab KTDI -->
                <div class="tab-pane" id="ktdi" role="tabpanel">
                    <div class="row">
                        <div>
                            @unless (count($ktdi) == 0)
                            @foreach ($ktdi as $faq)
                            <div class="faq-question">
                                <input id="{{$faq->id}}" type="checkbox" class="panel">
                                <div class="plus">+</div>
                                <label for="{{$faq->id}}" class="panel-title">{{$faq->question}}</label>
                                <div class="panel-content">{{$faq->answer}}</div>
                            </div>
                            @endforeach
                            @else
                            <p class="mx-4 text-xs">No Records Found</p>
                            @endunless
                        </div>
                    </div>
                </div>
                <!-- Tab KTC -->
                <div class="tab-pane" id="ktc" role="tabpanel">
                    <div class="row">
                        <div>
                            @unless (count($ktc) == 0)
                            @foreach ($ktc as $faq)
                            <div class="faq-question">
                                <input id="{{$faq->id}}" type="checkbox" class="panel">
                                <div class="plus">+</div>
                                <label for="{{$faq->id}}" class="panel-title">{{$faq->question}}</label>
                                <div class="panel-content">{{$faq->answer}}</div>
                            </div>
                            @endforeach
                            @else
                            <p class="mx-4 text-xs">No Records Found</p>
                            @endunless
                        </div>
                    </div>
                </div>
                <!-- Tab KP -->
                <div class="tab-pane" id="kp" role="tabpanel">
                    <div class="row">
                        <div>
                            @unless (count($kp) == 0)
                            @foreach ($kp as $faq)
                            <div class="faq-question">
                                <input id="{{$faq->id}}" type="checkbox" class="panel">
                                <div class="plus">+</div>
                                <label for="{{$faq->id}}" class="panel-title">{{$faq->question}}</label>
                                <div class="panel-content">{{$faq->answer}}</div>
                            </div>
                            @endforeach
                            @else
                            <p class="mx-4 text-xs">No Records Found</p>
                            @endunless
                        </div>
                    </div>
                </div>
                <!-- Tab K9 -->
                <div class="tab-pane" id="k9" role="tabpanel">
                    <div class="row">
                        <div>
                            @unless (count($k9) == 0)
                            @foreach ($k9 as $faq)
                            <div class="faq-question">
                                <input id="{{$faq->id}}" type="checkbox" class="panel">
                                <div class="plus">+</div>
                                <label for="{{$faq->id}}" class="panel-title">{{$faq->question}}</label>
                                <div class="panel-content">{{$faq->answer}}</div>
                            </div>
                            @endforeach
                            @else
                            <p class="mx-4 text-xs">No Records Found</p>
                            @endunless
                        </div>
                    </div>
                </div>
                <!-- Tab K10 -->
                <div class="tab-pane" id="k10" role="tabpanel">
                    <div class="row">
                        <div>
                            @unless (count($k10) == 0)
                            @foreach ($k10 as $faq)
                            <div class="faq-question">
                                <input id="{{$faq->id}}" type="checkbox" class="panel">
                                <div class="plus">+</div>
                                <label for="{{$faq->id}}" class="panel-title">{{$faq->question}}</label>
                                <div class="panel-content">{{$faq->answer}}</div>
                            </div>
                            @endforeach
                            @else
                            <p class="mx-4 text-xs">No Records Found</p>
                            @endunless
                        </div>
                    </div>
                </div>
                <!-- Tab KDSE -->
                <div class="tab-pane" id="kdse" role="tabpanel">
                    <div class="row">
                        <div>
                            @unless (count($kdse) == 0)
                            @foreach ($kdse as $faq)
                            <div class="faq-question">
                                <input id="{{$faq->id}}" type="checkbox" class="panel">
                                <div class="plus">+</div>
                                <label for="{{$faq->id}}" class="panel-title">{{$faq->question}}</label>
                                <div class="panel-content">{{$faq->answer}}</div>
                            </div>
                            @endforeach
                            @else
                            <p class="mx-4 text-xs">No Records Found</p>
                            @endunless
                        </div>
                    </div>
                </div>
                <!-- Tab KDOJ -->
                <div class="tab-pane" id="kdoj" role="tabpanel">
                    <div class="row">
                        <div>
                            @unless (count($kdoj) == 0)
                            @foreach ($kdoj as $faq)
                            <div class="faq-question">
                                <input id="{{$faq->id}}" type="checkbox" class="panel">
                                <div class="plus">+</div>
                                <label for="{{$faq->id}}" class="panel-title">{{$faq->question}}</label>
                                <div class="panel-content">{{$faq->answer}}</div>
                            </div>
                            @endforeach
                            @else
                            <p class="mx-4 text-xs">No Records Found</p>
                            @endunless
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


<style>
    @import url(https://fonts.googleapis.com/css?family=Raleway);

    body {
        color: #505050;
        background: #fcfcfc;
        font-family: 'Raleway', sans-serif;
        overflow-x: hidden;
    }

    .faq-content {
        margin: 0 auto;
    }

    .faq-question {
        padding: 20px 0;
        border-bottom: 1px dotted #ccc;
    }

    .panel-title {
        font-size: 15px;
        width: 100%;
        position: relative;
        margin: 0;
        padding: 10px 10px 0 48px;
        display: block;
        cursor: pointer;
    }

    .panel-content {
        font-size: 15px;
        padding: 0px 14px;
        margin: 0 40px;
        height: 0;
        overflow: hidden;
        z-index: -1;
        position: relative;
        opacity: 0;
        -webkit-transition: .4s ease;
        -moz-transition: .4s ease;
        -o-transition: .4s ease;
        transition: .4s ease;
    }

    .panel:checked~.panel-content {
        height: auto;
        opacity: 1;
        padding: 14px;
    }

    .plus {
        position: absolute;
        margin-left: 20px;
        margin-top: 4px;
        z-index: 5;
        font-size: 42px;
        line-height: 100%;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
        -webkit-transition: .2s ease;
        -moz-transition: .2s ease;
        -o-transition: .2s ease;
        transition: .2s ease;
    }

    .panel:checked~.plus {
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .panel {
        display: none;
    }
</style>
@endsection