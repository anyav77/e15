<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Educational Film Network')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='/css/main.css' rel='stylesheet'>
</head>

<body>
    @if(session('flash-alert'))
    <div class='flash-alert'>{{ session('flash-alert') }}</div>
    @endif

    @if(count($errors) > 0)
    <ul class='alert alert-danger error'>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <header>
        <nav>
            <ul>
                <li><a href='/'>Home</a></li>
                <li><a href='/wiki'>Wiki</a></li>
                <li><a href='/wiki/create'>Publish</a></li>
                <li><a href='/search'>Search</a></li>
                @if(Auth::user())
                <li>
                    <a href='/home'>Account</a>
                </li>
                @endif
                <li>
                    @if(!Auth::user())
                    <a href='/login'>Login</a>
                    @else
                    <form method='POST' id='logout' action='/logout'>
                        {{ csrf_field() }}
                        <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
                    </form>
                    @endif
                </li>
            </ul>
        </nav>
    </header>

    <main class="py-4">
        @yield('content')
    </main>
    <footer>
        <ul>
            <li><a href='/about'>About</a></li>
            <li><a href='/contact'>Contact</a></li>
            <li>&copy; {{ date('Y') }}</li>
        </ul>

    </footer>
    </div>
</body>

</html>