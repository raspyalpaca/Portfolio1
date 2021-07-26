<a href="index.php">Reload</a>
<?php
//change error reporting (to which extent errors are output)
//can only change runtime errors
//error_reporting(0); hide all errors
error_reporting(E_ALL);

//allows you to log errors but not display them on the page
// ini_set('display_errors', '0');

//suppress any runtime error
$db = @mysqli_connect('localhost', 'root', 'password', 'employee');
if($db){
    //if it worked
}else{
    //handle the error
    echo "Unable to connect to database";

    //handle errors in production
    error_log("unable to connect to database in " . __FILE__ . ":" . __LINE__);

}


//SYNTAX ERROR (is always fatal- also means it never ran out of any of your code)
// highlighted in PHPStorm
// $name= "Emma" //missing semi-colon
 $age= 12;

if(age > 18){

    //unexpected end of file means missing closing brace
    if(age > 21){

    } //end if age > 21
} //end if age > 18

//RUNTIME ERRORS (errors output on page while it is running)
// Notice: Usually Undefined, misspelled, or missing
if(isset($name)){
    echo $name; //needs to be declared, check for different name somewhere else
}

//Warning: You are using a function or syntax improperly
// miscalled function, function that failed, or improper arguments
echo $cat * $dog = "woof";
echo $cat = $dog;
sort($cat);
sort();


//Fatal: stores PHP code from running
//missing required file, ran out of memory, or exceeded time limit
// require "missing_file.php";

// LOGIC ERRORS
// hardest to debug because no error is output on the page
//echo "a. $gender";
echo "<!-- gender = $gender on line" . __FILE__ . ":" . __LINE__ . "-->";
if($gender = "male"){
    // echo "b. $gender";
    echo "<p>It's a boy!</p>";
}else {
    //echo "c. $gender";
     "<!-- gender = $gender on line" . __FILE__ . ":" . __LINE__ . "-->";
    echo "<p>It's a girl!</p>";
}

//another logic error
set_time_limit(1);
for ($1= 0; $1 <= 0; $i++){
    //if($1 = 0){
    //do something for first iteration
    //}
echo "$1<br>\n";

//die stop the code
// die();

//exit loop
//break;

echo "i after the loop:" . $i;
