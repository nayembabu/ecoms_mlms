<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Auto Income | Claim</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family: 'Orbitron', sans-serif;
    background: radial-gradient(circle at top, #1a1a1a, #000);
    color:#fff;
    text-align:center;
}

/* Header */
.header{
    padding:25px;
    background: linear-gradient(135deg, #f7971e, #ff512f);
    box-shadow: 0 5px 25px rgba(0,0,0,.5);
}

.countdown{
    font-size:38px;
    font-weight:700;
    margin-top:10px;
}

/* Sections */
.section{
    margin:50px auto;
    max-width:600px;
    padding:30px;
    border-radius:16px;
    background: linear-gradient(145deg, #111, #1f1f1f);
    box-shadow: 0 15px 40px rgba(0,0,0,.6);
    display:none;
}

/* Ad Placeholder */
.ad-box{
    margin:20px 0;
    padding:20px;
    border:2px dashed rgba(247,147,26,.5);
    border-radius:12px;
    color:#f7931a;
}

/* Buttons */
.btn{
    padding:14px 30px;
    border:none;
    border-radius:30px;
    font-size:16px;
    cursor:pointer;
    font-family:inherit;
}

.btn-next{
    background: linear-gradient(135deg,#00c6ff,#0072ff);
    color:#fff;
}

.btn-claim{
    background: linear-gradient(135deg,#11998e,#38ef7d);
    color:#000;
    font-size:20px;
    font-weight:700;
    display:none;
    margin-top:20px;
}

/* Bitcoin watermark */
.section::after{
    content:"₿";
    position:absolute;
    font-size:160px;
    color:rgba(247,147,26,.08);
    right:20px;
    bottom:10px;
    pointer-events:none;
}
.section{
    position:relative;
}
</style>
</head>

<body>

<!-- HEADER COUNTDOWN -->
<div class="header">
    <h2>🎰 Auto Income Loading</h2>
    <div class="countdown" id="headerTimer">10</div>
</div>

<!-- BOTTOM SECTION -->
<div class="section" id="bottomSection">
    <h3>🔻 Sponsored Ads</h3>
    <div class="countdown" id="bottomTimer">10</div>

    <div class="ad-box">
        <!-- Adsterra Ad Code Here -->
        ADS PLACEHOLDER (BOTTOM)
    </div>

    <button class="btn btn-next" onclick="startMiddle()">Next</button>
</div>

<!-- MIDDLE SECTION -->
<div class="section" id="middleSection">
    <h3>💰 Final Verification</h3>
    <div class="countdown" id="middleTimer">10</div>

    <div class="ad-box">
        <!-- Adsterra Ad Code Here -->
        ADS PLACEHOLDER (MIDDLE)
    </div>

    <button class="btn btn-claim" id="claimBtn">CLAIM NOW</button>
</div>

<script>
let totalTime = 30;

/* HEADER TIMER */
let headerTime = 10;
const headerTimer = setInterval(() => {
    document.getElementById('headerTimer').innerText = headerTime;
    headerTime--;
    totalTime--;
    if(headerTime < 0){
        clearInterval(headerTimer);
        document.getElementById('headerTimer').innerText = "READY";
        document.getElementById('bottomSection').style.display = "block";
        startBottom();
    }
},1000);

/* BOTTOM TIMER */
function startBottom(){
    let t = 10;
    const bottomInt = setInterval(()=>{
        document.getElementById('bottomTimer').innerText = t;
        t--;
        totalTime--;
        if(t < 0){
            clearInterval(bottomInt);
            document.getElementById('bottomTimer').innerText = "DONE";
        }
    },1000);
}

/* MIDDLE TIMER */
function startMiddle(){
    document.getElementById('middleSection').style.display="block";
    let t = 10;
    const middleInt = setInterval(()=>{
        document.getElementById('middleTimer').innerText = t;
        t--;
        totalTime--;
        if(t < 0){
            clearInterval(middleInt);
            document.getElementById('middleTimer').innerText = "DONE";
            document.getElementById('claimBtn').style.display="inline-block";
        }
    },1000);
}

/* SAFETY: 30s total force claim */
setTimeout(()=>{
    document.getElementById('claimBtn').style.display="inline-block";
},30000);
</script>

</body>
</html>
