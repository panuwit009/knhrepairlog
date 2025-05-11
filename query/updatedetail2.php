<?php
include'connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];          // Repair ID
    $detail2_value = $_POST['detail2_value'];  // The selected value for detail2

    // Assuming you are using PDO for database connection
    $query = "UPDATE repairlist SET detail2 = :detail2_value WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':detail2_value', $detail2_value, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to update']);
    }
}
?>
