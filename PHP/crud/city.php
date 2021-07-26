<?php
require_once "includes/database.php";

// get country code from url
$id = $_GET['id'] ?? '1';

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
    <title><?= $city['Name'] ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<h1><?= $city['Name'] ?></h1>
<p><?= $city['District'] ?></p>
<p>...</p>

<?php
// query to get places
$query = "SELECT * FROM CityPlace WHERE CityID = {$city['ID']}";

// execute query
$result = mysqli_query($db, $query) or die("Error loading places.");

// if rows are returned, display table
if(mysqli_num_rows($result)):
    ?>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Description</th>
            <th>Rating</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        // output data
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo "<tr>
                           <td>{$row['Name']}</td>
                           <td>{$row['Address']}</td>
                           <td>{$row['Description']}</td>
                           <td>" . implode('', array_fill(0, $row['Rating'], '&starf;')) . "
                                " . implode('', array_fill(0, 5 - $row['Rating'], '&star;')) . "</td>
                           <td>
                           <a href='editPlace.php?cityPlaceID={$row['CityPlaceID']}' class='btn btn-secondary'>Edit</a>
                           <a href='deletePlace.php?cityPlaceID={$row['CityPlaceID']}' class='btn btn-danger'>Delete</a>
                            </td>
                           </tr>";
        }
        ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No places found.</p>
<?php

endif;

// close database connection (put in footer to avoid doing multiple times)
mysqli_close($db);
?>

<a href="addPlace.php?cityID=<?= $city['ID'] ?>" class="btn btn-primary">Add Place</a>

</body>
</html>
