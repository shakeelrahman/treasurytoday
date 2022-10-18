<?php
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
           <h2 class="text-primary list_heading"><?php echo esc_html( $featured_post->post_title ); ?></h2>
          <p class="fst-italic"><?php echo esc_html( $featured_post->post_excerpt ); ?></p>
          </div>
          <div class="col-xl-6">
          <?php
            echo get_the_post_thumbnail( $featured_post->ID, 'full',array('class' => 'img-fluid border-top border-5 border-secondary') ); 
            ?>
          </div>
          <div class="col-xl-3 pe-md-0">
            <h2 class="text-secondary list_heading mt-md-0 mt-3">You might also be interested in...</h2>
            <?php
				$interestedin = get_field('you_might_also_be_interested_in');
				if( $interestedin ): 
			?>
				    <ul class="list-group list-group-flush">
				    <?php foreach( $interestedin as $post ):
				        setup_postdata($post); 
				        $categories = get_the_category(get_the_ID());
								if ( ! empty( $categories ) ) {
								    		$setpermalinkcat = '<a class="text-secondary small" href="' . esc_url( get_category_link( $categories[1]->term_id ) ) . '">' . esc_html( $categories[1]->name ) . '</a>';
								}
				    ?>
				    <li class="list-group-item ps-0">
			            <?php echo $setpermalinkcat; ?> 
			            <span class="text-muted small">-<?php the_date(); ?></span>
			            <p class="fw-bold mb-0"><a href="#"><?php the_title(); ?></a></p>
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

    <section class="news my-5">
      <div class="container">
        <div class="row mx-0">
         <div class="col-md-10 px-0">
           <nav aria-label="Page navigation" class="border-top border-bottom d-flex align-items-center justify-content-between">
             <div>
        <ul class="pagination mb-0 py-3 d-flex flex-wrap">        
         <li class="page-item">
           <a href="javascript: void(0)" class="page-link border-0">All</a>
         </li>
          <li class="page-item d-none d-md-block">
           <a href="javascript: void(0)" class="page-link border-0">Globe Trade</a>
         </li>
          <li class="page-item d-none d-md-block">
           <a href="javascript: void(0)" class="page-link border-0">Supplier Finance</a>
         </li>
         <li class="page-item d-none d-md-block">
           <a href="javascript: void(0)" class="page-link border-0">Trade Digitisation</a>
         </li>
         <li class="page-item d-none d-md-block">
           <a href="javascript: void(0)" class="page-link border-0">Trade Finance</a>
         </li>
         </div>
     
      <div class="d-flex">
          <li class="page-item d-none d-md-block">
           <a class="page-link border-0" href="javascript: void(0)" aria-label="Previous">
             <span aria-hidden="true">&laquo;</span>
           </a>
         </li>
         <li class="page-item d-none d-md-block"><a class="page-link border-0" href="javascript: void(0)">1</a></li>
         <li class="page-item d-none d-md-block"><a class="page-link border-0" href="javascript: void(0)">2</a></li>
         <li class="page-item d-none d-md-block"><a class="page-link border-0" href="javascript: void(0)">3</a></li>
         <li class="page-item d-none d-md-block">
           <a class="page-link border-0" href="javascript: void(0)" aria-label="Next">
             <span aria-hidden="true">&raquo;</span>
           </a>
         </li>
         <li class="page-item text-end dropdown d-block d-md-none">
     <a class="page-link dropdown-toggle border-0" href="javascript:void(0)" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
      <span class="material-icons expand">
        expand_more
      </span>
     </a>
       <div class="dropdown-menu">
        <ul class="dropdown-inner list-unstyled ps-2" aria-labelledby="navbarDropdown">
           <li><a class="dropdown-link" href="javascript:void(0)">Interview</a></li>
           <li><a class="dropdown-link" href="javascript:void(0)">News & Press release</a></li>
           <li><a class="dropdown-link" href="javascript:void(0)">Short reads</a></li>
           </ul>
       </div>
         </li>
</div>
</ul>
     </nav>
      <div class="py-5">
        <div class="row mx-0">
         <?php echo wpb_postsbycategory(); ?>
         <div class="loadmore">Load More...</div>
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