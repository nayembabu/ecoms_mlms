

<?php
    // CodeIgniter instance পাওয়া
    $db = \Config\Database::connect();
?>



  <style>
    @import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;600;700&display=swap');
    
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Hind Siliguri', sans-serif;
      background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);
      min-height: 100vh;
      padding: 20px;
      background-attachment: fixed;
    }
    .container {
      max-width: 1100px;
      margin: 0 auto;
      padding-top: 20px;
    }
    h1 {
      text-align: center;
      color: #fff;
      font-size: 3rem;
      margin-bottom: 40px;
      text-shadow: 0 0 30px rgba(255,255,255,0.8);
      animation: titleGlow 3s infinite alternate;
    }
    @keyframes titleGlow {
      from { text-shadow: 0 0 20px #fff, 0 0 30px #ff00de; }
      to { text-shadow: 0 0 40px #fff, 0 0 60px #ff00de, 0 0 80px #ff00de; }
    }

    .tickets-list {
      display: flex;
      flex-direction: column;
      gap: 28px;
      align-items: center;
    }

    /* সুপার কালারফুল ওয়াইড টিকেট */
    .ticket {
      width: 100%;
      max-width: 580px;
      height: 240px;
      border-radius: 28px;
      overflow: hidden;
      position: relative;
      box-shadow: 0 20px 50px rgba(0,0,0,0.3);
      animation: float 6s ease-in-out infinite;
      transform: translateY(0);
    }
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-15px); }
    }

    /* রংধনু গ্র্যাডিয়েন্ট টপ */
    .gradient-top {
      height: 100px;
      background: linear-gradient(90deg, 
        #ff0000, #ff7f00, #ffff00, #00ff00, #00ffff, #0000ff, #8a2be2, #ff1493);
      background-size: 300% 300%;
      animation: rainbow 8s linear infinite;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 30px;
      color: white;
      position: relative;
    }
    @keyframes rainbow {
      0% { background-position: 0% 50%; }
      100% { background-position: 100% 50%; }
    }

    .event-name {
      font-size: 1.7rem;
      font-weight: 700;
      text-shadow: 0 3px 10px rgba(0,0,0,0.5);
    }
    .event-date {
      background: rgba(0,0,0,0.4);
      padding: 10px 18px;
      border-radius: 30px;
      font-weight: 600;
      backdrop-filter: blur(5px);
    }

    /* উইনিং ব্যাজ */
    .winner-badge {
      position: absolute;
      top: -15px;
      right: 20px;
      background: linear-gradient(45deg, #ffd700, #ff6b6b);
      color: white;
      padding: 12px 25px;
      border-radius: 50px;
      font-weight: bold;
      font-size: 1.1rem;
      box-shadow: 0 8px 20px rgba(255,107,107,0.6);
      animation: pulseWin 2s infinite;
      border: 4px solid white;
    }
    @keyframes pulseWin {
      0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(255,215,0,0.7); }
      70% { transform: scale(1.1); box-shadow: 0 0 0 20px rgba(255,215,0,0); }
      100% { transform: scale(1); }
    }

    /* মেইন কন্টেন্ট */
    .ticket-body {
      background: white;
      padding: 25px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 140px;
    }
    .info-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
      font-size: 1rem;
    }
    .info-item .label {
      color: #888;
      font-size: 0.9rem;
      margin-bottom: 5px;
    }
    .info-item .value {
      font-weight: 700;
      color: #222;
      font-size: 1.1rem;
    }

    .qr-box {
      background: linear-gradient(45deg, #a18cd1, #fbc2eb);
      padding: 12px;
      border-radius: 20px;
      animation: qrGlow 4s infinite alternate;
    }
    .qr-box img {
      width: 110px;
      height: 110px;
      border-radius: 16px;
      border: 6px solid white;
    }
    @keyframes qrGlow {
      from { box-shadow: 0 0 20px rgba(161,140,209,0.8); }
      to { box-shadow: 0 0 40px rgba(251,194,235,0.9); }
    }

    .ticket-id {
      position: absolute;
      bottom: 35%;
      left: 50%;
      transform: translateX(-50%);
      background: #222;
      color: #fff;
      padding: 8px 20px;
      border-radius: 30px;
      font-weight: bold;
      letter-spacing: 2px;
      font-size: 0.95rem;
    }

    .no-tickets {
      text-align: center;
      color: white;
      font-size: 2rem;
      margin-top: 120px;
      text-shadow: 0 0 20px #ff00de;
    }
  </style>
  
  

<div class="container">
  <h1>আমার টিকেটসমূহ</h1>

  <div class="tickets-list row ">

  <?php foreach($my_lotary_info as $ticket) { ?>

    <div class="ticket col-md-6">
      <div class="gradient-top">
        <div class="event-name"><?= $ticket->lottery_names_here; ?></div>
        <div class="event-date"><?= date('d M, Y', strtotime($ticket->expire_dates)); ?></div>
      </div>

      <?php
        $batch = $db->table('user_lottery_winning_price')
                    ->where('lottery_idd', $ticket->lotary_shedual_idd)
                    ->where('lottery_price_amounts !=', 0)
                    ->get()
                    ->getRow();
      if($batch){ ?>
        <div class="winner-badge">বিজয়ী!</div>
      <?php } ?>
      <div class="ticket-body">
        <div class="info-grid">
          <div class="info-item">
            <div class="label">লটারি নং</div>
            <div class="value"><?= $ticket->lottery_unq_no; ?></div>
          </div>
          <div class="info-item">
            <div class="label"></div>
            <div class="value"></div>
          </div>
          <div class="info-item">
            <div class="label">মূল্য</div>
            <div class="value">৳ <?= $ticket->bet_amountss_s; ?></div>
          </div>
          <div class="info-item">
            <div class="label">স্ট্যাটাস</div>
            <?php if($batch){ ?>
                <div class="value" style="color:#e91e63;">বিজয়ী</div>
            <?php } else { ?>
                <div class="value" style="color:#4caf50;">টিকেট ব্যবহৃত</div>
            <?php } ?>
          </div>
        </div>
        <div class="qr-box">
          <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?= $ticket->users_ticket_noss; ?>" alt="QR"/>
        </div>
      </div>
      <div class="ticket-id"><?= $ticket->users_ticket_noss; ?></div>
    </div>

    <?php } ?>

  </div>
</div>
