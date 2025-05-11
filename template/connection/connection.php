<?php

// ข้อมูลการเชื่อมต่อ
$host = "localhost";
$port = "3306"; // เพิ่มพอร์ตที่นี่
$database = "save_meeting";
$username = "root";
$password = "";

// สร้าง PDO object
try {
  $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected to the database successfully!";
} catch (PDOException $e) {
  // echo "Error connecting to the database: " . $e->getMessage();
}

?>
