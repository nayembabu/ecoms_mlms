<!-- Breadcrumb Section Start -->
<section class="breadcrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-contain">
                    <h2 class="mb-2">Log In</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php"><i class="fa-solid fa-house"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Log In</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- log in section start -->
<section class="log-in-section py-5">
    <div class="container-fluid-lg w-100">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 col-sm-10">
                
                <!-- Eye-catching Login Card -->
                <div class="rk-login-card">
                    <div class="rk-login-inner">
                        <div class="text-center mb-4">
                            <div class="rk-logo-badge mb-3">
                                <i class="fa-solid fa-bag-shopping"></i>
                            </div>
                            <h3 class="rk-title mb-1">Welcome To Fastkart</h3>
                            <p class="rk-subtitle mb-0">Log in to continue</p>
                        </div>

                        <form class="row g-3" action="login_check" method="POST" id="loginForm" novalidate>
                            <!-- Username -->
                            <div class="col-12">
                                <div class="input-group rk-input">
                                    <span class="input-group-text rk-ig-icon">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <div class="form-floating flex-grow-1">
                                        <input type="text" class="form-control rk-control" id="u_name" name="u_name" placeholder="User Name" required>
                                        <label for="u_name">User Name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="col-12">
                                <div class="input-group rk-input">
                                    <span class="input-group-text rk-ig-icon">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                    <div class="form-floating flex-grow-1 position-relative">
                                        <input type="password" class="form-control rk-control" id="password" name="password" placeholder="Password" required>
                                        <label for="password">Password</label>
                                        <button type="button" class="rk-eye-btn" aria-label="Toggle password" tabindex="-1">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Remember & Forgot -->
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <div class="form-check m-0">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <a href="forgot.php" class="rk-link">Forgot Password?</a>
                            </div>

                            <!-- Submit -->
                            <div class="col-12">
                                <button class="btn rk-btn w-100" type="submit">
                                    <span class="rk-sheen"></span>
                                    <i class="fa-solid fa-right-to-bracket me-2"></i> Log In
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <span class="text-white-50 me-1">Don’t have an account?</span>
                            <a href="/register" class="rk-link">Sign Up</a>
                        </div>
                    </div>
                </div>
                <!-- /Eye-catching Login Card -->

            </div>
        </div>
    </div>
</section>
<!-- log in section end -->

<!-- Styles (card-only effects) -->
<style>
/* Color system (easily tweakable) */
:root{
  --rk-primary:#7c3aed;   /* purple */
  --rk-secondary:#22d3ee; /* cyan */
  --rk-accent:#22c55e;    /* green */
  --rk-dark:#0b1020;
  --rk-white:#ffffff;
}

.rk-login-card{
  position: relative;
  border-radius: 24px;
  padding: 2px;               /* gradient border thickness */
  background: conic-gradient(
      from 180deg,
      var(--rk-primary),
      var(--rk-secondary),
      var(--rk-accent),
      var(--rk-primary)
  );
  animation: rk-rotate 8s linear infinite;
  box-shadow:
    0 10px 30px rgba(124,58,237,.35),
    0 2px 8px rgba(0,0,0,.25);
  isolation: isolate; /* keep glow inside stacking context */
}

.rk-login-card::after{
  /* soft outer glow */
  content:"";
  position:absolute; inset:-20px;
  background: radial-gradient(40% 40% at 50% 0%,
              rgba(124,58,237,.35), transparent 70%);
  filter: blur(18px);
  z-index:-1;
}

.rk-login-inner{
  border-radius: 22px;
  background: rgba(15, 18, 34, .55); /* glass layer */
  backdrop-filter: blur(10px) saturate(140%);
  -webkit-backdrop-filter: blur(10px) saturate(140%);
  padding: 28px;
  color: var(--rk-white);
  position: relative;
  overflow: hidden;
}

/* floating sparkles */
.rk-login-inner::before,
.rk-login-inner::after{
  content:"";
  position:absolute;
  width:220px;height:220px;border-radius:50%;
  filter: blur(40px);
  opacity:.25; pointer-events:none;
}
.rk-login-inner::before{
  background: radial-gradient(circle, var(--rk-secondary), transparent 60%);
  top:-70px; left:-70px;
  animation: rk-float 7s ease-in-out infinite;
}
.rk-login-inner::after{
  background: radial-gradient(circle, var(--rk-accent), transparent 60%);
  bottom:-80px; right:-80px;
  animation: rk-float 6s ease-in-out infinite reverse;
}

.rk-logo-badge{
  width:64px;height:64px;border-radius:20px;
  display:inline-flex;align-items:center;justify-content:center;
  background: linear-gradient(135deg, var(--rk-primary), var(--rk-secondary));
  box-shadow: 0 10px 20px rgba(34,211,238,.35);
  color:#fff;font-size:26px;
}

.rk-title{ 
  font-weight:800; letter-spacing:.3px;
  background: linear-gradient(90deg, #fff, #e9e9ff);
  -webkit-background-clip:text; -webkit-text-fill-color:transparent;
}
.rk-subtitle{ color:rgba(255,255,255,.7); }

/* Inputs */
.rk-input .rk-ig-icon{
  background: transparent;
  border: 1px solid rgba(255,255,255,.15);
  border-right: none;
  color: #fff;
}
.rk-input .rk-control{
  background: rgba(255,255,255,.08);
  border: 1px solid rgba(255,255,255,.15);
  color: #fff;
}
.rk-input .rk-control::placeholder{ color: rgba(255,255,255,.65); }
.rk-input .rk-control:focus{
  border-color: rgba(34,211,238,.65);
  box-shadow: 0 0 0 .25rem rgba(34,211,238,.15);
}

.rk-eye-btn{
  position:absolute; right:.75rem; top:50%; transform: translateY(-50%);
  background: transparent; border:0; color:#fff; opacity:.8;
}
.rk-eye-btn:hover{ opacity:1; }

/* Links & texts */
.rk-link{
  color: #fff; text-decoration: none; font-weight:600;
  border-bottom: 1px dashed rgba(255,255,255,.5);
}
.rk-link:hover{ opacity:.9; }

/* Button with sheen sweep */
.rk-btn{
  position:relative; overflow:hidden;
  border:none; font-weight:700;
  color:#0b1020;
  background: linear-gradient(90deg, var(--rk-secondary), var(--rk-accent), var(--rk-primary));
  box-shadow: 0 10px 20px rgba(124,58,237,.35);
  padding:.9rem 1.1rem; border-radius:14px;
}
.rk-btn .rk-sheen{
  content:""; position:absolute; inset:0; pointer-events:none;
  background: linear-gradient(120deg, transparent 30%, rgba(255,255,255,.55), transparent 70%);
  transform: translateX(-100%);
  transition: transform .6s ease;
}
.rk-btn:hover .rk-sheen{ transform: translateX(100%); }

/* Animations */
@keyframes rk-rotate{
  0%{ filter:hue-rotate(0deg); }
  100%{ filter:hue-rotate(360deg); }
}
@keyframes rk-float{
  0%,100%{ transform: translateY(0) }
  50%{ transform: translateY(-12px) }
}

/* Accessibility: reduce animation */
@media (prefers-reduced-motion: reduce){
  .rk-login-card, .rk-login-inner::before, .rk-login-inner::after { animation: none !important; }
  .rk-btn .rk-sheen{ display:none; }
}

/* Small tweaks for mobile spacing */
@media (max-width: 575.98px){
  .rk-login-inner{ padding: 22px; }
}
</style>

<!-- SweetAlert + Interactions -->
<script>
(function($){
  // Password toggle
  $('.rk-eye-btn').on('click', function(){
    const $inp = $('#password');
    const type = $inp.attr('type') === 'password' ? 'text' : 'password';
    $inp.attr('type', type);
    $(this).find('i').toggleClass('fa-eye fa-eye-slash');
  });

  // Submit with SweetAlert (shows toast then submits)
  $('#loginForm').on('submit', function(e){
    e.preventDefault();
    Swal.fire({
      toast: true, position: 'top-end',
      icon: 'success',
      title: 'Logging you in...',
      showConfirmButton: false,
      timer: 900
    });
    // slight delay so toast is visible, then real submit
    const form = this;
    setTimeout(function(){ form.submit(); }, 950);
  });
});
</script>
