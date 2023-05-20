@extends('layout.layout-homepage')

@section('content')
<div class="page-header" data-parallax="true" style="background-image: url({{ asset('images/utm.jpg'); }});">
    <div class="filter"></div>
    <div class="container">
        <div class="motto text-center">
            <h1>Make a Report Today</h1>
            <h3>Our action begins with your report.</h3>
            <br />
            <a href="/login" class="btn btn-outline-neutral btn-round"></i>Go To My
                Account</a>
        </div>
    </div>
</div>
<div class="main">
    <div class="section text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="title">Have a complaint or enquiry?</h2>
                    <h5 class="description">Make a report and track its progress with just a click of a button. How
                        about making
                        enquiries? We've got you covered with our easy to use chat feature! Just create an account to
                        get started.
                        But be sure to check our FAQ section beforehand to view most frequently asked questions.
                    </h5>
                    <br>
                    <a href="/register" class="btn btn-danger btn-round">Create An
                        Account Today</a>
                </div>
            </div>
            <br />
            <br />
            <br />
            <!-- Features -->
            <div class="row">
                <div class="col-md-3">
                    <div class="info">
                        <div class="icon icon-danger">
                            <i class="nc-icon nc-single-copy-04"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Make Reports</h4> <br />
                            <p class="description">Easily and efficiently make a report through our website.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info">
                        <div class="icon icon-danger">
                            <i class="nc-icon nc-chat-33"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Ask Questions</h4> <br />
                            <p>Request for information and details by chatting with us.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info">
                        <div class="icon icon-danger">
                            <i class="nc-icon nc-chart-bar-32"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Track Reports</h4> <br />
                            <p>Track your reports by checking our website or through your email.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info">
                        <div class="icon icon-danger">
                            <i class="nc-icon nc-bulb-63"></i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">FAQ</h4> <br />
                            <p>Browse our frequently asked questions section for more information.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Features -->
        </div>
    </div>
    <!-- End FAQ -->
    <div class="section section-dark text-center">
        <div class="container">
            <h2 class="title">Frequently Asked Questions</h2>
            <h3>Have a question? Browse through our FAQ to see if your question has been addressed.</h3> <br><br>
            <a href="/faq" class="btn btn-outline-neutral btn-round"></i>Let's Go</a>
        </div>
    </div>
    <!-- End FAQ -->
    <div class="section landing-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="text-center">Keep in touch?</h2>
                    <form class="contact-form" method="POST" action="/feedbacks" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="nc-icon nc-single-02"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}"
                                        placeholder="Name">
                                </div>
                            </div>
                            @error('name')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror

                            <div class="col-md-6">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="nc-icon nc-email-85"></i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}"
                                        placeholder="Email">
                                </div>
                            </div>
                            @error('email')
                            <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                            @enderror
                        </div>

                        <label>Message</label>
                        <textarea class="form-control" rows="4" name="feedback" maxlength="300"
                            placeholder="Tell us your thoughts and feelings...">{{old('feedback')}}</textarea>
                        @error('feedback')
                        <p class="text-danger text-xs mt-1 px-1">{{$message}}</p>
                        @enderror

                        <div class="row">
                            <div class="col-md-4 ml-auto mr-auto">
                                <button class="btn btn-danger btn-lg btn-fill">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection