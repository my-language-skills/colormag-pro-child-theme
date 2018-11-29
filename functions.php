<?php
/* 
 * Child theme functions file
 * 
 */
function colormag_child_enqueue_styles() {

	$parent_style = 'colormag_style'; //parent theme style handle 'colormag_style'

	//Enqueue parent and chid theme style.css
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' ); 
	wp_enqueue_style( 'colormag_child_style',
	    get_stylesheet_directory_uri() . '/style.css',
	    array( $parent_style ),
	    wp_get_theme()->get('Version')
	);
}
add_action( 'wp_enqueue_scripts', 'colormag_child_enqueue_styles' );
?>