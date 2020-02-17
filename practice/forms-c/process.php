<?php

session_start();

$answer = $_POST['answer'];

if ($answer == 'pumpkin') {
    $results = 'Correct!';
} else {
    $results = 'Incorrect!';
};

$_SESSION['results'] = $results;
#Redirect - back to the original page with the form
header('Location: index.php');
