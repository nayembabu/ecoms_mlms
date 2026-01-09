<?php ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?= base_url(); ?>">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="inc/front/assets/imgs/bg_icons.png" type="image/x-icon">
        <title>Royal Chain - Online Banking & Finance</title>
        <!-- Font Awesome (CDN) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 20px;
            }
            .container {
                background: white;
                border-radius: 10px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
                overflow: hidden;
                max-width: 500px;
                width: 100%;
            }
            .header {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 30px 20px;
                text-align: center;
            }
        
            .header h1 {
                font-size: 28px;
                margin-bottom: 10px;
            }
        
            .header p {
                font-size: 14px;
                opacity: 0.9;
            }
        
            .form-container {
                padding: 30px;
            }
        
            .form-group {
                margin-bottom: 20px;
            }
        
            label {
                display: block;
                margin-bottom: 8px;
                color: #333;
                font-weight: 500;
                font-size: 14px;
            }
            input[type="text"],
            input[type="email"],
            input[type="password"],
            input[type="tel"] {
                width: 100%;
                padding: 12px;
                border: 1px solid #ddd;
                border-radius: 5px;
                font-size: 14px;
                transition: border-color 0.3s;
            }
            input[type="text"]:focus,
            input[type="email"]:focus,
            input[type="password"]:focus,
            input[type="tel"]:focus {
                outline: none;
                border-color: #667eea;
                box-shadow: 0 0 5px rgba(102, 126, 234, 0.1);
            }
            .referral-group {
                background: #f8f9fa;
                padding: 15px;
                border-radius: 5px;
                margin-bottom: 20px;
            }
            .referral-group label {
                margin-bottom: 10px;
            }
            .referral-group p {
                font-size: 12px;
                color: #666;
                margin-top: 8px;
            }
            .btn {
                width: 100%;
                padding: 12px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s;
            }
            .btn-primary {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
            }
            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
            }
            .login-link {
                text-align: center;
                margin-top: 20px;
                font-size: 14px;
                color: #666;
            }
            .login-link a {
                color: #667eea;
                text-decoration: none;
                font-weight: 600;
            }
            .login-link a:hover {
                text-decoration: underline;
            }
            .error {
                color: #e74c3c;
                font-size: 12px;
                margin-top: 5px;
            }
            /* small hover/focus affordance for the icon */
            .password-toggle:focus { outline: none; }
            .password-toggle:hover { color:#4c63d2; }
        </style>

        <script src="inc/plugin/jq3.min.js"></script>
    </head>
    <body>
    <style>
        /* decorative "profit" icons floating around the page - extended set (more BDT-focused) */
        .profit-bubbles { pointer-events: none; z-index: 9999; position: fixed; inset: 0; overflow: visible; }
        /* base bubble */
        .profit-bubble {
            position: fixed;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 999px;
            color: #fff;
            font-weight: 700;
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
            transform-origin: center;
            white-space: nowrap;
            font-size: 14px;
            pointer-events: none;
            will-change: transform, opacity;
            opacity: 0; /* Start hidden */
            transition: opacity 0.5s ease-in-out; /* Smooth show/hide */
        }
        /* icon sizing */
        .profit-bubble i { font-size: 18px; line-height:1; }
        /* positions, color themes, durations and optional delays for natural feel */
        .pb-1  { left: 6%;  top: 8%;   background: linear-gradient(90deg,#28a745,#20c997); animation: floatY 6s ease-in-out infinite; animation-delay: 0s; }
        .pb-2  { right: 6%; top: 4%;   background: linear-gradient(90deg,#ffb347,#ff7e5f); animation: floatY 5.6s ease-in-out infinite; animation-delay: .6s; }
        .pb-3  { left: 4%;  bottom: 18%;background: linear-gradient(90deg,#6f42c1,#6610f2); animation: floatY 7.1s ease-in-out infinite; animation-delay: .2s; }
        .pb-4  { right: 6%; bottom: 20%; background: linear-gradient(90deg,#ffc107,#ff9800); animation: floatY 6.2s ease-in-out infinite; animation-delay: .4s; }
        .pb-5  { left: 10%; top: 4%;    transform: translateX(-50%); background: linear-gradient(90deg,#667eea,#764ba2); animation: floatY 8s ease-in-out infinite; animation-delay: 1s; }
        /* extra bubbles (more density) */
        .pb-6  { left: 12%; top: 26%;   background: linear-gradient(90deg,#20c997,#12b886); animation: floatY 5.8s ease-in-out infinite; animation-delay: .3s; transform-origin:center; }
        .pb-7  { right: 14%; top: 22%;  background: linear-gradient(90deg,#ff6b6b,#ff8787); animation: floatY 6.4s ease-in-out infinite; animation-delay: .9s; }
        .pb-8  { left: 8%; bottom: 36%; background: linear-gradient(90deg,#0dcaf0,#4dd0e1); animation: floatY 7.4s ease-in-out infinite; animation-delay: .7s; }
        .pb-9  { right: 20%; bottom: 34%;background: linear-gradient(90deg,#198754,#2ecc71); animation: floatY 6.8s ease-in-out infinite; animation-delay: .1s; }
        .pb-10 { left: 25%; top: 50%;    background: linear-gradient(90deg,#3b82f6,#06b6d4); animation: floatY 8.5s ease-in-out infinite; animation-delay: 1.2s; transform: translateX(-10%); }
        .pb-11 { right: 28%; top: 46%;   background: linear-gradient(90deg,#f59e0b,#f97316); animation: floatY 7.2s ease-in-out infinite; animation-delay: .5s; transform: translateX(6%); }
        .pb-12 { left: 25%; bottom: 12%; background: linear-gradient(90deg,#7c3aed,#6d28d9); animation: floatY 6.6s ease-in-out infinite; animation-delay: .2s; }
        /* extra Bangladesh-focused bubbles */
        .pb-13 { left: 18%; top: 12%; background: linear-gradient(90deg,#0f5132,#198754); animation: floatY 6.6s ease-in-out infinite; animation-delay: .4s; }
        .pb-14 { right: 18%; top: 14%; background: linear-gradient(90deg,#0d6efd,#6610f2); animation: floatY 7.0s ease-in-out infinite; animation-delay: .8s; }
        .pb-15 { left: 24%; bottom: 28%; background: linear-gradient(90deg,#d63384,#c026d3); animation: floatY 6.2s ease-in-out infinite; animation-delay: .2s; }
        .pb-16 { right: 20%; bottom: 22%; background: linear-gradient(90deg,#fd7e14,#f97316); animation: floatY 6.9s ease-in-out infinite; animation-delay: .6s; }
        /* additional bubbles (more and more) */
        .pb-17 { left: 4%;  top: 28%;  background: linear-gradient(90deg,#075985,#06b6d4); animation: floatY 7.4s ease-in-out infinite; animation-delay: .2s; }
        .pb-18 { right: 2%; top: 34%;   background: linear-gradient(90deg,#0dcaf0,#20c997); animation: floatY 6.1s ease-in-out infinite; animation-delay: .9s; }
        .pb-19 { left: 14%; bottom: 6%; transform: translateX(-50%); background: linear-gradient(90deg,#6610f2,#8b5cf6); animation: floatY 8.2s ease-in-out infinite; animation-delay: .5s; }
        .pb-20 { left: 15%; top: 22%;   background: linear-gradient(90deg,#22c55e,#16a34a); animation: floatY 6.7s ease-in-out infinite; animation-delay: .3s; }
        .pb-21 { right: 16%; top: 8%;   background: linear-gradient(90deg,#f97316,#ef4444); animation: floatY 7.0s ease-in-out infinite; animation-delay: .6s; }
        .pb-22 { left: 20%; bottom: 30%; background: linear-gradient(90deg,#06b6d4,#3b82f6); animation: floatY 6.9s ease-in-out infinite; animation-delay: .7s; }
        .pb-23 { left: 18%; bottom: 36%; background: linear-gradient(90deg,#ffd43b,#ff6b6b); animation: floatY 7.6s ease-in-out infinite; animation-delay: .4s; }
        .pb-24 { right: 10%; top: 52%;   background: linear-gradient(90deg,#10b981,#06b6d4); animation: floatY 8.0s ease-in-out infinite; animation-delay: .2s; }
        .pb-25 { left: 84%; bottom: 44%; background: linear-gradient(90deg,#7c3aed,#a78bfa); animation: floatY 7.8s ease-in-out infinite; animation-delay: .5s; }
        /* micro bubbles for added density */
        .pb-26 { left: 90%; top: 6%; padding:8px 10px; font-size:13px; background: linear-gradient(90deg,#ffb6b9,#fae3d9); color:#111; animation: floatY 5.5s ease-in-out infinite; animation-delay: .3s; }
        .pb-27 { left: 68%; top: 36%; padding:8px 10px; font-size:13px; background: linear-gradient(90deg,#c7f9cc,#8be9a8); color:#0b3d2e; animation: floatY 6.2s ease-in-out infinite; animation-delay: .7s; }
        .pb-28 { right: 66%; bottom: 8%; padding:8px 10px; font-size:13px; background: linear-gradient(90deg,#d1fae5,#86efac); color:#054e3a; animation: floatY 6.4s ease-in-out infinite; animation-delay: .9s; }
        /* emphasize taka displays */
        .taka { font-weight:800; margin-left:4px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        /* optional size variations */
        .pb-3 i, .pb-3 span { font-size: 15px; }
        .pb-5 { padding: 12px 18px; font-size:15px; }
        .pb-8 { padding: 9px 12px; font-size:13px; }
        .pb-10 { padding: 14px 18px; font-size:16px; font-weight:800; }
        /* gentle tilt to make them feel more lively */
        @keyframes floatY {
            0%   { transform: translateY(0) rotate(-1deg) scale(1); }
            25%  { transform: translateY(-8px) rotate(1deg) scale(1.02); }
            50%  { transform: translateY(-14px) rotate(-1deg) scale(1.03); }
            75%  { transform: translateY(-8px) rotate(1deg) scale(1.02); }
            100% { transform: translateY(0) rotate(-1deg) scale(1); }
        }
        /* subtle entrance for variety */
        .profit-bubble { animation-fill-mode: both; }
        /* hide decorative items on very small screens */
        @media (max-width: 780px) {
            .profit-bubble { display: none; }
        }
        .error{
            color:red;
            font-size:12px;
        }
    </style>
    <div class="profit-bubbles" aria-hidden="true">
        <div class="profit-bubble pb-1"><i class="fa-solid fa-coins"></i><span>+3,200 Sales</span></div>
        <div class="profit-bubble pb-2"><i class="fa-solid fa-chart-line"></i><span>+52% Growth</span></div>
        <div class="profit-bubble pb-3"><i class="fa-solid fa-money-bill-trend-up"></i><span>৳98,000 / mo</span></div>
        <div class="profit-bubble pb-4"><i class="fa-solid fa-wallet"></i><span>High Returns</span></div>
        <div class="profit-bubble pb-5"><i class="fa-solid fa-trophy"></i><span>Top Rated</span></div>
        <!-- more bubbles -->
        <div class="profit-bubble pb-6"><i class="fa-solid fa-star"></i><span>4.9 ★ Reviews</span></div>
        <div class="profit-bubble pb-7"><i class="fa-solid fa-gem"></i><span>Premium Offers</span></div>
        <div class="profit-bubble pb-8"><i class="fa-solid fa-piggy-bank"></i><span>Save <span class="taka">৳12,400</span></span></div>
        <div class="profit-bubble pb-9"><i class="fa-solid fa-chart-pie"></i><span>Market Share +18%</span></div>
        <div class="profit-bubble pb-12"><i class="fa-solid fa-award"></i><span>Award Winner</span></div>
        <!-- Bangladesh / taka themed bubbles -->
        <div class="profit-bubble pb-13"><i class="fa-solid fa-money-bill-wave"></i><span><span class="taka">৳</span>45,600 Earnings</span></div>
        <div class="profit-bubble pb-14"><i class="fa-solid fa-hand-holding-dollar"></i><span><span class="taka">৳</span>9,800 Cashback</span></div>
        <div class="profit-bubble pb-15"><i class="fa-solid fa-wallet"></i><span><span class="taka">৳</span>120K Reserve</span></div>
        <div class="profit-bubble pb-16"><i class="fa-solid fa-coins"></i><span>৳3,200 Daily</span></div>
        <!-- extended set (more and more) -->
        <div class="profit-bubble pb-17"><i class="fa-solid fa-hand-holding-hand"></i><span>Trusted Partners</span></div>
        <div class="profit-bubble pb-18"><i class="fa-solid fa-bag-shopping"></i><span>+12,000 Orders</span></div>
        <div class="profit-bubble pb-19"><i class="fa-solid fa-money-bill"></i><span><span class="taka">৳</span>215,000 Revenue</span></div>
        <div class="profit-bubble pb-20"><i class="fa-solid fa-chart-simple"></i><span>Growth +68%</span></div>
        <div class="profit-bubble pb-21"><i class="fa-solid fa-seedling"></i><span>Sustainable ROI</span></div>
        <div class="profit-bubble pb-23"><i class="fa-solid fa-piggy-bank"></i><span>Save <span class="taka">৳6,750</span></span></div>
        <div class="profit-bubble pb-24"><i class="fa-solid fa-handshake-simple"></i><span>Partner Deals</span></div>
        <!-- more taka-specific highlights -->
        <div class="profit-bubble pb-29" style="left:10%; top:70%; background: linear-gradient(90deg,#046c4e,#0ea5a4);"><i class="fa-solid fa-wallet"></i><span><span class="taka">৳</span>72,400 Payouts</span></div>
    </div>
        <div class="container">
            <div class="header">

                <a href="" style="max-width: 40% !important; border-radius: 20px; float: left; "  class="web-logo nav-logo">
                    <img src="inc/front/assets/imgs/bg_icons.png" style="max-width: 40% !important; border-radius: 20px;  " class="img-fluid blur-up lazyload" alt="">
                </a>
                <h1>Join Our Community</h1>
                <p>Create your account with a referral link</p>
            </div>
            <div class="form-container">
                <form method="POST" action="new_referral_added">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" name="fullname" required placeholder="Enter your full name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your email">
                        <small id="emailError" class="error"></small>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number">
                        <small id="phoneError" class="error"></small>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" required placeholder="Enter your address">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required placeholder="Enter your username">
                        <small id="usernameError" class="error"></small>
                    </div>
                    <div class="form-group password-wrapper" style="position:relative;">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required placeholder="Create a password" style="padding-right:40px;">
                    </div>
                    <div class="form-group password-wrapper" style="position:relative;">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password" style="padding-right:40px;">
                        <button type="button" id="toggle_password" class="password-toggle" aria-label="Toggle password visibility"
                            style="position:absolute; right:5px; top:70%; transform:translateY(-50%); border:0; background:transparent; cursor:pointer; color:#667eea; font-size:18px; padding:4px;">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                    <div class="referral-group">
                        <label for="referral_code">Referral Code</label>
                        <input type="text" readonly id="referral_code" name="referral_code" required value="<?= $referral_id; ?>" >
                        <p>📌 Have a referral code? Enter it to get exclusive benefits!</p>
                        <input type="hidden" required name="referral_id" value="<?= $referral_id; ?>">
                        <input type="hidden" required name="referral_usr_id" value="<?= $user_info->user_full_info_idd; ?>">
                        <input type="hidden" required name="referral_phn_id" value="<?= $user_info->user_phone_no; ?>">
                    </div>

                    <!-- Terms -->
                    <div class="col-12 d-flex align-items-center">
                        <div class="form-check m-0">
                            <label class="form-check-label text-white-50" for="agree">
                                <input class="form-check-input" name="agree_checkbox" type="checkbox" id="agree" required>
                                I agree to the Terms & Privacy Policy
                            </label>
                        </div>
                    </div>

                    <div class="form-group submit_btn_assign "></div>
                    <div class="login-link">
                        Already have an account? <a href="/login">Login here</a>
                    </div>
                </form>
            </div>
        </div>
        <script>

            function checkUnique(field, value, errorBox){
                if(value === '') return;

                $.ajax({
                    url: "/check-unique",
                    type: "POST",
                    data: {
                        field: field,
                        value: value
                    },
                    success: function(res){
                        if(res.status === 'error'){
                            $(errorBox).text(res.message);
                            $('.submit_btn_assign').html(``);
                        }else{
                            $('.submit_btn_assign').html(`
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            `);
                            $(errorBox).text('');
                        }
                    }
                });
            }


            (function(){
                var pw = document.getElementById('password');
                var cpw = document.getElementById('confirm_password');
                var btn = document.getElementById('toggle_password');
                var icon = btn && btn.querySelector('i');
                if (btn && pw && cpw && icon) {
                    btn.addEventListener('click', function() {
                        var show = pw.type === 'password';
                        pw.type = show ? 'text' : 'password';
                        cpw.type = show ? 'text' : 'password';
                        // toggle icon between eye and eye-slash
                        if (show) {
                            icon.classList.remove('fa-eye');
                            icon.classList.add('fa-eye-slash');
                        } else {
                            icon.classList.remove('fa-eye-slash');
                            icon.classList.add('fa-eye');
                        }
                    });
                }

                $('#email').on('blur', function(){checkUnique('email', $(this).val(), '#emailError');});
                $('#phone').on('blur', function(){checkUnique('phone', $(this).val(), '#phoneError');});
                $('#username').on('blur', function(){checkUnique('username', $(this).val(), '#usernameError');});

            })();

            // New script for sequential bubble show/hide
            (function() {
                const bubbles = document.querySelectorAll('.profit-bubble');
                if (bubbles.length === 0) return;

                const visibleCount = 4;
                let currentIndex = 0;

                function showNextBubble() {
                    bubbles.forEach(bubble => {
                        bubble.style.opacity = '0';
                    });

                    // current index থেকে শুরু করে visibleCount পর্যন্ত দেখাও (লুপ করে)
                    for (let i = 0; i < visibleCount; i++) {
                        const index = (currentIndex + i) % bubbles.length;
                        bubbles[index].style.opacity = '0.98';
                    }

                    // পরের বারের জন্য index এগিয়ে নাও
                    currentIndex = (currentIndex + 1) % bubbles.length;
                }

                // Initial show
                showNextBubble();

                // Change every 1 second
                setInterval(showNextBubble, 1000);
            })();
        </script>
    </body>
</html>