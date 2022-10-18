<?php
// Change POSTS to Topics in WP dashboard
add_action( 'admin_menu', 'pilau_change_post_menu_label' );
add_action( 'init', 'pilau_change_post_object_label' );
function pilau_change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Topics';
    $submenu['edit.php'][5][0] = 'Topics';
    $submenu['edit.php'][10][0] = 'Add Topics';
    $submenu['edit.php'][16][0] = 'Topics Tags';
    echo '';
}
function pilau_change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Topics';
    $labels->singular_name = 'Topics';
    $labels->add_new = 'Add Topics';
    $labels->add_new_item = 'Add Topics';
    $labels->edit_item = 'Edit Topics';
    $labels->new_item = 'Topics';
    $labels->view_item = 'View Topics';
    $labels->search_items = 'Search Topics';
    $labels->not_found = 'No Topics found';
    $labels->not_found_in_trash = 'No Topics found in Trash';
}   
function custom_post_magazine() {
  $labels = array(
    'name'               => _x( 'Magazines', 'post type general name' ),
    'singular_name'      => _x( 'Magazine', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'magazine' ),
    'add_new_item'       => __( 'Add New Magazine' ),
    'edit_item'          => __( 'Edit Magazine' ),
    'new_item'           => __( 'New Magazine' ),
    'all_items'          => __( 'All Magazines' ),
    'view_item'          => __( 'View Magazine' ),
    'search_items'       => __( 'Search Magazine' ),
    'not_found'          => __( 'No Magazine found' ),
    'not_found_in_trash' => __( 'No Magazine found in the Trash' ), 
    'menu_name'          => 'Magazines'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Magazine',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
    'has_archive'   => true,
  );
  register_post_type( 'magazines', $args ); 
}
add_action( 'init', 'custom_post_magazine' );
function taxonomies_magazine() {
  $labels = array(
    'name'              => _x( 'Magazine Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Magazine Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Magazine Categories' ),
    'all_items'         => __( 'All Magazine Categories' ),
    'parent_item'       => __( 'Parent Magazine Category' ),
    'parent_item_colon' => __( 'Parent Magazine Category:' ),
    'edit_item'         => __( 'Edit Magazine Category' ), 
    'update_item'       => __( 'Update Magazine Category' ),
    'add_new_item'      => __( 'Add New Magazine Category' ),
    'new_item_name'     => __( 'New Magazine Category' ),
    'menu_name'         => __( 'Magazine Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'magazine_category', 'magazines', $args );
}
add_action( 'init', 'taxonomies_magazine', 0 );

if ( ! function_exists( 'wpdocs_example_get_the_terms' ) ) {
 function wpdocs_example_get_the_terms( $taxonomy ) {
         
        $terms = get_the_terms( get_the_ID(), $taxonomy );
                          
        if ( $terms && ! is_wp_error( $terms ) ) : 
         
            $term_links = array();
      
            foreach ( $terms as $term ) {
                $term_links[] = '<a class="text-secondary small"  href="' . esc_attr( get_term_link( $term->slug, $taxonomy ) ) . '">' . __( $term->name ) . '</a>';
            }
                                 
            $all_terms = join( ', ', $term_links );
 
            echo '<span class="terms-' . esc_attr( $term->slug ) . '">' . __( $all_terms ) . '</span>';
 
        endif;
 
    }
 
}

function custom_post_woman() {
  $labels = array(
    'name'               => _x( 'Women', 'post type general name' ),
    'singular_name'      => _x( 'Woman', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'magazine' ),
    'add_new_item'       => __( 'Add New Woman' ),
    'edit_item'          => __( 'Edit Woman' ),
    'new_item'           => __( 'New Woman' ),
    'all_items'          => __( 'All Women' ),
    'view_item'          => __( 'View Woman' ),
    'search_items'       => __( 'Search Women' ),
    'not_found'          => __( 'No Woman found' ),
    'not_found_in_trash' => __( 'No Woman found in the Trash' ), 
    'menu_name'          => 'Women'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Woman',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
    'has_archive'   => true,
  );
  register_post_type( 'ttwomen', $args ); 
}
add_action( 'init', 'custom_post_woman' );
function taxonomies_women() {
  $labels = array(
    'name'              => _x( 'Women Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Woman Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Women Categories' ),
    'all_items'         => __( 'All Categories' ),
    'parent_item'       => __( 'Parent  Category' ),
    'parent_item_colon' => __( 'Parent  Category:' ),
    'edit_item'         => __( 'Edit  Category' ), 
    'update_item'       => __( 'Update  Category' ),
    'add_new_item'      => __( 'Add New  Category' ),
    'new_item_name'     => __( 'New  Category' ),
    'menu_name'         => __( 'Women Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'ttomen_category', 'ttwomen', $args );
}
add_action( 'init', 'taxonomies_women', 0 );


/*Custom Post Type Chinese Zone */
function custom_post_chinese() {
  $labels = array(
    'name'               => _x( 'Chinese', 'post type general name' ),
    'singular_name'      => _x( 'Chinese', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'magazine' ),
    'add_new_item'       => __( 'Add New ' ),
    'edit_item'          => __( 'Edit' ),
    'new_item'           => __( 'New Item' ),
    'all_items'          => __( 'All Items' ),
    'view_item'          => __( 'View Item' ),
    'search_items'       => __( 'Search Items' ),
    'not_found'          => __( 'No Item found' ),
    'not_found_in_trash' => __( 'No Item found in the Trash' ), 
    'menu_name'          => 'Chinese'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Chinese Zone',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
    'has_archive'   => true,
  );
  register_post_type( 'ttchinese', $args ); 
}
add_action( 'init', 'custom_post_chinese' );
function taxonomies_chines() {
  $labels = array(
    'name'              => _x( 'Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search  Categories' ),
    'all_items'         => __( 'All Categories' ),
    'parent_item'       => __( 'Parent  Category' ),
    'parent_item_colon' => __( 'Parent  Category:' ),
    'edit_item'         => __( 'Edit  Category' ), 
    'update_item'       => __( 'Update  Category' ),
    'add_new_item'      => __( 'Add New  Category' ),
    'new_item_name'     => __( 'New  Category' ),
    'menu_name'         => __( 'Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'ttchinese_category', 'ttchinese', $args );
}
add_action( 'init', 'taxonomies_chines', 0 );

function custom_podcasts() {
  $labels = array(
    'name'               => _x( 'Podcasts', 'post type general name' ),
    'singular_name'      => _x( 'Podcast', 'post type singular name' ),
    'add_new'            => _x( 'Add Podcast', 'magazine' ),
    'add_new_item'       => __( 'Add New Podcast' ),
    'edit_item'          => __( 'Edit Podcast' ),
    'new_item'           => __( 'New Podcast' ),
    'all_items'          => __( 'All Podcasts' ),
    'view_item'          => __( 'View Podcast' ),
    'search_items'       => __( 'Search Podcasts' ),
    'not_found'          => __( 'No Podcast found' ),
    'not_found_in_trash' => __( 'No Podcast found in the Trash' ), 
    'menu_name'          => 'Podcasts'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds Our Podcasts',
    'public'        => true,
    'menu_position' => 6,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
    'has_archive'   => true,
  );
  register_post_type( 'ttpodcast', $args ); 
}
add_action( 'init', 'custom_podcasts' );

function custom_masterclasses() {
  $labels = array(
    'name'               => _x( 'MasterClasses', 'post type general name' ),
    'singular_name'      => _x( 'MasterClass', 'post type singular name' ),
    'add_new'            => _x( 'Add MasterClass', 'magazine' ),
    'add_new_item'       => __( 'Add New MasterClass' ),
    'edit_item'          => __( 'Edit MasterClass' ),
    'new_item'           => __( 'New MasterClass' ),
    'all_items'          => __( 'All MasterClasses' ),
    'view_item'          => __( 'View MasterClass' ),
    'search_items'       => __( 'Search MasterClass' ),
    'not_found'          => __( 'No MasterClass found' ),
    'not_found_in_trash' => __( 'No MasterClass found in the Trash' ), 
    'menu_name'          => 'MasterClasses'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds Our MasterClasses',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
    'has_archive'   => true,
  );
  register_post_type( 'master-classes', $args ); 
}
add_action( 'init', 'custom_masterclasses' );