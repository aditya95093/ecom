<?php
require ('top.php');
$cat_id = mysqli_real_escape_string($con, $_GET['id']);
if ($cat_id > 0) {
   $get_product = get_product($con, '', $cat_id);
} else {
   ?>
   <script>
      window.location.href = 'index.php';
   </script>
   <?php
}
?>
<div class="body__overlay"></div>
<div class="offset__wrapper">
   <div class="search__area">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="search__inner">
                  <form action="#" method="get">
                     <input placeholder="Search here... " type="text">
                     <button type="submit"></button>
                  </form>
                  <div class="search__close__btn">
                     <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="ht__bradcaump__area"
   style="background: rgba(0, 0, 0, 0) url(images/bg/category-bg.jpg) no-repeat scroll center center / cover ;">
   <div class="ht__bradcaump__wrap">
      <div class="container">
         <div class="row">
            <?php if (count($get_product) > 0) { ?>
               <div class="col-xs-12">
                  <div class="bradcaump__inner">
                     <nav class="bradcaump-inner">
                        <a class="breadcrumb-item" href="index.php">Home</a>
                        <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                        <span class="breadcrumb-item active">Products</span>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <section class="htc__product__grid bg__white ptb--100">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="htc__product__rightidebar">
                  <div class="htc__grid__top">
                     <div class="htc__select__option">
                        <select class="ht__select">
                           <option>Default softing</option>
                           <option>Sort by popularity</option>
                           <option>Sort by average rating</option>
                           <option>Sort by newness</option>
                        </select>
                     </div>
                  </div>

                  <div class="row">
                     <div class="shop__grid__view__wrap">
                        <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">

                           <?php

                           foreach ($get_product as $list) {
                              ?>

                              <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                 <div class="category">
                                    <div class="ht__cat__thumb">
                                       <a href="product.php?id=<?php echo $list['id'] ?>">
                                          <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>"
                                             alt="product images">
                                       </a>
                                    </div>
                                    <div class="fr__hover__info">
                                       <ul class="product__action">
                                          <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                          <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                          <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                       </ul>
                                    </div>
                                    <div class="fr__product__inner">
                                       <h4><a href="product-details.html"><?php echo $list['name'] ?></a></h4>
                                       <ul class="fr__pro__prize">
                                          <li class="old__prize"><?php echo $list['mrp'] ?></li>
                                          <li><?php echo $list['price'] ?></li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>

                           <?php } ?>


                           <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                              <div class="col-xs-12">
                                 <div class="ht__list__wrap">

                                    <div class="ht__list__product">
                                       <div class="ht__list__thumb">
                                          <a href="product-details.html"><img src="images/product-2/pro-1/1.jpg"
                                                alt="product images"></a>
                                       </div>
                                       <div class="htc__list__details">
                                          <h2><a href="product-details.html">Product Title Here </a></h2>
                                          <ul class="pro__prize">
                                             <li class="old__prize">$82.5</li>
                                             <li>$75.2</li>
                                          </ul>
                                          <ul class="rating">
                                             <li><i class="icon-star icons"></i></li>
                                             <li><i class="icon-star icons"></i></li>
                                             <li><i class="icon-star icons"></i></li>
                                             <li class="old"><i class="icon-star icons"></i></li>
                                             <li class="old"><i class="icon-star icons"></i></li>
                                          </ul>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet,
                                             consec
                                             adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                             aliqul Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                             ut
                                             aliquip ex ea commodo consequat.</p>
                                          <div class="fr__list__btn">
                                             <a class="fr__btn" href="cart.html">Add To Cart</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                  </div>

               </div>

            </div>
         <?php } else {
               echo "Data not found";
            } ?>
      </div>
   </div>
</section>
<?php require ('footer.php'); ?>