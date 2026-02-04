<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>" target="">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Royal Chain - Online Banking & Finance</title>
    <link rel="icon" href="inc/front/assets/imgs/bg_icons.png" type="image/x-icon">
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="inc/assets/css/vendors/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="inc/assets/css/bulk-style.css">
    <link rel="stylesheet" type="text/css" href="inc/assets/css/vendors/animate.css">
    <link rel="stylesheet" href="inc/plugin/jqui/jquery-ui.min.css">
    <link rel="stylesheet" href="inc/plugin/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="inc/plugin/sweetalert2/dist/sweetalert2.min.css">

    <!-- AOS Animation Library -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; color: #212529; }
        .navbar { background: linear-gradient(135deg, #0d6efd, #0a58ca); }
        .hero-section { background: linear-gradient(135deg, #e3f2fd, #bbdefb); padding: 10px 0; border-radius: 20px; }
        .stat-card { background: white; border: none; box-shadow: 0 6px 16px rgba(0,0,0,0.1); transition: all 0.4s; }
        .stat-card:hover { transform: translateY(-10px); }
        .ad-card { background: white; border: none; box-shadow: 0 6px 16px rgba(0,0,0,0.1); transition: all 0.4s; overflow: hidden; }
        .ad-card:hover { transform: translateY(-12px) scale(1.03); box-shadow: 0 16px 30px rgba(0,0,0,0.2); }
        .ad-img { height: 160px; object-fit: cover; transition: transform 0.5s; }
        .ad-card:hover .ad-img { transform: scale(1.1); }
        .category-badge { background: #e9ecef; color: #495057; padding: 6px 14px; border-radius: 30px; font-size: 0.9rem; }
        .reward-badge { background: linear-gradient(135deg, #0d6efd, #6610f2); color: white; padding: 10px 18px; border-radius: 50px; font-weight: bold; }
        .vireta-auto-popup {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 340px;
            z-index: 9999;
            display: none;
            animation: viretaAutoSlide 0.6s ease forwards;
        }
        @keyframes viretaAutoSlide {
            from {
                opacity: 0;
                transform: translateX(120px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .vireta-auto-close {
            position: absolute;
            top: -12px;
            right: -12px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: none;
            background: #ff4757;
            color: #fff;
            font-size: 22px;
            cursor: pointer;
            z-index: 10;
            box-shadow: 0 6px 15px rgba(0,0,0,.35);
        }
        .vireta-auto-card {
            position: relative;
            background: linear-gradient(135deg, #667eea, #764ba2);
            background-image: url('https://www.shutterstock.com/image-vector/3d-hand-holding-smartphone-flying-260nw-2647232417.jpg');
            background-size: cover;
            background-position: center;
            background-blend-mode: overlay;
            border-radius: 22px;
            color: #fff;
            padding: 22px;
            box-shadow: 0 18px 40px rgba(0,0,0,.4);
            overflow: hidden;
        }
        .vireta-auto-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 25%, rgba(0,0,0,.75));
        }
        .vireta-auto-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }
        .vireta-auto-btn {
            background: linear-gradient(45deg, #feca57, #ff9ff3);
            border: none;
            padding: 10px 26px;
            border-radius: 30px;
            font-weight: 600;
            transition: .3s;
        }
        .vireta-auto-btn:hover {
            transform: scale(1.1);
        }
        .stat_card_ex{
            background: linear-gradient(135deg, #f7971e, #ff512f, #ff2f86);
            color: #fff;
            transition: .35s ease;
        }
        .stat_card_ex::after{
            content: "₿";
            position: absolute;
            font-size: 110px;
            font-weight: 900;
            color: rgba(247, 147, 26, 0.12);
            right: -10px;
            bottom: -25px;
            transform: rotate(-18deg);
            pointer-events: none;
        }
        .stat_card_ex:hover{
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0,0,0,.35);
        }
        .stat_card_ex i,
        .stat_card_ex h4,
        .stat_card_ex h5{
            color:#fff !important;
        }
        .stat_card_ex2{
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #fff;
            transition: .35s ease;
        }
        .stat_card_ex2::after{
            content: "₿";
            position: absolute;
            font-size: 110px;
            font-weight: 900;
            color: rgba(247, 147, 26, 0.12);
            right: -10px;
            bottom: -25px;
            transform: rotate(-18deg);
            pointer-events: none;
        }
        .stat_card_ex2:hover{
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0,0,0,.35);
        }
        .stat_card_ex2 i,
        .stat_card_ex2 h4,
        .stat_card_ex2 h5{
            color:#fff !important;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
        }
        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #fff;
        }
    </style>

        <!-- jQuery Connect  -->
    <script src="inc/plugin/jq3.min.js"></script> 

    <!-- jquery ui-->
    <script src="inc/plugin/jqui/jquery-ui.min.js"></script>
    <script src="inc/plugin/sweetalert2/dist/sweetalert2.min.js"></script>

        <!-- Monetag Ads 
    -->
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(90deg, #032d6c, #0e327f); ">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/user/dashboard">
                <img src="inc/front/assets/imgs/bg_icons.png" style="max-width: 10% !important; border-radius: 20px !important;  " class="img-fluid blur-up lazyload d-none d-sm-inline-block d-md-inline-block" alt="">
                <b><?= $setting->vendor_name; ?></b>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link active" style="font-size: 18px;" href="user/dashboard">ড্যাশবোর্ড</a></li>
                    <?php if (empty($my_info->user_withdraw_method) || empty($my_info->user_withdraw_nos) || empty($my_info->payments_names)) { ?>
                        <li class="nav-item"><a class="nav-link" style="font-size: 18px;" href="user/set_account_number">Update</a></li>
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

    <div class="container py-4">
        <!-- Hero Section -->

        <div class="hero-section text-center mb-5" data-aos="fade-down">
            <h1 class="display-5 fw-bold">Welcome back, <?= $my_info->user_full_name; ?>! 🚀</h1>
            <p class="lead fs-4">Total Balance: <strong class="text-primary"><span class="fw-bold fs-3 show_your_rcn_here ">00</span> <?= $setting->coin_name; ?></strong> <b>(<?= $setting->coin_to_taka; ?><?= $setting->coin_name; ?> = ৳১/-)</b> </p>
            <div class="btn btn-success mb-4 withdraw_my_rcn_bal "> Withdraw </div>
            <p class="fs-5">বেশী বেশী View Ad বাটনে ক্লিক করো, কিছু সেকেন্ড অপেক্ষা করে rcn ইনকাম করে নাও। </p>
            <p class="fs-4">এই পেইজে কোন Ad আসলে সেটা কেটে দিন। এই পেইজ থেকে আপনাকে ইনকাম করতে হবে। </p>
        </div>

        <!-- Stats Section -->
        <h3 class="mb-4 text-center" data-aos="fade-up"><i class="bi bi-graph-up-arrow"></i> Your Earnings Stats</h3>
        <div class="row g-4 mb-5">

            <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card p-4 text-center rounded-4">
                    <i class="bi bi-currency-bitcoin fs-1 text-primary"></i>
                    <h5 class="mt-3">Total Earnings</h5>
                    <h4 class="fw-bold text-primary"><span class="fw-bold fs-3 show_your_rcn_here ">00</span> <?= $setting->coin_name; ?></h4>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card p-4 text-center rounded-4">
                    <i class="bi bi-eye fs-1 text-success"></i>
                    <h5 class="mt-3">Total Ads</h5>
                    <h4 class="fw-bold text-success ads_total_count">0</h4>
                </div>
            </div>

            <a href="user/autoIncomePage" target="_blank" class="col-lg-2 col-md-4 col-6 text-decoration-none" data-aos="fade-up" data-aos-delay="300"  >
                <div class="stat_card_ex stat-card p-4 text-center rounded-4">
                    <i class="bi bi-graph-up-arrow fs-1 text-info"></i>
                    <h5 class="mt-3 "> Auto Income </h5>
                    <h4 class="fw-bold text-info "> 01 </h4>
                </div>
            </a>

            <a href="user/autoIncomePageTwo" target="_blank" class="col-lg-2 col-md-4 col-6 text-decoration-none" data-aos="fade-up" data-aos-delay="300"  >
                <div class="stat_card_ex2 stat-card p-4 text-center rounded-4">
                    <i class="bi bi-box-arrow-up-right fs-1 text-info"></i>
                    <h5 class="mt-3 "> Auto Income </h5>
                    <h4 class="fw-bold text-info "> 02 </h4>
                </div>
            </a>

<!--
            <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card p-4 text-center rounded-4">
                    <i class="bi bi-list-check fs-1 text-info"></i>
                    <h5 class="mt-3">Total Viewed</h5>
                    <h4 class="fw-bold text-info">312</h4>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-card p-4 text-center rounded-4">
                    <i class="bi bi-clock-history fs-1 text-warning"></i>
                    <h5 class="mt-3">Daily Limit</h5>
                    <h4 class="fw-bold">22/60</h4>
                    <div class="progress mt-2" style="height: 10px;">
                        <div class="progress-bar bg-warning" style="width: 37%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
                <div class="stat-card p-4 text-center rounded-4">
                    <i class="bi bi-gift fs-1 text-danger"></i>
                    <h5 class="mt-3">Available Ads</h5>
                    <h4 class="fw-bold text-danger">32</h4>
                </div>
            </div>
            -->
            <!--
            <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
                <div class="stat-card p-4 text-center rounded-4">
                    <i class="bi bi-calendar-month fs-1 text-secondary"></i>
                    <h5 class="mt-3">Est. Monthly</h5>
                    <h4 class="fw-bold text-secondary">0.0035 BTC</h4>
                </div>
            </div>
             -->
        </div>

        <!-- Ads Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 data-aos="fade-right"><i class="bi bi-play-circle"></i> Available Ads - Click & Earn</h3>
            <div class="btn btn-outline-primary btn-lg" data-aos="fade-left"><i class="bi bi-arrow-clockwise"></i> Refresh Ads</div>
        </div>

        <div class="row g-4 ads_data_assign "></div>

        <div class="text-center mt-5" data-aos="fade-up">
            <!-- <button class="btn btn-primary btn-lg px-5 shadow">Load More Ads</button> -->
        </div>
    </div>

    <footer class="py-5 text-center bg-light mt-5">
        <p class="mb-0 fs-5">&copy; 2026 RoyalChain. All rights reserved.</p>
    </footer>


    <div class="vireta-auto-popup" id="viretaAutoPopup">
        <button class="vireta-auto-close" onclick="viretaAutoClose()">×</button>

        <a href="user/autoIncomePage" target="_blank" class="text-decoration-none">
            <div class="vireta-auto-card">
                <div class="vireta-auto-content">
                    <h4 class="mb-2 fw-bold">🤑 অটো ইনকাম করতে চাও?</h4>
                    <p class="mb-3">
                        <strong>Auto Income</strong> পেইজে ঢুকে পড়ো!<br>
                        <span class="text-warning fw-bold">50rcn – 5000rcn</span>
                    </p>
                    <button class="btn vireta-auto-btn">
                        🚀 এখানে ক্লিক করো
                    </button>
                </div>
            </div>
        </a>
    </div>
    <script>
        let viretaPopupInterval = null;
        window.addEventListener('load', () => {
            setTimeout(() => {
                showViretaPopup();
                viretaPopupInterval = setInterval(() => {
                    showViretaPopup();
                }, 30000);
            }, 1500);
        });

        function showViretaPopup() {
            const popup = document.getElementById('viretaAutoPopup');
            if (popup) {
                popup.style.display = 'block';
            }
        }

        function viretaAutoClose() {
            const popup = document.getElementById('viretaAutoPopup');
            if (popup) {
                popup.style.display = 'none';
            }
        }
    </script>

      <!-- Bootstrap js-->
      <script src="inc/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
      <script src="inc/assets/js/bootstrap/bootstrap-notify.min.js"></script>
      <script src="inc/assets/js/bootstrap/popper.min.js"></script>

      <!-- feather icon js-->
      <script src="inc/assets/js/feather/feather.min.js"></script>
      <script src="inc/assets/js/feather/feather-icon.js"></script>

      <!-- Lazyload Js -->
      <script src="inc/assets/js/lazysizes.min.js"></script>

      <!-- Slick js-->
      <script src="inc/assets/js/slick/slick.js"></script>
      <script src="inc/assets/js/slick/slick-animation.min.js"></script>
      <script src="inc/assets/js/slick/custom_slick.js"></script>

      <!-- Auto Height Js -->
      <script src="inc/assets/js/auto-height.js"></script>

      <!-- Fly Cart Js -->
      <script src="inc/assets/js/fly-cart.js"></script>

      <!-- Quantity js -->
      <script src="inc/assets/js/quantity-2.js"></script>

      <!-- WOW js -->
      <script src="inc/assets/js/wow.min.js"></script>
      <script src="inc/assets/js/custom-wow.js"></script>

      <!-- toastr js  -->
      <script src="inc/plugin/toastr/build/toastr.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>

    <script>
        $(document).ready(function () {
            get_ads_list();
            get_total_rcn_balance();

            function get_ads_list() {
                $.ajax({
                    type: "post",
                    url: "user/getAllAds",
                    data: "",
                    dataType: "json",
                    success: function (res) {
                        // res[n]
                        let ads_html = '';
                        for (let n = 0; n < res.length; n++) {
                            ads_html += `<div class="col-lg-3 col-md-4 col-sm-6 " data-aos="zoom-in" data-aos-delay="100">
                                            <div class="ad-card h-100 p-3 text-center rounded-4 ads_main_div_view ">
                                                <img src="${res[n].ads_image}" class="img-fluid ad-img rounded mb-3" alt="Crypto Ad">
                                                <span class="category-badge d-block mb-2">${res[n].ads_title || 'Marketing'}</span>
                                                <span class="reward-badge d-block mb-3">Reward: ${res[n].ads_reward} rcn</span>
                                                <p class="small text-muted"><i class="bi bi-clock"></i> <span class="time_left_count">${res[n].ads_view_time_sec}</span> sec | <i class="bi bi-eye"></i> 2.1k views</p>
                                                <a href="javascript:void(0)" data-link="${res[n].ads_link}" data-id="${res[n].id}" class="btn btn-primary w-100 view_this_is_ads"> View Ad </a>
                                                <div class="mt-2 text-center countdown_text "></div>
                                            </div>
                                        </div>`;
                        }
                        $('.ads_data_assign').html(ads_html);
                        $('.ads_total_count').text(res.length);
                    }
                });
            }

            $(document).on('click', '.view_this_is_ads', function () {

                let adsLink = $(this).data('link');
                let adsID = $(this).data('id');
                let popup = window.open(adsLink, '_blank');

                if (!popup) {
                    alert('Popup blocked! Please allow popups.');
                    return;
                }

                let timeLeft = parseInt($(this).parent('.ads_main_div_view').find('.time_left_count').text());
                let $countdownBox = $(this).parent('.ads_main_div_view').find('.countdown_text');
                let $view_ad_btn = $(this)
                let $all_view_ad_btn = $('.view_this_is_ads')
                $view_ad_btn.hide();
                $all_view_ad_btn.hide();

                $countdownBox.html('⏳ ' + timeLeft + ' seconds remaining');

                let timer = setInterval(function () {

                    // 🔴 যদি user ট্যাব বন্ধ করে দেয়
                    if (popup.closed) {
                        clearInterval(timer);
                        $countdownBox.html('');
                        $view_ad_btn.show();
                        $all_view_ad_btn.show();
                        alert('⚠️ Ad tab closed! Countdown stopped.');
                        return;
                    }

                    timeLeft--;

                    if (timeLeft <= 0) {
                        clearInterval(timer);
                        $all_view_ad_btn.show();
                        $view_ad_btn.hide();
                        $countdownBox.html(`
                            <div class="btn btn-success w-100 claim_now" ads_id="${adsID}">
                                🎁 Claim
                            </div>
                        `);
                    } else {
                        $view_ad_btn.hide();
                        $all_view_ad_btn.hide();
                        $countdownBox.html('⏳ ' + timeLeft + ' seconds remaining');
                    }

                }, 1000);
            });

            $(document).on('click', '.claim_now', function () {
                let claimid = $(this).attr('ads_id');
                $(this).closest('.ads_main_div_view').find('.view_this_is_ads').show();
                $(this).remove();
                $.ajax({
                    type: "post",
                    url: "user/addMyRCNPoint",
                    data: {
                        id: claimid,
                        rew: 0
                    },
                    success: function (rsp) {
                        get_total_rcn_balance();
                        toastr.success('success', rsp.message);
                    }
                });
            });

            function get_total_rcn_balance() {
                $.ajax({
                    type: "post",
                    url: "user/getMyTotalRCN",
                    data: "",
                    dataType: "json",
                    success: function (r) {
                        $('.show_your_rcn_here').text(r);
                    }
                });
            }

            $(document).on('click', '.withdraw_my_rcn_bal', function () {
                if (!confirm('Are you sure?')) {
                    return false;
                }

                $.ajax({
                    type: "post",
                    url: "user/withdrawRCNbal",
                    data: "",
                    success: function (rsp) {
                        get_total_rcn_balance();
                        if (rsp.success === true) {
                            toastr.success('success', rsp.message);
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Your Withdraw has been Success!',
                                confirmButtonText: 'OK'
                            })
                        }else {
                            toastr.error('error', 'your rcn balance is low. ');
                            Swal.fire({
                                icon: 'error',
                                title: 'Low rcn point!',
                                text: 'Your Withdraw is cancel!',
                                confirmButtonText: 'OK'
                            })
                        }
                    }
                });
            });


        });
    </script>
    <script>
        $(function() {
            $(".date_pick").datepicker({
            dateFormat: "yy-mm-dd",     // ফরম্যাট yyyy-mm-dd
            changeMonth: true,          // মাস পরিবর্তন করা যাবে
            changeYear: true,           // বছর পরিবর্তন করা যাবে
            showButtonPanel: true,      // Today ও Done বাটন
            showAnim: "slideDown"       // খোলার সময় অ্যানিমেশন
            });
        });
    </script>

    <?php if (session()->getFlashdata('success')): ?>
        <script>
            toastr.success("<?= esc(session()->getFlashdata('success')) ?>");
        </script>
        <?php elseif (session()->getFlashdata('error')): ?>
        <script>
            toastr.error("<?= esc(session()->getFlashdata('error')) ?>");
        </script>
    <?php endif; ?>


    

    <script>
        function detectAdBlock(callback) {
            let adUrl = "https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js";

            let xhr = new XMLHttpRequest();
            xhr.open("GET", adUrl, true);
            xhr.timeout = 3000;

            xhr.onload = function () {
                callback(false); // No AdBlock
            };

            xhr.onerror = function () {
                callback(true); // AdBlock detected
            };

            xhr.ontimeout = function () {
                callback(true); // Assume AdBlock
            };

            xhr.send();
        }

        detectAdBlock(function(isBlocked) {
            if (isBlocked) {
                console.log("🚫 AdBlock Enabled");
                document.body.innerHTML = `
                    <div style="text-align:center;padding:50px">
                        <h2>⚠️ AdBlock বন্ধ করুন</h2>
                        <p>আমাদের সাইট চালাতে AdBlock বন্ধ করা প্রয়োজন</p>
                    </div>
                `;
            } else {
                console.log("✅ No AdBlock ");
            }
        });

    </script>




</body>
</html>