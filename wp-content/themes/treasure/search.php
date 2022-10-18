<?php
get_header();
$s=get_search_query();
$args = array(
                's' =>$s
            );
$the_query = new WP_Query( $args );
?>
        <section>
            <div class="container py-5">
                
                <div class="row mx-0 py-5">
                    <div class="col-md-9 px-0">
                        <?php
                            if ( $the_query->have_posts() ) {
        _e("<h2 style='font-weight:bold;color:#000'>Search Results for: ".get_query_var('s')."</h2>");
        while ( $the_query->have_posts() ) {
           $the_query->the_post();
                 ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                 <?php
        }
    }else{
?>
        <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
        <div class="alert alert-info">
          <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
        </div>
<?php } ?>
                      
                    </div>
                </div>
            </div>
        </section>
<?php
get_footer();
?>