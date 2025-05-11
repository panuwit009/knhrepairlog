<?php session_start(); 
if (empty($_SESSION['role'])) { 
  echo '<script type="text/javascript">window.location.href = "login.php";</script>'; 
  exit(); }

$userRole = $_SESSION['role'];
?>

<script type="text/javascript">
    var userRole = "<?php echo $userRole; ?>";
    //console.log("asd:" + userRole);
</script>

<?php include ("link.php"); ?>
<?php include ("script.php"); ?>
<body class="sidebar-mini layout-fixed layout-navbar-fixed">
<!-- <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm"> -->
<!-- <body class="sidebar-mini layout-fixed" style="height: auto;"> -->
<!-- Site wrapper -->
<div class="wrapper">
  
  
  <?php include ("navbar.php"); ?>
  <?php include ("sidebar.php"); ?>

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">