<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลผู้ป่วย</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
<style>

.container {
    width: 100%; 
    max-width: 1200px;
    margin-top: 60px; /* เพิ่มระยะห่างด้านบนมากขึ้น */
}
.custom-container {
    width: 100%;
    max-width: 12000px;
    margin: 30px auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    border: 1px solid #ddd;
    display: flex;
    flex-wrap: wrap; /* ให้ flex-wrap เพื่อให้ข้อมูลแสดงเป็น 2 คอลัมน์ */
    gap: 20px; /* เพิ่มระยะห่างระหว่างคอลัมน์และแถว */
}

.label-container {
    display: flex;
    width: calc(50% - 10px); แต่ละคอลัมน์ครอบคลุมครึ่งหนึ่งของความกว้าง
}

.field-name {
    font-weight: 700;
    font-size: 17px;
    color: #2c3e50;
    width: 200px;
    text-align: right; /* ให้ข้อความอยู่ทางซ้าย */
    margin-right: 10px;
}

.label-value {
    font-size: 17px;
    color: #34495e;
    flex: 1;
    text-align: left; /* ให้ข้อมูลแสดงอยู่ทางซ้าย */
}


    </style>
</head>
<body>

<?php
include 'db_connection.php';
include 'processFieldValues.php';


$fieldLabels = [
    'heart_rate' => 'อัตราการเต้นของหัวใจ : ',
    'pulse' => 'ชีพจร :',
    'respiration' => 'การหายใจ :',
    'blood_pressure' => 'ความดันโลหิต :',
    'fetal_heart_rate' => 'อัตราการเต้นหัวใจทารก :',
    'feeling_id' => 'ระดับความรู้สึก :',
    'breathing_id' => 'ลักษณะการหายใจ :',
    'hearting_id' => 'การทำงานของหัวใจ :',
    'nutrition_id' => 'ภาวะโภชนาการ :',
    'urination_id' => 'การขับถ่าย :',
    'complications_id' => 'ภาวะแทรกซ้อน :',
    'anxiety_id' => 'ความวิตกกังวล/เครียด :',
    'adjustment_id' => 'พฤติกรรมการปรับตัว :',
    'wound_id' => 'ลักษณะของแผล :',
    'pain_id' => 'ความเจ็บปวด :',
    'labor_id' => 'ความเจ็บปวดครรภ์/การดิ้นของทารกในครรภ์ :',
    'lochia_id' => 'ลักษณะน้ำคาวปลา :',
    'breast_id' => 'เต้านมและการไหลของน้ำคาวปลา :',
    'baby_id' => 'ลักษณะทารก :',
    'treatment_id' => 'อุปกรณ์การรักษาต่อเนื่อง :',
    'economy_id' => 'ภาวะเศรษฐกิจ :',
    'home_id' => 'ความพร้อมในการกลับบ้าน :',
    'returnhome_id' => 'คำแนะนำก่อนกลับบ้าน :',
    'activity_id' => 'การนัด follow up :',
    'discharge_info' => 'จำหน่าย :',
    'discharge_details' => 'รายละเอียดการจำหน่าย :',
    'patient_care_id' => 'ผู้ป่วยจำเป็นต้องได้รับการดูแลต่อเนื่องหรือไม่ :',
    'self_care_id' => 'เรื่องที่ต้องดูแลต่อเนื่องนั้นผู้ป่วยสามารถดูแลตนเองได้หรือไม่ :',
    'caregiver_data' => 'ผู้ที่ดูแลผู้ป่วย :',
    'internal_agency' => 'หน่วยงานภายในโรงพยาบาลที่จำเป็นต้องปรึกษาเพื่อการดูแลต่อเนื่อง :',
    'external_agency' => 'หน่วยงานภายนอกโรงพยาบาลที่จำเป็นต้องปรึกษาเพื่อการดูแลต่อเนื่อง :'
];

try {
    
$patient_id = isset($_GET['patient_id']) ? (int)$_GET['patient_id'] : 12; // Default to 4 if not provided



// SQL query to retrieve data from patient_records with joined information table for each field
$sql = "SELECT 
            pr.HN, pr.AN, pr.heart_rate, pr.pulse, pr.respiration, pr.blood_pressure, pr.fetal_heart_rate,
            pr.feeling_id, f.name AS feeling_name, pr.breathing_id, b.name AS breathing_name,
            pr.hearting_id, h.name AS hearting_name, pr.nutrition_id, n.name AS nutrition_name, pr.urination_id, u.name AS urination_name,
            pr.complications_id, c.name AS complications_name, pr.anxiety_id, a.name AS anxiety_name, pr.adjustment_id, ad.name AS adjustment_name,
            pr.wound_id, w.name AS wound_name, pr.pain_id, p.name AS pain_name, pr.labor_id, l.name AS labor_name, pr.lochia_id, lo.name AS lochia_name,
            pr.breast_id, br.name AS breast_name, pr.baby_id, ba.name AS baby_name, pr.treatment_id, t.name AS treatment_name,
            pr.economy_id, e.name AS economy_name, pr.home_id, ho.name AS home_name, pr.returnhome_id, r.name AS returnhome_name,
            pr.activity_id, act.name AS activity_name, pr.discharge_info, dc.name AS discharge_name, pr.discharge_details, dct.name AS discharge_details_name,
            pr.patient_care_id, ptc.name AS patient_name, pr.self_care_id, sc.name AS self_care_name, pr.caregiver_data, cg.name AS caregiver_name, pr.internal_agency, pr.external_agency
            FROM patient_records pr
            LEFT JOIN information f ON FIND_IN_SET(f.id, pr.feeling_id)
            LEFT JOIN information b ON FIND_IN_SET(b.id, pr.breathing_id) 
            LEFT JOIN information h ON FIND_IN_SET(h.id, pr.hearting_id) 
            LEFT JOIN information n ON FIND_IN_SET(n.id, pr.nutrition_id) 
            LEFT JOIN information u ON FIND_IN_SET(u.id, pr.urination_id) 
            LEFT JOIN information c ON FIND_IN_SET(c.id, pr.complications_id) 
            LEFT JOIN information a ON FIND_IN_SET(a.id, pr.anxiety_id) 
            LEFT JOIN information ad ON FIND_IN_SET(ad.id, pr.adjustment_id) 
            LEFT JOIN information w ON FIND_IN_SET(w.id, pr.wound_id) 
            LEFT JOIN information p ON FIND_IN_SET(p.id, pr.pain_id) 
            LEFT JOIN information l ON FIND_IN_SET(l.id, pr.labor_id) 
            LEFT JOIN information lo ON FIND_IN_SET(lo.id, pr.lochia_id) 
            LEFT JOIN information br ON FIND_IN_SET(br.id, pr.breast_id) 
            LEFT JOIN information ba ON FIND_IN_SET(ba.id, pr.baby_id) 
            LEFT JOIN information t ON FIND_IN_SET(t.id, pr.treatment_id) 
            LEFT JOIN information e ON FIND_IN_SET(e.id, pr.economy_id) 
            LEFT JOIN information ho ON FIND_IN_SET(ho.id, pr.home_id) 
            LEFT JOIN information r ON FIND_IN_SET(r.id, pr.returnhome_id) 
            LEFT JOIN information act ON FIND_IN_SET(act.id, pr.activity_id) 
            LEFT JOIN information dc ON FIND_IN_SET(dc.id, pr.discharge_info) 
            LEFT JOIN information dct ON FIND_IN_SET(dct.id, pr.discharge_details) 
            LEFT JOIN information ptc ON FIND_IN_SET(ptc.id, pr.patient_care_id) 
            LEFT JOIN information sc ON FIND_IN_SET(sc.id, pr.self_care_id) 
            LEFT JOIN information cg ON FIND_IN_SET(cg.id, pr.caregiver_data) 
            WHERE pr.id = :patient_id";

    $stmt = $conn->prepare($sql);
    $stmt->execute([':patient_id' => $patient_id]); // Using dynamic patient_id
    $result = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch data

    // ใช้ฟังก์ชัน processFieldValues เพื่อประมวลผล feeling_id
    $feelingNames = processFieldValues($conn, $result['feeling_id']); 
    $breathingNames = processFieldValues($conn, $result['breathing_id']); 
    $heartingNames = processFieldValues($conn, $result['hearting_id']);
    $nutritionNames = processFieldValues($conn, $result['nutrition_id']);
    $urinationNames = processFieldValues($conn, $result['urination_id']);
    $complicationsNames = processFieldValues($conn, $result['complications_id']);
    $anxietyNames = processFieldValues($conn, $result['anxiety_id']);
    $adjustmentNames = processFieldValues($conn, $result['adjustment_id']);
    $woundNames = processFieldValues($conn, $result['wound_id']);
    $painNames = processFieldValues($conn, $result['pain_id']);
    $laborNames = processFieldValues($conn, $result['labor_id']);
    $lochiaNames = processFieldValues($conn, $result['lochia_id']);
    $breastNames = processFieldValues($conn, $result['breast_id']);
    $babyNames = processFieldValues($conn, $result['baby_id']);
    $treatmentNames = processFieldValues($conn, $result['treatment_id']);
    $economyNames = processFieldValues($conn, $result['economy_id']);
    $homeNames = processFieldValues($conn, $result['home_id']);
    $returnhomeNames = processFieldValues($conn, $result['returnhome_id']);
    $activityNames = processFieldValues($conn, $result['activity_id']);
    $dischargeNames = processFieldValues($conn, $result['discharge_info']);
    $dischargedetailsNames = processFieldValues($conn, $result['discharge_details']);
    $patientNames = processFieldValues($conn, $result['patient_care_id']);
    $selfNames = processFieldValues($conn, $result['self_care_id']);
    $caregiverNames = processFieldValues($conn, $result['caregiver_data']);
    $internalagencyNames = processFieldValues($conn, $result['internal_agency']);
    $externalagencyNames = processFieldValues($conn, $result['external_agency']);

    
    echo '<div class="container">'; // Start container

    // Add the logo
    echo '<div class="logo">';
    echo '<img src="1.png" alt="Logo" />';
    echo '</div>'; // End logo
    
    // Title
    echo '<h1>ข้อมูลผู้ป่วย</h1>'; 

    if ($result) {

        echo '<div style="display: flex; justify-content: space-between; width: 100%;">';
        
        echo '<div style="flex: 1; text-align: right; padding-right: 30px;">';
        echo '<span class="field-name">HN : </span>';
        echo '<span class="field-value">' . htmlspecialchars($result['HN']) . '</span>';
        echo '</div>';
        
        echo '<div style="text-align: right; padding-right: 30px;">';
        echo '<span class="field-name">AN : </span>';
        echo '<span class="field-value">' . htmlspecialchars($result['AN']) . '</span>';
        echo '</div>';
        
        echo '</div>';
        


        
        echo '<div class="custom-container">';
        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['heart_rate']) . '</span>';
        echo '<span class="label-value">' . htmlspecialchars($result['heart_rate']) . '</span>';
        echo '</div>';
        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['pulse']) . '</span>';
        echo '<span class="label-value">' . htmlspecialchars($result['pulse']) . '</span>';
        echo '</div>';
        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['respiration']) . '</span>';
        echo '<span class="label-value">' . htmlspecialchars($result['respiration']) . '</span>';
        echo '</div>';
        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['blood_pressure']) . '</span>';
        echo '<span class="label-value">' . htmlspecialchars($result['blood_pressure']) . '</span>';
        echo '</div>';
        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['fetal_heart_rate']) . '</span>';
        echo '<span class="label-value">' . htmlspecialchars($result['fetal_heart_rate']) . '</span>';
        echo '</div>';
        echo '</div>';
        
        
        echo '<div class="custom-container">'; 
        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['feeling_id']) . '</span>';
        echo '<span class="label-value">' . implode(', ', $feelingNames) . '</span>';
        echo '</div>';

        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['breathing_id']) . '</span>';
        echo '<span class="label-value">' . implode(', ', $breathingNames) . '</span>';
        echo '</div>';

        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['hearting_id']) . '</span>';
        echo '<span class="label-value">';
        $heartingNamesArray = explode(', ', implode(', ', $heartingNames)); // แยกค่าออกมา
        foreach ($heartingNamesArray as $index => $name) {
            if ($index > 0) {
                echo '<div class="second-line">';
            }
            echo htmlspecialchars($name);
            if ($index > 0) {
                echo '</div>';
            }
        }
        echo '</span>';
        echo '</div>';

        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['nutrition_id']) . '</span>';
        echo '<span class="label-value">';
        $nutritionNamesArray = explode(', ', implode(', ', $nutritionNames)); // แยกค่าออกมา
        foreach ($nutritionNamesArray as $index => $name) {
            if ($index > 0) {
                echo '<div class="second-line">';
            }
            echo htmlspecialchars($name);
            if ($index > 0) {
                echo '</div>';
            }
        }
        echo '</span>';
        echo '</div>';

        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['urination_id']) . '</span>';
        echo '<span class="label-value">';
        $urinationNamesArray = explode(', ', implode(', ', $urinationNames)); // แยกค่าออกมา
        foreach ($urinationNamesArray as $index => $name) {
            if ($index > 0) {
                echo '<div class="second-line">';
            }
            echo htmlspecialchars($name);
            if ($index > 0) {
                echo '</div>';
            }
        }
        echo '</span>';
        echo '</div>';

        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['complications_id']) . '</span>';
        echo '<span class="label-value">';
        $complicationsNamesArray = explode(', ', implode(', ', $complicationsNames)); // แยกค่าออกมา
        foreach ($complicationsNamesArray as $index => $name) {
            if ($index > 0) {
                echo '<div class="second-line">';
            }
            echo htmlspecialchars($name);
            if ($index > 0) {
                echo '</div>';
            }
        }
        echo '</span>';
        echo '</div>';

        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['anxiety_id']) . '</span>';
        echo '<span class="label-value">' . implode(', ', $anxietyNames) . '</span>';
        echo '</div>';

        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['adjustment_id']) . '</span>';
        echo '<span class="label-value">' . implode(', ', $adjustmentNames) . '</span>';
        echo '</div>';

        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['wound_id']) . '</span>';
        echo '<span class="label-value">' . implode(', ', $woundNames) . '</span>';
        echo '</div>';

        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['pain_id']) . '</span>';
        echo '<span class="label-value">' . implode(', ', $painNames) . '</span>';
        echo '</div>';

    
        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['labor_id']) . '</span>';
        echo '<span class="label-value">';
        $laborNamesArray = explode(', ', implode(', ', $laborNames)); // แยกค่าออกมา
        foreach ($laborNamesArray as $index => $name) {
            if ($index > 0) {
                echo '<div class="second-line">';
            }
            echo htmlspecialchars($name);
            if ($index > 0) {
                echo '</div>';
            }
        }
        echo '</span>';
        echo '</div>';
        
        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['lochia_id']) . '</span>';
        echo '<span class="label-value">' . implode(', ', $lochiaNames) . '</span>';
        echo '</div>';
        
        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['baby_id']) . '</span>';
        echo '<span class="label-value">';
        $babyNamesArray = explode(', ', implode(', ', $babyNames)); // แยกค่าออกมา
        foreach ($babyNamesArray as $index => $name) {
            if ($index > 0) {
                echo '<div class="second-line">';
            }
            echo htmlspecialchars($name);
            if ($index > 0) {
                echo '</div>';
            }
        }
        echo '</span>';
        echo '</div>';
        
        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['treatment_id']) . '</span>';
        echo '<span class="label-value">';
        $treatmentNamesArray = explode(', ', implode(', ', $treatmentNames)); // แยกค่าออกมา
        foreach ($treatmentNamesArray as $index => $name) {
            if ($index > 0) {
                echo '<div class="second-line">';
            }
            echo htmlspecialchars($name);
            if ($index > 0) {
                echo '</div>';
            }
        }
        echo '</span>';
        echo '</div>';
        
        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['economy_id']) . '</span>';
        echo '<span class="label-value">';
        $economyNamesArray = explode(', ', implode(', ', $economyNames)); // แยกค่าออกมา
        foreach ($economyNamesArray as $index => $name) {
            if ($index > 0) {
                echo '<div class="second-line">';
            }
            echo htmlspecialchars($name);
            if ($index > 0) {
                echo '</div>';
            }
        }
        echo '</span>';
        echo '</div>';
        
        echo '<div class="label-container">';
        echo '<span class="field-name">' . htmlspecialchars($fieldLabels['home_id']) . '</span>';
        echo '<span class="label-value">' . implode(', ', $homeNames) . '</span>';
        echo '</div>';
        
        echo '</div>';
        


    
        echo '<div class="custom-container">';  
        

        echo '<div class="label-container" style="width: 100%;">';
        echo '<span class="field-name" style="">' . htmlspecialchars($fieldLabels['returnhome_id']) . '</span>';
        echo '<span class="label-value">';
        $returnhomeNamesArray = explode(', ', implode(', ', $returnhomeNames)); // แยกค่าออกมา
        foreach ($returnhomeNamesArray as $index => $name) {
            if ($index > 0) {
                echo '<div class="second-line" style="margin-left: 0px; margin-top: 7px; width:     ;">';
            }
            echo htmlspecialchars($name);
            if ($index > 0) {
                echo '</div>';
            }
        }
        echo '</span>';
        echo '</div>';
        echo '</div>';  
        

        echo '<div class="custom-container">';  
echo '<div class="label-container">';
echo '<span class="field-name">' . htmlspecialchars($fieldLabels['activity_id']) . '</span>';
echo '<span class="label-value">';
$activityNamesArray = explode(', ', implode(', ', $activityNames)); // แยกค่าออกมา
foreach ($activityNamesArray as $index => $name) {
    if ($index > 0) {
        echo '<div class="second-line" style="margin-top: 7px;">';
    }
    echo htmlspecialchars($name);
    if ($index > 0) {
        echo '</div>';
    }
}
echo '</span>';


echo '</div>';



echo '<div class="label-container">';
echo '<span class="field-name">' . htmlspecialchars($fieldLabels['discharge_info']) . '</span>';
echo '<span class="label-value">';
$dischargeinfoNamesArray = explode(', ', implode(', ', $dischargeNames)); // แยกค่าออกมา
foreach ($dischargeinfoNamesArray as $index => $name) {
    if ($index > 0) {
        echo '<div class="second-line" style="margin-top: 7px;">';
    }
    echo htmlspecialchars($name);
    if ($index > 0) {
        echo '</div>';
    }
}
echo '</span>';
echo '</div>';

echo '<div class="label-container">';
echo '<span class="field-name">' . htmlspecialchars($fieldLabels['discharge_details']) . '</span>';
echo '<span class="label-value">';
$dischargedetailsNamesArray = explode(', ', implode(', ', $dischargedetailsNames)); // แยกค่าออกมา
foreach ($dischargedetailsNamesArray as $index => $name) {
    if ($index > 0) {
        echo '<div class="second-line" style="margin-top: 7px;">';
    }
    echo htmlspecialchars($name);
    if ($index > 0) {
        echo '</div>';
    }
}
echo '</span>';
echo '</div>';

echo '</div>';

echo '<div class="custom-container">'; 
echo '<div class="label-container" style="width: 100%;">';
echo '<span class="field-name" style="width: 325px;">' . htmlspecialchars($fieldLabels['patient_care_id']) . '</span>';
echo '<span class="label-value">';
$patientNamesArray = explode(', ', implode(', ', $patientNames)); // แยกค่าออกมา
foreach ($patientNamesArray as $index => $name) {
    if ($index > 0) {
        echo '<div class="second-line" style="margin-top: 7px;">';
    }
    echo htmlspecialchars($name);
    if ($index > 0) {
        echo '</div>';
    }
}
echo '</span>';
echo '</div>';


echo '<div class="label-container" style="width: 100%;" >';
echo '<span class="field-name" style="width: 435px;">' . htmlspecialchars($fieldLabels['self_care_id']) . '</span>';
echo '<span class="label-value">' . implode(', ', $selfNames) . '</span>';
echo '</div>';


echo '<div class="label-container">';
echo '<span class="field-name" style="width: 103px; text-align: left;">' . htmlspecialchars($fieldLabels['caregiver_data']) . '</span>';
echo '<span class="label-value">';
$caregiverdataNamesArray = explode(', ', implode(', ', $caregiverNames)); // แยกค่าออกมา
foreach ($caregiverdataNamesArray as $index => $name) {
    if ($index > 0) {
        echo '<div class="second-line" style="margin-top: 7px;">';
    }
    echo htmlspecialchars($name);
    if ($index > 0) {
        echo '</div>';
    }
}
echo '</span>';
echo '</div>';

echo '<div class="label-container" style="width: 100%;">';
echo '<span class="field-name" style="width: 490px;">' . htmlspecialchars($fieldLabels['internal_agency']) . '</span>';
echo '<span class="label-value">';
$internalagencyNamesArray = explode(', ', implode(', ', $internalagencyNames)); // แยกค่าออกมา
foreach ($internalagencyNamesArray as $index => $name) {
    if ($index > 0) {
        echo '<div class="second-line" style="margin-top: 7px;">';
    }
    echo htmlspecialchars($name);
    if ($index > 0) {
        echo '</div>';
    }
}
echo '</span>';
echo '</div>';


echo '<div class="label-container" style="width: 100%;">';
echo '<span class="field-name" style="width: 505px;">' . htmlspecialchars($fieldLabels['external_agency']) . '</span>';
echo '<span class="label-value">';
$externalagencyNamesArray = explode(', ', implode(', ', $externalagencyNames)); // แยกค่าออกมา
foreach ($externalagencyNamesArray as $index => $name) {
    if ($index > 0) {
        echo '<div class="second-line" style="margin-top: 7px;">';
    }
    echo htmlspecialchars($name);
    if ($index > 0) {
        echo '</div>';
    }
}
echo '</span>';
echo '</div>';
echo '</div>';

        // Continue with other fields...

    } else {
        echo "<p class='text-center text-danger'>ไม่พบข้อมูลสำหรับ ID ผู้ป่วยที่ระบุ</p>";
    }

} catch (PDOException $e) {
    echo "<div class='container p-4 my-4 bg-light border rounded shadow'>";
    echo "<h1 class='text-center text-dark'>ข้อผิดพลาด</h1>";
    echo "</div>";
}
?>


</body>
</html>
