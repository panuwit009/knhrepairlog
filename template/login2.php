<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ</title>
    <?php include("link.php") ?>
    <link rel="stylesheet" href="css/login2.css">

</head>
<div class="container">
    <form id="loginForm" method="post">
        <div class="mb-3">
            <input type="text" id="username" name="username" class="form-control" placeholder="กรุณากรอกข้อความ">
        </div>
        <div class="mb-3">
            <input type="text" id="password" name="password" class="form-control" placeholder="กรุณากรอกอายุ">
        </div>
        <button type="submit" class="btn btn-primary w-100">ส่งข้อมูล</button>
    </form>
</div>


<?php include("script.php") ?>

<script src="js/logintest.js"></script>
</body>
</html>