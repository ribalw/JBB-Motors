<?php
    //Start session management
    session_start();
    require __DIR__ . '/../vendor/autoload.php';
    //Get name and address strings - need to filter input to reduce chances of SQL injection etc.
    $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);    

    //Connect to MongoDB and select database
    $mongoClient = (new MongoDB\Client);
    $db = $mongoClient->JBBMotors;

    //Create a PHP array with our search criteria
    $findCriteria = [
        "Email" => $email, 
     ];

    //Find all of the customers that match  this criteria
    $cursor = $db->Customers->find($findCriteria);

    //Check that there is exactly one customer
    if($cursor== null){
        echo 'Email not recognized.';
        return;
    }
   
    //Get customer
   foreach( $cursor as $customer){
    
    //Check password
    if($customer['Password'] != $password){
        echo 'Password incorrect.';
        return;
    }

    //Start session for this user
    $_SESSION['loggedInUserEmail'] = $email;
    $_SESSION['loggedInUser'] = $customer['First_Name'];
    
    //Inform web page that login is successful
    echo 'You are Logged In as '. $_SESSION['loggedInUser'];  
 
}
    //Close the connection
   //$mongoClient->close();
