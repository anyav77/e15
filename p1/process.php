<?php

session_start();

$inputString = $_POST['inputString'];

function isPalindrome($inputString)
{
    $array = str_split($inputString);
    $reversed = array_reverse($array);
    if ($array == $reversed) {
        return 'Yes';
    } else {
        return 'No';
    }
}

function hasVowels($inputString)
{
    $array = str_split($inputString);
    if (in_array("a", $array) || in_array("e", $array) || in_array("i", $array) || in_array("o", $array) || in_array("u", $array)) {
        return 'Yes';
    } else {
        return 'No';
    }
}


function vowelCount($inputString)
{
    return substr_count($inputString, 'a') + substr_count($inputString, 'e') + substr_count($inputString, 'i') + substr_count($inputString, 'o') + + substr_count($inputString, 'u');
}


function letterShift($inputString)
{
    $inputStringArray = str_split($inputString); // returns array of initial values
    $inputStringEncoded = []; // array holder for the new values
    foreach ($inputStringArray as $key => $value) {
        $inputStringASCII = ord($value);
        if (($inputStringASCII > 64 && $inputStringASCII <= 89) || ($inputStringASCII > 96 && $inputStringASCII <= 121)) {
            $inputStringASCII++;
        } elseif ($inputStringASCII == 122) {
            $inputStringASCII = 97;
        } elseif ($inputStringASCII == 90) {
            $inputStringASCII = 65;
        }
        $newInputStringValues = chr($inputStringASCII); // returns encoded array values
        array_push($inputStringEncoded, $newInputStringValues);
    }
    return implode(" ", $inputStringEncoded);
}

$_SESSION['results'] = [
    'isPalindrome' => isPalindrome($inputString),
    'hasVowels' => hasVowels($inputString),
    'vowelCount' => vowelCount($inputString),
    'letterShift' => letterShift($inputString),
];

header('Location: index.php');
