<?php

/*DEFINES*/
/*common*/
define('MAGONE_THEME_VERSION', '2.0');
/* turn this on if you are a developer and 
 * want to modify header using custom header */
define('MAGONE_USE_CUSTOM_HEADER', false); 

/*requires*/
require_once get_template_directory() . '/includes/defines/define-init.php';
require_once get_template_directory() . '/includes/lib/lib-common.php';
require_once get_template_directory() . '/includes/lib/lib-article.php';
require_once get_template_directory() . '/includes/lib/lib-next-prev.php';

require_once get_template_directory() . '/includes/setup/setup-basic.php';
require_once get_template_directory() . '/includes/setup/setup-customizer.php';
require_once get_template_directory() . '/includes/setup/setup-menus.php';
require_once get_template_directory() . '/includes/setup/setup-sidebars.php';
