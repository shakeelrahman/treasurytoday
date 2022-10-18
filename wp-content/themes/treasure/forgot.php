<!-- Forgot password -->
<div class="modal fade" id="forgotPassModal" tabindex="-1" aria-labelledby="forgotPassModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-3">
      <div class="modal-header border-bottom-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload(true)"></button>
      </div>
      <div class="modal-body text-center">
        <a href="<?php echo get_home_url(); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/treasury-today-logo.png" width="242" alt="logo">
        </a>
        <h4 class="fw-bold text-secondary">Password reset</h4>
        <p class="text-primary" id="textprimaryfp">Please enter the email that you signed up with below. If your email is connected to a member account, we will send you a reset link.</p>
        <form class="mt-3" id="ajax-forgot-password" action="#">
          <div class="form-group mb-5">
            <input type="email" class="form-control" placeholder="Email Address" name="fpemailadd" id="fpemailadd" required>
          </div>
        <button type="submit" class="button btn rounded-pill border-3 border-secondary btn-white text-secondary px-5 fw-bold">Send Password Link</button>
        </form>
<!--        <div id="forgotsuccessmessage" style="display:none;">
            <h3>Thank you</h3><p>If the email address you gave is registered with us, your password reset link should be in your inbox within the next 5 minutes.</p>
        </div>
        <div id="forgoterrormessage" style="display:none;">
            <h3>Sorry</h3><p>Sorry. The server did not respond. Please try again by refreshing the page.</p>
        </div>-->
<div class="serverresponsemessage">
    
</div>
        
      </div>
      <div class="modal-footer mb-4 border-top-0 text-center d-block">
        <div>
          <a href="" data-bs-toggle="modal" data-bs-target="#signInModal" data-bs-dismiss="modal" aria-label="Close">
            <p class="small text-secondary fw-bold mb-0">Remembered Password?</p>
          </a>
        </div>
         <div class="d-flex justify-content-center">
           <p class="text-primary small">Don't have an account? <a data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal" aria-label="Close" class="text-secondary fw-bold" href="">
         Register now for free
          </a></p>
        </div>
      </div>
    </div>
  </div>
 </div>