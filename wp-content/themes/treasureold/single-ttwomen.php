<?php
get_header();
if (have_posts()) :
    while (have_posts()) : the_post();

?>
        <section class="single-tt-women">
            <div class="container py-4">
                <div class="top-section border-bottom">
                    <div class="mb-3">
                        <a href="<?php echo get_site_url(); ?>/women-in-treasury/" class="small text-secondary">Women in Treasury</a>
                    </div>
                    <h2 class="fw-bold text-secondary">
                        <?php the_title(); ?>
                    </h2>
                    <h6 class="text-primary my-4">Published: <span class="fw-normal text-primary"><?php the_sub_field('published_date'); ?></span></h6>
                    <div class="row mx-0 py-md-5 py-3 border-top border-5 border-secondary">
                        <div class="col-md-9 px-0">
                            <?php
                            if (isset($_SESSION['user_name']) || (has_term('Forums', 'ttomen_category'))) :
                                the_content();
                            ?>
                            <?php
                            else :
								echo '<img src="'.get_first_image(get_the_ID()).'" class="img-fluid w-100" alt="'.get_the_title().'" >'; ?>
                                <div class="py-5">
                                <?php
                                echo wpshout_the_short_content(1000);
                            ?>
                                </div>
                                <div class="bg-light py-5 px-md-5 text-center mt-4">
                                <h3 class="text-secondary fw-bold w-50 pb-2 mb-3 px-md-5 m-auto form-heading">All our content is free,
                                    just register below</h3>

                                <a class="btn btn-primary" href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&scope=r_liteprofile%20r_emailaddress&client_id=772r3sww5p0tel&redirect_uri=<?php echo get_home_url(); ?>/wp-admin/admin-ajax.php?action=linkedin_oauth_callback
"><i class="fa-brands fa-linkedin-in border-end pe-1"></i> Sign in with LinkedIn</a>
                                <p class="text-primary mt-3">Already have an account? <a data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#signInModal" class="text-secondary fw-bold sign">Sign In</a></p>
                                <form id="ajax-registration-form-page" action="#" class="w-75 m-auto py-3">
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
                                    <div class="input-group flex-nowrap mt-4">
                                        <input onblur="companyLength(this)" name="prcompanyname" id="prcompanyname" type="text" class="form-control text-muted border-end-0 bg-light py-2" placeholder="Company name" aria-label="Username" aria-describedby="addon-wrapping" required>
                                        <span class="input-group-text bg-light" id="addon-wrapping"><i class="fa-regular fa-user light-icon"></i></span>
                                    </div>
                                    <p class="text-danger mb-0 text-start small" id="errComp"></p>
                                    <div class="input-group flex-nowrap mt-4">
                                        <input onblur="emailLength(this)" name="premailaddress" id="premailaddress" type="email" class="form-control text-muted border-end-0 bg-light py-2" placeholder="Email address" aria-label="Email Address" aria-describedby="addon-wrapping" required>
                                        <span class="input-group-text bg-light" id="addon-wrapping"><i class="fa-regular fa-envelope light-icon"></i></span>
                                    </div>
                                    <p class="text-danger mb-0 text-start small" id="errEmail"></p>
                                    <div class="input-group flex-nowrap mt-4">
                                        <input name="prpassword" id="prpassword" type="password" class="form-control text-muted border-end-0 bg-light py-2" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping" required>
                                        <span class="input-group-text bg-light" id="addon-wrapping"><i class="fa-solid light-icon fa-lock"></i></span>
                                    </div>
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
                                    <div class="form-check text-start lh-sm mt-4">
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
                            endif;
                            ?>

                        </div>
                    </div>
                </div>
        </section>
        <section class="sponsorsandendosers">
            <div class="container py-md-5 py-3">
                <div class="row mx-0">
                    <div class="col-md-9 px-0">
                        <?php if (have_rows('sponsors')) : ?>
                            <div>
                                <h2 class="text-secondary fw-bold mb-3">Sponsors</h2>
                                <div class="sponsors pb-5 border-bottom">
                                    <div class="row mx-0">
                                        <?php

                                        while (have_rows('sponsors')) : the_row();
                                            $spimage = get_sub_field('sponsor_image');
                                        ?>
                                            <div class="col-lg-3 col-6">
                                                <a href="" class="border p-4 me-3 mb-3">
                                                    <img class="img-fluid w-75 wom-spons-img" src="<?php echo esc_url($spimage['url']); ?>" alt="<?php echo esc_attr($spimage['alt']); ?>"> </a>
                                            </div>
                                        <?php
                                        endwhile;

                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (have_rows('panellists')) : ?>
                            <h2 class="text-secondary fw-bold pt-5"><?php the_field('panellist_heading'); ?></h2>
                            <div class="sponsors">
                                <?php

                                while (have_rows('panellists')) : the_row();
                                    $panelimage = get_sub_field('panellists_image');
                                ?>
                                    <div class="row mx-0 border-bottom py-5">
                                        <div class="col-lg-3 col-md-4 px-0">
                                            <img class="w-100 img-fluid mb-3" src="<?php echo esc_url($panelimage['url']); ?>" alt="<?php //echo esc_attr($panelimage['alt']); 
                                                                                                                                    ?>">
                                        </div>
                                        <div class="col-lg-9 col-md-8 px-md-3 px-0">
                                            <h6 class="text-secondary fw-bold mb-3"><?php the_sub_field('panellists_name'); ?></h6>
                                            <hc class="text-primary fw-bold mb-3"><?php the_sub_field('panellists_designation'); ?></hc>
                                            <p class="mb-0"><?php the_sub_field('panellists_intro'); ?></p>
                                        </div>
                                    </div>
                                <?php
                                endwhile;

                                ?>

                            </div>
                        <?php endif; ?>
                        <?php if (have_rows('supported_by')) : ?>
                            <div class="border-top pt-4 pb-5 mt-5">
                                <h2 class="text-secondary fw-bold mb-4 pb-2">Proudly supported by</h2>
                                <div class="sponsors">
                                    <div class="row mx-0">
                                        <?php

                                        while (have_rows('supported_by')) : the_row();
                                            $sbimage = get_sub_field('sb_sponsor_image');
                                        ?>
                                            <div class="col-lg-3 col-6">
                                                <a href="" class="border p-4 mb-3">
                                                    <img width="100" class="img-fluid w-75 wom-spons-img" src="<?php echo esc_url($sbimage['url']); ?>" alt="<?php echo esc_attr($sbimage['alt']); ?>">
                                                </a>
                                            </div>
                                        <?php
                                        endwhile;

                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (have_rows('endorsed_by')) : ?>
                            <div class="border-top pt-4 pb-5">
                                <h2 class="text-secondary fw-bold mb-4 pb-2">Endorsed By</h2>
                                <div class="sponsors">
                                    <div class="row mx-0">
                                        <?php

                                        while (have_rows('endorsed_by')) : the_row();
                                            $ebimage = get_sub_field('eb_sponsor_image');
                                        ?>
                                            <div class="col-lg-3 col-6">
                                                <a href="" class="border p-4 me-3 mb-3">
                                                    <img class="img-fluid w-75 wom-spons-img" src="<?php echo esc_url($ebimage['url']); ?>" alt="<?php echo esc_attr($sbimage['alt']); ?>">
                                                </a>
                                            </div>
                                        <?php
                                        endwhile;

                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
<?php
    endwhile;
endif;
get_footer();

?>