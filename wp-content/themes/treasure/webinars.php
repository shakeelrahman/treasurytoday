<?php
/*
 Template Name: Webinars
 */
get_header();
if (have_posts()) :
    while ( have_posts() ) : the_post();
?>
<div id="content">
   <section class="womens">
       <div class="container pb-5 pt-3">
           <h1 class="text-secondary fw-bold">Webinars</h1>
           <div class="row mx-0">
               <div class="col-lg-9 px-0 ">
                   <div>
                   <?php the_post_thumbnail( 'full', array( 'class' => 'mb-3 border-top border-secondary border-5 img-fluid' ) ); ?>
                   </div>
                   
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
              <div class="col-md-9 px-0">
         <div class="">
         <nav aria-label="Page navigation" class="border-top border-bottom">
           <ul class="pagination mb-0 py-3">        
         <li class="page-item">
           <a href="javascript: void(0)" class="page-link border-0">Upcoming </a>
         </li>
          <li class="page-item d-none d-md-block">
           <a href="javascript: void(0)" class="page-link border-0">On demand</a>
         </li>
      </ul>
     </nav>
    
    <?php if (get_field('sub_heading_below_image')): ?>
                        <h2 class="text-secondary fw-bold mb-3 py-4"><?php the_field('sub_heading_below_image'); ?></h2>
    <?php endif; ?>
<?php 
if( have_rows('add_webinars') ):
    while( have_rows('add_webinars') ) : the_row();
?>
<div class="upwebinar-listing-block">
    <h3><?php the_sub_field('webinar_title') ?></h3>
<div class="duration">
	<p>Duration: <span><?php the_sub_field('webinar_duration') ?></span></p>
</div>
<?php
 if( have_rows('webinar_speakers') ):
    while( have_rows('webinar_speakers') ) : the_row();
?>   
<div class="speakers">
    <p><strong><?php the_sub_field('speaker_name') ?></strong> – <?php the_sub_field('speaker_info') ?></p>
</div>
<?php 
endwhile;
endif;
?>
<div class="desc-and-image">
    <img alt="<?php the_sub_field('webinar_title') ?>" src="<?php the_sub_field('webinar_image') ?>" class="img-fluid">
<?php 
    the_sub_field('webinar_infodescription');
?>

</div>
    <?php 
        if(get_sub_field('webinar_link')):
        $link = get_sub_field('webinar_link');
      
        ?>
<a href="<?php echo $link['url']; ?>" class="upcomin-webinarlink" target="_blank"><?php echo $link['title']; ?></a>
    <?php endif; ?>
</div>
<?php 
endwhile;
endif;
?>
        
       <div class="bg-light border-start border-5 border-secondary p-4 mb-5">
            <h4 class="text-secondary fw-bold mb-3">Missed the last webinar?</h4>
            <p class="text-primary fs-4">Take a look at our on demand webinars</p>
            </div>
             </div>
              </div>
          </div>
       </div>
   </section>
<?php
 endwhile;
 endif;
   get_footer();

