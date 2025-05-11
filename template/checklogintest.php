<?php
session_start();
header('Content-Type: application/json'); // เพิ่มบรรทัดนี้

require_once('connection/connection.php');

// ดึงค่าจากฟอร์ม
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// ใช้ parameterized query ในการป้องกัน SQL injection
$query = "SELECT * FROM users WHERE username = :username AND password = :password";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':password', $password, PDO::PARAM_STR);

// ทำการ execute query
$stmt->execute();

// ดึงผลลัพธ์
$results = $stmt->fetchAll(PDO::FETCH_ASSOC); // ใช้ fetchAll(PDO::FETCH_ASSOC)

if ($results) {
    $result = $results[0]; // ดึงข้อมูลจากผลลัพธ์แรก
    
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $result['role'];
    $_SESSION['role_menu'] = $result['role_menu'];

    echo json_encode(array("status" => true, "message" => "เข้าสู่ระบบสำเร็จ", "role_menu" => $result['role_menu']), JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(array("status" => false, "message" => "username หรือ password ไม่ถูกต้อง"), JSON_UNESCAPED_UNICODE);
}
?>
