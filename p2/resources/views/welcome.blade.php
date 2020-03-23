@extends('layouts.master')

@section('content')

<h2>Commission Calculator</h2>
<form method='GET' action='/calculate'>
    <fieldset>
        <label for='productName'>
            Product Name:
        </label>
        <input type='text' name='productName' id='productName' value=''>
    </fieldset>

    <fieldset>
        <label for="commisionRate">
            Commission Rate:
        </label>
        <select name="commisionRate" id="commisionRate">
            <option value="50">50%</option>
            <option value="30">30%</option>
        </select>
    </fieldset>
    <fieldset>
        <label for="salesNumber">
            Number of sales:
        </label>
        <input type="number" name="salesNumber" id="salesNumber">
    </fieldset>
    <fieldset>
        <label for="productPrice">
            Price:
        </label>
        <input type="number" name="productPrice" id="productPrice">
    </fieldset>
    <fieldset>
        <label for='title'> Round Up?</label>
        <input type='checkbox' name='searchType' id='title' value='title'>
    </fieldset>

    <input type='submit' class='btn btn-primary' value='Search'>


</form>
@endsection