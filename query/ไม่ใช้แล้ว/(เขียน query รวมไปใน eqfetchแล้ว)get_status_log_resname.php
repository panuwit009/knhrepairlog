<?php
include("connection.php");
header('Content-Type: application/json');

try {
    if (isset($_POST['eq_no'])) {
        $eq_no = $_POST['eq_no'];

        $stmt = $pdo->prepare("SELECT id, eq_status, eq_status_timestamp, res_name 
                               FROM status_log 
                               WHERE eq_no = :eq_no AND res_name IS NOT NULL AND eq_status != 0
                               ORDER BY eq_status_timestamp ASC LIMIT 1");
        $stmt->bindParam(':eq_no', $eq_no, PDO::PARAM_STR);
        $stmt->execute();
        $statusLog = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($statusLog) {
            echo json_encode([
                "success" => true,
                "data" => $statusLog
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "No valid records found."
            ]);
        }
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
