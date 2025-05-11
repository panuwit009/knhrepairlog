<?php

// จำนวนการแจ้งซ่อมวันนี้
$today = date('Y-m-d');
$stmt = $pdo->prepare("SELECT COUNT(*) as count FROM repairlist WHERE DATE(rtimestamp) = ?");
$stmt->execute([$today]);
$today_count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

// จำนวนการแจ้งซ่อมเดือนนี้
$month = date('Y-m');
$stmt = $pdo->prepare("SELECT COUNT(*) as count FROM repairlist WHERE DATE_FORMAT(rtimestamp, '%Y-%m') = ?");
$stmt->execute([$month]);
$month_count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

// จำนวนการแจ้งซ่อมปีนี้
$year = date('Y');
$stmt = $pdo->prepare("SELECT COUNT(*) as count FROM repairlist WHERE YEAR(rtimestamp) = ?");
$stmt->execute([$year]);
$year_count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

// เพิ่มตัวแปรสำหรับเก็บเดือนที่เลือก
$selected_month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');

// ดึงข้อมูลจำนวนการซ่อมแยกตามอุปกรณ์ตามเดือนที่เลือก
$stmt = $pdo->prepare("
    SELECT e.equipment_name, COUNT(r.id) as count 
    FROM equipment e
    LEFT JOIN repairlist r ON e.id = r.equipment 
    AND DATE_FORMAT(r.rtimestamp, '%Y-%m') = ?
    GROUP BY e.id, e.equipment_name
");
$stmt->execute([$selected_month]);
$equipment_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$list = 'รายการ';

?>