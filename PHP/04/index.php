<?php
//give the session a name to make it unique from other applications/websites on the server
session_name('eewing1_03-sessions');

//start the session before any echo or HTML
//this creates a new session if it doesn't exist
// or loads an existing one if cookie provided by the browser
session_start();

//pretend we just validated a login
$_SESSION['username']= 'tyler';
$_SESSION['admin']= 'true';

//echo "Welcome [$_SESSION['username']}";

//reset visits
if(isset($_GET['reset'])){
    unset($_SESSION['visits']);
}

// create the session variable if it doesn't already exist
$_SESSION['visits'] = $_SESSION['visits'] ?? 0;
$_SESSION['visits']++;

$suffix= 'th';
if($_SESSION['visits'] == 1){
    $suffix= 'st';
}
else if($_SESSION['visits'] == 2){
    $suffix= 'nd';
}

else if($_SESSION['visits'] == 3){
    $suffix= 'rd';
}

echo "This is your {$_SESSION['visits']} visit today.";

//removing items from a session
//pretend that we logged out of a session
unset($_SESSION['username']);

//to delete everything in the session
//session_destroy();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Form</title>
    <style>
        .error{
            color: red;
            font-weight: bold;
        }
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
    if(isset($_POST['submit']) and !$formIsValid){
        //create a cart in the session
        $_SESSION['cart'] = $_SESSION['cart'] ?? [];

        //add the order (associative) to the cart (index)
        // [] says to create a new element at the end of the array
        $_SESSION['cart'][] = [
            'firstname' => $firstName,
            'entree' => $entree,
            'toppings' => $toppings,
        ];

        //output first topping in the first order
        echo "First order topping is:". $_SESSION['cart'][0]['toppings'][0];
    }

    //output the cart if it exists
    echo '<h3>Your cart</h3>';
    if isset($_SESSION['cart']) and !empty($_SESSION['cart']){
        ?>
    <table>
        <thead>
            <tr>
                <td>Name</td>
                <td>Entree</td>
                <td>Toppings</td>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <?php
        //$i and $order are new variables and will get the
        // key and value (key on left, value on right)
        foreach ($_SESSION['cart'] as $i => $order){
            echo "
                <tr>
                    <td>{$order['firstname']}</td>
                     <td>{$order['entree']}</td>
                      <li><ul><li>" .implode('<li></li>', $order['toppings']) ."</li></ul></li>
                      <td><form method='get'></form></td>
                      
                </tr>
            ";
        }
    }

    ?>



    //debug arrays
    echo "<pre>";
    echo "<h3>Post:</h3>";
    print_r($_POST);
    echo "<h3>Session:</h3>";
    print_r($_SESSION);
    echo "</pre>";


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


