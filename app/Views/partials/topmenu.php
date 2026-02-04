
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

<style>
    @media (max-width: 1000px) {
        .navbar-brand img {
            display: none !important;
        }
    }
</style>

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

<?php if (!$session->get('isLoggedIn')) { ?>
    <!-- Header Start -->
    <header class="header-compact " >
        <div class="top-nav top-header sticky-header" >
            <div class="container-fluid-lg" >
                <div class="row">
                    <div class="col-12" >
                        <div class="navbar-top">
                            <a href="" class="web-logo nav-logo">
                                <img src="inc/front/assets/imgs/bg_icons.png" style="max-width: 40% !important; border-radius: 20px !important;  " class="img-fluid blur-up lazyload" alt="">
                            </a>


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
                                    <li class="right-side onhover-dropdown">
                                        <a href="login" class="btn btn-primary bg-primary text-white " >Login</a>
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
<?php }else { ?>

    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/user/dashboard">
                <img src="inc/front/assets/imgs/bg_icons.png" style="max-width: 10% !important; border-radius: 20px !important;  " class="img-fluid blur-up lazyload d-none d-sm-inline-block d-md-inline-block" alt="">
                <b><?= $setting->vendor_name; ?></b>
            </a>
            <div class="navbar-w-250 me-auto d-flex align-items-center " style="background-color: #f8f9fa; border-radius: 10px;" >
                <div class="btn-group align-items-center">
                    <a href="user/myWallet" class="bg-light btn btn-sm btn-light d-flex align-items-center rounded" title="Wallet">
                        <i class="fas fa-hand-holding-usd fs-3 me-3"></i>
                        <div class="text-start">
                            <small class="d-block fs-6 ">Balance</small>
                            <strong class="d-block fs-5 ">৳ <span class="this_wallet_amount " >0</span></strong>
                        </div>
                    </a>
                </div>
            </div>
            <button class="navbar-toggler" onclick="toggleMenu()"  data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" type="button" ><span class="navbar-toggler-icon"></span></button>
            <div class=" collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link active" style="font-size: 18px;" href="user/dashboard">ড্যাশবোর্ড</a></li>
                    <?php if (empty($my_info->user_withdraw_method) || empty($my_info->user_withdraw_nos) || empty($my_info->payments_names)) { ?>
                        <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="user/set_account_number">Update</a></li>
                        <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="user/incomePage">আয়</a></li>
                        <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="logout">Logout</a></li>
                    <?php } else { ?>
                        <?php if ($my_info->sts == 1) { ?>
                            <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="user/viewAllProducts">পন্য-ক্রয়</a></li>
                            <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="user/allPackage">প্যাকেজ</a></li>
                            <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="user/referrals">রেফারেল</a></li>
                            <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="user/fullTeams">টিম</a></li>
                            <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="user/incomePage">আয়</a></li>
                            <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="logout">Logout</a></li>
                        <?php } else { ?>
                            <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="user/incomePage">আয়</a></li>
                            <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="user/viewAllProducts">পন্য ক্রয়</a></li>
                            <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="logout">Logout</a></li>
                        <?php } ?>
                    <?php } ?>
                    <!-- Logged-in User Info -->
                    <li class="nav-item ms-lg-4">
                        <div class="user-info">
                            <img src="<?= $my_info->user_pro_pic_paths; ?>" alt="user">
                            <a href="user/profile" class="text-white text-decoration-none ms-2">
                                <strong><?= $my_info->user_full_name; ?></strong>
                                <small>ID: <?= $my_info->user_reffer_code_times; ?></small>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

<?php } ?>
