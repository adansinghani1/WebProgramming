<?php 
	$host = "localhost"; 
	$user = "adansinghani1"; 
	$pass = "adansinghani1"; 
	$db = "adansinghani1";
	
	$r = mysqli_connect($host, $user, $pass, $db); 
		if (!$r) { 
			echo "Could not connect to server\n"; 
			trigger_error(mysqli_error(), E_USER_ERROR); 
			} 
		else 
				{ 
					echo "<h1> Akash Dansinghani - Codd DB Connection via PHP Test </h1> <br>";
					echo "Connection established :) \n"; 
				  	
				} 
				  
	mysql_close(); 
?>