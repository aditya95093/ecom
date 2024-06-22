<?php
require ('top.php');
?>

<style>
    .field_error {
        color: red;
        font-size: 15px;
    }
</style>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area"
    style="background: rgba(0, 0, 0, 0) url(images/bg/category-bg.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Login/Register</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Contact Area -->
<section class="htc__contact__area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-form-wrap mt--60">
                    <div class="col-xs-12">
                        <div class="contact-title">
                            <h2 class="title__line--6">Login</h2>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <form id="login-form" action="#" method="post">
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="text" name="email" placeholder="Your Email*" required
                                        style="width:100%">
                                </div>

                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="password" name="password" placeholder="Your Password*" required
                                        style="width:100%">
                                </div>

                            </div>

                            <div class="contact-btn">
                                <button type="submit" class="fv-btn">Login</button>
                            </div>
                        </form>
                        <div class="form-output">
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-md-6">
                <div class="contact-form-wrap mt--60">
                    <div class="col-xs-12">
                        <div class="contact-title">
                            <h2 class="title__line--6">Register</h2>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <form id="register-form" method="post">
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="text" name="name" id="name" placeholder="Your Name*"
                                        style="width:100%">
                                </div>
                                <span class="field_error" id="name_error"></span>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="text" name="email" id="email" placeholder="Your Email*"
                                        style="width:100%">
                                </div>
                                <span class="field_error" id="email_error"></span>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="text" name="mobile" id="mobile" placeholder="Your Mobile*"
                                        style="width:100%">
                                </div>
                                <span class="field_error" id="mobile_error"></span>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="password" name="password" id="password" placeholder="Your Password*"
                                        style="width:100%">
                                </div>
                                <span class="field_error" id="password_error"></span>
                            </div>

                            <div class="contact-btn">
                                <button type="button" class="fv-btn" onclick="user_register()">Register</button>
                            </div>
                        </form>
                        <div class="form-output register_msg">
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function user_register() {
        jQuery('.field_erro').html('');
        var name = jQuery("#name").val();
        var email = jQuery("#email").val();
        var mobile = jQuery("#mobile").val();
        var password = jQuery("#password").val();
        var is_error = '';


        if (name == "") {
            jQuery('#name_error').html('Please enter your name');
            is_error = 'yes';
        } if (email == "") {
            jQuery('#email_error').html('Please enter your email');
            is_error = 'yes';
        } if (mobile == "") {
            jQuery('#mobile_error').html('Please enter your mobile number');
            is_error = 'yes';
        } if (password == "") {
            jQuery('#password_error').html('Please enter your password');
            is_error = 'yes';
        }

        if (is_error == '') {
            jQuery.ajax({
                url: 'register_submit.php',
                type: 'post',
                data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&password=' + password,
                success: function (result) {
                    if (result == 'present') {
                        jQuery('#email_present').html('Email id already exits');
                    }
                    if (result == 'insert') {
                        jQuery('.register_msg p').html('Thank you for registeration');
                    }
                }
            });
        }
    }
</script>



<?php require ('footer.php'); ?>