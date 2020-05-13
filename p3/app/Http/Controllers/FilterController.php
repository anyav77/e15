<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class FilterController extends Controller
{
    # search all the articles in the Wiki
    # this functionality will be expanded to the future media catalog
    /**
    * GET
    * /search/
    * Show advanced search form
    */
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
    * /search/results
    * Show search results
    */
    public function advancedsearch(Request $request)
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

        # Pull the data from the Database
        $articleData = Article::all()->toJson();
        $articles = json_decode($articleData, true);
        # This algorithm will filter our $articles down to just the books where either
        # the title or author ($searchType) matches the keywords the user entered ($searchTerms)
        # The search values are convereted to lower case using PHP's built in strtolower function
        # so that the search is case insensitive

        $searchResults = array_filter($articles, function ($article) use ($searchTerms, $searchType) {
            return \Str::contains(strtolower($article[$searchType]), strtolower($searchTerms));
        });

        # Redirect back to the form with data/results stored in the session
        # Ref: https://laravel.com/docs/redirects#redirecting-with-flashed-session-data
        return view('filter.index')->with([
        'searchTerms' => $searchTerms,
        'searchType' => $searchType,
        'searchResults' => $searchResults
        ]);
    }
}
