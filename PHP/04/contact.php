<?php

$pageTitle = 'Contact Us';

//run the header.php file as if it were here
//if(file_exists("includes/header.php")) {
    include "04/header.php";
//}else{
//  echo "Missing file.";
//}
?>
    <section>
        <h2 class="noDisplay">Contact Us</h2>
        <article class="left_article">
            <h3>How can we help you?</h3>
            <?php
                if(formVal('send')){
                    //get the values from the form
                    $email= formVal('email');
                    $subject = formVal ('subject');
                    $message = formVal ('message');
                }

                // TODO : validate/sanitize form

            //send email
            //set from the address
            //$headers = "From: $email\n";
            //$headers = "CC: $email\n";
            $headers = "From: Your website<website@bitlamp.wctc.edu\n";
            $headers .= "Reply To $email\n";
            //$headers = "From: Donald Trump <trump@maga.com>\n";
            if(mail('eewing1@my.wctc.edu', $subject, $message, $headers)){
                echo '<p>Thank you for your message. We will get back to you soon.</p>'
            }else{
                echo '<p>There was an error sending the message.</p>';
            }
            else{

            }

            ?>
            <form method="post">
                <p>
                    <label for="email">Email</label><br>
                    <input id="email" name="email" type="email">
                </p>
                <p>
                    <label for="subject">Subject</label><br>
                    <input id="subject" name="subject" type="text">
                </p>
                <p>
                    <label for="subject">Message</label><br>
                    <input id="message" name="message">
                </p>
                <p>
                    <label for="subject">Subject</label><br>
                    <input id="subject" name="subject" type="text">
                </p>
            </form>
            <?php
                } //end if form was submitted
            ?>
        </article>
    </section>
