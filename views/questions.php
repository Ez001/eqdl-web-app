<div class="main-wrapper">

   <?php include_once( 'sidebar_nav.php' ); ?>

   <div class="page-wrapper">    

      <?php include_once( 'topbar_nav.php' ); ?>

      <div class="page-content">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header h3">
                     Questions
                  </div>
                  <div class="card-body">
                     <h5 class="card-title fw-bold text-capitalize">Please, Select a Course.</h5>
                     <div class="col-md-6 mb-5 M">
                        <select name="course" id="course" class="form-select">
                           <option value="">Select...</option>
                           <?= $web_app->loadCourses( $course_arr, 0 ) ?>
                        </select>
                     </div>
                     
                     <div id="alert_msg"></div>

                     <ul id='qt_topics_div' class="list-group">
                       
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>