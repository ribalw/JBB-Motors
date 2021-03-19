<?php

//Include libraries
require __DIR__ . '/../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->JBBMotors;

//Select a collection 
$collection = $db->Staff;

//Extract the data that was sent to the server
$fName= filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
$lName= filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
$phone= filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//Convert to PHP array
$dataArray = [
    "First_Name" => $fName, 
    "Last_Name" => $lName, 
    "Email" => $email,
    "Password" => $password
 ];

//Add the new product to the database

$insertResult = $collection->insertOne($dataArray);

//Echo result back to user
if($insertResult->getInsertedCount()==1){

    echo  $insertResult->getInsertedId();
}
else {
    echo 'Error adding customer';
}






