<section class="pt-5 mt-5 casino-wallet-section" style="background: linear-gradient(135deg, #0c0c0c, #1a0000, #001a00); min-height: 100vh; position: relative; overflow: hidden;">
    <!-- Subtle casino velvet background overlay -->
    <div style="position: absolute; inset: 0; background: url('inc/img/site_bg/wallet.jpg') center/cover no-repeat; opacity: 0.12; pointer-events: none;"></div>

    <!-- Gentle floating chips (slow & low opacity – no eye strain) -->
    <div class="particles" style="position: absolute; inset: 0; pointer-events: none;">
        <div class="particle" style="position: absolute; width: 18px; height: 18px; background: #FFD700; border-radius: 50%; opacity: 0.4; animation: floatSlow 25s infinite linear; top: 20%; left: 12%;"></div>
        <div class="particle" style="position: absolute; width: 22px; height: 22px; background: #C0C0C0; border-radius: 50%; opacity: 0.3; animation: floatSlow 30s infinite linear reverse; top: 65%; left: 80%;"></div>
        <div class="particle" style="position: absolute; width: 20px; height: 20px; background: #B8860B; border-radius: 50%; opacity: 0.35; animation: floatSlow 28s infinite linear; top: 45%; left: 55%;"></div>
    </div>

    <div class="container my-5 position-relative">
        <!-- Main Container -->
        <div class="row mb-4">
            <!-- Balance Card -->
            <div class="col-md-6 mb-3">
                <div class="card casino-card border-0 animate__animated animate__fadeInLeft" style="background: rgba(20, 20, 20, 0.95); border-radius: 18px; border: 1px solid #333;">
                    <div class="card-body row align-items-center p-5">
                        <div class="col-6 col-md-6 text-center">
                            <h6 class="text-muted" style="color: #aaa; font-size: 1.3rem;">Available Balance</h6>
                            <h2 class="fw-bold text-gold" style="color: #FFD700; font-size: 3rem; text-shadow: 0 2px 8px rgba(255,215,0,0.3);">৳<?php echo number_format($current_wallet_balance, 1); ?></h2>
                        </div>
                        <div class="col-3 col-md-3">
                            <!-- data-bs-toggle="modal" data-bs-target="#depositeModals" -->
                            <a class="btn btn-lg casino-btn-deposit w-100 py-3" href="user/deposites" style="background: #006400; color: white; font-weight: bold; border: 2px solid #90EE90;">
                                <i class="fas fa-plus-circle me-2"></i>Deposit
                            </a>
                        </div>
                        <?php if ($my_info->sts != 0) { ?>
                            <div class="col-3 col-md-3">
                                <a href="user/withdraw" class="btn btn-lg casino-btn-withdraw w-100 py-3" style="background: #8B0000; color: white; font-weight: bold; border: 2px solid #FF4500;">
                                    <i class="fas fa-money-bill-wave me-2"></i>Withdraw
                                </a>
                            </div>
                        <?php }else { ?>
                            <div class="col-3 col-md-3">
                                <label for="" class="text-white" >টাকা উত্তোলণ করতে, আগে একাউন্ট আপডেট করুন। </label>
                                <a href="user/set_account_number" class="btn btn-lg casino-btn-withdraw w-100 py-3" style="background: #8B0000; color: white; font-weight: bold; border: 2px solid #FF4500;">
                                    <i class="fas fa-user me-2"></i>Update
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- Summary -->
            <div class="col-md-6">
                <div class="row g-3">
                    <div class="col-4">
                        <div class="card casino-card border-0 animate__animated animate__fadeIn" style="background: rgba(30, 20, 30, 0.9); border-radius: 15px; border: 1px solid #444;">
                            <?php if ($my_info->sts != 0) { ?>
                                <div class="card-body p-4 text-center">
                                    <a href="user/balanceTransfer" class="text-white fw-bold btn btn-lg w-100 py-3" style="background: #4B0082; color: white; border: 2px solid #9370DB;">
                                        <i class="fas fa-exchange-alt me-2"></i>Transfer Balance
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card casino-card border-0 animate__animated animate__fadeIn" style="background: rgba(20, 40, 20, 0.9); border-radius: 15px; border: 1px solid #444;">
                            <div class="card-body p-4 text-center">
                                <h5 style="color: #90EE90;">Total Income</h5>
                                <p class="fw-bold fs-2 mt-2 text-gold">৳<?= number_format($user_added_wallet, 1); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card casino-card border-0 animate__animated animate__fadeIn" style="background: rgba(40, 20, 20, 0.9); border-radius: 15px; border: 1px solid #444;">
                            <div class="card-body p-4 text-center">
                                <h5 style="color: #FF6347;">Total Expense</h5>
                                <p class="fw-bold fs-2 mt-2 text-gold">৳<?= number_format($user_used_wallet, 1); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Income History -->
            <div class="col-md-6 mb-3">
                <div class="card casino-card border-0 mb-4 animate__animated animate__fadeInUp" style="background: rgba(15, 35, 15, 0.95); border-radius: 18px; border: 1px solid #333;">
                    <div class="card-header text-white text-center py-4" style="background: linear-gradient(to right, #006400, #008000);">
                        <h4 class="mb-0" style="color: #FFD700; font-size: 1.8rem;"><i class="fas fa-coins me-3"></i>Income History</h4>
                    </div>
                    <div class="card-body p-4">
                        <table class="table table-hover align-middle text-white">
                            <thead style="background: rgba(0,100,0,0.3);">
                                <tr>
                                    <th style="color: #FFD700;">Date</th>
                                    <th style="color: #FFD700;">Description</th>
                                    <th style="color: #FFD700;">Source</th>
                                    <th style="color: #FFD700;">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($added_amounts as $add) { ?>
                                    <tr>
                                        <td><?= date('F d, Y', $add->times_stamps); ?></td>
                                        <td><?= $add->payment_description; ?></td>
                                        <td><?= $add->amount_perpose; ?></td>
                                        <td class="fw-bold" style="color: #90EE90;">৳<?= $add->added_amount; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Expense History -->
            <div class="col-md-6 mb-3">
                <div class="card casino-card border-0 mb-4 animate__animated animate__fadeInUp" style="background: rgba(35, 15, 15, 0.95); border-radius: 18px; border: 1px solid #333;">
                    <div class="card-header text-white text-center py-4" style="background: linear-gradient(to right, #8B0000, #B22222);">
                        <h4 class="mb-0" style="color: #FFD700; font-size: 1.8rem;"><i class="fas fa-dice me-3"></i>Expense History</h4>
                    </div>
                    <div class="card-body p-4">
                        <table class="table table-hover align-middle text-white">
                            <thead style="background: rgba(139,0,0,0.3);">
                                <tr>
                                    <th style="color: #FFD700;">Date</th>
                                    <th style="color: #FFD700;">Description</th>
                                    <th style="color: #FFD700;">Category</th>
                                    <th style="color: #FFD700;">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($used_amounts as $cut) { ?>
                                    <tr>
                                        <td><?= date('F d, Y', $cut->time_stamps); ?></td>
                                        <td><?= $cut->cut_descs; ?></td>
                                        <td><?= $cut->cutting_perpose; ?></td>
                                        <td class="fw-bold" style="color: #FF6347;">৳ <?= $cut->cutting_amounts; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Deposit Modal -->
<div class="modal fade" id="depositeModals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="card casino-card border-0" style="background: rgba(25, 25, 25, 0.97); border-radius: 18px; border: 2px solid #444;">
            <div class="modal-header text-white text-center" style="background: linear-gradient(to right, #4B0082, #8B0000);">
                <h1 class="modal-title w-100" id="exampleModalLabel" style="color: #FFD700; font-size: 2rem;">
                    <i class="fas fa-gem me-3"></i>Recharge Your Wallet
                </h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-5 text-center text-white">
                <h2 style="color: #aaa; font-size: 1.8rem;">
                    Join our exclusive Telegram channel to recharge instantly
                </h2>
                <h1 class="mt-4">
                    <a href="https://t.me/royalchainnet" class="btn casino-btn-telegram px-5 py-4" style="background: #0088cc; color: white; font-size: 1.8rem; border: 2px solid #00BFFF;">
                        <i class="fab fa-telegram-plane me-3"></i>Join Telegram
                    </a>
                </h1>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS for subtle animations & casino feel -->
<style>
    @keyframes floatSlow {
        0% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-25px) rotate(180deg); }
        100% { transform: translateY(0) rotate(360deg); }
    }
    .casino-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .casino-card:hover { transform: translateY(-8px); box-shadow: 0 10px 30px rgba(0,0,0,0.6); }
    .casino-btn-deposit:hover, .casino-btn-withdraw:hover, .casino-btn-telegram:hover {
        transform: scale(1.05);
        opacity: 0.9;
    }
    .table-hover tbody tr:hover { background: rgba(255,255,255,0.08); }
    .text-gold { color: #FFD700; }
</style>