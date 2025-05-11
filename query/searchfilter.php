<?php
include("connection.php");

$records = isset($_POST['records']) ? $_POST['records'] : [];
$searchTerm = isset($_POST['search_term']) ? $_POST['search_term'] : null;
$startDate = isset($_POST['start_date']) ? $_POST['start_date'] : null;
$endDate = isset($_POST['end_date']) ? $_POST['end_date'] : null;
$equipmentId = isset($_POST['equipment_id']) ? $_POST['equipment_id'] : null;


$filteredRecords = $records;


if ($searchTerm !== null && $searchTerm !== "") {
    $filteredRecords = array_filter($filteredRecords, function($record) use ($searchTerm) {
        return strpos($record['eq_no'], $searchTerm) !== false;
    });
}

if ($startDate !== null && $startDate !== "") {
    $filteredRecords = array_filter($filteredRecords, function($record) use ($startDate) {
        return strtotime($record['eq_status_timestamp']) >= strtotime($startDate);
    });
}

if ($endDate !== null && $endDate !== "") {
    $filteredRecords = array_filter($filteredRecords, function($record) use ($endDate) {
        return strtotime($record['eq_status_timestamp']) <= strtotime($endDate);
    });
}

if ($equipmentId !== null && $equipmentId !== "") {
    $filteredRecords = array_filter($filteredRecords, function($record) use ($equipmentId) {
        return $record['equipment'] == $equipmentId;
    });
}

if (!empty($filteredRecords)) {
    echo json_encode([
        'success' => true,
        'data' => array_values($filteredRecords) 
    ]);
} else {
    echo json_encode([
        'success' => false,
        'error' => 'No records found matching the filters.'
    ]);
}
?>