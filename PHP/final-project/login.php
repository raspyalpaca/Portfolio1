<?php

require_once("config.php");
require_once("Nav-bar.php");


if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $passwordd = md5($password);

// SQL query to fetch information of registerd users and finds user match.
        $query = mysqli_query($mysqli, "select * from userdetails where Password='$passwordd' AND Username='$username'");
        $rows = mysqli_num_rows($query);
        if ($rows == 1) {
            $_SESSION['login_user'] = $username; // Initializing Session
            header("location: decide.php"); // Redirecting To Other Page
        } else {
            $error = "Username or Password is invalid";
        }
    }
}
?>

<html>
<head>
<style>
        @import url("https://fonts.googleapis.com/css?family=Roboto");
* {
  box-sizing: border-box;
}
.container h2 {
    padding-top: 0;
    margin: 30px 0;
}
.container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

header {
  margin: 30px 0;
  text-align: center;
}
header h2 {
  text-transform: uppercase;
  margin: 0;
}
header p {
  font-size: 1em;
}
header a {
  text-decoration: none;
  border-bottom: 2px dotted #ff8700;
  color: inherit;
}

.signup {
  width: 700px;
  height: 460px;
  position: relative;
  overflow: hidden;
  box-shadow: 10px 10px 60px rgba(0, 0, 0, 0.4);
  display: flex;
  /* justify-content: flex-end; */
  align-items: center;
  border-radius: 5px;
}

.signup:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  /* transform: scaleX(-1); */
  z-index: 0;
  background: url(https://source.unsplash.com/Qmox1MkYDnY/900x500) no-repeat;
}

form {
    width: 50%;
    /* height: 80%; */
    padding: 0 20px 0 50px;
    z-index: 1;
}

form .form-group {
  display: flex;
  flex-direction: column;
  margin: 0 0 20px 0;
  color: #8f949b;
  font-size: 0.9em;
}
form .form-group label {
  /* margin: 0 0 16px 0; */
}
form .form-group span {
  font-size: 0.8em;
  color: #ff3400;
}
form .form-group span#characters {
  font-size: 0.8em;
  color: #8f949b;
}

.form-group input[type=text],
.form-group input[type=password] {
  border: none;
  outline: none;
  background: transparent;
  padding: 0 0 10px 0;
  font-size: 1em;
  border-bottom: 1px dotted #8f949b;
}

.form-group input[type=password] {
  color: #ff3400;
}

form .form-group:last-child {
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  margin: 40px 0 0 0;
}
form .form-group:last-child input[type="submit"] {
  border: none;
  background: linear-gradient(to left, #ff8700, #ffb100);
  padding: 10px 30px;
  border-radius: 20px;
  color: #ffffff;
  font-size: 0.8em;
  font-weight: bold;
  letter-spacing: 1px;
  cursor: pointer;
}
form .form-group:last-child input[type="submit"].active {
  opacity: 0.5;
  cursor: default;
}
form .form-group:last-child a {
  color: #8f949b;
  text-decoration: dotted;
  font-size: 0.8em;
}

.results,
.terms {
  width: 50%;
  height: 80%;
  padding: 20px 50px 20px 20px;
  z-index: 1;
}

.fade-enter-active,
.fade-leave-active {
  transition: all 0.8s;
}

.fade-enter,
.fade-leave-active {
  opacity: 0;
  transform: translateX(-40px);
}
    </style>
</head>
<body>

    <div class="container">
    <h2>Login Form</h2>

    <div id="app" class="signup">
        <form name="login" action="decide.php" method="post">   

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required />
            </div> 

            <div class="form-group"><input type="submit" value="Login"></div>
        </form>
    </div>
</div>
</div>
</body>
</html>




