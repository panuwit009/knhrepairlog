<?php
include("connection.php");
header('Content-Type: application/json');

try {
    if (isset($_POST['repair_id'])) {
        //$eq_no = $_POST['eq_no'];
        $repair_id = $_POST['repair_id'];

        $stmt = $pdo->prepare("SELECT * FROM status_log WHERE repair_id = :repair_id ORDER BY eq_status_timestamp ASC");
        $stmt->bindParam(':repair_id', $repair_id, PDO::PARAM_STR);
        $stmt->execute();
        $statusLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode([
            "success" => true,
            "data" => $statusLogs
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Invalid parameters."
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);
}
?>
