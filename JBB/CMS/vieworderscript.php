<?php
include 'cmsnavbar.php'; 
require __DIR__ . '/vendor/autoload.php';
//CREATING STRING TO ACCES AND USE DATA FROM MONGODB
$mongoClient = (new MongoDB\Client);

$db = $mongoClient->JBBMotors;

$collection = $db->Order;
$fid= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

$criteria = [
    '_id' => new MongoDB\BSON\ObjectID($fid)
];

$Result = $db->Order->find($criteria);

foreach($Result as $order){
    echo "ID: " . $order['_id'] . "<br>";
    echo "Cost: £" . $order['amount'] . "<br>";
    echo "Customer's Email: " . $order['customer'] . "<br>";
    echo "<strong>Products Bought</strong> <br><br>";
    foreach($order['products'] as $product){
        echo "&nbsp;&nbsp;&nbsp;&nbsp;ID: " . $product['vehicleID'] . "<br>";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;Make: " . $product['make'] . "<br>";

        echo "<br>";
    }
}

?>