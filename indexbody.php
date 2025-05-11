<body>

<div class="pt-4 px-4">

    <div class="card">
        <div class="card-header bg-lightblue text-white py-3">
            <h2 class="text-center mb-0">
            <i class="fas fa-search me-2 mr-2"></i>ค้นหาเลขครุภัณฑ์
        </h2>
    </div>
    <div class="card-body">
        <form id="searchForm" method="GET" action="">
            <div class="row g-3">
                <!-- เลขครุภัณฑ์ -->
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-label fw-bold" for="searchInput">
                            <i class="fas fa-barcode me-1 mr-2"></i>เลขครุภัณฑ์
                        </label>
                        <input id="searchInput" name="search" type="search" class="form-control " placeholder="7441-001-001-610/45" >
                    </div>
                </div>

                            <!-- วันที่เริ่มต้น -->
                <div class="col-lg-2">
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
                <div class="col-lg-2">
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
                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="form-label fw-bold">
                            <i class="fas fa-tools me-1 mr-2"></i>อุปกรณ์
                        </label>
                        <select name="equipment" class="form-control select2bs4 shadow-sm">
                            <option value="" disabled selected>-- เลือกอุปกรณ์ --</option>
                            <option value="">ทั้งหมด</option>
                            <?php echo $equipmentOptions; ?>
                        </select>
                    </div>
                </div>



                <!-- ปุ่มค้นหาและล้างข้อมูล -->
                <div class="col-lg-2 d-flex justify-content-center align-items-center mt-3">
                    <button type="button" class="btn btn-primary px-4 shadow-sm mr-2" id="submitsearch">
                        <i class="fa-solid fa-magnifying-glass me-2 mr-1"></i>Submit
                    </button>
                    <button type="button" id="clearSearch" class="btn btn-secondary px-4 shadow-sm">
                        <i class="fas fa-undo me-2 mr-1"></i>Clear
                    </button>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12" id="eq_status0" data-status="0">
                    <div class="info-box shadow-md custom-carddanger">
                        <span class="info-box-icon bg-danger-custom"><i class="fa-solid fa-screwdriver-wrench"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">รอการยืนยัน</span>
                            <span class="info-box-number">
                            </span>
                        </div>
                    </div>
                </div>

            <div class="col-lg-3 col-sm-6 col-12" id="eq_status1" data-status="1">
                <div class="info-box shadow-md custom-cardwarning">
                    <span class="info-box-icon bg-warning-custom"><i class="fa-solid fa-wrench text-black"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">กำลังดำเนินการ</span>
                        <span class="info-box-number">
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12" id="eq_status2" data-status="2">
                <div class="info-box shadow-md custom-cardorange">
                    <span class="info-box-icon bg-orange-custom"><i class="fa-solid fa-hammer"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">กำลังส่งซ่อมภายใน / นอก</span>
                        <span class="info-box-number">
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12" id="eq_status3" data-status="3">
                <div class="info-box shadow-md custom-cardsuccess">
                    <span class="info-box-icon bg-success-custom"><i class="fa-solid fa-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">อุปกรณ์ที่ซ่อมเสร็จแล้ว</span>
                        <span class="info-box-number">
                        </span>
                    </div>
                </div>
            </div> 
        </div>
        </div>

        </div>
    </div>

<div class="container">

        <div class="row p-4" id="eq_list"></div>
        
        <div class="d-flex justify-content-center" id="pagination">
            <!-- <button type="button" class="btn btn-outline-primary py-2 px-3 mb-4">1</button> -->
        </div>
    </div>
    


            <div class="modal fade" id="statusLogModal" tabindex="-1" role="dialog" aria-labelledby="statusLogModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="statusLogModalLabel">รายละเอียดสถานะ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- log detail -->
                        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="signmodal" tabindex="-1" role="dialog" aria-labelledby="modal-primary-title" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="signmodal-title">PDF</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <div class="row">
                    <!-- Embedding PDF in iframe -->
                    <iframe id="pdfIframe" src="" width="100%" height="500px" style="border: none;"></iframe>
                </div>
            </div>  

            <div class="modal-footer justify-content-end">

                <div class="form-group">
                    <label for="">ความคิดเห็น</label>
                    <input type="text" class="form-control" id="doctoropinioninput">
                    <label for="">เซ็นด้วยลายเซ็นดิจิทัล</label>
                    <input type="checkbox" class="" id="digitalsigncheckbox">
                    </div>

                <button type="button" class="btn btn-outline-primary" id="opandsignbutton">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>

    

<div class="modal fade" id="modal-primary" tabindex="-1" role="dialog" aria-labelledby="modal-primary-title" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="modal-primary-title">รายละเอียด</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label for="eq_no">เลขครุภัณฑ์</label>
                                <input class="form-control" id="eq_no" value="" readonly>
                                <input type="hidden" id="eq_id">      
                                <input id="repair_id" style="display:none;">         
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label for="equipment">อุปกรณ์</label>
                                <input class="form-control" id="equipment" value="" readonly>  
                                <input class="form-control" id="Hequipment" value="" hidden>          
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label for="place">สถานที่อยู่</label>
                                <input class="form-control" id="place" value="" readonly>                
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label for="res_dep">หน่วยงานรับผิดชอบ</label>
                                <input class="form-control" id="res_depart" value="" readonly>                
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label for="ward">วอร์ด</label>
                                <input class="form-control" id="ward" value="" readonly>                
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label for="detail">รายละเอียด</label>
                                <input class="form-control" id="detail" readonly>                
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label for="date">วันที่แจ้งซ่อม</label>
                                <input class="form-control" id="date" readonly>                
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label for="sender_name">ชื่อผู้แจ้งซ่อม</label>
                                <input class="form-control" id="sender_name" readonly></ไ>                
                            </div>
                        </div>
                
                        <div class="col-lg-6 col-sm-6"> 
                            <div class="form-group">
                                <label for="eq_status">สถานะอุปกรณ์</label>
                                <select class="form-control" id="eq_status"></select>                
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6"> 
                            <div class="form-group">
                                <label for="detail2">รายละเอียดจากเจ้าหน้าที่</label>
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                                echo '<select class="form-control" id="detail2"></select> '; } 
                                else {
                                echo '<input type="text" class="form-control" id="detail2" readonly> ';
                                }
                                ?> 
                                                
                            </div>
                        </div>


                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label for="date">วันที่ส่งซ่อมภายนอก</label>
                                <input class="form-control" id="dates" readonly>                
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label for="date">วันที่รับอุปกรณ์</label>
                                <input class="form-control" id="recieveddates" readonly>
                                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'passadu') {
                                echo '<label for="recievedEquipment">ได้รับของแล้ว</label>
                                <input type="checkbox" class="" id="recievedEquipment"> '; } ?>                   
                            </div>
                        </div>
                        
                    </div>
                </div>  

                <div class="modal-footer justify-content-between">

                    <button type="button" class="btn btn-outline-primary" id="savebutton">บันทึก</button>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'doctor') {
                    echo '<button type="button" class="btn btn-outline-primary" id="signbutton">ลงชื่อ</button>'; } ?>
                    <!-- <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
