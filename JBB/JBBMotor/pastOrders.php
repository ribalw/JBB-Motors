<?php 
  
  //Include libraries
  require __DIR__ . '/../vendor/autoload.php';
      
  //Create instance of MongoDB client
  $mongoClient = (new MongoDB\Client);
  
  //Select a database
  $db = $mongoClient->JBBMotors;
  
  ?>
  <script>
  //Get basket from session storage or create one if it does not exist
  function getBasket(){
      let basket;
      if(sessionStorage.basket === undefined || sessionStorage.basket === ""){
          basket = [];
      }
      else {
          basket = JSON.parse(sessionStorage.basket);
      }
      return basket;
  }
  
  //Displays basket in page.
  </script>
  <?php
  
  $cEmail="";
  //customer email
  if(isset($_SESSION['loggedInUserEmail'])) {
      $cEmail = $_SESSION['loggedInUserEmail'];
  }
  
  
  
  $collection = $db->Order;
  //Convert to PHP array
  $prodArray = [
     
   ];
  
  //Add the new product to the database  
  if(isset($_SESSION['loggedInUserEmail'])) {
      $insertResult = $collection->insertOne($prodArray);
      
  } else {
      die('<h3>You are not logged  in. Please login  & try again</h3>');
  }
  //To get refference id
  $crieteria =[
      "customer" => $cEmail,
  ];
  $crieteria1 =[
    "Email" => $cEmail,
];
  $srch = $db->Order->find($crieteria);
  $srch1 = $db->Order->find($crieteria);
  //Echo result back to user
//  if(isset($_SESSION['loggedInUserEmail']))   {
    $num =1;
      foreach ($srch as $cust){
      echo '<h1>Order Number: '.$num.'<h1>';
      echo '<h3>Item ID: <i>'.$cust['_id'].'</i></h3>';
      echo '<h3>Total Amount : <i>£'.$cust['amount'].'</i></h3>';
      $num++;
      }
 //   }
  
  
  
      ?>