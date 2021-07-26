<?php
require_once "includes/database.php";

// get city place id from url
$id = $_GET['cityPlaceID'] ?? '1';

$id = $_GET['csrf_token'] ?? '1';

// sanitize id
$id = intval($id);

// build query
$query = "SELECT CityPlace.*, City.Name AS CityName 
            FROM CityPlace 
            JOIN City ON City.ID = CityPlace.CityID
            WHERE CityPlaceID = '$id'";

// execute query
$result = mysqli_query($db, $query) or die('Error loading city.');

// get one record from the database
$place = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Place</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<h1>Edit Place</h1>

<?php
// update database
if(isset($_POST['submit'])) {
    //  validate CSRF token
    if($_SESSION['csrf_token'] !== POST['csrf_token']){
        die('Invalid token.');
    }
    // get all form fields/values
    $cityPlaceID = $_POST['cityPlaceID'] ?? '';
    $name = $_POST['name'] ?? '';
    $address = $_POST['address'] ?? '';
    $description = $_POST['description'] ?? '';
    $rating = $_POST['rating'] ?? '';

    // TODO: validation/sanitation

    //escape HTML to prevent XSS (Cross Script Scripting) attack
    $name = htmlspecialchars($name); //

    //allow certain tags
    $address = strip_tags($address, '<b><i>');

    //if you allow any HTML tags, you have to strip out js event attributes
    $address= str_replace(['onmouseover', 'onmouseout', 'onmousein', 'on...'], replace:'xxx', $address);

    // update record
    $query = "UPDATE `CityPlace` 
                SET `Name` = ?,
                    `Address` = ?,
                    `Description` = ?,
                    `Rating` = ?, 
                WHERE `CityPlace`.`CityPlaceID` = $cityPlaceID
                LIMIT 1";

    // execute query
    $result = mysqli_query($db, $query) or die("Error loading places.");

    // if record was updated, redirect to the city page
    // mysqli_affected_rows will return how many records were changed.
    if(mysqli_affected_rows($db)) {
        // redirect back to the city page
        header('Location: city.php?id=' . $place['CityID']);
        die();
    } else {
        echo "Something went wrong!";
    }

    // close database connection (put in footer to avoid doing multiple times)
    mysqli_close($db);
}

?>

<form method="post">
    <div class="form-group">
        <label for="city">City</label>
        <input type="text" id="city" class="form-control" value="<?= $place['CityName'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="<?= $place['Name'] ?>">
    </div>
    <div class="form-group">
            <label for="address">Address</label>
        <input type="text" id="address" name="address" class="form-control" value="<?= $place['Address'] ?>">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control"><?= $place['Description'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="rating">Rating (1-5)</label>
        <input type="text" id="rating" name="rating" class="form-control" value="<?= $place['Rating'] ?>">
    </div>
    <div class="form-group">
        <!-- use hidden fields to pass information with the form that the user doesn't enter -->
        <input type="hidden" name="cityPlaceID" value="<?= $place['CityPlaceID'] ?>">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
        <input type="submit" name="submit" value="Update Place" class="btn btn-primary">
    </div>
</form>

</body>
</html>
