@extends('layouts.master')

@section('content')

<h2>Commission Calculator</h2>
<form method='GET' action='/calculate'>
    <fieldset>
        <label for='productName'>
            Product Name:
        </label>
        <input type='text' name='productName' id='productName' value='{{old('productName', $productName)}}'>
    </fieldset>

    <fieldset>
        <label for="commisionRate">
            Commission Rate:
        </label>
        <select name="commisionRate" id="commisionRate">
            <option value="50">50%</option>
            <option value="30" {{ (old('commisionRate') == '30' or $commisionRate=='30') ? 'selected' : ''}}>30%
            </option>
        </select>
    </fieldset>
    <fieldset>
        <label for="salesNumber">
            Number of sales: &#42;
        </label>
        <input type="text" name="salesNumber" id="salesNumber" value="{{old('salesNumber', $salesNumber)}}">
    </fieldset>
    <fieldset>
        <label for="productPrice">
            Price ($): &#42;
        </label>
        <input name="productPrice" id="productPrice" value="{{old('productPrice', $productPrice)}}">
    </fieldset>
    <fieldset>
        <label for='roundUp'> Round Up?</label>
        <input type='checkbox' name='roundUp' id='roundUp' value='roundUp'
            {{ (old('roundUp') == 'roundUp' or $roundUp=='roundUp') ? 'checked' : ''}}>
    </fieldset>

    <input type='submit' class='btn btn-primary' value='Submit'>

    @if(count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
</form>
@if(!is_null($commissions))
<div class='results alert alert-primary'>
    You have earned {{$commissions}}
    USD{{ (old('productName') != null or $productName != null) ? ' for '.$productName : ''}}.
</div>
@endif
@endsection