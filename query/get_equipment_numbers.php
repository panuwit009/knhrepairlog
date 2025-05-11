<?php
// get_equipment_numbers.php
include("connection.php");
session_start();

try {
    $term = isset($_GET['term']) ? $_GET['term'] : '';
    
    $sql = "SELECT DISTINCT r.eq_no as value, 
            CONCAT(r.eq_no, ' - ', e.equipment_name) as label
            FROM repairlist r
            LEFT JOIN equipment e ON r.equipment = e.id
            WHERE 1=1";
    
    // ถ้าไม่ใช่ admin ให้ดูได้เฉพาะ ward ของตัวเอง
    if ($_SESSION['role'] !== 'admin') {
        $sql .= " AND r.ward = :ward_id";
    }
    
    // เพิ่มเงื่อนไขการค้นหา
    $sql .= " AND r.eq_no LIKE :term ORDER BY r.eq_no LIMIT 5";
    
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters
    $params = [':term' => "$term%"];
    if ($_SESSION['role'] !== 'admin') {
        $params[':ward_id'] = $_SESSION['ward_id'];
    }
    
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode($results);
    
} catch (PDOException $e) {
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['error' => $e->getMessage()]);
}
?>