




<section class="pt-5 mt-5 bg-white shadow-sm profit-section_ss">
    <div class="container my-5">
        <div class="row mb-4">


            <div class="col-lg-8 mx-auto rounded ">
                <div class="card border-0 shadow-lg animate__animated animate__fadeIn">
                    <div class="card-header bg-primary text-white p-4">
                        <h4 class="mb-0"><i class="fas fa-university me-2"></i>Withdrawal Account Settings</h4>
                        <p class="mb-0 mt-2 small">Please enter your bank account details for withdrawals</p>
                    </div>
                    <div class="card-body p-4">
                        
                        <?php if ($my_info->user_withdraw_nos) { ?>
                            <div class="alert alert-info animate__animated animate__fadeInDown" role="alert">
                                <i class="fas fa-info-circle me-2"></i>Your current withdrawal account number is: <strong><?php echo esc($my_info->user_withdraw_nos); ?></strong>
                            </div>
                        <?php }else { ?>
                            <form class="needs-validation" novalidate method="post" action="user/set_account_number_action">
                                <div class="mb-4 animate__animated animate__fadeInLeft">
                                    <label class="form-label fw-bold"><i class="fas fa-bank me-2"></i>Bank Name</label>
                                    <select class="form-select form-select-lg" name="bank_name" required>
                                        <option value="">Select your bank</option>
                                        <option value="bkash">bKash</option>
                                        <option value="nagad">Nagad</option>
                                        <option value="rocket">Rocket</option>
                                        <option value="upay">Upay</option>
                                        <option value="binance">Binance</option>
                                    </select>
                                    <div class="invalid-feedback">Please select your bank</div>
                                </div>

                                <div class="mb-4 animate__animated animate__fadeInRight">
                                    <label class="form-label fw-bold"><i class="fas fa-credit-card me-2"></i>Account Number</label>
                                    <input type="text" name="account_number" class="form-control form-control-lg" pattern="[0-9]{8,}" required
                                    placeholder="Enter your account number">
                                    <div class="invalid-feedback">Please enter a valid account number</div>
                                    <small class="text-muted">Must be at least 8 digits long</small>
                                </div>

                                <div class="mb-4 animate__animated animate__fadeInLeft">
                                    <label class="form-label fw-bold"><i class="fas fa-user me-2"></i>Account Holder Name</label>
                                    <input type="text" name="account_holder_name" class="form-control form-control-lg" required
                                    placeholder="Enter account holder's name">
                                    <div class="invalid-feedback">Please enter the account holder name</div>
                                </div>

                                <div class="d-grid gap-2 animate__animated animate__fadeInUp">
                                    <button type="submit" class="btn btn-success btn-lg bg-success text-white w-50 mx-auto  ">
                                        <i class="fas fa-save me-2"></i> Save Changes
                                    </button>
                                    <button type="reset" class="btn btn-outline-danger bg-danger text-white btn-lg w-50 mx-auto ">
                                        <i class="fas fa-undo me-2"></i> Reset Form
                                    </button>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                    <div class="card-footer bg-light p-3">
                        <div class="text-center text-muted small">
                        <i class="fas fa-shield-alt me-2"></i>Your banking information is secure and encrypted
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
