<?php
/*
 * Child theme functions file
 * 
 */

/* New features --------------------------------------------------------------------------------------*/

/* Automatically set the image Title, Alt-Text, Caption & Description upon upload
http://brutalbusiness.com/automatically-set-the-wordpress-image-title-alt-text-other-meta/
for adding the tags and categories: https://wordpress.org/plugins/seo-image/
--------------------------------------------------------------------------------------*/
add_action( 'add_attachment', 'my_set_image_meta_upon_image_upload' );
function my_set_image_meta_upon_image_upload( $post_ID ) {

	// Check if uploaded file is an image, else do nothing

	if ( wp_attachment_is_image( $post_ID ) ) {

		$my_image_title = get_post( $post_ID )->post_title;

		// Sanitize the title:  remove hyphens, underscores & extra spaces:
		$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );

		// Sanitize the title:  capitalize first letter of every word (other letters lower case):
		$my_image_title = ucwords( strtolower( $my_image_title ) );

		// Create an array with the image meta (Title, Caption, Description) to be updated
		// Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
		$my_image_meta = array(
			'ID'		=> $post_ID,			// Specify the image (ID) to be updated
			'post_title'	=> $my_image_title,		// Set image Title to sanitized title
			'post_excerpt'	=> $my_image_title,		// Set image Caption (Excerpt) to sanitized title
			'post_content'	=> $my_image_title,		// Set image Description (Content) to sanitized title
		);

		// Set the image Alt-Text
		update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );

		// Set the image meta (e.g. Title, Excerpt, Content)
		wp_update_post( $my_image_meta );

	}
}

/* Site modifications --------------------------------------------------------------------------------------*/

/**
 * Enqueue parent and child theme style.css
 */

function colormag_child_enqueue_styles() {

    $parent_style = 'colormag_style'; //parent theme style handle 'colormag_style'
    //Enqueue parent and chid theme style.css
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('colormag_child_style', get_stylesheet_directory_uri() . '/style.css', array($parent_style), wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'colormag_child_enqueue_styles');

/**
 * Add child theme javascript file
 */
function colormag_pro_child_add_scripts() {

    wp_register_script('colormag_pro_child_js_file', get_stylesheet_directory_uri() . '/js/colormag-pro-child.js', array('jquery'), '1.1', true);

    wp_enqueue_script('colormag_pro_child_js_file');
}

add_action('wp_enqueue_scripts', 'colormag_pro_child_add_scripts');

/**
 * Remove colormag_custom_css function
 */
function child_remove_parent_function() {
    remove_action('wp_head', 'colormag_custom_css', 100);
}

add_action('wp_loaded', 'child_remove_parent_function');

/**
 * Custom Internal CSS for child theme
 */
function colormag_custom_css_child() {
    $colormag_internal_css = '';
    $primary_color = get_theme_mod('colormag_primary_color', '#289dcc');
    if ($primary_color != '#289dcc') {
        $colormag_internal_css .= ' .colormag-button,blockquote,button,input[type=reset],input[type=button],
		input[type=submit]{background-color:' . $primary_color . '}
		a,#masthead .main-small-navigation li:hover > .sub-toggle i,
		#masthead .main-small-navigation li.current-page-ancestor > .sub-toggle i,
		#masthead .main-small-navigation li.current-menu-ancestor > .sub-toggle i,
		#masthead .main-small-navigation li.current-page-item > .sub-toggle i,
		#masthead .main-small-navigation li.current-menu-item > .sub-toggle i,
		#masthead.colormag-header-classic #site-navigation .fa.search-top:hover,
		#masthead.colormag-header-classic #site-navigation.main-small-navigation .random-post a:hover .fa-random,
		#masthead.colormag-header-classic #site-navigation.main-navigation .random-post a:hover .fa-random,
		#masthead.colormag-header-classic .breaking-news .newsticker a:hover{color:' . $primary_color . '}
		#site-navigation{border-top:4px solid ' . $primary_color . '}
		.home-icon.front_page_on,.main-navigation a:hover,.main-navigation ul li ul li a:hover,
		.main-navigation ul li ul li:hover>a,
		.main-navigation ul li.current-menu-ancestor>a,
		.main-navigation ul li.current-menu-item ul li a:hover,
		.main-navigation ul li.current-menu-item>a,
		.main-navigation ul li.current_page_ancestor>a,.main-navigation ul li.current_page_item>a,
		.main-navigation ul li:hover>a,.main-small-navigation li a:hover,.site-header .menu-toggle:hover,
		#masthead.colormag-header-classic .main-navigation ul ul.sub-menu li:hover > a,
		#masthead.colormag-header-classic .main-navigation ul ul.sub-menu li.current-menu-ancestor > a,
		#masthead.colormag-header-classic .main-navigation ul ul.sub-menu li.current-menu-item > a,
		#masthead.colormag-header-clean #site-navigation .menu-toggle:hover,
		#masthead.colormag-header-clean #site-navigation.main-small-navigation .menu-toggle,
		#masthead.colormag-header-classic #site-navigation.main-small-navigation .menu-toggle,
		#masthead .main-small-navigation li:hover > a, #masthead .main-small-navigation li.current-page-ancestor > a,
		#masthead .main-small-navigation li.current-menu-ancestor > a, #masthead .main-small-navigation li.current-page-item > a,
		#masthead .main-small-navigation li.current-menu-item > a,
		#masthead.colormag-header-classic #site-navigation .menu-toggle:hover,
		.main-navigation ul li.focus > a,
        #masthead.colormag-header-classic .main-navigation ul ul.sub-menu li.focus > a { background-color:' . $primary_color . '}
		#masthead.colormag-header-classic .main-navigation ul ul.sub-menu li:hover,
		#masthead.colormag-header-classic .main-navigation ul ul.sub-menu li.current-menu-ancestor,
		#masthead.colormag-header-classic .main-navigation ul ul.sub-menu li.current-menu-item,
		#masthead.colormag-header-classic #site-navigation .menu-toggle:hover,
		#masthead.colormag-header-classic #site-navigation.main-small-navigation .menu-toggle,

		#masthead.colormag-header-classic .main-navigation ul > li:hover > a,
        #masthead.colormag-header-classic .main-navigation ul > li.current-menu-item > a,
        #masthead.colormag-header-classic .main-navigation ul > li.current-menu-ancestor > a,
        #masthead.colormag-header-classic .main-navigation ul li.focus > a { border-color:' . $primary_color . '}
		.main-small-navigation .current-menu-item>a,.main-small-navigation .current_page_item>a,
		#masthead.colormag-header-clean .main-small-navigation li:hover > a,
		#masthead.colormag-header-clean .main-small-navigation li.current-page-ancestor > a,
		#masthead.colormag-header-clean .main-small-navigation li.current-menu-ancestor > a,
		#masthead.colormag-header-clean .main-small-navigation li.current-page-item > a,
		#masthead.colormag-header-clean .main-small-navigation li.current-menu-item > a { background:' . $primary_color . '}
		#main .breaking-news-latest,.fa.search-top:hover{background-color:' . $primary_color . '}
		.byline a:hover,.comments a:hover,.edit-link a:hover,.posted-on a:hover,
		.social-links i.fa:hover,.tag-links a:hover,
		#masthead.colormag-header-clean .social-links li:hover i.fa,
		#masthead.colormag-header-classic .social-links li:hover i.fa,
		#masthead.colormag-header-clean .breaking-news .newsticker a:hover{color:' . $primary_color . '}
		.widget_featured_posts .article-content .above-entry-meta .cat-links a,
		.widget_call_to_action .btn--primary,.colormag-footer--classic .footer-widgets-area .widget-title span::before,
		.colormag-footer--classic-bordered .footer-widgets-area .widget-title span::before{background-color:' . $primary_color . '}
		.widget_featured_posts .article-content .entry-title a:hover{color:' . $primary_color . '}
		.widget_featured_posts .widget-title{border-bottom:2px solid ' . $primary_color . '}
		.widget_featured_posts .widget-title span,
		.widget_featured_slider .slide-content .above-entry-meta .cat-links a{background-color:' . $primary_color . '}
		.widget_featured_slider .slide-content .below-entry-meta .byline a:hover,
		.widget_featured_slider .slide-content .below-entry-meta .comments a:hover,
		.widget_featured_slider .slide-content .below-entry-meta .posted-on a:hover,
		.widget_featured_slider .slide-content .entry-title a:hover{color:' . $primary_color . '}
		.widget_highlighted_posts .article-content .above-entry-meta .cat-links a{background-color:' . $primary_color . '}
		.widget_block_picture_news.widget_featured_posts .article-content .entry-title a:hover,
		.widget_highlighted_posts .article-content .below-entry-meta .byline a:hover,
		.widget_highlighted_posts .article-content .below-entry-meta .comments a:hover,
		.widget_highlighted_posts .article-content .below-entry-meta .posted-on a:hover,
		.widget_highlighted_posts .article-content .entry-title a:hover{color:' . $primary_color . '}
		.category-slide-next,.category-slide-prev,.slide-next,
		.slide-prev,.tabbed-widget ul li{background-color:' . $primary_color . '}
		i.fa-arrow-up, i.fa-arrow-down{color:' . $primary_color . '}
		#secondary .widget-title{border-bottom:2px solid ' . $primary_color . '}
		#content .wp-pagenavi .current,#content .wp-pagenavi a:hover,
		#secondary .widget-title span{background-color:' . $primary_color . '}
		#site-title a{color:' . $primary_color . '}
		.page-header .page-title{border-bottom:2px solid ' . $primary_color . '}
		#content .post .article-content .above-entry-meta .cat-links a,
		.page-header .page-title span{background-color:' . $primary_color . '}
		#content .post .article-content .entry-title a:hover,.entry-meta .byline i,
		.entry-meta .cat-links i,.entry-meta a,.post .entry-title a:hover,.search .entry-title a:hover{color:' . $primary_color . '}
		.entry-meta .post-format i{background-color:' . $primary_color . '}
		.entry-meta .comments-link a:hover,.entry-meta .edit-link a:hover,.entry-meta .posted-on a:hover,
		.entry-meta .tag-links a:hover,.single #content .tags a:hover{color:' . $primary_color . '}
		.format-link .entry-content a,.more-link{background-color:' . $primary_color . '}
		.count,.next a:hover,.previous a:hover,.related-posts-main-title .fa,
		.single-related-posts .article-content .entry-title a:hover{color:' . $primary_color . '}
		.pagination a span:hover{color:' . $primary_color . ';border-color:' . $primary_color . '}
		.pagination span{background-color:' . $primary_color . '}
		#content .comments-area a.comment-edit-link:hover,#content .comments-area a.comment-permalink:hover,
		#content .comments-area article header cite a:hover,.comments-area .comment-author-link a:hover{color:' . $primary_color . '}
		.comments-area .comment-author-link span{background-color:' . $primary_color . '}
		.comment .comment-reply-link:hover,.nav-next a,.nav-previous a{color:' . $primary_color . '}
		.footer-widgets-area .widget-title{border-bottom:2px solid ' . $primary_color . '}
		.footer-widgets-area .widget-title span{background-color:' . $primary_color . '}
		#colophon .footer-menu ul li a:hover,.footer-widgets-area a:hover,a#scroll-up i{color:' . $primary_color . '}
		.advertisement_above_footer .widget-title{border-bottom:2px solid ' . $primary_color . '}
		.advertisement_above_footer .widget-title span{background-color:' . $primary_color . '}
		.sub-toggle{background:' . $primary_color . '}
		.main-small-navigation li.current-menu-item > .sub-toggle i {color:' . $primary_color . '}
		.error{background:' . $primary_color . '}
		.num-404{color:' . $primary_color . '}
		#primary .widget-title{border-bottom: 2px solid ' . $primary_color . '}
		#primary .widget-title span{background-color:' . $primary_color . '}
		.related-posts-wrapper-flyout .entry-title a:hover{color:' . $primary_color . '}';
    }

    // google fonts custom css
    if (get_theme_mod('colormag_site_title_font', 'Open Sans') != 'Open Sans') {
        $colormag_internal_css .= ' #site-title a { font-family: ' . get_theme_mod('colormag_site_title_font', 'Open Sans') . '; }';
    }
    if (get_theme_mod('colormag_site_tagline_font', 'Open Sans') != 'Open Sans') {
        $colormag_internal_css .= ' #site-description { font-family: ' . get_theme_mod('colormag_site_tagline_font', 'Open Sans') . '; }';
    }
    if (get_theme_mod('colormag_primary_menu_font', 'Open Sans') != 'Open Sans') {
        $colormag_internal_css .= ' .main-navigation li, .site-header .menu-toggle { font-family: ' . get_theme_mod('colormag_primary_menu_font', 'Open Sans') . '; }';
    }
    if (get_theme_mod('colormag_all_titles_font', 'Open Sans') != 'Open Sans') {
        $colormag_internal_css .= ' h1, h2, h3, h4, h5, h6 { font-family: ' . get_theme_mod('colormag_all_titles_font', 'Open Sans') . '; }';
    }
    if (get_theme_mod('colormag_content_font', 'Open Sans') != 'Open Sans') {
        $colormag_internal_css .= ' body, button, input, select, textarea, p, blockquote p, .entry-meta, .more-link { font-family: ' . get_theme_mod('colormag_content_font', 'Open Sans') . '; }';
    }

    // header area font size custom css
    if (get_theme_mod('colormag_title_font_size', '46') != '46') {
        $colormag_internal_css .= ' #site-title a { font-size: ' . get_theme_mod('colormag_title_font_size', '46') . 'px; }';
    }
    if (get_theme_mod('colormag_tagline_font_size', '16') != '16') {
        $colormag_internal_css .= ' #site-description { font-size: ' . get_theme_mod('colormag_tagline_font_size', '16') . 'px; }';
    }
    if (get_theme_mod('colormag_primary_menu_font_size', '14') != '14') {
        $colormag_internal_css .= ' .main-navigation ul li a { font-size: ' . get_theme_mod('colormag_primary_menu_font_size', '14') . 'px; }';
    }
    if (get_theme_mod('colormag_primary_sub_menu_font_size', '14') != '14') {
        $colormag_internal_css .= ' .main-navigation ul li ul li a { font-size: ' . get_theme_mod('colormag_primary_sub_menu_font_size', '14') . 'px; }';
    }

    // title related font sizes css
    if (get_theme_mod('colormag_heading_h1_font_size', '42') != '42') {
        $colormag_internal_css .= ' h1 { font-size: ' . get_theme_mod('colormag_heading_h1_font_size', '42') . 'px; }';
    }
    if (get_theme_mod('colormag_heading_h2_font_size', '38') != '38') {
        $colormag_internal_css .= ' h2 { font-size: ' . get_theme_mod('colormag_heading_h2_font_size', '38') . 'px; }';
    }
    if (get_theme_mod('colormag_heading_h3_font_size', '34') != '34') {
        $colormag_internal_css .= ' h3 { font-size: ' . get_theme_mod('colormag_heading_h3_font_size', '34') . 'px; }';
    }
    if (get_theme_mod('colormag_heading_h4_font_size', '30') != '30') {
        $colormag_internal_css .= ' h4 { font-size: ' . get_theme_mod('colormag_heading_h4_font_size', '30') . 'px; }';
    }
    if (get_theme_mod('colormag_heading_h5_font_size', '26') != '26') {
        $colormag_internal_css .= ' h5 { font-size: ' . get_theme_mod('colormag_heading_h5_font_size', '26') . 'px; }';
    }
    if (get_theme_mod('colormag_heading_h6_font_size', '22') != '22') {
        $colormag_internal_css .= ' h6 { font-size: ' . get_theme_mod('colormag_heading_h6_font_size', '22') . 'px; }';
    }
    if (get_theme_mod('colormag_post_title_font_size', '32') != '32') {
        $colormag_internal_css .= ' #content .post .article-content .entry-title { font-size: ' . get_theme_mod('colormag_post_title_font_size', '32') . 'px; }';
    }
    if (get_theme_mod('colormag_page_title_font_size', '34') != '34') {
        $colormag_internal_css .= ' .type-page .entry-title { font-size: ' . get_theme_mod('colormag_page_title_font_size', '34') . 'px; }';
    }
    if (get_theme_mod('colormag_widget_title_font_size', '18') != '18') {
        $colormag_internal_css .= ' #secondary .widget-title { font-size: ' . get_theme_mod('colormag_widget_title_font_size', '18') . 'px; }';
    }
    if (get_theme_mod('colormag_comment_title_font_size', '22') != '22') {
        $colormag_internal_css .= ' .comments-title, .comment-reply-title, #respond h3#reply-title { font-size: ' . get_theme_mod('colormag_comment_title_font_size', '22') . 'px; }';
    }

    // content font size custom css
    if (get_theme_mod('colormag_content_font_size', '18') != '18') {
        $colormag_internal_css .= ' body, button, input, select, textarea, p, blockquote p, dl, .previous a, .next a, .nav-previous a, .nav-next a, #respond h3#reply-title #cancel-comment-reply-link, #respond form input[type="text"], #respond form textarea, #secondary .widget, .error-404 .widget { font-size: ' . get_theme_mod('colormag_content_font_size', '18') . 'px; }';
    }
    if (get_theme_mod('colormag_post_meta_font_size', '12') != '12') {
        $colormag_internal_css .= ' #content .post .article-content .below-entry-meta .posted-on a, #content .post .article-content .below-entry-meta .byline a, #content .post .article-content .below-entry-meta .comments a, #content .post .article-content .below-entry-meta .tag-links a, #content .post .article-content .below-entry-meta .edit-link a, #content .post .article-content .below-entry-meta .total-views { font-size: ' . get_theme_mod('colormag_post_meta_font_size', '12') . 'px; }';
    }
    if (get_theme_mod('colormag_button_text_font_size', '12') != '12') {
        $colormag_internal_css .= ' .colormag-button, input[type="reset"], input[type="button"], input[type="submit"], button, .more-link span { font-size: ' . get_theme_mod('colormag_button_text_font_size', '12') . 'px; }';
    }

    // footer area font size custom css
    if (get_theme_mod('colormag_footer_widget_title_font_size', '15') != '15') {
        $colormag_internal_css .= ' .footer-widgets-area .widget-title { font-size: ' . get_theme_mod('colormag_footer_widget_title_font_size', '15') . 'px; }';
    }
    if (get_theme_mod('colormag_footer_widget_content_font_size', '14') != '14') {
        $colormag_internal_css .= ' #colophon, #colophon p { font-size: ' . get_theme_mod('colormag_footer_widget_content_font_size', '14') . 'px; }';
    }
    if (get_theme_mod('colormag_footer_copyright_text_font_size', '14') != '14') {
        $colormag_internal_css .= ' .footer-socket-wrapper .copyright { font-size: ' . get_theme_mod('colormag_footer_copyright_text_font_size', '14') . 'px; }';
    }
    if (get_theme_mod('colormag_footer_small_menu_font_size', '14') != '14') {
        $colormag_internal_css .= ' .footer-menu a { font-size: ' . get_theme_mod('colormag_footer_small_menu_font_size', '14') . 'px; }';
    }

    // header area custom css
    if (get_theme_mod('colormag_site_title_color', '#289dcc') != '#289dcc') {
        $colormag_internal_css .= ' #site-title a { color: ' . get_theme_mod('colormag_site_title_color', '#289dcc') . '; }';
    }
    if (get_theme_mod('colormag_site_tagline_color', '#666666') != '#666666') {
        $colormag_internal_css .= ' #site-description { color: ' . get_theme_mod('colormag_site_tagline_color', '#666666') . '; }';
    }
    if (get_theme_mod('colormag_primary_menu_text_color', '#ffffff') != '#ffffff') {
        $colormag_internal_css .= ' .main-navigation a, .main-navigation ul li ul li a, .main-navigation ul li.current-menu-item ul li a, .main-navigation ul li ul li.current-menu-item a, .main-navigation ul li.current_page_ancestor ul li a, .main-navigation ul li.current-menu-ancestor ul li a, .main-navigation ul li.current_page_item ul li a { color: ' . get_theme_mod('colormag_primary_menu_text_color', '#ffffff') . '; }';
    }
    if (get_theme_mod('colormag_primary_menu_selected_hovered_text_color', '#ffffff') != '#ffffff') {
        $colormag_internal_css .= ' .main-navigation a:hover, .main-navigation ul li.current-menu-item a, .main-navigation ul li.current_page_ancestor a, .main-navigation ul li.current-menu-ancestor a, .main-navigation ul li.current_page_item a, .main-navigation ul li:hover > a, .main-navigation ul li ul li a:hover, .main-navigation ul li ul li:hover > a, .main-navigation ul li.current-menu-item ul li a:hover { color: ' . get_theme_mod('colormag_primary_menu_selected_hovered_text_color', '#ffffff') . '; }';
    }
    if (get_theme_mod('colormag_header_background_color', '#ffffff') != '#ffffff') {
        $colormag_internal_css .= ' #header-text-nav-container { background-color: ' . get_theme_mod('colormag_header_background_color', '#ffffff') . '; }';
    }
    if (get_theme_mod('colormag_primary_menu_background_color', '#232323') != '#232323') {
        $colormag_internal_css .= ' #site-navigation { background-color: ' . get_theme_mod('colormag_primary_menu_background_color', '#232323') . '; }';
    }
    if (get_theme_mod('colormag_primary_sub_menu_background_color', '#232323') != '#232323') {
        $colormag_internal_css .= ' .main-navigation .sub-menu, .main-navigation .children { background-color: ' . get_theme_mod('colormag_primary_sub_menu_background_color', '#232323') . '; }';
    }
    if (get_theme_mod('colormag_primary_menu_top_border_color', '#289dcc') != '#289dcc') {
        $colormag_internal_css .= ' #site-navigation { border-top-color: ' . get_theme_mod('colormag_primary_menu_top_border_color', '#289dcc') . '; }';
    }

    // content part color options custom css
    if (get_theme_mod('colormag_content_part_title_color', '#333333') != '#333333') {
        $colormag_internal_css .= ' h1, h2, h3, h4, h5, h6 { color: ' . get_theme_mod('colormag_content_part_title_color', '#333333') . '; }';
    }
    if (get_theme_mod('colormag_post_title_color', '#333333') != '#333333') {
        $colormag_internal_css .= ' .post .entry-title, .post .entry-title a { color: ' . get_theme_mod('colormag_post_title_color', '#333333') . '; }';
    }
    if (get_theme_mod('colormag_page_title_color', '#333333') != '#333333') {
        $colormag_internal_css .= ' .type-page .entry-title { color: ' . get_theme_mod('colormag_page_title_color', '#333333') . '; }';
    }
    if (get_theme_mod('colormag_content_text_color', '#444444') != '#444444') {
        $colormag_internal_css .= ' body, button, input, select, textarea { color: ' . get_theme_mod('colormag_content_text_color', '#444444') . '; }';
    }
    if (get_theme_mod('colormag_post_meta_color', '#888888') != '#888888') {
        $colormag_internal_css .= ' .posted-on a, .byline a, .comments a, .tag-links a, .edit-link a { color: ' . get_theme_mod('colormag_post_meta_color', '#888888') . '; }';
    }
    if (get_theme_mod('colormag_button_text_color', '#ffffff') != '#ffffff') {
        $colormag_internal_css .= ' .colormag-button, input[type="reset"], input[type="button"], input[type="submit"], button, .more-link span { color: ' . get_theme_mod('colormag_button_text_color', '#ffffff') . '; }';
    }
    if (get_theme_mod('colormag_button_background_color', '#d40234') != '#d40234') {
        $colormag_internal_css .= ' .colormag-button, input[type="reset"], input[type="button"], input[type="submit"], button, .more-link span { background-color: ' . get_theme_mod('colormag_button_background_color', '#d40234') . '; }';
    }
    if (get_theme_mod('colormag_sidebar_widget_title_color', '#ffffff') != '#ffffff') {
        $colormag_internal_css .= ' #secondary .widget-title span { color: ' . get_theme_mod('colormag_sidebar_widget_title_color', '#ffffff') . '; }';
    }
    if (get_theme_mod('colormag_content_section_background_color', '#ffffff') != '#ffffff') {
        $colormag_internal_css .= ' #main { background-color: ' . get_theme_mod('colormag_content_section_background_color', '#ffffff') . '; }';
    }

    // footer part color options
    if (get_theme_mod('colormag_footer_widget_title_color', '#ffffff') != '#ffffff') {
        $colormag_internal_css .= ' .footer-widgets-area .widget-title span { color: ' . get_theme_mod('colormag_footer_widget_title_color', '#ffffff') . '; }';
    }
    if (get_theme_mod('colormag_footer_widget_content_color', '#ffffff') != '#ffffff') {
        $colormag_internal_css .= ' .footer-widgets-area, .footer-widgets-area p { color: ' . get_theme_mod('colormag_footer_widget_content_color', '#ffffff') . '; }';
    }
    if (get_theme_mod('colormag_footer_widget_content_link_text_color', '#ffffff') != '#ffffff') {
        $colormag_internal_css .= ' .footer-widgets-area a { color: ' . get_theme_mod('colormag_footer_widget_content_link_text_color', '#ffffff') . '; }';
    }
    if (get_theme_mod('colormag_footer_widget_background_color', '') != '') {
        $colormag_internal_css .= ' .footer-widgets-wrapper { background-color: ' . get_theme_mod('colormag_footer_widget_background_color', '') . '; }';
    }
    if (get_theme_mod('colormag_upper_footer_widget_background_color', '') != '#2c2e34') {
        $colormag_internal_css .= ' #colophon .tg-upper-footer-widgets .widget { background-color: ' . get_theme_mod('colormag_upper_footer_widget_background_color', '#2c2e34') . '; }';
    }
    if (get_theme_mod('colormag_footer_copyright_text_color', '#b1b6b6') != '#b1b6b6') {
        $colormag_internal_css .= ' .footer-socket-wrapper .copyright { color: ' . get_theme_mod('colormag_footer_copyright_text_color', '#b1b6b6') . '; }';
    }
    if (get_theme_mod('colormag_footer_copyright_link_text_color', '#b1b6b6') != '#b1b6b6') {
        $colormag_internal_css .= ' .footer-socket-wrapper .copyright a { color: ' . get_theme_mod('colormag_footer_copyright_link_text_color', '#b1b6b6') . '; }';
    }
    if (get_theme_mod('colormag_footer_small_menu_text_color', '#b1b6b6') != '#b1b6b6') {
        $colormag_internal_css .= ' #colophon .footer-menu ul li a { color: ' . get_theme_mod('colormag_footer_small_menu_text_color', '#b1b6b6') . '; }';
    }
    if (get_theme_mod('colormag_footer_copyright_part_background_color', '') != '') {
        $colormag_internal_css .= ' .footer-socket-wrapper { background-color: ' . get_theme_mod('colormag_footer_copyright_part_background_color', '') . '; }';
    }
    // post meta data settings
    // total post meta remove
    if (get_theme_mod('colormag_all_entry_meta_remove', 0) == 1) {
        $colormag_internal_css .= ' .above-entry-meta,.below-entry-meta,.tg-module-meta,.tg-post-categories{display:none;}';
    }
    // author post meta remove
    if (get_theme_mod('colormag_author_entry_meta_remove', 0) == 1) {
        $colormag_internal_css .= ' .below-entry-meta .byline,.tg-module-meta .tg-post-auther-name{display:none;}';
    }
    // date post meta remove
    if (get_theme_mod('colormag_date_entry_meta_remove', 0) == 1) {
        $colormag_internal_css .= ' .below-entry-meta .posted-on,.tg-module-meta .tg-post-date{display:none;}';
    }
    // category post meta remove
    if (get_theme_mod('colormag_category_entry_meta_remove', 0) == 1) {
        $colormag_internal_css .= ' .above-entry-meta,.tg-post-categories{display:none;}';
    }
    // comments post meta remove
    if (get_theme_mod('colormag_comments_entry_meta_remove', 0) == 1) {
        $colormag_internal_css .= ' .below-entry-meta .comments,.tg-module-meta .tg-module-comments{display:none;}';
    }
    // tags post meta remove
    if (get_theme_mod('colormag_tags_entry_meta_remove', 0) == 1) {
        $colormag_internal_css .= ' .below-entry-meta .tag-links{display:none;}';
    }

    if (get_theme_mod('colormag_category_menu_color', '') == 1) {

        $categories = get_terms('category', array('hide_empty' => false));
        $colormag_internal_css .= '
		.menunav-menu >li.menu-item-object-category > a {
			position: relative;
		}

		.menunav-menu >li.menu-item-object-category > a::before {
			content: "";
			position: absolute;
			top: -4px;
			left: 0;
			right: 0;
			height: 4px;
			z-index: 10;
			transition: width 0.35s;
		}';

        foreach ($categories as $category) {
            $cat_color = get_theme_mod('colormag_category_color_' . absint($category->term_id));
            $cat_id = $category->term_id;
            if (!empty($cat_color)) {
                $colormag_internal_css .= '
				.menu-item-object-category.menu-item-category-' . $cat_id . ' > a::before {
					background: ' . $cat_color . ';
				}

				.menu-item-object-category.menu-item-category-' . $cat_id . ':hover > a {
					background: ' . $cat_color . ';
				}
				';
            }
        }
    }

    // Footer background option
    // Footer background image option
    if (get_theme_mod('colormag_footer_background_image')) {
        $colormag_internal_css .= ' #colophon { background-image: url(' . get_theme_mod('colormag_footer_background_image') . ') } .footer-widgets-wrapper, .footer-socket-wrapper, .colormag-footer--classic .footer-socket-wrapper { background-color: transparent; }';
    }
    // Footer background image position setting
    $footer_background_image_position_setting = get_theme_mod('colormag_footer_background_image_position', 'center-center');
    if ($footer_background_image_position_setting == 'left-top') { // For `left-top`
        $colormag_internal_css .= '#colophon { background-position: left top; }';
    } elseif ($footer_background_image_position_setting == 'center-top') { // For `center-top`
        $colormag_internal_css .= '#colophon { background-position: center top; }';
    } elseif ($footer_background_image_position_setting == 'right-top') { // For `right-top`
        $colormag_internal_css .= '#colophon { background-position: right top; }';
    } elseif ($footer_background_image_position_setting == 'left-center') { // For `left-center`
        $colormag_internal_css .= '#colophon { background-position: left center; }';
    } elseif ($footer_background_image_position_setting == 'right-center') { // For `right-center`
        $colormag_internal_css .= '#colophon { background-position: right center; }';
    } elseif ($footer_background_image_position_setting == 'left-bottom') { // For `left-bottom`
        $colormag_internal_css .= '#colophon { background-position: left bottom; }';
    } elseif ($footer_background_image_position_setting == 'center-bottom') { // For `center-bottom`
        $colormag_internal_css .= '#colophon { background-position: center bottom; }';
    } elseif ($footer_background_image_position_setting == 'right-bottom') { // For `right-bottom`
        $colormag_internal_css .= '#colophon { background-position: right bottom; }';
    } else { // For `center-center`
        $colormag_internal_css .= '#colophon { background-position: center center; }';
    }
    // Footer background size setting
    $footer_background_size_setting = get_theme_mod('colormag_footer_background_image_size', 'auto');
    if ($footer_background_size_setting == 'cover') { // For `cover`
        $colormag_internal_css .= '#colophon { background-size: cover; }';
    } elseif ($footer_background_size_setting == 'contain') { // For `contain`
        $colormag_internal_css .= '#colophon { background-size: contain; }';
    } else { // for `auto`
        $colormag_internal_css .= '#colophon { background-size: auto; }';
    }
    // Footer background attachment setting
    $footer_background_attachment_setting = get_theme_mod('colormag_footer_background_image_attachment', 'scroll');
    if ($footer_background_attachment_setting == 'fixed') { // For `fixed`
        $colormag_internal_css .= '#colophon { background-attachment: fixed; }';
    } else { // for `scroll`
        $colormag_internal_css .= '#colophon { background-attachment: scroll; }';
    }
    // Footer background repeat setting
    $footer_background_repeat_setting = get_theme_mod('colormag_footer_background_image_repeat', 'scroll');
    if ($footer_background_repeat_setting == 'no-repeat') { // For `no-repeat`
        $colormag_internal_css .= '#colophon { background-repeat: no-repeat; }';
    } elseif ($footer_background_repeat_setting == 'repeat-x') { // for `repeat-x`
        $colormag_internal_css .= '#colophon { background-repeat: repeat-x; }';
    } elseif ($footer_background_repeat_setting == 'repeat-y') { // for `repeat-y`
        $colormag_internal_css .= '#colophon { background-repeat: repeat-y; }';
    } else { // for `repeat`
        $colormag_internal_css .= '#colophon { background-repeat: repeat; }';
    }

    $colormag_internal_css .= '.view-all-link {color:' . $primary_color . '; transition: all .1s ease-in-out;}
                .view-all-link:hover {transform: scale(1.3);}';

    if (!empty($colormag_internal_css)) {
        echo '<!-- ' . get_bloginfo('name') . ' Internal Styles -->';
        ?>
        <style type="text/css"><?php echo $colormag_internal_css; ?></style>
        <?php
    }

    $colormag_custom_css = get_theme_mod('colormag_custom_css');
    if ($colormag_custom_css && !function_exists('wp_update_custom_css_post')) {
        echo '<!-- ' . get_bloginfo('name') . ' Custom Styles -->';
        ?>
        <style type="text/css"><?php echo $colormag_custom_css; ?></style><?php
    }
}

/**
 * Hooks the Custom Internal CSS to head section of child theme
 */
add_action('wp_head', 'colormag_custom_css_child', 105);

/**
 * Main blog in multisite check
 */
function checkMainSite() {
    if (is_main_site()) {
        echo '<style type="text/css">
        #multipageMasterHome {
            display: none;
        }
        </style>';
    }
}

add_action('wp', 'checkMainSite');

/**
 * Hide image caption. Show caption if we only visit the specific post page.
 */
function hideImageCaption() {
    if (!is_single()) {
        echo '<style type="text/css">
        .featured-image-caption {
            display: none !important;
        }
        </style>';
    }
}

add_action('wp', 'hideImageCaption');

?>
