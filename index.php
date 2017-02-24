<?php

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
        <form method='GET' action='generate.php'>
        <label>Number of letters (Up to 20, required): </label>
            <input type='number' name='numberOfLetters' min="1" max="20" required><br><br>
        <label>Options: </label><br>
            <input type='checkbox' name='includeNumber'> Include a number <br>
            <input type='checkbox' name='includeSymbol'> Include a symbol <br>
            <select name="symbol">
                <option value="!">!</option>
                <option value="@">@</option>
                <option value="#">#</option>
                <option value="$">$</option>
                <option value="^">^</option>
                <option value="*">*</option>
            </select>
        <br>
        <input type='submit' value='Generate'>
        </form>
	</div>
</body>
</html>
