<?php

//Include libraries
require __DIR__ . '/../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->JBBMotors;

//Select a collection 
$collection = $db->Customers;

//Extract the data that was sent to the server
$fName= filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
$lName= filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
$country= filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
$street= filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
$city= filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$postcode= filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_STRING);
$phone= filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//Convert to PHP array
$dataArray = [
    "First_Name" => $fName, 
    "Last_Name" => $lName, 
    "Country" => $country,
    "Street" => $street, 
    "City" => $city, 
    "Postcode" => $postcode,
    "Phone" => $phone, 
    "Email" => $email,
    "Password" => $password
 ];

//Add the new product to the database
if($fName != "" && $lName != "" && $country!= ""  && $street != ""  && $city != ""  && $postcode != ""  && $phone != ""  && $email != ""  && $password != ""){
$insertResult = $collection->insertOne($dataArray);

//Echo result back to user
if($insertResult->getInsertedCount()==1){

    echo  $insertResult->getInsertedId();
}
else {
    echo 'Error adding customer';
}
}





