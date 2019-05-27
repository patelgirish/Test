<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">	
	<link rel="profile" href="http://gmpg.org/xfn/11">	
	<?php wp_head();?>
</head>



<body <?php body_class(); ?>>
<div class="m1-wrapper">
	<div class="wide">
		
		<header id="header" class="header-layout-default">
			<?php get_template_part('header-layout-default'); ?>

			<div class="clear"></div>
			<?php get_sidebar('header-wide-sidebar'); ?>
		</header>
		
		<div class="clear"></div>
		<div id='primary'>
			<div id='content'><div class="content-inner">
				<?php 
					if (is_home() || is_front_page()) {
						get_template_part('header-slider'); 
					}
				?>
				<?php get_sidebar('header-before-content-sidebar'); ?>