<div class="main-wrapper">

   <?php include_once( 'sidebar_nav.php' ); ?>

   <div class="page-wrapper">       

      <?php include_once( 'topbar_nav.php' ); ?>

      <div class="page-content">
         <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
               <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            </div>
         </div>

         <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
               <div class="row flex-grow-1">
                  <div class="col-md-4 grid-margin stretch-card">
                     <div class="card">
                        <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                           <h6 class="card-title mb-0">No of Questions</h6>
                        </div>
                        <div class="row">
                           <div class="col-6 col-md-12 col-xl-5">
                              <h3 class="mb-2"><?= $total_quest ?></h3>
                           </div>
                        </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div> <!-- row -->
      </div>
   </div>
</div>