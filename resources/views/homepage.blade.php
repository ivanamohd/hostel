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
                    <a href="#paper-kit" class="btn btn-danger btn-round">Create An Account Today</a>
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
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-profile card-plain">
                        <div class="card-avatar">
                            <a href="#avatar">
                                <img src="../assets/img/faces/clem-onojeghuo-3.jpg" alt="...">
                            </a>
                        </div>
                        <div class="card-body">
                            <a href="#paper-kit">
                                <div class="author">
                                    <h4 class="card-title">Henry Ford</h4>
                                    <h6 class="card-category">Product Manager</h6>
                                </div>
                            </a>
                            <p class="card-description text-center">
                                Teamwork is so important that it is virtually impossible for you to reach the heights of
                                your
                                capabilities or make the money that you want without becoming very good at it.
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i
                                    class="fa fa-google-plus"></i></a>
                            <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i
                                    class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile card-plain">
                        <div class="card-avatar">
                            <a href="#avatar">
                                <img src="../assets/img/faces/joe-gardner-2.jpg" alt="...">
                            </a>
                        </div>
                        <div class="card-body">
                            <a href="#paper-kit">
                                <div class="author">
                                    <h4 class="card-title">Sophie West</h4>
                                    <h6 class="card-category">Designer</h6>
                                </div>
                            </a>
                            <p class="card-description text-center">
                                A group becomes a team when each member is sure enough of himself and his contribution
                                to praise the
                                skill of the others. No one can whistle a symphony. It takes an orchestra to play it.
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i
                                    class="fa fa-google-plus"></i></a>
                            <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i
                                    class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile card-plain">
                        <div class="card-avatar">
                            <a href="#avatar">
                                <img src="../assets/img/faces/erik-lucatero-2.jpg" alt="...">
                            </a>
                        </div>
                        <div class="card-body">
                            <a href="#paper-kit">
                                <div class="author">
                                    <h4 class="card-title">Robert Orben</h4>
                                    <h6 class="card-category">Developer</h6>
                                </div>
                            </a>
                            <p class="card-description text-center">
                                The strength of the team is each individual member. The strength of each member is the
                                team. If you can
                                laugh together, you can work together, silence isn’t golden, it’s deadly.
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i
                                    class="fa fa-google-plus"></i></a>
                            <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i
                                    class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End FAQ -->
    <div class="section landing-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="text-center">Keep in touch?</h2>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="nc-icon nc-single-02"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="nc-icon nc-email-85"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <label>Message</label>
                        <textarea class="form-control" rows="4"
                            placeholder="Tell us your thoughts and feelings..."></textarea>
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