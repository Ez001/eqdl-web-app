<?php 
	#   Author of the script
	#   Name: Ezra Adamu
	#   Email: ezra00100@gmail.com
	#   Date created: 01/11/2023
	#   Date modified: 03/11/2023 

	//auth
	include_once( 'admin_auth.php' );
	include_once( 'models/Question.php' );
	include_once( 'models/Course.php' );

	$quest = new Question();
	$course = new Course();

	$total_quest = $quest->getTotal( [] );

	$js_modules = [ 'question' ];
	$quest_arr_print_full = [];
	$main_cs_code = '';

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

			if ( !$main_cs_code )
			{
				$main_cs_code = $cs_code;
			}

			//get questions id data by cs code and title
			$qt_ids_arr = [];
			$quest_arr_2 = $quest->getByCourseCodeAndTopic( [ $cs_code, $topic ] );

			//looping through to get build new array of ids
			foreach ( $quest_arr_2 as $quest_dt_2 ) 
			{
				$qt_ids_arr[] = $quest_dt_2[ 'id' ];
			}
			
			//use algo
			$qt_ids_arr = $quest->fisherYatesShuffle( $qt_ids_arr );

			//fetch questions by ids 
			$qt_ids_arr = array_slice( $qt_ids_arr, 0, $topic_ct );
			$qt_ids_arr = array_values( $qt_ids_arr );
			$ids_str = implode( ',', $qt_ids_arr );
			$quest_arr_3 = $quest->getByIds( [], $ids_str );

			//looping through to get build new array of ids
			foreach ( $quest_arr_3 as $quest_dt_3 ) 
			{
				$quest_arr_print_full[] = $quest_dt_3;
			}
		}
	}
	else
	{
		header( 'Location: ./questions', true, 301 );
		exit();
	}
	
	$sel_qt_output = '';
	
	foreach ( $quest_arr_print_full as $quest_dt ) 
	{
		//use algo on question patterns
		$qt_patt_arr = range( 1, 3 );//for questions patterns
		$qt_patt_arr = $quest->fisherYatesShuffle( $qt_patt_arr ); 
		$qt_sel = $quest_dt[ 'pattern_' . $qt_patt_arr[0] ];

		$sel_qt_output .= $qt_sel ? "<li>$qt_sel</li>" : '';
	}
	
	$course_arr = $course->getByCourseCode( [ $main_cs_code ] );

	//Download interface
	include_once( 'views/download.php' );
	
   $template = ob_get_clean();

   //include dompdf library
   require_once( 'dompdf/autoload.inc.php' );

   use Dompdf\Dompdf;
   //using  pdf dompdf class
   $dompdf = new Dompdf( [ 'chroot' => $cur_dir ] );
   
   $dompdf->set_option( 'isHtml5ParserEnabled', true );
   $dompdf->loadHtml( $template );

   ob_end_clean();
   //set paper size
   //$dompdf->setPaper('A4','Landscape');
   $dompdf->setPaper( 'A4', 'Portrait' );
    
   //render Html to pdf
   $dompdf->render();

   //display to browser
   $dompdf->stream( $course_arr[ 'title' ] . '-' . $course_arr[ 'cs_code' ] . time(),   [ 'Attachment' => false ] );
?>