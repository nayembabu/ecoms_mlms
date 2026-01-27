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

        <style>
            body { 
                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); 
                color: #212529; 
            }
            .ad-card { 
                background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%); 
                border: none; 
                box-shadow: 0 10px 30px rgba(255, 105, 180, 0.3); 
                transition: all 0.5s ease; 
                overflow: hidden;
                border-radius: 20px;
            }
            .ad-card:hover { 
                transform: translateY(-15px) scale(1.03); 
                box-shadow: 0 25px 50px rgba(255, 105, 180, 0.5); 
            }
            .ad-img { 
                height: 220px; 
                object-fit: cover; 
                transition: transform 0.6s ease; 
            }
            .ad-card:hover .ad-img { 
                transform: scale(1.15) rotate(2deg); 
            }
            .income-card { 
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
                color: white; 
                border: none; 
                box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
                border-radius: 20px;
                transition: all 0.5s ease;
            }
            .income-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 25px 50px rgba(102, 126, 234, 0.6);
            }
            .reward-badge { 
                background: linear-gradient(45deg, #ff6b6b, #feca57); 
                color: white; 
                padding: 10px 20px; 
                border-radius: 50px; 
                font-weight: bold; 
                font-size: 1.1rem;
                box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
            }
            .progress { height: 15px; border-radius: 20px; overflow: hidden; }
            .progress-bar { 
                background: linear-gradient(90deg, #48dbfb, #0abde3); 
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

        <!-- ads here -->
        <script src="https://pl28546695.effectivegatecpm.com/ec/a3/1f/eca31fb51251eebb3035151a0141b1fc.js"></script>

        <script type="text/javascript" data-cfasync="false">
            /*<![CDATA[/* */
            (function(){var b=window,d="fdf656761b101bbd96650b729f3e5797",x=[["siteId",51*777-838+5232627],["minBid",0],["popundersPerIP","0"],["delayBetween",0],["default",false],["defaultPerDay",0],["topmostLayer","auto"]],g=["d3d3LmRpc3BsYXl2ZXJ0aXNpbmcuY29tL05xcy9Bc3RDL250aHJlZS5taW4uanM=","ZDNtem9rdHk5NTFjNXcuY2xvdWRmcm9udC5uZXQvcmJhc2lsLm1pbi5qcw=="],p=-1,c,i,k=function(){clearTimeout(i);p++;if(g[p]&&!(1795203504000<(new Date).getTime()&&1<p)){c=b.document.createElement("script");c.type="text/javascript";c.async=!0;var s=b.document.getElementsByTagName("script")[0];c.src="https://"+atob(g[p]);c.crossOrigin="anonymous";c.onerror=k;c.onload=function(){clearTimeout(i);b[d.slice(0,16)+d.slice(0,16)]||k()};i=setTimeout(k,5E3);s.parentNode.insertBefore(c,s)}};if(!b[d]){try{Object.freeze(b[d]=x)}catch(e){}k()}})();
            /*]]>/* */
        </script>


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

        <div class="container py-5">
            <h2 class="text-center mb-5 fw-bold display-5" style="background: linear-gradient(45deg, #ff6b6b, #4ecdc4); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                <i class="bi bi-stars"></i> Random Ads & Earnings Dashboard
            </h2>

            <div>
                <div class="btn btn-light btn-lg shadow-lg fw-bold count_down_2 " style="background: linear-gradient(45deg, #ffeaa7, #fab1a0); display: none;">
                    <i class="bi bi-play-btn-fill"></i> Count
                </div>
            </div>

            <div class="row g-5 align-items-center mt-5">
                <!-- Random Ad Card (Left) -->
                <div class="col-lg-7">
                    <div class="ad-card">
                        <img src="inc/img/site_bg/ads_bg_1.jpg" class="img-fluid ad-img w-100 rounded-top" alt="Random Ad">
                        <div class="card-body p-5 text-center text-white">
                            <span class="badge bg-warning text-dark mb-3 fs-6">Crypto Exchange Promo</span>
                            <h3 class="card-title fw-bold">Watch & Earn Big Today! 🎉</h3>
                            <div class="reward-badge d-inline-block mb-4">Reward: 150 rcn</div>
                            <p class="fs-5 mb-4">
                                <i class="bi bi-clock-fill text-warning"></i> Duration: 30 sec<br>
                                <i class="bi bi-eye-fill text-info"></i> Views: 4.8k
                            </p>
                            <script>
                                (function(s){s.dataset.zone='10513504',s.src='https://al5sm.com/tag.min.js'})([document.documentElement, document.body].filter(Boolean).pop().appendChild(document.createElement('script')))
                            </script>
                            <div class="btn btn-light btn-lg w-100 shadow-lg fw-bold activate_add_now " style="background: linear-gradient(45deg, #ffeaa7, #fab1a0);">
                                <i class="bi bi-play-btn-fill"></i> View Ad Now
                            </div>
                            <small class="d-block mt-4 opacity-75">New random ad loads after viewing</small>
                        </div>
                    </div>
                </div>

                <!-- Income Dashboard Card (Right) -->
                <div class="col-lg-5">
                    <div class="income-card p-5 text-center">
                        <h3 class="fw-bold mb-4 display-6"><i class="bi bi-gem"></i> Your Earnings</h3>

                        <div class="mb-5">
                            <h5 class="opacity-90">Total Income from Ads</h5>
                            <h2 class="fw-bold display-4"><span class="show_your_rcn_here">0</span> rcn</h2>
                            <div class="progress mt-3">
                                <div class="progress-bar" style="width: 0%;">0% of daily goal</div>
                            </div>
                        </div>

                        <hr class="border-light opacity-50">

                        <div class="mt-5">
                            <h5 class="opacity-90">All-Time Total Income</h5>
                            <h2 class="fw-bold display-4"><span class="show_your_rcn_here">0</span> rcn</h2>
                        </div>

                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="user/autoIncomePage" class="btn btn-success btn-lg px-5 shadow-lg" style="background: linear-gradient(45deg, #1dd1a1, #00d2d3);">
                    <i class="bi bi-shuffle"></i> Refresh the page
                </a>
            </div>
        </div>

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

        <!-- ads here -->
         <script type="text/javascript">
            var uid = '498953';
            var wid = '750949';
            var pop_tag = document.createElement('script');pop_tag.src='//cdn.popcash.net/show.js';document.body.appendChild(pop_tag);
            pop_tag.onerror = function() {pop_tag = document.createElement('script');pop_tag.src='//cdn2.popcash.net/show.js';document.body.appendChild(pop_tag)};
        </script>
        <script type="text/javascript">
            var uid = '498953';
            var wid = '750949';
            var pop_fback = 'up';
            var pop_tag = document.createElement('script');pop_tag.src='//cdn.popcash.net/show.js';document.body.appendChild(pop_tag);
            pop_tag.onerror = function() {pop_tag = document.createElement('script');pop_tag.src='//cdn2.popcash.net/show.js';document.body.appendChild(pop_tag)};
        </script>
        <script>
            (function(nogmk){
            var d = document,
                s = d.createElement('script'),
                l = d.scripts[d.scripts.length - 1];
            s.settings = nogmk || {};
            s.src = "\/\/cylindrical-presentation.com\/b\/XcVYsCd.GTlo0rYsWxcs\/bezmq9AurZVUKlEk-PeTZYv3NNMTAYM1SNPjFgttZNFjWcy1jNVjoUZ2IOQQR";
            s.async = true;
            s.referrerPolicy = 'no-referrer-when-downgrade';
            l.parentNode.insertBefore(s, l);
            })({})
        </script>

        <script>
            get_total_rcn_balance();
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
        </script>

        <!-- Ad Countdown Timer Script -->
        <script>
            $(document).ready(function() {
                var countdownActive = false;
                var stage = 0; // 0: start, 1: button1 countdown, 2: button2 countdown, 3: button1 again countdown

                $('.activate_add_now').click(function() {
                    if (countdownActive) return;

                    countdownActive = true;
                    var button1 = $(this);
                    var button2 = $('.count_down_2');

                    button1.prop('disabled', true).css('opacity', '0.6');

                    if (stage === 0) {
                        // Stage 1: First 10 second countdown on activate_add_now button
                        stage = 1;
                        var countdown1 = 10;
                        button1.html('<i class="bi bi-hourglass-split"></i> Wait... <span class="countdown-num">10</span>s');

                        var timer1 = setInterval(function() {
                            countdown1--;
                            button1.find('.countdown-num').text(countdown1);

                            if (countdown1 === 0) {
                                clearInterval(timer1);
                                button1.html('<i class="bi bi-arrow-right-circle-fill"></i> Next').prop('disabled', false).css('opacity', '1');
                                countdownActive = false;
                            }
                        }, 1000);
                    } else if (stage === 1) {
                        // Stage 2: Show button2 and countdown
                        stage = 2;
                        button1.prop('disabled', true).css('opacity', '0.6');
                        button2.show();
                        button2.prop('disabled', true).css('opacity', '0.6');
                        button2.html('<i class="bi bi-hourglass-split"></i> Wait... <span class="countdown-num">10</span>s');
                        button1.html('<i class="bi bi-play-btn-fill"></i> View Ad Now');

                        var countdown2 = 10;
                        var timer2 = setInterval(function() {
                            countdown2--;
                            button2.find('.countdown-num').text(countdown2);

                            if (countdown2 === 0) {
                                clearInterval(timer2);
                                button2.html('<i class="bi bi-arrow-right-circle-fill"></i> Next').prop('disabled', false).css('opacity', '1');
                                countdownActive = false;
                            }
                        }, 1000);

                        // Next click on button2
                        button2.off('click').on('click', function(e) {
                            e.stopPropagation();
                            if (countdownActive) return;

                            countdownActive = true;
                            stage = 3;
                            button2.hide();
                            button1.prop('disabled', true).css('opacity', '0.6');
                            button1.html('<i class="bi bi-hourglass-split"></i> Final... <span class="countdown-num">10</span>s');

                            var countdown3 = 10;
                            var timer3 = setInterval(function() {
                                countdown3--;
                                button1.find('.countdown-num').text(countdown3);

                                if (countdown3 === 0) {
                                    clearInterval(timer3);
                                    button1.prop('disabled', false).css('opacity', '1');
                                    button1.html('<i class="bi bi-gift-fill"></i> Claim Now').css('background', 'linear-gradient(45deg, #1dd1a1, #00d2d3)');
                                    countdownActive = false;

                                    // Claim button functionality
                                    button1.off('click').on('click', function(e) {
                                        e.stopPropagation();
                                        $.ajax({
                                            type: "post",
                                            url: "user/addMyRCNPoint",
                                            data: {
                                                id: 'autoIncome',
                                                rew: 150
                                            },
                                            success: function (rsp) {
                                                get_total_rcn_balance();
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Reward Claimed!',
                                                    text: 'You have successfully claimed 150 RCN',
                                                    confirmButtonText: 'OK'
                                                }).then(function() {
                                                    // Reset everything
                                                    stage = 0;
                                                    button1.off('click').on('click', function() {
                                                        arguments.callee.call(this);
                                                    });
                                                    button1.html('<i class="bi bi-play-btn-fill"></i> View Ad Now').css('background', 'linear-gradient(45deg, #ffeaa7, #fab1a0)');
                                                    button2.hide();
                                                    button2.html('<i class="bi bi-play-btn-fill"></i> Count');
                                                    get_total_rcn_balance();
                                                    window.location.reload();
                                                });
                                            }
                                        });

                                    });
                                }
                            }, 1000);
                        });
                    }
                });
            });
        </script>

        <script src="https://pl28546719.effectivegatecpm.com/cf/be/2d/cfbe2d9d53236a6567bc99bdd221c037.js"></script>
        <script src="https://quge5.com/88/tag.min.js" data-zone="204680" async data-cfasync="false"></script>
    </body>
</html>