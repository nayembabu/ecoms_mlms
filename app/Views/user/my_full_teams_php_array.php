<!--
<div class="team-tree mt-5 mb-5">
    <?php

        function renderTree($tree) {
            echo '<ul>';
            foreach ($tree as $node) {
                echo '<li>';
                echo 'User ID: ' . $node['user_id'] . ' - Name: ' . $node['full_name'];
                if (!empty($node['children'])) {
                    renderTree($node['children']);
                }
                echo '</li>';
            }
            echo '</ul>';
        }

        renderTree($tree);

    ?>

</div>
-->







  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;800&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    :root{
      --bg1:#070818;
      --bg2:#0b1230;

      --glass: rgba(255,255,255,.07);
      --stroke: rgba(255,255,255,.14);
      --text: #e9ecff;
      --muted: rgba(233,236,255,.75);

      --gold:#ffd36a;
      --pink:#ff4fd8;
      --cyan:#3df1ff;
      --lime:#7CFF6B;
      --orange:#ff8a3d;
      --violet:#8b5cff;

      --shadow: 0 25px 70px rgba(0,0,0,.45);
      --shadow2: 0 10px 30px rgba(0,0,0,.35);
      --radius: 22px;
    }

    *{ box-sizing:border-box; }
    body{
      margin:0;
      min-height:100vh;
      font-family: "Inter", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      color: var(--text);
      background:
        radial-gradient(900px 450px at 10% 10%, rgba(255,79,216,.22), transparent 60%),
        radial-gradient(900px 450px at 90% 20%, rgba(61,241,255,.18), transparent 60%),
        radial-gradient(900px 450px at 50% 90%, rgba(124,255,107,.13), transparent 60%),
        linear-gradient(135deg, var(--bg1), var(--bg2));
      overflow-x:hidden;
    }

    /* animated aurora */
    .aurora{
      position: fixed;
      inset:-40%;
      background:
        radial-gradient(circle at 20% 20%, rgba(255,79,216,.28), transparent 40%),
        radial-gradient(circle at 80% 30%, rgba(61,241,255,.22), transparent 45%),
        radial-gradient(circle at 40% 80%, rgba(255,138,61,.16), transparent 45%);
      filter: blur(40px);
      animation: floaty 10s ease-in-out infinite alternate;
      z-index:0;
      pointer-events:none;
    }
    @keyframes floaty{
      from{ transform: translate3d(-2%, -1%, 0) scale(1.02); }
      to{ transform: translate3d(2%, 1%, 0) scale(1.08); }
    }

    .wrap{
      position:relative;
      z-index:1;
      padding: 26px 14px 34px;
      max-width: 1250px;
      margin: 0 auto;
    }

    .topbar{
      display:flex;
      gap:14px;
      align-items:center;
      justify-content:space-between;
      margin-bottom: 16px;
      flex-wrap: wrap;
    }

    .brand{
      display:flex;
      align-items:center;
      gap:12px;
    }
    .logo{
      width:44px;height:44px;
      border-radius:16px;
      background: linear-gradient(135deg, rgba(255,79,216,.95), rgba(61,241,255,.95));
      box-shadow: 0 0 0 1px rgba(255,255,255,.12) inset, 0 20px 40px rgba(0,0,0,.35);
      position:relative;
      overflow:hidden;
    }
    .logo:after{
      content:"";
      position:absolute; inset:-30%;
      background: radial-gradient(circle at 30% 30%, rgba(255,255,255,.45), transparent 45%);
      transform: rotate(25deg);
    }
    .title{ line-height:1.1; }
    .title h1{
      margin:0;
      font-family:"Orbitron", sans-serif;
      font-size: 1.25rem;
      letter-spacing:.6px;
      background: linear-gradient(90deg, var(--gold), var(--pink), var(--cyan));
      -webkit-background-clip:text;
      -webkit-text-fill-color:transparent;
      text-shadow: 0 0 25px rgba(255,211,106,.12);
    }
    .title p{
      margin:2px 0 0;
      font-size:.92rem;
      color: var(--muted);
    }

    .controls{
      display:flex;
      gap:10px;
      align-items:center;
      flex-wrap:wrap;
      justify-content:flex-end;
    }

    .chip{
      padding: 10px 12px;
      border-radius: 999px;
      background: var(--glass);
      border: 1px solid var(--stroke);
      box-shadow: var(--shadow2);
      font-size:.9rem;
      color: var(--muted);
      display:flex;
      gap:10px;
      align-items:center;
    }
    .chip b{ color: var(--text); font-weight:700; }

    .btn-neo{
      border:0;
      padding: 10px 12px;
      border-radius: 14px;
      background: rgba(255,255,255,.08);
      color: var(--text);
      border: 1px solid rgba(255,255,255,.14);
      box-shadow: var(--shadow2);
      transition: transform .15s ease, background .2s ease, box-shadow .2s ease;
      font-weight: 700;
      letter-spacing:.2px;
    }
    .btn-neo:hover{
      transform: translateY(-1px);
      background: rgba(255,255,255,.10);
      box-shadow: 0 14px 40px rgba(0,0,0,.45);
    }
    .btn-neo:active{ transform: translateY(0px) scale(.98); }

    /* Stage */
    .stage{
      position: relative;
      border-radius: 26px;
      background: rgba(255,255,255,.05);
      border: 1px solid rgba(255,255,255,.12);
      box-shadow: var(--shadow);
      overflow:hidden;
      min-height: 70vh;
    }

    .stage::before{
      content:"";
      position:absolute; inset:0;
      background:
        radial-gradient(800px 300px at 20% 5%, rgba(255,211,106,.10), transparent 60%),
        radial-gradient(700px 280px at 90% 12%, rgba(61,241,255,.08), transparent 65%),
        radial-gradient(900px 320px at 55% 100%, rgba(255,79,216,.07), transparent 60%);
      pointer-events:none;
    }

    .hint{
      position:absolute;
      left: 14px;
      top: 14px;
      z-index: 3;
      padding: 10px 12px;
      border-radius: 14px;
      background: rgba(0,0,0,.28);
      border: 1px solid rgba(255,255,255,.12);
      color: rgba(255,255,255,.78);
      font-size: .9rem;
      backdrop-filter: blur(10px);
    }

    /* viewport: draggable + zoomable */
    .viewport{
      position: relative;
      width: 100%;
      height: 72vh;
      overflow: hidden;
      cursor: grab;
      z-index:2;
      touch-action: none;
    }
    .viewport:active{ cursor: grabbing; }

    .world{
      position:absolute;
      left: 0; top: 0;
      transform-origin: 0 0;
      will-change: transform;
      padding: 34px 34px 60px;
      min-width: 1050px;
      min-height: 850px;
    }

    /* ===== VERTICAL TREE (Top -> Down) ===== */
    .mgt-item{
      display:flex;
      flex-direction: column;
      align-items: center;
    }

    .mgt-item-parent{
      position: relative;
      margin-bottom: 70px;
    }

    /* parent to children vertical line */
    .mgt-item-parent:after{
      content:"";
      position:absolute;
      left: 50%;
      top: 100%;
      width: 4px;
      height: 70px;
      transform: translateX(-50%);
      border-radius: 999px;
      background: linear-gradient(180deg, rgba(255,211,106,1), rgba(255,79,216,1), rgba(61,241,255,1));
      box-shadow: 0 0 18px rgba(255,211,106,.25);
    }

    .mgt-item-children{
      position: relative;
      display:flex;
      justify-content: center;
      gap: 26px;
      padding-top: 26px;
      align-items: flex-start;
    }

    /* center line from parent to the horizontal spine */
    .mgt-item-children:before{
      content:"";
      position:absolute;
      left: 50%;
      top: -70px;
      width: 4px;
      height: 70px;
      transform: translateX(-50%);
      border-radius: 999px;
      background: linear-gradient(180deg, rgba(255,79,216,1), rgba(255,211,106,1), rgba(124,255,107,1));
      box-shadow: 0 0 18px rgba(61,241,255,.18);
    }

    /* horizontal spine connecting children */
    .mgt-item-children:after{
      content:"";
      position:absolute;
      top: 0;
      left: 8%;
      right: 8%;
      height: 4px;
      border-radius: 999px;
      background: linear-gradient(90deg, rgba(61,241,255,1), rgba(255,211,106,1), rgba(255,79,216,1));
      box-shadow: 0 0 18px rgba(255,79,216,.12);
    }

    .mgt-item-child{
      position: relative;
      padding: 0;
    }

    /* child vertical drop from spine to child */
    .mgt-item-child:before{
      content:"";
      position:absolute;
      left: 50%;
      top: -26px;
      width: 4px;
      height: 26px;
      transform: translateX(-50%);
      border-radius: 999px;
      background: linear-gradient(180deg, rgba(124,255,107,1), rgba(255,211,106,1));
      box-shadow: 0 0 18px rgba(124,255,107,.14);
    }

    /* Node Card */
    .node{
      display:flex;
      align-items:center;
      gap: 12px;
      padding: 14px 14px;
      border-radius: var(--radius);
      background: linear-gradient(135deg, rgba(255,255,255,.10), rgba(255,255,255,.05));
      border: 1px solid rgba(255,255,255,.14);
      box-shadow: 0 14px 40px rgba(0,0,0,.35);
      backdrop-filter: blur(12px);
      min-width: 320px;
      transition: transform .2s ease, box-shadow .25s ease, border-color .25s ease;
      position:relative;
      overflow:hidden;
    }

    .node:after{
      content:"";
      position:absolute; inset:-60%;
      background:
        radial-gradient(circle at 30% 30%, rgba(255,79,216,.35), transparent 45%),
        radial-gradient(circle at 70% 50%, rgba(61,241,255,.25), transparent 45%),
        radial-gradient(circle at 40% 80%, rgba(124,255,107,.22), transparent 45%);
      filter: blur(24px);
      opacity:.45;
      transition: opacity .25s ease;
      pointer-events:none;
    }

    .node:hover{
      transform: translateY(-2px);
      border-color: rgba(255,255,255,.22);
      box-shadow: 0 20px 70px rgba(0,0,0,.45);
    }
    .node:hover:after{ opacity:.7; }

    .avatar{
      width: 54px; height: 54px;
      border-radius: 18px;
      background: linear-gradient(135deg, rgba(255,79,216,.95), rgba(61,241,255,.95));
      padding: 2px;
      flex: 0 0 auto;
      box-shadow: 0 0 0 1px rgba(255,255,255,.12) inset;
      position:relative;
      z-index:1;
    }
    .avatar img{
      width:100%; height:100%;
      object-fit: cover;
      border-radius: 16px;
      display:block;
      background: rgba(0,0,0,.25);
    }

    .meta{ flex: 1 1 auto; position:relative; z-index:1; }
    .meta .row1{
      display:flex;
      justify-content: space-between;
      gap: 10px;
      align-items:center;
    }
    .name{
      font-weight: 800;
      letter-spacing:.2px;
      margin:0;
      font-size: 1.02rem;
    }
    .role{
      margin: 2px 0 0;
      color: var(--muted);
      font-size: .92rem;
      line-height: 1.2;
    }

    .badge-level{
      padding: 7px 10px;
      border-radius: 999px;
      font-weight: 800;
      font-size: .80rem;
      letter-spacing:.2px;
      border: 1px solid rgba(255,255,255,.18);
      backdrop-filter: blur(10px);
      box-shadow: 0 10px 26px rgba(0,0,0,.25);
      white-space: nowrap;
    }

    .lvl1{ background: rgba(255,211,106,.16); color: #ffe7a9; }
    .lvl2{ background: rgba(61,241,255,.14); color: #c9fbff; }
    .lvl3{ background: rgba(255,79,216,.14); color: #ffd2f4; }
    .lvl4{ background: rgba(124,255,107,.14); color: #d9ffd1; }

    .stats{
      display:flex;
      gap:10px;
      margin-top: 10px;
      flex-wrap: wrap;
    }
    .pill{
      font-size:.82rem;
      color: rgba(255,255,255,.84);
      padding: 6px 10px;
      border-radius: 999px;
      border: 1px solid rgba(255,255,255,.14);
      background: rgba(0,0,0,.16);
    }
    .pill span{ color: var(--gold); font-weight:800; }

    .legend{
      padding: 14px 16px;
      display:flex;
      gap:10px;
      flex-wrap:wrap;
      align-items:center;
      justify-content:space-between;
      color: rgba(255,255,255,.78);
      border-top: 1px solid rgba(255,255,255,.10);
      background: rgba(0,0,0,.12);
    }
    .legend .left{
      display:flex; gap:10px; flex-wrap:wrap;
      align-items:center;
    }
    .dot{
      width:10px; height:10px; border-radius:999px; display:inline-block; margin-right:6px;
    }
    .d1{ background: var(--gold); box-shadow: 0 0 12px rgba(255,211,106,.35); }
    .d2{ background: var(--cyan); box-shadow: 0 0 12px rgba(61,241,255,.28); }
    .d3{ background: var(--pink); box-shadow: 0 0 12px rgba(255,79,216,.28); }
    .d4{ background: var(--lime); box-shadow: 0 0 12px rgba(124,255,107,.28); }

    /* Smaller screens: reduce node width a bit, keep vertical tree */
    @media (max-width: 768px){
      .node{ min-width: 300px; }
      .world{ padding: 26px 18px 60px; min-width: 980px; }
      .hint{ font-size: .86rem; }
      .topbar{ gap:10px; }
    }

    @media (max-width: 480px){
      .node{ min-width: 280px; }
    }
  </style>
  

<br><br><br><br><br>

  <div class="aurora "></div>

  <div class="wrap ">
    <div class="topbar">
      <div class="brand">
        <div class="logo"></div>
        <div class="title">
          <h1>Vertical MLM Downline</h1>
          <p>Top → Down Tree • Drag & Zoom • Premium colorful UI</p>
        </div>
      </div>

      <div class="controls">
        <div class="chip"><b>Zoom</b> <span id="zoomText">100%</span></div>
        <button class="btn-neo" id="zoomIn">+</button>
        <button class="btn-neo" id="zoomOut">−</button>
        <button class="btn-neo" id="reset">Reset</button>
      </div>
    </div>

    <div class="stage">
      <div class="hint">🖱️ Drag to pan • 🧲 Wheel to zoom • 📱 Touch drag supported</div>

      <div class="viewport" id="viewport">
        <div class="world" id="world">

          <!-- ROOT (Level 1) -->
          <div class="mgt-item">
            <div class="mgt-item-parent">
              <div class="node">
                <div class="avatar">
                  <img src="https://cdn0.iconfinder.com/data/icons/user-pictures/100/matureman1-128.png" alt="">
                </div>
                <div class="meta">
                  <div class="row1">
                    <p class="name"><?= $my_info->user_full_name; ?></p>
                    <span class="badge-level lvl1">Level 1 • Founder</span>
                  </div>
                  <p class="role">Top Leader / Company Owner</p>
                  <div class="stats">
                    <div class="pill">Team: <span>1,240</span></div>
                    <div class="pill">Rank: <span>Diamond</span></div>
                    <div class="pill">Bonus: <span>$12,500</span></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- LEVEL 2 -->
            <div class="mgt-item-children">

              <!-- Branch A -->
              <div class="mgt-item-child">
                <div class="mgt-item">
                  <div class="mgt-item-parent">
                    <div class="node">
                      <div class="avatar">
                        <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/male3-128.png" alt="">
                      </div>
                      <div class="meta">
                        <div class="row1">
                          <p class="name">Sajid Khan</p>
                          <span class="badge-level lvl2">Level 2 • Leader</span>
                        </div>
                        <p class="role">Team Builder / Mentor</p>
                        <div class="stats">
                          <div class="pill">Team: <span>420</span></div>
                          <div class="pill">Rank: <span>Ruby</span></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Level 3 under Branch A -->
                  <div class="mgt-item-children">
                    <div class="mgt-item-child">
                      <div class="node">
                        <div class="avatar">
                          <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/female1-128.png" alt="">
                        </div>
                        <div class="meta">
                          <div class="row1">
                            <p class="name">Nusrat Jahan</p>
                            <span class="badge-level lvl3">Level 3 • Pro</span>
                          </div>
                          <p class="role">Sales Specialist</p>
                          <div class="stats">
                            <div class="pill">Ref: <span>58</span></div>
                            <div class="pill">Bonus: <span>$1,200</span></div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="mgt-item-child">
                      <div class="mgt-item">
                        <div class="mgt-item-parent">
                          <div class="node">
                            <div class="avatar">
                              <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/boy-128.png" alt="">
                            </div>
                            <div class="meta">
                              <div class="row1">
                                <p class="name">Arif Rahman</p>
                                <span class="badge-level lvl3">Level 3 • Pro</span>
                              </div>
                              <p class="role">Growth Marketer</p>
                              <div class="stats">
                                <div class="pill">Ref: <span>44</span></div>
                                <div class="pill">Rank: <span>Silver</span></div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Level 4 under Arif -->
                        <div class="mgt-item-children">
                          <div class="mgt-item-child">
                            <div class="node">
                              <div class="avatar">
                                <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/supportmale-128.png" alt="">
                              </div>
                              <div class="meta">
                                <div class="row1">
                                  <p class="name">Imran</p>
                                  <span class="badge-level lvl4">Level 4 • New</span>
                                </div>
                                <p class="role">Starter Member</p>
                                <div class="stats">
                                  <div class="pill">Ref: <span>9</span></div>
                                  <div class="pill">Status: <span>Active</span></div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="mgt-item-child">
                            <div class="node">
                              <div class="avatar">
                                <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/supportfemale-128.png" alt="">
                              </div>
                              <div class="meta">
                                <div class="row1">
                                  <p class="name">Maliha</p>
                                  <span class="badge-level lvl4">Level 4 • New</span>
                                </div>
                                <p class="role">Starter Member</p>
                                <div class="stats">
                                  <div class="pill">Ref: <span>7</span></div>
                                  <div class="pill">Status: <span>Active</span></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="mgt-item-child">
                      <div class="node">
                        <div class="avatar">
                          <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/female2-128.png" alt="">
                        </div>
                        <div class="meta">
                          <div class="row1">
                            <p class="name">Tahmina</p>
                            <span class="badge-level lvl3">Level 3 • Pro</span>
                          </div>
                          <p class="role">Community Builder</p>
                          <div class="stats">
                            <div class="pill">Ref: <span>36</span></div>
                            <div class="pill">Rank: <span>Bronze</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Branch B -->
              <div class="mgt-item-child">
                <div class="mgt-item">
                  <div class="mgt-item-parent">
                    <div class="node">
                      <div class="avatar">
                        <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/female3-128.png" alt="">
                      </div>
                      <div class="meta">
                        <div class="row1">
                          <p class="name">Sharmin Akter</p>
                          <span class="badge-level lvl2">Level 2 • Leader</span>
                        </div>
                        <p class="role">Sales Manager</p>
                        <div class="stats">
                          <div class="pill">Team: <span>310</span></div>
                          <div class="pill">Rank: <span>Emerald</span></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Level 3 under Branch B -->
                  <div class="mgt-item-children">
                    <div class="mgt-item-child">
                      <div class="node">
                        <div class="avatar">
                          <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/girl-128.png" alt="">
                        </div>
                        <div class="meta">
                          <div class="row1">
                            <p class="name">Rima</p>
                            <span class="badge-level lvl3">Level 3 • Pro</span>
                          </div>
                          <p class="role">Executive</p>
                          <div class="stats">
                            <div class="pill">Ref: <span>22</span></div>
                            <div class="pill">Bonus: <span>$480</span></div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="mgt-item-child">
                      <div class="node">
                        <div class="avatar">
                          <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/man-128.png" alt="">
                        </div>
                        <div class="meta">
                          <div class="row1">
                            <p class="name">Nazmul</p>
                            <span class="badge-level lvl3">Level 3 • Pro</span>
                          </div>
                          <p class="role">Executive</p>
                          <div class="stats">
                            <div class="pill">Ref: <span>18</span></div>
                            <div class="pill">Status: <span>Active</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>

        </div>
      </div>

      <div class="legend">
        <div class="left">
          <span><span class="dot d1"></span>Level 1</span>
          <span><span class="dot d2"></span>Level 2</span>
          <span><span class="dot d3"></span>Level 3</span>
          <span><span class="dot d4"></span>Level 4</span>
        </div>
        <div style="opacity:.85">✨ Premium Vertical MLM Tree • Drag & Zoom Enabled</div>
      </div>
    </div>
  </div>

  <script>
    // ====== Pan + Zoom (no external libs) ======
    const viewport = document.getElementById('viewport');
    const world = document.getElementById('world');
    const zoomText = document.getElementById('zoomText');
    const btnIn = document.getElementById('zoomIn');
    const btnOut = document.getElementById('zoomOut');
    const btnReset = document.getElementById('reset');

    let scale = 1;
    let x = 18, y = 18; // initial translate
    let isDown = false;
    let startX = 0, startY = 0;

    function clamp(v, min, max){ return Math.min(max, Math.max(min, v)); }

    function render(){
      world.style.transform = `translate(${x}px, ${y}px) scale(${scale})`;
      zoomText.textContent = Math.round(scale * 100) + "%";
    }
    render();

    viewport.addEventListener('pointerdown', (e)=>{
      isDown = true;
      viewport.setPointerCapture(e.pointerId);
      startX = e.clientX - x;
      startY = e.clientY - y;
    });

    viewport.addEventListener('pointermove', (e)=>{
      if(!isDown) return;
      x = e.clientX - startX;
      y = e.clientY - startY;
      render();
    });

    viewport.addEventListener('pointerup', ()=>{ isDown = false; });
    viewport.addEventListener('pointercancel', ()=>{ isDown = false; });

    // Wheel zoom around cursor
    viewport.addEventListener('wheel', (e)=>{
      e.preventDefault();

      const rect = viewport.getBoundingClientRect();
      const cx = e.clientX - rect.left;
      const cy = e.clientY - rect.top;

      const delta = e.deltaY < 0 ? 1.07 : 0.93;
      const newScale = clamp(scale * delta, 0.55, 1.8);

      const wx = (cx - x) / scale;
      const wy = (cy - y) / scale;

      scale = newScale;
      x = cx - wx * scale;
      y = cy - wy * scale;

      render();
    }, { passive:false });

    btnIn.addEventListener('click', ()=>{
      scale = clamp(scale * 1.12, 0.55, 1.8);
      render();
    });

    btnOut.addEventListener('click', ()=>{
      scale = clamp(scale * 0.88, 0.55, 1.8);
      render();
    });

    btnReset.addEventListener('click', ()=>{
      scale = 1; x = 18; y = 18;
      render();
    });
  </script>





<br><br><br><br><br><br>