<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Arr;
use Str;

class BookController extends Controller
{
    /**
     * GET /list
     */
    public function list()
    {
        # TODO
        return view('books.list');
    }

    /**
     * GET /books
     * Show all the books in the library
     */
    public function index()
    {
        # Open the books.json data file
        # database_path() is a Laravel helper to get the path to the database folder
        # See https://laravel.com/docs/helpers for other path related helpers
        # file_get_contents is a built-in PHP function
        $bookData = file_get_contents(database_path('books.json'));

        # Convert the JSON to an array PHP's json_decode function
        $books = json_decode($bookData, true);

        
        # Alphabetize the books
        $books = Arr::sort($books, function ($value) {
            return $value['title'];
        });

        return view('books.index')->with([
            'books' => $books
        ]);
    }

    /**
     * GET /book/{slug}
     * Show the details for an individual book
     */
    public function show($slug)
    {
        # Load the JSON book data
        $bookData = file_get_contents(database_path('books.json'));

        # Convert the JSON to an array
        $books = json_decode($bookData, true);
        
        $book = Arr::first($books, function ($value, $key) use ($slug) {
            return $key == $slug;
        });
        
        return view('books.show')->with([
            'book' => $book,
            'slug' => $slug,
        ]);
    }

    /**
     * GET /filter/{$category}/{subcategory?}
     * Example demonstrating multiple parameters
     * Not a feature we're actually building, so I'm commenting out
     */
    // public function filter($category, $subcategory = null)
    // {
    //     $output = 'Here are all the books under the category '.$category;

    //     if ($subcategory) {
    //         $output .= ' and also the subcategory '.$subcategory;
    //     }

    //     return $output;
    // }
}
