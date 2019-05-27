<?php 
if ( is_active_sidebar( 'header-wide' ) ) {	
	echo '<aside id="header-wide" class="section clear header-wide-sidebar">';
	dynamic_sidebar( 'header-wide' );	
	echo '</aside>';
} 
?>
<div class="clear"></div>