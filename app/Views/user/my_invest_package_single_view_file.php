
<?php
    use App\Libraries\BanglaConverter;
    use Config\Database;
    $db = Database::connect();
?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
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

        .detail-card {
            background: rgba(30, 30, 60, 0.85);
            backdrop-filter: blur(15px);
            border: 3px solid #ffd700;
            border-radius: 25px;
            box-shadow: 0 15px 50px rgba(255, 215, 0, 0.4);
            transition: 0.4s;
        }

        .detail-card:hover {
            transform: translateY(-10px);
        }

        .popular-badge {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            padding: 10px 30px;
            border-radius: 50px;
            font-weight: bold;
            box-shadow: 0 5px 20px rgba(255, 107, 107, 0.6);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 5px 20px rgba(255, 107, 107, 0.6); }
            50% { box-shadow: 0 10px 40px rgba(255, 107, 107, 0.9); }
            100% { box-shadow: 0 5px 20px rgba(255, 107, 107, 0.6); }
        }

        .amount {
            font-size: 5rem;
            background: linear-gradient(90deg, #ffd700, #ffecd2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 30px rgba(255, 215, 0, 0.5);
        }

        .chart-container {
            background: rgba(0,0,0,0.3);
            border-radius: 20px;
            padding: 20px;
        }

        .table {
            background: rgba(0,0,0,0.3);
        }

        .table th {
            background: linear-gradient(45deg, #1a1a3d, #2d1b69);
            color: #ffd700;
        }
    </style>



    <div id="particles-js"></div>

    <div class="container py-5 mt-5 ">
        <div class="text-center mb-5 position-relative mt-5 ">
            <h1 class="display-4 fw-bold text-warning mb-2 ">
                <?= $single_invest_package->package_names; ?> - সম্পূর্ণ ড্যাশবোর্ড
            </h1>
            <!-- <div class="popular-badge"><h1><?= $single_invest_package->package_names; ?></h1></div> -->
            <p class="lead" style="color: #a0a0ff;">আজকের তারিখ: <?= BanglaConverter::en2bn_day(date('l')).', '.BanglaConverter::en2bn(date('d')).' '. BanglaConverter::en2bn_month(date('F')).' '.BanglaConverter::en2bn(date('Y')); ?> </p>

            <?php if ($single_invest_package->status == 1) { ?>
                <span class="badge bg-success fs-5">
                    স্ট্যাটাস: সক্রিয়
                </span>
            <?php }else { ?>
                <span class="badge bg-danger fs-5">
                    স্ট্যাটাস: বন্ধ
                </span>
            <?php } ?>
        </div>

        <!-- মূল তথ্য -->
        <div class="row g-4 mb-5">
            <div class="col-12">
                <div class="detail-card p-5 text-center">
                    <h2 class="amount my-4">৳<?= BanglaConverter::en2bn(BanglaConverter::bd_money($single_invest_package->invested_amount)); ?></h2>
                    <p class="lead">ইনভেস্টমেন্ট শুরু: <?= BanglaConverter::en2bn(date('d', strtotime($single_invest_package->start_date))).' '. BanglaConverter::en2bn_month(date('F', strtotime($single_invest_package->start_date))).' '.BanglaConverter::en2bn(date('Y', strtotime($single_invest_package->start_date))); ?> (<?= BanglaConverter::en2bn_day(date('l', strtotime($single_invest_package->start_date))) ?>)</p>
                    <div class="row">
                        <div class="col-md-3"><h5>দৈনিক ROI (%)</h5><h3 class="text-success"><?= BanglaConverter::en2bn($single_invest_package->daily_return_percnts); ?>%</h3></div>
                        <div class="col-md-3"><h5>দৈনিক ROI (৳)</h5><h3 class="text-primary">৳<?= BanglaConverter::en2bn($single_invest_package->daily_return_rate); ?></h3></div>
                        <div class="col-md-3"><h5>লক-ইন পিরিয়ড</h5><h3 class="text-warning"><?= BanglaConverter::en2bn($single_invest_package->expire_day_numberss); ?> দিন</h3></div>
                        <div class="col-md-3"><h5>মোট রিটার্ন</h5><h3 class="text-info">৳<?= BanglaConverter::en2bn(($single_invest_package->invested_amount * $single_invest_package->daily_return_percnts / 100) * $single_invest_package->expire_day_numberss); ?> </h3></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- ROI গ্রোথ চার্ট -->
            <div class="col-lg-8">
                <div class="detail-card chart-container">
                    <h4 class="text-center text-warning mb-4">প্রজেক্টেড ব্যালেন্স গ্রোথ (১২ মাস)</h4>
                    <canvas id="roiChart" height="120"></canvas>
                </div>

                <div class="detail-card chart-container mt-4">
                    <h4 class="text-center text-warning mb-4">দৈনিক রিটার্ন ব্রেকডাউন</h4>
                    <table id="dataTable_bs5" class="table table-bordered text-white">
                        <thead>
                            <tr>
                                <th class="text-center " >তারিখ</th>
                                <th class="text-center " >রিটার্ন (%)</th>
                                <th class="text-center " >রিটার্ন টাকা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (empty($invest_pachage_roi)) {?>
                                    <tr>
                                        <td></td>
                                        <td align="center">কোনো রিটার্ন পাওয়া যায়নি।</td>
                                        <td></td>
                                    </tr>
                                <?php }else { foreach ($invest_pachage_roi as $return) { ?>
                                    <tr>
                                        <td align="center"><?= BanglaConverter::en2bn(date('d F Y', strtotime($return->roi_insert_dates))); ?></td>
                                        <td align="center"><?= BanglaConverter::en2bn($return->insert_roi_percentagesss); ?>%</td>
                                        <td align="right">৳<?= BanglaConverter::en2bn($return->roi_insert_amount); ?></td>
                                    </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- সাইড তথ্য -->
            <div class="col-lg-4">
                <div class="detail-card p-4 text-center">
                    <h5 class="text-warning">লক-ইন প্রোগ্রেস</h5>
                    <canvas id="progressCircle" width="220" height="220"></canvas>
                    <p class="mt-3 fs-5">
                        <?= BanglaConverter::en2bn(count($invest_pachage_roi)); ?>% সম্পন্ন<br>
                        <small>দিন <?= BanglaConverter::en2bn(count($invest_pachage_roi)); ?> / <?= BanglaConverter::en2bn($single_invest_package->expire_day_numberss); ?></small><br>
                        ম্যাচিউরিটি: <?= BanglaConverter::en2bn(date('d', strtotime($single_invest_package->expiry_date))) ?> <?= BanglaConverter::en2bn_month(date('F', strtotime($single_invest_package->expiry_date))) ?> <?= BanglaConverter::en2bn(date('Y', strtotime($single_invest_package->expiry_date))) ?>
                    </p>
                </div>

                <div class="detail-card p-4 mt-4">
                    <h5 class="text-warning">রিস্ক অ্যানালাইসিস</h5>
                    <ul class="list-unstyled">
                        <li>রিস্ক লেভেল: <strong class="text-info">লো-মিডিয়াম</strong></li>
                        <li>ভোলাটিলিটি: নিম্ন</li>
                        <li>ক্যাপিটাল প্রটেকশন: ১০০%</li>
                        <li>ইনফ্লেশন প্রটেকশন: হ্যাঁ</li>
                    </ul>
                </div>

                <div class="detail-card p-4 mt-4 text-center">
                    <h5 class="text-warning">সুবিধাসমূহ</h5>
                    <p class="small">সাপ্তাহিক রিপোর্ট<br>প্রায়োরিটি সাপোর্ট<br>বোনাস </p>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <p class="lead">তোমার ইনভেস্টমেন্ট সুরক্ষিত এবং বাড়ছে! যেকোনো প্রশ্ন থাকলে আমরা ২৪/৭ আছি 🚀</p>
        </div>
    </div>
<br><br>
    <!-- Particles.js + Confetti -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

    <script src="inc/plugin/dataTable/dataTables.js"></script>
    <script src="inc/plugin/dataTable/dataTables.bootstrap5.js"></script>
    <script>
        // DataTable ইনিশিয়ালাইজেশন
        new DataTable('#dataTable_bs5' , {
            paging:   true,
            ordering: false,
            info:     false,
            searching: false,
            lengthChange: false,
            pageLength: 15,
        });

        // Particles.js কনফিগারেশন
        particlesJS("particles-js", { "particles": { "number": { "value": 120 }, "color": { "value": ["#ffd700", "#ff6b6b", "#4ecdc4"] }, "opacity": { "value": 0.7 }, "size": { "value": 5 }, "line_linked": { "enable": true, "color": "#ffd700" }, "move": { "speed": 2 } }, "interactivity": { "events": { "onhover": { "enable": true, "mode": "repulse" } } } });

        // পেজ লোডে কনফেটি
        confetti({ particleCount: 100, spread: 70, origin: { y: 0.6 } });

                // ROI চার্ট
        document.addEventListener('DOMContentLoaded', function () {

            const ctx = document.getElementById('roiChart');

            const now = new Date();
            const currentMonth = now.getMonth(); // 0 = Jan
            const year = now.getFullYear();

            const monthNamesBn = [ 'জান', 'ফেব্রু', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টে', 'অক্টো', 'নভে', 'ডিসে' ];

            let labels = [];
            let data = [];

            let value = 300;
            const dropMonth = Math.floor(currentMonth / 2);

            for (let i = 0; i < currentMonth; i++) {
                labels.push(monthNamesBn[i] + ' ' + year.toString().slice(-2));
                if (i === dropMonth) {
                    value -= 50;
                } else {
                    value += 10;
                }
                data.push(value);
            }

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'প্রজেক্টেড উন্নতি (৳)',
                        data: data,
                        borderColor: '#ffd700',
                        backgroundColor: 'rgba(255,215,0,0.2)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {scales: {y: {beginAtZero: false}},plugins: {legend: {labels: {color: '#fff'}}}}
            });

        });

        const progressPercent = (<?= count($invest_pachage_roi); ?> / <?= $single_invest_package->expire_day_numberss; ?>) * 100;
        document.addEventListener('DOMContentLoaded', function () {

            const progressPercent = (<?= count($invest_pachage_roi); ?> / <?= $single_invest_package->expire_day_numberss; ?>) * 100;

            const ctx = document.getElementById('progressCircle');

            new Chart(ctx, {
                type: 'doughnut',
                data: {datasets: [{data: [progressPercent, 100 - progressPercent],backgroundColor: ['#ffd700', '#333'],borderWidth: 0}]},
                options: {cutout: '75%',plugins: {legend: { display: false },tooltip: { enabled: false }}},
                plugins: [{afterDraw(chart) {
                    const { ctx, width, height } = chart;
                    ctx.save();
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    ctx.font = 'bold 40px sans-serif';
                    ctx.fillStyle = '#ffd700';
                    ctx.fillText(Math.round(progressPercent) + '%', width / 2, height / 2);
                    ctx.font = '18px sans-serif';
                    ctx.fillStyle = '#aaa';
                    ctx.fillText(
                        'দিন <?= BanglaConverter::en2bn(count($invest_pachage_roi)); ?>/<?= BanglaConverter::en2bn($single_invest_package->expire_day_numberss); ?>',
                        width / 2,
                        height / 2 + 30
                    );
                    ctx.restore();}
                }]
            });

        });


    </script>








