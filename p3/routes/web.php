<?php

use Illuminate\Support\Facades\Route;

# Misc
// Route::get('/', function () {
//     return view('welcome');
// });

# Static Pages
Route::get('/', 'PageController@welcome');
Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');
Route::get('/search', 'FilterController@index');

# Wiki Section
# Home
Route::get('/wiki', 'WikiController@index');

# Add Page
// This route must comes before `/wiki/{uid}/{category?}/{subcategory?}/{title?}` so it takes precedence
Route::get('/wiki/create', 'WikiController@create');
Route::post('/wiki', 'WikiController@store');

# View article page
Route::get('/wiki/{uid}/{category?}/{subcategory?}/{title?}', 'WikiController@show');

# Edit page
//Route::get('/wiki/{id}/{title}/edit', 'WikiController@edit'); //or
//Route::get('/wiki/{user}/{title}/edit', 'WikiController@edit'); //or
//Route::post('/wiki', 'WikiController@store');

# Search allows to filter the articles by category, subcategory, author/user
# Future goal: allow seaching books and film catalog
# The articles and books may have multiple authors;
# The articles are attached to one user who published the content
# In the future, I may need to add joined accounts,
# so that multiple users can track the article views or book sales
Route::get('/searchresults', 'FilterController@searchresults');
// Route::get('/filter/{category?}/{subcategory?}/{uid}/{title?}'
// or
//Route::get('/search/{category?}/{subcategory?}/{author?}/{keyword?}', 'FilterController@search');


# Contact Form - future goal
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
