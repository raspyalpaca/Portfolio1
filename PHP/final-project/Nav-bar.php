<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <!-- <h1 align="center">BARKS AND PURRS</h1> -->
    <style>
        html {
            background: url(images/background.jpg) no-repeat center center fixed;
            background-size: 100% 100%;
        }
        body {
            font-family: Verdana,sans-serif;
            font-size: 15px;
            line-height: 1.5;
            margin: 0;
        }
        /* ul {
            list-style-type: none;
            overflow: hidden;
            background-color: #333;
            font-family: "Arial";
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align:center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #7ab8dc;
        }
        h2{
            color: white;
            text-align: center;
            margin-top: 85px;
        } */
        .clearfix:after {
  visibility: hidden;
  display: block;
  font-size: 0;
  content: " ";
  clear: both;
  height: 0;
}

* {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.innerWrapper {
  max-width: 920px;
  margin: 0 auto;
}

h2,
h4 {
  font-family: "Abril Fatface", serif;
}

h2 {
  font-size: 3rem;
  text-align: center;
  padding-top: 100px;
  margin: 0 0 30px 0;
}

/* NAV SECTION */

.companyName {
  padding: 18px 17px 18px 15%;
  margin: 0;
  float: left;
  color: #fff;
  width: 45%;
  background: rgba(0, 0, 0, 0.7);
  font-family: "Josefin Sans", sans-serif;
  font-weight: 400;
  font-size: 1.8rem;
  text-align: left;
  font-variant: small-caps;
  line-height: 36px;
}

nav {
  padding: 0;
  margin: 0;
  width: 55%;
  float: right;
}

nav ul {
  float: right;
  display: inline-block;
  padding: 0;
  margin: 0;
  width: 100%;
  border-right: 20px solid rgba(0, 0, 0, 0.7);
}

nav ul li {
  float: left;
  margin: 0;
  display: inline;
  width: 25%;
  text-align: center;
  background: rgba(0, 0, 0, 0.7);
}

nav ul li:hover {
  background: none;
  font-style: bold;
  transform: scale(1.2);
}

nav ul li a {
  text-decoration: none;
  padding: 25px 20px;
  color: #fff;
  margin: 0;
  display: inline-block;
  text-transform: uppercase;
  font-family: "Quicksand", sans-serif;
  font-size: 1rem;
}

nav ul li a:focus {
  outline: none;
}

/* HEAD SECTION */

{
  background: url(https://ununsplash.imgix.net/uploads/141319062591093cefc09/ad50c1f0?q=75&fm=jpg&s=a356dd61ff3da2269124bcd12a303b7e);
  background-size: cover;
  background-attachment: fixed;
}

.hero {
  text-align: center;
  text-shadow: 1px 0 2px #595859;
}

.hero h1 {
  font-size: 5.5rem;
  margin: 0;
  padding-top: 200px;
  font-family: "Abril Fatface", serif;
  color: #fff;
}

.hero h3 {
  padding-bottom: 250px;
  font-family: "Quicksand", sans-serif;
  font-style: italic;
  color: #fff;
  font-size: 1.7rem;
  font-weight: 700;
  margin: 0;
}

@media (max-width: 900px) {
  .companyName {
    width: 100%;
    text-align: center;
    padding: 4% 4%;
  }

  .mainNav {
    width: 100%;
  }

  nav ul {
    border: none;
  }

  nav ul li a {
    padding: 25px 2%;
  }
}



    </style>
</head>
<body>
<!-- <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="signup.php">Signup</a></li>
    <li><a href="Login.php">Login</a></li>
    <li style="float:right"><a href="logout.php">Logout</a></li>
</ul> -->
    <div class="navWrapper" id="home">
        <div class=" clearfix">
            <h2 class="companyName">Barks And Purrs</h2>
            <nav class="mainNav clearfix">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="signup.php" class="smoothScroll">Signup</a></li>
                    <li><a href="Login.php" class="smoothScroll">Login</a></li>
                    <li><a href="logout.php" class="smoothScroll">Logout</a></li>
                </ul>
            </nav>
        </div><!-- end .innerWrapper -->
    </div><!-- end of .navWrapper -->
</body>
</html>