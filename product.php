<?php
require ('top.php');
$product_id = mysqli_real_escape_string($con, $_GET['id']);
if ($product_id > 0) {
    $get_product = get_product($con, '', '', $product_id);
} else {
    ?>
    <script>
        window.location.href = 'index.php';
    </script>

    <?php
}
?>
<style>
    .fr_btn {
    background-color: #4CAF50; 
    color: white; 
    padding: 10px 20px; 
    text-align: center; 
    text-decoration: none; 
    display: inline-block; 
    font-size: 16px; 
    margin: 4px 2px; 
    cursor: pointer; 
    border-radius: 12px; 
    border: none; 
}

.fr_btn:hover {
    background-color: rosybrown;
}

</style>

<div class="ht__bradcaump__area"
    style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <a class="breadcrumb-item"
                                href="categories.php?id=<?php echo $get_product['0']['categories_id'] ?>"><?php echo $get_product['0']['categories'] ?></a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active"><?php echo $get_product['0']['name'] ?></span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="htc__product__details bg__white ptb--100">

    <div class="htc__product__details__top">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="htc__product__details__tab__content">

                        <div class="product__big__images">
                            <div class="portfolio-full-image tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $get_product['0']['image'] ?>"
                                        alt="full-image">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="ht__product__dtl">
                        <h2><?php echo $get_product['0']['name'] ?></h2>
                        <ul class="pro__prize">
                            <li class="old__prize"><?php echo $get_product['0']['mrp'] ?></li>
                            <li><?php echo $get_product['0']['price'] ?></li>
                        </ul>
                        <p class="pro__info"><?php echo $get_product['0']['short_description'] ?></p>
                        <div class="ht__pro__desc">
                            <div class="sin__desc">
                                <p><span>Availability:</span> In Stock</p>
                            </div>
                            <div class="sin__desc align--left">
                                <p><span>Categories:</span></p>
                                <ul class="pro__cat__list">
                                    <li><a href="#"><?php echo $get_product['0']['categories'] ?></a></li>
                                </ul>
                            </div>
                            <a class="fr_btn" href="#">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>

<section class="htc__produc__decription bg__white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <ul class="pro__details__tab" role="tablist">
                    <li role="presentation" class="description active"><a href="#description" role="tab"
                            data-toggle="tab">description</a></li>
                </ul>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="ht__pro__details__content">

                    <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                        <div class="pro__tab__content__inner">
                            <?php echo $get_product['0']['description'] ?>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Description -->

<?php require ('footer.php'); ?>