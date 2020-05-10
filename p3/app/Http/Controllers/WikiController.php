<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WikiController extends Controller
{
    # the home page for the wiki
    public function index()
    {
        # return the home page content
        return view('wiki.index');
    }
    # show individual article page
    public function show($uid, $category = null, $subcategory = null, $title = null)
    {
        # return the home page content
        return 'You want to view the details for the article '.$title.' by '.$uid;
    }
    # add new article
    /**
    * GET /wiki/create
    * Display the form to add a new article
    */
    public function create(Request $request)
    {
        return view('wiki.create');
    }


    /**
    * POST /wiki
    * Process the form for adding a new article
    */
    public function store(Request $request)
    {

    # Validate the request data
        # The `$request->validate` method takes an array of data
        # where the keys are form inputs
        # and the values are validation rules to apply to those inputs
        $request->validate([
        'title' => 'required',
        'author' => 'required',
        'published_year' => 'required|digits:4',
        'cover_url' => 'url',
        'cover_url' => 'url',
        'purchase_url' => 'required|url',
        'description' => 'required|min:255'
    ]);
 
        # Note: If validation fails, it will automatically redirect the visitor back to the form page
        # and none of the code that follows will execute.
 
        # Code will eventually go here to add the book to the database,
        # but for now we'll just dump the form data to the page for proof of concept
        dump($request->all());
    }
}
