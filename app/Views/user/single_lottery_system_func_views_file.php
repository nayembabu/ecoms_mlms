












  <!-- Confetti -->
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

  <style>
    body {
      background: linear-gradient(-45deg, #1b2449ff, #1d0a2fff, #310c35ff, #f5576c);
      background-size: 400% 400%;
      animation: gradient 15s ease infinite;
      min-height: 100vh;
      font-family: 'Kalpurush', 'Hind Siliguri', sans-serif;
    }
    @keyframes gradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .ticket-card {
      transition: all 0.4s ease;
      cursor: pointer;
    }
    .ticket-card:hover {
      transform: translateY(-15px) scale(1.05);
      box-shadow: 0 20px 40px rgba(0,0,0,0.4) !important;
    }

    .winner-card {
      animation: pulse 2s infinite, bounceIn 1.5s;
    }
    @keyframes bounceIn {
      0% { opacity: 0; transform: scale(0.3); }
      50% { opacity: 1; transform: scale(1.15); }
      70% { transform: scale(0.95); }
      100% { transform: scale(1); }
    }

    .rolling {
      font-size: 4rem;
      font-weight: 900;
      min-height: 120px;
      color: #fff;
      text-shadow: 0 0 20px rgba(255,255,255,0.8);
    }

    .draw-btn {
      font-size: 1.8rem;
      padding: 1rem 3rem;
      box-shadow: 0 10px 30px rgba(0,0,0,0.4);
    }
  </style>

  <div class="container py-5 mt-5">
    <div class="text-center text-white mb-5 mt-5 ">
      <h1 class="display-3 fw-bold mb-3">
        <i class="bi bi-trophy-fill text-warning"></i> <?= $lottery_info->lottery_names_here; ?>
      </h1>
      <p class="fs-3 opacity-90"> <?= $lottery_info->lottery_description_here; ?></p>
      <p class="fs-1 fw-bold text-warning mt-5 ">মোট প্রাইজ <?= $total_price; ?></p>
    </div>

    <div class="row g-5">

      <div class="col-lg-6">
        <div class="card bg-dark text-white shadow-lg border-0">
          <div class="card-body p-5 text-center">
            <h2 class="mb-5 text-warning">
              <u><i class="bi bi-stars"></i> বিজয়ীদের তালিকা </u>
            </h2>

            <div id="winnersList" class="mb-5">
              <?php if ($lottery_winning_info[0]->possition_ss_price) { ?>
                <?php foreach ($lottery_winning_info as $win_sngl) { ?>
                  <div class="alert alert-warning border-0 shadow-lg p-4 mb-4 winner-card">
                    <h3> <strong><?= $win_sngl->user_full_name; ?> : <?= $win_sngl->possition_ss_price; ?></strong></h3>
                    <h4>পুরস্কার: ৳<?= $win_sngl->lottery_price_amounts; ?> টাকা </h4>
                  </div>
                <?php } ?>
              <?php }else { ?>
                  <div class="alert alert-danger border-0 shadow-lg p-4 mb-4 winner-card">
                    <h3> <strong class="fs-3">ড্র হওয়ার জন্য অপেক্ষা করুন। </strong></h3>
                  </div>
              <?php } ?>

            </div>

          </div>
        </div>
      </div>


      <div class="col-lg-6">
        <div class="card h-100 shadow-lg border-0">
          <div class="card-body p-5">
            <h3 class="text-success text-center mb-4">
              <u>
                <i class="bi bi-people-fill"></i> মোট অংশগ্রহণকারী:
                <span id="totalParticipants" class="display-6 text-primary"><?= $total_buy_ticket; ?></span> জন
              </u>
            </h3>
            <div id="participantsList" class="mt-4" style="max-height: 500px; overflow-y: auto;">

              <?php foreach ($user_lottery_attend as $lot_attend) { ?>
                <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded-3 mb-2 bg-warning bg-opacity-25}">
                  <span class="fs-3 fw-bold"><?= $lot_attend->user_full_name; ?> <span class="fs-6 text-sm rounded-pill badge-xs badge bg-success ">৳<?= $lot_attend->bet_amountss_s; ?></span> </span>
                  <span class="fs-5 badge bg-primary "><?= $lot_attend->users_ticket_noss; ?></span>
                </div>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>




