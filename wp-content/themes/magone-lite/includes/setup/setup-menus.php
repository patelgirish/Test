<?php
add_action( 'after_setup_theme', 'magone_lite_add_menu_locations');
function magone_lite_add_menu_locations() {
	register_nav_menu( 'main-menu', esc_html__('Main Menu', 'magone-lite'));	
}
