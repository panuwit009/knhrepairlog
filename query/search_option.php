<?php
include('connection.php');

// Initialize search variables
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';


// ดึงข้อมูลอุปกรณ์
$equipmentOptions = '';
$equipmentStmt = $pdo->query("SELECT id, equipment_name FROM equipment");
while ($equipment = $equipmentStmt->fetch()) {
    $equipmentOptions .= '<option value="' . htmlspecialchars($equipment['id']) . '">' . 
                         htmlspecialchars($equipment['equipment_name']) . '</option>';
}

// ดึงข้อมูลสถานะ
$statusOptions = '';
$statusStmt = $pdo->query("SELECT id, name_status FROM status");
while ($status = $statusStmt->fetch()) {
    $statusOptions .= '<option value="' . htmlspecialchars($status['id']) . '">' . 
                      htmlspecialchars($status['name_status']) . '</option>';
}
?>