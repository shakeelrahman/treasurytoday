<?php 
/*
 Template Name: Adam Smith Awards Gellery
 */    
get_header();
if (have_posts()) :
     while ( have_posts() ) : the_post();
$parent_id = wp_get_post_parent_id();
if($parent_id == 0)
{
    $parent_id = get_the_ID();
}
?>
<div id="content">
   <section class="awards">
       <div class="container pb-5 pt-3">
           <h1 class="text-secondary fw-bold">Adam Smith Awards</h1>
           <div class="row mx-0">
               <div class="col-lg-9 px-0 ">
                   <div>
                   <?php the_post_thumbnail( 'full', array( 'class' => 'mb-3 border-top border-secondary border-5 img-fluid' ) ); ?>
                   </div>
                   <h2 class="fw-bold mb-3"><?php the_field('sub_heading_below_image',$parent_id); ?></h2>  
             </div>
              <div class="col-lg-3 px-lg-3 px-0">
            <h2 class="text-secondary list_heading mt-md-0 mt-3">Read from this section...</h2>
            <ul class="list-group list-group-flush">
            <?php 
                $readfromposts = get_field('read_from_this_section_articles',$parent_id);
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
                        <span class="text-muted small">-<?php the_date(); ?></span>
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
         <div class="adamsmithawards">
         <?php get_template_part('admasmithawardsmenu'); ?>
             <?php the_content(); ?>
        </div>
              </div>
          </div>
       </div>
   </section>
   
<?php 
endwhile;
endif;
get_footer();