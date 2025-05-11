<?php
include("connection.php");
header('Content-Type: application/json');

try {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $statusType = isset($_GET['status_type']) ? $_GET['status_type'] : null;
    $status = isset($_GET['eq_status']) ? $_GET['eq_status'] : null;

    $currentDate = date('Y-m-d');
    $date7DaysAgo = date('Y-m-d', strtotime('-7 days'));

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
        if ($status !== null) {
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
                WHERE 
                    r.eq_status = :eq_status
                    AND (
                        -- When status is 5, we check the timestamp condition
                        (:eq_status != 5) 
                        OR (r.eq_status = 5 AND r.eq_status_timestamp >= :date7DaysAgo)
                    )
            ");
            $stmt->bindParam(':eq_status', $status, PDO::PARAM_INT);
            $stmt->bindParam(':date7DaysAgo', $date7DaysAgo, PDO::PARAM_STR);




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
                WHERE (r.eq_status = 3 OR 
                      (r.eq_status = 5 AND r.eq_status_timestamp >= :date7DaysAgo))
            ");
            $stmt->bindParam(':date7DaysAgo', $date7DaysAgo, PDO::PARAM_STR);
        }
    }
    
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $statusStmt0 = $pdo->prepare("SELECT id, name_status FROM status WHERE id = 3");
    $statusStmt0->execute();
    $statusOptions0 = $statusStmt0->fetchAll(PDO::FETCH_ASSOC);
    
    $statusStmt1 = $pdo->prepare("SELECT id, name_status FROM status WHERE id = 5");
    $statusStmt1->execute();
    $statusOptions1 = $statusStmt1->fetchAll(PDO::FETCH_ASSOC);

    if ($id !== null) {
        echo json_encode([
            "success" => true,
            "data" => $results ? $results[0] : null,
            "statusOptions0" => $statusOptions0,
            "statusOptions1" => $statusOptions1
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
            "statusOptions1" => $statusOptions1
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);
}
?>