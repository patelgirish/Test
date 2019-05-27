			<div class="clear"></div>							
		</div>			
	</div>
	<?php get_sidebar(); ?>
</div>
<div class="clear"></div>
<div class="is-firefox hide"></div>
<div class="is-ie9 hide"></div>
<?php
if (is_active_sidebar( 'footer-col-1-section' ) ||
	is_active_sidebar( 'footer-col-2-section' ) ||
	is_active_sidebar( 'footer-col-3-section' )) : ?>
	
	<div id="footer">
		<div class="footer-inner shad">
			<div class="footer-col footer-col-1">
				<?php						
					if ( is_active_sidebar( 'footer-col-1-section' ) ) {	
						echo '<aside id="footer-col-1-section-sidebar" class="section footer-col-1-section-sidebar">';
						dynamic_sidebar( 'footer-col-1-section' );	
						echo '</aside>';
					} 
				?>
			</div>
			<div class="footer-col footer-col-2">
				<?php
					if ( is_active_sidebar( 'footer-col-2-section' ) ) {	
						echo '<aside id="footer-col-2-section-sidebar" class="section footer-col-2-section-sidebar">';
						dynamic_sidebar( 'footer-col-2-section' );	
						echo '</aside>';
					} 
				?>
			</div>
			<div class="footer-col footer-col-3">
				<?php
					if ( is_active_sidebar( 'footer-col-3-section' ) ) {	
						echo '<aside id="footer-col-3-section-sidebar" class="section footer-col-3-section-sidebar">';
						dynamic_sidebar( 'footer-col-3-section' );	
						echo '</aside>';
					} 
				?>
			</div>
			<div class="clear"></div>				
		</div>
	</div>
	<?php endif; ?>
	
	<div id="magone-copyright">
		&AElig;&copy; <?php echo date("Y") . ' '; bloginfo('name'); ?>.
		<a href="<?php echo esc_url('https://sneeit.com/magone-free-responsive-wordpress-theme/'); ?>">Magone Theme</a> by Sneeit.com
	</div>
</div>
</div>
<a class='scroll-up shad' href='#'><i class='fa fa-angle-up'></i></a>
<div class='search-form-wrapper'>
	<div class='search-form-overlay'></div>
	<?php get_search_form(); ?>
</div>
<?php wp_footer(); ?>
</body>
</html>