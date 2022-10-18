<?php
/*
Template Name: Topics Listing
*/
get_header();
?>
<div id="content">
  <section class="banner insights-banner">
    <div class="container py-4">
      <div class="row mx-0">
        <h1 class="text-secondary fw-bold mb-3"><?php the_title(); ?></h1>
        <?php
        $featured_post =  get_field('select_main_article');
        ?>
        <div class="col-xl-3">
          <h2 class="text-primary list_heading"><a href="<?php echo get_the_permalink($featured_post->ID); ?>"><?php echo esc_html($featured_post->post_title); ?></a></h2>
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
        <div class="col-xl-6">

          <?php
          //echo get_the_post_thumbnail( $featured_post->ID, 'full',array('class' => 'img-fluid border-top border-5 border-secondary') ); 

          echo '<img src="' . get_first_image($featured_post->ID) . '" alt="' . get_the_title() . '" class="img-fluid border-top border-5 border-secondary w-100">';
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
                $categories = get_the_category(get_the_ID());
                if (!empty($categories)) {
                  $setpermalinkcat = '<a class="text-secondary small" href="' . esc_url(get_category_link($categories[1]->term_id)) . '">' . esc_html($categories[1]->name) . '</a>';
                }
              ?>
                <li class="list-group-item ps-0">
                  <?php echo $setpermalinkcat; ?>
                  <span class="text-muted small">-<?php the_date(); ?></span>
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
              echo wpb_postsbycategory(get_field('select_category'));
              ?>

            </div>
          </div>
          <nav aria-label="Page navigation example" class="border-top border-bottom">
            <ul class="pagination mb-0 py-3 justify-content-end">
              <li class="page-item">
                <a class="page-link border-0" href="javascript: void(0)" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link border-0" href="javascript: void(0)">1</a></li>
              <li class="page-item"><a class="page-link border-0" href="javascript: void(0)">2</a></li>
              <li class="page-item"><a class="page-link border-0" href="javascript: void(0)">3</a></li>
              <li class="page-item">
                <a class="page-link border-0" href="javascript: void(0)" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>


  <?php
  get_footer();
  ?>

