
    <style>
        body, html {
            height: 100%;
            margin: 0;
            overflow: hidden;
            background: linear-gradient(-45deg, #ee0979, #ff6a00, #00c3ff, #ffff00, #ff00ff);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            font-family: 'Arial', sans-serif;
        }
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .particles {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            pointer-events: none;
        }

        .login-container {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 2;
        }

        .login-card {
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 0 0 40px rgba(255, 215, 0, 0.6);
            padding: 40px;
            width: 100%;
            max-width: 420px;
            color: white;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            text-shadow: 0 0 20px gold;
            color: gold;
            margin-bottom: 10px;
            animation: glow 2s ease-in-out infinite alternate;
        }

        .tagline {
            font-size: 1.2rem;
            margin-bottom: 30px;
            text-shadow: 0 0 10px #fff;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 10px;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: gold;
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.5);
            color: white;
        }

        .btn-login {
            background: linear-gradient(45deg, gold, #ffd700, orange);
            border: none;
            border-radius: 50px;
            padding: 12px;
            font-size: 1.3rem;
            font-weight: bold;
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.8);
            animation: pulse 2s infinite;
            transition: all 0.3s;
        }

        .btn-login:hover {
            transform: scale(1.05);
            box-shadow: 0 0 30px gold;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 20px rgba(255, 215, 0, 0.8); }
            50% { box-shadow: 0 0 40px rgba(255, 215, 0, 1); }
            100% { box-shadow: 0 0 20px rgba(255, 215, 0, 0.8); }
        }

        @keyframes glow {
            from { text-shadow: 0 0 10px gold; }
            to { text-shadow: 0 0 30px gold, 0 0 40px orange; }
        }

        .extra-text {
            margin-top: 20px;
            font-size: 1rem;
            animation: blink 1.5s infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        .form-control::placeholder {
            color: #ffffff !important;
            opacity: 1 !important;
        }

    </style>






    <canvas class="particles" id="particles"></canvas>

    <div class="login-container">
        <div class="login-card">
            <h1><i class="fas fa-coins me-2"></i> ROYAL CHAIN</h1>
            <p class="tagline">আজই জয়েন করুন – অসীম আয়ের সুযোগ অপেক্ষা করছে!</p>
            <form action="login_check" method="POST" >
                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-user"></i> ইউজারনেম বা ইমেইল</label>
                    <input type="text" class="form-control text-white" name="u_name" placeholder="আপনার আইডি দিন" required>
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-lock"></i> পাসওয়ার্ড</label>
                    <input type="password" class="form-control text-white" name="password" placeholder="সিক্রেট পাসওয়ার্ড" required>
                </div>
                <button type="submit" class="btn btn-login w-100">
                    <i class="fas fa-sign-in-alt"></i> লগইন করুন!
                </button>
                <div class="extra-text mt-3">
                    <i class="fas fa-gem"></i> নতুন? <a href="/register" style="color: gold; text-decoration: underline;">রেজিস্টার করুন</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Particles JS -->
    <script>
        const canvas = document.getElementById('particles');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        let particles = [];
        const numParticles = 100;

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 5 + 1;
                this.speedX = Math.random() * 3 - 1.5;
                this.speedY = Math.random() * 3 - 1.5;
                this.color = ['gold', '#ff00ff', '#00ffff', '#ff6a00'][Math.floor(Math.random() * 4)];
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                if (this.x > canvas.width || this.x < 0) this.speedX *= -1;
                if (this.y > canvas.height || this.y < 0) this.speedY *= -1;
            }
            draw() {
                ctx.fillStyle = this.color;
                ctx.shadowBlur = 20;
                ctx.shadowColor = this.color;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        function init() {
            particles = [];
            for (let i = 0; i < numParticles; i++) {
                particles.push(new Particle());
            }
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(animate);
        }

        init();
        animate();

        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            init();
        });
    </script>





