<?php
include 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $HN = $_POST['HN'];
    $AN = $_POST['AN'];

    // รับค่าจากฟอร์ม
    $heart_rate = $_POST['heart-rate'];
    $pulse = $_POST['pulse'];
    $respiration = $_POST['respiration'];
    $blood_pressure = $_POST['blood-pressure'];
    $fetal_heart_rate = $_POST['fetal-heart-rate'];

    // รับค่าความรู้สึก
    $feeling_ids = isset($_POST['feeling']) ? $_POST['feeling'] : '';
    $extra_feeling = isset($_POST['extra_feeling']) ? trim($_POST['extra_feeling']) : '';

    // สร้างตัวแปรสำหรับเก็บผลลัพธ์
    $feeling_id = '';

    // รวม ID ที่เลือก
    if (!empty($feeling_ids)) {
        $feeling_id .= implode(',', (array)$feeling_ids); // เก็บ ID ทั้งหมด
    }

    // เช็คถ้ามีการกรอกข้อมูลใน "อื่นๆ"
    if (!empty($extra_feeling)) {
        if (!empty($feeling_id)) {
            $feeling_id .= ','; // เพิ่ม comma หากมี ID ก่อนหน้า
        }

        
        $feeling_id .= $extra_feeling; // เก็บข้อความกรอก
    }

    // รับค่าความรู้สึก
    $breathing_ids = isset($_POST['breathing']) ? $_POST['breathing'] : '';
    $extra_breathing = isset($_POST['extra_breathing']) ? trim($_POST['extra_breathing']) : '';

    // สร้างตัวแปรสำหรับเก็บผลลัพธ์
    $breathing_id = '';

    // รวม ID ที่เลือก
    if (!empty($breathing_ids)) {
        $breathing_id .= implode(',', (array)$breathing_ids); // เก็บ ID ทั้งหมด
    }

    // เช็คถ้ามีการกรอกข้อมูลใน "อื่นๆ"
    if (!empty($extra_breathing)) {
        if (!empty($breathing_id)) {
            $breathing_id .= ','; // เพิ่ม comma หากมี ID ก่อนหน้า
        }
        $breathing_id .= $extra_breathing; // เก็บข้อความกรอก
    }

    // การทำงานของหัวใจ
    $hearting_ids = isset($_POST['hearting']) ? $_POST['hearting'] : [];
    $extra_hearting = isset($_POST['extra_hearting']) ? trim($_POST['extra_hearting']) : '';

    // สร้างตัวแปรสำหรับเก็บผลลัพธ์
    $hearting_id = [];

    // รวม ID ที่เลือกเป็น string
    if (!empty($hearting_ids)) {
        foreach ($hearting_ids as $id) {
            $hearting_id[] = $id; // เก็บ ID ทั้งหมด
        }
    }

    // เช็คถ้ามีการเลือก "อื่นๆ" และกรอกข้อมูล
    if (!empty($extra_hearting)) {
        // ถ้ากรอกข้อมูลใน "อื่นๆ" ให้เก็บค่าที่กรอก
        $hearting_id[] = $extra_hearting; // เก็บข้อความกรอก
    }

    // แปลงอาร์เรย์เป็นสตริง
    $hearting_id = implode(',', $hearting_id);

    $nutrition_ids = isset($_POST['nutrition']) ? $_POST['nutrition'] : [];
    $extra_nutrition = isset($_POST['extra_nutrition']) ? trim($_POST['extra_nutrition']) : '';

    // สร้างตัวแปรสำหรับเก็บผลลัพธ์
    $nutrition_id = [];

    // รวม ID ที่เลือกเป็น string
    if (!empty($nutrition_ids)) {
        foreach ($nutrition_ids as $id) {
            $nutrition_id[] = $id; // เก็บ ID ทั้งหมด
        }
    }

    // เช็คถ้ามีการเลือก "อื่นๆ" และกรอกข้อมูล
    if (!empty($extra_nutrition)) {
        // ถ้ากรอกข้อมูลใน "อื่นๆ" ให้เก็บค่าที่กรอก
        $nutrition_id[] = $extra_nutrition; // เก็บข้อความกรอก
    }

    // แปลงอาร์เรย์เป็นสตริง
    $nutrition_id = implode(',', $nutrition_id);

    $urination_ids = isset($_POST['urination']) ? $_POST['urination'] : [];
    $extra_urination = isset($_POST['extra_urination']) ? trim($_POST['extra_urination']) : '';

    // สร้างตัวแปรสำหรับเก็บผลลัพธ์
    $urination_id = [];

    // รวม ID ที่เลือกเป็น string
    if (!empty($urination_ids)) {
        foreach ($urination_ids as $id) {
            $urination_id[] = $id; // เก็บ ID ทั้งหมด
        }
    }

    // เช็คถ้ามีการเลือก "อื่นๆ" และกรอกข้อมูล
    if (!empty($extra_urination)) {
        // ถ้ากรอกข้อมูลใน "อื่นๆ" ให้เก็บค่าที่กรอก
        $urination_id[] = $extra_urination; // เก็บข้อความกรอก
    }

    // แปลงอาร์เรย์เป็นสตริง
    $urination_id = implode(',', $urination_id);
    
    // รับค่าภาวะแทรกซ้อน
    $complications_ids = isset($_POST['complications']) ? $_POST['complications'] : [];
    $extra_complications = isset($_POST['extra_complications']) ? trim($_POST['extra_complications']) : '';

    // สร้างตัวแปรสำหรับเก็บผลลัพธ์
    $complications_id = [];

    // รวม ID ที่เลือกเป็น string
    if (!empty($complications_ids)) {
        foreach ($complications_ids as $id) {
            $complications_id[] = $id; // เก็บ ID ทั้งหมด
        }
    }

    // เช็คถ้ามีการเลือก "อื่นๆ" และกรอกข้อมูล
    if (!empty($extra_complications)) {
        // ถ้ากรอกข้อมูลใน "อื่นๆ" ให้เก็บค่าที่กรอก
        $complications_id[] = $extra_complications; // เก็บข้อความกรอก
    }

    // แปลงอาร์เรย์เป็นสตริง
    $complications_id = implode(',', $complications_id);

    // รับค่าการทำงานของความวิตกกังวล/เครียด
    $anxiety_ids = isset($_POST['anxiety']) ? $_POST['anxiety'] : '';
    $extra_anxiety = isset($_POST['extra_anxiety']) ? $_POST['extra_anxiety'] : '';

    // เช็คถ้ามีการเลือก "อื่นๆ" และกรอกข้อมูล
    if (!empty($extra_anxiety)) {
        $anxiety_id = $extra_anxiety; // เก็บข้อความกรอก
    } else {
        // รวม ID ที่เลือกเป็น string
        $anxiety_id = is_array($anxiety_ids) ? implode(',', $anxiety_ids) : $anxiety_ids;
    }

    // รับค่าการทำงานของพฤติกรรมการปรับตัว
    $adjustment_ids = isset($_POST['adjustment']) ? $_POST['adjustment'] : '';
    $extra_adjustment = isset($_POST['extra_adjustment']) ? $_POST['extra_adjustment'] : '';

    // เช็คถ้ามีการเลือก "อื่นๆ" และกรอกข้อมูล
    if (!empty($extra_adjustment)) {
        $adjustment_id = $extra_adjustment; // เก็บข้อความกรอก
    } else {
        // รวม ID ที่เลือกเป็น string
        $adjustment_id = is_array($adjustment_ids) ? implode(',', $adjustment_ids) : $adjustment_ids;
    }

    // ลักษณะของแผล
    $wound_id = isset($_POST['wound_options']) ? $_POST['wound_options'] : '';
    $extra_wound = isset($_POST['extra_wound']) ? trim($_POST['extra_wound']) : '';
    $cut_wound = isset($_POST['cut_wound']) ? trim($_POST['cut_wound']) : '';

    // เช็คว่ามีค่าใน wound_id หรือไม่ ถ้ามีค่าใดเลือกไว้
    if (!empty($extra_wound)) {
        // ถ้ามีการกรอกในฟิลด์ "อื่นๆ" ให้เก็บค่าที่กรอกใน wound_id
        $wound_id = $extra_wound;
    } elseif (!empty($cut_wound)) {
        // ถ้ามีการกรอกในฟิลด์ "แผลแห้งดี" ให้เก็บค่าที่กรอกใน wound_id
        $wound_id = $cut_wound;
    }

    // ความเจ็บปวด
    $pain_id = isset($_POST['pain']) ? $_POST['pain'] : '';
    $extra_pain = isset($_POST['extra_pain']) ? trim($_POST['extra_pain']) : '';
    $able_pain = isset($_POST['able_pain']) ? trim($_POST['able_pain']) : '';

    // เช็คว่ามีค่าใน wound_id หรือไม่ ถ้ามีค่าใดเลือกไว้
    if (!empty($extra_pain)) {
        // ถ้ามีการกรอกในฟิลด์ "อื่นๆ" ให้เก็บค่าที่กรอกใน wound_id
        $pain_id = $extra_pain;
    } elseif (!empty($able_pain)) {
        // ถ้ามีการกรอกในฟิลด์ "แผลแห้งดี" ให้เก็บค่าที่กรอกใน wound_id
        $pain_id = $able_pain;
    }
    
    // การเจ็บครรภ์
    $labor_ids = isset($_POST['labor']) ? $_POST['labor'] : [];
    $extra_labor = isset($_POST['extra_labor']) ? trim($_POST['extra_labor']) : '';

    // สร้างตัวแปรสำหรับเก็บผลลัพธ์
    $labor_id = [];

    // รวม ID ที่เลือกเป็น string
    if (!empty($labor_ids)) {
        foreach ($labor_ids as $id) {
            $labor_id[] = $id; // เก็บ ID ทั้งหมด
        }
    }

    // เช็คถ้ามีการเลือก "อื่นๆ" และกรอกข้อมูล
    if (!empty($extra_labor)) {
        // ถ้ากรอกข้อมูลใน "อื่นๆ" ให้เก็บค่าที่กรอก
        $labor_id[] = $extra_labor; // เก็บข้อความกรอก
    }

    // แปลงอาร์เรย์เป็นสตริง
    $labor_id = implode(',', $labor_id);

    // ความเจ็บปวด
    $lochia_id = isset($_POST['lochia']) ? $_POST['lochia'] : '';
    $extra_lochia = isset($_POST['extra_lochia']) ? trim($_POST['extra_lochia']) : '';
    $abnormal_lochia = isset($_POST['abnormal_lochia']) ? trim($_POST['abnormal_lochia']) : '';

    // เช็คว่ามีค่าใน wound_id หรือไม่ ถ้ามีค่าใดเลือกไว้
    if (!empty($extra_lochia)) {
        // ถ้ามีการกรอกในฟิลด์ "อื่นๆ" ให้เก็บค่าที่กรอกใน wound_id
        $lochia_id = $extra_lochia;
    } elseif (!empty($abnormal_lochia)) {
        // ถ้ามีการกรอกในฟิลด์ "แผลแห้งดี" ให้เก็บค่าที่กรอกใน wound_id
        $lochia_id = $abnormal_lochia;
    }

    // รับค่าความรู้สึก
    $baby_ids = isset($_POST['baby']) ? $_POST['baby'] : [];

    // รวม ID ที่เลือกเป็นสตริงคั่นด้วย ','
    $baby_id = !empty($baby_ids) ? implode(',', (array)$baby_ids) : '';


    // รับค่าการทำงานของ
    $breast_id = isset($_POST['breast']) ? $_POST['breast'] : '';
    $extra_breast = isset($_POST['extra_breast']) ? $_POST['extra_breast'] : '';
    $abnormal_breast = isset($_POST['abnormal_breast']) ? $_POST['abnormal_breast'] : ''; 

    // เช็คว่ามีค่าใน wound_id หรือไม่ ถ้ามีค่าใดเลือกไว้
    if (!empty($extra_breast)) {
        // ถ้ามีการกรอกในฟิลด์ "อื่นๆ" ให้เก็บค่าที่กรอกใน wound_id
        $breast_id = $extra_breast;
    } elseif (!empty($abnormal_breast)) {
        // ถ้ามีการกรอกในฟิลด์ "แผลแห้งดี" ให้เก็บค่าที่กรอกใน wound_id
        $breast_id = $abnormal_breast;
    }

    // รับค่าการทำงานของอุปกรณ์การรักษาต่อเนื่อง
    $treatment_ids = isset($_POST['treatment']) ? $_POST['treatment'] : [];
    $extra_treatment = isset($_POST['extra_treatment']) ? trim($_POST['extra_treatment']) : '';

    // สร้างตัวแปรสำหรับเก็บผลลัพธ์
    $treatment_id = [];

    // รวม ID ที่เลือกเป็น string
    if (!empty($treatment_ids)) {
        foreach ($treatment_ids as $id) {
            $treatment_id[] = $id; // เก็บ ID ทั้งหมด
        }
    }

    // เช็คถ้ามีการเลือก "อื่นๆ" และกรอกข้อมูล
    if (!empty($extra_treatment)) {
        // ถ้ากรอกข้อมูลใน "อื่นๆ" ให้เก็บค่าที่กรอก
        $treatment_id[] = $extra_treatment; // เก็บข้อความกรอก
    }

    // แปลงอาร์เรย์เป็นสตริง
    $treatment_id = implode(',', $treatment_id);

    
    $economy_ids = isset($_POST['economy']) ? $_POST['economy'] : [];
    $extra_economy = isset($_POST['extra_economy']) ? trim($_POST['extra_economy']) : '';

    // สร้างตัวแปรสำหรับเก็บผลลัพธ์
    $economy_id = [];

    // รวม ID ที่เลือกเป็น string
    if (!empty($economy_ids)) {
        foreach ($economy_ids as $id) {
            $economy_id[] = $id; // เก็บ ID ทั้งหมด
        }
    }

    // เช็คถ้ามีการเลือก "อื่นๆ" และกรอกข้อมูล
    if (!empty($extra_economy)) {
        // ถ้ากรอกข้อมูลใน "อื่นๆ" ให้เก็บค่าที่กรอก
        $economy_id[] = $extra_economy; // เก็บข้อความกรอก
    }

    // แปลงอาร์เรย์เป็นสตริง
    $economy_id = implode(',', $economy_id);

    // รับค่าการทำงานของ
    $home_ids = isset($_POST['home']) ? $_POST['home'] : '';
    $extra_home = isset($_POST['extra_home']) ? $_POST['extra_home'] : '';
    // เช็คถ้ามีการเลือก "อื่นๆ" และกรอกข้อมูล
    if (!empty($extra_home)) {
        $home_id = $extra_home; // เก็บข้อความกรอก
    } else  {

        // รวม ID ที่เลือกเป็น string
        $home_id = is_array($home_ids) ? implode(',', $home_ids) : $home_ids;
    }

    // รับค่าการทำงานของ
    $returnhome_ids = isset($_POST['returnhome']) ? $_POST['returnhome'] : '';
    $extra_returnhome = isset($_POST['extra_returnhome']) ? $_POST['extra_returnhome'] : '';

    // รวม ID ที่เลือกเป็น string
    $returnhome_id = is_array($returnhome_ids) ? implode(',', $returnhome_ids) : $returnhome_ids;

    // ตรวจสอบหากมีการกรอกข้อมูลในฟิลด์ "อื่นๆ"
    if (!empty($extra_returnhome)) {
        // ถ้ามีการเลือก ID อยู่แล้ว ให้ต่อข้อความจาก "อื่นๆ" ด้านหลัง
        $returnhome_id .= ',' . $extra_returnhome;
    }

    $activity_ids = isset($_POST['activity']) ? $_POST['activity'] : '';
    $extra_activity = isset($_POST['extra_activity']) ? $_POST['extra_activity'] : '';
    $appointment_date = isset($_POST['appointment_date']) ? $_POST['appointment_date'] : '';
    $appointment_time = isset($_POST['appointment_time']) ? $_POST['appointment_time'] : '';
    $doctor = isset($_POST['doctor']) ? $_POST['doctor'] : '';
    $room = isset($_POST['room']) ? $_POST['room'] : '';
    $task = isset($_POST['task']) ? $_POST['task'] : '';
    
    // เพิ่มคำว่า "โมง" ต่อท้ายเวลา หาก $appointment_time ไม่ว่าง
    if (!empty($appointment_time)) {
        $appointment_time .= ' โมง';
    }
    
    // รวม ID ที่เลือกเป็น string
    $activity_id_str = is_array($activity_ids) ? implode(',', $activity_ids) : $activity_ids;
    
    // ตรวจสอบหากมีการกรอกข้อมูลในฟิลด์ "Refer"
    if (!empty($extra_activity)) {
        $activity_id_str .= !empty($activity_id_str) ? ',' . $extra_activity : $extra_activity; // ถ้ามีการกรอก ให้ต่อข้อความจาก "Refer" ด้านหลัง
    }
    
    // ตรวจสอบหากมีการกรอกข้อมูลในฟิลด์ "นัดวันที่"
    if (!empty($appointment_date) || !empty($appointment_time) || !empty($doctor) || !empty($room) || !empty($task)) {
        // สร้าง array ของข้อมูล appointment
        $appointment_details = array_filter([$appointment_date, $appointment_time, $doctor, $room, $task]);
        
        // ถ้ามีมากกว่าหนึ่งค่าจะใช้ implode แต่ถ้ามีแค่ค่าเดียวจะไม่ใส่คอมม่า
        $appointment_details_str = count($appointment_details) > 1 ? implode(',', $appointment_details) : reset($appointment_details);
        
        // ต่อข้อมูลนัดวันที่ด้านหลัง
        $activity_id_str .= !empty($activity_id_str) ? ',' . $appointment_details_str : $appointment_details_str;
    }  
    
    $discharge_date = isset($_POST['discharge_date']) && $_POST['discharge_date'] !== '' ? $_POST['discharge_date'] : null; // วันที่
    $discharge_time = isset($_POST['discharge_time']) && $_POST['discharge_time'] !== '' ? $_POST['discharge_time'] : null; // เวลา
    
    // รวบรวมค่าจาก checkbox
    $cars = isset($_POST['car']) ? $_POST['car'] : []; // ตรวจสอบว่ามีการส่งค่า car มาหรือไม่
    
    // ทำให้แน่ใจว่า $cars เป็นอาร์เรย์
    if (!is_array($cars)) {
        $cars = [$cars]; // เปลี่ยนให้เป็นอาร์เรย์ถ้าจำเป็น
    }
    
    // ถ้ามีค่ามากกว่าหนึ่งให้ใช้ implode, ถ้ามีค่าเดียวให้ใช้ค่าตัวแรก
    $car_values = !empty($cars) ? (count($cars) > 1 ? implode(',', $cars) : reset($cars)) : null;
    
    // สร้าง string ที่จะเก็บในฟิลด์เดียว
    $discharge_info = trim("$discharge_date,$discharge_time,$car_values", ',');  // ใช้ trim เพื่อลบคอมมาที่ไม่ต้องการ

    $caregiver_id = isset($_POST['caregiver']) ? $_POST['caregiver'] : null; // ผู้ดูแล
    $extra_caregiver = isset($_POST['extra_caregiver']) ? $_POST['extra_caregiver'] : null; // ข้อความที่ระบุเพิ่มเติม
    $caregiver_options = isset($_POST['caregiver-options']) ? $_POST['caregiver-options'] : []; // ตัวเลือก "พร้อมให้การดูแล" หรือ "ไม่พร้อมให้การดูแล"
    $not_ready_input = isset($_POST['not_ready_input']) ? $_POST['not_ready_input'] : null; // ข้อความกรอกเมื่อไม่พร้อมให้การดูแล
    
    // สร้างตัวแปรที่จะเก็บค่าทั้งหมด
    $caregiver_values = [];
    
    // เช็คค่าที่กรอกหรือเลือก
    if ($extra_caregiver) {
        // ถ้าเลือก "มี" และกรอกข้อความเพิ่มเติม
        $caregiver_values[] = "$extra_caregiver"; // ใช้ค่าที่กรอกใน input
    } elseif ($caregiver_id) {
        // ถ้าไม่กรอก input ให้ใช้ค่า caregiver_id
        $caregiver_values[] = "$caregiver_id"; 
    }
    
    // ถ้าเลือก "พร้อมให้การดูแล"
    if (in_array('ready', $caregiver_options)) {
        $caregiver_values[] = "พร้อมให้การดูแล";
    }
    
    // ถ้าเลือก "ไม่พร้อมให้การดูแล" และกรอกข้อความ
    if (in_array('not_ready', $caregiver_options) && $not_ready_input) {
        $caregiver_values[] = $not_ready_input;
    }
    
    // รวบรวมค่าทั้งหมด
    $caregiver_info = implode(', ', $caregiver_values);
    
    // สร้าง string ที่จะเก็บในฟิลด์เดียว
    $caregiver_info = trim($caregiver_info, ', '); // ใช้ trim เพื่อลบคอมมาที่ไม่ต้องการ
    
        
    // รวบรวมค่าจาก checkbox และฟิลด์อื่น ๆ
    $idcard_values = isset($_POST['idcard']) ? $_POST['idcard'] : []; // ค่าจาก idcard
    $id_number = isset($_POST['id_number']) ? $_POST['id_number'] : ''; // เลขที่
    $issued_by = isset($_POST['issued_by']) ? $_POST['issued_by'] : ''; // ออกโดย
    $discharge_type_values = isset($_POST['discharge_type']) ? $_POST['discharge_type'] : []; // ประเภทการจำหน่าย
    $extra_discharge = isset($_POST['extra_discharge']) ? $_POST['extra_discharge'] : ''; // ข้อมูลเพิ่มเติม
    $other_discharge = isset($_POST['other_discharge']) ? $_POST['other_discharge'] : ''; // ข้อมูลอื่น ๆ

    // รวบรวมค่าทั้งหมดในอาร์เรย์
    $combined_array = array_merge($idcard_values, [$id_number, $issued_by], $discharge_type_values, [$extra_discharge, $other_discharge]);

    // กรองค่าที่ว่างออกจากอาร์เรย์
    $filtered_values = array_filter($combined_array, function($value) {
        return !empty($value); // คืนค่า true หากไม่ว่าง
    });

    // รวมค่าที่กรองแล้วเป็นสตริงโดยใช้คอมม่า
    $combined_values = implode(',', $filtered_values);
    
    $care_ids = isset($_POST['continuing_care']) ? $_POST['continuing_care'] : '';
    $care_id = is_array($care_ids) ? implode(',', $care_ids) : $care_ids;
    $care_needed = isset($_POST['extra_care']) ? $_POST['extra_care'] : '';

        // ตรวจสอบว่ามีการเลือก "other_discharge" และมีการกรอกข้อมูลในฟิลด์ "อื่นๆ"
    if (!empty($care_needed)) {
        // ถ้ามีการกรอกข้อมูลในฟิลด์ "อื่นๆ" ให้เก็บค่าลงใน discharge_id
        $care_id = $care_needed;
    } else {
        // ถ้าไม่มีการกรอกข้อมูลใน "อื่นๆ" ให้รวมค่า ID ที่เลือกเป็น string
        $care_id = is_array($care_ids) ? implode(',', $care_ids) : $care_ids;
    }
// รับค่าจากฟอร์ม
$patient_care_ids = isset($_POST['patient_care']) ? (array)$_POST['patient_care'] : ''; // ทำให้เป็น array หากเป็น string
$medicine = isset($_POST['extra_medicine']) ? $_POST['extra_medicine'] : ''; // ค่า input ของยา
$environment = isset($_POST['extra_environment']) ? $_POST['extra_environment'] : ''; // ค่า input สิ่งแวดล้อม
$cares = isset($_POST['extra_cares']) ? $_POST['extra_cares'] : ''; // ค่า input การดูแล
$health = isset($_POST['extra_health_condition']) ? $_POST['extra_health_condition'] : ''; // ค่า input ภาวะสุขภาพ
$shot = isset($_POST['extra_shot']) ? $_POST['extra_shot'] : ''; // ค่า input การมาตรวจตามนัด
$food = isset($_POST['extra_food']) ? $_POST['extra_food'] : ''; // ค่า input อาหาร
$o = isset($_POST['extra_o']) ? $_POST['extra_o'] : ''; // ค่า input อื่นๆ

// เช็คว่ามีการกรอกข้อมูลในฟิลด์ที่เกี่ยวข้องกับ "จำเป็น" หรือไม่
if (!empty($medicine) || !empty($environment) || !empty($cares) || !empty($health) || !empty($shot) || !empty($food) || !empty($o)) {
    // ถ้ามีการกรอกข้อมูลในฟิลด์ต่างๆ ที่แสดงเมื่อเลือก "จำเป็น"
    $patient_care_ids = ''; // เริ่มต้นเป็นค่าว่าง เพื่อไม่เก็บค่า id ของ "จำเป็น"
    if (!empty($medicine)) {
        $patient_care_ids .= $medicine;
    }
    if (!empty($environment)) {
        $patient_care_ids .= ',' . $environment;
    }
    if (!empty($cares)) {
        $patient_care_ids .= ',' . $cares;
    }
    if (!empty($health)) {
        $patient_care_ids .= ',' . $health;
    }
    if (!empty($shot)) {
        $patient_care_ids .= ',' . $shot;
    }
    if (!empty($food)) {
        $patient_care_ids .= ',' . $food;
    }
    if (!empty($o)) {
        $patient_care_ids .= ',' . $o;
    }
} else {
    // ถ้าไม่มีการกรอกข้อมูลในฟิลด์เหล่านี้ ให้ใช้ค่า id ของ patient_care
    if (!empty($_POST['patient_care'])) {
        // เช็คว่า patient_care มีหลายค่าหรือไม่
        $patient_care_ids = is_array($_POST['patient_care']) ? implode(',', $_POST['patient_care']) : $_POST['patient_care'];
    }
}

// ตัดเครื่องหมายจุลภาคที่ไม่จำเป็นออก
$patient_care_ids = trim($patient_care_ids, ','); // ถ้ามีค่าหลายค่าให้รวมกันเป็นคอมมาส




    
    // รับค่าการทำงานของ
    $self_care_ids = isset($_POST['self_care']) ? $_POST['self_care'] : ''; // รับค่าจากฟอร์ม

    // ถ้ามีการเลือก ID
    if (!empty($self_care_ids)) {
        $self_care_id = $self_care_ids; // เก็บ ID ที่เลือก
    } else {
        $self_care_id = ''; // ถ้าไม่มีการเลือกให้ตั้งค่าเป็นค่าว่าง
    }

    $internal_agency_1 = isset($_POST['internal_agency_1']) ? $_POST['internal_agency_1'] : '';
    $internal_agency_2 = isset($_POST['internal_agency_2']) ? $_POST['internal_agency_2'] : '';

    // รวมค่าจากฟอร์มเป็นสตริงเดียว โดยถ้ามีค่ามากกว่าหนึ่งก็จะใช้คอมมาส
    $internal_agency = implode(',', array_filter([$internal_agency_1, $internal_agency_2]));

    // ถ้ามีค่าเดียว ให้แสดงแค่ค่านั้น
    if (substr_count($internal_agency, ',') == 0) {
        $internal_agency = $internal_agency_1 ?: $internal_agency_2;
    }

    $external_agency_1 = isset($_POST['external_agency_1']) ? $_POST['external_agency_1'] : '';
    $external_agency_2 = isset($_POST['external_agency_2']) ? $_POST['external_agency_2'] : '';

    $external_agency = implode(',', array_filter([$external_agency_1, $external_agency_2]));

    // ถ้ามีค่าเดียว ให้แสดงแค่ค่านั้น
    if (substr_count($external_agency, ',') == 0) {
        $external_agency = $external_agency_1 ?: $external_agency_2;
    }


    // สร้างคำสั่ง SQL เพื่อบันทึกข้อมูลลงตาราง patient_records
    $sql = "INSERT INTO patient_records 
                        (HN,
                        AN,
                        heart_rate, 
                        pulse, 
                        respiration, 
                        blood_pressure, 
                        fetal_heart_rate, 
                        feeling_id, 
                        breathing_id, 
                        hearting_id, 
                        nutrition_id, 
                        urination_id, 
                        complications_id, 
                        anxiety_id, 
                        adjustment_id, 
                        wound_id, 
                        pain_id, 
                        labor_id, 
                        lochia_id, 
                        breast_id, 
                        baby_id, 
                        treatment_id, 
                        economy_id, 
                        home_id, 
                        returnhome_id, 
                        activity_id,
                        discharge_info,
                        discharge_details,
                        caregiver_data,
                        patient_care_id,
                        self_care_id,
                        internal_agency, 
                        external_agency) 
            VALUES  (:HN,
                    :AN,
                    :heart_rate, 
                    :pulse, 
                    :respiration, 
                    :blood_pressure, 
                    :fetal_heart_rate, 
                    :feeling_id, 
                    :breathing_id, 
                    :hearting_id, 
                    :nutrition_id, 
                    :urination_id, 
                    :complications_id, 
                    :anxiety_id, 
                    :adjustment_id, 
                    :wound_id, 
                    :pain_id, 
                    :labor_id, 
                    :lochia_id, 
                    :breast_id, 
                    :baby_id, 
                    :treatment_id, 
                    :economy_id, 
                    :home_id, 
                    :returnhome_id, 
                    :activity_id,
                    :discharge_info,
                    :discharge_details,
                    :caregiver_data,
                    :patient_care_id,
                    :self_care_id,
                    :internal_agency, 
                    :external_agency)";

    try {
        // เตรียม statement
        $stmt = $conn->prepare($sql); 

        $stmt->bindParam(':HN', $HN, PDO::PARAM_INT);
        $stmt->bindParam(':AN', $AN, PDO::PARAM_INT);
        $stmt->bindParam(':heart_rate', $heart_rate, PDO::PARAM_INT);
        $stmt->bindParam(':pulse', $pulse, PDO::PARAM_INT);
        $stmt->bindParam(':respiration', $respiration, PDO::PARAM_INT);
        $stmt->bindParam(':blood_pressure', $blood_pressure, PDO::PARAM_INT);
        $stmt->bindParam(':fetal_heart_rate', $fetal_heart_rate, PDO::PARAM_INT);
        $stmt->bindParam(':feeling_id', $feeling_id, PDO::PARAM_STR);
        $stmt->bindParam(':breathing_id', $breathing_id, PDO::PARAM_STR);
        $stmt->bindParam(':hearting_id', $hearting_id, PDO::PARAM_STR);
        $stmt->bindParam(':nutrition_id', $nutrition_id, PDO::PARAM_STR);
        $stmt->bindParam(':urination_id', $urination_id, PDO::PARAM_STR);
        $stmt->bindParam(':complications_id', $complications_id, PDO::PARAM_STR);
        $stmt->bindParam(':anxiety_id', $anxiety_id, PDO::PARAM_STR);
        $stmt->bindParam(':adjustment_id', $adjustment_id, PDO::PARAM_STR);
        $stmt->bindParam(':wound_id', $wound_id, PDO::PARAM_STR);
        $stmt->bindParam(':pain_id', $pain_id, PDO::PARAM_STR);
        $stmt->bindParam(':labor_id', $labor_id, PDO::PARAM_STR);
        $stmt->bindParam(':lochia_id', $lochia_id, PDO::PARAM_STR);
        $stmt->bindParam(':breast_id', $breast_id, PDO::PARAM_STR);
        $stmt->bindParam(':baby_id', $baby_id, PDO::PARAM_STR);
        $stmt->bindParam(':treatment_id', $treatment_id, PDO::PARAM_STR);
        $stmt->bindParam(':economy_id', $economy_id, PDO::PARAM_STR);
        $stmt->bindParam(':home_id', $home_id, PDO::PARAM_STR);
        $stmt->bindParam(':returnhome_id', $returnhome_id, PDO::PARAM_STR);
        $stmt->bindParam(':activity_id', $activity_id_str, PDO::PARAM_STR); 
        $stmt->bindParam(':discharge_info', $discharge_info, PDO::PARAM_STR);
        $stmt->bindParam(':discharge_details', $combined_values, PDO::PARAM_STR);
        $stmt->bindParam(':caregiver_data', $caregiver_info);
        $stmt->bindParam(':patient_care_id', $patient_care_ids, PDO::PARAM_STR);
        $stmt->bindParam(':self_care_id', $self_care_id, PDO::PARAM_INT);
        $stmt->bindParam(':internal_agency', $internal_agency, PDO::PARAM_STR);
        $stmt->bindParam(':external_agency', $external_agency, PDO::PARAM_STR);
        
        // 
        // Execute statement
        if ($stmt->execute()) {
            $_SESSION['message'] = "บันทึกข้อมูลเรียบร้อยแล้ว";
            header("Location: ui.php"); // กลับไปยังหน้า ui.php
            exit(); // ออกจากสคริปต์เพื่อไม่ให้มีการดำเนินการต่อ
        } else {
            echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
        }
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด: " . $e->getMessage();
    }
}
?>