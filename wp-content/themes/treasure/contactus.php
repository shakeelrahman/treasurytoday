<?php
/*
Template Name: Contact Us
*/
get_header();
if ( have_posts() ) : 
	while ( have_posts() ) : 
		the_post();
?>
<section class="contact">
        <div class="container py-5">
            <div class="row mx-0 pb-3">
                <div class="col-md-9 ps-0">
                        <h2 class="text-secondary fw-bold"><?php the_title(); ?> </h2>
                        <?php the_content(); ?>
                </div>
            </div>
            
        </div>
    </section>

<?php
endwhile;
endif;
get_footer();
?>