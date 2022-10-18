<?php
get_header();
if (have_posts()) :
    while (have_posts()) : the_post();

?>
        <section>
            <div class="container py-5">
                <div class="top-section border-5 border-bottom border-secondary pb-4">
                    <a href="javascript:void(0)" class="text-secondary small">Treasury Practice</a>
                    <h2 class="fw-bold text-secondary fs-1 mt-3">
                        <?php the_title(); ?>
                    </h2>
                    <h6 class="text-primary mt-2">Published: May 2022</h6>
                </div>
                <div class="row mx-0 py-5">
                    <div class="col-md-9 px-0">

                        <?php if (!isset($_SESSION['user_name'])) : ?>
                            <?php echo wpshout_the_short_content(1000); ?>
                            <div class="bg-light p-5 text-center mt-4">
                                <h3 class="text-secondary fw-bold w-50 pb-2 mb-3 px-md-5 m-auto">All our content is free,
                                    just register below</h3>

                                <a class="btn btn-primary" href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&scope=r_liteprofile%20r_emailaddress&client_id=772r3sww5p0tel&redirect_uri=http://localhost/treasurytoday/wp-admin/admin-ajax.php?action=linkedin_oauth_callback
"><i class="fa-brands fa-linkedin-in border-end pe-1"></i> Sign in with LinkedIn</a>
                                <p class="text-primary mt-3">Already have an account? <a data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#signInModal" class="text-secondary fw-bold sign">Sign In</a></p>
                                <form id="ajax-registration-form-page" action="#" class="w-75 m-auto py-3">
                                    <div class="input-group flex-nowrap mb-4">
                                        <input name="prfname" id="prfname" type="text" class="form-control text-muted border-end-0 bg-light py-2" placeholder="First name" aria-label="Username" aria-describedby="addon-wrapping" required>
                                        <span class="input-group-text bg-light" id="addon-wrapping"><i class="fa-solid fa-user light-icon"></i></span>
                                    </div>
                                    <div class="input-group flex-nowrap mb-4">
                                        <input name="prlname" id="prlname" type="text" class="form-control text-muted border-end-0 bg-light py-2" placeholder="Last name" aria-label="Username" aria-describedby="addon-wrapping" required>
                                        <span class="input-group-text bg-light" id="addon-wrapping"><i class="fa-solid fa-user light-icon"></i></span>
                                    </div>
                                    <div class="input-group flex-nowrap mb-4">
                                        <input name="prcompanyname" id="prcompanyname" type="text" class="form-control text-muted border-end-0 bg-light py-2" placeholder="Company name" aria-label="Username" aria-describedby="addon-wrapping" required>
                                        <span class="input-group-text bg-light" id="addon-wrapping"><i class="fa-solid fa-user light-icon"></i></span>
                                    </div>
                                    <div class="input-group flex-nowrap mb-4">
                                        <input name="premailaddress" id="premailaddress" type="email" class="form-control text-muted border-end-0 bg-light py-2" placeholder="Email address" aria-label="Email Address" aria-describedby="addon-wrapping" required>
                                        <span class="input-group-text bg-light" id="addon-wrapping"><i class="fa-solid fa-envelope light-icon"></i></span>
                                    </div>
                                    <div class="input-group flex-nowrap mb-4">
                                        <input name="prpassword" id="prpassword" type="password" class="form-control text-muted border-end-0 bg-light py-2" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping" required>
                                        <span class="input-group-text bg-light" id="addon-wrapping"><i class="fa-solid fa-user light-icon"></i></span>
                                    </div>
                                    <div class="form-group mb-4">
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
                                    <div class="form-check text-start lh-sm">
                                        <input onclick="showRegContentPass()" class="form-check-input" type="checkbox" value="" id="flexCheckPassword">
                                        <label class="text-primary form-check-label small" for="flexCheckPassword">
                                            Show Password
                                        </label>
                                    </div>
                                    <div class="form-check text-start lh-sm mb-3">
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
                                    <p class="text-primary mt-3">Already a member? <a data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#signInModal" class="sign text-secondary fw-bold">Sign In</a></p>
                                </form>
                                <div id="registrationsuccess2" style="display: none;">
                                    <h3>Thank You.</h3>
                                    <p>Within the next five minutes you will get an email with a validation link to verify your account.</p>
                                </div>
                                <div id="registrationerror2" style="display: none;">
                                    <h3>User Registration Failed. Try Again. </h3>
                                </div>
                            </div>
                        <?php
                        else :
                            /*if (has_post_thumbnail()) {
                                the_post_thumbnail('full', ['class' => 'img-fluid']);
                            }*/
                            the_content();
                        endif;
                        ?>

                    </div>
                </div>
            </div>
        </section>
<?php
    endwhile;
endif;
get_footer();

?>