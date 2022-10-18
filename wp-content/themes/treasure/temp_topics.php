<?php
/*
Template Name: Topics Listing
*/
get_header();
if (isset($_GET['tags'])) {
    $ppc = $_GET['tags'];
    $idObj = get_category_by_slug($ppc); 
    $ppc = $idObj->term_id;
} else {
    $ppc = get_field('select_category');
}
?>
<div id="content">
  <section class="banner insights-banner">
    <div class="container py-4">
      <h1 class="text-secondary fw-bold mb-3"><?php the_title(); ?></h1>
      <div class="row mx-0">
        <?php
        $featured_post =  get_field('select_main_article');
        ?>
        <div class="col-xl-3 ps-md-0">
          <a href="<?php echo get_the_permalink($featured_post->ID); ?>">
          <h2 class="text-primary list_heading">
          <?php echo esc_html($featured_post->post_title); ?>
            </h2>
          </a>
          <p class="fst-italic">
            <?php
            if (!empty($fptopstory->post_excerpt))
              echo $fptopstory->post_excerpt;
            else {
              //echo $fptopstory;
              echo substr(wp_strip_all_tags($featured_post->post_content), 0, 250);
              echo "......";
            }
            ?>
          </p>
        </div>
        <div class="col-xl-6 px-md-0">

          <?php
          //echo get_the_post_thumbnail( $featured_post->ID, 'full',array('class' => 'img-fluid border-top border-5 border-secondary') ); 

          echo '<img src="' . get_first_image($featured_post->ID) . '" alt="' . get_the_title() . '" class="img-fluid hero-img border-top border-5 border-secondary w-100">';
          ?>
        </div>
        <div class="col-xl-3 pe-md-0">
          <h2 class="text-secondary list_heading mt-md-0 mt-3">You might also be interested in...</h2>
          <?php
          $interestedin = get_field('you_might_also_be_interested_in');
          if ($interestedin) :
          ?>
            <ul class="list-group list-group-flush">
              <?php foreach ($interestedin as $post) :
                setup_postdata($post);
              ?>
                <li class="list-group-item ps-0">
                   <?php echo get_link_to_topics_page(get_the_ID()); ?>
                  <span class="text-muted small"> - <?php echo meks_time_ago(); ?></span>
                  <p class="fw-bold mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata();
          endif;
          ?>

        </div>
      </div>
    </div>
  </section>

  <div class="container pt-md-5 pt-3">
    <div class="row mx-0">
      <div class="col-md-9">
        <nav aria-label="Page navigation" class="border-top border-bottom d-flex align-items-center justify-content-between">
          <ul class="pagination col-md-11 mb-0 py-3 d-flex flex-wrap topiccatlink">

            <?php
            echo '<li class="page-item">
       <a class="page-link border-0" href="' . get_category_link(get_field('select_category')) . '">All</a>
               <input type="hidden" id="allcatname" name="allcatname" value="' . get_cat_name(get_field('select_category')) . '">  
           </li>';
            $args = array('child_of' => get_field('select_category'));
            $categories = get_categories($args);
            foreach ($categories as $category) {
              echo '<li class="page-item">
                   <a class="page-link border-0" href="' . get_category_link($category->term_id) . '" title="' . sprintf(__("View all posts in %s"), $category->name) . '" ' . '>' . $category->name . '</a>
                   </li>';
            }
            ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>

  <section class="news">
    <div class="container">
      <div class="row mx-0">
        <div class="col-md-9 px-0">
          <div class="py-5">
            <div id="ajaxpostsbycat" class="row mx-0">

              <?php
              echo wpb_postsbycategory($ppc);
              ?>

            </div>
          </div>
          
        </div>
      </div>
    </div>
  </section>


  <?php
  get_footer();
  ?>

