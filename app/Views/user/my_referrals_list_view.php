
<?php
    // CodeIgniter instance পাওয়া
    $db = \Config\Database::connect();
?>

<section class="pt-5 mt-5 bg-white shadow-sm profit-section_ss">
    <div class="container my-5">
        <div class="row mb-4">

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
                                    <h3 class="text-primary mb-3">Batch #<?= session()->get('batch_id') ?></h3>
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
                                        <div class="display-4 text-primary fw-bold">75<small>%</small></div>
                                        <small class="text-muted">Last updated: Today</small>
                                    </div>
<!--  batch_users->batch_name -->
                                    <div class="d-flex justify-content-end gap-2">
                                        <span class="badge bg-info"><i class="fas fa-level-up-alt me-1"></i>Level <?= $batch_users->batch_position; ?></span>
                                        <span class="badge bg-silver"><i class="fas fa-medal me-1"></i>Silver</span>
                                        <span class="badge bg-warning"><i class="fas fa-bolt me-1"></i>Active</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 mb-4">
                            <h6 class="text-muted mb-2">Progress to Next Level</h6>
                            <div class="progress" style="height: 25px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-gradient-primary" 
                                        role="progressbar" style="width: <?= (100 / $batch_users->next_level_no) * count($ref_users); ?>%;" 
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    <?= (100 / $batch_users->next_level_no) * count($ref_users); ?>% Complete
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <small class="text-success"><i class="fas fa-check-circle me-1"></i>Current: Level <?= $batch_users->batch_position; ?></small>
                                <small class="text-primary"><i class="fas fa-flag-checkered me-1"></i>Next: Level <?= $batch_users->batch_position + 1; ?> (<?= 100 - ((100 / $batch_users->next_level_no) * count($ref_users)) ?>% remaining)</small>
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
                            <button class="btn btn-primary bg-primary rounded-3 text-white flex-grow-1" onclick="window.open('https://wa.me/?text=<?= urlencode(base_url('register/' . session()->get('referral_code'))) ?>')">
                                <i class="fab fa-whatsapp me-1"></i>Share on WhatsApp
                            </button>
                            <button class="btn btn-info bg-info rounded-3 text-white flex-grow-1" onclick="window.open('https://telegram.me/share/url?url=<?= urlencode(base_url('register/' . session()->get('referral_code'))) ?>')">
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






