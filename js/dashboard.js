dayjs.locale('th');
dayjs.extend(window.dayjs_plugin_buddhistEra);

document.addEventListener('DOMContentLoaded', function() {
    const today = dayjs().format('DD MMMM BBBB');
    document.getElementById('currentDateText').innerText = `ข้อมูล ณ วันที่ ${today}`;

    const currentDate = dayjs();
    const defaultMonth = currentDate.month(); // ใช้เลขเดือนตรง
    const monthSelect = document.getElementById('monthSelect');
    const yearSelect = document.getElementById('yearSelect');
    const resetButton = document.getElementById('resetButton');

    function populateMonthSelect() {
        monthSelect.innerHTML = '';
        for (let month = 0; month < 12; month++) {
            const option = document.createElement('option');
            option.value = month;
            option.text = dayjs().month(month).format('MMMM');
            monthSelect.appendChild(option);
        }
        monthSelect.value = defaultMonth;
    }

    function populateYearSelect() {
        yearSelect.innerHTML = '';
        const startYear = 2025;
        for (let year = startYear; year <= currentDate.year(); year++) {
            const option = document.createElement('option');
            option.value = year;
            option.text = dayjs().year(year).format('BBBB');
            yearSelect.appendChild(option);
        }
        yearSelect.value = currentDate.year();
    }

    function handleDateChange() {
        const selectedMonth = monthSelect.value;
        const selectedYear = yearSelect.value;
        const formattedDate = dayjs().year(selectedYear).month(selectedMonth).format('YYYY-MM');
    
        fetch(`get_equipment_data.php?month=${formattedDate}`)
            .then(response => response.json())
            .then(data => {
                updateChart(data);
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function resetSelection() {
        monthSelect.value = defaultMonth;
        yearSelect.value = currentDate.year();
        startDatePicker.clear();
        endDatePicker.clear();
        handleDateChange();
    }

    populateMonthSelect();
    populateYearSelect();
    handleDateChange();

    monthSelect.addEventListener('change', handleDateChange);
    yearSelect.addEventListener('change', handleDateChange);
    resetButton.addEventListener('click', resetSelection);

    const startDatePicker = flatpickr("#startDate", {
        locale: "th",
        dateFormat: "Y-m-d",
        altFormat: "j F Y",
        altInput: true,
        onChange: function(selectedDates) {
            endDatePicker.set('minDate', selectedDates[0]);
        }
    });

    const endDatePicker = flatpickr("#endDate", {
        locale: "th",
        dateFormat: "Y-m-d",
        altFormat: "j F Y",
        altInput: true
    });

    function fetchDateRangeData() {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        
        if (!startDate || !endDate) return;
    
        fetch(`get_equipment_data.php?start_date=${startDate}&end_date=${endDate}`)
            .then(response => response.json())
            .then(data => {
                updateChart(data);
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    document.getElementById('startDate').addEventListener('change', fetchDateRangeData);
    document.getElementById('endDate').addEventListener('change', fetchDateRangeData);

    fetchDateRangeData();
});

let equipmentChart;

function updateChart(monthData) {
    const chartContainer = document.getElementById('chartContainer');
    const legendContainer = document.querySelector('.chart-legend');

    if (equipmentChart) {
        equipmentChart.destroy();
    }

    const ctx = document.getElementById('equipmentChart').getContext('2d');
    let chartData = monthData.data;
    let chartColors = ['#3b82f6', '#22c55e', '#eab308', '#ef4444', '#a855f7', '#f97316'];
    let chartLabels = monthData.labels;
    
    // ตรวจสอบว่าไม่มีข้อมูลหรือข้อมูลเป็น 0 ทั้งหมด
    let hasNoData = !chartData || !Array.isArray(chartData) || 
                    chartData.length === 0 || 
                    chartData.every(value => value === 0);
    
    if (hasNoData) {
        chartData = [1];
        chartColors = ['#E5E7EB'];
        chartLabels = ['ไม่มีการแจ้งซ่อม'];
        
        if (legendContainer) {
            legendContainer.innerHTML = `
                <ul>
                    <li class="legend-item">
                        <i class="fas fa-circle" style="color: #E5E7EB"></i>
                        <span>ไม่มีการแจ้งซ่อม</span>
                    </li>
                </ul>
            `;
        }
    } else {
        const total = chartData.reduce((sum, value) => sum + value, 0);
        
        if (legendContainer) {
            legendContainer.innerHTML = `<ul>${
                chartLabels.map((label, index) => `
                    <li class="legend-item">
                        <i class="fas fa-circle" style="color: ${chartColors[index]}"></i>
                        <span>${label} (${monthData.data[index]})</span>
                    </li>
                `).join('')
            }</ul>`;
        }
    }

    equipmentChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: chartLabels,
            datasets: [{ 
                data: chartData, 
                backgroundColor: chartColors,
                borderWidth: 2,  // เพิ่มความหนาของเส้นขอบ
                borderColor: '#ffffff',  // กำหนดสีขอบเป็นสีขาว
                spacing: 2,  // เพิ่มระยะห่างระหว่างชิ้นส่วน
                cutout: '0%'
            }]
        },
        options: { 
            responsive: true, 
            maintainAspectRatio: true,
            plugins: { 
                legend: { 
                    display: false
                },
                tooltip: {
                    enabled: !hasNoData
                },
                datalabels: {
                    color: '#374151',
                    font: {
                        weight: 'bold',
                        size: 16
                    },
                    formatter: function(value, context) {
                        if (hasNoData) return '';
                        const total = context.dataset.data.reduce((sum, val) => sum + val, 0);
                        const percentage = ((value / total) * 100).toFixed(0);
                        return percentage + '%';
                    },
                    display: function(context) {
                        if (hasNoData) return false;
                        return context.dataset.data[context.dataIndex] / 
                               context.dataset.data.reduce((a, b) => a + b) > 0.05;
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });
}
    // ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    $(document).ready(function() {
        const itemsPerPage = 5;
        let currentPage = 1;
    
        function loadRepairList(page = 1) {
        // แสดง loading
            Swal.fire({
                title: 'กำลังโหลดข้อมูล...',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
    
            $.ajax({
                url: 'query/repairlist_query.php',
                type: 'GET',
                data: { 
                    itemsPerPage: itemsPerPage,
                    page: page
                },
                dataType: 'json',
                success: function(response) {
                    // ปิด loading
                    Swal.close();
    
                    if (response && response.repairlist && response.repairlist.length > 0) {
                        let html = '';
                        $.each(response.repairlist, function(index, repair) {
                            const formattedDate = dayjs(repair.timestamp).locale('th').format('D MMMM BBBB');
                            const statusClass = 'status-' + (repair.eq_status || '0');
                            html += `
                                <tr>
                                    <td>${formattedDate}</td>
                                    <td>${repair.eq_no}</td>
                                    <td>${repair.equipment_name}</td>
                                    <td>${repair.name_ward}</td>
                                    <td class="text-center"><span class="status-badge ${statusClass}">${repair.name_status}</span></td>
                                </tr>
                            `;
                        });
                        $('#repairlist-table tbody').html(html);
    
                        // สร้าง pagination แบบใหม่
                        let paginationHtml = '<ul class="pagination justify-content-center">';
                        
                        // ปุ่มย้อนกลับ
                        paginationHtml += `
                            <li class="page-item ${page === 1 ? 'disabled' : ''}">
                                <a class="page-link pagination-btn" href="#" data-page="${page-1}" ${page === 1 ? 'tabindex="-1"' : ''}>«</a>
                            </li>
                        `;
    
                        const totalPages = response.total_pages;
                        const maxVisiblePages = 4;
                        let startPage = 1;
                        let endPage = totalPages;
    
                        if (totalPages > maxVisiblePages) {
                            if (page > totalPages - maxVisiblePages + 1) {
                                startPage = totalPages - maxVisiblePages + 1;
                                endPage = totalPages;
                            } 
                            else if (page > 2) {
                                startPage = page - 2;
                                endPage = page + 2;
                            }
                            else {
                                endPage = maxVisiblePages;
                            }
                        }
    
                        // แสดงหน้าแรก
                        if (startPage > 1) {
                            paginationHtml += `
                                <li class="page-item">
                                    <a class="page-link pagination-btn" href="#" data-page="1">1</a>
                                </li>
                            `;
                            if (startPage > 2) {
                                paginationHtml += `
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                `;
                            }
                        }
    
                        // แสดงหน้าในช่วงที่คำนวณ
                        for (let i = startPage; i <= endPage; i++) {
                            paginationHtml += `
                                <li class="page-item ${i === page ? 'active' : ''}">
                                    <a class="page-link pagination-btn" href="#" data-page="${i}">${i}</a>
                                </li>
                            `;
                        }
    
                        // แสดงหน้าสุดท้าย
                        if (endPage < totalPages) {
                            if (endPage < totalPages - 1) {
                                paginationHtml += `
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                `;
                            }
                            paginationHtml += `
                                <li class="page-item">
                                    <a class="page-link pagination-btn" href="#" data-page="${totalPages}">${totalPages}</a>
                                </li>
                            `;
                        }
    
                        // ปุ่มถัดไป
                        paginationHtml += `
                            <li class="page-item ${page === totalPages ? 'disabled' : ''}">
                                <a class="page-link pagination-btn" href="#" data-page="${page+1}" ${page === totalPages ? 'tabindex="-1"' : ''}>»</a>
                            </li>
                        `;
                        
                        paginationHtml += '</ul>';
                        $('#pagination').html(paginationHtml);
    
                        $('#page-info').html(`
                            <div class="text-center mt-2">
                                <small>แสดง ${response.start_item} ถึง ${response.end_item} จากทั้งหมด ${response.total_items} รายการ</small>
                            </div>
                        `);
                    } else {
                        $('#repairlist-table tbody').html('<tr><td colspan="5" class="text-center">ไม่พบข้อมูล</td></tr>');
                        $('#pagination, #page-info').html('');
                    }
                },
                error: function(xhr, status, error) {
                    // ปิด loading และแสดงข้อความ error
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: 'ไม่สามารถโหลดข้อมูลได้ กรุณาลองใหม่อีกครั้ง',
                        confirmButtonText: 'ตกลง'
                    });
                    console.error("Error:", error);
                    $('#repairlist-table tbody').html('<tr><td colspan="5" class="text-center">เกิดข้อผิดพลาดในการโหลดข้อมูล</td></tr>');
                    $('#pagination, #page-info').html('');
                }
            });
        }
    
        // โหลดข้อมูลครั้งแรก
        loadRepairList(currentPage);
    
        // Event listener สำหรับปุ่ม pagination
        $(document).on('click', '.pagination-btn', function(e) {
            e.preventDefault();
            if ($(this).parent().hasClass('disabled')) return;
            const page = parseInt($(this).data('page'));
            currentPage = page;
            loadRepairList(page);
        });
    });

// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

