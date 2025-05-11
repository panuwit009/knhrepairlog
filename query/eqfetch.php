<?php
include("connection.php");
header('Content-Type: application/json');

try {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $statusType = isset($_GET['status_type']) ? $_GET['status_type'] : null;

    $currentDate = date('Y-m-d');
    

    if ($id !== null) {
        $stmt = $pdo->prepare("
            SELECT 
                r.*,
                e.equipment_name, 
                w.name_ward, 
                p.name_place, 
                r_d.name_depart,
                s1.id AS eq_status_id, s1.name_status AS eq_status_name, 
                s2.id AS eq_status2_id, s2.name_status AS eq_status2_name,
                s3.id AS eq_status3_id, s3.name_status AS eq_status3_name,
                s0.id AS eq_status0_id, s0.name_status AS eq_status0_name,
                (SELECT sl.res_name 
                    FROM status_log sl 
                    WHERE sl.repair_id = r.repair_id 
                        AND sl.res_name IS NOT NULL 
                        AND sl.eq_status != 0
                    ORDER BY sl.eq_status_timestamp ASC
                    LIMIT 1) AS res_name
            FROM repairlist r
            LEFT JOIN equipment e ON r.equipment = e.id
            LEFT JOIN ward w ON r.ward = w.id
            LEFT JOIN place p ON r.place = p.id
            LEFT JOIN res_depart r_d ON r.res_depart = r_d.id
            LEFT JOIN status s1 ON r.eq_status = s1.id AND s1.type = 1
            LEFT JOIN status s2 ON r.eq_status = s2.id AND s2.type = 2
            LEFT JOIN status s3 ON r.eq_status = s3.id AND s3.type = 3
            LEFT JOIN status s0 ON r.eq_status = s0.id AND s0.type = 0
            WHERE r.id = :id
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    } else {
        if ($statusType !== null) {
            $stmt = $pdo->prepare("
                SELECT 
                    r.*,
                    e.equipment_name, 
                    w.name_ward, 
                    p.name_place, 
                    r_d.name_depart,
                    s1.id AS eq_status_id, s1.name_status AS eq_status_name, 
                    s2.id AS eq_status2_id, s2.name_status AS eq_status2_name,
                    s3.id AS eq_status3_id, s3.name_status AS eq_status3_name,
                    s0.id AS eq_status0_id, s0.name_status AS eq_status0_name,
                    (SELECT sl.res_name 
                    FROM status_log sl 
                    WHERE sl.repair_id = r.repair_id 
                        AND sl.res_name IS NOT NULL 
                        AND sl.eq_status != 0
                    ORDER BY sl.eq_status_timestamp ASC
                    LIMIT 1) AS res_name
                FROM repairlist r
                LEFT JOIN equipment e ON r.equipment = e.id
                LEFT JOIN ward w ON r.ward = w.id
                LEFT JOIN place p ON r.place = p.id
                LEFT JOIN res_depart r_d ON r.res_depart = r_d.id
                LEFT JOIN status s1 ON r.eq_status = s1.id AND s1.type = 1
                LEFT JOIN status s2 ON r.eq_status = s2.id AND s2.type = 2
                LEFT JOIN status s3 ON r.eq_status = s3.id AND s3.type = 3
                LEFT JOIN status s0 ON r.eq_status = s0.id AND s0.type = 0
                WHERE (s1.type = :statusType OR s2.type = :statusType OR s3.type = :statusType OR s0.type = :statusType)
                
            ");
            $stmt->bindParam(':statusType', $statusType, PDO::PARAM_INT);
            
        } else {
            $stmt = $pdo->prepare("
                SELECT 
                    r.*,
                    e.equipment_name, 
                    w.name_ward, 
                    p.name_place, 
                    r_d.name_depart,
                    s1.id AS eq_status_id, s1.name_status AS eq_status_name, 
                    s2.id AS eq_status2_id, s2.name_status AS eq_status2_name,
                    s3.id AS eq_status3_id, s3.name_status AS eq_status3_name,
                    s0.id AS eq_status0_id, s0.name_status AS eq_status0_name,
                    (SELECT sl.res_name 
                    FROM status_log sl 
                    WHERE sl.repair_id = r.repair_id 
                        AND sl.res_name IS NOT NULL 
                        AND sl.eq_status != 0
                    ORDER BY sl.eq_status_timestamp ASC
                    LIMIT 1) AS res_name
                FROM repairlist r
                LEFT JOIN equipment e ON r.equipment = e.id
                LEFT JOIN ward w ON r.ward = w.id
                LEFT JOIN place p ON r.place = p.id
                LEFT JOIN res_depart r_d ON r.res_depart = r_d.id
                LEFT JOIN status s1 ON r.eq_status = s1.id AND s1.type = 1
                LEFT JOIN status s2 ON r.eq_status = s2.id AND s2.type = 2
                LEFT JOIN status s3 ON r.eq_status = s3.id AND s3.type = 3
                LEFT JOIN status s0 ON r.eq_status = s0.id AND s0.type = 0
                
            ");
            
        }
    }
    
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $statusStmt0 = $pdo->prepare("SELECT id, name_status FROM status WHERE type = 0");
    $statusStmt0->execute();
    $statusOptions0 = $statusStmt0->fetchAll(PDO::FETCH_ASSOC);
    
    $statusStmt1 = $pdo->prepare("SELECT id, name_status FROM status WHERE type = 1");
    $statusStmt1->execute();
    $statusOptions1 = $statusStmt1->fetchAll(PDO::FETCH_ASSOC);

    $statusStmt2 = $pdo->prepare("SELECT id, name_status FROM status WHERE type = 2");
    $statusStmt2->execute();
    $statusOptions2 = $statusStmt2->fetchAll(PDO::FETCH_ASSOC);

    $statusStmt3 = $pdo->prepare("SELECT id, name_status FROM status WHERE type = 3");
    $statusStmt3->execute();
    $statusOptions3 = $statusStmt3->fetchAll(PDO::FETCH_ASSOC);

    if ($id !== null) {
        echo json_encode([
            "success" => true,
            "data" => $results ? $results[0] : null,
            "statusOptions0" => $statusOptions0,
            "statusOptions1" => $statusOptions1,
            "statusOptions2" => $statusOptions2,
            "statusOptions3" => $statusOptions3
        ]);
    } else {
        error_log("Fetched " . count($results) . " records from the database.");
        usort($results, function($a, $b) {
            return strtotime($b['eq_status_timestamp']) - strtotime($a['eq_status_timestamp']);
        });
        echo json_encode([
            "success" => true,
            "data" => $results,
            "statusOptions0" => $statusOptions0,
            "statusOptions1" => $statusOptions1,
            "statusOptions2" => $statusOptions2,
            "statusOptions3" => $statusOptions3
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);
}
?>