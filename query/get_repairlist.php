<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT 
        r.id,
        -- r.test_name,
        r.eq_no,
        e.equipment_name as equipment,
        w.name_ward,
        s.name_status as eq_status,
        r.eq_status_timestamp as update_date,
        r.detail as details
    FROM repairlist r
    LEFT JOIN equipment e ON r.equipment = e.id
    LEFT JOIN ward w ON r.ward = w.id
    LEFT JOIN status s ON r.eq_status = s.id
    WHERE r.id = :id";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    $repair = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($repair) {
        echo json_encode(['success' => true, 'data' => $repair]);
    } else {
        echo json_encode(['success' => false, 'message' => 'ไม่พบข้อมูล']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ไม่มี ID']);
}
?>