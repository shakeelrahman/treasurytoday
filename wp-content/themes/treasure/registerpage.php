<div class="bg-light p-md-5 p-3 text-center my-4">
<h3 class="text-secondary fw-bold w-50 pb-2 mb-3 px-md-5 m-auto form-heading">All our content is free, just register below</h3>

<a class="btn btn-primary" href="<?php the_field('linkedin_login_url','option') ?>&redirect_uri=<?php echo get_home_url(); ?>/wp-admin/admin-ajax.php?action=linkedin_oauth_callback
"><i class="fa-brands fa-linkedin-in border-end pe-1"></i> Sign in with LinkedIn</a>
 

<p class="text-primary mt-3">Already have an account? <a data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#signInModal" class="text-secondary fw-bold sign">Sign In</a></p>
<form id="ajax-registration-form-page" action="#" class="w-75 m-auto py-3 reg-form">
    
<div class="input-group flex-nowrap">
<input onblur="fnameLength(this)" name="prfname" id="prfname" type="text" class="form-control text-muted border-end-0 bg-light py-2" placeholder="First name" aria-label="Username" aria-describedby="addon-wrapping" required>
<span class="input-group-text bg-light" id="addon-wrapping"><i class="fa-regular fa-user light-icon"></i></span>
</div>
<p class="text-danger mb-0 text-start small" id="errFname"></p>
<div class="input-group flex-nowrap mt-4">
<input onblur="lnameLength(this)" name="prlname" id="prlname" type="text" class="form-control text-muted border-end-0 bg-light py-2" placeholder="Last name" aria-label="Username" aria-describedby="addon-wrapping" required>
<span class="input-group-text bg-light" id="addon-wrapping"><i class="fa-regular fa-user light-icon"></i></span>
</div>
<p class="text-danger mb-0 text-start small" id="errLname"></p>


<div class="form-group mt-4">
    <select onblur="companyLength(this)" class="form-select bg-light py-3 text-muted" aria-label="Default select example" name="prcompanynameid" id="prcompanynameid" required onchange='checkvalue(this.value)'>
               <option value="">Select Company *</option>
               <?php echo getcompanies(); ?>
               <option value="other">Other</option>
    </select>
</div>
<p class="text-danger mb-0 text-start small" id="errComp"></p>

<div class="input-group flex-nowrap mt-4" id="divcompanyregister" style="display: none;" >
    <input onblur="companyLength(this)" name="prcompanyname" id="prcompanyname" type="text" class="form-control text-muted border-end-0 bg-light py-2" placeholder="Company name" aria-label="Username" aria-describedby="addon-wrapping">
<span class="input-group-text bg-light" id="addon-wrapping"><i class="fa-regular fa-user light-icon"></i></span>
</div>
<p class="text-danger mb-0 text-start small" id="errComp"></p>

<div class="input-group flex-nowrap mt-4">
<input onblur="emailLength(this)" name="premailaddress" id="premailaddress" type="email" class="form-control text-muted border-end-0 bg-light py-2" placeholder="Email address" aria-label="Email Address" aria-describedby="addon-wrapping" required>
<span class="input-group-text bg-light" id="addon-wrapping"><i class="fa-regular fa-envelope light-icon"></i></span>
</div>
<p class="text-danger mb-0 text-start small" id="errEmail"></p>
<div class="input-group flex-nowrap mt-4">
<input onblur="passLength(this)" name="prpassword" id="prpassword" type="password" class="form-control text-muted border-end-0 bg-light py-2" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping" required>
<span class="input-group-text bg-light" id="addon-wrapping"><i class="fa-solid light-icon fa-lock"></i></span>
</div>
<p class="text-danger mb-0 text-start small" id="errPass"></p>
<div class="form-group mt-4">
<select name="prindustryfrom" id="prindustryfrom" class="form-select bg-light py-3 text-muted" aria-label="Default select example" required>
<option value="">What industry are you from?</option>
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
<div class="form-check text-start lh-sm mt-4 mb-2">
<input onclick="showRegContentPass()" class="form-check-input" type="checkbox" value="" id="flexCheckPassword">
<label class="text-primary form-check-label small" for="flexCheckPassword">
Show Password
</label>
</div>
<div class="form-check text-start lh-sm mb-2">
<input class="form-check-input" type="checkbox" value="" id="flexCheckRemember">
<label class="text-primary form-check-label small" for="flexCheckRemember">
Remember me
</label>
</div>
<div class="form-check text-start lh-sm mb-3">
<input class="form-check-input" required type="checkbox" value="" id="flexCheckSubscribe">
<label class="text-primary form-check-label small" for="flexCheckSubscribe">
Tick here to subscribe to our Treasury Insights newsletter, and other related content, and stay up to date with the latest treasury news (you can unsubscribe at any time).
</label>
</div>
<button type="submit" class="mb-3 button btn rounded-pill border-3 border-secondary fw-bold btn-white text-secondary px-5" >Get access</button>
<p class="text-primary mt-3">Already a member? <a data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#signInModal" class="sign text-secondary">Sign In</a></p>
</form>
<div id="registrationsuccess2" >
</div>
<div id="registrationerror2" style="display: none;">
<h3>User Registration Failed. Try Again. </h3>
</div>
</div>