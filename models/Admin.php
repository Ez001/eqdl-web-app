<?php
	#   Author of the script
	#   Name: Ezra Adamu
	#   Email: ezra00100@gmail.com
	#   Date created: 06/10/2023 
	#   Date modified: 06/10/2023   

	include_once( 'App.php' );
	include_once( 'Encryption.php' );

	class Admin 
	{
		//using Namespaces
		use App {
      	App::__construct as private __appConst;
    	}

    	use Encryption;

		protected $table = '';
		const DB_TABLE = 'admins';

		function __construct()
	 	{
	 		$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 	}

		function getLoggedAdmin()
		{
			return $_COOKIE[ APP_SESS ] ?? 0;
		}

		function getLogin( array $dt ) 
		{
			$sql = "SELECT * FROM $this->table WHERE uname = ?";
			$res = $this->fetchData( $sql, $dt );

			return $res ?? [];
		}

		function getById( array $dt )
	   {
			$sql = "SELECT * FROM $this->table WHERE id = ?";
			$res = $this->fetchData( $sql, $dt );
			
			return $res ?? [];
	   }

	}

?>