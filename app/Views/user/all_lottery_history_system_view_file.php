







<style>

  *{margin:0;padding:0;box-sizing:border-box;}
  body{
    font-family:'Hind Siliguri',sans-serif;
    background:#0a001f;
    overflow-x:hidden;
    color:white;
    min-height:100vh;
  }

  /* তারার পার্টিকেল ব্যাকগ্রাউন্ড */
  #particles{
    position:fixed; top:0; left:0; width:100%; height:100%; z-index:1;
  }
  .content{ position:relative; z-index:2; }

  h1{
    text-align:center; font-size:42px; margin:40px 0 20px;
    background:linear-gradient(90deg,#ffd700,#ff6ec4,#00ffff,#ffd700);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
    text-shadow:0 0 30px rgba(255,215,0,0.5);
    font-family:'Bebas Neue',cursive;
    letter-spacing:3px;
  }
  .subtitle{ text-align:center; font-size:18px; color:#aaa; margin-bottom:40px; }

  .grid{
    display:grid;
    grid-template-columns:repeat(auto-fill, minmax(340px, 1fr));
    gap:30px;
    max-width:1500px;
    margin:0 auto;
    padding:20px;
  }

  /* মেইন টিকেট কার্ড */
  .ticket-card{
    position:relative;
    height:260px;
    perspective:1500px;
    cursor:pointer;
  }

  .front, .back{
    position:absolute;
    width:100%;
    backface-visibility:hidden;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 20px 40px rgba(0,0,0,0.6);
  }
  .front{
    background:linear-gradient(135deg, #1a0033, #2d0077);
    border:3px solid;
    border-image:linear-gradient(45deg, #ffd700, #ff00aa, #00ffff) 1;
    animation:neon 4s linear infinite;
  }
  .back{
    background:linear-gradient(135deg, #000428, #004e92);
    transform:rotateY(180deg);
    padding:20px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    text-align:center;
    color:#fff;
  }
  .back h3{ font-size:24px; margin-bottom:15px; color:#ffd700; }
  .back p{ font-size:14px; line-height:1.8; }

  @keyframes neon{
    0%,100%{ box-shadow:0 0 20px #ffd700; }
    50%{ box-shadow:0 0 40px #ff00aa, 0 0 60px #00ffff; }
  }

  .prize{
    text-align:center; font-size:36px; font-weight:700;
    background:linear-gradient(90deg,#ffd700,#51ff00,#ff00aa);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
    margin:15px 0;
    text-shadow:0 0 20px rgba(255,215,0,0.6);
  }
  .numbers{
    display:flex; justify-content:center; gap:12px; margin:15px 0;
  }
  .num{
    width:52px; height:52px;
    background:radial-gradient(circle at 20% 20%, #fff700, #ff6b00);
    border-radius:50%;
    display:flex; align-items:center; justify-content:center;
    font-size:22px; font-weight:900;
    color:#000;
    box-shadow:0 0 20px rgba(255,215,0,0.8);
    animation:pulse 2s infinite;
  }
  @keyframes pulse{
    0%,100%{ transform:scale(1); }
    50%{ transform:scale(1.15); }
  }

  .detail-btn{
    margin:15px auto 0;
    padding:12px 30px;
    background:linear-gradient(45deg,#ffd700,#ff6b00);
    border:none; border-radius:50px;
    color:#000; font-weight:bold; font-size:16px;
    cursor:pointer;
    box-shadow:0 10px 30px rgba(255,215,0,0.4);
    transition:0.3s;
  }
  .detail-btn:hover{ transform:translateY(-5px); box-shadow:0 15px 40px rgba(255,215,0,0.6); }

  /* মোডাল + কনফেটি */
  .modal{
    display:none; position:fixed; z-index:9999; left:0; top:0;
    width:100%; height:100%; background:rgba(0,0,0,0.95);
    justify-content:center; align-items:center;
  }
  .modal.active{ display:flex; }
  .large-ticket{
    width:460px; padding:30px; background:linear-gradient(135deg,#0f0027,#2a0070);
    border-radius:25px; border:4px solid transparent;
    background-clip:padding-box;
    position:relative;
    box-shadow:0 0 80px rgba(255,215,0,0.6);
  }
  .large-ticket::before{
    content:''; position:absolute; inset:-4px;
    background:linear-gradient(45deg,#ffd700,#ff00aa,#00ffff,#ffd700);
    border-radius:25px; z-index:-1;
    animation:neon 3s linear infinite;
  }
</style>



<br><br><br>
<div class="content container mt-5 ">

  <p class="subtitle">যে কোনো একটা টিকেট আজ তোমাকে লাখপতি বানাতে পারে!</p>
  <div class="grid">

    <?php foreach ($all_lotary_info as $sngl_lottery) { ?>
        <div class="ticket-card" >
            <div class="ticket-inner">
                <div class="front">
                    <div style="padding:20px; text-align:center;">
                        <h2 style="color:#ffd700; font-size:20px; margin-bottom:10px;"><?= $sngl_lottery->lottery_names_here; ?></h2>
                        <div class="prize">টিকেট মূল্য ৳<?= $sngl_lottery->ticket_prices;?></div>
                        <div class="numbers ">
                          <?php $digits = str_split($sngl_lottery->lottery_unq_no, 2); foreach ($digits as $sngle) { ?>
                              <div class="num"><?= $sngle; ?></div>
                          <?php } ?>
                        </div>
                        <!-- <p style="margin:10px 0; font-size:14px;"></p> -->
                         <div style="margin:30px 0 0 0; font-size:16px;" >
                            <a href="user/single_lottery_view?id=<?= $sngl_lottery->lotary_shedual_idd; ?>"class="detail-btn">বিস্তারিত দেখুন</a>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

  </div>
</div>





