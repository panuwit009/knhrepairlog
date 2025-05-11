<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="test.css">
    <title>Gauge Chart Dashboard</title>

    <?php
        // จำลองข้อมูลสำหรับ bar chart 32 รายการ
        $bars_data = array_map(function($i) {
            return [
                'x' => 'ward ' . ($i + 1),
                'y' => rand(50, 100)
            ];
        }, range(0, 4));

        ?>

  
</head>
<body class="bg-gray-200">

<div class="min-h-screen flex flex-col">
  <!-- ส่วนบน -->
    <div class="max-w-3lg mx-auto mt-2 text-white p-2">
        <h1 class="text-green-700 text-5xl font-semibold">รายงานสถิติบริการ สถานการณ์ประจำวัน</h1>  
        <p class="text-green-700 text-5xl font-semibold text-right"> : กลุ่มภารกิจด้านการพยาบาล</p>   
    </div>

  <div class="py-4 border-b-[15px] border-green-700 px-4">
      <label for="date" class="text-green-700 text-xl">เลือกวันที่:</label>
  </div>

  <!-- ส่วนล่าง -->
  <div class="flex-grow">

  <div class="grid grid-cols-12 gap-6 p-4 rounded-lg">

            <div class="col-span-4 bg-white px-6 py-2 rounded-lg shadow-lg">
                <div class="text-center text-3xl font-semibold text-green-700 mb-2 p-4 border-b-[10px] border-green-700">
                    Nursing Productivity
                </div>

                <div class="max-w-md mx-auto bg-white text-white rounded-xl shadow-lg">
                    <div id="bars-chart" style="width: 100%;"></div>
                </div>

                <div class="text-center text-2xl font-semibold text-green-700 p-4">
                    จำนวนผู้ป่วย
                </div>

                <div class="grid grid-cols-2 gap-4 border-b-[10px] border-green-700">
                    <div class="p-4">
                        <h2 class="text-3xl font-medium text-green-700 font-semibold"><i class="text-green-700 fa-solid fa-hand-holding-medical mr-2 text-3xl"></i>140</h2>
                        <p class="text-black text-[20px] text-green-700 font-semibold">รับบริการ ER</p>
                    </div>
                    <div class="p-4">
                        <h2 class="text-3xl font-medium text-green-700 font-semibold"><i class="text-green-700 fas fa-procedures mr-2 text-3xl"></i>150</h2>
                        <p class="text-black text-[20px] text-green-700 font-semibold">ที่ admit จาก ER</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 p-4 bg-sky-50 rounded-md mt-2">
                    <div class="">
                        <div class="flex items-center">
                            <i class="rounded-full text-sky-600 fa-solid fa-stethoscope text-3xl mr-2"></i>
                            <h2 class="text-4xl font-medium text-black font-semibold">42</h2>
                        </div>

                        <div class="">
                            <p class="text-black text-[16px] text-sky-600 font-semibold">ห้องตรวจ (เช้า) นอกเวลา</p>
                        </div>
                    </div>

                    <div class="px-4">
                        <div class="flex items-center">
                            <i class="rounded-full text-sky-600 fa-solid fa-stethoscope text-3xl mr-2"></i>
                            <h2 class="text-4xl font-medium text-sky-600 font-semibold">32</h2>
                        </div>

                        <div class="">
                            <p class="text-black text-[16px] text-sky-600 font-semibold">ห้องตรวจ (เช้า) นอกเวลาล้น ER</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 p-4">
                    <div class="">
                        <div class="flex">
                            <i class="rounded-full text-sky-600 fa-solid fa-stethoscope text-3xl mr-2"></i>
                            <h2 class="text-4xl font-medium text-sky-600 font-semibold">56</h2>
                        </div>

                        <div class="">
                            <p class="text-black text-[16px] text-sky-600 font-semibold">ห้องตรวจ (บ่าย) นอกเวลา</p>
                        </div>
                    </div>

                    <div class="px-4">
                        <div class="flex items-center">
                            <i class="rounded-full text-sky-600 fa-solid fa-stethoscope text-3xl mr-2"></i>
                            <h2 class="text-4xl font-medium text-sky-600 font-semibold">42</h2>
                        </div>

                        <div class="">
                            <p class="text-black text-[16px] text-sky-600 font-semibold">ห้องตรวจ (บ่าย) นอกเวลาล้น ER</p>
                        </div>
                    </div>

                </div>

                

            </div>
        </div>

  </div>
</div>


               

       
    

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
                columnWidth: '60%',
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