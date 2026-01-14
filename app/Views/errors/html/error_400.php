<!DOCTYPE html>
<html lang="bn">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>400 - কিছু গড়বড় হয়ে গেছে</title>
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
                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: #333;
                text-align: center;
            }

            .container {
                max-width: 600px;
                padding: 40px;
                background: rgba(255, 255, 255, 0.7);
                border-radius: 20px;
                backdrop-filter: blur(10px);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                animation: fadeIn 1.5s ease-out;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .robot {
                width: 200px;
                height: 200px;
                margin: 0 auto 30px;
                animation: confused 4s infinite ease-in-out;
            }

            @keyframes confused {
                0%, 100% { transform: rotate(0deg); }
                25% { transform: rotate(10deg); }
                75% { transform: rotate(-10deg); }
            }

            h1 {
                font-size: 100px;
                font-weight: 700;
                color: #e74c3c;
                margin-bottom: 10px;
            }

            p.title {
                font-size: 32px;
                margin-bottom: 20px;
                color: #2c3e50;
            }

            .subtitle {
                font-size: 20px;
                margin-bottom: 40px;
                color: #7f8c8d;
                line-height: 1.6;
            }

            a {
                display: inline-block;
                padding: 15px 40px;
                background: #3498db;
                color: #fff;
                text-decoration: none;
                border-radius: 50px;
                font-size: 20px;
                font-weight: 600;
                transition: all 0.3s ease;
                box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
            }

            a:hover {
                background: #2980b9;
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(52, 152, 219, 0.4);
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
                .robot {
                    width: 150px;
                    height: 150px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <svg class="robot" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <!-- কনফিউজড রোবট -->
                <circle cx="100" cy="100" r="80" fill="#ecf0f1" stroke="#95a5a6" stroke-width="4"/>
                <circle cx="70" cy="80" r="20" fill="#3498db"/>
                <circle cx="130" cy="80" r="20" fill="#3498db"/>
                <circle cx="75" cy="75" r="8" fill="#fff"/>
                <circle cx="135" cy="75" r="8" fill="#fff"/>
                <path d="M70 120 Q100 150 130 120" stroke="#e74c3c" stroke-width="6" fill="none" stroke-linecap="round"/>
                <rect x="50" y="160" width="20" height="30" rx="10" fill="#95a5a6"/>
                <rect x="130" y="160" width="20" height="30" rx="10" fill="#95a5a6"/>
                <rect x="80" y="40" width="40" height="20" rx="10" fill="#f39c12"/>
            </svg>
            <h1>400</h1>
            <p class="title">ওপস! কিছু গড়বড় হয়ে গেছে 😅</p>
            <div class="subtitle">আমরা আপনার অনুরোধ ঠিকমতো বুঝতে পারিনি।<br>দয়া করে পেইজ রিফ্রেশ করুন বা আবার চেষ্টা করুন।</div>
            <a href="/">হোম পেইজে ফিরে যান</a>
        </div>
    </body>
</html>