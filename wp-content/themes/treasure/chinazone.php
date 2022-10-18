<?php 
/*
 * Template Name: Chinese Zone Frontpage
 */
get_header(); 
?>
<div id="content">
    <section class="banner">
      <div class="container py-4">
        <div class="row mx-0">
          <div class="col-md-3 ps-md-0">
           <h2 class="text-secondary list_heading">头条</h2>
           <?php $featured_post = get_field('select_featured_article'); ?>
           <h2 class="text-primary list_heading"><?php echo esc_html( $featured_post->post_title ); ?></h2>
           <p class="small text-secondary">科技</p>
           <p class="fst-italic">
               <?php 
                    if (!empty($featured_post->post_excerpt))
                        echo $featured_post->post_excerpt;
                    else {
                        //echo $fptopstory;
                        echo substr(wp_strip_all_tags( $featured_post->post_content ),0,250);
                        echo "......";
                    }
                    $url =  get_first_image($featured_post->ID);
          ?>
           </p>
          </div>
          <div class="col-md-6">
              <img class="img-fluid border-top border-5 border-secondary" src="<?php echo $url; ?>" alt="<?php echo esc_html( $featured_post->post_title ); ?>" width="100%">
          </div>
          <div class="col-md-3 pe-md-0">
            <h2 class="text-secondary list_heading">Trending</h2>
            <ul class="list-group list-group-flush">
                <?php
                    $trending_posts = get_field('select_trending_posts');
                    if( $trending_posts ): ?>
                        
                        <?php 
                            foreach( $trending_posts as $post ): 
                            setup_postdata($post); 
                        ?>
                            <li class="list-group-item ps-0">
                                <a class="text-secondary small" href="#">另类融资</a> 
                                <span class="text-muted small">- <?php echo meks_time_ago(); ?></span>
                                <p class="fw-bold mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                            </li>
                <?php 
                             endforeach; 
                             wp_reset_postdata(); 
                    endif; 
                ?>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="add-1">
      <div class="container py-4 border-bottom">
        <div class="row mx-0">
            <?php
                $featured_posts_two = get_field('select_posts_after_trending');
                if( $featured_posts_two ): ?>
                   
                    <?php foreach( $featured_posts_two as $post ): 

                        // Setup this post for WP functions (variable must be named $post).
                        setup_postdata($post); 
                    $url2 =  get_first_image(get_the_ID());
                    ?>
                        <div class="col-lg-3 pb-4  bor-col">
           <div class="d-flex im-text">
             <img class="col-md-12 col-4 img-fluid" src="<?php echo $url2; ?>" alt="add">
              <div class="lnk-txt">
                <a class="text-secondary small" href="#">现金管理</a> 
                <span class="text-muted small">-11 days ago</span>
                <a href="<?php the_permalink(); ?>">
                   <h2 class="black-link"><?php the_title(); ?></h2>
               </a>
             </div>
             </div>
           </div>
                    <?php 
                    endforeach; 
                     wp_reset_postdata(); 
                     endif; 
                    ?>
          
        </div>
      </div>
    </section>

   <section class="technology pt-5">
    <div class="container">
      <div class="d-flex justify-content-between pb-4 px-md-0 px-3">
        <h3 class="text-secondary fw-bold heading">财资实践</h3>
        <a href="#" class="text-secondary pe-md-2">View all</a>
      </div>
      <div class="row mx-0 border-bottom pb-3">
        <?php
        $tec_featured_posts = get_field('treasury_practice_posts_main_row');
        $col_1 = TRUE;
        $col_2 = TRUE;
        $col_2_close = FALSE;
        if ($tec_featured_posts) :
          foreach ($tec_featured_posts as $post) :
            setup_postdata($post);
           
            $setpermalinkcat = '<a class="text-secondary small" href="#">可持续性</a>';
            if ($col_1) :
        ?>
              <div class="col-md-6 ps-md-0 mb-3">
                <a href="<?php the_permalink(); ?>">
                 <?php 
                        /*if (has_post_thumbnail())
                        {
                            the_post_thumbnail('full', array('class' => 'img-fluid'));
                        }
                        else {
                            echo '<img src="'.get_first_image(get_the_ID()).'" alt="'.get_the_title().'" class="img-fluid">'; 
                        }*/
                        echo '<img src="'.get_first_image(get_the_ID()).'" alt="'.get_the_title().'" class="img-fluid border-5 mb-3 border-top border-secondary" width="700">'; 
                    ?>
                </a>
                <?php echo $setpermalinkcat; ?>
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
                  <?php //the_post_thumbnail('full', array('class' => 'img-fluid pb-3 border-5 border-top border-secondary'));
                    echo '<img src="'.get_first_image(get_the_ID()).'" alt="'.get_the_title().'" class="img-fluid pb-3 border-5 border-top border-secondary" width="700">'; 
                   ?>
                    </a>
                <?php echo $setpermalinkcat; ?>
                <span class="text-muted small">- <?php echo meks_time_ago();  ?></span>
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
      <div class="container py-4 border-bottom">
        <div class="row mx-0">
            <?php
                $featured_postsothers = get_field('treasury_practice_posts');
                
                if( $featured_postsothers ):
                    
                    ?>
                   
                    <?php 
                    foreach( $featured_postsothers as $post ): 
                        setup_postdata($post);
                        
                    $url3 =  get_first_image(get_the_ID());
                    ?>
                         <div class="col-md-3 pb-4  bor-col">
          <div class="d-flex im-text">
             <img class="col-md-12 col-4 img-fluid" src="<?php echo $url3; ?>" alt="<?php the_title();?>">
              <div class="lnk-txt">
                <a class="text-secondary small" href="javascript:void(0)">贸易融资</a>
                <span class="text-muted small">- <?php echo meks_time_ago(); ?></span>
                <a href="<?php the_permalink(); ?>"><h2 class="black-link"><?php the_title();?></h2></a>
             </div>
             </div>
          </div>
                    <?php endforeach; ?>
                   
                    <?php 
                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); ?>
                <?php endif; ?>
         
          
        </div>
      </div>
    </section>

     

    <?php get_footer(); ?>