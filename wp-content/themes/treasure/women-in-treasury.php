<?php 
/*
 Template Name: Women In Treasury
 */
get_header();
if (have_posts()) :
    while ( have_posts() ) : the_post();
?>
   <section class="womens">
       <div class="container pb-5 pt-3">
           <h1 class="text-secondary fw-bold">Women in Treasury</h1>
           <div class="row mx-0">
               <div class="col-lg-9 px-0 ">
                   <div>
                   <?php the_post_thumbnail( 'full', array( 'class' => 'mb-3 border-top border-secondary border-5 img-fluid' ) ); ?>
                   </div>
                   <?php if (get_field('sub_heading_below_image')): ?>
                        <h2 class="fw-bold mb-3"><?php the_field('sub_heading_below_image'); ?></h2>
                   <?php endif; ?>
             </div>
              <div class="col-lg-3 px-lg-3 px-0">
            <h2 class="text-secondary list_heading mt-md-0 mt-3">Read from this section...</h2>
            <ul class="list-group list-group-flush">
            <?php 
                $readfromposts = get_field('read_from_this_section_articles');
                if ($readfromposts) :
                    foreach ($readfromposts as $post):
                    setup_postdata($post);
                    $readfrompostcategories = get_the_category(get_the_ID());
                    if (!empty($readfrompostcategories)) {
                     $setpermalinkcat = '<a class="text-secondary small" href="' . esc_url(get_category_link($readfrompostcategories[1]->term_id)) . '">' . esc_html($readfrompostcategories[1]->name) . '</a>';
                   }
            ?>
                <li class="list-group-item ps-0">
                    <?php echo $setpermalinkcat; ?>
                        <span class="text-muted small"> - <?php echo meks_time_ago(); ?></span>
                    <p class="fw-bold mb-0">
                        <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' ); ?></a>
                    </p>
                </li>
            <?php
                    endforeach;
                    wp_reset_postdata(); 
                endif;
            ?>
            </ul>
            
               </div>
          </div>
          <div class="row mx-0">
              <div class="col-md-9 px-0 women-in-treasury">
         <div class="wit-text-and-menu">
         <nav aria-label="Page navigation" class="border-top border-bottom">
           <ul class="pagination mb-0 py-3">
                                    <li class="page-item">
                                        <a href="<?php echo get_site_url(); ?>/women-in-treasury/" class="page-link border-0">Home</a>
                                    </li>
                                    <li class="page-item d-none d-md-block">
                                        <a href="<?php echo get_site_url(); ?>/women-in-treasury/forums/)" class="page-link border-0">Forums</a>
                                    </li>
                                    <li class="page-item d-none d-md-block">
                                        <a href="<?php echo get_site_url(); ?>/women-in-treasury/study/" class="page-link border-0">Study</a>
                                    </li>
                                    <li class="page-item d-none d-md-block">
                                        <a href="javascript: void(0)" class="page-link border-0">Awards</a>
                                    </li>
                                    <li class="page-item d-none d-md-block">
                                        <a href="<?php echo get_site_url(); ?>/women-in-treasury/profiles/" class="page-link border-0">Profiles</a>
                                    </li>
                                    <li class="page-item d-none d-md-block">
                                        <a href="<?php echo get_site_url(); ?>/women-in-treasury/articles/" class="page-link border-0">Articles</a>
                                    </li>
                                    <li class="page-item text-end dropdown d-block d-md-none">
                                        <a class="page-link dropdown-toggle border-0" href="javascript:void(0)" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="material-icons expand">
                                                expand_more
                                            </span>
                                        </a>
                                        <div class="dropdown-menu">
                                            <ul class="dropdown-inner list-unstyled ps-2" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-link" href="javascript:void(0)">Categories</a></li>
                                                <li><a class="dropdown-link" href="javascript:void(0)">Nominations</a></li>
                                                <li><a class="dropdown-link" href="javascript:void(0)">Winners</a></li>
                                                <li><a class="dropdown-link" href="javascript:void(0)">Gallery</a></li>
                                                <li><a class="dropdown-link" href="javascript:void(0)">About</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
     </nav>
        <div class="page-content"><?php the_content(); ?></div>
        </div>
              </div>
          </div>
       </div>
   </section>
<?php 
   endwhile;
   endif;
    get_footer(); 
?>
