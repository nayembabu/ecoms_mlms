<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-danger text-white py-2 text-center rounded-top-4">
                    <h6 class="mb-0">💸 খরচ যোগ করুন</h6>
                </div>

                <div class="card-body p-3">
                    <form action="<?= base_url('lead/add_post') ?>" method="post">

                        <!-- Group: Amount & User -->
                        <div class="row g-2 mb-2">
                            <div class="col-6">
                                <label class="form-label small mb-1">পরিমাণ</label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text">৳</span>
                                    <input type="number" name="amont_cost" class="form-control" placeholder="500" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label small mb-1">Select Date</label>
                                <input type="text" name="submit_date" class="form-control form-control-sm date_pick" value="<?= date('Y-m-d'); ?>" required>
                            </div>
                        </div>

                        <!-- Group: Cause -->
                        <div class="mb-2">
                            <label class="form-label small mb-1">খরচের কারণ</label>
                            <textarea name="cost_causes_proper" class="form-control form-control-sm" rows="2" placeholder="যেমন: অফিস ভাড়া" required></textarea>
                        </div>
                        <!-- Submit -->
                        <button type="submit" class="btn bg-danger text-white btn-sm w-100">
                            💾 Save Cost
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-dark text-white py-2 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">📊 খরচের তালিকা</h6>
                    <span class="badge bg-light text-dark">Total: ৳ <?= $cost_money_total; ?></span>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover align-middle mb-0">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>#</th>
                                    <th>পরিমাণ</th>
                                    <th>User ID</th>
                                    <th>খরচের কারণ</th>
                                    <th>Date</th>
                                </tr>
                            </thead>

                            <tbody>

                            <tbody>
                                <?php if(!empty($admin_cost_money)): ?>
                                    <?php $i = 1; foreach($admin_cost_money as $row): ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>

                                            <td class="text-center fw-bold text-danger">
                                                ৳ <?= esc($row->amont_cost); ?>
                                            </td>

                                            <td class="text-center">
                                                <span class="badge bg-secondary">
                                                    <?= esc($row->user_full_name); ?>
                                                </span>
                                            </td>

                                            <td align="center" ><?= esc($row->cost_causes_proper); ?></td>

                                            <td class="text-center"><?= esc($row->cost_provide_dates); ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">No data found</td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
