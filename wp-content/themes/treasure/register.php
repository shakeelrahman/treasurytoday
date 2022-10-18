 <!--Register Modal -->
 <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content p-3">
       <div class="modal-header text-center border-bottom-0">
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload(true)"></button>
       </div>
       <div class="modal-body text-center">
         <h5 class="small text-secondary fw-bold">All our content is free,
           just register below</h5>
         <!--<button class="btn btn-primary mb-3">Sign in with LinkedIn</button>-->
         <a class="btn btn-primary" href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&scope=r_liteprofile%20r_emailaddress&client_id=772r3sww5p0tel&redirect_uri=http://treasurytoday.imobisoft.uk/wp-admin/admin-ajax.php?action=linkedin_oauth_callback
"> Sign in with LinkedIn</a>


         <div>
           <p class="small text-primary">Already have an account? <a data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#signInModal" class="text-secondary fw-bold sign">Sign In</a></p>
         </div>
         <form id="ajax-registration-form" action="#">
           <div class="form-group mb-3">
             <input type="text" class="form-control py-2" placeholder="First Name *" name="rfname" id="rfname" maxlength="18" required>
           </div>
           <div class="form-group mb-3">
             <input type="text" class="form-control py-2" placeholder="Last Name *" name="rlname" id="rlname" required>
           </div>
           
             <div class="form-group mb-3">
             <select class="form-select" aria-label="Default select example" name="rcompanynameid" id="rcompanynameid" required>
               <option value="">Select Company *</option>
               <?php echo getcompanies(); ?>
               <option value="other">Other</option>
             </select>
           </div>
             <div class="form-group mb-3">
             <input type="text" class="form-control py-2" placeholder="Company Name *" name="rcompanyname" id="rcompanyname" style="display: none">
           </div>
           <div class="form-group mb-3">
             <input type="email" class="form-control py-2" placeholder="Email Address *" name="remailaddress" id="remailaddress" required>
           </div>

           <div class="form-group mb-3">
             <input type="password" class="form-control py-2" placeholder="Password *" name="rpassword" id="rpassword" required>
           </div>

           <div class="form-group mb-3">
             <select class="form-select" aria-label="Default select example" name="rindustryfrom" id="rindustryfrom" required>
               <option value="">What industry are you from? *</option>
               <option value="1">Agriculture/Forestry</option>
               <option value="2">Banking/Finance/Insurance</option>
               <option value="3">Communications/Technology</option>
               <option value="4">Construction/Mining/Oil & Gas</option>
               <option value="5">Food/Drink/Tobacco</option>
               <option value="6">Mechanical/Engineering/Manufacturing</option>
               <option value="7">Media</option>
               <option value="8">Medical/HealthCare/Pharmaceutical</option>
               <option value="9">Other</option>
               <option value="10">Services Industries</option>
               <option value="11">Transportation</option>
               <option value="12">Utilities</option>
               <option value="13">Wholesale & Retail Trade</option>
             </select>
           </div>
           <div class="form-check text-start lh-sm">
             <input class="form-check-input" type="checkbox" value="" id="flexCheckPassword" onclick="showRegPass()">
             <label class="form-check-label small" for="flexCheckPassword">
               Show Password
             </label>
           </div>
           <div class="form-check text-start lh-sm mb-3">
             <input class="form-check-input" type="checkbox" value="" id="flexCheckRemember">
             <label class="form-check-label small" for="flexCheckRemember">
               Remember me
             </label>
           </div>
           <div class="form-check text-start lh-sm mb-3">
             <input class="form-check-input" type="checkbox" value="" id="flexCheckSubscribe" required>
             <label class="form-check-label small" for="flexCheckSubscribe">
               Tick here to subscribe to our Treasury Insights newsletter, and other related content, and stay up to date with the latest treasury news (you can unsubscribe at any time).
             </label>
           </div>
           <button type="submit" class="mb-3 button btn rounded-pill border-3 border-secondary fw-bold btn-white text-secondary px-5">Get access</button>
         </form>
         <!--<div id="registrationsuccess" style="display: none;">
           <h3>Thank You.</h3>
           <p>Within the next five minutes you will get an email with a validation link to verify your account.</p>
         </div>
         <div id="registrationerror" style="display: none;">
           <h3>User Registration Failed. Try Again. </h3>
         </div>-->
         <div id="servermessage">
           
         </div>
       </div>
       <div class="text-center mb-3">
         <p class="small text-primary">Already have an account? <a data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#signInModal" class="text-secondary sign">Sign In</a></p>
       </div>
     </div>
   </div>
 </div>