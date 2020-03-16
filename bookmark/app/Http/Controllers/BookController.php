<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Get /books
     */
    public function index()
    {
        

        //return 'Here are all the books!';
        return view('books.index')->with(['books'=>[
            ['title' => "War and Peace" ],
            ['title' => "The Great Gatsby" ]
        ]]);
    }

    public function show($title = null)
    {

        # Query the database for a book where title = $title
    
        # Return a view to show the book
        # Include the book data
        //return 'Results for the book: '.$title;
        $bookFound = false;
        return view('books.show')->with(['title' => $title, 'bookFound' => $bookFound]);
    }

    public function filter($category, $subcategory = null)
    {
        $output = 'Here are all the books under category: '.$category;
        if ($subcategory) {
            $output .= ' and also the subcategory: '.$subcategory;
        }
        return $output;
    }
}
