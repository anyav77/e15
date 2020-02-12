<?php

function isPalindrome($inputString)
{
    $array = str_split($inputString);
    $reversed = array_reverse($array);
    if ($array == $reversed) {
        return 'This is a Palindrome';
    } else {
        return 'This is not a Palindrome';
    }
}

function hasVowels($inputString)
{
    $array = str_split($inputString);
    if (in_array("a", $array) || in_array("e", $array) || in_array("i", $array) || in_array("o", $array) || in_array("u", $array)) {
        return 'It Has Vowels';
    } else {
        return 'It Has No Vowels';
    }
}


function vowelCount($inputString)
{
    // $array = str_split($inputString);
    // if (in_array("a", $array) || in_array("e", $array) || in_array("i", $array) || in_array("o", $array) || in_array("u", $array)) {
    //     return 'It Has Vowels';
    // } else {
    //     return 'It Has No Vowels';
    // }
    //$text2 = 'gcdgcdgcd';
    return substr_count($inputString, 'a') + substr_count($inputString, 'e') + substr_count($inputString, 'i') + substr_count($inputString, 'o') + + substr_count($inputString, 'u');
}

function isBigWord($inputString)
{
    if (strlen($inputString) > 7) {
        return 'Yes';
    } else {
        return 'No';
    }
}
$result1 = isBigWord('cat');
$result2 = isBigWord('mississipi');
$result3 = isPalindrome('aha');
$result4 = hasVowels('test');
$result5 = vowelCount('aeioutest');
require 'index-view.php';
