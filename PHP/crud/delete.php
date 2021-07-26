<?php
require_once "includes/database.php";

// get city place id from url
$id = $_GET['cityPlaceID'] ?? '1';

//TODO: validation/sanitization

//TODO: CONVERT TO PREPARED STATEMENTS
// update record
$query = "DELETE FROM 'CityPlace'
            WHERE 'CityPlace'. 'CityPlaceID' = $cityPlaceID
            LIMIT 1";


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
    <title>Delete Place</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<h1>Delete Place</h1>

<table>
<thead>
<tr>
    <th>Name</th>
    <th>Address</th>
    <th>Description</th>
    <th>Rating</th>
</tr>
</thead>
<tbody>

<?php
// insert into database
if(isset($_POST['delete'])) {
    // get all form fields/values
    $cityPlaceID = $_POST['cityPlaceID'] ?? '';

    // TODO: validation/sanitation

    // delete record
    $query = "DELETE FROM `CityPlace`
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
} elseif(isset($_POST['cancel'])) {
    // redirect back to the city page
    header('Location: city.php?id=' . $place['CityID']);
    die();
}
?>
</tbody>
</table>

<form method="post">

    <p>Are you sure you want to delete "<?= $place['Name'] ?>" from <?= $place['CityName'] ?>?</p>

    <div class="form-group">
        <!-- use hidden fields to pass information with the form that the user doesn't enter -->
        <input type="hidden" name="cityPlaceID" value="<?= $place['CityPlaceID'] ?>">
        <input type="submit" name="cancel" value="No" class="btn btn-secondary">
        <input type="submit" name="delete" value="Yes" class="btn btn-danger">
    </div>
</form>

</body>
</html>
