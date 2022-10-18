<?php
get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="magazine">
    <div class="container pb-5">
        <div class="row mx-0">
            <div class="col-lg-10 col-md-12 px-0">
                <div class="row mx-0 py-5 border-bottom">
                    <div class="col-lg-3 col-md-4 px-0">
                    <?php
                    	if ( has_post_thumbnail() ) { 
						  the_post_thumbnail('medium', array('class' => 'mb-3 img-fluid'));
						}
                    ?>
                    </div>
                    <div class="col-lg-9 col-md-8 px-md-3 px-0">
                        <div>
                            <h6 class="text-secondary fw-bold mb-3">
                               <?php the_title(); ?>
                            </h6>
                            <h6 class="text-secondary fw-bold mb-3">
                                Publication Date: <span class="fw-normal text-primary"><?php the_field('publication_date'); ?></span>
                            </h6>
                            <h6 class="mb-3 text-primary fw-bold"><?php the_field('magazine_sub_heading'); ?></h6>
                            <p class="pe-3 mb-4"><?php echo wpautop( $post->post_content );?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more btn text-secondary fw-bold px-4 rounded-pill border-3 border-secondary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
<?php endwhile; // end of the loop. ?>

<?php
get_footer();
?>
