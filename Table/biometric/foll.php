<?php
  include('../include/db.php');
  $id=$_GET['id'];
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
    if($b){
        $ouput=exec("D:\\python\\instabot\\Followers.py");
    }
}
  ?>