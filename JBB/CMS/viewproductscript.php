<?php

require __DIR__ . '../vendor/autoload.php';
include 'cmsnavbar.php'; 
$mongoClient = (new MongoDB\Client);

$db = $mongoClient->JBBMotors;
//CREATING STRING TO ACCES AND USE DATA FROM MONGODB
$collection = $db->Vehicles;

$fid= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

$criteria = [
    '_id' => new MongoDB\BSON\ObjectID($fid)
];
$Result = $db->Vehicles->find($criteria);

foreach($Result as $vehicle){
    echo "ID: " . $vehicle['_id'] . "<br>";
    echo "Make: " . $vehicle['make'] . "<br>";
    echo "Model: " . $vehicle['model'] . "<br>";
    echo "Stats: " . $vehicle['stats'] . "<br>";
    echo "Price: £" . $vehicle['price'] . "<br>";
    echo "Image Path: " . $vehicle['image'] . "<br>";
    echo "Hyperlink: " . $vehicle['link'] . "<br>";
    echo "Featured: " . $vehicle['featured'] . "<br>";
    echo "<br>";
}

?>