<?php

namespace App\Http\Controllers;
use App\Article;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * GET
    */
    public function welcome()
    {
        $articles = Article::orderBy('title')->get();
        $newArticles = $articles->sortByDesc('created_at')->take(3);
        # return the home page content
        return view('pages.welcome')->with([
            'articles' => $articles,
            'newArticles' => $newArticles
        ]);
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
