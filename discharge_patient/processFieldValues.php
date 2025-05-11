<?php
// ฟังก์ชันนี้จะรับค่าจากฐานข้อมูลแล้วทำการแยกค่าสตริงแล้วดึงชื่อจากข้อมูลที่เกี่ยวข้อง
function processFieldValues($conn, $fieldValue) {
    $fieldValues = explode(',', $fieldValue); // แยกค่าที่มีเครื่องหมายจุลภาค
    $fieldNames = [];

    foreach ($fieldValues as $value) {
        $value = trim($value); // ตัดช่องว่าง
        if (is_numeric($value)) {
            // ถ้าค่าเป็นหมายเลข ให้ดึงชื่อจากตาราง information
            $stmt = $conn->prepare("SELECT name FROM information WHERE id = :id");
            $stmt->execute([':id' => $value]);
            $nameResult = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($nameResult) {
                $fieldNames[] = $nameResult['name'];
            }
        } else {
            // ถ้าค่าเป็นข้อความ ให้เพิ่มไปในรายการโดยตรง
            $fieldNames[] = $value;
        }
    }

    return $fieldNames; // คืนค่ารายการชื่อที่ได้
}
