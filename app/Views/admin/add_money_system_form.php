
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top-4">
                    <h4 class="mb-0"><i class="fa fa-money-bill-wave me-2"></i> টাকা যোগ করার ফর্ম</h4>
                </div>

                <div class="card-body p-4">
                    <form action="lead/add_money_post_form" method="post">

                        <!-- Amount Info -->
                        <h6 class="mb-3 text-secondary">💳 পেমেন্ট তথ্য</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">পরিমাণ</label>
                                <div class="input-group">
                                    <span class="input-group-text">৳</span>
                                    <input type="number" name="amount" class="form-control" placeholder="500" required>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">পেমেন্ট মাধ্যম</label>
                                <select class="form-select" name="payment_method" required>
                                    <option value="">-- নির্বাচন করুন --</option>
                                    <option value="bKash">bKash</option>
                                    <option value="Nagad">Nagad</option>
                                    <option value="Rocket">Rocket</option>
                                    <option value="Bank Transfer">Bank Transfer</option>
                                </select>
                            </div>
                        </div>

                        <!-- Sender Info -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">প্রেরকের মোবাইল নম্বর</label>
                                <input type="text" name="sender_mobile" class="form-control" placeholder="01XXXXXXXXX">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">আমাদের মোবাইল</label>
                                <input type="text" name="our_mobile" class="form-control" placeholder="আমাদের মোবাইল নম্বর দিন">
                            </div>
                        </div>

                        <!-- Transaction -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Transaction ID</label>
                                <input type="text" name="transaction_id" class="form-control" placeholder="TXN123456" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Transaction Date</label>
                                <input type="text" name="transaction_date" id="datepicker" class="form-control date_pick" required>
                            </div>
                        </div>

                        <!-- Reference -->
                        <div class="mb-3">
                            <label class="form-label">রেফারেন্স / নোট</label>
                            <textarea class="form-control" name="reference" rows="3" placeholder="যেকোনো অতিরিক্ত তথ্য লিখুন"></textarea>
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn bg-primary text-white w-100 py-2">
                            <i class="fa fa-paper-plane me-1"></i> সাবমিট করুন
                        </button>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>




<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">

        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">
                <i class="fa fa-list me-2"></i> টাকা যোগ করার তালিকা
            </h5>
        </div>

        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light text-center">
                        <tr>
                            <th>#</th>
                            <th>পরিমাণ</th>
                            <th>পেমেন্ট মাধ্যম</th>
                            <th>প্রেরকের মোবাইল</th>
                            <th>আমাদের মোবাইল</th>
                            <th>Transaction ID</th>
                            <th>তারিখ</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        <?php foreach ($add_money_in_numbers as $index => $money): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td class="fw-bold text-success">৳ <?= $money->amount ?></td>
                                <td>
                                    <span class="badge bg-info"><?= $money->payment_typess ?></span>
                                </td>
                                <td><?= $money->customer_number ?></td>
                                <td><?= $money->number_account ?></td>
                                <td><?= $money->trnx_iddddd ?></td>
                                <td><?= $money->trx_datess ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

