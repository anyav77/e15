<?php

use Illuminate\Support\Facades\Route;

# Static Pages
Route::get('/', 'PageController@welcome');
Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');
Route::get('/search', 'FilterController@index');

# Search
# Route for advanced search form - action
# Search allows to filter the articles by category, subcategory, author/user
# Future goal: allow seaching books and film catalog
# The articles and books may have multiple authors;
# In the future, I may need to add joined accounts,
# so that multiple users can track the article views or book sales
Route::get('/searchresults', 'FilterController@advancedsearch');

# Wiki Section
# Home
Route::get('/wiki', 'WikiController@index');

Route::group(['middleware' => 'auth'], function () {
    # Create Article
    // This route must comes before `/wiki/{id}/{slug}` so it takes precedence
    Route::get('/wiki/create', 'WikiController@create');
    Route::post('/wiki', 'WikiController@store');



    # Edit Article
    # Show the form to edit a specific article
    Route::get('/wiki/{id}/{slug}/edit', 'WikiController@edit'); //or
    //Route::get('/wiki/{user}/{title}/edit', 'WikiController@edit');
    # Process the form to edit a specific article
    Route::put('/wiki/{id}/{slug}', 'WikiController@update');

    # Authorization login routes
    # I want to keep /home path, as a place for a future user dashboards

    Route::get('/home', 'HomeController@index')->name('home');
});

# View Article
Route::get('/wiki/{id}/{slug}', 'WikiController@show');
Auth::routes();
