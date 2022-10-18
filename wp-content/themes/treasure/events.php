<?php
/*
 Template Name: Events/Attendign
 */
get_header();
if (have_posts()) :
    while ( have_posts() ) : the_post();
    $pageslug= basename(get_permalink());
?>
<div id="content">
   <section class="podcasts">
       <div class="container pb-5 pt-3">
           <h1 class="text-secondary fw-bold">Events</h1>
           <div class="row mx-0">
               <div class="col-lg-9 px-0">
                   <div>
                       <?php the_post_thumbnail('full', ['class' => 'mb-3 border-top border-secondary border-5 img-fluid', 'title' => 'Events Attending']); ?>
                       
                   </div>
             </div>
              <div class="col-lg-3 px-lg-3 px-0">
            <h2 class="text-secondary list_heading mt-md-0 mt-3">Read from this section...</h2>
            <ul class="list-group list-group-flush">
                <?php
                $readfromposts = get_field('read_from_this_section_articles');
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
            <div class="row mx-0 mt-4">
                <div class="col-md-9 px-0">
                     <nav aria-label="Page navigation" class="border-top border-bottom">
           <ul class="pagination mb-0 py-3">        
                    <li class="page-item">
                        <a href="<?php echo get_site_url() ?>/events/" class="page-link border-0 <?php if($pageslug=='event') echo 'active'; ?>">Our Events </a>
                    </li>
                    <li class="page-item d-none d-md-block">
                    <a href="<?php echo get_site_url() ?>/events/attending/" class="page-link border-0 <?php if($pageslug=='attending') echo 'active'; ?>">Attending</a>
                    </li>
                </ul>
                </nav>
                    </div>
                    </div>
           <div class="row mx-0 py-4">
               <h2 class="text-secondary fs-1 fw-bold ps-0">Events we are attending</h2>
           </div>
           <?php 
           if( have_rows('add_events_attending') ):
               while( have_rows('add_events_attending') ) : the_row();
           ?>
          <div class="row mx-0 py-5 border-bottom">
              <div class="col-md-9 px-0">
                  <div class="row">
                      <div class="col-md-3">
                          <img src="<?php the_sub_field('event_image') ?>" alt="<?php the_sub_field('event_title') ?>" class="img-fluid" >
                      </div>
                      <div class="col-md-9">
                          <h5 class="text-secondary fw-bold"><?php the_sub_field('event_title') ?></h5>
              <div class="d-flex my-3">
                  <img class="align-self-center" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-date.svg" alt="calander">
                  <h6 class="lh-base mb-0 ps-2 text-primary fw-bold"><?php the_sub_field('event_place') ?> | <?php the_sub_field('event_month_year') ?> | <?php the_sub_field('event_time') ?> </h6>
                </div>
                <p><?php the_sub_field('event_details') ?></p>
                <?php $link = get_sub_field('event_link'); ?>
             <a href="<?php echo $link['url'] ?>" class="link-btn btn text-secondary fw-bold px-4 rounded-pill border-3 border-secondary"><?php echo $link['title']; ?></a>
                      </div>
                  </div>

             </div>
          </div>
           <?php 
                  endwhile;
                  endif;
            ?>
           
       </div>
   </section>
    <?php 
    endwhile;
    endif;
    get_footer();
    ?>

