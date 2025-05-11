<?php
include("query/connection.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // Get current year and last year sales data
    $query = "
        SELECT 
            DATE_FORMAT(sale_date, '%b') as month,
            YEAR(sale_date) as year,
            SUM(amount) as total_sales
        FROM sales
        WHERE YEAR(sale_date) IN (YEAR(CURRENT_DATE), YEAR(CURRENT_DATE) - 1)
        GROUP BY YEAR(sale_date), MONTH(sale_date)
        ORDER BY YEAR(sale_date), MONTH(sale_date)
    ";
    
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Process the data
    $currentYear = date('Y');
    $data = [
        'labels' => [],
        'currentYear' => [],
        'lastYear' => [],
        'totalSales' => 0,
        'growthRate' => 0
    ];
    
    $lastMonthSales = 0;
    $currentMonthSales = 0;
    
    foreach ($results as $row) {
        if (!in_array($row['month'], $data['labels'])) {
            $data['labels'][] = $row['month'];
        }
        
        if ($row['year'] == $currentYear) {
            $data['currentYear'][] = floatval($row['total_sales']);
            $data['totalSales'] += floatval($row['total_sales']);
            
            // Get last month and current month sales for growth rate
            if (count($data['currentYear']) >= 2) {
                $lastMonthSales = $data['currentYear'][count($data['currentYear']) - 2];
                $currentMonthSales = $data['currentYear'][count($data['currentYear']) - 1];
            }
        } else {
            $data['lastYear'][] = floatval($row['total_sales']);
        }
    }
    
    // Calculate growth rate
    if ($lastMonthSales > 0) {
        $data['growthRate'] = (($currentMonthSales - $lastMonthSales) / $lastMonthSales) * 100;
    }
    
    header('Content-Type: application/json');
    echo json_encode($data);
    
} catch (PDOException $e) {
    error_log("Database Error: " . $e->getMessage());
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['error' => $e->getMessage()]);
}