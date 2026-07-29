<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>🔥 Chhorng Hotpot Ordering System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f4f6f9;
}
.card{
    border:none;
    border-radius:12px;
    box-shadow:0 3px 10px rgba(0,0,0,.08);
}
.navbar{
    background:#111827;
}
.qr{
    width:200px;
}
</style>
</head>

<body>

<nav class="navbar navbar-dark p-3">
<div class="container-fluid">
<h4 class="text-white">🍲 Chhorng Hotpot</h4>
</div>
</nav>

<div class="container mt-4">

<!-- PRODUCTS -->
<div class="row" id="productList"></div>

<hr>

<!-- CART -->
<h4>🛒 Cart</h4>
<table class="table table-bordered">
<thead>
<tr>
<th>Product</th>
<th>Qty</th>
<th>Action</th>
</tr>
</thead>
<tbody id="cartBody"></tbody>
</table>

<button class="btn btn-success" onclick="createOrder()">Place Order</button>

<hr>

<!-- PAYMENT -->
<h4>💳 QR Payment</h4>

<img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=HOTPOPAY"
class="qr">

<form id="receiptForm" class="mt-3">
<input type="number" name="order_id" placeholder="Order ID" class="form-control mb-2" required>

<input type="file" name="receipt" class="form-control mb-2" required>

<button class="btn btn-primary">Upload Receipt</button>
</form>

<hr>

<!-- ORDERS -->
<h4>📦 Orders</h4>
<table class="table table-striped">
<thead>
<tr>
<th>ID</th>
<th>Code</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody id="ordersTable"></tbody>
</table>

</div>

<script>

const API="http://localhost/Project/api";

/* ---------------- PRODUCTS (STATIC DEMO) ---------------- */

const products=[
{id:1,name:"Hotpot Beef"},
{id:2,name:"Seafood Set"},
{id:3,name:"Spicy Soup"}
];

const productList=document.getElementById("productList");

products.forEach(p=>{
productList.innerHTML+=`
<div class="col-md-4">
<div class="card p-3 mb-3">
<h5>${p.name}</h5>
<button class="btn btn-dark"
onclick="addToCart(${p.id})">
Add To Cart
</button>
</div>
</div>`;
});

/* ---------------- ADD TO CART ---------------- */

async function addToCart(product_id){

await fetch(`${API}/cart/add.php`,{
method:"POST",
headers:{'Content-Type':'application/json'},
body:JSON.stringify({
customer_id:1,
product_id,
quantity:1
})
});

loadCart();
}

/* ---------------- LOAD CART ---------------- */

async function loadCart(){

let res=await fetch(`${API}/cart/list.php`);
let data=await res.json();

let html="";
data.forEach(c=>{
html+=`
<tr>
<td>${c.product_id}</td>
<td>${c.quantity}</td>
<td>-</td>
</tr>`;
});

cartBody.innerHTML=html;
}

loadCart();

/* ---------------- CREATE ORDER ---------------- */

async function createOrder(){

let res=await fetch(`${API}/orders/create.php`,{
method:"POST",
headers:{'Content-Type':'application/json'},
body:JSON.stringify({
customer_id:1,
table_number:5,
total_amount:20
})
});

let data=await res.json();

alert("Order Created: "+data.order_code);

loadOrders();
}

/* ---------------- LOAD ORDERS ---------------- */

async function loadOrders(){

let res=await fetch(`${API}/orders/list.php`);
let orders=await res.json();

let html="";

orders.forEach(o=>{
html+=`
<tr>
<td>${o.id}</td>
<td>${o.order_code}</td>
<td>${o.status}</td>
<td>
<button class="btn btn-success btn-sm"
onclick="approve(${o.id})">
Approve
</button>
</td>
</tr>`;
});

ordersTable.innerHTML=html;
}

loadOrders();

/* ---------------- ADMIN APPROVE ---------------- */

async function approve(id){

let form=new FormData();
form.append("order_id",id);

await fetch(`${API}/orders/approve.php`,{
method:"POST",
body:form
});

loadOrders();
}

/* ---------------- UPLOAD RECEIPT ---------------- */

document.getElementById("receiptForm")
.addEventListener("submit",async e=>{

e.preventDefault();

let formData=new FormData(e.target);

await fetch(`${API}/payment/upload_receipt.php`,{
method:"POST",
body:formData
});

alert("Receipt Uploaded ✅");
});

</script>

</body>
</html>
