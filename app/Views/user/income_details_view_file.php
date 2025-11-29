

    <style>
        .glass {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .income-box {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            padding: 25px;
            border-radius: 18px;
            text-align: center;
        }

        .income-box h2 {
            font-size: 3rem;
            font-weight: 700;
            margin: 0;
        }

        .income-card {
            transition: 0.3s;
            cursor: pointer;
        }

        .income-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3) !important;
        }
    </style>
<section class="pt-2 mt-5 bg-white shadow-sm profit-section_ss">
    <div class="container my-5">

        <!-- Main Container -->
        <div class="row mb-4">

            <div class="container-fluid">

                <!-- মোট ইনকাম বক্স -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="income-box text-white shadow-lg">
                            <h5 class="mb-2">বর্তমান ওয়ালেট ব্যালেন্স</h5>
                            <h2>৳ <?= number_format($current_wallet_balance, 2); ?></h2>
                            <small>এই টাকা আপনার ওয়ালেটে রয়েছে</small>
                            <h3>বিস্তারিত দেখতে নিচের বক্সগুলোতে ক্লিক করুন</h3>
                        </div>
                    </div>
                </div>

                <!-- বিভিন্ন ইনকামের কার্ড -->
                <div class="row g-4 mb-5">
                    <a class="col-xl-3 col-md-6" href="user/product-sells-income">
                        <div class="glass p-4 text-center income-card shadow">
                            <i class="bi bi-box-seam fs-1 text-primary"></i>
                            <h5 class="mt-3">প্রোডাক্ট ক্রয়ের ইনকাম</h5>
                            <h3 class="text-warning">৳ <?= number_format($product_sells_income, 2); ?></h3>
                        </div>
                    </a>
                    <a class="col-xl-3 col-md-6" href="user/referrals">
                        <div class="glass p-4 text-center income-card shadow">
                            <i class="bi bi-person-plus-fill fs-1 text-success"></i>
                            <h5 class="mt-3">রেফার বোনাস</h5>
                            <h3 class="text-success">৳ <?= number_format($reffer_income_amnt, 2); ?></h3>
                        </div>
                    </a>
                    <a class="col-xl-3 col-md-6" href="user/gamming_pages">
                        <div class="glass p-4 text-center income-card shadow">
                            <i class="bi bi-trophy-fill fs-1 text-warning"></i>
                            <h5 class="mt-3">গেমস উইনিং</h5>
                            <h3 class="text-warning">৳ <?= number_format($games_income_amnt, 2); ?></h3>
                        </div>
                    </a>
                    <a class="col-xl-3 col-md-6" href="user/daily_check" >
                        <div class="glass p-4 text-center income-card shadow">
                            <i class="bi bi-calendar-check fs-1 text-primary"></i>
                            <h5 class="mt-3">ডেইলি চেক-ইন বোনাস</h5>
                            <h3 class="text-primary">৳ <?= number_format($daily_income_amnt, 2); ?></h3>
                        </div>
                    </a>
                </div>

                <!-- বিস্তারিত ইনকাম টেবিল (এই মাসের) -->
                <div class="glass p-4 shadow">
                    <h4 class="mb-4 text-center"><?= date('F Y'); ?> - মাসিক ইনকাম বিস্তারিত</h4>
                    <div class="table-responsive">
                        <table class="table table-light table-striped table-hover align-middle">
                            <thead class="table-primary text-dark">
                                <tr>
                                    <th>তারিখ</th>
                                    <th>ইনকামের ধরন</th>
                                    <th>বিবরণ</th>
                                    <th class="text-end">পরিমাণ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user_added_info as $sngl) { ?>
                                    <tr>
                                        <td><?php echo date('d M Y', $sngl->times_stamps); ?></td>
                                        <td> <?= $sngl->amount_perpose; ?> </td>
                                        <td><?= $sngl->payment_description; ?></td>
                                        <td class="text-end text-success fw-bold">৳ <?= $sngl->added_amount; ?></td>
                                        <td></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot class="table-info text-dark">
                                <tr>
                                    <th colspan="3" class="text-end">এই মাসের মোট ইনকাম:</th>
                                    <th class="text-end">৳ <?php echo array_sum(array_column($user_added_info, 'added_amount'));  ?></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>