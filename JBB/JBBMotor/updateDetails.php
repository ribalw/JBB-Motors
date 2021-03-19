<?php

//Include libraries
require __DIR__ . '/../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->JBBMotors;

//Extract the customer details 
$fName = filter_input(INPUT_POST, 'fName', FILTER_SANITIZE_STRING);
$lName= filter_input(INPUT_POST, 'lName', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$country= filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$street= filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$postcode = filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'cId', FILTER_SANITIZE_STRING);
//Criteria for finding document to replace
$cId= 'ObjectId('.$id.')';
$replaceCriteria = [
    '_id' =>new MongoDB\BSON\ObjectID($id)
];

//Data to replace
$customerData = [
   
    
    "First_Name" => $fName,
    "Last_Name" => $lName,
    "Country" => $country,
    "City" => $city,
    "Street" => $street,
    "Phone" => $phone,
    "Postcode" => $postcode,
    "Email" => $email,
    "Password" => $password
];

//Replace customer data for this ID
$updateRes = $db->Customers->replaceOne($replaceCriteria, $customerData);
    
//Echo result back to user
if($updateRes->getModifiedCount() == 1)
echo "<script>alert('Update Sucessfull')</script>";
echo "<script> location.href='account.php'; </script>";
exit;


