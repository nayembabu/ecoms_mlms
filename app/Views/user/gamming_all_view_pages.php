






        <!-- Lottery Info Section -->
        <section class="mt-5 container ">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark fw-bold">🎟️ Lottery Information</div>
                    <div class="card-body">
                        <div class="row text-center">
                            <?php if ($lottery_info) { ?>
                                <div class="col-md-4">
                                    <div class="p-3 bg-light rounded">
                                        <h6 class="fw-bold">Present Lottery</h6>
                                        <p class="fs-3 fw-bold text-primary"><?= $lottery_info->lottery_unq_no; ?></p>
                                        <p class="fs-5 fw-bold text-dark">Draw Date <?= $lottery_info->expire_dates; ?></p>
                                        <a href="user/lottery_system"  class="btn text-white bg-primary btn-primary btn-sm w-100">Participate Now</a>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-md-4 ">
                                <div class="p-3 bg-light rounded">
                                    <h6 class="fw-bold">Your Tickets</h6>
                                    <p class="fs-4 fw-bold text-success">Ticket</p>
                                    <a href="user/your_lottery_history_system" class="btn text-white btn-success bg-success btn-sm w-100">View Tickets</a>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="p-3 bg-light rounded">
                                    <h6 class="fw-bold">See ALL Lottery</h6>
                                    <p class="fs-4 fw-bold text-success">ALL Lottery</p>
                                    <a href="user/all_lottery_history_system" class="btn text-white bg-dark btn-dark btn-sm w-100">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




        <div class="p-4">
            <!-- Stats Row -->
            <div class="row g-3">
                <div class="col-12 col-md-4">
                    <div class="card shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="me-3 p-3 rounded-3" style="background: linear-gradient(135deg,#ffd6a5,#ffb4b4);">
                                <i class="bi bi-controller fs-3"></i>
                            </div>
                            <div>
                                <div class="small text-muted">Total Playtime</div>
                                <div class="fw-bold">248 hrs</div>
                            </div>
                            <div class="ms-auto text-end">
                                <div class="small text-muted">Avg/day</div>
                                <div class="fw-bold">2.1 hrs</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="me-3 p-3 rounded-3" style="background: linear-gradient(135deg,#cce7ff,#b8f2e6);">
                                <i class="bi bi-trophy fs-3"></i>
                            </div>
                            <div>
                                <div class="small text-muted">Achievements</div>
                                <div class="fw-bold">36 unlocked</div>
                            </div>
                            <div class="ms-auto text-end">
                                <div class="small text-muted">Next</div>
                                <div class="fw-bold">3 to Gold</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="me-3 p-3 rounded-3" style="background: linear-gradient(135deg,#e5ccff,#ffd6f0);">
                                <i class="bi bi-people fs-3"></i>
                            </div>
                            <div>
                                <div class="small text-muted">Friends Online</div>
                                <div class="fw-bold">8</div>
                            </div>
                            <div class="ms-auto text-end">
                                <div class="small text-muted">Requests</div>
                                <div class="fw-bold text-primary">2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>








    </div>
</section>









