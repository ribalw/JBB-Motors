<?php 

session_start();
$url="";
$url = basename($_SERVER['REQUEST_URI']);
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>J.B.B Motors</title>
    <meta charset="utf-8">
    <!--LINKS-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <link rel="icon" type="image/png" href="images/LOGO.png">

    <!--LINKS-->
</head>

<body>



    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light" id="logo">
        <a class="navbar-brand ml-4" href="index.php">
            <img src="images/LOGO.png" class=" d-inline-block align-top" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ml-3">
                <li class="nav-item pl-4">
                    <a class="nav-link <?php if($url == 'index.php'){echo 'active';}?> " href="index.php">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item pl-3">
                    <a class="nav-link <?php if($url == 'about.php'){echo 'active';}?> " href="about.php">About Us</a>
                </li>

                <li class="nav-item pl-3">
                    <a class="nav-link <?php if($url == 'contact.php'){echo 'active';}?> " href="contact.php">Contact Us
                        <i class="fa fa-user-o  fa-fw"></i>
                    </a>
                </li>

                <li class="nav-item pl-3">

                    <a class="nav-link <?php if($url == 'checkout.php'){echo 'active';}?> " href="checkout.php">My
                        Account
                        <i class="fa fa-user-o  fa-fw"></i>
                    </a>
                </li>

                <li class="nav-item pl-3">
                    <div class="float-right">
                        <a class="nav-link   <?php if($url == 'cart.php'){echo 'active';}?> " id="cart"
                            data-toggle="popover" href="product.php">
                            Basket <sup class="badge badge-danger"></sup> </a>
                    </div>

                </li>

                <li class="nav-item pl-6">
                    <div class="input-group" id="nav-search">
                        <input type="text" class="form-control" placeholder="Search Your Dream Car">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-danger">Search</button>
                        </div>
                    </div>
                </li>


            </ul>

        </div>
    </nav>
    <br>

    <!--end navbar-->