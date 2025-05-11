<?php
// Include database connection
include 'connection.php'; // Replace with your actual database connection

if (isset($_GET['equipment'])) {
    $equipment = $_GET['equipment'];

    // Query to fetch name_detail and detail2 based on the equipment value
    $stmt = $pdo->prepare("SELECT * FROM detail WHERE equipment = :equipment");
    $stmt->execute(['equipment' => $equipment]);
    $details = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($details) {
        // Get the value of detail2 (assuming it's part of the data you need)
        // You need to pass this value so the JavaScript can disable the select and show the value
        $detail2 = isset($details[0]['id']) ? $details[0]['id'] : null; // Just an example, adjust if necessary

        echo json_encode([
            'success' => true,
            'data' => $details,
            'detail2' => $detail2 // Send the selected value (detail2 id)
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No details found']);
    }
}
?>
