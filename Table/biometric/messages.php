<?php
  include('../include/db.php');
  session_start();
  if(!$_SESSION['id']){
    header('location:../../');
  }

  $id=$_SESSION['id'];
  $name=$_SESSION['name'];


  




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
      
      <a href="../../table/logout.php"><button class="btn btn-primary"><i class="nav-icon fas fa-power-off"></i></button></a>
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
          <a href="#" class="d-block"><?php echo $name; ?></a>
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
            <a href="like.php" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
              <p>
                LIKE ROUTINE
                
              </p>
            </a>
          </li>
		  
		    <li class="nav-item">
            <a href="comments.php" class="nav-link">
             <i class="nav-icon fas fa-users"></i>
              <p>
                COMMENT ROUTINE
                
              </p>
            </a>
          </li>
		  
		  
		    <li class="nav-item">
            <a href="messages.php" class="nav-link">
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
            <h1 class="m-0 text-dark">Messages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content -->
    <div class="form-group">
        <div class="custom-control custom-switch ml-3">
           <input type="checkbox" class="custom-control-input " id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1"></label>
        </div>
    </div>
    <?php
        if(isset($_POST['save'])){
            $msg=$_POST['message'];

            $inser=mysqli_query($con,"insert into messages values (null,'$id','$msg')");
            if($inser){
                echo '<script>alert("Message saved")</script>';
            }
        }
    ?>
    <!--Table!-->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!----Form--!-->

            <div class="card">
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="Post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputText3" class="col-sm-2 col-form-label">Message</label>
                    <div class="col-sm-6">
                      <textarea type="text" class="form-control text-left" name="message" id="inputText3" placeholder="Message...."></textarea>
                    </div>
                    <div class="col-sm-4 pt-2">
                        <div class="form-group">
                      <input type="submit" name="save" value="Save " class="btn btn-primary">
</div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Messages</h3>
              </div>
              <!-- /.card-header -->
               <div class="card-body">
                <table id="example2" class="table table-bordered text-center table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Followers</th>
                    <th>Message</th>
                  </tr>
                  </thead>
                  <tbody>
                 <tr>
                   <td>1</td>
                   <td>@khalid</td>
                   <td>My name is khalid</td>
                 </tr>
                 <tr>
                   <td>2</td>
                   <td>@Rashid</td>
                   <td>My name is khalid</td>
                 </tr>
                 <tr>
                   <td>3</td>
                   <td>@Bilal</td>
                   <td>My name is khalid</td>
                 </tr>
                 <tr>
                   <td>4</td>
                   <td>@Hamza</td>
                   <td>My name is khalid</td>
                 </tr>
                 <tr>
                   <td>5</td>
                   <td>@Ahmed</td>
                   <td>My name is khalid</td>
                 </tr>
                 <tr>
                   <td>6</td>
                   <td>@khalid</td>
                   <td>My name is khalid</td>
                 </tr>
                 <tr>
                   <td>7</td>
                   <td>@khalid</td>
                   <td>My name is khalid</td>
                 </tr>
                 <tr>
                   <td>8</td>
                   <td>@khalid</td>
                   <td>My name is khalid</td>
                 </tr>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Followers</th>
                    <th>Messages</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-body text-right">
                <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch>
              </div>
            </div>
          </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
    <!-- /.content -->
 
 
 
 
<!-- Popup for Add User Start-->
 
 <div class="modal fade" id="add_User" tabindex="-1" role="dialog" aria-labelledby="AddUser" aria-hidden="true">
  <div class="modal-dialog " role="document">
   <div class="modal-body">
 
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Video</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <div class="modal-content">
              <form action="user_curd_operation.php" method="POST">
                <div class="card-body">
				
				<h2> Changes are saved ! </h2>
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="Add_User" class="btn btn-primary">Ok</button>
                </div>
              </form>
			  
			  
			  
			   <!-- Server Side Code Starts -->
   
   <!-- adding users data o database  -->
				
				
				
	
				
				
		  <!-- Server Side Code  Ends -->		
					
			  
			  
			  
			  
			  </div>
            </div>
			</div>
            </div>
			</div>
            <!-- /.card -->
 
 <!-- Popup for Add User Ends-->
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <!-- Popup for Add User Start-->
 
 <div class="modal fade" id="add_User2" tabindex="-1" role="dialog" aria-labelledby="AddUser" aria-hidden="true">
  <div class="modal-dialog " role="document">
   <div class="modal-body">
 
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Time</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <div class="modal-content">
              <form action="" method="POST">
                <div class="card-body">
				
				  <div class="form-group">
                        <label>Hour</label>
                        <input  type="text" name="houre" class="form-control" placeholder="Enter Hour" required>
                   </div>
				   <div class="form-group">
                        <label>Minutes</label>
                        <input type="text" name="minutes" class="form-control" placeholder="Enter Minutes" required>
                   </div>
				     <div class="form-group">
                                                          <label class="checkbox-inline">
      <input type="checkbox" name="time" value="AM">  AM
    </label>
	&nbsp &nbsp &nbsp &nbsp
    <label class="checkbox-inline">
      <input type="checkbox" name="time" value="PM">  PM
    </label>
                      </div>
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update_time" class="btn btn-primary">Done</button>
                </div>
              </form>
			  
			  
			  
			   <!-- Server Side Code Starts -->
   
   <!-- adding users data o database  -->
				
				
				
	
				
				
		  <!-- Server Side Code  Ends -->		
					
			  
			  
			  
			  
			  </div>
            </div>
			</div>
            </div>
			</div>
            <!-- /.card -->
 
 <!-- Popup for Add User Ends-->
 
 
 




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
