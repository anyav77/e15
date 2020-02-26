<?php
require 'StringProcessor.php';
session_start();

$inputString = $_POST['inputString'];

$stringProcessor = new StringProcessor($inputString);

$_SESSION['results'] = [
    'isPalindrome' => $stringProcessor->isPalindrome(),
    'isBigWord' => $stringProcessor->isBigWord(),
    'hasVowels' => $stringProcessor->hasVowels(),
    'vowelCount' => $stringProcessor->vowelCount(),
    'letterShift' => $stringProcessor->letterShift(),
];

header('Location: index.php');
