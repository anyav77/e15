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

# Create Article
// This route must comes before `/wiki/{id}/{slug}` so it takes precedence
Route::get('/wiki/create', 'WikiController@create');
Route::post('/wiki', 'WikiController@store');

# View Article page
Route::get('/wiki/{id}/{slug}', 'WikiController@show');

# View Category page
//Route::get('/wiki/{category}/{subcategory?}', 'WikiController@filter');
// or
//Route::get('/wiki/{category}/{subcategory?}', 'CategoryController@show');


# Edit page
# Show the form to edit a specific article
Route::get('/wiki/{id}/{slug}/edit', 'WikiController@edit'); //or
//Route::get('/wiki/{user}/{title}/edit', 'WikiController@edit');
# Process the form to edit a specific article
Route::put('/wiki/{id}/{slug}', 'WikiController@update');

# Search
# Route for advanced search form - action
# Search allows to filter the articles by category, subcategory, author/user
# Future goal: allow seaching books and film catalog
# The articles and books may have multiple authors;
# The articles are attached to one user who published the content
# In the future, I may need to add joined accounts,
# so that multiple users can track the article views or book sales
Route::get('/searchresults', 'FilterController@advancedsearch');
//Route::get('/search/{category?}/{subcategory?}/{title?}/{author?}/{keyword?}', 'FilterController@search');



# Authorization login routes
# I want to keep /home path, as a place for a future user dashboards
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

# Contact Form - future goal
//Route::get('/contact/create', 'PageController@create');
//Route::post('/contact', 'PageController@store');

# Debug
// Route::get('/debug', function () {
//     $debug = [
//         'Environment' => App::environment(),
//     ];

//     /*
//     The following commented out line will print your MySQL credentials.
//     Uncomment this line only if you're facing difficulties connecting to the
//     database and you need to confirm your credentials. When you're done
//     debugging, comment it back out so you don't accidentally leave it
//     running on your production server, making your credentials public.
//     */
//     #$debug['MySQL connection config'] = config('database.connections.mysql');

//     try {
//         $databases = DB::select('SHOW DATABASES;');
//         $debug['Database connection test'] = 'PASSED';
//         $debug['Databases'] = array_column($databases, 'Database');
//     } catch (Exception $e) {
//         $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
//     }

//     dump($debug);
// });
