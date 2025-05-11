<?php
// เริ่ม session (หากยังไม่ได้เริ่ม)
session_start();

// // ลบทุก session variables
// $_SESSION = array();

// ถ้าต้องการทำลาย session ทั้งหมดให้ใช้ session_destroy()
session_destroy();

// ส่งผู้ใช้ไปยังหน้า login (หรือหน้าที่คุณต้องการ)
header("Location: login.php");
exit;
?>