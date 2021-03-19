<!--Header-->
<?php include 'include/header.php' 

?>



<div class="container-fluid mt-5 ml-4" style="width: 96%" id="myTab">

  <div class="accordion mb-4 " id="accordionExample">
    <div class="card">
      <div class="card-header bg-white" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne" style="text-decoration: none;">
            Returning customer?<span class="text-danger"> Click here to login</span>
          </button>
        </h2>
      </div>

      <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          <form  method="post">
            <div class="form-group">
              <label>Email</label>
              <input type="email" id="lEmail" class="form-control" placeholder="Email address">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" id="lPassword" class="form-control" placeholder="Password">
            </div>
            <div class="float-right">
            <button onclick="login()" style="color: red; "> Sign In</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <ul class="nav nav-tabs" role="tablist">
    <a class="nav-link inactive-tab" id="shipping-tab" data-toggle="tab" href="#shipping">Resgiteration</a>
    </li>
    <li class="nav-item">
      <a class="nav-link inactive-tab" id="payment-tab" data-toggle="tab" href="#payment">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link inactive-tab" id="payment-tab" data-toggle="tab" href="#update">Update Details</a>
    </li>
 
 
  
  <div class="tab-content" id="myTab1">
  <!--Register Section-->
    <div class="tab-pane fade show active" id="shipping" style=" padding:40px ">
      <div class="mt-3 shipping" style="border:1px solid #eee; padding: 25px 40px ">
        <h4>Registeration</h4>
        <hr>
        <form  method="post">
          <div class="form-group">
            <div class="row">
              <div class="col">
                <label>First Name</label>
                <input type="text" class="form-control" id="first_name" placeholder="First name" required>
              </div>
              <div class="col">
                <label>Last name</label>
                <input type="text" class="form-control" id="last_name" placeholder="Last name" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Country</label>
            <input type="text" id="country" class="form-control" value="UK">
          </div>
          <div class="form-group">
            <label>Street Address</label>
            <input type="text" class="form-control" placeholder="Alysbury Close" id="street" required >
          </div>
          <div class="form-group">
            <label>City</label>
            <input type="text" id="city" class="form-control" placeholder="London" required>
          </div>
          <div class="form-group">
            <label>Postcode  </label>
            <input type="text" id="postcode" class="form-control" placeholder="NN7 2AT" required>
          </div>
          <div class="form-group">
            <label>Phone </label>
            <input type="text" id="phone" class="form-control" placeholder="07479654321" required>
          </div>
          <div class="form-group">
            <label>Email </label>
            <input type="email" id="email" class="form-control" placeholder="someone@example.com" required>
          </div>
          <div class="form-group">                                                                      
            <label>Password </label>
            <input type="password" id="password" class="form-control" placeholder="Password" required>
          </div>

        </form>
        <div class="float-left" style="border:1px solid red;">
            <button onclick="register()" style="color: red; "> Register</button>
          </div>
        <div class="float-right" style="border:1px solid red ;color: red; ">
          <a href="#payment" data-toggle="tab" class="btn btn-check" style="color: red; ">Next</a>
        </div>
        <div class="clearfix"></div>
      </div>
      </div>
    
    <!--End Registeration-->

    <!--Profile-->
    <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="profile-tab">
    <div class="reciept mt-3" style="border:1px solid #eee; padding: 25px">
    <div>
      <?php 
  
  //Include libraries
  require __DIR__ . '/../../vendor/autoload.php';
      
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
  
  
  //To get refference id
  $crieteria =[
      "customer" => $cEmail,
  ];
  $crieteria1 =[
    "Email" => $cEmail,
];
  $srch = $db->Order->find($crieteria);
  $srch1 = $db->Customers->find($crieteria1);
  //Echo result back to user
  echo '<div id="past">';
  echo '<h1>Your Details<h1>';
 if(isset($_SESSION['loggedInUserEmail']))   {
    $num =1;
    foreach ($srch1 as $cus){
    
      echo '<h3>'.$cus['First_Name'].' '.$cus['Last_Name'].' </h3>';
      echo '<h3>'.$cus['Email'].' </h3>';
      echo '<h3>'.$cus['Phone'].' </h3>';
      echo '</div>';
    }

    echo '<h1>Your Orders <h1>';
      foreach ($srch as $cust){
      echo '<div>';
      echo '<h3>S.No: '.$num.'<h3>';
      echo '<h3>Item ID: <i>'.$cust['_id'].'</i></h3>';
      echo '<h3>Total Amount : <i>£'.$cust['amount'].'</i></h3>';
      echo '</div>';
      $num++;
      }
 }
  
  
  
      ?>
         
  </div>
        <div class="clearfix"></div>
      </div>
    </div>

    <!--Profile Section-->

     <!--Update Details-->
    <div class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="profile-tab">
    <div class="mt-3 shipping" style="border:1px solid #eee; padding: 25px 40px">
        <h4>Update Details</h4>
        <hr>
        <form action ="updateDetails.php" method="post" >
        <?php
        if(isset($_SESSION['loggedInUserEmail'])) {
          $search_string = $_SESSION['loggedInUserEmail'];
      
        //Create a PHP array with our search criteria
        $findCriteria = [
            'Email' => $search_string 
         ];
        
        //Find all of the customers that match  this criteria
        $cursor = $db->Customers->find($findCriteria);
        foreach ($cursor as $cust){
        echo ' <div class="form-group">';
        echo ' <input type="hidden" class="form-control" name="cId"  value='.$cust['_id'].' >';
        echo ' </div>';
        echo ' <div class="form-group">';
        echo ' <label>First Name</label>';
        echo ' <input type="text" name="fName" class="form-control" value='.$cust['First_Name'].'>';
        echo ' </div>';
        echo ' <div class="form-group">';
        echo ' <label>Last Name</label>';
        echo ' <input type="text" class="form-control" name="lName"  value='.$cust['Last_Name'].' >';
        echo ' </div>';
        echo ' <div class="form-group">';
        echo ' <label>Country</label>';
        echo ' <input type="text" name="country" class="form-control" value='.$cust['Country'].'>';
        echo ' </div>';
        echo ' <div class="form-group">';
        echo ' <label>Street Address</label>';
        echo ' <input type="text" class="form-control"  name="street" id="street" value='.$cust['Street'].' required >';
        echo ' </div>';
        echo ' <div class="form-group">';
        echo ' <label>City</label>';
        echo ' <input type="text" id="city" class="form-control" name="city" value='.$cust['City'].' required>';
        echo '</div>';
        echo '  <div class="form-group">';
        echo '    <label>Phone </label>';
        echo '    <input type="text" id="phone" class="form-control" name="postcode"  value='.$cust['Postcode'].' >';
        echo '  </div>';
        echo '  <div class="form-group">';
        echo '    <label>Phone </label>';
        echo '    <input type="text" id="phone" class="form-control" name="phone"  value='.$cust['Phone'].' >';
        echo '  </div>';
        echo '  <div class="form-group">';
        echo '    <label>Email </label>';
        echo '   <input type="email" id="email" class="form-control" name="email"   value='.$cust['Email'].'>';
        echo '  </div>';
        echo '  <div class="form-group">';
        echo '    <label>New Password </label>';
        echo '   <input type="password" id="password" class="form-control" name="pass"   value='.$cust['Password'].'>';
        echo '  </div>';  
      
        }
      }
        ?>
        
        <div class="float-left" style="border:1px solid red;">
        <input type="submit" style="color: red; " value="Update">
        </form>
          </div>

        <div class="clearfix"></div>
      </div>
      </div>

<!--End Profile-->

<!--End  Checkout-->

<!--AJAX for Update-->
<script>
            function update(){
                //Create request object 
                let request = new XMLHttpRequest();

                //Create event handler that specifies what should happen when server responds
                request.onload = () => {
                    //Check HTTP status code
                    if(request.status === 200){
                        //Get data from server
                        let responseData = request.responseText;
                          if(responseData !="" ){
                        alert("Update succesfull! Your ID is: " + responseData  );
                        }
                        else{
                        alert("CHECK YOUR VALUES ");
                        }
                    }
                    else
                        alert("Error communicating with server: " + request.status);
                };

                //Set up request with HTTP method and URL 
                request.open("POST", "updateDetails.php");
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                
                //Extract registration data
                let cId = document.getElementById("cId").value; 
                let fName = document.getElementById("fName").value;
                let lName = document.getElementById("lName").value;
                let country = document.getElementById("country").value;  
                let street = document.getElementById("street").value;
                let city = document.getElementById("city").value;
                let postcode = document.getElementById("postcode").value;  
                let phone = document.getElementById("num").value;
                let email = document.getElementById("email").value;
                let password = document.getElementById("password").value;  
                
              //Send request
                request.send(
                "first_name=" + fName + "&last_name=" + lName + "&country=" + country +
                "&street=" + street + "&city=" + city + "&postcode=" + postcode +
                "&phone=" + phone + "&email=" + email +  "&password=" + password +  "&cId=" + cId );
            }
</script>


<!--AJAX finishes for Update-->

<!--AJAX for Login-->
<script>

          function login(){
                //Create request object 
                let request = new XMLHttpRequest();

                //Create event handler that specifies what should happen when server responds
                request.onload = () => {
                    //Check HTTP status code
                    if(request.status === 200){
                        //Get data from server
                        let responseData = request.responseText;
                        //Add data to page
                        if(responseData !="" ){
                        alert( responseData );
                        }
                        else{
                        alert("Wrong details, Please Try Again ");
                        }
                    }
                    else
                        alert("Error communicating with server: " + request.status);
                };

                //Set up request with HTTP method and URL 
                request.open("POST", "login_db.php");
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                
                //Extract registration data
         
                let email = document.getElementById("lEmail").value;
                let password = document.getElementById("lPassword").value;  
                
              //Send request
                request.send(
                 "email=" + email +  "&password=" + password );
           }
</script>

<!--AJAX finishes for Login-->



<!--AJAX for Registeration-->
<script>
            function register(){
                //Create request object 
                let request = new XMLHttpRequest();

                //Create event handler that specifies what should happen when server responds
                request.onload = () => {
                    //Check HTTP status code
                    if(request.status === 200){
                        //Get data from server
                        let responseData = request.responseText;
                          if(responseData !="" ){
                        alert("Registeration succesfull! Your ID is: " + responseData  );
                        }
                        else{
                        alert("CHECK YOUR VALUES ");
                        }
                    }
                    else
                        alert("Error communicating with server: " + request.status);
                };

                //Set up request with HTTP method and URL 
                request.open("POST", "register_db.php");
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                
                //Extract registration data
                let fName = document.getElementById("first_name").value;
                let lName = document.getElementById("last_name").value;
                let country = document.getElementById("country").value;  
                let street = document.getElementById("street").value;
                let city = document.getElementById("city").value;
                let postcode = document.getElementById("postcode").value;  
                let phone = document.getElementById("phone").value;
                let email = document.getElementById("email").value;
                let password = document.getElementById("password").value;  
                
              //Send request
                request.send(
                "first_name=" + fName + "&last_name=" + lName + "&country=" + country +
                "&street=" + street + "&city=" + city + "&postcode=" + postcode +
                "&phone=" + phone + "&email=" + email +  "&password=" + password );
            }
</script>

<!--AJAX finsihes for Registeration-->

<!--footer-->
<?php include 'include/footer.php' ?>
<!--end footer-->