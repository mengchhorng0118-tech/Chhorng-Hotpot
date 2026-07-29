

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hotpot Restaurant Management System</title>

<style>
    /* ============================= */
/* 4D GLOBAL DESIGN */
/* ============================= */

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: "Segoe UI", sans-serif;
}

body {
    background: linear-gradient(-45deg, #c62828, #1a237e, #ff6f00, #0d47a1);
    background-size: 400% 400%;
    animation: gradientMove 15s ease infinite;
    color: white;
    min-height: 100vh;
}

@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

:root {
    --glass-bg: rgba(255,255,255,0.08);
    --glass-border: rgba(255,255,255,0.2);
    --primary-glow: #ff3d00;
}

/* ============================= */
/* HEADER */
/* ============================= */

header {
    backdrop-filter: blur(20px);
    background: var(--glass-bg);
    border-bottom: 1px solid var(--glass-border);
    padding: 20px;
    text-align: center;
    box-shadow: 0 10px 40px rgba(0,0,0,0.4);
}

header h1 {
    font-size: 22px;
    letter-spacing: 1px;
    text-shadow: 0 0 15px rgba(255,255,255,0.5);
}

header span {
    background: rgba(255,255,255,0.15);
    padding: 6px 14px;
    border-radius: 30px;
    margin-left: 10px;
}

/* ============================= */
/* CONTAINER */
/* ============================= */

.container {
    display: flex;
    gap: 20px;
    padding: 30px;
}

/* ============================= */
/* CATEGORY BUTTONS */
/* ============================= */

.categories {
    margin-bottom: 20px;
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.categories button {
    background: var(--glass-bg);
    backdrop-filter: blur(10px);
    border: 1px solid var(--glass-border);
    color: white;
    padding: 8px 18px;
    border-radius: 30px;
    cursor: pointer;
    transition: 0.4s;
}

.categories button:hover,
.categories button.active {
    background: var(--primary-glow);
    box-shadow: 0 0 20px var(--primary-glow);
    transform: translateY(-3px);
}

/* ============================= */
/* PRODUCT GRID */
/* ============================= */

.menu {
    flex: 3;
}

.products {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
    gap: 25px;
}

/* ============================= */
/* 4D CARD */
/* ============================= */

.card {
    background: var(--glass-bg);
    backdrop-filter: blur(15px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 15px;
    text-align: center;
    transition: 0.4s;
    transform-style: preserve-3d;
    box-shadow: 0 20px 40px rgba(0,0,0,0.4);
}

.card:hover {
    transform: rotateY(10deg) rotateX(8deg) scale(1.05);
    box-shadow: 0 30px 60px rgba(0,0,0,0.6);
}

.card img {
    width: 100%;
    height: 130px;
    object-fit: cover;
    border-radius: 15px;
}

.card h4 {
    margin: 10px 0 6px;
}

.card p {
    color: #ffcc80;
    font-weight: bold;
    margin-bottom: 10px;
}

/* ADD BUTTON */

.card button {
    background: linear-gradient(45deg, #ff3d00, #ff9100);
    border: none;
    padding: 8px 12px;
    border-radius: 12px;
    color: white;
    cursor: pointer;
    transition: 0.3s;
    box-shadow: 0 0 15px rgba(255, 61, 0, 0.6);
}

.card button:hover {
    transform: scale(1.1);
    box-shadow: 0 0 25px rgba(255, 61, 0, 0.9);
}

/* ============================= */
/* CART SECTION */
/* ============================= */

.cart {
    flex: 1;
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.5);
}

.cart h3 {
    margin-bottom: 15px;
}

.cart-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.cart-controls button {
    background: #ff3d00;
    border: none;
    color: white;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(255,61,0,0.6);
}

.cart-controls button:hover {
    transform: scale(1.2);
}

.total {
    margin-top: 15px;
    font-size: 18px;
    font-weight: bold;
}

/* CONFIRM BUTTON */

.confirm-btn {
    margin-top: 15px;
    width: 100%;
    padding: 10px;
    background: linear-gradient(45deg, #00e676, #00c853);
    border: none;
    border-radius: 15px;
    color: black;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 0 20px rgba(0,230,118,0.6);
    transition: 0.3s;
}

.confirm-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 0 30px rgba(0,230,118,0.9);
}

/* ============================= */
/* RESPONSIVE */
/* ============================= */

@media(max-width: 900px){
    .container {
        flex-direction: column;
    }
}
.kitchen-btn{
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
.btn-register{
    background:#00e676;
    padding:8px 15px;
    border-radius:8px;
    text-decoration:none;
    color:black;
    font-weight:bold;
}
</style>
</head>

<body>

<header>
    <div class="header-top">
        <h1>
            🔥 Hotpot Restaurant Ordering System
            <span id="tableNumber">Table ?</span>
            <a href="{{ route('entry') }}" class="btn-register">Register</a>
        </h1>

        <div class="header-actions">
            <a href="{{ route('login') }}" class="kitchen-btn">Admin</a>
        </div>

    </div>
</header>

<div class="container">

    <div class="menu">
        <div class="categories" id="categoryButtons"></div>
        <div class="products" id="productList"></div>
    </div>

    <div class="cart">
        <h3>🛒 Your Order</h3>
        <div id="cartItems"></div>
        <div class="total">Total: $<span id="totalPrice">0.00</span></div>
        <button class="confirm-btn" onclick="confirmOrder()">Confirm Order</button>
    </div>

</div>

<script>

/* TABLE DETECTION USING LOCALSTORAGE */
const params = new URLSearchParams(window.location.search);
let tableNumber = localStorage.getItem("customerTable") || "Unknown";
document.getElementById("tableNumber").innerText = "Table " + tableNumber;


/* ============================= */
/* MENU DATA */
/* ============================= */
const menu = [

/* SOUP */
{category:"Soup", name:"Tom Yum Soup", price:5, img:"image/tom-yum.jpg"},
{category:"Soup", name:"Mala Soup", price:6, img:"image/mala.jpg"},
{category:"Soup", name:"Chicken Soup", price:4, img:"image/chicken-soup.jpg"},
{category:"Soup", name:"Beef Bone Soup", price:6, img:"image/beef-bone.jpg"},
{category:"Soup", name:"Seafood Soup", price:7, img:"image/seafood-soup.jpg"},
{category:"Soup", name:"Vegetable Soup", price:4, img:"image/vegetable-soup.jpg"},

/* SEAFOOD */
{category:"Seafood", name:"Crab", price:8, img:"image/crab.jpg"},
{category:"Seafood", name:"Shrimp", price:7, img:"image/shrimp.jpg"},
{category:"Seafood", name:"Squid", price:6, img:"image/squid.jpg"},
{category:"Seafood", name:"Fish", price:5, img:"image/fish.jpg"},

/* MEAT */
{category:"Meat", name:"Beef Slice", price:6, img:"image/beef-slice.jpg"},
{category:"Meat", name:"Pork Slice", price:5, img:"image/pork-slice.jpg"},
{category:"Meat", name:"Chicken", price:4, img:"image/chicken.jpg"},

/* VEGETABLE */
{category:"Vegetable", name:"Cabbage", price:2, img:"image/cabbage.jpg"},
{category:"Vegetable", name:"Mushroom", price:3, img:"image/mushroom.jpg"},
{category:"Vegetable", name:"Spinach", price:2, img:"image/spinach.jpg"},

/* MEATBALL */
{category:"Meatball", name:"Fish Ball", price:3, img:"image/fish-ball.jpg"},
{category:"Meatball", name:"Beef Ball", price:3, img:"image/beef-ball.jpg"},

/* DRINK */
{category:"Drink", name:"Coca Cola", price:1.5, img:"image/coca-cola.jpg"},
{category:"Drink", name:"Pepsi", price:1.5, img:"image/pepsi.jpg"},
{category:"Drink", name:"Water", price:1, img:"image/water.jpg"}

];

let cart = [];

/* ============================= */
/* RENDER CATEGORY BUTTONS */
/* ============================= */
const categories = ["All", ...new Set(menu.map(item => item.category))];
const categoryContainer = document.getElementById("categoryButtons");

categories.forEach(cat => {
    let btn = document.createElement("button");
    btn.innerText = cat;
    btn.onclick = () => filterCategory(cat, btn);
    categoryContainer.appendChild(btn);
});

/* ============================= */
/* FILTER FUNCTION */
/* ============================= */
function filterCategory(category, btn){
    document.querySelectorAll(".categories button").forEach(b => b.classList.remove("active"));
    btn.classList.add("active");

    if(category === "All"){
        renderProducts(menu);
    } else {
        renderProducts(menu.filter(item => item.category === category));
    }
}

/* ============================= */
/* RENDER PRODUCTS */
/* ============================= */
function renderProducts(data){
    const productList = document.getElementById("productList");
    productList.innerHTML = "";

    data.forEach(p => {
        productList.innerHTML += `
        <div class="card">
            <img src="${p.img}" alt="${p.name}">
            <h4>${p.name}</h4>
            <p>$${p.price}</p>
            <button  onclick="addToCart('${p.name}', ${p.price})">Add</button>
        </div>
        `;
    });
}

renderProducts(menu);

/* ============================= */
/* CART FUNCTIONS */
/* ============================= */
function addToCart(name, price){
    let item = cart.find(i => i.name === name);
    if(item){
        item.qty++;
    } else {
        cart.push({name, price, qty:1});
    }
    renderCart();
}

function renderCart(){
    const cartItems = document.getElementById("cartItems");
    cartItems.innerHTML = "";
    let total = 0;

    cart.forEach((item, index) => {
        total += item.price * item.qty;

        cartItems.innerHTML += `
        <div class="cart-item">
            <div>${item.name}</div>
            <div class="cart-controls">
                <button onclick="decreaseQty(${index})">-</button>
                <span>${item.qty}</span>
                <button onclick="increaseQty(${index})">+</button>
                <button onclick="removeItem(${index})">x</button>
            </div>
        </div>
        `;
    });

    document.getElementById("totalPrice").innerText = total.toFixed(2);
}

function increaseQty(index){
    cart[index].qty++;
    renderCart();
}

function decreaseQty(index){
    if(cart[index].qty > 1){
        cart[index].qty--;
    } else {
        cart.splice(index,1);
    }
    renderCart();
}

function removeItem(index){
    cart.splice(index,1);
    renderCart();
}

/* ============================= */
/* CUSTOMER VALIDATION */
/* ============================= */

let customerName = localStorage.getItem("customerName");
let customerPhone = localStorage.getItem("customerPhone");

if(!customerName || !customerPhone){
    alert("Please Register or Scan QR First!");
    window.location.href = "{{ route('entry') }}";
}
/* ===============================
   AUTO RECEIPT + PRINT
================================ */

function autoPrintReceipt(order){

    const subtotal = order.total / 1.1;
    const tax = subtotal * 0.1;

    const receiptHTML = `
    <html>
    <head>
        <title>Hotpot Receipt</title>
        <style>
            body{
                font-family: Arial;
                padding:20px;
                width:300px;
            }
            h2{text-align:center;}
            hr{margin:8px 0;}
        </style>
    </head>

    <body>

        <h2>🔥 HOTPOT RECEIPT</h2>

        <p><b>Order:</b> ${order.id}</p>
        <p><b>Table:</b> ${order.table}</p>
        <p><b>Date:</b> ${order.time}</p>

        <hr>

        ${order.items.map(i=>`
            <div>
                ${i.name} x${i.qty}
                <span style="float:right">
                    $${(i.price*i.qty).toFixed(2)}
                </span>
            </div>
        `).join("")}

        <hr>

        <p>Subtotal: $${subtotal.toFixed(2)}</p>
        <p>Tax (10%): $${tax.toFixed(2)}</p>

        <h3>Total: $${order.total.toFixed(2)}</h3>

        <hr>

        <div style="text-align:center;">
            <p><b>Scan to Pay</b></p>

            <!-- YOUR QR IMAGE -->
            <img src="image/qr.png" width="180"/>
        </div>

        <p style="text-align:center">
            Thank you ❤️
        </p>

    </body>
    </html>
    `;

    const printWindow = window.open("", "_blank");
    printWindow.document.write(receiptHTML);
    printWindow.document.close();

    printWindow.onload = function(){
        printWindow.print();
        printWindow.close();
    };
}
function confirmOrder(){
    if(cart.length === 0){
        alert("Cart is empty!");
        return;
    }

    let orders = JSON.parse(localStorage.getItem("hotpotOrders")) || [];

    let totalAmount = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);

    let newOrder = {
        id:       "ORD" + Date.now(),
        table:    tableNumber,
        customer: customerName,
        phone:    customerPhone,
        items:    cart,
        total:    totalAmount,
        status:   "Pending",
        time:     new Date().toLocaleString()
    };

    orders.push(newOrder);
    localStorage.setItem("hotpotOrders", JSON.stringify(orders));

    autoPrintReceipt(newOrder);

    cart = [];
    renderCart();

    window.location.href = "{{ route('thankyou') }}";
}
</script>
</body>
</html>

