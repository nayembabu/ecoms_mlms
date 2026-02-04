<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

<style>
    /* Royal Purple & Gold Glamorous Casino Theme */
    .royal-casino-withdraw {
        min-height: 100vh;
        position: relative;
        overflow: hidden;
    }
    .royal-casino-withdraw::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url('inc/img/site_bg/withdraw.webp') center/cover no-repeat;
        pointer-events: none;
    }
    .glam-card {
        background: rgba(25, 10, 40, 0.95);
        border: 3px solid #D4AF37;
        border-radius: 22px;
        box-shadow: 0 15px 50px rgba(212, 175, 55, 0.25);
        transition: all 0.5s ease;
        position: relative;
        overflow: hidden;
    }
    .glam-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(45deg, transparent, rgba(212, 175, 55, 0.08), transparent);
        animation: shimmer 8s infinite linear;
        pointer-events: none;
    }
    .glam-card:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: 0 25px 70px rgba(212, 175, 55, 0.4);
    }
    .purple-gold-header {
        background: linear-gradient(135deg, #9370DB, #D4AF37, #800080);
        color: #FFFFFF;
        text-shadow: 0 3px 10px rgba(0,0,0,0.5);
    }
    .royal-gold { color: #D4AF37; text-shadow: 0 0 15px rgba(212,175,55,0.6); }
    .purple-accent { color: #BA55D3; }
    .progress-royal {
        background: linear-gradient(90deg, #D4AF37, #9370DB, #800080);
    }
    .recent-item:hover {
        background: rgba(212, 175, 55, 0.12);
        transform: scale(1.03);
        transition: all 0.4s ease;
    }
    .icon-royal-circle {
        width: 60px; height: 60px; border-radius: 50%;
        background: linear-gradient(135deg, #D4AF37, #800080);
        display: flex; align-items: center; justify-content: center;
        box-shadow: 0 0 30px rgba(212,175,55,0.7);
    }
    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    @keyframes floatDiamond {
        0% { transform: translateY(0) rotate(0deg); opacity: 0.5; }
        50% { transform: translateY(-40px) rotate(180deg); opacity: 0.8; }
        100% { transform: translateY(0) rotate(360deg); opacity: 0.5; }
    }
    .diamond-float {
        position: absolute;
        width: 24px; height: 24px;
        background: #D4AF37;
        clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
        box-shadow: 0 0 25px #D4AF37;
        animation: floatDiamond 22s infinite linear;
        pointer-events: none;
    }
</style>

<section class="pt-5 mt-5 royal-casino-withdraw position-relative">
    <!-- Floating diamonds for extra glamour -->
    <div class="diamond-float" style="top: 10%; left: 8%; animation-delay: 0s;"></div>
    <div class="diamond-float" style="top: 70%; left: 90%; animation-delay: 6s;"></div>
    <div class="diamond-float" style="top: 40%; left: 45%; animation-delay: 12s;"></div>
    <div class="diamond-float" style="top: 85%; left: 15%; animation-delay: 18s;"></div>

    <div class="container my-5 position-relative">
        <div class="row mb-4 animate__animated animate__fadeIn">

            <div class="col-md-4">
                <?php $balance_val = isset($current_wallet_balance) ? (float)$current_wallet_balance : 0.0; ?>
                <?php $pending_val = isset($withdraw_history[0]->requ_amount_taka) ? (float)$withdraw_history[0]->requ_amount_taka : 0.0; ?>
                <?php $last_date = isset($withdraw_history[0]->date_today) ? $withdraw_history[0]->date_today : '-'; ?>
                <?php $pct_of_max = min(100, ($balance_val / 25000) * 100); ?>

                <div class="card mb-4 glam-card animate__animated animate__zoomIn">
                    <div class="p-5 purple-gold-header rounded-top">
                        <div class="d-flex align-items-center mb-4">
                            <div class="me-4 icon-royal-circle">
                                <i class="fas fa-crown fa-2x" style="color: #000;"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="small opacity-80">Royal Balance</div>
                                <div class="display-3 fw-bold mb-0 royal-gold text-dark">৳<?php echo number_format($balance_val, 2); ?></div>
                                <div class="small opacity-80">Ready for Cashout</div>
                            </div>
                        </div>

                        <div class="d-flex gap-4 mt-5">
                            <div class="p-4 bg-black bg-opacity-40 rounded-4 flex-grow-1 text-center">
                                <div class="small opacity-80">Pending</div>
                                <div class="display-6 fw-bold mb-0 royal-gold">৳<?php echo number_format($pending_val, 2); ?></div>
                            </div>
                            <div class="p-4 bg-black bg-opacity-40 rounded-4 text-center">
                                <div class="small opacity-80">Last Request</div>
                                <div class="h5 fw-bold mb-0 royal-gold"><?php echo htmlspecialchars($last_date); ?></div>
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <span class="badge bg-black px-5 py-3" style="font-size: 1.2rem; border: 2px solid #D4AF37;">
                                <i class="fas fa-gem me-2"></i>Fee: <?php echo $setting->withdraw_percentige; ?>%
                            </span>
                        </div>
                    </div>

                    <div class="card-body p-5">
                        <div class="mb-4 d-flex justify-content-between royal-gold fw-bold fs-5">
                            <div>Progress to Max Cashout</div>
                            <div><?php echo round($pct_of_max,1); ?>%</div>
                        </div>
                        <div class="progress" style="height: 18px; background: #333; border-radius: 12px; overflow: hidden;">
                            <div class="progress-bar progress-royal" role="progressbar" style="width: <?php echo round($pct_of_max,1); ?>%;" aria-valuenow="<?php echo round($pct_of_max,1); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-3 text-muted small">
                            <div>0</div>
                            <div>25,000</div>
                        </div>
                    </div>
                </div>

                <div class="card glam-card animate__animated animate__fadeInUp">
                    <div class="card-body p-5">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <h4 class="mb-0 royal-gold"><i class="fas fa-trophy me-3"></i>Recent Wins</h4>
                            <a href="/user/withdraw/history" class="text-decoration-none purple-accent">View all →</a>
                        </div>

                        <?php if (!empty($withdraw_history) && is_array($withdraw_history)): ?>
                            <div class="list-group list-group-flush">
                                <?php foreach ($withdraw_history as $w): ?>
                                    <?php
                                        $status = $w->approve_status ?? '—';
                                        $amount = isset($w->requ_amount_taka) ? (float)$w->requ_amount_taka : 0.0;
                                        $date = $w->date_today ?? '—';
                                    ?>
                                    <div class="list-group-item recent-item d-flex justify-content-between align-items-center border-bottom border-purple border-opacity-30">
                                        <div class="d-flex align-items-center">
                                            <div class="me-4 icon-royal-circle" style="width:50px;height:50px;">
                                                <i class="fas fa-diamond" style="color:#000;"></i>
                                            </div>
                                            <div>
                                                <div class="small text-muted"><?php echo date('d M Y', strtotime($date)); ?></div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <div class="fw-bold royal-gold display-6 mb-0">৳<?php echo number_format($amount, 2); ?></div>
                                            <span class="badge bg-purple mt-2 text-dark">Pending Approval</span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="text-center py-6">
                                <i class="fas fa-gem fa-5x royal-gold opacity-60 mb-4"></i>
                                <div class="text-muted fs-5">No cashouts yet.<br>Time to claim your royal winnings!</div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card glam-card animate__animated animate__fadeInRight">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-5 royal-gold"><i class="fas fa-gem me-4"></i>Cashout Request</h2>

                        <?php if (count($allReffer) == 2) { ?>
                            <?php if ($my_info->sts == 1) { ?>
                                <?php if ($my_info->user_withdraw_nos) { ?>
                                    <form id="withdrawForm" action="/user/withdraw_req" method="post" novalidate>
                                        <?php if (function_exists('csrf_field')): ?><?php echo csrf_field(); ?><?php endif; ?>

                                        <div class="mb-5">
                                            <label for="amount" class="form-label royal-gold fw-bold fs-4">Amount to Cashout</label>
                                            <input type="text" class="form-control form-control-lg text-center fs-3" style="background:#222; border:3px solid #D4AF37; color:white; height:70px;" id="amount" oninput="this.value = this.value.replace(/[^0-9]/g, '');" name="withdraw_amount" placeholder="Enter your winnings" required>
                                        </div>

                                        <div class="row g-4 mb-5">
                                            <div class="col-md-6">
                                                <label class="form-label purple-accent fs-5">Fee (<?php echo $setting->withdraw_percentige; ?>%)</label>
                                                <div class="h3 royal-gold fw-bold" id="feeDisplay">0.00</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label royal-gold fs-5">You Receive</label>
                                                <div class="display-5 royal-gold fw-bold" id="netDisplay">0.00</div>
                                            </div>
                                        </div>

                                        <div class="mb-5">
                                            <label for="note" class="form-label royal-gold">Note (optional)</label>
                                            <input type="text" class="form-control form-control-lg" style="background:#222; border:2px solid #9370DB; color:white;" id="note" name="additional_notes" maxlength="255" placeholder="VIP message...">
                                        </div>

                                        <div class="text-center">
                                            <button type="button" class="btn btn-lg px-6 py-4 purple-gold-header fw-bold fs-4 submit_btn_withdraw" disabled id="submitBtn">
                                                <i class="fas fa-sparkles me-3"></i> Claim Your Winnings
                                            </button>
                                        </div>
                                    </form>
                                <?php } else { ?>
                                    <div class="alert alert-warning text-center py-5 border-purple">
                                        <i class="fas fa-crown fa-4x mb-4 royal-gold"></i>
                                        <h3>Set your royal account first!</h3>
                                    </div>
                                    <div class="text-center">
                                        <a href="/user/set_account_number" class="btn btn-lg purple-gold-header px-6 py-4 fw-bold">
                                            <i class="fas fa-key me-3"></i>Set Account
                                        </a>
                                    </div>
                                <?php } ?>

                                <div class="mt-5 text-center text-muted small">
                                    Min: ৳<?php echo $setting->withdraw_minimum; ?> | Max: ৳<?php echo $setting->withdraw_max; ?> | Fee: <?php echo $setting->withdraw_percentige; ?>%
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-danger text-center py-6">
                                    <i class="fas fa-lock fa-5x mb-4"></i>
                                    <h2>Royal Account Inactive</h2>
                                    <p>Activate to unlock cashouts.</p>
                                </div>
                            <?php } ?>
                        <?php }else { ?>
                            <div class="alert alert-warning text-center py-6">
                                <i class="fas fa-lock fa-5x mb-4"></i>
                                <h2>আপনার একটিভ রেফার <span style="font-size: 36px; " > <?= count($allReffer); ?></span> </h2>
                                <p>উইথড্র করতে চাইলে 2 জন রেফার করুন। </p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    (function () {
        'use strict';

        const bal = <?php echo isset($current_wallet_balance) ? json_encode((float)$current_wallet_balance) : '0'; ?>;
        const parcent_bal = <?php echo ($current_wallet_balance * $setting->withdraw_percentige) / 100 ? json_encode((float)($current_wallet_balance * $setting->withdraw_percentige) / 100) : '0'; ?>;
        const AVAILABLE_BALANCE = parseFloat(bal) + parseFloat(parcent_bal);
        const MIN_WITHDRAW = <?php echo $setting->withdraw_minimum; ?>;
        const MAX_WITHDRAW = <?php echo $setting->withdraw_max; ?>;
        const FEE_PERCENT = <?php echo $setting->withdraw_percentige; ?>;

        const form = document.getElementById('withdrawForm');
        const amountInput = document.getElementById('amount');
        const feeDisplay = document.getElementById('feeDisplay');
        const netDisplay = document.getElementById('netDisplay');
        const submitBtn = document.getElementById('submitBtn');

        function calc() {
            const val = parseFloat(amountInput.value) || 0;
            const fee = (val * FEE_PERCENT) / 100;
            const net = val - fee;
            feeDisplay.textContent = fee.toFixed(2);
            netDisplay.textContent = net.toFixed(2);

            if (val >= MIN_WITHDRAW && val <= MAX_WITHDRAW && val <= AVAILABLE_BALANCE && val > 0) {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        }

        amountInput.addEventListener('input', calc);
        calc();

        // Enhanced Confetti Celebration on Submit
        $(document).on('click', '.submit_btn_withdraw', function () {
            if (form && form.checkValidity() && !submitBtn.disabled) {
                // Royal confetti explosion
                confetti({
                    particleCount: 200,
                    spread: 90,
                    origin: { y: 0.5 },
                    colors: ['#D4AF37', '#9370DB', '#BA55D3', '#FFFFFF', '#800080']
                });
                setTimeout(() => {
                    confetti({
                        particleCount: 150,
                        angle: 60,
                        spread: 70,
                        origin: { x: 0, y: 0.6 },
                        colors: ['#D4AF37', '#BA55D3', '#FFFFFF']
                    });
                    confetti({
                        particleCount: 150,
                        angle: 120,
                        spread: 70,
                        origin: { x: 1, y: 0.6 },
                        colors: ['#D4AF37', '#9370DB', '#800080']
                    });
                }, 300);

                setTimeout(() => form.submit(), 800);
            }
        });

    })();
</script>