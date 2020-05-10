<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    # search all the articles in the Wiki
    # this functionality will be expanded to the future media catalog

    public function index()
    {
        # Return the search page
        # If there is data stored in the session as the results of doing a search
        # that data will be extracted from the session and passed to the view
        # to display the results
        return view('filter.index')->with([
            'searchTerms' => session('searchTerms', null),
            'searchType' => session('searchType', null),
            'searchResults' => session('searchResults', null)
        ]);
    }

    /**
    * GET
    * /searchresults
    * Show search results
    */
    public function searchresults(Request $request)
    {
        $request->validate([
            'searchTerms' => 'required',
            'searchType' => 'required',
        ]);

        //if validation fails, it will re-direct back to '/search'

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
            return \Str::contains(strtolower($book[$searchType]), strtolower($searchTerms));
        });

        # The above array_filter accomplishes the same thing this for loop would
        // foreach ($books as $slug => $book) {
        //     if (strtolower($book[$searchType]) == strtolower($searchTerms)) {
        //         $searchResults[$slug] = $book;
        //     }
        // }
    
        # Redirect back to the form with data/results stored in the session
        # Ref: https://laravel.com/docs/redirects#redirecting-with-flashed-session-data
        return redirect('/search')->with([
        'searchTerms' => $searchTerms,
        'searchType' => $searchType,
        'searchResults' => $searchResults
    ]);
    }


    // # Advnaced Search Results
    // public function filter($category = null, $subcategory = null, $author = null, $keyword = null)
    // {
    //     $output = "Here are all the books ";
    //     if ($category) {
    //         $output .= 'under the category '.$category;
    //     }
    //     if ($subcategory) {
    //         $output .= ' and also the subcategory: '.$subcategory;
    //     }
    //     if ($author) {
    //         $output .= ' by author '.$author;
    //     }
    //     if ($keyword) {
    //         $output .= ' with keywords '.$keyword;
    //     }
    //     return $output;
    // }
}
