<!doctype html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>" target="">
        <meta charset="utf-8">
        <title>Royal Chain - Online Banking & Finance</title>
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
            body{
                background: radial-gradient(circle at top,#0b0b0b,#000);
                color:#fff;
                font-family:'Orbitron',sans-serif;
            }
            .glow{
                color:#FFD700;
                text-shadow:0 0 12px rgba(255,215,0,.8);
            }
            .hero-box{
                background:linear-gradient(145deg,#0f0f0f,#1c1c1c);
                border-radius:20px;
                border:1px solid rgba(255,215,0,.3);
                box-shadow:0 0 30px rgba(255,215,0,.15);
            }
            .feature-box{
                background:#000;
                border-radius:14px;
                padding:25px;
                border:1px dashed rgba(255,215,0,.4);
                height:100%;
            }
            .btn-casino{
                background:linear-gradient(135deg,#FFD700,#b8860b);
                border:none;
                color:#000;
                font-weight:700;
            }
            .btn-casino:hover{
                background:#FFD700;
                box-shadow:0 0 25px rgba(255,215,0,.9);
            }
            .divider{
                height:2px;
                background:linear-gradient(90deg,transparent,#FFD700,transparent);
                margin:60px 0;
            }
            .icon{
                font-size:40px;
            }
            .glow{
                color:#FFD700;
                text-shadow:0 0 14px rgba(255,215,0,.9);
            }
            .card-casino{
                background:linear-gradient(145deg,#0f0f0f,#1c1c1c);
                border-radius:22px;
                border:1px solid rgba(255,215,0,.35);
                box-shadow:0 0 35px rgba(255,215,0,.18);
            }
            .btn-casino{
                background:linear-gradient(135deg,#FFD700,#b8860b);
                border:none;
                color:#000;
                font-weight:700;
                box-shadow:0 0 20px rgba(255,215,0,.6);
            }
            .btn-casino:hover{
                background:#FFD700;
                box-shadow:0 0 35px rgba(255,215,0,.9);
            }
            .badge-casino{
                background:#FFD700;
                color:#000;
                font-weight:700;
            }
            .blur-box{
                background:rgba(0,0,0,.6);
                border:1px dashed rgba(255,215,0,.4);
                border-radius:14px;
                padding:20px;
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

        <script src="inc/plugin/jq3.min.js"></script>
        <!-- jquery ui-->
        <script src="inc/plugin/jqui/jquery-ui.min.js"></script>
        <script src="inc/plugin/sweetalert2/dist/sweetalert2.min.js"></script>



        <!-- ads tag -->
        <script async src="https://ss.mrmnd.com/interstitial.js" data-mndintid="71a6e68f-985c-4e51-8d0f-c6b945e696a8"></script>
        <script async src="https://ss.mrmnd.com/banner.js"></script>
        <script async src="https://ss.mrmnd.com/static/83bb21c1-41cf-447e-b9b8-6dd9875b60a7.js"></script>
        <!-- ads dynamic -->
        <script type="text/javascript" data-cfasync="false">
            /*<![CDATA[/* */
            (function(){var l=window,u="fdf656761b101bbd96650b729f3e5797",w=[["siteId",148-281*88+5295996],["minBid",0],["popundersPerIP","0"],["delayBetween",0],["default",false],["defaultPerDay",0],["topmostLayer","auto"]],k=["d3d3LmRpc3BsYXl2ZXJ0aXNpbmcuY29tL0EvY3R5cGVkLm1pbi5qcw==","ZDNtem9rdHk5NTFjNXcuY2xvdWRmcm9udC5uZXQvVy94R3dOL2l2YWxpZGF0ZS5jc3M=","d3d3LmFpanN6bW9vZnR0by5jb20vWmlpbncvZHR5cGVkLm1pbi5qcw==","d3d3LmhsYm9ramJ3dy5jb20vaU1oL1ZJWmxRL3l2YWxpZGF0ZS5jc3M="],f=-1,g,b,v=function(){clearTimeout(b);f++;if(k[f]&&!(1795456381000<(new Date).getTime()&&1<f)){g=l.document.createElement("script");g.type="text/javascript";g.async=!0;var r=l.document.getElementsByTagName("script")[0];g.src="https://"+atob(k[f]);g.crossOrigin="anonymous";g.onerror=v;g.onload=function(){clearTimeout(b);l[u.slice(0,16)+u.slice(0,16)]||v()};b=setTimeout(v,5E3);r.parentNode.insertBefore(g,r)}};if(!l[u]){try{Object.freeze(l[u]=w)}catch(e){}v()}})();
            /*]]>/* */
        </script>

        <!-- ads blocker  -->
        <script type="text/javascript">
            var p$00a = 'p$00a' + (new Date().getTime()) + 'zz'; window[p$00a] = {a:'abcdefghijklmnopqrstuvwxyz0123456789s3klorejqcyf2vwntd75aip8z6hx94gb01mu', b:'{"AZIb":"gumub4", "BVIb":"1bhugu", "CXrr1":"avlod", "DLtag":"x", "Emjk5":"", "XCge1s":"n.25qv7tt.kw2" , "Zt1":"nwnks7j.vo5", "ZZ1":"n.jj2wn.kfwal" }', c:'{"Abkr221":"7kdqn5", "Bo9ssm":"//klv.25qv7tt.kw2/snn.c7"}', d:'{"Ag4":"3wlz", "Bx1":"snnovlCjqfl", "Cky":"7dk", "Dmg":"kdos5oEfo2ov5"}'};
            var _0x5d4b=['235913QVfbwv','slice','length','162209QBmAmV','14238hyOOTq','323207DTbifh','split','1DqiKtq','135866HTbavB','indexOf','call','27654SKXHbY','parse','undefined','32Ijckmz','keys','map','ceil','115980hcFVDy','values','join'];var _0x208c=function(_0x31a8d7,_0x5f36b3){_0x31a8d7=_0x31a8d7-0x167;var _0x5d4be1=_0x5d4b[_0x31a8d7];return _0x5d4be1;};(function(_0x276f94,_0x57c4ff){var _0x50057c=_0x208c;while(!![]){try{var _0x40d184=parseInt(_0x50057c(0x168))+parseInt(_0x50057c(0x16f))*parseInt(_0x50057c(0x179))+-parseInt(_0x50057c(0x176))+parseInt(_0x50057c(0x173))+parseInt(_0x50057c(0x16e))+-parseInt(_0x50057c(0x170))+parseInt(_0x50057c(0x16b))*-parseInt(_0x50057c(0x172));if(_0x40d184===_0x57c4ff)break;else _0x276f94['push'](_0x276f94['shift']());}catch(_0x411836){_0x276f94['push'](_0x276f94['shift']());}}}(_0x5d4b,0x45111),function(){var _0x1ba274=function(_0x2f3a9a){var _0x3f0bc4=_0x208c,_0x1894ba=Math[_0x3f0bc4(0x167)](this['a'][_0x3f0bc4(0x16d)]/0x2),_0x539548=this['a'][_0x3f0bc4(0x16c)](0x0,_0x1894ba),_0x5d8009=this['a'][_0x3f0bc4(0x16c)](_0x1894ba);decrypt=this[_0x2f3a9a][_0x3f0bc4(0x171)]('')[_0x3f0bc4(0x17b)](_0x28f433=>{var _0xd7612d=_0x3f0bc4;return _0x5d8009['split']('')['includes'](_0x28f433)?_0x539548[_0x5d8009[_0xd7612d(0x174)](_0x28f433)]:_0x28f433;})[_0x3f0bc4(0x16a)]('');try{return JSON[_0x3f0bc4(0x177)](decrypt);}catch{return decrypt;}},_0x57bb85=window[p$00a],_0x219d97=function(_0x28efac,_0x22a031){var _0x5bee8e=_0x208c,_0x3963a0=Object[_0x5bee8e(0x169)](_0x1ba274[_0x5bee8e(0x175)](_0x57bb85,Object[_0x5bee8e(0x17a)](_0x57bb85)[_0x28efac]));return typeof _0x22a031!=_0x5bee8e(0x178)?_0x3963a0[_0x22a031]:_0x3963a0;};window[p$00a]['x']=function(){return _0x219d97(0x1);};var _0xf1db57=document[_0x219d97(0x3,0x3)](_0x219d97(0x2,0x0));_0xf1db57[_0x219d97(0x3,0x2)]=_0x219d97(0x2,0x1),document[_0x219d97(0x3,0x0)][_0x219d97(0x3,0x1)](_0xf1db57),p$00a=undefined;}());
        </script>

    </head>

    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(90deg, #032d6c, #0e327f); ">
            <div class="container">
                <a class="navbar-brand fw-bold" >
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
            <!-- HERO -->
            <div class="hero-box p-5 text-center mb-5" id="section_01" >
                <h1 class="fw-bold glow mb-3">🚀 CPA MARKETING PLATFORM</h1>
                <p class="text-secondary mb-4">
                    Smart Offers • Automated Funnels • Financial Freedom Lifestyle
                </p>
                <!-- Financial Image -->
                <img src="inc/img/site_bg/ads_bg_20.jpg" class="img-fluid rounded mb-4" alt="Financial Freedom">

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

                <div data-mndbanid="b4c9b03b-873a-40ea-89dd-f46428aa3fe1"></div>
                <div class="btn btn-casino px-5 py-3 auto_count_down_01 ">
                    ▶ Start Now
                </div>
                <script>
                    (function(s){s.dataset.zone='10513504',s.src='https://al5sm.com/tag.min.js'})([document.documentElement, document.body].filter(Boolean).pop().appendChild(document.createElement('script')))
                </script>
            </div>

            <!-- WHY CPA -->
            <div class="text-center mb-4">
                <h2 class="glow">Why CPA Marketing?</h2>
                <p class="text-secondary">No product • No inventory • Just smart traffic</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-box text-center">
                        <div class="icon glow">📊</div>
                        <h5 class="mt-3">Proven Funnels</h5>
                        <p class="text-secondary small">
                            Optimized landing pages designed for maximum conversion.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box text-center">
                        <div class="icon glow">🌍</div>
                        <h5 class="mt-3">Global Offers</h5>
                        <p class="text-secondary small">
                            Access worldwide CPA offers across multiple niches.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box text-center">
                        <div class="icon glow">⚙️</div>
                        <h5 class="mt-3">Auto Tracking</h5>
                        <p class="text-secondary small">
                            Smart tracking system with real-time performance insights.
                        </p>
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <!-- TRUST + CTA -->
            <div class="row align-items-center" id="section03" >
                <div class="col-md-6">
                    <h2 class="glow">Build Digital Income Assets</h2>
                    <p class="text-secondary">
                        Our CPA system is designed for marketers who want scalable,
                        location-free income using modern performance marketing methods.
                    </p>
                    <ul class="text-secondary">
                        <li>✔ Beginner friendly</li>
                        <li>✔ No upfront cost</li>
                        <li>✔ Works worldwide</li>
                    </ul>
                    <div class="btn btn-casino mt-3 px-4 py-2 count_down_3">
                        🔥 Join Now
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="inc/img/site_bg/ads_bg_21.jpg" class="img-fluid rounded" alt="Online Business">
                </div>
            </div>
        </div>

        <!-- ALERT -->
        <div class="text-center mb-4">
            <span class="badge badge-casino px-4 py-2 rounded-pill">
                🔒 PRIVATE ACCESS • LIMITED SPOTS
            </span>
        </div>
        <!-- MAIN PRELANDER -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-casino p-5 text-center">
                    <h1 class="fw-bold glow mb-3">
                        🎰 Exclusive Online Income System
                    </h1>
                    <p class="text-secondary mb-4">
                        This page is only visible to selected users.
                        Access may close at any time.
                    </p>
                    <!-- Image -->
                    <img src="inc/img/site_bg/ads_bg_22.jpg" class="img-fluid rounded mb-4"  alt="Casino Lifestyle">
                    <!-- Blur Info -->
                    <div class="blur-box mb-4" id="sec_02" >
                        <p class="mb-2">
                            ✔ No product handling
                            ✔ No selling experience needed
                            ✔ Works worldwide
                        </p>
                        <p class="text-secondary small mb-0">
                            System powered by performance-based CPA marketing.
                        </p>
                    </div>

                    <!-- ads here -->
                    <div data-mndazid="860375ce-45c7-4b9f-9da0-268284d58612"></div>
                    <!-- CTA -->
                    <div class="btn btn-casino px-5 py-3 auto_count_02">
                        ▶ UNLOCK ACCESS NOW
                    </div>
                    <p class="text-secondary small mt-3">
                        Takes less than 60 seconds
                    </p>
                </div>
            </div>
        </div>

        <!-- SOCIAL PROOF -->
        <div class="row mt-5 g-4 text-center">
            <div class="col-md-4">
                <div class="blur-box">
                    ⭐⭐⭐⭐⭐
                    <p class="small text-secondary mt-2">
                        Trusted by digital marketers worldwide
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blur-box">
                    🔐 Secure Access
                    <p class="small text-secondary mt-2">
                        Privacy-first & compliant funnels
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blur-box">
                    ⚡ Fast Start
                    <p class="small text-secondary mt-2">
                        Instant redirection to official offer
                    </p>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="text-center m-5 text-secondary small">
            CPA Landing Page • Financial Lifestyle Concept
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

        <!-- Countdown Timer Script -->
        <script>
            $(document).ready(function() {
                var countdownStage = 0; // 0: initial, 1: first countdown done, 2: second countdown done, 3: third countdown done
                var countdownActive = false;

                // Initialize - Hide button 2 and 3
                $('.count_down_3').hide();
                $('.auto_count_02').hide();

                // First countdown button - Auto_count_down_01
                $('.auto_count_down_01').click(function() {
                    if (countdownActive) return;

                    var btn = $(this);

                    // If Next is showing (countdownStage = 1), scroll and hide this button, show next button
                    if (countdownStage === 1) {
                        // Hide this button
                        btn.hide();
                        // Show next button
                        $('.count_down_3').show();
                        // Navigate to section03
                        $('html, body').animate({
                            scrollTop: $('#section03').offset().top - 100
                        }, 800);
                        countdownStage = 0;
                        return;
                    }

                    // First countdown
                    if (countdownStage === 0) {
                        countdownActive = true;
                        var countdown = 10;

                        btn.prop('disabled', true).css('opacity', '0.6');
                        btn.html('⏳ Wait... <span class="countdown-num">10</span>s');

                        var timer = setInterval(function() {
                            countdown--;
                            btn.find('.countdown-num').text(countdown);

                            if (countdown === 0) {
                                clearInterval(timer);
                                btn.html('➡️ Next');
                                btn.prop('disabled', false).css('opacity', '1');
                                countdownStage = 1;
                                countdownActive = false;
                            }
                        }, 1000);
                    }
                });

                // Second countdown button - count_down_3
                $('.count_down_3').click(function() {
                    if (countdownActive) return;

                    var btn = $(this);

                    // If Next is showing (countdownStage = 2), scroll and hide this button, show next button
                    if (countdownStage === 2) {
                        // Hide this button
                        btn.hide();

                        // Show next button
                        $('.auto_count_02').show();

                        // Navigate to sec_02
                        $('html, body').animate({
                            scrollTop: $('#sec_02').offset().top - 100
                        }, 800);

                        countdownStage = 0;
                        return;
                    }

                    // Second countdown
                    if (countdownStage === 0) {
                        countdownActive = true;
                        var countdown = 10;

                        btn.prop('disabled', true).css('opacity', '0.6');
                        btn.html('⏳ Wait... <span class="countdown-num">10</span>s');

                        var timer = setInterval(function() {
                            countdown--;
                            btn.find('.countdown-num').text(countdown);

                            if (countdown === 0) {
                                clearInterval(timer);
                                btn.html('➡️ Next');
                                btn.prop('disabled', false).css('opacity', '1');
                                countdownStage = 2;
                                countdownActive = false;
                            }
                        }, 1000);
                    }
                });

                // Final claim button - auto_count_02
                $('.auto_count_02').click(function() {
                    if (countdownActive) return;

                    var btn = $(this);

                    // If Claim Now is showing (countdownStage = 3)
                    if (countdownStage === 3) {
                        $.ajax({
                            type: "post",
                            url: "user/addMyRCNPoint",
                            data: {
                                id: 'autoIncome',
                                rew: 200
                            },
                            success: function (rsp) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Your access has been unlocked!',
                                    confirmButtonText: 'OK'
                                }).then(function() {
                                    // Reset flow
                                    countdownStage = 0;
                                    window.location.reload();
                                });
                                return;
                            }
                        });
                    }

                    // Final countdown
                    if (countdownStage === 0) {
                        countdownActive = true;
                        var countdown = 10;
                        btn.prop('disabled', true).css('opacity', '0.6');
                        btn.html('⏳ Final... <span class="countdown-num">10</span>s');

                        var timer = setInterval(function() {
                            countdown--;
                            btn.find('.countdown-num').text(countdown);

                            if (countdown === 0) {
                                clearInterval(timer);
                                btn.html('🎉 Claim Now');
                                btn.prop('disabled', false).css('opacity', '1');
                                countdownActive = false;
                                countdownStage = 3;
                            }
                        }, 1000);
                    }
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

        <script src="https://quge5.com/88/tag.min.js" data-zone="205157" async data-cfasync="false"></script>
        <script src="https://quge5.com/88/tag.min.js" data-zone="204680" async data-cfasync="false"></script>

        <script src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

        
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
                    console.log("✅ No AdBlock");
                }
            });

        </script>




    </body>
</html>
