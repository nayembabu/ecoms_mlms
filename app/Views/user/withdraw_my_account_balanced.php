
    <style>
        /* small local styles to enhance the look */
        .glow-card {
            border: 0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(99, 102, 241, 0.12);
        }
        .balance-badge {
            font-size: 0.8rem;
            padding: .35rem .6rem;
            border-radius: 999px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.06);
        }
        .progress-gradient {
            background: linear-gradient(90deg, #10b981, #06b6d4);
        }
        .recent-item:hover {
            background: rgba(2,6,23,0.03);
            transform: translateY(-2px);
            transition: all .15s ease;
        }
        .icon-circle {
            width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;
            color:#fff;font-weight:600;
        }
    </style>



<section class="pt-5 mt-5 bg-white shadow-sm profit-section_ss">
    <div class="container my-5">
        <div class="row mb-4">

            <div class="col-md-4">
                <?php $balance_val = isset($current_wallet_balance) ? (float)$current_wallet_balance : 0.0; ?>
                <?php $pending_val = isset($withdraw_history[0]->requ_amount_taka) ? (float)$withdraw_history[0]->requ_amount_taka : 0.0; ?>
                <?php $last_date = isset($withdraw_history[0]->date_today) ? $withdraw_history[0]->date_today : '-'; ?>
                <?php $pct_of_max = min(100, ($balance_val / 25000) * 100); ?>

                <div class="card mb-4 glow-card">
                    <div class="p-4 text-white" style="background: linear-gradient(135deg,#7c3aed 0%,#06b6d4 100%);">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <div class="icon-circle" style="background: rgba(255,255,255,0.12);">
                                    <!-- wallet icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                        <path d="M0 3a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v1H1V3z"/>
                                        <path d="M1 6h14v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V6z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="small text-white-50">Account Balance</div>
                                        <div class="h3 fw-bold mb-0"><?php echo number_format($balance_val, 2); ?></div>
                                        <div class="small text-white-50">Available</div>
                                    </div>
                                    <div class="text-end">
                                        <span class="balance-badge bg-white text-dark">Fee: 5%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <div class="d-flex gap-2">
                                <div class="p-2 bg-white bg-opacity-10 rounded-3 flex-grow-1">
                                    <div class="small text-white-50">Pending</div>
                                    <div class="fw-bold"><?php echo number_format($pending_val, 2); ?></div>
                                </div>
                                <div class="p-2 bg-white bg-opacity-10 rounded-3">
                                    <div class="small text-white-50">Last</div>
                                    <div class="fw-bold"><?php echo htmlspecialchars($last_date); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-3">
                        <div class="mb-2 small text-muted d-flex justify-content-between">
                            <div>Progress to max per request</div>
                            <div class="fw-semibold"><?php echo round($pct_of_max,1); ?>%</div>
                        </div>

                        <div class="progress" style="height:10px;border-radius:8px;overflow:hidden;background:#f1f5f9;">
                            <div class="progress-bar progress-gradient" role="progressbar" style="width: <?php echo round($pct_of_max,1); ?>%;" aria-valuenow="<?php echo round($pct_of_max,1); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="d-flex justify-content-between small text-muted mt-2">
                            <div>0</div>
                            <div>25,000</div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="mb-0">Recent Withdrawals</h6>
                            <a href="/user/withdraw/history" class="small text-decoration-none">View all</a>
                        </div>

                        <?php if (!empty($withdraw_history) && is_array($withdraw_history)): ?>
                            <div class="list-group list-group-flush">
                                <?php foreach ($withdraw_history as $w): ?>
                                    <?php
                                        $status = $w->approve_status ?? '—';
                                        $amount = isset($w->requ_amount_taka) ? (float)$w->requ_amount_taka : 0.0;
                                        $date = $w->date_today ?? '—';
                                    ?>
                                    <div class="list-group-item recent-item d-flex justify-content-between align-items-center py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <div class="rounded bg-light d-flex align-items-center justify-content-center" style="height:44px;">
                                                    <span class="text-muted small"><?php echo date('d M Y', strtotime($date)); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <div class="fw-bold"><?php echo number_format($amount, 2); ?></div>
                                            <span class="badge bg-warning text-white small mt-1">Waiting</span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="text-center py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="#9ca3af" class="mb-2" viewBox="0 0 16 16" aria-hidden="true">
                                    <path d="M8 1a3 3 0 0 0-3 3v1H2.5A1.5 1.5 0 0 0 1 6.5v6A1.5 1.5 0 0 0 2.5 14h11A1.5 1.5 0 0 0 15 12.5v-6A1.5 1.5 0 0 0 13.5 5H11V4a3 3 0 0 0-3-3z"/>
                                </svg>
                                <div class="small text-muted">No withdrawals yet.</div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Request Withdrawal</h4>

                        <?php if ($my_info->user_withdraw_nos) { ?>
                            <form id="withdrawForm" action="/user/withdraw_req" method="post" novalidate>
                                <!-- CSRF token if needed -->
                                <?php if (function_exists('csrf_field')): ?><?php echo csrf_field(); ?><?php endif; ?>

                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="text" class="form-control amount_input_box " id="amount" oninput="this.value = this.value.replace(/[^0-9]/g, '');" name="withdraw_amount" min="1000" max="25000" step="0.01" placeholder="0.00" required >
                                    <div class="invalid-feedback" id="amountFeedback">Enter a valid amount (min 1).</div>
                                </div>

                                <div class="mb-3 row g-2">
                                    <div class="col">
                                        <label class="form-label small text-muted">Fee (5%)</label>
                                        <div class="form-control-plaintext" id="feeDisplay">0.00</div>
                                    </div>
                                    <div class="col">
                                        <label class="form-label small text-muted">Net Amount</label>
                                        <div class="form-control-plaintext" id="netDisplay">0.00</div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="note" class="form-label">Note (optional)</label>
                                    <input type="text" class="form-control" id="note" name="additional_notes" maxlength="255" placeholder="Additional info">
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary bg-primary text-white submit_btn_withdraw" disabled id="submitBtn">Submit Request</button>
                                </div>
                            </form>
                        <?php } else { ?>
                            <div class="alert alert-danger" role="alert">
                                You need to set your withdrawal account number in your profile before making a withdrawal request.
                            </div>
                            <a href="/user/set_account_number" class="btn btn-info bg-info text-white fs-4 ">Set Account Number</a>
                        <?php } ?>

                        <div class="mt-3">
                            <small class="text-muted">Minimum withdrawal: <?php echo $setting->withdraw_minimum; ?>. Maximum per request: <?php echo $setting->withdraw_max; ?>. A <?php echo $setting->withdraw_percentige; ?>% fee is applied to the requested amount.</small>
                        </div>

                        <div id="insufficientAlert" class="alert alert-warning mt-3 d-none" role="alert">
                            Insufficient balance to make the minimum withdrawal of <?php echo $setting->withdraw_minimum; ?>.
                        </div>

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
                    const amountFeedback = document.getElementById('amountFeedback');
                    const submitBtn = document.getElementById('submitBtn');
                    const insufficientAlert = document.getElementById('insufficientAlert');

                    // If balance is less than minimum, show info and disable form
                    function checkBalanceAvailability() {
                        if (AVAILABLE_BALANCE < MIN_WITHDRAW) {
                            insufficientAlert.classList.remove('d-none');
                            submitBtn.disabled = true;
                            amountInput.disabled = true;
                            amountFeedback.textContent = 'Insufficient balance to withdraw the minimum amount.';
                            return false;
                        } else {
                            insufficientAlert.classList.add('d-none');
                            submitBtn.disabled = false;
                            amountInput.disabled = false;
                            amountFeedback.textContent = 'Enter an amount between ' + MIN_WITHDRAW + ' and ' + MAX_WITHDRAW + ' (not exceeding your balance).';
                            return true;
                        }
                    }

                    function calc() {
                        const val = parseFloat(amountInput.value) || 0;
                        const fee = Math.max(0, (val * FEE_PERCENT) / 100);
                        const net = Math.max(0, val - fee);
                        feeDisplay.textContent = fee.toFixed(2);
                        netDisplay.textContent = net.toFixed(2);

                        // Custom validation messages
                        if (val === 0) {
                            amountInput.setCustomValidity(''); // let required handle it
                            amountFeedback.textContent = 'Enter an amount between ' + MIN_WITHDRAW + ' and ' + MAX_WITHDRAW + '.';
                        } else if (val < MIN_WITHDRAW) {
                            amountInput.setCustomValidity('too_small');
                            amountFeedback.textContent = 'Minimum withdrawal is ' + MIN_WITHDRAW + '.';
                        } else if (val > MAX_WITHDRAW) {
                            amountInput.setCustomValidity('too_large');
                            amountFeedback.textContent = 'Maximum withdrawal per request is ' + MAX_WITHDRAW + '.';
                        } else if (val > AVAILABLE_BALANCE) {
                            amountInput.setCustomValidity('exceeds_balance');
                            amountFeedback.textContent = 'Requested amount exceeds your available balance (' + AVAILABLE_BALANCE.toFixed(2) + ').';
                        } else {
                            amountInput.setCustomValidity('');
                            amountFeedback.textContent = '';
                        }
                    }

                    // Initialize
                    checkBalanceAvailability();
                    amountInput.setAttribute('min', MIN_WITHDRAW);
                    amountInput.setAttribute('max', MAX_WITHDRAW);

                    amountInput.addEventListener('input', calc);
                    calc();

                    // Bootstrap validation + custom checks
                    form.addEventListener('submit', function (e) {
                        e.preventDefault();
                        // run calculations and checks one more time
                        calc();
                        // If balance changed server-side, front-end can't know; final checks should be done server-side too.
                        if (!form.checkValidity()) {
                            e.preventDefault();
                            e.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);

                    $(document).on('keyup', '.amount_input_box', function () {
                        let this_val = parseFloat($(this).val()) || 0;
                        if (this_val > AVAILABLE_BALANCE || this_val < MIN_WITHDRAW || this_val > MAX_WITHDRAW) {
                            submitBtn.disabled = true;
                        }else {
                            submitBtn.disabled = false;
                        }
                    });

                    $(document).on('click', '.submit_btn_withdraw', function () {
                        // Handle the submit button click
                        if (form.checkValidity()) {
                            form.submit();
                        }
                    });

                })();


            </script>