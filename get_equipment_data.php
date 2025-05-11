<?php
include('query/connection.php');

// ตรวจสอบว่ามีค่า GET ที่ส่งมาหรือไม่
if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];

    // ตรวจสอบว่าค่าวันที่เป็นรูปแบบที่ถูกต้อง
    if (!validateDate($start_date) || !validateDate($end_date)) {
        echo json_encode(['error' => 'รูปแบบวันที่ไม่ถูกต้อง']);
        exit;
    }

    $stmt = $pdo->prepare("
        SELECT e.equipment_name, COUNT(r.id) as count
        FROM equipment e
        LEFT JOIN repairlist r ON e.id = r.equipment 
        AND DATE(r.rtimestamp) BETWEEN :start_date AND :end_date
        GROUP BY e.id, e.equipment_name
    ");
    $stmt->execute(['start_date' => $start_date, 'end_date' => $end_date]);

} else if (isset($_GET['month'])) {
    $month = $_GET['month'];

    // ตรวจสอบว่าค่า month เป็นรูปแบบ YYYY-MM
    if (!preg_match('/^\d{4}-\d{2}$/', $month)) {
        echo json_encode(['error' => 'รูปแบบเดือนต้องเป็น YYYY-MM']);
        exit;
    }

    $stmt = $pdo->prepare("
        SELECT e.equipment_name, COUNT(r.id) as count
        FROM equipment e
        LEFT JOIN repairlist r ON e.id = r.equipment 
        AND DATE_FORMAT(r.rtimestamp, '%Y-%m') = :month
        GROUP BY e.id, e.equipment_name
    ");
    $stmt->execute(['month' => $month]);

} else {
    echo json_encode(['error' => 'กรุณาระบุช่วงวันที่หรือเดือน']);
    exit;
}

$equipment_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$response = [
    'labels' => array_column($equipment_data, 'equipment_name'),
    'data' => array_column($equipment_data, 'count')
];

header('Content-Type: application/json');
echo json_encode($response);


// ฟังก์ชันตรวจสอบรูปแบบวันที่ (YYYY-MM-DD)
function validateDate($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}
?>
