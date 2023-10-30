<?php 
	#   Author of the script
	#   Name: Ezra Adamu
	#   Email: ezra00100@gmail.com
	#   Date created: 06/10/2023 
	#   Date modified: 06/10/2023 

	//clearing all 
	$_SESSION = [];
	$_COOKIE = [];
	
	session_destroy(); 
	setcookie( APP_SESS, '', time() - APP_SESS_TIME );
	
	header( 'Location: ./login', true, 301 );
   exit();
?>