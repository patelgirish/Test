<?php 

if ( is_active_sidebar( 'sidebar' ) ) {	
	echo '<aside id="sidebar" class="section main-sidebar">';
	dynamic_sidebar( 'sidebar' );	
	echo '</aside>';
} 



