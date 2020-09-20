<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Twitter Clone App') }}</title>

    <!-- Font Awesome Css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <!-- font awesome js -->
     <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/fontawesome.min.js" integrity="sha512-i3N2a3sMtKOQHXCJF3qEpce5twcGN9mRsWQe6PUTf9WS/eG5XkivI97uxit7B2nRGz5XuoszBaqndSqxdeVfag==" crossorigin="anonymous"></script>
     <!--Js Scripts-->
     <script src="{{ asset('js/app.js') }}" defer ></script>

    <style>
        /* width */
        ::-webkit-scrollbar {
        width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px #fff;
        border-radius: 5px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: #777;
        border-radius: 5px;
        }
    </style>
</head>
<body class="h-screen antialiased font-nunito">
    <div id="app">
        <nav class="w-full fixed flex items-center h-16 bg-blue-500 py-6 select-none z-10">
            <div class="container mx-auto px-6 md:px-0">
                <div class="flex items-center justify-center">
                    <div class="ml-20">
                        <a href="{{ url('/tweets') }}" class="text-lg font-semibold text-white no-underline">
                            <div class="flex items-center">
                                <i class="fab fa-twitter text-white text-4xl"></i>
                                <span class="ml-1">twitter clone</span>
                            </div>
                        </a>
                    </div>
                    <div class="flex-1 text-right mr-6 ">
                        @guest
                            <a class="mr-3 px-3 py-2 bg-green-600 text-white hover:text-green-200 focus:bg-green-800 text-sm rounded-md focus:outline-none font-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="px-3 py-2 bg-indigo-600 text-white hover:text-indigo-200 focus:bg-indigo-800 text-sm rounded-md focus:outline-none font-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <a href="{{ route('logout') }}"
                               class="mr-8 text-gray-900 bg-white hover:bg-gray-200 text-sm font-bold py-1 px-3 rounded-md"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <div class="container mx-auto">
           @yield('content')
        </div>
    </div>

</body>
</html>
