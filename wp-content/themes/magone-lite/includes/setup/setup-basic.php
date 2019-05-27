<?php

if ( ! isset( $content_width ) ) {
	$content_width = 9999;
}

add_action( 'after_setup_theme', 'magone_lite_theme_basic_setup' );
function magone_lite_theme_basic_setup() {	
	add_theme_support( 'custom-logo', array(
		'width'       => 9999,
		'height'      => 30,
		'flex-width'  => true,
	) );
	
	add_theme_support( 'custom-background', array(
		'default-color' => '#efefef'
	) );
	
	// http://codex.wordpress.org/Function_Reference/load_theme_textdomain
	load_theme_textdomain( 'magone-lite', get_template_directory() . '/languages' );

	// http://codex.wordpress.org/Function_Reference/add_editor_style
	add_editor_style( 'assets/css/editor-style.css' );
	
//	add_theme_support( 'woocommerce' );
	
	// http://codex.wordpress.org/Function_Reference/add_theme_support
	// http://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', array(/*'aside','gallery', 'link',*/ 'image', /*'quote', 'status',*/ 'video', 'audio',/* 'chat'*/));
	
	add_theme_support( 'title-tag' );
	
	// http://codex.wordpress.org/Post_Thumbnails
	// http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
	// http://codex.wordpress.org/Function_Reference/add_image_size
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 9999 );	
		
	
	add_image_size( 'magone_lite_large', 650, 9999 ); 
	add_image_size( 'magone_lite_medium', 400, 9999 );
	add_image_size( 'magone_lite_thumbnail', 250, 9999 );
	
	add_theme_support( 'automatic-feed-links' );
	
	/* only for advance developers in case they want to use child theme */
	if ( MAGONE_USE_CUSTOM_HEADER ) {
		add_theme_support( 'custom-header', array(
			'default-image'          => '',
			'width'                  => 0,
			'height'                 => 0,
			'flex-height'            => false,
			'flex-width'             => false,
			'uploads'                => true,
			'random-default'         => false,
			'header-text'            => true,
			'default-text-color'     => '',
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		) );
	}
	
	add_theme_support('html5', array('gallery'));
}


add_action( 'wp_enqueue_scripts', 'magone_lite_enqueue_scripts_styles' );
function magone_lite_enqueue_scripts_styles() {
	
		
	// font-awesome if framework is not available
	wp_enqueue_style('font-awesome', get_theme_file_uri('/assets/fonts/font-awesome/css/font-awesome.min.css'), array(), MAGONE_THEME_VERSION);
	
	// enqueue style
	wp_enqueue_style( 'magone-style', get_stylesheet_uri(), array(), MAGONE_THEME_VERSION );
	
	// static style for woocommerce
	
	$main_color = esc_attr(get_theme_mod( 'main_color', '#FF3D00' ));
	$wrap_bg = esc_attr(get_theme_mod( 'wrapper_background_color', '#efefef' ));
	wp_add_inline_style('magone-style', 'a,a:hover,.color {color: '.$main_color.';}.border {border-color: '.$main_color.';}.bg {background-color: '.$main_color.';}.main-menu {border-top: 1px solid '.$main_color.';}.main-menu ul.sub-menu li:hover > a {border-left: 2px solid '.$main_color.';}.main-menu .menu-item-mega > .menu-item-inner > .sub-menu {border-top: 2px solid '.$main_color.';}.main-menu .menu-item-mega > .menu-item-inner > .sub-menu > li li:hover a {border-left: 1px solid '.$main_color.';}.main-menu ul.sub-menu li:hover > a, .main-menu .menu-item-mega > .menu-item-inner > .sub-menu, .main-menu .menu-item-mega > .menu-item-inner > .sub-menu > li li:hover a {border-color: '.$main_color.'!important;}.header-social-icons ul li a:hover {color: '.$main_color.';}.owl-dot.active,.main-sidebar .widget.follow-by-email .follow-by-email-submit {background: '.$main_color.';}#footer .widget.social_icons li a:hover {color: '.$main_color.';}#footer .follow-by-email .follow-by-email-submit, #mc_embed_signup .button, .wpcf7-form-control[type="submit"], .main-sidebar .widget form input[type="submit"] {background: '.$main_color.'!important;}.feed.widget .feed-widget-header, .sneeit-percent-fill, .sneeit-percent-mask {border-color: '.$main_color.';}.feed.widget.box-title h2.widget-title {background: '.$main_color.';}.social_counter {color: '.$main_color.'}.social_counter .button {background: '.$main_color.'}.m1-wrapper{background:'.$wrap_bg.'}');

	if (is_rtl()) {
		wp_enqueue_style( 'magone-rtl', get_theme_file_uri('/assets/css/rtl.css'), array(), MAGONE_THEME_VERSION );
	}
	
	
	wp_enqueue_style( 'magone-responsive', get_theme_file_uri('/assets/css/responsive.css'), array(), MAGONE_THEME_VERSION );
	if (is_rtl()) {
		wp_enqueue_style( 'magone-rtl-responisve', get_theme_file_uri('/assets/css/rtl-responsive.css'), array(), MAGONE_THEME_VERSION );
	}
	
	
	wp_enqueue_style( 'magone-print', get_theme_file_uri('/assets/css/print.css'), array(), MAGONE_THEME_VERSION, 'print' );
		
	wp_enqueue_style( 'magone-ie-8', get_theme_file_uri('/assets/css/ie-8.css.css'), array(), MAGONE_THEME_VERSION );
	wp_style_add_data( 'magone-ie-8', 'conditional', 'lt IE 8' );
	wp_enqueue_style( 'magone-ie-9', get_theme_file_uri('/assets/css/ie-9.css.css'), array(), MAGONE_THEME_VERSION );
	wp_style_add_data( 'magone-ie-9', 'conditional', 'lt IE 9' );
	
	
	// inline style		
	wp_enqueue_script('jquery-owl', get_theme_file_uri('/assets/js/owl.js') , array('jquery', 'jquery-ui-tabs', 'jquery-ui-accordion'), MAGONE_THEME_VERSION, true);
	wp_enqueue_script('magone-lite-lib', get_theme_file_uri('/assets/js/lib.js'), array('jquery', 'jquery-ui-tabs', 'jquery-ui-accordion'), MAGONE_THEME_VERSION, true);
	wp_enqueue_script('magone-lite-main', get_theme_file_uri('/assets/js/main.js'), array('jquery', 'jquery-ui-tabs', 'jquery-ui-accordion', 'jquery-owl', 'magone-lite-lib'), MAGONE_THEME_VERSION, true);		
	add_thickbox();
	if ( is_singular() ) {		
		wp_enqueue_script( "comment-reply" );
	}
	
	wp_localize_script( 'magone-lite-lib', 'magone_lite', array(
		'text' => array(
			'No Found Any Posts' => esc_html__('Not Found Any Posts', 'magone-lite'),
			'Tab' => esc_html__('Tab', 'magone-lite'),
			'Copy All Code'  => esc_html__('Copy All Code', 'magone-lite'), 
			'Select All Code' => esc_html__('Select All Code', 'magone-lite'), 
			'All codes were copied to your clipboard' => esc_html__('All codes were copied to your clipboard', 'magone-lite'), 
			'Can not copy the codes / texts, please press [CTRL]+[C] (or CMD+C with Mac) to copy' => esc_html__('Can not copy the codes / texts, please press [CTRL]+[C] (or CMD+C with Mac) to copy', 'magone-lite'),
			'widget_pagination_post_count' => wp_kses(__('<span class="value">%1$s</span> / %2$s POSTS', 'magone-lite'), array('span'=>array('class'=>array()))), 
			'LOAD MORE' => esc_html__('LOAD MORE', 'magone-lite'),
			'OLDER' => esc_html__('OLDER', 'magone-lite'),
			'NEWER' => esc_html__('NEWER', 'magone-lite'),
			'Hover and click above bar to rate' => esc_html__('Hover and click above bar to rate', 'magone-lite'),
			'Hover and click above stars to rate' => esc_html__('Hover and click above stars to rate', 'magone-lite'),
			'You rated %s' => esc_html__('You rated %s', 'magone-lite'),			
			'You will rate %s' => esc_html__('You will rate %s', 'magone-lite'),
			'Submitting ...' => esc_html__('Submitting ...', 'magone-lite'),
			'Your browser not support user rating' => esc_html__('Your browser not support user rating', 'magone-lite'),
			'Server not response your rating' => esc_html__('Server not response your rating', 'magone-lite'),
			'Server not accept your rating' => esc_html__('Server not accept your rating', 'magone-lite'),
		),
		'ajax_url' => admin_url('admin-ajax.php'),
		'is_rtl' => is_rtl(),
		
		'disable_wordpress_comment_media' => false,
		'sticky_menu' => true,
		'locale' => get_locale(),
	));	
}

add_filter('body_class', 'magone_lite_setup_basic_body_class', 10, 1);
function magone_lite_setup_basic_body_class($classes){
	
	// add solid class if wrapper background == box background (white)
	$wrapper_background_color = esc_attr(get_theme_mod( 'wrapper_background_color' ));
	if ($wrapper_background_color) {
		$wrapper_background_color = strtolower($wrapper_background_color);
		if ($wrapper_background_color == '#ffffff' ||
			$wrapper_background_color == '#fff' ||
			$wrapper_background_color == 'white') {
			$classes[] = esc_attr('solid-wrapper');
		}
	}
	
	$main_menu_background_color = esc_attr( get_theme_mod('main_menu_background_color') );
	if ($main_menu_background_color) {
		$main_menu_background_color = strtolower($main_menu_background_color);
		if ($main_menu_background_color == '#ffffff' ||
			$main_menu_background_color == '#fff' ||
			$main_menu_background_color == 'white') {
			$classes[] = esc_attr('solid-menu');
		}
	}	
	
	return $classes;
}

add_filter( 'post_class', 'magone_lite_post_classes', 10, 3 );
function magone_lite_post_classes( $classes, $class, $post_id ) {
    if (is_single() || is_page()) {
        $classes[] = 'post';
		$classes[] = 'hentry';		
    }
 
    return $classes;
}


add_action('wp_head', 'magone_lite_wp_head');
function magone_lite_wp_head() {
	$main_color = esc_attr( get_theme_mod( 'main_color', '#FF3D00' ) );
	if ( $main_color ) {
		echo '<meta name="theme-color" content="' . esc_attr($main_color) . '" />';
	}
	
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function magone_lite_pingback_header() {
	if ( is_singular() && pings_open( get_queried_object() ) ) {
		printf( '<link rel="pingback" href="%s">', get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'magone_lite_pingback_header' );