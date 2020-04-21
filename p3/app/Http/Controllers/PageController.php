<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * GET
    */
    public function welcome()
    {
        return view('pages.welcome');
    }
    /**
     * GET /about
    */
    public function about()
    {
        return view('pages.about');
    }
    /**
     * GET /support
    */
    public function contact()
    {
        return view('pages.contact');
    }
}
