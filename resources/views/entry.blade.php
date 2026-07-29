<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Hotpot Customer Entry</title>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI,Arial;
}

body{
    min-height:100vh;
    background:linear-gradient(135deg,#c62828,#1a237e);
    display:flex;
    justify-content:center;
    align-items:center;
    color:white;
}

.container{
    width:350px;
    background:rgba(255,255,255,0.1);
    backdrop-filter:blur(15px);
    padding:25px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.5);
    text-align:center;
}

button{
    width:100%;
    padding:10px;
    margin:10px 0;
    border:none;
    border-radius:10px;
    font-weight:bold;
    cursor:pointer;
}

.scan-btn{background:black;color:white;}
.register-btn{background:#00c853;color:white;}
input{
    width:100%;
    padding:8px;
    margin:8px 0;
    border:none;
    border-radius:8px;
}

.hidden{display:none;}

#reader{
    width:100%;
}
</style>
</head>

<body>

<div class="container">

<h2>🔥 Welcome to Hotpot</h2>

<div id="options">
    <button class="scan-btn" onclick="showScan()">📷 Scan QR</button>
    <button class="register-btn" onclick="showRegister()">📝 Register</button>
</div>

<!-- QR Scanner -->
<div id="scanSection" class="hidden">
    <div id="reader"></div>
    <button onclick="location.reload()">Back</button>
</div>

<!-- Register Form -->
<div id="registerSection" class="hidden">
    <input type="text" id="name" placeholder="Your Name">
    <input type="text" id="phone" placeholder="Phone Number">
    <input type="number" id="table" placeholder="Table Number">
    <button class="register-btn" onclick="registerUser()">Enter Menu</button>
    <button onclick="location.reload()">Back</button>
</div>

</div>

<script>

function showScan(){
    document.getElementById("options").classList.add("hidden");
    document.getElementById("scanSection").classList.remove("hidden");

    const html5QrCode = new Html5Qrcode("reader");
    html5QrCode.start(
        { facingMode: "environment" },
        {
            fps: 10,
            qrbox: 250
        },
        qrCodeMessage => {
            window.location.href = qrCodeMessage;
        }
    );
}

function showRegister(){
    document.getElementById("options").classList.add("hidden");
    document.getElementById("registerSection").classList.remove("hidden");
}

function registerUser(){

    let name = document.getElementById("name").value;
    let phone = document.getElementById("phone").value;
    let table = document.getElementById("table").value;

    if(!name || !phone || !table){
        alert("Please fill all fields");
        return;
    }

    localStorage.setItem("customerName", name);
    localStorage.setItem("customerPhone", phone);
    localStorage.setItem("customerTable", table);

     window.location.href = "{{ route('HotpotSoup') }}?table=" + table;
}

</script>

</body>
</html>
