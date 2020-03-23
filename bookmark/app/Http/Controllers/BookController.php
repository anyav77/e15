<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Arr;
use Str;

class BookController extends Controller
{
    /**
* GET /books/create
* Display the form to add a new book
*/
public function create(Request $request) 
{
    return view('books.create');
}


/**
* POST /books
* Process the form for adding a new book
*/
public function store(Request $request) 
{
    # Code will eventually go here to add the book to the database, 
    # but for now we'll just dump the form data to the page for proof of concept
    dump($request->all());
}


    public function search(Request $request){
        $request->validate([
            'searchTerms' => 'required',
            'searchType' => 'required',
        ]);

        //if validation fails, it will redirect back to '/'
    # Start with an empty array of search results; books that
    # match our search query will get added to this array
    $searchResults = [];

    # Get the input values (default to null if no values exist)
    $searchTerms = $request->input('searchTerms', null);
    $searchType = $request->input('searchType', null);

    # Load our book data using PHP's file_get_contents
    # We specify our books.json file path using Laravel's database_path helper
    $bookData = file_get_contents(database_path('books.json'));
    
    # Convert the string of JSON text we loaded from books.json into an
    # array using PHP's built-in json_decode function
    $books = json_decode($bookData, true);
    
    # This algorithm will filter our $books down to just the books where either
    # the title or author ($searchType) matches the keywords the user entered ($searchTerms)
    # The search values are convereted to lower case using PHP's built in strtolower function
    # so that the search is case insensitive
    $searchResults = array_filter($books, function ($book) use ($searchTerms, $searchType) {
        return Str::contains(strtolower($book[$searchType]), strtolower($searchTerms));
    });

    # The above array_filter accomplishes the same thing this for loop would
    // foreach ($books as $slug => $book) {
    //     if (strtolower($book[$searchType]) == strtolower($searchTerms)) {
    //         $searchResults[$slug] = $book;
    //     }
    // }

    # Redirect back to the form with data/results stored in the session
    # Ref: https://laravel.com/docs/redirects#redirecting-with-flashed-session-data
    return redirect('/')->with([
        'searchTerms' => $searchTerms,
        'searchType' => $searchType,
        'searchResults' => $searchResults
    ]);
    }
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
