<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        HostelCare
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('css/main/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main/paper-kit.css') }}" rel="stylesheet">
</head>

<body class="landing-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent" color-on-scroll="300">
        <div class="container">
            <div class="navbar-translate">
                <img src="{{ asset('images/logo-brown.png') }}" style="width:100px" />
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="navbar-nav">
                    {{-- <li class="nav-item">
                        <a href="../index.html" class="nav-link"></i> About</a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="https://studentaffairs.utm.my/residential-college-contact/" target="_blank"
                            class="nav-link"></i> Contact</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="#" target="_blank" class="nav-link"></i> FAQ</a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="/register" class="nav-link btn btn-outline-default2 btn-round"></i> Get
                            Started</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <main>
        @yield('content')
    </main>

    <footer class="footer footer-white ">
        <div class="container">
            <div class="row">
                <nav class="footer-nav">
                    <ul>
                        <li>
                            <a href="/">HostelCare</a>
                        </li>
                        <li>
                            <a href="/login">My Account</a>
                        </li>
                    </ul>
                </nav>
                <div class="credits ml-auto">
                    <span class="copyright">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, made with <i class="fa fa-heart heart"></i> by HotelCare
                    </span>
                </div>
            </div>
        </div>
    </footer>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/main/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/main/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/main/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/main/paper-kit.js') }}" type="text/javascript"></script>
</body>

<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>

</html>