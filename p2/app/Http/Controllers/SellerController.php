<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Arr;
use Str;

class SellerController extends Controller
{

    public function calculate(Request $request) 
    {
        
        $request->validate([
            'salesNumber' => 'required | numeric',
            'productPrice' => 'required | numeric',
        ]);

        # Get the input values (default to null if no values exist)
        $productName = $request->input('productName', null);
        $salesNumber = $request->input('salesNumber', null);
        $productPrice = $request->input('productPrice', null);
        $roundUp = $request->input('roundUp', null);
        $commisionRate = $request->input('commisionRate', null);
        # Calculate commissions
        $commissions = ($salesNumber * $productPrice) * ($commisionRate / 100);
        //dump($roundUp);
        //dump($request->all());

        # Redirect back to the form with data/results stored in the session
        # Ref: https://laravel.com/docs/redirects#redirecting-with-flashed-session-data
        return redirect('/')->with([
            'productName' => $productName,
            'salesNumber' => $salesNumber,
            'productPrice' => $productPrice,
            'roundUp' => $roundUp,
            'commissions' => $commissions
        ]);

    }

}
