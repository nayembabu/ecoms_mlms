<!DOCTYPE html>
<html lang="bn">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>404 - পেইজ পাওয়া যায়নি</title>
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
                background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
                background-size: 400% 400%;
                animation: gradientShift 15s ease infinite;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: #fff;
                text-align: center;
                overflow: hidden;
            }

            @keyframes gradientShift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }

            .container {
                max-width: 700px;
                padding: 40px;
                animation: fadeIn 1.5s ease-out;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(30px); }
                to { opacity: 1; transform: translateY(0); }
            }

            h1.glitch {
                font-size: 140px;
                font-weight: 900;
                margin-bottom: 20px;
                position: relative;
                text-shadow: 0 0 20px rgba(255,255,255,0.5);
            }

            h1.glitch::before,
            h1.glitch::after {
                content: attr(data-text);
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                opacity: 0.8;
            }

            h1.glitch::before {
                animation: glitch1 2.5s infinite linear alternate-reverse;
                color: #00ffff;
                z-index: -1;
            }

            h1.glitch::after {
                animation: glitch2 3s infinite linear alternate-reverse;
                color: #ff00ff;
                z-index: -2;
            }

            @keyframes glitch1 {
                0%, 100% { clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%); transform: translate(0); }
                10% { clip-path: polygon(0 0, 100% 0, 100% 35%, 0 45%); transform: translate(-5px, -10px); }
                20% { clip-path: polygon(0 60%, 100% 60%, 100% 100%, 0 100%); transform: translate(5px, 10px); }
                30% { clip-path: polygon(0 0, 100% 0, 100% 15%, 0 35%); transform: translate(-3px, 5px); }
                40% { clip-path: polygon(0 80%, 100% 80%, 100% 100%, 0 100%); transform: translate(3px, -5px); }
                50% { clip-path: polygon(0 0, 100% 0, 100% 35%, 0 35%); transform: translate(0); }
            }

            @keyframes glitch2 {
                0%, 100% { clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%); transform: translate(0); }
                15% { clip-path: polygon(0 15%, 100% 15%, 100% 100%, 0 100%); transform: translate(8px, -8px); }
                25% { clip-path: polygon(0 85%, 100% 85%, 100% 100%, 0 100%); transform: translate(-8px, 8px); }
                35% { clip-path: polygon(0 0, 100% 0, 100% 60%, 0 60%); transform: translate(5px, 0); }
                50% { clip-path: polygon(0 40%, 100% 40%, 100% 100%, 0 100%); transform: translate(-5px, 0); }
            }

            p {
                font-size: 28px;
                margin-bottom: 20px;
                opacity: 0.95;
                animation: fadeIn 2s ease-out;
            }

            .subtitle {
                font-size: 20px;
                margin-bottom: 50px;
                opacity: 0.85;
                animation: fadeIn 2.5s ease-out;
            }

            a {
                display: inline-block;
                padding: 15px 40px;
                background: rgba(255, 255, 255, 0.15);
                color: #fff;
                text-decoration: none;
                border-radius: 50px;
                font-size: 20px;
                font-weight: 600;
                border: 2px solid rgba(255, 255, 255, 0.3);
                backdrop-filter: blur(10px);
                box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
                transition: all 0.4s ease;
            }

            a:hover {
                background: rgba(255, 255, 255, 0.3);
                transform: translateY(-5px) scale(1.05);
                box-shadow: 0 0 40px rgba(255, 255, 255, 0.5);
            }

            @media (max-width: 768px) {
                h1.glitch {
                    font-size: 90px;
                }
                p {
                    font-size: 22px;
                }
                .subtitle {
                    font-size: 18px;
                }
                a {
                    padding: 12px 30px;
                    font-size: 18px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class="glitch" data-text="404">404</h1>
            <p>ওহো! পেইজটি পাওয়া যায়নি 😱</p>
            <div class="subtitle">আপনি যে পেইজ খুঁজছেন, সেটা হয়তো মহাকাশে হারিয়ে গেছে অথবা ঠিকানা ভুল। চিন্তা নেই!</div>
            <a href="/">হোম পেইজে ফিরে যান</a>
        </div>
    </body>
</html>