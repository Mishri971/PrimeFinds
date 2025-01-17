<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="John of Web IT">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">


    {{-- This is not working buz of dispatch browswer event --}}
    {{-- links for alert msg for wishlist --}}
    <!-- CSS -->
    {{--
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" /> --}}
    <!-- Default theme -->

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css" />



    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">


    {{-- Solution link for alert msg adding this link for new alert box --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles

</head>

<body>
    <div id="app">

        @include('layouts.inc.frontend.navbar')

        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Funda Ecom
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                    </ul>
                </div>
            </div>
        </nav> --}}

        <main>
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    {{-- alertify js link for alert msg for wishlist --}}
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script>
        window.addEventListener('message', event => {

        // alert('Name updated to: ' + event.detail.newName);

        alertify.set('notifier', 'position', 'top-right');
        alertify.notify(event.detail.text, event.detail.type);
        })

        // window.addEventListener('message', event => {
        // alertify.set('notifier', 'position', 'top-right');
        // switch(event.detail.type) {
        // case 'success':
        // alertify.success(event.detail.text);
        // break;
        // case 'info':
        // alertify.message(event.detail.text);
        // break;
        // case 'warning':
        // alertify.warning(event.detail.text);
        // break;
        // case 'error':
        // alertify.error(event.detail.text);
        // break;
        // default:
        // alertify.message(event.detail.text);
        // break;
        // }
        // });
       
        

       
    </script>

    <script>
        document.addEventListener('livewire:initialized', () => {
    Livewire.on('message', (event) => {
    // You can use any notification library here (Toastr, SweetAlert2, etc.)
    // For example, using SweetAlert2:
    Swal.fire({
    text: event[0].text,
    icon: event[0].type,
    toast: true,
    position: 'top-right',
    showConfirmButton: false,
    timer: 3000
    });
    });
    });
    </script>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>

    @livewireScripts

</body>

</html>