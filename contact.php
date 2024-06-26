<?php
require ('top.php');
?>

<div class="ht__bradcaump__area"
   style="background: rgba(0, 0, 0, 0) url(images/bg/category-bg.jpg) no-repeat scroll center center / cover ;">
   <div class="ht__bradcaump__wrap">
      <div class="container">
         <div class="row">
            <div class="col-xs-12">
               <div class="bradcaump__inner">
                  <nav class="bradcaump-inner">
                     <a class="breadcrumb-item" href="index.php">Home</a>
                     <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                     <span class="breadcrumb-item active">Contact Us</span>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<section class="htc__contact__area ptb--100 bg__white">
   <div class="container">
      <div class="row">
         <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
            <div class="map-contacts--2">
               <div id="googleMap"></div>
            </div>
         </div>
         <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
            <h2 class="title__line--6">CONTACT US</h2>
            <div class="address">
               <div class="address__icon">
                  <i class="icon-location-pin icons"></i>
               </div>
               <div class="address__details">
                  <h2 class="ct__title">our address</h2>
                  <p>666 5th Ave New York, NY, United </p>
               </div>
            </div>
            <div class="address">
               <div class="address__icon">
                  <i class="icon-envelope icons"></i>
               </div>
               <div class="address__details">
                  <h2 class="ct__title">openning hour</h2>
                  <p>666 5th Ave New York, NY, United </p>
               </div>
            </div>

            <div class="address">
               <div class="address__icon">
                  <i class="icon-phone icons"></i>
               </div>
               <div class="address__details">
                  <h2 class="ct__title">Phone Number</h2>
                  <p>123-6586-587456</p>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="contact-form-wrap mt--60">
            <div class="col-xs-12">
               <div class="contact-title">
                  <h2 class="title__line--6">SEND A MAIL</h2>
               </div>
            </div>
            <div class="col-xs-12">
               <form id="contact-form" action="#" method="post">
                  <div class="single-contact-form">
                     <div class="contact-box name">
                        <input type="text" id="name" name="name" placeholder="Your Name*">
                        <input type="email" id="email" name="email" placeholder="Email*">
                        <input type="text" id="mobile" name="mobile" placeholder="Mobile*">
                     </div>
                  </div>

                  <div class="single-contact-form">
                     <div class="contact-box message">
                        <textarea name="message" id="message" placeholder="Your Message"></textarea>
                     </div>
                  </div>
                  <div class="contact-btn">
                     <button type="button" onclick="send_message()" class="fv-btn">Send MESSAGE</button>
                  </div>
               </form>
               <div class="form-output">
                  <p class="form-messege"></p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
   function send_message() {
      var name = jQuery("#name").val();
      var email = jQuery("#email").val();
      var mobile = jQuery("#mobile").val();
      var message = jQuery("#message").val();

      var is_error = '';

      if (name == "") {
         alert('Please enter name');
      } else if (email == "") {
         alert('Please enter email');
      } else if (mobile == "") {
         alert('Please enter mobile');
      } else if (message == "") {
         alert('Please enter message');
      } else {
         jQuery.ajax({
            url: 'send_message.php',
            type: 'post',
            data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&message=' + message,
            success: function (result) {
               alert(result);
               jQuery("#name").val('');
               jQuery("#email").val('');
               jQuery("#mobile").val('');
               jQuery("#message").val('');
            }
         });
      }
   }
</script>



<?php require ('footer.php'); ?>