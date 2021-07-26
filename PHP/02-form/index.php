
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Form</title>
    <style>

    </style>
    <meta charset="UTF-8">
    <meta name-="viewport"
        content="width=device-width, user-scalable=no, initial scale= 1.0">
    <meta http-equiv="X-UA-compatible" content="ie=edge">
</head>
<?php
    // get the values previously submitted and specify defaults
    $firstName = $_POST['firstname'] ?? '';
    $entree = $_POST['entree'] ?? '';
    $toppings = $_POST['toppings'] ?? [];
    //create a variable for each checked status of the entree
    $hamburgerChecked= $entree == "Hamburger" ? 'checked' : '';
    $pizzaChecked= $entree == "Pizza" ? 'checked' : '';
    $saladChecked= $entree == "Salad" ? 'checked' : '';
    //checked status for toppings requires us to search the toppings array
    $ranchChecked= in_array("Ranch", $toppings) ? 'checked' : '';
    $cheeseChecked= in_array("Cheese", $toppings) ? 'checked' : '';
    $baconChecked= in_array("Bacon", $toppings) ? 'checked' : '';
    $pineappleChecked= in_array("Pineapple", $toppings) ? 'checked' : '';

    //only do validation if the user submitted the form
    $nameError = '';
    $formIsValid= true;
    if(isset($_POST['submit'])){
        if(empty($firstName)){
            //if($firstName == '')
            $nameError = "name is required.";
            $formIsValid = false;
        }
        if(strlen($firstName) < 2 ){
            $nameError = "Name must be at least 2 characters.";
            $formIsValid = false;
        }

        if(empty($toppings)){
            //...
        }

        if(is){

        }
    }
?>
<body>
<form action="" method="post">
<p>
    <label for="firstname">First name:<span class="error"><?=$nameError?></span></label>
    <input id="firstname" name="firstname" type="text" value="<?php echo $firstName?>"><!--">-->
    <input id="firstname" name="firstname" type="text" value="--><?//=$_POST['firstname'] ?? '' ?><!--"-->
</p>
    <p>
        <input type="radio" id="hamburger" name="entree" value="hamburger" <?= $hamburgerChecked ?> >
            <label for="hamburger">Hamburger</label>

    </p>
    <p>
        <input type="radio" id="pizza" name="entree" value="pizza" <?= $pizzaChecked ?>>
            <label for="pizza">Pizza</label>
    </p>
    <p>
        <input type="radio" id="salad" name="entree" value="salad" <?=$saladChecked?> >
            <label for="salad">Salad</label>
    </p>
    <p>
        Toppings: <br>
        <input type="checkbox" id="ranch" name="toppings[]" value="Ranch" <?= $ranchChecked ?>>
        <label for="ranch">Ranch</label>

        <br>
        <input type="checkbox" id="cheese" name="toppings[]" value="cheese" <?= $cheeseChecked ?>>
        <label for="cheese">Cheese</label>

        <br>
        <input type="checkbox" id="bacon" name="toppings[]" value="bacon" <?= $baconChecked ?>>
        <label for="bacon">Bacon</label>

        <br>
        <input type="checkbox" id="pineapple" name="toppings[]" value="pineapple" <?= $pineappleChecked ?>>
        <label for="pineapple">Pineapple</label>

        <br>
    </p>
    <p>
        <input type="submit" name="submit" value="Submit">
    </p>
</form>


<?php
    // all data from the form will be in $_GET or $_POST (superglobals)
    // check to see if the form was submitted (submit button was clicked)
    if(isset($_POST['submit'])) {
    echo "Welcome " . $_POST['firstname'] . "<br>";
    }

    //only process order if form is valid
    if(!$formIsValid){

    //other way is to get the value, but set a default if it doesn't exist
    $firstName = isset($_POST['firstname']) ? $_POST['firstname'] : 'User';

    //same as above
    //coalesce operator checks is value isset, otherwise uses default value
    $entree = $_POST['entree'] ?? 'None';
    $toppings = $_POST['toppings'] ?? [];
    echo "Welcome $firstName! We'll start preparing your $entree with the following toppings: "
        . implode(", ",$toppings ) . ". ";
    }
?>


</body>
</html>


