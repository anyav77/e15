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
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

</body>

</html>