<?php
$menu = "search";

include("header.php");
include("query/search_option.php");

?>

<head>
    <link rel="stylesheet" href="css/forsearch.css">
</head>
<body>

<div class="header-section">
        <h1 class="header-title">
            <i class="fas fa-tools"></i>
            รายการส่งแจ้งซ่อมครุภัณฑ์
        </h1>
    </div>

    <section class="content">
<div class="card shadow-sm m-3">
    <div class="card-header bg-lightblue text-white py-3">
        <h2 class="text-center mb-0">
            <i class="fas fa-search me-2 mr-2"></i>ค้นหาเลขครุภัณฑ์
        </h2>
    </div>
    <div class="card-body bg-light">
        <form id="searchForm" method="GET" action="">
            <div class="row g-3">
                <!-- เลขครุภัณฑ์ -->
                <div class="col-lg-2 col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-bold" for="searchInput">
                            <i class="fas fa-barcode me-1 mr-2"></i>เลขครุภัณฑ์
                        </label>
                        <input id="searchInput" name="search" type="search" 
                            class="form-control shadow-sm" 
                            placeholder="7441-001-001-610/45" 
                            value="<?php echo htmlspecialchars($searchTerm); ?>">
                    </div>
                </div>

               <!-- วันที่เริ่มต้น -->
<div class="col-lg-2 col-md-6">
    <div class="form-group">
        <label class="form-label fw-bold" for="start_date_display">
            <i class="fas fa-calendar-alt me-1 mr-2"></i>วันที่เริ่มต้น
        </label>
        <div class="input-group shadow-sm">
            <input type="text" id="start_date_display" class="form-control" placeholder="วันที่ / เดือน / ปี">
            <input type="hidden" name="start_date" id="start_date">
        </div>
    </div>
</div>

<!-- วันที่สิ้นสุด -->
<div class="col-lg-2 col-md-6">
    <div class="form-group">
        <label class="form-label fw-bold" for="end_date_display">
            <i class="fas fa-calendar-alt me-1 mr-2"></i>วันที่สิ้นสุด
        </label>
        <div class="input-group shadow-sm">
            <input type="text" id="end_date_display" class="form-control" placeholder="วันที่ / เดือน / ปี">
            <input type="hidden" name="end_date" id="end_date">
        </div>
    </div>
</div>


                <!-- อุปกรณ์ -->
                <div class="col-lg-2 col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-bold">
                            <i class="fas fa-tools me-1 mr-2"></i>อุปกรณ์
                        </label>
                        <select name="equipment" class="form-control select2bs4 shadow-sm">
                            <option value="" disabled selected>-- เลือกอุปกรณ์ --</option>
                            <option value="all">ทั้งหมด</option>
                            <?php echo $equipmentOptions; ?>
                        </select>
                    </div>
                </div>

                <!-- สถานะ -->
                <div class="col-lg-2 col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-bold">
                            <i class="fas fa-info-circle me-1 mr-2"></i>สถานะ
                        </label>
                        <select name="status" class="form-control select2bs4 shadow-sm">
                            <option value="" disabled selected>-- เลือกสถานะ --</option>
                            <?php echo $statusOptions; ?>
                        </select>
                    </div>
                </div>

                <!-- ปุ่มค้นหาและล้างข้อมูล -->
                <div class="col-lg-2 d-flex justify-content-center align-items-center mt-3">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm mr-2">
                        <i class="fa-solid fa-magnifying-glass me-2 mr-1"></i>Submit
                    </button>
                    <button type="button" id="clearSearch" class="btn btn-secondary px-4 shadow-sm">
                        <i class="fas fa-undo me-2 mr-1"></i>Clear
                    </button>
                </div>
            </div>
        </form>

        <!-- Status Legend -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-center gap-4">
                    <div class="d-flex align-items-center">
                        <span class="status-dot bg-danger"></span>
                        <span class="status-text">รอเจ้าหน้าที่มายืนยัน</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="status-dot bg-warning"></span>
                        <span class="status-text">กำลังดำเนินการ</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="status-dot" style="background-color: #fd7e14"></span>
                        <span class="status-text">กำลังส่งซ่อมภายใน/นอก</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="status-dot bg-success"></span>
                        <span class="status-text">ซ่อมเสร็จแล้ว</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


                <div id="eq_list" class="row">
                </div>
                
                <div id="pagination" class="pagination-container mt-3"></div>




            <div class="modal fade" id="statusLogModal" tabindex="-1" role="dialog" aria-labelledby="statusLogModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="statusLogModalLabel">สถานะรายละเอียด</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="repairListDetails">
                            <!-- ข้อมูลจากตาราง repairlist จะถูกแสดงที่นี่ -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
    </div>
</section>


    <script src="js/search.js"></script>




</body>
</html>
