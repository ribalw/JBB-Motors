<!--Header-->
<?php include 'include/header.php';

//Include libraries
require __DIR__ . '/../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->JBBMotors;

//Extract the data that was sent to the server<script  type='module'>

 
$name= filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
if($name == ""){
    $name =$name;
}
//Create a PHP array with our search criteria
$findCriteria = [
    "make" => $name,
 ];

 $findCriteria1= [
    "model" => $name,
 ];


//Find all of the customers that match  these criterias 

$cursor1 = $db->Vehicles->find($findCriteria1);// criteria 2

$cursor2 = $db->Vehicles->find(); //for all vehicles

//Sorting Back End

$sort= filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);

if ($sort ==='A-Z') {

    $options = [
        'sort' => ["make" => 1]
    ];
    $cursor2 = $db->Vehicles->find([],$options);
    
} 
if ($sort === 'Z-A') {
 
    $options = [
        'sort' => ["make" => -1]
    ];
    $cursor2 = $db->Vehicles->find([],$options);
    
}

if ($sort === 'LowToHigh') {
    
    $options = [
        'sort' => ["price" => 1]
    ];
    $cursor2 = $db->Vehicles->find([],$options);
}
if ($sort === 'HighToLow') {
  
    $options = [
        'sort' => ["price" => -1]
    ];
    $cursor2 = $db->Vehicles->find([],$options);
}
if ($cursor1 === 'All') {
    $Vehicles = $db->Vehicles->find([]);
}


//Find all of the customers that match  this criteria  
 
$cursor = $db->Vehicles->find($findCriteria);
if(!$cursor1){
    $prod = $cursor1;

}
else{
    $prod = $cursor;
}
//Output the results
$check=0;
foreach ($cursor as $cust){
$check =1;

//<!--end Header-->
?>  
<div class="container-fluid ml-4 mt-4" style="width: 96%">
<div class="row"> 
<?php
//<!--CART-->
//Products For Search
echo '';
echo '';
echo '<div class="col-sm-5">';
echo '<img src="'. $cust['image']; echo'" class="img-fluid" style="border:1px solid #D71821;border-radius: 10px">';          
echo '</div>';
echo '<div class="col-sm-7">';
echo '<h3> Make : '. $cust['make']; echo "</h3>";// Getting company name from DB
echo '<h5 class="text-danger"> Model : '. $cust['model']; echo'</h5> ';
echo '<h5> Specification : '. $cust['stats']; echo'</h5> ';
echo '<hr>';
echo '<hr style="position: relative;top:-10px">';
echo '<h3>Shipping</h3>';
echo '<select name="weight" id="weight" class="form-control">';
echo '<option value="">Choose an option</option>';
echo '<option value="1" selected>Delivery</option>';
echo '<option value="2" selected>Pick-Up</option>';
echo '</select>';
echo '<p class="text-danger pt-2" id="box_price">£'. $cust['price']; echo'</p>';
echo '<br>';
echo '<button  class="add_to_cart btn" onclick=\'addToBasket("' . $cust["_id"] . '", "' . $cust["make"] . '", "' . $cust["model"] . '", "' . $cust["price"] . '")\'  style="border:1px solid red ;color: red;">Add to  cart</button>';
echo '<p style="float:right;bottom: -20px">Garage: <span class="text-danger"> '. $cust['stock']; echo'</span></p>';
echo '</div>';
echo '</div>';
echo '</div>';
}

if($check !=1){
?>
<div class="container-fluid ml-4 mt-4" style="width: 96%">
<div class="row">
    <!--Sorting Front End-->
    <div id ="sortForm">

                    <div class="dropdown">
                    <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" style="width:200px"><h3>Sort By</h3>
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">        

                    <li> 
                    <form action="product.php" method="get" >
                        <input type="hidden" name="sort" value="A-Z" />
                        <input class="button"  type="submit" value ="Alphabetic A-Z"/>
                        </form>
                    </li>
                    <li> 
                    <form action="product.php" method="get" >
                        <input type="hidden" name="sort" value="Z-A" />
                        <input class="button"  type="submit" value ="Alphabetic Z-A"/>
                        </form>
                    </li>
                    <li> 
                    <form action="product.php" method="get" >
                        <input type="hidden" name="sort" value="HighToLow" />
                        <input class="button"  type="submit" value ="High To Low"/>
                        </form>
                    </li>
                    <li> 
                    <form action="product.php" method="get" >
                        <input type="hidden" name="sort" value="LowToHigh" />
                        <input class="button"  type="submit" value ="Low To High"/>
                        </form>
                    </li>
                
                    </ul>
                    </div>
                   
        </div>
        <!--Sorting Front End Finished-->
<?php
//Products For Sorting
foreach ($cursor2 as $cust){
 

   //<!--end Header-->
    
    //<!--CART-->
    echo '<div class="container-fluid ml-4 mt-4" style="width: 96%">';
    echo '<div class="row">';
    echo '<div class="col-sm-5">';
    echo '<img src="'. $cust['image']; echo'" class="img-fluid" style="border:1px solid #D71821;border-radius: 10px">';          
    echo '</div>';
    echo '<div class="col-sm-7">';
    echo '<h3> Make : '. $cust['make']; echo "</h3>";// Getting company name from DB
    echo '<h5 class="text-danger"> Model : '. $cust['model']; echo'</h5> ';
    echo '<h5> Specification : '. $cust['stats']; echo'</h5> ';
    echo '<hr>';
    echo '<hr style="position: relative;top:-10px">';
    echo '<h3>Shipping</h3>';
    echo '<select name="weight" id="weight" class="form-control">';
    echo '<option value="">Choose an option</option>';
    echo '<option value="1" selected>Delivery</option>';
    echo '<option value="2" selected>Pick-Up</option>';
    echo '</select>';
    echo '<p class="text-danger pt-2" id="box_price">£'. $cust['price']; echo'</p>';
    echo '<br>';
    echo '<button  class="add_to_cart btn" onclick=\'addToBasket("' . $cust["_id"] . '", "' . $cust["make"] . '", "' . $cust["model"] . '", "' . $cust["price"] . '")\'  style="border:1px solid red ;color: red;">Add to  cart</button>';
    echo '<p style="float:right;bottom: -20px">Garage: <span class="text-danger"> '. $cust['stock']; echo'</span></p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    }
}
//'<!-CART-->';

//<!--footer-->
 include 'include/footer.php' ?>
<!--end footer-->