<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Prepare SQL query with PDO
        $query = "DELETE FROM repairlist WHERE id = :id";
        try {
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT); // Bind parameter using PDO

            // Execute the statement
            if ($stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to delete the record']);
            }
        } catch (PDOException $e) {
            // Catch any PDO errors and show them
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'id is required']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}

$pdo = null; // Close the PDO connection
?>