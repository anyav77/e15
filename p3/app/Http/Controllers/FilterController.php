<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    # search all the articles in the Wiki
    # this functionality will be expanded to the future media catalog

    public function index()
    {
        # return the home page content
        return view('filter.index');
    }
    # Advnaced Search Results
    public function filter($category = null, $subcategory = null, $author = null, $keyword = null)
    {
        $output = "Here are all the books ";
        if ($category) {
            $output .= 'under the category '.$category;
        }
        if ($subcategory) {
            $output .= ' and also the subcategory: '.$subcategory;
        }
        if ($author) {
            $output .= ' by author '.$author;
        }
        if ($keyword) {
            $output .= ' with keywords '.$keyword;
        }
        return $output;
    }
}
