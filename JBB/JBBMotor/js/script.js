$(document).ready(function() {

   $('#cart-popover').popover({
        html : true,
        container: 'body',
        placement : 'top',
        content:function(){
         return $('#popover_content_wrapper').html();
        }
});

   //load cart
   load_cart();
   function load_cart(){
    $.ajax({
         url : "fetch_cart.php",
         method : "POST",
         dataType: "json",
         success : function(data){
            
                $("#cart_details").html(data.cart_details);
              $(".badge").text(data.total_item);
         }
    });
   } 

   //Add to cart
   $(document).on("click",".add_to_cart",function(){
       var product_id = $(this).attr('id');
       var product_name = $('#name'+product_id+'').val();
       var product_price = $('#price'+product_id+'').val();
       var product_quantity = $('#quantity'+product_id+'').val();
       var product_image   = $('#image'+product_id+'').attr('src');
       var product_type = $('#cat'+product_id+'').val();
       var product_weight = $('#hidden_weight').val();
       var action = "add";
       if(product_quantity > 0)
       {
              $.ajax({
              url:"action.php",
              method:"POST",
              data: {product_id:product_id, product_name:product_name, product_price:product_price,
                      product_quantity:product_quantity ,product_image:product_image ,product_type:product_type , action:action,
                      product_weight:product_weight  },
              success: function()
              {
                  load_cart();
              
                //You Have Added"+ product_name +" To Your Shopping Cart! 
              }
           });
       }
       else
       {
   
       }
   });

   $(document).on("click",".update_cart",function(){
 
       
   });

   $(document).on('click','.delete',function(){
        var product_id = $(this).attr('id');
        var action = "remove";
        $.ajax({
           url:"action.php",
           method:"POST",
           data:{product_id:product_id , action:action},
           success:function()
           {
               load_cart();
               location.reload(true);
           }
      });
    });

     $(document).on('click','#clear_cart',function(){
      
        var action = "clear";
        $.ajax({
           url:"action.php",
           method:"POST",
           data:{action:action},
           success:function()
           {
               load_cart_data();
               $("#cart-popover").popover('hide');
           }
      });
    });

    //Weight
    $("#weight").change(function(){
        var weight = $(this).val();
        $("#hidden_weight").val(weight);
        var price = $(".price").val();
        if(weight == '1')
        {
            $(".pro_price").val(price);
            $("#box_price").text("Rs "+ Math.round(price)+".00");
        }
        if(weight == '')
        {
          $("#box_price").text("");  
          $(".pro_price").val(""); 
        }
    }); 

  //featured products 
  var owl = $('.owl-carousel');
  owl.owlCarousel({
    items:4,
    autoplay:true,
    autoplayTimeout:4000,
    smartSpeed:2000,
    margin: 20,
    nav: false,
    loop: true,
    dots: false,
  });
 
  //plus minus quantity button
  $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
  })
