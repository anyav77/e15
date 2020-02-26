<?php

class StringProcessor
{
    #Propoerties
    private $inputString;

    #Methods
    public function __construct($inputString)
    {
        $this->inputString = $inputString;
    }
    public function isPalindrome()
    {
        $array = str_split($this->inputString);
        $reversed = array_reverse($array);
        if ($array == $reversed) {
            return 'Yes';
        } else {
            return 'No';
        }
    }

    public function isBigWord()
    {
        return (strlen($this->inputString)>7) ? 'Yes' : 'No';
    }

    public function hasVowels()
    {
        $array = str_split($this->inputString);
        if (in_array("a", $array) || in_array("e", $array) || in_array("i", $array) || in_array("o", $array) || in_array("u", $array)) {
            return 'Yes';
        } else {
            return 'No';
        }
    }


    public function vowelCount()
    {
        return substr_count($this->inputString, 'a') + substr_count($inputString, 'e') + substr_count($inputString, 'i') + substr_count($inputString, 'o') + + substr_count($inputString, 'u');
    }


    public function letterShift()
    {
        $inputStringArray = str_split($this->inputString); // returns array of initial values
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
}
