<!--?php
    SELECT orders;
    FROM orders;
    INNER JOIN ON orders.OrderID= orderdetails.DetailOrderID;
    WHERE orderdetails.DetailOrderID = WADAOrderID AND orders.OrdersUserID= paramUserID;
?-->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Order</title>
</head>
<body>

<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><img src="images/CLASSIC%20MODEL.png" alt="Classic Models logo" height="70" width="70"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
            </li>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="order.php">Order History</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">Order History</li>
    </ol>
</nav>

<!--Grid column-->
<div class="col-md-9 mb-md-0 mb-5">
    <form id="contact-form" name="contact-form" action="contact.php" method="POST">

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-6">
                <div class="md-form mb-0">
                    <label for="name" class="">Your name</label>
                    <input type="text" id="name" name="name" class="form-control">

                </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-6">
                <div class="md-form mb-0">
                    <label for="email" class="">Your address</label>
                    <input type="text" id="email" name="email" class="form-control">
                </div>
            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

        <!--Grid row-->
        <div class="row">
            <div class="col-md-12">
                <div class="md-form mb-0">
                    <label for="subject" class="">Phone Number</label><br>
                    <input type="text" id="subject" name="subject" class="form-control">

                </div>
            </div>
        </div>
        <!--Grid row-->

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-12">

                <div class="md-form">
                    <div class="dropdown">
                        <button class="dropbtn">Product Options</button>
                        <div class="dropdown-content">
                            <a href="products.php">CMC Alfa Romeo P3 Caracciola</a>
                            <a href="products.php">CMC Alfa Romeo P3 Fagioli</a>
                            <a href="products.php">CMC Alfa Romeo P3 Caracciola </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--Grid row-->

    </form>


    <div class="status"></div>
</div>

<input type="checkbox" id="newsletter" />Send me monthly newsletters<br><br>
<!--Grid column-->

<!--Grid column>
<div class="col-md-3 text-center">
    <ul class="list-unstyled mb-0">
        <li><i class="fas fa-map-marker-alt fa-2x"></i>
            <p>San Francisco, CA 94126, USA</p>
        </li>

        <li><i class="fas fa-phone mt-4 fa-2x"></i>
            <p>+ 01 234 567 89</p>
        </li>

        <li><i class="fas fa-envelope mt-4 fa-2x"></i>
            <p>contact@mdbootstrap.com</p>
        </li>
    </ul-->
<div class="text-center text-md-left">
    <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
</div>


<h5>Previous Orders</h5>

</div>
<!--Grid column-->
</section>
</div>


</body>
