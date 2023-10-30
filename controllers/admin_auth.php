<?php 
 	#   Author of the script
	#   Name: Ezra Adamu
	#   Email: ezra00100@gmail.com
	#   Date created: 06/10/2023 
	#   Date modified: 06/10/2023  

	include_once( 'models/Admin.php' );

	//Creating instances
	$admin = new Admin();  
	$admin_id = $admin->getLoggedAdmin();

	//when not logged in
	if ( !$admin_id ) 
	{
		header( "Location: ./", true, 301 );
		exit();
	}

	$is_admin = true; //testing puroose
?>