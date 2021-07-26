<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Into to PHP</title>
</head>



<body>

<?php

    //creating a variable
    //variables consist of letters,numbers,underscores
    $name= "Emma";
    $first_name = "Emma"; //snake case
    $firstName = "Emma"; //camel case
    //DO NOT DO FirstName
    $age = "21";
    $phpIsFun = true;

    //concentrate with "."
    echo "Hi, my name is..." . $firstName;

    //are interperated/parsed strings
    echo "<p>Name$firstName</p>";

    //are literal strings
    echo "<p>Name: $name </p> ";

?>

</body>
</html>
