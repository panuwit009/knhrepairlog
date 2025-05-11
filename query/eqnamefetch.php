<?php
include("connection.php");
header('Content-Type: application/json');

try {
    $stmt = $pdo->prepare("SELECT id, equipment_name FROM equipment");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode([
        "success" => true,
        "data" => $results
    ]);
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);
}
?>