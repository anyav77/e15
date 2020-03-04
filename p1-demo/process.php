<?php
require 'StringProcessor.php';
require 'Student.php';
session_start();

$inputString = $_POST['inputString'];

$stringProcessor = new StringProcessor($inputString);
$student = new Student(99);
$id = $student->getId();

//$id = $student->getId();
//var_dump($id = $student->getId());

// $_SESSION['results'] = [
//     'isPalindrome' => $stringProcessor->isPalindrome(),
//     'isBigWord' => $stringProcessor->isBigWord(),
//     'hasVowels' => $stringProcessor->hasVowels(),
//     'vowelCount' => $stringProcessor->vowelCount(),
//     'letterShift' => $stringProcessor->letterShift(),
// ];

// header('Location: index.php');
