


    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #0a001a, #000000, #001122);
            color: #ffffffff;
            min-height: 100vh;
            background-attachment: fixed;
        }

        .container_body {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px 0 0 0;
        }

        header {
            padding: 50px 0 0 0;
            text-align: center;
            background: linear-gradient(to bottom, rgba(10,0,26,0.9), transparent);
            border-bottom: 4px solid #380384ff;
            box-shadow: 0 0 50px rgba(106, 0, 255, 0.4);
        }

        h1 {
            font-size: 4.8em;
            background: linear-gradient(45deg, #6a00ff, #00ffff, #ff00ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 40px rgba(106, 0, 255, 0.8);
            animation: deepGlow 4s infinite alternate;
        }

        @keyframes deepGlow {
            from { text-shadow: 0 0 20px #6a00ff, 0 0 30px #00ffff; }
            to { text-shadow: 0 0 40px #ff00ff, 0 0 60px #6a00ff, 0 0 80px #00ffff; }
        }

        .subtitle {
            font-size: 1.7em;
            margin: 25px 0;
            color: #bb86fc;
            text-shadow: 0 0 20px #bb86fc;
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(360px, 1fr));
            gap: 35px;
            padding: 50px 20px;
        }

        .referral-card {
            background: linear-gradient(145deg, rgba(20, 0, 40, 0.7), rgba(0, 10, 30, 0.9));
            backdrop-filter: blur(20px);
            border-radius: 25px;
            padding: 35px;
            border: 2px solid #6a00ff;
            box-shadow: 
                0 0 30px rgba(106, 0, 255, 0.3),
                inset 0 0 20px rgba(0, 255, 255, 0.1);
            transition: all 0.5s ease;
            position: relative;
            overflow: hidden;
        }

        .referral-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg, transparent, #6a00ff, #00ffff, #ff00ff, transparent);
            opacity: 0.15;
            animation: slowRotate 20s linear infinite;
        }

        @keyframes slowRotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .referral-card:hover {
            transform: translateY(-20px) scale(1.04);
            box-shadow: 
                0 0 60px rgba(106, 0, 255, 0.6),
                0 0 100px rgba(0, 255, 255, 0.3);
            border-color: #00ffff;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .ref-id {
            font-size: 2em;
            font-weight: bold;
            color: #00ffff;
            text-shadow: 0 0 20px #00ffff;
        }

        .status-badge {
            background: linear-gradient(45deg, #8b00ff, #4b0082);
            padding: 12px 28px;
            border-radius: 50px;
            font-weight: bold;
            box-shadow: 0 0 25px rgba(139, 0, 255, 0.6);
            color: #fff;
        }

        .user-name {
            font-size: 2.4em;
            margin: 20px 0;
            color: #bb86fc;
            text-shadow: 0 0 20px #bb86fc;
        }

        .details {
            font-size: 1.3em;
            line-height: 2;
            margin: 25px 0;
        }

        .details span {
            color: #03dac6;
            font-weight: bold;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
        }

        .btn-approve {
            background: linear-gradient(45deg, #00ff88, #00cc66);
            color: #000;
            font-weight: bold;
            border: none;
            padding: 18px 45px;
            border-radius: 50px;
            font-size: 1.4em;
            cursor: pointer;
            box-shadow: 0 0 30px rgba(0, 255, 136, 0.7);
            transition: all 0.3s;
        }

        .btn-reject {
            background: linear-gradient(45deg, #ff3366, #cc0033);
            color: white;
            font-weight: bold;
            border: none;
            padding: 18px 45px;
            border-radius: 50px;
            font-size: 1.4em;
            cursor: pointer;
            box-shadow: 0 0 30px rgba(255, 51, 102, 0.7);
            transition: all 0.3s;
        }

        .btn-approve:hover {
            transform: scale(1.15);
            box-shadow: 0 0 50px rgba(0, 255, 136, 1);
        }

        .btn-reject:hover {
            transform: scale(1.15);
            box-shadow: 0 0 50px rgba(255, 51, 102, 1);
        }

        .chips {
            font-size: 6em;
            text-align: center;
            margin: 40px 0;
            animation: mysteryFloat 5s infinite ease-in-out;
        }

        @keyframes mysteryFloat {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(8deg); }
        }

    </style>





    <div class="container_body " style="margin-top: 50px;">
        <header class="mt-5 ">
            <h1>
                Royal Chain Network
            </h1>
            <p class="subtitle">
                আপনার আনঅ্যাপ্রুভড রেফারেলসমূহের তালিকা
            </p>
            <div class="chips">
                <i class="fas fa-network-wired"></i>
                <i class="fab fa-battle-net"></i>
                <i class="fas fa-project-diagram"></i>
                <i class="fas fa-user-friends"></i>
            </div>
        </header>

        <div class="cards-container  ">

            <?php if (!empty($referrals)) : ?>
                <?php foreach ($referrals as $referral) : ?>

                    <div class="referral-card ">
                        <div class="card-header">
                            <div class="ref-id">#<?= $referral->user_reffer_code_times; ?></div>
                            <div class="status-badge">Pending</div>
                        </div>
                        <div class="user-name"><?= $referral->user_full_name; ?></div>
                        <div class="details">
                            <p style="font-size: 18px;" ><span>ইমেইল:</span> <?= $referral->user_email_no; ?></p>
                            <p style="font-size: 18px;" ><span>মোবাইল:</span> <?= $referral->user_phone_no; ?></p>
                            <p style="font-size: 18px;" ><span>রেজিস্ট্রেশন:</span> <?= date('d F, Y h:m:s a', $referral->join_timming); ?></p>
                            <p style="font-size: 18px;" ><span>ঠিকানা:</span> <?= $referral->user_full_address; ?></p>
                        </div>
                        <!--
                        <div class="actions">
                            <button class="btn-approve" data-id="1">Approve</button>
                            <button class="btn-reject" data-id="1">Reject</button>
                        </div>
                        -->
                    </div>

                <?php endforeach; ?>
            <?php else : ?>
                <p style="color: #ffffff; text-align: center; font-size: 1.5em; grid-column: span 2;">কোনো আনঅ্যাপ্রুভড রেফারেল নেই।</p>
            <?php endif; ?>

        </div>

    </div>
    <br><br><br>







