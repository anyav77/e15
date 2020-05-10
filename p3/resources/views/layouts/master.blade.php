<!doctype html>
<html lang='en'>

<head>
    <title>@yield('title', 'Educational Film Network')</title>
    <meta charset='utf-8'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='/css/main.css' rel='stylesheet'>

    @yield('head')
</head>

<body>

    <header>
        <nav>
            <ul>
                <li><a href='/'>Home</a></li>
                <li><a href='/wiki'>Wiki</a></li>
                <li><a href='/wiki/create'>Publish</a></li>
                <li><a href='/about'>About</a></li>
                <li><a href='/contact'>Contact</a></li>
                <li class='login'><a href='/home'>Login</a></li>
                <li><a href='/search'>Search</a></li>
            </ul>
        </nav>
        <a href='/'><img src='/images/efn-logo@1x.gif' id='logo' alt='EFN Logo'></a>
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

</body>

</html>