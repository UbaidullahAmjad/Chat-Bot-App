<?php
include("../include/db.php");
$id=mysqli_query($con,"select * from random");
if($id){
    $ros=mysqli_fetch_array($id);
    $id=$ros['id'];
}


$query=mysqli_query($con,"select * from users where user_id=$id");
$login=array();
if($query){
  $row=mysqli_fetch_array($query);

  $arr=array(
    'email'=>$row['insta_id'],
    'password'=>$row['password'],


  );
  array_push($login,$arr);

  $b=json_encode($login);

  echo $b;
}


?>