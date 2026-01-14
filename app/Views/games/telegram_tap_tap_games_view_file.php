<!DOCTYPE html>
<html lang="bn">
    <head>
        <base href="<?= base_url(); ?>" target="">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <link rel="icon" href="inc/front/assets/imgs/bg_icons.png" type="image/x-icon">
        <title>Royal Chain - Online Banking & Finance</title>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                -webkit-tap-highlight-color: transparent;
                user-select: none;
            }

            body {
                font-family: 'Inter', sans-serif;
                background: linear-gradient(180deg, #2424da 0%, #1a1a2e 50%, #16213e 100%);
                min-height: 100vh;
                color: #ffffff;
                overflow-x: hidden;
            }

            .container {
                max-width: 430px;
                margin: 0 auto;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                position: relative;
            }

            /* Top Stats */
            .top-stats {
                display: flex;
                justify-content: space-between;
                padding: 16px 20px;
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(10px);
            }

            .stat-item {
                text-align: center;
            }

            .stat-label {
                font-size: 10px;
                color: rgba(255, 255, 255, 0.5);
                text-transform: uppercase;
                letter-spacing: 1px;
            }

            .stat-value {
                font-size: 18px;
                font-weight: 700;
                color: #f59e0b;
            }

            /* Score Display */
            .score-section {
                text-align: center;
                padding: 20px 20px;
            }

            .score-label {
                font-size: 12px;
                color: rgba(255, 255, 255, 0.6);
                margin-bottom: 8px;
            }

            .score-value {
                font-size: 48px;
                font-weight: 800;
                background: linear-gradient(135deg, #f59e0b, #fbbf24, #f59e0b);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                text-shadow: 0 0 40px rgba(245, 158, 11, 0.3);
            }

            .level-badge {
                display: inline-block;
                margin-top: 12px;
                padding: 6px 16px;
                background: linear-gradient(135deg, rgba(245, 158, 11, 0.2), rgba(251, 191, 36, 0.1));
                border: 1px solid rgba(245, 158, 11, 0.3);
                border-radius: 20px;
                font-size: 12px;
                color: #fbbf24;
            }

            /* Sound Toggle */
            .sound-toggle {
                position: absolute;
                top: 16px;
                right: 16px;
                width: 40px;
                height: 40px;
                background: rgba(255, 255, 255, 0.1);
                border: none;
                border-radius: 50%;
                color: #fbbf24;
                font-size: 20px;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.2s;
                z-index: 100;
            }

            .sound-toggle:hover {
                background: rgba(255, 255, 255, 0.2);
            }

            .sound-toggle.muted {
                color: rgba(255, 255, 255, 0.3);
            }

            /* Coin Area */
            .coin-area {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                min-height: 280px;
            }

            .coin-glow {
                position: absolute;
                width: 300px;
                height: 300px;
                background: radial-gradient(circle, rgba(245, 158, 11, 0.15) 0%, transparent 70%);
                border-radius: 50%;
                animation: pulse-glow 2s ease-in-out infinite;
            }

            @keyframes pulse-glow {
                0%, 100% { transform: scale(1); opacity: 0.5; }
                50% { transform: scale(1.1); opacity: 0.8; }
            }

            .coin {
                width: 200px;
                height: 200px;
                background: linear-gradient(145deg, #fbbf24 0%, #f59e0b 50%, #d97706 100%);
                border-radius: 50%;
                cursor: pointer;
                position: relative;
                box-shadow: 
                    0 10px 40px rgba(245, 158, 11, 0.4),
                    0 0 60px rgba(245, 158, 11, 0.2),
                    inset 0 -8px 20px rgba(0, 0, 0, 0.3),
                    inset 0 8px 20px rgba(255, 255, 255, 0.3);
                transition: transform 0.1s ease;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .coin:active {
                transform: scale(0.95);
            }

            .coin.tapped {
                animation: coin-tap 0.15s ease;
            }

            @keyframes coin-tap {
                0% { transform: scale(1); }
                50% { transform: scale(0.92); }
                100% { transform: scale(1); }
            }

            .coin-inner {
                width: 200px;
                height: 200px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: inset 0 4px 10px rgba(255, 255, 255, 0.4);
            }


            /* Floating points */
            .floating-point {
                position: absolute;
                font-size: 24px;
                font-weight: 700;
                color: #fbbf24;
                pointer-events: none;
                animation: float-up 0.8s ease-out forwards;
                text-shadow: 0 0 10px rgba(245, 158, 11, 0.5);
            }

            @keyframes float-up {
                0% { opacity: 1; transform: translateY(0) scale(1); }
                100% { opacity: 0; transform: translateY(-80px) scale(1.2); }
            }

            /* Combo indicator */
            .combo-indicator {
                position: absolute;
                top: 50%;
                right: -50px;
                transform: translateY(-50%);
                padding: 6px 10px;
                background: linear-gradient(135deg, #ef4444, #f97316);
                border-radius: 8px;
                font-size: 14px;
                font-weight: 700;
                color: white;
                opacity: 0;
                transition: opacity 0.3s;
            }

            .combo-indicator.visible {
                opacity: 1;
                animation: combo-pop 0.3s ease;
            }

            @keyframes combo-pop {
                0% { transform: translateY(-50%) scale(0.5); }
                50% { transform: translateY(-50%) scale(1.2); }
                100% { transform: translateY(-50%) scale(1); }
            }

            /* Energy Bar */
            .energy-section {
                padding: 15px 20px;
            }

            .energy-header {
                display: flex;
                justify-content: space-between;
                margin-bottom: 8px;
            }

            .energy-label {
                font-size: 12px;
                color: rgba(255, 255, 255, 0.6);
                display: flex;
                align-items: center;
                gap: 6px;
            }

            .energy-icon { color: #fbbf24; }

            .energy-value {
                font-size: 12px;
                color: #fbbf24;
                font-weight: 600;
            }

            .energy-bar-bg {
                height: 12px;
                background: rgba(255, 255, 255, 0.1);
                border-radius: 6px;
                overflow: hidden;
            }

            .energy-bar-fill {
                height: 100%;
                background: linear-gradient(90deg, #f59e0b, #fbbf24);
                border-radius: 6px;
                transition: width 0.3s ease;
                box-shadow: 0 0 10px rgba(245, 158, 11, 0.5);
            }

            /* Leaderboard */
            .leaderboard-section {
                padding: 15px 20px;
                max-height: 200px;
                overflow-y: auto;
            }

            .leaderboard-title {
                font-size: 14px;
                font-weight: 700;
                color: #fbbf24;
                margin-bottom: 12px;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .leaderboard-list {
                display: flex;
                flex-direction: column;
                gap: 8px;
            }

            .leaderboard-item {
                display: flex;
                align-items: center;
                padding: 10px 12px;
                background: rgba(255, 255, 255, 0.05);
                border-radius: 10px;
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            .leaderboard-item.current {
                background: rgba(245, 158, 11, 0.15);
                border-color: rgba(245, 158, 11, 0.3);
            }

            .rank {
                width: 28px;
                height: 28px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 700;
                font-size: 12px;
                border-radius: 50%;
                margin-right: 12px;
            }

            .rank-1 { background: linear-gradient(135deg, #fbbf24, #f59e0b); color: #000; }
            .rank-2 { background: linear-gradient(135deg, #9ca3af, #6b7280); color: #000; }
            .rank-3 { background: linear-gradient(135deg, #cd7f32, #a0522d); color: #fff; }
            .rank-other { background: rgba(255, 255, 255, 0.1); color: #fff; }

            .player-name {
                flex: 1;
                font-size: 13px;
                font-weight: 600;
            }

            .player-score {
                font-size: 13px;
                font-weight: 700;
                color: #fbbf24;
            }

            /* Name Input Modal */
            .modal-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.8);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 1000;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s;
            }

            .modal-overlay.visible {
                opacity: 1;
                visibility: visible;
            }

            .modal {
                background: linear-gradient(180deg, #1a1a2e, #16213e);
                padding: 30px;
                border-radius: 20px;
                border: 1px solid rgba(245, 158, 11, 0.3);
                text-align: center;
                max-width: 300px;
                width: 90%;
                transform: scale(0.9);
                transition: transform 0.3s;
            }

            .modal-overlay.visible .modal {
                transform: scale(1);
            }

            .modal-title {
                font-size: 20px;
                font-weight: 700;
                color: #fbbf24;
                margin-bottom: 8px;
            }

            .modal-subtitle {
                font-size: 13px;
                color: rgba(255, 255, 255, 0.6);
                margin-bottom: 20px;
            }

            .modal-input {
                width: 100%;
                padding: 12px 16px;
                background: rgba(255, 255, 255, 0.1);
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 10px;
                color: #fff;
                font-size: 16px;
                margin-bottom: 16px;
                outline: none;
            }

            .modal-input:focus {
                border-color: #fbbf24;
            }

            .modal-btn {
                width: 100%;
                padding: 12px;
                background: linear-gradient(135deg, #f59e0b, #fbbf24);
                border: none;
                border-radius: 10px;
                color: #000;
                font-size: 16px;
                font-weight: 700;
                cursor: pointer;
                transition: transform 0.2s;
            }

            .modal-btn:hover {
                transform: scale(1.02);
            }

            /* Bottom Navigation */
            .bottom-nav {
                display: flex;
                justify-content: space-around;
                padding: 12px 20px 20px;
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(10px);
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }

            .nav-item {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 4px;
                color: rgba(255, 255, 255, 0.5);
                font-size: 10px;
                cursor: pointer;
                transition: color 0.2s;
            }

            .nav-item.active { color: #fbbf24; }
            .nav-item:hover { color: #fbbf24; }
            .nav-icon { width: 22px; height: 22px; }
            .coin-disabled { pointer-events: none; opacity: 0.6; filter: grayscale(1);}
            .game-bg::before{
                content:'';
                position:absolute;
                inset:0;
                background:rgba(0,0,0,0.35);
                border-radius:10px;
                z-index:-1;
            }
            .coin-image{
                width:100%;
                height:100%;
                object-fit:contain;
                border-radius:50%;
                pointer-events:none; /* tap issue হবে না */
            }

                /* Bottom Sheet (Earn Modal) */
            .sheet-overlay{
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.65);
                z-index: 1200;
                opacity: 0;
                visibility: hidden;
                transition: opacity .25s ease, visibility .25s ease;
            }

            .sheet-overlay.show{
                opacity: 1;
                visibility: visible;
            }

            .sheet{
                position: absolute;
                left: 50%;
                bottom: 0;
                transform: translateX(-50%) translateY(110%);
                width: min(430px, 100%);
                background: linear-gradient(180deg, #1a1a2e, #16213e);
                border-top-left-radius: 18px;
                border-top-right-radius: 18px;
                border: 1px solid rgba(245, 158, 11, 0.25);
                box-shadow: 0 -20px 60px rgba(0,0,0,0.6);
                transition: transform .28s ease;
                padding: 12px 16px 18px;
            }

            .sheet-overlay.show .sheet{
                transform: translateX(-50%) translateY(0);
            }

            .sheet-handle{
                width: 46px;
                height: 5px;
                border-radius: 999px;
                margin: 6px auto 12px;
                background: rgba(255,255,255,0.25);
            }

            .sheet-header{
                display:flex;
                align-items:center;
                justify-content:space-between;
                gap: 10px;
                margin-bottom: 12px;
            }

            .sheet-title{
                font-size: 16px;
                font-weight: 800;
                color: #fbbf24;
            }

            .sheet-close{
                width: 36px;
                height: 36px;
                border-radius: 10px;
                border: 1px solid rgba(255,255,255,0.15);
                background: rgba(255,255,255,0.08);
                color: rgba(255,255,255,0.85);
                cursor: pointer;
            }

            .sheet-body{
                display:flex;
                flex-direction:column;
                gap: 10px;
                max-height: 58vh;
                overflow:auto;
                padding-bottom: 6px;
            }

            .sheet-card{
                background: rgba(255,255,255,0.06);
                border: 1px solid rgba(255,255,255,0.10);
                border-radius: 14px;
                padding: 12px;
            }

            .sheet-card-title{
                font-size: 14px;
                font-weight: 700;
                margin-bottom: 4px;
            }

            .sheet-card-sub{
                font-size: 12px;
                color: rgba(255,255,255,0.65);
                margin-bottom: 10px;
            }

            .sheet-btn{
                width: 100%;
                padding: 10px 12px;
                border: none;
                border-radius: 12px;
                font-weight: 800;
                cursor: pointer;
                background: linear-gradient(135deg, #f59e0b, #fbbf24);
                color: #000;
            }
.sheet-card-balance{
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
}

.balance-left{
    flex: 1;
}

.balance-right{
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 6px;
}

.coin-balance{
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: 18px;
    font-weight: 800;
    color: #fbbf24;
    text-shadow: 0 0 10px rgba(245,158,11,.6);
    white-space: nowrap;
}

.withdraw-btn{
    padding: 14px 14px;
    font-size: 12px;
    font-weight: 700;
    border-radius: 999px;
    border: none;
    cursor: pointer;
    background: linear-gradient(135deg, #10b981, #22c55e);
    color: #000;
    box-shadow: 0 4px 12px rgba(16,185,129,.4);
    transition: transform .15s ease, box-shadow .15s ease;
}

.withdraw-btn:active{
    transform: scale(.95);
    box-shadow: 0 2px 6px rgba(16,185,129,.4);
}

.withdraw-btn:disabled{
    opacity: .5;
    cursor: not-allowed;
}


        </style>
    </head>
    <body>
        <?php if (date('H') < 4){ ?>
            <div class="container game-bg " style=" border:1px solid #444; border-radius:10px; box-shadow:0 0 20px rgba(0,0,0,0.5); background:url(<?= base_url(); ?>/inc/img/games_view/tap_bg/night.jpeg) center center / cover no-repeat; min-height:100vh; ">
        <?php }elseif(date('H') < 10) { ?>
            <div class="container game-bg " style=" border:1px solid #444; border-radius:10px; box-shadow:0 0 20px rgba(0,0,0,0.5); background:url(<?= base_url(); ?>/inc/img/games_view/tap_bg/morning.jpeg) center center / cover no-repeat; min-height:100vh; ">
        <?php } elseif(date('H') < 16) { ?>
            <div class="container game-bg " style=" border:1px solid #444; border-radius:10px; box-shadow:0 0 20px rgba(0,0,0,0.5); background:url(<?= base_url(); ?>/inc/img/games_view/tap_bg/after12.jpeg) center center / cover no-repeat; min-height:100vh; ">
        <?php } elseif(date('H') < 19) { ?>
            <div class="container game-bg " style=" border:1px solid #444; border-radius:10px; box-shadow:0 0 20px rgba(0,0,0,0.5); background:url(<?= base_url(); ?>/inc/img/games_view/tap_bg/evening.jpeg) center center / cover no-repeat; min-height:100vh; ">
        <?php } else { ?>
            <div class="container game-bg " style=" border:1px solid #444; border-radius:10px; box-shadow:0 0 20px rgba(0,0,0,0.5); background:url(<?= base_url(); ?>/inc/img/games_view/tap_bg/night.jpeg) center center / cover no-repeat; min-height:100vh; ">
        <?php } ?>
        <!-- <div class="container game-bg " style=" border:1px solid #444; border-radius:10px; box-shadow:0 0 20px rgba(0,0,0,0.5); background:url(<?= base_url(); ?>/inc/img/games_view/tap_tap_bg.png) center center / cover no-repeat; min-height:100vh; "> -->
            <!-- Sound Toggle -->
            <button class="sound-toggle" id="soundToggle">🔊</button>

            <!-- Top Stats -->
            <div class="top-stats">
                <div class="stat-item">
                    <div class="stat-label">Total Taps</div>
                    <div class="stat-value" id="totalTaps">0</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Tap Rate</div>
                    <div class="stat-value" id="tapRate">0/s</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Streak</div>
                    <div class="stat-value" id="streak">🔥 0</div>
                </div>
            </div>

            <!-- Score Display -->
            <div class="score-section">
                <div class="score-label">YOUR COINS</div>
                <div class="score-value" id="score">0</div>
                <div class="level-badge" id="levelBadge">Level 1 • Bronze</div>
            </div>

            <div class="block_info_text" style="text-align:center; font-size:20px; color:#fff; margin-bottom:10px;"></div>

            <!-- Coin Area -->
            <div class="coin-area">
                <div class="coin-glow"></div>
                <!-- coin-disabled -->
                <div class="coin " id="coin" >
                    <div class="coin-inner">
                        <span class="coin-symbol">
                            <img src="<?= base_url(); ?>inc/img/games_view/tap_tap_coin.jpg" class="coin-image" alt="Royal Chain Coin">
                        </span>
                    </div>
                    <div class="combo-indicator" id="comboIndicator">x2</div>
                </div>
            </div>

            <!-- Energy Bar -->
            <div class="energy-section">
                <div class="energy-header">
                    <span class="energy-label"><span class="energy-icon">⚡</span> Energy</span>
                    <span class="energy-value" id="energyText" style="background-color: #000; padding: 5px 10px; border-radius: 5px;">0 / 1000</span>
                </div>
                <div class="energy-bar-bg">
                    <div class="energy-bar-fill" id="energyBar" style="width: 100%;"></div>
                </div>
            </div>

            <!-- Leaderboard -->
            <div class="leaderboard-section">
                <div class="leaderboard-title">🏆 Leaderboard</div>
                <div class="leaderboard-list" id="leaderboardList"></div>
            </div>

            <!-- Bottom Navigation -->
            <div class="bottom-nav">
                <div class="nav-item active">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span>Home</span>
                </div>
                <!--
                 <div class="nav-item">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    <span>Stats</span>
                </div>
                <div class="nav-item">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span>Friends</span>
                </div>
                -->
                <div class="nav-item" id="earnBtn">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Withdraw</span>
                </div>
                <div class="nav-item">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    <span>Boost</span>
                </div>
                <a class="nav-item" href="<?= base_url('user/dashboard'); ?>" style="text-decoration:none;">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13h8V3H3v10zm10 8h8V3h-8v18zM3 21h8v-6H3v6z"/></svg>
                    <span>Dashboard</span>
                </a>
            </div>
        </div>

        <!-- Earn Bottom Sheet Modal -->
        <div class="sheet-overlay" id="earnSheet">
            <div class="sheet">
                <div class="sheet-handle"></div>

                <div class="sheet-header">
                    <div class="sheet-title">💰 Earn Coins</div>
                    <button class="sheet-close" id="earnSheetClose" aria-label="Close">✕</button>
                </div>

                <div class="sheet-body">
                    <div class="sheet-card sheet-card-balance">
                        <div class="balance-left">
                            <div class="sheet-card-title">Total Earn Coin</div>
                            <div class="sheet-card-sub">Withdraw coin and add balance in wallet</div>
                        </div>

                        <div class="balance-right">
                            <span class="coin-icon">🪙</span>
                            <span class="coin-amount" id="totalEarnCoin">0</span>
                        </div>
                    </div>
                    <button class="withdraw-btn" id="withdrawBtn">Withdraw</button>
                </div>


                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {

                // Audio Context for Sound Effects
                let audioContext = null;
                let soundEnabled = true;

                function initAudio() {
                    if (!audioContext) {
                        audioContext = new (window.AudioContext || window.webkitAudioContext)();
                    }
                }

                function playTapSound() {
                    if (!soundEnabled || !audioContext) return;

                    const oscillator = audioContext.createOscillator();
                    const gainNode = audioContext.createGain();

                    oscillator.connect(gainNode);
                    gainNode.connect(audioContext.destination);

                    oscillator.frequency.setValueAtTime(800 + Math.random() * 200, audioContext.currentTime);
                    oscillator.type = 'sine';

                    gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
                    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.1);

                    oscillator.start(audioContext.currentTime);
                    oscillator.stop(audioContext.currentTime + 0.1);
                }

                function playComboSound() {
                    if (!soundEnabled || !audioContext) return;

                    const oscillator = audioContext.createOscillator();
                    const gainNode = audioContext.createGain();

                    oscillator.connect(gainNode);
                    gainNode.connect(audioContext.destination);

                    oscillator.frequency.setValueAtTime(523, audioContext.currentTime);
                    oscillator.frequency.setValueAtTime(659, audioContext.currentTime + 0.1);
                    oscillator.frequency.setValueAtTime(784, audioContext.currentTime + 0.2);
                    oscillator.type = 'sine';

                    gainNode.gain.setValueAtTime(0.4, audioContext.currentTime);
                    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.3);

                    oscillator.start(audioContext.currentTime);
                    oscillator.stop(audioContext.currentTime + 0.3);
                }

                function playLevelUpSound() {
                    if (!soundEnabled || !audioContext) return;

                    [523, 659, 784, 1047].forEach((freq, i) => {
                        const oscillator = audioContext.createOscillator();
                        const gainNode = audioContext.createGain();

                        oscillator.connect(gainNode);
                        gainNode.connect(audioContext.destination);

                        oscillator.frequency.setValueAtTime(freq, audioContext.currentTime + i * 0.1);
                        oscillator.type = 'sine';

                        gainNode.gain.setValueAtTime(0.3, audioContext.currentTime + i * 0.1);
                        gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + i * 0.1 + 0.15);

                        oscillator.start(audioContext.currentTime + i * 0.1);
                        oscillator.stop(audioContext.currentTime + i * 0.1 + 0.15);
                    });
                }

                // Sound Toggle
                $('#soundToggle').on('click', function() {
                    soundEnabled = !soundEnabled;
                    $(this).text(soundEnabled ? '🔊' : '🔇').toggleClass('muted', !soundEnabled);
                });

                // Game State
                let playerName = '<?= $my_info->user_full_name; ?>';
                let score = parseInt('<?= $current_coin_balance; ?>') || 0;


                const MAX_ENERGY = '<?= $user_tap_tap_info->boost_energy_size; ?>';
                const ENERGY_REGEN_RATE = 1;
                let totalTaps = parseInt(<?= $user_taps_add; ?>) || 0;
                let tapRate = 0;
                let streak = 0;
                let lastTapTime = 0;
                let tapsInLastSecond = [];
                let previousLevel = 1;
                let max_energy_set = Math.min(MAX_ENERGY, Math.max(0, parseInt(((Math.floor(Date.now() / 1000) - parseInt(<?= $user_tap_tap_info->time_start; ?>))) / 5)) - totalTaps) || 100;
                const now_time = Math.floor(Date.now() / 1000);

                let energy = Math.min(MAX_ENERGY, Math.max(0, parseInt(((Math.floor(Date.now() / 1000) - parseInt(<?= $user_tap_tap_info->time_start; ?>))) / 5)) - totalTaps) || 100;

                if (energy < MAX_ENERGY) {
                    energy = Math.min(MAX_ENERGY, energy + ENERGY_REGEN_RATE);
                    localStorage.setItem('nowEnergy', energy);
                    updateUI();
                }

                // function get_last_energy(max_energy_set, now_time) {
                //     $.ajax({
                //         url: "<?= base_url('games/lastCoinAdd'); ?>",
                //         type: "GET",
                //         dataType: "json",
                //         success: function (res) {
                //             if (res.status === 'success') {
                //                 let las_coin = parseInt(res.user_last_add_coin.now_energy_label);
                //                 let now_time_int = now_time - parseInt(res.user_last_add_coin.now_energy_label);
                //                 energy = las_coin + (now_time_int / 5);
                //             } else {
                //                 console.log("No data");
                //             }
                //         },
                //         error: function (xhr, status, error) {
                //             console.error("API Error:", error);
                //         }
                //     });
                // }

                let tap_rate_s = parseInt('<?= intval($user_tap_tap_info->boost_click_s); ?>') || 1;

                const levels = <?= json_encode(
                                    array_map(function($l){
                                        return [
                                            'name' => $l->level_name,
                                            'minScore' => (int)$l->from_balance
                                        ];
                                    }, $tap_tap_game_lavels),
                                    JSON_UNESCAPED_UNICODE
                                ); ?>;

                // Show name modal if no name
                if (!playerName) {
                    $('#nameModal').addClass('visible');
                }

                $('#startGameBtn').on('click', function() {
                    const name = $('#playerNameInput').val().trim();
                    if (name) {
                        playerName = name;
                        localStorage.setItem('playerName', name);
                        $('#nameModal').removeClass('visible');
                        initAudio();
                        updateLeaderboard();
                    }
                });

                $('#playerNameInput').on('keypress', function(e) {
                    if (e.which === 13) $('#startGameBtn').click();
                });

                // Get current level
                function getCurrentLevel() {
                    for (let i = levels.length - 1; i >= 0; i--) {
                        if (score >= levels[i].minScore) return i + 1;
                    }
                    return 1;
                }

                function getLevelName() {
                    return levels[getCurrentLevel() - 1].name;
                }

                function getComboMultiplier() {
                    if (tapRate >= 8) return tap_rate_s+3;
                    if (tapRate >= 5) return tap_rate_s+2;
                    return tap_rate_s;
                }

                // Leaderboard functions
                function getLeaderboard() {
                    return JSON.parse(localStorage.getItem('leaderboard')) || [];
                }

                function updateLeaderboard() {
                    let leaderboard = getLeaderboard();

                    // Update or add current player
                    const existingIndex = leaderboard.findIndex(p => p.name === playerName);
                    if (existingIndex >= 0) {
                        leaderboard[existingIndex].score = Math.max(leaderboard[existingIndex].score, score);
                    } else if (playerName) {
                        leaderboard.push({ name: playerName, score: score });
                    }

                    // Sort by score
                    leaderboard.sort((a, b) => b.score - a.score);

                    // Keep top 10
                    leaderboard = leaderboard.slice(0, 10);

                    localStorage.setItem('leaderboard', JSON.stringify(leaderboard));
                    renderLeaderboard(leaderboard);
                }

                function renderLeaderboard(leaderboard) {
                    let html = '';
                    leaderboard.forEach((player, index) => {
                        const rankClass = index === 0 ? 'rank-1' : index === 1 ? 'rank-2' : index === 2 ? 'rank-3' : 'rank-other';
                        const isCurrent = player.name === playerName ? 'current' : '';
                        html += `
                            <div class="leaderboard-item ${isCurrent}">
                                <div class="rank ${rankClass}">${index + 1}</div>
                                <div class="player-name">${player.name}</div>
                                <div class="player-score">${player.score.toLocaleString()}</div>
                            </div>
                        `;
                    });
                    $('#leaderboardList').html(html);
                }

                function updateUI() {
                    $('#score').text(score.toLocaleString());
                    $('#totalTaps').text(totalTaps.toLocaleString());
                    $('#tapRate').text(tapRate + '/s');
                    $('#streak').text('🔥 ' + streak);
                    $('#levelBadge').text('Level ' + getCurrentLevel() + ' • ' + getLevelName());
                    $('#energyText').text(energy + ' / ' + MAX_ENERGY);
                    $('#energyBar').css('width', (energy / MAX_ENERGY * 100) + '%');
                    $('#totalEarnCoin').text(score.toLocaleString());

                    const multiplier = getComboMultiplier();
                    if (multiplier > 1) {
                        $('#comboIndicator').text('x' + multiplier).addClass('visible');
                    } else {
                        $('#comboIndicator').removeClass('visible');
                    }

                    // Check level up
                    const currentLevel = getCurrentLevel();
                    if (currentLevel > previousLevel) {
                        playLevelUpSound();
                        previousLevel = currentLevel;
                    }
                }

                function createFloatingPoint(x, y, points) {
                    const $point = $('<div class="floating-point">+' + points + '</div>');
                    $point.css({ left: x + 'px', top: y + 'px' });
                    $('.coin-area').append($point);
                    setTimeout(() => $point.remove(), 800);
                }

                let tapEnabled = true;
                let lastTapPos = null;
                let samePosCount = 0;

                function disableTap(reason = '') {
                    tapEnabled = false;
                    $('#coin').addClass('coin-disabled');
                    $('.block_info_text').html('spam পাওয়া গেছে, রিলোড করুন। ');
                }

                function enableTap() {
                    tapEnabled = true;
                    $('#coin').removeClass('coin-disabled');
                    $('.block_info_text').html('');
                }

                function checkSamePosition(x, y) {
                    if (!lastTapPos) {
                        lastTapPos = { x, y };
                        samePosCount = 1;
                        return false;
                    }

                    const dx = Math.abs(x - lastTapPos.x);
                    const dy = Math.abs(y - lastTapPos.y);

                    // Human hand jitter allowance (5px)
                    if (dx < 5 && dy < 5) {
                        samePosCount++;
                    } else {
                        samePosCount = 1;
                        lastTapPos = { x, y };
                    }

                    // 8 times same spot = suspicious
                    return samePosCount >= 8;
                }


                // Handle tap
                $('#coin').on('click touchstart', function(e, tapCountIncrement = true) {
                    e.preventDefault();

                    // 🔴 HARD STOP
                    if (!tapEnabled) return;


                       // 🔴 Auto click rate detect
                    if (tapRate > 15) {
                        disableTap('Auto click suspected');
                        return;
                    }

                    initAudio();

                        // 🔴 Same Position Detect
                    const clickX = e.touches ? e.touches[0].clientX : e.clientX;
                    const clickY = e.touches ? e.touches[0].clientY : e.clientY;

                    if (checkSamePosition(clickX, clickY)) {
                        disableTap('Auto click (same position)'); 
                        return;
                    }

                    if (energy <= 0) return;

                    const now = Date.now();
                    const prevMultiplier = getComboMultiplier();

                    tapsInLastSecond.push(now);
                    tapsInLastSecond = tapsInLastSecond.filter(t => now - t < 1000);
                    tapRate = tapsInLastSecond.length;

                    if (now - lastTapTime < 500) {
                        streak++;
                    } else {
                        streak = 1;
                    }
                    lastTapTime = now;

                    const multiplier = getComboMultiplier();
                    const points = multiplier;
                    insert_added_coin_tap_tap(multiplier, 1);

                    score += points;
                    energy -= 1;
                    totalTaps++;

                    // Save to localStorage
                    localStorage.setItem('score', score);
                    localStorage.setItem('totalTaps', totalTaps);

                    // Play sounds
                    playTapSound();
                    if (multiplier > prevMultiplier) playComboSound();

                    $(this).addClass('tapped');
                    setTimeout(() => $(this).removeClass('tapped'), 150);

                    const rect = this.getBoundingClientRect();
                    const coinArea = $('.coin-area')[0].getBoundingClientRect();
                    const x = rect.left - coinArea.left + rect.width / 2 + (Math.random() - 0.5) * 40;
                    const y = rect.top - coinArea.top + (Math.random() - 0.5) * 40;
                    createFloatingPoint(x, y, points);

                    updateUI();
                    updateLeaderboard();
                });

                // Energy regeneration
                setInterval(function() {
                    if (energy < MAX_ENERGY) {
                        energy = Math.min(MAX_ENERGY, energy + ENERGY_REGEN_RATE);
                        localStorage.setItem('nowEnergy', energy);
                        updateUI();
                    }
                }, 5000);

                // Tap rate update
                setInterval(function() {
                    const now = Date.now();
                    tapsInLastSecond = tapsInLastSecond.filter(t => now - t < 1000);
                    tapRate = tapsInLastSecond.length;
                    if (now - lastTapTime > 2000) streak = 0;
                    updateUI();
                }, 100);

                // Initial setup
                previousLevel = getCurrentLevel();
                updateUI();
                updateLeaderboard();

                function insert_added_coin_tap_tap(coin, taps) {
                    $.post("<?= base_url('games/insert_added_coin_tap_tap'); ?>", {
                        'added_coin': coin,
                        'now_energy': energy,
                        'taps': taps
                    }, function(data) {
                        //console.log(data);
                    });
                }

                $(document).on('click', '#withdrawBtn', function () {
                    cut_and_withdraw_bal();
                });

                function cut_and_withdraw_bal() {
                    $.post("<?= base_url('games/insert_cut_coin_tap'); ?>", {}, 
                        function(data) {
                            location.reload(true);
                        }
                    );
                }

                $(function () {
                    const $sheet = $("#earnSheet");

                    function openSheet() {
                        $sheet.addClass("show");
                    }

                    function closeSheet() {
                        $sheet.removeClass("show");
                    }

                    $("#earnBtn").on("click", function () {
                        openSheet();
                    });

                    $("#earnSheetClose").on("click", function () {
                        closeSheet();
                    });

                    // overlay তে ক্লিক করলে বন্ধ হবে (sheet-এর ভিতরে ক্লিক করলে নয়)
                    $sheet.on("click", function (e) {
                        if (e.target === this) closeSheet();
                    });

                    // ESC চাপলেও বন্ধ হবে (desktop)
                    $(document).on("keydown", function (e) {
                        if (e.key === "Escape") closeSheet();
                    });
                });

            });

        </script>
    </body>
</html>
