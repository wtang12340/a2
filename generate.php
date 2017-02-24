<?php

// Using the provided Form class
require('Form.php');

$form = new DWA\Form($_GET);

$errors = [];

if($form->isSubmitted()){
    if($_GET){
        $_GET = $form->sanitize($_GET);
    }

    $errors = $form->validate(
        [
            'numberOfLetters' => 'required|min:2|max:21'
        ]
    );

    #Number of letters the user wanted.
    $numberOfLetters = $form->get('numberOfLetters');

    #Boolean add a number or not.
    $includeNumber = $form->isChosen('includeNumber');
    #Boolean add a symbol or not.
    $includeSymbol = $form->isChosen('includeSymbol');

    #The symbol picked by user.
    $symbol = $form->get('symbol');

    #Setup final string that will be displayed
    $password = "";

    #Array of alphabet using array_merge and range methods
    $alphabet = array_merge(range('a', 'z'),range('A','Z'));

    #Takes off a letter depending on if user wants number and/or symbol
    if ($includeNumber){
        $numberOfLetters -= 1;
        $integers = range(0,9); #range of numbers
    }
    if($includeSymbol){
        $numberOfLetters -= 1;
    }

    #Generate the password with letters only
    $randomLetterKeys = array_rand($alphabet,$numberOfLetters);
    foreach ($randomLetterKeys as $index => $number) {
        $password .= $alphabet[$number];
    }

    #Append the number and/or symbol as necessary
    if ($includeNumber){
        $randomNumberKey = array_rand($integers,1);
        $randomNumber = $integers[$randomNumberKey];
        $password.= $randomNumber;
    }
    if ($includeSymbol){
        $password.= $symbol;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Spongebob's Password Generator</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/william.css">
</head>
<body>
	<div class="container">
		<h1>Spongebob's Password Generator</h1>
        <img src='images/spongebob.jpg' alt='Spongebob'>
        <?php if(!$errors): ?>
            <p class="output"> YOUR PASSWORD IS: <?=$password?> <p>
        <?php elseif($form->isSubmitted()): ?>
            <p class="output"> ERROR: INVALID NUMBER OF LETTERS <p>
        <?php endif; ?>
	</div>
</body>
</html>
