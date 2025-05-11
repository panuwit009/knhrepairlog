//----------------------------------------------------------------------------------------------------------------global scope variable

let currentStatus = null;
let currentstatusType = null;
//console.log(currentStatus);

//----------------------------------------------------------------------------------------------------------------

$(document).ready(function () {

    // switch (userRole) {
    //     case 'admin':
            fetchRecords();
    //         $('#eq_status0').trigger('click');
    //         break;

    //     case 'passadu':
    //         fetchRecords();
    //         $('#eq_status2').trigger('click');
    //        break;

    //     case 'user':
    //         fetchRecords();
    //         break;

    //     default:
    //         fetchRecords();
    //         console.error("Unknown role: " + userRole);
    //         break;
    // }
});

//----------------------------------------------------------------------------------------------------------------เจนpdf

function generatePDF(itemId) {
    Swal.fire({
        title: 'กำลังสร้างไฟล์ PDF...',
        html: 'กรุณารอสักครู่',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: 'generate_pdf.php',
        type: 'POST',
        data: { id: itemId },
        success: function(response) {
            Swal.close();

            if (response.success) {
                window.open(response.pdf_url, '_blank');
            } else {


                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error generating PDF: ' + (response.error || 'Unknown error')
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.close();

            Swal.fire({
                icon: 'error',
                title: 'Failed',
                text: 'Failed to generate PDF. Error: ' + error + '\nStatus: ' + status + '\n' + xhr.responseText
            });
        }
    });
}



//----------------------------------------------------------------------------------------------------------------ปุ่มfilter by eq_status

$('#eq_status0').on('click', function () {
    const status = $(this).data('status');
    const statusType = 0;
    const infoBox = $(this).find('.info-box');
    
    $('#eq_status2 .info-box, #eq_status1 .info-box, #eq_status3 .info-box').removeClass('active');
    Swal.fire({
        title: 'กำลังค้นหา...',
        html: 'โปรดรอสักครู่',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });


    if (status !== currentStatus) {
        //console.log(status);
        fetchRecords(status, statusType);
        currentStatus = status;
        currentstatusType = statusType;
        infoBox.addClass('active');
        setTimeout(() => {
            Swal.close();
        }, 10);
        // console.log(currentStatus);
    } else {
        currentStatus = null;
        currentstatusType = null;
        infoBox.removeClass('active');
        // console.log(currentStatus);
        $.ajax({
            type: "GET",
            url: "query/eqfetch.php",
            dataType: "json",
            success: function(data) {
                setTimeout(() => {
                    Swal.close();
                }, 10);
                if (data.success) {
                    search(data.data);
                    //renderRepairList(data.data);
                } else {
                    console.error("Failed to fetch data:", data.error);
                    Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถโหลดข้อมูลได้', 'error');
                }
            },
            error: function(textStatus, errorThrown) {
                console.error("Error fetching data:", textStatus, errorThrown);
                Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถโหลดข้อมูลได้', 'error');
            }
        });
    }
});

$('#eq_status1').on('click', function () {
    const status = $(this).data('status');
    const statusType = 1;
    const infoBox = $(this).find('.info-box');
    $('#eq_status0 .info-box, #eq_status2 .info-box, #eq_status3 .info-box').removeClass('active');
    Swal.fire({
        title: 'กำลังค้นหา...',
        html: 'โปรดรอสักครู่',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    if (status !== currentStatus) {
        //console.log(status);
        fetchRecords(status, statusType);
        currentStatus = status;
        currentstatusType = statusType;
        infoBox.addClass('active');
        setTimeout(() => {
            Swal.close();
        }, 10);
        // console.log(currentStatus);
    } else {
        currentStatus = null;
        currentstatusType = null;
        infoBox.removeClass('active');
        // console.log(currentStatus);
        $.ajax({
            type: "GET",
            url: "query/eqfetch.php",
            dataType: "json",
            success: function(data) {
                setTimeout(() => {
                    Swal.close();
                }, 10);
                if (data.success) {
                    search(data.data);
                    //renderRepairList(data.data);
                } else {
                    console.error("Failed to fetch data:", data.error);
                    Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถโหลดข้อมูลได้', 'error');
                }
            },
            error: function(textStatus, errorThrown) {
                console.error("Error fetching data:", textStatus, errorThrown);
                Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถโหลดข้อมูลได้', 'error');
            }
        });
    }
});

$('#eq_status2').on('click', function () {
    const status = $(this).data('status');
    const statusType = 2;
    const infoBox = $(this).find('.info-box');
    $('#eq_status0 .info-box, #eq_status1 .info-box, #eq_status3 .info-box').removeClass('active');
    Swal.fire({
        title: 'กำลังค้นหา...',
        html: 'โปรดรอสักครู่',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    if (status !== currentStatus) {
        //console.log(status);
        fetchRecords(status, statusType);
        currentStatus = status;
        currentstatusType = statusType;
        infoBox.addClass('active');
        setTimeout(() => {
            Swal.close();
        }, 10);
        // console.log(currentStatus);
    } else {
        currentStatus = null;
        currentstatusType = null;
        infoBox.removeClass('active');
        // console.log(currentStatus);
        $.ajax({
            type: "GET",
            url: "query/eqfetch.php",
            dataType: "json",
            success: function(data) {
                setTimeout(() => {
                    Swal.close();
                }, 10);
                if (data.success) {
                    search(data.data);
                    //renderRepairList(data.data);
                } else {
                    console.error("Failed to fetch data:", data.error);
                    Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถโหลดข้อมูลได้', 'error');
                }
            },
            error: function(textStatus, errorThrown) {
                setTimeout(() => {
                    Swal.close();
                }, 10);
                console.error("Error fetching data:", textStatus, errorThrown);
                Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถโหลดข้อมูลได้', 'error');
            }
        });
    }
});

$('#eq_status3').on('click', function () {
    const status = $(this).data('status');
    const statusType = 3;
    const infoBox = $(this).find('.info-box');
    $('#eq_status0 .info-box, #eq_status1 .info-box, #eq_status2 .info-box').removeClass('active');
    Swal.fire({
        title: 'กำลังค้นหา...',
        html: 'โปรดรอสักครู่',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    if (status !== currentStatus) {
        //console.log(status);
        fetchRecords(status, statusType);
        currentStatus = status;
        currentstatusType = statusType;
        infoBox.addClass('active');
        setTimeout(() => {
            Swal.close();
        }, 10);
        // console.log(currentStatus);
    } else {
        currentStatus = null;
        currentstatusType = null;
        infoBox.removeClass('active');
        // console.log(currentStatus);
        $.ajax({
            type: "GET",
            url: "query/eqfetch.php",
            dataType: "json",
            success: function(data) {
                setTimeout(() => {
                    Swal.close();
                }, 10);
                if (data.success) {
                    search(data.data);
                    //renderRepairList(data.data);
                } else {
                    console.error("Failed to fetch data:", data.error);
                    Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถโหลดข้อมูลได้', 'error');
                }
            },
            error: function(textStatus, errorThrown) {
                setTimeout(() => {
                    Swal.close();
                }, 10);
                console.error("Error fetching data:", textStatus, errorThrown);
                Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถโหลดข้อมูลได้', 'error');
            }
        });
    }
});



//----------------------------------------------------------------------------------------------------------------fetch record

function fetchRecords(status, statusType) {
    $.ajax({
        type: "GET",
        url: "query/eqfetch.php",
        data: { eq_status: status, 
                status_type: statusType
        },
        dataType: "json",
        success: function (data) {
            if (data.success) {

                search(data.data);
                
                //renderRepairList(data.data);

            } else {
                console.error("Failed to fetch data:", data.error);
            }
        },
        error: function (textStatus, errorThrown) {
            console.error("Error fetching data:", textStatus, errorThrown);
        }
    });
}

//----------------------------------------------------------------------------------------------------------------render รายการแจ้งซ่อม

//เลขที่แจ้งซ่อม ${item.repair_id}

function renderRepairList(items, currentPage = 1, itemsPerPage = 9) {
    const $container = $('#eq_list');
    const $pagination = $('#pagination');
    $container.empty();

    dayjs.extend(dayjs_plugin_localizedFormat);
    dayjs.locale('th');

    // Calculate total pages
    const totalPages = Math.ceil(items.length / itemsPerPage);

    // Get the items for the current page
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const itemsForCurrentPage = items.slice(startIndex, endIndex);

    // Render the items for the current page
    itemsForCurrentPage.forEach((item, index) => {
        const overallIndex = startIndex + index + 1; // Calculate the overall index (global item count)

        const formattedDate = dayjs(item.eq_status_timestamp)
            .add(543, 'year')
            .format('D MMMM YYYY');

        let cardClass, headerClass, textClass, statusname;

        switch (item.eq_status) {
            case '0':
                cardClass = 'card-danger';
                headerClass = 'text-white';
                textClass = 'text-danger';
                statusname = 'รอการยืนยัน';
                break;
            case '1':
                cardClass = 'card-warning';
                headerClass = 'text-white';
                textClass = 'text-warning';
                statusname = 'กำลังดำเนินการ';
                break;
            case '2':
                cardClass = 'card-orange';
                headerClass = 'text-white';
                textClass = 'text-orange';
                statusname = 'กำลังส่งซ่อมภายใน';
                break;
            case '3':
                cardClass = 'card-orange';
                headerClass = 'text-white';
                textClass = 'text-orange';
                statusname = 'กำลังส่งซ่อมภายนอก';
                break;
            case '4':
                cardClass = 'card-success';
                headerClass = 'text-white';
                textClass = 'text-success';
                statusname = 'ซ่อมเสร็จแล้ว';
                break;
            case '5':
                cardClass = 'card-success';
                headerClass = 'text-white';
                textClass = 'text-success';
                statusname = 'ได้รับของแล้ว';
                break;
            default:
                cardClass = 'card-secondary';
                headerClass = 'text-white';
                textClass = 'text-secondary';
                statusname = 'Error status not found';
                break;
        }

        const cardHTML = `
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4" data-id="${item.id}">
            <div class="card shadow-md ${cardClass}">
                <!-- Header -->
                <div class="card-header ${headerClass}">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-clipboard-list mr-2"></i>
                            <span class="fw-medium">รายการที่ ${overallIndex}</span>
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
                            <div class="property-value">${item.equipment_name}</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="property-label">สถานะอุปกรณ์</div>
                            <div class="status-badge">
                                <span class="${textClass}">${statusname}</span>
                                <i class="fa-solid fa-circle-check ${textClass}"></i>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="property-label">วอร์ดที่ส่ง</div>
                            <div class="property-value">${item.name_ward}</div>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="staff-info">
                                <i class="fas fa-user-circle ${textClass}"></i>
                                <div>
                                    <div class="property-label">เจ้าหน้าที่รับผิดชอบ</div>
                                    <div class="property-value">${item.res_name || 'รอการยืนยัน'}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="staff-info">
                                <i class="fa-solid fa-calendar-days ${textClass}"></i>
                                <div>
                                    <div class="property-label">วันที่อัพเดทสถานะล่าสุด</div>
                                    <div class="property-value">${formattedDate || '-'}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="icon-container" id="status-icons-${item.id}">
                    </div>
                </div>

                <!-- Footer -->
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-action btn-outline-primary btn-sm" id="detailbutton"
                                data-toggle="modal" data-target="#modal-primary">
                            <i class="fas fa-cog mr-1"></i> รายละเอียด
                        </button>
                        <button type="button" class="btn btn-action btn-outline-danger btn-sm" id="pdfbutton"
                                data-id="${item.id}" data-toggle="modal" data-target="#modal-pdf">
                            <i class="fas fa-file-pdf mr-1"></i> PDF
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;
    $container.append(cardHTML);
    fetchStatusLogs(item.id, item.repair_id);
    });

    // Generate pagination controls
    const paginationHTML = `
        <div class="pagination-controls d-flex justify-content-center my-3">
            <button class="btn btn-sm btn-outline-secondary" ${currentPage === 1 ? 'disabled' : ''} id="prevPage">
                Prev
            </button>
            <span>Page ${currentPage} of ${totalPages}</span>
            <button class="btn btn-sm btn-outline-secondary" ${currentPage === totalPages ? 'disabled' : ''} id="nextPage">
                Next
            </button>
        </div>
    `;
    $pagination.html(paginationHTML); // Update pagination div with buttons

    // Handle page navigation
    $pagination.on('click', '#prevPage', function() {
        if (currentPage > 1) {
            renderRepairList(items, currentPage - 1, itemsPerPage);
        }
    });

    $pagination.on('click', '#nextPage', function() {
        if (currentPage < totalPages) {
            renderRepairList(items, currentPage + 1, itemsPerPage);
        }
    });

    $container.on('click', '#pdfbutton', function() {
        const itemId = $(this).data('id');
        generatePDF(itemId);
    });
}


//----------------------------------------------------------------------------------------------------------------

function fetchStatusLogs(itemId, repair_id) {
    //console.log(repair_id);
    $.ajax({
        url: 'query/get_status_log.php',
        type: 'POST',
        data: { itemId: itemId,
                repair_id: repair_id
                },
        success: function(response) {
            if (response.success) {
                const statusLogs = response.data;
                let circleHTML = '';

                statusLogs.forEach(function(log, index) {
                    circleHTML += `
                        <div class="circle-icon" id="status_icon${log.id}" data-log-id="${log.id}" data-index="${index + 1}">
                            ${index + 1}
                        </div>
                        ${index < statusLogs.length - 1 ? '<i class="fa-solid fa-arrow-right"></i>' : ''}
                    `;

                    
                });

                $(`#status-icons-${itemId}`).html(circleHTML);

                $('.circle-icon').off('click').on('click', function() {
                    const logId = $(this).data('log-id');
                    const index = $(this).data('index');
                    //console.log("index: " + index); console.log("logid: " + logId);
                    //console.log('circle-icon has been trigger');
                    openStatusLogModal(logId, index);
                });
            }
        },
        error: function() {
            $(`#status-icons-${itemId}`).html('<p>เกิดข้อผิดพลาดในการโหลดสถานะ</p>');
        }
    });
}

//----------------------------------------------------------------------------------------------------------------

function openStatusLogModal(logId, index) {
    //console.log('Opening modal for log ID:', logId);
    
    $.ajax({
        url: 'query/get_status_log_details.php',
        type: 'POST',
        data: { log_id: logId },
        success: function(response) {
            if (response.success) {
                const log = response.data;
                const formattedDate = dayjs(log.eq_status_timestamp)
                    .add(543, 'year')
                    .format('D MMMM YYYY เวลา HH:mm น.');
                $('#statusLogModal .modal-title').text('รายละเอียดสถานะ');
                $('#statusLogModal .modal-body').html(`

<div class="row g-3">
            <div class="col-md-6">
                    <p class="mb-2">
                        <strong class="d-block mb-2">สถานที่</strong>
                        <span class="status-badge">${log.id || '-'}</span>
                    </p>
                    <p class="mb-2">
                        <strong class="d-block mb-2">วันที่อัพเดทสถานะ</strong>
                        <span class="status-badge">${formattedDate || '-'}</span>
                    </p>
                    <p class="mb-2">
                        <strong class="d-block mb-2">ผู้บันทึก</strong>
                        <span class="status-badge">${log.res_name || '-'}</span>
                    </p>
                   
            </div>
            
            <div class="col-md-6">
                    <p class="mb-2">
                        <strong class="d-block mb-1">เลขครุภัณฑ์</strong>
                        <span class="status-badge">${log.eq_no || '-'}</span>
                    </p>
                    <p class="mb-2">
                        <strong class="d-block mb-1">สถานะอุปกรณ์</strong>
                        <span class="status-badge">${log.name_status || '-'}</span>
                    </p>
            </div>
        </div>

                    <p><strong>สถานะที่ ${index}</p></strong>
                    <p><strong>เลขครุภัณฑ์:</strong> ${log.eq_no}</p>
                    <p><strong>สถานะ:</strong> ${log.name_status}</p>
                    <p><strong>วันที่:</strong> ${formattedDate}</p>
                    <p><strong>ผู้บันทึก:</strong> ${log.res_name}</p>
                `);

                $('#statusLogModal').modal('show');
            }
        },
        error: function() {
            alert('เกิดข้อผิดพลาดในการโหลดข้อมูลสถานะ');
        }
    });
}

//----------------------------------------------------------------------------------------------------------------รายละเอียดอุปกรณ์แจ้งซ่อม

$('#eq_list').on('click', '#detailbutton', function() {
    const $card = $(this).closest('.col-12');
    const id = $card.data('id');
    $.ajax({
        type: "GET",
        url: "query/eqfetch.php",
        data: { id: id },
        dataType: "json",
        success: function(data) {
            if (data.success && data.data) {
                const rtimestamp = dayjs(data.data.rtimestamp).locale('th');
                const buddhistYear = rtimestamp.year() + 543;
                const formattedDate = rtimestamp
                    .format('DD MMMM YYYY ')
                    .replace(rtimestamp.year(), buddhistYear)
                    + rtimestamp.format('[เวลา] HH:mm น.');
                $('#modal-primary input#eq_id').val(id);
                $('#modal-primary input#eq_no').val(data.data.eq_no);
                $('#modal-primary input#equipment').val(data.data.equipment_name);
                $('#modal-primary input#Hequipment').val(data.data.equipment);
                $('#modal-primary input#ward').val(data.data.name_ward);
                $('#modal-primary input#place').val(data.data.name_place);
                $('#modal-primary input#detail').val(data.data.detail);
                $('#modal-primary input#res_depart').val(data.data.name_depart);
                $('#modal-primary input#date').val(formattedDate);
                $('#modal-primary input#sender_name').val(data.data.sender_name);
                $('#modal-primary input#repair_id').val(data.data.repair_id);

                if (data.data.eq_recieved_timestamp === null) {
                    $('#modal-primary input#recieveddates').val("");
                } else {
                    const eq_recieved_timestamp = dayjs(data.data.eq_recieved_timestamp).locale('th');
                    const eq_recieved_timestampbuddhistYear = eq_recieved_timestamp.year() + 543;
                    const eq_recieved_timestampformattedDate = eq_recieved_timestamp
                        .format('DD MMMM YYYY ')
                        .replace(eq_recieved_timestamp.year(), eq_recieved_timestampbuddhistYear)
                        + eq_recieved_timestamp.format('[เวลา] HH:mm น.');
                    $('#modal-primary input#recieveddates').val(eq_recieved_timestampformattedDate);
                }

                $('#modal-primary select#eq_status').empty();

//----------------------------------------------------------------------------------------------------------------select option สถานะอุปกรณ์

                switch (data.data.eq_status) {
                    case '0':
                        $('#modal-primary select#eq_status').append('<option disabled selected>รอการยืนยัน</option>');
                        break;
                    case '1':
                        $('#modal-primary select#eq_status').append('<option disabled selected>กำลังดำเนินการ</option>');
                        break;
                    case '2':
                        $('#modal-primary select#eq_status').append('<option disabled selected>กำลังส่งซ่อมภายใน</option>');
                        break;
                    case '3':
                        $('#modal-primary select#eq_status').append('<option disabled selected>กำลังส่งซ่อมภายนอก</option>');
                        break;
                    case '4':
                        $('#modal-primary select#eq_status').append('<option disabled selected>ซ่อมเสร็จแล้ว</option>');
                        break;
                    case '5':
                        $('#modal-primary select#eq_status').append('<option disabled selected>ซ่อมเสร็จแล้ว</option>');
                        break;
                    
                    default:
                        $('#modal-primary select#eq_status').append('<option disabled selected>ไม่พบสถานะ</option>');
                        break;
                }

                const equipmentValue = data.data.equipment;

                if ($('#modal-primary select#detail2').length > 0) {
                    $('#modal-primary select#detail2').empty();
                
                    $.ajax({
                        type: "GET",
                        url: "query/detailfetch.php",
                        data: { equipment: equipmentValue },
                        dataType: "json",
                        success: function(detailData) {
                            if (detailData.success && detailData.data) {
                                const matchedOption = detailData.data.find(function(option) {
                                    return option.id == data.data.detail2; // Compare ID to detail2 value
                                });
                                if (data.data.detail2 !== null) {
                                    $('#modal-primary select#detail2').append(new Option(matchedOption.name_detail, '', true, true));
                                    //$('#modal-primary select#detail2').prop('disabled', true);
                                } else {
                                    $('#modal-primary select#detail2').append(new Option('กรุณาเลือกรายละเอียด', '', false, false));
                                }
                
                                detailData.data.forEach(function(option) {
                                    const optionElement = new Option(option.name_detail, option.id);
                                    
                                    $('#modal-primary select#detail2').append(optionElement);
                                })
                            } else {
                                console.error("Failed to fetch detail data:", detailData.error);
                            }
                        },
                        error: function(textStatus, errorThrown) {
                            console.error("Error fetching detail data:", textStatus, errorThrown);
                        }
                    });
                }
                




                // const eqStatusName = data.data.eq_status_name; 
                // console.log(eqStatusName);
                // $('#modal-primary select#eq_status').val(data.data.eq_status);
                // $('#modal-primary select#eq_status option:selected').text(eqStatusName);

                // $('#modal-primary select#eq_status option').each(function() {
                //     if ($(this).text() === eqStatusName) {
                //         $(this).prop('disabled', true);
                //     }
                // });

                $('#modal-primary').modal('show');
            } else {
                console.error("Failed to fetch data:", data.error);
            }
        },
        error: function(textStatus, errorThrown) {
            console.error("Error fetching data:", textStatus, errorThrown);
        }
    });
});

//----------------------------------------------------------------------------------------------------------------