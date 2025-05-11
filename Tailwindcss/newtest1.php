<?php
$menu = "dashboardboss";
date_default_timezone_set('Asia/Bangkok'); // ตั้งโซนเวลาท้องถิ่นเป็นไทย

// สร้างวัตถุ DateTime โดยใช้เวลาปัจจุบัน
$currentDateTime = new DateTime('now', new DateTimeZone('Asia/Bangkok'));

// แปลงเวลาให้อยู่ในรูปแบบที่ต้องการ (ไม่แสดงเวลา)
$thaiTime = $currentDateTime->format('l j F Y');

// รายการของวันในภาษาไทย
$thaiDays = ['Sunday' => 'อาทิตย์', 'Monday' => 'จันทร์', 'Tuesday' => 'อังคาร', 'Wednesday' => 'พุธ', 'Thursday' => 'พฤหัสบดี', 'Friday' => 'ศุกร์', 'Saturday' => 'เสาร์'];

// แปลงชื่อวันให้เป็นภาษาไทย
$thaiDay = $thaiDays[$currentDateTime->format('l')];

// แปลงเดือนให้เป็นภาษาไทย
$thaiMonths = ['January' => 'มกราคม', 'February' => 'กุมภาพันธ์', 'March' => 'มีนาคม', 'April' => 'เมษายน', 'May' => 'พฤษภาคม', 'June' => 'มิถุนายน', 'July' => 'กรกฎาคม', 'August' => 'สิงหาคม', 'September' => 'กันยายน', 'October' => 'ตุลาคม', 'November' => 'พฤศจิกายน', 'December' => 'ธันวาคม'];
$thaiMonth = $thaiMonths[$currentDateTime->format('F')];
$thaiYear = $currentDateTime->format('Y') + 543;

// เขียนเวลาที่ได้ให้เป็นภาษาไทย
$thaiTime = str_replace($currentDateTime->format('l'), $thaiDay, $thaiTime);
$thaiTime = str_replace($currentDateTime->format('F'), $thaiMonth, $thaiTime);
$thaiTime = str_replace($currentDateTime->format('Y'), $thaiYear, $thaiTime);



// ตั้งโซนเวลาท้องถิ่นเป็นไทย
date_default_timezone_set('Asia/Bangkok');

// สร้างวัตถุ DateTime โดยใช้เวลาปัจจุบัน
$currentDateTime = new DateTime('now', new DateTimeZone('Asia/Bangkok'));

// ลบวันที่ไป 1 วัน
$currentDateTime->sub(new DateInterval('P1D'));

// แปลงเวลาให้อยู่ในรูปแบบที่ต้องการ
$thaiTime1 = $currentDateTime->format('l j F Y');

// รายการของวันในภาษาไทย
$thaiDays = ['Sunday' => 'อาทิตย์', 'Monday' => 'จันทร์', 'Tuesday' => 'อังคาร', 'Wednesday' => 'พุธ', 'Thursday' => 'พฤหัสบดี', 'Friday' => 'ศุกร์', 'Saturday' => 'เสาร์'];

// แปลงชื่อวันให้เป็นภาษาไทย
$thaiDay = $thaiDays[$currentDateTime->format('l')];

// แปลงเดือนให้เป็นภาษาไทย
$thaiMonths = ['January' => 'มกราคม', 'February' => 'กุมภาพันธ์', 'March' => 'มีนาคม', 'April' => 'เมษายน', 'May' => 'พฤษภาคม', 'June' => 'มิถุนายน', 'July' => 'กรกฎาคม', 'August' => 'สิงหาคม', 'September' => 'กันยายน', 'October' => 'ตุลาคม', 'November' => 'พฤศจิกายน', 'December' => 'ธันวาคม'];
$thaiMonth = $thaiMonths[$currentDateTime->format('F')];
$thaiYear = $currentDateTime->format('Y') + 543;

// เขียนเวลาที่ได้ให้เป็นภาษาไทย
$thaiTime1 = str_replace($currentDateTime->format('l'), $thaiDay, $thaiTime1);
$thaiTime1 = str_replace($currentDateTime->format('F'), $thaiMonth, $thaiTime1);
$thaiTime1 = str_replace($currentDateTime->format('Y'), $thaiYear, $thaiTime1);


?>
<?php include("link.php"); ?>
<?php include("script.php"); ?>
<?php include("infodashboard/countcovid.php"); ?>
<?php include("infodashboard/counter.php"); ?>
<?php include("infodashboard/countadmiter.php"); ?>
<?php include("infodashboard/countbaby.php"); ?>
<?php include("infodashboard/countouttime.php"); ?>
<?php include("infodashboard/countouttime1.php"); ?>
<?php include("infodashboard/countdata.php"); ?>
<?php include("connecttest.php"); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.highcharts.com/10.3.1/highcharts.js"></script>
    <script src="https://code.highcharts.com/10.3.1/modules/data.js"></script>
    <script src="https://code.highcharts.com/10.3.1/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/10.3.1/modules/accessibility.js"></script>
    <link rel="stylesheet" href="test3.css">
    <title>Gauge Chart Dashboard</title>
  
</head>
<body>

<div class="grid grid-rows-[auto_1fr] gap-4 min-h-screen bg-gray-200">

  <!-- Top section -->
  <div class="grid grid-cols-1 md:grid-cols-12 gap-4 bg-light-green p-3 h-[900px] md:h-[265px]">
    <div class="col-span-1 md:col-span-4 bg-white text-white rounded-xl shadow-lg relative">
    <div id="container4" class="h-[400px] md:h-full pt-[40px] rounded-xl"></div>
      <p class="absolute top-2 left-1/2 transform -translate-x-1/2 text-[11px] md:text-[12px] text-black font-medium">
        อัพเดตข้อมูลล่าสุด: วัน<?= $thaiTime1 ?> เวร : บ่าย</p>
    </div>

    <div class="col-span-1 md:col-span-8 bg-white rounded-xl shadow-lg relative">
      <div id="chart-container" class="h-[400px] md:h-full pt-[40px] rounded-xl"></div>
      <p class="absolute top-2 left-1/2 transform -translate-x-1/2 text-[11px] md:text-[12px] text-black font-medium">
        อัพเดตข้อมูลล่าสุด: วัน<?= $where_date ?> เวร : <?php echo $current_shift; ?></p>
    </div>
  </div>

  <!-- Bottom section -->
  <div class="grid grid-cols-1 md:grid-cols-12 gap-3 p-3 bg-light-green rounded-lg">
    <!-- First column -->
    <div class="col-span-1 md:col-span-3 bg-gradient-to-br from-sky-400 to-sky-600 gap-3 px-[12px] py-3 rounded-lg shadow-lg">
      <div class="text-white text-center text-[13px] md:text-[15px] font-semibold">อัพเดตข้อมูลล่าสุด: วัน<?= $thaiTime1 ?></div>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

        <div class="dashboard-card px-3 py-3 rounded-md shadow-md overflow-hidden bg-white">
            <p class="text-[11px] md:text-[13px] font-medium text-gray-800 text-center mb-3"><i class="mr-2 fa-solid fa-hand-holding-medical text-[10px] md:text-[15px]"></i>
            จำนวนผู้รับบริการ ER</p>
            
            <div class="gap-2 mt-2">
                <div class="pr-2">
                <h3 class="text-[18px] md:text-[20px] font-bold text-green-600 text-center"><?php echo $counter; ?> ราย</h3>
                </div>
                
            </div>
        </div>

        <div class="dashboard-card px-3 py-3 rounded-md shadow-md overflow-hidden bg-white">
            <p class="text-[11px] md:text-[13px] font-medium text-gray-800 text-center mb-3"><i class="mr-2 fas fa-procedures text-[10px] md:text-[15px]"></i>
            จำนวนผู้ป่วย admit จาก ER</p>
                        
            <div class="gap-2 mt-2">
                <div class="pr-2">
                <h3 class="text-[18px] md:text-[20px] font-bold text-green-600 text-center"><?php echo $countadmit; ?> ราย</h3>
                </div>
                
            </div>
        </div>

        

        <div class="dashboard-card px-3 py-3 rounded-md shadow-md overflow-hidden bg-white">
  <p class="text-[11px] md:text-[13px] font-medium text-gray-800 text-center mb-3"><i class="mr-2 fa-solid fa-baby-carriage text-[10px] md:text-[15px]"></i>
  จำนวนผู้ป่วยคลอดบุตร</p>
  
  <div class="grid grid-cols-2 gap-2 mt-2">
    <div class="border-r border-gray-200 pr-2">
      <p class="text-[12px] text-gray-600 text-center">ปกติ</p>
      <h3 class="text-[18px] md:text-[20px] font-bold text-green-600 text-center"><?php echo $countbaby; ?> ราย</h3>
    </div>
    
    <div class="pl-2">
      <p class="text-[12px] text-gray-600 text-center">ผิดปกติ</p>
      <h3 class="text-[18px] md:text-[20px] font-bold text-red-600 text-center"><?php echo $countbaby1; ?> ราย</h3>
    </div>
  </div>
</div>

<div class="dashboard-card px-3 py-3 rounded-md shadow-md overflow-hidden bg-white">
  <p class="text-[11px] md:text-[13px] font-medium text-gray-800 text-center"><i class="mr-2 fa-solid fa-people-group text-[10px] md:text-[15px]"></i>
  จำนวนผ่าตัดในเวลา/นอกเวลา</p>
  
  <div class="grid grid-cols-2 gap-2 mt-2">
    <div class="border-r border-gray-200 pr-2">
      <p class="text-[12px] text-gray-600 text-center">ในเวลา</p>
      <h3 class="text-[18px] md:text-[20px] font-bold text-green-600 text-center"><?php echo $total_sum_out; ?> ราย</h3>
    </div>
    
    <div class="pl-2">
      <p class="text-[12px] text-gray-600 text-center">นอกเวลา</p>
      <h3 class="text-[18px] md:text-[20px] font-bold text-red-600 text-center"><?php echo $total_sum_in; ?> ราย</h3>
    </div>
  </div>
</div>

<div class="dashboard-card px-3 py-3 rounded-md shadow-md overflow-hidden bg-white">
  <p class="text-[11px] md:text-[13px] font-medium text-gray-800 text-center mb-2">จำนวนผู้ป่วยห้องตรวจนอกเวลา</p>
  
  <div class="flex items-center justify-center mb-2">
    <div class="w-10 h-10 rounded-full flex items-center justify-center">
      <i class="fa-solid fa-stethoscope text-[18px] md:text-[20px]"></i>
    </div>
  </div>
  
  <div class="grid grid-cols-2 gap-2 mt-2">
    <div class="border-r border-gray-200 pr-2">
      <p class="text-[12px] text-gray-600 text-center">เช้านอกเวลา</p>
      <h3 class="text-[18px] md:text-[20px] font-bold text-green-600 text-center"><?php echo $totalOuttimeMorning ? $totalOuttimeMorning : '0'; ?> ราย</h3>
    </div>
    
    <div class="pl-2">
      <p class="text-[12px] text-gray-600 text-center">บ่ายนอกเวลา</p>
      <h3 class="text-[18px] md:text-[20px] font-bold text-red-600 text-center"><?php echo $totalOuttimeAfternoon ? $totalOuttimeAfternoon : '0'; ?> ราย</h3>
    </div>
  </div>
</div>

<div class="dashboard-card px-3 py-3 rounded-md shadow-md overflow-hidden bg-white">
  <p class="text-[11px] md:text-[13px] font-medium text-gray-800 text-center"><i class="mr-2 fa-solid fa-virus-covid text-[18px] md:text-[15px]"></i>ผู้ป่วยโควิด 19 ที่หอผู้ป่วยติดเชื้อแยกโรค</p>
    
  <div class="ap-2 mt-2">
      <h3 class="text-[18px] md:text-[20px] font-bold text-green-600 text-center"><?php echo $countcovid; ?> ราย</h3>
    </div>
        
  <p class="text-gray-600 text-[10px] md:text-[13px] mt-2 text-center">อัพเดตข้อมูลล่าสุด </p>
    <p class="text-[11px] md:text-[12.5px] mt-2 text-center">วัน<?= $where_date ?> เวร : <?= $current_shift ?></p>
</div>

<div class="col-span-2 dashboard-card px-3 py-3 rounded-md shadow-md overflow-hidden bg-white">
<p class="text-[11px] md:text-[15px] text-center font-medium text-gray-800"><i class="fa-solid fa-hospital-user text-gray-800 text-[12px] md:text-[13px] mr-1"></i>
    จำนวนผู้ป่วยรับบริการคลีนิกนอกเวลาล้นไป ER</p>
  
  <div class="grid grid-cols-2 gap-2 mt-2">
    <div class="border-r border-gray-200 pr-2">
      <p class="text-[12px] text-gray-600 text-center">นอกเวลา(8.30-12.30)</p>
      <h3 class="text-[18px] md:text-[20px] font-bold text-green-600 text-center mt-2"><?php echo $totalErMorning ? $totalErMorning : '0'; ?> ราย</h3>
      <p class="text-[10px] mt-2 md:text-[12px] text-center"><strong>หมายเหตุ (เช้านอกเวลา):</strong> </P>
        <p class="text-[10px] mt-2 md:text-[12px] text-center"> <?php echo $reportReasonMorning ? $reportReasonMorning : 'ไม่มีข้อมูล'; ?></p>
    </div>
    
    <div class="pl-2">
      <p class="text-[12px] text-gray-600 text-center">นอกเวลา(16.30-20.30)</p>
      <h3 class="text-[18px] md:text-[20px] font-bold text-red-600 text-center mt-2"><?php echo $totalErAfternoon ? $totalErAfternoon : '0';?> ราย</h3>
      <p class="text-[10px] mt-2 md:text-[12px] text-center"><strong>หมายเหตุ (เช้านอกเวลา):</strong> </P>
        <p class="text-[10px] mt-2 md:text-[12px] text-center"> <?php echo $reportReasonAfternoon ? $reportReasonAfternoon : 'ไม่มีข้อมูล'; ?></p>
    </div>
  </div>
</div>

      </div>
    </div>

    <!-- Second column (first table) -->
    <div class="col-span-1 md:col-span-3">
      <div class="dashboard-card h-full">
        <div class="overflow-auto max-h-[400px] md:max-h-[600px]">
          <table class="w-full table-fixed">
            <thead class="sticky top-0">
              <tr>
                <th class="w-[170px] text-[10px] md:text-[13px] py-3 md:py-3 px-2 md:px-2 text-center text-white font-medium">หอผู้ป่วยสามัญ</th>
                <th class="w-[90px] text-[10px] md:text-[13px] py-3 md:py-3 px-2 md:px-2 text-center text-white font-medium">จำนวนผู้ป่วย</th>
                <th class="w-[65px] text-[10px] md:text-[13px] py-3 md:py-3 px-2 md:px-2 text-center text-white font-medium">ห้องว่าง</th>
                <th class="w-[70px] text-[10px] md:text-[13px] py-3 md:py-3 px-2 md:px-2 text-center text-white font-medium">ห้องชำรุด</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $ward_data = [
                ['ward' => 'อายุรกรรมชาย 1', 'beds' => 0, 'occupied' => 0, 'empty' => 0],
                ['ward' => 'สงฆ์ล่าง', 'beds' => 0, 'occupied' => 0, 'empty' => 0],
                ['ward' => 'ศัลยกรรมชาย 2', 'beds' => 0, 'occupied' => 0, 'empty' => 0],
                ['ward' => 'ศัลยกรรมชาย', 'beds' => 0, 'occupied' => 0, 'empty' => 0],
                ['ward' => 'อายุรกรรมชาย 2', 'beds' => 0, 'occupied' => 0, 'empty' => 0],
                ['ward' => 'ศัลยกรรมหญิง', 'beds' => 0, 'occupied' => 0, 'empty' => 0],
                ['ward' => 'อายุรกรรมหญิง 4', 'beds' => 0, 'occupied' => 0, 'empty' => 0],
                ['ward' => 'อายุรกรรมหญิง 3', 'beds' => 0, 'occupied' => 0, 'empty' => 0],
                ['ward' => 'ศัลยกรรมกระดูกชาย', 'beds' => 0, 'occupied' => 0, 'empty' => 0],
                ['ward' => 'ศัลยกรรมกระดูกหญิง', 'beds' => 0, 'occupied' => 0, 'empty' => 0],
                ['ward' => 'นีรเวช และพิเศษหญิงรวม', 'beds' => 0, 'occupied' => 0, 'empty' => 0],
                ['ward' => 'เมตตาจิต', 'beds' => 0, 'occupied' => 0, 'empty' => 0],
                ['ward' => 'ตา หู คอ จมูก', 'beds' => 0, 'occupied' => 0, 'empty' => 0],
                ['ward' => 'หลังคลอด', 'beds' => 0, 'occupied' => 0, 'empty' => 0],
                ['ward' => 'สงฆ์บน', 'beds' => 0, 'occupied' => 0, 'empty' => 0],
              ];
              
              foreach ($ward_data as $row) { ?>
                <tr class="border-b hover:bg-gray-50">
                  <td class="py-2 md:py-2 px-3 md:px-4 text-gray-700 text-[11px] md:text-[13px] truncate whitespace-nowrap"><?php echo $row['ward']; ?></td>
                  <td class="py-2 md:py-2 px-3 md:px-4 text-gray-600 text-[11px] md:text-[13px] text-center"><?php echo $row['beds']; ?></td>
                  <td class="py-2 md:py-2 px-3 md:px-4 text-green-600 text-[11px] md:text-[13px] text-center font-medium"><?php echo $row['occupied']; ?></td>
                  <td class="py-2 md:py-2 px-3 md:px-4 text-red-600 text-[11px] md:text-[13px] text-center font-medium"><?php echo $row['empty']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Third column (Title + ICU table) -->
    <div class="col-span-1 md:col-span-3">
      <div class="grid grid-rows-3 gap-4 h-full">
        <!-- Title card -->
        <div class="title-card relative flex bg-white rounded-full items-center justify-center text-center p-4 md:p-6 drop-shadow-sm overflow-hidden border-t-[6px] border-l-[4px] border-t-green-800 border-l-green-800">
          <div class="custom-body relative z-10">
            <h1 class="text-[28px] sm:text-[40px] md:text-[50px] font-bold text-sky-600 drop-shadow-lg">
              สถิติบริการผู้ป่วย
            </h1>
            <p class="text-[18px] sm:text-[22px] md:text-[30px] text-gray-900">
              รายงานข้อมูลประจำวัน
            </p>
            <p class="text-[16px] sm:text-[20px] md:text-[25px] text-gray-900">
              วัน<?= $thaiTime ?>
            </p>
          </div>
        </div>

        <!-- ICU table -->
        <div class="row-span-2 dashboard-card relative">
  <div class="overflow-auto max-h-[300px] md:max-h-[600px]">
    <table class="w-full table-fixed relative" id="icu-table">
      <thead class="bg-gray-800">
        <tr>
          <th class="w-[170px] text-[15px] md:text-[15px] py-3 md:py-3 px-2 md:px-2 text-center text-white font-medium">หอผู้ป่วย ICU</th>
          <th class="w-[90px] text-[15px] md:text-[15px] py-3 md:py-3 px-2 md:px-2 text-center text-white font-medium">จำนวนผู้ป่วย</th>
          <th class="w-[65px] text-[15px] md:text-[15px] py-3 md:py-3 px-2 md:px-2 text-center text-white font-medium">ห้องว่าง</th>
          <th class="w-[70px] text-[15px] md:text-[15px] py-3 md:py-3 px-2 md:px-2 text-center text-white font-medium">ห้องชำรุด</th>
        </tr>
      </thead>
      <tbody>
        <!-- ข้อมูลจะถูกเพิ่มที่นี่โดย JavaScript -->
      </tbody>
    </table>
  </div>
    <p class="text-center absolute bottom-4 left-0 right-0 pb-2"><strong>วัน<?= $thaiTime ?></strong></p> 
</div>
      </div>
    </div>

    <!-- Fourth column (Ventilator table) -->
    <div class="col-span-1 md:col-span-3">
      <div class="dashboard-card h-full">
        <div class="overflow-auto max-h-[400px] md:max-h-[600px]">
          <table class="w-full table-fixed">
            <thead class="sticky top-0">
              <tr>
              <th class="w-[60px] py-3 px-4 text-center text-white font-medium text-[15px]">หน่วยงาน</th>
              <th class="w-[10px] py-3 px-4 text-center text-white font-medium text-[15px]">Ventilator</th>
              <th class="w-[10px] py-3 px-4 text-center text-white font-medium text-[15px]">Ventilator Mobile</th>
              <th class="w-[60px] py-3 px-4 text-center text-white font-medium text-[15px]">Ventilator(ยืม)</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $vent_data = [
                ['unit' => 'Orthoชาย', 'vent' => 0, 'mobile' => 0, 'borrowed' => 0],
                ['unit' => 'Orthoหญิง', 'vent' => 0, 'mobile' => 0, 'borrowed' => 0],
                ['unit' => 'ศัลยกรรมชาย 1', 'vent' => 0, 'mobile' => 0, 'borrowed' => 0],
                ['unit' => 'ศัลยกรรมชาย 2', 'vent' => 0, 'mobile' => 0, 'borrowed' => 0],
                ['unit' => 'ศัลยกรรมหญิง', 'vent' => 0, 'mobile' => 0, 'borrowed' => 0],
                ['unit' => 'อายุรกรรมชาย 1', 'vent' => 0, 'mobile' => 0, 'borrowed' => 0],
                ['unit' => 'อายุรกรรมชาย 2', 'vent' => 0, 'mobile' => 0, 'borrowed' => 0],
                ['unit' => 'อายุรกรรมชาย 3', 'vent' => 0, 'mobile' => 0, 'borrowed' => 0],
                ['unit' => 'สูติกรรม 3', 'vent' => 0, 'mobile' => 0, 'borrowed' => 0],
                ['unit' => 'ER', 'vent' => 0, 'mobile' => 0, 'borrowed' => 0],
                ['unit' => 'Stroke Unit', 'vent' => 0, 'mobile' => 0, 'borrowed' => 0],
                ['unit' => 'Spoin unit', 'vent' => 0, 'mobile' => 0, 'borrowed' => 0],
                ['unit' => 'สงฆ์บน', 'vent' => 0, 'mobile' => 0, 'borrowed' => 0],
                ['unit' => 'ICUMED1', 'vent' => 0, 'mobile' => 0, 'borrowed' => 0],
                ['unit' => 'ICUMED2', 'vent' => 0, 'mobile' => 0, 'borrowed' => 0],
                ['unit' => 'วิสัญญี', 'vent' => 0, 'mobile' => 0, 'borrowed' => 0],
              ];
              
              foreach ($vent_data as $row) { ?>
                <tr class="border-b hover:bg-gray-50">
                  <td class="py-2 md:py-2 px-3 md:px-4 text-[9px] md:text-[11px] text-gray-700"><?php echo $row['unit']; ?></td>
                  <td class="py-2 md:py-2 px-3 md:px-4 text-[9px] md:text-[11px] text-gray-700 text-center"><?php echo $row['vent']; ?></td>
                  <td class="py-2 md:py-2 px-3 md:px-4 text-[9px] md:text-[11px] text-sky-600 text-center"><?php echo $row['mobile']; ?></td>
                  <td class="py-2 md:py-2 px-3 md:px-4 text-[9px] md:text-[11px] text-orange-500 text-center"><?php echo $row['borrowed']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
  </div>
</div>

<script>
$(document).ready(function() {
    $.ajax({
        url: 'api_get_report.php',
        method: 'GET',
        success: function(response) {
            let tableBody = $('#icu-table tbody');  // เจาะจงเลือก tbody ของ table ที่มี id="icu-table"
            tableBody.empty();
            
            if (response.length > 0) {
                response.forEach(function(report) {
                    let row = `
                        <tr class="border-b hover:bg-gray-50">
                            <td class="text-[14px] py-2 px-3 text-gray-700">${report.BuildingName}</td>
                            <td class="text-[14px] py-2 px-3 text-gray-700 text-center">${report.PatientsInRooms || '0'}</td>
                            <td class="text-[14px] py-2 px-3 text-green-600 text-center font-medium">${report.AvailableRooms || '0'}</td>
                            <td class="text-[14px] py-2 px-3 text-red-600 text-center font-medium">${report.DamagedRooms || '0'}</td>
                        </tr>
                    `;
                    tableBody.append(row);
                });
            } else {
                tableBody.append(`
                    <tr class="border-b">
                        <td colspan="4" class="py-2 px-4 text-center text-gray-700">ไม่มีข้อมูล</td>
                    </tr>
                `);
            }
        },
        error: function() {
            Swal.fire('Error', 'Error fetching report data', 'error');
        }
    });
});
</script>
<script src="js/dashbosshigh.js"></script>
<!-- กราฟแท่ง -->
<script src="js/test1.js"></script>
<script src="js/show_report.js"></script>
<script src="js/show_report1.js"></script>
<script src="js/show_report2.js"></script>