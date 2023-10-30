<div class="main-wrapper">
   <div class="page-wrapper full-page">
      <div class="page-content d-flex align-items-center justify-content-center">

         <div class="row w-100 mx-0 auth-page">
            <div class="col-md-4 mx-auto">
               <div class="card">
                  <div class="row">
                     <!-- <div class="col-md-4 pe-md-0">
                        <div class="auth-side-wrapper">

                        </div>
                     </div> -->
                     <div class="ps-md-0">
                        <div class="auth-form-wrapper px-4 py-5">
                           <a href="#" class="noble-ui-logo d-block text-center mb-2">EQDL <span>Web App</span></a>
                           <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                           <?= $web_app->showAlert( $msg ) ?>
                           <form action="" method="POST" class="forms-sample">
                              <div class="mb-3">
                                 <label for="uname" class="form-label fw-bold">Username</label>
                                 <input type="text" class="form-control" name="uname" id="uname" required placeholder="Username" value="<?= $web_app->persistData( 'uname' ) ?>">
                              </div>
                              <div class="mb-3">
                                 <label for="pword" class="form-label fw-bold">Password</label>
                                 <input type="password" class="form-control" name="pword" id="pword" required autocomplete="current-password" placeholder="Password">
                              </div>
                             
                              <div class="text-center">
                                 <button type="submit" name="log_btn" id="log_btn" class="btn btn-primary">Login</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>