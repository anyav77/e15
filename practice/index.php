<?php

# Define 4 different variables, which will
# each represent how much a given coin is worth
$penny_value = .01;
$nickel_value = .05;
$dime_value = .10;
$quarter_value = .25;

# Define 4 more variables, which will each
# represent how many of each coin is in the bank
$pennies = 100;
$nickels = 25;
$dimes = 100;
$quarters = 34;

# Add up how much money is in the piggy bank
$total = ($pennies * $penny_value) + ($nickels * $nickel_value) + ($dimes * $dime_value) + ($quarters * $quarter_value);
require 'index-view.php';



# BEFORE
$phrases = [
    'hola',
    'adios',
    'hasta luego',
    'por favor',
    'de nada',
];


var_dump($phrases);
# AFTER
foreach ($phrases as $value) {
    $value = strtoupper($value);
    //echo $value;
    var_dump($value);
}

# For the purpose of these examples, we can "hard-code" $age to some value
$age = 20;
$category = 'child';

if ($age > 18) {
    $category = 'adult';
}

# Use var_dump to test the results
var_dump($category);
$result = 40;
var_dump($result < 20 or $result >= 40);
