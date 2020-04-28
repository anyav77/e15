<?php

/**
 * Practice
 */
Route::any('/practice/{n?}', 'PracticeController@index');

# Debug route used to
Route::get('/debug', function () {
    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});
# Example route used to demonstrate error pages
Route::get('/example', function () {
    $foo = [1,2,3];

    # dump, die
    //dd($foo);

    # dump, die, debug
    //ddd($foo);

    Log::info($foo);

    ddd(storage_path('temp'));

    return view('abc');
});

# Misc. Pages
Route::get('/', 'PageController@welcome');
Route::get('/support', 'PageController@support');

Route::group(['middleware' => 'auth'], function () {
    # Create a Book
    Route::get('/books/create', 'BookController@create');
    Route::post('/books', 'BookController@store');

    # Update a Book
    Route::get('/books/{slug}/edit', 'BookController@edit');
    Route::put('/books/{slug}', 'BookController@update');

    # Delete a Book
    Route::get('/books/{slug}/confirm', 'BookController@confirm');
    Route::delete('/books/{slug}/', 'BookController@destroy');

    # Show all books
    Route::get('/books', 'BookController@index');
    # Show a book
    Route::get('/books/{slug?}', 'BookController@show');

    # Misc
    Route::get('/search', 'BookController@search');
    Route::get('/list', 'BookController@list');
});


# Example for debugging
Route::get('/example', function () {
    //dump(config('mail'));
    //dump(config('mail.host'));
});

# This was an example route to show multiple parameters;
# Not a feature we're actually building, so I'm commenting out
# Route::get('/filter/{category}/{subcategory?}', 'BookController@filter');

Auth::routes();
