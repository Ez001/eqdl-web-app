<?php
	#   Author of the script
	#   Name: Ezra Adamu
	#   Email: ezra00100@gmail.com
	#   Date created: 11/10/2023  
	#   Date modified: 03/11/2023   

	include_once( 'App.php' );

	class Course 
	{
		//using Namespaces
		use App {
      	App::__construct as private __appConst;
    	}

		protected $table = '';
		const DB_TABLE = 'courses';

		function __construct()
	 	{
	 		$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 	} 

		function getAll( array $dt )
	   {
			$sql = "SELECT * FROM $this->table";
			$res = $this->fetchAllData( $sql, $dt );
			
			return $res ?? [];
	   }

		function getByCourseCode( array $dt )
	   {
			$sql = "SELECT * FROM $this->table WHERE cs_code = ?";
			$res = $this->fetchData( $sql, $dt );
			
			return $res ?? [];
	   }
	}
?>