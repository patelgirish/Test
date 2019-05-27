<?php get_header(); ?>		
	<?php 
	if ( have_posts() ) :
		// Start the Loop.
		while ( have_posts() ) : the_post(); 
					
			
			$post_id = get_the_ID();
?>
<div class="widget content-scroll no-title">
	<div class="blog-posts">
		<?php 
			
			$p = new MagOne_Article_Item(array(
				'show_date' => 'full',
				'show_author' => 'avatar',
				'show_comment' => true
			));
					
			
			
			$author_id = get_the_author_meta('ID');
			$author_name = get_the_author_meta( 'display_name' );
			$author_avatar_16 = get_avatar($author_id, 16, '', sprintf(esc_attr__("%s 's Author avatar", 'magone-lite'), $author_name));
			$author_avatar_50 = get_avatar($author_id, 50, '', sprintf(esc_attr__("%s 's Author avatar", 'magone-lite'), $author_name), array(
				'class'  => 'author-profile-avatar cir',				
			));
			$author_link = get_author_posts_url($author_id);
			?>
			<div class="post-outer">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="post-header">
						<a name="<?php echo $p->id; ?>" class="post-id" data-id="<?php echo $p->id; ?>"></a>
						
						<?php
						include get_theme_file_path('/includes/includables/includables-singular-feature-images.php');						
						?>
								

						<?php if ($p->title): ?>							
							<h1 class="post-title entry-title">
								<?php echo balanceTags($p->title, true); ?>
							</h1>
						<?php endif; /*$p->title*/?>
						
						
						


					</div><!-- end post-header -->
					
					<div class="post-body entry-content content-template wide-right" id="post-body-<?php the_ID(); ?>">												
						<div class="post-body-inner">
							<?php the_content(); ?>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
						
						<?php wp_link_pages( array( 
							'before' => '<div class="post-page-buttons"><h4 class="post-section-title">'.esc_html__('PAGES', 'magone-lite').'</h4>', 
							'after' => '<div class="clear"></div></div>',
							'link_before' => '<span>',
							'link_after' => '</span>'
						) ); ?>
							
						<!-- clear for photos floats -->
						<div class="clear"></div>
						
						
						<?php						
						do_action('magone_lite_display_rating_hook');
					
					?></div><!-- end post-body -->
					<?php 
										
					/* we wil display sidebar under-post-content for post only*/
					?>
					
					<div class="clear"></div>					
				</div><!-- end post-hentry -->
								
				
				<?php comments_template(); ?>
			</div>
	</div>
</div>			
		<?php 
		endwhile;
		
	endif;
		?>
<?php get_footer(); ?>