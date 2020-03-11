<?php


Route::get('/', 'PageController@welcome');
Route::get('/books', 'BookController@index');
Route::get('/books/{title?}', 'BookController@show');
Route::get('/filter/{category}/{subcategory?}', 'BookController@filter');
