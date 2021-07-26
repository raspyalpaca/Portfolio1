<?php

$pageTitle= "About Us";

//run the header.php file as if it were here
//if (file_exists("includes/header.php")) {
    include "04/header.php";
 //} else {
// echo "Missing file.";
//}
?>

<section>
    <h2 class="noDisplay">About Page</h2>
    <article class="left_article">
        <h3>About Us Content Heading</h3>
        <p>This is the About Us page</p>
     <p>
         <?php
            $newString = concatenate('one', 'two');

            echo $newString;
         ?>
     </p>

    </article>
    <aside class="right_article" src="images/placeholder.jpg" alt="" width="400" height="200" class="placeholder">
    </aside>
</section>


?>
