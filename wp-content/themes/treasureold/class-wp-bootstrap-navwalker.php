<?php
// Intented to use bootstrap 3.
// Location is like a 'primary'
// After, you print menu just add create_bootstrap_menu("primary") in your preferred position;
  
#add this function in your theme functions.php
  
function create_bootstrap_menu( $theme_location ) {

    	$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		if ( has_custom_logo() ) {
		$logoset ='<img class="img-fluid logo my-2" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
			}
	else 
			{
			 $logoset ='<img class="img-fluid logo my-2" src="'.get_template_directory_uri().'/assets/images/treasury-today-logo.png" alt="logo">';
			}
	
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
         
        $menu_list  = '<nav class="navbar navbar-expand-lg navbar-light border-bottom py-0">' ."\n";
        $menu_list .= '<div class="container pe-0">' ."\n";
        $menu_list .= '<a href="'.get_site_url().'" class="border-end logo-link py-lg-0 py-2"> ' ."\n";
        $menu_list .=  $logoset ."\n";
        $menu_list .= '</a>' ."\n";
           
    	$menu_list .= '<button onclick="toggleSidenav()" class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>'."\n";
    	$menu_list .= '<div class="collapse navbar-collapse h-100" id="navbarSupportedContent">'."\n";
    	$menu_list .= '<ul class="navbar-nav me-auto mb-0 ms-lg-0">'."\n";
    	
    	$menu_list .= '<!-- Mobile-view -->'."\n";
        $menu_list .= 'div class="mobile-view d-lg-none d-block">'."\n";
        $menu_list .= '<li class="d-flex m-3"><a data-bs-toggle="modal" data-bs-target="#signInModal" class="w-50 btn me-1 btn-primary justify-content-center border-3 border-white rounded-pill">Sign in</a>'."\n";
        $menu_list .= '<a  type="button" data-bs-toggle="modal" data-bs-target="#registerModal" class="btn w-50 btn-secondary ms-1 justify-content-center border-3 border-secondary rounded-pill">Register</a></li>'.'\n';
        $menu_list .= '<li><form>'.'\n';
        $menu_list .= '<div class="form-group position-relative m-3">'.'\n';
        $menu_list .= '<input type="text" class="bg-primary search text-white form-control border-3 border-primary rounded-pill" placeholder="Search"><button class="icon position-absolute btn"><span class="material-icons text-white">search</span></button>'.'\n';
        $menu_list .= '</div>'.'/n';
        $menu_list .= '</form></li>'.'/n';
        $menu_list .= '</div>'.'/n';
    	$menu_list .= '<!-- Mobile-view -->'.'/n';
    		
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        
        foreach( $menu_items as $menu_item ) {
            if( $menu_item->menu_item_parent == 0 ) {
                 
                $parent = $menu_item->ID;
                 
                $menu_array = array();
                foreach( $menu_items as $submenu ) {
                    if( $submenu->menu_item_parent == $parent ) {
                        $bool = true;
                        $menu_array[] = '<li class="nav-item dropdown position-relative border-end"><a  class = "nav-link dropdown-toggle py-lg-0" href="' . $submenu->url . '">' . $submenu->title . '</a></li>' ."\n";
                    }
                }
                if( $bool == true && count( $menu_array ) > 0 ) {
                     
                    $menu_list .= '<li class="nav-item dropdown position-relative border-end">' ."\n";
                    $menu_list .= '<a href="#" class="nav-link dropdown-toggle py-lg-0" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $menu_item->title . ' <span class="caret"></span></a>' ."\n";
                     
                    $menu_list .= '<ul class="dropdown-menu">' ."\n";
                    $menu_list .= implode( "\n", $menu_array );
                    $menu_list .= '</ul>' ."\n";
                     
                } else {
                     
                    $menu_list .= '<li>' ."\n";
                    $menu_list .= '<a href="' . $menu_item->url . '">' . $menu_item->title . '</a>' ."\n";
                }
                 
            }
             
            // end <li>
            $menu_list .= '</li>' ."\n";
        }
          
        $menu_list .= '</ul>' ."\n";
        $menu_list .= '</div>' ."\n";
        $menu_list .= '</div><!-- /.container-fluid -->' ."\n";
        $menu_list .= '</nav>' ."\n";
  
    } else {
        $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
    }
     
    echo $menu_list;
}
?>