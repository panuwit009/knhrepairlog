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
        <!-- Header -->
        <header class="relative bg-gradient-to-r from-green-400 to-green-700 shadow-md relative">
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

        <img src="logo.png" alt="Logo" class="absolute top-0 left-1/4 w-[150px] h-[150px]">

    </header>

        <!-- Content -->
        <div class="flex-1 py-2 px-2 overflow-auto bg-gradient-to-br from-green-200 to-green-300">
            <div class="grid grid-cols-12 gap-2">
                <!-- Left Column -->
                <div class="col-span-4">
                    <div class="bg-white rounded-lg p-4 shadow-md">

                        <div class="px-4 py-2 border-b-[5px] border-green-700 max-w-md mx-auto mb-4">
                            <h2 class="text-2xl font-bold text-green-700 text-center mb-4">Nursing Productivity</h2>
                        </div>
                        
                        <!-- Chart Section -->
                        <div class="flex justify-center">
                            <div class="bg-gray-100 rounded-lg shadow-md w-full text-center">
                                <div id="bars-chart" style="width: 100%;"></div>
                            </div>

        

                        </div>


                        <!-- Patient Count -->
                        <div class="py-2">
                            <h2 class="text-lg font-bold text-indigo-700 text-center">จำนวนผู้ป่วย</h2>
                        </div>

                        <div class="grid grid-cols-2 gap-2">
                            <div class="bg-teal-50 p-2 rounded-lg text-center">
                                <i class="fa-solid fa-user-injured text-xl text-teal-700"></i>
                                <p class="text-lg font-bold text-gray-800">145</p>
                                <p class="text-md text-teal-700">รับบริการ ER</p>
                            </div>
                            <div class="bg-teal-50 p-2 rounded-lg text-center">
                                <i class="fa-solid fa-procedures text-xl text-teal-700"></i>
                                <p class="text-lg font-bold text-gray-800">45</p>
                                <p class="text-md text-teal-700">Admit จาก ER</p>
                            </div>
                        </div>

                        <!-- Lab Check -->
                        <div class="grid grid-cols-2 gap-2 mt-2">
                            <div class="bg-cyan-50 p-2 rounded-lg text-center">
                                <i class="fa-solid fa-hospital text-xl text-cyan-500"></i>
                                <p class="text-lg font-bold text-gray-800">80</p>
                                <p class="text-md text-cyan-500">ห้องตรวจ (เช้า) นอกเวลา</p>
                            </div>
                            <div class="bg-cyan-50 p-2 rounded-lg text-center">
                                <i class="fa-solid fa-hospital text-xl text-cyan-500"></i>
                                <p class="text-lg font-bold text-gray-800">14</p>
                                <p class="text-md text-cyan-500">ห้องตรวจ (บ่าย) นอกเวลา</p>
                            </div>
                        </div>

                            <div class="grid grid-cols-2 gap-2 mt-2">
                                <div class="bg-indigo-50 p-2 rounded-lg text-center">
                                    <i class="fa-solid fa-hospital text-xl text-indigo-500"></i>
                                    <p class="text-lg font-bold text-gray-800">80</p>
                                    <p class="text-md text-indigo-500">ห้องตรวจ (เช้า) นอกเวลาล้น ER</p>
                                </div>
                                <div class="bg-indigo-50 p-2 rounded-lg text-center">
                                    <i class="fa-solid fa-hospital text-xl text-indigo-500"></i>
                                    <p class="text-lg font-bold text-gray-800">14</p>
                                    <p class="text-md text-indigo-500">ห้องตรวจ (บ่าย) นอกเวลาล้น ER</p>
                                </div>
                            </div>


                            <div class="grid grid-cols-2 gap-2 mt-2">
                                <div class="bg-white rounded-lg shadow-sm">
                                    <div class="relative bg-sky-50 p-4 rounded-t-lg flex items-center justify-center h-[180px]">
                                        <img src="2.png" alt="Logo" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-auto h-[150px]">
                                    </div>
                                    <div class="grid grid-cols-2 bg-sky-50 p-4 gap-4">
                                        <div class="text-center">
                                            <span class="text-2xl font-bold text-gray-800 block">30</span>
                                            <p class="text-sky-500 text-xs mt-1">จำนวนผ่าตัด (ในเวลา)</p>
                                        </div>
                                        <div class="text-center">
                                            <span class="text-2xl font-bold text-gray-800 block">45</span>
                                            <p class="text-sky-500 text-xs mt-1">จำนวนผ่าตัด (นอกเวลา)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!-- Surgery Section -->
                            </div>

                    </div>

            </div>
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
            height: 90,
            toolbar: { show: false },
            background: 'transparent'
        },
        plotOptions: {
            bar: { 
                horizontal: false,
                columnWidth: '50%',
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