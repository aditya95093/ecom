<?php
require ('connection.inc.php');
require ('function.inc.php');
require('add_to_cart.inc.php');
$cat_res = mysqli_query($con, "SELECT * FROM categories where status = 1 order by categories asc");
$cat_arr = array();
while ($row = mysqli_fetch_assoc($cat_res)) {
   $cat_arr[] = $row;
}

$obj = new add_to_cart();
$totalProduct = $obj->totalProduct();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>Shopcart - Ecommerce Project </title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
   <link rel="apple-touch-icon" href="apple-touch-icon.png">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="css/core.css">
   <link rel="stylesheet" href="css/shortcode/shortcodes.css">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="css/responsive.css">
   <link rel="stylesheet" href="css/custom.css">
   <script src="js/vendor/modernizr-3.5.0.min.js"></script>
   <script src="js/main.js"></script>
   <style>
      .Dropdown {
         display: none;
         position: absolute;
         background-color: #fff;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
         padding: 10px;
         z-index: 1000;
      }

      .header__account {
         position: relative;
      }

      .icon-user {
         cursor: pointer;
      }
   </style>
   <script>
      document.addEventListener("DOMContentLoaded", function () {
         var userIcon = document.getElementById('user-icon');
         var dropdownMenu = document.getElementById('dropdown-menu');

         userIcon.addEventListener('mouseenter', function () {
            dropdownMenu.style.display = 'block';
         });

         userIcon.addEventListener('mouseleave', function () {
            dropdownMenu.style.display = 'none';
         });

         dropdownMenu.addEventListener('mouseenter', function () {
            dropdownMenu.style.display = 'block';
         });

         dropdownMenu.addEventListener('mouseleave', function () {
            dropdownMenu.style.display = 'none';
         });
      });

   </script>
</head>

<body>
   <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


   <div class="wrapper">

      <header id="htc__header" class="htc__header__area header--one">

         <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
            <div class="container">
               <div class="row">
                  <div class="menumenu__container clearfix">
                     <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                        <div class="logo" style="width: 200px; height: 85px; padding-right: 40px; margin-left: -116px;">
                           <a href="index.php"><img src="images/logo/logo8.png" alt="logo images"
                                 style="width: 53%; height: 100%;"></a>
                        </div>

                     </div>
                     <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                        <nav class="main__menu__nav hidden-xs hidden-sm">
                           <ul class="main__menu">
                              <li class="drop"><a href="index.php">Home</a></li>
                              <li class="drop"><a href="#">Category</a>
                                 <ul class="dropdown mega_item">
                                    <?php
                                    foreach ($cat_arr as $list) {
                                       ?>
                                       <li><a
                                             href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories'] ?></a>
                                       </li>
                                       <?php
                                    }
                                    ?>
                                 </ul>
                              </li>


                              <li><a href="contact.php">contact</a></li>
                           </ul>
                        </nav>

                        <div class="mobile-menu clearfix visible-xs visible-sm">
                           <nav id="mobile_dropdown">
                              <ul>
                                 <li><a href="index.php">Home</a></li>
                                 <li class="drop"><a href="#">Category</a>
                                    <ul class="dropdown mega_item">
                                       <?php
                                       foreach ($cat_arr as $list) {
                                          ?>
                                          <li><a
                                                href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories'] ?></a>
                                          </li>
                                          <?php
                                       }
                                       ?>
                                    </ul>
                                 </li>

                                 <li><a href="contact.php">contact</a></li>
                              </ul>
                           </nav>
                        </div>
                     </div>
                     <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                        <div class="header__right">
                           <!--<div class="header__search search search__open">
                              <a href="#"><i class="icon-magnifier icons"></i></a>
                           </div>-->
                           <div class="header__account">
                              <a href="#" id="user-icon"><i class="icon-user icons"></i></a>
                              <ul class="Dropdown mega__item" id="dropdown-menu">
                                 <?php if (isset($_SESSION['USER_LOGIN'])) {
                                    echo '<li><a href="logout.php">Logout</a></li>';
                                 } else {
                                    echo '<li><a href="login.php">Login/Register</a></li>';
                                 }
                                 ?>
                              </ul>
                           </div>

                           <div class="htc__shopping__cart">
                              <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                              <a href="cart.php"><span class="htc__qua"><?php echo $totalProduct?></span></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="mobile-menu-area"></div>
            </div>
         </div>

      </header>
   </div>
</body>