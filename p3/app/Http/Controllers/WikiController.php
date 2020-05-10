<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WikiController extends Controller
{
    // the home page for the wiki
    public function index()
    {
        # return the home page content
        return view('wiki.index');
    }

    public function show($uid, $category = null, $subcategory = null, $title = null)
    {
        # return the home page content
        return 'You want to view the details for the article '.$title.' by '.$uid;
    }
}
