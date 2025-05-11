<?php
$menu = "dashboard";
include("header.php");   
include('query/dashboard_repair_list.php');
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>


<div class="container d-flex justify-content-center align-items-center mb-2">
    <div class="text-center">
        <h1 class="display-4 font-weight-bold text-primary animated-title">DashBoard</h1>
        <p id="currentDateText" class="animated-subtitle">ข้อมูลสถิติโดยรวม</p>
    </div>
</div>



        <!-- สถิติโดยรวม -->
        <div class="row px-4">
            <div class="col-lg-4 col-12">
                <div class="small-box bg-danger">
                    
                    <div class="inner">
                        <h4>แจ้งซ่อมวันนี้</h4>
                        <h3>
                            <?php echo $today_count; ?> 
                            <span style="font-size: 0.8em; font-weight: normal;">
                                <?php echo $list; ?>
                            </span>
                        </h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tools"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="small-box bg-warning disabled color-palette">
                    <div class="inner">
                        <h4 class="text-white">แจ้งซ่อมเดือนนี้</h4>
                        <h3 class="text-white">
                            <?php echo $month_count; ?>
                            <span style="font-size: 0.8em; font-weight: normal;">
                                <?php echo $list; ?>
                            </span>
                        </h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h4>แจ้งซ่อมปีนี้</h4>
                        <h3>
                            <?php echo $year_count; ?>
                            <span style="font-size: 0.8em; font-weight: normal;">
                                <?php echo $list; ?>
                            </span>
                        </h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar"></i>
                    </div>
                </div>
            </div>
        </div>



        <!-- กราฟและตาราง -->
        <div class="row px-5">
            <!-- กราฟแสดงจำนวนการซ่อมแยกตามอุปกรณ์ -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="py-2 text-muted">รายการแจ้งซ่อมอุปกรณ์</h4>
                            <!-- ตรงนี้คุณสามารถเพิ่มปุ่มหรือไอคอนเพิ่มเติมได้ -->

                            <div class="d-flex align-items-center">
                                <!-- ช่วงเวลาที่เลือก -->
                                <div class="input-group mr-2" style="width: 200px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="startDateIcon"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="startDate" class="form-control" placeholder="เลือกวันที่เริ่มต้น" aria-describedby="startDateIcon" style="width: auto;">
                                </div>

                                <div class="input-group mr-2" style="width: 200px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="endDateIcon"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="endDate" class="form-control" placeholder="เลือกวันที่สิ้นสุด" aria-describedby="endDateIcon" style="width: auto;">
                                </div>


                                <!-- Select เดือน -->
                                <select id="monthSelect" class="form-select mr-2" aria-label="Select month">
                                    <!-- แทรกตัวเลือกของเดือนที่นี่ -->
                                </select>

                                <!-- Select ปี -->
                                <select id="yearSelect" class="form-select mr-2" aria-label="Select year">
                                    <!-- แทรกตัวเลือกของปีที่นี่ -->
                                </select>

                                <button id="resetButton" class="btn btn-primary" style="font-size: 14px;">
                                    <i class="fas fa-redo-alt"></i> คืนค่าเริ่มต้น
                                </button>
                </div>
        </div>
    </div>


    <div class="card-body">
        <div class="col-12">
            <div class="fullscreen">
                <div class="chart-responsive">
                    <div class="chart-container">
                        <canvas id="equipmentChart"></canvas>
                    </div>
                    <div class="chart-legend">
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</div>
</div>


        <div class="col-12 py-2 px-5">
            <div class="card shadow-sm border-0">
                <div class="d-flex justify-content-center align-items-center mt-2">
                    <h3 class="text-center text-muted py-1">รายการแจ้งซ่อมล่าสุด</h3>
                </div>
                <div class="table-responsive px-4">
                    <table class="table table-hover table-bordered table-striped mb-0" id="repairlist-table">
                    <thead class="thead-dark">
                            <tr class="text-center">
                                <th class="align-middle col-1">วันที่แจ้งซ่อม</th>
                                <th class="align-middle col-1">เลขครุภัณฑ์</th>
                                <th class="align-middle col-1">ครุภัณฑ์</th>
                                <th class="align-middle col-1">วอร์ด</th>
                                <th class="align-middle col-1">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ข้อมูลจะถูกเติมที่นี่โดย JavaScript -->
                        </tbody>
                    </table>
                    </div>
                    <div class="mt-4" id="pagination"></div>
                    <div class="mb-2" id="page-info"></div>
            </div>
        </div>







<?php include("footer.php"); ?>


<script src="js/dashboard.js"></script>

</body>
</html>