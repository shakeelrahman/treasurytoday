 <!--SignIn Modal -->
 <div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content p-3">
       <div class="modal-header border-bottom-0">
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body text-center">
         <a href="#">
           <img src="<?php echo get_template_directory_uri(); ?>/assets/images/treasury-today-logo.png" width="242" alt="logo">
         </a>

         <form class="form mt-3" id="ajax-login-form" action="#">
           <div class="form-group mb-3">
             <input type="text" class="form-control" placeholder="Email Address" name="uname" id="uname" required>
           </div>
           <div class="form-group mb-3">
             <input type="password" class="form-control" placeholder="Password" name="psw" id="psw" required>
           </div>
           <div class="form-check text-start lh-sm">
             <input class="form-check-input" type="checkbox" value="" id="showPassword" onclick="showPass()">
             <label class="form-check-label small" for="showPassword">
               Show Password
             </label>
           </div>
           <div class="form-check text-start lh-sm mb-3">
             <input class="form-check-input" type="checkbox" value="" id="rememberCheck">
             <label class="form-check-label small" for="rememberCheck">
               Remember me
             </label>
           </div>
           <button type="submit" class="button btn rounded-pill border-3 border-secondary btn-white text-secondary fw-bold px-5">Login</button>
           <div id="loginformerrormessage"></div>
         </form>
       </div>
       <div class="modal-footer mb-4 border-top-0 text-center d-block">
         <div>
           <a href="" data-bs-toggle="modal" data-bs-target="#forgotPassModal" data-bs-dismiss="modal" aria-label="Close">
             <p class="small text-secondary fw-bold mb-0">Forgot Password?</p>
           </a>
         </div>
         <div class="d-flex justify-content-center">
           <p class="text-primary small  border-bottom">Don't have an account? <a data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal" aria-label="Close" class="text-secondary fw-bold" href="">
               Register now for free
             </a></p>
         </div>
        <a class="btn btn-primary" href="<?php the_field('linkedin_login_url','option') ?>&redirect_uri=<?php echo get_home_url(); ?>/wp-admin/admin-ajax.php?action=linkedin_oauth_callback
">Sign in with LinkedIn</a>
       </div>
     </div>
   </div>
 </div>