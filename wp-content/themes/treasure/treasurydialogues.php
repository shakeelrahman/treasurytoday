<?php
/*
Template Name: Dialogues 2020
*/
get_header();
if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
?>
<div id="content">
    <section class="parallex-1">
        <div class="container text-white py-5">
            <div class="text-end">
                <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/citi-logo.png" alt="citi-logo" width="100">
            </div>
            <div class="row mx-0">
                <div class="col-md-6">
                    <?php the_field('r1_left_text');?>
                    
                </div>
                <div class="col-md-6 align-self-end offset-md-6 mt-md-0 mt-4 times">
                    <?php the_field('r1_right_text'); ?>
                </div>
            </div>
        </div>
    </section>
    <div class="position-relative">
        <div class="video position-absolute top-0 start-0 w-100 h-100 overflow-hidden">
            <div class="text-center position-absolute top-0 start-50 mt-5">
                <a href="" class="btn btn-secondary rounded-pill px-4 fw-bold">Read the full article</a>
            </div>
            <video class="position-absolute top-50 start-50 video-parallex" disablepictureinpicture="" controlslist="nodownload" frameborder="0" allowfullscreen="" autoplay="" loop="" id="myVideo" muted="">
                <source src="<?php echo get_template_directory_uri(); ?>/assets/images/submerged-material-3163534.mp4" type="video/mp4">
            </video>
        </div>
        <div class="container py-5 text-center text-white position-relative top-0 start-0 d-flex flex-column align-items-center justify-content-center h-100">
            <div class="bg-white" width="">
                <?php
                    $image = get_field('r2_select_image');
                   
                ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid" width="180">
               
            </div>
            <h2 class="fw-bold fs-1"><?php the_field('r2_enter_heading'); ?></h2>
            <p class="fw-bold fs-4"><?php the_field('r2_enter_section_content') ?></p>
            <?php if( have_rows('r2_links') ): ?>
            <div>
                    <?php
                        while( have_rows('r2_links') ) : the_row();
                            $link = get_sub_field('add_button');
                    ?>
                        <a href="<?php echo $link['url']; ?>" class="btn btn-secondary rounded-pill px-4 fw-bold mb-3 me-md-3">
                            <?php echo $link['title'];?>
                        </a>
                
                    <?php 
                        endwhile; 
                    ?>
            </div>
            <?php endif;?>
        </div>
    </div>
    <div class="parallex-2">
        <div class="container text-center text-white py-5">
            <div class="row mx-0">
                <div class="col-md-6">
                    <?php the_field('r3_add_content') ?>
             
                    <?php if( have_rows('r3_links') ): ?>
            <div>
                    <?php
                        $i = 'me-md-3';
                        while( have_rows('r3_links') ) : the_row();
                            $link = get_sub_field('r3_add_button');
                    ?>
                        <a href="<?php echo $link['url']; ?>" class="btn mb-3 btn-secondary rounded-pill px-4 fw-bold <?php echo $i; ?>">
                            <?php echo $link['title'];?>
                        </a>
                
                    <?php 
                        $i="";
                        endwhile; 
                    ?>
            </div>
            <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <div class="position-relative">
        <div class="video position-absolute top-0 start-0 w-100 h-100 overflow-hidden">
            <div class="text-center position-absolute top-0 start-50 mt-5">
                <a href="" class="btn btn-secondary rounded-pill px-4 fw-bold">Read the full article</a>
            </div>
            <video class="position-absolute top-50 start-50 video-parallex" disablepictureinpicture="" controlslist="nodownload" frameborder="0" allowfullscreen="" autoplay="" loop="" id="myVideo" muted="">
                <source src="<?php echo get_template_directory_uri(); ?>/assets/images/veem-technology-background-1080p.mp4" type="video/mp4">
            </video>
        </div>
        <div class="container py-5 text-center text-white position-relative top-0 start-0 d-flex flex-column align-items-center justify-content-center h-100">
            <div class="bg-white">
                <?php
                    $image2 = get_field('r4_logo');
                   
                ?>
                <img src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" class="img-fluid" width="180">
               
            </div>
            <h2 class="fw-bold fs-1"><?php the_field('r4_section_heading'); ?></h2>
            <p class="fw-bold fs-4"><?php the_field('r4_section_text') ;?></p>
           
             <?php if( have_rows('r4_links_copy') ): ?>
                <div>
                        <?php
                            $i = 'me-md-3';
                            while( have_rows('r4_links_copy') ) : the_row();
                                $link = get_sub_field('r4_add_button');
                        ?>
                            <a href="<?php echo $link['url']; ?>" class="btn btn-secondary rounded-pill px-4 fw-bold mb-3 <?php echo $i; ?>">
                                <?php echo $link['title'];?>
                            </a>

                        <?php 
                            $i="";
                            endwhile; 
                        ?>
                </div>
            <?php endif;?>
        </div>
    </div>
    <div class="parallex-3">
        <div class="container text-white py-5">
            <h2 class="py-3"><?php the_field('r5_section_heading_copy') ?></h2>
            <p><?php the_field('r5_section_text_copy'); ?></p>
             <?php
                    $image3 = get_field('r5_logo_copy');
                   
                ?>
                <img src="<?php echo esc_url($image3['url']); ?>" alt="<?php echo esc_attr($image3['alt']); ?>" class="bg-white mb-3 py-2 px-4" width="150">
           <?php if( have_rows('r5_links_copy2') ): ?>
                <div class="text-center">
                        <?php
                            $i = 'me-md-3';
                            while( have_rows('r5_links_copy2') ) : the_row();
                                $link = get_sub_field('r5_add_button');
                        ?>
                            <a href="<?php echo $link['url']; ?>" class="btn btn-secondary rounded-pill px-4 fw-bold mb-3 <?php echo $i; ?>">
                                <?php echo $link['title'];?>
                            </a>

                        <?php 
                            $i="";
                            endwhile; 
                        ?>
                </div>
            <?php endif;?>
            
        </div>
    </div>
    <div class="position-relative">
        <div class="video position-absolute top-0 start-0 w-100 h-100 overflow-hidden">
            <div class="text-center position-absolute top-0 start-50 mt-5">
                <a href="" class="btn btn-secondary rounded-pill px-4 fw-bold">Read the full article</a>
            </div>
            <video class="position-absolute top-50 start-50 video-parallex" disablepictureinpicture="" controlslist="nodownload" frameborder="0" allowfullscreen="" autoplay="" loop="" id="myVideo" muted="">
                <source src="<?php echo get_template_directory_uri(); ?>/assets/images/tt-kenya-airways-v2-100320.mp4" type="video/mp4">
            </video>
        </div>
        <div class="container py-5 h-75 text-center position-relative top-0 start-0 d-flex flex-column align-items-center justify-content-center h-100">
            <div class="my-3 py-5 px-3 bg-op">
                <h3 class="fw-bold"><?php the_field('r6_section_heading') ?></h3>
                <p class="fw-bold fs-4"><?php the_field('r6_section_text') ?></p>
                
                 <?php if( have_rows('r6_links') ): ?>
                <div>
                        <?php
                            $i = 'me-md-3';
                            while( have_rows('r6_links') ) : the_row();
                                $link = get_sub_field('r6_add_button');
                        ?>
                            <a href="<?php echo $link['url']; ?>" class="btn btn-secondary rounded-pill px-4 fw-bold mb-3 <?php echo $i; ?>">
                                <?php echo $link['title'];?>
                            </a>

                        <?php 
                            $i="";
                            endwhile; 
                        ?>
                </div>
            <?php endif;?>
            </div>
        </div>
    </div>
    <div class="parallex-4">
        <div class="container text-white py-5">
            <?php the_field('r7_section_content') ?>
             <?php if( have_rows('r7_add_imageslogos') ): ?>
            <div class="logos d-inline-block">
               <?php 
               while( have_rows('r7_add_imageslogos') ) : the_row();
               ?>
                <a href="<?php the_sub_field('r7_select_image_link') ?>">
                   <div class="mb-3 d-flex bg-white justify-content-center">
                       <img src="<?php the_sub_field('r7_select_image') ?>" alt="" class="" width="150">
                   </div>
                </a>
              <?php endwhile;?>  
            </div>
            <?php endif;?>
        </div>
    </div>
    
</div>

<?php
  endwhile; 
endif;
get_footer();