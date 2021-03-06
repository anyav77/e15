<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // this is where the authors and filmmakers can view stats fro their articles, manage drafts, upload vides
        // return the list of articles publshed by the loged in user


        $user = $request->user();
        $userArticles = $user->articles;

        return view('home')->with([
            'userArticles' => $userArticles,
        ]);
    }
}
