<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="test.css">
    <title>Gauge Chart Dashboard</title>
  
</head>
<body>


<div class="grid grid-rows-[auto_1fr] gap-4 min-h-screen bg-gray-200">

    <!-- ส่วนบน -->
    <div class="grid grid-cols-12 gap-6 bg-light-green p-4 h-[250px]">

        <?php
        // จำลองข้อมูลสำหรับ bar chart 32 รายการ
        $bar_data = array_map(function($i) {
            return [
                'x' => 'ward ' . ($i + 1),
                'y' => rand(50, 500)
            ];
        }, range(0, 33));

        // จำลองข้อมูลสำหรับ bar chart 32 รายการ
        $bars_data = array_map(function($i) {
            return [
                'x' => 'ward ' . ($i + 1),
                'y' => rand(50, 300)
            ];
        }, range(0, 4));

        ?>

            <div class="col-span-2 bg-white text-white rounded-xl shadow-lg">
                <div id="bars-chart"></div>
            </div>

            <div class="col-span-10 bg-white rounded-xl shadow-lg">
                <div id="bar-chart"></div>
            </div>

            <!-- <div class="col-span-12 text-black text-center gap-3 flex items-center justify-center">

                <div class="flex items-center space-x-2">
                    <span class="w-4 h-4 bg-green-700 rounded-full"></span>
                    <label class="font-medium text-md">ผู้ป่วยนอนรวม</label>
                </div>

                <div class="flex items-center space-x-2">
                    <span class="w-4 h-4 bg-orange-500 rounded-full"></span>
                    <label class="font-medium text-md">จำหน่ายรวม</label>
                </div>

                <div class="flex items-center space-x-2">
                    <span class="w-4 h-4 bg-red-600 rounded-full"></span>
                    <label class="font-medium text-md">Admitรวม</label>
                </div>

            </div> -->

    </div>

    <!-- ส่วนล่าง -->
        <div class="grid grid-cols-12 gap-6 p-4 bg-light-green rounded-lg">
            <div class="col-span-3 bg-gradient-to-br from-sky-400 to-sky-600 p-6 rounded-lg shadow-lg">
                <div class="text-center text-3xl font-medium text-black mb-6 bg-white rounded-lg p-4">
                    รวมผู้ป่วยจำแนกกลุ่ม
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="dashboard-card p-4">
                        <h2 class="text-lg font-medium text-gray-800">Ward 1</h2>
                        <p class="text-gray-600 text-sm">รายละเอียด Ward 1</p>
                    </div>
                    <div class="dashboard-card p-4">
                        <h2 class="text-lg font-medium text-gray-800">Ward 2</h2>
                        <p class="text-gray-600 text-sm">รายละเอียด Ward 2</p>
                    </div>
                    <div class="dashboard-card p-4">
                        <h2 class="text-lg font-medium text-gray-800">Ward 3</h2>
                        <p class="text-gray-600 text-sm">รายละเอียด Ward 3</p>
                    </div>
                    <div class="dashboard-card p-4">
                        <h2 class="text-lg font-medium text-gray-800">Ward 4</h2>
                        <p class="text-gray-600 text-sm">รายละเอียด Ward 4</p>
                    </div>
                    <div class="dashboard-card p-4">
                        <h2 class="text-lg font-medium text-gray-800">Ward 5</h2>
                        <p class="text-gray-600 text-sm">รายละเอียด Ward 5</p>
                    </div>
                    <div class="dashboard-card p-4">
                        <h2 class="text-lg font-medium text-gray-800">Ward 6</h2>
                        <p class="text-gray-600 text-sm">รายละเอียด Ward 6</p>
                    </div>
                </div>
                <div class="dashboard-card p-4 mt-4">
                    <h2 class="text-lg font-medium text-gray-800 text-center">Ward 7</h2>
                    <p class="text-gray-600 text-sm text-center">รายละเอียด Ward 7</p>
                </div>
            </div>

                <!-- Tables 1
                <div class="col-span-3">
            <div class="dashboard-card h-full">
                <div class="overflow-auto max-h-[600px]">
                    <table class="min-w-full">
                        <thead class="sticky top-0">
                            <tr>
                                <th class="py-3 px-4 text-center text-white font-medium">หอผู้ป่วยสามัญ</th>
                                <th class="py-3 px-4 text-center text-white font-medium">เตียง</th>
                                <th class="py-3 px-4 text-center text-white font-medium">นอนรักษา</th>
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
                                    <td class="py-3 px-4 text-gray-700"><?php echo $row['ward']; ?></td>
                                    <td class="py-3 px-4 text-gray-700 text-center"><?php echo $row['beds']; ?></td>
                                    <td class="py-3 px-4 text-sky-600 text-center font-medium"><?php echo $row['occupied']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> -->

        <div class="col-span-3">
            <div class="dashboard-card h-full">
                <div class="overflow-auto max-h-[600px]">
                    <table class="min-w-full">
                        <thead class="sticky top-0">
                            <tr>
                                <th class="py-3 px-4 text-center text-white font-medium">หอผู้ป่วยสามัญ</th>
                                <th class="py-3 px-4 text-center text-white font-medium">จำนวนเตียง</th>
                                <th class="py-3 px-4 text-center text-white font-medium">นอนรักษา</th>
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

            <!-- Title Section -->
            <div class="col-span-3">
                <div class="grid grid-rows-3 gap-4 h-full">


                <div class="title-card relative flex bg-white rounded-full items-center justify-center text-center p-6 drop-shadow-sm overflow-hidden border-t-4 border-l-2 border-r-2 border-r-green-800 border-t-green-800 border-l-green-800">
                    <div class="custom-body relative z-10">
                        <h1 class="text-[40px] md:text-[50px] font-bold text-sky-600 drop-shadow-lg">
                            สถิติบริการผู้ป่วย
                        </h1>
                        <p class="text-[32px] md:text-[40px] text-gray-900">
                            06 กุมภาพันธ์ 2568
                        </p>
                    </div>
                </div>






                    

                    <div class="row-span-2 dashboard-card">
                <div class="overflow-auto max-h-[400px]">
                    <table class="min-w-full">
                        <thead class="sticky top-0">
                            <tr>
                                <th class="py-3 px-4 text-center text-white font-medium">หอผู้ป่วย ICU</th>
                                <th class="py-3 px-4 text-center text-white font-medium">จำนวนเตียง</th>
                                <th class="py-3 px-4 text-center text-white font-medium">นอนรักษา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $icu_data = [
                                ['unit' => 'ICU อายุรกรรม', 'beds' => 8, 'occupied' => 7],
                                ['unit' => 'ICU ศัลยกรรม', 'beds' => 6, 'occupied' => 5],
                                ['unit' => 'ICU กุมารเวช', 'beds' => 4, 'occupied' => 3],
                                ['unit' => 'CCU', 'beds' => 6, 'occupied' => 4],
                                ['unit' => 'NICU', 'beds' => 4, 'occupied' => 2],
                                ['unit' => 'NICU', 'beds' => 4, 'occupied' => 2],
                                ['unit' => 'NICU', 'beds' => 4, 'occupied' => 2],

                            ];
                            
                            foreach ($icu_data as $row) { ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4 text-gray-700"><?php echo $row['unit']; ?></td>
                                    <td class="py-2 px-4 text-gray-700 text-center"><?php echo $row['beds']; ?></td>
                                    <td class="py-2 px-4 text-green-600 text-center font-medium"><?php echo $row['occupied']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

            <!-- Last Table -->
 <!-- ตารางที่ 3: Ventilator -->
    <div class="col-span-3">
        <div class="dashboard-card h-full">
            <div class="overflow-auto max-h-[600px]">
                <table class="min-w-full">
                    <thead class="sticky top-0">
                    <tr>
    <th class="py-3 px-4 text-center text-white font-medium w-1/4">หน่วยงาน</th>
    <th class="py-3 px-4 text-center text-white font-medium w-1/4">Ventilator</th>
    <th class="py-3 px-4 text-center text-white font-medium w-1/4">Ventilator Mobile</th>
    <th class="py-3 px-4 text-center text-white font-medium w-1/4">Ventilator(ยืม)</th>
</tr>
                    </thead>
                    <tbody>
                        <?php
                        $vent_data = [
                            ['unit' => 'Orthoชาย', 'vent' => 8, 'mobile' => 2, 'borrowed' => 1],
                            ['unit' => 'Orthoหญิง', 'vent' => 6, 'mobile' => 2, 'borrowed' => 0],
                            ['unit' => 'ศัลยกรรมชาย 1', 'vent' => 4, 'mobile' => 1, 'borrowed' => 1],
                            ['unit' => 'ศัลยกรรมชาย 2', 'vent' => 6, 'mobile' => 2, 'borrowed' => 0],
                            ['unit' => 'ศัลยกรรมหญิง', 'vent' => 4, 'mobile' => 1, 'borrowed' => 0],
                            ['unit' => 'อายุรกรรมชาย 1', 'vent' => 2, 'mobile' => 2, 'borrowed' => 1],
                            ['unit' => 'อายุรกรรมชาย 2', 'vent' => 4, 'mobile' => 1, 'borrowed' => 0],
                            ['unit' => 'อายุรกรรมชาย 3', 'vent' => 4, 'mobile' => 1, 'borrowed' => 0],
                            ['unit' => 'สูติกรรม 3', 'vent' => 4, 'mobile' => 1, 'borrowed' => 0],
                            ['unit' => 'ER', 'vent' => 4, 'mobile' => 1, 'borrowed' => 0],
                            ['unit' => 'Stroke Unit', 'vent' => 4, 'mobile' => 1, 'borrowed' => 0],
                            ['unit' => 'Spoin unit', 'vent' => 4, 'mobile' => 1, 'borrowed' => 0],
                            ['unit' => 'สงฆ์บน', 'vent' => 4, 'mobile' => 1, 'borrowed' => 0],
                            ['unit' => 'ICUMED1', 'vent' => 4, 'mobile' => 1, 'borrowed' => 0],
                            ['unit' => 'ICUMED2', 'vent' => 4, 'mobile' => 1, 'borrowed' => 0],
                            ['unit' => 'วิสัญญี', 'vent' => 4, 'mobile' => 1, 'borrowed' => 0],
                        ];
                        
                        foreach ($vent_data as $row) { ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4 text-[10.60px] text-gray-700 w-2/4"><?php echo $row['unit']; ?></td>
                            <td class="py-2 px-4 text-[10.60px] text-gray-700 text-center w-1/4"><?php echo $row['vent']; ?></td>
                            <td class="py-2 px-4 text-[10.60px] text-sky-600 text-center w-1/4"><?php echo $row['mobile']; ?></td>
                            <td class="py-2 px-4 text-[10.60px] text-orange-500 text-center w-1/4"><?php echo $row['borrowed']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    

    <script>

function createBarChart(elementId, data, isBarsChart = false) {
    const options = {
        series: [{ name: 'Value', data: data }],
        chart: {
            type: 'bar',
            height: '100%',
            toolbar: { show: false },
            background: 'transparent'
        },
        plotOptions: {
            bar: { 
                columnWidth: isBarsChart, // ✅ สำหรับกราฟ bars-chart ทำให้เป็นแนวนอน
                columnWidth: isBarsChart ? '70%' : '70%',  // ปรับขนาดแตกต่างกัน
                borderRadius: 4
            }
        },
        dataLabels: { enabled: false },
        stroke: { show: true, width: 2, colors: ['transparent'] },
        xaxis: {
            categories: data.map(item => item.x),
            labels: {
                style: { colors: ['#000'], fontSize: '12px' },
                rotate: -45, 
                rotateAlways: true,
                maxHeight: 50
            }
        },
        yaxis: { labels: { style: { colors: ['#000'] } } },
        grid: { padding: { bottom: 20 } }, // ✅ เพิ่มพื้นที่ว่างด้านล่าง 20px
        fill: { opacity: 1, colors: isBarsChart ? ['#60A5FA'] : ['#F87171'] },  // ใช้สีแตกต่างกัน
        tooltip: { theme: 'dark', y: { formatter: val => val } }
    };

    const chart = new ApexCharts(document.querySelector(elementId), options);
    chart.render();
}

document.addEventListener('DOMContentLoaded', function() {
    // กราฟแรก
    createBarChart("#bar-chart", <?php echo json_encode($bar_data); ?>);

    // กราฟที่สอง (แนวนอน)
    createBarChart("#bars-chart", <?php echo json_encode($bars_data); ?>, true);
});





    </script>

</body>
</html>