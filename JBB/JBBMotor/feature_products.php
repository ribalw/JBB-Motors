<?php //Include libraries
require __DIR__ . '/../vendor/autoload.php'; 

//Create instance of MongoDB client
$mongoClient=(new MongoDB\Client); 

//Select a database 
$db=$mongoClient->JBBMotors;

//Find all of the customers that match this criteria
$cursor = $db->Vehicles->find(['featured' => true]);

//Output the results
foreach ($cursor as $car) {
    echo '  <form id = "myForm" action="product.php" method="get">';
    echo "<div class='item text-center'>";
    echo "<a href='" . $car['link'] . "' name ='name'> <img src='" . $car['image'] . "' class='img-fluid' ' ></a>";
    echo "<span class='text-center'>";  
    echo "<h4>" . $car['make'] . " " . $car['model'] . "</h4>" . $car['stats'];
    echo "</span><br>";
    echo "<span class='text-center text-danger'>" . $car['price'] . "</span>";
    echo "</div>";
    echo "</form>";
}
