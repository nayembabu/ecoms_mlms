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

        .gv-victory-container {
            text-align: center;
            opacity: 0; /* প্রথমে hidden */
        }
        .gv-main-text {
            font-size: 2rem;
            font-weight: bold;
            text-shadow: 0 0 20px #ff0080, 0 0 40px #ff0080;
            color: #ffd700;
        }
        .gv-trophy {
            font-size: 6rem;
            animation: gv-bounce 2s infinite;
        }
        .gv-fire {
            font-size: 1.5rem;
            animation: gv-pulse 1.5s infinite;
        }
        @keyframes gv-bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        @keyframes gv-pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }



        /* ==================== FLOATING BUTTON ==================== */
        .floating-btn {
            position: fixed;
            bottom: 25px;
            left: 25px;
            z-index: 1000;
            cursor: pointer;
            animation: float 3s ease-in-out infinite;
        }

        .floating-btn .glow-ring {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, #ffd700, #ff4500, #ffd700);
            filter: blur(10px);
            opacity: 0.7;
            animation: pulse-glow 2s ease-in-out infinite;
        }

        .floating-btn .btn-inner {
            position: relative;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(145deg, #ffd700, #b8860b);
            border: 4px solid #ffec8b;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(255, 215, 0, 0.4);
            transition: transform 0.3s ease;
        }

        .floating-btn:hover .btn-inner {
            transform: scale(1.1);
        }

        .floating-btn .wheel-icon {
            font-size: 35px;
            animation: spin-slow 4s linear infinite;
        }

        .floating-btn .badge {
            position: absolute;
            top: -8px;
            left: -8px;
            background: #dc2626;
            color: white;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
            border: 2px solid white;
            animation: bounce 1s ease infinite;
        }

        /* ==================== MODAL OVERLAY ==================== */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(8px);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.active {
            display: flex;
        }

        /* ==================== SPIN WHEEL CONTAINER ==================== */
        .spin-container {
            position: relative;
            width: 100%;
            max-width: 420px;
            background: linear-gradient(180deg, #1f1f1f 0%, #0d0d0d 100%);
            border-radius: 24px;
            padding: 25px;
            border: 2px solid #ffd700;
            box-shadow: 
                0 0 40px rgba(255, 215, 0, 0.3),
                inset 0 0 30px rgba(255, 215, 0, 0.05);
        }

        /* Decorative Lights */
        .lights-row {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .light {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            animation: blink 1s ease-in-out infinite;
        }

        .light:nth-child(odd) { background: #ffd700; box-shadow: 0 0 10px #ffd700; }
        .light:nth-child(even) { background: #ff4500; box-shadow: 0 0 10px #ff4500; animation-delay: 0.5s; }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .total-earnings {
            background: linear-gradient(145deg, #ffd700, #b8860b);
            color: #000;
            font-weight: 700;
            padding: 8px 18px;
            border-radius: 25px;
            font-size: 14px;
        }

        .close-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #dc2626;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .close-btn:hover {
            background: #b91c1c;
            transform: scale(1.1);
        }

        /* Title */
        .title {
            text-align: center;
            font-size: 28px;
            font-weight: 800;
            color: #ffd700;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
            margin-bottom: 25px;
        }

        /* ==================== WHEEL ==================== */
        .wheel-wrapper {
            position: relative;
            display: flex;
            justify-content: center;
            margin-bottom: 25px;
        }

        /* Pointer Arrow */
        .pointer {
            position: absolute;
            top: -5px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            width: 0;
            height: 0;
            border-left: 18px solid transparent;
            border-right: 18px solid transparent;
            border-top: 40px solid #ffd700;
            filter: drop-shadow(0 3px 6px rgba(0,0,0,0.5));
        }

        /* Outer Ring */
        .wheel-outer {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: linear-gradient(145deg, #ffd700, #b8860b);
            padding: 10px;
            box-shadow: 
                0 0 30px rgba(255, 215, 0, 0.5),
                inset 0 0 20px rgba(0,0,0,0.3);
            animation: pulse-ring 2s ease-in-out infinite;
        }

        .wheel {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            position: relative;
            overflow: hidden;
            transition: transform 4s cubic-bezier(0.17, 0.67, 0.12, 0.99);
        }

        .wheel-svg {
            width: 100%;
            height: 100%;
        }

        /* Center Button */
        .wheel-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(145deg, #ffd700, #b8860b);
            border: 4px solid #ffec8b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.4);
        }

        /* ==================== SPIN BUTTON ==================== */
        .spin-btn {
            width: 100%;
            padding: 18px;
            border: none;
            border-radius: 16px;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(145deg, #dc2626, #991b1b);
            color: white;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            box-shadow: 0 8px 25px rgba(220, 38, 38, 0.4);
        }

        .spin-btn:hover:not(:disabled) {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 12px 35px rgba(220, 38, 38, 0.5);
        }

        .spin-btn:disabled {
            background: #374151;
            color: #9ca3af;
            cursor: not-allowed;
            box-shadow: none;
        }

        /* ==================== RESULT ==================== */
        .result {
            display: none;
            margin-top: 20px;
            padding: 18px;
            border-radius: 14px;
            text-align: center;
            font-size: 18px;
            font-weight: 600;
            animation: fadeIn 0.5s ease;
        }

        .result.win {
            display: block;
            background: rgba(22, 163, 74, 0.2);
            border: 2px solid #22c55e;
            color: #4ade80;
        }

        .result.lose {
            display: block;
            background: rgba(75, 85, 99, 0.2);
            border: 2px solid #6b7280;
            color: #9ca3af;
        }

        /* ==================== CONFETTI ==================== */
        .confetti-container {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 3000;
            overflow: hidden;
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            animation: confetti-fall 3s linear forwards;
        }

        /* ==================== ANIMATIONS ==================== */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }

        @keyframes pulse-glow {
            0%, 100% { opacity: 0.5; transform: scale(1); }
            50% { opacity: 0.9; transform: scale(1.1); }
        }

        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }

        @keyframes pulse-ring {
            0%, 100% { box-shadow: 0 0 30px rgba(255, 215, 0, 0.5); }
            50% { box-shadow: 0 0 50px rgba(255, 215, 0, 0.8); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes confetti-fall {
            0% {
                transform: translateY(-100px) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }

        /* ==================== RESPONSIVE ==================== */
        @media (max-width: 480px) {
            .spin-container { padding: 20px 15px; }
            .title { font-size: 22px; }
            .wheel-outer { width: 260px; height: 260px; }
            .spin-btn { font-size: 18px; padding: 15px; }
        }
    </style>


    <div class="container-fluid mt-5">
        <div class="row g-0 ">

            <!-- Main Content -->
            <div class="col-md-12 col-lg-12 p-5 row  ">

              <!-- Welcome Section Start -->
                <div class="glass p-5 rounded-4 mb-5 text-center col-6 col-md-6 col-lg-6  ">
                  <h1 class="display-4 mb-3"><a href="http://www.fiverr.com/s/0bLjlZv" target="_blank" rel="noopener noreferrer" class="text-white "> স্বাগতম, </a><strong style="background: linear-gradient(135deg,#ff9a9e,#fad0c4); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"><?= $my_info->user_full_name; ?></strong> <img width="80px" height="80px" src="<?= $user_batch->batch_img_path; ?>" alt="">✨</h1>
                  <p class="lead opacity-90">তারিখ: <?= date('d F, Y'); ?></p>
                  <span class="badge-premium fs-5"><a href="http://www.fiverr.com/s/0bLjlZv" target="_blank" rel="noopener noreferrer" class=" "> <?= strtoupper($user_batch->batch_name.' Member'); ?>  </a></span>

                    <!-- Social Buttons -->
                    <div class="d-flex justify-content-center gap-3 mt-3">

                        <!-- Telegram -->
                        <a href="https://t.me/royal_chain_net" target="_blank" class="btn bg-primary text-white btn-lg rounded-circle p-3 shadow-sm" title="Telegram">
                            <i class="fa-brands fa-telegram fa-lg"></i>
                        </a>

                        <!-- Telegram -->
                        <a href="https://t.me/royalchainnets" target="_blank" class="btn bg-primary text-white btn-lg rounded-circle p-3 shadow-sm" title="Telegram">
                            <i class="fa-brands fa-telegram fa-lg"></i>
                        </a>

                        <!-- WhatsApp -->
                        <a href="https://chat.whatsapp.com/HOTHzwt1I57LAjZ1bLpeVs" target="_blank" class="btn bg-success text-white btn-lg rounded-circle p-3 shadow-sm" title="WhatsApp">
                            <i class="fa-brands fa-whatsapp fa-lg"></i>
                        </a>

                        <!-- Facebook Page -->
                        <a href="https://facebook.com/royalchainnet" target="_blank" class="btn bg-primary text-white btn-lg rounded-circle p-3 shadow-sm" title="Facebook Page">
                            <i class="fa-brands fa-facebook-f fa-lg"></i>
                        </a>

                    </div>
                </div>

                <div class="glass p-3 rounded-4 mb-5 text-center col-6 col-md-6 col-lg-6  ">
                    <div class="gv-victory-container">
                        <div class="gv-trophy">🏆</div>
                        <div class="gv-main-text">সর্বোচ্চ রেফার দিয়েছেন</div>
                        <div class="gv-main-text display-1"><?php echo " <strong> " . $names[$index].' </strong>'; ?></div>
                        <div class="gv-fire mt-4">
                            🔥🔥 ২,০০০/- টাকা জিতেছেন 🔥🔥
                        </div>
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



    <!-- ========== FLOATING SPIN BUTTON ========== -->
     <div class="floating-spin-btn_set"><?= $spin_wheel_style; ?></div>




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


    <!-- ========== LUCKY WHEEL MODAL START ========== -->
    <div class="modal-overlay" id="modal">
        <div class="spin-container">
            <!-- Decorative Lights -->
            <div class="lights-row">
                <div class="light"></div>
                <div class="light"></div>
                <div class="light"></div>
                <div class="light"></div>
                <div class="light"></div>
                <div class="light"></div>
                <div class="light"></div>
            </div>

            <!-- Header -->
            <div class="header">
                <div class="total-earnings">💰 মোট: ৳<span id="totalAmount">0</span></div>
                <button class="close-btn" id="closeModal">×</button>
            </div>

            <!-- Title -->
            <h1 class="title">🎰 স্পিন করে জিতুন! 🎰</h1>

            <!-- Wheel -->
            <div class="wheel-wrapper">
                <div class="pointer"></div>
                <div class="wheel-outer">
                    <div class="wheel" id="wheel">
                        <svg class="wheel-svg" viewBox="0 0 100 100">
                            <!-- Segments will be generated by JS -->
                        </svg>
                        <div class="wheel-center">💰</div>
                    </div>
                </div>
            </div>

            <!-- Spin Button -->
            <button class="spin-btn" id="spinBtn">🎲 স্পিন করুন!</button>

            <!-- Result -->
            <div class="result" id="result"></div>
        </div>
    </div>

    <!-- Confetti Container -->
    <div class="confetti-container" id="confetti"></div>
    <!-- ========== LUCKY WHEEL MODAL END ========== -->


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


        $(document).ready(function() {
            // কন্টেইনার fadeIn + slideDown
            $(".gv-victory-container")
                .delay(500)
                .animate({ opacity: 1 }, 1000)
                .effect("slide", { direction: "up" }, 1000);

            // মেইন টেক্সট scale up + pulsate
            $(".gv-main-text")
                .delay(1500)
                .animate({ fontSize: "2.5rem" }, 800)
                .effect("pulsate", { times: 3 }, 1000);

            // ট্রফি bounce শুরু
            $(".gv-trophy")
                .delay(1000)
                .effect("bounce", { times: 5, distance: 30 }, 1000);


            // ========== CONFIGURATION ==========
            const prizes = [
                { label: '৳5', color: '#dc2626', value: 5 },
                { label: '৳10', color: '#16a34a', value: 10 },
                { label: '৳2', color: '#7c3aed', value: 2 },
                { label: '৳50', color: '#0891b2', value: 50 },
                { label: '৳1', color: '#ea580c', value: 1 },
                { label: '৳100', color: '#c026d3', value: 100 },
                { label: '৳20', color: '#0284c7', value: 20 },
                { label: '০', color: '#374151', value: 0 }
            ];

            let totalEarnings = 0;
            let currentRotation = 0;
            let isSpinning = false;

            // ========== GENERATE WHEEL SEGMENTS ==========
            function generateWheel() {
                const segmentAngle = 360 / prizes.length;
                let svgContent = '';

                prizes.forEach((prize, index) => {
                    const startAngle = index * segmentAngle;
                    const endAngle = startAngle + segmentAngle;
                    const startRad = (startAngle - 90) * (Math.PI / 180);
                    const endRad = (endAngle - 90) * (Math.PI / 180);

                    const x1 = 50 + 50 * Math.cos(startRad);
                    const y1 = 50 + 50 * Math.sin(startRad);
                    const x2 = 50 + 50 * Math.cos(endRad);
                    const y2 = 50 + 50 * Math.sin(endRad);

                    const largeArc = segmentAngle > 180 ? 1 : 0;

                    const textAngle = startAngle + segmentAngle / 2;
                    const textRad = (textAngle - 90) * (Math.PI / 180);
                    const textX = 50 + 32 * Math.cos(textRad);
                    const textY = 50 + 32 * Math.sin(textRad);

                    svgContent += `
                        <path d="M 50 50 L ${x1} ${y1} A 50 50 0 ${largeArc} 1 ${x2} ${y2} Z" 
                              fill="${prize.color}" stroke="#1a1a1a" stroke-width="0.5"/>
                        <text x="${textX}" y="${textY}" fill="white" font-size="6" font-weight="bold" 
                              text-anchor="middle" dominant-baseline="middle"
                              transform="rotate(${textAngle}, ${textX}, ${textY})"
                              style="text-shadow: 1px 1px 2px rgba(0,0,0,0.8)">
                            ${prize.label}
                        </text>
                    `;
                });

                $('.wheel-svg').html(svgContent);
            }

            // ========== SPIN WHEEL ==========
            function spinWheel() {
                if (isSpinning) return;

                isSpinning = true;
                $('#spinBtn').prop('disabled', true).text('⏳ ঘুরছে...');
                $('#result').removeClass('win lose').hide();

                // Calculate spin
                const spins = 5 + Math.random() * 5;
                const segmentAngle = 360 / prizes.length;
                const randomSegment = Math.floor(Math.random() * prizes.length);
                const extraAngle = randomSegment * segmentAngle + segmentAngle / 2;
                const totalRotation = currentRotation + spins * 360 + extraAngle;

                currentRotation = totalRotation;

                // Animate wheel
                $('#wheel').css('transform', `rotate(${totalRotation}deg)`);

                // Calculate result after spin
                setTimeout(function() {
                    const normalizedRotation = totalRotation % 360;
                    const winningIndex = Math.floor((360 - normalizedRotation + segmentAngle / 2) / segmentAngle) % prizes.length;
                    const prize = prizes[winningIndex];
                    $('#totalAmount').text(prize.value);

                    if (prize.value > 0) {
                        $('#result')
                            .removeClass('lose')
                            .addClass('win')
                            .html(`🎉 অভিনন্দন! আপনি জিতেছেন <strong>৳${prize.value}</strong>!`)
                            .show();
                            addAmountSpinPrice(prize.value);
                        createConfetti();
                    } else {
                        $('#result')
                            .removeClass('win')
                            .addClass('lose')
                            .html('😔 এবার ভাগ্য সহায় হয়নি। আবার চেষ্টা করুন!')
                            .show();
                    }

                    isSpinning = false;
                }, 4000);
            }

            // ========== CONFETTI EFFECT ==========
            function createConfetti() {
                const colors = ['#ffd700', '#ff0000', '#00ff00', '#0000ff', '#ff00ff', '#00ffff'];
                const container = $('#confetti');

                for (let i = 0; i < 50; i++) {
                    const confetti = $('<div class="confetti"></div>');
                    confetti.css({
                        left: Math.random() * 100 + '%',
                        backgroundColor: colors[Math.floor(Math.random() * colors.length)],
                        animationDelay: Math.random() * 0.5 + 's',
                        animationDuration: (2 + Math.random() * 2) + 's'
                    });
                    container.append(confetti);

                    setTimeout(() => confetti.remove(), 3500);
                }
            }

            // ========== EVENT HANDLERS ==========
            $('#openModal').on('click', function() {
                $('#modal').addClass('active');
            });

            $('#closeModal').on('click', function() {
                $('#modal').removeClass('active');
            });

            $('#modal').on('click', function(e) {
                if (e.target === this) {
                    $(this).removeClass('active');
                }
            });

            $('#spinBtn').on('click', spinWheel);

            // Initialize wheel
            generateWheel();

            function addAmountSpinPrice(amnt) {
                $.ajax({
                    type: "post",
                    url: "user/addSpinPrice",
                    data: {
                        taka: amnt
                    },
                    success: function (rsp) {
                        window.location.reload();
                        $('#spinBtn').prop('disabled', true).text('⏳ ঘুরছে...');
                    }
                });
            }
        });


    </script>









