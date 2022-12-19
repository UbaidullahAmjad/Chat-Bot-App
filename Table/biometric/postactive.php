<?php
  include('../include/db.php');

  $id=$_GET['id'];
  $pid=$_GET['pid'];
  $query=mysqli_query($con,"update posts set active=1 where user_id='$id' and post_id='$pid' ");
  if($query){
    
    header('location:dashboard.php?id='.$id.'');
  }


?>
