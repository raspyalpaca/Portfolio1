<?php

$db = @mysqli_connect('localhost', 'USERNAME', '000546822', 'DB_NAME')
or die('Error connecting to database');
//or die('Error connecting to database: ' . mysqli_connect_error()); // for debugging