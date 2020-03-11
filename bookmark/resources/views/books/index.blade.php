<!doctype html>
<html lang='en'>

<head>
    <title>hjhk</title>
    <meta charset='utf-8'>
    <link href='/css/bookmark.css' type='text/css' rel='stylesheet'>
</head>

<body>

    <header>
        <a href='/'><img src='/images/bookmark-logo@2x.png' id='logo' alt='Bookmark Logo'></a>
    </header>

    <section>
        @foreach($books as $book)
        {{ $book['title']}}
        @endforeach
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

</body>

</html>