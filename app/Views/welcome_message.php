
<?php 
    $ps = $products[0];
    $day = date('d');

?>

    <!-- Product Section Start -->
    <section class="product-section pt-0">
        <div class="container-fluid p-0">
            <div class=" container " >

                <div class="content-col">
                    <div class="section-b-space">
                        <div class="row g-md-4 g-3">
                            <div class="col-xxl-8 col-xl-12 col-md-7">
                                <div class="banner-contain hover-effect">
                                    <img src="inc/slider_pic/<?= $day; ?>.jpg" class="bg-img blur-up lazyload"
                                        alt="">
                                    <div class="banner-details p-center-left p-sm-5 p-4">
                                        <div>
                                            <h2 class="text-kaushan fw-normal orange-color">Get Ready To</h2>
                                            <h3 class="mt-2 mb-3 text-white">TAKE ON THE DAY!</h3>
                                            <p class="text-content banner-text text-white opacity-75 d-md-block d-none">
                                                In publishing and graphic design, Lorem ipsum is a placeholder text
                                                commonly used to demonstrate.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <?php foreach ($cats as $cat) { ?>
                        <div class="title d-block">
                            <h2 class="text-theme font-sm"><?= $cat->cat_names; ?></h2>
                            <p>A virtual assistant collects the products from your list</p>
                        </div>

                        <div class="row row-cols-xxl-6 row-cols-lg-5 row-cols-md-4 row-cols-sm-3 row-cols-2 g-sm-4 g-3 section-b-space">

                            <?php foreach ($products as $p) { ?>
                                <div>
                                    <div class="product-box product-white-bg wow fadeIn">
                                        <div class="product-image">
                                            <a href="">
                                                <img src="<?= $p->image_thumb; ?>" class="img-fluid blur-up lazyload" alt="">
                                            </a>
                                            <ul class="product-option">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                </li>

                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                    <a href="">
                                                        <i data-feather="refresh-cw"></i>
                                                    </a>
                                                </li>

                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                    <a href="" class="notifi-wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-detail position-relative">
                                            <a href="">
                                                <h6 class="name">
                                                    <?= $p->product_name; ?>
                                                </h6>
                                            </a>

                                            <h6 class="sold weight text-content fw-normal"><?= $p->product_in_stock; ?></h6>

                                            <h6 class="price theme-color"><?= $p->selling_pricess; ?></h6>

                                            <div class="add-to-cart-btn-2 addtocart_btn">
                                                <div class="cart_qty qty-box-2 qty-box-3">
                                                    <div class="input-group">
                                                        <button type="button" class="qty-left-minus" data-type="minus"
                                                            data-field="">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text"
                                                            name="quantity" value="0">
                                                        <button type="button" class="qty-right-plus" data-type="plus"
                                                            data-field="">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Start -->
    <footer class="footer-sm">
        <div class="container-fluid-xs">
            <div class="sub-footer">
                <div class="reserve">
                    <h6 class="text-content">©2022 Fastkart All rights reserved</h6>
                </div>

                <div class="payment">
                    <img src="inc/assets/images/payment/1.png" class="blur-up lazyload" alt="">
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Tap to top and theme setting button start -->
    <div class="theme-option">

        <div class="back-to-top">
            <a id="back-to-top" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <!-- Tap to top and theme setting button end -->
