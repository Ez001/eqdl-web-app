<?php
   #   Author of the script
   #   Name: Ezra Adamu
   #   Email: ezra00100@gmail.com
   #   Date created: 29/06/2022
   #   Date modified: 24/10/2023   

	//include_once( 'App.php' );

	class WebApp
	{
		// use App;

		function fixUrl( $page ) 
		{
			return str_replace( '-', '_', $page );
		}

		function showAlert( $msg , $top = false )
		{
			if ( $top ) 
			{
		   	$mt = 'mt-2';

	        if ( isset( $_SESSION['msg'] ) ) 
	        {
	        		$msg = $_SESSION['msg'];
	         	unset( $_SESSION['msg'] );
	        }

	        if ( $msg ) 
	        {
	           $mt = 'mt-5';
	        }
	            
	        return "<div id='main-msg' class='$mt'> $msg </div>";
			}
			else if ( isset( $msg ) ) 
		   {
            return $msg;
			}
		}
		
		function showAlertMsg__( $type, $msg )
		{
			$icon_type  = '';

			if ( $type == 'success' ) 
			{
				$icon_type = "bi bi-check-circle";
			} 
			else if ( $type == 'info' ) 
			{
				$icon_type = "bi bi-exclamation-circle";
			}
			else if ( $type == 'danger' ) 
			{         
				$icon_type = "bi bi-exclamation-octagon";
			}

			$type = "alert-$type";
			$alert = "<div class='alert $type alert-dismissible fade show mt-4' role='alert'><i class='$icon_type me-1'></i> $msg <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
		      </div>";

		   return $alert;
		}
		
		function showAlertMsg( $type, $msg )
		{
			$icon_type  = '';

			if ( $type == 'success' ) 
			{
				$icon_type = 'check-circle';
			} 
			else if ( $type == 'info' ) 
			{
				$icon_type = 'alert-circle';
			}
			else if ( $type == 'danger' ) 
			{         
				$icon_type = 'x-circle';
			}

			$type = "alert-$type";
			$alert = "<div class='alert $type alert-dismissible fade show mt-4' role='alert'><i data-feather='$icon_type'></i> $msg <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
		      </div>";

		   return $alert;
		}
		
		// persist user input
		function persistData( $data, $update = false, $clear = false ) 
		{
			$dt = '';

			if ( $clear ) 
			{
				return $dt;
			}
			
			if ( isset( $_POST[ $data ] ) ) 
			{
				$dt = $_POST[ $data ];
			}
			else 
			{
				if ( $update ) 
				{
					$dt = $data;
				}
			}

			return $dt;
		}
		
		function createOptions( array $data_arr, $sel_id )
		{
			$options = ''; 

			foreach ( $data_arr as $dt ) 
			{
				$sel = $sel_id == $dt ?	$sel = 'selected' : '';
				$options .= "<option value='$dt' $sel >$dt</option>";
			}

			return $options;
		}

		function loadCourses( array $data_arr, $sel_id )
		{
			$options = ''; 

			foreach ( $data_arr as $dt ) 
			{
				$id = $dt[ 'id' ];
				$title = $dt[ 'title' ];
				$cs_code = $dt[ 'cs_code' ];

				$sel = $sel_id == $id ?	$sel = 'selected' : '';
				$options .= "<option value='$cs_code' $sel >$cs_code - $title</option>";
			}

			return $options;
		}				
	}

?>