<?php

function DB_CONNECT(){
		
		
		$connection = mysqli_connect('localhost', 'root', '', 'chat_bot');
		
		if(!$connection){
			
			die('Database connection failed.');
		}
		
		
		return $connection;
		
	}


?>