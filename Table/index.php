<?php
  include('include/db.php');
  session_start();
  
  if(!$_SESSION['id']){
    header('location:../');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
	
	<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {border-radius: 2px;}
.button2 {border-radius: 4px;}
.button3 {border-radius: 8px;}
.button4 {border-radius: 12px;}
.button5 {border-radius: 100%;}
</style>
<!--===============================================================================================-->
</head>
<body>
<?php
  if(isset($_POST['Add_User'])){
    $insta_id=$_POST['insta_id'];
    $username=$_POST['user_name'];
  $password=$_POST['insta_pass'];
    $no_posts=$_POST['no_posts'];
   
    if($_POST['foldername'] != "")
  	{
  		$foldername=$_POST['foldername'];
  		if(!is_dir($foldername))
  			mkdir("images/postsimages/".$foldername);
  		foreach($_FILES['files']['name'] as $i => $name)
		{
  			//if(!is_dir($name))
  			///{
  				//mkdir("../images/postsimages/".$foldername."/".$name);
  				if(strlen($_FILES['files']['name'][$i]) > 1)
  				{
  					move_uploaded_file($_FILES['files']['tmp_name'][$i],"images/postsimages/".$foldername."/".$name);
  				}
  			//}
  			// else
  			// {
  			// 	if(strlen($_FILES['files']['name'][$i]) > 1)
  			// 	{
			// 		move_uploaded_file($_FILES['files']['tmp_name'][$i],$foldername."/".$name);
  			// 	}
  			// }
  		}
    }
    //Image Upload Code
  //   if(isset($_FILES['image'])){
  //     $errors= array();
  //     $file_name = $_FILES['image']['name'];
  //     $file_size =$_FILES['image']['size'];
  //     $file_tmp =$_FILES['image']['tmp_name'];
  //     $file_type=$_FILES['image']['type'];
  //     $tmp      = explode('.',$_FILES['image']['name']);
  //     $file_ext = strtolower(end($tmp));
  //     //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
  //     $imagefolder="images/postsimages/".$file_name;
  //     $extensions= array("jpeg","jpg","png","jfif","webp");
      
  //     if(in_array($file_ext,$extensions)=== false){
  //        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
  //     }
      
  //     if($file_size > 2097152){
  //        $errors[]='File size must be excately 2 MB';
  //     }
      
  //     if(empty($errors)==true){
  //        move_uploaded_file($file_tmp,$imagefolder);
  //        //echo $file_name;

  //        //echo "Success";
  //     }else{
  //        print_r($errors);
  //     }
  //  }

   //comment file upload
   if(isset($_FILES['comment_file'])){
    $errors= array();
    $file_name = $_FILES['comment_file']['name'];
    $file_size =$_FILES['comment_file']['size'];
    $file_tmp =$_FILES['comment_file']['tmp_name'];
    $file_type=$_FILES['comment_file']['type'];
    $tmp      = explode('.',$_FILES['comment_file']['name']);
    $file_ext = strtolower(end($tmp));
    //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    $commentfolder="commentsFile/".$file_name;
    //echo $folder;
    $extensions= array("csv","txt","pdf");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,$commentfolder);
       //echo $file_name;

      // echo "Success";
    }else{
       print_r($errors);
    }
 }

 //Post Text File Upload
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
  $extensions= array("csv","txt","pdf");
  
  if(in_array($file_ext,$extensions)=== false){
     $errors[]="extension not allowed, please choose a csv or pdf file.";
  }
  
  if($file_size > 2097152){
     $errors[]='File size must be excately 2 MB';
  }
  
  if(empty($errors)==true){
     move_uploaded_file($file_tmp,$postfolder);
     //echo $file_name;

     //echo "Success";
  }else{
     print_r($errors);
  }
}

  //HashTag File Upload
  if(isset($_FILES['csv_file'])){
    $errors= array();
    $file_name = $_FILES['csv_file']['name'];
    $file_size =$_FILES['csv_file']['size'];
    $file_tmp =$_FILES['csv_file']['tmp_name'];
    $file_type=$_FILES['csv_file']['type'];
    $tmp      = explode('.',$_FILES['csv_file']['name']);
    $file_ext = strtolower(end($tmp));
    //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    $hashtagfolder="HashTagFileUpload/".$file_name;
    //echo $folder;
    $extensions= array("csv","txt","pdf");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,$hashtagfolder);
       //echo $file_name;
  
       //echo "Success";
    }else{
       print_r($errors);
    }
  }
  date_default_timezone_set('Asia/karachi');
  $dateS = date('m/d/Y h:i:s', time());
$query=mysqli_query($con,"insert into users values (null,'$insta_id','$password','$username','$foldername','$postfolder','$hashtagfolder','$commentfolder','$no_posts',0)");
if($query){
 echo "<script>alert('Success')</script>";
}else{
 echo "<script>alert('Fail')</script>";
}

  }
?>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
			<button type="button" class="btn button4 btn-success float-left"  data-toggle="modal" data-target="#add_User">Add User</button>
      <a href="logout.php"><button type="button" class="btn btn-warning button5 float-right" border-raduis="20px"><img src="logout.png" width="36px" height="36px"></button></a>
					
					
					
					
					<!-- Popup for Add User Start-->
 
 <div class="modal fade" id="add_User" tabindex="-1" role="dialog" aria-labelledby="AddUser" aria-hidden="true">
  <div class="modal-dialog " role="document">
   <div class="modal-body">
 
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <div class="modal-content">
              <form  method="POST" action="" enctype="multipart/form-data">
                <div class="card-body">
				
				  <div class="form-group">
                      
                        <input  type="text" name="insta_id" class="form-control" placeholder="Enter Instagram ID" required>
                   </div>
                   <div class="form-group">
                      
                        <input  type="password" name="insta_pass" class="form-control" placeholder="Enter Instagram password" required>
                   </div>
				   <div class="form-group">
                      
                        <input type="text" name="user_name" class="form-control" placeholder="Enter User Name" required>
                   </div>
				  
				  
				   
                   <div class="form-group">
                      
                        <input type="text" name="no_posts" class="form-control" placeholder="Enter Number of Post Numbers only" required>
                   </div>
                   <div class="form-group">
                      <input type="text" name="foldername" class="form-control" placeholder="Enter Folder Name For Images" required>
                    </div>

                    <div class="form-group">
               		  <label for="myfile">Select a post pictures folder:</label>
  <input type="file" id="myfile"  name="files[]" id="files" multiple directory="" webkitdirectory="" moxdirectory="">  
                   </div>

                   <div class="form-group">
               		  <label for="myfile">Select a comment file:</label>
  <input type="file" id="myfile" name="comment_file">  
                   </div>

		
                  
				     


				   
				      <div class="form-group">
               		  <label for="myfile">Select a post text csv:</label>
  <input type="file" id="myfile" name="desc_file">  
                   </div>

				      <div class="form-group">
               		  <label for="myfile">Select a hashtags csv:</label>
  <input type="file" id="myfile" name="csv_file">  
                   </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Add_User" class="btn btn-primary">Add</button>
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
 
				
					
					
					
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">No.</th>
								<th class="column2">Insta ID</th>
								<th class="column3">Name</th>
                <th class="column3">No. Of Posts</th>
								
								<th class="column6">Manage</th>
								
							</tr>
						</thead>
						<tbody>
					<?php
                   
                 
                     $query=mysqli_query($con,"select * from users");
                     if($query){
                       while($row=mysqli_fetch_array($query)){
                         
                         ?>
                         <tr>
                            <td class="column1"><?php echo $row['user_id'];?></td>
                            <td class="column2"><?php echo $row['insta_id'];?></td>
                            <td class="column3"><?php echo $row['user_name'];?></td>
                            <td class="column3"><?php echo $row['no_post'];?></td>
                            
                            <td class="column6"><a href="biometric/dashboard.php?id=<?php echo $row['user_id']?>&name=<?php echo $row['user_name']?> " class="btn btn-primary ">Manage</a> </td>
                         </tr>
                         <?php
                       }
                     }
                    
                    
				   ?>	
								
								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>