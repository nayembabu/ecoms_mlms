
  <style>
    :root {
      --rk-primary: #c084fc;
      --rk-secondary: #22d3ee;
      --rk-accent: #86efac;
      --rk-accent2: #fcd34d;
      --rk-accent3: #f9a8d4;
      --rk-dark: #0f172a;
      --rk-white: #ffffff;
    }
    body {
      background: linear-gradient(to bottom, #7c3502ff, #9b9b0bff);
      min-height: 100vh;
      overflow-x: hidden;
      position: relative;
    }
    #particles-canvas {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      z-index: -1;
      pointer-events: none;
    }
    .rk-login-card {
      position: relative;
      border-radius: 32px;
      padding: 4px;
      background: conic-gradient(from 0deg at 50% 50%, var(--rk-primary), var(--rk-secondary), var(--rk-accent), var(--rk-accent2), var(--rk-accent3), var(--rk-primary));
      animation: rk-rotate 12s linear infinite, rk-feather-float 8s ease-in-out infinite;
      box-shadow: 0 20px 40px rgba(0,0,0,0.4), 0 40px 80px rgba(192,132,252,0.25);
      isolation: isolate;
      transition: transform 0.4s ease;
    }
    .rk-login-card:hover { transform: translateY(-8px) scale(1.015); }
    .rk-login-inner {
      border-radius: 28px;
      background: rgba(15,23,42,0.7);
      backdrop-filter: blur(16px) saturate(180%);
      padding: 36px;
      color: var(--rk-white);
      position: relative;
      overflow: hidden;
    }
    .rk-title {
      font-weight: 900;
      background: linear-gradient(90deg, #fff, var(--rk-secondary), var(--rk-accent));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .rk-btn {
      background: linear-gradient(90deg, var(--rk-secondary), var(--rk-accent), var(--rk-primary));
      box-shadow: 0 12px 25px rgba(192,132,252,0.35);
      padding: 1.1rem;
      border-radius: 18px;
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
    }
    .rk-btn:hover { transform: translateY(-4px); }
    .rk-btn .rk-sheen {
      position: absolute;
      top: 0; left: -100%;
      width: 50%; height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
      transform: skewX(-25deg);
      transition: left 0.6s;
    }
    .rk-btn:hover .rk-sheen { left: 100%; }

    @keyframes rk-feather-float {
      0%, 100% { transform: translateY(0) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(2deg); }
    }
    @keyframes rk-rotate {
      0% { filter: hue-rotate(0deg); }
      100% { filter: hue-rotate(360deg); }
    }

    /* Floating Label Fixes */
    .rk-input {
      border-radius: 18px;
      overflow: hidden;
      border: 1px solid rgba(255,255,255,0.1);
      transition: all 0.3s ease;
      background: rgba(255,255,255,0.05);
    }
    .rk-input:focus-within {
      border-color: var(--rk-primary);
      box-shadow: 0 0 0 4px rgba(192,132,252,0.2);
    }
    .rk-input .input-group-text {
      background: transparent;
      border: none;
      color: var(--rk-accent);
      padding-left: 1rem;
    }
    .form-floating > .form-control {
      background: transparent;
      border: none;
      color: white;
      padding-left: 0.5rem;
      height: calc(3.5rem + 2px);
    }
    .form-floating > .form-control:focus {
      box-shadow: none;
      background: transparent;
    }
    .form-floating > label {
      color: rgba(255,255,255,0.7);
      padding-left: 0.5rem;
    }
    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
      color: var(--rk-secondary);
      transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
    }

    .rk-link {
      color: var(--rk-secondary);
      text-decoration: none;
    }
    .rk-link:hover {
      color: var(--rk-accent);
    }

    @media (prefers-reduced-motion: reduce) {
      * { animation: none !important; }
    }
  </style>


  <canvas id="particles-canvas"></canvas>

  <section class="py-5 d-flex align-items-center min-vh-100">
    <div class="container-fluid-lg w-100">
      <div class="row justify-content-center">
        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9 col-sm-11">
          <div class="rk-login-card">
            <div class="rk-login-inner">
              <div class="text-center mb-4">
                <div class="rk-logo-badge mb-3">
                  <i class="fa-solid fa-user-plus fa-3x text-white"></i>
                </div>
                <h3 class="rk-title mb-1">Create Your Account</h3>
                <p class="text-white-50 mb-0">Sign up to continue</p>
              </div>

              <form class="row g-3" action="register_user" method="post" id="registerForm" novalidate enctype="multipart/form-data">

                <!-- Full Name -->
                <div class="col-12">
                  <div class="input-group rk-input">
                    <span class="input-group-text rk-ig-icon">
                      <i class="fa-solid fa-id-card"></i>
                    </span>
                    <div class="form-floating flex-grow-1">
                      <input type="text" class="form-control rk-control" id="full_name" name="user_full_name" required >
                      <label for="full_name">Full Name</label>
                    </div>
                  </div>
                </div>

                <!-- Username -->
                <div class="col-12">
                  <div class="input-group rk-input">
                    <span class="input-group-text rk-ig-icon">
                      <i class="fa-solid fa-user"></i>
                    </span>
                    <div class="form-floating flex-grow-1">
                      <input type="text" class="form-control rk-control" id="username" name="userNam" required >
                      <label for="username">Username</label>
                    </div>
                  </div>
                </div>

                <!-- Phone -->
                <div class="col-12">
                  <div class="input-group rk-input">
                    <span class="input-group-text rk-ig-icon">
                      <i class="fa-solid fa-phone"></i>
                    </span>
                    <div class="form-floating flex-grow-1">
                      <input type="text" class="form-control rk-control" id="phone" name="user_phone" required >
                      <label for="phone">Phone</label>
                    </div>
                  </div>
                </div>

                <!-- Email -->
                <div class="col-12">
                  <div class="input-group rk-input">
                    <span class="input-group-text rk-ig-icon">
                      <i class="fa-solid fa-envelope"></i>
                    </span>
                    <div class="form-floating flex-grow-1">
                      <input type="email" class="form-control rk-control" id="email" name="user_email" required >
                      <label for="email">Email</label>
                    </div>
                  </div>
                </div>

                <!-- Profile Picture -->
                <div class="col-12">
                  <div class="input-group rk-input">
                    <span class="input-group-text rk-ig-icon">
                      <i class="fa-solid fa-image"></i>
                    </span>
                    <input type="file" class="form-control rk-control" id="profile_pic" name="profile_pic" accept="image/*" style="padding-top: 1rem;">
                    <label class="form-label text-white-50 ms-3 mt-2">Upload Profile Picture (optional)</label>
                  </div>
                </div>

                <!-- Address -->
                <div class="col-12">
                  <div class="input-group rk-input">
                    <span class="input-group-text rk-ig-icon">
                      <i class="fa-solid fa-location-dot"></i>
                    </span>
                    <div class="form-floating flex-grow-1">
                      <textarea class="form-control rk-control" id="user_full_address" name="user_full_address" style="height: 100px;" required ></textarea>
                      <label for="user_full_address">Address</label>
                    </div>
                  </div>
                </div>

                <!-- Password -->
                <div class="col-12">
                  <div class="input-group rk-input">
                    <span class="input-group-text rk-ig-icon">
                      <i class="fa-solid fa-lock"></i>
                    </span>
                    <div class="form-floating flex-grow-1">
                      <input type="password" class="form-control rk-control" id="user_password" name="user_password" required >
                      <label for="user_password">Password</label>
                    </div>
                  </div>
                </div>

                <!-- Terms -->
                <div class="col-12 d-flex align-items-center">
                  <div class="form-check m-0">
                    <input class="form-check-input" type="checkbox" id="agree" required >
                    <label class="form-check-label text-white-50" for="agree">
                      I agree to the Terms & Privacy Policy
                    </label>
                  </div>
                </div>

                <!-- Submit -->
                <div class="col-12 submit_btn_assign "></div>
              </form>

              <div class="text-center mt-4">
                <span class="text-white-50 me-1">Already have an account?</span>
                <a href="/login" class="rk-link fw-medium">Log In</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Particle Animation Script -->
  <script>

    function checkUnique(field, value, errorBox){
        if(value === '') return;

        $.ajax({
            url: "/check-unique",
            type: "POST",
            data: {
                field: field,
                value: value
            },
            success: function(res){
                if(res.status === 'error'){
                    $(errorBox).text(res.message);
                    $('.submit_btn_assign').html(``);
                }else{
                    $('.submit_btn_assign').html(`
                      <button type="submit" class="btn rk-btn w-100 text-white fw-bold" >
                        <span class="rk-sheen"></span>
                        <i class="fa-solid fa-user-check me-2"></i> Create Account
                      </button>
                    `);
                    $(errorBox).text('');
                }
            }
        });
    }

    $('#email').on('blur', function(){checkUnique('email', $(this).val(), '#emailError');});
    $('#phone').on('blur', function(){checkUnique('phone', $(this).val(), '#phoneError');});
    $('#username').on('blur', function(){checkUnique('username', $(this).val(), '#usernameError');});


    const canvas = document.getElementById('particles-canvas');
    const ctx = canvas.getContext('2d');
    let particles = [];
    const colors = ['#c084fc', '#22d3ee', '#86efac', '#fcd34d', '#f9a8d4'];

    function resizeCanvas() {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    class Particle {
      constructor() { this.reset(); }
      reset() {
        this.x = Math.random() * canvas.width;
        this.y = canvas.height + Math.random() * 100;
        this.size = Math.random() * 4 + 2;
        this.speedY = -(Math.random() * 1.5 + 0.5);
        this.speedX = Math.random() * 0.5 - 0.25;
        this.color = colors[Math.floor(Math.random() * colors.length)];
        this.opacity = Math.random() * 0.6 + 0.4;
      }
      update() {
        this.y += this.speedY;
        this.x += this.speedX;
        if (this.y < -10) this.reset();
      }
      draw() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fillStyle = this.color + Math.floor(this.opacity * 255).toString(16).padStart(2, '0');
        ctx.fill();
        ctx.shadowBlur = 10;
        ctx.shadowColor = this.color;
      }
    }

    let mouse = { x: 0, y: 0 };
    window.addEventListener('mousemove', e => {
      mouse.x = e.clientX;
      mouse.y = e.clientY;
    });

    function initParticles() {
      particles = [];
      const count = window.innerWidth < 768 ? 40 : 80;
      for (let i = 0; i < count; i++) {
        particles.push(new Particle());
      }
    }
    initParticles();

    function animate() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      particles.forEach(p => {
        const dx = p.x - mouse.x;
        const dy = p.y - mouse.y;
        const dist = Math.sqrt(dx*dx + dy*dy);
        if (dist < 150) {
          const force = (150 - dist) / 150;
          p.speedX += dx * force * 0.02;
          p.speedY += dy * force * 0.02;
        }
        p.update();
        p.draw();
      });
      requestAnimationFrame(animate);
    }
    animate();
  </script>
