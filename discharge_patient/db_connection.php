<?php
// db_connection.php

// ตั้งค่าการเชื่อมต่อ
$host = 'fdb1030.awardspace.net';
$dbname = '4551327_knhrepairsystem';
$username = '4551327_knhrepairsystem';
$password = '12345678Ab';

try {
    // สร้างการเชื่อมต่อแบบ PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // ตั้งค่า PDO ให้แสดงข้อผิดพลาดในรูปแบบ Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
} catch (PDOException $e) {
    // แสดงข้อผิดพลาดหากเชื่อมต่อล้มเหลว
    die("Connection failed: " . $e->getMessage());
}
?>
