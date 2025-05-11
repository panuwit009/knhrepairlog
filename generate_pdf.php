<?php
require_once __DIR__ . '/vendor/autoload.php';
include("query/connection.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$sign = "ลงชื่อ";
$point = "................................................";
$dates = "วันที่";

// รับค่า ID จาก POST request
$itemId = isset($_POST['id']) ? $_POST['id'] : null;
if (!$itemId) {
    echo json_encode(['success' => false, 'error' => 'No item ID provided']);
    exit;
}

header('Content-Type: application/json');

try {
    // ดึงข้อมูลจากฐานข้อมูล
    $stmt = $pdo->prepare("SELECT r.id, r.sender_name, r.ward, r.equipment, r.eq_no, r.eq_status, r.rtimestamp, r.doctor_id_sign,
                e.equipment_name, w.name_ward,
                s1.id AS eq_status_id, s1.name_status AS eq_status_name, s2.id AS eq_status2_id, s2.name_status AS eq_status2_name
            FROM repairlist r
            LEFT JOIN equipment e ON r.equipment = e.id
            LEFT JOIN ward w ON r.ward = w.id
            LEFT JOIN status s1 ON r.eq_status = s1.id AND s1.type = 1
            LEFT JOIN status s2 ON r.eq_status = s2.id AND s2.type = 2
            WHERE r.id = :itemId");
    $stmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);
    $stmt->execute();
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$item) {
        echo json_encode(['success' => false, 'error' => 'Item not found for ID: ' . $itemId]);
        exit;
    }

    // จัดรูปแบบวันที่เป็นภาษาไทย
    $locale = 'th_TH';
    $date = new DateTime($item['rtimestamp']);
    $fmt = new IntlDateFormatter($locale, IntlDateFormatter::LONG, IntlDateFormatter::NONE);
    $fmt->setPattern('d MMMM yyyy');
    $formattedDate = $fmt->format($date);
    $formattedDate = preg_replace_callback('/\d{4}/', function($matches) {
        return $matches[0] + 543;
    }, $formattedDate);

    // กำหนดค่า mPDF
    $mpdf = new \Mpdf\Mpdf([
        'default_font' => 'THSarabunNew',
        'mode' => 'utf-8',
        'charset' => 'UTF-8',
    ]);

    // ตั้งค่า watermark
    $mpdf->SetWatermarkImage('file/picture/Logo-2-removebg-preview.png', 0.05);
    $mpdf->showWatermarkImage = true;
    $mpdf->SetFont('THSarabunNew', '', 18);

    ob_start();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/forform.css">
        
</head>
<body>


<div class="col-12">

    
<div class="cols-3"> 

    <img src="file/picture/Logo-2-removebg-preview.png" alt="Hospital Logo" class="logo">
</div>
    
    <div class="header">    

    <div>
        <strong style="font-size: 35px;">ใบแจ้งซ่อม / รายงานผลการซ่อม / เบิกอะไหล่</strong>
    </div>
        
    <div>
        <strong style="font-size: 22px;">(ครุภัณฑ์คอมพิวเตอร์และอุปกรณ์คอมพิวเตอร์)</strong>
    </div>
        
    <div>
        <span style="font-size: 20px;">โรงพยาบาลพระนารายณ์มหาราช</span>    
        <span style="font-size: 20px;">โทรศัพท์ : (036) 785444 <strong>ต่อ 4530</strong></span>
    </div>
        
    </div>
</div>


    <!-- ส่วนข้อมูลส่งซ่อม -->
    <div class="container">
        <div class="cols-6" style="padding: 7px 10px;">
            <strong class="font-strong" style="text-decoration: underline;">ข้อมูลส่งซ่อม</strong><br>
            <strong class="font-strong">วันที่แจ้งซ่อม :</strong> <?php echo '<span class="big-text">' . htmlspecialchars($formattedDate) . '</span>'; ?> <br>
            <strong class="font-strong">ครุภัณฑ์ :</strong> <?php echo '<span class="big-text">' . htmlspecialchars($item['equipment_name']) . '</span>'; ?><br>
            <strong class="font-strong">ยี่ห่อรุ่น : </strong><br>
        </div>

        <div class="cols-6" style="padding: 7px 10px;">
            <strong class="font-strong">เลขที่ส่งซ่อม :</strong> <?php echo '<span class="big-text">' . htmlspecialchars($item['id']) . '</span>'; ?><br>
            <strong class="font-strong">หน่วยงาน :</strong> <?php echo '<span class="big-text">' . htmlspecialchars($item['name_ward']) . '</span>'; ?><br>
            <strong class="font-strong">เลขครุภัณฑ์ :</strong> <?php echo '<span class="big-text">' . htmlspecialchars($item['eq_no']) . '</span>'; ?><br>
            <strong class="font-strong">ผู้แจ้งซ่อม :</strong> <?php echo '<span class="big-text">' . htmlspecialchars($item['sender_name']) . '</span>'; ?><br>

        </div>
    
    </div>

    <div class="container-top">

        <div class="cols-12" style="padding: 7px 10px;">
                <span><strong class="font-strong">อาการสาเหตุ</strong></span><br>
                <div class="dotted-line"></div>
                <div class="dotted-line"></div>
   


            <div class="cols-2">
                <input type="checkbox">
                <label>ส่งซ่อมภายนอก</label>
            </div>

            <div class="cols-2">
                <input type="checkbox">
                <label>ส่งคืน</label>
            </div>

        </div>
    </div>


    <div class="container-top">
    <!-- ฝั่งซ้าย -->
    <div class="cols-6" style="padding: 7px 10px; flex: 1;">
        <label><strong class="font-strong">การดำเนินการ</strong></label>
        <div class="dotted-line"></div>
        <div class="dotted-line"></div>
        <div style="text-align: right;">
            <label> <?php echo $sign,$point; ?> </label><br>
            <label>(<?php echo $point ?>)</label><br>
            <label>ตำแหน่ง เจ้าพนักงานเครื่องคอมพิวเตอร์</label><br>
            <label> <?php echo $dates,$point; ?> </label><br>
        </div>
    </div>

    <!-- ฝั่งขวา -->
    <div class="cols-6" style="padding: 7px 10px; width: auto; border-left: 1px solid black;">
        <label><strong class="font-strong">ความคิดเห็นของหัวหน้างานเทคโนโลยีสารสนเทศระดับสูง</strong></label>
            <div class="dotted-line"></div>
            <div class="dotted-line"></div>
            <div style="text-align: right;">

                <?php if ($item['doctor_id_sign'] !== null): ?>
                        <img src="file/picture/<?php echo $item['doctor_id_sign']; ?>.gif" 
                            alt="Signature Image" 
                            style="position: absolute; top: 0; left: 0; transform: translateX(250%); width: 50px; height: auto; z-index: 10;" />
                    <?php endif; ?>

                <label> <?php echo $sign,$point; ?> </label><br>
                <label>(นายอธิพงศ์ วงษ์อยู่น้อย)</label><br>
                <label>ตำแหน่ง นักวิชาการคอมพิวเตอร์ปฏิบัติ </label><br>
                <label> <?php echo $dates,$point; ?> </label><br>
            </div>
        </div>
</div>



    <div class="container-top">
        <div class="cols-6" style="padding: 7px 10px;  border-right: 1px solid black;">
            <label><strong class="font-strong">ความคิดเห็นของผู้ตรวจสอบช่างคอมพิวเตอร์</strong></label><br>
            <div class="dotted-line"></div>
            <div class="dotted-line"></div>
            <div style="text-align: right;">
                <label> <?php echo $sign,$point; ?> </label><br>
                <label>(นางสาวญาธิกานต์ มากสินธิ์)</label><br>
                <label>ตำแหน่ง นักวิชาการคอมพิวเตอร์ปฏิบัติการ</label><br>
                <label> <?php echo $dates,$point; ?> </label><br>
            </div>
        </div>

        <div class="cols-6" style="padding: 7px 10px; width: auto;">
                <label><strong class="font-strong">ความคิดเห็นของพัสดุ</strong></label>
                <div class="dotted-line"></div>
                <div class="dotted-line"></div>
                <div style="text-align: right;">
                    <label> <?php echo $sign,$point; ?> </label><br>
                    <label>( <?php echo $point ?>)</label><br>
                    <label>ตำแหน่ง<?php echo $point ?>.</label><br>
                    <label> <?php echo $dates,$point; ?> </label><br>
                </div>
            </div> 

    </div>

        <div class="container-top">

        <div class="cols-6" style="padding: 7px 10px; border-right: 1px solid black;">
            <label><strong class="font-strong">ความคิดเห็นของหัวหน้างานเทคโนโลยีสารสนเทศ</strong></label>
                <div class="dotted-line"></div>
                <div class="dotted-line"></div>
            <div style="text-align: right;">
                    <label> <?php echo $sign,$point; ?> </label><br>
                    <label>(นางฐิตาภา เชื้ออินท์)</label><br>
                    <label>ตำแหน่ง นักวิชาการคอมพิวเตอร์ปฏิบัติการ</label><br>
                    <label> <?php echo $dates,$point; ?> </label><br>
            </div>
        </div>

            <div class="cols-6" style="padding: 7px 10px; width: auto;">
                <label><strong class="font-strong">ส่งซ่อมภายนอก</strong></label><br>
                <label>วันที่ส่งซ่อมภายนอก<?php echo $point ?></label><br>
                <div class="cols-s-6">
                    <label>ราคา<?php echo $point ?></label>
                </div>
                <div class="cols-s-6">
                   <label>ค่าแรง<?php echo $point ?></label>
                </div>
                <label>ลงชื่อบริษัท<?php echo $point ?></label><br>
                <label>หน่วยงาน : รับครุภัณฑ์</label><br>
                <label>วันที่รับ<?php echo $point ?></label><br>
                <label>ชื่อคนรับ<?php echo $point ?></label><br>

            </div>

        </div>
    </div>

</div>

</body>
</html>

<?php

    $html = ob_get_clean();
    
    // สร้าง PDF
    $mpdf->WriteHTML($html);
    
    // กำหนดที่อยู่ในการบันทึกไฟล์ PDF
    $pdfPath = __DIR__ . '/file/pdf/ใบแจ้งซ่อม' . $itemId . '.pdf';
    
    // ตรวจสอบสิทธิ์ในการเขียนไฟล์
    if (!is_writable(dirname($pdfPath))) {
        echo json_encode(['success' => false, 'error' => 'Directory not writable']);
        exit;
    }
    
    // บันทึก PDF
    $mpdf->Output($pdfPath, \Mpdf\Output\Destination::FILE);
    
    // ส่งค่ากลับเป็น JSON
    echo json_encode([
        'success' => true,
        'pdf_url' => 'file/pdf/ใบแจ้งซ่อม' . $itemId . '.pdf'
    ]);

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
} catch (\Mpdf\MpdfException $e) {
    echo json_encode(['success' => false, 'error' => 'mPDF error: ' . $e->getMessage()]);
}
?>