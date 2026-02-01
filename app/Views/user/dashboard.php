<?php use App\Libraries\BanglaConverter; ?>
<?php

    $names = json_decode($dummy_user_data->username);

    // Step 2: Interval & Timestamp
    $interval = 6 * 60 * 60; // 6 hours in seconds
    $now = time();

    // Step 3: Calculate index
    $index = floor($now / $interval) % count($names);

?>





    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            color: #fff;
        }
        .glass {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }
        .sidebar {
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(15px);
            min-height: 100vh;
            border-right: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar a {
            color: #fff;
            border-radius: 15px;
            margin: 10px 20px;
            padding: 15px 20px !important;
            transition: all 0.4s;
            font-size: 1.1rem;
        }
        .sidebar a:hover, .sidebar a.active {
            background: rgba(255,255,255,0.25);
            transform: translateX(12px);
        }
        .card-investment {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            transition: all 0.4s;
            overflow: hidden;
        }
        .card-investment:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.4);
        }
        .count-up {
            font-size: 3rem;
            font-weight: 700;
            background: linear-gradient(135deg, #ffd194, #d1913c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .progress-circle {
            position: relative;
            width: 140px;
            height: 140px;
            margin: 20px auto;
        }
        .progress-circle svg {
            transform: rotate(-90deg);
        }
        .progress-circle .bg-circle { 
            stroke: rgba(255,255,255,0.2); 
            stroke-width: 12; 
            fill: none;
        }
        .progress-circle .fg-circle { 
            stroke-width: 12; 
            fill: none; 
            stroke-linecap: round;
            transition: stroke-dashoffset 1s ease;
        }
        .badge-premium {
            background: linear-gradient(45deg, #ffecd2, #fcb69f);
            color: #333;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: bold;
        }
        .action-btn {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(12px);
            border-radius: 50px;
            padding: 12px 24px;
            min-width: 180px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            transition: all 0.4s ease;
            text-decoration: none;
            color: #fff;
            font-weight: 600;
        }
        .action-btn i {
            font-size: 1.8rem;
            margin-right: 15px;
            transition: all 0.3s;
        }
        .action-btn span {
            font-size: 1.1rem;
        }
        .action-btn:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 15px 35px rgba(0,0,0,0.4);
        }
        .action-btn:hover i {
            transform: scale(1.2) rotate(10deg);
        }
        .btn-deposit { border: 2px solid #38ef7d; }
        .btn-deposit:hover { background: linear-gradient(45deg, #11998e, #38ef7d); }
        .btn-withdraw { border: 2px solid #ff6b6b; }
        .btn-withdraw:hover { background: linear-gradient(45deg, #ff6b6b, #ee5a52); }
        .btn-buy { border: 2px solid #f5576c; }
        .btn-buy:hover { background: linear-gradient(45deg, #f093fb, #f5576c); }
        .btn-history { border: 2px solid #00f2fe; }
        .btn-history:hover { background: linear-gradient(45deg, #4facfe, #00f2fe); }
        .btn-games { border: 2px solid #ff8c00; }
        .btn-games:hover { background: linear-gradient(45deg, #ffd700, #ff8c00); }



        .game-card{
            width: 100%;
            height: 250px;
            border-radius: 14px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            background-color: #111;
            position: relative;
            display: flex;
            align-items: flex-end;
            padding: 10px;
            box-shadow: 0 6px 18px rgba(0,0,0,.2);
            transition: transform .15s ease;
        }

        .game-card::before{
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(
            to top,
            rgba(0,0,0,.7),
            rgba(0,0,0,.1)
            );
            border-radius: inherit;
        }

        .game-card:hover{
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(0,0,0,.3);
        }

        .game-title{
            position: relative;
            z-index: 1;
            font-size: 25px;
            font-weight: 600;
            text-shadow: 0 2px 8px rgba(0,0,0,.6);
            line-height: 1.2;
        }


        /* Profit Button css */

        /* Floating Profit Button - Glow + Beautiful Bounce */
        .floating-profit-btn {
            position: absolute;
            top: 150px;
            right: 60px;
            z-index: 1000;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ffd700, #ffcc00, #ffaa00);
            color: #000;
            border: none;
            font-size: 1.2rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            overflow: hidden;
            animation: 
                beautifulBounce 1.8s infinite cubic-bezier(0.68, -0.55, 0.265, 1.55),
                glowPulse 2.8s infinite ease-in-out;
        }

        /* Beautiful Bounce - উপর-নিচে লাফানো + হালকা ঘুরে + স্মুথ */
        @keyframes beautifulBounce {
            0%, 100% {
                transform: translateY(0) scale(1) rotate(0deg);
            }
            40% {
                transform: translateY(-45px) scale(1.05) rotate(5deg);
            }
            60% {
                transform: translateY(-20px) scale(0.98) rotate(-3deg);
            }
        }

        /* Glow + হালকা পালস মিলিয়ে চকচকে ইফেক্ট */
        @keyframes glowPulse {
            0%, 100% {
                box-shadow: 
                    0 0 20px rgba(255, 215, 0, 0.7),
                    0 0 40px rgba(255, 215, 0, 0.5),
                    0 0 70px rgba(168, 85, 247, 0.4);
            }
            50% {
                box-shadow: 
                    0 0 40px rgba(255, 215, 0, 1),
                    0 0 70px rgba(255, 215, 0, 0.8),
                    0 0 120px rgba(168, 85, 247, 0.7);
            }
        }

        .floating-profit-btn:hover {
            animation-play-state: paused;
            transform: translateY(-15px) scale(1.18);
            box-shadow: 
                0 0 60px rgba(255, 215, 0, 1),
                0 0 100px rgba(168, 85, 247, 0.9);
            background: linear-gradient(135deg, #ffeb3b, #ffc107, #ff9800);
        }

        .floating-profit-btn:active {
            transform: translateY(-5px) scale(1.08);
        }

        .profit-icon {
            font-size: 2.6rem;
            margin-bottom: 6px;
            transition: transform 0.5s ease;
        }

        .profit-text {
            font-size: 1.15rem;
            line-height: 1;
            font-weight: 800;
        }

        .floating-profit-btn:hover .profit-icon {
            transform: rotate(360deg) scale(1.35);
        }

        /* মোবাইল অ্যাডজাস্টমেন্ট */
        @media (max-width: 576px) {
            .floating-profit-btn {
                width: 85px;
                height: 85px;
                top: 100px;
                right: 20px;
                font-size: 1rem;
            }
            .profit-icon {
                font-size: 2.2rem;
            }
            .profit-text {
                font-size: 0.9rem;
            }
            @keyframes beautifulBounce {
                0%, 100% { transform: translateY(0) scale(1) rotate(0deg); }
                40% { transform: translateY(-35px) scale(1.04) rotate(4deg); }
                60% { transform: translateY(-15px) scale(0.97) rotate(-2deg); }
            }
        }











.casino-winner {
    font-family: 'Impact', sans-serif;
    font-size: 1.6rem;
    background: linear-gradient(90deg, #ffd700, #ff6ec7, #00f0ff); /* gold → pink → cyan */
    background-size: 200% 200%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0 0 5px #ffd700, 0 0 10px #ff6ec7, 0 0 15px #00f0ff;
    display: inline-block;
    animation: neonShine 2.5s ease-in-out infinite alternate;
}

.casino-winner strong {
    font-size: 1.8rem;
    text-transform: uppercase;
}

@keyframes neonShine {
    0% {
        background-position: 0% 50%;
        text-shadow: 0 0 5px #ffd700, 0 0 10px #ff6ec7, 0 0 15px #00f0ff;
    }
    50% {
        background-position: 100% 50%;
        text-shadow: 0 0 10px #f50101, 0 0 15px #3b0909, 0 0 25px #033636;
    }
    100% {
        background-position: 0% 50%;
        text-shadow: 0 0 5px #ffd700, 0 0 10px #ff6ec7, 0 0 15px #00f0ff;
    }
}



    </style>


    <div class="container-fluid mt-5">
        <div class="row g-0 ">

            <!-- Main Content -->
            <div class="col-md-12 col-lg-12 p-5  ">

                <div class="mt-3" style="width: 80%; ">
                    <marquee class="text-center py-3">
                        <span style="font-family: 'Impact', sans-serif;font-size: 1.6rem;">সর্বোচ্চ রেফার দিয়ে ২,০০০/- জিতেছেন: <span class="casino-winner"> <?php echo " <strong> " . $names[$index].' </strong>'; ?> </span> অভিনন্দন! ✨</span>
                    </marquee>
                </div>

              <!-- Welcome Section Start -->
              <div class="glass p-5 rounded-4 mb-5 text-center">
                  <h1 class="display-4 mb-3">স্বাগতম, <strong style="background: linear-gradient(135deg,#ff9a9e,#fad0c4); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"><?= $my_info->user_full_name; ?></strong> <img width="80px" height="80px" src="<?= $user_batch->batch_img_path; ?>" alt="">✨</h1>
                  <p class="lead opacity-90">তারিখ: <?= date('d F, Y'); ?></p>
                  <span class="badge-premium fs-5"> <?= strtoupper($user_batch->batch_name.' Member'); ?> </span>

                    <!-- Social Buttons -->
                    <div class="d-flex justify-content-center gap-3 mt-3">

                        <!-- Telegram -->
                        <a href="https://t.me/royalchainnet" target="_blank" class="btn bg-primary text-white btn-lg rounded-circle p-3 shadow-sm" title="Telegram">
                            <i class="fa-brands fa-telegram fa-lg"></i>
                        </a>

                        <!-- WhatsApp -->
                        <a href="https://chat.whatsapp.com/LU4ns0NdJa5DBQhvvEBmfi" target="_blank" class="btn bg-success text-white btn-lg rounded-circle p-3 shadow-sm" title="WhatsApp">
                            <i class="fa-brands fa-whatsapp fa-lg"></i>
                        </a>

                        <!-- Facebook Page -->
                        <a href="https://facebook.com/royalchainnet" target="_blank" class="btn bg-primary text-white btn-lg rounded-circle p-3 shadow-sm" title="Facebook Page">
                            <i class="fa-brands fa-facebook-f fa-lg"></i>
                        </a>

                    </div>
                </div>







              <!-- Welcome Section End -->
              <?php if ($my_info->sts != 1) { ?>
                <div class="glass p-5 rounded-4 mb-5 text-center">
                  <h2 class="text-danger">আপনার অ্যাকাউন্ট একটিভ নয়</h2>
                  <p class="text-light">অনুগ্রহ করে আপনার অ্যাকাউন্ট একটিভ করুন। অ্যাকাউন্ট একটিভ করতে প্রথমে রিচার্জ করুন, এরপর যেকোনো একটি পন্য কিনলেই আপনার একাউন্ট একটিভ হয়ে যাবে</p>
                  <div class="d-flex justify-content-center gap-3">
                    <a href="user/viewAllProducts" class="action-btn btn-history">
                        <i class="fa-brands fa-product-hunt"></i>
                        <span>পন্য ক্রয়</span>
                    </a>
                  </div>
                </div>
              <?php }else{ ?>

                <!-- Animated Profit Button -->
                <div class="add_products_profit_show"></div>

                <h2 class="text-center mb-4">দ্রুত অ্যাকশন</h2>
                <div class="action-btn-group d-flex justify-content-center gap-4 mb-5 flex-wrap">
                  <a href="user/product-sells-income" class="action-btn btn-games">
                      <i class="fas fa-basket-shopping"></i>
                      <span>পন্য ক্রয়ের তথ্য</span>
                  </a>
                  <a href="user/allPackage" class="action-btn btn-deposit">
                      <i class="fas fa-money-bill-wave"></i>
                      <span>ইনভেস্ট প্যাকেজ</span>
                  </a>
                  <a href="user/myPackage" class="action-btn btn-deposit">
                      <i class="fas fa-money-bill-wave"></i>
                      <span>আমার কেনা প্যাকেজ</span>
                  </a>
                  <a href="user/deposites" class="action-btn btn-deposit">
                      <i class="fas fa-money-bill-wave"></i>
                      <span>রিচার্জ</span>
                  </a>
                  <a href="user/withdraw" class="action-btn btn-withdraw">
                      <i class="fas fa-wallet"></i>
                      <span>উইথড্র করুন</span>
                  </a>
                  <a href="user/balanceTransfer" class="action-btn btn-buy">
                      <i class="fas fa-shopping-cart"></i>
                      <span>ব্যালেন্স ট্রান্সফার</span>
                  </a>
                  <a href="user/viewAllProducts" class="action-btn btn-history">
                      <i class="fa-brands fa-product-hunt"></i>
                      <span>পন্য ক্রয়</span>
                  </a>
                  <a href="user/gamming_pages" class="action-btn btn-games">
                      <i class="fas fa-dice"></i>
                      <span>গেমস খেলুন 🎰</span>
                  </a>
                  <a href="user/referrals" class="action-btn btn-games">
                      <i class="fas fa-history"></i>
                      <span>রেফার হিস্টোরি</span>
                  </a>
                  <a href="user/inactive_referrals" class="action-btn btn-games">
                      <i class="fa fa-user-times"></i>
                      <span>ইনএকটিভ রেফার </span>
                  </a>
                  <a href="user/add_referral" class="action-btn btn-games">
                      <i class="fas fa-user"></i>
                      <span>নতুন রেফারাল যোগ </span>
                  </a>
                  <a href="user/myWalletss" class="action-btn btn-games">
                      <i class="fas fa-users"></i>
                      <span>আমার টিম </span>
                  </a>
                  <a href="user/incomeDetails" class="action-btn btn-games">
                      <i class="fas fa-chart-line"></i>
                      <span>আয়ের ড্যাশবোর্ড</span>
                  </a>
                </div>


<h2 class="text-center mb-3 fw-bold">জনপ্রিয় গেমসগুলি</h2>
<div class="row g-3 mb-5 ">

  <div class="col-6 col-md-3 col-lg-3">
    <a href="games/taptap" class="game-card text-white text-decoration-none" style="background-image: url('inc/img/games_view/tap_tap_games.png');">
      <span class="game-title">Tap Tap Games</span>
    </a>
  </div>

</div>





                <!-- Summary Cards -->
                <div class="row g-4 mb-5">
                  <div class="col-md-4">
                      <div class="glass p-4 text-center rounded-4">
                          <i class="fas fa-wallet fa-4x mb-3 text-warning opacity-70"></i>
                          <h5>মোট ব্যালেন্স</h5>
                          <h2 class="count-up" data-target="<?= BanglaConverter::en2bn($current_wallet_balance); ?>">৳<?= BanglaConverter::en2bn($current_wallet_balance); ?></h2>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="glass p-4 text-center rounded-4">
                          <i class="fas fa-users fa-4x mb-3 text-info opacity-70"></i>
                          <h5>ডাউনলাইন মেম্বার</h5>
                          <h2 class="count-up"><?= $downline_count; ?></h2>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="glass p-4 text-center rounded-4">
                          <i class="fas fa-gem fa-4x mb-3 text-success opacity-70"></i>
                          <h5>মোট ROI আর্নিং</h5>
                          <h2 class="count-up" data-target="142300">৳0</h2>
                      </div>
                  </div>
                </div>

                <!-- Investment Packages -->
                <div class="row g-5">

                    <!--
                    <div class="col-lg-4 col-md-6">
                            <div class="card-investment text-white p-4">
                                <div class="text-center mb-4">
                                    <h4 class="fw-bold">Starter Pack</h4>
                                    <h2>৳৩০,০০০</h2>
                                </div>
                                <div class="progress-circle">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                                        <h3 class="mb-0">70%</h3>
                                        <small>সম্পন্ন</small>
                                    </div>
                                </div>
                                <ul class="list-unstyled mt-4 text-center">
                                    <li><strong>ROI পেয়েছেন:</strong> ৳২১,০০০</li>
                                    <li><strong>মেয়াদ:</strong> ১৮০ দিন</li>
                                    <li><strong>বাকি:</strong> ৫৪ দিন</li>
                                    <li><strong>দৈনিক রিটার্ন:</strong> ০.৮%</li>
                                </ul>
                            </div>
                        </div>

                    </div> -->

                    <!-- Referral Link -->
                    <div class="glass p-5 rounded-4 mt-5 text-center">
                        <h4 class="mb-4">তোমার ব্যক্তিগত রেফারেল লিঙ্ক</h4>
                        <div class="input-group input-group-lg w-75 mx-auto">
                            <input type="text" class="form-control" value="<?= base_url('register_ref/' . $my_info->user_reffer_code_times) ?>" id="referralLink" readonly>
                            <button class="btn btn-outline-light btn-lg px-5"  onclick="copyLink()"><i class="fas fa-copy me-2"></i>কপি করুন</button>
                        </div>
                        <p class="mt-4 fs-5 opacity-90">এখন পর্যন্ত <strong class="text-warning"><?= $downline_count; ?> জন</strong> তোমার টিম যোগ হয়েছে! 🔥</p>
                    </div>

              <?php } ?>
            </div>
        </div>
    </div>



    <script>
        function copyLink() {
            var copyText = document.getElementById("referralLink");
            copyText.select();
            document.execCommand("copy");
            alert("Referral link copied!");
        }

        get_uncompleted_products()
        function get_uncompleted_products() {
            $.ajax({
                type: "post",
                url: "user/getUncompletedProducts",
                data: "",
                dataType: "json",
                success: function (r) {

                    if (r.product_sell_status && r.product_sell_status.length > 0) {
                        let html_view = '';

                        for (let l = 0; l < r.product_sell_status.length; l++) {
                            if (r.product_sell_status[l].status == 'n') {
                                html_view += `<div class="floating-profit-btn add_profit_btns" id="profitBtn" sells_id="${r.product_sell_status[l].sel_id}" product_id="${r.product_sell_status[l].prod_id}" product_buy_id="${r.product_sell_status[l].prod_buy_id}" profit="${r.product_sell_status[l].profit}" style="cursor: pointer;">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i class="fas fa-trophy profit-icon"></i>
                                                    <span class="profit-text"> Profit</span>
                                                </div>
                                            </div>`;
                            }else if(r.product_sell_status[l].status == 'c') {
                                html_view += `<div class="floating-profit-btn add_profit_btns" id="profitBtn" sells_id="${r.product_sell_status[l].sel_id}" product_id="${r.product_sell_status[l].prod_id}" product_buy_id="${r.product_sell_status[l].prod_buy_id}" profit="${r.product_sell_status[l].profit}" style="cursor: pointer;">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i class="fas fa-trophy profit-icon"></i>
                                                    <span class="profit-text"> Profit</span>
                                                </div>
                                            </div>`;
                            }
                        }
                        $('.add_products_profit_show').html(html_view);
                        assign_wallet_balance();
                    }else {
                        $('.add_products_profit_show').html('');
                        assign_wallet_balance();
                    }
                }
            });
        }

        $(document).on('click', '.add_profit_btns', function () {
            let sells_id = $(this).attr('sells_id');
            let product_id = $(this).attr('product_id');
            let product_buy_id = $(this).attr('product_buy_id');
            let profit = $(this).attr('profit');

            $.ajax({
                type: "post",
                url: "user/add_profit_in_sell_products",
                beaforeSend: function () {
                    $('.add_products_profit_show').html(' ');
                },
                data: {
                    sells_id: sells_id,
                    product_buy_id: product_buy_id,
                    product_id: product_id
                },
                success: function (ress) {
                    get_uncompleted_products();
                    assign_wallet_balance();
                    Swal.fire({
                        title: `অভিনন্দন! ${profit}/- যোগ হয়েছে।`,
                        text: `অভিনন্দন! আপনার ক্রয়কৃত প্রোডাক্ট এর আজকের বোনাস যোগ হয়েছে। ${profit}/- `,
                        icon: "success"
                    });
                }
            });
        });




    </script>









