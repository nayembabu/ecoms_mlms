 <style>
    h3.section-title {font-weight:700;background:linear-gradient(90deg,#2563eb,#0ea5e9);-webkit-background-clip:text;-webkit-text-fill-color:transparent;margin-bottom:10px;}
    .profit-grid {display:grid;grid-template-columns:repeat(auto-fit,minmax(120px,1fr));gap:20px;justify-items:center;margin-bottom:30px;}
    .profit-box {width:110px;height:110px;background:linear-gradient(145deg,#ffffff,#f0f4ff);border-radius:20px;box-shadow:0 6px 16px rgba(0,0,0,.08);display:flex;flex-direction:column;align-items:center;justify-content:center;transition:all .25s ease;cursor:pointer;position:relative;}
    .profit-box:hover {transform:translateY(-5px);box-shadow:0 10px 25px rgba(0,0,0,.12);}
    .profit-box i {font-size:1.6rem;color:#2563eb;margin-bottom:2px;}
    .profit-box h6 {font-weight:600;color:#1e293b;margin-bottom:2px;}
    .profit-box small {color:#64748b;}
    .profit-box.done {background:linear-gradient(145deg,#d1fae5,#a7f3d0);color:#064e3b;}
    .profit-box.done i {color:#16a34a;}
    .profit-box.done::after{content:'✔';position:absolute;right:8px;top:6px;font-size:1rem;color:#22c55e;font-weight:bold;}
    .progress {border-radius:30px;overflow:hidden;height:10px;}
    .progress-bar {background:linear-gradient(90deg,#0ea5e9,#2563eb);}
    .btn-custom {border-radius:25px;padding:6px 18px;font-weight:500;}
    .btn-custom i {margin-right:4px;}
    footer {background:#0f172a;color:#94a3b8;padding:20px 0;margin-top:80px;font-size:0.9rem;}
  </style>





  <!-- Hero Section -->
  <section class="pt-5 mt-5 text-center bg-white shadow-sm">
    <div class="container py-5">
      <h1 class="fw-bold mb-3">স্বাগতম, <?= $my_info->user_full_name; ?>!</h1>
      <p class="lead text-muted">আপনার নেটওয়ার্ক ড্যাশবোর্ডে সব তথ্য এক জায়গায়</p>
    </div>
  </section>


  <section class="pt-5 mt-5 text-center bg-white shadow-sm profit-section_ss">
    <div class="container ">
      <h2 class="section-title"><?php echo count($daily_profit); ?> দিনের প্রফিট চেকলিস্ট</h2>
      <p class="text-muted mb-4">প্রতিদিন ক্লিক করুন, প্রফিট বাড়বে </p>
      <div class="profit-grid" id="profitBoxes">
        <?php foreach ($daily_profit as $profit) { ?>
          <div class="profit-box "><i class="bi bi-cash-stack"></i><h6><?= $profit->days_list; ?> দিন </h6><h5>৳ <b><?= $profit->profit_amount; ?></b></h5></div>
        <?php } ?>
      </div>
      <div class="mx-auto" style="max-width:360px;">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <span class="fw-semibold">মোট অর্জন:</span>
          <span id="totalEarned" class="fw-bold text-success">৳0</span>
        </div>
        <div class="progress mb-3">
          <div id="profitProgress" class="progress-bar" style="width:0%"></div>
        </div>
        <div class="d-flex justify-content-center gap-2"></div>
      </div>
    </div>
  </section>

  <!-- KPI Section -->
  <section id="overview" class="content-section">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-3">
          <div class="card text-center p-4">
            <i class="bi bi-cash-coin kpi-icon mx-auto"></i>
            <h5 class="mt-3">মোট কমিশন</h5>
            <h3>৳1,24,500</h3>
            <small class="text-success">+12% এই মাসে</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-center p-4">
            <i class="bi bi-people kpi-icon mx-auto"></i>
            <h5 class="mt-3">ডাইরেক্ট রেফারাল</h5>
            <h3>38</h3>
            <small class="text-muted">সক্রিয় 29</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-center p-4">
            <i class="bi bi-diagram-3 kpi-icon mx-auto"></i>
            <h5 class="mt-3">টিম সদস্য</h5>
            <h3>1,247</h3>
            <small class="text-success">+86 এই সপ্তাহে</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-center p-4">
            <i class="bi bi-trophy kpi-icon mx-auto"></i>
            <h5 class="mt-3">র‍্যাঙ্ক</h5>
            <h3>Gold</h3>
            <small>Platinum এ 35% বাকি</small>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Wallet Section -->
  <section id="wallet" class="content-section bg-white">
    <div class="container">
      <h4 class="fw-bold mb-4 text-center">ওয়ালেট ব্যালেন্স</h4>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card p-4 text-center">
            <h6 class="text-muted">মেইন ওয়ালেট</h6>
            <h2>৳34,250</h2>
            <small class="text-success">আজ +৳1,250</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-4 text-center">
            <h6 class="text-muted">বোনাস ওয়ালেট</h6>
            <h2>৳18,640</h2>
            <small>গতকাল +৳420</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-4 text-center">
            <h6 class="text-muted">উইথড্রেবল</h6>
            <h2>৳22,000</h2>
            <small class="text-warning">ফি 1.5%</small>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Referral Table -->
  <section id="referrals" class="content-section">
    <div class="container">
      <h4 class="fw-bold mb-3">রেফারেল হিস্ট্রি</h4>
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead class="table-primary text-center">
            <tr>
              <th>ইউজার</th>
              <th>তারিখ</th>
              <th>স্ট্যাটাস</th>
              <th>আয় (৳)</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr><td>রিয়া</td><td>28 Oct 2025</td><td><span class="badge bg-success">Active</span></td><td>1250</td></tr>
            <tr><td>সায়েম</td><td>26 Oct 2025</td><td><span class="badge bg-warning text-dark">Pending</span></td><td>0</td></tr>
            <tr><td>মাহির</td><td>20 Oct 2025</td><td><span class="badge bg-success">Active</span></td><td>3980</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>






