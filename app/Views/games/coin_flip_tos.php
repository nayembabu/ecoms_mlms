<!doctype html>
<html lang="bn">
  <head>
    <base href="<?php echo base_url(); ?>" target="">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="inc/front/assets/imgs/bg_icons.png" type="image/x-icon">
    <title>Royal Chain - Online Banking & Finance</title>

    <meta name="description" content="jQuery দিয়ে Coin Flip Game: ১০ টাকা বেট, ব্যালেন্স ট্র্যাকিং ও সুন্দর কয়েন স্পিন অ্যানিমেশন।" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Orbitron:wght@500;700&display=swap" rel="stylesheet" />

    <style>
      body,h1{margin:0}.kicker,.subtitle{color:hsl(var(--muted))}.card,.coin-container,.logo{box-shadow:var(--shadow)}.btn,.choice{cursor:pointer}.bet-info,.choice-label,.fineprint,.kicker.center,.result{text-align:center}:root{--bg:222 47% 7%;--card:222 42% 10%;--text:210 40% 96%;--muted:215 16% 65%;--border:220 16% 20%;--primary:44 93% 56%;--primary-2:36 94% 58%;--accent:196 91% 62%;--win:142 76% 44%;--lose:0 84% 60%;--shadow:0 18px 50px -20px hsl(0 0% 0% / 0.65);--shadow-glow-win:0 0 38px hsl(var(--win) / 0.35);--shadow-glow-lose:0 0 38px hsl(var(--lose) / 0.35);--radius:16px}*{box-sizing:border-box}body,html{height:100%}body{color:hsl(var(--text));background:radial-gradient(1000px 600px at 20% 20%,hsl(var(--primary) / .1),transparent 55%),radial-gradient(900px 600px at 85% 70%,hsl(var(--accent) / .1),transparent 60%),hsl(var(--bg));font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif}.balance-amount,.coin-face,h1{font-family:Orbitron,Inter,system-ui,sans-serif}h1{letter-spacing:.06em}.container{width:min(520px,calc(100% - 32px));margin:0 auto}.site-header{padding:28px 0 10px}.title-row{display:flex;align-items:center;gap:12px}.logo{width:44px;height:44px;border-radius:14px;display:grid;place-items:center;background:linear-gradient(135deg,hsl(var(--primary) / .25),hsl(var(--accent) / .18));border:1px solid hsl(var(--border))}.subtitle{margin:8px 0 0}.card{background:linear-gradient(180deg,hsl(var(--card) / .86),hsl(var(--card) / .72));border:1px solid hsl(var(--border));border-radius:var(--radius);padding:16px;backdrop-filter:blur(10px)}.balance{display:flex;align-items:center;justify-content:space-between;margin:18px 0}.kicker{font-size:12px;letter-spacing:.12em;text-transform:uppercase}.balance-amount{margin-top:6px;font-size:30px;font-weight:800;color:hsl(var(--primary))}.btn{appearance:none;border:1px solid hsl(var(--border));border-radius:14px;padding:12px 14px;font-weight:700;color:hsl(var(--text));background:hsl(var(--card));transition:transform 120ms,filter 120ms,opacity 120ms}.choice-coin,.coin-face{display:grid;place-items:center;font-weight:800}.btn-primary,.coin-heads,.coin-tails{color:hsl(222 47% 8%)}.btn:active{transform:translateY(1px)}.btn[disabled],.choice[disabled]{opacity:.55;cursor:not-allowed}.btn-primary{margin-top:14px;width:100%;border-color:hsl(var(--primary) / .35);background:linear-gradient(135deg,hsl(var(--primary)),hsl(var(--primary-2)))}.btn-primary:hover:not([disabled]){filter:brightness(1.02)}.btn-secondary{background:linear-gradient(180deg,hsl(var(--card) / .95),hsl(var(--card) / .7))}.coin-stage{display:grid;place-items:center;margin:6px 0 18px}.coin-container{width:170px;height:170px;border-radius:999px;display:grid;place-items:center;background:radial-gradient(circle at 30% 30%,hsl(var(--primary) / .18),transparent 58%);border:1px solid hsl(var(--border))}.coin-container.glow-win{box-shadow:var(--shadow),var(--shadow-glow-win);animation:1.1s ease-in-out infinite pulseWin}.coin-container.glow-lose{box-shadow:var(--shadow),var(--shadow-glow-lose);animation:1.1s ease-in-out infinite pulseLose}.coin{position:relative;width:120px;height:120px;transform-style:preserve-3d;transform:rotateY(0)}.coin-face{position:absolute;inset:0;border-radius:999px;font-size:36px;border:2px solid hsl(var(--border));backface-visibility:hidden}.choice-coin,.result-text{font-family:Orbitron,Inter,system-ui,sans-serif;font-size:22px}.coin-heads{background:radial-gradient(circle at 30% 30%,hsl(var(--primary)),hsl(44 92% 40%));transform:translateZ(2px)}.coin-tails{background:radial-gradient(circle at 30% 30%,hsl(var(--accent)),hsl(196 74% 38%));transform:rotateY(180deg) translateZ(2px)}.coin.spinning{animation:3s cubic-bezier(.2,.9,.2,1) spin}@keyframes spin{0%{transform:rotateY(0)}100%{transform:rotateY(1800deg)}}@keyframes pulseWin{0%,100%{filter:brightness(1)}50%{filter:brightness(1.12)}}@keyframes pulseLose{0%,100%{filter:brightness(1)}50%{filter:brightness(1.08)}}.choice-area{margin-top:6px}.choices{margin-top:10px;display:grid;grid-template-columns:1fr 1fr;gap:12px}.choice{border-radius:18px;padding:14px;border:1px solid hsl(var(--border));background:hsl(var(--card) / .8);color:hsl(var(--text));transition:transform 120ms,border-color 120ms,background 120ms}.choice:hover{transform:translateY(-1px);background:hsl(var(--card) / .92)}.choice.selected-heads{border-color:hsl(var(--primary) / .65);box-shadow:0 0 0 3px hsl(var(--primary) / .18)}.choice.selected-tails{border-color:hsl(var(--accent) / .65);box-shadow:0 0 0 3px hsl(var(--accent) / .18)}.choice-coin{width:62px;height:62px;border-radius:999px;margin:0 auto 10px;border:1px solid hsl(var(--border))}.choice-heads{background:linear-gradient(135deg,hsl(var(--primary)),hsl(44 92% 40%));color:hsl(222 47% 8%)}.choice-tails{background:linear-gradient(135deg,hsl(var(--accent)),hsl(196 74% 38%));color:hsl(222 47% 8%)}.choice-label{font-weight:700}.result{padding:10px 0 6px;animation:220ms ease-out fadeIn}@keyframes fadeIn{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:translateY(0)}}.result-text{font-weight:800}.result-text.win{color:hsl(var(--win));text-shadow:0 0 18px hsl(var(--win) / .25)}.result-text.lose{color:hsl(var(--lose));text-shadow:0 0 18px hsl(var(--lose) / .22)}.result-sub{margin-top:6px;color:hsl(var(--muted))}.result-side{color:hsl(var(--text));font-weight:700;text-transform:capitalize}.bet-info{margin-top:14px;color:hsl(var(--muted))}.bet-amount{color:hsl(var(--primary));font-weight:800}.fineprint,.site-footer{color:hsl(var(--muted))}.fineprint{margin:14px 0 0;font-size:12px}.site-footer{padding:18px 0 26px}.site-footer small{display:block;text-align:center}
    </style>

  </head>
  <body>
    <header class="site-header" aria-label="Coin flip game header">
      <div class="container">
        <div class="title-row">
          <div class="logo" aria-hidden="true">⛁</div>
          <h1>Coin Flip Game</h1>
        </div>
        <p class="subtitle">Side বেছে নিন, ১০ টাকা bet করুন অনেক বেশী জিতুন!</p>
      </div>
    </header>

    <main class="container" aria-label="Coin flip game">
      <section class="card balance" aria-label="Balance section">
        <div>
          <div class="kicker">Your Balance</div>
          <div class="balance-amount"><span id="balance">100</span> TK</div>
        </div>
        <!-- <button id="btnAdd" class="btn btn-secondary" type="button">+50 TK</button> -->
      </section>

      <section class="coin-stage" aria-label="Coin animation">
        <div id="coinContainer" class="coin-container" aria-live="polite">
          <div id="coin" class="coin" aria-label="Coin">
            <div class="coin-face coin-heads"><span><img style="max-width: 117px;" src="inc/img/games_view/toss_bd/head.png" alt="H" ></span></div>
            <div class="coin-face coin-tails"><span><img style="max-width: 117px;" src="inc/img/games_view/toss_bd/tails.png" alt="T" ></span></div>
          </div>
        </div>
      </section>

      <section class="card" aria-label="Result section">
        <div id="resultWrap" class="result" hidden>
          <div id="resultText" class="result-text"></div>
          <div class="result-sub">
            Coin landed on: <span id="resultSide" class="result-side"></span>
          </div>
        </div>

        <div class="choice-area" aria-label="Choose a side">
          <div class="kicker center">Choose Your Side</div>
          <div class="choices">
            <button id="btnHeads" class="choice" type="button" data-side="heads">
              <div class="choice-coin choice-heads"><span><img style="max-width: 60px;" src="inc/img/games_view/toss_bd/head.png" alt="H" ></span></div>
              <div class="choice-label">Heads</div>
            </button>
            <button id="btnTails" class="choice" type="button" data-side="tails">
              <div class="choice-coin choice-tails"><span><img style="max-width: 60px;" src="inc/img/games_view/toss_bd/tails.png" alt="T" ></span></div>
              <div class="choice-label">Tails</div>
            </button>
          </div>
        </div>

        <div class="bet-info" aria-label="Bet information">
          Bet Amount: <span class="bet-amount">10 TK</span>
        </div>

        <button id="btnSpin" class="btn btn-primary" type="button">Spin Coin</button>
        <!-- <button id="btnReset" class="btn btn-secondary" type="button" hidden>Play Again</button> -->

        <!-- <p class="fineprint">Win Rate: 20% | Win Multiplier: 2x</p> -->
      </section>
    </main>
    <br><br><br>
    <footer class="site-footer" aria-label="Footer">
      <div class="container">
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
      /* global $ */

      (function () {
        const BET_AMOUNT = 10;
        const WIN_RATE = 0.2;
        const WIN_MULTIPLIER = 2;
        const SPIN_MS = 3000;

        let balance = 100;
        let selectedSide = null; // 'heads' | 'tails'
        let isSpinning = false;
        let resultSide = null;

        const $balance = $('#balance');
        const $coin = $('#coin');
        const $coinContainer = $('#coinContainer');

        const $btnAdd = $('#btnAdd');
        const $btnHeads = $('#btnHeads');
        const $btnTails = $('#btnTails');
        const $btnSpin = $('#btnSpin');
        const $btnReset = $('#btnReset');

        const $resultWrap = $('#resultWrap');
        const $resultText = $('#resultText');
        const $resultSide = $('#resultSide');

        function setUIBusy(busy) {
          isSpinning = busy;
          $btnHeads.prop('disabled', busy);
          $btnTails.prop('disabled', busy);
          $btnAdd.prop('disabled', busy);
        }

        function updateSpinButton() {
          const canSpin = !!selectedSide && !isSpinning && balance >= BET_AMOUNT;
          $btnSpin.prop('disabled', !canSpin);

          if (isSpinning) {
            $btnSpin.text('Spinning...');
          } else if (balance < BET_AMOUNT) {
            $btnSpin.text('Insufficient Balance');
          } else {
            $btnSpin.text('Spin Coin');
          }
        }

        function renderBalance() {
          $balance.text(balance);
        }

        function clearResult() {
          $resultWrap.prop('hidden', true);
          $btnReset.prop('hidden', true);
          $coinContainer.removeClass('glow-win glow-lose');
          $resultText.removeClass('win lose');
        }

        function showResult(playerWins) {
          $resultWrap.prop('hidden', false);
          $btnReset.prop('hidden', false);

          if (playerWins) {
            $resultText
              .addClass('win')
              .text(`You Won ${BET_AMOUNT * WIN_MULTIPLIER} TK!`);
            $coinContainer.addClass('glow-win');
          } else {
            $resultText.addClass('lose').text('You Lost!');
            $coinContainer.addClass('glow-lose');
          }

          $resultSide.text(resultSide || '');
        }

        function setSelected(side) {
          if (isSpinning) return;
          selectedSide = side;

          $btnHeads.toggleClass('selected-heads', side === 'heads');
          $btnTails.toggleClass('selected-tails', side === 'tails');

          clearResult();
          updateSpinButton();
        }

        function setCoinFace(side) {
          // Only set final face after spin ends.
          // 0deg => heads, 180deg => tails
          const deg = side === 'tails' ? 180 : 0;
          $coin.css('transform', `rotateY(${deg}deg)`);
        }

        function spin() {
          if (!selectedSide || isSpinning || balance < BET_AMOUNT) return;

          clearResult();

          balance -= BET_AMOUNT;
          renderBalance();

          setUIBusy(true);
          updateSpinButton();

          // Start animation
          $coin.addClass('spinning');

          const playerWins = Math.random() < WIN_RATE;
          resultSide = playerWins
            ? selectedSide
            : selectedSide === 'heads'
              ? 'tails'
              : 'heads';

          window.setTimeout(() => {
            $coin.removeClass('spinning');
            setCoinFace(resultSide);

            if (playerWins) {
              balance += BET_AMOUNT * WIN_MULTIPLIER;
              renderBalance();
            }

            setUIBusy(false);
            updateSpinButton();
            showResult(playerWins);
          }, SPIN_MS);
        }

        function reset() {
          selectedSide = null;
          resultSide = null;

          $btnHeads.removeClass('selected-heads');
          $btnTails.removeClass('selected-tails');

          clearResult();
          setCoinFace('heads');

          updateSpinButton();
        }

        function addBalance() {
          if (isSpinning) return;
          balance += 50;
          renderBalance();
          updateSpinButton();
        }

        // Bind
        $btnHeads.on('click', () => setSelected('heads'));
        $btnTails.on('click', () => setSelected('tails'));
        $btnSpin.on('click', spin);
        $btnReset.on('click', reset);
        $btnAdd.on('click', addBalance);

        // Init
        renderBalance();
        reset();
      })();

    </script>

    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "SoftwareApplication",
        "name": "Coin Flip Game ",
        "applicationCategory": "GameApplication",
        "operatingSystem": "Web",
        "description": "jQuery দিয়ে Coin Flip Game: ১০ টাকা বেট, ব্যালেন্স ট্র্যাকিং ও কয়েন স্পিন অ্যানিমেশন।"
      }
    </script>
  </body>
</html>
