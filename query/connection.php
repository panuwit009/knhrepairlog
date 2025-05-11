<?php
$host = "fdb1030.awardspace.net";
$port = "3306";
$database = "4551327_knhrepairsystem";
$username = "4551327_knhrepairsystem";
$password = "12345678Ab";
try {
  $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected to the database successfully!";
} catch (PDOException $e) {
  //echo "Error connecting to the database: " . $e->getMessage();
}
?>