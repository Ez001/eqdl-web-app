<?php
	#   Author of the script
	#   Name: Ezra Adamu
	#   Email: ezra00100@gmail.com
	#   Date created: 28/05/2023 
	#   Date modified: 06/10/2023

	const ENVIRONMENT = 'Test';//Test Live

	//DB Config
	const HOST = 'localhost';
	const USER = 'root';
	const PWORD = '';
	const DB = 'eqdls_db';

	$website_title = 'Essay Question DL System';

	const APP_SESS = 'uh_admin_id';
	const APP_SESS_TIME = 3500;
	
	//url
   $server_name = ENVIRONMENT == 'Test' ? 'http://' : 'https://';
   $server_name .= $_SERVER['SERVER_NAME'];
   $uri = $_SERVER['REQUEST_URI'];
   $app_url = ( strlen( $uri ) > 1 ) ? "$server_name$uri" : "$server_name";

   //directory
   $root_dir = dirname( __DIR__ );
   $cur_dir = dirname( __FILE__ );
	//echo getcwd();

	/*$upload_dir = "$cur_dir/uploads";
	$upload_url = "$server_name/uploads";*/

	$test_email = 'ezra00100@gmail.com';
	$msg = '';
	$clear = false;

	$js_modules = [];
?> 