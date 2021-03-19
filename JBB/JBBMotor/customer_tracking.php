<?php //Include libraries
require __DIR__ . '/../vendor/autoload.php';

// as it currently stands, if a valid email is passed, the code searches for orders containing that email
// if no session variable of that name exists, return an empty string and set all Vehicles to featured: true
//Create instance of MongoDB client
if(isset($_SESSION['loggedInUserEmail']) && !empty($_SESSION['loggedInUserEmail'])) {
    $email = $_SESSION['loggedInUserEmail'];
} else {
    $email = "";
}

$mongoClient = (new MongoDB\Client);

//Select a database 
$db = $mongoClient->JBBMotors;

if ($email == "") {
    $updateRes = $db->Vehicles->updateMany([], ['$set' => ["featured" => true]]);

} else {
    // Create an array to store the makes of cars the logged in customer has bought
    $makesToCheck = [];

    // Find all of the customers that match this criteria
    $cursor1 = $db->Order->find(['customer' => $email]);

    // add all makes of cars they have bought to an array
    foreach ($cursor1 as $order) {
        foreach ($order['products'] as $product) {
            if (in_array($product['make'], $makesToCheck) == false){
                array_push($makesToCheck, $product['make']);
            }  
        }
    }

    // For Vehicle in the database, set featured to false
    $updateRes1 = $db->Vehicles->updateMany([], ['$set' => ['featured' => false]]);

    // Set every car whose make is in the list of makes to 'featured' : true
    foreach ($makesToCheck as $make) { 
        $updateRes2 = $db->Vehicles->updateMany(['make' => $make], ['$set' => ['featured' => true]]);
    }
}


//Find all of the featured vehicles
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
?>
