<?php
    $db= @mysqli_connect(
        'localhost',
        'USERNAME',
        'PASSWORD',
        'classic_models'
    )
or die ('Error connecting to the database');
?>
