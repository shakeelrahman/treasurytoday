<?php
/*
 Template Name: Magazines
 */
get_header();
$subheading = get_field('page_sub_heading');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [
      'posts_per_page'         => -1,
      'post_type'              => 'magazines',
      'no_found_rows'          => true,
      'update_post_meta_cache' => false,
      'update_post_term_cache' => false,
        'orderby' => 'date',
        'order' => 'DESC',
      'paged' => $paged,
      'tax_query'              => [
         [
            'taxonomy' => 'magazine_category',
            'field'    => 'term_id',
            'terms'    => get_field('select_category') ,
         ],
      ],
   ];
$wp_query = new WP_Query($args);
?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="magazine">
    <div class="container pb-5">
	<?php if($subheading): ?>
	<div class="row mx-0 py-3">
		<div class="col-md-12">
			<h2 class="text-secondary fw-bold ps-0"><?php echo $subheading; ?></h2>
		</div>
	</div>
	<?php endif; ?>
        <div class="row mx-0">
            <div class="col-lg-10 col-md-12 px-0">
                <div class="row mx-0 py-5 border-bottom">
                    <div class="col-lg-3 col-md-4 px-0">
                    <?php
                    	if ( has_post_thumbnail() ) { 
				the_post_thumbnail('medium', array('class' => 'mb-3 img-fluid'));
			}
                        else {
                            $url =  get_first_image(get_the_ID());
                            echo '<img src="'.$url.'" "class" = "mb-3 img-fluid" alt="'.get_the_title().'" width="204">';
                        }
                    ?>
                    </div>
                    <div class="col-lg-9 col-md-8 px-0">
                        <div>
                            <h6 class="text-secondary fw-bold mb-3">
                               <?php the_title(); ?>
                            </h6>
                            <h6 class="text-secondary fw-bold mb-3">
                                Publication Date: <span class="fw-normal text-primary"><?php the_field('publication_date'); ?></span>
                            </h6>
                            <h6 class="mb-3 text-primary fw-bold"><?php the_field('magazine_sub_heading'); ?></h6>
                            <p class="pe-3 mb-4">
                                <?php //echo wpautop( $post->post_content );?>
                                <?php the_excerpt();?>
                            </p>
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
