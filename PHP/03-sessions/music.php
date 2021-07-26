<?php

session_name('eewing1-lab');

session_start();

$formIsValid= true;
$artistError= "";
$songError="";



if(isset($_POST['submit'])) {

    $artist = $_POST['artist'] ?? '';
    $songTitle = $_POST['song'] ?? '';

    if(empty($artist)){
        $artistError= "Artist is required.";
        $formIsValid=false;
    }

    if(empty($songTitle)){
        $songError= "Song title is required.";
        $formIsValid=false;
    }

    if($formIsValid == true) {


        $_SESSION['playlist'] = $_SESSION['playlist'] ?? [];


        $_SESSION['playlist'][] = [
            'artist' => $artist,
            'song' => $songTitle,
            'current' => null
        ];
    }
}

$_SESSION['current'] = $_SESSION['current'] ?? [];

if(isset($_POST['previous'])) {

    $_SESSION['current']--;
    echo $_SESSION['playlist'][$_SESSION['current']]['song'];

}

if(isset($_POST['next'])) {

    $_SESSION['current']++;
    echo $_SESSION['playlist'][$_SESSION['current']];

}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Music</title>
    <style>
        .error{
            color: red;
            font-weight: 900;
        }
    </style>
</head>
<body>
<form action="" method="post">
    <label for="artist">Artist <span class="error"><?php echo $artistError?></span> </label>
    <input type="text" name="artist" id="artist"><br>

    <label for="song"> Song Title <span class="error"><?php echo $songError?></span> </label>
    <input type="text" name="song" id="song"><br>

    <button type="submit" name="submit">Add to playlist</button><br><br>

    <button type="submit" name="previous">Previous</button>
    <button type="submit" name="next">Next</button><br>


    <strong>Current song:</strong>

    <?php if(isset($_SESSION['playlist']) and !empty($_SESSION['playlist'])) { ?>
        <table>
            <thead>
            <tr>
                <td>Artist</td>
                <td>Song</td>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach($_SESSION['playlist'] as $i => $playlist) {
                echo "
                        <tr>
                            <td>{$playlist['artist']}</td>
                            <td>{$playlist['song']}</td>
                        </tr>
                        ";
            }

            ?>
            </tbody>
        </table>

    <?php } ?>

</form>
</body>
</html>