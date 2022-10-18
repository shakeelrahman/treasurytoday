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
							<?php get_template_part('registerpage') ?>
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