<?php

use Illuminate\Support\Facades\Route;

# Misc
// Route::get('/', function () {
//     return view('welcome');
// });

# Static Pagges
Route::get('/', 'PageController@welcome');
Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');

# Wiki Section
# Wiki Home
Route::get('/wiki', 'WikiController@index');
# Wiki Article page
Route::get('/wiki/{uid}/{category?}/{subcategory?}/{title?}', 'WikiController@show');

# Wiki filter the articles by category, subcategory, author/user
# Using user instead of author because the article may have multiple authors;
# However, only one user can publish the content
// Route::get('/filter/{category?}/{subcategory?}/{uid}/{title?}'
// or
Route::get('/filter/{category?}/{subcategory?}/{author?}/{keyword?}', 'FilterController@index');


# Wiki add page
//Route::get('/wiki/create', 'WikiController@create');
//Route::post('/wiki', 'WikiController@store');
# Wiki edit page
//Route::get('/wiki/{id}/{title}/edit', 'WikiController@edit'); //or
//Route::get('/wiki/{user}/{title}/edit', 'WikiController@edit'); //or
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

# Register
# Login
# Account - Edit Details
# Account - Social Stream
# Account - Sales Dashboard


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
