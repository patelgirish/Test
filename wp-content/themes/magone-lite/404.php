<?php get_header(); ?>
	<div class="widget content-scroll no-title">
		<div class='post-404'>
			<div class='title'><?php esc_html_e('404', 'magone-lite'); ?></div>
			<div class='link'>
				<a href='<?php echo esc_url(home_url()); ?>'><i class='fa fa-car'></i> <?php esc_html_e('Back Home', 'magone-lite'); ?></a>
			</div>
		</div>
	</div>
<?php get_footer(); ?>