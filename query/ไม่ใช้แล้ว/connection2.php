<?php
$host = "localhost";
$port = "3306";
$database = "save_meeting_users";
$username = "root";
$password = "";
try {
  $pdo_users = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
  $pdo_users->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){}
?>