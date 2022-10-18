<?php get_header(); ?>
<div id="content">
  <section class="banner fpbanner">
    <div class="container">
      <div class="row mx-0 border-bottom py-4">
        <div class="col-md-3 ps-md-0 pe-md-3">
          <h2 class="text-secondary list_heading mb-3">Top Story</h2>
          <?php
          $fptopstory = get_field('select_top_story');

          $url =  get_first_image($fptopstory->ID);
          $fpcategories = get_the_category($fptopstory->ID);
          

          ?>
          <a href="<?php echo get_permalink($fptopstory->ID);
                    ?>">
            <h2 class="text-primary list_heading"><?php echo esc_html($fptopstory->post_title); ?></h2>
          </a>
          <p class="small text-secondary">
               <?php echo get_link_to_topics_page($fptopstory->ID); ?>
          </p>
          <p class="fst-italic">
          <?php 
                    if (!empty($fptopstory->post_excerpt))
                        echo $fptopstory->post_excerpt;
                    else {
                        //echo $fptopstory;
                        echo substr(wp_strip_all_tags( $fptopstory->post_content ),0,250);
                        echo "......";
                    }
          ?></p>
        </div>
        <div class="col-md-6 px-md-0">
            <img class="img-fluid border-top border-5 hero-img w-100 border-secondary" src="<?php echo $url; ?>" alt="FP Main Banner" width="600">
        </div>
        <div class="col-md-3 pe-md-0 ps-md-3 mt-md-0 mt-3">
          <h2 class="text-secondary list_heading">Trending</h2>
          <?php
          wp_reset_postdata();
          ?>
          <ul class="list-group list-group-flush">
            <?php
            $featured_posts = get_field('select_trending_stories');
            if ($featured_posts) : ?>

              <?php foreach ($featured_posts as $post) :
                setup_postdata($post);
              ?>
                <li class="list-group-item ps-0">
                  <?php echo get_link_to_topics_page(get_the_ID()); ?>
                  <span class="text-muted small">- <?php echo meks_time_ago(); ?></span>
                  <p class="fw-bold mb-0">
                    <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10, '...'); ?></a>
                  </p>
                </li>
              <?php endforeach; ?>

              <?php
              // Reset the global post object so that the rest of the page works correctly.
              wp_reset_postdata(); ?>
            <?php endif; ?>
          </ul>

        </div>
      </div>
    </div>
  </section>

  <section class="add-1">
    <div class="container">
      <div class="row mx-0 border-bottom py-4">
        <?php
        $featured_posts_2 = get_field('other_stories');
        if ($featured_posts_2) :
          $count = TRUE;
          foreach ($featured_posts_2 as $post) :
            // print_r($post);
            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post);
        ?>
            <div class="col-md-3 position-relative<?php if ($count) {
                                    echo '';
                                  } ?>  pb-4 bor-col ps-md-0 pe-md-3">

              <div class="d-flex im-text">
                <a class="col-md-12 col-3 position-relative" href="<?php the_permalink(); ?>">
                    <?php 
                        if (has_post_thumbnail())
                        {
                            the_post_thumbnail('full', array('class' => 'img-fluid'));
                        }
                        else {
                            echo '<img src="'.get_first_image(get_the_ID()).'" alt="'.get_the_title().'" class="img-fluid">'; 
                        }
                    ?>                 
                  <?php if (get_field('is_sponsored') == "True") : ?>
                    <div class="sponsored-item">Sponsored</div>
                  <?php endif; ?>
                </a>
                <div class="lnk-txt">
                  <?php echo get_link_to_topics_page(get_the_ID()); ?>
                  <span class="text-muted small"> - <?php echo meks_time_ago(); ?></span>
                  <a href="<?php the_permalink(); ?>">
                    <h2 class="black-link"><?php the_title(); ?></h2>
                  </a>
                </div>
              </div>

            </div>
          <?php
            $count = FALSE;
          endforeach;
          ?>

          <?php
          // Reset the global post object so that the rest of the page works correctly.
          wp_reset_postdata(); ?>
        <?php endif; ?>

        <div class="col-md-3 offset-md-0 offset-sm-3 col-sm-6 pe-md-0">

          <?php
          if (get_field('4th_column_content') == "Google Advert") {
            the_field('google_advert_code');
          } else {

            $post = get_field('select_post_fc_r1');
            // print_r($googleadvert_post);
            setup_postdata($post);

          ?>
            <div class="d-flex im-text">
              <a class="col-md-12 col-3 position-relative" href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('full', array('class' => 'img-fluid'));   ?>
                <?php if (get_field('is_sponsored')== "True") : ?>
                  <div class="sponsored-item">Sponsored</div>
                <?php endif; ?>
              </a>
              <div class="lnk-txt">
                <?php echo get_link_to_topics_page(get_the_ID()); ?>
                <span class="text-muted small">-<?php echo meks_time_ago(); ?></span>
                <a href="<?php the_permalink(); ?>">
                  <h2 class="black-link"><?php the_title(); ?></h2>
                </a>
              </div>
            </div>
          <?php
            wp_reset_postdata();
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <section class="spons-add py-5">
    <div class="container pb-md-5">
      <div class="row mx-0">
        <div class="col-md-12 bg-primary">
            <?php
      if (get_field('middle_full_content_type') == "Google Advert") :
        the_field('google_post_advert');
      else :
        $post = get_field('middle_full_select_post');
        setup_postdata($post);
      ?>
        <a class="d-flex justify-content-between" id="spon-link" href="<?php the_permalink(); ?>">
          <div class="col-md-9">
            <h2 class="text-white"><?php the_title(); ?></h2>
            <h5 class="text-secondary small">Sponsored</h5>
            <p class="text-white">
              <?php echo get_the_excerpt(); //the_excerpt();  
              ?>
            </p>
          </div>
          <div class="col-md-3">
            <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100 border-4 border-secondary border-top'));   ?>

          </div>
        </a>
      <?php
        wp_reset_postdata();
      endif;
      ?>
    </div>
    </div>
    </div>
  </section>

  <section class="technology">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center pb-4 px-md-0 px-3">
        <h3 class="text-secondary fw-bold heading"><?php the_field('tec_section_title') ?></h3>
        <a href="<?php echo esc_url(get_field('tec_enter_section_link')); ?>" class="text-secondary pe-md-2">View all</a>
      </div>
      <div class="row mx-0 border-bottom pb-3">
        <?php
        $tec_featured_posts = get_field('tec_select_section_posts');
        $col_1 = TRUE;
        $col_2 = TRUE;
        $col_2_close = FALSE;
        if ($tec_featured_posts) :
          foreach ($tec_featured_posts as $post) :
            setup_postdata($post);
           
            if ($col_1) :
        ?>
              <div class="col-md-6 px-md-0 mb-3">
                <a href="<?php the_permalink(); ?>">
                 <?php 
                        /*if (has_post_thumbnail())
                        {
                            the_post_thumbnail('full', array('class' => 'img-fluid'));
                        }
                        else {
                            echo '<img src="'.get_first_image(get_the_ID()).'" alt="'.get_the_title().'" class="img-fluid">'; 
                        }*/
                        echo '<img src="'.get_first_image(get_the_ID()).'" alt="'.get_the_title().'" class="img-fluid border-5 mb-3 border-top border-secondary w-100 hero-img">'; 
                    ?>
                </a>
               <?php echo get_link_to_topics_page(get_the_ID()); ?>
                <span class="text-muted small">- <?php echo meks_time_ago(); ?></span>
                <a href="<?php the_permalink(); ?>">
                  <h2 class="black-link pe-3"><?php the_title(); ?></h2>
                </a>
              </div>
            <?php
            else :
              if ($col_2) {
                echo '<div class="col-md-6 pe-0"><div class="row">';
                $col_2 = FALSE;
              }
            ?>
              <div class="col-md-6 pb-4">
                <a href="<?php the_permalink(); ?>">
                  <?php //the_post_thumbnail('full', array('class' => 'img-fluid pb-3 border-5 border-top border-secondary'));
                    echo '<img src="'.get_first_image(get_the_ID()).'" alt="'.get_the_title().'" class="img-fluid pb-3 w-100 border-5 border-top border-secondary">'; 
                   ?>
                    </a>
                    <div>
                      <?php echo get_link_to_topics_page(get_the_ID()); ?>
                       <span class="text-muted small"> - <?php echo meks_time_ago();  ?></span>
                    </div>
                <a href="<?php the_permalink(); ?>">
                  <h2 class="black-link pe-3"><?php the_title(); ?></h2>
                </a>
              </div>
        <?php
            endif;
            $col_1 = FALSE;
          endforeach;
          echo '</div></div>';
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>
  </section>

  <section class="add-1">
    <div class="container">
      <div class="row mx-0 border-bottom py-4">
        <?php
        $tec2_featured_posts = get_field('tec_select_2nd_section_posts');
        if ($tec2_featured_posts) :
          $firsttabclass = TRUE;
        ?>

          <?php foreach ($tec2_featured_posts as $post) :

            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post);
            
          ?>
            <div class="col-md-3 position-relative <?php if ($firsttabclass) echo ''; ?>  pb-4 ps-md-0 pe-md-3 bor-col">
              <div class="d-flex im-text">
                <a class="col-md-12 col-3 position-relative" href="<?php the_permalink(); ?>">
                  <?php //the_post_thumbnail('full', array('class' => 'img-fluid'));   
                  echo '<img src="'.get_first_image(get_the_ID()).'" alt="'.get_the_title().'" class="img-fluid" width="700">'; 
                  ?>
                  <?php if (get_field('is_sponsored')=="True") : ?>
                    <div class="sponsored-item">Sponsored</div>
                  <?php endif; ?>
                </a>
                <div class="lnk-txt">
                  <?php echo get_link_to_topics_page(get_the_ID()); ?>
                  <span class="text-muted small">-<?php echo meks_time_ago(); ?></span>
                  <a href="<?php the_permalink(); ?>">
                    <h2 class="black-link"><?php the_title(); ?> </h2>
                  </a>
                </div>
              </div>
            </div>
          <?php
            $firsttabclass = FALSE;
          endforeach; ?>

          <?php
          // Reset the global post object so that the rest of the page works correctly.
          wp_reset_postdata(); ?>
        <?php endif; ?>



        <div class="col-md-3 offset-md-0 col-sm-6 pe-md-0 offset-sm-3">
          <?php
          if (get_field('add_google_advert_code_2')) :
            the_field('add_google_advert_code_2');
          else :
          ?>
            <a href="javascript:void(window.open(clickTag))">
              <video class="img-fluid w-100" src="<?php echo get_template_directory_uri(); ?>/assets/images/im_4.mp4" type="video/mp4" autoplay="" loop="" muted="">
              </video>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="videos bg-light mt-5 py-5">
    <div class="container py-md-3">
      <h4 class="text-secondary fw-bold heading mb-3">Videos</h4>
      <div class="row mx-0">
        <div class="col-md-4 ps-md-0">
          <div class="position-relative">
            <a href="#" class="video-panel__link" data-bs-toggle="modal" data-src="https://player.vimeo.com/video/<?php the_field('add_video_id_1'); ?>" data-bs-target="#videomodel">
              <img class="img-fluid w-100" src="<?php echo getVimeoVideoThumbnailByVideoId(get_field('add_video_id_1'), 'large'); ?>">
              <span class="video-panel-overlay d-block position-absolute top-0 w-100 h-100">
                <span class="material-icons position-absolute top-50 start-50 translate-middle text-secondary fs-1">
                  play_arrow
                </span>
              </span>
            </a>
          </div>
          <header>
           
              <?php echo get_link_to_topics_page(get_field('page_to_be_displayed_below_1')); ?>
            <h3 class="">
              <a class="black-link" href="<?php echo get_the_permalink(get_field('page_to_be_displayed_below_1')); ?>"><?php echo get_the_title(get_field('page_to_be_displayed_below_1')); ?></a>
            </h3>
          </header>
        </div>
        <div class="col-md-4 ps-md-0">
          <div class="position-relative">
            <a href="#" class="video-panel__link" data-bs-toggle="modal" data-src="https://player.vimeo.com/video/<?php the_field('add_video_id_2'); ?>" data-bs-target="#videomodel">
              <img class="img-fluid w-100" src="<?php echo getVimeoVideoThumbnailByVideoId(get_field('add_video_id_2'), 'large'); ?>">
              <span class="video-panel-overlay d-block position-absolute top-0 w-100 h-100">
                <span class="material-icons position-absolute top-50 start-50 translate-middle text-secondary fs-1">
                  play_arrow
                </span>
              </span>
            </a>
          </div>
          <header>
           <?php echo get_link_to_topics_page(get_field('page_to_be_displayed_below_2')); ?>
            <h3 class="">
              <a class="black-link" href="<?php echo get_the_permalink(get_field('page_to_be_displayed_below_2')); ?>"><?php echo get_the_title(get_field('page_to_be_displayed_below_2')); ?></a>
            </h3>
          </header>
        </div>
        <div class="col-md-4 ps-md-0">
          <div class="position-relative">
            <a href="#" class="video-panel__link" data-bs-toggle="modal" data-src="https://player.vimeo.com/video/<?php the_field('add_video_id_3'); ?>" data-bs-target="#videomodel">
              <img class="img-fluid w-100" src="<?php echo getVimeoVideoThumbnailByVideoId(get_field('add_video_id_3'), 'large'); ?>">
              <span class="video-panel-overlay d-block position-absolute top-0 w-100 h-100">
                <span class="material-icons position-absolute top-50 start-50 translate-middle text-secondary fs-1">
                  play_arrow
                </span>
              </span>
            </a>
          </div>
          <header>
           <?php echo get_link_to_topics_page(get_field('page_to_be_displayed_below_3')); ?>
            <h3 class="">
              <a class="black-link" href="<?php echo get_the_permalink(get_field('page_to_be_displayed_below_3')); ?>"><?php echo get_the_title(get_field('page_to_be_displayed_below_3')); ?></a>
            </h3>
          </header>
        </div>

        <!-- Video Model Box Stats Here -->
        <div class="modal fade" id="videomodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="btn-close itisaclose" data-bs-dismiss="modal" aria-label="Close"></button>
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                  <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay">
                  </iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Video Model Box Ends Here -->
      </div>
    </div>
  </section>

  <section class="magazines py-5 bg-primary">
    <div class="container py-md-3">
      <h2 class="text-white black-link">Magazines</h2>
      <div class="row mx-0 pt-3">
        <?php
        //$args = array('post_type' => 'magazines', 'posts_per_page' => 4);
        $args = [
      'posts_per_page'         => 4,
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
            'terms'    => array( 96, 97 ),
         ],
      ],
   ];
        $the_query = new WP_Query($args);
        ?>
        <?php if ($the_query->have_posts()) : ?>
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <div class="col-md-3 ps-md-0 pe-md-3">
              <div class="pb-3">
                <a href="<?php the_permalink(); ?>">
                  <?php //the_post_thumbnail('full', array('class' => ' img-fluid'));   ?>
                  <?php
                    	if ( has_post_thumbnail() ) { 
				the_post_thumbnail('medium', array('class' => 'img-fluid w-100'));
			}
                        else {
                            $url =  get_first_image(get_the_ID());
                            echo '<img src="'.$url.'" "class" = "img-fluid w-100" alt="'.get_the_title().'" width="294">';
                        }
                    ?>  
					</a>
              </div>
              <header>

                <?php echo wpdocs_example_get_the_terms('magazine_category'); ?>
                <span class="text-white small">- <?php echo meks_time_ago(); ?></span>
                <h3 class="border-right">
                  <a class="black-link text-white" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
              </header>
            </div>

          <?php endwhile;
          wp_reset_postdata(); ?>
        <?php else :  ?>
          <p><?php _e('Sorry, no magzines matched your criteria.'); ?></p>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="insight pt-5">
    <div class="container border-bottom">
      <div class="d-flex justify-content-between align-items-center pb-4 px-md-0 px-3">
        <h3 class="text-secondary fw-bold heading"><?php the_field('ianda_enter_section_title') ?></h3>
        <a href="<?php echo esc_url(get_field('ianda_selection_section_link')); ?>" class="text-secondary pe-md-2">View all</a>
      </div>
      <div class="row mx-0">

        <?php
        $insighanalysis1 = get_field('ianda_first_section_posts');
        $col_1 = TRUE;
        $col_2 = TRUE;
        $col_2_close = FALSE;
        if ($insighanalysis1) :
          foreach ($insighanalysis1 as $post) :
            setup_postdata($post);
            
            if ($col_1) :
        ?>
              <div class="col-md-6 ps-md-0 mb-3">
                <a href="<?php the_permalink(); ?>">
                  <?php //the_post_thumbnail('full', array('class' => 'img-fluid border-5 border-top border-secondary'));   ?>
                   <?php 
                        if (has_post_thumbnail())
                        {
                            the_post_thumbnail('full', array('class' => 'img-fluid border-5 border-top border-secondary'));
                        }
                        else {
                            echo '<img src="'.get_first_image(get_the_ID()).'" alt="'.get_the_title().'" class="img-fluid">'; 
                        }
                    ?> 
                </a>
                <?php echo get_link_to_topics_page(get_the_ID()); ?>
                <span class="text-muted small">- <?php echo meks_time_ago(); ?></span>
                <a href="<?php the_permalink(); ?>">
                  <h2 class="black-link pe-3"><?php the_title(); ?></h2>
                </a>
              </div>
            <?php
            else :
              if ($col_2) {
                echo '<div class="col-md-6"><div class="row">';
                $col_2 = FALSE;
              }
            ?>
              <div class="col-md-6 pb-4">
                <a href="<?php the_permalink(); ?>">
                  <?php //the_post_thumbnail('full', array('class' => 'img-fluid pb-3 border-5 border-top border-secondary'));   ?>
                <?php 
                        if (has_post_thumbnail())
                        {
                           the_post_thumbnail('full', array('class' => 'img-fluid pb-3 border-5 border-top border-secondary')); 
                        }
                        else {
                            echo '<img src="'.get_first_image(get_the_ID()).'" alt="'.get_the_title().'" class="img-fluid">'; 
                        }
                    ?>
                </a>
               <?php echo get_link_to_topics_page(get_the_ID()); ?>
                <span class="text-muted small">- <?php echo meks_time_ago(); ?></span>
                <a href="<?php the_permalink(); ?>">
                  <h2 class="black-link pe-3"><?php the_title(); ?></h2>
                </a>
              </div>
        <?php
            endif;
            $col_1 = FALSE;
          endforeach;
          echo '</div></div>';
          wp_reset_postdata();
        endif;
        ?>

      </div>
    </div>
  </section>

  <section class="add-1">
    <div class="container">
      <div class="row mx-0 py-4 border-bottom">
        <?php
        $insighanalysis2 = get_field('ianda_2nd_select_section_posts');
        if ($tec2_featured_posts) :
          $firsttabclass = TRUE;
        ?>

          <?php foreach ($insighanalysis2 as $post) :

            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post);
           
          ?>
            <div class="col-md-3 position-relative <?php if ($firsttabclass) echo 'ps-md-0'; ?>  pb-4 ps-md-0 bor-col">
              <div class="d-flex im-text">
                <a class="col-md-12 col-3 position-relative" href="<?php the_permalink(); ?>">
                  <?php //the_post_thumbnail('full', array('class' => 'img-fluid'));   ?>
                    <?php 
                        if (has_post_thumbnail())
                        {
                            the_post_thumbnail('full', array('class' => 'img-fluid'));
                        }
                        else {
                            echo '<img src="'.get_first_image(get_the_ID()).'" alt="'.get_the_title().'" class="img-fluid">'; 
                        }
                    ?>
                  <?php if (get_field('is_sponsored') == "True") : ?>
                    <div class="sponsored-item">Sponsored</div>
                  <?php endif; ?>
                </a>
                <div class="lnk-txt">
                 <?php echo get_link_to_topics_page(get_the_ID()); ?>
                  <span class="text-muted small">-<?php echo meks_time_ago(); ?></span>
                  <a href="<?php the_permalink(); ?>">
                    <h2 class="black-link"><?php the_title(); ?> </h2>
                  </a>
                </div>
              </div>
            </div>
          <?php
            $firsttabclass = FALSE;
          endforeach; ?>

          <?php
          // Reset the global post object so that the rest of the page works correctly.
          wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="womens py-5 mt-5 bg-primary">
    <div class="container py-md-3">
      <h2 class="text-white black-link">Women in Treasury</h2>
      <div class="row mx-0 pt-3">
        <?php
        $women_posts = get_field('select_women');
        if ($featured_posts) :
          foreach ($women_posts as $post) :
            setup_postdata($post);
            $termname = wp_get_post_terms(get_the_ID(), 'ttomen_category', array("fields" => "names"));


        ?>
            <div class="col-md-3 ps-md-0">
              <div class="pb-3 position-relative">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('full', array('class' => 'img-fluid'));   ?>
                  <a href="<?php the_permalink(); ?>" class="wom-link position-absolute text-white bg-secondary px-3 py-md-0 py-1">
                    <span class="small d-block"><?php echo get_the_date('M'); ?></span>

                    <span class="d-block black-link text-white">
                      <?php echo get_the_date('Y'); ?>
                    </span>
                    <span class="d-block material-icons">
                      arrow_forward
                    </span>
                  </a>
              </div>
              <header>
                <a class="text-secondary small" href="#"><?php echo $termname[0]; ?></a>
                <span class="text-white small">- <?php echo meks_time_ago(); ?></span>
                <h3 class="border-right">
                  <a class="black-link text-white" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
              </header>
            </div>

        <?php
          endforeach;
          wp_reset_postdata();
        endif;
        ?>


      </div>
    </div>
  </section>

  <section class="insight pt-5 cashliquiditymanagement ">
    <div class="container border-bottom">
      <div class="d-flex justify-content-between align-items-center pb-4 px-md-0 px-3">
        <h3 class="text-secondary fw-bold heading"><?php the_field('cash_enter_section_title') ?></h3>
        <a href="<?php echo esc_url(get_field('cash_select_section_link')); ?>" class="text-secondary pe-md-2">View all</a>
      </div>
      <div class="row mx-0">
        <?php
        $clm_featured_posts = get_field('cash_first_section_posts');
        $col_1 = TRUE;
        $col_2 = TRUE;
        $col_2_close = FALSE;
        if ($tec_featured_posts) :
          foreach ($clm_featured_posts as $post) :
            setup_postdata($post);
            $categories = get_the_category(get_the_ID());
           
            if ($col_1) :
        ?>
              <div class="col-md-6 ps-md-0 mb-3">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('full', array('class' => 'img-fluid border-5 border-top border-secondary'));   ?></a>
                <?php echo get_link_to_topics_page(get_the_ID()); ?>
                <span class="text-muted small">- <?php echo meks_time_ago(); ?></span>
                <a href="<?php the_permalink(); ?>">
                  <h2 class="black-link pe-3"><?php the_title(); ?></h2>
                </a>
              </div>
            <?php
            else :
              if ($col_2) {
                echo '<div class="col-md-6"><div class="row">';
                $col_2 = FALSE;
              }
            ?>
              <div class="col-md-6 pb-4">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100 pb-3 border-5 border-top border-secondary'));   ?></a>
               <?php echo get_link_to_topics_page(get_the_ID()); ?>
                <span class="text-muted small">- <?php echo meks_time_ago(); ?></span>
                <a href="<?php the_permalink(); ?>">
                  <h2 class="black-link pe-3"><?php the_title(); ?></h2>
                </a>
              </div>
        <?php
            endif;
            $col_1 = FALSE;
          endforeach;
          echo '</div></div>';
          wp_reset_postdata();
        endif;
        ?>





      </div>
    </div>
  </section>

  <section class="add-1 pb-5">
    <div class="container">
      <div class="row mx-0 py-4 border-bottom">
        <?php
        $cash_featured_posts = get_field('cash_select_2nd_section_posts');
        if ($cash_featured_posts) :
          $firsttabclass = TRUE;
        ?>

          <?php foreach ($cash_featured_posts as $post) :

            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post);
           
          ?>
            <div class="col-md-3 position-relative <?php if ($firsttabclass) echo 'ps-md-0'; ?>  pb-4 ps-md-0 bor-col">
              <div class="d-flex im-text">
                <a class="col-md-12 col-3 position-relative" href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('full', array('class' => 'img-fluid'));   ?>
                  <?php if (get_field('is_sponsored') == "True") : ?>
                    <div class="sponsored-item">Sponsored</div>
                  <?php endif; ?>
                </a>
                <div class="lnk-txt">
                  <?php echo get_link_to_topics_page(get_the_ID()); ?>
                  <span class="text-muted small">-<?php echo meks_time_ago(); ?></span>
                  <a href="<?php the_permalink(); ?>">
                    <h2 class="black-link"><?php the_title(); ?> </h2>
                  </a>
                </div>
              </div>
            </div>
          <?php
            $firsttabclass = FALSE;
          endforeach; ?>

          <?php
          // Reset the global post object so that the rest of the page works correctly.
          wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="videos bg-light mt-5">
    <div class="container py-5">
      <h4 class="text-secondary fw-bold heading mb-3">Videos</h4>
      <div class="row mx-0">
        <div class="col-md-4 ps-md-0">
          <div class="position-relative">
            <a href="#" class="video-panel__link" data-bs-toggle="modal" data-src="https://player.vimeo.com/video/<?php the_field('lr_vimeo_video_id_1'); ?>" data-bs-target="#videomodel">
              <img class="img-fluid w-100" src="<?php echo getVimeoVideoThumbnailByVideoId(get_field('lr_vimeo_video_id_1'), 'large'); ?>">
              <span class="video-panel-overlay d-block position-absolute top-0 w-100 h-100">
                <span class="material-icons position-absolute top-50 start-50 translate-middle text-secondary fs-1">
                  play_arrow
                </span>
              </span>
            </a>
          </div>
          <header>
              <?php echo get_link_to_topics_page(get_field('lr_page_to_be_displayed_below_1')); ?>
          
            <h3 class="">
              <a class="black-link" href="<?php echo get_the_permalink(get_field('lr_page_to_be_displayed_below_1')); ?>"><?php echo get_the_title(get_field('lr_page_to_be_displayed_below_1')); ?></a>
            </h3>
          </header>
        </div>
        <div class="col-md-4 ps-md-0">
          <div class="position-relative">
            <a href="#" class="video-panel__link" data-bs-toggle="modal" data-src="https://player.vimeo.com/video/<?php the_field('lr_vimeo_video_id_2'); ?>" data-bs-target="#videomodel">
              <img class="img-fluid w-100" src="<?php echo getVimeoVideoThumbnailByVideoId(get_field('lr_vimeo_video_id_2'), 'large'); ?>">
              <span class="video-panel-overlay d-block position-absolute top-0 w-100 h-100">
                <span class="material-icons position-absolute top-50 start-50 translate-middle text-secondary fs-1">
                  play_arrow
                </span>
              </span>
            </a>
          </div>
          <header>
          <?php echo get_link_to_topics_page(get_field('lr_page_to_be_displayed_below_2')); ?>
            <h3 class="">
              <a class="black-link" href="<?php echo get_the_permalink(get_field('lr_page_to_be_displayed_below_2')); ?>"><?php echo get_the_title(get_field('lr_page_to_be_displayed_below_2')); ?></a>
            </h3>
          </header>
        </div>
        <div class="col-md-4 ps-md-0">
          <div class="position-relative">
            <a href="#" class="video-panel__link" data-bs-toggle="modal" data-src="https://player.vimeo.com/video/<?php the_field('lr_vimeo_video_id_3'); ?>" data-bs-target="#videomodel">
              <img class="img-fluid w-100" src="<?php echo getVimeoVideoThumbnailByVideoId(get_field('lr_vimeo_video_id_3'), 'large'); ?>">
              <span class="video-panel-overlay d-block position-absolute top-0 w-100 h-100">
                <span class="material-icons position-absolute top-50 start-50 translate-middle text-secondary fs-1">
                  play_arrow
                </span>
              </span>
            </a>
          </div>
          <header>
           <?php echo get_link_to_topics_page(get_field('lr_page_to_be_displayed_below_3')); ?>
            <h3 class="">
              <a class="black-link" href="<?php echo get_the_permalink(get_field('lr_page_to_be_displayed_below_3')); ?>"><?php echo get_the_title(get_field('lr_page_to_be_displayed_below_3')); ?></a>
            </h3>
          </header>
        </div>


      </div>
    </div>
  </section>
  <?php get_footer(); ?>