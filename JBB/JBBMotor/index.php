<!--Header-->
<?php include 'include/header.php'; ?>
<!--end Header-->


<!--Banner Section-->
<div class="container-fluid banner">
    <div class="row">
        <div class="col-sm-9 ml-4">
            <div id="carouselExampleIndicators" style="width: 95%" class="carousel slide carousel-fade box effect2" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/carousel/banner1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="images/carousel/banner2.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/carousel/banner3.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/carousel/banner4.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/carousel/banner5.jpg" alt="Second slide">
                    </div>

                </div>
            </div>

        </div>
        <h3>Popular Search :  </h3>
        <h4 style="color: red"id="RecomendationDiv"></h4>
       

    </div>
</div>
<!--end Banner Section-->

<!--Featured Products-->
<div class="container-fluid featured-outer ml-4">
    <h2><i><strong>Wheels For You</strong></i></h2>
    <div class="owl-carousel owl-theme pt-3">
        <?php include 'customer_tracking.php'?>
    </div>
</div>

</div>
<!--end Featured Products-->

<!--Brands Section-->
<div class="container-fluid mt-5 pt-2 ml-4" style="width: 96%">
    <h2><i><strong>We Deal In</strong></i></h2><br>
    <div class="row" id="our-brand">
        <div class="col-sm-4">
            <a href="sweet.html">
                <img src="images/home/logo1.jpg" style="width: 96%" alt="">
            </a>
        </div>
        <div class="col-sm-4">
            <a href="premium.html">
                <img src="images/home/logo3.jpg" style="width: 96%" class="img-fluid" alt="">
            </a>
        </div>
        <div class="col-sm-4">
            <a href="contact.html">
                <img src="images/home/logo2.jpg" class="img-fluid" style="width: 96%" alt="">
            </a>
        </div>
    </div>
    <div class="row" id="our-brand">
        <div class="col-sm-4">
            <a href="sweet.html">
                <img src="images/home/logo4.jpg" style="width: 96%" alt="">
            </a>
        </div>
        <div class="col-sm-4">
            <a href="premium.html">
                <img src="images/home/logo5.jpg" style="width: 96%" class="img-fluid" alt="">
            </a>
        </div>
        <div class="col-sm-4">
            <a href="contact.html">
                <img src="images/home/logo6.jpg" class="img-fluid" style="width: 96%" alt="">
            </a>
        </div>

    </div>
</div>
<!--end Brands Section-->
<!--Script to get most searched word-->
<script  type='module'>
            "use strict";

            //Import recommender class
            import {Recommender} from './recommender.js';

            //Create recommender object - it loads its state from local storage
            let recommender = new Recommender();
            
            /* Set up button to call search function. We have to do it here 
                because search() is not visible outside the module. */
            document.getElementById("SearchButton").onclick = search;
            
            //Display recommendation
            window.onload = showRecommendation;
            
            //Searches for products in database
            function search(){
                //Extract the search text
                let searchText = document.getElementById("SearchInput").value;
                
                //Add the search keyword to the recommender
                recommender.addKeyword(searchText);
                showRecommendation();
                
                //#FIXME# PERFORM SEARCH FOR PRODUCTS
            }
            
            //Display the recommendation in the document
            function showRecommendation(){
                document.getElementById("RecomendationDiv").innerHTML = recommender.getTopKeyword();
            }
        </script>


<!--footer-->
<?php include 'include/footer.php' ?>
<!--end footer-->