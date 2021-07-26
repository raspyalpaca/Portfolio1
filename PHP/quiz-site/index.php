
<html>
<head>
    <title>Quiz</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<div class="container">
    <h1>Quiz</h1>
    <p>Please fill the details and answers the all questions-</p>
    <form action="score.php" method="post">
        <div class="form-group">
            <strong>Name*:</strong><br/>
            <input type="text" name="name" value="" required/>
        </div>
        <div class="form-group">
            <strong>Age*:</strong><br/>
            <input type="text" name="age" value="" required/>
        </div>
        <div class="form-group">
            <strong>Phone*:</strong><br/>
            <input type="text" name="phone" value="" required/>
        </div>
        <h3>Question 1 : Who is the first president of the United States? </h3>
        <div class="form-group">
            <ol>
                <li>
                    <input type="radio" name="q1" value="1" /> George Washington
                </li>
                <li>
                    <input type="radio" name="q1" value="2" /> Joe Biden
                </li>
                <li>
                    <input type="radio" name="q1" value="3" /> Theodore Roosevelt
                </li>
            </ol>
        </div>
        <br/>
        <div class="form-group">
            <h3>Question 2 : What is the color of the sky?</h3>
            <ol>
                <li>
                    <input type="radio" name="q2" value="1" />Red
                </li>
                <li>
                    <input type="radio" name="q2" value="2" />Blue
                </li>
                <li>
                    <input type="radio" name="q2" value="3" />Green
                </li>
            </ol>
        </div>
        <br/>
        <div class="form-group">
            <h3>Question 3 : What is the capitol of Wisconsin? </h3>
            <ol>
                <li>
                    <input type="radio" name="q3" value="1" /> Milwaukee
                </li>
                <li>
                    <input type="radio" name="q3" value="2" /> Green Bay
                </li>
                <li>
                    <input type="radio" name="q3" value="3" /> Madison
                </li>
            </ol>
        </div>
        <div class="form-group">
            <input type="submit" value="Submit" name="submit" class="btn btn-primary"/>
        </div>
    </form>
</div>
</body>
</html>
