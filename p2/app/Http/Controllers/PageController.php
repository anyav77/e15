<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {

        $productName = session('productName', null);
        $salesNumber = session('salesNumber', null);
        $productPrice = session('productPrice', null);
        $commisionRate = session('commisionRate', null);
        $roundUp = session('roundUp', null);
        $commissions = session('commissions', null);
        # Return the welcome page
        # If there is data stored in the session as the results of doing a search
        # that data will be extracted from the session and passed to the view
        # to display the results
        return view('welcome')->with([
            'productName' => session('productName', null),
            'salesNumber' => session('salesNumber', null),
            'productPrice' => session('productPrice', null),
            'commisionRate' => session('commisionRate', null),
            'roundUp' => session('roundUp', null),
            'commissions' => session('commissions', null),
        ]);
    }

}