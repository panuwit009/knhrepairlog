<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}
session_start();
header('Content-Type: application/json');
include("connection.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sender_name = $_POST['sender_name'];
    $ward = $_POST['ward'];
    $equipment = $_POST['equipment'];
    $eq_no = $_POST['eq_no'];
    $eq_status = $_POST['eq_status'];
    $detail_component = $_POST['detail_component2'];
    $place = $_POST['place'];
    $res_depart = $_POST['res_depart'];
    $eq_type = $_POST['eq_type'];
    $eq_com = $_POST['eq_com'];

    error_log("sender_name: $sender_name, Ward: $ward, Equipment: $equipment, Equipment No: $eq_no, Equipment Status: $eq_status, detail_component: $detail_component, place: $place, res_depart: $res_depart, eq_type: $eq_type, eq_com: $eq_com");

    try {
        $stmt = $pdo->prepare("INSERT INTO repairlist (sender_name, ward, equipment, eq_no, eq_status, eq_status_timestamp, detail, rtimestamp, place, res_depart, eq_type, eq_com) 
        VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?, CURRENT_TIMESTAMP, ?, ?, ?, ?)");
        $stmt->execute([$sender_name, $ward, $equipment, $eq_no, $eq_status, $detail_component, $place, $res_depart, $eq_type, $eq_com]);

        $timestamp = $pdo->lastInsertId();

        $repair_id = $equipment . $ward . $place . $res_depart . '-' . $timestamp;

        $stmt2 = $pdo->prepare("UPDATE repairlist SET repair_id = ? WHERE id = ?");
        $stmt2->execute([$repair_id, $timestamp]);

        $stmt3 = $pdo->prepare("INSERT INTO status_log (eq_no, eq_status, eq_status_timestamp, repair_id) VALUES (?, ?, CURRENT_TIMESTAMP, ?)");
        $stmt3->execute([$eq_no, $eq_status, $repair_id]);

        echo json_encode(["success" => true, "message" => "กรอกข้อมูลสำเร็จ"]);
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "message" => $e->getMessage()]);
        exit();
    }
}

?>