<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <header>
 *
 * @package magazine-blog
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( 'http://gmpg.org/xfn/11' ); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<?php $header_text_color = get_header_textcolor(); ?>
<header <?php if( has_header_image() ) : ?> style="background:url(<?php echo esc_url( get_header_image() ); ?>)" <?php endif; ?>>
	

	<section class="logo">
		<div class="container">
			<div class="row">
			<!-- Brand and toggle get grouped for better mobile display -->		
			<div class="col-sm-12 text-center">			
				<?php if ( has_custom_logo() ) : the_custom_logo(); else: ?>
      			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h1 class="site-title" style="color:<?php echo "#". $header_text_color;?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
      			<h2 class="site-description" style="color:<?php echo "#". $header_text_color;?>"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></h2><?php endif; ?></a>
			</div>
			</div>
		</div> <!-- /.end of container -->
	</section> <!-- /.end of section -->

	<?php
		// To store only value which has links :
		if ( ! empty( $social_media ) && is_array( $social_media ) ) {
			$social_media_filtered = array();
			foreach ( $social_media as $value ) {
				if( empty( $value['social_media_link'] ) ) {
					continue;
				}
				$social_media_filtered[] = $value; 
			}
		}
	?>

	<?php if ( ! empty( $social_media_filtered ) && is_array( $social_media_filtered ) ) : ?>
		<!-- top-bar -->
		<section class="top-four">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">					
						<div class="social-icons">
					        <ul class="list-inline">
					        	<?php foreach ( $social_media_filtered as $value ) { ?>
					        		<?php
					        			$no_space_class = str_replace( 'fa fa-', '', $value['social_media_class'] );
					        			$class = strtolower( $no_space_class );
					        		?>
						            <li class="<?php echo esc_attr( $class ); ?>"><a href="<?php echo esc_url( $value['social_media_link'] ); ?>" target="_blank"><i class="<?php echo esc_attr( $value['social_media_class'] ); ?>"></i></a></li>
					            <?php } ?>
					    	</ul>
						</div>				
					</div>
				</div>
			</div>
		</section>
		<!-- top-bar -->
	<?php endif; ?>



	<section  class="sec-bg-color main-nav nav-four<?php if( $menu_sticky ) echo ' sticky-header'; ?>">
		<div class="container">
			<nav class="navbar navbar-inverse">
		      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'magazine-blog' ); ?></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
		      	</button>	    
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">  							
					<?php
			            wp_nav_menu( array(
			                'theme_location'    => 'primary',
			                'depth'             => 8,
			                'container'         => 'div',
			                'menu_class'        => 'nav navbar-nav',
			                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			                'walker'            => new Magazine_Newspaper_Wp_Bootstrap_Navwalker()
			            ) );
			        ?>			        
			    </div> <!-- /.end of collaspe navbar-collaspe -->
			</nav>
		</div>

	</section>
</header>

<?php 
if( get_theme_mod( 'breaking_news_display', true ) ) :

	$breaking_news = get_theme_mod( 'breaking_news_category' );
	$args = array(
		'cat' => $breaking_news,
    	'posts_per_page' => 6,
	);
	$query = new WP_Query( $args );
?>
	<?php if( $query->have_posts() ) : ?>
		<!-- ticker -->
		<div class="news-ticker">
			<div class="container">
				<?php $breaking_news_title = get_theme_mod( 'breaking_news_title', 'Breaking News' ); ?>
				<b><?php echo esc_html( $breaking_news_title ); ?></b>
				<div id="example">
				  <ul>
				  	<?php while( $query->have_posts() ) : $query->the_post(); ?>
				    	<li><small class="date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date(); ?></small> <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="break-news"><?php the_title(); ?></a></li>
				    <?php endwhile; wp_reset_postdata(); ?>		    
				  </ul>
				</div>
			</div>
		</div>
		<!-- ticker -->
	<?php endif; ?>
<?php endif;