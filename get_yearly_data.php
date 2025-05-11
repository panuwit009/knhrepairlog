<?php
require_once 'query/connection.php';

header('Content-Type: application/json');

$repairYear = isset($_GET['repairYear']) ? intval($_GET['repairYear']) : date('Y');

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // เตรียม array สำหรับเก็บจำนวนการแจ้งซ่อมรายเดือน
    $monthlyCount = array_fill(0, 12, 0);
    
    // query ข้อมูลรายเดือน
    $stmt = $pdo->prepare("
        SELECT MONTH(rtimestamp) as repair_month, COUNT(*) as repair_count 
        FROM repairlist 
        WHERE YEAR(rtimestamp) = :repairYear 
        GROUP BY MONTH(rtimestamp)
    ");
    
    $stmt->execute(['repairYear' => $repairYear]);
    
    // นำข้อมูลใส่ array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $monthlyCount[$row['repair_month'] - 1] = intval($row['repair_count']);
    }
    
    // สร้าง response
    $response = [
        'year' => $repairYear,
        'counts' => $monthlyCount
    ];
    
    echo json_encode($response);
    
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>