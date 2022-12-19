<?php
 include('../include/db.php');
 session_start();
 if(!$_SESSION['id']){
  header('location:../');
}

 $id=$_GET['post_id'];
 $name=$_GET['name'];
 $userid=$_GET['userid'];

?>
<?php
 
 if(isset($_POST['update_time'])){
   $houre=$_POST['houre'];
   $minutes=$_POST['minutes'];
   if(!empty($_POST['time'])) {
     $time=$_POST['time'];
     }

     
    
   
     $query=mysqli_query($con,"update posts set posting_time='$houre' where post_id='$id'");
     if($query){

         header('location:dashboard.php?name='.$name.'&&id='.$userid);
     }
 
 }
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
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
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
                        <label>Enter Time</label>
                        <input  type="text" placeholder="mm/dd/yyy 00:00:00" name="houre" class="form-control" required>
                   </div>
				   
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
            </div>
        </div>
    </div>


</body>
</html>

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