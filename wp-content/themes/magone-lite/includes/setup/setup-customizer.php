<?php
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * 
 * Sanitize callback please follow:
 * https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php
 */
add_action( 'customize_register', 'magone_lite_customize_register' );
function magone_lite_customize_register( $wp_customize ) {
	/**
	 * Theme options.
	 */
	
	$wp_customize->add_section( 'theme_options', array(
		'title'    => __( 'Theme Options', 'magone-lite' ),
		'priority' => 30, // Before Additional CSS.
	) );
	
	/* main color */
	$wp_customize->add_setting( 'main_color', array(
		'default' => '#FF3D00',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'main_color', 
		array(
			'label'      => __( 'Main Color', 'magone-lite' ),
			'description' => __( 'Main color apply across the site', 'magone-lite' ),
			'section'    => 'colors',
			'settings'   => 'main_color',
				'priority'   => 1
		)
	));
	
	/* wrapper background color */
	$wp_customize->add_setting( 'wrapper_background_color', array(
		'default' => '#efefef',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'wrapper_background_color', 
		array(
			'label'      => __( 'Wrapper Background Color', 'magone-lite' ),
			'description' => __( 'Backgroud color of the outer wraps around the content columns', 'magone-lite' ),
			'section'    => 'colors',
			'settings'   => 'wrapper_background_color',
				'priority'   => 1
		)
	));
	
	/* slider category */
	$wp_customize->add_setting( 'slider_category_tag', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'slider_category_tag', 
		array(
			'label'      => __( 'Slider Category', 'magone-lite' ),
			'description' => __( 'Input the category / tag ID or slug to show posts for slider. Theme will priority search in tag first. Input "recent" to show recent posts', 'magone-lite' ),
			'section'    => 'theme_options',
			'settings'   => 'slider_category_tag',
				'priority'   => 1
		)
	));
	
	/* slider thumbnail */
	$wp_customize->add_setting( 'default_slider_thumbnail', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'default_slider_thumbnail', 
		array(
			'label'      => __( 'Default Slider Thumbnail', 'magone-lite' ),
			'description' => __( 'Image SRC which will be used in slider if a post has no image', 'magone-lite' ),
			'section'    => 'theme_options',
			'settings'   => 'default_slider_thumbnail',
			'priority'   => 1
		)
	));
	
	/* post excerpt */
	$wp_customize->add_setting( 'disable_post_excerpt', array(
		'default' => '',
		'sanitize_callback' => 'magone_lite_sanitize_checkbox'
	) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'default_slider_thumbnail', 
		array(
			'label'      => __( 'Disable Post Excerpt', 'magone-lite' ),
			'description' => __( 'Disable post excerpt on top of post', 'magone-lite' ),
			'section'    => 'theme_options',
			'type'        => 'checkbox',
			'settings'   => 'disable_post_excerpt',
			'priority'   => 1
		)
	));
}
