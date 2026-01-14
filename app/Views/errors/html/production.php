<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - সার্ভারে সমস্যা</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
            text-align: center;
            overflow: hidden;
            position: relative;
        }

        /* স্টার্স অ্যানিমেশন */
        .stars {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
        }

        .star {
            position: absolute;
            background: #fff;
            border-radius: 50%;
            opacity: 0.8;
            animation: twinkle 5s infinite ease-in-out;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.4; }
            50% { opacity: 1; }
        }

        .container {
            max-width: 600px;
            padding: 50px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
            animation: floatIn 2s ease-out;
            position: relative;
            z-index: 10;
        }

        @keyframes floatIn {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .cloud {
            width: 220px;
            height: 180px;
            margin: 0 auto 40px;
            animation: float 6s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        h1 {
            font-size: 100px;
            font-weight: 700;
            color: #ff6b6b;
            margin-bottom: 10px;
            text-shadow: 0 0 20px rgba(255, 107, 107, 0.5);
        }

        p.title {
            font-size: 32px;
            margin-bottom: 20px;
            color: #e0e0e0;
        }

        .subtitle {
            font-size: 20px;
            margin-bottom: 40px;
            color: #bdc3c7;
            line-height: 1.6;
        }

        a {
            display: inline-block;
            padding: 15px 40px;
            background: #6c5ce7;
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            font-size: 20px;
            font-weight: 600;
            transition: all 0.4s ease;
            box-shadow: 0 5px 20px rgba(108, 92, 231, 0.4);
        }

        a:hover {
            background: #5a4fcf;
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(108, 92, 231, 0.6);
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 70px;
            }
            p.title {
                font-size: 26px;
            }
            .subtitle {
                font-size: 18px;
            }
            .cloud {
                width: 180px;
                height: 140px;
            }
            .container {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <!-- স্টার্স -->
    <div class="stars">
        <div class="star" style="width:3px;height:3px;top:10%;left:20%;animation-delay:0s;"></div>
        <div class="star" style="width:2px;height:2px;top:20%;left:70%;animation-delay:1s;"></div>
        <div class="star" style="width:4px;height:4px;top:40%;left:40%;animation-delay:2s;"></div>
        <div class="star" style="width:2px;height:2px;top:60%;left:80%;animation-delay:3s;"></div>
        <div class="star" style="width:3px;height:3px;top:80%;left:30%;animation-delay:4s;"></div>
        <div class="star" style="width:4px;height:4px;top:30%;left:90%;animation-delay:1.5s;"></div>
        <div class="star" style="width:2px;height:2px;top:50%;left:10%;animation-delay:2.5s;"></div>
    </div>

    <div class="container">
        <!-- স্যাড ক্লাউড SVG -->
        <svg class="cloud" viewBox="0 0 220 180" xmlns="http://www.w3.org/2000/svg">
            <ellipse cx="110" cy="90" rx="100" ry="50" fill="#dfe6e9" opacity="0.9"/>
            <ellipse cx="70" cy="70" rx="40" ry="35" fill="#b2bec3"/>
            <ellipse cx="150" cy="70" rx="45" ry="40" fill="#b2bec3"/>
            <ellipse cx="110" cy="60" rx="50" ry="40" fill="#dfe6e9"/>
            <!-- স্যাড ফেস -->
            <circle cx="80" cy="80" r="12" fill="#636e72"/>
            <circle cx="140" cy="80" r="12" fill="#636e72"/>
            <path d="M70 120 Q110 150 150 120" stroke="#636e72" stroke-width="8" fill="none" stroke-linecap="round"/>
        </svg>

        <h1>500</h1>
        <p class="title">দুঃখিত! সার্ভারে কিছু গণ্ডগোল 😔</p>
        <div class="subtitle">আমাদের সার্ভারে অভ্যন্তরীণ সমস্যা হয়েছে।<br>আমরা খুব শিগগিরই ঠিক করে ফেলব। কিছুক্ষণ পর আবার চেষ্টা করুন।</div>
    </div>
</body>
</html>