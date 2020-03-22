<!doctype html>
<html lang='en'>

<head>
    <title>@yield('title', 'Bookmark')</title>
    <meta charset='utf-8'>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='/css/bookmark.css' rel='stylesheet'>

    @yield('head')
</head>

<body>

    <header>
        <a href='/'><img src='/images/bookmark-logo@2x.png' id='logo' alt='bookmark Logo'></a>

        <nav>
            <ul>
                <li><a href='/'>Home</a></li>
                <li><a href='/books'>All Books</a></li>
                <li><a href='/list'>Your list</a></li>
                <li><a href='/support'>Support</a></li>
            </ul>
        </nav>
    </header>

    <section id='main'>
        @yield('content')
    </section>

    <footer>
        &copy; Bookmark
    </footer>

</body>

</html>