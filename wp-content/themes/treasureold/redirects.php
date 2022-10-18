<?php

/**
 * Redirect categories, tags, date, author and specific custom taxonomies to homepage
 */
function my_redirect_taxonomy_archive() {
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
add_action( 'template_redirect', 'my_redirect_taxonomy_archive' );