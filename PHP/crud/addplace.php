<?php
require_once "includes/database.php";

// get country code from url
$id = $_GET['cityID'] ?? '1';

// sanitize id
$id = intval($id);

// build query
$query = "SELECT * FROM City WHERE ID = '$id'";

// execute query
$result = mysqli_query($db, $query) or die('Error loading city.');

// get one record from the database
$city = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Place</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<h1>Add Place</h1>

<?php
// insert into database
if(isset($_POST['submit'])) {
    // get all form fields/values
    $cityId = $_POST['cityID'] ?? '';
    $name = $_POST['name'] ?? '';
    $address = $_POST['address'] ?? '';
    $description = $_POST['description'] ?? '';
    $rating = $_POST['rating'] ?? '';

    // TODO: validation/sanitation

    // method 1
    $cityId = intval($cityId);
    $name = mysqli_real_escape_string($db, $name);
    $address = mysqli_real_escape_string($db, $address);
    $description = mysqli_real_escape_string($db, $description);
    $rating= mysqli_real_escape_string($db, $rating);

    // method 2


    // insert record
    $query = "INSERT INTO `CityPlace` 
                (`CityID`, `Name`, `Address`, `Description`, `Rating`) 
            VALUES 
                   ($cityId, '$name', '$address', '$description', '$rating')";

    // execute query
    $result = mysqli_query($db, $query) or die("Error loading places.");

    // if record was added, get the id of the new CityPlace
    if($newId= mysqli_insert_id($db)) {
        // redirect back to the city page
        header('Location: city.php?id=' . $cityId);
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
        <input type="text" id="city" class="form-control" value="<?= $city['Name'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="rating">Rating</label>
        <input type="text" id="rating" name="rating" class="form-control">
    </div>
    <div class="form-group">
        <!-- use hidden fields to pass information with the form that the user doesn't enter -->
        <input type="hidden" name="cityID" value="<?= $city['ID'] ?>">
        <input type="submit" name="submit" value="Add Place" class="btn btn-primary">
    </div>
</form>

</body>
</html>
