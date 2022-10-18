<!-- Forgot password -->
<div class="modal fade" id="forgotPassModal" tabindex="-1" aria-labelledby="forgotPassModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-3">
      <div class="modal-header border-bottom-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <a href="./index.php">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/treasury-today-logo.png" width="242" alt="logo">
        </a>
        <h4 class="fw-bold text-secondary">Password reset</h4>
        <p class="text-primary">Please enter the email that you signed up with below. If your email is connected to a member account, we will send you a reset link.</p>
        <form class="mt-3">
          <div class="form-group mb-5">
            <input type="email" class="form-control" placeholder="Email">
          </div>
        <button type="submit" class="button btn rounded-pill border-3 border-secondary btn-white text-secondary px-5 fw-bold">Send Password Link</button>
        </form>
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