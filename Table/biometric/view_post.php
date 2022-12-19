<?php
include('../include/db.php');
  session_start();
  if(!$_SESSION['id']){
    header('location:../');
  }

  $id=$_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
  

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
   
      <!-- Notifications Dropdown Menu -->
      
      <a href="../../login/index.html"><button class="btn btn-primary"><i class="nav-icon fas fa-power-off"></i></button></a>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Cplus Soft</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
   
          <li class="nav-item">
            <a href="dashboard.html" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                POST
                
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="pincode.php" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
              <p>
                LIKE ROUTINE
                
              </p>
            </a>
          </li>
		  
		    <li class="nav-item">
            <a href="audio_file.php" class="nav-link">
             <i class="nav-icon fas fa-users"></i>
              <p>
                COMMENT ROUTINE
                
              </p>
            </a>
          </li>
		  
		  
		    <li class="nav-item">
            <a href="strings.php" class="nav-link">
           <i class="nav-icon fas fa-users"></i>
              <p>
                DM FOR NEW FOLLOWER
                
              </p>
            </a>
          </li>
		  
		    <li class="nav-item">
            <a href="reset.php" class="nav-link">
         <i class="nav-icon fas fa-users"></i>
              <p>
                FOLLOW
                
              </p>
            </a>
          </li>
		  	    <li class="nav-item">
            <a href="reset.php" class="nav-link">
    <i class="nav-icon fas fa-users"></i>
              <p>
                UNFOLLOW FOLLOWERS
                
              </p>
            </a>
          </li>
		  	    <li class="nav-item">
            <a href="reset.php" class="nav-link">
 <i class="nav-icon fas fa-users"></i>
              <p>
                UNFOLLOW
                
              </p>
            </a>
          </li>
		  	    <li class="nav-item">
            <a href="reset.php" class="nav-link">
 <i class="nav-icon fas fa-users"></i>
              <p>
                REPORT
                
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  
 
 
<div class="card mb-3">
  <h3 class="card-header">Post View</h3>
  <div class="card-body">
<?php
  $query=mysqli_query($con,"select * from posts where post_id='$id'");
  if($query){
    $row=mysqli_fetch_array($query);
  }
?>
  </div>
  <img style="height: 50%; width: 50%; border-radius:15px;" src="../<?php echo $row['picture']; ?> " alt="Card image">
  <div class="card-body">
  <h3>Description</h3>
    <p class="card-text"><?php echo $row['desc_post'] ;?></p>
  </div>
  <ul class="list-group list-group-flush">

    <li class="list-group-item">   <h3>Hashtags</h3><?php echo $row['hash_tags']?></li>

  </ul>

  
</div>




  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
