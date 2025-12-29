<?php
    use App\Libraries\BanglaConverter;
    use Config\Database;
    $db = Database::connect();
?>





    <style>
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
        }

        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
        }

        .dashboard-card {
            background: rgba(30, 30, 60, 0.85);
            backdrop-filter: blur(15px);
            border: 3px solid #ffd700;
            border-radius: 25px;
            box-shadow: 0 15px 50px rgba(255, 215, 0, 0.4);
            transition: 0.4s;
        }

        .dashboard-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 70px rgba(255, 215, 0, 0.6);
        }

        .total-amount {
            font-size: 5rem;
            background: linear-gradient(90deg, #ffd700, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .status-badge {
            font-size: 1.2rem;
            padding: 10px 20px;
            border-radius: 50px;
        }

        .progress {
            height: 35px;
            border-radius: 20px;
            background: rgba(0,0,0,0.4);
        }

        .progress-bar{
            background: linear-gradient(45deg, #ffd700, #ff8c00);
            font-weight: bold;
            color: #fff !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .progress-text{
            color: #fff !important;
        }

    </style>



<br><br><br><br>

    <div id="particles-js"></div>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-warning">তোমার VIP ড্যাশবোর্ড</h1>
            <p class="lead" style="color: #a0a0ff;">স্বাগতম! আজকের তারিখ: <?= BanglaConverter::en2bn_day(date('l')) ?>, <?= BanglaConverter::en2bn(date('d')) ?> <?= BanglaConverter::en2bn_month(date('F')) ?>, <?= BanglaConverter::en2bn(date('Y')) ?></p>
            <span class="badge bg-success status-badge">স্ট্যাটাস: সক্রিয় </span>
        </div>

        <?php
            // মোট invested_amount (সংক্ষিপ্ত)
            $total_invested = array_reduce((array) ($user_packages ?? []), function ($carry, $pkg) {
                if (is_object($pkg)) $val = $pkg->invested_amount ?? $pkg->amount ?? 0;
                elseif (is_array($pkg)) $val = $pkg['invested_amount'] ?? $pkg['amount'] ?? 0;
                else $val = 0;
                return $carry + (float) $val;
            }, 0);
        ?>

        <!-- মোট ওভারভিউ -->
        <div class="row g-4 mb-5">
            <div class="col-12">
                <div class="dashboard-card p-4 text-center">
                    <h3 class="fw-bold">মোট ইনভেস্টমেন্ট</h3>
                    <h1 class="total-amount">৳ <?= BanglaConverter::en2bn(BanglaConverter::bd_money($total_invested)); ?></h1>
                </div>
            </div>
        </div>

        <!-- প্রত্যেক প্যাকেজের বিস্তারিত কার্ড -->
        <div class="row g-4">

            <?php foreach ($user_packages as $sngl) {
                $invest_pachage_roi = $db->table('user_invest_pachage_roi_insert')
                                    ->where('user_enroll_package_idd_unq', $sngl->user_id)
                                    ->get()
                                    ->getResult();

                $roi_total_amount = $db->table('user_invest_pachage_roi_insert')
                                    ->selectSum('roi_insert_amount')
                                    ->where('user_enroll_package_idd_unq', $sngl->user_id)
                                    ->get()
                                    ->getRow()
                                    ->roi_insert_amount;
                ?>
                <div class="col-md-4">
                    <div class="dashboard-card p-4">
                        <h4 class="text-center text-warning fw-bold"><?= $sngl->package_names ?? 'Package Name' ?></h4>
                        <h3 class="text-center mt-1 text-primary">৳ <?= BanglaConverter::en2bn(BanglaConverter::bd_money($sngl->invested_amount ?? $sngl->invest_amount ?? 0)); ?></h3>
                        <p class="text-center mt-1 ">কেনা: <?= BanglaConverter::en2bn_day(date('l', strtotime($sngl->enrollment_date))) ?>, <?= BanglaConverter::en2bn(date('d', strtotime($sngl->enrollment_date))) ?> <?= BanglaConverter::en2bn_month(date('F', strtotime($sngl->enrollment_date))) ?>, <?= BanglaConverter::en2bn(date('Y', strtotime($sngl->enrollment_date))) ?> | ROI: <?= BanglaConverter::en2bn($sngl->daily_return_percnts); ?>% </p>
                        <div class="progress ">
                            <div class="progress-bar " style="width: <?php echo ($sngl->expire_day_numberss / 100) * count($invest_pachage_roi); ?>%; background: linear-gradient(45deg, #4ecdc4, #ffd700);">
                                <?= BanglaConverter::en2bn(($sngl->expire_day_numberss / 100) * count($invest_pachage_roi)); ?>% সম্পন্ন (দিন <?= BanglaConverter::en2bn(count($invest_pachage_roi)); ?>/<?= BanglaConverter::en2bn($sngl->expire_day_numberss); ?>)
                            </div>
                        </div>
                        <p class="progress-text text-center mb-4 " style="font-style: italic; font-size: smaller;">
                            <?= BanglaConverter::en2bn(($sngl->expire_day_numberss / 100) * count($invest_pachage_roi)); ?>% সম্পন্ন (দিন <?= BanglaConverter::en2bn(count($invest_pachage_roi)); ?>/<?= BanglaConverter::en2bn($sngl->expire_day_numberss); ?>)
                        </p>
                        <p class="text-center">
                            স্ট্যাটাস: <?php if ($sngl->status == 1) { ?>
                                <span class="badge bg-success">চালু</span>
                            <?php }else { ?>
                                <span class="badge bg-danger">বন্ধ</span>
                            <?php } ?><br>প্রজেক্টেড রিটার্ন: ৳ <?= BanglaConverter::en2bn(BanglaConverter::bd_money(($sngl->expire_day_numberss * $sngl->daily_return_rate) ?? 0)); ?><br>বর্তমান রিটার্ন: ৳ <?= BanglaConverter::en2bn(BanglaConverter::bd_money($roi_total_amount ?? 0)); ?>
                        </p>
                        <p class="small text-white text-center">
                            ম্যাচিউরিটি: <?= BanglaConverter::en2bn_day(date('l', strtotime($sngl->expiry_date))).', '.BanglaConverter::en2bn(date('d', strtotime($sngl->expiry_date))).' '. BanglaConverter::en2bn_month(date('F', strtotime($sngl->expiry_date))).' '.BanglaConverter::en2bn(date('Y', strtotime($sngl->expiry_date))); ?>
                        </p>
                        <a class="btn badge status-badge text-white" style="background: linear-gradient(45deg, #5ac0b9ff, #944337ff, #544fd3ff)" href="user/mySinglePackage/<?= $sngl->id; ?>">বিস্তারিত দেখুন</a>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="text-center mt-5">
            <div class="alert alert-success">
                <h4>🎖️ VIP বেনিফিটস অ্যাকটিভ!</h4>
                <p>অতিরিক্ত ১% বোনাস ROI | ডেডিকেটেড সাপোর্ট | রিয়েল-টাইম আপডেট</p>
            </div>
            <p class="lead">তোমার ইনভেস্টমেন্ট শুরু হয়ে গেছে – দিন দিন বাড়বে! 🚀</p>
        </div>
    </div>

    <br><br><br><br>

    <!-- Particles.js -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 120 },
                "color": { "value": ["#ffd700", "#ff6b6b", "#4ecdc4"] },
                "opacity": { "value": 0.7 },
                "size": { "value": 5 },
                "line_linked": { "enable": true, "color": "#ffd700", "opacity": 0.4 },
                "move": { "speed": 3 }
            },
            "interactivity": {
                "events": { "onhover": { "enable": true, "mode": "repulse" } }
            }
        });
    </script>
























