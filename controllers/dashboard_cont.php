<?php 
	#   Author of the script
	#   Name: Ezra Adamu
	#   Email: ezra00100@gmail.com
	#   Date created: 06/10/2023
   #   Date modified: 09/10/2023 

	//auth
	include_once( 'admin_auth.php' );
	include_once( 'models/Question.php' );

	$quest = new Question();

	$total_quest = $quest->getTotal( [] );
	
	//Dashboard interface
	include_once( 'views/dashboard.php' );
 ?>