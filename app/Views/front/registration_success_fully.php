<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            font-family: 'Poppins', sans-serif;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .success-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            padding: 40px;
            text-align: center;
            max-width: 500px;
            width: 90%;
            position: relative;
            overflow: hidden;
        }

        .check-icon {
            font-size: 100px;
            color: #28a745;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .rainbow-text {
            font-size: 2.5rem;
            font-weight: bold;
            background: linear-gradient(to right, #ff0000, #ff7f00, #ffff00, #00ff00, #0000ff, #4b0082, #9400d3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: rainbow 8s linear infinite;
        }

        @keyframes rainbow {
            0% { background-position: 0%; }
            100% { background-position: 100%; }
        }

        #timer {
            font-size: 6rem;
            font-weight: 900;
            margin: 20px 0;
        }

        /* Confetti particles */
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #f00;
            opacity: 0.8;
            animation: fall linear infinite;
        }

        @keyframes fall {
            0% { transform: translateY(-100vh) rotate(0deg); opacity: 1; }
            100% { transform: translateY(100vh) rotate(360deg); opacity: 0; }
        }

        .confetti:nth-child(1) { left: 10%; animation-duration: 4s; background: #ff0; }
        .confetti:nth-child(2) { left: 20%; animation-duration: 5s; background: #0f0; }
        .confetti:nth-child(3) { left: 30%; animation-duration: 3.5s; background: #0ff; }
        .confetti:nth-child(4) { left: 40%; animation-duration: 4.5s; background: #f0f; }
        .confetti:nth-child(5) { left: 50%; animation-duration: 6s; background: #ff0; }
        .confetti:nth-child(6) { left: 60%; animation-duration: 4s; background: #00f; }
        .confetti:nth-child(7) { left: 70%; animation-duration: 5.5s; background: #f00; }
        .confetti:nth-child(8) { left: 80%; animation-duration: 3s; background: #0f0; }
        .confetti:nth-child(9) { left: 90%; animation-duration: 5s; background: #ff0; }
    </style>
</head>
<body>

    <div class="success-card">
        <!-- Confetti particles -->
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>

        <i class="bi bi-check-circle-fill check-icon"></i>
        <h1 class="rainbow-text mt-4">Registration Successful!</h1>
        <p class="lead mt-3 text-dark">অভিনন্দন! আপনার অ্যাকাউন্ট সফলভাবে তৈরি হয়েছে।</p>

        <!-- Countdown Timer -->
        <h2 id="timer" class="rainbow-text">5</h2>
        <p class="lead text-dark">সেকেন্ডের মধ্যে লগইন পেজে রিডাইরেক্ট করা হচ্ছে...</p>

        <p class="text-muted">অপেক্ষা করতে না চাইলে নিচের বাটনে ক্লিক করুন:</p>
        
        <div class="mt-4">
            <a href="login" class="btn btn-primary btn-lg mx-2 shadow">লগইন করুন</a>
            <a href="" class="btn btn-outline-success btn-lg mx-2 shadow">হোমে ফিরুন</a>
        </div>
    </div>

    <!-- Countdown Script -->
    <script>
        let timeLeft = 5;
        const timerEl = document.getElementById('timer');

        const countdown = setInterval(() => {
            timerEl.textContent = timeLeft;
            timeLeft--;

            if (timeLeft < 0) {
                clearInterval(countdown);
                window.location.href = 'login'; // আপনার লগইন পেজের URL এখানে দিন
            }
        }, 1000);
    </script>
    <script>
        fbq('track', 'Lead');
    </script>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>