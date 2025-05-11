<?php
  require_once 'query/connection.php';
?>
<nav class="main-header  navbar navbar-expand navbar-graydark
 navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if ($menu == "index"){echo "active";} ?>"  href="index.php"><i class="fas fa-home"></i> Home</a>
      </li>
      
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
      <?php
    if (isset($_SESSION['role'])) {
        echo '<li class="nav-item"><span class="nav-link">' . $_SESSION['name'] . '</span></li>';
    } else {
        echo '<li class="nav-item"><span class="nav-link">ไม่มีค่า</span></li>';
    }
    ?>
      </li>
    </ul>
  </nav>
