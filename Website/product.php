<!--Header-->
<?php include 'include/header.php';

 ?>
<!--end Header-->

<!--CART-->
<div class="container-fluid ml-4 mt-4" style="width: 96%">
  <div class="row">
    <div class="col-sm-5">
      
     <!-- Adding Picture Of product-->
      <?php 
     echo '<img src="images/featured/03.jpg" class="img-fluid" style="border:1px solid #D71821;border-radius: 10px">';
           ?>
    </div>
    <div class="col-sm-7">
      <h4>Land Rover Range Rover</h4>
      <h5 class="text-danger"> £29,500</h5>
      <hr>
      <hr style="position: relative;top:-10px">
      <h3>Shipping</h2>
        <select name="weight" id="weight" class="form-control">
          <option value="">Choose an option</option>
          <option value="1" selected>Delivery</option>
          <option value="2" selected>Pick-Up</option>
        </select>
        <p class="text-danger pt-2" id="box_price">£29,500</p>

        <div class="qty-box mt-4">
          <input type='button' value='-' class='qtyminus' field='quantity' />
          <input type='text' name='quantity' id="quantity" value='1' class='qty' min="1" size="1"
            style="text-align: center;" />
          <input type='button' value='+' class='qtyplus' field='quantity' />
        </div>
        <br>
        <a type="button" class="add_to_cart btn" href="checkout.php" style="border:1px solid red ;color: red;">Confirm Order</a>

        <p style="bottom: -20px; float:right;">Category: <span class="text-danger"> Jeep</span></p>
    </div>
  </div>
</div>
<!--CART-->

<!--footer-->
<?php include 'include/footer.php' ?>
<!--end footer-->