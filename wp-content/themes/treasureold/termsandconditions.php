<?php
/*
 Template Name: T&C
 */
get_header();
if (have_posts()) :
    while (have_posts()) : the_post();

?>
        <section>
            <div class="container py-5">
                <div class="top-section border-5 border-bottom border-secondary pb-4">
                    
                    <h2 class="fw-bold text-secondary fs-1 mt-3">
                        <?php the_title(); ?>
                    </h2>
                    
                </div>
                <div class="row mx-0 py-5">
                    <div class="col-md-9 px-0">

                       <?php
                            the_content();
                        
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