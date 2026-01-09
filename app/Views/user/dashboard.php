<?php use App\Libraries\BanglaConverter; ?>



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
    </style>


    <div class="container-fluid mt-5">
        <div class="row g-0 ">

            <!-- Main Content -->
            <div class="col-md-12 col-lg-12 p-5 mt-4 ">
              <!-- Welcome Section Start -->
              <div class="glass p-5 rounded-4 mb-5 text-center">
                  <h1 class="display-4 mb-3">স্বাগতম, <strong style="background: linear-gradient(135deg,#ff9a9e,#fad0c4); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"><?= $my_info->user_full_name; ?></strong> <img width="80px" height="80px" src="<?= $user_batch->batch_img_path; ?>" alt="">✨</h1>
                  <p class="lead opacity-90">তারিখ: <?= date('d F, Y'); ?></p>
                  <span class="badge-premium fs-5"> <?= strtoupper($user_batch->batch_name.' Member'); ?> </span>
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
                  <a href="user/myWallet" class="action-btn btn-deposit">
                      <i class="fas fa-money-bill-wave"></i>
                      <span>ওয়ালেট</span>
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
    </script>









