<?php
	#   Author of the script
	#   Name: Ezra Adamu
	#   Email: ezra00100@gmail.com
	#   Date created: 09/10/2023 
	#   Date modified: 01/11/2023   

	include_once( 'App.php' );

	class Question 
	{
		//using Namespaces
		use App {
      	App::__construct as private __appConst;
    	}

		protected $table = '';
		const DB_TABLE = 'questions';

		function __construct()
	 	{
	 		$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 	}

		function getTotal( array $dt )
	   {
			$sql = "SELECT COUNT( id ) AS total FROM $this->table";
			$res = $this->fetchData( $sql, $dt );
			
			return $res[ 'total' ] ?? 0;
	   }
		
		function getById( array $dt )
	   {
			$sql = "SELECT * FROM $this->table WHERE id = ?";
			$res = $this->fetchData( $sql, $dt );
			
			return $res ?? [];
	   }

		function getByCourseCode( array $dt )
	   {
			$sql = "SELECT * FROM $this->table WHERE cs_code = ? GROUP BY topic ORDER BY topic";
			$res = $this->fetchAllData( $sql, $dt );
			
			return $res ?? [];
	   }

		function getCountByCourseCodeAndTopic( array $dt )
	   {
			$sql = "SELECT COUNT( id ) AS total FROM $this->table WHERE cs_code = ? AND topic = ?";
			$res = $this->fetchData( $sql, $dt );
			
			return $res[ 'total' ] ?? 0;
	   }

		function fisherYatesShuffle( $array ) 
		{
			$count = count( $array );

			for ( $i = $count - 1; $i > 0; $i-- ) 
			{
				// Generate a random index between 0 and $i
				$j = mt_rand( 0, $i );
				
				if ( $i != $j ) 
				{
					// Swap the elements at indices $i and $j
					$temp = $array[ $i ];
					$array[ $i ] = $array[ $j ];
					$array[ $j ] = $temp;
				}
			}

			return $array;
		}

		function getByCourseCodeAndTopic( array $dt )
	   {
			$sql = "SELECT id FROM $this->table WHERE cs_code = ? AND topic = ?";
			$res = $this->fetchAllData( $sql, $dt );
			
			return $res ?? [];
	   }
		
		function getByIds( array $dt, $ids = '' )
	   {
			$sql = "SELECT * FROM $this->table WHERE id IN( $ids )";
			$res = $this->fetchAllData( $sql, $dt );
			
			return $res ?? [];
	   }

	}
?>