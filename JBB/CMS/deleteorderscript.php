<?php

require __DIR__ . '/vendor/autoload.php';
include 'cmsnavbar.php'; 
//CREATING STRING TO ACCES AND USE DATA FROM MONGODB
$mongoClient = (new MongoDB\Client);

$db = $mongoClient->JBBMotors;

$fid= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

$deleteCriteria = [
    '_id' => new MongoDB\BSON\ObjectID($fid)
];

$Result = $db->Order->deleteOne($deleteCriteria);

if ($Result->getDeletedCount()==1){
    echo 'Order deleted.';

} else {
    echo 'Error deleting order';
}

?>