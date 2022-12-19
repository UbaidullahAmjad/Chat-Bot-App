<?php


$ouput=exec("D:\\python\\instabot\\Followers.py");
                    $abc=json_decode($ouput);
                    print_r($abc);


?>