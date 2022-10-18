<?php
/*
 Template Name: Women Articles
 */
get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('post_type' => 'ttwomen', 'posts_per_page' => 12, 'paged' => $paged);
$wp_query = new WP_Query($args);
?>
<section class="womens">
  <div class="container pb-5 pt-3">
    <h1 class="text-secondary fw-bold">Women in Treasury</h1>
    <div class="row mx-0">
      <div class="col-lg-9 px-0 ">
        <div>
          <?php the_post_thumbnail('full', array('class' => 'mb-3 border-top border-secondary border-5 w-100 img-fluid')); ?>
        </div>
        <?php if (get_field('sub_heading_below_image', '404')) : ?>
          <h2 class="fw-bold mb-3"><?php the_field('sub_heading_below_image', '404'); ?></h2>
        <?php endif; ?>
      </div>
      <div class="col-lg-3 px-lg-3 px-0">
        <h2 class="text-secondary list_heading mt-md-0 mt-3">Read from this section...</h2>
        <ul class="list-group list-group-flush">
          <?php
          $readfromposts = get_field('read_from_this_section_articles', '404');
          if ($readfromposts) :
            foreach ($readfromposts as $post) :
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
          <div class="women-articles">
            <img loading="lazy" class="wp-image-413 size-full alignnone " src="http://localhost/treasurytoday/wp-content/uploads/2022/08/women-in-treasury-logo.png" alt="women-in-treasury-logo" width="600" height="96">
            <h5 class="text-secondary my-3 fw-bold">Women in Treasury articles</h5>
            <div class="text-secondary" id="ajaxrefresh">
              <?php
              the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('<i class="fa-solid fa-arrow-left text-secondary pe-3"></i>', 'textdomain'),
                'next_text' => __('<i class="fa-solid fa-arrow-right text-secondary ps-3"></i>', 'textdomain'),
              ));
              ?>

              <div class="row mx-0 mt-4">
                <?php while (have_posts()) : the_post(); ?>

                  <div class="col-lg-4 col-md-6 pb-4">
                    <a class="d-block" href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail('full', array('class' => 'mb-3 img-fluid w-100')); ?>
                    </a>
                    <a class="text-secondary small" href="<?php the_permalink(); ?>">
                      Articles</a>
                    <span class="text-muted small">- 29 days ago</span>
                    <a class="" href="<?php the_permalink(); ?>">
                      <h3 class="black-link pe-3"><?php the_title(); ?></h3>
                    </a>
                  </div>
                <?php endwhile; ?>
              </div>
            </div>

          </div> <!-- women-articles ends here -->

        </div>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();
?>