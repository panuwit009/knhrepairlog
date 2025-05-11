let searchTerm, startDate, endDate, equipmentId;

$(document).ready(function() {
    $("#searchInput").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: 'query/get_equipment_numbers.php',
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) { console.log(data);
                    response(data);
                }
            });
        },
        minLength: 1,
        select: function(event, ui) {
            $(this).val(ui.item.value);
            $('#sumbitsearch').trigger('click');
        }
    });

    


    $('.select2bs4').select2({
        theme: 'bootstrap4',
        width: '100%'
    });


    $('#toggleSearch').on('click', function() {
        $('#searchForm').slideToggle('fast');
        $('.status-legend').slideToggle('fast');
    });
    
        $('#start_date_display').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            language: 'th'       
        }).on('changeDate', function(e) {
            var date = e.format('yyyy-mm-dd');
            $('#start_date').val(date); 
    
            $('#end_date_display').datepicker('setStartDate', e.date); 
        });

        $('#end_date_display').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            language: 'th'          
        }).on('changeDate', function(e) {
            var date = e.format('yyyy-mm-dd');
            $('#end_date').val(date); 
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

    let value = e.target.value.replace(/[^0-9\/]/g, '');

    const maxLength = pattern.reduce((sum, num) => sum + num, 0);
    if (value.length > maxLength) {
        value = value.slice(0, maxLength);
    }

    let formattedValue = '';
    let currentPosition = 0;

    for (let i = 0; i < pattern.length; i++) {
        if (value.length > currentPosition) {

            if (i > 0 && i < 4) { 
                formattedValue += separator;
            }

            if (i >= 3) {
                formattedValue += value.slice(currentPosition, currentPosition + pattern[i]);
                currentPosition += pattern[i];
            } else {

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

        if (!isInitialLoad && !startDate && !endDate && !searchTerm.trim()) {
            Swal.fire({
                icon: 'warning',
                title: 'กรุณากรอกข้อมูล!!!',
                text: 'กรอกเลขครุภัณฑ์ หรือ เลือกวันที่ก่อนค้นหา'
            });
            return;
        }

        if (equipmentId === 'all') {
            equipmentId = '';
        }
        if (statusId === 'all') {
            statusId = '';
        }
    
        if (!isInitialLoad) {
            // Swal.fire({
            //     title: 'กำลังค้นหา...',
            //     html: 'โปรดรอสักครู่',
            //     allowOutsideClick: false,
            //     didOpen: () => {
            //         Swal.showLoading();
            //     }
            // });
        }
    }



$('#submitsearch').on('click', function() {

    searchTerm = $('#searchInput').val();
    startDate = $('#start_date').val();
    endDate = $('#end_date').val();
    equipmentId = $('select[name="equipment"]').val();
    // console.log(searchTerm);
    // console.log(startDate); 
    // console.log(endDate);
    // console.log(equipmentId);
    const status = currentStatus;
    const statusType = currentstatusType;
    if (status === null || statusType === null) {
        fetchRecords();
    } else {
        fetchRecords(status, statusType);
    }
    //console.log("cr: " + currentStatus + " and " + currentstatusType);
});

$('#clearSearch').on('click', function() {
    // console.log(searchTerm);
    // console.log(startDate); 
    // console.log(endDate);
    // console.log(equipmentId);
    currentStatus = null;
    currentstatusType = null;
    $('#eq_status0 .info-box, #eq_status1 .info-box, #eq_status2 .info-box, #eq_status3 .info-box').removeClass('active');
    
    console.log("cr: " + currentStatus + " and " + currentstatusType);
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

    performSearch(true);

    Swal.fire({
        icon: 'question',
        title: 'กำลังโหลด',
        timer: 800,
        showConfirmButton: false
    }).then(() => {
        Swal.fire({
            icon: 'success',
            title: 'สำเร็จ',
            timer: 800,
            showConfirmButton: false
        }).then(() => {

        fetchRecords();
        });
    });
});

//  ----------------------------------------------------------------------------------------------------------------------------------------

    var startDate = $('#start_date').val();
    if (startDate) {
        $('#start_date_display').val(formatDate(startDate));
    }

    var endDate = $('#end_date').val();
    if (endDate) {
        $('#end_date_display').val(formatDate(endDate));
    }
});

function formatDate(date) {
    var d = new Date(date);
    var day = String(d.getDate()).padStart(2, '0');
    var month = String(d.getMonth() + 1).padStart(2, '0');
    var year = d.getFullYear();
    return day + '/' + month + '/' + year;
}

//  ----------------------------------------------------------------------------------------------------------------------------------------

function search(data) {
    //console.log("Searching with data:", data);
    searchTerm = $('#searchInput').val();
    startDate = $('#start_date').val();
    endDate = $('#end_date').val();
    equipmentId = $('select[name="equipment"]').val();
    let filteredData = data;
    // console.log("searchTerm:", searchTerm);
    // console.log("startDate:", startDate);
    // console.log("endDate:", endDate);
    // console.log("equipmentId:", equipmentId);
    if (!searchTerm && !startDate && !endDate && !equipmentId) {
        filteredData = filteredData.filter(record => {
            let eqStatus = record.eq_status;
            let eqStatusTimestamp = new Date(record.eq_status_timestamp);
            let today = new Date();
            let sevenDaysAgo = new Date(today.setDate(today.getDate() - 7));

            // console.log("Record eq_status:", eqStatus);
            // console.log("Record eq_status_timestamp:", record.eq_status_timestamp);
            // console.log("Parsed eqStatusTimestamp:", eqStatusTimestamp);
            // console.log("Seven days ago:", sevenDaysAgo);

            if ((eqStatus === "4" || eqStatus === "5") && eqStatusTimestamp < sevenDaysAgo) {
                //console.log("Excluding record due to eq_status 4 or 5 with old timestamp");
                return false;
            }
            return true;
        });
    }

    $.ajax({
        type: "POST",
        url: "query/searchfilter.php",
        data: { 
            records: filteredData,
            search_term: searchTerm,
            start_date: startDate, 
            end_date: endDate,
            equipment_id: equipmentId 
        },
        dataType: "json",
        success: function(response) {
            // console.log("search:" + searchTerm);
            // console.log("search:" + startDate); 
            // console.log("search:" + endDate);
            // console.log("search:" + equipmentId);
            if (response.success) {
                //console.log("Filtered data received:", response.data);
                renderRepairList(response.data);
            } else {
                Swal.fire({
                    title: "ไม่พบข้อมูล",
                    showConfirmButton: false,
                    icon: "info",
                    timer: 800
                });
                $('#eq_list').html('')//.css({ 'display': 'flex', 'justify-content': 'center', 'align-items': 'center'})
                ;
                // console.error("Failed to filter data:", response.error);
            }
        },
        error: function(textStatus, errorThrown) {
            console.error("Error sending data:", textStatus, errorThrown);
        }
    });
}
