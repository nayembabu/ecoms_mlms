
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300;500;700;900&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Confetti -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <style>
        :root {
            --gold: #ffd700;
            --dark-gold: #b8860b;
            --black: #0f0f1e;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at center, #1a1a2e, #0f0f1e);
            color: white;
            overflow-x: hidden;
            min-height: 100vh;
        }

        .jackpot-amount {
            font-family: 'Exo 2', sans-serif;
            font-size: 5rem;
            font-weight: 900;
            background: linear-gradient(45deg, #ffd700, #ffed4e, #b8860b, #ffd700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 30px rgba(255,215,0,0.8);
            animation: glow 2s infinite alternate;
        }

        @keyframes glow {
            from { filter: brightness(1); }
            to { filter: brightness(1.4); }
        }

        .hero {
            background: url('https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3&auto=format&fit=crop&q=80') center/cover;
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.9), rgba(15,15,30,0.7));
        }

        .lottery-ball {
            width: 90px;
            height: 90px;
            background: radial-gradient(circle at 30% 30%, #fff, var(--gold));
            border: 5px solid #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: bold;
            color: #000;
            box-shadow: 0 0 30px rgba(255,215,0,0.8), inset 0 0 20px rgba(255,255,255,0.6);
            animation: spin 8s linear infinite, float 4s ease-in-out infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .btn-jackpot {
            background: linear-gradient(45deg, #ff6b00, #ffb800, #ffd700);
            border: none;
            padding: 20px 60px;
            font-size: 2rem;
            font-weight: bold;
            border-radius: 50px;
            color: black;
            box-shadow: 0 15px 35px rgba(255,215,0,0.5);
            transition: all 0.4s;
        }

        .btn-jackpot:hover {
            transform: translateY(-10px) scale(1.1);
            box-shadow: 0 25px 50px rgba(255,215,0,0.7);
        }

        /* কয়েন রেইন */
        .coin {
            position: absolute;
            font-size: 2rem;
            color: var(--gold);
            pointer-events: none;
            animation: fall linear forwards;
        }

        @keyframes fall {
            to {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }

        .glitter {
            position: absolute;
            width: 8px;
            height: 8px;
            background: white;
            border-radius: 50%;
            pointer-events: none;
            animation: sparkle 3s linear infinite;
        }

        @keyframes sparkle {
            0% { transform: translateY(-100px) scale(0); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translateY(100vh) scale(1); opacity: 0; }
        }

        :root{
        --card-bg: #ffffff;
        --accent: #0b7285;
        --accent-2: #066571;
        --muted: #6b7280;
        --surface: #f6f8fa;
        --radius:10px;
        --shadow: 0 6px 18px rgba(16,24,40,0.08);
        --paper-w: 560px;
        }
        .ticket{
        font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        margin:24px;
        background:linear-gradient(180deg,#fbfdff,#f3f7fa);
        display:flex;
        align-items:center;
        justify-content:center;
        color:#0f1724;
        }

        /* Compact ticket wrapper */
        .ticket{
        width:var(--paper-w);
        max-width:95%;
        background:var(--card-bg);
        border-radius:var(--radius);
        box-shadow:var(--shadow);
        display:flex;
        gap:0;
        overflow:hidden;
        border:1px solid rgba(10,15,20,0.04);
        }

        /* Left main area */
        .left{
        flex:1;
        padding:14px 16px;
        display:flex;
        gap:12px;
        align-items:center;
        }

        .brand{
        display:flex;
        flex-direction:column;
        gap:6px;
        width:140px;
        }
        .brand .logo{
        display:flex;
        align-items:center;
        gap:10px;
        }
        .logo .mark{
        width:52px;height:52px;border-radius:8px;
        background:linear-gradient(135deg,var(--accent),var(--accent-2));
        color:white;font-weight:700;display:flex;align-items:center;justify-content:center;
        font-size:18px;box-shadow:0 6px 18px rgba(6,101,113,0.12);
        }
        .logo .name{font-weight:700;font-size:14px}
        .logo .sub{font-size:11px;color:var(--muted);font-weight:600}

        .info{
        display:flex;
        flex-direction:column;
        gap:6px;
        font-size:13px;
        color:var(--muted);
        }

        .details{
        flex:1;
        display:flex;
        flex-direction:column;
        gap:6px;
        align-items:flex-start;
        }

        .meta-row{display:flex;gap:8px;align-items:center;flex-wrap:wrap}
        .chip{
        background:var(--surface);
        padding:6px 8px;border-radius:8px;font-weight:600;color:var(--accent-2);font-size:13px;
        border:1px solid rgba(6,101,113,0.06)
        }

        /* Numbers */
        .numbers{
        display:flex;
        gap:8px;
        align-items:center;
        margin-top:6px;
        }
        .ball{
        width:46px;height:46px;border-radius:10px;
        background:linear-gradient(180deg,#fff,#fbfdff);
        display:flex;align-items:center;justify-content:center;
        font-weight:700;color:#071122;font-size:16px;
        box-shadow:0 8px 18px rgba(6,101,113,0.06);
        border:1px solid rgba(6,101,113,0.06);
        }
        .ball.masked{background:linear-gradient(90deg,#eef6f8,#f8fbfc);color:transparent;letter-spacing:4px}

        /* Right stub */
        .stub{
            width:180px;
            background:linear-gradient(180deg,#f7fafb,#eef6f7);
            padding:12px;
            border-left:1px dashed rgba(10,15,20,0.05);
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:space-between;
            gap:8px;
        }
        .price{
        font-weight:800;color:var(--accent-2);font-size:18px;
        }
        .serial{font-size:11px;color:var(--muted);letter-spacing:0.6px}

        .qr{
        width:84px;height:84px;border-radius:6px;background:white;display:grid;place-items:center;
        box-shadow:0 6px 12px rgba(6,101,113,0.06);border:1px solid rgba(6,101,113,0.04);
        }

        .controls{
            width:100%;
            padding:10px 14px;
            display:flex;
            gap:8px;
            justify-content:flex-end;
            align-items:center;
            background:transparent;
        }
        .btn{
        border:0;padding:8px 12px;border-radius:8px;cursor:pointer;font-weight:700;font-size:13px;color:white;
        background:linear-gradient(90deg,var(--accent),var(--accent-2));box-shadow:0 8px 20px rgba(6,101,113,0.12);
        }
        .btn.ghost{background:transparent;color:var(--accent-2);border:1px solid rgba(6,101,113,0.08);box-shadow:none}

        /* small text row below ticket */
        .foot{
            margin-top:10px;font-size:12px;color:var(--muted);text-align:center;
        }

        /* Print: remove controls, keep crisp */
        @media print{
            body{background:white}
            .controls{display:none}
            .ticket{box-shadow:none;border:0}
            .stub{border-left:1px dashed rgba(0,0,0,0.08)}
        }

        /* Mobile small */
        @media (max-width:520px){
            :root{--paper-w:100%}
            .brand{display:none}
            .stub{width:120px;padding:10px}
            .ball{width:40px;height:40px;font-size:14px}
        }
        
    .buy_tickt_stack {
        position: relative;
        animation: float 10s infinite ease-in-out;
    }

    .buy_tickt_ticket {
        width: 180px;
        height: 100px;
        background: linear-gradient(135deg, #1e1e3f, #2d1b69);
        border-radius: 12px;
        border: 2px solid #FFD700;
        box-shadow: 
            0 8px 20px rgba(0,0,0,0.6),
            0 0 20px rgba(255,215,0,0.4);
        color: white;
        text-align: center;
        padding-top: 10px;
        position: absolute;
        transition: all 0.4s;
    }

    .buy_tickt_ticket:nth-child(1)  { top: 0; left: 0; transform: rotate(-9deg);  z-index: 30; }
    .buy_tickt_ticket:nth-child(2)  { top: 0; left: 0; transform: rotate(-3deg);  z-index: 29; }
    .buy_tickt_ticket:nth-child(3)  { top: 0; left: 0; transform: rotate(6deg);   z-index: 28; }
    .buy_tickt_ticket:nth-child(4)  { top: 0; left: 0; transform: rotate(-7deg);  z-index: 27; }
    .buy_tickt_ticket:nth-child(5)  { top: 0; left: 0; transform: rotate(4deg);   z-index: 26; }
    .buy_tickt_ticket:nth-child(n+6) {
        top: 0; left: 0;
        transform: rotate(-10deg);
        z-index: 10;
    }

    .buy_tickt_title {
        font-size: 14px;
        color: #FFD700;
        text-shadow: 0 0 8px gold;
        margin-bottom: 4px;
    }

    .buy_tickt_numbers {
        display: flex;
        justify-content: center;
        gap: 6px;
        flex-wrap: wrap;
    }

    .buy_tickt_num {
        width: 28px;
        height: 28px;
        background: #FFD700;
        color: #000;
        border-radius: 50%;
        font-weight: bold;
        font-size: 13px;
        line-height: 28px;
        box-shadow: 0 0 10px gold;
    }

    .buy_tickt_id {
        font-size: 9px;
        color: #ccc;
        margin-top: 4px;
        letter-spacing: 1px;
    }

    /* হালকা ফ্লোটিং + দুলুনি */
    @keyframes float {
        0%,100% { transform: translateY(0) rotate(0deg); }
        50%     { transform: translateY(-20px) rotate(2deg); }
    }

    /* শাইন ইফেক্ট */
    .buy_tickt_ticket::before {
        content: '';
        position: absolute;
        top: -100%;
        left: -100%;
        width: 50%;
        height: 300%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transform: rotate(30deg);
        animation: shine 6s infinite;
    }

    @keyframes shine {
        0%   { transform: translateX(-200%) rotate(30deg); }
        100% { transform: translateX(200%) rotate(30deg); }
    }

  </style>

<?php if ($lottery_info) { ?>
<div class="hero position-relative p-2 mt-5 ">
    <div class="container position-relative text-center py-5">
        <div class="animate__animated animate__fadeInDown">
            <h1 class="display-1 fw-bold text-warning mb-3">
                <i class="fas fa-crown me-3"></i> <?= $lottery_info->lottery_names_here; ?>
            </h1>
            <p class="lead fs-2 text-gold"> টিকিট কিনে হয়ে যান লাখপতি! </p>
        </div>

        <?php if ($total_buy_ticket) { ?>
            <div class="buy_tickt_stack">
                <?php foreach ($buy_ticket_info as $tickt) { ?>
                    <div class="buy_tickt_ticket" >
                        <div class="buy_tickt_title">আপনি টিকেট কিনেছেন। </div>
                        <div class="buy_tickt_numbers">
                            <div class="buy_tickt_num mx-auto fs-4 "><?= $total_buy_ticket ?></div>
                        </div>
                        <div class="buy_tickt_id">#LT-884521</div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

        <!-- জ্যাকপট অ্যানিমেটেড কাউন্টার  -->
        <div class="animate__animated animate__zoomIn">
            <h2 class="text-white mb-3">মোট জ্যাকপট</h2>

            <div class="jackpot-amount" id="jackpot">৳ <?= $total_price; ?></div>
            <!-- <p class="fs-3 text-warning mt-3"><?= $total_buy_ticket ?></p> -->
        </div>

        <!-- লটারি বলের সারি -->
        <div class="d-flex justify-content-center gap-4 my-5 flex-wrap">
            <?php $digits = str_split($lottery_info->lottery_unq_no, 2); foreach ($digits as $sngle) { 
                $random_delay = number_format(mt_rand(5, 25) / 10, 1); ?>
                <div class="lottery-ball" style="animation-delay: <?= $random_delay;?>s"><?= $sngle; ?></div>
            <?php } ?>
        </div>

        <!-- কাউন্টডাউন -->
        <div class="my-5 text-warning fs-1 fw-bold">
            ড্র শুরু হবে: <span id="countdown" class="text-gold">00দি : 00ঘ : 00মি : 00সে</span>
        </div>


    <div class="ticket_view_html_file ticket mx-auto" role="region" style="width: 300px !important; " aria-label="লার্টারি টিকেট">
      <div class="left">
        <div class="brand" aria-hidden="true">
          <div class="logo">
            <div class="mark">LT</div>
            <div>
              <div class="name">লাইভ লটারী</div>
              <!-- <div class="sub">সপ্তাহিক ড্র</div> -->
            </div>
          </div>
          <div class="info">
            <div class="chip fs-6 ">**************</div>
            <div style="font-size:11px;color:var(--muted)">পেমেন্ট নিশ্চিতকরণ প্রয়োজন</div>
          </div>
        </div>

        <div class="details" style="min-width:0;">
          <div class="meta-row">
            <div style="font-size:13px;font-weight:700">টিকিট</div>
            <div style="flex:1"></div>
            <div class="chip fs-4" id="priceLabel">৳<?= $lottery_info->ticket_prices; ?></div>
          </div>

          <div class="meta-row" style="margin-top:6px">
            <div style="font-size:12px;color:var(--muted)">ড্র:</div>
            <div style="font-weight:700;margin-left:6px" id="drawDate"><?= $lottery_info->expire_dates; ?></div>
            <div style="width:10px"></div>
            <div style="font-size:12px;color:var(--muted)">ধরণ:</div>
            <div style="font-weight:700;margin-left:6px" id="typeLabel">স্ট্যান্ডার্ড</div>
          </div>

        </div>
      </div>

    </div>



                <button onclick="buyTicket(<?= $lottery_info->lotary_shedual_idd; ?>)"  class=" fs-4 mx-auto btn btn-lg btn-jackpot animate__animated animate__pulse animate__infinite ticket_view_html_btn">
                    <i class="fas fa-ticket-alt me-3 fa-beat"></i>
                    এখনই টিকিট কিনুন – মাত্র ৳<?= $lottery_info->ticket_prices; ?>
                </button>

        <p class="mt-5 fs-4 text-white-50">প্রতি মিনিটে অনেক টিকিট বিক্রি হচ্ছে!</p>

        <div class=" container">
            <table class="table ">
                <tr>
                    <th class="text-white ">SL</th>
                    <th class="text-white ">Serial</th>
                    <th class="text-white ">Price Amount</th>
                </tr>
                <?php $sl=1; foreach($lottery_price_info as $lottery_price_sngl) { ?>
                    <tr>
                        <td class="text-white "><?= $sl; ?></td>
                        <td class="text-white "><?= $lottery_price_sngl->prices_serials; ?></td>
                        <td class="text-white ">৳ <?= $lottery_price_sngl->prices_amountss; ?></td>
                    </tr>
                <?php $sl++;} ?>
            </table>
        </div>

    </div>
</div>







<?php } ?>







<script>
// জ্যাকপট কাউন্টার অ্যানিমেশন
const jackpotElement = document.getElementById('jackpot');
let amount = <?php echo $total_price; ?>;
const target = <?php echo $total_price; ?>;
const increment = 1;

const jackpotInterval = setInterval(() => {
    amount += increment;
    if (amount >= target) {
        amount = target;
        clearInterval(jackpotInterval);
    }
    jackpotElement.textContent = '৳' + amount.toLocaleString('bn-BD');
}, 50);

// কাউন্টডাউন (১৫ দিন বাকি)
const drawDate = new Date("<?php echo $lottery_info->expire_dates.' '.$lottery_info->ezpire_timess; ?>").getTime();
const countdown = setInterval(() => {
    const now = new Date().getTime();
    const distance = drawDate - now;

    const days = Math.floor(distance / (1000*60*60*24));
    const hours = Math.floor((distance % (1000*60*60*24)) / (1000*60*60));
    const minutes = Math.floor((distance % (1000*60*60)) / (1000*60));
    const seconds = Math.floor((distance % (1000*60)) / 1000);

    document.getElementById("countdown").innerHTML = 
        `${days}দি : ${hours.toString().padStart(2,'0')}ঘ : ${minutes.toString().padStart(2,'0')}মি : ${seconds.toString().padStart(2,'0')}সে`;

    if (distance < 0) {
        clearInterval(countdown);
        document.getElementById("countdown").innerHTML = "লাইভ ড্র চলছে!";
    }
}, 1000);

// কয়েন রেইন + গ্লিটার
setInterval(() => {
    const coin = document.createElement('div');
    coin.innerHTML = '৳';
    coin.classList.add('coin');
    coin.style.left = Math.random() * 100 + 'vw';
    coin.style.animationDuration = Math.random() * 3 + 4 + 's';
    document.body.appendChild(coin);
    setTimeout(() => coin.remove(), 7000);
}, 300);


function buyTicket(lottery_id) {
    if (confirm("আপনি কি টিকেট কিনতে চান? ")) {
        $.ajax({
            type: "post",
            url: "user/buy_a_ticket_s",
            data: {
                lottery_id: lottery_id
            },
            dataType: "json",
            success: function (rs) {
                if (rs.status == 1) {
                    assign_wallet_balance();
                    confetti({
                        particleCount: 300,
                        spread: 100,
                        origin: { y: 0.6 },
                        colors: ['#ffd700', '#ff6b00', '#ffffff', '#ff0000']
                    });

                    // আরেকটা বিগ ব্লাস্ট
                    setTimeout(() => {
                        confetti({
                            particleCount: 500,
                            angle: 90,
                            spread: 360,
                            origin: { x: 0.5, y: 0.8 }
                        });
                    }, 500);

                    // alert("অভিনন্দন! 🎉 তোমার টিকিট কেনা হয়েছে। শুভ কামনা!");
                    $('.ticket_view_html_btn').remove();
                    $('.ticket_view_html_file').html('');
                }
            }
        });
    }
}
</script>
