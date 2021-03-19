<!--Header-->
<?php include 'include/header.php' 

?>


<!--Checkout-->
<div class="container-fluid mt-5 ml-4" style="width: 96%" id="myTab">
 <!--Login Section-->
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
          <form method="post">
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="Email address">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="float-right">
              <input type="submit" name="login" class="btn btn-check" value="Login">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--Login Section Finished-->

  <!--Menu Bar-->
  <ul class="nav nav-tabs" role="tablist">
    <a class="nav-link inactive-tab" id="shipping-tab" data-toggle="tab" href="#shipping">Shipping Address </a>
    </li>
    <li class="nav-item">
      <a class="nav-link inactive-tab" id="payment-tab" data-toggle="tab" href="#payment">Review & Payment</a>
    </li>
  </ul>
<!--Menu Bar Finished-->

<!--Register/Shipping Section-->
  <div class="tab-content" id="myTab1">
    <div class="tab-pane fade show active" id="shipping">
      <div class="mt-3 shipping" style="border:1px solid #eee; padding: 25px 40px">
        <h4>Shipping Details</h4>
        <hr>
        <form method="POST">
          <div class="form-group">
            <div class="row">
              <div class="col">
                <label>First name</label>
                <input type="text" class="form-control" name="first_name" placeholder="First name" required>
              </div>
              <div class="col">
                <label>Last name</label>
                <input type="text" class="form-control" name="last_name" placeholder="Last name" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Country</label>
            <input type="text" name="country" class="form-control" value="UK">
          </div>
          <div class="form-group">
            <label>Street Address</label>
            <input type="text" class="form-control" placeholder="Alysbury Close" required name="address">
          </div>
          <div class="form-group">
            <label>City</label>
            <input type="text" name="city" class="form-control" placeholder="London" required>
          </div>

          <div class="form-group">
            <label>Postcode / ZIP </label>
            <input type="text" name="zip" class="form-control" placeholder="NN7 2AT" required>
          </div>
          <div class="form-group">
            <label>Phone </label>
            <input type="text" name="phone" class="form-control" placeholder="07479654321" required>
          </div>
          <div class="form-group">
            <label>Email </label>
            <input type="email" name="email" class="form-control" placeholder="someone@example.com" required>
          </div>
          <div class="form-group">
            <label>Password </label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>

          <div class="float-left" style="border:1px solid red;">
            <input type="submit" name="submit" value="Save" class="btn btn-check" style="color: red; ">
          </div>
        </form>
        <div class="float-right" style="border:1px solid red ;color: red; ">
          <a href="#payment" data-toggle="tab" class="btn btn-check" style="color: red; ">Next</a>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <!--Register/Shipping Section Finished-->

    <!-- Review Payment Section-->
    <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="profile-tab">

      <div class="reciept mt-3" style="border:1px solid #eee; padding: 25px">
        <table class="mb-5 pb-2">
          <thead>
            <th>Product</th>
            <th>Total</th>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <tr>
              <th style="text-align: right;padding-right: 200px">Subtotal</th>
              <td style="text-align: right;">£ 29,500</td>
            </tr>
            <tr>
              <th style="text-align: right;padding-right: 200px">Shipping</th>
              <td style="text-align: right;">£ 1500</td>
            </tr>
            <tr>
              <th style="text-align: right;padding-right: 200px">Total</th>
              <td style="text-align: right;">£ 31,000</td>
            </tr>
          </tfoot>
        </table>
        <div class="float-left pt-4">
          <input type="checkbox" name="check" checked> Credit Card/ Debit Card
        </div>
        <div class="float-right">
          <img src="images/migs_logo (1).jpg">
          <img src="images/paypal.png">
          <img src="images/visa.png">
        </div>
        <div class="clearfix"></div>
        <div class="float-right mt-5" style="border:1px solid red;">
          <a href="place_order.php" class="btn btn-check" style="color:red;">Place Order</a>
        </div>
        <div class="clearfix"></div>
      </div>

    <!-- Review Payment Section Fnished-->

    </div>
  </div>
</div>
<!--Checkout-->

<!--footer-->
<?php include 'include/footer.php' ?>
<!--end footer-->