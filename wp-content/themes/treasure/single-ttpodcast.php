<?php
get_header();
if (have_posts()) :
    while (have_posts()) : the_post();

?>
        <section>
            <div class="container py-5">
                <div class="row mx-0 py-5">
                    <div class="col-md-12">
                        <?php 
                            if ( has_post_thumbnail() ) 
                                the_post_thumbnail('full', array( 'class' => 'img-fluid' ));
                            else
                                echo '<h2 class="podcastheading">'. get_the_title().'</h2>';
                        ?>
                    </div>
                </div>
                <div class="row mx-0 py-5">
                    <div class="col-md-9 px-0">

                        <?php
                       
                            the_content();
                        
                        ?>

                    </div>
				
	</div>
            </div>
        </section>
<?php
    endwhile;
endif;
get_footer();
?> 