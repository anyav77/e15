<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Article;

class WikiController extends Controller
{
    # VIEW CONTENT
    /**
    * GET /wiki/
    * Show wiki home page with the articles info
    */
    public function index()
    {
        $articles = Article::orderBy('title')->get();
        $newArticles = $articles->sortByDesc('created_at')->take(3);
        # return the home page content
        return view('wiki.index')->with([
            'articles' => $articles,
            'newArticles' => $newArticles
        ]);
    }

    /**
    * GET /wiki/{id}/{slug}
    * Show the details for an individual book
    */
    public function show(Request $request, $id, $slug, $category = null, $subcategory = null, $title = null)
    {
        $article = Article::where('id', '=', $id)->first();

        return view('wiki.show')->with([
            'article' => $article,
            'id' => $id,
            'title' => $title,
            'slug' => $slug,
        ]);
    }

    # ADD CONTENT
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
        'content' => 'required|min:255'
    ]);
 
        # Note: If validation fails, it will automatically redirect the visitor back to the form page
        # and none of the code that follows will execute.
        $title = $request->title;
        # Add the book to the database
        $newArticle = new Article();
        //$newArticle->slug = $request->slug;
        $newArticle->title = $title;
        $newArticle->slug = Str::slug($title, '-');
        // get user from the session
        //$newBook->author_id = $request->author_id;
        $newArticle->content = $request->content;
        $newArticle->save();

        return redirect('/wiki')->with(['flash-alert' => 'Your article '.$newArticle->title.' has been published.']);
    }

    # EDIT CONTENT

    /*
    GET /wiki/{id}/{slug}/edit
    */
    public function edit(Request $request, $id, $slug)
    {
        $article = Article::where('id', '=', $id)->first();

        if (!$article) {
            return redirect('/wiki')->with([
            'flash-alert' => 'Article not found.'
        ]);
        }

        return view('wiki.edit')->with([
        'article' => $article
    ]);
    }
    /*
    PUT /wiki/{id}/{slug}
    */
    public function update(Request $request, $id, $slug)
    {
        $article = Article::where('id', '=', $id)->first();

        $request->validate([
        'title' => 'required',
        'content' => 'required|min:255'
    ]);
        // $article->id = $request->id;
        // $article->slug = $request->slug;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();
        dump($request);
        return redirect('/wiki/'.$id.'/'.$slug.'/edit')->with([
        'flash-alert' => 'Your changes were saved.'
    ]);
    }
}
