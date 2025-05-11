<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ</title>
    <?php include("link.php") ?>
    <link rel="stylesheet" href="css/login.css">

</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <img src="file/picture/logo.ico" alt="Your Logo" class="h1" style="width: 160px; height: 150px;">
            </div>
            <div class="card-body">
                <p class="login-box-msg">
                    <b><span style="font-size: 18px;">ระบบแจ้งซ่อมครุภัณฑ์</span></b>
                </p>
                
                <form enctype="multipart/form-data" id="loginForm" method="post">
                    <div class="input-group mb-3">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary mx-auto">เข้าสู่ระบบ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include("script.php") ?>
    <script src="js/login.js"></script>
</body>
</html>