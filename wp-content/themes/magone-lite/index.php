<?php get_header(); ?>
<div class="index-content widget archive-page-content">
<?php 
	global $wp_query;
	$archive_page_title = get_the_archive_title();				
	
	if (is_home()) {
		$archive_page_title = esc_html__('Latest Posts', 'magone-lite');
	}
	
	
	if ($archive_page_title) : ?>
	<div class="archive-page-header feed-widget-header">
		<h1 class="archive-page-title widget-title feed-widget-title"><?php echo $archive_page_title; ?></h1>
		<div class="clear"></div>
	</div>	
	<div class="clear"></div>
	<?php endif; 
	
	
	if (isset($wp_query->queried_object) && !empty($wp_query->queried_object->description)) {
		echo '<p class="archive-page-description">';
		if (is_author()) {
			echo get_avatar(get_the_author_meta('ID'), 48, null, null, array(
				'class' => 'author-page-avatar'
			));
		}
		echo $wp_query->queried_object->description.'</p>';
	}
	?>
	<div class="clear"></div>
	<?php

	$design = 'blogging';
	$instance['show_comment'] = true;
	$instance['show_readmore'] = true;
	$instance['show_author'] = 'icon';
	$instance['show_date'] = 'full';
	$instance['meta_item_order'] = 'a_c_d';
	$instance['number_cates'] = 1;
	$instance['snippet_length'] = 150;
	$instance['thumbnail_height'] = 185;	
	$instance['show_format_icon'] = false;	
	$instance['main_color'] = esc_attr(get_theme_mod('main_color', '#FF3D00'));
	$instance['thumb_bg_color'] = '#333';
	$instance['rainbow_thumb_bg'] = '';
	
	echo magone_lite_article_box($design, $instance, '', 'magone-archive-blog-rolls');		
	
	the_posts_pagination(array(
		'screen_reader_text' => ' '
	));
	
	?>
</div>	
<?php get_footer(); ?>