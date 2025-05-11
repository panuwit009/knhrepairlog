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

  
</head>
<body class="bg-white">


<div class="grid grid-rows-[auto_1fr] gap-4 min-h-screen">

    <!-- ส่วนบน -->
            <div class="max-w-3lg bg-white mx-auto mt-2 text-white p-2">
                <h1 class="text-green-700 text-5xl">รายงานสถิติบริการ สถานการณ์ประจำวัน</h1>  
                <p class="text-green-700 text-5xl text-right"> : กลุ่มภารกิจด้านการพยาบาล</p>   
            </div>

            <div>
                <div>เลือกวันที่</div>
            </div>
            

    <!-- ส่วนล่าง -->
    <div class="w-full h-full overflow-auto p-4">

        <div class="grid grid-cols-12 gap-6 p-4 rounded-lg">
            <div class="col-span-3 bg-gradient-to-br from-sky-400 to-sky-600 p-6 rounded-lg shadow-lg">
                <div class="text-center text-3xl font-medium text-black mb-6 bg-white rounded-lg p-4">
                    Nursing Productivity
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