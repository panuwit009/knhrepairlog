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
        $bar_data = array_map(function($i) {
            return [
                'x' => 'ward ' . ($i + 1),
                'y' => rand(50, 500)
            ];
        }, range(0, 31));

        $bars_data = array_map(function($i) {
            return [
                'x' => 'ward ' . ($i + 1),
                'y' => rand(50, 300)
            ];
        }, range(0, 4));

        ?>


    
</head>
<body class="bg-gray-200 min-h-screen">

<div class="flex flex-col min-h-screen">
    <!-- Header Section -->
    <header class="relative bg-gradient-to-r from-green-400 to-green-700 shadow-md">
        <!-- Logo -->
        <div class="absolute left-8 top-6">
            <div class="w-16 h-16 bg-white rounded-full relative shadow-lg flex items-center justify-center">
                <i class="fa-solid fa-chart-line text-green-600 text-3xl"></i>
            </div>
        </div>

        <div class="grid grid-rows-[auto_1fr] gap-4 border-b-[10px] border-green-700 pt-6 pb-4">
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

            <div class="px-4">
                <label class="text-white font-medium mr-4 text-lg">เลือกวันที่</label>
            </div>
        </div>

    </header>

    <div class="flex-1 py-4 px-4 bg-gradient-to-br from-green-200 to-green-300 overflow-auto">
        <div class="grid grid-cols-12 gap-6">
            <!-- Left Column -->
            <div class="col-span-4">

                <div class="bg-white rounded-xl p-6 shadow-lg">

                    <div class="px-4 py-2 border-b-[5px] border-green-700 max-w-md mx-auto mb-4">
                        <h2 class="text-2xl font-bold text-green-700 text-center mb-4">Nursing Productivity</h2>
                    </div>
                    
                    <!-- Chart Section -->
                    <div class="flex justify-center mb-6">
                        <div class="bg-gray-100 p-4 rounded-lg shadow-md w-full text-center">
                            <p class="text-gray-500 italic">กราฟจะแสดงที่นี่</p>
                        </div>
                    </div>


                    <div class="max-w-md mx-auto">
                        <h2 class="text-2xl font-bold text-black text-center mb-4">จำนวนผู้ป่วย</h2>
                    </div>

                    <div class="mb-4 grid grid-cols-2 bg-teal-50 px-4 py-3 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                        <div class="flex items-center space-x-4">
                            <div class="bg-teal-50 p-4 rounded-full shadow-sm">
                                <i class="fa-solid fa-user-injured text-3xl text-teal-700"></i>
                            </div>
                            <div>
                                <h2 class="text-3xl font-bold text-gray-800 leading-none">145</h2>
                                <p class="text-teal-700 text-sm mt-1">รับบริการ ER</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-teal-50 p-4 rounded-full shadow-sm">
                                <i class="fa-solid fa-procedures text-3xl text-teal-700"></i>
                            </div>
                            <div>
                                <h2 class="text-3xl font-bold text-gray-800 leading-none">45</h2>
                                <p class="text-teal-700 text-sm mt-1">admit จาก ER</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 grid grid-cols-2 bg-cyan-50 px-4 py-3 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                        <div class="flex items-center space-x-4">
                            <div class="bg-cyan-50 p-4 rounded-full shadow-sm">
                                <i class="fa-solid fa-hospital text-2xl text-cyan-500"></i>
                            </div>
                            <div>
                                <h2 class="text-3xl font-bold text-gray-800 leading-none">80</h2>
                                <p class="text-cyan-500 text-sm mt-1">ส่งตรวจ (Lab) นอกเวลา</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-cyan-50 p-4 rounded-full shadow-sm">
                                <i class="fa-solid fa-hospital text-2xl text-cyan-500"></i>
                            </div>
                            <div>
                                <h2 class="text-3xl font-bold text-gray-800 leading-none">14</h2>
                                <p class="text-cyan-500 text-sm mt-1">ส่งตรวจ (Lab) นอกเวลา สิ้น ER</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 grid grid-cols-2 bg-indigo-50 px-4 py-3 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                        <div class="flex items-center space-x-4">
                            <div class="bg-indigo-50 p-4 rounded-full shadow-sm">
                                <i class="fa-solid fa-hospital text-2xl text-indigo-500"></i>
                            </div>
                            <div>
                                <h2 class="text-3xl font-bold text-gray-800 leading-none">80</h2>
                                <p class="text-indigo-500 text-sm mt-1">ห้องตรวจ (บ่าย) นอกเวลา</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-indigo-50 p-4 rounded-full shadow-sm">
                                <i class="fa-solid fa-hospital text-2xl text-indigo-500"></i>
                            </div>
                            <div>
                                <h2 class="text-3xl font-bold text-gray-800 leading-none">14</h2>
                                <p class="text-indigo-500 text-sm mt-1">ห้องตรวจ (บ่าย) นอกเวลา</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-white rounded-lg shadow-sm">
                            <div class="relative p-4 bg-sky-50 rounded-t-lg flex items-center justify-center overflow-hidden"
                                style="background-image: linear-gradient(#cbd5e1 1px, transparent 1px),
                                        linear-gradient(to right, #cbd5e1 1px, transparent 1px);
                                        background-size: 8px 8px;
                                        opacity: 0.5;">
                                <i class="fa-solid fa-hospital text-3xl text-sky-500"></i>
                            </div>
                            <div class="grid grid-cols-2 gap-4 py-4">
                                <div class="bg-sky-50 p-3 rounded-lg text-center">
                                    <span class="text-2xl font-bold text-gray-800 block">30</span>
                                    <p class="text-sky-500 text-xs mt-1">จำนวนผ่าตัด (ในเวลา)</p>
                                </div>
                                <div class="bg-sky-50 p-3 rounded-lg text-center">
                                    <span class="text-2xl font-bold text-gray-800 block">45</span>
                                    <p class="text-sky-500 text-xs mt-1">จำนวนผ่าตัด (นอกเวลา)</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-sm">

                            <div class="relative p-4 bg-sky-50 rounded-t-lg flex items-center justify-center overflow-hidden"
                                style="background-image: linear-gradient(#cbd5e1 1px, transparent 1px),
                                        linear-gradient(to right, #cbd5e1 1px, transparent 1px);
                                        background-size: 8px 8px;
                                        opacity: 0.5;">
                                <i class="fa-solid fa-hospital text-3xl text-sky-500"></i>
                            </div>

                            <div class="grid grid-cols-2 gap-4 py-4 ">
                                <div class="bg-sky-50 p-3 rounded-lg text-center">
                                    <span class="text-2xl font-bold text-gray-800 block">30</span>
                                    <p class="text-sky-500 text-xs mt-1">จำนวนผ่าตัด (ในเวลา)</p>
                                </div>
                                <div class="bg-sky-50 p-4 rounded-lg text-center">
                                    <span class="text-2xl font-bold text-gray-800 block">45</span>
                                    <p class="text-sky-500 text-xs mt-1">จำนวนผ่าตัด (นอกเวลา)</p>
                                </div>
                            </div>
                        </div>



     
                    
                <div class="col-span-2">
                    <!-- Content for second column -->
                </div>
                <div class="col-span-3">
                    <!-- Content for third column -->
                </div>
                <div class="col-span-3">
                    <!-- Content for fourth column -->
                </div>
            </div>
        </div>
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
                columnWidth: isBarsChart ? '40%' : '70%',  // ปรับขนาดแตกต่างกัน
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
                rotateAlways: false,
                maxHeight: 50
            }
        },
        yaxis: { labels: { style: { colors: ['#000'] } } },
        grid: { padding: { bottom: 20 } }, // ✅ เพิ่มพื้นที่ว่างด้านล่าง 20px
        fill: { opacity: 1, colors: isBarsChart ? ['#F87171'] : ['#60A5FA'] },  // ใช้สีแตกต่างกัน
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