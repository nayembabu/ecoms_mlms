
<style>
  

  /* ================== NEON CORE TOKENS ================== */
:root{
  --bg:
    radial-gradient(1200px 600px at 10% 10%, #0ff3, transparent 60%),
    radial-gradient(900px 500px at 90% 20%, #f0f3, transparent 55%),
    linear-gradient(135deg,#030712,#020617);
  
  --card: rgba(9,12,32,.75);
  --glass: rgba(255,255,255,.08);
  --text: #e5e7eb;
  --muted: #94a3b8;

  --neon-cyan:#22d3ee;
  --neon-pink:#ec4899;
  --neon-green:#22c55e;
  --neon-yellow:#facc15;
  --neon-violet:#8b5cf6;

  --line: linear-gradient(
    180deg,
    var(--neon-cyan),
    var(--neon-violet),
    var(--neon-green)
  );

  --shadow: 0 40px 120px rgba(0,0,0,.8);
}




/* ================= GLOBAL BACKGROUND ================= */
html, body {
  margin:0;
  padding:0;
  min-height:100%;
  font-family:'Orbitron', sans-serif;
  color:#fde68a;
  background:
    radial-gradient(900px 500px at 15% 20%, rgba(255,215,0,.18), transparent 60%),
    radial-gradient(800px 500px at 85% 30%, rgba(220,38,38,.25), transparent 60%),
    radial-gradient(700px 600px at 50% 85%, rgba(16,185,129,.18), transparent 60%),
    linear-gradient(180deg,#020617,#020617);
  overflow-x:hidden;
}

/* ================= CASINO LIGHTS ================= */
body::before{
  content:"";
  position:fixed;
  inset:0;
  background:
    linear-gradient(120deg,
      rgba(255,215,0,.08),
      rgba(255,255,255,.15),
      rgba(255,215,0,.08));
  mix-blend-mode:overlay;
  animation: casinoLights 6s linear infinite;
  pointer-events:none;
}

@keyframes casinoLights{
  0%{opacity:.15}
  50%{opacity:.35}
  100%{opacity:.15}
}

/* ================= COIN RAIN ================= */
.coin {
  position: fixed;
  top: -50px;
  font-size: 22px;
  animation: fall linear infinite;
  opacity: .9;
}

@keyframes fall {
  to {
    transform: translateY(110vh) rotate(360deg);
    opacity: 0;
  }
}

/* ================= CONTAINER ================= */
.wrapper{
  min-height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
  padding:80px 20px;
}



.container,
.container-fluid,
.row {
  background: transparent !important;
}
.bg-white,
.bg-light {
  background: transparent !important;
}
/* subtle moving stars */
body::after{
  content:"";
  position:fixed;
  inset:0;
  background:
    radial-gradient(1px 1px at 20% 30%, #fff8 50%, transparent 51%),
    radial-gradient(1px 1px at 80% 70%, #fff6 50%, transparent 51%),
    radial-gradient(1px 1px at 50% 50%, #fff7 50%, transparent 51%);
  opacity:.15;
  pointer-events:none;
}



/* ================== GLOBAL BACKGROUND ================== */
.team_container{
  min-height:100vh;
  width:100%;
  background: transparent; /* body থেকে background আসবে */
  padding:80px 20px;
  display:flex;
  justify-content:center;
  align-items:flex-start;
}

/* ================== TREE RESET ================== */
.team_main_list_ul,
.team_main_list_ul ul{
  margin:0;
  padding:0;
  list-style:none;
  position:relative;
}

.team_main_list_ul{
  display:flex;
  flex-direction:column;
  align-items:center;
  gap:40px;
}

/* ================== NODE CARD (PLAYER / INVESTOR) ================== */
.person_cls{
  display:inline-flex;
  align-items:center;
  gap:12px;
  padding:14px 22px;
  border-radius:18px;

  background:
    linear-gradient(var(--card),var(--card)) padding-box,
    linear-gradient(135deg,
      var(--neon-cyan),
      var(--neon-pink),
      var(--neon-violet)
    ) border-box;

  border:2px solid transparent;
  color:var(--text);
  font-weight:800;
  letter-spacing:.3px;
  text-decoration:none;
  box-shadow:
    0 0 25px rgba(34,211,238,.25),
    inset 0 0 20px rgba(255,255,255,.05);
  cursor:pointer;
  position:relative;
  transition:.3s ease;
}

/* glowing pulse */
.person_cls::before{
  content:"";
  position:absolute;
  inset:-4px;
  border-radius:inherit;
  background: linear-gradient(135deg,
    var(--neon-cyan),
    var(--neon-pink),
    var(--neon-violet)
  );
  filter:blur(18px);
  opacity:.35;
  z-index:-1;
  animation: neonPulse 3s infinite alternate;
}

@keyframes neonPulse{
  from{ opacity:.25; }
  to{ opacity:.65; }
}

.person_cls:hover{
  transform: translateY(-6px) scale(1.05);
  box-shadow:
    0 0 45px rgba(236,72,153,.55),
    0 0 120px rgba(34,211,238,.35);
}

/* ================== DESKTOP CONNECTORS ================== */
@media (min-width:641px){
  .team_main_list_ul ul{
    display:flex;
    justify-content:center;
    gap:70px;
    padding-top:46px;
  }

  /* vertical beam */
  .team_main_list_ul ul::before{
    content:"";
    position:absolute;
    top:0;
    left:50%;
    transform:translateX(-50%);
    width:4px;
    height:46px;
    background: var(--line);
    border-radius:999px;
    box-shadow:0 0 30px var(--neon-cyan);
  }

  /* horizontal energy bar */
  .team_main_list_ul ul::after{
    content:"";
    position:absolute;
    top:46px;
    left:8%;
    right:8%;
    height:4px;
    background: linear-gradient(
      90deg,
      transparent,
      var(--neon-pink),
      var(--neon-cyan),
      var(--neon-green),
      transparent
    );
    box-shadow:0 0 30px rgba(34,211,238,.7);
  }

  .team_main_list_ul ul > li{
    position:relative;
    padding-top:34px;
  }

  /* child drop beam */
  .team_main_list_ul ul > li::before{
    content:"";
    position:absolute;
    top:0;
    left:50%;
    transform:translateX(-50%);
    width:4px;
    height:34px;
    background: var(--line);
    border-radius:999px;
    box-shadow:0 0 20px rgba(139,92,246,.6);
  }
}

/* ================== MOBILE = NEON TIMELINE ================== */
@media (max-width:640px){
  .team_main_list_ul ul{
    padding-left:28px;
    margin-top:24px;
  }

  .team_main_list_ul ul::before{
    content:"";
    position:absolute;
    left:14px;
    top:0;
    bottom:0;
    width:4px;
    background: var(--line);
    box-shadow:0 0 30px rgba(34,211,238,.7);
  }

  .team_main_list_ul ul > li{
    position:relative;
    padding:22px 0 22px 34px;
  }

  .team_main_list_ul ul > li::before{
    content:"";
    position:absolute;
    left:6px;
    top:50%;
    width:14px;
    height:14px;
    border-radius:50%;
    background: var(--neon-cyan);
    box-shadow:0 0 25px rgba(34,211,238,1);
    transform:translateY(-50%);
  }

  .team_main_list_ul a.person_cls{
    width:100%;
    max-width:520px;
  }
}

/* ================== GAMING EFFECTS ================== */
.person_cls:active{
  transform:scale(.95);
  box-shadow:0 0 60px rgba(250,204,21,.8);
}

/* ================== REDUCE MOTION ================== */
@media (prefers-reduced-motion: reduce){
  .person_cls::before{ animation:none; }
  .person_cls{ transition:none; }
}



</style>

<section class="pt-5 text-center bg-white shadow-sm profit-section_ss">
  
  <div class="wrapper">
    <div class="container team_container">


      <?php if ($my_info->sts == 1) { ?>
        <ul class="team_main_list_ul">
          <li class="team_list_1 team_list_li " >
            <a class="person_cls" person_id="<?= $my_info->user_full_info_idd; ?>" ><?= $my_info->user_full_name; ?></a>
            <ul>
              <?php foreach ($ref_users as $sng) { ?>
                <li class="team_list_2 team_list_li " >
                  <a class="person_cls" person_id="<?= $sng->user_full_info_idd; ?>" ><?= $sng->user_full_name; ?></a>
                </li>
              <?php } ?>
            </ul>
          </li>
        </ul>
      <?php } else { ?>
          <div class="alert alert-warning text-center" role="alert">
              <h2 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>Account Inactive!</h2>
              <p>Your account is currently inactive. Please contact support to activate your account and access team features.</p>
              <hr>
          </div>
      <?php } ?>

    </div>
  </div>
</section>


<br><br><br><br><br><br><br><br>



<script>
  $(document).on('click', '.person_cls', function (e) {

    const $a   = $(this);
    const $li  = $a.closest('.team_list_li'); // parent() নয়, closest() নিরাপদ
    const person_id   = $a.attr('person_id');
    const person_name = $a.text().trim();

    $.ajax({
      type: "post",
      url: "user/getRefferById",
      data: {
        person_id: person_id
      },
      dataType: 'json', 
      success: function (rs) {
        console.log(rs);
        // <a class="person_cls" person_id="" >  </a>

        if (Array.isArray(rs) && rs.length === 0) {
             $li.html(`<a class="person_cls" person_id="${person_id}" > ${person_name} </a>`);
             console.log(' কোনো ডাটা পাওয়া যায় নাই ');
        } else if (Array.isArray(rs) && rs.length > 0) {
          let html_data = '';
          for (let n = 0; n < rs.length; n++) {
            html_data += `
              <li class="team_list_2 team_list_li " >
                <a class="person_cls" person_id="${rs[n].user_full_info_idd}" >${rs[n].user_full_name}</a>
              </li>`;
          }
          $li.html(`<a class="person_cls" person_id="${person_id}" > ${person_name} </a><ul>${html_data}</ul>`);
        } else {
            console.log("rs অ্যারে নয় বা ডেটা ফরম্যাট ঠিক নয়");
        }



      }
    });

  });



  /* ===== COIN RAIN ===== */
  const coins = ["💰","🪙","💲"];
  setInterval(()=>{
    const coin = document.createElement("div");
    coin.className="coin";
    coin.innerText = coins[Math.floor(Math.random()*coins.length)];
    coin.style.left = Math.random()*100+"vw";
    coin.style.animationDuration = (3 + Math.random()*3)+"s";
    document.body.appendChild(coin);
    setTimeout(()=>coin.remove(),6000);
  }, 500);
</script>


