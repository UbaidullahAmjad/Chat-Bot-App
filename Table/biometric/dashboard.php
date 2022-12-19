<?php
  include('../include/db.php');
  session_start();
  if(!$_SESSION['id']){
    header('location:../');
  }

  $id=$_GET['id'];
  if($id){
    $del=mysqli_query($con,"delete from random ");
    if($del){
      $ins=mysqli_query($con,"insert into random values($id)");
    }
  }

 $namess=mysqli_query($con,"select * from users where user_id='$id'");
 $names=mysqli_fetch_array($namess);
$name=$names['user_name'];
  

  if($_GET['id']){
    $query=mysqli_query($con,"select * from users where user_id='$id'");
    if($query){
      $row=mysqli_fetch_array($query);
      $foldername=$row['pic_folder'];
      $loops=$row['loops'];
      $postfile=$row['desc_file'];
      $tagfile=$row['tags_file'];
      $posts=$row['no_post'];
  
    }
   
  if($loops==0){
echo '<br>';
    $file = "../".$postfile;
    $handle = fopen($file, "r");
    $read=fread($handle,filesize("../".$postfile));
    $pr=explode("$",$read);
    shuffle($pr);
    
                    
                    $filelist=glob('../images/postsimages/'.$foldername.'/*');
                    shuffle($filelist);
                    echo '<br>';
                    //print_r($pr);
                    $file = "../".$tagfile;
                   $handle = fopen($file, "r");
                     $read=fread($handle,filesize("../".$tagfile));
                     $print=explode("$",$read);
                     $x=sizeof($print);
                 shuffle($print);
                
                 
                     //print_r($print);
                     date_default_timezone_set('Asia/karachi');
                     $dateS = date('m/d/Y h:i', time());
                   
        for($i=0 ; $i<$posts; $i++){
           $queryloop=mysqli_query($con,"insert into posts values (null,'$id','$filelist[$i]','$pr[$i]','$print[$i]','$dateS',0)");
          
        }
        if($queryloop){
          $setquery=mysqli_query($con,"update users set loops=1 where user_id='$id'");
        }

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
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                POST
                
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="like.php?id=<?php echo $id ?>" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
              <p>
                LIKE ROUTINE
                
              </p>
            </a>
          </li>
		  
		    <li class="nav-item">
            <a href="comments.php?id=<?php echo $id ?>" class="nav-link">
             <i class="nav-icon fas fa-users"></i>
              <p>
                COMMENT ROUTINE
                
              </p>
            </a>
          </li>
		  
		  
		    <li class="nav-item">
            <a href="messages.php?id=<?php echo $id ?>" class="nav-link">
           <i class="nav-icon fas fa-users"></i>
              <p>
                DM FOR NEW FOLLOWER
                
              </p>
            </a>
          </li>
		  
		    <li class="nav-item">
            <a href="followers.php?id=<?php echo $id ?>" class="nav-link">
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
  
  <?php
                    $sql=mysqli_query($con,"select pic_folder from users where user_id='$id'");
                      if($sql){
                        $row=mysqli_fetch_array($sql);
                        $picfolder=$row['pic_folder'];
                        
                      }
                    
                    ?>

  <?php
                if(isset($_POST['save'])){
                    $newposts=$_POST['noOfPosts'];
                    
                  

                  $imagesfolder="../images/postsimages/".$picfolder;
                  $images = glob($imagesfolder . '/*');
                  //Loop through the file list.
                  foreach($images as $file){
                      //Make sure that this is a file and not a directory.
                      if(is_file($file)){
                          //Use the unlink function to delete the file.
                          unlink($file);
                      }
                  }
                 
                    foreach($_FILES['files']['name'] as $i => $name)
                  {
                      
                        if(strlen($_FILES['files']['name'][$i]) > 1)
                        {
                          move_uploaded_file($_FILES['files']['tmp_name'][$i],"../images/postsimages/".$picfolder."/".$name);
                        }
                     
                    }
                  
               
                  if(isset($_FILES['hash_tag'])){
                    $errors= array();
                    $file_name = $_FILES['hash_tag']['name'];
                    $file_size =$_FILES['hash_tag']['size'];
                    $file_tmp =$_FILES['hash_tag']['tmp_name'];
                    $file_type=$_FILES['hash_tag']['type'];
                    $tmp      = explode('.',$_FILES['hash_tag']['name']);
                    $file_ext = strtolower(end($tmp));
                    //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
                    $commentfolder="HashTagFileUpload/".$file_name;
                   
                    $extensions= array("csv","pdf","txt");
                    
                    if(in_array($file_ext,$extensions)=== false){
                       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                    }
                    
                    if($file_size > 2097152){
                       $errors[]='File size must be excately 2 MB';
                    }
                    
                    if(empty($errors)==true){
                       move_uploaded_file($file_tmp,"../".$commentfolder);
                       
                
                      // echo "Success";
                    }else{
                       print_r($errors);
                    }
                 }
                
                

                
                 if(isset($_FILES['desc_file'])){
                  $errors= array();
                  $file_name = $_FILES['desc_file']['name'];
                  $file_size =$_FILES['desc_file']['size'];
                  $file_tmp =$_FILES['desc_file']['tmp_name'];
                  $file_type=$_FILES['desc_file']['type'];
                  $tmp      = explode('.',$_FILES['desc_file']['name']);
                  $file_ext = strtolower(end($tmp));
                  //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
                  $postfolder="PostTextFile/".$file_name;
                  //echo $folder;
                  $extensions= array("csv","pdf","txt");
                  
                  if(in_array($file_ext,$extensions)=== false){
                     $errors[]="extension not allowed, please choose a csv or pdf file.";
                  }
                  
                  if($file_size > 2097152){
                     $errors[]='File size must be excately 2 MB';
                  }
                  
                  if(empty($errors)==true){
                     move_uploaded_file($file_tmp,"../".$postfolder);
                     echo $file_name;
                
                     //echo "Success";
                  }else{
                     print_r($errors);
                  }
                }
                
                $checkquery=mysqli_query($con,"select * from users where user_id='$id'");{
                  if($checkquery){
                    $row=mysqli_fetch_array($checkquery);
                    $folder=$row['pic_folder'];
                    $comment=$row['comment_file'];
                    $text=$row['desc_file'];
                    $tags=$row['tags_file'];
                  }
                }
                 if(!empty($postfolder) && !empty($commentfolder)){
                  $post=$postfolder;
                  $tag=$commentfolder;
                  
                }else{
                  $post=$text;
                  $tag=$tags;
                  
                }


                $updateSql=mysqli_query($con,"update users set no_post='$newposts',desc_file='$post', tags_file='$tag'  where user_id='$id'");
                if(!$updateSql){
                  echo "<script>alert('not update')</script>";
                }else{
                  $insertquery=mysqli_query($con,"select * from users where user_id='$id'");
                  if($insertquery){
                    $row=mysqli_fetch_array($insertquery);
                    $posts=$row['no_post'];
                    $folder=$row['pic_folder'];
                    $comment=$row['comment_file'];
                    $text=$row['desc_file'];
                    $tags=$row['tags_file'];



                    $filelist=glob('../images/postsimages/'.$folder.'/*');

                    $file = "../".$text;
                    $handle = fopen($file, "r");
                    $read=fread($handle,filesize("../".$text));
                    $pr=explode("$",$read);
                    shuffle($pr);
                    //print_r($pr);
                    $file = "../".$tags;
                    $handle = fopen($file, "r");
                    $read=fread($handle,filesize("../".$tags));
                    $print=explode("$",$read);
                    $x=sizeof($print);
                    shuffle($print);
                    
                    //print_r($print);
                    date_default_timezone_set('Asia/karachi');
                    $dateS = date('m/d/Y h:i:s', time());

                    $delete=mysqli_query($con,"delete from posts where user_id='$id'");

    for($i=0 ; $i<$newposts; $i++){
      $queryloop=mysqli_query($con,"insert into posts values (null,'$id','$filelist[$i]','$pr[$i]','$print[$i]','$dateS',0)");
      echo "yes";
    }
        if($queryloop){
    echo '<script>alert("posts added");
  
    </script>';}
                  }
                }
                
                }

                

                
              ?>

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
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            </ol>
          </div>
          <br>
          <br>
          <div class="col-sm-6">
            
              <h3>Active this Function</h3>
           <form action="" method="POST">
                <input type="submit" name="posts" class="btn btn-primary">
           </form>
        <?php 
          if(isset($_POST['posts'])){
          $output=exec("D:\\python\\instabot\\Post.py");
          
            
          }
        ?>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
               
                  Users
                </h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">


             <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      
                      <th style="width: 10px">#</th>
                      <th>Active</th>
                      <th>Picture</th>
                      <th>Text</th>
					  <th>Hashtags</th>
					  <th>Time</th>
					
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $serailNo=1;
                    $query=mysqli_query($con,"select * from posts where user_id='$id'");
                    if($query){
                      while($row=mysqli_fetch_array($query)){
                        $active=$row['active'];
                            ?>
<tr>
				
        <td><?php echo $serailNo; ?></td>
        <?php
        if($active==1){
                            ?>
                              <td style="text-align:center;"> <input type="checkbox" id="puncheck"  name="activate" value="1" onclick="location.href='postdisactive.php?id=<?php echo $id?>&pid=<?php echo $row['post_id']?>';"  checked /></td>

                            <?php
                          }else{
                            ?>
                             <td style="text-align:center;"><input type="checkbox" id="pcheck" name="activate" value="1" onclick="location.href='postactive.php?id=<?php echo $id?>& pid=<?php echo $row['post_id'] ?>';" /> </td>

                            <?php
                          }
                          ?>
        <td><img src="<?php echo $row['picture']; ?>" width="75px" height="75px"></td>
                  <td><?php echo $row['desc_post'];?></td>
        <td><?php echo $row['hash_tags'];?></td>
        <td><?php echo $row['posting_time'];?>  &nbsp &nbsp &nbsp<a href="settime.php?post_id=<?php echo $row['post_id'] ?>&& name=<?php echo  $name ?>&& userid=<?php echo $id ?>" class="btn"><span class="badge bg-info">Change</span></a></button>  </td>
    
                  
                  <td><a href="view_post.php?id=<?php echo $row['post_id'];?>"><span class="badge bg-warning"><i class="fas fa-eye"></i></span></a>        &nbsp|&nbsp 
            <a href="user_curd_operation.php?del=<?php echo $users['user_id']; ?>" ><span class="badge bg-danger"><i class="fas fa-trash-alt"></span></i></a>
        </td>
                </tr>
                            <?php
                            $serailNo++;
                      }
                    }
                  ?>
                    

					       <tr>
					
					  
                  </tbody>
                </table>



              </div>
              
              <!-- /.card-body -->
              <form  method="POST" enctype="multipart/form-data">
              <div class="card-footer clearfix">
			 <div class="row"><div class="mb-2"><label> No. of Post:</label></div> <div class="col-2"><input type="text" name="noOfPosts" class="form-control "  required></div> 
			 <div class="col-2"><label for="myfile">Select a post pictures:</label>
  <input type="file" id="myfile" name="files[]" id="files" multiple directory="" webkitdirectory="" moxdirectory="">  </div>
			 <div class="col-2"><label for="myfile">Select a post text csv:</label>
  <input type="file" id="myfile" name="desc_file">  </div>
			 <div class="col-2"><label for="myfile">Select a hashtags csv:</label>
  <input type="file" id="myfile" name="hash_tag">  </div>
			 </div>
                <button type="submit" name="save" class="btn btn-success float-right"  > Save Changes</button>
              </div>
            </div>
</form>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
<?php
 //$output=exec("D:\\python\\instabot\\Post.py");

?>