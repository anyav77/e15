<!DOCTYPE html>
<html lang="en">

<head>
    <title>e15 Project 1</title>
    <meta charset="utf-8">
    <style>
        body {
            text-align: center;
        }

        h1,
        h2 {
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        h2 {
            color: #999;
        }
    </style>
</head>

<body>
    <h1>e15 Project 1</h1>
    <form method="POST" action="process.php">
        <label for="inputString">Enter a String</label>
        <input type='text' id='inputString' name='inputString'>
        <button type="submit">Process</button>
    </form>

    <?php if (isset($results)) : ?>
    <h2>Is Palindrome?</h2>
    <?=$isPalindrome ?>

    <h2>Does it have vowels?</h2>
    <?=$hasVowels ?>

    <h2>How many vowels does it have?</h2>
    <?=$vowelCount ?>

    <h2>Letter Shift</h2>
    <?=$letterShift ?>
    <?php endif ?>

</body>

</html>