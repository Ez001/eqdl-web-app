<?php 
	#   Author of the script
	#   Name: Ezra Adamu
	#   Email: ezra00100@gmail.com
	#   Date created: 06/10/2023 
	#   Date modified: 06/10/2023  

	include_once( 'models/Admin.php' );
	
	//Creating instances
	$admin = new Admin(); 

	if ( isset( $_POST[ 'log_btn' ] ) ) 
	{
		// Getting user values
		$uname = $_POST[ 'uname' ];
		$pword = $_POST[ 'pword' ]; 

		//Validating inputs
		if ( $uname && $pword ) 
		{
			$dt_01 = [ $uname ];
			$admin_dt = $admin->getLogin( $dt_01 );
			$pwordx = $admin_dt[ 'pword' ] ?? '';
			
			//Match user password
			$match_pword = $admin->decPword( $pword, $pwordx );

			if ( $match_pword ) 
			{  
				$id = $admin_dt[ 'id' ];
				//set session and cookie
				$time_out = time() + APP_SESS_TIME;
				$_SESSION[ APP_SESS ] = $id;
				setcookie( APP_SESS, $id, $time_out );

				//redirect
				header( 'Location: ./dashboard', true, 301 );
				exit();
			} 
			else 
			{
				$msg = $web_app->showAlertMsg( 'danger', 'Sorry, Admin Does Not Exist!' ); 
			}
		}
		else 
		{  
			$msg = $web_app->showAlertMsg( 'info', 'Please, Enter Username And Password.' ); 	
		}
	}

	//login interface
	include_once( 'views/login.php' );
?>