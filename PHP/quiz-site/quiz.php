<!-- ?php

$quiz = array(
    "What does HTML stand for?" => array(
        '1' => "Home Tool Markup Language",
        '2' => "Hyperlinks and Text Markup Language",
        '3' => "Hyper Text Markup Language",
        '4' => "Hyper Text Manipulation Language",
    ),
    "Choose the correct HTML tag for the smallest heading:" => array(
        '2' => "&lt;heading&gt;",
        '1' => "&lt;h1&gt;",
        '4' => "&lt;head&gt;",
        '3' => "&lt;h6&gt;",
    ),
);

echo "<form>";
foreach($quiz as $question => $answers) {
    echo $question;
    foreach($answers as $index => $answer) {
        echo "<input type="radio" name="$question" value="$option">$answer<br/>";
    }
}

?-->

