<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>JH Furniture</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/jhfurniture.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-black shadow-sm">
            <div class="container">
                <img src="{{asset('assets/JH_Furniturelogo.png')}}" alt="JH Furniture" style="width:150px">
                {{-- <a class="navbar-brand" href="{{ url('/') }}" style="color:white">
                    {{ config('header.name', 'JH Furniture') }}
                </a> --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" style="color:white" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color:white" href="/viewFurniture">View</a>
                        </li>

                        @auth

                        @if(auth()->user()->role == 'member')
                        <li class="nav-item">
                            <a class="nav-link" style="color:white" href="/login">My Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color:white" href="/logout">Log out</a>
                        </li>

                        @elseif (auth()->user()->role == 'admin'){
                            <li class="nav-item">
                                <a class="nav-link" style="color:white" href="/login">Manage Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:white" href="/logout">Log Out</a>
                            </li>

                        }
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" style="color:white" href="/login">Log In</a>
                        </li><li class="nav-item">
                            <a class="nav-link" style="color:white" href="/register">Register</a>
                        </li>

                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</body>
</html>

