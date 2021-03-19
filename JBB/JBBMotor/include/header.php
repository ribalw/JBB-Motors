<?php 

session_start();
$url="";
$url = basename($_SERVER['REQUEST_URI']);
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>JBB Motors</title>
    <meta charset="utf-8">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <link rel="icon" type="image/png" href="images/LOGO.png">
    <script type="text/javascript" src="basket.js"></script>

    

    <!--CSS-->
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

                <a class="nav-link <?php if($url == 'products.php'){echo 'active';}?> " href="product.php">Products
                    <i class="fa fa-user-o  fa-fw"></i>
                </a>
                </li>

                <li class="nav-item pl-3">

                    <a class="nav-link <?php if($url == 'checkout.php'){echo 'active';}?> " href="account.php">My
                        Account
                        <i class="fa fa-user-o  fa-fw"></i>
                    </a>
                </li>

                <li class="nav-item pl-3">
                    <div class="float-right">
                        <a class="nav-link   <?php if($url == 'fetch_cart.php'){echo 'active';}?> " id="cart"
                            data-toggle="popover" href="fetch_cart.php">
                            Basket <sup class="badge badge-danger"></sup> </a>
                    </div>

                </li>
                <li class="nav-item pl-3">
                <button onclick="logout()" style="color: red; "> Logout</button>
                </li>
           

                <li class="nav-item pl-6">
                    <form action="product.php" method="get">
                        <div class="input-group" id="nav-search">
                            <input type="text" name="name" id ="SearchInput"placeholder="Search Your Dream Car">
                            <input type="submit" id ="SearchButton" value="Search">
                        
                        </div>
                    </form>
                </li>
        <!--AJAX for Logout-->
<script>

function logout(){
                   let request = new XMLHttpRequest();
                //Create event handler that specifies what should happen when server responds
                request.onload = () => {
                    //Check HTTP status code
                    if(request.status === 200){
                        //Get data from server
                        sessionStorage.clear();
                        let responseData = request.responseText;
                        //Add data to page
                        if(responseData !="" ){
                        alert( responseData );
                        }
                        else{
                        alert("Wrong details, Please Try Again ");
                        }
                    }
                    else
                        alert("Error communicating with server: " + request.status);
                };
                //Set up and send request
                request.open("GET", "logout.php");
                request.send();
            }     
            
</script>

<script  type='module'>
            "use strict";

            //Import recommender class
            import {Recommender} from './recommender.js';

            //Create recommender object - it loads its state from local storage
            let recommender = new Recommender();
            
            /* Set up button to call search function. We have to do it here 
                because search() is not visible outside the module. */
            document.getElementById("SearchButton").onclick = search;
            
           
            
            //Searches for products in database
            function search(){
                //Extract the search text
                let searchText = document.getElementById("SearchInput").value;
                
                //Add the search keyword to the recommender
                recommender.addKeyword(searchText);
                showRecommendation();
                
                //#FIXME# PERFORM SEARCH FOR PRODUCTS
            }
            
       
        </script>
   </ul>

        </div>
    </nav>
    <br>

    <!--end navbar-->