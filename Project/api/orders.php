<?php

header("Content-Type: application/json");

require __DIR__ . "/../config/database.php";

try {

    $stmt = $pdo->query("SELECT * FROM orders");
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => true,
        "data" => $orders
    ]);

} catch (\Throwable $e) {

    echo json_encode([
        "status" => false,
        "message" => $e->getMessage()
    ]);
}
