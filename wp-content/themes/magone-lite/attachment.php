<?php get_header(); ?>
	<div class="widget content-scroll no-title">
		<div class="blog-posts hfeed">
		<?php if ( have_posts() ) :
		// Start the Loop.
		while ( have_posts() ) : the_post(); 
			$p = new MagOne_Article_Item(array(
				'show_date' => 'full',
				'show_author' => 'icon',
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
				<div class="post hentry">
					<div class="post-header">
						<a name="<?php echo $p->id; ?>" class="post-id" data-id="<?php echo $p->id; ?>"></a>
						
						
					
						<?php if ($p->title): ?>
						<h1 class="post-title entry-title"><?php echo $p->title; ?></h1>						
						<?php endif; ?>
						
						
						

						<!-- meta data for post -->
						<?php if ($p->args['show_meta']): ?>
							<div class="post-meta-wrapper">
								
								<?php if ($p->args['show_comment']): ?>				
									<a class="post-meta post-meta-comments" href="#comments">
										<i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?>										
									</a>
								<?php endif; ?>
																
								<?php if ($p->args['show_author']): ?>
								<a class="author post-meta post-meta-author vcard" href="<?php echo esc_url($author_link); ?>" rel="author" title="<?php echo esc_attr($author_name); ?>">
									<?php if ($p->args['show_author'] == 'icon') {
										echo '<i class="fa fa-pencil-square-o"></i>';
									} else if ($p->args['show_author'] == 'avatar') {
										echo $author_avatar_16;
									}
									?>
										<span class="fn"><?php echo $author_name; ?></span>
								</a>
								<?php endif; ?>

								<?php if ($p->args['show_date']): ?>
									<a class="entry-date published post-meta post-meta-date timestamp-link" href="<?php echo esc_url($p->link); ?>" rel="bookmark" title="permanent link">
										<i class="fa fa-clock-o"></i>
										<abbr class="updated">
											<span class="value">
												<?php											
												echo get_the_date(get_option('date_format'));
												?>
											</span>
										</abbr>
									</a>
								<?php endif; ?>
								
							</div>
						<?php endif; ?>
						
						


					</div><!-- end post-header -->
					
					<div class="post-body entry-content content-template" id="post-body-<?php the_ID(); ?>">											
						<div class="post-body-inner">
							<?php if ( wp_attachment_is_image( get_the_ID() ) ) : 
								$att_image = wp_get_attachment_image_src( get_the_ID(), "full"); 
							?>

								<p class="attachment">
									<a href="<?php echo esc_url(wp_get_attachment_url(get_the_ID())); ?>" title="<?php echo esc_attr(get_the_title()); ?>" rel="attachment">
										<img src="<?php echo esc_url($att_image[0]);?>" width="<?php echo esc_attr($att_image[1]);?>" height="<?php echo esc_attr($att_image[2]);?>"  class="attachment-medium" alt="<?php echo esc_attr(get_the_title()); ?>" />
									</a>
								</p>
								<?php 
								if (get_the_excerpt()) {
									echo '<p class="media-caption">'.  get_the_excerpt().'</p>';
								}
								?>

							<?php else : ?>
								<a href="<?php echo esc_url(wp_get_attachment_url(get_the_ID())); ?>" title="<?php echo esc_attr(get_the_title()); ?>" rel="attachment">
									<?php echo basename(get_the_guid()) ?>
								</a>
							<?php endif; ?>
							

							<div class="clear"></div>

							
							<?php the_content(); ?>
						</div>
						<div class="clear"></div>
						
						<?php wp_link_pages( array( 
							'before' => '<div class="post-page-buttons"><h4 class="post-section-title">'.  esc_html__('PAGES', 'magone-lite').'</h4>', 
							'after' => '<div class="clear"></div></div>',
							'link_before' => '<span>',
							'link_after' => '</span>'
						) ); ?>
							
						<!-- clear for photos floats -->
						<div class="clear"></div>
					</div><!-- end post-body -->
					
					<?php 
					/* we will display: under-post-content siebar here in updates */
					?>					

					<div class="post-footer">						
						<?php if ($p->args['show_author']) : ?>									
						
							<div class="post-section post-author-box">
								<h4 class="post-section-title">
									<i class="fa fa-pencil-square"></i> <?php esc_html_e('AUTHOR', 'magone-lite'); ?>:
									<a href="<?php echo esc_url($author_link); ?>" rel="author" title="author profile">
										<span><?php echo $author_name; ?></span>
									</a>
								</h4>
								<div class="clear"></div>
								<div class="post-author-box-content">
									<div class="author-profile has-avatar">
										<?php echo $author_avatar_50; ?>										
										<div class="author-profile-description">												
											<span>
												<?php echo get_the_author_meta('description',$author_id); ?>
											</span>
											<div class="clear"></div>
											<?php 
											global $magone_lite_social_icon_list;
											$user_social_icon_links = $magone_lite_social_icon_list;
											foreach ($magone_lite_social_icon_list as $key => $name) {
												$value = get_user_meta($author_id, $key, true);
												if ($value) {
													$user_social_icon_links[$key] = $value;
												}
												else {
													unset($user_social_icon_links[$key]);
												}
											}

											if (count($user_social_icon_links)) {										
												echo '<div class="author-social-icon-links">';
												foreach ($user_social_icon_links as $key => $value) {
													echo '<a class="author-social-links" href="'.esc_url($value).'" target="_blank" ref="nofollow"><i class="'.esc_attr('fa fa-'.$key).'"></i></a>';
												}										
												echo '<div class="clear"></div></div>';
											}
											?>
										</div>
									</div>
									
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						<?php endif; ?>						

					</div><!-- end post-footer -->
										
					
				</div><!-- end post-hentry -->
				
				<?php
				magone_lite_pagenav_attachment();
				
				/* we will display before-post-comment sidebar here in next updates */				
				comments_template(); ?>
			</div>
			
		<?php endwhile;
		
		endif;
		?>
		</div>
	</div>
<?php get_footer(); ?>