<?php 
	#   Author of the script
	#   Name: Ezra Adamu
	#   Email: ezra00100@gmail.com
	#   Date created: 01/11/2023
	#   Date modified: 01/11/2023 

	//auth
	include_once( 'admin_auth.php' );
	include_once( 'models/Question.php' );
	include_once( 'models/Course.php' );

	$quest = new Question();
	$course = new Course();

	$total_quest = $quest->getTotal( [] );
	$course_arr = $course->getAll( [] );

	$js_modules = [ 'question' ];

	if ( isset( $_SESSION[ 'cs_ids_arr' ] ) )
	{
		$cs_ids_arr = $_SESSION[ 'cs_ids_arr' ];

		foreach ( $cs_ids_arr as $cs_ids_dt )
		{
			//get question data by id
			$id = $cs_ids_dt[ 'id' ];
			$topic_ct = $cs_ids_dt[ 'topic_ct' ];
			$quest_arr = $quest->getById( [ $id ] );
			$cs_code = $quest_arr[ 'cs_code' ];
			$topic = $quest_arr[ 'topic' ];

			//echo 'Testing Algo</br></br>';
			/* $array = range( 1, 20 );
			$array = $quest->fisherYatesShuffle( $array ); */
			//print_r( $array );
			print_r( $quest_arr );
			exit();

			//get questions id data by cs code and title

			//use algo

			
			//fetch questions by ids 

			//use algo on question patterns

			//print

			//$_SESSION[ 'cs_ids_arr' ]
		}
	}
	else
	{
		header( 'Location: ./questions', true, 301 );
		exit();
	}


	//Download interface
	include_once( 'views/download.php' );
?>