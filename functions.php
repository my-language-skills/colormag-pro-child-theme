<?php

/*
 * Child theme functions file
 * 
 */

/* 
    =============================================================================
    ENQUEUE OF PARENT STYLE
    =============================================================================
*/

function colormag_child_enqueue_styles() {

    $parent_style = 'colormag_style'; //parent theme style handle 'colormag_style'
    //Enqueue parent and chid theme style.css
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('colormag_child_style', get_stylesheet_directory_uri() . '/style.css', array($parent_style), wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'colormag_child_enqueue_styles');

/* 
    =============================================================================
    COLORED CATEGORIES FUNCTIONS MODIFIED FOR CHILD THEME
    =============================================================================
*/

function colormag_colored_category() {
    global $post;
    $categories = get_the_category();
    $slashsep = "/";
    $separator = '&nbsp;';
    $output = '';
    if ($categories) {
        $output .= '<div class="above-entry-meta"><span class="cat-links">';
        foreach ($categories as $category) {
            $color_code = colormag_category_color(get_cat_id($category->cat_name));
            if (!empty($color_code)) {
                $output .= '<a href="' . get_category_link($category->term_id) . '" class="standalone-cat-link" style="background: #0000; color:' . colormag_category_color(get_cat_id($category->cat_name)) . ';" rel="category tag">' . $category->cat_name . '</a>' . $slashsep;
            } else {
                $output .= '<a href="' . get_category_link($category->term_id) . '" class="standalone-cat-link" style="background: #0000; color: #191919; "  rel="category tag">' . $category->cat_name . '</a>' . $slashsep;
            }
        }
        
        $output = rtrim($output,"/ ");

        $output .= '</span></div>';
        echo trim($output, $separator);
    }
}

function colormag_colored_category_on_pic() {
    global $post;
    $categories = get_the_category();
    $slashsep = "/";
    $separator = '&nbsp;';
    $output = '';
    if ($categories) {
        $output .= '<div class="above-entry-meta"><span class="cat-links" style="color: #fff;">';
        foreach ($categories as $category) {
            $color_code = colormag_category_color(get_cat_id($category->cat_name));
            if (!empty($color_code)) {
                $output .= '<a href="' . get_category_link($category->term_id) . '" class="standalone-cat-link" style="background: #0000; color:' . colormag_category_color(get_cat_id($category->cat_name)) . '" rel="category tag">' . $category->cat_name . '</a>' . $slashsep;
            } else {
                $output .= '<a href="' . get_category_link($category->term_id) . '" class="standalone-cat-link" style="background: #0000; color: #191919  rel="category tag">' . $category->cat_name . '</a>' . $slashsep;
            }
        }
        
        $output = rtrim($output,"/ ");

        $output .= '</span></div>';
        echo trim($output, $separator);
    }
}

function colormag_colored_category_return() {
    global $post;
    $categories = get_the_category();
    $slashsep = "/";
    $separator = '&nbsp;';
    $output = '';
    if ($categories) {
        $output .= '<div class="above-entry-meta"><span class="cat-links">';
        foreach ($categories as $category) {
            $color_code = colormag_category_color(get_cat_id($category->cat_name));
            if (!empty($color_code)) {
                $output .= '<a href="' . get_category_link($category->term_id) . '" class="standalone-cat-link" style="background: #0000; color:' . colormag_category_color(get_cat_id($category->cat_name)) . '" rel="category tag">' . $category->cat_name . '</a>' . $slashsep;
            } else {
                $output .= '<a href="' . get_category_link($category->term_id) . '" class="standalone-cat-link" style="background: #0000; color: #191919 rel="category tag">' . $category->cat_name . '</a>' . $slashsep;
            }
        }
        
        $output = rtrim($output,"/ ");

        $output .= '</span></div>';
        $output = trim($output, $separator);
    }

    return $output;
}

/* 
    =============================================================================
    CUSTOM INTERNAL CSS HOOK MODIFIED FOR CHILD THEME
    =============================================================================
*/

add_action( 'wp_head', 'colormag_custom_css_child', 90 );

/**
 * Hooks the Custom Internal CSS to head section
 */
function colormag_custom_css_child() {
	$colormag_internal_css = '';
	$primary_color         = get_theme_mod( 'colormag_primary_color', '#289dcc' );
	if ( $primary_color != '#289dcc' ) {
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
		#masthead.colormag-header-clean .breaking-news .newsticker a:hover{color:' . $primary_color . ' !important}
		.widget_featured_posts .article-content .above-entry-meta .cat-links a,
		.widget_call_to_action .btn--primary,.colormag-footer--classic .footer-widgets-area .widget-title span::before,
		.colormag-footer--classic-bordered .footer-widgets-area .widget-title span::before{background-color:' . $primary_color . '}
		.widget_featured_posts .article-content .entry-title a:hover{color:' . $primary_color . '}
		
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
		
		#site-title a{color:' . $primary_color . '}
		
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
		#colophon .footer-menu ul li a:hover,.footer-widgets-area a:hover,a#scroll-up i{color:' . $primary_color . '}
		.advertisement_above_footer .widget-title{border-bottom:3px solid ' . $primary_color . '}
		.advertisement_above_footer .widget-title span{background-color:' . $primary_color . '}
		.sub-toggle{background:' . $primary_color . '}
		.main-small-navigation li.current-menu-item > .sub-toggle i {color:' . $primary_color . '}
		.error{background:' . $primary_color . '}
		.num-404{color:' . $primary_color . '}';
	}

	// google fonts custom css
	if ( get_theme_mod( 'colormag_site_title_font', 'Open Sans' ) != 'Open Sans' ) {
		$colormag_internal_css .= ' #site-title a { font-family: ' . get_theme_mod( 'colormag_site_title_font', 'Open Sans' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_site_tagline_font', 'Open Sans' ) != 'Open Sans' ) {
		$colormag_internal_css .= ' #site-description { font-family: ' . get_theme_mod( 'colormag_site_tagline_font', 'Open Sans' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_primary_menu_font', 'Open Sans' ) != 'Open Sans' ) {
		$colormag_internal_css .= ' .main-navigation li, .site-header .menu-toggle { font-family: ' . get_theme_mod( 'colormag_primary_menu_font', 'Open Sans' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_all_titles_font', 'Open Sans' ) != 'Open Sans' ) {
		$colormag_internal_css .= ' h1, h2, h3, h4, h5, h6 { font-family: ' . get_theme_mod( 'colormag_all_titles_font', 'Open Sans' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_content_font', 'Open Sans' ) != 'Open Sans' ) {
		$colormag_internal_css .= ' body, button, input, select, textarea, p, blockquote p, .entry-meta, .more-link { font-family: ' . get_theme_mod( 'colormag_content_font', 'Open Sans' ) . '; }';
	}

	// header area font size custom css
	if ( get_theme_mod( 'colormag_title_font_size', '46' ) != '46' ) {
		$colormag_internal_css .= ' #site-title a { font-size: ' . get_theme_mod( 'colormag_title_font_size', '46' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_tagline_font_size', '16' ) != '16' ) {
		$colormag_internal_css .= ' #site-description { font-size: ' . get_theme_mod( 'colormag_tagline_font_size', '16' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_primary_menu_font_size', '14' ) != '14' ) {
		$colormag_internal_css .= ' .main-navigation ul li a { font-size: ' . get_theme_mod( 'colormag_primary_menu_font_size', '14' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_primary_sub_menu_font_size', '14' ) != '14' ) {
		$colormag_internal_css .= ' .main-navigation ul li ul li a { font-size: ' . get_theme_mod( 'colormag_primary_sub_menu_font_size', '14' ) . 'px; }';
	}

	// title related font sizes css
	if ( get_theme_mod( 'colormag_heading_h1_font_size', '42' ) != '42' ) {
		$colormag_internal_css .= ' h1 { font-size: ' . get_theme_mod( 'colormag_heading_h1_font_size', '42' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_heading_h2_font_size', '38' ) != '38' ) {
		$colormag_internal_css .= ' h2 { font-size: ' . get_theme_mod( 'colormag_heading_h2_font_size', '38' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_heading_h3_font_size', '34' ) != '34' ) {
		$colormag_internal_css .= ' h3 { font-size: ' . get_theme_mod( 'colormag_heading_h3_font_size', '34' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_heading_h4_font_size', '30' ) != '30' ) {
		$colormag_internal_css .= ' h4 { font-size: ' . get_theme_mod( 'colormag_heading_h4_font_size', '30' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_heading_h5_font_size', '26' ) != '26' ) {
		$colormag_internal_css .= ' h5 { font-size: ' . get_theme_mod( 'colormag_heading_h5_font_size', '26' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_heading_h6_font_size', '22' ) != '22' ) {
		$colormag_internal_css .= ' h6 { font-size: ' . get_theme_mod( 'colormag_heading_h6_font_size', '22' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_post_title_font_size', '32' ) != '32' ) {
		$colormag_internal_css .= ' #content .post .article-content .entry-title { font-size: ' . get_theme_mod( 'colormag_post_title_font_size', '32' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_page_title_font_size', '34' ) != '34' ) {
		$colormag_internal_css .= ' .type-page .entry-title { font-size: ' . get_theme_mod( 'colormag_page_title_font_size', '34' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_widget_title_font_size', '18' ) != '18' ) {
		$colormag_internal_css .= ' #secondary .widget-title { font-size: ' . get_theme_mod( 'colormag_widget_title_font_size', '18' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_comment_title_font_size', '22' ) != '22' ) {
		$colormag_internal_css .= ' .comments-title, .comment-reply-title, #respond h3#reply-title { font-size: ' . get_theme_mod( 'colormag_comment_title_font_size', '22' ) . 'px; }';
	}

	// content font size custom css
	if ( get_theme_mod( 'colormag_content_font_size', '18' ) != '18' ) {
		$colormag_internal_css .= ' body, button, input, select, textarea, p, blockquote p, dl, .previous a, .next a, .nav-previous a, .nav-next a, #respond h3#reply-title #cancel-comment-reply-link, #respond form input[type="text"], #respond form textarea, #secondary .widget, .error-404 .widget { font-size: ' . get_theme_mod( 'colormag_content_font_size', '18' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_post_meta_font_size', '12' ) != '12' ) {
		$colormag_internal_css .= ' #content .post .article-content .below-entry-meta .posted-on a, #content .post .article-content .below-entry-meta .byline a, #content .post .article-content .below-entry-meta .comments a, #content .post .article-content .below-entry-meta .tag-links a, #content .post .article-content .below-entry-meta .edit-link a, #content .post .article-content .below-entry-meta .total-views { font-size: ' . get_theme_mod( 'colormag_post_meta_font_size', '12' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_button_text_font_size', '12' ) != '12' ) {
		$colormag_internal_css .= ' .colormag-button, input[type="reset"], input[type="button"], input[type="submit"], button, .more-link span { font-size: ' . get_theme_mod( 'colormag_button_text_font_size', '12' ) . 'px; }';
	}

	// footer area font size custom css
	if ( get_theme_mod( 'colormag_footer_widget_title_font_size', '15' ) != '15' ) {
		$colormag_internal_css .= ' .footer-widgets-area .widget-title { font-size: ' . get_theme_mod( 'colormag_footer_widget_title_font_size', '15' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_footer_widget_content_font_size', '14' ) != '14' ) {
		$colormag_internal_css .= ' #colophon, #colophon p { font-size: ' . get_theme_mod( 'colormag_footer_widget_content_font_size', '14' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_footer_copyright_text_font_size', '14' ) != '14' ) {
		$colormag_internal_css .= ' .footer-socket-wrapper .copyright { font-size: ' . get_theme_mod( 'colormag_footer_copyright_text_font_size', '14' ) . 'px; }';
	}
	if ( get_theme_mod( 'colormag_footer_small_menu_font_size', '14' ) != '14' ) {
		$colormag_internal_css .= ' .footer-menu a { font-size: ' . get_theme_mod( 'colormag_footer_small_menu_font_size', '14' ) . 'px; }';
	}

	// header area custom css
	if ( get_theme_mod( 'colormag_site_title_color', '#289dcc' ) != '#289dcc' ) {
		$colormag_internal_css .= ' #site-title a { color: ' . get_theme_mod( 'colormag_site_title_color', '#289dcc' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_site_tagline_color', '#666666' ) != '#666666' ) {
		$colormag_internal_css .= ' #site-description { color: ' . get_theme_mod( 'colormag_site_tagline_color', '#666666' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_primary_menu_text_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' .main-navigation a, .main-navigation ul li ul li a, .main-navigation ul li.current-menu-item ul li a, .main-navigation ul li ul li.current-menu-item a, .main-navigation ul li.current_page_ancestor ul li a, .main-navigation ul li.current-menu-ancestor ul li a, .main-navigation ul li.current_page_item ul li a { color: ' . get_theme_mod( 'colormag_primary_menu_text_color', '#ffffff' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_primary_menu_selected_hovered_text_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' .main-navigation a:hover, .main-navigation ul li.current-menu-item a, .main-navigation ul li.current_page_ancestor a, .main-navigation ul li.current-menu-ancestor a, .main-navigation ul li.current_page_item a, .main-navigation ul li:hover > a, .main-navigation ul li ul li a:hover, .main-navigation ul li ul li:hover > a, .main-navigation ul li.current-menu-item ul li a:hover { color: ' . get_theme_mod( 'colormag_primary_menu_selected_hovered_text_color', '#ffffff' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_header_background_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' #header-text-nav-container { background-color: ' . get_theme_mod( 'colormag_header_background_color', '#ffffff' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_primary_menu_background_color', '#232323' ) != '#232323' ) {
		$colormag_internal_css .= ' #site-navigation { background-color: ' . get_theme_mod( 'colormag_primary_menu_background_color', '#232323' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_primary_sub_menu_background_color', '#232323' ) != '#232323' ) {
		$colormag_internal_css .= ' .main-navigation .sub-menu, .main-navigation .children { background-color: ' . get_theme_mod( 'colormag_primary_sub_menu_background_color', '#232323' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_primary_menu_top_border_color', '#289dcc' ) != '#289dcc' ) {
		$colormag_internal_css .= ' #site-navigation { border-top-color: ' . get_theme_mod( 'colormag_primary_menu_top_border_color', '#289dcc' ) . '; }';
	}

	// content part color options custom css
	if ( get_theme_mod( 'colormag_content_part_title_color', '#333333' ) != '#333333' ) {
		$colormag_internal_css .= ' h1, h2, h3, h4, h5, h6 { color: ' . get_theme_mod( 'colormag_content_part_title_color', '#333333' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_post_title_color', '#333333' ) != '#333333' ) {
		$colormag_internal_css .= ' .post .entry-title, .post .entry-title a { color: ' . get_theme_mod( 'colormag_post_title_color', '#333333' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_page_title_color', '#333333' ) != '#333333' ) {
		$colormag_internal_css .= ' .type-page .entry-title { color: ' . get_theme_mod( 'colormag_page_title_color', '#333333' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_content_text_color', '#444444' ) != '#444444' ) {
		$colormag_internal_css .= ' body, button, input, select, textarea { color: ' . get_theme_mod( 'colormag_content_text_color', '#444444' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_post_meta_color', '#888888' ) != '#888888' ) {
		$colormag_internal_css .= ' .posted-on a, .byline a, .comments a, .tag-links a, .edit-link a { color: ' . get_theme_mod( 'colormag_post_meta_color', '#888888' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_button_text_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' .colormag-button, input[type="reset"], input[type="button"], input[type="submit"], button, .more-link span { color: ' . get_theme_mod( 'colormag_button_text_color', '#ffffff' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_button_background_color', '#d40234' ) != '#d40234' ) {
		$colormag_internal_css .= ' .colormag-button, input[type="reset"], input[type="button"], input[type="submit"], button, .more-link span { background-color: ' . get_theme_mod( 'colormag_button_background_color', '#d40234' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_sidebar_widget_title_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' #secondary .widget-title span { color: ' . get_theme_mod( 'colormag_sidebar_widget_title_color', '#ffffff' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_content_section_background_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' #main { background-color: ' . get_theme_mod( 'colormag_content_section_background_color', '#ffffff' ) . '; }';
	}

	// footer part color options
	if ( get_theme_mod( 'colormag_footer_widget_title_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' .footer-widgets-area .widget-title span { color: ' . get_theme_mod( 'colormag_footer_widget_title_color', '#ffffff' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_footer_widget_content_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' .footer-widgets-area, .footer-widgets-area p { color: ' . get_theme_mod( 'colormag_footer_widget_content_color', '#ffffff' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_footer_widget_content_link_text_color', '#ffffff' ) != '#ffffff' ) {
		$colormag_internal_css .= ' .footer-widgets-area a { color: ' . get_theme_mod( 'colormag_footer_widget_content_link_text_color', '#ffffff' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_footer_widget_background_color', '' ) != '' ) {
		$colormag_internal_css .= ' .footer-widgets-wrapper { background-color: ' . get_theme_mod( 'colormag_footer_widget_background_color', '' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_upper_footer_widget_background_color', '' ) != '#2c2e34' ) {
		$colormag_internal_css .= ' #colophon .tg-upper-footer-widgets .widget { background-color: ' . get_theme_mod( 'colormag_upper_footer_widget_background_color', '#2c2e34' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_footer_copyright_text_color', '#b1b6b6' ) != '#b1b6b6' ) {
		$colormag_internal_css .= ' .footer-socket-wrapper .copyright { color: ' . get_theme_mod( 'colormag_footer_copyright_text_color', '#b1b6b6' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_footer_copyright_link_text_color', '#b1b6b6' ) != '#b1b6b6' ) {
		$colormag_internal_css .= ' .footer-socket-wrapper .copyright a { color: ' . get_theme_mod( 'colormag_footer_copyright_link_text_color', '#b1b6b6' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_footer_small_menu_text_color', '#b1b6b6' ) != '#b1b6b6' ) {
		$colormag_internal_css .= ' #colophon .footer-menu ul li a { color: ' . get_theme_mod( 'colormag_footer_small_menu_text_color', '#b1b6b6' ) . '; }';
	}
	if ( get_theme_mod( 'colormag_footer_copyright_part_background_color', '' ) != '' ) {
		$colormag_internal_css .= ' .footer-socket-wrapper { background-color: ' . get_theme_mod( 'colormag_footer_copyright_part_background_color', '' ) . '; }';
	}
	// post meta data settings
	// total post meta remove
	if ( get_theme_mod( 'colormag_all_entry_meta_remove', 0 ) == 1 ) {
		$colormag_internal_css .= ' .above-entry-meta,.below-entry-meta,.tg-module-meta,.tg-post-categories{display:none;}';
	}
	// author post meta remove
	if ( get_theme_mod( 'colormag_author_entry_meta_remove', 0 ) == 1 ) {
		$colormag_internal_css .= ' .below-entry-meta .byline,.tg-module-meta .tg-post-auther-name{display:none;}';
	}
	// date post meta remove
	if ( get_theme_mod( 'colormag_date_entry_meta_remove', 0 ) == 1 ) {
		$colormag_internal_css .= ' .below-entry-meta .posted-on,.tg-module-meta .tg-post-date{display:none;}';
	}
	// category post meta remove
	if ( get_theme_mod( 'colormag_category_entry_meta_remove', 0 ) == 1 ) {
		$colormag_internal_css .= ' .above-entry-meta,.tg-post-categories{display:none;}';
	}
	// comments post meta remove
	if ( get_theme_mod( 'colormag_comments_entry_meta_remove', 0 ) == 1 ) {
		$colormag_internal_css .= ' .below-entry-meta .comments,.tg-module-meta .tg-module-comments{display:none;}';
	}
	// tags post meta remove
	if ( get_theme_mod( 'colormag_tags_entry_meta_remove', 0 ) == 1 ) {
		$colormag_internal_css .= ' .below-entry-meta .tag-links{display:none;}';
	}

	if ( get_theme_mod( 'colormag_category_menu_color', '' ) == 1 ) {

		$categories = get_terms( 'category', array( 'hide_empty' => false ) );
		$colormag_internal_css
		            .= '
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

		foreach ( $categories as $category ) {
			$cat_color = get_theme_mod( 'colormag_category_color_' . absint( $category->term_id ) );
			$cat_id    = $category->term_id;
			if ( ! empty( $cat_color ) ) {
				$colormag_internal_css
					.= '
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
	if ( get_theme_mod( 'colormag_footer_background_image' ) ) {
		$colormag_internal_css .= ' #colophon { background-image: url(' . get_theme_mod( 'colormag_footer_background_image' ) . ') } .footer-widgets-wrapper, .footer-socket-wrapper, .colormag-footer--classic .footer-socket-wrapper { background-color: transparent; }';
	}
	// Footer background image position setting
	$footer_background_image_position_setting = get_theme_mod( 'colormag_footer_background_image_position', 'center-center' );
	if ( $footer_background_image_position_setting == 'left-top' ) { // For `left-top`
		$colormag_internal_css .= '#colophon { background-position: left top; }';
	} elseif ( $footer_background_image_position_setting == 'center-top' ) { // For `center-top`
		$colormag_internal_css .= '#colophon { background-position: center top; }';
	} elseif ( $footer_background_image_position_setting == 'right-top' ) { // For `right-top`
		$colormag_internal_css .= '#colophon { background-position: right top; }';
	} elseif ( $footer_background_image_position_setting == 'left-center' ) { // For `left-center`
		$colormag_internal_css .= '#colophon { background-position: left center; }';
	} elseif ( $footer_background_image_position_setting == 'right-center' ) { // For `right-center`
		$colormag_internal_css .= '#colophon { background-position: right center; }';
	} elseif ( $footer_background_image_position_setting == 'left-bottom' ) { // For `left-bottom`
		$colormag_internal_css .= '#colophon { background-position: left bottom; }';
	} elseif ( $footer_background_image_position_setting == 'center-bottom' ) { // For `center-bottom`
		$colormag_internal_css .= '#colophon { background-position: center bottom; }';
	} elseif ( $footer_background_image_position_setting == 'right-bottom' ) { // For `right-bottom`
		$colormag_internal_css .= '#colophon { background-position: right bottom; }';
	} else { // For `center-center`
		$colormag_internal_css .= '#colophon { background-position: center center; }';
	}
	// Footer background size setting
	$footer_background_size_setting = get_theme_mod( 'colormag_footer_background_image_size', 'auto' );
	if ( $footer_background_size_setting == 'cover' ) { // For `cover`
		$colormag_internal_css .= '#colophon { background-size: cover; }';
	} elseif ( $footer_background_size_setting == 'contain' ) { // For `contain`
		$colormag_internal_css .= '#colophon { background-size: contain; }';
	} else { // for `auto`
		$colormag_internal_css .= '#colophon { background-size: auto; }';
	}
	// Footer background attachment setting
	$footer_background_attachment_setting = get_theme_mod( 'colormag_footer_background_image_attachment', 'scroll' );
	if ( $footer_background_attachment_setting == 'fixed' ) { // For `fixed`
		$colormag_internal_css .= '#colophon { background-attachment: fixed; }';
	} else { // for `scroll`
		$colormag_internal_css .= '#colophon { background-attachment: scroll; }';
	}
	// Footer background repeat setting
	$footer_background_repeat_setting = get_theme_mod( 'colormag_footer_background_image_repeat', 'scroll' );
	if ( $footer_background_repeat_setting == 'no-repeat' ) { // For `no-repeat`
		$colormag_internal_css .= '#colophon { background-repeat: no-repeat; }';
	} elseif ( $footer_background_repeat_setting == 'repeat-x' ) { // for `repeat-x`
		$colormag_internal_css .= '#colophon { background-repeat: repeat-x; }';
	} elseif ( $footer_background_repeat_setting == 'repeat-y' ) { // for `repeat-y`
		$colormag_internal_css .= '#colophon { background-repeat: repeat-y; }';
	} else { // for `repeat`
		$colormag_internal_css .= '#colophon { background-repeat: repeat; }';
	}
	
	$colormag_internal_css .= '#primary .widget-title{border-bottom: 3px solid ' . $primary_color . '}
		#primary .widget-title span{background-color:' . $primary_color . '}
		.related-posts-wrapper-flyout .entry-title a:hover{color:' . $primary_color . '}
                .view-all-link {color:'.$primary_color.'; transition: all .1s ease-in-out;}
                .view-all-link:hover {transform: scale(1.3);}
                .standalone-cat-link:hover {font-weight: bold; color: '.$primary_color.' !important}
                .excerpt-link-to-post:hover {color: '.$primary_color.' !important; text-decoration: none !important}
                input[type="reset"], input[type="button"], input[type="submit"] {color: '.$primary_color.' !important; border: 2px solid  '.$primary_color.' !important; background-color: #fff;}
                input[type="reset"], input[type="button"], input[type="submit"]:hover{color: #fff !important; background-color: '.$primary_color.' !important}
				.page-header .page-title{border-bottom:3px solid '.$primary_color.'}
		#content .post .article-content .above-entry-meta .cat-links a,
		.page-header .page-title span{background-color: #0000 !important}
		#secondary .widget-title{border-bottom:3px solid ' . $primary_color . '}
		#content .wp-pagenavi .current,#content .wp-pagenavi a:hover,
		#secondary .widget-title span{background-color:' . $primary_color . '}
		.footer-widgets-area .widget-title span{background-color: #0000 !important; font-weight: bolder }
				.footer-widgets-area .widget-title{border-bottom:3px solid '.$primary_color.'}
				.widget_featured_posts .widget-title{border-bottom:3px solid ' . $primary_color . '}
				.widget_featured_posts .widget-title span{background-color: #0000; color: #232323;}';


	if ( ! empty( $colormag_internal_css ) ) {
		echo '<!-- ' . get_bloginfo( 'name' ) . ' Internal Styles -->';
		?>
		<style type="text/css"><?php echo $colormag_internal_css; ?></style>
		<?php
	}

	$colormag_custom_css = get_theme_mod( 'colormag_custom_css' );
	if ( $colormag_custom_css && ! function_exists( 'wp_update_custom_css_post' ) ) {
		echo '<!-- ' . get_bloginfo( 'name' ) . ' Custom Styles -->';
		?>
		<style type="text/css"><?php echo $colormag_custom_css; ?></style><?php
	}
}

/* 
    =============================================================================
    CONTINUE READING FUNCTION MODIFIED FOR CHILD THEME
    =============================================================================
*/

add_filter( 'excerpt_more', 'colormag_continue_reading_child', 9 );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function colormag_continue_reading_child() {
	return '...';
}

function my_undo_hooks() {
    remove_filter( 'excerpt_more', 'colormag_continue_reading' );
}
add_action( 'after_setup_theme', 'my_undo_hooks' );

/* 
    =============================================================================
    WIDGETS MODIFIED FOR CHILD THEME
    =============================================================================
*/

/**
 * Contains all the functions related to sidebar and widget.
 *
 * @package    ThemeGrill
 * @subpackage ColorMag
 * @since      ColorMag 1.0
 */
add_action( 'widgets_init', 'colormag_widgets_init_child', 9 );

/**
 * Function to register the widget areas(sidebar) and widgets.
 */
function colormag_widgets_init_child() {

	/**
	 * Registering widget areas for front page
	 */
	// Registering main right sidebar
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'colormag' ),
		'id'            => 'colormag_right_sidebar',
		'description'   => __( 'Shows widgets at Right side.', 'colormag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// Registering main left sidebar
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'colormag' ),
		'id'            => 'colormag_left_sidebar',
		'description'   => __( 'Shows widgets at Left side.', 'colormag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// Registering Header sidebar
	register_sidebar( array(
		'name'          => __( 'Header Sidebar', 'colormag' ),
		'id'            => 'colormag_header_sidebar',
		'description'   => __( 'Shows widgets in header section just above the main navigation menu.', 'colormag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// registering the Front Page: Top Full width Area
	register_sidebar( array(
		'name'          => __( 'Front Page: Top Full Width Area', 'colormag' ),
		'id'            => 'colormag_front_page_top_full_width_area',
		'description'   => __( 'Show widget just below menu.', 'colormag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// registering the Front Page: Slider Area Sidebar
	register_sidebar( array(
		'name'          => __( 'Front Page: Slider Area', 'colormag' ),
		'id'            => 'colormag_front_page_slider_area',
		'description'   => __( 'Show widget just below menu. Suitable for TG: Featured Cat Slider.', 'colormag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// registering the Front Page: Area beside slider Sidebar
	register_sidebar( array(
		'name'          => __( 'Front Page: Area beside slider', 'colormag' ),
		'id'            => 'colormag_front_page_area_beside_slider',
		'description'   => __( 'Show widget beside the slider. Suitable for TG: Highlighted Posts.', 'colormag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// registering the Front Page: Content Top Section Sidebar
	register_sidebar( array(
		'name'          => __( 'Front Page: Content Top Section', 'colormag' ),
		'id'            => 'colormag_front_page_content_top_section',
		'description'   => __( 'Content Top Section', 'colormag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// registering the Front Page: Content Middle Left Section Sidebar
	register_sidebar( array(
		'name'          => __( 'Front Page: Content Middle Left Section', 'colormag' ),
		'id'            => 'colormag_front_page_content_middle_left_section',
		'description'   => __( 'Content Middle Left Section', 'colormag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// registering the Front Page: Content Middle Right Section Sidebar
	register_sidebar( array(
		'name'          => __( 'Front Page: Content Middle Right Section', 'colormag' ),
		'id'            => 'colormag_front_page_content_middle_right_section',
		'description'   => __( 'Content Middle Right Section', 'colormag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// registering the Front Page: Content Bottom Section Sidebar
	register_sidebar( array(
		'name'          => __( 'Front Page: Content Bottom Section', 'colormag' ),
		'id'            => 'colormag_front_page_content_bottom_section',
		'description'   => __( 'Content Middle Bottom Section', 'colormag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// Registering contact Page sidebar
	register_sidebar( array(
		'name'          => __( 'Contact Page Sidebar', 'colormag' ),
		'id'            => 'colormag_contact_page_sidebar',
		'description'   => __( 'Shows widgets on Contact Page Template.', 'colormag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// Registering Error 404 Page sidebar
	register_sidebar( array(
		'name'          => __( 'Error 404 Page Sidebar', 'colormag' ),
		'id'            => 'colormag_error_404_page_sidebar',
		'description'   => __( 'Shows widgets on Error 404 page.', 'colormag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// Registering advertisement above footer sidebar
	register_sidebar( array(
		'name'          => __( 'Advertisement Above The Footer', 'colormag' ),
		'id'            => 'colormag_advertisement_above_the_footer_sidebar',
		'description'   => __( 'Shows widgets Just Above The Footer, suitable for TG: 728x90 widget.', 'colormag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// Registering footer sidebar one upper
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar One ( Upper )', 'colormag' ),
		'id'            => 'colormag_footer_sidebar_one_upper',
		'description'   => __( 'Shows widgets at footer sidebar one in upper.', 'colormag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// Registering footer sidebar two upper
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar Two ( Upper )', 'colormag' ),
		'id'            => 'colormag_footer_sidebar_two_upper',
		'description'   => __( 'Shows widgets at footer sidebar two in upper.', 'colormag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// Registering footer sidebar three upper
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar Three ( Upper )', 'colormag' ),
		'id'            => 'colormag_footer_sidebar_three_upper',
		'description'   => __( 'Shows widgets at footer sidebar three in upper.', 'colormag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// Registering footer sidebar one
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar One ( Lower )', 'colormag' ),
		'id'            => 'colormag_footer_sidebar_one',
		'description'   => __( 'Shows widgets at footer sidebar one.', 'colormag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// Registering footer sidebar two
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar Two ( Lower )', 'colormag' ),
		'id'            => 'colormag_footer_sidebar_two',
		'description'   => __( 'Shows widgets at footer sidebar two.', 'colormag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// Registering footer sidebar three
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar Three ( Lower )', 'colormag' ),
		'id'            => 'colormag_footer_sidebar_three',
		'description'   => __( 'Shows widgets at footer sidebar three.', 'colormag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// Registering footer sidebar four
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar Four ( Lower )', 'colormag' ),
		'id'            => 'colormag_footer_sidebar_four',
		'description'   => __( 'Shows widgets at footer sidebar four.', 'colormag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// Registering full width footer sidebar.
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar Full Width', 'colormag' ),
		'id'            => 'colormag_footer_sidebar_full_width',
		'description'   => esc_html__( 'Shows widgets just above footer copyright area.', 'colormag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// Registering sidebar for WooCommerce pages.
	if ( ( get_theme_mod( 'colormag_woocommerce_sidebar_register_setting', 0 ) == 1 ) && class_exists( 'WooCommerce' ) ) {
		// Registering WooCommerce Right Sidebar.
		register_sidebar( array(
			'name'          => esc_html__( 'WooCommerce Right Sidebar', 'colormag' ),
			'id'            => 'colormag_woocommerce_right_sidebar',
			'description'   => esc_html__( 'Shows widgets at WooCommerce Right sidebar.', 'colormag' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		) );

		// Registering WooCommerce Left Sidebar.
		register_sidebar( array(
			'name'          => esc_html__( 'WooCommerce Left Sidebar', 'colormag' ),
			'id'            => 'colormag_woocommerce_left_sidebar',
			'description'   => esc_html__( 'Shows widgets at WooCommerce Left sidebar.', 'colormag' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		) );
	}

	register_widget( "colormag_featured_posts_slider_widget_child" );
	register_widget( "colormag_highlighted_posts_widget_child" );
	register_widget( "colormag_featured_posts_widget_child" );
	register_widget( "colormag_featured_posts_vertical_widget_child" );
	register_widget( "colormag_728x90_advertisement_widget_child" );
	register_widget( "colormag_300x250_advertisement_widget_child" );
	register_widget( "colormag_125x125_advertisement_widget_child" );
	// Pro Options
	register_widget( "colormag_video_widget_child" );
	register_widget( "colormag_news_in_picture_widget_child" );
	register_widget( "colormag_default_news_widget_child" );
	register_widget( "colormag_tabbed_widget_child" );
	register_widget( "colormag_random_post_widget_child" );
	register_widget( "colormag_slider_news_widget_child" );
	register_widget( "colormag_breaking_news_widget_child" );
	register_widget( "colormag_ticker_news_widget_child" );
	register_widget( "colormag_featured_posts_small_thumbnails_child" );

	register_widget( "colormag_weather_widget_child" );
	register_widget( "colormag_cta_widget_child" );
	register_widget( "colormag_video_playlist_child" );
	register_widget( "colormag_exchange_widget_child" );
	register_widget( "colormag_google_maps_widget_child" );
}

/* * ************************************************************************************* */

/**
 * Featured Posts widget
 */
class colormag_featured_posts_slider_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'   => 'widget_featured_slider widget_featured_meta',
			'description' => __( 'Display latest posts or posts of specific category, which will be used as the slider.', 'colormag' ),
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Featured Category Slider', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$tg_defaults['number']         = 4;
		$tg_defaults['type']           = 'latest';
		$tg_defaults['category']       = '';
		$tg_defaults['image_size']     = 'medium';
		$tg_defaults['random_posts']   = '0';
		$tg_defaults['child_category'] = '0';
		$tg_defaults['slider_mode']    = 'horizontal';
		$tg_defaults['slider_speed']   = 1500;
		$tg_defaults['slider_pause']   = 5000;
		$tg_defaults['slider_auto']    = '0';
		$tg_defaults['slider_hover']   = '0';
		$instance                      = wp_parse_args( ( array ) $instance, $tg_defaults );
		$number                        = $instance['number'];
		$type                          = $instance['type'];
		$category                      = $instance['category'];
		$image_size                    = $instance['image_size'];
		$random_posts                  = $instance['random_posts'] ? 'checked="checked"' : '';
		$child_category                = $instance['child_category'] ? 'checked="checked"' : '';
		$slider_mode                   = $instance['slider_mode'];
		$slider_speed                  = $instance['slider_speed'];
		$slider_pause                  = $instance['slider_pause'];
		$slider_auto                   = $instance['slider_auto'] ? 'checked="checked"' : '';
		$slider_hover                  = $instance['slider_hover'] ? 'checked="checked"' : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to display:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p>
			<input type="radio" <?php checked( $type, 'latest' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest" /><?php _e( 'Show latest Posts', 'colormag' ); ?>
			<br />
			<input type="radio" <?php checked( $type, 'category' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category" /><?php _e( 'Show posts from a category', 'colormag' ); ?>
			<br /></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'colormag' ); ?>
				:</label>
			<?php wp_dropdown_categories( array(
				'show_option_none' => ' ',
				'name'             => $this->get_field_name( 'category' ),
				'selected'         => $category,
			) ); ?>
		</p>
		<p><?php _e( 'Image Size:', 'colormag' ); ?></p>
		<p>
			<input type="radio" <?php checked( $image_size, 'medium' ) ?> id="<?php echo $this->get_field_id( 'image_size' ); ?>" name="<?php echo $this->get_field_name( 'image_size' ); ?>" value="medium" /><?php _e( 'Image Size medium (800X445 pixels)', 'colormag' ); ?>
			<br />
			<input type="radio" <?php checked( $image_size, 'large' ) ?> id="<?php echo $this->get_field_id( 'image_size' ); ?>" name="<?php echo $this->get_field_name( 'image_size' ); ?>" value="large" /><?php _e( 'Image Size large (1400X600 pixels, suitable for Front Page: Top Full Width Area)', 'colormag' ); ?>
			<br /></p>

		<p>
			<input class="checkbox" <?php echo $random_posts; ?> id="<?php echo $this->get_field_id( 'random_posts' ); ?>" name="<?php echo $this->get_field_name( 'random_posts' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'random_posts' ); ?>"><?php _e( 'Check to display the random post from either the chosen category or from latest post.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $child_category; ?> id="<?php echo $this->get_field_id( 'child_category' ); ?>" name="<?php echo $this->get_field_name( 'child_category' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'child_category' ); ?>"><?php _e( 'Check to display the posts from child category of the chosen category.', 'colormag' ); ?></label>
		</p>

		<h2>
			<?php esc_html_e( 'Slider Options', 'colormag' ); ?>
			<hr>
		</h2>
		<p>
			<label for="<?php echo $this->get_field_id( 'slider_mode' ); ?>"><?php esc_html_e( 'Slide Mode:', 'colormag' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'slider_mode' ); ?>" name="<?php echo $this->get_field_name( 'slider_mode' ); ?>">
				<option value="horizontal" <?php selected( $instance['slider_mode'], 'horizontal' ); ?>><?php esc_html_e( 'Horizontal', 'colormag' ); ?></option>
				<option value="vertical" <?php selected( $instance['slider_mode'], 'vertical' ); ?>><?php esc_html_e( 'Vertical', 'colormag' ); ?></option>
				<option value="fade" <?php selected( $instance['slider_mode'], 'fade' ); ?>><?php esc_html_e( 'Fade', 'colormag' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'slider_speed' ); ?>"><?php esc_html_e( 'Transition Speed Time (in ms):', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'slider_speed' ); ?>" name="<?php echo $this->get_field_name( 'slider_speed' ); ?>" type="text" value="<?php echo esc_attr( $slider_speed ); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'slider_pause' ); ?>"><?php esc_html_e( 'Transition Pause Time (in ms):', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'slider_pause' ); ?>" name="<?php echo $this->get_field_name( 'slider_pause' ); ?>" type="text" value="<?php echo esc_attr( $slider_pause ); ?>" size="3" />
		</p>

		<p>
			<input class="checkbox" <?php echo $slider_auto; ?> id="<?php echo $this->get_field_id( 'slider_auto' ); ?>" name="<?php echo $this->get_field_name( 'slider_auto' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'slider_auto' ); ?>"><?php esc_html_e( 'Check to disable auto slide.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $slider_hover; ?> id="<?php echo $this->get_field_id( 'slider_hover' ); ?>" name="<?php echo $this->get_field_name( 'slider_hover' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'slider_hover' ); ?>"><?php esc_html_e( 'Check to disable auto slide when mouse hover.', 'colormag' ); ?></label>
		</p>

		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance                   = $old_instance;
		$instance['number']         = absint( $new_instance['number'] );
		$instance['type']           = $new_instance['type'];
		$instance['category']       = $new_instance['category'];
		$instance['image_size']     = $new_instance['image_size'];
		$instance['random_posts']   = isset( $new_instance['random_posts'] ) ? 1 : 0;
		$instance['child_category'] = isset( $new_instance['child_category'] ) ? 1 : 0;
		$instance['slider_mode']    = $new_instance['slider_mode'];
		$instance['slider_speed']   = absint( $new_instance['slider_speed'] );
		$instance['slider_pause']   = absint( $new_instance['slider_pause'] );
		$instance['slider_auto']    = isset( $new_instance['slider_auto'] ) ? 1 : 0;
		$instance['slider_hover']   = isset( $new_instance['slider_hover'] ) ? 1 : 0;

		return $instance;
	}

	function widget( $args, $instance ) {
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() || ( function_exists( 'colormag_elementor_active_page_check' ) && colormag_elementor_active_page_check() ) ) {
			wp_enqueue_script( 'colormag-bxslider' );
		}
		extract( $args );
		extract( $instance );

		global $post;
		$number         = empty( $instance['number'] ) ? 4 : $instance['number'];
		$type           = isset( $instance['type'] ) ? $instance['type'] : 'latest';
		$category       = isset( $instance['category'] ) ? $instance['category'] : '';
		$image_size     = isset( $instance['image_size'] ) ? $instance['image_size'] : 'medium';
		$random_posts   = ! empty( $instance['random_posts'] ) ? 'true' : 'false';
		$child_category = ! empty( $instance['child_category'] ) ? 'true' : 'false';
		$slider_mode    = isset( $instance['slider_mode'] ) ? $instance['slider_mode'] : 'horizontal';
		$slider_speed   = empty( $instance['slider_speed'] ) ? 1500 : $instance['slider_speed'];
		$slider_pause   = empty( $instance['slider_pause'] ) ? 5000 : $instance['slider_pause'];
		$slider_auto    = ! empty( $instance['slider_auto'] ) ? 'false' : 'true';
		$slider_hover   = ! empty( $instance['slider_hover'] ) ? 'true' : 'false';

		// adding the excluding post function
		$post__not_in = colormag_exclude_duplicate_posts();

		if ( $type == 'latest' ) {
			if ( $random_posts == 'false' ) {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'post__not_in'        => $post__not_in,
				) );
			} else {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'orderby'             => 'rand',
					'post__not_in'        => $post__not_in,
				) );
			}
		} else {
			if ( $random_posts == 'false' ) {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				}
			} else {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				}
			}
		}

		colormag_append_excluded_duplicate_posts( $get_featured_posts );
		echo $before_widget;

		$single_post_class = '';
		if ( $number == '1' ) {
			$single_post_class = 'single-post';
		}
		?>

		<div class="widget_featured_slider_inner_wrap clearfix <?php echo esc_attr( $single_post_class ); ?>">
			<?php
			if ( $image_size == 'medium' ) {
				$featured = 'colormag-featured-image';
			} else {
				$featured = 'colormag-featured-image-large';
			}
			?>
			<div id="category_slider_<?php echo esc_attr( $this->id ); ?>" class="widget_slider_area_rotate" data-mode="<?php echo esc_attr( $slider_mode ); ?>" data-speed="<?php echo esc_attr( $slider_speed ); ?>" data-pause="<?php echo esc_attr( $slider_pause ); ?>" data-auto="<?php echo esc_attr( $slider_auto ); ?>" data-hover="<?php echo esc_attr( $slider_hover ); ?>">
				<?php
				$i = 1;
				while ( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();

					if ( $i == 1 ) {
						$classes = "single-slide displayblock";
					} else {
						$classes = "single-slide displaynone";
					}

					// Display the reading time dynamically.
					$reading_time       = '';
					$reading_time_class = '';
					if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) {
						$reading_time       = 'data-file="' . get_the_permalink() . '" data-target="article"';
						$reading_time_class = 'readingtime';
					}
					?>
					<div class="<?php echo $classes; ?> <?php echo $reading_time_class; ?>" <?php echo $reading_time; ?>>
						<?php
						if ( has_post_thumbnail() ) {
							$image           = '';
							$title_attribute = get_the_title( $post->ID );
							$image           .= '<figure class="slider-featured-image">';
							$image           .= '<a href="' . get_permalink() . '" title="' . the_title( '', '', false ) . '">';
							$image           .= get_the_post_thumbnail( $post->ID, $featured, array(
									'title' => esc_attr( $title_attribute ),
									'alt'   => esc_attr( $title_attribute ),
								) ) . '</a>';
							$image           .= '</figure>';
							echo $image;
						} else {
							?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/img/slider-featured-image.png">
							</a>
						<?php }
						?>
						<div class="slide-content" style="color: white; letter-spacing: -1px; background: rgb(0, 0, 0); background: rgba(0, 0, 0, 0.7); padding: 10px; ">
							<h3 class="entry-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h3>
                                                        <?php colormag_colored_category_on_pic(); ?>
							<div class="below-entry-meta">
								<?php
								$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
								$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() )
								);
								printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'colormag' ), esc_url( get_permalink() ), esc_attr( get_the_time() ), $time_string
								);
								?> <!--
								<span class="byline"><span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="<?php /* echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); */ ?>" title="<?php /* echo get_the_author(); */ ?>"><?php /* echo esc_html( get_the_author() ); */ ?></a></span></span>
								<span class="comments"><i class="fa fa-comment"></i><?php /* comments_popup_link( '0', '1', '%' ); */ ?></span>
								--> <?php if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) { ?>
									<span class="reading-time">
										<span class="eta"></span> <?php esc_html_e( 'min read', 'colormag' ); ?>
									</span>
								<?php } ?>
							</div>
						</div>

					</div>
					<?php
					$i ++;
				endwhile;
				// Reset Post Data
				wp_reset_query();
				?>
			</div>
		</div>
		<?php
		echo $after_widget;
	}

}

/**
 * Highlighted Posts widget
 */
class colormag_highlighted_posts_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_highlighted_posts widget_featured_meta',
			'description'                 => __( 'Display latest posts or posts of specific category. Suitable for the Area Beside Slider Sidebar.', 'colormag' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Highligted Posts', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$tg_defaults['number']         = 4;
		$tg_defaults['type']           = 'latest';
		$tg_defaults['category']       = '';
		$tg_defaults['random_posts']   = '0';
		$tg_defaults['child_category'] = '0';
		$instance                      = wp_parse_args( ( array ) $instance, $tg_defaults );
		$number                        = $instance['number'];
		$type                          = $instance['type'];
		$category                      = $instance['category'];
		$random_posts                  = $instance['random_posts'] ? 'checked="checked"' : '';
		$child_category                = $instance['child_category'] ? 'checked="checked"' : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to display:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p>
			<input type="radio" <?php checked( $type, 'latest' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest" /><?php _e( 'Show latest Posts', 'colormag' ); ?>
			<br />
			<input type="radio" <?php checked( $type, 'category' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category" /><?php _e( 'Show posts from a category', 'colormag' ); ?>
			<br /></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'colormag' ); ?>
				:</label>
			<?php wp_dropdown_categories( array(
				'show_option_none' => ' ',
				'name'             => $this->get_field_name( 'category' ),
				'selected'         => $category,
			) ); ?>
		</p>

		<p>
			<input class="checkbox" <?php echo $random_posts; ?> id="<?php echo $this->get_field_id( 'random_posts' ); ?>" name="<?php echo $this->get_field_name( 'random_posts' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'random_posts' ); ?>"><?php _e( 'Check to display the random post from either the chosen category or from latest post.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $child_category; ?> id="<?php echo $this->get_field_id( 'child_category' ); ?>" name="<?php echo $this->get_field_name( 'child_category' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'child_category' ); ?>"><?php _e( 'Check to display the posts from child category of the chosen category.', 'colormag' ); ?></label>
		</p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance                   = $old_instance;
		$instance['number']         = absint( $new_instance['number'] );
		$instance['type']           = $new_instance['type'];
		$instance['category']       = $new_instance['category'];
		$instance['random_posts']   = isset( $new_instance['random_posts'] ) ? 1 : 0;
		$instance['child_category'] = isset( $new_instance['child_category'] ) ? 1 : 0;

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$number         = empty( $instance['number'] ) ? 4 : $instance['number'];
		$type           = isset( $instance['type'] ) ? $instance['type'] : 'latest';
		$category       = isset( $instance['category'] ) ? $instance['category'] : '';
		$random_posts   = ! empty( $instance['random_posts'] ) ? 'true' : 'false';
		$child_category = ! empty( $instance['child_category'] ) ? 'true' : 'false';

		// adding the excluding post function
		$post__not_in = colormag_exclude_duplicate_posts();

		if ( $type == 'latest' ) {
			if ( $random_posts == 'false' ) {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'post__not_in'        => $post__not_in,
				) );
			} else {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'orderby'             => 'rand',
					'post__not_in'        => $post__not_in,
				) );
			}
		} else {
			if ( $random_posts == 'false' ) {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				}
			} else {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				}
			}
		}

		colormag_append_excluded_duplicate_posts( $get_featured_posts );
		echo $before_widget;
		?>
		<div class="widget_highlighted_post_area">
			<?php $featured = 'colormag-highlighted-post'; ?>
			<?php
			$i = 1;
			while ( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();

				// Display the reading time dynamically.
				$reading_time       = '';
				$reading_time_class = '';
				if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) {
					$reading_time       = 'data-file="' . get_the_permalink() . '" data-target="article"';
					$reading_time_class = 'readingtime';
				}
				?>
				<div class="single-article <?php echo $reading_time_class; ?>" <?php echo $reading_time; ?>>
					<?php
					if ( has_post_thumbnail() ) {
						$image           = '';
						$title_attribute = get_the_title( $post->ID );
						$image           .= '<figure class="highlights-featured-image">';
						$image           .= '<a href="' . get_permalink() . '" title="' . the_title( '', '', false ) . '">';
						$image           .= get_the_post_thumbnail( $post->ID, $featured, array(
								'title' => esc_attr( $title_attribute ),
								'alt'   => esc_attr( $title_attribute ),
							) ) . '</a>';
						$image           .= '</figure>';
						echo $image;
					} else {
						?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/highlights-featured-image.png">
						</a>
					<?php }
					?>
					<div class="article-content" style="color: white; letter-spacing: -1px; background: rgb(0, 0, 0); background: rgba(0, 0, 0, 0.7); padding: 10px; ">
						<?php colormag_colored_category(); ?>
						<h3 class="entry-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h3>
						<div class="below-entry-meta">
							<?php
							$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
							$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() )
							);
							printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'colormag' ), esc_url( get_permalink() ), esc_attr( get_the_time() ), $time_string
							);
							?>
							<!-- <span class="byline"><span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="<?php /* echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); */ ?>" title="<?php /* echo get_the_author(); */ ?>"><?php /* echo esc_html( get_the_author() ); */ ?></a></span></span>
							<span class="comments"><i class="fa fa-comment"></i><?php /* comments_popup_link( '0', '1', '%' ); */ ?></span>
							--><?php if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) { ?>
								<span class="reading-time">
									<span class="eta"></span> <?php esc_html_e( 'min read', 'colormag' ); ?>
								</span>
							<?php } ?>
						</div>
					</div>

				</div>
				<?php
				$i ++;
			endwhile;
			// Reset Post Data
			wp_reset_query();
			?>
		</div>
		<?php
		echo $after_widget;
	}

}

/**
 * Featured Posts widget
 */
class colormag_featured_posts_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_featured_posts widget_featured_meta',
			'description'                 => __( 'Display latest posts or posts of specific category.', 'colormag' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Featured Posts (Style 1)', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$tg_defaults['title']           = '';
		$tg_defaults['text']            = '';
		$tg_defaults['number']          = 4;
		$tg_defaults['type']            = 'latest';
		$tg_defaults['category']        = '';
		$tg_defaults['random_posts']    = '0';
		$tg_defaults['child_category']  = '0';
		$tg_defaults['view_all_button'] = '0';
		$instance                       = wp_parse_args( ( array ) $instance, $tg_defaults );
		$title                          = esc_attr( $instance['title'] );
		$text                           = esc_textarea( $instance['text'] );
		$number                         = $instance['number'];
		$type                           = $instance['type'];
		$category                       = $instance['category'];
		$random_posts                   = $instance['random_posts'] ? 'checked="checked"' : '';
		$child_category                 = $instance['child_category'] ? 'checked="checked"' : '';
		$view_all_button                = $instance['view_all_button'] ? 'checked="checked"' : '';
		?>
		<p><?php _e( 'Layout will be as below:', 'colormag' ) ?></p>
		<div style="text-align: center;"><img src="<?php echo get_template_directory_uri() . '/img/style-1.jpg' ?>">
		</div>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php _e( 'Description', 'colormag' ); ?>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo $text; ?></textarea>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to display:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p>
			<input type="radio" <?php checked( $type, 'latest' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest" /><?php _e( 'Show latest Posts', 'colormag' ); ?>
			<br />
			<input type="radio" <?php checked( $type, 'category' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category" /><?php _e( 'Show posts from a category', 'colormag' ); ?>
			<br /></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'colormag' ); ?>
				:</label>
			<?php wp_dropdown_categories( array(
				'show_option_none' => ' ',
				'name'             => $this->get_field_name( 'category' ),
				'selected'         => $category,
			) ); ?>
		</p>

		<p>
			<input class="checkbox" <?php echo $random_posts; ?> id="<?php echo $this->get_field_id( 'random_posts' ); ?>" name="<?php echo $this->get_field_name( 'random_posts' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'random_posts' ); ?>"><?php esc_html_e( 'Check to display the random post from either the chosen category or from latest post.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $child_category; ?> id="<?php echo $this->get_field_id( 'child_category' ); ?>" name="<?php echo $this->get_field_name( 'child_category' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'child_category' ); ?>"><?php _e( 'Check to display the posts from child category of the chosen category.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $view_all_button; ?> id="<?php echo $this->get_field_id( 'view_all_button' ); ?>" name="<?php echo $this->get_field_name( 'view_all_button' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'view_all_button' ); ?>"><?php esc_html_e( 'Check to display the view all button to link that button to the specific category chosen in this widget.', 'colormag' ); ?></label>
		</p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['text'] = $new_instance['text'];
		} else {
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['text'] ) ) );
		}
		$instance['number']          = absint( $new_instance['number'] );
		$instance['type']            = $new_instance['type'];
		$instance['category']        = $new_instance['category'];
		$instance['random_posts']    = isset( $new_instance['random_posts'] ) ? 1 : 0;
		$instance['child_category']  = isset( $new_instance['child_category'] ) ? 1 : 0;
		$instance['view_all_button'] = isset( $new_instance['view_all_button'] ) ? 1 : 0;

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$title           = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$text            = isset( $instance['text'] ) ? $instance['text'] : '';
		$number          = empty( $instance['number'] ) ? 4 : $instance['number'];
		$type            = isset( $instance['type'] ) ? $instance['type'] : 'latest';
		$category        = isset( $instance['category'] ) ? $instance['category'] : '';
		$random_posts    = ! empty( $instance['random_posts'] ) ? 'true' : 'false';
		$child_category  = ! empty( $instance['child_category'] ) ? 'true' : 'false';
		$view_all_button = ! empty( $instance['view_all_button'] ) ? 'true' : 'false';

		// For WPML plugin compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'ColorMag Pro', 'TG: Featured Posts (Style 1) Description' . $this->id, $text );
		}

		// adding the excluding post function
		$post__not_in = colormag_exclude_duplicate_posts();

		if ( $type == 'latest' ) {
			if ( $random_posts == 'false' ) {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'post__not_in'        => $post__not_in,
				) );
			} else {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'orderby'             => 'rand',
					'post__not_in'        => $post__not_in,
				) );
			}
		} else {
			if ( $random_posts == 'false' ) {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				}
			} else {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				}
			}
		}

		colormag_append_excluded_duplicate_posts( $get_featured_posts );
		echo $before_widget;
		?>
		<?php
		if ( $type != 'latest' ) {
			$border_color = 'style="border-bottom-color:' . colormag_category_color( $category ) . ';"';
			$title_color  = 'style="background-color: #0000;"';
		} else {
			$border_color = '';
			$title_color  = '';
		}
		// For WPML plugin compatibility
		if ( function_exists( 'icl_t' ) ) {
			$text = icl_t( 'ColorMag Pro', 'TG: Featured Posts (Style 1) Description' . $this->id, $text );
		}

		// assign the view all link to be displayed in the widget title
		$category_link = '';
		if ( $view_all_button == 'true' && ( ! empty( $category ) && $type != 'latest' ) ) {
			$category_link = '<a href="' . esc_url( get_category_link( $category ) ) . '" class="view-all-link">' . get_theme_mod( 'colormag_view_all_text', esc_html__( 'View All', 'colormag' ) ) . '</a>';
		}

		if ( ! empty( $title ) ) {
			echo '<h3 class="widget-title" ' . $border_color . '><span ' . $title_color . '>' . esc_html( $title ) . '</span>' . $category_link . '</h3>';
		}
		if ( ! empty( $text ) ) {
			?> <p> <?php echo esc_textarea( $text ); ?> </p> <?php
		}

		$i = 1;
		while ( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();
			?>
			<?php
			if ( $i == 1 ) {
				$featured = 'colormag-featured-post-medium';
			} else {
				$featured = 'colormag-featured-post-small';
			}
			?>
			<?php
			if ( $i == 1 ) {
				echo '<div class="first-post">';
			} elseif ( $i == 2 ) {
				echo '<div class="following-post">';
			}

			// Display the reading time dynamically.
			$reading_time       = '';
			$reading_time_class = '';
			if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) {
				$reading_time       = 'data-file="' . get_the_permalink() . '" data-target="article"';
				$reading_time_class = 'readingtime';
			}
			?>
			<div class="single-article clearfix <?php echo $reading_time_class; ?>" <?php echo $reading_time; ?>>
				<?php
				if ( has_post_thumbnail() ) {
					$image           = '';
					$title_attribute = get_the_title( $post->ID );
					$image           .= '<figure>';
					$image           .= '<a href="' . get_permalink() . '" title="' . the_title( '', '', false ) . '">';
					$image           .= get_the_post_thumbnail( $post->ID, $featured, array(
							'title' => esc_attr( $title_attribute ),
							'alt'   => esc_attr( $title_attribute ),
						) ) . '</a>';
					$image           .= '</figure>';
					echo $image;
				}
				?>
				<div class="article-content">
					
					<h3 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h3>
                                    <?php colormag_colored_category(); ?>
					<div class="below-entry-meta">
						<?php
						$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
						$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() )
						);
						printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'colormag' ), esc_url( get_permalink() ), esc_attr( get_the_time() ), $time_string
						);
						?>
						<!-- <span class="byline"><span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="<?php /* echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); */ ?>" title="<?php /* echo get_the_author(); */ ?>"><?php /* echo esc_html( get_the_author() ); */ ?></a></span></span>
						<span class="comments"><i class="fa fa-comment"></i><?php /* comments_popup_link( '0', '1', '%' ); */ ?></span>
						--> <?php if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) { ?>
							<span class="reading-time">
								<span class="eta"></span> <?php esc_html_e( 'min read', 'colormag' ); ?>
							</span>
						<?php } ?>
					</div>
					<?php if ( $i == 1 ) { ?>
						<div class="entry-content">
							<?php the_excerpt(); ?>
						</div>
					<?php } ?>
				</div>

			</div>
			<?php
			if ( $i == 1 ) {
				echo '</div>';
			}
			?>
			<?php
			$i ++;
		endwhile;
		if ( $i > 2 ) {
			echo '</div>';
		}
		// Reset Post Data
		wp_reset_query();
		?>
		<!-- </div> -->
		<?php
		echo $after_widget;
	}

}

/**
 * Featured Posts widget
 */
class colormag_featured_posts_vertical_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_featured_posts widget_featured_posts_vertical widget_featured_meta',
			'description'                 => __( 'Display latest posts or posts of specific category.', 'colormag' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Featured Posts (Style 2)', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$tg_defaults['title']           = '';
		$tg_defaults['text']            = '';
		$tg_defaults['number']          = 4;
		$tg_defaults['type']            = 'latest';
		$tg_defaults['category']        = '';
		$tg_defaults['random_posts']    = '0';
		$tg_defaults['child_category']  = '0';
		$tg_defaults['view_all_button'] = '0';
		$instance                       = wp_parse_args( ( array ) $instance, $tg_defaults );
		$title                          = esc_attr( $instance['title'] );
		$text                           = esc_textarea( $instance['text'] );
		$number                         = $instance['number'];
		$type                           = $instance['type'];
		$category                       = $instance['category'];
		$random_posts                   = $instance['random_posts'] ? 'checked="checked"' : '';
		$child_category                 = $instance['child_category'] ? 'checked="checked"' : '';
		$view_all_button                = $instance['view_all_button'] ? 'checked="checked"' : '';
		?>
		<p><?php _e( 'Layout will be as below:', 'colormag' ) ?></p>
		<div style="text-align: center;"><img src="<?php echo get_template_directory_uri() . '/img/style-2.jpg' ?>">
		</div>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php _e( 'Description', 'colormag' ); ?>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo $text; ?></textarea>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to display:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p>
			<input type="radio" <?php checked( $type, 'latest' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest" /><?php _e( 'Show latest Posts', 'colormag' ); ?>
			<br />
			<input type="radio" <?php checked( $type, 'category' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category" /><?php _e( 'Show posts from a category', 'colormag' ); ?>
			<br /></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'colormag' ); ?>
				:</label>
			<?php wp_dropdown_categories( array(
				'show_option_none' => ' ',
				'name'             => $this->get_field_name( 'category' ),
				'selected'         => $category,
			) ); ?>
		</p>

		<p>
			<input class="checkbox" <?php echo $random_posts; ?> id="<?php echo $this->get_field_id( 'random_posts' ); ?>" name="<?php echo $this->get_field_name( 'random_posts' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'random_posts' ); ?>"><?php _e( 'Check to display the random post from either the chosen category or from latest post.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $child_category; ?> id="<?php echo $this->get_field_id( 'child_category' ); ?>" name="<?php echo $this->get_field_name( 'child_category' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'child_category' ); ?>"><?php _e( 'Check to display the posts from child category of the chosen category.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $view_all_button; ?> id="<?php echo $this->get_field_id( 'view_all_button' ); ?>" name="<?php echo $this->get_field_name( 'view_all_button' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'view_all_button' ); ?>"><?php esc_html_e( 'Check to display the view all button to link that button to the specific category chosen in this widget.', 'colormag' ); ?></label>
		</p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['text'] = $new_instance['text'];
		} else {
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['text'] ) ) );
		}
		$instance['number']          = absint( $new_instance['number'] );
		$instance['type']            = $new_instance['type'];
		$instance['category']        = $new_instance['category'];
		$instance['random_posts']    = isset( $new_instance['random_posts'] ) ? 1 : 0;
		$instance['child_category']  = isset( $new_instance['child_category'] ) ? 1 : 0;
		$instance['view_all_button'] = isset( $new_instance['view_all_button'] ) ? 1 : 0;

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$title           = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$text            = isset( $instance['text'] ) ? $instance['text'] : '';
		$number          = empty( $instance['number'] ) ? 4 : $instance['number'];
		$type            = isset( $instance['type'] ) ? $instance['type'] : 'latest';
		$category        = isset( $instance['category'] ) ? $instance['category'] : '';
		$random_posts    = ! empty( $instance['random_posts'] ) ? 'true' : 'false';
		$child_category  = ! empty( $instance['child_category'] ) ? 'true' : 'false';
		$view_all_button = ! empty( $instance['view_all_button'] ) ? 'true' : 'false';

		// For WPML plugin compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'ColorMag Pro', 'TG: Featured Posts (Style 2) Description' . $this->id, $text );
		}

		// adding the excluding post function
		$post__not_in = colormag_exclude_duplicate_posts();

		if ( $type == 'latest' ) {
			if ( $random_posts == 'false' ) {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'post__not_in'        => $post__not_in,
				) );
			} else {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'orderby'             => 'rand',
					'post__not_in'        => $post__not_in,
				) );
			}
		} else {
			if ( $random_posts == 'false' ) {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				}
			} else {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				}
			}
		}

		colormag_append_excluded_duplicate_posts( $get_featured_posts );
		echo $before_widget;
		?>
		<?php
		if ( $type != 'latest' ) {
			$border_color = 'style="border-bottom-color:' . colormag_category_color( $category ) . ';"';
			$title_color  = 'style="background-color: #0000;"';
		} else {
			$border_color = '';
			$title_color  = '';
		}
		// For WPML plugin compatibility
		if ( function_exists( 'icl_t' ) ) {
			$text = icl_t( 'ColorMag Pro', 'TG: Featured Posts (Style 2) Description' . $this->id, $text );
		}

		// assign the view all link to be displayed in the widget title
		$category_link = '';
		if ( $view_all_button == 'true' && ( ! empty( $category ) && $type != 'latest' ) ) {
			$category_link = '<a href="' . esc_url( get_category_link( $category ) ) . '" class="view-all-link">' . get_theme_mod( 'colormag_view_all_text', esc_html__( 'View All', 'colormag' ) ) . '</a>';
		}

		if ( ! empty( $title ) ) {
			echo '<h3 class="widget-title" ' . $border_color . '><span ' . $title_color . '>' . esc_html( $title ) . '</span>' . $category_link . '</h3>';
		}
		if ( ! empty( $text ) ) {
			?> <p> <?php echo esc_textarea( $text ); ?> </p> <?php
		}

		$i = 1;
		while ( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();
			?>
			<?php
			if ( $i == 1 ) {
				$featured = 'colormag-featured-post-medium';
			} else {
				$featured = 'colormag-featured-post-small';
			}
			?>
			<?php
			if ( $i == 1 ) {
				echo '<div class="first-post">';
			} elseif ( $i == 2 ) {
				echo '<div class="following-post">';
			}

			// Display the reading time dynamically.
			$reading_time       = '';
			$reading_time_class = '';
			if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) {
				$reading_time       = 'data-file="' . get_the_permalink() . '" data-target="article"';
				$reading_time_class = 'readingtime';
			}
			?>
			<div class="single-article clearfix <?php echo $reading_time_class; ?>" <?php echo $reading_time; ?>>
				<?php
				if ( has_post_thumbnail() ) {
					$image           = '';
					$title_attribute = get_the_title( $post->ID );
					$image           .= '<figure>';
					$image           .= '<a href="' . get_permalink() . '" title="' . the_title( '', '', false ) . '">';
					$image           .= get_the_post_thumbnail( $post->ID, $featured, array(
							'title' => esc_attr( $title_attribute ),
							'alt'   => esc_attr( $title_attribute ),
						) ) . '</a>';
					$image           .= '</figure>';
					echo $image;
				}
				?>
                            <div class="article-content">
					
					<h3 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</h3>
                                    <?php colormag_colored_category(); ?>
					<div class="below-entry-meta">
						<?php
						$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
						$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() )
						);
						printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'colormag' ), esc_url( get_permalink() ), esc_attr( get_the_time() ), $time_string
						);
						?> <!--
						<span class="byline"><span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="<?php /* echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); */ ?>" title="<?php /* echo get_the_author(); */ ?>"><?php /* echo esc_html( get_the_author() ); */ ?></a></span></span>
						<span class="comments"><i class="fa fa-comment"></i><?php /* comments_popup_link( '0', '1', '%' ); */ ?></span>
						--> <?php if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) { ?>
							<span class="reading-time">
								<span class="eta"></span> <?php esc_html_e( 'min read', 'colormag' ); ?>
							</span>
						<?php } ?>
					</div>
					<?php if ( $i == 1 ) { ?>
						<div class="entry-content">
							<?php the_excerpt(); ?>
						</div>
					<?php } ?>
				</div>

			</div>
			<?php
			if ( $i == 1 ) {
				echo '</div>';
			}
			?>
			<?php
			$i ++;
		endwhile;
		if ( $i > 2 ) {
			echo '</div>';
		}
		// Reset Post Data
		wp_reset_query();
		?>
		<?php
		echo $after_widget;
	}

}

/* * ************************************************************************************* */

/**
 * 300x250 Advertisement Ads
 */
class colormag_300x250_advertisement_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_300x250_advertisement',
			'description'                 => __( 'Add your 300x250 Advertisement here', 'colormag' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: 300x250 Advertisement', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( ( array ) $instance, array(
			'title'              => '',
			'300x250_image_url'  => '',
			'300x250_image_link' => '',
		) );
		$title    = esc_attr( $instance['title'] );

		$image_link = '300x250_image_link';
		$image_url  = '300x250_image_url';

		$instance[ $image_link ] = esc_url( $instance[ $image_link ] );
		$instance[ $image_url ]  = esc_url( $instance[ $image_url ] );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<label><?php _e( 'Add your Advertisement 300x250 Images Here', 'colormag' ); ?></label>
		<p>
			<label for="<?php echo $this->get_field_id( $image_link ); ?>"> <?php _e( 'Advertisement Image Link ', 'colormag' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( $image_link ); ?>" name="<?php echo $this->get_field_name( $image_link ); ?>" value="<?php echo $instance[ $image_link ]; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( $image_url ); ?>"> <?php _e( 'Advertisement Image ', 'colormag' ); ?></label>
		<div class="media-uploader" id="<?php echo $this->get_field_id( $image_url ); ?>">
			<div class="custom_media_preview">
				<?php if ( $instance[ $image_url ] != '' ) : ?>
					<img class="custom_media_preview_default" src="<?php echo esc_url( $instance[ $image_url ] ); ?>" style="max-width:100%;" />
				<?php endif; ?>
			</div>
			<input type="text" class="widefat custom_media_input" id="<?php echo $this->get_field_id( $image_url ); ?>" name="<?php echo $this->get_field_name( $image_url ); ?>" value="<?php echo esc_url( $instance[ $image_url ] ); ?>" style="margin-top:5px;" />
			<button class="custom_media_upload button button-secondary button-large" id="<?php echo $this->get_field_id( $image_url ); ?>" data-choose="<?php esc_attr_e( 'Choose an image', 'colormag' ); ?>" data-update="<?php esc_attr_e( 'Use image', 'colormag' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e( 'Select an Image', 'colormag' ); ?></button>
		</div>
		</p>

		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );

		$image_link = '300x250_image_link';
		$image_url  = '300x250_image_url';

		$instance[ $image_link ] = esc_url_raw( $new_instance[ $image_link ] );
		$instance[ $image_url ]  = esc_url_raw( $new_instance[ $image_url ] );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		$title = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );

		$image_link = '300x250_image_link';
		$image_url  = '300x250_image_url';

		$image_link = isset( $instance[ $image_link ] ) ? $instance[ $image_link ] : '';
		$image_url  = isset( $instance[ $image_url ] ) ? $instance[ $image_url ] : '';

		// For WPML plugin compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'ColorMag Pro', 'TG: 300x250 Image Link' . $this->id, $image_link );
			icl_register_string( 'ColorMag Pro', 'TG: 300x250 Image URL' . $this->id, $image_url );
		}

		echo $before_widget;
		?>

		<div class="advertisement_300x250">
			<?php
			// For WPML plugin compatibility
			if ( function_exists( 'icl_t' ) ) {
				$image_link = icl_t( 'ColorMag Pro', 'TG: 300x250 Image Link' . $this->id, $image_link );
				$image_url  = icl_t( 'ColorMag Pro', 'TG: 300x250 Image URL' . $this->id, $image_url );
			}
			?>
			<?php if ( ! empty( $title ) ) { ?>
				<div class="advertisement-title">
					<?php echo $before_title . esc_html( $title ) . $after_title; ?>
				</div>
				<?php
			}
			$output = '';
			if ( ! empty( $image_url ) ) {
				$image_id  = attachment_url_to_postid( $image_url );
				$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
				$output    .= '<div class="advertisement-content">';
				if ( ! empty( $image_link ) ) {
					$output .= '<a href="' . $image_link . '" class="single_ad_300x250" target="_blank" rel="nofollow">
												<img src="' . $image_url . '" width="300" height="250" alt="' . $image_alt . '">
									</a>';
				} else {
					$output .= '<img src="' . $image_url . '" width="300" height="250" alt="' . $image_alt . '">';
				}
				$output .= '</div>';
				echo $output;
			}
			?>
		</div>
		<?php
		echo $after_widget;
	}

}

/* * ************************************************************************************* */

/**
 * 728x90 Advertisement Ads
 */
class colormag_728x90_advertisement_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_728x90_advertisement',
			'description'                 => __( 'Add your 728x90 Advertisement here', 'colormag' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: 728x90 Advertisement', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( ( array ) $instance, array(
			'title'             => '',
			'728x90_image_url'  => '',
			'728x90_image_link' => '',
		) );
		$title    = esc_attr( $instance['title'] );

		$image_link = '728x90_image_link';
		$image_url  = '728x90_image_url';

		$instance[ $image_link ] = esc_url( $instance[ $image_link ] );
		$instance[ $image_url ]  = esc_url( $instance[ $image_url ] );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<label><?php _e( 'Add your Advertisement 728x90 Images Here', 'colormag' ); ?></label>
		<p>
			<label for="<?php echo $this->get_field_id( $image_link ); ?>"> <?php _e( 'Advertisement Image Link ', 'colormag' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( $image_link ); ?>" name="<?php echo $this->get_field_name( $image_link ); ?>" value="<?php echo $instance[ $image_link ]; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( $image_url ); ?>"> <?php _e( 'Advertisement Image ', 'colormag' ); ?></label>
		<div class="media-uploader" id="<?php echo $this->get_field_id( $image_url ); ?>">
			<div class="custom_media_preview">
				<?php if ( $instance[ $image_url ] != '' ) : ?>
					<img class="custom_media_preview_default" src="<?php echo esc_url( $instance[ $image_url ] ); ?>" style="max-width:100%;" />
				<?php endif; ?>
			</div>
			<input type="text" class="widefat custom_media_input" id="<?php echo $this->get_field_id( $image_url ); ?>" name="<?php echo $this->get_field_name( $image_url ); ?>" value="<?php echo esc_url( $instance[ $image_url ] ); ?>" style="margin-top:5px;" />
			<button class="custom_media_upload button button-secondary button-large" id="<?php echo $this->get_field_id( $image_url ); ?>" data-choose="<?php esc_attr_e( 'Choose an image', 'colormag' ); ?>" data-update="<?php esc_attr_e( 'Use image', 'colormag' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e( 'Select an Image', 'colormag' ); ?></button>
		</div>
		</p>

		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );

		$image_link = '728x90_image_link';
		$image_url  = '728x90_image_url';

		$instance[ $image_link ] = esc_url_raw( $new_instance[ $image_link ] );
		$instance[ $image_url ]  = esc_url_raw( $new_instance[ $image_url ] );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		$title = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );

		$image_link = '728x90_image_link';
		$image_url  = '728x90_image_url';

		$image_link = isset( $instance[ $image_link ] ) ? $instance[ $image_link ] : '';
		$image_url  = isset( $instance[ $image_url ] ) ? $instance[ $image_url ] : '';

		// For WPML plugin compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'ColorMag Pro', 'TG: 728x90 Image Link' . $this->id, $image_link );
			icl_register_string( 'ColorMag Pro', 'TG: 728x90 Image URL' . $this->id, $image_url );
		}

		echo $before_widget;
		?>

		<div class="advertisement_728x90">
			<?php
			// For WPML plugin compatibility
			if ( function_exists( 'icl_t' ) ) {
				$image_link = icl_t( 'ColorMag Pro', 'TG: 728x90 Image Link' . $this->id, $image_link );
				$image_url  = icl_t( 'ColorMag Pro', 'TG: 728x90 Image URL' . $this->id, $image_url );
			}
			?>
			<?php if ( ! empty( $title ) ) { ?>
				<div class="advertisement-title">
					<?php echo $before_title . esc_html( $title ) . $after_title; ?>
				</div>
				<?php
			}
			$output = '';
			if ( ! empty( $image_url ) ) {
				$image_id  = attachment_url_to_postid( $image_url );
				$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
				$output    .= '<div class="advertisement-content">';
				if ( ! empty( $image_link ) ) {
					$output .= '<a href="' . $image_link . '" class="single_ad_728x90" target="_blank" rel="nofollow">
												<img src="' . $image_url . '" width="728" height="90" alt="' . $image_alt . '">
									</a>';
				} else {
					$output .= '<img src="' . $image_url . '" width="728" height="90" alt="' . $image_alt . '">';
				}
				$output .= '</div>';
				echo $output;
			}
			?>
		</div>
		<?php
		echo $after_widget;
	}

}

/* * ************************************************************************************* */

/**
 * 125x125 Advertisement Ads
 */
class colormag_125x125_advertisement_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_125x125_advertisement',
			'description'                 => __( 'Add your 125x125 Advertisement here', 'colormag' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: 125x125 Advertisement', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( ( array ) $instance, array(
			'title'                => '',
			'125x125_image_url_1'  => '',
			'125x125_image_url_2'  => '',
			'125x125_image_url_3'  => '',
			'125x125_image_url_4'  => '',
			'125x125_image_url_5'  => '',
			'125x125_image_url_6'  => '',
			'125x125_image_link_1' => '',
			'125x125_image_link_2' => '',
			'125x125_image_link_3' => '',
			'125x125_image_link_4' => '',
			'125x125_image_link_5' => '',
			'125x125_image_link_6' => '',
		) );
		$title    = esc_attr( $instance['title'] );
		for ( $i = 1; $i < 7; $i ++ ) {
			$image_link = '125x125_image_link_' . $i;
			$image_url  = '125x125_image_url_' . $i;

			$instance[ $image_link ] = esc_url( $instance[ $image_link ] );
			$instance[ $image_url ]  = esc_url( $instance[ $image_url ] );
		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<label><?php _e( 'Add your Advertisement 125x125 Images Here', 'colormag' ); ?></label>
		<?php
		for ( $i = 1; $i < 7; $i ++ ) {
			$image_link = '125x125_image_link_' . $i;
			$image_url  = '125x125_image_url_' . $i;
			?>
			<p>
				<label for="<?php echo $this->get_field_id( $image_link ); ?>"> <?php
					_e( 'Advertisement Image Link ', 'colormag' );
					echo $i;
					?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( $image_link ); ?>" name="<?php echo $this->get_field_name( $image_link ); ?>" value="<?php echo $instance[ $image_link ]; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( $image_url ); ?>"> <?php
					_e( 'Advertisement Image ', 'colormag' );
					echo $i;
					?></label>
			<div class="media-uploader" id="<?php echo $this->get_field_id( $image_url ); ?>">
				<div class="custom_media_preview">
					<?php if ( $instance[ $image_url ] != '' ) : ?>
						<img class="custom_media_preview_default" src="<?php echo esc_url( $instance[ $image_url ] ); ?>" style="max-width:100%;" />
					<?php endif; ?>
				</div>
				<input type="text" class="widefat custom_media_input" id="<?php echo $this->get_field_id( $image_url ); ?>" name="<?php echo $this->get_field_name( $image_url ); ?>" value="<?php echo esc_url( $instance[ $image_url ] ); ?>" style="margin-top:5px;" />
				<button class="custom_media_upload button button-secondary button-large" id="<?php echo $this->get_field_id( $image_url ); ?>" data-choose="<?php esc_attr_e( 'Choose an image', 'colormag' ); ?>" data-update="<?php esc_attr_e( 'Use image', 'colormag' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e( 'Select an Image', 'colormag' ); ?></button>
			</div>
			</p>
		<?php } ?>

		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		for ( $i = 1; $i < 7; $i ++ ) {
			$image_link = '125x125_image_link_' . $i;
			$image_url  = '125x125_image_url_' . $i;

			$instance[ $image_link ] = esc_url_raw( $new_instance[ $image_link ] );
			$instance[ $image_url ]  = esc_url_raw( $new_instance[ $image_url ] );
		}

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		$title       = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$image_array = array();
		$link_array  = array();

		$j = 0;
		for ( $i = 1; $i < 7; $i ++ ) {
			$image_link = '125x125_image_link_' . $i;
			$image_url  = '125x125_image_url_' . $i;

			$image_link = isset( $instance[ $image_link ] ) ? $instance[ $image_link ] : '';
			$image_url  = isset( $instance[ $image_url ] ) ? $instance[ $image_url ] : '';
			array_push( $link_array, $image_link );
			array_push( $image_array, $image_url );

			// For WPML plugin compatibility
			if ( function_exists( 'icl_register_string' ) ) {
				icl_register_string( 'ColorMag Pro', 'TG: 125x125 Image Link' . $this->id . $j, $image_array[ $j ] );
			}
			if ( function_exists( 'icl_register_string' ) ) {
				icl_register_string( 'ColorMag Pro', 'TG: 125x125 Image URL' . $this->id . $j, $link_array[ $j ] );
			}
			$j ++;
		}
		echo $before_widget;
		?>

		<div class="advertisement_125x125">
			<?php if ( ! empty( $title ) ) { ?>
				<div class="advertisement-title">
					<?php echo $before_title . esc_html( $title ) . $after_title; ?>
				</div>
				<?php
			}
			$output = '';
			if ( ! empty( $image_array ) ) {
				$output .= '<div class="advertisement-content">';
				for ( $i = 1; $i < 7; $i ++ ) {
					$j = $i - 1;
					if ( ! empty( $image_array[ $j ] ) ) {
						$image_id  = attachment_url_to_postid( $image_url );
						$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
						// For WPML plugin compatibility
						if ( function_exists( 'icl_t' ) ) {
							$image_array[ $j ] = icl_t( 'ColorMag Pro', 'TG: 125x125 Image Link' . $this->id . $j, $image_array[ $j ] );
						}
						if ( function_exists( 'icl_t' ) ) {
							$link_array[ $j ] = icl_t( 'ColorMag Pro', 'TG: 125x125 Image URL' . $this->id . $j, $link_array[ $j ] );
						}

						if ( ! empty( $link_array[ $j ] ) ) {
							$output .= '<a href="' . $link_array[ $j ] . '" class="single_ad_125x125" target="_blank" rel="nofollow">
											<img src="' . $image_array[ $j ] . '" width="125" height="125" alt="' . $image_alt . '">
										</a>';
						} else {
							$output .= '<img src="' . $image_array[ $j ] . '" width="125" height="125" alt="' . $image_alt . '">';
						}
					}
				}
				$output .= '</div>';
				echo $output;
			}
			?>
		</div>
		<?php
		echo $after_widget;
	}

}

/* * ************************************************************************************* */

/**
 * Colormag Video Widget
 */
class colormag_video_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_video_colormag',
			'description'                 => __( 'Add the videos here, Youtube and Vimeo Videos is only accepted for now.', 'colormag' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Videos', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( ( array ) $instance, array(
			'title'       => '',
			'link'        => '',
			'vimeo_title' => '',
			'vimeo_link'  => '',
		) );
		$title    = esc_attr( $instance['title'] );

		$link                    = 'link';
		$instance[ $link ]       = strip_tags( $instance[ $link ] );
		$vimeo_link              = 'vimeo_link';
		$instance[ $vimeo_link ] = strip_tags( $instance[ $vimeo_link ] );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( $link ); ?>"> <?php _e( 'Youtube Video ID:', 'colormag' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( $link ); ?>" name="<?php echo $this->get_field_name( $link ); ?>" value="<?php echo $instance[ $link ]; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( $vimeo_link ); ?>"> <?php _e( 'Vimeo Video ID:', 'colormag' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( $vimeo_link ); ?>" name="<?php echo $this->get_field_name( $vimeo_link ); ?>" value="<?php echo $instance[ $vimeo_link ]; ?>" />
		</p>

		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );

		$link                    = 'link';
		$instance[ $link ]       = strip_tags( $new_instance[ $link ] );
		$vimeo_link              = 'vimeo_link';
		$instance[ $vimeo_link ] = strip_tags( $new_instance[ $vimeo_link ] );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		$title = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );

		$link       = 'link';
		$link       = isset( $instance[ $link ] ) ? $instance[ $link ] : '';
		$vimeo_link = 'vimeo_link';
		$vimeo_link = isset( $instance[ $vimeo_link ] ) ? $instance[ $vimeo_link ] : '';

		echo $before_widget;
		?>

		<div class="fitvids-video">
			<?php if ( ! empty( $title ) ) { ?>
				<div class="video-title">
					<?php echo $before_title . esc_html( $title ) . $after_title; ?>
				</div>
				<?php
			}
			if ( ! empty( $link ) ) {
				$output = '<div class="video"><iframe src="https://www.youtube.com/embed/' . $link . '"></iframe></div>';
				echo $output;
			}
			if ( ! empty( $vimeo_link ) ) {
				$output = '<div class="video"><iframe src="https://player.vimeo.com/video/' . $vimeo_link . '"></iframe></div>';
				echo $output;
			}
			?>
		</div>
		<?php
		echo $after_widget;
	}

}

/* * ************************************************************************************* */

/**
 * News In Picture widget
 */
class colormag_news_in_picture_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'   => 'widget_block_picture_news widget_highlighted_posts widget_featured_meta widget_featured_posts',
			'description' => __( 'Display latest posts or posts of specific category.', 'colormag' ),
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Featured Posts (Style 5)', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$tg_defaults['title']           = '';
		$tg_defaults['text']            = '';
		$tg_defaults['number']          = 4;
		$tg_defaults['type']            = 'latest';
		$tg_defaults['category']        = '';
		$tg_defaults['slide']           = '1';
		$tg_defaults['random_posts']    = '0';
		$tg_defaults['child_category']  = '0';
		$tg_defaults['view_all_button'] = '0';
		$tg_defaults['slider_speed']    = 1500;
		$tg_defaults['slider_pause']    = 5000;
		$tg_defaults['slider_auto']     = '0';
		$tg_defaults['slider_hover']    = '0';
		$instance                       = wp_parse_args( ( array ) $instance, $tg_defaults );
		$title                          = esc_attr( $instance['title'] );
		$text                           = esc_textarea( $instance['text'] );
		$number                         = $instance['number'];
		$type                           = $instance['type'];
		$category                       = $instance['category'];
		$slide                          = $instance['slide'] ? 'checked="checked"' : '';
		$random_posts                   = $instance['random_posts'] ? 'checked="checked"' : '';
		$child_category                 = $instance['child_category'] ? 'checked="checked"' : '';
		$view_all_button                = $instance['view_all_button'] ? 'checked="checked"' : '';
		$slider_speed                   = $instance['slider_speed'];
		$slider_pause                   = $instance['slider_pause'];
		$slider_auto                    = $instance['slider_auto'] ? 'checked="checked"' : '';
		$slider_hover                   = $instance['slider_hover'] ? 'checked="checked"' : '';
		?>
		<p><?php _e( 'Layout will be as below:', 'colormag' ) ?></p>
		<div style="text-align: center;"><img src="<?php echo get_template_directory_uri() . '/img/style-5.jpg' ?>">
		</div>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php _e( 'Description', 'colormag' ); ?>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo $text; ?></textarea>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to display:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p>
			<input type="radio" <?php checked( $type, 'latest' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest" /><?php _e( 'Show latest Posts', 'colormag' ); ?>
			<br />
			<input type="radio" <?php checked( $type, 'category' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category" /><?php _e( 'Show posts from a category', 'colormag' ); ?>
			<br /></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'colormag' ); ?>
				:</label>
			<?php wp_dropdown_categories( array(
				'show_option_none' => ' ',
				'name'             => $this->get_field_name( 'category' ),
				'selected'         => $category,
			) ); ?>
		</p>
		<p>
			<input class="checkbox" <?php echo $slide; ?> id="<?php echo $this->get_field_id( 'slide' ); ?>" name="<?php echo $this->get_field_name( 'slide' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'slide' ); ?>"><?php _e( 'Check not to have the slider effect for this widget', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $random_posts; ?> id="<?php echo $this->get_field_id( 'random_posts' ); ?>" name="<?php echo $this->get_field_name( 'random_posts' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'random_posts' ); ?>"><?php _e( 'Check to display the random post from either the chosen category or from latest post.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $child_category; ?> id="<?php echo $this->get_field_id( 'child_category' ); ?>" name="<?php echo $this->get_field_name( 'child_category' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'child_category' ); ?>"><?php _e( 'Check to display the posts from child category of the chosen category.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $view_all_button; ?> id="<?php echo $this->get_field_id( 'view_all_button' ); ?>" name="<?php echo $this->get_field_name( 'view_all_button' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'view_all_button' ); ?>"><?php esc_html_e( 'Check to display the view all button to link that button to the specific category chosen in this widget.', 'colormag' ); ?></label>
		</p>

		<h2>
			<?php esc_html_e( 'Slider Options', 'colormag' ); ?>
			<hr>
		</h2>
		<p>
			<label for="<?php echo $this->get_field_id( 'slider_speed' ); ?>"><?php esc_html_e( 'Transition Speed Time (in ms):', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'slider_speed' ); ?>" name="<?php echo $this->get_field_name( 'slider_speed' ); ?>" type="text" value="<?php echo esc_attr( $slider_speed ); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'slider_pause' ); ?>"><?php esc_html_e( 'Transition Pause Time (in ms):', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'slider_pause' ); ?>" name="<?php echo $this->get_field_name( 'slider_pause' ); ?>" type="text" value="<?php echo esc_attr( $slider_pause ); ?>" size="3" />
		</p>

		<p>
			<input class="checkbox" <?php echo $slider_auto; ?> id="<?php echo $this->get_field_id( 'slider_auto' ); ?>" name="<?php echo $this->get_field_name( 'slider_auto' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'slider_auto' ); ?>"><?php esc_html_e( 'Check to enable auto slide.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $slider_hover; ?> id="<?php echo $this->get_field_id( 'slider_hover' ); ?>" name="<?php echo $this->get_field_name( 'slider_hover' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'slider_hover' ); ?>"><?php esc_html_e( 'Check to disable auto slide when mouse hover.', 'colormag' ); ?></label>
		</p>

		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['text'] = $new_instance['text'];
		} else {
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['text'] ) ) );
		}
		$instance['number']          = absint( $new_instance['number'] );
		$instance['type']            = $new_instance['type'];
		$instance['category']        = $new_instance['category'];
		$instance['slide']           = isset( $new_instance['slide'] ) ? 1 : 0;
		$instance['random_posts']    = isset( $new_instance['random_posts'] ) ? 1 : 0;
		$instance['child_category']  = isset( $new_instance['child_category'] ) ? 1 : 0;
		$instance['view_all_button'] = isset( $new_instance['view_all_button'] ) ? 1 : 0;
		$instance['slider_speed']    = absint( $new_instance['slider_speed'] );
		$instance['slider_pause']    = absint( $new_instance['slider_pause'] );
		$instance['slider_auto']     = isset( $new_instance['slider_auto'] ) ? 1 : 0;
		$instance['slider_hover']    = isset( $new_instance['slider_hover'] ) ? 1 : 0;

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$title           = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$text            = isset( $instance['text'] ) ? $instance['text'] : '';
		$number          = empty( $instance['number'] ) ? 4 : $instance['number'];
		$type            = isset( $instance['type'] ) ? $instance['type'] : 'latest';
		$category        = isset( $instance['category'] ) ? $instance['category'] : '';
		$slide           = ! empty( $instance['slide'] ) ? 'true' : 'false';
		$random_posts    = ! empty( $instance['random_posts'] ) ? 'true' : 'false';
		$child_category  = ! empty( $instance['child_category'] ) ? 'true' : 'false';
		$view_all_button = ! empty( $instance['view_all_button'] ) ? 'true' : 'false';
		$slider_speed    = empty( $instance['slider_speed'] ) ? 1500 : $instance['slider_speed'];
		$slider_pause    = empty( $instance['slider_pause'] ) ? 5000 : $instance['slider_pause'];
		$slider_auto     = ! empty( $instance['slider_auto'] ) ? 'true' : 'false';
		$slider_hover    = ! empty( $instance['slider_hover'] ) ? 'true' : 'false';

		if ( ( $slide == 1 ) && ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() || ( function_exists( 'colormag_elementor_active_page_check' ) && colormag_elementor_active_page_check() ) ) ) {
			wp_enqueue_script( 'colormag-bxslider' );
		}
		// For WPML plugin compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'ColorMag Pro', 'TG: Featured Posts (Style 5) Description' . $this->id, $text );
		}

		// adding the excluding post function
		$post__not_in = colormag_exclude_duplicate_posts();

		if ( $type == 'latest' ) {
			if ( $random_posts == 'false' ) {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'post__not_in'        => $post__not_in,
				) );
			} else {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'orderby'             => 'rand',
					'post__not_in'        => $post__not_in,
				) );
			}
		} else {
			if ( $random_posts == 'false' ) {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				}
			} else {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				}
			}
		}

		colormag_append_excluded_duplicate_posts( $get_featured_posts );
		echo $before_widget;
		?>
		<?php $featured = 'colormag-featured-post-medium'; ?>
		<?php
		if ( $type != 'latest' ) {
			$border_color = 'style="border-bottom-color:' . colormag_category_color( $category ) . ';"';
			$title_color  = 'style="background-color: #0000;"';
		} else {
			$border_color = '';
			$title_color  = '';
		}
		// For WPML plugin compatibility
		if ( function_exists( 'icl_t' ) ) {
			$text = icl_t( 'ColorMag Pro', 'TG: Featured Posts (Style 5) Description' . $this->id, $text );
		}

		// assign the view all link to be displayed in the widget title
		$category_link = '';
		if ( $view_all_button == 'true' && ( ! empty( $category ) && $type != 'latest' ) ) {
			$category_link = '<a href="' . esc_url( get_category_link( $category ) ) . '" class="view-all-link">' . get_theme_mod( 'colormag_view_all_text', esc_html__( 'View All', 'colormag' ) ) . '</a>';
		}

		if ( ! empty( $title ) ) {
			echo '<h3 class="widget-title" ' . $border_color . '><span ' . $title_color . '>' . esc_html( $title ) . '</span>' . $category_link . '</h3>';
		}
		if ( ! empty( $text ) ) {
			?> <p> <?php echo esc_textarea( $text ); ?> </p> <?php
		}

		if ( $slide == 'false' ) {
			$class       = 'widget_highlighted_post_area';
			$extra_field = ' data-speed="' . absint( $slider_speed ) . '" data-pause="' . absint( $slider_pause ) . '" data-auto="' . esc_html( $slider_auto ) . '" data-hover="' . esc_html( $slider_hover ) . '"';
		} else {
			$class       = 'widget_highlighted_post_area_no_slide';
			$extra_field = '';
		}
		?>
		<div class="widget_block_picture_news_inner_wrap">
			<div id="style5_slider_<?php echo esc_attr( $this->id ); ?>" class="<?php echo $class; ?>" <?php echo $extra_field; ?>>
				<?php
				$i = 1;
				while ( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();

					// Display the reading time dynamically.
					$reading_time       = '';
					$reading_time_class = '';
					if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) {
						$reading_time       = 'data-file="' . get_the_permalink() . '" data-target="article"';
						$reading_time_class = 'readingtime';
					}
					?>
					<div class="single-article <?php echo $reading_time_class; ?>" <?php echo $reading_time; ?>>
						<?php
						if ( has_post_thumbnail() ) {
							$image           = '';
							$title_attribute = get_the_title( $post->ID );
							$image           .= '<figure>';
							$image           .= '<a href="' . get_permalink() . '" title="' . the_title( '', '', false ) . '">';
							$image           .= get_the_post_thumbnail( $post->ID, $featured, array(
									'title' => esc_attr( $title_attribute ),
									'alt'   => esc_attr( $title_attribute ),
								) ) . '</a>';
							$image           .= '</figure>';
							echo $image;
						}
						?>
						<div class="article-content">
							<?php colormag_colored_category(); ?>
							<h3 class="entry-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h3>
							<div class="below-entry-meta">
								<?php
								$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
								$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() )
								);
								printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'colormag' ), esc_url( get_permalink() ), esc_attr( get_the_time() ), $time_string
								);
								?> <!--
								<span class="byline"><span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="<?php /* echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); */ ?>" title="<?php /* echo get_the_author(); */ ?>"><?php /* echo esc_html( get_the_author() ); */ ?></a></span></span>
								<span class="comments"><i class="fa fa-comment"></i><?php /* comments_popup_link( '0', '1', '%' ); */ ?></span>
								--> <?php if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) { ?>
									<span class="reading-time">
										<span class="eta"></span> <?php esc_html_e( 'min read', 'colormag' ); ?>
									</span>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php
					$i ++;
				endwhile;
				// Reset Post Data
				wp_reset_query();
				?>
			</div>
		</div>
		<?php
		echo $after_widget;
	}

}

/* * ************************************************************************************* */

/**
 * Default News Widget
 */
class colormag_default_news_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_default_news_colormag widget_featured_posts',
			'description'                 => __( 'Display latest posts or posts of specific category.', 'colormag' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Featured Posts (Style 4)', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$tg_defaults['title']           = '';
		$tg_defaults['text']            = '';
		$tg_defaults['number']          = 4;
		$tg_defaults['type']            = 'latest';
		$tg_defaults['category']        = '';
		$tg_defaults['random_posts']    = '0';
		$tg_defaults['child_category']  = '0';
		$tg_defaults['view_all_button'] = '0';
		$instance                       = wp_parse_args( ( array ) $instance, $tg_defaults );
		$title                          = esc_attr( $instance['title'] );
		$text                           = esc_textarea( $instance['text'] );
		$number                         = $instance['number'];
		$type                           = $instance['type'];
		$category                       = $instance['category'];
		$random_posts                   = $instance['random_posts'] ? 'checked="checked"' : '';
		$child_category                 = $instance['child_category'] ? 'checked="checked"' : '';
		$view_all_button                = $instance['view_all_button'] ? 'checked="checked"' : '';
		?>
		<p><?php _e( 'Layout will be as below:', 'colormag' ) ?></p>
		<div style="text-align: center;"><img src="<?php echo get_template_directory_uri() . '/img/style-4.jpg' ?>">
		</div>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php _e( 'Description', 'colormag' ); ?>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo $text; ?></textarea>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to display:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p>
			<input type="radio" <?php checked( $type, 'latest' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest" /><?php _e( 'Show latest Posts', 'colormag' ); ?>
			<br />
			<input type="radio" <?php checked( $type, 'category' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category" /><?php _e( 'Show posts from a category', 'colormag' ); ?>
			<br /></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'colormag' ); ?>
				:</label>
			<?php wp_dropdown_categories( array(
				'show_option_none' => ' ',
				'name'             => $this->get_field_name( 'category' ),
				'selected'         => $category,
			) ); ?>
		</p>

		<p>
			<input class="checkbox" <?php echo $random_posts; ?> id="<?php echo $this->get_field_id( 'random_posts' ); ?>" name="<?php echo $this->get_field_name( 'random_posts' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'random_posts' ); ?>"><?php _e( 'Check to display the random post from either the chosen category or from latest post.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $child_category; ?> id="<?php echo $this->get_field_id( 'child_category' ); ?>" name="<?php echo $this->get_field_name( 'child_category' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'child_category' ); ?>"><?php _e( 'Check to display the posts from child category of the chosen category.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $view_all_button; ?> id="<?php echo $this->get_field_id( 'view_all_button' ); ?>" name="<?php echo $this->get_field_name( 'view_all_button' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'view_all_button' ); ?>"><?php esc_html_e( 'Check to display the view all button to link that button to the specific category chosen in this widget.', 'colormag' ); ?></label>
		</p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['text'] = $new_instance['text'];
		} else {
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['text'] ) ) );
		}
		$instance['number']          = absint( $new_instance['number'] );
		$instance['type']            = $new_instance['type'];
		$instance['category']        = $new_instance['category'];
		$instance['random_posts']    = isset( $new_instance['random_posts'] ) ? 1 : 0;
		$instance['child_category']  = isset( $new_instance['child_category'] ) ? 1 : 0;
		$instance['view_all_button'] = isset( $new_instance['view_all_button'] ) ? 1 : 0;

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$title           = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$text            = isset( $instance['text'] ) ? $instance['text'] : '';
		$number          = empty( $instance['number'] ) ? 4 : $instance['number'];
		$type            = isset( $instance['type'] ) ? $instance['type'] : 'latest';
		$category        = isset( $instance['category'] ) ? $instance['category'] : '';
		$random_posts    = ! empty( $instance['random_posts'] ) ? 'true' : 'false';
		$child_category  = ! empty( $instance['child_category'] ) ? 'true' : 'false';
		$view_all_button = ! empty( $instance['view_all_button'] ) ? 'true' : 'false';

		// For WPML plugin compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'ColorMag Pro', 'TG: Featured Posts (Style 4) Description' . $this->id, $text );
		}

		// adding the excluding post function
		$post__not_in = colormag_exclude_duplicate_posts();

		if ( $type == 'latest' ) {
			if ( $random_posts == 'false' ) {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'post__not_in'        => $post__not_in,
				) );
			} else {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'orderby'             => 'rand',
					'post__not_in'        => $post__not_in,
				) );
			}
		} else {
			if ( $random_posts == 'false' ) {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				}
			} else {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				}
			}
		}

		colormag_append_excluded_duplicate_posts( $get_featured_posts );
		echo $before_widget;
		?>
		<?php $featured = 'colormag-featured-post-medium'; ?>
		<?php
		if ( $type != 'latest' ) {
			$border_color = 'style="border-bottom-color:' . colormag_category_color( $category ) . ';"';
			$title_color  = 'style="background-color: #0000;"';
		} else {
			$border_color = '';
			$title_color  = '';
		}
		// For WPML plugin compatibility
		if ( function_exists( 'icl_t' ) ) {
			$text = icl_t( 'ColorMag Pro', 'TG: Featured Posts (Style 4) Description' . $this->id, $text );
		}

		// assign the view all link to be displayed in the widget title
		$category_link = '';
		if ( $view_all_button == 'true' && ( ! empty( $category ) && $type != 'latest' ) ) {
			$category_link = '<a href="' . esc_url( get_category_link( $category ) ) . '" class="view-all-link">' . get_theme_mod( 'colormag_view_all_text', esc_html__( 'View All', 'colormag' ) ) . '</a>';
		}

		if ( ! empty( $title ) ) {
			echo '<h3 class="widget-title" ' . $border_color . '><span ' . $title_color . '>' . esc_html( $title ) . '</span>' . $category_link . '</h3>';
		}
		if ( ! empty( $text ) ) {
			?> <p> <?php echo esc_textarea( $text ); ?> </p> <?php } ?>
		<div class="default-news">
			<?php
			$i = 1;
			while ( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();

				// Display the reading time dynamically.
				$reading_time       = '';
				$reading_time_class = '';
				if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) {
					$reading_time       = 'data-file="' . get_the_permalink() . '" data-target="article"';
					$reading_time_class = 'readingtime';
				}
				?>
				<div class="single-article clearfix <?php echo $reading_time_class; ?>" <?php echo $reading_time; ?>>
					<?php
					if ( has_post_thumbnail() ) {
						$image           = '';
						$title_attribute = get_the_title( $post->ID );
						$image           .= '<figure>';
						$image           .= '<a href="' . get_permalink() . '" title="' . the_title( '', '', false ) . '">';
						$image           .= get_the_post_thumbnail( $post->ID, $featured, array(
								'title' => esc_attr( $title_attribute ),
								'alt'   => esc_attr( $title_attribute ),
							) ) . '</a>';
						$image           .= '</figure>';
						echo $image;
					}
					?>
					<div class="article-content">
						<?php colormag_colored_category(); ?>
						<h3 class="entry-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h3>
						<div class="below-entry-meta">
							<?php
							$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
							$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() )
							);
							printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'colormag' ), esc_url( get_permalink() ), esc_attr( get_the_time() ), $time_string
							);
							?> <!--
							<span class="byline"><span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="<?php /* echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); */ ?>" title="<?php /* echo get_the_author(); */ ?>"><?php /* echo esc_html( get_the_author() ); */ ?></a></span></span>
							<span class="comments"><i class="fa fa-comment"></i><?php /* comments_popup_link( '0', '1', '%' ); */ ?></span>
							--> <?php if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) { ?>
								<span class="reading-time">
									<span class="eta"></span> <?php esc_html_e( 'min read', 'colormag' ); ?>
								</span>
							<?php } ?>
						</div>
						<div class="entry-content"><?php the_excerpt(); ?></div>
					</div>
				</div>
				<?php
				$i ++;
			endwhile;
			// Reset Post Data
			wp_reset_query();
			?>
		</div>
		<?php
		echo $after_widget;
	}

}

/* * ************************************************************************************* */

/**
 * Tabbed widget
 */
class colormag_tabbed_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'   => 'widget_tabbed_colormag widget_featured_posts',
			'description' => __( 'Displays the popular posts, latest posts and the recent comments in tab. Suitable for the Right/Left sidebar.', 'colormag' ),
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Tabbed Widget', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$tg_defaults['number']             = 4;
		$tg_defaults['popular_view_count'] = '0';
		$instance                          = wp_parse_args( ( array ) $instance, $tg_defaults );
		$number                            = $instance['number'];
		$popular_view_count                = $instance['popular_view_count'] ? 'checked="checked"' : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of popular posts, recent posts and comments to display:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p>
			<input class="checkbox" <?php echo $popular_view_count; ?> id="<?php echo $this->get_field_id( 'popular_view_count' ); ?>" name="<?php echo $this->get_field_name( 'popular_view_count' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'popular_view_count' ); ?>"><?php _e( 'Check to enable the popular post by view count.', 'colormag' ); ?></label>
		</p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance                       = $old_instance;
		$instance['number']             = absint( $new_instance['number'] );
		$instance['popular_view_count'] = isset( $new_instance['popular_view_count'] ) ? 1 : 0;

		return $instance;
	}

	function widget( $args, $instance ) {
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() || ( function_exists( 'colormag_elementor_active_page_check' ) && colormag_elementor_active_page_check() ) ) {
			wp_enqueue_script( 'colormag-easy-tabs' );
		}

		extract( $args );
		extract( $instance );
		$number             = empty( $instance['number'] ) ? 4 : $instance['number'];
		$popular_view_count = ! empty( $instance['popular_view_count'] ) ? 'true' : 'false';

		echo $before_widget;
		?>

		<div class="tabbed-widget">
			<ul class="widget-tabs">
				<li class="tabs popular-tabs">
					<a href="#popular"><?php _e( '<i class="fa fa-star"></i>Popular', 'colormag' ); ?></a></li>
				<li class="tabs recent-tabs">
					<a href="#recent"><?php _e( '<i class="fa fa-history"></i>Recent', 'colormag' ); ?></a></li>
				<li class="tabs comment-tabs">
					<a href="#comment"><?php _e( '<i class="fa fa-comment"></i>Comment', 'colormag' ); ?></a></li>
			</ul>

			<div class="tabbed-widget-popular" id="popular">
				<?php
				global $post;

				$args = array();
				if ( $popular_view_count == 'false' ) {
					$args = array(
						'posts_per_page'      => $number,
						'post_type'           => 'post',
						'ignore_sticky_posts' => true,
						'orderby'             => 'comment_count',
						'no_found_rows'       => true,
					);
				} else {
					$args = array(
						'posts_per_page'      => $number,
						'post_type'           => 'post',
						'ignore_sticky_posts' => true,
						'meta_key'            => 'total_number_of_views',
						'orderby'             => 'meta_value_num',
						'order'               => 'DESC',
						'no_found_rows'       => true,
					);
				}

				$get_featured_posts = new WP_Query( $args );
				?>
				<?php $featured = 'colormag-featured-post-small'; ?>
				<?php
				$i = 1;
				while ( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();

					// Display the reading time dynamically.
					$reading_time       = '';
					$reading_time_class = '';
					if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) {
						$reading_time       = 'data-file="' . get_the_permalink() . '" data-target="article"';
						$reading_time_class = 'readingtime';
					}
					?>
					<div class="single-article clearfix <?php echo $reading_time_class; ?>" <?php echo $reading_time; ?>>
						<?php
						if ( has_post_thumbnail() ) {
							$image           = '';
							$title_attribute = get_the_title( $post->ID );
							$image           .= '<figure class="tabbed-images">';
							$image           .= '<a href="' . get_permalink() . '" title="' . the_title( '', '', false ) . '">';
							$image           .= get_the_post_thumbnail( $post->ID, $featured, array(
									'title' => esc_attr( $title_attribute ),
									'alt'   => esc_attr( $title_attribute ),
								) ) . '</a>';
							$image           .= '</figure>';
							echo $image;
						}
						?>
						<div class="article-content">
							<h3 class="entry-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h3>
							<div class="below-entry-meta">
								<?php
								$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
								$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() )
								);
								printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'colormag' ), esc_url( get_permalink() ), esc_attr( get_the_time() ), $time_string
								);
								?> <!--
								<span class="byline"><span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="<?php /* echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); */ ?>" title="<?php /* echo get_the_author(); */ ?>"><?php /* echo esc_html( get_the_author() ); */ ?></a></span></span>
								<span class="comments"><i class="fa fa-comment"></i><?php /* comments_popup_link( __( 'No Comments', 'colormag' ), __( '1 Comment', 'colormag' ), __( '% Comments', 'colormag' ) ); */ ?></span>
								--> <?php if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) { ?>
									<span class="reading-time">
										<span class="eta"></span> <?php esc_html_e( 'min read', 'colormag' ); ?>
									</span>
								<?php } ?>
							</div>
						</div>

					</div>
					<?php
					$i ++;
				endwhile;
				// Reset Post Data
				wp_reset_query();
				?>
			</div>

			<div class="tabbed-widget-recent" id="recent">
				<?php
				global $post;

				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				) );
				?>
				<?php $featured = 'colormag-featured-post-small'; ?>
				<?php
				$i = 1;
				while ( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();

					// Display the reading time dynamically.
					$reading_time       = '';
					$reading_time_class = '';
					if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) {
						$reading_time       = 'data-file="' . get_the_permalink() . '" data-target="article"';
						$reading_time_class = 'readingtime';
					}
					?>
					<div class="single-article clearfix <?php echo $reading_time_class; ?>" <?php echo $reading_time; ?>>
						<?php
						if ( has_post_thumbnail() ) {
							$image           = '';
							$title_attribute = get_the_title( $post->ID );
							$image           .= '<figure class="tabbed-images">';
							$image           .= '<a href="' . get_permalink() . '" title="' . the_title( '', '', false ) . '">';
							$image           .= get_the_post_thumbnail( $post->ID, $featured, array(
									'title' => esc_attr( $title_attribute ),
									'alt'   => esc_attr( $title_attribute ),
								) ) . '</a>';
							$image           .= '</figure>';
							echo $image;
						}
						?>
						<div class="article-content">
							<h3 class="entry-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h3>
							<div class="below-entry-meta">
								<?php
								$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
								$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() )
								);
								printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'colormag' ), esc_url( get_permalink() ), esc_attr( get_the_time() ), $time_string
								);
								?> <!--
								<span class="byline"><span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="<?php /* echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); */ ?>" title="<?php /* echo get_the_author(); */ ?>"><?php /* echo esc_html( get_the_author() ); */ ?></a></span></span>
								--> <?php if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) { ?>
									<span class="reading-time">
										<span class="eta"></span> <?php esc_html_e( 'min read', 'colormag' ); ?>
									</span>
								<?php } ?>
							</div>
						</div>

					</div>
					<?php
					$i ++;
				endwhile;
				// Reset Post Data
				wp_reset_query();
				?>
			</div>

			<div class="tabbed-widget-comment" id="comment">
				<?php
				$comments_query = new WP_Comment_Query();
				$comments       = $comments_query->query( array( 'number' => $number, 'status' => 'approve' ) );
				$commented      = '';
				if ( $comments ) : foreach ( $comments as $comment ) :
					$commented .= '<li class="tabbed-comment-widget"><a class="author" href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '">';
					$commented .= get_avatar( $comment->comment_author_email, '50' );
					$commented .= get_comment_author( $comment->comment_ID ) . '</a>' . ' ' . __( 'says:', 'colormag' );
					$commented .= '<p class="commented">' . strip_tags( substr( apply_filters( 'get_comment_text', $comment->comment_content ), 0, '50' ) ) . '...</p></li>';
				endforeach;
				else :
					$commented .= __( 'No comments', 'colormag' );
				endif;
				echo $commented;
				?>
			</div>

		</div>
		<?php
		echo $after_widget;
	}

}

/* * ************************************************************************************* */

/**
 * Random Post widget
 */
class colormag_random_post_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_random_post_colormag widget_featured_posts',
			'description'                 => __( 'Displays the random posts from your site. Suitable for the Right/Left sidebar.', 'colormag' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Random Posts Widget', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$tg_defaults['number'] = 4;
		$tg_defaults['title']  = '';
		$instance              = wp_parse_args( ( array ) $instance, $tg_defaults );
		$number                = $instance['number'];
		$title                 = esc_attr( $instance['title'] );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of random posts to display:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance           = $old_instance;
		$instance['number'] = absint( $new_instance['number'] );
		$instance['title']  = strip_tags( $new_instance['title'] );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );
		$number = empty( $instance['number'] ) ? 4 : $instance['number'];
		$title  = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );

		echo $before_widget;
		?>

		<div class="random-posts-widget">
			<?php
			global $post;

			// adding the excluding post function
			$post__not_in = colormag_exclude_duplicate_posts();

			$get_featured_posts = new WP_Query( array(
				'posts_per_page'      => $number,
				'post_type'           => 'post',
				'ignore_sticky_posts' => true,
				'orderby'             => 'rand',
				'no_found_rows'       => true,
				'post__not_in'        => $post__not_in,
			) );

			colormag_append_excluded_duplicate_posts( $get_featured_posts );
			?>
			<?php $featured = 'colormag-featured-post-small'; ?>
			<?php
			if ( ! empty( $title ) ) {
				echo $before_title . esc_html( $title ) . $after_title;
			}
			?>
			<div class="random_posts_widget_inner_wrap">
				<?php
				$i = 1;
				while ( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();

					// Display the reading time dynamically.
					$reading_time       = '';
					$reading_time_class = '';
					if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) {
						$reading_time       = 'data-file="' . get_the_permalink() . '" data-target="article"';
						$reading_time_class = 'readingtime';
					}
					?>
					<div class="single-article clearfix <?php echo $reading_time_class; ?>" <?php echo $reading_time; ?>>
						<?php
						if ( has_post_thumbnail() ) {
							$image           = '';
							$title_attribute = get_the_title( $post->ID );
							$image           .= '<figure class="random-images">';
							$image           .= '<a href="' . get_permalink() . '" title="' . the_title( '', '', false ) . '">';
							$image           .= get_the_post_thumbnail( $post->ID, $featured, array(
									'title' => esc_attr( $title_attribute ),
									'alt'   => esc_attr( $title_attribute ),
								) ) . '</a>';
							$image           .= '</figure>';
							echo $image;
						}
						?>
						<div class="article-content">
							<h3 class="entry-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h3>
							<div class="below-entry-meta">
								<?php
								$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
								$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() )
								);
								printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'colormag' ), esc_url( get_permalink() ), esc_attr( get_the_time() ), $time_string
								);
								?> <!--
								<span class="byline"><span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="<?php /* echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); */ ?>" title="<?php /* echo get_the_author(); */ ?>"><?php /* echo esc_html( get_the_author() ); */ ?></a></span></span>
								<span class="comments"><i class="fa fa-comment"></i><?php /* comments_popup_link( __( 'No Comments', 'colormag' ), __( '1 Comment', 'colormag' ), __( '% Comments', 'colormag' ) ); */ ?></span>
								--> <?php if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) { ?>
									<span class="reading-time">
										<span class="eta"></span> <?php esc_html_e( 'min read', 'colormag' ); ?>
									</span>
								<?php } ?>
							</div>
						</div>

					</div>
					<?php
					$i ++;
				endwhile;
				// Reset Post Data
				wp_reset_query();
				?>
			</div>
		</div>
		<?php
		echo $after_widget;
	}

}

/* * ************************************************************************************* */

/**
 * Slider News Widget
 */
class colormag_slider_news_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'   => 'widget_slider_news_colormag widget_featured_posts',
			'description' => __( 'Display latest posts or posts of specific category.', 'colormag' ),
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Featured Posts (Style 6)', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$tg_defaults['title']           = '';
		$tg_defaults['text']            = '';
		$tg_defaults['number']          = 5;
		$tg_defaults['type']            = 'latest';
		$tg_defaults['category']        = '';
		$tg_defaults['random_posts']    = '0';
		$tg_defaults['child_category']  = '0';
		$tg_defaults['view_all_button'] = '0';
		$tg_defaults['slider_mode']     = 'horizontal';
		$tg_defaults['slider_speed']    = 500;
		$tg_defaults['slider_pause']    = 4000;
		$tg_defaults['slider_auto']     = '0';
		$tg_defaults['slider_hover']    = '0';
		$instance                       = wp_parse_args( ( array ) $instance, $tg_defaults );
		$title                          = esc_attr( $instance['title'] );
		$text                           = esc_textarea( $instance['text'] );
		$number                         = $instance['number'];
		$type                           = $instance['type'];
		$category                       = $instance['category'];
		$random_posts                   = $instance['random_posts'] ? 'checked="checked"' : '';
		$child_category                 = $instance['child_category'] ? 'checked="checked"' : '';
		$view_all_button                = $instance['view_all_button'] ? 'checked="checked"' : '';
		$slider_mode                    = $instance['slider_mode'];
		$slider_speed                   = $instance['slider_speed'];
		$slider_pause                   = $instance['slider_pause'];
		$slider_auto                    = $instance['slider_auto'] ? 'checked="checked"' : '';
		$slider_hover                   = $instance['slider_hover'] ? 'checked="checked"' : '';
		?>
		<p><?php _e( 'Layout will be as below:', 'colormag' ) ?></p>
		<div style="text-align: center;"><img src="<?php echo get_template_directory_uri() . '/img/style-6.jpg' ?>">
		</div>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php _e( 'Description', 'colormag' ); ?>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo $text; ?></textarea>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to display:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p>
			<input type="radio" <?php checked( $type, 'latest' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest" /><?php _e( 'Show latest Posts', 'colormag' ); ?>
			<br />
			<input type="radio" <?php checked( $type, 'category' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category" /><?php _e( 'Show posts from a category', 'colormag' ); ?>
			<br /></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'colormag' ); ?>
				:</label>
			<?php wp_dropdown_categories( array(
				'show_option_none' => ' ',
				'name'             => $this->get_field_name( 'category' ),
				'selected'         => $category,
			) ); ?>
		</p>

		<p>
			<input class="checkbox" <?php echo $random_posts; ?> id="<?php echo $this->get_field_id( 'random_posts' ); ?>" name="<?php echo $this->get_field_name( 'random_posts' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'random_posts' ); ?>"><?php _e( 'Check to display the random post from either the chosen category or from latest post.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $child_category; ?> id="<?php echo $this->get_field_id( 'child_category' ); ?>" name="<?php echo $this->get_field_name( 'child_category' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'child_category' ); ?>"><?php _e( 'Check to display the posts from child category of the chosen category.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $view_all_button; ?> id="<?php echo $this->get_field_id( 'view_all_button' ); ?>" name="<?php echo $this->get_field_name( 'view_all_button' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'view_all_button' ); ?>"><?php esc_html_e( 'Check to display the view all button to link that button to the specific category chosen in this widget.', 'colormag' ); ?></label>
		</p>

		<h2>
			<?php esc_html_e( 'Slider Options', 'colormag' ); ?>
			<hr>
		</h2>
		<p>
			<label for="<?php echo $this->get_field_id( 'slider_mode' ); ?>"><?php esc_html_e( 'Slide Mode:', 'colormag' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'slider_mode' ); ?>" name="<?php echo $this->get_field_name( 'slider_mode' ); ?>">
				<option value="horizontal" <?php selected( $instance['slider_mode'], 'horizontal' ); ?>><?php esc_html_e( 'Horizontal', 'colormag' ); ?></option>
				<option value="vertical" <?php selected( $instance['slider_mode'], 'vertical' ); ?>><?php esc_html_e( 'Vertical', 'colormag' ); ?></option>
				<option value="fade" <?php selected( $instance['slider_mode'], 'fade' ); ?>><?php esc_html_e( 'Fade', 'colormag' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'slider_speed' ); ?>"><?php esc_html_e( 'Transition Speed Time (in ms):', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'slider_speed' ); ?>" name="<?php echo $this->get_field_name( 'slider_speed' ); ?>" type="text" value="<?php echo esc_attr( $slider_speed ); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'slider_pause' ); ?>"><?php esc_html_e( 'Transition Pause Time (in ms):', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'slider_pause' ); ?>" name="<?php echo $this->get_field_name( 'slider_pause' ); ?>" type="text" value="<?php echo esc_attr( $slider_pause ); ?>" size="3" />
		</p>

		<p>
			<input class="checkbox" <?php echo $slider_auto; ?> id="<?php echo $this->get_field_id( 'slider_auto' ); ?>" name="<?php echo $this->get_field_name( 'slider_auto' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'slider_auto' ); ?>"><?php esc_html_e( 'Check to enable auto slide.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $slider_hover; ?> id="<?php echo $this->get_field_id( 'slider_hover' ); ?>" name="<?php echo $this->get_field_name( 'slider_hover' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'slider_hover' ); ?>"><?php esc_html_e( 'Check to disable auto slide when mouse hover.', 'colormag' ); ?></label>
		</p>

		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['text'] = $new_instance['text'];
		} else {
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['text'] ) ) );
		}
		$instance['number']          = absint( $new_instance['number'] );
		$instance['type']            = $new_instance['type'];
		$instance['category']        = $new_instance['category'];
		$instance['random_posts']    = isset( $new_instance['random_posts'] ) ? 1 : 0;
		$instance['child_category']  = isset( $new_instance['child_category'] ) ? 1 : 0;
		$instance['view_all_button'] = isset( $new_instance['view_all_button'] ) ? 1 : 0;
		$instance['slider_mode']     = $new_instance['slider_mode'];
		$instance['slider_speed']    = absint( $new_instance['slider_speed'] );
		$instance['slider_pause']    = absint( $new_instance['slider_pause'] );
		$instance['slider_auto']     = isset( $new_instance['slider_auto'] ) ? 1 : 0;
		$instance['slider_hover']    = isset( $new_instance['slider_hover'] ) ? 1 : 0;

		return $instance;
	}

	function widget( $args, $instance ) {
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() || ( function_exists( 'colormag_elementor_active_page_check' ) && colormag_elementor_active_page_check() ) ) {
			wp_enqueue_script( 'colormag-bxslider' );
		}

		extract( $args );
		extract( $instance );

		global $post;
		$title           = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$text            = isset( $instance['text'] ) ? $instance['text'] : '';
		$number          = empty( $instance['number'] ) ? 4 : $instance['number'];
		$type            = isset( $instance['type'] ) ? $instance['type'] : 'latest';
		$category        = isset( $instance['category'] ) ? $instance['category'] : '';
		$random_posts    = ! empty( $instance['random_posts'] ) ? 'true' : 'false';
		$child_category  = ! empty( $instance['child_category'] ) ? 'true' : 'false';
		$view_all_button = ! empty( $instance['view_all_button'] ) ? 'true' : 'false';
		$slider_mode     = isset( $instance['slider_mode'] ) ? $instance['slider_mode'] : 'horizontal';
		$slider_speed    = empty( $instance['slider_speed'] ) ? 500 : $instance['slider_speed'];
		$slider_pause    = empty( $instance['slider_pause'] ) ? 4000 : $instance['slider_pause'];
		$slider_auto     = ! empty( $instance['slider_auto'] ) ? 'true' : 'false';
		$slider_hover    = ! empty( $instance['slider_hover'] ) ? 'true' : 'false';

		// For WPML plugin compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'ColorMag Pro', 'TG: Featured Posts (Style 6) Description' . $this->id, $text );
		}

		// adding the excluding post function
		$post__not_in = colormag_exclude_duplicate_posts();

		if ( $type == 'latest' ) {
			if ( $random_posts == 'false' ) {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'         => $number,
					'post_type'              => 'post',
					'ignore_sticky_posts'    => true,
					'no_found_rows'          => true,
					'update_post_meta_cache' => false,
					'post__not_in'           => $post__not_in,
				) );
			} else {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'         => $number,
					'post_type'              => 'post',
					'ignore_sticky_posts'    => true,
					'no_found_rows'          => true,
					'orderby'                => 'rand',
					'update_post_meta_cache' => false,
					'post__not_in'           => $post__not_in,
				) );
			}
		} else {
			if ( $random_posts == 'false' ) {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				}
			} else {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				}
			}
		}

		colormag_append_excluded_duplicate_posts( $get_featured_posts );
		echo $before_widget;
		?>
		<?php $featured = 'colormag-featured-image'; ?>
		<?php
		if ( $type != 'latest' ) {
			$border_color = 'style="border-bottom-color:' . colormag_category_color( $category ) . ';"';
			$title_color  = 'style="background-color: #0000;"';
		} else {
			$border_color = '';
			$title_color  = '';
		}
		// For WPML plugin compatibility
		if ( function_exists( 'icl_t' ) ) {
			$text = icl_t( 'ColorMag Pro', 'TG: Featured Posts (Style 6) Description' . $this->id, $text );
		}

		// assign the view all link to be displayed in the widget title
		$category_link = '';
		if ( $view_all_button == 'true' && ( ! empty( $category ) && $type != 'latest' ) ) {
			$category_link = '<a href="' . esc_url( get_category_link( $category ) ) . '" class="view-all-link">' . get_theme_mod( 'colormag_view_all_text', esc_html__( 'View All', 'colormag' ) ) . '</a>';
		}

		if ( ! empty( $title ) ) {
			echo '<h3 class="widget-title" ' . $border_color . '><span ' . $title_color . '>' . esc_html( $title ) . '</span>' . $category_link . '</h3>';
		}
		if ( ! empty( $text ) ) {
			?> <p> <?php echo esc_textarea( $text ); ?> </p> <?php } ?>

		<div class="thumbnail-slider-news">
			<?php
			$i                = 1;
			$big_image        = '';
			$big_image_output = '';
			$thumbnail_image  = '';
			$post_count       = $get_featured_posts->post_count;
			while ( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();
				$j               = $i - 1;
				$title_attribute = get_the_title( $post->ID );
				if ( has_post_thumbnail() ) {
					$big_image       = '<a href="' . get_permalink( $post->ID ) . '">' . get_the_post_thumbnail( $post->ID, 'colormag-featured-image', array(
							'title' => esc_attr( $title_attribute ),
							'alt'   => esc_attr( $title_attribute ),
						) ) . '</a>';
					$thumbnail_image .= '<a data-slide-index="' . $j . '" href="">' . get_the_post_thumbnail( $post->ID, 'colormag-default-news', array(
							'title' => esc_attr( $title_attribute ),
							'alt'   => esc_attr( $title_attribute ),
						) ) . '<span class="title">' . $title_attribute . '</span></a>';
				} else {
					$big_image       = '<a href="' . get_permalink( $post->ID ) . '"><img src="' . get_template_directory_uri() . '/img/thumbnail-big-slider.png">' . '</a>';
					$thumbnail_image .= '<a data-slide-index="' . $j . '" href=""><img src="' . get_template_directory_uri() . '/img/thumbnail-small-slider.png">' . '<span class="title">' . $title_attribute . '</span></a>';
				}
				$big_image_output .= '<li class="single-article">' . $big_image . '<div class="article-content" style="color: white; letter-spacing: -1px; background: rgb(0, 0, 0); background: rgba(0, 0, 0, 0.7); padding: 10px; ">' . '<h3 class="entry-title"><a href="' . get_permalink() . '" title="' . esc_attr( $title_attribute ) . '">' . get_the_title() . '</a></h3>' . colormag_colored_category_return() . ' </div></li>';
				if ( $i == $number || $i == $post_count ) {
					?>
					<ul id="style6_slider_<?php echo $this->id; ?>" class="thumbnail-big-sliders" data-mode="<?php echo esc_attr( $slider_mode ); ?>" data-speed="<?php echo esc_attr( $slider_speed ); ?>" data-pause="<?php echo esc_attr( $slider_pause ); ?>" data-auto="<?php echo esc_attr( $slider_auto ); ?>" data-hover="<?php echo esc_attr( $slider_hover ); ?>">
						<?php echo $big_image_output; ?>
					</ul>
					<div id="style6_pager_<?php echo $this->id; ?>" class="thumbnail-slider">
						<?php echo $thumbnail_image; ?>
					</div>
					<?php
				}
				$i ++;
			endwhile;
			?>
			<?php
			// Reset Post Data
			wp_reset_query();
			?>
		</div>
		<?php
		echo $after_widget;
	}

}

/* * ************************************************************************************* */

/**
 * Breaking News widget
 */
class colormag_breaking_news_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'   => 'widget_breaking_news_colormag widget_featured_posts',
			'description' => __( 'Displays the breaking news in the news ticker way. Suitable for the Right/Left Sidebar', 'colormag' ),
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Breaking News Widget', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$tg_defaults['number']           = 4;
		$tg_defaults['title']            = '';
		$tg_defaults['type']             = 'latest';
		$tg_defaults['category']         = '';
		$tg_defaults['random_posts']     = '0';
		$tg_defaults['child_category']   = '0';
		$tg_defaults['view_all_button']  = '0';
		$tg_defaults['slide_direction']  = 'up';
		$tg_defaults['slide_duration']   = 4000;
		$tg_defaults['slide_row_height'] = 100;
		$tg_defaults['slide_max_rows']   = 3;
		$instance                        = wp_parse_args( ( array ) $instance, $tg_defaults );
		$number                          = $instance['number'];
		$title                           = esc_attr( $instance['title'] );
		$type                            = $instance['type'];
		$category                        = $instance['category'];
		$random_posts                    = $instance['random_posts'] ? 'checked="checked"' : '';
		$child_category                  = $instance['child_category'] ? 'checked="checked"' : '';
		$view_all_button                 = $instance['view_all_button'] ? 'checked="checked"' : '';
		$slide_direction                 = $instance['slide_direction'];
		$slide_duration                  = $instance['slide_duration'];
		$slide_row_height                = $instance['slide_row_height'];
		$slide_max_rows                  = $instance['slide_max_rows'];
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of recent posts to show as the breaking news:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p>
			<input type="radio" <?php checked( $type, 'latest' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest" /><?php _e( 'Show latest Posts', 'colormag' ); ?>
			<br />
			<input type="radio" <?php checked( $type, 'category' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category" /><?php _e( 'Show posts from a category', 'colormag' ); ?>
			<br />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'colormag' ); ?>
				:</label>
			<?php wp_dropdown_categories( array(
				'show_option_none' => ' ',
				'name'             => $this->get_field_name( 'category' ),
				'selected'         => $category,
			) ); ?>
		</p>

		<p>
			<input class="checkbox" <?php echo $random_posts; ?> id="<?php echo $this->get_field_id( 'random_posts' ); ?>" name="<?php echo $this->get_field_name( 'random_posts' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'random_posts' ); ?>"><?php esc_html_e( 'Check to display the random post from either the chosen category or from latest post.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $child_category; ?> id="<?php echo $this->get_field_id( 'child_category' ); ?>" name="<?php echo $this->get_field_name( 'child_category' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'child_category' ); ?>"><?php _e( 'Check to display the posts from child category of the chosen category.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $view_all_button; ?> id="<?php echo $this->get_field_id( 'view_all_button' ); ?>" name="<?php echo $this->get_field_name( 'view_all_button' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'view_all_button' ); ?>"><?php esc_html_e( 'Check to display the view all button to link that button to the specific category chosen in this widget.', 'colormag' ); ?></label>
		</p>

		<h2>
			<?php esc_html_e( 'Slide Options', 'colormag' ); ?>
			<hr>
		</h2>
		<p>
			<label for="<?php echo $this->get_field_id( 'slide_direction' ); ?>"><?php esc_html_e( 'Slide Direction:', 'colormag' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'slide_direction' ); ?>" name="<?php echo $this->get_field_name( 'slide_direction' ); ?>">
				<option value="up" <?php selected( $instance['slide_direction'], 'up' ); ?>><?php esc_html_e( 'Up', 'colormag' ); ?></option>
				<option value="down" <?php selected( $instance['slide_direction'], 'down' ); ?>><?php esc_html_e( 'Down', 'colormag' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'slide_duration' ); ?>"><?php esc_html_e( 'Slide Duration Time (in ms):', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'slide_duration' ); ?>" name="<?php echo $this->get_field_name( 'slide_duration' ); ?>" type="text" value="<?php echo esc_attr( $slide_duration ); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'slide_row_height' ); ?>"><?php esc_html_e( 'Slide Row Height (in px):', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'slide_row_height' ); ?>" name="<?php echo $this->get_field_name( 'slide_row_height' ); ?>" type="text" value="<?php echo esc_attr( $slide_row_height ); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'slide_max_rows' ); ?>"><?php esc_html_e( 'Maximum Slide Rows:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'slide_max_rows' ); ?>" name="<?php echo $this->get_field_name( 'slide_max_rows' ); ?>" type="text" value="<?php echo esc_attr( $slide_max_rows ); ?>" size="3" />
		</p>

		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance                     = $old_instance;
		$instance['number']           = absint( $new_instance['number'] );
		$instance['title']            = strip_tags( $new_instance['title'] );
		$instance['type']             = $new_instance['type'];
		$instance['category']         = $new_instance['category'];
		$instance['random_posts']     = isset( $new_instance['random_posts'] ) ? 1 : 0;
		$instance['child_category']   = isset( $new_instance['child_category'] ) ? 1 : 0;
		$instance['view_all_button']  = isset( $new_instance['view_all_button'] ) ? 1 : 0;
		$instance['slide_direction']  = $new_instance['slide_direction'];
		$instance['slide_duration']   = absint( $new_instance['slide_duration'] );
		$instance['slide_row_height'] = absint( $new_instance['slide_row_height'] );
		$instance['slide_max_rows']   = absint( $new_instance['slide_max_rows'] );

		return $instance;
	}

	function widget( $args, $instance ) {
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() || ( function_exists( 'colormag_elementor_active_page_check' ) && colormag_elementor_active_page_check() ) ) {
			wp_enqueue_script( 'colormag-news-ticker' );
		}

		extract( $args );
		extract( $instance );
		$number           = empty( $instance['number'] ) ? 4 : $instance['number'];
		$title            = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$type             = isset( $instance['type'] ) ? $instance['type'] : 'latest';
		$category         = isset( $instance['category'] ) ? $instance['category'] : '';
		$random_posts     = ! empty( $instance['random_posts'] ) ? 'true' : 'false';
		$child_category   = ! empty( $instance['child_category'] ) ? 'true' : 'false';
		$view_all_button  = ! empty( $instance['view_all_button'] ) ? 'true' : 'false';
		$slide_direction  = isset( $instance['slide_direction'] ) ? $instance['slide_direction'] : 'up';
		$slide_duration   = empty( $instance['slide_duration'] ) ? 4000 : $instance['slide_duration'];
		$slide_row_height = empty( $instance['slide_row_height'] ) ? 100 : $instance['slide_row_height'];
		$slide_max_rows   = empty( $instance['slide_max_rows'] ) ? 3 : $instance['slide_max_rows'];

		echo $before_widget;

		global $post;

		// adding the excluding post function
		$post__not_in = colormag_exclude_duplicate_posts();

		if ( $type == 'latest' ) {
			if ( $random_posts == 'false' ) {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'post__not_in'        => $post__not_in,
				) );
			} else {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'orderby'             => 'rand',
					'post__not_in'        => $post__not_in,
				) );
			}
		} else {
			if ( $random_posts == 'false' ) {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page'      => $number,
						'post_type'           => 'post',
						'ignore_sticky_posts' => true,
						'no_found_rows'       => true,
						'cat'                 => $category,
						'post__not_in'        => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page'      => $number,
						'post_type'           => 'post',
						'ignore_sticky_posts' => true,
						'no_found_rows'       => true,
						'category__in'        => $category,
						'post__not_in'        => $post__not_in,
					) );
				}
			} else {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page'      => $number,
						'post_type'           => 'post',
						'ignore_sticky_posts' => true,
						'no_found_rows'       => true,
						'cat'                 => $category,
						'orderby'             => 'rand',
						'post__not_in'        => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page'      => $number,
						'post_type'           => 'post',
						'ignore_sticky_posts' => true,
						'no_found_rows'       => true,
						'category__in'        => $category,
						'orderby'             => 'rand',
						'post__not_in'        => $post__not_in,
					) );
				}
			}
		}

		colormag_append_excluded_duplicate_posts( $get_featured_posts );
		?>
		<?php $featured = 'colormag-featured-post-small'; ?>
		<?php
		if ( $type != 'latest' ) {
			$border_color = 'style="border-bottom-color:' . colormag_category_color( $category ) . ';"';
			$title_color  = 'style="background-color: #0000;"';
		} else {
			$border_color = '';
			$title_color  = '';
		}

		// assign the view all link to be displayed in the widget title
		$category_link = '';
		if ( $view_all_button == 'true' && ( ! empty( $category ) && $type != 'latest' ) ) {
			$category_link = '<a href="' . esc_url( get_category_link( $category ) ) . '" class="view-all-link">' . get_theme_mod( 'colormag_view_all_text', esc_html__( 'View All', 'colormag' ) ) . '</a>';
		}

		if ( ! empty( $title ) ) {
			echo '<h3 class="widget-title" ' . $border_color . '><span ' . $title_color . '>' . esc_html( $title ) . '</span>' . $category_link . '</h3>';
		}
		?>

		<div class="breaking_news_widget_inner_wrap">
			<i class="fa fa-arrow-up" id="breaking-news-widget-prev_<?php echo $this->id; ?>"></i>
			<ul id="breaking-news-widget_<?php echo $this->id; ?>" class="breaking-news-widget-slide" data-direction="<?php echo esc_attr( $slide_direction ); ?>" data-duration="<?php echo esc_attr( $slide_duration ); ?>" data-rowheight="<?php echo esc_attr( $slide_row_height ); ?>" data-maxrows="<?php echo esc_attr( $slide_max_rows ); ?>">
				<?php
				$i = 1;
				while ( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();

					// Display the reading time dynamically.
					$reading_time       = '';
					$reading_time_class = '';
					if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) {
						$reading_time       = 'data-file="' . get_the_permalink() . '" data-target="article"';
						$reading_time_class = 'readingtime';
					}
					?>
					<li class="single-article clearfix <?php echo $reading_time_class; ?>" <?php echo $reading_time; ?>>
						<?php
						if ( has_post_thumbnail() ) {
							$image           = '';
							$title_attribute = get_the_title( $post->ID );
							$image           .= '<figure class="tabbed-images">';
							$image           .= '<a href="' . get_permalink() . '" title="' . the_title( '', '', false ) . '">';
							$image           .= get_the_post_thumbnail( $post->ID, $featured, array(
									'title' => esc_attr( $title_attribute ),
									'alt'   => esc_attr( $title_attribute ),
								) ) . '</a>';
							$image           .= '</figure>';
							echo $image;
						}
						?>
						<div class="article-content">
							<h3 class="entry-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h3>
							<div class="below-entry-meta">
								<?php
								$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
								$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() )
								);
								printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'colormag' ), esc_url( get_permalink() ), esc_attr( get_the_time() ), $time_string
								);
								?> <!-- 
								<span class="byline"><span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="<?php /* echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); */ ?>" title="<?php /* echo get_the_author(); */ ?>"><?php /* echo esc_html( get_the_author() ); */ ?></a></span></span>
								<span class="comments"><i class="fa fa-comment"></i><?php /* comments_popup_link( __( 'No Comments', 'colormag' ), __( '1 Comment', 'colormag' ), __( '% Comments', 'colormag' ) ); */ ?></span>
								--> <?php if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) { ?>
									<span class="reading-time">
										<span class="eta"></span> <?php esc_html_e( 'min read', 'colormag' ); ?>
									</span>
								<?php } ?>
							</div>
						</div>
					</li>
					<?php
					$i ++;
				endwhile;
				// Reset Post Data
				wp_reset_query();
				?>
			</ul>
			<i class="fa fa-arrow-down" id="breaking-news-widget-next_<?php echo $this->id; ?>"></i>
		</div>
		<?php
		echo $after_widget;
	}

}

/* * ************************************************************************************* */

/**
 * Ticker News Widget
 */
class colormag_ticker_news_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'   => 'widget_ticker_news_colormag widget_featured_posts',
			'description' => __( 'Display latest posts or posts of specific category.', 'colormag' ),
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Featured Posts (Style 7)', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$tg_defaults['title']           = '';
		$tg_defaults['text']            = '';
		$tg_defaults['number']          = 5;
		$tg_defaults['type']            = 'latest';
		$tg_defaults['category']        = '';
		$tg_defaults['popup']           = '0';
		$tg_defaults['random_posts']    = '0';
		$tg_defaults['child_category']  = '0';
		$tg_defaults['view_all_button'] = '0';
		$tg_defaults['slider_speed']    = 50000;
		$instance                       = wp_parse_args( ( array ) $instance, $tg_defaults );
		$title                          = esc_attr( $instance['title'] );
		$text                           = esc_textarea( $instance['text'] );
		$number                         = $instance['number'];
		$type                           = $instance['type'];
		$category                       = $instance['category'];
		$popup_link                     = $instance['popup'] ? 'checked="checked"' : '';
		$random_posts                   = $instance['random_posts'] ? 'checked="checked"' : '';
		$child_category                 = $instance['child_category'] ? 'checked="checked"' : '';
		$view_all_button                = $instance['view_all_button'] ? 'checked="checked"' : '';
		$slider_speed                   = $instance['slider_speed'];
		?>
		<p><?php _e( 'Layout will be as below:', 'colormag' ) ?></p>
		<div style="text-align: center;"><img src="<?php echo get_template_directory_uri() . '/img/style-7.jpg' ?>">
		</div>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php _e( 'Description', 'colormag' ); ?>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo $text; ?></textarea>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to display:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p>
			<input type="radio" <?php checked( $type, 'latest' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest" /><?php _e( 'Show latest Posts', 'colormag' ); ?>
			<br />
			<input type="radio" <?php checked( $type, 'category' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category" /><?php _e( 'Show posts from a category', 'colormag' ); ?>
			<br /></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'colormag' ); ?>
				:</label>
			<?php wp_dropdown_categories( array(
				'show_option_none' => ' ',
				'name'             => $this->get_field_name( 'category' ),
				'selected'         => $category,
			) ); ?>
		</p>
		<p>
			<input class="checkbox" <?php echo $popup_link; ?> id="<?php echo $this->get_field_id( 'popup' ); ?>" name="<?php echo $this->get_field_name( 'popup' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'popup' ); ?>"><?php _e( 'Check to display the content in the popup', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $random_posts; ?> id="<?php echo $this->get_field_id( 'random_posts' ); ?>" name="<?php echo $this->get_field_name( 'random_posts' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'random_posts' ); ?>"><?php _e( 'Check to display the random post from either the chosen category or from latest post.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $child_category; ?> id="<?php echo $this->get_field_id( 'child_category' ); ?>" name="<?php echo $this->get_field_name( 'child_category' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'child_category' ); ?>"><?php _e( 'Check to display the posts from child category of the chosen category.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $view_all_button; ?> id="<?php echo $this->get_field_id( 'view_all_button' ); ?>" name="<?php echo $this->get_field_name( 'view_all_button' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'view_all_button' ); ?>"><?php esc_html_e( 'Check to display the view all button to link that button to the specific category chosen in this widget.', 'colormag' ); ?></label>
		</p>

		<h2>
			<?php esc_html_e( 'Slider Options', 'colormag' ); ?>
			<hr>
		</h2>
		<p>
			<label for="<?php echo $this->get_field_id( 'slider_speed' ); ?>"><?php esc_html_e( 'Transition Speed Time (in ms):', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'slider_speed' ); ?>" name="<?php echo $this->get_field_name( 'slider_speed' ); ?>" type="text" value="<?php echo esc_attr( $slider_speed ); ?>" size="3" />
		</p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['text'] = $new_instance['text'];
		} else {
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['text'] ) ) );
		}
		$instance['number']          = absint( $new_instance['number'] );
		$instance['type']            = $new_instance['type'];
		$instance['category']        = $new_instance['category'];
		$instance['popup']           = isset( $new_instance['popup'] ) ? 1 : 0;
		$instance['random_posts']    = isset( $new_instance['random_posts'] ) ? 1 : 0;
		$instance['child_category']  = isset( $new_instance['child_category'] ) ? 1 : 0;
		$instance['view_all_button'] = isset( $new_instance['view_all_button'] ) ? 1 : 0;
		$instance['slider_speed']    = absint( $new_instance['slider_speed'] );

		return $instance;
	}

	function widget( $args, $instance ) {
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() || ( function_exists( 'colormag_elementor_active_page_check' ) && colormag_elementor_active_page_check() ) ) {
			wp_enqueue_script( 'colormag-bxslider' );
		}

		extract( $args );
		extract( $instance );

		global $post;
		$title           = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$text            = isset( $instance['text'] ) ? $instance['text'] : '';
		$number          = empty( $instance['number'] ) ? 5 : $instance['number'];
		$type            = isset( $instance['type'] ) ? $instance['type'] : 'latest';
		$category        = isset( $instance['category'] ) ? $instance['category'] : '';
		$popup_link      = ! empty( $instance['popup'] ) ? 'true' : 'false';
		$random_posts    = ! empty( $instance['random_posts'] ) ? 'true' : 'false';
		$child_category  = ! empty( $instance['child_category'] ) ? 'true' : 'false';
		$view_all_button = ! empty( $instance['view_all_button'] ) ? 'true' : 'false';
		$slider_speed    = empty( $instance['slider_speed'] ) ? 50000 : $instance['slider_speed'];

		if ( ( $popup_link == 1 ) && ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() || ( function_exists( 'colormag_elementor_active_page_check' ) && colormag_elementor_active_page_check() ) ) ) {
			wp_enqueue_script( 'colormag-featured-image-popup' );
			wp_enqueue_style( 'colormag-featured-image-popup-css' );
		}
		// For WPML plugin compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'ColorMag Pro', 'TG: Featured Posts (Style 7) Description' . $this->id, $text );
		}

		// adding the excluding post function
		$post__not_in = colormag_exclude_duplicate_posts();

		if ( $type == 'latest' ) {
			if ( $random_posts == 'false' ) {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'         => $number,
					'post_type'              => 'post',
					'ignore_sticky_posts'    => true,
					'no_found_rows'          => true,
					'update_post_meta_cache' => false,
					'update_post_term_cache' => false,
					'post__not_in'           => $post__not_in,
				) );
			} else {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'         => $number,
					'post_type'              => 'post',
					'ignore_sticky_posts'    => true,
					'no_found_rows'          => true,
					'orderby'                => 'rand',
					'update_post_meta_cache' => false,
					'update_post_term_cache' => false,
					'post__not_in'           => $post__not_in,
				) );
			}
		} else {
			if ( $random_posts == 'false' ) {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				}
			} else {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				}
			}
		}

		colormag_append_excluded_duplicate_posts( $get_featured_posts );
		echo $before_widget;
		?>
		<?php $featured = 'colormag-default-news'; ?>
		<?php
		if ( $type != 'latest' ) {
			$border_color = 'style="border-bottom-color:' . colormag_category_color( $category ) . ';"';
			$title_color  = 'style="background-color: #0000;"';
		} else {
			$border_color = '';
			$title_color  = '';
		}
		// For WPML plugin compatibility
		if ( function_exists( 'icl_t' ) ) {
			$text = icl_t( 'ColorMag Pro', 'TG: Featured Posts (Style 7) Description' . $this->id, $text );
		}

		// assign the view all link to be displayed in the widget title
		$category_link = '';
		if ( $view_all_button == 'true' && ( ! empty( $category ) && $type != 'latest' ) ) {
			$category_link = '<a href="' . esc_url( get_category_link( $category ) ) . '" class="view-all-link">' . get_theme_mod( 'colormag_view_all_text', esc_html__( 'View All', 'colormag' ) ) . '</a>';
		}

		if ( ! empty( $title ) ) {
			echo '<h3 class="widget-title" ' . $border_color . '><span ' . $title_color . '>' . esc_html( $title ) . '</span>' . $category_link . '</h3>';
		}
		if ( ! empty( $text ) ) {
			?> <p> <?php echo esc_textarea( $text ); ?> </p> <?php } ?>

		<div id="category_slider_<?php echo esc_attr( $this->id ); ?>" class="image-ticker-news" data-speed="<?php echo esc_attr( $slider_speed ); ?>">
			<?php
			$i = 1;
			while ( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();
				?>
				<div class="single-article clearfix">
					<a href="<?php the_permalink(); ?>" data-fragment="#content" class="colormag-ticker-news-popup-link">
						<?php
						if ( has_post_thumbnail() ) {
							$image           = '';
							$title_attribute = get_the_title( $post->ID );
							$image           .= '<figure>';
							if ( $popup_link == 'false' ) {
								$image .= '<a href="' . get_permalink() . '" title="' . the_title( '', '', false ) . '">';
							}
							$image .= get_the_post_thumbnail( $post->ID, $featured, array(
								'title' => esc_attr( $title_attribute ),
								'alt'   => esc_attr( $title_attribute ),
							) );
							if ( $popup_link == 'false' ) {
								$image .= '</a>';
							}
							$image .= '</figure>';
							echo $image;
						}
						?>
					</a>
					<div class="article-content">
						<?php colormag_colored_category(); ?>
						<h3 class="entry-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h3>
					</div>
				</div>
				<?php
				$i ++;
			endwhile;
			// Reset Post Data
			wp_reset_query();
			?>
		</div>
		<?php
		echo $after_widget;
	}

}

/**
 * Featured Posts widget
 */
class colormag_featured_posts_small_thumbnails_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_featured_posts widget_featured_posts_small_thumbnails widget_featured_meta',
			'description'                 => __( 'Display latest posts or posts of specific category.', 'colormag' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Featured Posts (Style 3)', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$tg_defaults['title']           = '';
		$tg_defaults['text']            = '';
		$tg_defaults['number']          = 4;
		$tg_defaults['type']            = 'latest';
		$tg_defaults['category']        = '';
		$tg_defaults['random_posts']    = '0';
		$tg_defaults['ajax_load_more']  = '0';
		$tg_defaults['child_category']  = '0';
		$tg_defaults['view_all_button'] = '0';
		$instance                       = wp_parse_args( ( array ) $instance, $tg_defaults );
		$title                          = esc_attr( $instance['title'] );
		$text                           = esc_textarea( $instance['text'] );
		$number                         = $instance['number'];
		$type                           = $instance['type'];
		$category                       = $instance['category'];
		$random_posts                   = $instance['random_posts'] ? 'checked="checked"' : '';
		$ajax_load_more                 = $instance['ajax_load_more'] ? 'checked="checked"' : '';
		$child_category                 = $instance['child_category'] ? 'checked="checked"' : '';
		$view_all_button                = $instance['view_all_button'] ? 'checked="checked"' : '';
		?>
		<p><?php _e( 'Layout will be as below:', 'colormag' ) ?></p>
		<div style="text-align: center;"><img src="<?php echo get_template_directory_uri() . '/img/style-3.jpg' ?>">
		</div>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php _e( 'Description', 'colormag' ); ?>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo $text; ?></textarea>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to display:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p>
			<input type="radio" <?php checked( $type, 'latest' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest" /><?php _e( 'Show latest Posts', 'colormag' ); ?>
			<br />
			<input type="radio" <?php checked( $type, 'category' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category" /><?php _e( 'Show posts from a category', 'colormag' ); ?>
			<br /></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'colormag' ); ?>
				:</label>
			<?php wp_dropdown_categories( array(
				'show_option_none' => ' ',
				'name'             => $this->get_field_name( 'category' ),
				'selected'         => $category,
			) ); ?>
		</p>

		<p>
			<input class="checkbox" <?php echo $random_posts; ?> id="<?php echo $this->get_field_id( 'random_posts' ); ?>" name="<?php echo $this->get_field_name( 'random_posts' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'random_posts' ); ?>"><?php _e( 'Check to display the random post from either the chosen category or from latest post.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $ajax_load_more; ?> id="<?php echo $this->get_field_id( 'ajax_load_more' ); ?>" name="<?php echo $this->get_field_name( 'ajax_load_more' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'ajax_load_more' ); ?>"><?php _e( 'Check to display the ajax load more button to load further posts from chosen category or from latest post.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $child_category; ?> id="<?php echo $this->get_field_id( 'child_category' ); ?>" name="<?php echo $this->get_field_name( 'child_category' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'child_category' ); ?>"><?php _e( 'Check to display the posts from child category of the chosen category.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $view_all_button; ?> id="<?php echo $this->get_field_id( 'view_all_button' ); ?>" name="<?php echo $this->get_field_name( 'view_all_button' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'view_all_button' ); ?>"><?php esc_html_e( 'Check to display the view all button to link that button to the specific category chosen in this widget.', 'colormag' ); ?></label>
		</p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['text'] = $new_instance['text'];
		} else {
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['text'] ) ) );
		}
		$instance['number']          = absint( $new_instance['number'] );
		$instance['type']            = $new_instance['type'];
		$instance['category']        = $new_instance['category'];
		$instance['random_posts']    = isset( $new_instance['random_posts'] ) ? 1 : 0;
		$instance['ajax_load_more']  = isset( $new_instance['ajax_load_more'] ) ? 1 : 0;
		$instance['child_category']  = isset( $new_instance['child_category'] ) ? 1 : 0;
		$instance['view_all_button'] = isset( $new_instance['view_all_button'] ) ? 1 : 0;

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$title           = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$text            = isset( $instance['text'] ) ? $instance['text'] : '';
		$number          = empty( $instance['number'] ) ? 4 : $instance['number'];
		$type            = isset( $instance['type'] ) ? $instance['type'] : 'latest';
		$category        = isset( $instance['category'] ) ? $instance['category'] : '';
		$random_posts    = ! empty( $instance['random_posts'] ) ? 'true' : 'false';
		$ajax_load_more  = ! empty( $instance['ajax_load_more'] ) ? 'true' : 'false';
		$child_category  = ! empty( $instance['child_category'] ) ? 'true' : 'false';
		$view_all_button = ! empty( $instance['view_all_button'] ) ? 'true' : 'false';

		// For WPML plugin compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'ColorMag Pro', 'TG: Featured Posts (Style 3) Description' . $this->id, $text );
		}

		// adding the excluding post function
		$post__not_in = colormag_exclude_duplicate_posts();

		if ( $type == 'latest' ) {
			if ( $random_posts == 'false' ) {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'post__not_in'        => $post__not_in,
				) );
			} else {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'orderby'             => 'rand',
					'post__not_in'        => $post__not_in,
				) );
			}
		} else {
			if ( $random_posts == 'false' ) {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'post__not_in'   => $post__not_in,
					) );
				}
			} else {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'cat'            => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'category__in'   => $category,
						'no_found_rows'  => true,
						'orderby'        => 'rand',
						'post__not_in'   => $post__not_in,
					) );
				}
			}
		}

		colormag_append_excluded_duplicate_posts( $get_featured_posts );
		echo $before_widget;
		?>
		<?php
		if ( $type != 'latest' ) {
			$border_color = 'style="border-bottom-color:' . colormag_category_color( $category ) . ';"';
			$title_color  = 'style="background-color: #0000;"';
		} else {
			$border_color = '';
			$title_color  = '';
		}
		// For WPML plugin compatibility
		if ( function_exists( 'icl_t' ) ) {
			$text = icl_t( 'ColorMag Pro', 'TG: Featured Posts (Style 3) Description' . $this->id, $text );
		}

		// assign the view all link to be displayed in the widget title
		$category_link = '';
		if ( $ajax_load_more == 'false' ) {
			if ( $view_all_button == 'true' && ( ! empty( $category ) && $type != 'latest' ) ) {
				$category_link = '<a href="' . esc_url( get_category_link( $category ) ) . '" class="view-all-link">' . get_theme_mod( 'colormag_view_all_text', esc_html__( 'View All', 'colormag' ) ) . '</a>';
			}
		}

		if ( ! empty( $title ) ) {
			echo '<h3 class="widget-title" ' . $border_color . '><span ' . $title_color . '>' . esc_html( $title ) . '</span>' . $category_link . '</h3>';
		}
		if ( ! empty( $text ) ) {
			?> <p> <?php echo esc_textarea( $text ); ?> </p> <?php
		}

		$featured = 'colormag-featured-post-small';
		?>
		<div class="following-post">
			<?php
			$i = 1;
			while ( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();

				// Display the reading time dynamically.
				$reading_time       = '';
				$reading_time_class = '';
				if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) {
					$reading_time       = 'data-file="' . get_the_permalink() . '" data-target="article"';
					$reading_time_class = 'readingtime';
				}
				?>
				<div class="single-article clearfix <?php echo $reading_time_class; ?>" <?php echo $reading_time; ?>>
					<?php
					if ( has_post_thumbnail() ) {
						$image           = '';
						$title_attribute = get_the_title( $post->ID );
						$image           .= '<figure>';
						$image           .= '<a href="' . get_permalink() . '" title="' . the_title( '', '', false ) . '">';
						$image           .= get_the_post_thumbnail( $post->ID, $featured, array(
								'title' => esc_attr( $title_attribute ),
								'alt'   => esc_attr( $title_attribute ),
							) ) . '</a>';
						$image           .= '</figure>';
						echo $image;
					}
					?>
					<div class="article-content">
						<?php colormag_colored_category(); ?>
						<h3 class="entry-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h3>
						<div class="below-entry-meta">
							<?php
							$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
							$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() )
							);
							printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'colormag' ), esc_url( get_permalink() ), esc_attr( get_the_time() ), $time_string
							);
							?> <!--
							<span class="byline"><span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="<?php /* echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); */ ?>" title="<?php /* echo get_the_author(); */ ?>"><?php /* echo esc_html( get_the_author() ); */ ?></a></span></span>
							<span class="comments"><i class="fa fa-comment"></i><?php /* comments_popup_link( '0', '1', '%' ); */ ?></span>
							--> <?php if ( get_theme_mod( 'colormag_reading_time_setting', 0 ) == 1 ) { ?>
								<span class="reading-time">
									<span class="eta"></span> <?php esc_html_e( 'min read', 'colormag' ); ?>
								</span>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php
				$i ++;
			endwhile;
			?>
		</div>
		<?php
		// Reset Post Data
		wp_reset_query();
		?>
		<?php
		if ( $type == 'latest' ) {
			$category = '-1';
		}

		// For display of child category posts
		$child_category_display = 0;
		if ( $child_category == 'true' ) {
			$child_category_display = 1;
		}

		if ( $ajax_load_more == 'true' ) {
			?>
			<div class="tg-ajax-btn-wrapper">
				<div id="tg-append-ajax-data-<?php echo esc_attr( $this->id ); ?>" class="tg-append-ajax-datas"></div>

				<div class="tg-front-post-load-more btn-wrapper" id="tg-ajax-btn-<?php echo esc_attr( $this->id ); ?>" data-category='<?php echo esc_attr( $category ); ?>' data-child_category='<?php echo absint( $child_category_display ); ?>' data-random="<?php echo $random_posts; ?>" data-number="<?php echo esc_attr( $number ); ?>">
					<span class="transition5 btn btn-view-all"><?php esc_html_e( 'Load More', 'colormag' ); ?></span>
					<img src="<?php echo esc_url( admin_url( '/images/wpspin_light.gif' ) ); ?>" class="waiting" id="tg-ajax-loading-icon-<?php echo esc_attr( $this->id ); ?>" style="display: none;">
				</div><!-- .tg-front-post-load-more -->
			</div>
		<?php } ?>
		<?php
		echo $after_widget;
	}

}

/**
 * Call To Action Widget
 */
class colormag_cta_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_call_to_action',
			'description'                 => __( 'Display Call To Action Widget.', 'colormag' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Call To Action', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$tg_defaults['background_image'] = '';
		$tg_defaults['title']            = '';
		$tg_defaults['text']             = '';
		$tg_defaults['btn_text']         = '';
		$tg_defaults['btn_link']         = '';
		$tg_defaults['new_tab']          = 0;
		$tg_defaults['align']            = 'call-to-action--left';

		$instance         = wp_parse_args( ( array ) $instance, $tg_defaults );
		$background_image = $instance['background_image'];
		$title            = $instance['title'];
		$text             = $instance['text'];
		$btn_text         = $instance['btn_text'];
		$btn_link         = $instance['btn_link'];
		$new_tab          = $instance['new_tab'] ? 'checked="checked"' : '';
		$align            = $instance['align'];
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'background_image' ) ); ?>"> <?php esc_html_e( 'Background Image ', 'colormag' ); ?></label>
		<div class="media-uploader" id="<?php echo esc_attr( $this->get_field_id( 'background_image' ) ); ?>">
			<div class="custom_media_preview">
				<?php if ( $background_image != '' ) : ?>
					<img class="custom_media_preview_default" src="<?php echo esc_url( $background_image ); ?>" style="max-width:100%;" />
				<?php endif; ?>
			</div>
			<input type="text" class="widefat custom_media_input" id="<?php echo esc_attr( $this->get_field_id( 'background_image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'background_image' ) ); ?>" value="<?php echo esc_url( $background_image ); ?>" style="margin-top:5px;" />
			<button class="custom_media_upload button button-secondary button-large" id="<?php echo esc_attr( $this->get_field_id( 'background_image' ) ); ?>" data-choose="<?php esc_attr_e( 'Choose an image', 'colormag' ); ?>" data-update="<?php esc_attr_e( 'Use image', 'colormag' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e( 'Select an Image', 'colormag' ); ?></button>
		</div>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php esc_html_e( 'Description', 'colormag' ); ?>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>"><?php echo esc_textarea( $text ); ?></textarea>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'btn_text' ) ); ?>"><?php esc_html_e( 'Button Text:', 'colormag' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'btn_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'btn_text' ) ); ?>" type="text" value="<?php echo esc_attr( $btn_text ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'btn_link' ) ); ?>"><?php esc_html_e( 'Button URL:', 'colormag' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'btn_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'btn_link' ) ); ?>" type="text" value="<?php echo esc_url( $btn_link ); ?>" />
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php echo esc_attr( $new_tab ); ?> id="<?php echo esc_attr( $this->get_field_id( 'new_tab' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'new_tab' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'new_tab' ) ); ?>"><?php esc_html_e( 'Open in new tab', 'colormag' ); ?></label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'align' ) ); ?>"><?php esc_html_e( 'Text Align:', 'colormag' ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'align' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'align' ) ); ?>">
				<option value="call-to-action--left" <?php selected( $instance['align'], 'call-to-action--left' ); ?>><?php esc_html_e( 'Left', 'colormag' ); ?></option>
				<option value="call-to-action--center" <?php selected( $instance['align'], 'call-to-action--center' ); ?>><?php esc_html_e( 'Center', 'colormag' ); ?></option>
				<option value="call-to-action--right" <?php selected( $instance['align'], 'call-to-action--right' ); ?>><?php esc_html_e( 'Right', 'colormag' ); ?></option>
			</select>
		</p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance                     = $old_instance;
		$instance['background_image'] = esc_url_raw( $new_instance['background_image'] );
		$instance['title']            = sanitize_text_field( $new_instance['title'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['text'] = $new_instance['text'];
		} else {
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['text'] ) ) );
		}
		$instance['btn_link'] = esc_url_raw( $new_instance['btn_link'] );
		$instance['btn_text'] = sanitize_text_field( $new_instance['btn_text'] );
		$instance['new_tab']  = isset( $new_instance['new_tab'] ) ? 1 : 0;
		$instance['align']    = sanitize_text_field( $new_instance['align'] );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$background_image = isset( $instance['background_image'] ) ? $instance['background_image'] : '';
		$title            = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$text             = isset( $instance['text'] ) ? $instance['text'] : '';
		$btn_link         = isset( $instance['btn_link'] ) ? $instance['btn_link'] : '';
		$btn_text         = isset( $instance['btn_text'] ) ? $instance['btn_text'] : '';
		$new_tab          = ! empty( $instance['new_tab'] ) ? 'target="_blank"' : '';
		$align            = isset( $instance['align'] ) ? $instance['align'] : 'call-to-action--left';

		// For WPML plugin compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'ColorMag Pro', 'TG: CTA Description' . $this->id, $text );
			icl_register_string( 'ColorMag Pro', 'TG: CTA Button Text' . $this->id, $btn_text );
			icl_register_string( 'ColorMag Pro', 'TG: CTA Button URL' . $this->id, $btn_link );
			icl_register_string( 'ColorMag Pro', 'TG: CTA Background Image' . $this->id, $background_image );
		}

		// For WPML plugin compatibility
		if ( function_exists( 'icl_t' ) ) {
			$text             = icl_t( 'ColorMag Pro', 'TG: CTA Description' . $this->id, $text );
			$btn_text         = icl_t( 'ColorMag Pro', 'TG: CTA Button Text' . $this->id, $btn_text );
			$btn_link         = icl_t( 'ColorMag Pro', 'TG: CTA Button URL' . $this->id, $btn_link );
			$background_image = icl_t( 'ColorMag Pro', 'TG: CTA Background Image' . $this->id, $background_image );
		}

		$style = '';
		if ( ! empty( $background_image ) ) {
			$style = " style=background-image:url({$background_image})";
		}
		echo $before_widget;
		?>
		<div class="call-to-action"<?php echo esc_attr( $style ); ?>>
			<div class="call-to-action-border  <?php echo esc_attr( $align ); ?>">
				<?php if ( ! empty( $title ) ) : ?>
					<h3 class="call-to-action__title"><?php echo esc_html( $title ); ?></h3>
				<?php endif; ?>

				<?php if ( ! empty( $text ) ) : ?>
					<div class="call-to-action-content">
						<p><?php echo esc_html( $text ); ?></p>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $btn_link ) ) : ?>
					<a href="<?php echo esc_url( $btn_link ); ?>" class="btn--primary" <?php echo esc_attr( $new_tab ); ?>><?php echo esc_html( $btn_text ); ?></a>
				<?php endif; ?>
			</div>
		</div>
		<!-- </div> -->
		<?php
		echo $after_widget;
	}

}

/* * ************************************************************************************* */

/**
 * Weather Widget
 */
class colormag_weather_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_weather',
			'description'                 => __( 'Display weather.', 'colormag' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Weather', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$tg_defaults['title']    = '';
		$tg_defaults['city_id']  = '';
		$tg_defaults['unit']     = 'imperial';
		$tg_defaults['forecast'] = 4;

		$instance = wp_parse_args( ( array ) $instance, $tg_defaults );
		$title    = $instance['title'];
		$city_id  = $instance['city_id'];
		$unit     = $instance['unit'];
		$forecast = $instance['forecast'];
		?>
		<p>
		<?php
		$API_KEY = get_theme_mod( 'colormag_openweathermap_api_key' );

		if ( empty( $API_KEY ) ) :
			$query['autofocus[section]'] = 'colormag_openweathermap_section';
			$section_link = add_query_arg( $query, admin_url( 'customize.php' ) );
			?>
			<div class="weather-api-error">
				<?php
				$url  = 'http://openweathermap.org/appid';
				$link = sprintf( __( 'OpenWeatherMap requires <a href="%s" target="_blank">API Key</a> to work', 'colormag' ), esc_url( $url ) );
				echo $link;
				?><br />
				<a href="<?php echo esc_url( $section_link ); ?>"><?php esc_html_e( 'Enter API Key here', 'colormag' ); ?></a><br /><br />
			</div>
		<?php endif; ?>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'colormag' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'city_id' ); ?>"><?php _e( 'OpenWeatherMap City ID:', 'colormag' ); ?>
				<a href="http://openweathermap.org/find"><?php esc_html_e( 'Get City ID', 'colormag' ); ?></a><br /></label>
			<input id="<?php echo $this->get_field_id( 'city_id' ); ?>" name="<?php echo $this->get_field_name( 'city_id' ); ?>" type="text" value="<?php echo esc_attr( $city_id ); ?>" />
		</p>
		<p>
			<input type="radio" <?php checked( $unit, 'imperial' ) ?> id="<?php echo $this->get_field_id( 'unit' ); ?>" name="<?php echo $this->get_field_name( 'unit' ); ?>" value="imperial" /><?php esc_html_e( 'Fahrenheit', 'colormag' ); ?>
			<br />
			<input type="radio" <?php checked( $unit, 'metric' ) ?> id="<?php echo $this->get_field_id( 'unit' ); ?>" name="<?php echo $this->get_field_name( 'unit' ); ?>" value="metric" /><?php esc_html_e( 'Celsius', 'colormag' ); ?>
			<br />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'forecast' ); ?>"><?php esc_html_e( 'Forecast Days:', 'colormag' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'forecast' ); ?>" name="<?php echo $this->get_field_name( 'forecast' ); ?>">
				<option value="0" <?php selected( $instance['forecast'], '0' ); ?>><?php esc_html_e( 'Hide', 'colormag' ); ?></option>
				<option value="1" <?php selected( $instance['forecast'], '1' ); ?>><?php esc_html_e( '1', 'colormag' ); ?></option>
				<option value="2" <?php selected( $instance['forecast'], '2' ); ?>><?php esc_html_e( '2', 'colormag' ); ?></option>
				<option value="3" <?php selected( $instance['forecast'], '3' ); ?>><?php esc_html_e( '3', 'colormag' ); ?></option>
				<option value="4" <?php selected( $instance['forecast'], '4' ); ?>><?php esc_html_e( '4', 'colormag' ); ?></option>
			</select>
		</p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance             = $old_instance;
		$instance['title']    = sanitize_text_field( $new_instance['title'] );
		$instance['city_id']  = absint( $new_instance['city_id'] );
		$instance['unit']     = sanitize_text_field( $new_instance['unit'] );
		$instance['forecast'] = sanitize_text_field( $new_instance['forecast'] );

		$weather_transient_name = 'colormag_weather_' . $new_instance['city_id'] . "_" . $new_instance['forecast'] . "_" . strtolower( $new_instance['unit'] );
		delete_transient( $weather_transient_name );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		$title         = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$city_id       = isset( $instance['city_id'] ) ? $instance['city_id'] : '';
		$unit          = isset( $instance['unit'] ) ? $instance['unit'] : 'imperial';
		$forecast_days = isset( $instance['forecast'] ) ? $instance['forecast'] : 5;

		if ( $unit == 'imperial' ) {
			$temp_unit        = esc_html__( 'Fahrenheit', 'colormag' );
			$wind_unit        = esc_html__( 'mph', 'colormag' );
			$temp_unit_symbol = esc_html__( 'F', 'colormag' );
		} else {
			$temp_unit        = esc_html__( 'Celsius', 'colormag' );
			$wind_unit        = esc_html__( 'm/s', 'colormag' );
			$temp_unit_symbol = esc_html__( 'C', 'colormag' );
		}

		$API_KEY = get_theme_mod( 'colormag_openweathermap_api_key' );

		if ( empty( $API_KEY ) ) :
			?>
			<div class="weather-api-error">
				<?php esc_html_e( 'OpenWeatherMap requires API Key to work.', 'colormag' ); ?>
				<a href="http://openweathermap.org/appid"><?php esc_html_e( 'Get API Key', 'colormag' ); ?></a>
			</div>
			<?php
			return false;
		endif;
		?>

		<?php if ( empty( $city_id ) ) : ?>
			<div class="weather-api-error">
				<?php esc_html_e( 'OpenWeatherMap requires City ID to work.', 'colormag' ); ?>
				<a href="http://openweathermap.org/find"><?php esc_html_e( 'Get City ID', 'colormag' ); ?></a>
			</div>
			<?php
			return false;
		endif;
		?>

		<?php
		// Transient
		$weather_transient_name = 'colormag_weather_' . $city_id . "_" . $forecast_days . "_" . strtolower( $unit );

		if ( get_transient( $weather_transient_name ) ) {
			$weather_data = get_transient( $weather_transient_name );
		} else {
			$weather_data['today']    = array();
			$weather_data['forecast'] = array();

			// Today Data
			$today_api_url      = "http://api.openweathermap.org/data/2.5/weather?" . "id=" . $city_id . "&units=" . $unit . "&APPID=" . $API_KEY;
			$today_api_response = wp_remote_get( $today_api_url );

			if ( is_wp_error( $today_api_response ) ) :
				echo $today_api_response->get_error_message();

				return false;
			endif;

			$today_data            = json_decode( $today_api_response['body'] );
			$weather_data['today'] = $today_data;

			// Forecast Data
			$forecast_api_url      = "http://api.openweathermap.org/data/2.5/forecast/daily?" . "id=" . $city_id . "&units=" . $unit . "&APPID=" . $API_KEY;
			$forecast_api_response = wp_remote_get( $forecast_api_url );

			if ( is_wp_error( $forecast_api_response ) ) :
				echo $forecast_api_response->get_error_message();

				return false;
			endif;

			$forecast_data            = json_decode( $forecast_api_response['body'] );
			$weather_data['forecast'] = $forecast_data;

			if ( $weather_data['today'] || $weather_data['forecast'] ) {
				set_transient( $weather_transient_name, $weather_data, apply_filters( 'colormag_weather_cache_time', 3 * HOUR_IN_SECONDS ) );
			}
		}

		$today_data    = $weather_data['today'];
		$forecast_data = $weather_data['forecast'];

		// Checks for any error
		if ( isset( $today_data->cod ) && substr( $today_data->cod, 0, 1 ) == "4" ) {
			echo $today_data->message;

			return false;
		}

		// Checks for any error
		if ( isset( $forecast_data->cod ) && substr( $forecast_data->cod, 0, 1 ) == "4" ) {
			echo $forecast_data->message;

			return false;
		}

		$today_temperature  = isset( $today_data->main->temp ) ? round( $today_data->main->temp ) : false;
		$today_description  = isset( $today_data->weather[0]->description ) ? $today_data->weather[0]->description : '';
		$today_humidity     = isset( $today_data->main->humidity ) ? $today_data->main->humidity : '';
		$today_wind_speed   = isset( $today_data->wind->speed ) ? $today_data->wind->speed : '';
		$today_wind_degree  = isset( $today_data->wind->deg ) ? $today_data->wind->deg : '';
		$today_wind_compass = round( ( $today_wind_degree - 11.25 ) / 22.5 );
		$today_weather_code = $today_data->weather[0]->id;

		$wind_label = array(
			__( 'N', 'colormag' ),
			__( 'NNE', 'colormag' ),
			__( 'NE', 'colormag' ),
			__( 'ENE', 'colormag' ),
			__( 'E', 'colormag' ),
			__( 'ESE', 'colormag' ),
			__( 'SE', 'colormag' ),
			__( 'SSE', 'colormag' ),
			__( 'S', 'colormag' ),
			__( 'SSW', 'colormag' ),
			__( 'SW', 'colormag' ),
			__( 'WSW', 'colormag' ),
			__( 'W', 'colormag' ),
			__( 'WNW', 'colormag' ),
			__( 'NW', 'colormag' ),
			__( 'NNW', 'colormag' ),
		);

		$today_wind_direction = $wind_label[ $today_wind_compass ];

		// Get Today High and Low Temperature from Forecast if available
		if ( isset( $forecast_data->list ) && isset( $forecast_data->list[0] ) ) {
			$forecast_today = $forecast_data->list[0];
			$today_high     = round( $forecast_today->temp->max );
			$today_low      = round( $forecast_today->temp->min );
		} else {
			$today_high = isset( $today_data->main->temp_max ) ? round( $today_data->main->temp_max ) : false;
			$today_low  = isset( $today_data->main->temp_min ) ? round( $today_data->main->temp_min ) : false;
		}

		$units_display_symbol = apply_filters( 'colormag_weather_widget_deg_symbol', '&deg;' );

		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() || ( function_exists( 'colormag_elementor_active_page_check' ) && colormag_elementor_active_page_check() ) ) {
			wp_enqueue_style( 'owfont' );
		}

		$style = '';
		if ( colormag_get_weather_color( $today_weather_code ) !== '' ) {
			$style = ' style=background-color:' . colormag_get_weather_color( $today_weather_code ) . '';
		}

		echo $before_widget;
		?>
		<div class="weather-forecast"<?php echo esc_attr( $style ); ?>>
			<?php
			if ( ! empty( $title ) ) {
				echo '<header class="weather-forecast-header">' . esc_html( $title ) . '</header>';
			}
			?>
			<div class="weather-info">
				<div class="weather-location">
					<span class="weather-icon"><span class="owf owf-<?php echo esc_attr( $today_weather_code ); ?>"></span></span>
					<span class="weather-location-name"><?php echo esc_html( $today_data->name ); ?></span>
					<span class="weather-desc"><?php echo esc_html( $today_data->weather[0]->description ); ?></span>
				</div>
				<div class="weather-today">
					<span class="weather-current-temp"><?php echo esc_html( $today_temperature ); ?>
						<sup><?php echo esc_html( $units_display_symbol ); ?><?php echo esc_html( $temp_unit_symbol ); ?></sup></span>
					<div class="weather-temp">
						<span class="fa fa-thermometer-full"></span><?php echo absint( $today_high ); ?> -
						<?php echo absint( $today_low ); ?></div>
					<div class="weather_highlow">
						<span class="fa fa-tint"></span><?php echo esc_html( $today_humidity . '%' ); ?></div>
					<div class="weather_wind">
						<span class="owf owf-231"></span><?php echo esc_html( round( $today_wind_speed ) . $wind_unit ); ?>
					</div>
				</div>
			</div>
			<?php if ( $forecast_days != 0 ) : ?>
				<footer class="weather-forecast-footer">
					<?php
					$days_shown   = 1;
					$days_of_week = array(
						esc_html__( 'Sun', 'colormag' ),
						esc_html__( 'Mon', 'colormag' ),
						esc_html__( 'Tue', 'colormag' ),
						esc_html__( 'Wed', 'colormag' ),
						esc_html__( 'Thu', 'colormag' ),
						esc_html__( 'Fri', 'colormag' ),
						esc_html__( 'Sat', 'colormag' ),
					);
					foreach ( ( array ) $forecast_data->list as $forecast ) {

						$forecast_weather_code = $forecast->weather[0]->id;
						$day                   = $days_of_week[ date( 'w', $forecast->dt ) ];
						if ( $days_shown <= $forecast_days ) {
							?>
							<div class="weather-forecast-day weather-forecast-day--<?php echo esc_html( $day ); ?>">
								<span class="weather-icon"><i class="owf owf-<?php echo esc_attr( $today_weather_code ); ?>"></i></span>
								<div class="weather-forecast-day-temp">
									<span class="weather-forecast-temp"><?php echo esc_html( $forecast->temp->day ); ?>
										<sup><?php echo esc_html( $units_display_symbol ); ?><?php echo esc_html( $temp_unit_symbol ); ?></sup></span>
									<span class="weather-forecast-day-abbr"><?php echo esc_html( $day ); ?></span>
								</div>
							</div>
							<?php
						}
						$days_shown ++;
					}
					?>
				</footer>
			<?php endif; ?>
		</div>
		<?php
		echo $after_widget;
	}

}

/* * ************************************************************************************* */

/**
 * Currency Exchange Widget
 */
class colormag_exchange_widget_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_exchange',
			'description'                 => __( 'Display Currency Exchange.', 'colormag' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Currency Exchange', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$tg_defaults['title']               = '';
		$tg_defaults['base_currency']       = 'USD';
		$tg_defaults['exchange_currencies'] = '';
		$tg_defaults['column']              = 1;

		$instance            = wp_parse_args( ( array ) $instance, $tg_defaults );
		$title               = $instance['title'];
		$base_currency       = $instance['base_currency'];
		$exchange_currencies = $instance['exchange_currencies'];
		$column              = $instance['column'];

		$available_currencies = colormag_get_available_currencies();
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'base_currency' ); ?>"><?php esc_html_e( 'Base Currency:', 'colormag' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'base_currency' ); ?>" name="<?php echo $this->get_field_name( 'base_currency' ); ?>">
				<?php foreach ( $available_currencies as $value => $name ) : ?>
					<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $instance['base_currency'], $value ); ?>><?php echo esc_html( $name ); ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'exchange_currencies' ); ?>"><?php _e( 'Exchange Currencies:', 'colormag' ); ?></label>
			<?php
			printf(
				'<select multiple="multiple" name="%s[]" id="%s" %s>', $this->get_field_name( 'exchange_currencies' ), $this->get_field_id( 'exchange_currencies' ), 'style="width:100%"'
			);

			$exchange_currencies_value = ! empty( $instance['exchange_currencies'] ) ? $instance['exchange_currencies'] : array();

			// Each individual option
			foreach ( $available_currencies as $value => $name ) {
				printf(
					'<option value="%s"%s>%s</option>', $value, in_array( $value, $exchange_currencies_value ) ? ' selected="selected"' : '', $name
				);
			}

			echo '</select>';
			?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'column' ); ?>"><?php esc_html_e( 'Column:', 'colormag' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'column' ); ?>" name="<?php echo $this->get_field_name( 'column' ); ?>">
				<option value="1" <?php selected( $instance['column'], '1' ); ?>><?php esc_html_e( '1', 'colormag' ); ?></option>
				<option value="2" <?php selected( $instance['column'], '2' ); ?>><?php esc_html_e( '2', 'colormag' ); ?></option>
				<option value="3" <?php selected( $instance['column'], '3' ); ?>><?php esc_html_e( '3', 'colormag' ); ?></option>
			</select>
		</p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance                        = $old_instance;
		$instance['title']               = sanitize_text_field( $new_instance['title'] );
		$instance['base_currency']       = sanitize_text_field( $new_instance['base_currency'] );
		$instance['exchange_currencies'] = isset( $new_instance['exchange_currencies'] ) ? $new_instance['exchange_currencies'] : array();
		$instance['column']              = absint( $new_instance['column'] );

		$exchange_transient_name = 'colormag_exchange_' . $new_instance['base_currency'] . "_" . current_time( 'Y-m-d' );
		delete_transient( $exchange_transient_name );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		$title               = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$base_currency       = isset( $instance['base_currency'] ) ? $instance['base_currency'] : 'usd';
		$exchange_currencies = isset( $instance['exchange_currencies'] ) ? $instance['exchange_currencies'] : array();
		$column              = isset( $instance['column'] ) ? $instance['column'] : 1;

		$available_currencies = colormag_get_available_currencies();

		$exchange_transient_name = 'colormag_exchange_' . $base_currency . "_" . current_time( 'Y-m-d' );

		if ( get_transient( $exchange_transient_name ) ) {
			$currency_data = get_transient( $exchange_transient_name );
		} else {
			$api_url = add_query_arg( 'base', strtoupper( $base_currency ), 'http://api.fixer.io/latest' );

			if ( count( $exchange_currencies ) > 0 ) {
				$currency_to_fetch = strtoupper( implode( ',', $exchange_currencies ) );

				$api_url = add_query_arg( 'symbols', esc_html( $currency_to_fetch ), $api_url );
			}

			$json_response = wp_remote_get( $api_url );

			if ( is_wp_error( $json_response ) ) :
				echo $json_response->get_error_message();

				return false;
			endif;

			$currency_data = json_decode( $json_response['body'] );

			if ( $currency_data ) {
				set_transient( $exchange_transient_name, $currency_data, apply_filters( 'colormag_exchange_cache_time', DAY_IN_SECONDS ) );
			}
		}

		echo $before_widget;
		?>
		<?php
		if ( ! empty( $title ) ) {
			echo '<h3 class="widget-title"><span>' . esc_html( $title ) . '</span></h3>';
		}
		?>
		<div class="exchange-currency exchange-column-<?php echo esc_attr( $column ); ?>">
			<div class="base-currency">
				<?php echo esc_html( $available_currencies[ strtolower( $base_currency ) ] ); ?>
			</div>
			<div class="currency-list">
				<?php
				foreach ( $currency_data->rates as $country => $rate ) {
					?>
					<div class="currency-table">
						<div class="currency--country">
							<span class="currency--flag currency--flag-<?php echo strtolower( $country ); ?>"></span>
							<?php echo esc_html( $country ); ?>
						</div>
						<div class="currency--rate">
							<?php echo esc_html( $rate ); ?>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
		<?php
		echo $after_widget;
	}

}

/**
 * Video Playlist Widget
 */
class colormag_video_playlist_child extends WP_Widget {

	function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_video_player',
			'description'                 => __( 'Display video playlist from Video Post Formats.', 'colormag' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = __( 'Child Theme - TG: Featured Videos Playlist', 'colormag' ), $widget_ops );
	}

	function form( $instance ) {
		$tg_defaults['title']           = '';
		$tg_defaults['text']            = '';
		$tg_defaults['number']          = 4;
		$tg_defaults['type']            = 'latest';
		$tg_defaults['category']        = '';
		$tg_defaults['layout']          = 'vertical';
		$tg_defaults['random_posts']    = '0';
		$tg_defaults['child_category']  = '0';
		$tg_defaults['view_all_button'] = '0';
		$instance                       = wp_parse_args( ( array ) $instance, $tg_defaults );
		$title                          = $instance['title'];
		$text                           = esc_textarea( $instance['text'] );
		$number                         = $instance['number'];
		$type                           = $instance['type'];
		$category                       = $instance['category'];
		$layout                         = $instance['layout'];
		$random_posts                   = $instance['random_posts'] ? 'checked="checked"' : '';
		$child_category                 = $instance['child_category'] ? 'checked="checked"' : '';
		$view_all_button                = $instance['view_all_button'] ? 'checked="checked"' : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<?php esc_html_e( 'Description', 'colormag' ); ?>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo $text; ?></textarea>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to display:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo absint( $number ); ?>" size="3" />
		</p>

		<p>
			<input type="radio" <?php checked( $type, 'latest' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest" /><?php _e( 'Show latest Posts', 'colormag' ); ?>
			<br />
			<input type="radio" <?php checked( $type, 'category' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category" /><?php _e( 'Show posts from a category', 'colormag' ); ?>
			<br />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'colormag' ); ?>
				:</label>
			<?php wp_dropdown_categories( array(
				'show_option_none' => ' ',
				'name'             => $this->get_field_name( 'category' ),
				'selected'         => $category,
			) ); ?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'layout' ); ?>"><?php esc_html_e( 'Layout:', 'colormag' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'layout' ); ?>" name="<?php echo $this->get_field_name( 'layout' ); ?>">
				<option value="vertical" <?php selected( $instance['layout'], 'vertical' ); ?>><?php esc_html_e( 'Vertical', 'colormag' ); ?></option>
				<option value="horizontal" <?php selected( $instance['layout'], 'horizontal' ); ?>><?php esc_html_e( 'Horizontal', 'colormag' ); ?></option>
			</select>
		</p>

		<p>
			<input class="checkbox" <?php echo $random_posts; ?> id="<?php echo $this->get_field_id( 'random_posts' ); ?>" name="<?php echo $this->get_field_name( 'random_posts' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'random_posts' ); ?>"><?php esc_html_e( 'Check to display the random post from either the chosen category or from latest post.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $child_category; ?> id="<?php echo $this->get_field_id( 'child_category' ); ?>" name="<?php echo $this->get_field_name( 'child_category' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'child_category' ); ?>"><?php _e( 'Check to display the posts from child category of the chosen category.', 'colormag' ); ?></label>
		</p>

		<p>
			<input class="checkbox" <?php echo $view_all_button; ?> id="<?php echo $this->get_field_id( 'view_all_button' ); ?>" name="<?php echo $this->get_field_name( 'view_all_button' ); ?>" type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'view_all_button' ); ?>"><?php esc_html_e( 'Check to display the view all button to link that button to the specific category chosen in this widget.', 'colormag' ); ?></label>
		</p>

		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['text'] = $new_instance['text'];
		} else {
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['text'] ) ) );
		}
		$instance['number']          = absint( $new_instance['number'] );
		$instance['type']            = $new_instance['type'];
		$instance['category']        = $new_instance['category'];
		$instance['layout']          = sanitize_text_field( $new_instance['layout'] );
		$instance['random_posts']    = isset( $new_instance['random_posts'] ) ? 1 : 0;
		$instance['child_category']  = isset( $new_instance['child_category'] ) ? 1 : 0;
		$instance['view_all_button'] = isset( $new_instance['view_all_button'] ) ? 1 : 0;

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$title           = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$text            = isset( $instance['text'] ) ? $instance['text'] : '';
		$number          = empty( $instance['number'] ) ? 4 : $instance['number'];
		$type            = isset( $instance['type'] ) ? $instance['type'] : 'latest';
		$category        = isset( $instance['category'] ) ? $instance['category'] : '';
		$layout          = isset( $instance['layout'] ) ? $instance['layout'] : 'vertical';
		$random_posts    = ! empty( $instance['random_posts'] ) ? 'true' : 'false';
		$child_category  = ! empty( $instance['child_category'] ) ? 'true' : 'false';
		$view_all_button = ! empty( $instance['view_all_button'] ) ? 'true' : 'false';

		// For WPML plugin compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'ColorMag Pro', 'TG: Featured Videos Playlist Description' . $this->id, $text );
		}

		// adding the excluding post function
		$post__not_in = colormag_exclude_duplicate_posts();

		if ( $type == 'latest' ) {
			if ( $random_posts == 'false' ) {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'post__not_in'        => $post__not_in,
					'tax_query'           => array(
						array(
							'taxonomy' => 'post_format',
							'field'    => 'slug',
							'terms'    => array( 'post-format-video' ),
						),
					),
				) );
			} else {
				$get_featured_posts = new WP_Query( array(
					'posts_per_page'      => $number,
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'orderby'             => 'rand',
					'post__not_in'        => $post__not_in,
					'tax_query'           => array(
						array(
							'taxonomy' => 'post_format',
							'field'    => 'slug',
							'terms'    => array( 'post-format-video' ),
						),
					),
				) );
			}
		} else {
			if ( $random_posts == 'false' ) {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page'      => $number,
						'post_type'           => 'post',
						'cat'                 => $category,
						'ignore_sticky_posts' => true,
						'no_found_rows'       => true,
						'post__not_in'        => $post__not_in,
						'tax_query'           => array(
							'taxonomy' => 'post_format',
							'field'    => 'slug',
							'terms'    => array( 'post-format-video' ),
						),
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page'      => $number,
						'post_type'           => 'post',
						'category__in'        => $category,
						'ignore_sticky_posts' => true,
						'no_found_rows'       => true,
						'post__not_in'        => $post__not_in,
						'tax_query'           => array(
							'taxonomy' => 'post_format',
							'field'    => 'slug',
							'terms'    => array( 'post-format-video' ),
						),
					) );
				}
			} else {
				if ( $child_category == 'true' ) {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page'      => $number,
						'post_type'           => 'post',
						'cat'                 => $category,
						'ignore_sticky_posts' => true,
						'no_found_rows'       => true,
						'orderby'             => 'rand',
						'post__not_in'        => $post__not_in,
						'tax_query'           => array(
							array(
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => array( 'post-format-video' ),
							),
						),
					) );
				} else {
					$get_featured_posts = new WP_Query( array(
						'posts_per_page'      => $number,
						'post_type'           => 'post',
						'category__in'        => $category,
						'ignore_sticky_posts' => true,
						'no_found_rows'       => true,
						'orderby'             => 'rand',
						'post__not_in'        => $post__not_in,
						'tax_query'           => array(
							array(
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => array( 'post-format-video' ),
							),
						),
					) );
				}
			}
		}

		colormag_append_excluded_duplicate_posts( $get_featured_posts );

		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() || ( function_exists( 'colormag_elementor_active_page_check' ) && colormag_elementor_active_page_check() ) ) {
			wp_enqueue_script( 'jquery-video' );
		}

		echo $before_widget;
		?>
		<?php
		if ( $category != '-1' ) {
			$border_color = 'style="border-bottom-color:' . colormag_category_color( $category ) . ';"';
			$title_color  = 'style="background-color: #0000;"';
		} else {
			$border_color = '';
			$title_color  = '';
		}

		// For WPML plugin compatibility
		if ( function_exists( 'icl_t' ) ) {
			$text = icl_t( 'ColorMag Pro', 'TG: Featured Videos Playlist Description' . $this->id, $text );
		}

		// Assign the view all link to be displayed in the widget title
		$category_link = '';
		if ( $view_all_button == 'true' && ( ! empty( $category ) && $type != 'latest' ) ) {
			$category_link = '<a href="' . esc_url( get_category_link( $category ) ) . '" class="view-all-link">' . get_theme_mod( 'colormag_view_all_text', esc_html__( 'View All', 'colormag' ) ) . '</a>';
		}

		if ( ! empty( $title ) ) {
			echo '<h3 class="widget-title" ' . $border_color . '><span ' . $title_color . '>' . esc_html( $title ) . '</span>' . $category_link . '</h3>';
		}

		if ( ! empty( $text ) ) {
			?> <p> <?php echo esc_textarea( $text ); ?> </p> <?php
		}
		?>
		<div class="video-player video-player--<?php echo esc_attr( $layout ); ?>">
			<?php
			$video_count     = 1;
			$player_output   = '';
			$playlist_output = '';
			while ( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();

				$video_url  = get_post_meta( get_the_ID(), 'video_url', true );
				$embed_data = colormag_get_embed_data( $video_url );

				if ( ! empty( $embed_data ) ) {

					if ( $video_count == 1 ) {
						$player_output .= '<div class="video-frame video-playing">';
						$player_output .= '<iframe class="player-frame" id="video-item-' . $video_count . '" src="' . esc_url( $embed_data['url'] ) . '" frameborder="0" width="100%"" height="434" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
						$player_output .= '</div><!-- .video-player-wrapper -->';
					}

					$playlist_output .= '<div class="video-playlist-item" data-id="video-item-' . $video_count . '" data-src="' . esc_url( $embed_data['url'] ) . '">';
					$playlist_output .= '<img src="' . esc_url( $embed_data['thumb'] ) . '" />';
					$playlist_output .= '<div class="video-playlist-info">';
					$playlist_output .= '<h2 class="video-playlist-title">' . esc_html( get_the_title() ) . '</h2>';
					$playlist_output .= '<span class="video-duration">Time: 1:04</span>';
					$playlist_output .= '</div>';
					$playlist_output .= '</div>';
				}
				$video_count ++;
			endwhile;
			wp_reset_postdata();

			if ( ! empty( $player_output ) ) {
				echo $player_output;
			}
			if ( ! empty( $playlist_output ) ) {
				?>
				<div class="video-playlist">
					<?php echo $playlist_output; ?>
				</div>
			<?php } ?>
		</div>
		<?php
		echo $after_widget;
	}

}

/**
 * Add the ColorMag Google Maps widget
 */
class colormag_google_maps_widget_child extends WP_Widget {

	/**
	 * Constructor to register Google Maps widget
	 */
	function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_google_maps widget_colormag_google_maps',
			'description'                 => esc_html__( 'Display the Google Maps for your site.', 'colormag' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 200, 'height' => 250 );
		parent::__construct( false, $name = esc_html__( 'Child Theme - TG: Google Maps', 'colormag' ), $widget_ops );
	}

	/**
	 * Back-end widget form.
	 *
	 * @param array $instance Previously saved values from database.
	 */
	function form( $instance ) {
		$tg_defaults['title']     = '';
		$tg_defaults['text']      = '';
		$tg_defaults['longitude'] = '';
		$tg_defaults['latitude']  = '';
		$tg_defaults['height']    = 350;
		$tg_defaults['zoom_size'] = 15;

		$instance = wp_parse_args( ( array ) $instance, $tg_defaults );

		$title     = esc_attr( $instance['title'] );
		$text      = esc_textarea( $instance['text'] );
		$longitude = esc_attr( $instance['longitude'] );
		$latitude  = esc_attr( $instance['latitude'] );
		$height    = absint( $instance['height'] );
		$zoom_size = absint( $instance['zoom_size'] );
		?>

		<p>
			<?php
			$API_KEY          = get_theme_mod( 'colormag_googlemap_api_key' );

			if ( empty( $API_KEY ) ) :
				$query['autofocus[section]'] = 'colormag_googlemap_section';
				$section_link = add_query_arg( $query, admin_url( 'customize.php' ) );
				?>

				<span class="googlemaps-api-error">
					<?php
					$url  = esc_url( 'https://developers.google.com/maps/documentation/javascript/get-api-key' );
					$link = sprintf( __( 'GoogleMap requires <a href="%s" target="_blank">API Key</a> to work', 'colormag' ), esc_url( $url ) );
					echo $link;
					?><br />
					<a href="<?php echo esc_url( $section_link ); ?>"><?php esc_html_e( 'Enter API Key here', 'colormag' ); ?></a><br /><br />
				</span>

			<?php
			endif;
			?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<?php esc_html_e( 'Description', 'colormag' ); ?>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo $text; ?></textarea>

		<p>
			<label for="<?php echo $this->get_field_id( 'longitude' ); ?>"><?php esc_html_e( 'Longitude:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'longitude' ); ?>" name="<?php echo $this->get_field_name( 'longitude' ); ?>" type="text" value="<?php echo $longitude; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'latitude' ); ?>"><?php esc_html_e( 'Latitude:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'latitude' ); ?>" name="<?php echo $this->get_field_name( 'latitude' ); ?>" type="text" value="<?php echo $latitude; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php esc_html_e( 'Google Maps height in px:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo $height; ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'zoom_size' ); ?>"><?php esc_html_e( 'Google Maps Zoom Size:', 'colormag' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'zoom_size' ); ?>" name="<?php echo $this->get_field_name( 'zoom_size' ); ?>" type="text" value="<?php echo $zoom_size; ?>" size="3" />
		</p>

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 */
	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['text'] = $new_instance['text'];
		} else {
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['text'] ) ) );
		}
		$instance['longitude'] = strip_tags( $new_instance['longitude'] );
		$instance['latitude']  = strip_tags( $new_instance['latitude'] );
		$instance['height']    = absint( $new_instance['height'] );
		$instance['zoom_size'] = absint( $new_instance['zoom_size'] );

		return $instance;
	}

	/**
	 * Front-end display of widget.
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		$title     = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
		$text      = isset( $instance['text'] ) ? $instance['text'] : '';
		$longitude = isset( $instance['longitude'] ) ? $instance['longitude'] : '';
		$latitude  = isset( $instance['latitude'] ) ? $instance['latitude'] : '';
		$height    = isset( $instance['height'] ) ? $instance['height'] : 350;
		$zoom_size = isset( $instance['zoom_size'] ) ? $instance['zoom_size'] : 15;

		echo $before_widget;

		/**
		 * Localize the Google Maps Longitude and Latitude if both of them is present
		 */
		if ( ! empty( $longitude ) && ! empty( $latitude ) ) {
			wp_localize_script( 'colormag-custom', 'colormag_google_maps_widget_settings', array(
				'longitude' => esc_attr( $longitude ),
				'latitude'  => esc_attr( $latitude ),
				'height'    => absint( $height ),
				'zoom_size' => absint( $zoom_size ),
			) );
		}
		?>

		<?php
		// For WPML plugin compatibility register the string
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'ColorMag Pro', 'TG: Google Maps Description' . $this->id, $text );
		}

		// For WPML plugin compatibility use the assigned registered string
		if ( function_exists( 'icl_t' ) ) {
			$text = icl_t( 'ColorMag Pro', 'TG: Google Maps Description' . $this->id, $text );
		}

		// Display the title
		if ( ! empty( $title ) ) {
			?>
			<p><?php echo $before_title . esc_html( $title ) . $after_title; ?></p>
			<?php
		}

		// Display the description text
		if ( ! empty( $text ) ) {
			?>
			<p><?php echo esc_html( $text ); ?></p>
		<?php }
		?>

		<?php if ( current_user_can( 'edit_theme_options' ) ) { ?>
			<?php
			$googlemap_api_key = get_theme_mod( 'colormag_googlemap_api_key' );
			if ( empty( $googlemap_api_key ) ) {
				?>
				<div class="google-maps-api-error">
					<?php esc_html_e( 'GoogleMaps requires API Key to work.', 'colormag' ); ?>
					<a href="<?php echo esc_url( 'https://developers.google.com/maps/documentation/javascript/get-api-key' ); ?>" target="_blank"><?php esc_html_e( 'Get API Key', 'colormag' ); ?></a>
				</div>
			<?php } ?>

			<?php if ( empty( $longitude ) || empty( $latitude ) ) { ?>
				<div class="google-maps-lon-lat-error">
					<?php esc_html_e( 'You need to add longitude and latitude value to display the Google Maps. You can set it up via the widget setting.', 'colormag' ); ?>
				</div>
			<?php } ?>
		<?php } ?>

		<div class="GoogleMaps-wrapper">
			<div id="GoogleMaps"></div>
		</div>

		<?php
		echo $after_widget;
	}

}

/* 
    =============================================================================
    CUSTOM META BOX TO CHOOSE IMAGE SIZE FOR CHILD THEME
    =============================================================================
*/

function choose_image_size_meta_box($param) {
    add_meta_box('choose_image_size', 'Image Size', 'choose_image_size_callback', 'post', 'side');
}

add_action( 'add_meta_boxes', 'choose_image_size_meta_box' );

function choose_image_size_callback($post){
    wp_nonce_field('save_image_size_data', 'image_size_meta_box_nonce');
    
    $value = get_post_meta($post->ID, '_image_size_value_key', true);
    ?>
        <input type="radio" name="image_size_radio_button" value="" <?php checked( $value, '' ); ?> >Default<br>
        <input type="radio" name="image_size_radio_button" value="Thumbnail" <?php checked( $value, 'Thumbnail' ); ?> >Thumbnail<br>
        <input type="radio" name="image_size_radio_button" value="Medium" <?php checked( $value, 'Medium' ); ?> >Medium<br>
        <input type="radio" name="image_size_radio_button" value="Full" <?php checked( $value, 'Full' ); ?> >Full<br>
<?php }

function save_image_size_meta_box_data( $post_id ) {

        if ( !isset( $_POST['image_size_meta_box_nonce'] ) ) {
                return;
        }

        if ( !wp_verify_nonce( $_POST['image_size_meta_box_nonce'], 'save_image_size_data' ) ) {
                return;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                return;
        }

        if ( !current_user_can( 'edit_post', $post_id ) ) {
                return;
        }

        $new_meta_value = ( isset( $_POST['image_size_radio_button'] ) ? sanitize_html_class( $_POST['image_size_radio_button'] ) : '' );

        update_post_meta( $post_id, '_image_size_value_key', $new_meta_value );

}

add_action( 'save_post', 'save_image_size_meta_box_data' );

function choose_image_size() {
    
    global $post;
    $value = get_post_meta($post->ID, '_image_size_value_key', true);
    
    if ($value == 'Thumbnail'){
        echo the_post_thumbnail( 'thumbnail' );
    }else if ($value == 'Medium'){
        echo the_post_thumbnail( 'medium' );
    }else if ($value == 'Full'){
        echo the_post_thumbnail( 'full' );
    }
    else {
        echo the_post_thumbnail( 'medium_large' );
    }
    
}

function colormag_entry_meta() {
    if ('post' == get_post_type()) :
        echo '<div class="below-entry-meta">';
        ?>

        <?php
        $time_string = '<time class="entry-date published" datetime="%1$s"' . colormag_schema_markup('entry_time') . '>%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string .= '<time class="updated" datetime="%3$s"' . colormag_schema_markup('entry_time_modified') . '>%4$s</time>';
        }
        $time_string = sprintf($time_string, esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_attr(get_the_modified_date('c')), esc_html(get_the_modified_date())
        );
        printf(__('<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'colormag'), esc_url(get_permalink()), esc_attr(get_the_time()), $time_string
        );
        ?>

                        <span class="byline"<?php echo colormag_schema_markup('author'); ?>><span class="author vcard" itemprop="name"><i class="fa fa-user"></i><a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo get_the_author(); ?>"><?php echo esc_html(get_the_author()); ?></a></span></span>

        <?php
        /* if (get_theme_mod('colormag_post_view_entry_meta_remove', 0) == 0) {
            echo colormag_post_view_display(get_the_ID());
        } */
        ?>

        <?php if (!post_password_required() && comments_open()) { ?>
                            <span class="comments"><?php comments_popup_link(__('<i class="fa fa-comment"></i> 0 Comments', 'colormag'), __('<i class="fa fa-comment"></i> 1 Comment', 'colormag'), __('<i class="fa fa-comments"></i> % Comments', 'colormag')); ?></span>
            <?php
        }
        $tags_list = get_the_tag_list('<span class="tag-links"' . colormag_schema_markup('tag') . '><i class="fa fa-tags"></i>', __(', ', 'colormag'), '</span>');
        if ($tags_list) {
            echo $tags_list;
        }

        // Display the post reading time.
        if (get_theme_mod('colormag_reading_time_setting', 0) == 1) {
            ?>
                                    <span class="reading-time">
                                            <span class="eta"></span> <?php esc_html_e('min read', 'colormag'); ?>
                                    </span>
        <?php
        }

        // edit button remove option add
        if (get_theme_mod('colormag_edit_button_entry_meta_remove', 0) == 0) {
            edit_post_link(__('Edit', 'colormag'), '<span class="edit-link"><i class="fa fa-edit"></i>', '</span>');
        }

        echo '</div>';
    endif;
}
?>
