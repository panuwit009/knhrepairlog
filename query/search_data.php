    <?php
    include("connection.php");
    session_start();

    $userWard = $_SESSION['ward_id'];
    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
    $startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
    $endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';
    $equipmentId = isset($_GET['equipment']) ? $_GET['equipment'] : '';
    $statusId = isset($_GET['status']) && $_GET['status'] !== '' ? $_GET['status'] : null; 

    $response = array('success' => false, 'data' => []);

    try {
        $sql = "SELECT r.*, e.equipment_name, w.name_ward, s.name_status
        FROM repairlist r
        LEFT JOIN equipment e ON r.equipment = e.id
        LEFT JOIN ward w ON r.ward = w.id
        LEFT JOIN status s ON r.eq_status = s.id
        WHERE 1=1";

        // เงื่อนไขกรองข้อมูลตาม ward ของผู้ใช้
        if ($_SESSION['role'] !== 'admin') {
            $sql .= " AND r.ward = :user_ward";
        }

        // เงื่อนไขค้นหาต่างๆ
        if ($searchTerm) {
            $sql .= " AND r.eq_no LIKE :search";
        }
        if ($equipmentId && $equipmentId !== 'all') {
            $sql .= " AND r.equipment = :equipment";
        }
        if (isset($statusId) && $statusId !== 'all') {
            $sql .= " AND r.eq_status = :status";
        }

        if ($startDate && $endDate) {
            $sql .= " AND DATE(r.rtimestamp) BETWEEN :start_date AND :end_date";
        }

        $sql .= " ORDER BY r.rtimestamp DESC";

        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $params = [];
        if ($_SESSION['role'] !== 'admin') {
            $params[':user_ward'] = $userWard;
        }
        if ($searchTerm) {
            $params[':search'] = "%$searchTerm%";
        }
        if ($equipmentId && $equipmentId !== 'all') {
            $params[':equipment'] = $equipmentId;
        }
        if (isset($statusId) && $statusId !== 'all') {
            $params[':status'] = $statusId;
        }
        if ($startDate && $endDate) {
            $params[':start_date'] = $startDate;
            $params[':end_date'] = $endDate;
        }

        $stmt->execute($params);

        if ($stmt->rowCount() > 0) {
            while ($item = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Determine card styling based on status
                $cardClass = $headerClass = $textClass = '';
                switch ($item['eq_status']) {
                    case '4': // ซ่อมเสร็จแล้ว
                    case '5': // รับของแล้ว
                        $cardClass = 'card-success';
                        $headerClass = 'text-white';
                        $textClass = 'text-success';
                        break;
                    case '1': // กำลังดำเนินการ
                        $cardClass = 'card-warning';
                        $headerClass = 'text-white';
                        $textClass = 'text-warning';
                        break;
                    case '2': // ซ่อมแซมภายใน
                    case '3': // ส่งซ่อมภายนอก
                        $cardClass = 'card-orange';
                        $headerClass = 'text-white';
                        $textClass = 'text-orange';
                        break;
                    case '0': // รอการยืนยัน
                    default:
                        $cardClass = 'card-danger';
                        $headerClass = 'text-white';
                        $textClass = 'text-danger';
                        break;
                }

                // ตั้งค่า DateTime
                $timestamp = new DateTime($item['rtimestamp']);

                // สร้างอาร์เรย์เดือนภาษาไทย
                $thaiMonths = [
                    'January' => 'มกราคม',
                    'February' => 'กุมภาพันธ์',
                    'March' => 'มีนาคม',
                    'April' => 'เมษายน',
                    'May' => 'พฤษภาคม',
                    'June' => 'มิถุนายน',
                    'July' => 'กรกฎาคม',
                    'August' => 'สิงหาคม',
                    'September' => 'กันยายน',
                    'October' => 'ตุลาคม',
                    'November' => 'พฤศจิกายน',
                    'December' => 'ธันวาคม'
                ];

                // แปลงวันที่เป็นรูปแบบ 'วันที่ 19 มกราคม 2568'
                $monthEng = $timestamp->format('F'); // ดึงชื่อเดือนเป็นภาษาอังกฤษ
                $thaiMonth = $thaiMonths[$monthEng]; // แปลงชื่อเดือนเป็นภาษาไทย
                $thaiDate = $timestamp->format('d') . ' ' . $thaiMonth . ' ' . ($timestamp->format('Y') + 543); // แปลงปีเป็น พ.ศ.

                // สร้างข้อมูลใน array สำหรับการตอบกลับ
                $response['data'][] = [
                    'id' => $item['id'],
                    'eq_no' => htmlspecialchars($item['eq_no']),
                    'equipment' => htmlspecialchars($item['equipment_name']),
                    'ward' => htmlspecialchars($item['name_ward']),
                    'eq_status' => htmlspecialchars($item['eq_status']),
                    'status_name' => htmlspecialchars($item['name_status']),
                    'sender_name' => htmlspecialchars($item['sender_name']),
                    'update_date' => $thaiDate,  // วันที่ในรูปแบบไทย
                    'detail' => htmlspecialchars($item['detail']),
                    'cardClass' => $cardClass,
                    'headerClass' => $headerClass,
                    'textClass' => $textClass
                ];
            }
            $response['success'] = true;
        }
    } catch (PDOException $e) {
        $response['error'] = "Error: " . $e->getMessage();
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    ?>
