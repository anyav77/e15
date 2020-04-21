<?php

use Illuminate\Support\Facades\Route;

# Misc
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'PageController@welcome');
Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');

# Register
# Login
# Account - Edit Details
# Account - Social Stream
# Account - Sales Dashboard

# Wiki Home Page
// Route::get('/wiki', 'WikiController@index');
# Wiki add page
//Route::get('/wiki/create', 'WikiController@create');
//Route::post('/wiki', 'WikiController@store');
# Wiki edit page
//Route::get('/wiki/{id}/edit', 'WikiController@edit');
//Route::post('/wiki', 'WikiController@store');

# Forum - Home Page
//Route::get('/forum', 'ForumController@index');
# Forum - New Post
//Route::get('/forum/create', 'ForumController@create');
//Route::post('/forum', 'ForumController@store');
# Forum - Update Post ?

# Contact
//Route::get('/contact/create', 'PageController@create');
//Route::post('/contact', 'PageController@store');



# Debug
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
