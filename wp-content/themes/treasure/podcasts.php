<?php
/*
 Template Name: Podcasts
 */
$featured_img_url = get_the_post_thumbnail_url(15924, 'full'); 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('post_type' => 'ttpodcast', 'posts_per_page' => -1, 'paged' => $paged);
$wp_query = new WP_Query($args);
get_header();
?>
<div id="content">
   <section class="podcasts">
       <div class="container pb-5 pt-3">
           <h1 class="text-secondary fw-bold">Podcasts</h1>
           <div class="row mx-0">
               <div class="col-lg-9 px-0">
                   <div>
                       <img src="<?php echo $featured_img_url; ?>" alt="Awards" class="mb-3 border-top border-secondary border-5 img-fluid">
                   </div>
             </div>
              <div class="col-lg-3 px-lg-3 px-0">
            <h2 class="text-secondary list_heading mt-md-0 mt-3">Read from this section...</h2>
            <ul class="list-group list-group-flush">
                <?php
                $readfromposts = get_field('read_from_this_section_articles',15924);
                if ($readfromposts) :
                foreach ($readfromposts as $post) :
                setup_postdata($post);
                ?>
              <li class="list-group-item ps-0">
                <?php echo get_link_to_topics_page(get_the_ID()); ?>
                <span class="text-muted small"> - <?php echo meks_time_ago(); ?></span>
                <p class="fw-bold mb-0">
                  <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10, '...'); ?></a>
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
           <?php 
           if (have_posts()) :
               while ( have_posts() ) : the_post();
           ?>
           
          <div class="row mx-0">
              <div class="col-md-9 px-0 border-bottom py-5">
                  <h5 class="text-secondary fw-bold"><?php the_title() ?></h5>
              <div class="d-flex my-3">
                  <img class="align-self-center" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-microphone.svg" alt="microphone">
                     <h6 class="lh-base mb-0 ps-2 text-primary fw-bold">Duration: 
                      <span class="fw-normal">
                      <?php 
                        if(get_field('duration'))
                            the_field('duration');
                        else
                            echo "Not Specified";
                      ?>
                      </span>
                     </h6>
                </div>
                  <p><?php the_excerpt(); ?></p>
                  <a href="<?php the_permalink(); ?>" class="link-btn btn text-secondary fw-bold px-4 rounded-pill border-3 border-secondary">Discover the series</a>
             <a href="https://itunes.apple.com/gb/podcast/treasury-talks-podcast-series/id1270121600?mt=2" class="link-sec ms-3 link-btn btn text-secondary fw-bold px-4 rounded-pill border-3 border-secondary">Subscribe on iTunes</a>
             </div>
          </div>
          <?php
                endwhile;
            endif;
          ?>
       </div>
   </section>

<?php
get_footer();
?>