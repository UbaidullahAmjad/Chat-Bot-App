<?php
include("../include/db.php");
$id=mysqli_query($con,"select * from random");
if($id){
    $ros=mysqli_fetch_array($id);
    $id=$ros['id'];
}


$query=mysqli_query($con,"select * from hashtags where active=1 and user_id=$id");
$login=array();
if($query){
  while($row=mysqli_fetch_array($query)){

  $arr=array(
    "tag"=>$row['tags']
  );
  array_push($login,$arr);

}

$b=json_encode($login);

  echo $b;
}

?>