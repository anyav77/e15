<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{

    public function calculate(Request $request) 
    {
        # Validate form inputs
        $request->validate([
            'salesNumber' => 'required | numeric | integer',
            'productPrice' => 'required | numeric',
        ]);

        # Get the input values (default to null if no values exist)
        $productName = $request->input('productName', null);
        $salesNumber = $request->input('salesNumber', null);
        $productPrice = $request->input('productPrice', null);
        $commisionRate = $request->input('commisionRate', null);
        $roundUp = $request->input('roundUp', null);
        # Calculate commissions
        $commissions = ($salesNumber * $productPrice) * ($commisionRate / 100);
        if ($roundUp != null) {
            $commissions = round($commissions);
        } 

        # Redirect back to the form with data/results stored in the session
        # Ref: https://laravel.com/docs/redirects#redirecting-with-flashed-session-data
        return redirect('/')->with([
            'productName' => $productName,
            'salesNumber' => $salesNumber,
            'productPrice' => $productPrice,
            'commisionRate' => $commisionRate,
            'roundUp' => $roundUp,
            'commissions' => $commissions
        ]);

    }

}
