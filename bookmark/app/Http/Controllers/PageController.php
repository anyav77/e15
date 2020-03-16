<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome($title = null)
    {
        return view('welcome');
        
        //return view('books.edit');
    }
}
