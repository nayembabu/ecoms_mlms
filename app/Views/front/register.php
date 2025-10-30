
<!-- This is instruction form Backed developer
 Form Action /register_user Method POST
 Input Fields:  user_full_name, userNam, user_password, user_phone, user_email, profile_pic, user_full_address
-->  
<!-- Breadcrumb Section Start -->
<section class="breadcrumb-section pt-0">
  <div class="container-fluid-lg">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-contain">
          <h2 class="mb-2">Register</h2>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="index.php"><i class="fa-solid fa-house"></i></a>
              </li>
              <li class="breadcrumb-item active">Register</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Register section start (card-only gradient; section stays plain) -->
<section class="log-in-section py-5">
  <div class="container-fluid-lg w-100">
    <div class="row justify-content-center">
      <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9 col-sm-11">

        <!-- Eye-catching Register Card -->
        <div class="rk-login-card">
          <div class="rk-login-inner">
            <div class="text-center mb-4">
              <div class="rk-logo-badge mb-3">
                <i class="fa-solid fa-user-plus"></i>
              </div>
              <h3 class="rk-title mb-1">Create Your Account</h3>
              <p class="rk-subtitle mb-0">Sign up to continue</p>
            </div>

            <form class="row g-3" action="register_user" method="post" id="registerForm" novalidate enctype="multipart/form-data" >
              <!-- Full Name -->
              <div class="col-12">
                <div class="input-group rk-input">
                  <span class="input-group-text rk-ig-icon">
                    <i class="fa-solid fa-id-card"></i>
                  </span>
                  <div class="form-floating flex-grow-1">
                    <input type="text" class="form-control rk-control" id="full_name" name="user_full_name" placeholder="Full Name" required>
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
                    <input type="text" class="form-control rk-control" id="u_name" name="userNam" placeholder="Username" required>
                    <label for="u_name">Username</label>
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
                    <input type="text" class="form-control rk-control" id="phone" name="user_phone" placeholder="Phone" required>
                    <label for="phone">Phone</label>
                  </div>
                </div>
              </div>
             <!-- Email  -->
              <div class="col-12">
                <div class="input-group rk-input">
                  <span class="input-group-text rk-ig-icon">
                    <i class="fa-solid fa-envelope"></i>
                  </span>
                  <div class="form-floating flex-grow-1">
                    <input type="text" class="form-control rk-control" id="user_email" name="user_email" placeholder="Email" required >
                    <label for="Email">Email</label>
                  </div>
                </div>
              </div>

              <!-- Profile Picture -->  
              <div class="col-12">
                <div class="input-group rk-input">
                  <span class="input-group-text rk-ig-icon">
                    <i class="fa-solid fa-image"></i>
                  </span>
                  <div class="form-floating flex-grow-1">
                    <input type="file" class="form-control rk-control" id="profile_pic" name="profile_pic" accept="image/*">
                    <label for="profile_pic"></label>
                  </div>
                </div>
              </div>

              <!-- Address -->
              <div class="col-12">
                <div class="input-group rk-input">
                  <span class="input-group-text rk-ig-icon">
                    <i class="fa-solid fa-location-dot"></i>
                  </span>
                  <div class="form-floating flex-grow-1">
                    <textarea class="form-control rk-control" id="user_full_address" name="user_full_address" placeholder="Address" style="height: 90px;" required></textarea>
                    <label for="address">Address</label>
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
                    <input type="password" class="form-control rk-control" id="user_password" name="user_password" placeholder="Password" required>
                    <label for="password">Password</label>
                    <button type="button" class="rk-eye-btn" data-target="#password" aria-label="Toggle password" tabindex="-1">
                      <i class="fa-regular fa-eye"></i>
                    </button>
                  </div>
                </div>
              </div>


              <!-- Terms (optional) -->
              <div class="col-12 d-flex align-items-center">
                <div class="form-check m-0">
                  <input class="form-check-input" type="checkbox" id="agree" required>
                  <label class="form-check-label" for="agree">I agree to the Terms & Privacy Policy</label>
                </div>
              </div>

              <!-- Submit -->
              <div class="col-12">
                <button class="btn rk-btn w-100" type="submit">
                  <span class="rk-sheen"></span>
                  <i class="fa-solid fa-user-check me-2"></i> Create Account
                </button>
              </div>
            </form>

            <div class="text-center mt-4">
              <span class="text-white-50 me-1">Already have an account?</span>
              <a href="/login" class="rk-link">Log In</a>
            </div>
          </div>
        </div>
        <!-- /Eye-catching Register Card -->

      </div>
    </div>
  </div>
</section>
<!-- Register section end -->

<!-- Reuse the same styles from the login page (rk- classes) -->
<style>
  :root{
    --rk-primary:#7c3aed; --rk-secondary:#22d3ee; --rk-accent:#22c55e;
    --rk-dark:#0b1020; --rk-white:#ffffff;
  }
  .rk-login-card{position:relative;border-radius:24px;padding:2px;background:conic-gradient(from 180deg,var(--rk-primary),var(--rk-secondary),var(--rk-accent),var(--rk-primary));animation:rk-rotate 8s linear infinite;box-shadow:0 10px 30px rgba(124,58,237,.35),0 2px 8px rgba(0,0,0,.25);isolation:isolate}
  .rk-login-card::after{content:"";position:absolute;inset:-20px;background:radial-gradient(40% 40% at 50% 0%,rgba(124,58,237,.35),transparent 70%);filter:blur(18px);z-index:-1}
  .rk-login-inner{border-radius:22px;background:rgba(15,18,34,.55);backdrop-filter:blur(10px) saturate(140%);-webkit-backdrop-filter:blur(10px) saturate(140%);padding:28px;color:var(--rk-white);position:relative;overflow:hidden}
  .rk-login-inner::before,.rk-login-inner::after{content:"";position:absolute;width:220px;height:220px;border-radius:50%;filter:blur(40px);opacity:.25;pointer-events:none}
  .rk-login-inner::before{background:radial-gradient(circle,var(--rk-secondary),transparent 60%);top:-70px;left:-70px;animation:rk-float 7s ease-in-out infinite}
  .rk-login-inner::after{background:radial-gradient(circle,var(--rk-accent),transparent 60%);bottom:-80px;right:-80px;animation:rk-float 6s ease-in-out infinite reverse}
  .rk-logo-badge{width:64px;height:64px;border-radius:20px;display:inline-flex;align-items:center;justify-content:center;background:linear-gradient(135deg,var(--rk-primary),var(--rk-secondary));box-shadow:0 10px 20px rgba(34,211,238,.35);color:#fff;font-size:26px}
  .rk-title{font-weight:800;letter-spacing:.3px;background:linear-gradient(90deg,#fff,#e9e9ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent}
  .rk-subtitle{color:rgba(255,255,255,.7)}
  .rk-input .rk-ig-icon{background:transparent;border:1px solid rgba(255,255,255,.15);border-right:none;color:#fff}
  .rk-input .rk-control{background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.15);color:#fff}
  .rk-input .rk-control::placeholder{color:rgba(255,255,255,.65)}
  .rk-input .rk-control:focus{border-color:rgba(34,211,238,.65);box-shadow:0 0 0 .25rem rgba(34,211,238,.15)}
  .rk-eye-btn{position:absolute;right:.75rem;top:50%;transform:translateY(-50%);background:transparent;border:0;color:#fff;opacity:.8}
  .rk-eye-btn:hover{opacity:1}
  .rk-link{color:#fff;text-decoration:none;font-weight:600;border-bottom:1px dashed rgba(255,255,255,.5)}
  .rk-link:hover{opacity:.9}
  .rk-btn{position:relative;overflow:hidden;border:none;font-weight:700;color:#0b1020;background:linear-gradient(90deg,var(--rk-secondary),var(--rk-accent),var(--rk-primary));box-shadow:0 10px 20px rgba(124,58,237,.35);padding:.9rem 1.1rem;border-radius:14px}
  .rk-btn .rk-sheen{content:"";position:absolute;inset:0;pointer-events:none;background:linear-gradient(120deg,transparent 30%,rgba(255,255,255,.55),transparent 70%);transform:translateX(-100%);transition:transform .6s ease}
  .rk-btn:hover .rk-sheen{transform:translateX(100%)}
  @keyframes rk-rotate{0%{filter:hue-rotate(0deg)}100%{filter:hue-rotate(360deg)}}
  @keyframes rk-float{0%,100%{transform:translateY(0)}50%{transform:translateY(-12px)}}
  @media (prefers-reduced-motion: reduce){.rk-login-card,.rk-login-inner::before,.rk-login-inner::after{animation:none!important}.rk-btn .rk-sheen{display:none}}
  @media (max-width:575.98px){.rk-login-inner{padding:22px}}
</style>



