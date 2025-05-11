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

    <div>
        
        <!-- การ์ดใหญ่ 1 -->
        <div class="flex flex-col min-h-screen relative ">

    <!-- การ์ดใหญ่ 1 -->
    <header class="relative bg-gradient-to-r from-green-400 to-green-700 shadow-md z-10">

        
        <!-- Logo -->
        <!-- <div class="absolute right-[520px] top-1/2 transform -translate-y-1/2">
            <div class="w-20 h-20 bg-white rounded-full relative shadow-lg flex items-center justify-center">
                <i class="fa-solid fa-chart-line text-green-600 text-3xl"></i>
            </div>
        </div> -->

        <div class="grid grid-rows-[auto_1fr] border-b-[11px] border-green-700 py-2">
            <div class="max-w-5xl mx-auto px-4">
                <div class="flex flex-col text-center">
                    <h1 class="text-4xl text-white font-semibold tracking-wide">
                        รายงานสถิติบริการ สถานการณ์ประจำวัน
                    </h1>
                    <p class="mt-2 text-2xl text-gray-200 font-light">
                        กลุ่มภารกิจด้านการพยาบาล
                    </p>
                </div>
            </div>

        </div>

        <img src="image/logo.png" alt="Logo" class="absolute top-12 transform -translate-y-1/2 left-[520px] w-[110px] h-auto">
        
        
    </header>
    <!-- การ์ดใหญ่ 1 -->
        
        
        
        <!-- การ์ดใหญ่ 2 -->
        <div class="pt-3 pb-2 px-2 overflow-auto bg-gradient-to-br from-green-200 to-green-300 z-10">
            

            <div class="grid grid-cols-12 gap-3">

        <!-- การ์ดแรก -->
    <div class="col-span-4 relative w-full">
        <div class="col-span-4 relative">
            <!-- โลโก้จะถูกซ่อนบนหน้าจอขนาดเล็ก และแสดงบนหน้าจอขนาดกลาง -->
            <img src="image/5.png" alt="Logo" class="hidden md:block absolute top-[35px] left-[100px] transform -translate-x-1/2 -translate-y-1/2 w-auto h-[60px]">

            <div class="bg-green-50 rounded-lg p-3 md:p-4 shadow-lg border border-green-200">

                <div class="px-2 md:px-4 border-b-4 border-green-600 max-w-md mx-auto mb-3 md:mb-4">
                    <h2 class="text-xl font-bold text-green-800 text-center mb-3 md:mb-4">Nursing Productivity</h2>
                </div>
                
                <!-- Chart Section -->
                <div class="col-span-1 md:col-span-4 bg-white text-white rounded-xl shadow-lg relative">
                    <div id="container4" class="h-[150px] pt-[40px] rounded-xl"></div>
                    <p class="absolute top-2 left-1/2 transform -translate-x-1/2 text-[11px] md:text-[12px] text-black font-medium">
                        อัพเดตข้อมูลล่าสุด: วัน<?= $thaiTime1 ?> เวร : บ่าย</p>
                    </div>

                <!-- Patient Count -->
                <div class="py-2">
                    <h2 class="text-base md:text-lg font-bold text-gray-700 text-center">จำนวนผู้ป่วย</h2>
                </div>
                <!-- ปรับเป็น 1 คอลัมน์บนมือถือ, 2 คอลัมน์บนแท็บเล็ตขึ้นไป -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <div class="bg-teal-100 rounded-md flex items-center space-x-2 md:space-x-4 p-1 shadow-md">
                        <div class="flex items-center justify-center w-[70px] sm:w-[80px] md:w-[100px] h-[70px] sm:h-[80px] md:h-[100px] overflow-hidden">
                            <img src="image/11.png" alt="Logo" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">
                        </div>  
                        <div>
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 leading-none"><?php echo $counter; ?></h2>
                            <p class="text-emerald-600 text-sm mt-1">รับบริการ ER</p>
                        </div>
                    </div>
                    <div class="bg-teal-100 rounded-md flex items-center space-x-2 md:space-x-4 p-1 shadow-md">
                        <div class="flex items-center justify-center w-[70px] sm:w-[80px] md:w-[100px] h-[70px] sm:h-[80px] md:h-[100px] overflow-hidden">
                            <img src="image/13.png" alt="Logo" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">
                        </div>  
                        <div>
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 leading-none"><?php echo $countadmit; ?></h2>
                            <p class="text-teal-700 text-sm mt-1">admit จาก ER</p>
                        </div>
                    </div>
                </div>
                
                <!-- แถวที่ 2 ของการ์ด -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mt-2">
                    <div class="bg-white rounded-lg shadow-md border border-gray-200">
                        <div class="relative bg-sky-100 p-2 md:p-4 rounded-t-lg flex items-center justify-center h-[90px] md:h-[110px]">
                            <img src="image/15.png" alt="Logo" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-auto h-[80px] md:h-[110px] drop-shadow-md hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="grid grid-cols-2 bg-sky-50 px-2 md:px-4 py-2 md:py-3 gap-2 md:gap-4">
                            <div class="text-center">
                                <span class="text-xl md:text-2xl font-bold text-gray-800 block"><?php echo $totalOuttimeMorning ? $totalOuttimeMorning : '0'; ?></span>
                                <p class="text-sky-500 text-xs md:text-sm">ห้องตรวจ (เช้า)</p>
                                <p class="text-sky-500 text-xs md:text-sm">นอกเวลา</p>
                            </div>
                            <div class="text-center">
                                <span class="text-xl md:text-2xl font-bold text-gray-800 block"><?php echo $totalOuttimeAfternoon ? $totalOuttimeAfternoon : '0'; ?></span>
                                <p class="text-sky-500 text-xs md:text-sm">ห้องตรวจ (บ่าย)</p>
                                <p class="text-sky-500 text-xs md:text-sm">นอกเวลา</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md border border-gray-200">
                        <div class="relative bg-sky-100 p-2 md:p-4 rounded-t-lg flex items-center justify-center h-[90px] md:h-[110px]">
                            <img src="image/9.png" alt="Logo" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-auto h-[80px] md:h-[110px] drop-shadow-md hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="grid grid-cols-2 bg-sky-50 px-2 md:px-4 py-2 md:py-3 gap-2 md:gap-4">
                            <div class="text-center">
                                <span class="text-xl md:text-2xl font-bold text-gray-800 block"><?php echo $totalErMorning ? $totalErMorning : '0'; ?></span>
                                <p class="text-sky-500 text-xs md:text-sm">ห้องตรวจ (เช้า)</p>
                                <p class="text-sky-500 text-xs md:text-sm">นอกเวลาล้น ER</p>
                            </div>
                            <div class="text-center">
                                <span class="text-xl md:text-2xl font-bold text-gray-800 block"><?php echo $totalErAfternoon ? $totalErAfternoon : '0';?></span>
                                <p class="text-sky-500 text-xs md:text-sm">ห้องตรวจ (บ่าย)</p>
                                <p class="text-sky-500 text-xs md:text-sm">นอกเวลาล้น ER</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- แถวที่ 3 ของการ์ด -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mt-2">
                    <!-- การ์ด: จำนวนผ่าตัด -->
                    <div class="bg-white rounded-lg shadow-md border border-gray-200">
                        <div class="relative bg-sky-100 p-2 md:p-4 rounded-t-lg flex items-center justify-center h-[90px] md:h-[110px]">
                            <img src="image/2.png"
                                alt="Logo"
                                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-auto h-[80px] md:h-[105px] drop-shadow-md hover:scale-105 transition-transform duration-300" />
                        </div>
                        <div class="grid grid-cols-2 bg-sky-50 p-2 md:p-3 gap-2 md:gap-4">
                            <div class="text-center">
                                <span class="text-xl md:text-2xl font-bold text-gray-800 block"><?php echo $total_sum_out; ?></span>
                                <p class="text-sky-500 text-xs md:text-sm">จำนวนผ่าตัด</p>
                                <p class="text-sky-500 text-xs md:text-sm">(ในเวลา)</p>
                            </div>
                            <div class="text-center">
                                <span class="text-xl md:text-2xl font-bold text-gray-800 block"><?php echo $total_sum_in; ?></span>
                                <p class="text-sky-500 text-xs md:text-sm">จำนวนผ่าตัด</p>
                                <p class="text-sky-500 text-xs md:text-sm">(นอกเวลา)</p>
                            </div>
                        </div>
                    </div>

                    <!-- การ์ด: จำนวนคลอด -->
                    <div class="bg-white rounded-lg shadow-md border border-gray-200">
                        <div class="relative bg-rose-100 p-2 md:p-4 rounded-t-lg flex items-center justify-center h-[90px] md:h-[110px]">
                            <img src="image/3.png"
                                alt="Logo"
                                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-auto h-[80px] md:h-[105px] drop-shadow-md hover:scale-105 transition-transform duration-300" />
                        </div>
                        <div class="grid grid-cols-2 bg-rose-50 p-2 md:p-3 gap-2 md:gap-4">
                            <div class="text-center">
                                <span class="text-xl md:text-2xl font-bold text-gray-800 block"><?php echo $countbaby; ?></span>
                                <p class="text-rose-500 text-xs md:text-sm">จำนวนคลอด</p>
                                <p class="text-rose-500 text-xs md:text-sm">(ปกติ)</p>
                            </div>
                            <div class="text-center">
                                <span class="text-xl md:text-2xl font-bold text-gray-800 block"><?php echo $countbaby1; ?></span>
                                <p class="text-rose-500 text-xs md:text-sm">จำนวนคลอด</p>
                                <p class="text-rose-500 text-xs md:text-sm">(ผิดปกติ)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- การ์ดแรก -->

                        <!-- การ์ดสอง -->
                        <div class="col-span-4">
                            <div class="bg-green-50 rounded-md w-full h-full">
                                <div class="grid grid-cols-12 h-full p-3 gap-3 relative">
                                    <!-- First Card -->
                                    <div class="col-span-6 flex flex-col rounded-md">

                                        <div class="flex items-center space-x-4">
                                            <div class="flex items-center justify-center w-[100px] h-[100px] overflow-hidden ml-2">
                                                <img src="image/17.png" alt="Logo" class="w-full h-full object-cover">
                                            </div>
                                            <div class="flex flex-col items-center justify-center">
                                                <h2 class="text-[20px] font-bold text-gray-800 leading-none">จำนวนเตียงผู้ป่วย</h2>
                                                <p class="text-sky-500 text-[20px] mt-1">(ตึกสามัญ)</p>
                                            </div>
                                        </div>

                                        <div class="dashboard-card flex flex-col overflow-hidden">
                                            <div class="overflow-auto">
                                                <table class="w-full table-fixed">
                                                    <thead class="bg-sky-300 sticky top-0">
                                                        <tr>
                                                            <th class="w-[150px] text-sm py-3 px-2 text-center text-white font-medium">หอผู้ป่วยสามัญ</th>
                                                            <th class="w-[50px] text-sm py-3 px-2 text-center text-white font-medium">จำนวนเตียง</th>
                                                            <th class="w-[50px] text-sm py-3 px-2 text-center text-white font-medium">นอนรักษา</th>
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
                                                            <td class="py-2 px-4 text-gray-700 text-[13px] truncate whitespace-nowrap"><?php echo $row['ward']; ?></td>
                                                            <td class="py-2 px-4 text-gray-600 text-[13px] text-center"><?php echo $row['beds']; ?></td>
                                                            <td class="py-2 px-4 text-green-600 text-[13px] text-center font-medium"><?php echo $row['occupied']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Second Card -->
                                    <div class="col-span-6 rounded-md flex flex-col h-full">
                                        <!-- หัวข้อและข้อมูล ICU ชุดที่ 1 -->
                                        <div class="mb-3">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex items-center justify-center w-[100px] h-[100px] overflow-hidden ml-2">
                                                    <img src="image/IC3.png" alt="Logo" class="w-full h-full object-cover">
                                                </div>
                                                <div class="flex flex-col items-center justify-center">
                                                    <h2 class="text-[20px] font-bold text-gray-800 leading-none">จำนวนเตียงผู้ป่วย</h2>
                                                    <p class="text-red-500 text-[20px] mt-1">(ตึก ICU)</p>
                                                </div>
                                            </div>

                                            <div class="dashboard-card">
                                                <div class="overflow-auto max-h-[150px]">
                                                    <table class="w-full table-fixed" id="icu-table">
                                                        <thead class="bg-sky-300 sticky top-0">
                                                            <tr>
                                                                <th class="w-[90px] text-sm py-2 px-2 text-center text-white font-medium">รายชื่อ ICU</th>
                                                                <th class="w-[70px] text-sm py-2 px-2 text-center text-white font-medium">จำนวนเตียง</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- ข้อมูลจะถูกเพิ่มที่นี่โดย JavaScript -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- หัวข้อและข้อมูล ตึกพิเศษ ชุดที่ 2 -->
                                        <div>
                                            <div class="flex items-center space-x-4">
                                                <div class="flex items-center justify-center w-[100px] h-[100px] overflow-hidden ml-2">
                                                    <img src="image/21.png" alt="Logo" class="w-auto h-[70px] object-cover">
                                                </div>
                                                <div class="flex flex-col items-center justify-center">
                                                    <h2 class="text-[20px] font-bold text-gray-800 leading-none">จำนวนเตียงผู้ป่วย</h2>
                                                    <p class="text-red-500 text-[20px] mt-1">(ตึกพิเศษ)</p>
                                                </div>
                                            </div>

                                            <div class="dashboard-card">
                                                <div class="overflow-auto max-h-[150px]">
                                                    <table class="w-full table-fixed">
                                                        <thead class="bg-sky-300 sticky top-0">
                                                            <tr>
                                                                <th class="w-[90px] text-sm py-2 px-2 text-center text-white font-medium">รายชื่อ ICU</th>
                                                                <th class="w-[70px] text-sm py-2 px-2 text-center text-white font-medium">จำนวนเตียง</th>
                                                                <th class="w-[70px] text-sm py-2 px-2 text-center text-white font-medium">นอนรักษา</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $nicu_data = [
                                                                ['unit' => 'NICU 1', 'beds' => 4, 'occupied' => 2],
                                                                ['unit' => 'NICU 2', 'beds' => 4, 'occupied' => 2],
                                                                ['unit' => 'NICU 3', 'beds' => 4, 'occupied' => 2],
                                                            ];
                                                            foreach ($nicu_data as $row) { ?>
                                                                <tr class="border-b hover:bg-gray-50">
                                                                    <td class="py-1 px-4 text-gray-700 text-[13px] truncate whitespace-nowrap"><?php echo $row['unit']; ?></td>
                                                                    <td class="py-1 px-4 text-gray-600 text-[13px] text-center"><?php echo $row['beds']; ?></td>
                                                                    <td class="py-1 px-4 text-green-600 text-[13px] text-center font-medium"><?php echo $row['occupied']; ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- การ์ดสอง -->

                        <!-- การ์ดสาม -->
                        <div class="col-span-4">
                            <div class="bg-green-50 rounded-md w-full h-full">

                            </div>
                        </div>


    </div>
            <!-- การ์ดใหญ่ 2 -->


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