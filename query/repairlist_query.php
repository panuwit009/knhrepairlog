<?php
// repairlist_query.php
include('connection.php');

// แก้ไขไฟล์ repairlist_query.php
try {
    // รับพารามิเตอร์
    $itemsPerPage = isset($_GET['itemsPerPage']) ? (int)$_GET['itemsPerPage'] : 5;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $itemsPerPage;

    // คำนวณจำนวนรายการทั้งหมด
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM repairlist");
    $total = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

    // ดึงข้อมูลตามหน้าที่ต้องการ
    $query = "
        SELECT 
            r.rtimestamp as timestamp,
            r.eq_no,
            e.equipment_name,
            w.name_ward,
            s.name_status,
            r.eq_status
        FROM repairlist r
        LEFT JOIN equipment e ON r.equipment = e.id
        LEFT JOIN ward w ON r.ward = w.id
        LEFT JOIN status s ON r.eq_status = s.id
        ORDER BY r.rtimestamp DESC
        LIMIT :offset, :limit
    ";

    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $itemsPerPage, PDO::PARAM_INT);
    $stmt->execute();
    $repairlist = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // เพิ่มข้อมูลสำหรับ pagination
    $totalPages = ceil($total / $itemsPerPage);
    $startItem = $offset + 1;
    $endItem = min($offset + $itemsPerPage, $total);

    echo json_encode([
        'repairlist' => $repairlist,
        'total_items' => $total,
        'current_page' => $page,
        'total_pages' => $totalPages,
        'items_per_page' => $itemsPerPage,
        'start_item' => $startItem,
        'end_item' => $endItem
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>