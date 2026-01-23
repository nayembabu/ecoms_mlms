



<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">

<style>
        body {
            background: linear-gradient(135deg, #790808 0%, #456008 50%, #120e65 100%);
            position: absolute;
            inset: 0;
            /* background: url('inc/img/site_bg/bal_transfer.jpg') center/cover no-repeat; */
            /* pointer-events: none; */
            min-height: 100vh;
            font-family: 'Montserrat', sans-serif;
            color: #e0e0e0;
            position: relative;
            overflow-x: hidden;
        }

        /* Casino felt texture + stronger pulse */
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle, rgba(0,100,0,0.3) 0%, transparent 70%);
            pointer-events: none;
            animation: pulse 6s infinite alternate;
        }

        @keyframes pulse {
            0% { opacity: 0.4; }
            100% { opacity: 0.8; }
        }

        /* Multiple falling casino chips (red, black, gold) */
        .chip {
            position: absolute;
            width: 30px;
            height: 30px;
            background: radial-gradient(circle at 30% 30%, #fff, #000);
            border-radius: 50%;
            opacity: 0.7;
            pointer-events: none;
            animation: fall linear infinite;
        }

        .chip.red { background: radial-gradient(circle at 30% 30%, #fff, #ff0000); }
        .chip.black { background: radial-gradient(circle at 30% 30%, #fff, #000); }
        .chip.gold { background: radial-gradient(circle at 30% 30%, #fff, #ffd700); box-shadow: 0 0 15px #ffd700; }

        @keyframes fall {
            0% { transform: translateY(-100px) rotate(0deg); opacity: 0; }
            10% { opacity: 0.7; }
            90% { opacity: 0.7; }
            100% { transform: translateY(110vh) rotate(720deg); opacity: 0; }
        }

        .container {
            position: relative;
            z-index: 1;
        }

        h1, h4, h5 {
            font-family: 'Cinzel', serif;
            color: #ffd700;
            text-shadow: 0 0 15px rgba(255,215,0,0.8);
        }

        .card {
            background: linear-gradient(145deg, #1e1e1e, #2d2d2d);
            border: 3px solid #ffd700;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.9), 0 0 30px rgba(255,215,0,0.4);
        }

        /* Entry animations */
        .main-card {
            animation: dealCard 1.2s ease-out;
        }

        @keyframes dealCard {
            0% { opacity: 0; transform: translateY(-100px) rotate(-30deg) scale(0.8); }
            70% { transform: translateY(20px) rotate(10deg) scale(1.05); }
            100% { opacity: 1; transform: translateY(0) rotate(0) scale(1); }
        }

        .user-result-card {
            animation: slotRoll 1.5s ease-out;
        }

        @keyframes slotRoll {
            0% { opacity: 0; transform: translateY(100px) scale(0.9) rotateX(90deg); }
            60% { transform: translateY(-20px) scale(1.1) rotateX(-20deg); }
            100% { opacity: 1; transform: translateY(0) scale(1) rotateX(0); }
        }

        /* Search bar neon flicker + glow */
        .input-group-lg .form-control {
            background: #111;
            border: 2px solid #00ff88;
            color: #fff;
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
            padding: 0.8rem 1.2rem;
            font-size: 1.1rem;
            box-shadow: 0 0 20px rgba(0,255,136,0.5);
            transition: all 0.4s;
            animation: neonFlicker 4s infinite;
        }

        @keyframes neonFlicker {
            0%, 100% { box-shadow: 0 0 20px rgba(0,255,136,0.5); }
            50% { box-shadow: 0 0 35px rgba(0,255,136,0.9); }
            52% { box-shadow: 0 0 15px rgba(0,255,136,0.3); }
        }

        .input-group-lg .form-control:focus {
            box-shadow: 0 0 40px rgba(0,255,136,1);
            border-color: #00ff88;
        }

        .input-group-lg .btn {
            background: linear-gradient(45deg, #d4af37, #ffd700);
            color: #000;
            font-weight: 600;
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
            padding: 0.8rem 1.8rem;
            box-shadow: 0 0 25px rgba(255,215,0,0.7);
            animation: jackpotPulse 2s infinite;
            transition: transform 0.3s;
        }

        .input-group-lg .btn:hover {
            transform: scale(1.1) rotate(5deg);
        }

        @keyframes jackpotPulse {
            0%, 100% { box-shadow: 0 0 25px rgba(255,215,0,0.7); }
            50% { box-shadow: 0 0 50px rgba(255,215,0,1), 0 0 70px rgba(255,0,0,0.5); }
        }

        /* Profile image roulette spin glow */
        .profile-img {
            border: 6px double #ffd700;
            box-shadow: 0 0 40px rgba(255,215,0,0.9), inset 0 0 20px rgba(255,0,0,0.5);
            animation: rouletteSpin 8s linear infinite;
        }

        @keyframes rouletteSpin {
            0% { transform: rotate(0deg); box-shadow: 0 0 40px rgba(255,215,0,0.9), inset 0 0 20px rgba(255,0,0,0.5); }
            50% { box-shadow: 0 0 60px rgba(255,0,0,1), inset 0 0 30px rgba(0,255,0,0.5); }
            100% { transform: rotate(360deg); box-shadow: 0 0 40px rgba(255,215,0,0.9), inset 0 0 20px rgba(255,0,0,0.5); }
        }

        /* Transfer section entry + chip bounce */
        .transfer-section {
            background: linear-gradient(145deg, #006400, #008000);
            border: 4px solid #ffd700;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 0 40px rgba(0,255,0,0.7);
            animation: chipBounce 1.8s ease-out;
        }

        @keyframes chipBounce {
            0% { opacity: 0; transform: translateY(80px) scale(0.8); }
            60% { transform: translateY(-30px) scale(1.15); }
            80% { transform: translateY(10px) scale(0.95); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        .transfer-section .input-group-text {
            background: #ffd700;
            color: #000;
            font-weight: bold;
            font-size: 1.6rem;
            animation: coinSpin 3s linear infinite;
        }

        @keyframes coinSpin {
            0% { transform: rotateY(0deg); }
            100% { transform: rotateY(360deg); }
        }

        .transfer-section .btn {
            background: linear-gradient(45deg, #ff0000, #ff4444);
            color: #fff;
            font-weight: 700;
            box-shadow: 0 0 30px rgba(255,0,0,0.8);
            animation: leverPull 2s infinite;
            transition: transform 0.3s;
        }

        .transfer-section .btn:hover {
            transform: scale(1.15) translateY(-5px);
        }

        @keyframes leverPull {
            0%, 100% { box-shadow: 0 0 30px rgba(255,0,0,0.8); }
            50% { box-shadow: 0 0 60px rgba(255,0,0,1), 0 0 80px rgba(255,215,0,0.6); }
        }

        .alert {
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0,0,0,0.6);
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <div class="chip red" style="left:5%; animation-duration: 12s; animation-delay: 0s;"></div>
    <div class="chip black" style="left:15%; animation-duration: 15s; animation-delay: 2s;"></div>
    <div class="chip gold" style="left:25%; animation-duration: 10s; animation-delay: 1s;"></div>
    <div class="chip red" style="left:35%; animation-duration: 14s; animation-delay: 4s;"></div>
    <div class="chip black" style="left:45%; animation-duration: 11s; animation-delay: 3s;"></div>
    <div class="chip gold" style="left:55%; animation-duration: 13s; animation-delay: 5s;"></div>
    <div class="chip red" style="left:65%; animation-duration: 16s; animation-delay: 6s;"></div>
    <div class="chip black" style="left:75%; animation-duration: 9s; animation-delay: 7s;"></div>
    <div class="chip gold" style="left:85%; animation-duration: 12s; animation-delay: 8s;"></div>
    <div class="chip red" style="left:95%; animation-duration: 15s; animation-delay: 9s;"></div>

    <div class="container py-5 pt-5 mt-5 text-center shadow-sm ">
        <div class="row justify-content-center g-4">
            <div class="col-md-8 col-lg-6">
                <div class="card main-card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h1 class="h4 mb-5">♠️♦️ Balance Transfer ♣️♥️</h1>

                        <?php if ($my_info->sts == 1) { ?>
                            <div class="input-group input-group-lg shadow-sm ">
                                <input type="text" class="form-control person_search_input_box" placeholder="Search by phone number or email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                <button class="btn btn-primary search_btn_click " id="inputGroup-sizing-lg">
                                    <i class="fa fa-search"></i>  খুঁজুন
                                </button>
                            </div>
                            <div id="userOutput" class="container my-4"></div>
                        <?php } else { ?>
                            <div class="alert alert-danger" role="alert">
                                <h2 class="text-center mb-3">Account inactive</h2>
                                <p class="text-center  ">Your account is not eligible for Transfer. Please active your account.</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.search_btn_click', function () {
            let input_val = $('.person_search_input_box').val();
            $.ajax({
                type: "post",
                url: "user/getUserByPhone",
                data: {
                    input_data: input_val
                },
                dataType: "json",
                success: function (rss) {
                    $('.person_search_input_box').val('');
                    // চেক করবো রেসপন্সে 'No User Found' আছে কিনা
                    if (rss === "No User Found here... " || !rss || Object.keys(rss).length === 0) {
                        $("#userOutput").html(`
                            <div class="alert alert-warning text-center shadow-sm" role="alert">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                No User Found here... !
                            </div>
                        `);
                        return;
                    }else {
                        const html = `
                            <div class="card shadow-sm border-0" style="max-width:500px;margin:auto;">
                                <div class="card-body text-center">
                                    <img src="${rss.user_pic}" alt="${rss.full_name}" class="rounded-circle mb-3 shadow-sm" width="120" height="120" style="object-fit:cover;">
                                    <h5 class="card-title mb-1">${rss.full_name}</h5>
                                    <p class="text-muted mb-2">${rss.email_no}</p>
                                    <ul class="list-group list-group-flush text-start">
                                        <li class="list-group-item">
                                            <strong>Address:</strong> ${rss.full_address}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Phone:</strong> ${rss.phone_no}
                                        </li>
                                    </ul>
                                    <div></div>
                                </div>
                            </div>
                            <div class="border rounded-3 p-3 bg-light shadow-sm">
                                <label for="transferAmount" class="form-label fw-bold mb-2">
                                    💰 Balance Transfer Amount
                                </label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-success text-white fw-bold">৳</span>
                                    <input type="text" class="form-control" id="transferAmount" placeholder="Type amount..." inputmode="numeric" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="this.value = this.value.replace(/[^0-9]/g, '');"  >
                                    <button class="btn btn-success fw-semibold transfer_balance_amount" id="inputGroup-sizing-lg" user_id_transfer="${rss.user_id}"> 
                                        Transfer
                                    </button>
                                </div>
                            </div>
                        `;

                        $("#userOutput").html(html);
                    }
                }
            });
        });

        $(document).on('click', '.transfer_balance_amount', function () {
            let transfer_amount = parseFloat($('#transferAmount').val());
            let user_id_transfer = $(this).attr('user_id_transfer');
            let my_wallet_amount = parseFloat($('.this_wallet_amount').text());

            if (isNaN(transfer_amount) || transfer_amount === '' || transfer_amount <= 0) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please enter a valid amount to transfer.",
                });
                return;
            }

            if (transfer_amount > my_wallet_amount) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Insufficient balance in your wallet.",
                });
                return;
            }

            // Proceed with the transfer
            $.ajax({
                type: "post",
                url: "user/amountWalletTransfer",
                data: {
                    transfer_amount: transfer_amount,
                    user_id_transfer: user_id_transfer
                },
                dataType: "json",
                success: function (res) {
                    assign_wallet_balance();
                    if (res.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Good job!",
                            text: "Amount ৳" + transfer_amount + " transferred successfully.",
                        });
                        $("#userOutput").html(`<div class="alert alert-success">${res.message}</div>`);
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Transfer failed: " + res.message,
                        });
                    }
                }
            });

        });
    </script>




