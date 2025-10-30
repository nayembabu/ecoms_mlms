
<?php

    $session = $session ?? \Config\Services::session();

    // if ($session->get('isLoggedIn')) {
    //     echo " You are logged in as user ID: " . $session->get('userInfoId');
    //     echo " with role: " . $session->get('userRole');
    //     echo " | <a href='logout'>Logout</a>";
    // } else {
    //     echo " | <a href='login'>Login</a>";
    // }

?>


<body>

    <!-- Loader Start -->
    <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- Loader End -->

    <!-- Header Start -->
    <header class="header-compact " >
        <div class="top-nav top-header sticky-header" >
            <div class="container-fluid-lg" >
                <div class="row">
                    <div class="col-12" >
                        <div class="navbar-top">
                            <button class="navbar-toggler d-xl-none d-inline navbar-menu-button me-3" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                                <span class="navbar-toggler-icon">
                                    <i class="fa-solid fa-bars"></i>
                                </span>
                            </button>
                            <a href="" class="web-logo nav-logo">
                                <img src="inc/assets/images/logo/1.png" class="img-fluid blur-up lazyload" alt="">
                            </a>

                            <div class="middle-box ">
                                <div class="header-nav-middle">
                                    <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky ">
                                        <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                            <div class="offcanvas-header navbar-shadow">
                                                <h5>Menu</h5>
                                                <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"></button>
                                            </div>
                                            <div class="offcanvas-body">
                                                <ul class="navbar-nav">
                                                    <li class="nav-item  ">
                                                        <a class="nav-link " href="" >Home</a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a class="nav-link " href="" >Product</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="rightside-box">
                                <ul class="right-side-menu">
                                    <li class="right-side">
                                        <a href="contact-us.html" class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <i data-feather="phone-call"></i>
                                            </div>
                                            <div class="delivery-detail">
                                                <h6>24/7 Delivery</h6>
                                                <h5>+91 888 104 2340</h5>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="right-side">
                                        <?php if ($session->get('isLoggedIn')) { ?>
                                            <div class="onhover-dropdown header-badge ">
                                                <button class="btn btn-sm wallet-pill rounded-pill px-3 py-2 d-flex align-items-center gap-2" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" title="Wallet details">
                                                    <i class="bi bi-wallet2"></i>
                                                    <span class="text-secondary-emphasis">Balance</span>
                                                    <span id="balance-amount" class="fw-bold">৳ <span class="wallet_balance_amount" >12,540.00</span></span>
                                                    </span>
                                                </button>
                                            </div>
                                        <?php } ?>
                                    </li>
                                    <li class="right-side onhover-dropdown">
                                        <?php if ($session->get('isLoggedIn')) { ?>
                                            <div class="delivery-login-box">
                                                <div class="delivery-icon">
                                                    <i data-feather="user"></i>
                                                    <div class="">
                                                        <h6>Hello,</h6>
                                                        <h5><?= $session->get('userName'); ?></h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="onhover-div onhover-div-login">
                                                <ul class="user-box-name">
                                                    <li class="product-box-contain">
                                                        <a href="">Profile</a>
                                                    </li>
                                                    <li class="product-box-contain">
                                                        <a href="sign-up.html">Register</a>
                                                    </li>
                                                    <li class="product-box-contain">
                                                        <a href="forgot.html">Forgot Password</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        <?php }else { ?>
                                            <a href="login" class="btn btn-primary bg-primary text-white " >Login</a>
                                        <?php } ?>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

