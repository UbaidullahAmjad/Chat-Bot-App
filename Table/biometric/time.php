<?php

include("../include/db.php");
$times=array();
$query=mysqli_query($con,"select posting_time from posts");

if($query){
  
    while($row=mysqli_fetch_array($query)){
        $time=$row['posting_time'];

        array_push($times,$time);
    }
}
$size=sizeof($times);
date_default_timezone_set('Asia/karachi');
$dateS = date('m/d/Y h:i', time());

$posts=array();

    $sel=mysqli_query($con,"select * from posts as p inner join users as u on p.user_id=u.user_id where p.posting_time='$dateS' ");
    if($sel){
       
        while($rs=mysqli_fetch_array($sel)){
            $array=array(
                "id"=>$rs['insta_id'],
                "password"=>$rs['password'],
                "pic"=>$rs['picture'],
                'desc'=>$rs['desc_post'],
                'tag'=>$rs['hash_tags']
            );
            array_push($posts,$array);
            
        }
    }

$s=json_encode($posts);

echo $s;
$output=exec("D:\\python\\instabot\\Post.py");





?>