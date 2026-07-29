<?php
require "config/database.php";

$stmt = $pdo->query("SELECT * FROM orders");

$orders = $stmt->fetchAll();

echo "<pre>";
print_r($orders);
