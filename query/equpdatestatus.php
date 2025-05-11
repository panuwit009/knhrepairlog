<?php
session_start();

include("connection.php");
header('Content-Type: application/json');

try {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $eq_status = isset($_POST['eq_status']) ? $_POST['eq_status'] : null;
    $repair_id = isset($_POST['repair_id']) ? $_POST['repair_id'] : null;
    $res_name = isset($_SESSION['name']) ? $_SESSION['name'] : null;
    
    if ($id !== null && $eq_status !== null) {
        $stmt = $pdo->prepare("SELECT eq_status, eq_no FROM repairlist WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $current = $stmt->fetch(PDO::FETCH_ASSOC);

        $updateFields = [];
        $params = [
            ':id' => $id
        ];

        if ($eq_status !== null && $eq_status != $current['eq_status']) {
            $updateFields[] = "eq_status = :eq_status";
            $params[':eq_status'] = $eq_status;
            $updateFields[] = "eq_status_timestamp = NOW()";
        }

        if (!empty($updateFields)) {
            $updateQuery = "UPDATE repairlist SET " . implode(', ', $updateFields) . " WHERE id = :id";
            $stmt = $pdo->prepare($updateQuery);
            $stmt->execute($params);

            if ($res_name !== null) {
                $insertLogQuery = "INSERT INTO status_log (repair_id, eq_no, eq_status, eq_status_timestamp, res_name) 
                                   VALUES (:repair_id, :eq_no, :eq_status, NOW(), :res_name)";
                $insertStmt = $pdo->prepare($insertLogQuery);
                $insertStmt->bindParam(':repair_id', $repair_id, PDO::PARAM_STR);
                $insertStmt->bindParam(':eq_no', $current['eq_no'], PDO::PARAM_STR);
                $insertStmt->bindParam(':eq_status', $eq_status, PDO::PARAM_STR);
                $insertStmt->bindParam(':res_name', $res_name, PDO::PARAM_STR);
                $insertStmt->execute();
            } else {
                echo json_encode([
                    "success" => false,
                    "error" => "Session name not set"
                ]);
                exit();
            }

            echo json_encode([
                "success" => true
            ]);
        } else {
            echo json_encode([
                "success" => true,
                "message" => "No changes detected"
            ]);
        }
    } else {
        echo json_encode([
            "success" => false,
            "error" => "Invalid parameters"
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);
}
?>
