<?php
include 'db_connection.php';
$message = "";
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']); // ลบข้อความหลังจากแสดงผลแล้ว
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">

    <script src="other.js"></script>

</head>
<body>
<div class="container">
    <div class="logo">
        <img src="1.png" alt="Logo" />
    </div>        
    <h1>แบบบันทึกการพยาบาลผู้ป่วยจำหน่าย โรงพยาบาลพระนาราย์มหาราช</h1>
        <form action="save_patient.php" method="POST">

        <div class="row">
                <div class="col">
                    <label for="patient"></label>
                    <div class="input-group">
                        HN <input type="number" id="HN" name="HN" placeholder="กรุณากรอกเลข" class="short-input" style="width: 150px; height: 40px;">
                        AN <input type="number" id="AN" name="AN" placeholder="กรุณากรอกเลข" class="short-input" style="width: 150px; height: 40px;"> 
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col">
                    <label for="heart-rate">สัญญาณชีพอัตราการเต้นหัวใจของทารก</label>
                    <div class="input-group">
                        T <input type="number" id="heart-rate" name="heart-rate" class="short-input" > <span>C</span>
                        P <input type="number" id="pulse" name="pulse" class="short-input" > <span>/min</span>
                        R <input type="number" id="respiration" name="respiration" class="short-input" > <span>/min</span>
                        BP <input type="number" id="blood-pressure" name="blood-pressure" class="short-input" > <span>mmHG</span>
                        FHS <input type="number" id="fetal-heart-rate" name="fetal-heart-rate" class="short-input" > <span>beats/min</span>
                    </div>
                </div>
            </div>

            <div class="row">
    <div class="col">
        <label>ระดับความรู้สึก</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php
                $sql = "SELECT id, name FROM information WHERE type = 1";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'feeling-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="feeling" class="form-check-input" value="'.$row['id'].'" onchange="toggleOnlyOneInput(this, \'feeling\')">';
                            echo $row['name'];
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>
            <!-- เพิ่ม checkbox สำหรับ "อื่นๆ" -->
            <input type="checkbox" id="other-feeling" class="form-check-input" onchange="toggleOnlyOneInput(this, 'feeling'); toggleOtherInput(this, 'extra-feeling-input');">
            <label for="other-feeling">อื่นๆ</label>
            <input type="text" id="extra-feeling-input" name="extra_feeling" class="extra-input" placeholder="กรอกข้อมูลอื่นๆ" style="display:none;">
        </div>
    </div>
</div>


<div class="row">
    <div class="col">
        <label>ลักษณะการหายใจ</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php
                
                $sql = "SELECT id, name FROM information WHERE type = 2";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'breathing-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="breathing" class="form-check-input" value="'.$row['id'].'" onchange="toggleOnlyOneInput(this, \'breathing\')">';
                            echo $row['name'];
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>
            <!-- เพิ่ม checkbox สำหรับ "อื่นๆ" -->
            <input type="checkbox" id="other-breathing" class="form-check-input" onchange="toggleOnlyOneInput(this, 'breathing'); toggleOtherInput(this, 'extra-breathing-input');">
            <label for="other-breathing">อื่นๆ</label>
            <input type="text" id="extra-breathing-input" name="extra_breathing" class="extra-input" placeholder="กรอกข้อมูลอื่นๆ">
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>การทำงานของหัวใจ</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php
                
                $sql = "SELECT id, name FROM information WHERE type = 3";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'hearting-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="hearting[]" class="form-check-input" value="'.$row['id'].'">';
                            echo $row['name'];
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>
            <!-- เพิ่ม checkbox สำหรับ "อื่นๆ" -->
            <input type="checkbox" id="other-hearting" class="form-check-input" onchange="toggleOtherInput(this, 'extra-hearting-input')">
            <label for="other-hearting">อื่นๆ</label>
            <input type="text" id="extra-hearting-input" name="extra_hearting" class="extra-input" placeholder="กรอกข้อมูลอื่นๆ">
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>ภาวะโภชนาการ</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php
                
                $sql = "SELECT id, name FROM information WHERE type = 4";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'nutrition-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="nutrition[]" class="form-check-input" value="'.$row['id'].'">';
                            echo $row['name'];
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>
            <!-- เพิ่ม checkbox สำหรับ "อื่นๆ" -->
            <input type="checkbox" id="other-nutrition" class="form-check-input" onchange="toggleOtherInput(this, 'extra-nutrition-input')">
            <label for="other-nutrition">อื่นๆ</label>
            <input type="text" id="extra-nutrition-input" name="extra_nutrition" class="extra-input" placeholder="กรอกข้อมูลอื่นๆ"> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>การขับถ่าย</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php

                $sql = "SELECT id, name FROM information WHERE type = 5";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'urination-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="urination[]" class="form-check-input" value="'.$row['id'].'">';
                            echo $row['name'];
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>
            <!-- เพิ่ม checkbox สำหรับ "อื่นๆ" -->
            <input type="checkbox" id="other-urination" class="form-check-input" onchange="toggleOtherInput(this, 'extra-urination-input')">
            <label for="other-urination">ผิดปกติ</label>
            <input type="text" id="extra-urination-input" name="extra_urination" class="extra-input" placeholder="กรอกข้อมูลอื่นๆ"> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>ภาวะแทรกซ้อน</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php
                
                $sql = "SELECT id, name FROM information WHERE type = 6";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'complications-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="complications[]" class="form-check-input" value="'.$row['id'].'">';
                            echo $row['name'];
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>
            <!-- เพิ่ม checkbox สำหรับ "อื่นๆ" -->
            <input type="checkbox" id="other-complications" class="form-check-input" onchange="toggleOtherInput(this, 'extra-complications-input')">
            <label for="other-complications">อื่นๆ</label>
            <input type="text" id="extra-complications-input" name="extra_complications" class="extra-input" placeholder="กรอกข้อมูลอื่นๆ"> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>ความวิตกกังวล / เครียด</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php
              
                $sql = "SELECT id, name FROM information WHERE type = 7";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'anxiety-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="anxiety" class="form-check-input" value="'.$row['id'].'" onchange="toggleOnlyOneInput(this, \'anxiety\')">';
                            echo $row['name'];
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>
            <!-- เพิ่ม checkbox สำหรับ "อื่นๆ" -->
            <input type="checkbox" id="other-anxiety" class="form-check-input" onchange="toggleOnlyOneInput(this, 'anxiety'); toggleOtherInput(this, 'extra-anxiety-input');">
            <label for="other-anxiety">อื่นๆ</label>
            <input type="text" id="extra-anxiety-input" name="extra_anxiety" class="extra-input" placeholder="กรอกข้อมูลอื่นๆ">
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>พฤติกรรมการปรับตัว</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php
                
                $sql = "SELECT id, name FROM information WHERE type = 8";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'adjustment-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="adjustment" class="form-check-input" value="'.$row['id'].'" onchange="toggleOnlyOneInput(this, \'adjustment\')">';
                            echo $row['name'];
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>
            <!-- เพิ่ม checkbox สำหรับ "อื่นๆ" -->
            <input type="checkbox" id="other-adjustment" class="form-check-input" onchange="toggleOnlyOneInput(this, 'adjustment'); toggleOtherInput(this, 'extra-adjustment-input');">
            <label for="other-adjustment">อื่นๆ</label>
            <input type="text" id="extra-adjustment-input" name="extra_adjustment" class="extra-input" placeholder="กรอกข้อมูลอื่นๆ">
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>ลักษณะของแผล</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php
                
                $sql = "SELECT id, name FROM information WHERE type = 9";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'wound-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="wound_options" class="form-check-input" value="'.$row['id'].'" onchange="handleWoundCheckboxChange(this)">';
                            echo '<label for="'.$inputId.'">'.$row['name'].'</label>';
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>

            <!-- Checkbox สำหรับ "แผลแห้งดี" -->
            <input type="checkbox" id="dry-wound" name="wound_options" class="form-check-input" onchange="handleWoundCheckboxChange(this)">
            <label for="dry-wound">แผลแห้งดี</label>
            <label id="date-label" style="display: none; margin-left: 5px;">ตัดไหมวันที่</label>
            <input type="text" id="cut-wound-input" name="cut_wound" class="extra-input" placeholder="ระบุวันที่">

            <!-- Checkbox สำหรับ "อื่นๆ" -->
            <input type="checkbox" id="other-wound" name="wound_options" class="form-check-input" onchange="handleWoundCheckboxChange(this)">
            <label for="other-wound">อื่นๆ</label>
            <input type="text" id="extra-wound-input" name="extra_wound" class="extra-input" placeholder="กรอกข้อมูลอื่นๆ">
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>ความเจ็บปวด</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php
                
                $sql = "SELECT id, name FROM information WHERE type = 10";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'pain-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="pain" class="form-check-input" value="'.$row['id'].'" onchange="handlePainCheckboxChange(this)">';
                            echo '<label for="'.$inputId.'">'.$row['name'].'</label>';
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>

            <!-- Checkbox สำหรับ "แผลแห้งดี" -->
            <input type="checkbox" id="location-pain" name="pain" class="form-check-input" onchange="handlePainCheckboxChange(this)">
            <label for="location-pain">ปวดพอทนได้</label>
            <input type="text" id="location-pain-input" name="able_pain" class="extra-input" placeholder="ตำแหน่ง">

            <!-- Checkbox สำหรับ "อื่นๆ" -->
            <input type="checkbox" id="other-pain" name="pain" class="form-check-input" onchange="handlePainCheckboxChange(this)">
            <label for="other-pain">อื่นๆ</label>
            <input type="text" id="extra-pain-input" name="extra_pain" class="extra-input" placeholder="กรอกข้อมูลอื่นๆ">
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>การเจ็บครรภ์/การดิ้นของทารกในครรภ์</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php
                
                $sql = "SELECT id, name FROM information WHERE type = 11";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'labor-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="labor[]" class="form-check-input" value="'.$row['id'].'">';
                            echo $row['name'];
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>
            <!-- เพิ่ม checkbox สำหรับ "อื่นๆ" -->
            <input type="checkbox" id="other-labor" class="form-check-input" onchange="toggleOtherInput(this, 'extra-labor-input')">
            <label for="other-labor">อื่นๆ</label>
            <input type="text" id="extra-labor-input" name="extra_labor" class="extra-input" placeholder="กรอกข้อมูลอื่นๆ">
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>ลักษณะน้ำคาวปลา</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php
                // ดึงข้อมูลระดับความรู้สึกจากฐานข้อมูล
                $sql = "SELECT id, name FROM information WHERE type = 12";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'lochia-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="lochia" class="form-check-input" value="'.$row['id'].'" onchange="handleLochiaCheckboxChange(this)">';
                            echo '<label for="'.$inputId.'">'.$row['name'].'</label>';
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>

            <!-- Checkbox สำหรับ "แผลแห้งดี" -->
            <input type="checkbox" id="abnormal-lochia" name="lochia" class="form-check-input" onchange="handleLochiaCheckboxChange(this)">
            <label for="abnormal-lochia">ผิดปกติ</label>
            <input type="text" id="abnormal-lochia-input" name="abnormal_lochia" class="extra-input" placeholder="ระบุ">

            <!-- Checkbox สำหรับ "อื่นๆ" -->
            <input type="checkbox" id="other-lochia" name="lochia" class="form-check-input" onchange="handleLochiaCheckboxChange(this)">
            <label for="other-lochia">อื่นๆ</label>
            <input type="text" id="extra-lochia-input" name="extra_lochia" class="extra-input" placeholder="กรอกข้อมูลอื่นๆ">
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>เต้านมและการไหลของน้ำคาวปลา</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php
                // ดึงข้อมูลระดับความรู้สึกจากฐานข้อมูล
                $sql = "SELECT id, name FROM information WHERE type = 13";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'breast-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="breast" class="form-check-input" value="'.$row['id'].'" onchange="handleBreastCheckboxChange(this)">';
                            echo '<label for="'.$inputId.'">'.$row['name'].'</label>';
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>

            <!-- Checkbox สำหรับ "แผลแห้งดี" -->
            <input type="checkbox" id="abnormal-breast" name="breast" class="form-check-input" onchange="handleBreastCheckboxChange(this)">
            <label for="abnormal-breast">ผิดปกติ</label>
            <input type="text" id="abnormal-breast-input" name="abnormal_breast" class="extra-input" placeholder="ระบุ">

            <!-- Checkbox สำหรับ "อื่นๆ" -->
            <input type="checkbox" id="other-breast" name="breast" class="form-check-input" onchange="handleBreastCheckboxChange(this)">
            <label for="other-breast">อื่นๆ</label>
            <input type="text" id="extra-breast-input" name="extra_breast" class="extra-input" placeholder="กรอกข้อมูลอื่นๆ">
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>ลักษณะทารก</label>
        <?php
            // ดึงข้อมูลลักษณะทารกจากฐานข้อมูล
            $sql = "SELECT id, name FROM information WHERE type = 14";

            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $inputId = 'baby-'.$row['id']; // เปลี่ยนชื่อ input ID เป็น 'baby-' เพื่อให้เหมาะสมกับคำว่า "ลักษณะทารก"
                        
                        // แสดง checkbox สำหรับแต่ละลักษณะทารก
                        echo '<input type="checkbox" id="'.$inputId.'" name="baby[]" class="form-check-input" value="'.$row['id'].'" style="margin-right: 10px;">';
                        echo $row['name'];
                    }
                }
            } catch (PDOException $e) {
                echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
            }
        ?>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>อุปกรณ์การรักษาต่อเนื่อง</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php
                
                $sql = "SELECT id, name FROM information WHERE type = 15";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'treatment-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="treatment[]" class="form-check-input" value="'.$row['id'].'" onchange="toggleOnlyOneInput(this, \'treatment\')">';
                            echo $row['name'];
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>
            <!-- เพิ่ม checkbox สำหรับ "อื่นๆ" -->
            <input type="checkbox" id="other-treatment" class="form-check-input" onchange="toggleOnlyOneInput(this, 'treatment'); toggleOtherInput(this, 'extra-treatment-input');">
            <label for="other-treatment">อื่นๆ</label>
            <input type="text" id="extra-treatment-input" name="extra_treatment" class="extra-input" placeholder="ระบุ">
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>ภาวะเศรษฐกิจ</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php
                
                $sql = "SELECT id, name FROM information WHERE type = 16";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'economy-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="economy[]" class="form-check-input" value="'.$row['id'].'" onchange="toggleOnlyOneInput(this, \'economy\')">';
                            echo $row['name'];
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>
            <!-- เพิ่ม checkbox สำหรับ "อื่นๆ" -->
            <input type="checkbox" id="other-economy" class="form-check-input" onchange="toggleOnlyOneInput(this, 'economy'); toggleOtherInput(this, 'extra-economy-input');">
            <label for="other-economy">มีปัญหา</label>
            <input type="text" id="extra-economy-input" name="extra_economy" class="extra-input" placeholder="ระบุ">
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>ความพร้อมในการกลับบ้าน</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php
                
                $sql = "SELECT id, name FROM information WHERE type = 17";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'home-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="home" class="form-check-input" value="'.$row['id'].'" onchange="toggleOnlyOneInput(this, \'home\')">';
                            echo $row['name'];
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>
            <!-- เพิ่ม checkbox สำหรับ "อื่นๆ" -->
            <input type="checkbox" id="other-home" class="form-check-input" onchange="toggleOnlyOneInput(this, 'home'); toggleOtherInput(this, 'extra-home-input');">
            <label for="other-home">ไม่พร้องเนื่องจาก</label>
            <input type="text" id="extra-home-input" name="extra_home" class="extra-input" placeholder="กรอกข้อมูลอื่นๆ">
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label class="custom-label">คำแนะนำก่อนกลับบ้าน</label>
        <div>
            <?php
                $sql = "SELECT id, name FROM information WHERE type = 18";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'returnhome-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="returnhome[]" class="form-check-input" value="'.$row['id'].'" onchange="toggleOnlyOneInput(this, \'returnhome\')">';
                            echo $row['name'].'<br>';
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>

            <!-- เพิ่ม checkbox สำหรับ "อื่นๆ" -->
            <div class="form-check" style="display: flex; align-items: center; flex-wrap: wrap; inline-block; margin-right: 10px;">
                <input type="checkbox" id="other-returnhome" class="form-check-input" onchange="toggleOnlyOneInput(this, 'returnhome'); toggleOtherInput(this, 'extra-returnhome-input');">
                <label for="other-returnhome" style="margin-right: 10px;">อื่นๆ</label>
                <input type="text" id="extra-returnhome-input" name="extra_returnhome" class="extra-input" placeholder="ระบุ" style="display: none; width: auto;">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>การนัด follow up</label>
        <div style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 10px;">
            <?php
                $sql = "SELECT id, name FROM information WHERE type = 19";

                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $inputId = 'activity-'.$row['id'];
                            echo '<input type="checkbox" id="'.$inputId.'" name="activity[]" class="form-check-input" value="'.$row['id'].'" onchange="handleActivityCheckboxChange(this, \'activity\')">';
                            echo $row['name'];
                        }
                    }
                } catch (PDOException $e) {
                    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                }
            ?>

            <!-- Checkbox สำหรับ "Refer" -->
            <input type="checkbox" id="refer-checkbox" class="form-check-input" onchange="handleActivityCheckboxChange(this)" style="margin-right: 10px;">
            <label for="refer-checkbox">Refer</label>
            <input type="text" id="extra-activity-input" name="extra_activity" class="extra-input" placeholder="โรงพยาบาล" style="display:none;">

            <!-- Checkbox สำหรับ "นัดวันที่" -->
            <input type="checkbox" id="appointment-checkbox" class="form-check-input" onchange="handleActivityCheckboxChange(this)">
            <label for="appointment-checkbox">นัดวันที่</label>
        
            <!-- ฟิลด์กรอกข้อมูลนัดวันที่ -->
            <div id="appointment-fields" style="display:none; margin-left: 10px;">
                <span id="appointment-label">วันที่ : </span>
                <input type="text" id="appointment-date-input" name="appointment_date" placeholder="กรุณากรอกวันที่นัด" class="custom-input">

                <span style="margin-left: 10px;">เวลา : </span>
                <input type="number" id="appointment-time-input" name="appointment_time" placeholder="กรุณากรอกเวลา" class="custom-input">

                <span style="margin-left: 10px;">แพทย์ผู้นัด : </span> 
                <input type="text" id="doctor-input" name="doctor" placeholder="กรุณาระบุแพทย์" class="custom-input">

                <span style="margin-left: 10px;">ห้องตรวจ : </span>
                <input type="text" id="room-input" name="room" placeholder="กรุณาระบุห้องตรวจ" class="custom-input">
                <br>

                <span style="margin-left: 10px;">สิ่งที่ต้องทำ : </span>
                <input type="text" id="task-input" name="task" class="custom-input" placeholder="กรุณาระบุสิ่งที่ต้องทำ">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <label>จำหน่าย</label>
        <div class="row" style="align-items: center;">
            <label for="discharge_date" class="label-margin">วันที่</label>
            <input type="text" id="discharge_date" name="discharge_date" placeholder="กรุณาระบุวันที่" class="extra-input" style="display: inline;">
            
            <label for="discharge_time" class="label-margin">เวลา</label>
            <input type="number" id="discharge_time" name="discharge_time" class="extra-input" placeholder="กรุณาระบุเวลา" style="display: inline;">
            
            <div class="row">
                <div class="col">
                    <label style="margin-top: 15px; margin-left: 10px;">โดย
                        <?php
                        $sql = "SELECT id, name FROM information WHERE type = 20";

                        try {
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();

                            if ($stmt->rowCount() > 0) {
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $inputId = 'car-'.$row['id'];
                                    
                                    // สร้าง checkbox พร้อมเรียกใช้งานฟังก์ชัน handleCheckboxChange
                                    echo '<input type="checkbox" id="'.$inputId.'" name="car" class="form-check-input discharge-checkbox" value="'.$row['id'].'" onchange="CarCheckboxChange(this)" style="margin-right: 10px;">';
                                    echo $row['name'];
                                }
                            }
                        } catch (PDOException $e) {
                            echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
                        }
                        ?>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="align-items: center;">
    <div class="col">
        <label class="custom-label">หลักฐานการรับเด็ก</label>
        
        <?php
            $sql = "SELECT id, name FROM information WHERE type = 21";

            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $inputId = 'idcard-'.$row['id'];
                        
                        // เปลี่ยนชื่อ checkbox เป็นแบบ array
                        echo '<input type="checkbox" id="'.$inputId.'" name="idcard[]" class="form-check-input" value="'.$row['id'].'" onchange="handleIdCardkboxChange(this)" style="margin-right: 10px;">';
                        echo $row['name'] . '<br>'; // เพิ่ม <br> เพื่อแยกแต่ละ checkbox
                    }
                }
            } catch (PDOException $e) {
                echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
            }
        ?>

        <div class="row" id="extraInputs" style="align-items: center; margin-top: 10px; display: none;">
            <label for="id_number" class="label-margin">เลขที่</label>
            <input type="number" id="id_number" name="id_number" class="extra-input" placeholder="กรุณากรอกเลขที่" style="display: inline; width: auto;">

            <label for="issued_by" class="label-margin">ออกโดย</label>
            <input type="text" id="issued_by" name="issued_by" class="extra-input" placeholder="กรุณากรอกชื่อหน่วยงาน" style="display: inline; width: auto;">
        </div>
    </div>
</div>

<div class="row" style="align-items: center;">
    <div class="col">
        <label class="custom-label">ประเภทการจำหน่าย</label>
        <?php
            $sql = "SELECT id, name FROM information WHERE type = 22";

            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $isOtherOption = $row['name'] === 'อื่นๆ';
                        $isReferHospitalOption = $row['name'] === 'Refer';
                        $inputId = 'discharge_type-'.$row['id'];
                        
                        echo '<input type="checkbox" id="'.$inputId.'" name="discharge_type[]" class="form-check-input" value="'.$row['id'].'" onchange="handleDischargeCheckboxChange(this)" style="margin-right: 10px;">';
                        echo $row['name'];

                        // แสดงฟิลด์กรอกข้อมูลถ้าเลือก "Refer โรงพยาบาล"
                        if ($isReferHospitalOption) {
                            echo '<span id="discharge_type_refer" style="display:none; margin-left: 10px;">โรงพยาบาล: </span>'; 
                            echo '<input type="text" id="extra-discharge-input" name="extra_discharge" placeholder="กรอกข้อความ" class="extra-input" style="display:none;">';
                        }

                        if ($isOtherOption) {
                            echo '<span id="discharge_type_other" style="display:none; margin-left: 10px;"></span>'; 
                            echo '<input type="text" id="other-discharge-input" name="other_discharge" placeholder="กรุณาระบุ" class="extra-input" style="display:none;">';
                        }
                    }
                }
            } catch (PDOException $e) {
                echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
            }
        ?>
    </div>
</div>

<div class="row" style="align-items: center;">
    <div class="col">
        <label class="custom-label">1. ผู้ป่วยจำเป็นต้องได้รับการดูแลต่อเนื่องหรือไม่</label>
        <?php
            $sql = "SELECT id, name FROM information WHERE type = 23";

            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $isOtherOption = $row['name'] === 'จำเป็น';
                        $inputId = 'patient_care-'.$row['id'];

                        // แสดง checkbox
                        echo '<input type="checkbox" id="'.$inputId.'" name="patient_care" class="form-check-input" value="'.$row['id'].'" onchange="handleCareCheckboxChange(this)" style="margin-right: 10px;">';
                        echo $row['name'];

                        // ถ้าเป็นตัวเลือก "จำเป็น" ให้แสดง input fields ที่ต้องการ
                        if ($isOtherOption) {
                            echo '<div id="care-fields" style="display:none; margin-left: 10px;">'; // Group fields for care options
                            
                            // Input fields for "M ยา ระบุ", "E สิ่งแวดล้อม", etc.
                            echo '<br>';
                            echo '<span id="medicine" style="display:inline; margin-left: 215px;">M ยา ระบุ: </span>'; 
                            echo '<input type="text" id="extra-medicine-input" name="extra_medicine" class="extra-input" placeholder="ระบุ" style="margin-left: 10px; margin-bottom: 18px; display: inline;">';

                            echo '<br>';
                            echo '<span id="environment" style="display:inline; margin-left: 15px;">E สิ่งแวดล้อม / เศรษฐกิจ / สังคม ระบุ: </span>';
                            echo '<input type="text" id="extra-environment-input" name="extra_environment" class="extra-input" placeholder="ระบุ" style="margin-left: 10px; margin-bottom: 18px; display: inline;">';

                            echo '<br>';
                            echo '<span id="cares" style="display:inline; margin-left: 5px;">T การดูแลรักษา / อาการผิด / แก้ไข ระบุ: </span>';
                            echo '<input type="text" id="extra-cares-input" name="extra_cares" class="extra-input" placeholder="ระบุ" style="margin-left: 10px; margin-bottom: 18px; display: inline;">';
                            
                            echo '<br>';
                            echo '<span id="health_condition" style="display:inline; margin-left: 148px;">H ภาวะสุขภาพ ระบุ: </span>';
                            echo '<input type="text" id="extra-health-condition-input" name="extra_health_condition" class="extra-input" placeholder="ระบุ" style="margin-left: 10px; margin-bottom: 18px; display: inline;">';

                            echo '<br>';
                            echo '<span id="shot" style="display:inline; margin-left: 10px;">O การมาตรวจตามนัด / การส่งต่อ ระบุ: </span>';
                            echo '<input type="text" id="extra-shot-input" name="extra_shot" class="extra-input" placeholder="ระบุ" style="margin-left: 10px; margin-bottom: 18px; display: inline;">';

                            echo '<br>';
                            echo '<span id="food" style="display:inline; margin-left: 187px;">D อาหาร ระบุ: </span>';
                            echo '<input type="text" id="extra-food-input" name="extra_food" class="extra-input" placeholder="ระบุ" style="margin-left: 10px; margin-bottom: 18px; display: inline;">';

                            echo '<br>';
                            echo '<span id="o_other" style="display:inline; margin-left: 200px;">O อื่นๆ ระบุ: </span>';
                            echo '<input type="text" id="extra-o-other-input" name="extra_o" class="extra-input" placeholder="ระบุ" style="margin-left: 10px; margin-bottom: 18px; display: inline;">';

                            echo '</div>'; // Close care fields group
                        }
                    }
                }
            } catch (PDOException $e) {
                echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
            }
        ?>
    </div>
</div>



<div class="row" style="align-items: center;">
    <div class="col">
        <label class="custom-label">2. เรื่องที่ต้องดูแลต่อเนื่องนั้นผู้ป่วยสามารถดูแลตนเองได้หรือไม่</label>
        <?php
            $sql = "SELECT id, name FROM information WHERE type = 24";

            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $inputId = 'self_care-'.$row['id'];
                        // Regular checkbox for each entry
                        echo '<input type="checkbox" id="'.$inputId.'" name="self_care" class="form-check-input" value="'.$row['id'].'" style="margin-right: 10px;" onchange="toggleOnlyOneInput(this, \'self_care\')">';
                        echo $row['name'];
                    }
                }
            } catch (PDOException $e) {
                echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
            }
        ?>
    </div>
</div>


<div class="row" style="align-items: center;">
    <div class="col">
        <label class="custom-label">3. ผู้ที่ดูแลผู้ป่วย</label>
        <?php
            $sql = "SELECT id, name FROM information WHERE type = 25";
            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $isHaveOption = $row['name'] === 'มี';  // เช็คว่าชื่อเป็น 'มี' หรือไม่
                        $inputId = 'caregiver-'.$row['id'];
                        
                        // แสดง checkbox
                        echo '<input type="checkbox" id="'.$inputId.'" name="caregiver" class="form-check-input" value="'.$row['id'].'" onchange="handleCaregiverCheckboxChange(this)" style="margin-right: 10px;">';
                        echo $row['name'];

                        // ถ้าเป็น 'มี' ให้แสดง input text
                        if ($isHaveOption) {
                            echo '<span id="caregiver-label" style="display:none; margin-left: 10px;"></span>';
                            echo '<input type="text" id="extra-caregiver-input" name="extra_caregiver" placeholder="ระบุ" class="extra-input" style="display:none;">';

                            // แสดงตัวเลือก "พร้อมให้การดูแล" และ "ไม่พร้อมให้การดูแล"
                            echo '<div id="caregiver-options" style="display:none; margin-top: 10px;">';
                            echo '<input type="checkbox" id="ready-caregiver" name="caregiver-options[]" value="ready" class="form-check-input" style="margin-right: 9px; display: inline;" onchange="toggleExclusiveCheckbox(this)">';
                            echo '<label for="ready-caregiver" style="display: inline;">พร้อมให้การดูแล</label>';

                            echo '<input type="checkbox" id="not-ready-caregiver" name="caregiver-options[]" value="not_ready" class="form-check-input" style="margin-right: 9px; margin-bottom: 15px; display: inline;" onchange="toggleExclusiveCheckbox(this)">';
                            echo '<label for="not-ready-caregiver" style="display: inline;">ไม่พร้อมให้การดูแล</label>';
                            echo '<input type="text" id="not-ready-input" name="not_ready_input" placeholder="กรอกข้อความ" class="extra-input">';
                            echo '</div>';
                        }
                    }
                }
            } catch (PDOException $e) {
                echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . $e->getMessage();
            }
        ?>
    </div>
</div>




<label class="custom-label">4. หน่วยงานภายในโรงพยาบาลที่จำเป็นต้องปรึกษาเพื่อการดูแลต่อเนื่อง</label>

<div class="row" style="align-items: center;">
    <label for="internal-agency-1" class="label-margin">1</label>
    <input type="text" id="internal-agency-1" name="internal_agency_1" class="extra-input" placeholder="กรุณาระบุ" style="margin-left: 12px; display: inline; width: auto;">
</div>

<div class="row" style="align-items: center;">
    <label for="internal-agency-2" class="label-margin">2</label>
    <input type="text" id="internal-agency-2" name="internal_agency_2" class="extra-input" placeholder="กรุณาระบุ" style="display: inline; width: auto;">
</div>

<label class="custom-label">5 หน่วยงานภายนอกโรงพยาบาลที่จำเป็นต้องปรึกษาเพื่อการดูแลต่อเนื่อง</label>

<div class="row" style="align-items: center;">
    <label for="external-agency-1" class="label-margin">1</label>
    <input type="text" id="external-agency-1" name="external_agency_1" class="extra-input" placeholder="กรุณาระบุ" style="margin-left: 12px; display: inline; width: auto;">
</div>

<div class="row" style="align-items: center;">
    <label for="external-agency-2" class="label-margin">2</label>
    <input type="text" id="external-agency-2" name="external_agency_2" class="extra-input" placeholder="กรุณาระบุ" style="display: inline; width: auto;">
</div>

<!-- <label>6 สรุปผลการดำเนินการเตรียมความพร้อมก่อนจำหน่ายผู้ป่วย</label>

<div class="row" style="align-items: center;">
    <label for="summary-date" class="label-margin">วัน เดือน ปี</label>
    <input type="date" id="summary-date" name="summary_date" class="extra-input" placeholder="กรุณาระบุ" style="display: inline; width: auto;">
</div>

<div class="row" style="align-items: center;">
    <label for="patient-condition" class="label-margin">สภาพปัญหาและความต้องการของผู้ป่วยเมื่อจำหน่าย</label>
    <input type="text" id="patient-condition" name="patient_condition" class="extra-input" placeholder="กรุณาระบุ" style="display: inline; width: auto;">
</div>

<div class="row" style="align-items: center;">
    <label for="procedures" class="label-margin">การดำเนินการ</label>
    <input type="text" id="procedures" name="procedures" class="extra-input" placeholder="กรุณาระบุ" style="display: inline; width: auto;">
</div>

<div class="row" style="align-items: center;">
    <label for="expected-results" class="label-margin">ผลลัพธ์ที่คาดหวังเมื่อจำหน่าย</label>
    <input type="text" id="expected-results" name="expected_results" class="extra-input" placeholder="กรุณาระบุ" style="display: inline; width: auto;">
</div>

<div class="row" style="align-items: center;">
    <label for="results" class="label-margin">ผลการดำเนินการ</label>
    <input type="text" id="results" name="results" class="extra-input" placeholder="กรุณาระบุ" style="display: inline; width: auto;">
</div> -->

<button type="submit" class="btn btn-primary">ส่งข้อมูล</button>

        </form>
    </div>





</body>
</html>
