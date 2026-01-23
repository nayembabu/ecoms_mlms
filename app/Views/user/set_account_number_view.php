<section class="pt-5 mt-5 vibrant-casino-section" style="background: linear-gradient(135deg, #120078, #000000, #780000); min-height: 100vh; position: relative; overflow: hidden;">
    <!-- Vibrant casino lights background overlay -->
    <div style="position: absolute; inset: 0; background: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&q=80') center/cover no-repeat; opacity: 0.2; pointer-events: none;"></div>
    
    <!-- Animated glowing particles for extra flair -->
    <div class="particles" style="position: absolute; inset: 0; pointer-events: none;">
        <div class="particle" style="position: absolute; width: 10px; height: 10px; background: #00ffea; border-radius: 50%; box-shadow: 0 0 20px #00ffea; animation: float 15s infinite; top: 20%; left: 10%;"></div>
        <div class="particle" style="position: absolute; width: 15px; height: 15px; background: #ff00ff; border-radius: 50%; box-shadow: 0 0 25px #ff00ff; animation: float 20s infinite reverse; top: 60%; left: 80%;"></div>
        <div class="particle" style="position: absolute; width: 12px; height: 12px; background: #ffff00; border-radius: 50%; box-shadow: 0 0 20px #ffff00; animation: float 18s infinite; top: 40%; left: 50%;"></div>
    </div>

    <div class="container my-5 position-relative">
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-2xl rainbow-glow animate__animated animate__fadeIn" style="background: rgba(10, 10, 30, 0.92); border-radius: 25px; overflow: hidden; backdrop-filter: blur(10px);">
                    <!-- Rainbow neon header -->
                    <div class="card-header text-white p-5 text-center position-relative" style="background: linear-gradient(45deg, #ff006e, #3a86ff, #ffbe0b, #8338ec, #06ffa5); background-size: 400% 400%; animation: rainbow 8s ease infinite; box-shadow: 0 0 40px rgba(255, 255, 255, 0.6);">
                        <h1 class="mb-0 display-3 fw-bold neon-rainbow-text" style="font-size: 3.5rem; letter-spacing: 6px; text-shadow: 0 0 15px #fff, 0 0 30px #ff00ff, 0 0 45px #00ffff;">
                            <i class="fas fa-diamond me-3" style="color: #00ffea;"></i>WITHDRAWAL SETTINGS
                        </h1>
                        <p class="mb-0 mt-4 display-6 fw-light" style="font-size: 1.8rem; opacity: 0.95;">
                            <i class="fas fa-gem me-2" style="color: #ffff00;"></i>Set up your winning payout method
                        </p>
                    </div>

                    <div class="card-body p-5 text-white">
                        <?php if ($my_info->user_withdraw_nos && $my_info->user_withdraw_method && $my_info->payments_names) { ?>
                            <div class="alert vibrant-alert text-center py-5 animate__animated animate__pulse animate__infinite" style="background: linear-gradient(135deg, rgba(0,255,234,0.2), rgba(255,0,255,0.2)); border: 3px solid #00ffea; border-radius: 20px; box-shadow: 0 0 30px rgba(0,255,234,0.5); font-size: 1.6rem;">
                                <i class="fas fa-crown me-3" style="color: #ffff00; font-size: 2.5rem;"></i>
                                <strong>Current Method:</strong> <?php echo esc($my_info->user_withdraw_method); ?><br><br>
                                <i class="fas fa-wallet me-3" style="color: #ff00ff;"></i>
                                <strong>Account Number:</strong> <?php echo esc($my_info->user_withdraw_nos); ?><br><br>
                                <i class="fas fa-user-astronaut me-3" style="color: #3a86ff;"></i>
                                <strong>Holder Name:</strong> <?php echo esc($my_info->payments_names); ?>
                            </div>
                        <?php } else { ?>
                            <form class="needs-validation" novalidate method="post" action="user/set_account_number_action">
                                <div class="mb-5 animate__animated animate__fadeInLeft">
                                    <label class="form-label fw-bold display-6" style="font-size: 1.8rem; color: #00ffea; text-shadow: 0 0 12px #00ffea;">
                                        <i class="fas fa-university me-3"></i>Payment Method
                                    </label>
                                    <select class="form-select form-select-xl vibrant-select" name="bank_name" required style="background: rgba(20,0,40,0.8); border: 3px solid #ff00ff; color: white; font-size: 1.4rem; height: 70px; box-shadow: 0 0 25px rgba(255,0,255,0.4);">
                                        <option value="">Select your method</option>
                                        <option <?php if ($my_info->user_withdraw_method == 'bkash') { echo 'selected'; } ?> value="bkash">bKash</option>
                                        <option <?php if ($my_info->user_withdraw_method == 'nagad') { echo 'selected'; } ?> value="nagad">Nagad</option>
                                        <option <?php if ($my_info->user_withdraw_method == 'rocket') { echo 'selected'; } ?> value="rocket">Rocket</option>
                                        <option <?php if ($my_info->user_withdraw_method == 'upay') { echo 'selected'; } ?> value="upay">Upay</option>
                                        <option <?php if ($my_info->user_withdraw_method == 'binance') { echo 'selected'; } ?> value="binance">Binance</option>
                                    </select>
                                </div>

                                <div class="mb-5 animate__animated animate__fadeInRight">
                                    <label class="form-label fw-bold display-6" style="font-size: 1.8rem; color: #ffff00; text-shadow: 0 0 12px #ffff00;">
                                        <i class="fas fa-credit-card me-3"></i>Account Number
                                    </label>
                                    <input type="text" name="account_number" class="form-control form-control-xl vibrant-input" pattern="[0-9]{8,}" required placeholder="Enter your account number" value="<?= $my_info->user_withdraw_nos; ?>" style="background: rgba(40,0,20,0.8); border: 3px solid #ffff00; color: white; font-size: 1.4rem; height: 70px;">
                                    <small class="text-muted d-block mt-2" style="font-size: 1.2rem;">Must be at least 8 digits</small>
                                </div>

                                <div class="mb-5 animate__animated animate__fadeInLeft">
                                    <label class="form-label fw-bold display-6" style="font-size: 1.8rem; color: #ff006e; text-shadow: 0 0 12px #ff006e;">
                                        <i class="fas fa-user me-3"></i>Account Holder Name
                                    </label>
                                    <input type="text" name="account_holder_name" class="form-control form-control-xl vibrant-input" required placeholder="Enter account holder's name" value="<?= $my_info->payments_names; ?>" style="background: rgba(0,30,40,0.8); border: 3px solid #ff006e; color: white; font-size: 1.4rem; height: 70px;">
                                </div>

                                <div class="d-grid gap-4 d-md-flex justify-content-center animate__animated animate__fadeInUp">
                                    <button type="submit" class="btn btn-xl vibrant-btn-win px-6 py-4" style="background: linear-gradient(45deg, #06ffa5, #3a86ff); color: #000; font-size: 1.6rem; font-weight: bold; box-shadow: 0 0 40px rgba(6,255,165,0.8); border: none; border-radius: 50px;">
                                        <i class="fas fa-save me-3"></i> SAVE CHANGES
                                    </button>
                                    <button type="reset" class="btn btn-xl vibrant-btn-reset px-6 py-4" style="background: linear-gradient(45deg, #ffbe0b, #ff006e); color: white; font-size: 1.6rem; font-weight: bold; box-shadow: 0 0 40px rgba(255,190,11,0.8); border: none; border-radius: 50px;">
                                        <i class="fas fa-undo me-3"></i> RESET
                                    </button>
                                </div>
                            </form>
                        <?php } ?>
                    </div>

                    <div class="card-footer text-center py-5" style="background: rgba(0, 0, 0, 0.6);">
                        <p class="mb-0 display-6" style="font-size: 1.6rem; color: #00ffea; text-shadow: 0 0 10px #00ffea;">
                            <i class="fas fa-lock me-3"></i>
                            Your data is 100% secure — Encrypted like a vault!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom CSS for animations and extra effects -->
<style>
    @keyframes rainbow {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    @keyframes float {
        0% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-30px) rotate(180deg); }
        100% { transform: translateY(0) rotate(360deg); }
    }
    .vibrant-select:focus, .vibrant-input:focus {
        box-shadow: 0 0 35px rgba(255, 255, 255, 0.8) !important;
        transform: scale(1.02);
    }
    .vibrant-btn-win:hover { transform: scale(1.1); box-shadow: 0 0 60px rgba(6,255,165,1); }
    .vibrant-btn-reset:hover { transform: scale(1.1); box-shadow: 0 0 60px rgba(255,190,11,1); }
    .rainbow-glow { box-shadow: 0 0 50px rgba(255, 255, 255, 0.5); }
</style>