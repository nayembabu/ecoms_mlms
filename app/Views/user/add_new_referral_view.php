
    <style>
        :root{
            --accent-1:#7c3aed;
            --accent-2:#06b6d4;
            --accent-3:#f97316;
            --accent-contrast:#ffffff;
            --card-bg:#ffffff;
        }

        /* Card hover tilt + glow */
        .animated-card {
            transform-style: preserve-3d;
            transition: transform .35s cubic-bezier(.2,.9,.2,1), box-shadow .35s ease;
            border-radius:16px;
        }
        .animated-card:hover {
            transform: translateY(-6px) rotateX(0.5deg) rotateY(1deg);
            box-shadow: 0 18px 50px rgba(15,23,42,0.12);
        }

        /* Colorful left side */
        .colorful-side{
            background: linear-gradient(135deg, var(--accent-1) 0%, var(--accent-2) 50%, #06d6a0 100%);
            position:relative;
            padding:44px;
            overflow:hidden;
        }
        .colorful-side .side-content { z-index:2; position:relative; }
        .blob {
            position:absolute;
            border-radius:50%;
            filter: blur(28px);
            opacity:.7;
            transform: translate3d(0,0,0);
            animation: float 6s ease-in-out infinite;
        }
        .blob-1 {
            width:140px; height:140px; right:-30px; bottom:-20px; background:rgba(255,255,255,0.08); animation-duration:7s;
        }
        .blob-2 {
            width:220px; height:220px; left:-80px; top:-60px; background:rgba(255,255,255,0.06); animation-duration:9s;
        }
        @keyframes float {
            0%{ transform: translateY(0) scale(1); }
            50%{ transform: translateY(-10px) scale(1.03); }
            100%{ transform: translateY(0) scale(1); }
        }

        /* Inputs: animated underline + subtle bg */
        .input-anim { position:relative; }
        .input-anim .form-control {
            background: linear-gradient(180deg, #fff, #fbfbff);
            border:1px solid #e6e9ef;
            transition: box-shadow .18s ease, border-color .18s ease, transform .18s ease;
            padding:12px 12px;
            border-radius:8px;
        }
        .input-anim .form-control:focus {
            outline:none;
            border-color: var(--accent-1);
            box-shadow: 0 6px 18px rgba(124,58,237,0.12);
            transform: translateY(-2px);
        }
        .focus-line {
            position:absolute;
            left:12px;
            right:12px;
            bottom:8px;
            height:3px;
            background: linear-gradient(90deg, var(--accent-1), var(--accent-2), var(--accent-3));
            border-radius:3px;
            transform: scaleX(0);
            transform-origin:left;
            transition: transform .28s ease;
            pointer-events:none;
        }
        .input-anim .form-control:focus + .focus-line { transform: scaleX(1); }

        .password-group { display:flex; gap:8px; align-items:center; }
        .btn-toggle {
            border-radius:8px;
            border:1px solid #e6e9ef;
            padding:8px 10px;
            background:#fff;
            cursor:pointer;
            transition: background .15s ease, transform .12s ease;
        }
        .btn-toggle:hover { transform: translateY(-2px); background: #f8fafc; }

        /* Gradient button + ripple */
        .gradient-btn {
            background: linear-gradient(90deg, var(--accent-1), var(--accent-2));
            color:var(--accent-contrast);
            border:none;
            box-shadow: 0 6px 18px rgba(99,102,241,0.12);
            position:relative;
            overflow:hidden;
        }
        .gradient-btn:active { transform: translateY(1px); }
        .ripple::after {
            content:"";
            position:absolute;
            width:10px;height:10px;border-radius:50%;
            transform: scale(1);
            opacity:0;
            pointer-events:none;
        }

        /* Select animation */
        .select-anim .form-select {
            border-radius:8px;
            border:1px solid #e6e9ef;
            padding:10px 12px;
            transition: box-shadow .18s ease, border-color .18s ease;
        }
        .select-anim .form-select:focus {
            border-color: var(--accent-2);
            box-shadow: 0 6px 18px rgba(6,182,212,0.08);
        }

        /* small adjustments */
        .card .form-label { font-weight:600; color:#374151; }
        .invalid-feedback { font-size:.85rem; }
        @media (max-width:767px) {
            .colorful-side { display:none !important; }
            .animated-card { border-radius:12px; }
        }

        /* Respect reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .animated-card, .blob { transition:none; animation:none; transform:none; }
        }
    </style>




<!--
                user_full_name
                user_full_address
                user_email_no
                user_phone_no
                user_withdraw_method
                user_withdraw_nos
                user_pro_pic_paths
                sts
                user_reffer_code_times
                payments_names
                join_date
                join_timming

                user_name
                user_emails
                user_password
                password_show
                status
                login_user_idd

                ref_reffer_user_idd
                rreffer_main_id
                entry_times

                role_user_idd
                role_role_idd
 -->



<section class="pt-5 mt-5 bg-white shadow-sm profit-section_ss">
    <div class="container my-5">
        <div class="row mb-4">

            <div class="col-12 d-flex justify-content-center">
                <div class="card animated-card shadow-lg w-100" style="max-width:960px; border-radius:16px; overflow:hidden; border:none;">
                    <div class="row g-0 align-items-stretch">
                        <div class="col-md-5 d-none d-md-flex align-items-center justify-content-center colorful-side" aria-hidden="true">
                            <div class="side-content" style="text-align:center; max-width:260px;">
                                <h3 class="mb-2" style="font-weight:800; letter-spacing:.2px; color:var(--accent-contrast);">Create Referral Account</h3>
                                <p class="small mb-3" style="opacity:.95; color:rgba(255,255,255,.92);">Quickly onboard a new referral with animated, colourful UI.</p>

                                <!-- Animated avatar -->
                                <div class="avatar-blob" aria-hidden="true">
                                    <svg viewBox="0 0 120 120" width="96" height="96" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <linearGradient id="g1" x1="0" x2="1" y1="0" y2="1">
                                                <stop stop-color="#fff" offset="0"/>
                                                <stop stop-color="rgba(255,255,255,0.8)" offset="1"/>
                                            </linearGradient>
                                        </defs>
                                        <g stroke="none" fill="url(#g1)">
                                            <circle cx="60" cy="40" r="20" opacity="0.98"/>
                                            <path d="M20,100 C20,76 40,62 60,62 C80,62 100,76 100,100 Z" opacity="0.95"/>
                                        </g>
                                    </svg>
                                </div>
                            </div>

                            <!-- decorative animated blobs -->
                            <div class="blob blob-1"></div>
                            <div class="blob blob-2"></div>
                        </div>

                        <div class="col-md-7 bg-white p-4 p-md-5 position-relative">
                            <h4 class="mb-2" style="font-weight:700; color:#0f172a;">Register Referral</h4>
                            <p class="text-muted small mb-4">Fill the information below to register a new referral into the system.</p>

                            <form id="referralForm" action="user/add_new_referral" method="post" novalidate>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small">Full Name</label>
                                        <div class="input-anim">
                                            <input type="text" name="fullname" class="form-control form-control-lg" placeholder="full name" required>
                                            <span class="focus-line"></span>
                                        </div>
                                        <div class="invalid-feedback">Please enter a full name.</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small">Username</label>
                                        <div class="input-anim">
                                            <input type="text" name="user_name" class="form-control form-control-lg" placeholder="username" required>
                                            <span class="focus-line"></span>
                                        </div>
                                        <div class="invalid-feedback">Please choose a username.</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small">Email</label>
                                        <div class="input-anim">
                                            <input type="email" name="email" class="form-control form-control-lg" placeholder="type your email" required>
                                            <span class="focus-line"></span>
                                        </div>
                                        <div class="invalid-feedback">Please provide a valid email.</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small">Phone</label>
                                        <div class="input-anim">
                                            <input type="tel" name="phone" class="form-control form-control-lg" placeholder="mobile no (01712345678)" required>
                                            <span class="focus-line"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label small">Address</label>
                                        <div class="input-anim">
                                            <input type="text" name="address" class="form-control form-control-lg" placeholder="full address" required>
                                            <span class="focus-line"></span>
                                        </div>
                                        <div class="invalid-feedback">Please enter a valid address.</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small">Password</label>
                                        <div class="input-group input-anim password-group">
                                            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Create a password" required minlength="6" aria-describedby="togglePassword">
                                            <button class="btn bg-primary text-white gradient-btn btn-lg ripple " type="button" id="togglePassword" aria-label="show password">Show</button>
                                            <span class="focus-line"></span>
                                            <div class="invalid-feedback">Please enter a password (min 6 characters).</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small">Confirm Password</label>
                                        <div class="input-anim">
                                            <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-lg" placeholder="Repeat password" required>
                                            <span class="focus-line"></span>
                                        </div>
                                        <div class="invalid-feedback">Passwords must match.</div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="agree" required>
                                            <label class="form-check-label small" for="agree">I confirm the information is correct and accept the terms.</label>
                                            <div class="invalid-feedback">You must agree before submitting.</div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-between align-items-center">
                                        <button type="submit" class=" mx-auto mt-3 btn text-white gradient-btn btn-lg ripple" style="border-radius:12px; padding:10px 28px;">Create Referral</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

    <script>
        (function(){
            const form = document.getElementById('referralForm');
            const pwd = document.getElementById('password');
            const cpwd = document.getElementById('confirm_password');
            const toggle = document.getElementById('togglePassword');
            const btn = document.querySelector('.gradient-btn');

            // password toggle
            toggle.addEventListener('click', function(){
                const type = pwd.type === 'password' ? 'text' : 'password';
                pwd.type = cpwd.type = type;
                this.textContent = type === 'password' ? 'Show' : 'Hide';
            });

            // simple validation
            form.addEventListener('submit', function(e){
                let valid = true;

                if(pwd.value !== cpwd.value || pwd.value.length < 6) {
                    valid = false;
                    cpwd.classList.add('is-invalid');
                    pwd.classList.toggle('is-invalid', pwd.value.length < 6);
                } else {
                    cpwd.classList.remove('is-invalid');
                    pwd.classList.remove('is-invalid');
                }

                if(!form.checkValidity()) valid = false;

                if(!valid) {
                    e.preventDefault();
                    e.stopPropagation();
                    form.classList.add('was-validated');
                    // small shake on error
                    form.querySelector('.card')?.classList?.add('shake');
                    setTimeout(()=> form.querySelector('.card')?.classList?.remove('shake'), 400);
                }
            }, false);

            // button ripple effect
            btn.addEventListener('click', function(e){
                const rect = this.getBoundingClientRect();
                const ripple = document.createElement('span');
                const size = Math.max(rect.width, rect.height) * 1.6;
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.position = 'absolute';
                ripple.style.left = (e.clientX - rect.left - size/2) + 'px';
                ripple.style.top = (e.clientY - rect.top - size/2) + 'px';
                ripple.style.background = 'rgba(255,255,255,0.18)';
                ripple.style.borderRadius = '50%';
                ripple.style.transform = 'scale(0)';
                ripple.style.opacity = '1';
                ripple.style.transition = 'transform .6s ease, opacity .6s ease';
                this.appendChild(ripple);
                requestAnimationFrame(()=> {
                    ripple.style.transform = 'scale(1)';
                    ripple.style.opacity = '0';
                });
                setTimeout(()=> ripple.remove(), 700);
            });

            // subtle tilt based on mouse on card (desktop only)
            const card = document.querySelector('.animated-card');
            if(card && window.matchMedia('(hover: hover) and (pointer: fine)').matches){
                card.addEventListener('mousemove', (ev)=>{
                    const r = card.getBoundingClientRect();
                    const px = (ev.clientX - r.left) / r.width;
                    const py = (ev.clientY - r.top) / r.height;
                    const rotateY = (px - 0.5) * 6;
                    const rotateX = (0.5 - py) * 4;
                    card.style.transform = `translateY(-6px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
                });
                card.addEventListener('mouseleave', ()=> card.style.transform = '');
            }
        })();
    </script>







