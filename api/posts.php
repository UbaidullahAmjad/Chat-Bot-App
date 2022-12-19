<?php
include("../include/db.php");
$id=mysqli_query($con,"select * from random");
if($id){
    $ros=mysqli_fetch_array($id);
    $id=$ros['id'];
}

$posts=array();
$query=mysqli_query($con,"select * from posts where active=1 and user_id='$id'");
if($query){
    while($row=mysqli_fetch_array($query)){
        $array=array(
            'image'=>$row['picture'],
            'description'=>$row['desc_post'],
            'tag'=>$row['hash_tags']
        );
        array_push($posts,$array);
    }

   $json=json_encode($posts);

   echo $json;
}


?>