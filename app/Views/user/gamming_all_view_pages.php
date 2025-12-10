<style>
    @import url('https://fonts.googleapis.com/css2?family=Exo+2:wght@600;800&display=swap');
.game,.title{overflow:hidden}.header{position:fixed;top:0;left:0;right:0;padding:12px 20px;background:rgba(0,0,0,.95);backdrop-filter:blur(15px);border-bottom:1px solid #d4af37;z-index:9999;display:flex;justify-content:space-between;align-items:center}.logo{font-size:2.3rem;font-weight:800;color:#d4af37;text-shadow:0 0 30px #d4af37}.balance{background:linear-gradient(45deg,#d4af37,gold);color:#000;padding:8px 20px;border-radius:30px;font-size:1.1rem;font-weight:700;box-shadow:0 0 20px #d4af37}canvas#confetti{position:fixed;inset:0;pointer-events:none;z-index:9998}.container_games{padding:20px 10px 40px;max-width:2000px;margin:0 auto;display:grid;grid-template-columns:repeat(auto-fill,minmax(170px,1fr));gap:14px}.game{position:relative;height:240px;border-radius:16px;box-shadow:0 8px 20px rgba(0,0,0,.6);transition:.5s;cursor:pointer}.content,.overlay{position:absolute}.game:hover{transform:translateY(-12px) scale(1.12);box-shadow:0 20px 40px rgba(212,175,55,.6);z-index:10}.img{width:100%;height:100%;object-fit:cover;transition:transform 8s}.game:hover .img{transform:scale(1.3)}.overlay{inset:0;background:linear-gradient(180deg,transparent 30%,rgba(0,0,0,.85) 100%)}.content{bottom:0;left:0;right:0;padding:12px 8px;text-align:center}.title{font-size:1.22rem;font-weight:800;color:#d4af37;text-shadow:0 2px 8px #000;white-space:nowrap;text-overflow:ellipsis}.new,.play{font-weight:700}.play{margin-top:8px;padding:8px 20px;background:linear-gradient(45deg,#d4af37,gold);color:#000;border:none;border-radius:30px;font-size:.95rem;box-shadow:0 6px 15px rgba(212,175,55,.7);transition:.4s}.jackpot,.live{border-radius:20px}.jackpot,.live,.new{top:8px;padding:4px 10px;font-size:.75rem;position:absolute}.game:hover .play{transform:scale(1.2)}.live{right:8px;background:#e74c3c;color:#fff;animation:1.8s infinite pulse}.jackpot{left:8px;background:rgba(0,0,0,.7);color:gold;border:1px solid #d4af37}.new{left:8px;background:#00ff9d;color:#000;border-radius:20px}.free,.paid{font-size:1.8rem;font-weight:800;text-align:center;position:relative;overflow:hidden;color:#fff}@keyframes pulse{0%,100%{box-shadow:0 0 0 0 rgba(231,76,60,.8)}70%{box-shadow:0 0 0 10px transparent}}.games-header{margin:2rem 0;display:flex;gap:flex;flex-wrap:wrap;gap:20px;justify-content:center;align-items:stretch}.header-card{flex:1;min-width:280px;max-width:500px;border-radius:20px!important;overflow:hidden;box-shadow:0 15px 35px rgba(0,0,0,.3);transition:.4s;border:none;position:relative}.header-card:hover{transform:translateY(-12px);box-shadow:0 25px 50px rgba(0,0,0,.4)}.paid{background:linear-gradient(135deg,#11998e,#38ef7d)!important;padding:20px 10px}.paid::before{content:'';position:absolute;top:-50%;left:-50%;width:200%;height:200%;background:linear-gradient(45deg,transparent,rgba(255,255,255,.15),transparent);transform:rotate(30deg);animation:6s infinite shine}.paid:hover{color:#fff;background:linear-gradient(135deg,#38ef7d,#11998e)!important}.free{background:linear-gradient(135deg,#667eea,#764ba2)!important;padding:30px 20px;text-decoration:none;display:flex;align-items:center;justify-content:center;gap:12px}.free:hover{color:#fff;background:linear-gradient(135deg,#764ba2,#667eea)!important}.free i{font-size:2rem;transition:transform .4s}.free:hover i{transform:translateX(8px)}@keyframes shine{0%{transform:translateX(-100%) translateY(-100%) rotate(30deg)}100%{transform:translateX(100%) translateY(100%) rotate(30deg)}}@media (max-width:768px){.free,.paid{font-size:1.5rem;padding:25px 15px}}
</style>


<!-- Lottery Info Section -->
<section class="mt-5 container  ">
    <div class="card shadow-sm border-0 mt-2 ">
        <div class="card-header bg-warning text-light fs-5 fw-bold">🎟️ Lottery Information</div>
        <div class="card-body">
            <div class="row text-center">
                <?php if ($lottery_info) { ?>
                <div class="col-md-4">
                    <div class="p-3 bg-light rounded">
                        <h6 class="fw-bold">Present Lottery</h6>
                        <p class="fs-3 fw-bold text-primary">
                            <?= $lottery_info->lottery_unq_no; ?>
                        </p>
                        <p class="fs-5 fw-bold text-dark">Draw Date
                            <?= $lottery_info->expire_dates; ?>
                        </p>
                        <a href="user/lottery_system"
                            class="btn text-white bg-primary btn-primary btn-sm w-100">Participate Now</a>
                    </div>
                </div>
                <?php } ?>
                <div class="col-md-4 ">
                    <div class="p-3 bg-light rounded">
                        <h6 class="fw-bold">Your Tickets</h6>
                        <p class="fs-4 fw-bold text-success">Ticket</p>
                        <p class="fs-4 fw-bold text-success"> History </p>
                        <a href="user/your_lottery_history_system"
                            class="btn text-white btn-success bg-success btn-sm w-100">View Tickets</a>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="p-3 bg-light rounded">
                        <h6 class="fw-bold">See ALL Lottery</h6>
                        <p class="fs-4 fw-bold text-success">ALL Lottery</p>
                        <p class="fs-4 fw-bold text-success"> View </p>
                        <a href="user/all_lottery_history_system"
                            class="btn text-white bg-dark btn-dark btn-sm w-100">See Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <!-- Stats Row -->
        <div class="row g-3">
            <div class="col-12 col-md-4">
                <div class="card shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="me-3 p-3 rounded-3" style="background: linear-gradient(135deg,#ffd6a5,#ffb4b4);">
                            <i class="bi bi-controller fs-3"></i>
                        </div>
                        <div>
                            <div class="small text-muted">Total Playtime</div>
                            <div class="fw-bold">248 hrs</div>
                        </div>
                        <div class="ms-auto text-end">
                            <div class="small text-muted">Avg/day</div>
                            <div class="fw-bold">2.1 hrs</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="me-3 p-3 rounded-3" style="background: linear-gradient(135deg,#cce7ff,#b8f2e6);">
                            <i class="bi bi-trophy fs-3"></i>
                        </div>
                        <div>
                            <div class="small text-muted">Achievements</div>
                            <div class="fw-bold">36 unlocked</div>
                        </div>
                        <div class="ms-auto text-end">
                            <div class="small text-muted">Next</div>
                            <div class="fw-bold">3 to Gold</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card shadow-sm p-3">
                    <div class="d-flex align-items-center">
                        <div class="me-3 p-3 rounded-3" style="background: linear-gradient(135deg,#e5ccff,#ffd6f0);">
                            <i class="bi bi-people fs-3"></i>
                        </div>
                        <div>
                            <div class="small text-muted">Friends Online</div>
                            <div class="fw-bold">8</div>
                        </div>
                        <div class="ms-auto text-end">
                            <div class="small text-muted">Requests</div>
                            <div class="fw-bold text-primary">2</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="games-header">
        <div class="header-card paid">
            <i class="fas fa-crown fa-2x mb-3"></i><br>
            All Paid Games
        </div>

        <a href="user/free-games" class="header-card free">
            <span>See Free Games</span>
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <div class="container container_games">

        <a href="" class="game">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=600" class="img">
            <div class="overlay"></div>
            <div class="content">
                <div class="title">Aviator</div><button class="play">উড়ুন</button>
            </div>
        </a>

        <a href="" class="game">
            <img src="https://images.unsplash.com/photo-1542281286-9e0a16bb7366?w=600" class="img">
            <div class="overlay"></div>
            <div class="live">LIVE</div>
            <div class="content">
                <div class="title">লাইভ রুলেট</div><button class="play">জয়েন</button>
            </div>
        </a>

        <a href="" class="game">
            <img src="https://images.unsplash.com/photo-1542281286-9e0a16bb7366?w=600" class="img">
            <div class="overlay"></div>
            <div class="jackpot">১২ কোটি</div>
            <div class="content">
                <div class="title">Mega Moolah</div><button class="play">জ্যাকপট</button>
            </div>
        </a>

        <a href="" class="game">
            <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=600" class="img">
            <div class="overlay"></div>
            <div class="new">NEW</div>
            <div class="content">
                <div class="title">Spaceman</div><button class="play">উড়ুন</button>
            </div>
        </a>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script>
        setInterval(() => confetti({ particleCount: 70, spread: 80, origin: { y: 0.6 }, colors: ['#d4af37', '#ffd700'] }), 10000);
        document.querySelectorAll('.play').forEach(b => b.onclick = e => confetti({ particleCount: 220, spread: 100, origin: { x: e.clientX / window.innerWidth, y: e.clientY / window.innerHeight } }));
    </script>

</section>