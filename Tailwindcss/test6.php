<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="test.css">
    <title>Gauge Chart Dashboard</title>

    <?php
        // จำลองข้อมูลสำหรับ bar chart 32 รายการ
        $bars_data = array_map(function($i) {
            return [
                'x' => 'อายุรกรรม ' . ($i + 1),
                'y' => rand(50, 100)
            ];
        }, range(0, 4));

        ?>


    
</head>
<body>

<div>
    
    <!-- การ์ดใหญ่ 1 -->
    <div class="flex flex-col min-h-screen relative ">

    
    <!-- การ์ดใหญ่ 1 -->
    <header class="relative bg-gradient-to-r from-green-400 to-green-700 shadow-md z-10">
    <div class="container mx-auto relative">
        <!-- Wrapper for content with relative positioning -->
        <div class="flex items-center justify-center pt-5 pb-4 px-4">
            <!-- Left logo container with percentage positioning -->
            <div class="absolute left-[20%] top-1/2 transform -translate-y-1/2">
                <img src="logo.png" alt="Logo" class="w-[120px] h-auto">
            </div>
            
            <!-- Center text -->
            <div class="flex flex-col text-center mx-auto">
                <h1 class="text-4xl text-white font-semibold tracking-wide">
                    รายงานสถิติบริการ สถานการณ์ประจำวัน
                </h1>
                <p class="mt-2 text-2xl text-gray-200 font-light">
                    กลุ่มภารกิจด้านการพยาบาล
                </p>
            </div>
            
            <!-- Right icon container with percentage positioning -->
            <div class="absolute right-[20%] top-1/2 transform -translate-y-1/2">
                <div class="w-20 h-20 bg-white rounded-full shadow-lg flex items-center justify-center">
                    <i class="fa-solid fa-chart-line text-green-600 text-3xl"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Border at bottom -->
    <div class="border-b-[11px] border-green-700"></div>
</header>
    <!-- การ์ดใหญ่ 1 -->
    
    
    
    <!-- การ์ดใหญ่ 2 -->
    <div class="p-2 overflow-auto bg-gradient-to-br from-green-200 to-green-300 z-10">
        

        <div class="grid grid-cols-12 gap-4">

       <!-- การ์ดแรก -->
<div class="col-span-4 relative w-full">
    <div class="col-span-4 relative">
        <!-- โลโก้จะถูกซ่อนบนหน้าจอขนาดเล็ก และแสดงบนหน้าจอขนาดกลาง -->
        <img src="5.png" alt="Logo" class="hidden md:block absolute top-[35px] left-[150px] transform -translate-x-1/2 -translate-y-1/2 w-auto h-[60px]">
        <img src="5.png" alt="Logo" class="hidden md:block absolute top-[35px] right-[90px] transform -translate-x-1/2 -translate-y-1/2 w-auto h-[60px]">

        <div class="bg-green-50 rounded-lg p-3 md:p-4 shadow-lg border border-green-200">

            <div class="px-2 md:px-4 border-b-4 border-green-600 max-w-md mx-auto mb-3 md:mb-4">
                <h2 class="text-xl md:text-2xl font-bold text-green-800 text-center mb-3 md:mb-4">Nursing Productivity</h2>
            </div>
            
            <!-- Chart Section -->
            <div class="max-w-md mx-auto bg-white text-white rounded-xl shadow-lg">
                <div id="bars-chart" style="width: 100%;"></div>
            </div>

            <!-- Patient Count -->
            <div class="py-2">
                <h2 class="text-base md:text-lg font-bold text-gray-700 text-center">จำนวนผู้ป่วย</h2>
            </div>
            <!-- ปรับเป็น 1 คอลัมน์บนมือถือ, 2 คอลัมน์บนแท็บเล็ตขึ้นไป -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                <div class="bg-teal-100 rounded-md flex items-center space-x-2 md:space-x-4 p-1 shadow-md">
                    <div class="flex items-center justify-center w-[70px] sm:w-[80px] md:w-[100px] h-[70px] sm:h-[80px] md:h-[100px] overflow-hidden">
                        <img src="11.png" alt="Logo" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">
                    </div>  
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 leading-none">145</h2>
                        <p class="text-emerald-600 text-xs md:text-sm mt-1">รับบริการ ER</p>
                    </div>
                </div>
                <div class="bg-teal-100 rounded-md flex items-center space-x-2 md:space-x-4 p-1 shadow-md">
                    <div class="flex items-center justify-center w-[70px] sm:w-[80px] md:w-[100px] h-[70px] sm:h-[80px] md:h-[100px] overflow-hidden">
                        <img src="13.png" alt="Logo" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">
                    </div>  
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 leading-none">20</h2>
                        <p class="text-teal-700 text-xs md:text-sm mt-1">admit จาก ER</p>
                    </div>
                </div>
            </div>
            
            <!-- แถวที่ 2 ของการ์ด -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mt-2">
                <div class="bg-white rounded-lg shadow-md border border-gray-200">
                    <div class="relative bg-sky-100 p-2 md:p-4 rounded-t-lg flex items-center justify-center h-[90px] md:h-[110px]">
                        <img src="15.png" alt="Logo" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-auto h-[80px] md:h-[110px] drop-shadow-md hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="grid grid-cols-2 bg-sky-50 px-2 md:px-4 py-2 md:py-3 gap-2 md:gap-4">
                        <div class="text-center">
                            <span class="text-xl md:text-2xl font-bold text-gray-800 block">30</span>
                            <p class="text-sky-500 text-xs md:text-sm">ห้องตรวจ (เช้า)</p>
                            <p class="text-sky-500 text-xs md:text-sm">นอกเวลา</p>
                        </div>
                        <div class="text-center">
                            <span class="text-xl md:text-2xl font-bold text-gray-800 block">45</span>
                            <p class="text-sky-500 text-xs md:text-sm">ห้องตรวจ (บ่าย)</p>
                            <p class="text-sky-500 text-xs md:text-sm">นอกเวลา</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md border border-gray-200">
                    <div class="relative bg-sky-100 p-2 md:p-4 rounded-t-lg flex items-center justify-center h-[90px] md:h-[110px]">
                        <img src="9.png" alt="Logo" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-auto h-[80px] md:h-[110px] drop-shadow-md hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="grid grid-cols-2 bg-sky-50 px-2 md:px-4 py-2 md:py-3 gap-2 md:gap-4">
                        <div class="text-center">
                            <span class="text-xl md:text-2xl font-bold text-gray-800 block">30</span>
                            <p class="text-sky-500 text-xs md:text-sm">ห้องตรวจ (เช้า)</p>
                            <p class="text-sky-500 text-xs md:text-sm">นอกเวลาล้น ER</p>
                        </div>
                        <div class="text-center">
                            <span class="text-xl md:text-2xl font-bold text-gray-800 block">45</span>
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
                        <img src="2.png" alt="Logo" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-auto h-[80px] md:h-[105px] drop-shadow-md hover:scale-105 transition-transform duration-300" />
                    </div>
                    <div class="grid grid-cols-2 bg-sky-50 p-2 md:p-3 gap-2 md:gap-4">
                        <div class="text-center">
                            <span class="text-xl md:text-2xl font-bold text-gray-800 block">30</span>
                            <p class="text-sky-500 text-xs md:text-sm">จำนวนผ่าตัด</p>
                            <p class="text-sky-500 text-xs md:text-sm">(ในเวลา)</p>
                        </div>
                        <div class="text-center">
                            <span class="text-xl md:text-2xl font-bold text-gray-800 block">45</span>
                            <p class="text-sky-500 text-xs md:text-sm">จำนวนผ่าตัด</p>
                            <p class="text-sky-500 text-xs md:text-sm">(นอกเวลา)</p>
                        </div>
                    </div>
                </div>

                <!-- การ์ด: จำนวนคลอด -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200">
                    <div class="relative bg-rose-100 p-2 md:p-4 rounded-t-lg flex items-center justify-center h-[90px] md:h-[110px]">
                        <img src="3.png"
                            alt="Logo"
                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-auto h-[80px] md:h-[105px] drop-shadow-md hover:scale-105 transition-transform duration-300" />
                    </div>
                    <div class="grid grid-cols-2 bg-rose-50 p-2 md:p-3 gap-2 md:gap-4">
                        <div class="text-center">
                            <span class="text-xl md:text-2xl font-bold text-gray-800 block">30</span>
                            <p class="text-rose-500 text-xs md:text-sm">จำนวนคลอด</p>
                            <p class="text-rose-500 text-xs md:text-sm">(ปกติ)</p>
                        </div>
                        <div class="text-center">
                            <span class="text-xl md:text-2xl font-bold text-gray-800 block">45</span>
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
                                            <img src="17.png" alt="Logo" class="w-full h-full object-cover">
                                        </div>
                                        <div class="flex flex-col items-center justify-center">
                                            <h2 class="text-xl font-bold text-gray-800 leading-none">จำนวนเตียงผู้ป่วย</h2>
                                            <p class="text-sky-500 text-xl mt-1">(ตึกสามัญ)</p>
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
                                                    ['ward' => 'อายุรกรรมชาย 1', 'beds' => 30, 'occupied' => 28],
                                                    ['ward' => 'สงฆ์ล่าง', 'beds' => 32, 'occupied' => 30],
                                                    ['ward' => 'ศัลยกรรมชาย 2', 'beds' => 28, 'occupied' => 25],
                                                    ['ward' => 'ศัลยกรรมชาย', 'beds' => 25, 'occupied' => 22],
                                                    ['ward' => 'อายุรกรรมชาย 2', 'beds' => 25, 'occupied' => 20],
                                                    ['ward' => 'ศัลยกรรมหญิง', 'beds' => 20, 'occupied' => 15],
                                                    ['ward' => 'อายุรกรรมหญิง 4', 'beds' => 22, 'occupied' => 18],
                                                    ['ward' => 'อายุรกรรมหญิง 3', 'beds' => 15, 'occupied' => 12],
                                                    ['ward' => 'ศัลยกรรมกระดูกชาย', 'beds' => 15, 'occupied' => 10],
                                                    ['ward' => 'ศัลยกรรมกระดูกหญิง', 'beds' => 15, 'occupied' => 10],
                                                    ['ward' => 'นีรเวช และพิเศษหญิงรวม', 'beds' => 15, 'occupied' => 10],
                                                    ['ward' => 'เมตตาจิต', 'beds' => 15, 'occupied' => 10],
                                                    ['ward' => 'ตา หู คอ จมูก', 'beds' => 15, 'occupied' => 10],
                                                    ['ward' => 'หลังคลอด', 'beds' => 15, 'occupied' => 10],
                                                    ['ward' => 'สงฆ์บน', 'beds' => 15, 'occupied' => 10],
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
                                                <img src="IC3.png" alt="Logo" class="w-full h-full object-cover">
                                            </div>
                                            <div class="flex flex-col items-center justify-center">
                                                <h2 class="text-xl font-bold text-gray-800 leading-none">จำนวนเตียงผู้ป่วย</h2>
                                                <p class="text-red-500 text-xl mt-1">(ตึก ICU)</p>
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
                                                        $icu_data = [
                                                            ['unit' => 'ICU อายุรกรรม', 'beds' => 8, 'occupied' => 7],
                                                            ['unit' => 'ICU ศัลยกรรม', 'beds' => 6, 'occupied' => 5],
                                                            ['unit' => 'ICU กุมารเวช', 'beds' => 4, 'occupied' => 3],
                                                            ['unit' => 'CCU', 'beds' => 6, 'occupied' => 4],
                                                        ];
                                                        foreach ($icu_data as $row) { ?>
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
                                    
                                    <!-- หัวข้อและข้อมูล ICU ชุดที่ 2 -->
                                    <div>
                                        <div class="flex items-center space-x-4">
                                            <div class="flex items-center justify-center w-[100px] h-[100px] overflow-hidden ml-2">
                                                <img src="21.png" alt="Logo" class="w-auto h-[70px] object-cover">
                                            </div>
                                            <div class="flex flex-col items-center justify-center">
                                                <h2 class="text-xl font-bold text-gray-800 leading-none">จำนวนเตียงผู้ป่วย</h2>
                                                <p class="text-red-500 text-xl mt-1">(ตึกพิเศษ)</p>
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
    <div class="bg-green-50 rounded-md w-full mb-4">
        <div class="rounded-md flex items-center space-x-2 md:space-x-4 p-1">
            <!-- ส่วนรูปภาพ - คงไว้เหมือนเดิม -->
            <div class="flex items-center justify-center w-[150px] sm:w-[80px] md:w-[200px] h-[150px] sm:h-[80px] md:h-[200px] overflow-hidden">
                <img src="22.png" alt="Logo" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">
            </div>  
            
            <!-- ส่วนข้อความ - มีหัวข้อใหญ่ และแบ่งข้อมูลซ้ายขวาด้านล่าง -->
            <div class="flex-1 flex flex-col pr-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 leading-none mb-5 text-center">จำนวนเครื่องที่พร้อมใช้งาน</h2>
                
                <div class="grid grid-cols-2 gap-6 flex-grow text-center w-full">
                    <div class="flex flex-col items-center">
                        <span class="text-4xl font-bold text-blue-500">0</span>
                        <span class="text-lg font-medium">เครื่องช่วยหายใจ</span>
                        <span class="text-sm text-gray-600">(คงเหลือพร้อมใช้)</span>
                    </div>
                    
                    <div class="flex flex-col items-center">
                        <span class="text-4xl font-bold text-blue-500">0</span>
                        <span class="text-lg font-medium">Infusion pump</span>
                        <span class="text-sm text-gray-600">(คงเหลือพร้อมใช้)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg-green-50 rounded-md w-full">
        <div class="rounded-md flex items-center space-x-2 md:space-x-4 p-1">
            <!-- ส่วนรูปภาพ - คงไว้เหมือนเดิม -->
            <div class="flex items-center justify-center w-[150px] sm:w-[80px] md:w-[200px] h-[150px] sm:h-[80px] md:h-[200px] overflow-hidden">
                <img src="23.png" alt="Logo" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">
            </div>  
            
            <!-- ส่วนข้อความ - มีหัวข้อใหญ่ และแบ่งข้อมูลซ้ายขวาด้านล่าง -->
            <div class="flex-1 flex flex-col pr-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 leading-none mb-5 text-center">จำนวนเครื่องที่ใช้งานอยู่</h2>
                
                <div class="grid grid-cols-2 gap-6 flex-grow text-center w-full">
                    <div class="flex flex-col items-center">
                        <span class="text-4xl font-bold text-blue-500">0</span>
                        <span class="text-lg font-medium">เครื่องช่วยหายใจ</span>
                    </div>
                    
                    <div class="flex flex-col items-center">
                        <span class="text-4xl font-bold text-blue-500">0</span>
                        <span class="text-lg font-medium">Infusion pump</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                    <!-- การ์ดสาม -->


        <!-- การ์ดใหญ่ 2 -->


</div>
</div>
</body>


    <script>

document.addEventListener('DOMContentLoaded', function() {
    const options = {
        series: [{
            name: 'Value',
            data: <?php echo json_encode(array_column($bars_data, 'y')); ?>
        }],
        chart: {
            type: 'bar',
            height: 100,
            toolbar: { show: false },
            background: 'transparent'
        },
        plotOptions: {
            bar: { 
                horizontal: false,
                columnWidth: '70%',
                borderRadius: 4,
                endingShape: 'flat'
            }
        },
        dataLabels: { 
            enabled: false 
        },
        stroke: { 
            show: false 
        },
        xaxis: {
            categories: <?php echo json_encode(array_column($bars_data, 'x')); ?>,
            labels: {
                style: { 
                    colors: '#666',
                    fontSize: '12px'
                },
                rotate: 0
            },
            axisBorder: {
                show: true,
                color: '#E5E7EB'
            },
            axisTicks: {
                show: false
            }
        },
        yaxis: {
            max: 100,
            tickAmount: 2,
            labels: {
                style: { colors: '#666' }
            }
        },
        grid: {
            xaxis: {
                lines: {
                    show: false
                }
            },
            yaxis: {
                lines: {
                    show: false,
                    strokeDashArray: 3
                }
            }
        },
        fill: {
            opacity: 1,
            colors: ['#F87171']
        },
        tooltip: {
            enabled: false
        }
    };

    const chart = new ApexCharts(document.querySelector("#bars-chart"), options);
    chart.render();
});






    </script>

</body>
</html>