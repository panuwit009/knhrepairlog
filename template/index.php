<?php
$menu = "index";
include("header.php");
include './connection/connection.php';
?>
<head>
    <link rel="stylesheet" href="css/index.css">

</head>
<body>
<div class="content-header">

<div class="container-fluid">
    <div class="row">
        <!-- เนื้อหาซ้าย -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Browser Usage</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart-responsive">
                                <canvas id="pieChart" height="150"></canvas>
                            </div>
                            <!-- ./chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <ul class="chart-legend clearfix">
                                <li><i class="far fa-circle text-danger"></i> Chrome</li>
                                <li><i class="far fa-circle text-success"></i> IE</li>
                                <li><i class="far fa-circle text-warning"></i> FireFox</li>
                                <li><i class="far fa-circle text-info"></i> Safari</li>
                                <li><i class="far fa-circle text-primary"></i> Opera</li>
                                <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                            </ul>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer p-0">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                United States of America
                                <span class="float-right text-danger">
                                    <i class="fas fa-arrow-down text-sm"></i>
                                    12%
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                India
                                <span class="float-right text-success">
                                    <i class="fas fa-arrow-up text-sm"></i> 4%
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                China
                                <span class="float-right text-warning">
                                    <i class="fas fa-arrow-left text-sm"></i> 0%
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.footer -->
            </div>
        </div>







        

        <!-- เนื้อหาขวา -->
        <div class="container-fluid                                                                                                                                                                                                                                                                                                                                                                                                                           col-md-4">
            <p class="text-center">
              
                <strong>Goal Completion</strong>
            </p>
            <div class="progress-group">
                Add Products to Cart
                <span class="float-right"><b>160</b>/200</span>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-primary" style="width: 80%"></div>
                </div>
            </div>
            <div class="progress-group">
                Complete Purchase
                <span class="float-right"><b>310</b>/400</span>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-danger" style="width: 75%"></div>
                </div>
            </div>
            <div class="progress-group">
                <span class="progress-text">Visit Premium Page</span>
                <span class="float-right"><b>480</b>/800</span>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-success" style="width: 60%"></div>
                </div>
            </div>
            <div class="progress-group">
                Send Inquiries
                <span class="float-right"><b>250</b>/500</span>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-warning" style="width: 50%"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script src="js/sum.js"></script>
<?php include('footer.php'); ?>
</body>
</html>







            <div class="input-group">
                <label class="custom-label" for="num1">ตัวเลข 1 :</label>
                <input type="number" id="num1" class="number-input" placeholder="กรอกตัวเลข">
                
                <label class="custom-label" for="num2">ตัวเลข 2 :</label>
                <input type="number" id="num2" class="number-input" placeholder="กรอกตัวเลข">
                
                <label class="custom-label" for="num3">ตัวเลข 3 :</label>
                <input type="number" id="num3" class="number-input" placeholder="กรอกตัวเลข">
            </div>

            <!-- Date inputs and result fields -->
            <div class="input-group">
                <label class="custom-label">เลือก :</label>
                <input type="date" id="start-date" class="date-input">
                
                <label class="custom-label">ถึง :</label>
                <input type="date" id="end-date" class="date-input">
                
                <label class="custom-label">จำนวนคน :</label>
                <input type="number" id="people-count" class="number-input" placeholder="กรอกจำนวนคน" min="1">

                <label class="custom-label">ผลรวม :</label>
                <span id="sum-result" class="number-input">0</span>

                <label class="custom-label">ค่าเฉลี่ยต่อคน :</label>
                <span id="average-result" class="number-input">0</span>
            </div>
        </div>