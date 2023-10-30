<?php 
	#   Author of the script
	#   Name: Ezra Adamu
	#   Email: ezra00100@gmail.com
	#   Date created: 10/10/2023
   #   Date modified: 22/10/2023 

	//auth
	include_once( 'admin_auth.php' );
	include_once( 'models/Question.php' );
	include_once( 'models/Course.php' );

	$quest = new Question();
	$course = new Course();

	$total_quest = $quest->getTotal( [] );
	$course_arr = $course->getAll( [] );

	$js_modules = [ 'question' ];

	if ( isset( $_POST[ 'get_course_topics' ] ) ) 
   {
	  ob_clean();

		$course_arr = $quest->getByCourseCode( [ $_POST[ 'cs_code' ] ] );
		$course_arr_count = count( $course_arr );
	  $course_topics = '';
		
		//looping through
		foreach ( $course_arr as $cs_dt )
		{
			$id = $cs_dt[ 'id' ];
			$topic = $cs_dt[ 'topic' ];
			$cs_code = $cs_dt[ 'cs_code' ];

			$cs_count = $quest->getCountByCourseCodeAndTopic( [ $cs_code, $topic ] );

			$course_topics .= '<li class="list-group-item d-flex align-items-center">
									<h6 class="w-75 ms-1">' . $topic . '</h6>
									<span class="badge bg-primary rounded-pill ms-1">' . $cs_count . '</span>
									<input type="number" name="no_of_qt" class="form-control w-25 ms-1 align-items-right no_of_qt" data-id="' . $id . '">
								</li>';
		}

		$course_topics .= $course_topics ? 
							'<div class="text-center mt-3">
								<button class="btn btn-success" id="gen_question_btn"
								> Generate</button>
							</div>' : '';

	  $msg = $course_topics ? $web_app->showAlertMsg( 'success', "$course_arr_count Topic(s) Found!" ) : $web_app->showAlertMsg( 'danger', "$course_arr_count Topic(s) Not Found!" );
	  echo json_encode( [ 'msg' => $msg, 'course_topics' => $course_topics ] );

	  ob_end_flush();
	  exit();
   }
	else if ( isset( $_POST[ 'gen_questions' ] ) ) 
   {
	  ob_clean();

		$_SESSION[ 'cs_ids_arr' ] = $_POST[ 'cs_ids_arr' ] ?? [];
		$status = count( $_SESSION[ 'cs_ids_arr' ] ) > 0 ?  true : false;
		echo $status;
		
	  ob_end_flush();
	  exit();
   }
	else if ( isset( $_SESSION[ 'cs_ids_arr' ] ) )
	{
		foreach ($variable as $key => $value) {
			//get question data by id


			//get questions id data by cs code and title

			//use algo

			
			//fetch questions by ids 

			//use algo on question patterns

			//print

			//$_SESSION[ 'cs_ids_arr' ]
		}
	}
	//Questions interface
	include_once( 'views/questions.php' );
 ?>