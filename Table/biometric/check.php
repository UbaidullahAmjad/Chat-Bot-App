<?php 
 include('../include/db.php');
 session_start();
 if(!$_SESSION['id']){
   header('location:../../');
 }

$id=$_GET['uid'];
$tid=$_GET['tid'];

    $update=mysqli_query($con,"update hashtags set active=1 where id='$tid'");
    header('location:like.php?id='.$id.'');
 


// $query=mysqli_query($con,"select * from likesdislikes where user_id='$userid' and video_id='$vidID' and likes=1");
//        if($query){
//          $count=mysqli_num_rows($query);
//          if($count>0){
//          echo '<script>alert("Already Liked");
//          window.location="most_viewed.php";</script>';
//        }
//          else{
           
//            $query=mysqli_query($con,"insert into likesdislikes values (null,$userid,$vidID,1)");
//            if($query){
//              header('location:most_viewed.php');
//            }
//            }
//          }


?>