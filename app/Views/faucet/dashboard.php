<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url(); ?>" target="">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Royal Chain - Online Banking & Finance</title>
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    <link rel="icon" href="inc/front/assets/imgs/bg_icons.png" type="image/x-icon">
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
        .hero-section { background: linear-gradient(135deg, #e3f2fd, #bbdefb); padding: 50px 0; border-radius: 20px; }
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
    </style>

        <!-- jQuery Connect  -->
    <script src="inc/plugin/jq3.min.js"></script> 

    <!-- jquery ui-->
    <script src="inc/plugin/jqui/jquery-ui.min.js"></script>
    <script src="inc/plugin/sweetalert2/dist/sweetalert2.min.js"></script>




    <!-- <script src="https://pl28546695.effectivegatecpm.com/ec/a3/1f/eca31fb51251eebb3035151a0141b1fc.js"></script> -->
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
                    <li class="nav-item"><a class="nav-link text-light" href="user/dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link text-light" style="font-size: 18px;" href="user/viewAllProducts">পন্য-ক্রয়</a></li>
                    <li class="nav-item"><a class="nav-link text-light" style="font-size: 18px;" href="user/allPackage">প্যাকেজ</a></li>
                    <li class="nav-item"><a class="nav-link text-light" style="font-size: 18px;" href="user/referrals">রেফারেল</a></li>
                    <li class="nav-item"><a class="nav-link text-light" style="font-size: 18px;" href="user/fullTeams">টিম</a></li>
                    <li class="nav-item"><a class="nav-link text-light" style="font-size: 18px;" href="user/incomeDetails">আয়</a></li>
                    <li class="nav-item"><a class="nav-link text-light" style="font-size: 18px;" href="logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <!-- Hero Section -->
        <div class="hero-section text-center mb-5" data-aos="fade-down">
            <h1 class="display-5 fw-bold">Welcome back, <?= $my_info->user_full_name; ?>! 🚀</h1>
            <p class="lead fs-4">Total Balance: <strong class="text-primary"><span class="fw-bold fs-3 ">00</span> <?= $setting->coin_name; ?></strong></p>
            <p class="fs-5">Watch ads below and earn more coin instantly!</p>
        </div>

        <!-- Stats Section -->
        <h3 class="mb-4 text-center" data-aos="fade-up"><i class="bi bi-graph-up-arrow"></i> Your Earnings Stats</h3>
        <div class="row g-4 mb-5">

            <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card p-4 text-center rounded-4">
                    <i class="bi bi-currency-bitcoin fs-1 text-primary"></i>
                    <h5 class="mt-3">Total Earnings</h5>
                    <h4 class="fw-bold text-primary"><span class="fw-bold fs-3 ">00</span> <?= $setting->coin_name; ?></h4>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card p-4 text-center rounded-4">
                    <i class="bi bi-eye fs-1 text-success"></i>
                    <h5 class="mt-3">Total Ads</h5>
                    <h4 class="fw-bold text-success ads_total_count">0</h4>
                </div>
            </div>


<!--
            <a  href="" target="_blank" class="col-lg-7 col-md-6 col-6" data-aos="fade-up" data-aos-delay="300" >
                <div class="stat_card_ex stat-card p-4 text-center rounded-4">
                    <i class="bi bi-list-check fs-1 text-info"></i>
                    <h5 class="mt-3 text-white text-decoration-none ">যদি  অটো ইনকাম করতে চাও, ক্লিক করে Auto Income পেইজে চলে যাও, আর বেশী বেশী ইনকাম করো। </h5>
                    <h4 class="fw-bold text-info text-white">50rcn থেকে 5000rcn পর্যন্ত ইনকাম করতে পারবে।</h4>
                </div>
            </a>

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

        <!-- <div class="text-center mt-5" data-aos="fade-up">
            <button class="btn btn-primary btn-lg px-5 shadow">Load More Ads</button>
        </div> -->
    </div>

    <footer class="py-5 text-center bg-light mt-5">
        <p class="mb-0 fs-5">&copy; 2026 RoyalChain. All rights reserved.</p>
    </footer>




<div class="vireta-auto-popup" id="viretaAutoPopup">
    <button class="vireta-auto-close" onclick="viretaAutoClose()">×</button>

    <a href="user/autoIncomePage" class="text-decoration-none">
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
    window.addEventListener('load', () => {
        setTimeout(() => {
            const popup = document.getElementById('viretaAutoPopup');
            if (popup) popup.style.display = 'block';
        }, 1500);

        setInterval(() => {
            const popup = document.getElementById('viretaAutoPopup');
            if (popup) popup.style.display = 'block';
        }, 15000);
    });

    function viretaAutoClose() {
        document.getElementById('viretaAutoPopup')?.remove();
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
            get_ads_list()


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
                            ads_html += `<div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
                                            <div class="ad-card h-100 p-3 text-center rounded-4">
                                                <img src="${res[n].ads_image}" class="img-fluid ad-img rounded mb-3" alt="Crypto Ad">
                                                <span class="category-badge d-block mb-2">${res[n].ads_title || 'Marketing'}</span>
                                                <span class="reward-badge d-block mb-3">Reward: ${res[n].ads_reward} rcn</span>
                                                <p class="small text-muted"><i class="bi bi-clock"></i> ${res[n].ads_view_time_sec} sec | <i class="bi bi-eye"></i> 2.1k views</p>
                                                <a href="${res[n].ads_link}" target="_blank" class="btn btn-primary w-100">View Ad</a>
                                            </div>
                                        </div>`;
                        }
                        $('.ads_data_assign').html(ads_html);
                        $('.ads_total_count').text(res.length);
                    }
                });
            }





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


    <!-- <script src="https://pl28546719.effectivegatecpm.com/cf/be/2d/cfbe2d9d53236a6567bc99bdd221c037.js"></script>
    <script src="https://quge5.com/88/tag.min.js" data-zone="204680" async data-cfasync="false"></script>  -->
</body>
</html>