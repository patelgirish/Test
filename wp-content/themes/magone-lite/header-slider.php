<?php 
$slider_tax_mod = sanitize_text_field(get_theme_mod('slider_category_tag'));

if ($slider_tax_mod) :
	
	/* query posts from slider */
	$args =  array(
		'show_readmore' => false,
		'number_cates' => 1,
		'main_color' => esc_attr(get_theme_mod('main_color', '#FF3D00')),
	); 

	$slider_tax_id = '';
	$slider_tax_type = 'tag';
	if ('recent' != strtolower($slider_tax_mod)) :
		/* find slider id */
		$slider_tax_mod = explode(',', $slider_tax_mod);
		$slider_tax_mod = trim($slider_tax_mod[0]);	
		$slider_tax = null;		
		
		/* priority get from tag first */
		if (is_numeric($slider_tax_mod)) {		
			$slider_tax = get_tag((int) $slider_tax_mod);
		} else {
			$slider_tax = get_term_by('slug', $slider_tax_mod, 'post_tag');
		}
		
		
		/* then getting from category */
		if (is_wp_error($slider_tax) || !$slider_tax) {
			$slider_tax_type = 'cat';
			if (is_numeric($slider_tax_mod)) {		
				$slider_tax = get_category((int) $slider_tax_mod);
			} else {
				$slider_tax = get_category_by_slug(esc_attr($slider_tax_mod));
			}
		}
		
		if (!is_wp_error($slider_tax)) :
			$slider_tax_id = $slider_tax->term_id;
		endif;		
		
		if ($slider_tax_id) {
			if ('tag' == $slider_tax_type) {
				$args['tags'] = array($slider_tax_id);
			} else {
				$args['cates'] = array($slider_tax_id);
			}
		}

	endif;	
	
	
	echo magone_lite_article_box('slider', $args);
endif;
