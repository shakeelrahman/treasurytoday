<?php

/**
 * Redirect categories, tags, date, author and specific custom taxonomies to homepage
 */
/*function my_redirect_taxonomy_archive() {
    // redirect category, tag, date, author archives
	if (
		is_category() ||
		is_tag() ||
		is_date() ||
		is_author()
	){
		wp_redirect( home_url(), 301 );
	} else if ( is_tax() ) { // redirect custom taxonomy term archives
		$archive_taxonomies_to_redirect = [
			'book',
			'event',
		];

		foreach($archive_taxonomies_to_redirect as $taxonomy) {
			if ( is_tax( $taxonomy ) ) {
				wp_redirect( home_url(), 301 );
			}
		}
	}
}
add_action( 'template_redirect', 'my_redirect_taxonomy_archive' );*/

function get_link_to_topics_page($postid){
        //$ptermsarray = array();
        //$ctermsarray = array();
        $terms_list = wp_get_post_categories( $postid, array( 'fields'=>'all', 'order'=> 'ASC' ) );
       // var_dump($terms_list);
            if ( $terms_list ) {
                $i=0;
                foreach ( $terms_list as $term ) {
                       if($term->parent){
                           $termSlug =  $term->slug;
                           $termName = $term->name;
                       }
                       else
                       {
                            $ptermId = $term->term_id;
                       }
                           //$ctermsarray[] = array( 'id' => $term->term_id, 'slug' => $term->slug, 'name' => $term->name );
                     
                           //$ptermsarray[] = array( 'id' => $term->term_id, 'slug' => $term->slug, 'name' => $term->name );
                }
            }
            //print_r($termsarray);
           
            

            switch ($ptermId) {
              case 2:
                $makeurl = get_home_url().'/insight-analysis/';  
                $makeurl = esc_url(add_query_arg( 'tags',$termSlug , $makeurl )) ;
                return '<a href="'.$makeurl.'" class="text-secondary small">'.$termName.'</a>';
                break;
            case 3:
                $makeurl = get_home_url().'/cash-liquidity-management/';  
                $makeurl = esc_url(add_query_arg( 'tags',$termSlug , $makeurl )) ;
                return '<a href="'.$makeurl.'" class="text-secondary small">'.$termName.'</a>';
                break;
             case 4:
                $makeurl = get_home_url().'/risk-management/';  
                $makeurl = esc_url(add_query_arg( 'tags',$termSlug , $makeurl )) ;
                return '<a href="'.$makeurl.'" class="text-secondary small">'.$termName.'</a>';
                break;
            case 5:
                $makeurl = get_home_url().'/treasury-talent/';  
                $makeurl = esc_url(add_query_arg( 'tags',$termSlug , $makeurl )) ;
                return '<a href="'.$makeurl.'" class="text-secondary small">'.$termName.'</a>';
                break;
            case 6:
                $makeurl = get_home_url().'/funding-and-investment/';  
                $makeurl = esc_url(add_query_arg( 'tags',$termSlug , $makeurl )) ;
                return '<a href="'.$makeurl.'" class="text-secondary small">'.$termName.'</a>';
                break;
             case 8:
                $makeurl = get_home_url().'/trade-and-supply-chain/';  
                $makeurl = esc_url(add_query_arg( 'tags',$termSlug , $makeurl )) ;
                return '<a href="'.$makeurl.'" class="text-secondary small">'.$termName.'</a>';
                break;
            case 9:
                $makeurl = get_home_url().'/regulation-and-standards/';  
                $makeurl = esc_url(add_query_arg( 'tags',$termSlug , $makeurl )) ;
                return '<a href="'.$makeurl.'" class="text-secondary small">'.$termName.'</a>';
                break;
              case 10:
                 $makeurl = get_home_url().'/banking/';  
                $makeurl = esc_url(add_query_arg( 'tags',$termSlug , $makeurl )) ;
                return '<a href="'.$makeurl.'" class="text-secondary small">'.$termName.'</a>';
                break;
            case 11:
                 $makeurl = get_home_url().'/treasury-practice/';  
                $makeurl = esc_url(add_query_arg( 'tags',$termSlug , $makeurl )) ;
                return '<a href="'.$makeurl.'" class="text-secondary small">'.$termName.'</a>';
                break;
             case 12:
                 $makeurl = get_home_url().'/regional-focus/';  
                $makeurl = esc_url(add_query_arg( 'tags',$termSlug , $makeurl )) ;
                return '<a href="'.$makeurl.'" class="text-secondary small">'.$termName.'</a>';
                break;
            case 13:
                $makeurl = get_home_url().'/perspectives/';  
                $makeurl = esc_url(add_query_arg( 'tags',$termSlug , $makeurl )) ;
                return '<a href="'.$makeurl.'" class="text-secondary small">'.$termName.'</a>';
                break;
            case 7:
                $makeurl = get_home_url().'/technology/';  
                $makeurl = esc_url(add_query_arg( 'tags',$termSlug , $makeurl )) ;
                return '<a href="'.$makeurl.'" class="text-secondary small">'.$termName.'</a>';
                break;
              default:
                echo "Your favorite color is neither red, blue, nor green!";
            }

}

