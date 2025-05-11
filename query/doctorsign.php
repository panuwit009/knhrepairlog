<?php
session_start();
include("connection.php");
header('Content-Type: application/json');

try {
    // Retrieve POST data
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $doctorOpinion = isset($_POST['doctorOpinion']) ? $_POST['doctorOpinion'] : null;
    $digitalSignChecked = isset($_POST['digitalSignChecked']) ? $_POST['digitalSignChecked'] : null;
    $doctorid = isset($_SESSION['id']) ? $_SESSION['id'] : null;

    // Check if the required parameters are present
    if ($id === null) {
        echo json_encode(["success" => false, "error" => "ID is required"]);
        exit;
    }

    // Start the SQL query
    $sql = "UPDATE repairlist SET ";

    // If doctor opinion is provided, update doctor_opinion
    if ($doctorOpinion !== null) {
        $sql .= "doctor_opinion = :doctorOpinion, ";
    }

    // If digitalSignChecked is true, update the sign-related fields
    if ($digitalSignChecked === 'true') {
        $sql .= "doctor_id_sign = :doctorid, doctor_sign_timestamp = NOW() ";
    } else {
        $sql .= "doctor_id_sign = null, doctor_sign_timestamp = null ";
    }

    // Trim any trailing commas and complete the query
    $sql = rtrim($sql, ', ') . " WHERE id = :id";

    // Prepare and execute the query
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    if ($doctorOpinion !== null) {
        $stmt->bindParam(':doctorOpinion', $doctorOpinion, PDO::PARAM_STR);
    }

    if ($digitalSignChecked === 'true') {
        $stmt->bindParam(':doctorid', $doctorid, PDO::PARAM_INT);
    }

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the query
    $stmt->execute();

    echo json_encode(["success" => true]);

} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);
}
?>
