<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>🔥 Kitchen ULTRA 4D</title>

<style>
body{
    margin:0;
    font-family:Segoe UI;
    background:linear-gradient(-45deg,#c62828,#1a237e,#ff6f00,#0d47a1);
    background-size:400% 400%;
    animation:gradient 15s ease infinite;
    color:white;
    padding:20px;
}
@keyframes gradient{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

header{
    text-align:center;
    margin-bottom:20px;
}
header h1{
    font-size:32px;
    text-shadow:0 0 20px white;
}
.menu{
    position:absolute;
    top:20px;
    left:20px;
    background:#00e676;
    border:none;
    padding:8px 15px;
    border-radius:10px;
    font-weight:bold;
    cursor:pointer;
}
.fullscreen{
    position:fixed;
    top:15px;
    right:20px;
    background:#00e676;
    border:none;
    padding:8px 15px;
    border-radius:10px;
    font-weight:bold;
    cursor:pointer;
}

.stats{
    display:flex;
    gap:20px;
    margin-bottom:20px;
    flex-wrap:wrap;
}

.stat-box{
    background:rgba(255,255,255,0.1);
    padding:15px;
    border-radius:15px;
    backdrop-filter:blur(10px);
    min-width:150px;
}

.orders{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(350px,1fr));
    gap:20px;
}

.order-card{
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(15px);
    border-radius:20px;
    padding:20px;
    box-shadow:0 20px 40px rgba(0,0,0,0.5);
    border-left:8px solid #ff9800;
    transition:0.4s;
}

.order-card.warning{
    border-left:8px solid red;
    box-shadow:0 0 25px red;
}

.order-card h3{
    margin-bottom:10px;
    color:#ffcc80;
}

.category{
    margin-top:8px;
    padding:5px;
    border-radius:8px;
}

.soup{background:#1e88e5;}
.meat{background:#c62828;}
.drink{background:#2e7d32;}
.other{background:#6a1b9a;}

.timer{
    margin-top:10px;
    font-weight:bold;
}
</style>
</head>
<body>

<header>
<h1>👨‍🍳 Kitchen </h1>
</header>
<button class="fullscreen" onclick="goFullscreen()">Fullscreen</button>
<div>
    <button class="menu" onclick="window.open('/HotpotSoup')">Menu</button>
</div>
<div class="stats">
<div class="stat-box">Pending: <span id="pendingCount">0</span></div>
<div class="stat-box">Completed Today: <span id="completedCount">0</span></div>
<div class="stat-box">Avg Prep Time: <span id="avgTime">0</span> min</div>
</div>

<div class="orders" id="orders"></div>

<audio id="bellSound">
    <source src="https://www.soundjay.com/misc/sounds/bell-ringing-05.mp3" type="audio/mpeg">
</audio>

<script>
let lastCount=0;

function speak(text){
    let msg=new SpeechSynthesisUtterance(text);
    msg.volume=1;
    msg.rate=1;
    msg.pitch=1;
    speechSynthesis.speak(msg);
}

function loadKitchen(){
    let orders=JSON.parse(localStorage.getItem("hotpotOrders"))||[];
    let container=document.getElementById("orders");
    container.innerHTML="";

    let pending=orders.filter(o=>o.status==="Pending");
    let completedToday=orders.filter(o=>{
        return o.status==="Completed" &&
        new Date(o.time).toDateString()===new Date().toDateString();
    });

    document.getElementById("pendingCount").innerText=pending.length;
    document.getElementById("completedCount").innerText=completedToday.length;

    if(pending.length>lastCount){
        let newest=pending[pending.length-1];
        document.getElementById("bellSound").play();
        speak("New order table "+newest.table);
    }
    lastCount=pending.length;

    let totalPrepTime=0;

    pending.forEach(order=>{
        let placed=new Date(order.time);
        let now=new Date();
        let minutes=Math.floor((now-placed)/60000);
        totalPrepTime+=minutes;

        let warningClass=minutes>=10?"warning":"";

        container.innerHTML+=`
        <div class="order-card ${warningClass}">
            <h3>🔥 Table ${order.table}</h3>
            ${order.items.map(i=>{
                let catClass="other";
                let name=i.name.toLowerCase();
                if(name.includes("soup")) catClass="soup";
                else if(name.includes("beef")||name.includes("pork")||name.includes("chicken")) catClass="meat";
                else if(name.includes("cola")||name.includes("pepsi")||name.includes("water")) catClass="drink";

                return `<div class="category ${catClass}">${i.name} x${i.qty}</div>`;
            }).join("")}
            <div class="timer">⏱ ${minutes} min waiting</div>
        </div>
        `;
    });

    let avg=pending.length?Math.round(totalPrepTime/pending.length):0;
    document.getElementById("avgTime").innerText=avg;

    if(pending.length===0){
        container.innerHTML="<h2>No Pending Orders</h2>";
    }
}

function goFullscreen(){
    if(document.documentElement.requestFullscreen){
        document.documentElement.requestFullscreen();
    }
}

loadKitchen();
setInterval(loadKitchen,3000);
</script>

</body>
</html>
