<?php 

if ( is_active_sidebar( 'before_content_sidebar' ) ) {	
	echo '<aside id="before_content_sidebar" class="section before-content-sidebar">';
	dynamic_sidebar( 'header_sidebar' );	
	echo '</aside>';
} 
?>
<div class="clear"></div>
