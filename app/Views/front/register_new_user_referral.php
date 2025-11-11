<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?= base_url(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Referral Program</title>
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

</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Join Our Community</h1>
            <p>Create your account with a referral link</p>
        </div>

        <div class="form-container">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" name="fullname" required placeholder="Enter your full name">
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
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
                    <input type="text" readonly id="referral_code" name="referral_code" value="<?= $referral_id; ?>" >
                    <p>📌 Have a referral code? Enter it to get exclusive benefits!</p>
                    <input type="hidden" name="referral_id" value="<?= $referral_id; ?>">
                    <input type="hidden" name="referral_id" value="<?= $user_info->user_full_info_idd; ?>">
                    <input type="hidden" name="referral_id" value="<?= $user_info->user_phone_no; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Create Account</button>
                <div class="login-link">
                    Already have an account? <a href="/login">Login here</a>
                </div>
            </form>
        </div>
    </div>

    <script>
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
        })();
    </script>
</body>
</html>