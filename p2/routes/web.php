<?php

Route::get('/', 'PageController@welcome');
Route::get('/calculate', 'SellerController@calculate');