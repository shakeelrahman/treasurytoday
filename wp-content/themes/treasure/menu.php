<?php
function create_bootstrap_menu($theme_location)
{
  $custom_logo_id = get_theme_mod('custom_logo');
  $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
  if (has_custom_logo()) {
    $logoset = '<img class="img-fluid logo" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
  } else {
    $logoset = '<img class="img-fluid logo" src="' . get_template_directory_uri() . '/assets/images/treasury-today-logo.png" alt="logo">';
  }
  if (($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])) {

    $menu_list = '<nav class="navbar navbar-expand-lg navbar-light border-bottom py-0 align-items-stretch">';
    $menu_list .= '<div class="container pe-0">';
    $menu_list .=  '<a href="' . get_home_url() . '" class="border-end logo-link py-2 pe-lg-3">';
    $menu_list .=   $logoset . '</a>
                <button onclick="toggleSidenav()" class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse h-100 align-items-stretch" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-0 ms-lg-0">';
    $menu_list .=  '<!-- Mobile-view -->
                    <div class="mobile-view d-lg-none d-block">
                    <li class="d-flex m-3"><a data-bs-toggle="modal" data-bs-target="#signInModal" class="w-50 btn me-1 btn-primary justify-content-center border-3 border-white rounded-pill">Sign in</a>
                       <a  type="button" data-bs-toggle="modal" data-bs-target="#registerModal" class="btn w-50 btn-secondary ms-1 justify-content-center border-3 border-secondary rounded-pill">Register</a></li>
                       <li><form>
                         <div class="form-group position-relative m-3">
                           <input type="text" class="bg-primary search text-white form-control border-3 border-primary rounded-pill" placeholder="Search">
                           <button class="icon position-absolute btn"><span class="material-icons text-white">search</span></button>
                         </div>
                       </form></li>
                       </div>
                        <!-- Mobile-view -->';

    $menu = get_term($locations[$theme_location], 'nav_menu');
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    foreach ($menu_items as $menu_item) {
      $bool = FALSE;
      if ($menu_item->menu_item_parent == 0) {
        $parent = $menu_item->ID;
        $menu_array = array();
        foreach ($menu_items as $submenu) {
          if ($submenu->menu_item_parent == $parent) {
            $bool = true;
            $menu_array[] = '<li class="px-md-2"><a class="dropdown-link" href="' . $submenu->url . '">' . $submenu->title . '</a></li>' . "\n";
          }
        }
        if ($bool == true && count($menu_array) > 0) {

          $menu_list .= '<li class="nav-item dropdown position-relative border-end">' . "\n";
          $menu_list .= '<a id="navbarDropdown" class="nav-link dropdown-toggle py-lg-0 d-flex align-items-center justify-content-lg-center" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $menu_item->title . '<i class="ps-1 fa-solid fs-6 fw-bold fa-chevron-down"></i></a>' . "\n";

          $menu_list .= '<div class="dropdown-menu">' . "\n";
          $menu_list .= '<ul class="dropdown-inner list-unstyled" aria-labelledby="navbarDropdown">' . "\n";
          $menu_list .= implode("\n", $menu_array);
          $menu_list .= '</ul>' . "\n";
          $menu_list .= '</div>' . "\n";
        } else {

          $menu_list .= '<li class="nav-item d-xl-block d-lg-none d-block border-end">' . "\n";
          $menu_list .= '<a class="nav-link" href="' . $menu_item->url . '">' . $menu_item->title . '</a>' . "\n";
        }
        $menu_list .= '</li>' . "\n";
      }
    }

    $menu_list  .= '</ul>';
    $menu_list  .= '</div>';
    $menu_list  .= '</nav>';
  } /*If After Function Ends Here*/
  return $menu_list;
} /*Function Ends Here */
