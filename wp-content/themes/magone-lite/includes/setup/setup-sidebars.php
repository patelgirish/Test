<?php
function magone_lite_widgets_init() {
	register_sidebar(array(
		'name' => esc_html__( 'Main Sidebar', 'magone-lite' ),
		'id' => 'sidebar',
		'description' => esc_html__( 'The section on right side. Usually use to add common widgets', 'magone-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
		'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">',		
	));	
	register_sidebar(array(
		'name' => esc_html__( 'Header Wide', 'magone-lite' ),
		'id' => 'header-wide',
		'description'   => esc_html__('The section under the main menu. Usually use to add wide ads.', 'magone-lite'),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
		'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">',		
	));	
	
	/* footer */
	register_sidebar(array(
		'name' => esc_html__( 'Footer Column 1', 'magone-lite' ),
		'id' => 'footer-col-1-section',
		'description'   => esc_html__('The first column of footer', 'magone-lite'),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
		'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">',		
	));	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Column 2', 'magone-lite' ),
		'id' => 'footer-col-2-section',
		'description'   => esc_html__('The second column of footer', 'magone-lite'),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
		'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">',		
	));	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Column 3', 'magone-lite' ),
		'id' => 'footer-col-3-section',
		'description'   => esc_html__('The third column of footer', 'magone-lite'),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="alt-widget-content">',
		'after_widget'  => '<div class="clear"></div></div></div>',
		'before_title'  => '</div><h2 class="widget-title"><span class="widget-title-content">',
		'after_title'   => '</span></h2><div class="clear"></div><div class="widget-content">',		
	));	
}
add_action( 'widgets_init', 'magone_lite_widgets_init');	