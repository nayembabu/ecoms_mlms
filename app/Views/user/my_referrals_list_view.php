
<?php
    // CodeIgniter instance পাওয়া
    $db = \Config\Database::connect();
?>


<style>
/* ===== SOFT CASINO BASE ===== */
body {
    background: linear-gradient(180deg, #68288a, #6d469c); 
    color: #1b3a2f;
}

/* Section */
.profit-section_ss {
    background: linear-gradient(180deg, #540430, #6a5c63);
}

/* ===== CARDS ===== */
.card {
    background: #f0eeee;
    border-radius: 16px;
    border: 1px solid rgba(34, 197, 94, 0.25);
    box-shadow:
        0 6px 20px rgba(0, 0, 0, 0.06),
        0 0 0 rgba(0,0,0,0);
    transition: all 0.25s ease;
}

.card:hover {
    transform: translateY(-3px);
    box-shadow:
        0 10px 30px rgba(0, 0, 0, 0.10),
        0 0 12px rgba(34, 197, 94, 0.25);
}

/* ===== HEADERS ===== */
.card-header {
    background: linear-gradient(90deg, #22c55e, #16a34a);
    color: #ffffff;
    border-bottom: none;
}

/* ===== BADGES ===== */
.badge {
    font-weight: 600;
}

.bg-success {
    background: #22c55e !important;
}

.bg-warning {
    background: linear-gradient(135deg, #fde68a, #fbbf24) !important;
    color: #5c3a00;
}

.bg-info {
    background: linear-gradient(135deg, #bae6fd, #0e394c) !important;
    color: #083344;
}

/* ===== PROGRESS ===== */
.progress {
    height: 22px;
    background: #e5f5ec;
    border-radius: 20px;
}

.progress-bar {
    background: linear-gradient(90deg, #164326, #470530);
    color: #064e3b;
    font-weight: 600;
}

/* ===== TABLE ===== */
.table {
    color: #1b3a2f;
}

.table thead {
    background: #ecfdf5;
    color: #065f46;
    font-weight: 600;
}

.table-hover tbody tr:hover {
    background: #f0fdf4;
}

/* ===== INPUT ===== */
.form-control {
    background: #ffffff;
    border: 1px solid #bbf7d0;
    color: #14532d;
}

.form-control:focus {
    box-shadow: 0 0 0 0.15rem rgba(34, 197, 94, 0.25);
    border-color: #22c55e;
}

/* ===== BUTTONS ===== */
.btn {
    border-radius: 999px;
    font-weight: 600;
}

.btn-primary {
    background: linear-gradient(135deg, #22c55e, #16a34a);
    border: none;
}

.btn-success {
    background: linear-gradient(135deg, #fde047, #facc15);
    color: #422006;
}

/* ===== CASINO PREMIUM TOUCH ===== */
h3, h4, h5 {
    color: #065f46;
}

small.text-muted {
    color: #6b7280 !important;
}




</style>

<section class="pt-5 mt-5 bg-white shadow-sm profit-section_ss">
    <div class="container my-5">
        <div class="row mb-4">

            <?php if ($my_info->sts == 1) { ?>
            <div class="col-md-6 mb-4">
                <div class="card border-primary animate__animated animate__fadeInLeft shadow-lg">
                    <div class="card-header bg-gradient-primary bg-primary text-white d-flex justify-content-between align-items-center p-3 rounded-3 ">
                        <h5 class="mb-0"><i class="fas fa-user-circle me-2"></i>My Batch Profile</h5>
                        <div>
                            <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i>Active</span>
                            <!-- <span class="badge bg-warning ms-2"><i class="fas fa-star me-1"></i>Premium</span>
                            <span class="badge bg-info ms-2"><i class="fas fa-crown me-1"></i>VIP</span> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-3 border rounded bg-light">
                                    <h3 class="text-primary mb-3">Batch # <span class="text-dark fw-bold  " ><?= strtoupper($batch_users->batch_name); ?></span></h3>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-calendar-alt text-secondary me-2"></i>
                                        <p class="lead mb-0">Joined: <?= date('d M Y', strtotime($my_info->join_date)) ?></p>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-id-card text-secondary me-2"></i>
                                        <p class="text-muted mb-0">ID: <?= $my_info->user_reffer_code_times; ?></p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-users text-secondary me-2"></i>
                                        <p class="text-muted mb-0">Team Size: <?= count($ref_users); ?> Members</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-circle-plus text-secondary me-2"></i>
                                        <p class="text-muted mb-0"> Next Level: <?= $batch_users->next_level_no - count($ref_users); ?> Members</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded bg-gradient-light">
                                    <div class="text-end mb-3">
                                        <img src="<?= $batch_users->batch_img_path; ?>" width="100px" style="float:left;" alt="" srcset="">
                                        <h4 class="text-success mb-2">Performance Score</h4>
                                        <div class="display-4 text-primary fw-bold">.<small>%</small></div>
                                        <small class="text-muted">Last updated: Today</small>
                                    </div>
                                    <div class="d-flex justify-content-end gap-2">
                                        <span class="badge bg-info"><i class="fas fa-level-up-alt me-1"></i>Level <?= $batch_users->batch_position; ?></span>
                                        <span class="badge bg-dark "><i class="fas fa-medal me-1"></i><?= $batch_users->batch_name; ?></span>
                                        <span class="badge bg-warning"><i class="fas fa-bolt me-1"></i>Active</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 mb-4">
                            <h6 class="text-muted mb-2">Progress to Next Level</h6>
                            <div class="progress" style="height: 25px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-gradient-primary text-light fw-bold " role="progressbar" style="width: <?= (count($present_reffers) / $batch_users->next_level_no) * 100; ?>%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    <?= (count($present_reffers) / $batch_users->next_level_no) * 100; ?>% Complete
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <small class="text-success"><i class="fas fa-check-circle me-1"></i>Current: Level <?= $batch_users->batch_position; ?></small>
                                <small class="text-primary"><i class="fas fa-flag-checkered me-1"></i>Next: Level <?= $batch_users->batch_position + 1; ?> (<?= (count($present_reffers) / $batch_users->next_level_no) * 100; ?>% remaining)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card border-success animate__animated animate__fadeInRight">
                    <div class=" p-3 rounded-3 card-header bg-success text-white">
                        <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>Referral Statistics</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <a class="col-md-4 " href="<?= base_url('user/add_referral') ?>">
                                <div class="border rounded p-3 text-center hover-bg-success cursor-pointer">
                                    <h3 class="text-success hover-text-white font-weight-bold">Add New Referral</h3>
                                </div>
                            </a>
                            <div class="col-md-4">
                                <div class="border rounded p-3 text-center">
                                    <h3 class="text-warning">0</h3>
                                    <p class="mb-0">Earning Points</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="border rounded p-3 text-center">
                                    <h3 class="text-info">0</h3>
                                    <p class="mb-0">Total Teams</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="form-label">Your Unique Referral Link</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="<?= base_url('register_ref/' . $my_info->user_reffer_code_times) ?>" id="referralLink" readonly>
                                <button class="btn btn-success bg-success text-white " onclick="copyLink()">
                                    <i class="fas fa-copy me-1"></i>Copy
                                </button>
                            </div>
                        </div>
                        <div class="d-flex gap-2 mt-4 mb-5 ">
                            <button class="btn btn-primary bg-primary rounded-3 text-white flex-grow-1" onclick="window.open('https://wa.me/?text=<?= urlencode(base_url('register_ref/' . $my_info->user_reffer_code_times)) ?>')">
                                <i class="fab fa-whatsapp me-1"></i>Share on WhatsApp
                            </button>
                            <button class="btn btn-info bg-info rounded-3 text-white flex-grow-1" onclick="window.open('https://telegram.me/share/url?url=<?= urlencode(base_url('register_ref/' . $my_info->user_reffer_code_times)) ?>')">
                                <i class="fab fa-telegram me-1"></i>Share on Telegram
                            </button>
                        </div> 
                    </div>
                </div>
            </div>

            <div class="col-12 mb-4">
                <div class="card border-info animate__animated animate__fadeInUp">
                    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">My Referrals</h5>
                        <div class="btn-group">
                            <button class="btn btn-light btn-sm" onclick="window.print()">Print List</button>
                            <button class="btn btn-light btn-sm" onclick="exportToExcel()">Export Excel</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Batch</th>
                                        <th>Join Date</th>
                                        <th>Status</th>
                                        <th>Referral</th>
                                        <th>Performance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($ref_users)) : ?>
                                        <?php foreach ($ref_users as $referral) :
                                            $batch = $db->table('user_badge_s')
                                                        ->where('batch_user_inf_ids', $referral->user_full_info_idd)
                                                        ->join('batch_details', 'batch_details.batch_detail_idd = user_badge_s.batch_b_detail_idds', 'left')
                                                        ->get()
                                                        ->getRow();
                                            $ref_user = $db->table('user_reffer')->where('reffer_main_idd', $referral->user_full_info_idd)->get()->getResult();
                                            if (!$ref_user) {
                                                $ref_user = [];
                                            }
                                        ?>
                                            <tr class="animate__animated animate__fadeIn">
                                                <td><?= $referral->user_full_name; ?></td>
                                                <td>Batch # <?= $batch->batch_name; ?></td>
                                                <td><?= date('d M Y', strtotime($referral->join_date)); ?></td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td><?= count($ref_user); ?> Person</td>
                                                <td>
                                                    <div class="progress" style="height: 20px;">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?= (100 / $batch->next_level_no) * count($ref_user); ?>%;" aria-valuenow="<?= (100 / $batch->next_level_no) * count($ref_user); ?>" aria-valuemin="0" aria-valuemax="100"><?= (100 / $batch->next_level_no) * count($ref_user); ?>%</div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No referrals found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php } else { ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center" role="alert">
                        <h2 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>Account Inactive!</h2>
                        <p>Your account is currently inactive. Please contact support to activate your account and access referral features.</p>
                        <hr>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>






    <script>
        function copyLink() {
            var copyText = document.getElementById("referralLink");
            copyText.select();
            document.execCommand("copy");
            alert("Referral link copied!");
        }
    </script>






