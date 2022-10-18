<?php
add_action( 'wp_ajax_demo_pagination_posts', 'demo_pagination_posts' );
add_action( 'wp_ajax_nopriv_demo_pagination_posts', 'demo_pagination_posts' ); 

function demo_pagination_posts() {
  global $wpdb;
  $msg = '';
  if(isset($_POST['page'])){
    $page = sanitize_text_field($_POST['page']);
    $cur_page = $page;
    $page -= 1;
    $per_page = 2;
    $previous_btn = true;
    $next_btn = true;
    $start = $page * $per_page;

    // Set the table where we will be querying data
    $table_name = $wpdb->prefix . "posts";

    // Query the posts
    $all_blog_posts = $wpdb->get_results($wpdb->prepare("
      SELECT * FROM " . $table_name . " WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC LIMIT %d, %d", $start, $per_page ) );

    // At the same time, count the number of queried posts
      $count = $wpdb->get_var($wpdb->prepare("
      SELECT COUNT(ID) FROM " . $table_name . " WHERE post_type = 'post' AND post_status = 'publish'", array() ) );

    // Loop into all the posts
    foreach($all_blog_posts as $key => $post): 
      $msg .= '
      <div class = "col-md-12">       
        <h2>' . $post->post_title . '</a></h2>
        <p>' . $post->post_content . '</p>
      </div>';
    endforeach;
   
    $no_of_paginations = ceil($count / $per_page);
    if ($cur_page >= 7) {
      $start_loop = $cur_page - 3;
      if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
      else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
      } else {
        $end_loop = $no_of_paginations;
      }
    } else {
      $start_loop = 1;
      if ($no_of_paginations > 7)
        $end_loop = 7;
      else
        $end_loop = $no_of_paginations;
    }

    // Pagination Buttons     
    $pag_container .= "
    <div class='pagination-link'>
      <ul>";
        if ($previous_btn && $cur_page > 1) {
          $pre = $cur_page - 1;
          $pag_container .= "<li p='$pre' class='active'>Previous</li>";
        } else if ($previous_btn) {
          $pag_container .= "<li class='inactive'>Previous</li>";
        }
        for ($i = $start_loop; $i <= $end_loop; $i++) {
          if ($cur_page == $i)
            $pag_container .= "<li p='$i' class = 'selected' >{$i}</li>";
          else
            $pag_container .= "<li p='$i' class='active'>{$i}</li>";
        }
        if ($next_btn && $cur_page < $no_of_paginations) {
          $nex = $cur_page + 1;
          $pag_container .= "<li p='$nex' class='active'>Next</li>";
        } else if ($next_btn) {
          $pag_container .= "<li class='inactive'>Next</li>";
        }
        $pag_container = $pag_container . "
      </ul>
    </div>";
    echo 
    '<div class = "pagination-content">' . $msg . '</div>' . 
    '<div class = "pagination-nav">' . $pag_container . '</div>';
  }
  die();
}
?>