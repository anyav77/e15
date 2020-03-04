<?php

Route::get('/', 'PageController@welcome');
Route::get('/books', 'BookController@index');
Route::get('/books/{title?}', 'BookController@show');
Route::get('/filter/{category}/{subcategory?}', 'BookController@filter');



// Route::get('/example', function () {
//     return view('abc');
// });

# Assignment questions

// Route::get('/book/{id}', function ($id) {
//     return 'You have requested book #'.$id;
// });
 
 
// Route::post('/books', function () {
//     return 'Version A';
// });
  
// Route::get('/books/{id?}', function () {
//     return 'Version B';
// });
  
// Route::get('/books', function () {
//     return 'Version C';
// });



# Old Examples

// Route::get('/books/{title?}', function ($title = null) {
//     // if (is_null($title)) {
//     //     # Query the database for all the books
//     //     # Return a view to show all the books
//     //     return 'Here are all the books...';
//     // }

//     # Query the database for a book where title = $title

//     # Return a view to show the book
//     # Include the book data
//     return 'Results for the book: '.$title;
// });

// Route::get('/filter/{category}/{subcategory?}', function ($category, $subcategory = null) {
//     $output = 'Here are all the books under category: '.$category;
//     if ($subcategory) {
//         $output .= ' and also the subcategory: '.$subcategory;
//     }
//     return $output;
// });
