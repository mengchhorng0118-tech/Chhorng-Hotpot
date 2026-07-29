<!DOCTYPE html>
<html>
<head>
<title>Hotpot Admin Login</title>
<style>
body{
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    background:linear-gradient(120deg,#c62828,#1a237e);
    font-family:Arial;
}
.login-box{
    background:white;
    padding:30px;
    border-radius:15px;
    width:300px;
    text-align:center;
}
.login-box h2{
    margin-bottom:20px;
    color:#c62828;
}
input{
    width:100%;
    padding:10px;
    margin:8px 0;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:15px;
    box-sizing:border-box;
}
button{
    width:100%;
    padding:12px;
    background:#c62828;
    color:white;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
    margin-top:10px;
}
button:hover{
    background:#8b0000;
}
</style>
</head>
<body>

<div class="login-box">
    <h2>🔥 Admin Login</h2>
    <input type="text" id="username" placeholder="Username" autofocus>
    <input type="password" id="password" placeholder="Password">
    <button onclick="login()">Login</button>
</div>

<script>
function login(){
    let user = document.getElementById("username").value;
    let pass = document.getElementById("password").value;

    if(user === "admin" && pass === "1234"){
        localStorage.setItem("adminLogin", "true");
        window.location.href = "{{ route('dashboard') }}";
    } else {
        alert("Wrong credentials");
    }
}

// Allow Enter key to submit
document.addEventListener("keydown", function(e){
    if(e.key === "Enter") login();
});
</script>

</body>
</html>
