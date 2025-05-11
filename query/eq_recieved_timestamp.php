<?php
include('connection.php');

if (isset($_POST['equipmentStatus']) && $_POST['equipmentStatus'] == 'received' && isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $query = "UPDATE repairlist SET eq_recieved_timestamp = NOW() WHERE id = :id";
        
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Timestamp updated successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error updating timestamp."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Error updating timestamp: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid data or missing parameters."]);
}
?>
