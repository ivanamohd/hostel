<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}">
    <title>
        Dashboard
    </title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/staff/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/staff/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="asset('css/staff/nucleo-svg.css')" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('css/staff/argon-dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <x-message />

    <div class="position-absolute w-100 min-height-300 top-0"
        style="background-image: url({{ asset('images/utm-hill.jpg'); }}); background-position-y: 80%;">
        <span class="mask opacity-6 bg-student-1"></span>
    </div>
    {{-- @endif --}}
    @include('layout.student.sidenav')
    <main class="main-content border-radius-lg">
        @yield('content')
    </main>
    {{-- @include('components.fixed-plugin')
    @endif
    @endauth --}}

    <!--   Core JS Files   -->
    <script src="{{ asset('js/staff/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/staff/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/staff/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/staff/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/staff/argon-dashboard.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @stack('js');
</body>

</html>