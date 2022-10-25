<?php
get_header();
if (have_posts()) :
    while (have_posts()) : the_post();

?>
        <section>
            <div class="container py-5">
                <div class="top-section border-5 border-bottom border-secondary pb-4">
                    <a href="javascript:void(0)" class="text-secondary small">Treasury Practice</a>
                    <h2 class="fw-bold text-secondary fs-1 mt-3">
                        <?php the_title(); ?>
                    </h2>
                    <h6 class="text-primary mt-2">Published: <?php the_date('M-Y') ?></h6>
                </div>
                <div class="row mx-0 py-5">
                    <div class="col-md-9 px-0">

                        <?php if (!isset($_SESSION['user_name'])) : ?>
                           <div class="excerpt_italic" style="font-style: italic;"> 
                               <?php 
                                if(has_excerpt()){
									the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']);
                                    the_excerpt();
									
                                }
                                else
                                {
                                    echo wpshout_the_short_content(600); 
                                }
                                    
                               ?>
                           </div>
                            <?php get_template_part('registerpage') ?>
                        <?php
                        else :
                            /*if (has_post_thumbnail()) {
                                the_post_thumbnail('full', ['class' => 'img-fluid']);
                            }*/
                            the_content();
                        endif;
                        ?>

                    </div>
<div class="col-md-3 ">
        <div class="widget-1">
                <img src="http://treasurytoday.imobisoft.uk/wp-content/uploads/2022/09/sidebarbanner1.jpg" alt="side1" class="img-fluid w-100">
        </div>
        <div class="widget-2">
                <img src="http://treasurytoday.imobisoft.uk/wp-content/uploads/2022/09/sidebarbanner3.jpg" alt="side1" class="img-fluid w-100">
        </div>


        <div class="widget-3">
                <img src="http://treasurytoday.imobisoft.uk/wp-content/uploads/2022/09/sidebarbanner2.jpg" alt="side1" class="img-fluid w-100">
        </div>
</div>
				</div>
            </div>
        </section>
<?php
    endwhile;
endif;
get_footer();

?> 