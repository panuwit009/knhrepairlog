$(document).ready(function() {
    // แสดง loading screen ทันทีที่เข้าหน้า
    Swal.fire({
        title: 'กำลังโหลดข้อมูล...',
        html: 'โปรดรอสักครู่',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // เรียกฟังก์ชันแสดงข้อมูลทันทีที่โหลดหน้า
    performSearch(true);  // true บ่งบอกว่าเป็นการโหลดครั้งแรก

    // ฟังก์ชันสร้าง PDF
    function generatePDF(itemId) {
        $.ajax({
            url: 'generate_pdf.php',
            type: 'POST',
            data: { id: itemId },
            success: function(response) {
                if (response.success) {
                    window.open(response.pdf_url, '_blank');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: response.error || 'ไม่สามารถสร้าง PDF ได้'
                    });
                }
            },
            error: function(error) {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: 'ไม่สามารถสร้าง PDF ได้ กรุณาลองใหม่อีกครั้ง'
                });
            }
        });
    }

// ---------------------------------------------------------------------------

$(document).ready(function() {
    // Initialize autocomplete for equipment number
    $("#searchInput").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: 'query/get_equipment_numbers.php',
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 1,
        select: function(event, ui) {
            $(this).val(ui.item.value);
            // Optional: Trigger search automatically when item is selected
            $('#searchForm').submit();
        }
    });
});


function performSearch(isInitialLoad = false) {
    var searchTerm = $('#searchInput').val();
    var startDate = $('#start_date').val();
    var endDate = $('#end_date').val();
    var equipmentId = $('select[name="equipment"]').val();
    var statusId = $('select[name="status"]').val();


const pattern = [4, 3, 4, 3, 3];
const separator = '-'; 

$('#searchInput').on('input', function(e) {
    // เอาเฉพาะตัวเลขและ / (ไม่กรอง / ออก)
    let value = e.target.value.replace(/[^0-9\/]/g, ''); // ให้พิมพ์ตัวเลขและ /
    
    // จำกัดความยาวสูงสุดตามผลรวมของ pattern
    const maxLength = pattern.reduce((sum, num) => sum + num, 0);
    if (value.length > maxLength) {
        value = value.slice(0, maxLength);
    }

    // จัดรูปแบบตามที่กำหนด
    let formattedValue = '';
    let currentPosition = 0;

    for (let i = 0; i < pattern.length; i++) {
        if (value.length > currentPosition) {
            // เพิ่มตัวคั่นก่อนเพิ่มตัวเลข (ยกเว้นกลุ่มแรก)
            if (i > 0 && i < 4) { // ใช้ตัวคั่น (-) ระหว่างกลุ่มที่ 1, 2, 3 และ 4
                formattedValue += separator;
            }

            // สำหรับกลุ่มที่ 4 และ 5 (ไม่ต้องการตัวคั่น)
            if (i >= 3) {
                formattedValue += value.slice(currentPosition, currentPosition + pattern[i]);
                currentPosition += pattern[i];
            } else {
                // สำหรับกลุ่มที่ 1, 2, 3 ใช้ตัวคั่น
                formattedValue += value.slice(
                    currentPosition,
                    Math.min(currentPosition + pattern[i], value.length)
                );
                currentPosition += pattern[i];
            }
        }
    }

    $(this).val(formattedValue);
});


        // ถ้าไม่ใช่การโหลดครั้งแรกและไม่มีการกรอกข้อมูลค้นหา
        if (!isInitialLoad && !startDate && !endDate && !searchTerm.trim()) {
            Swal.fire({
                icon: 'warning',
                title: 'กรุณากรอกข้อมูล!!!',
                text: 'กรอกเลขครุภัณฑ์ หรือ เลือกวันที่ก่อนค้นหา'
            });
            return;
        }

        // แปลงค่า 'all' เป็นค่าว่าง
        if (equipmentId === 'all') {
            equipmentId = '';
        }
        if (statusId === 'all') {
            statusId = '';
        }
    
       
        // แสดง loading สำหรับการค้นหา
        if (!isInitialLoad) {
            Swal.fire({
                title: 'กำลังค้นหา...',
                html: 'โปรดรอสักครู่',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        }

// เรียก API เพื่อดึงข้อมูล
$.ajax({
    url: 'query/search_data.php',
    type: 'GET',
    data: {
        search: searchTerm,
        start_date: startDate,
        end_date: endDate,
        equipment: equipmentId,
        status: statusId,
    },
    dataType: 'json',
    success: function(response) {
        let html = '';
        if (response.success && response.data.length > 0) {
            $.each(response.data, function(index, item) {
                const cardClass = item.cardClass || '';
                const headerClass = item.headerClass || '';
                const textClass = item.textClass || '';
                const statusname = item.status_name || '-';
                const res_name = item.test_name || 'รอการยืนยัน';
                const formattedDate = item.update_date || '-';
                const name_ward = item.ward || '-';

                html += `
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" data-id="${item.id}">
                    <div class="card shadow-md ${cardClass}">
                        <!-- Header -->
                        <div class="card-header ${headerClass} py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-clipboard-list mr-2"></i>
                                    <span class="fw-medium">รายการที่ ${index + 1}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="card-body custom-body">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="property-row">
                                        <div class="property-label">เลขครุภัณฑ์</div>
                                        <div class="property-value">${item.eq_no}</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="property-label">วัสดุครุภัณฑ์</div>
                                    <div class="property-value">${item.equipment}</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="property-label">สถานะอุปกรณ์</div>

                                    <div class="status-badges ${textClass}">
                                            <span class="${textClass}">${statusname}</span>
                                            <i class="fa-solid fa-circle-check ${textClass}"></i>
                                        </div>

                                </div>
                                <div class="col-6">
                                    <div class="property-label">วอร์ดที่ส่ง</div>
                                    <div class="property-value">${name_ward}</div>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="staff-info">
                                        <i class="fas fa-user-circle ${textClass}"></i>
                                        <div>
                                            <div class="property-label">เจ้าหน้าที่รับผิดชอบ</div>
                                            <div class="property-value">${res_name}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="staff-info">
                                        <i class="fa-solid fa-calendar-days ${textClass}"></i>
                                        <div>
                                            <div class="property-label">วันที่อัพเดทสถานะล่าสุด</div>
                                            <div class="property-value">${formattedDate}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <div class="icon-container" id="status-icons-${item.id}"></div>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-action btn-outline-primary btn-sm" 
                                        data-toggle="modal" data-target="#statusLogModal" data-id="${item.id}" 
                                        onclick="loadRepairList(this)">
                                    <i class="fas fa-cog mr-1"></i> รายละเอียด
                                </button>

                                <button type="button" class="btn btn-action btn-outline-danger btn-sm pdf-btn" 
                                        data-id="${item.id}">
                                    <i class="fas fa-file-pdf mr-1"></i> PDF
                                </button>
                            </div>
                        </div>
                    </div>
                </div>`;
            });
        } else {
            html = '<div class="col-12"><p class="text-center">ไม่พบข้อมูล</p></div>';
        }

        // ปิด loading screen
        Swal.close();
        $('#eq_list').html(html);

        // เพิ่ม event listener สำหรับปุ่ม PDF
        $('.pdf-btn').on('click', function() {
            const itemId = $(this).data('id');
            generatePDF(itemId);
        });
    },
    error: function(xhr, status, error) {
        Swal.fire({
            icon: 'error',
            title: 'เกิดข้อผิดพลาด',
            text: 'ไม่สามารถโหลดข้อมูลได้ กรุณาลองใหม่อีกครั้ง'
        });
    }
});

    }

// Event handlers
$('#searchForm').on('submit', function(e) {
    e.preventDefault();
    performSearch(false);
});

$('#clearSearch').on('click', function() {
    // ล้างข้อมูลในฟอร์ม
    $('#searchInput').val('');
    $('#start_date').val('');
    $('#end_date').val('');
    $('select[name="equipment"]').val('');
    $('select[name="status"]').val('');
    $('#start_date_display').val('');
    $('#end_date_display').val('');
    
    if ($.fn.select2) {
        $('select').trigger('change');
    }

    $('#eq_list').html('');

    // ค้นหาข้อมูลใหม่ทันที
    performSearch(true);

    // แสดง SweetAlert หลังจากค้นหาข้อมูลเสร็จ
    Swal.fire({
        icon: 'success',
        title: 'สำเร็จ',
        timer: 1000,
        showConfirmButton: false 
    });
});



//  ----------------------------------------------------------------------------------------------------------------------------------------

$(document).ready(function() {
    // กำหนดการใช้งาน Datepicker พร้อมภาษาไทย สำหรับวันที่เริ่มต้น
    $('#start_date_display').datepicker({
        format: 'dd/mm/yyyy',  // รูปแบบวันที่
        autoclose: true,        // ปิดปฏิทินเมื่อเลือกวันที่
        language: 'th'          // ใช้ภาษาไทย
    }).on('changeDate', function(e) {
        var date = e.format('yyyy-mm-dd');
        $('#start_date').val(date); // เก็บค่าที่แท้จริง

        // ตั้งค่าวันที่สิ้นสุดไม่ให้ต่ำกว่าวันที่เริ่มต้น
        $('#end_date_display').datepicker('setStartDate', e.date); // ตั้งวันที่เริ่มต้นให้กับ end_date_display
    });

    // กำหนดการใช้งาน Datepicker สำหรับวันที่สิ้นสุด
    $('#end_date_display').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        language: 'th'          // ใช้ภาษาไทย
    }).on('changeDate', function(e) {
        var date = e.format('yyyy-mm-dd');
        $('#end_date').val(date); // เก็บค่าที่แท้จริง
    });
});

//  ----------------------------------------------------------------------------------------------------------------------------------------

    // Set initial date values
    var startDate = $('#start_date').val();
    if (startDate) {
        $('#start_date_display').val(formatDate(startDate));
    }

    var endDate = $('#end_date').val();
    if (endDate) {
        $('#end_date_display').val(formatDate(endDate));
    }
});

// Date formatting helper function
function formatDate(date) {
    var d = new Date(date);
    var day = String(d.getDate()).padStart(2, '0');
    var month = String(d.getMonth() + 1).padStart(2, '0');
    var year = d.getFullYear();
    return day + '/' + month + '/' + year;
}

$(document).ready(function() {
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        width: '100%'
    });
});

//  ----------------------------------------------------------------------------------------------------------------------------------------


          function loadRepairList(button) {
            const itemId = $(button).data('id');
        
            // เพิ่มการตั้งค่าภาษาไทย
            dayjs.locale('th');
        
            $.ajax({
                url: 'query/get_repairlist.php',
                type: 'GET',
                data: { id: itemId },
                dataType: 'json',
                success: function(response) {
                    if (response.success && response.data) {
                        const item = response.data;
                        $('#statusLogModalLabel').text('รายละเอียดการซ่อม');
                        $('#statusLogModal .modal-body').html(`
        <div class="row g-3">
            <div class="col-md-6">
                    <p class="mb-2">
                        <strong class="d-block mb-2">เลขที่ส่งซ่อม</strong>
                        <span class="status-badge">${item.id || '-'}</span>
                    </p>
                    <p class="mb-2">
                        <strong class="d-block mb-2">วัสดุครุภัณฑ์</strong>
                        <span class="status-badge">${item.equipment || '-'}</span>
                    </p>
                    <p class="mb-2">
                        <strong class="d-block mb-2">วันที่อัพเดทสถานะ</strong>
                        <span class="status-badge">${item.update_date ? dayjs(item.update_date).add(543, 'year').format('DD MMMM YYYY HH:mm น.') : '-'}</span>
                    </p>
                    <p class="mb-2">
                        <strong class="d-block mb-2">แผนกที่ส่ง</strong>
                        <span class="status-badge">${item.name_ward || '-'}</span>
                    </p>
            </div>
            
            <div class="col-md-6">
                    <p class="mb-2">
                        <strong class="d-block mb-1">เลขครุภัณฑ์</strong>
                        <span class="status-badge">${item.eq_no || '-'}</span>
                    </p>
                    <p class="mb-2">
                        <strong class="d-block mb-1">สถานะอุปกรณ์</strong>
                        <span class="status-badge">${item.eq_status || '-'}</span>
                    </p>
                    <p class="mb-2">
                        <strong class="d-block mb-1">เจ้าหน้าที่รับผิดชอบ</strong>
                        <span class="status-badge">${item.sender_name || '-'}</span>
                    </p>
                    <p class="mb-2">
                        <strong class="d-block mb-2">รายละเอียด</strong>
                        <span class="status-badge">${item.details || '-'}</span>
                    </p>
            </div>
        </div>
                        `);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'เกิดข้อผิดพลาด',
                            text: 'ไม่พบข้อมูล'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: 'ไม่สามารถโหลดข้อมูลได้ กรุณาลองใหม่อีกครั้ง'
                    });
                }
            });
        }

        $(document).ready(function() {
            // เมื่อกดปุ่มค้นหา
            $('#toggleSearch').on('click', function() {
                $('#searchForm').slideToggle('fast');
                $('.status-legend').slideToggle('fast');
            });
        
            // แก้ไขฟังก์ชัน Clear เดิม
            $('#clearSearch').on('click', function() {
                // ล้างข้อมูลในฟอร์ม
                $('#searchInput').val('');
                $('#start_date').val('');
                $('#end_date').val('');
                $('select[name="equipment"]').val('');
                $('select[name="status"]').val('');
                $('#start_date_display').val('');
                $('#end_date_display').val('');
                
                if ($.fn.select2) {
                    $('select').trigger('change');
                }
        
                $('#eq_list').html('');
        
                // ค้นหาข้อมูลใหม่ทันที
                performSearch(true);
        
                // แสดง SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ',
                    timer: 1000,
                    showConfirmButton: true 
                });
            });
        });