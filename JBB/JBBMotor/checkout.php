<!--Header-->
<?php include 'include/header.php';

//Starting session for logged inn user
  
//Include libraries
require __DIR__ . '/../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->JBBMotors;

//Extract the data that was sent to the server
$name= filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
//Extract the product IDs that were sent to the server
$prodIDs= $_POST['prodIDs'];

//Convert JSON string to PHP array 
$productArray = json_decode($prodIDs, true);

?>
<script>
//Get basket from session storage or create one if it does not exist
function getBasket(){
    let basket;
    if(sessionStorage.basket === undefined || sessionStorage.basket === ""){
        basket = [];
    }
    else {
        basket = JSON.parse(sessionStorage.basket);
    }
    return basket;
}

//Displays basket in page.
</script>
<?php
$checkLog =0;
if(!($checkLog<count($productArray))){
    echo '<h3>No Items Added</h3>';
}
else{
//array with all product's id in it.
for($i=0; $i<count($productArray); $i++){
   $array[]= $productArray[$i]['id'];
   $doc[] = array(
    "vehicleID" => $productArray[$i]['id'],
    "make" => $productArray[$i]['make'],
    "count" => 1,
    
);
}

$cEmail="";
//customer email
if(isset($_SESSION['loggedInUserEmail'])) {
    $cEmail = $_SESSION['loggedInUserEmail'];
}

$collection = $db->Order;
//Convert to PHP array
$prodArray = [
    "customer" => $cEmail, 
    "products" => $doc ,
    "amount" => $productArray[0]['amount'],
 ];

//Add the new product to the database



if(isset($_SESSION['loggedInUserEmail'])) {
    $insertResult = $collection->insertOne($prodArray);
    
} else {
    die('<h3>You are not logged  in. Please login  & try again</h3>');
}
//To get refference id
$crieteria =[
    "customer" => $cEmail,
];
$srch = $db->Order->find($crieteria);
//Echo result back to user
if($insertResult->getInsertedCount()==1){
    echo '<script> sessionStorage.clear()</script>';
    foreach ($srch as $cust){
    echo '<br><h1>Your order is confirmed with Ref# '. $cust['_id'].'</h1>';
    break;
    }
    echo '<h3>Total Items: <i>'.count($productArray).'</i></h3>';
    echo '<h3>Total Amount : <i>£'.$productArray[0]['amount'].'</i></h3>';
    }
  
else {
    echo 'Error adding order';
}}
 
//<!--footer-->
 include 'include/footer.php' ?>
<!--end footer-->
