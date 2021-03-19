<!--Header-->
<?php include 'include/header.php' ?>
<!--end Header-->

<div class="container-fluid ml-4 mt-4" style="width: 96%">
  <div class="row">
    <div class="col-sm-6">
      
    <!-- Map Section-->
      <div class="mapouter">
        <div class="gmap_canvas"><iframe width="600" height="600" id="gmap_canvas"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d619.6468459869822!2d-0.24246179198807333!3d51.594125219292174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876108b08ac8657%3A0xc6241b957359e27d!2sMiddlesex%20University!5e0!3m2!1sen!2suk!4v1579659332311!5m2!1sen!2suk"
            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>" frameborder="0"
          scrolling="no" marginheight="0" marginwidth="0"></iframe>Google Maps Generator by <a
            href="https://www.embedgooglemap.net">embedgooglemap.net</a></div>
        <style>
          .mapouter {
            position: relative;
            text-align: right;
            height: 406px;
            width: 578px;
          }

          .gmap_canvas {
            overflow: hidden;
            background: none !important;
            height: 406px;
            width: 578px;
          }
        </style>
      </div>
    </div>
    
    <!-- Map Section Finished-->

     <!-- Contact Form Section-->
    <div class="col-sm-6">
      <h4 style="color: red;">Send Your Query</h4>
      <form>
        <div class="form-group">
          <label>Your Name (required) </label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Your Email (required) </label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Subject </label>
          <input type="text" name="subject" class="form-control">
        </div>
        <div class="form-group">
          <label>Your Message </label>
          <textarea rows="5" name="message" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn" value="Send" style="border:1px solid red ;color: red;">
        </div>
      </form>
    </div>
  </div>
 
     <!-- Contact Form Section Finished-->
</div>

<!--footer-->
<?php include 'include/footer.php' ?>
<!--end footer-->