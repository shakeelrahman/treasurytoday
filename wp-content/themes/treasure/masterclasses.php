<?php
/*
 Template Name: MasterClasses
 */
get_header();
if (have_posts()) :
    while ( have_posts() ) : the_post();
?>
<div id="content">
   <section class="womens">
       <div class="container pb-5 pt-3">
           <h1 class="text-secondary fw-bold">
Masterclasses
</h1>
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
             <a href="<?php echo home_url(); ?>/master-classes/" class="page-link border-0">Current </a>
         </li>
          <li class="page-item d-none d-md-block">
           <a href="<?php echo home_url(); ?>/master-classes-previous/" class="page-link border-0">Previous</a>
         </li>
      </ul>
     </nav>
    
    <?php if (get_field('sub_heading_below_image')): ?>
                        <h2 class="text-secondary fw-bold mb-3 py-4"><?php the_field('sub_heading_below_image'); ?></h2>
    <?php endif; ?>
<div class="row">                        
<?php 
if( have_rows('select_master_classes_to_be_displayed') ):
    while( have_rows('select_master_classes_to_be_displayed') ) : the_row();
        
?>
<div class="col-md-4">
    
    <img alt="<?php the_sub_field('heading') ?>" src="<?php the_sub_field('masterclass_image') ?>" class="img-fluid">
    
</div>                        
<div class="masterclasses col-md-8">
    <h3><?php the_sub_field('heading') ?></h3>
<div class="duration">
	<p>Duration: <span><?php the_sub_field('duration') ?></span></p>
</div>

<div class="desc">
    
<?php 
    the_sub_field('short_description');
?>

</div>
    <?php 
        if(get_sub_field('link_to_masterclass')):?>
        <a href="<?php the_sub_field('link_to_masterclass') ?>" class="upcomin-webinarlink" target="_blank">View series</a>
    <?php endif; ?>
</div>
<?php 
endwhile;
endif;
?>
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
