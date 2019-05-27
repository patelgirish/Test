<?php get_header(); ?>		
	<?php 
	if ( have_posts() ) :
		// Start the Loop.
		while ( have_posts() ) : the_post(); 
		
			$post_id = get_the_ID();			
?>
<div class="widget content-scroll no-title">
	<div class="blog-posts hfeed">
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
												
						<?php
							include get_theme_file_path('/includes/includables/includables-singular-feature-images.php');					
						?>
									

						<?php if ($p->title): ?>
							
						<h1 class="post-title entry-title"><?php echo balanceTags($p->title, true); ?></h1>
						<?php endif; /*$p->title*/?>
						
												

						<!-- meta data for post -->						
							<div class="post-meta-wrapper">
								<?php
								magone_lite_singular_meta_item_author($author_link, $author_name, $author_avatar_16);
								?><a class="post-meta post-meta-comments" href="#comments"><?php
									?><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); 
								?></a><?php
								
								/* POST DATE */
								?><a class="entry-date published post-meta post-meta-date timestamp-link" href="<?php echo esc_url($p->link); ?>" rel="bookmark" title="<?php echo esc_attr(get_the_modified_date('c')); ?>">
		<i class="fa fa-clock-o"></i>
	<abbr class="updated" title="<?php echo esc_attr(get_the_modified_date() .' '. get_the_modified_time()); ?>">
			<span class="value">
				<?php 
				switch ($p->args['show_date']) {
					case 'pretty':
						echo sprintf( esc_html__( '%s ago', 'magone-lite' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );
						break;

					case 'short':
						if (get_option('date_format')) {
							echo get_the_date(str_replace('F', 'M', get_option('date_format')));
						}
						break;

					case 'time':
						echo $p->time;
						break;

					case 'date':
						echo $p->date;
						break;

					default:
						echo $p->date.' '.$p->time;
						break;
				}
				?>
			</span>
		</abbr>
	</a>
<?php
								?>								
							</div>
						
												


					</div><!-- end post-header -->					
					<div class="post-body entry-content content-template wide-right" id="post-body-<?php the_ID(); ?>">						
						
						<?php 
						
						$disable_post_excerpt = get_theme_mod('disable_post_excerpt', false);
						if (!$disable_post_excerpt) :
							$post_excerpt = get_the_excerpt();								
							if ( $post_excerpt ) {
								if ( strpos($post_excerpt, '&hellip;') !== false ) {		
									$post_excerpt = '';
								}
							}

							?>
							<?php if ( $post_excerpt ): ?>
							<div class="post-right">
								<?php if ($post_excerpt): ?>							
									<p class="post-excerpt"><?php echo $post_excerpt;?></p>
								<?php endif; ?>							
							</div>
							<div class="clear"></div>
							<?php endif; ?>
						<?php endif; ?>
							
						
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
						?>
						
					</div><!-- end post-body -->
					
					
					<div class="clear"></div>
									

					<div class="post-footer">
						<?php						
						$display_cate_tag = 'both';
						
						$categories = get_the_category();
						$tags = get_the_tags();							
						if((($display_cate_tag == 'cates' || $display_cate_tag == 'both') && is_array($categories)) || 
						   (($display_cate_tag == 'tags' || $display_cate_tag == 'both') && is_array($tags))) :
							?><div class="post-labels post-section"><?php
							if ((($display_cate_tag == 'cates' || $display_cate_tag == 'both') && is_array($categories))) {
								foreach($categories as $category) {
									?>
									<a class="post-label" href="<?php echo get_category_link( $category->term_id ); ?>" rel="tag">
										<span class="bg label-name"><?php echo $category->cat_name; ?></span>
										<span class="label-count">
											<span class="label-count-arrow"></span>
											<span class="label-count-value"><?php echo $category->count; ?></span>
										</span>
									</a>
									<?php
								}
							}

							if ((($display_cate_tag == 'tags' || $display_cate_tag == 'both') && is_array($tags))) {
								foreach($tags as $tag) {
									?>
									<a class="post-label" href="<?php echo get_tag_link( $tag->term_id ); ?>" rel="tag">
										<span class="bg label-name"><?php echo $tag->name; ?></span>
										<span class="label-count">
											<span class="label-count-arrow"></span>
											<span class="label-count-value"><?php echo $tag->count; ?></span>
										</span>
									</a>
									<?php
								}
							}							
							?>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
							<?php							
						endif;
						
						?>						
												

						<div class="clear"></div>						

					</div><!-- end post-footer -->
					
				</div><!-- end post-hentry -->
				
				<?php
				magone_lite_pagenav_singular();
				comments_template(); 
				?>
			</div>
	</div>
</div>			
		<?php 			
		endwhile;
		
	endif;
		?>
<?php get_footer(); ?>