<?php
include("connection.php");
header('Content-Type: application/json');

try {
    $logId = isset($_POST['log_id']) ? $_POST['log_id'] : null;

    if ($logId !== null) {
        $stmt = $pdo->prepare("
            SELECT status_log.*, status.name_status
            FROM status_log
            LEFT JOIN status ON status_log.eq_status = status.id
            WHERE status_log.id = :logId
        ");
        $stmt->bindParam(':logId', $logId, PDO::PARAM_INT);
        $stmt->execute();
        $log = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($log) {
            echo json_encode([
                "success" => true,
                "data" => $log
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "error" => "Log not found"
            ]);
        }
    } else {
        echo json_encode([
            "success" => false,
            "error" => "Log ID is missing"
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);
}
?>
