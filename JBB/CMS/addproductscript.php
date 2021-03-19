<?php

require __DIR__ . '../vendor/autoload.php';

include 'cmsnavbar.php'; 
$mongoClient = (new MongoDB\Client);

$db = $mongoClient->JBBMotors;

$collection = $db->Vehicles;

$make = $_POST["make"];
$model = $_POST["model"];
$stats = $_POST["stats"];
$price = $_POST["price"];
$image = $_POST["image"];
$featured = true;

$newProduct = [
    "make" => $make,
    "model" => $model,
    "stats" => $stats,
    "price" => $price,
    "image" => $image,
    "featured" => $featured,
];

$insertResult = $collection->insertOne($newProduct);

if ($insertResult->getInsertedCount()==1){
    echo 'Product added.';
    echo 'New document id: ' . $insertResult->getInsertedId();

} else {
    echo 'Error adding product';
}

?>