<!doctype html>
<html lang='en'>

<head>
    <title>@yield('title', 'EFN')</title>
    <meta charset='utf-8'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='/css/main.css' rel='stylesheet'>

    @yield('head')
</head>

<body>

    <header>
        <a href='/'><img src='/images/efn-logo@1x.gif' id='logo' alt='EFN Logo'></a>

        <nav>
            <ul>
                <li><a href='/'>Home</a></li>
                <li><a href='/about'>About</a></li>
                <li><a href='/wiki'>Wiki</a></li>
                <li><a href='/wiki/create'>Publish an article</a></li>
                <li><a href='/forum'>Forum</a></li>
                <li><a href='/contact'>Contact</a></li>
            </ul>
        </nav>
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

</body>

</html>