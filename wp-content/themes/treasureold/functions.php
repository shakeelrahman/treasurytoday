<?php
include get_template_directory() . '/custompoststypes.php';
include get_template_directory() . '/menu.php';
include get_template_directory() . '/apis/mobileapis.php';
include get_template_directory() . '/redirects.php';
require_once('inc/passvaluetoapi.php');

function add_file_types_to_uploads($file_types)
{
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes);
	return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');
/* Function which displays your post date in time ago format */
function meks_time_ago() {
	global $post;
	$post_time = strtotime( $post->post_date ); 
	return human_time_diff( $post_time, current_time( 'timestamp' ) ).' '.__( 'ago' );
}

if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
}
if (!function_exists('treasuretoday_one_setup')) {
	function treasuretoday_one_setup()
	{
		add_theme_support('title-tag');
		load_theme_textdomain('treasuretoday', get_template_directory() . '/languages');
		add_theme_support('automatic-feed-links');
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);
		add_theme_support('post-thumbnails');
		//set_post_thumbnail_size( 1568, 9999 );
		register_nav_menus(
			array(
				'primary' => esc_html__('Primary menu', 'treasuretoday'),
				'footer'  => esc_html__('Secondary menu', 'treasuretoday'),
			)
		);
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);
		$logo_width  = 780;
		$logo_height = 184;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);
		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');
	}
}
add_action('after_setup_theme', 'treasuretoday_one_setup');

function treasurtoday_styles()
{
	wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), null, false);
	wp_enqueue_style('googlefontss', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), null, false);
	wp_enqueue_style('main-styles', get_template_directory_uri() . '/scss/main.css', array(), filemtime(get_template_directory() . '/scss/main.css'), false);
	wp_enqueue_style('dialogues-styles', get_template_directory_uri() . '/scss/dialogues.css', array(), filemtime(get_template_directory() . '/scss/dialogues.css'), false);
	wp_enqueue_style('wodrdpressstyle', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'), false);
}
add_action('wp_enqueue_scripts', 'treasurtoday_styles');

function treasurtoday_scripts()
{
	wp_enqueue_script('the-script-handle', get_template_directory_uri() . '/js/index.js', array(), filemtime(get_template_directory() . '/js/index.js'), true);
	wp_enqueue_script('ajaxhandlerlogin', get_template_directory_uri() . '/js/customjsfile.js', array(), filemtime(get_template_directory() . '/js/customjsfile.js'), true);
	wp_enqueue_script('bootstrapjs',  get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', array(), '', true);
	wp_enqueue_script('ajax-pagination',  get_stylesheet_directory_uri() . '/js/ajax-pagination.js', array('jquery'), '1.0', true);
	wp_enqueue_script('ajax-loadmore',  get_stylesheet_directory_uri() . '/js/ajaxloadmore.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'treasurtoday_scripts');

function subcats_from_parentcat_by_ID($set_parent_cat_ID)
{
	$get_args = array(
		'hierarchical' => 1,
		'taxonomy' => 'category',
		'parent' => $set_parent_cat_ID,
		'hide_empty' => 0,
		'show_option_none' => '',
	);
	$get_subcats = get_categories($get_args);

	foreach ($get_subcats as $sc_val) {
		$get_link = get_term_link($sc_val->slug, $sc_val->taxonomy);
		echo '<li><a class="dropdown-link" href="' . $get_link . '">' . $sc_val->name . '</a></li>';
	}
}

function wpb_postsbycategory($catID)
{
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$the_query = new WP_Query(array(
		'post_type' => 'post',
		'cat' => $catID,
		'posts_per_page' => 12,
		'paged' => $paged,
	));
        $GLOBALS['wp_query'] = $the_query;
	// The Loop
	if ($the_query->have_posts()) {
		$string = "";
                $string .= '<div class="paginationrow col-md-12">';
		$string .= get_the_posts_pagination(array(
		'mid_size'  => 2,
		'prev_text' => __('<i class="fa-solid fa-arrow-left text-secondary pe-3"></i>', 'textdomain'),
		'next_text' => __('<i class="fa-solid fa-arrow-right text-secondary ps-3"></i>', 'textdomain'),
                'class' => "navlinkstopics",
	));
                $string .= '</div>';
                $string .= '<input type="hidden" value="'.$catID.'" id="passcatidtoajax">';
		while ($the_query->have_posts()) {
			$the_query->the_post();
                        
			$string .= '<div class="col-lg-4 col-sm-6 mb-2">';
			$string .= '<div class="">';
			//$string .= get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'img-fluid mb-3'));
            $string .= '<a href="'.get_permalink().'">';
			$string .= '<img src="'.get_first_image(get_the_ID()).'" alt="'.get_the_title().'" class="img-fluid mb-3">';
			$string .= '</a>';
			$string .= '<div class="">';
			$string .= '<a class="text-secondary small" href="javascript:void(0)">Sustainability</a>';
			$string .= '<span class="text-muted small">-' . get_the_date() . '</span>';
			$string .= '<a href="' . get_permalink() . '"><h2 class="black-link">' . get_the_title() . '</h2></a>';
			$string .= '</div></div></div>';
		}
	} else {
		// no posts found
		$string .= '<div>No Posts Found</div>';
	}
	return $string;
}

function wpshout_the_short_content($limit)
{
	$content = get_the_content();
	/* sometimes there are <p> tags that separate the words, and when the tags are removed, 
   * words from adjoining paragraphs stick together.
   * so replace the end <p> tags with space, to ensure unstickinees of words */
	$content = strip_tags($content);
	$content = strip_shortcodes($content);
	$content = trim(preg_replace('/\s+/', ' ', $content));
	$ret = $content; /* if the limit is more than the length, this will be returned */
	if (mb_strlen($content) >= $limit) {
		$ret = mb_substr($content, 0, $limit);
		// make sure not to cut the words in the middle:
		// 1. first check if the substring already ends with a space
		if (mb_substr($ret, -1) !== ' ') {
			// 2. If it doesn't, find the last space before the end of the string
			$space_pos_in_substr = mb_strrpos($ret, ' ');
			// 3. then find the next space after the end of the string(using the original string)
			$space_pos_in_content = mb_strpos($content, ' ', $limit);
			// 4. now compare the distance of each space position from the limit
			if ($space_pos_in_content != false && $space_pos_in_content - $limit <= $limit - $space_pos_in_substr) {
				/* if the closest space is in the original string, take the substring from there*/
				$ret = mb_substr($content, 0, $space_pos_in_content);
			} else {
				// else take the substring from the original string, but with the earlier (space) position
				$ret = mb_substr($content, 0, $space_pos_in_substr);
			}
		}
	}
	return $ret . '...';
}

wp_enqueue_script('jquery');
//Define AJAX URL
function myplugin_ajaxurl()
{
	echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}
add_action('wp_head', 'myplugin_ajaxurl');

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
}


function getVimeoVideoThumbnailByVideoId($id = '', $thumbType = 'medium')
{

	$id = trim($id);

	if ($id == '') {
		return FALSE;
	}

	$apiData = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$id.php"));

	if (is_array($apiData) && count($apiData) > 0) {

		$videoInfo = $apiData[0];

		switch ($thumbType) {
			case 'small':
				return $videoInfo['thumbnail_small'];
				break;
			case 'large':
				return $videoInfo['thumbnail_large'];
				break;
			case 'medium':
				return $videoInfo['thumbnail_medium'];
			default:
				break;
		}
	}

	return FALSE;
}
add_action('wp_ajax_nopriv_ajax_pagination', 'my_ajax_pagination');
add_action('wp_ajax_ajax_pagination', 'my_ajax_pagination');

function my_ajax_pagination()
{
	//$paged = (get_query_var('paged')) ? get_query_var('paged') : $_POST['page'];
	$paged = $_POST['page'];
	//echo $paged;
	$args = array('post_type' => 'ttwomen', 'posts_per_page' => 12, 'paged' => $paged);
	$wp_query = new WP_Query($args);
	$GLOBALS['wp_query'] = $wp_query;
	///return $paged;
	$returndata = '';
        $returndata .= '<div class="paginationrow">';
	$returndata .= the_posts_pagination(array(
		'mid_size'  => 2,
		'prev_text' => __('<i class="fa-solid fa-arrow-left text-secondary pe-3"></i>', 'textdomain'),
		'next_text' => __('<i class="fa-solid fa-arrow-right text-secondary ps-3"></i>', 'textdomain'),
	));

        $returndata .= '</div>';
	$returndata .= '<div class="row mx-0 mt-4">';
	while ($wp_query->have_posts()) :
		$wp_query->the_post();


		$returndata .= '<div class="col-lg-4 col-md-6 pb-4">';
		$returndata .= '<a class="d-block" href="' . get_the_permalink() . '">';
		$returndata .= get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'mb-3 w-100 img-fluid'));
		$returndata .= '</a>';

		$returndata .= '<a class="text-secondary small" href="' . get_the_permalink() . '">Articles</a>';
		$returndata .= '<span class="text-muted small"> - 29 days ago</span>';
		$returndata .= '<a class="" href="' . get_the_permalink() . '">';
		$returndata .= '<h2 class="black-link pe-3">' . get_the_title() . '</h2>';
		$returndata .= '</a>';
		$returndata .= '</div>';
	endwhile;
	$returndata .= '</div>';


	echo $returndata;
	die();
}

// Get first image
function get_first_image($post_id) {
$postcontent = get_post_field('post_content', $post_id);
$first_image = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $postcontent, $matches);
$iNumberOfPics = count($matches[0]);
    if($iNumberOfPics > 0)
        $first_image = $matches [1] [0];
if(empty($first_image)){ //Defines a default image
// Set the default image if there are no image available inside post content
$first_image = get_template_directory_uri()."/assets/images/dummyimage.jpg";
}
return $first_image;
}
// End Get First Image
function example_add_img_class( $class ) {
    return $class . ' img-fluid';
}
 
add_filter( 'get_image_tag_class', 'example_add_img_class' );


add_action('wp_ajax_nopriv_ajax_getcatposts', 'ajaxpostsbycategory');
add_action('wp_ajax_ajax_getcatposts', 'ajaxpostsbycategory');
function ajaxpostsbycategory()
{
        $catID = get_cat_ID($_POST['catname']);
	$the_query = new WP_Query(array(
		'post_type' => 'post',
		'cat' => $catID,
		'posts_per_page' => 12,
		'paged' => 1,
	));
        $GLOBALS['wp_query'] = $the_query;
	// The Loop
	if ($the_query->have_posts()) {
		$string = "";
                $string .= '<div class="paginationrow col-md-12">';
                   $string .= get_the_posts_pagination(array(
                   'mid_size'  => 2,
                   'prev_text' => __('<i class="fa-solid fa-arrow-left text-secondary pe-3"></i>', 'textdomain'),
                   'next_text' => __('<i class="fa-solid fa-arrow-right text-secondary ps-3"></i>', 'textdomain'),
                   'class' => "navlinkstopics",
           ));
                   $string .= '</div>';
                   $string .= '<input type="hidden" value="'.$catID.'" id="passcatidtoajax">';
		while ($the_query->have_posts()) {
			$the_query->the_post();
			$string .= '<div class="col-lg-4 col-sm-6 mb-2">';
			$string .= '<div class="">';
			$string .= '<a href="' . get_permalink() . '">';
			//echo get_the_permalink();
			//$string .= get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'img-fluid mb-3'));
            $string .= '<img src="'.get_first_image(get_the_ID()).'" alt="'.get_the_title().'" class="img-fluid mb-3 w-100"></a>';
			$string .= '<div class="">';
			$string .= '<a class="text-secondary small" href="javascript:void(0)">Sustainability</a>';
			$string .= '<span class="text-muted small">-' . get_the_date() . '</span>';
			$string .= '<a href="' . get_permalink() . '"><h2 class="black-link">' . get_the_title() . '</h2></a>';
			$string .= '</div></div></div>';
		}
	} else {
	
		$string .= '<div>No Posts Found</div>';
	}
	echo $string;
        die();
}


function wpb_postsbycatajax()
{
	$paged = $_POST['page'];
        $catno = $_POST['catno'];
        
        $args = array(
		'post_type' => 'post',
		'cat' => $catno,
		'posts_per_page' => 12,
		'paged' => $paged,
	);
	$the_query = new WP_Query($args);
	$GLOBALS['wp_query'] = $the_query;
	if ($the_query->have_posts()) {
		$string = "";
                $string .= '<div class="paginationrow col-md-12">';
		$string .= get_the_posts_pagination(array(
		'mid_size'  => 2,
		'prev_text' => __('<i class="fa-solid fa-arrow-left text-secondary pe-3"></i>', 'textdomain'),
		'next_text' => __('<i class="fa-solid fa-arrow-right text-secondary ps-3"></i>', 'textdomain'),
                'class' => "navlinkstopics",
	));
                $string .= '</div>';
                $string .= '<input type="hidden" value="'.$catno.'" id="passcatidtoajax">';
		while ($the_query->have_posts()) {
			$the_query->the_post();
                        
			$string .= '<div class="col-lg-4 col-sm-6 mb-2">';
			$string .= '<div class="">';
			//$string .= get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'img-fluid mb-3'));
                    $string .= '<a href="' . get_permalink() . '"><img src="'.get_first_image(get_the_ID()).'" alt="'.get_the_title().'" class="img-fluid mb-3"></a>';
			$string .= '<div class="">';
			$string .= '<a class="text-secondary small" href="javascript:void(0)">Sustainability</a>';
			$string .= '<span class="text-muted small">-' . get_the_date() . '</span>';
			$string .= '<a href="' . get_permalink() . '"><h2 class="black-link">' . get_the_title() . '</h2></a>';
			$string .= '</div></div></div>';
		}
	} else {
		// no posts found
		$string .= '<div>No Posts Found</div>';
	}
	echo $string;
	die();
}
add_action('wp_ajax_nopriv_ajax_paginationcat', 'wpb_postsbycatajax');
add_action('wp_ajax_ajax_paginationcat', 'wpb_postsbycatajax');


add_action('wp_ajax_nopriv_logoutfromsystem', 'logoutall');
add_action('wp_ajax_logoutfromsystem', 'logoutall');
function logoutall()
{
    unset($_SESSION['user_name']);
    unset($_SESSION['user_token']);
    //wp_redirect( home_url(), 302 );
    //echo "Logout";
    die();
}