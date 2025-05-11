function createBarChart(elementId, data) {
    const options = {
        series: [{ name: 'Value', data: data }],
        chart: {
            type: 'bar',
            height: '100%',
            toolbar: { show: false },
            background: 'transparent'
        },
        plotOptions: {
            bar: { horizontal: false, columnWidth: '70%', borderRadius: 4 }
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
        fill: { opacity: 1, colors: ['#60A5FA'] },
        tooltip: { theme: 'dark', y: { formatter: val => val } }
    };

    const chart = new ApexCharts(document.querySelector(elementId), options);
    chart.render();
}

document.addEventListener('DOMContentLoaded', function() {
    createBarChart("#bar-chart", <?php echo json_encode($bar_data); ?>);
    createBarChart("#bars-chart", <?php echo json_encode($bars_data); ?>);
});
