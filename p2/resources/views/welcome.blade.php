@extends('layouts.master')

@section('content')

<h2>Commissions Calculator</h2>
<form method='GET' action='/calculate'>
    <fieldset>
        <label for='productName'>
            Product Name:
        </label>
        <input type='text' name='productName' value=''>
    </fieldset>

    <fieldset>
        <label for="commisionRate">
            Commission Rate:
        </label>
        <select name="commisionRate" size="1">
            <option value="50">50%</option>
            <option value="30">30%</option>
        </select>
    </fieldset>
    <fieldset>
        <label for="salesNumber">
            Number of sales:
        </label>
        <input type="number" name="salesNumber" maxlength="4" size="4">
    </fieldset>
    <fieldset>
        <label for="salesNumber">
            Price:
        </label>
        <input type="number" name="productPrice" maxlength="4" size="4">
    </fieldset>
    <fieldset>
        <label for='title'> Round Up?</label>
        <input type='checkbox' name='searchType' id='title' value='title'>
    </fieldset>

    <input type='submit' class='btn btn-primary' value='Search'>


</form>
@endsection