<?php
include("header.php");
$menu = "index";
?>
<head>
    <?php include("link.php") ?>
    <link rel="stylesheet" href="css/forform.css">

</head>
<body>
    <div class="container">
        <div class="card a4">
            <div class="card-body">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        ใบแจ้งซ่อม / รายงานผลการซ่อม / เบิกอะไหล่
                    </div>
                    <div>พัสดุลงรับเลขที่ วันที่</div>
                </div>
                <h1 class="card-title">แบบฟอร์มข้อมูล</h1>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">ชื่อ:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">อีเมล:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">ข้อความ:</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">เพศ:</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="">-- กรุณาเลือก --</option>
                            <option value="male">ชาย</option>
                            <option value="female">หญิง</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">ส่งข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>