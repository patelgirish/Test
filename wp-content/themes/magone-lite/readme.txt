=== MagOne ===
Contributors: the Sneeit team
Requires at least: WordPress 4.4
Tested up to: WordPress 4.7
Version: 1.4
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: Tags: two-columns, right-sidebar, custom-background, custom-colors, custom-logo, custom-menu, featured-images, footer-widgets, rtl-language-support, sticky-post, theme-options, threaded-comments, translation-ready, news, blog translation-ready

== Description ==

MagOne brings your site to life with an attractive header and impressive featured images. With a focus on newspaper, magazine and blogging sites, it features multiple sections on the front page as well as widgets, navigation, custom logo, custom color, background and sliders. MagOne works great in many languages, for any abilities, and on any device.

For more information about MagOne please go to http://sneeit.com/magone-newspaper-and-magazine-wordpress-theme/

== Installation ==

1. In your admin panel, go to Appearance -> Themes and click the 'Add New' button.
2. Type in MagOne in the search form and press the 'Enter' key on your keyboard.
3. Click on the 'Activate' button to use your new theme right away.
4. Go to https://codex.wordpress.org/MagOne for a guide on how to customize this theme.
5. Navigate to Appearance > Customize in your admin panel and customize to taste.

== Copyright ==

MagOne WordPress Theme, Copyright 2017 Sneeit.com
MagOne is distributed under the terms of the  GNU General Public License v2 or later

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

MagOne bundles the following third-party resources:

Owl Carousel 2, Copyright David Deutsch
Licenses: MIT/GPL2
Source: https://owlcarousel2.github.io/OwlCarousel2/

HTML5 Shiv, Copyright 2014 Alexander Farkas
Licenses: MIT/GPL2
Source: https://github.com/aFarkas/html5shiv

Font Awesome icons, Copyright Dave Gandy
License: SIL Open Font License, version 1.1.
Source: http://fontawesome.io/

Images used in our theme are from Pixabay - Stunning Free Images
License: https://pixabay.com/en/service/terms/#usage
Source: https://pixabay.com

Images used in the demo site:
- https://pixabay.com/en/couple-kissing-romance-man-woman-1030767/
- https://pixabay.com/en/fashion-forest-girl-person-trees-1868545/
- https://pixabay.com/en/woman-girl-man-body-sexy-figure-2794668/
- https://pixabay.com/en/people-woman-woods-forest-trees-2575552/
- https://pixabay.com/en/vsta-co-women-vans-relaxation-2142005/
- https://pixabay.com/en/people-girl-woman-alone-fashion-2565564/
- https://pixabay.com/en/women-s-model-food-drink-coffee-2346305/
- https://pixabay.com/en/woman-girl-blonde-hair-blonde-woman-1149911/
- https://pixabay.com/en/girl-person-walking-footbridge-918706/
- https://pixabay.com/en/women-girls-talking-smile-happy-2586042/
- https://pixabay.com/en/hair-leaf-summer-young-woman-face-2422075/
- https://pixabay.com/en/person-girl-young-woman-femal-691410/
- https://pixabay.com/en/car-hood-vintage-classic-oldschool-690275/
- https://pixabay.com/en/beauty-woman-flowered-hat-cap-355157/
- https://pixabay.com/en/mountaineer-explorer-adventure-2481635/

Images used in the screenshot:
- https://pixabay.com/en/people-woman-woods-forest-trees-2575552/
- https://pixabay.com/en/couple-kissing-romance-man-woman-1030767/


== Changelog ==
= 2.2 =
* Fixed: remove minified code from style.css
* Fixed: replace images from Unplash.com

= 2.1 =
* Fixed: change Theme and Author URI, also footer credit link to match with WordPress.org standard
* Fixed: change function prefix to magone_lite
* Fixed: remove ping back tag in header.php and use only the magone_lite_pingback_header() function
* Fixed: change get_template_part to get_sidebar for header-wide-sidebar and header-before-content-sidebar sidebars
* Fixed: change prefix for Javascript enqueues to jquery-owl, magone-lite-lib, magone-lite-main

= 2.0 =
* Fixed: change MagOne upsell WordPress theme to 100% GPL Compatible

= 1.9 =
* Fixed: Allow changing home page latest post block title
* Fixed: Remove upsell credit link

= 1.8 =
* Fixed: Change date('Y') to date_i18n(__('Y','textdomain'))
* Fixed: Use the_posts_pagination() instead of complex code
* Fixed: Use get_the_archive_title() instead of complex code (for custom style purpose)
* Fixed: Remove functions mb_
* Fixed: REQUIRED: 'sanitize_callback' => 'esc_attr' - esc_attr() is not sanitizing function

= 1.7 =
* Fixed: use get_template_directory() to load non template PHP files. Always use get_template_part() for template parts
* Fixed: Escape home_url() with esc_url()
* Fixed: Always use home_url() instead of get_home_url()
* Fixed: $main_color = esc_attr(sanitize_hex_color(get_theme_mod( 'main_color', '#FF3D00' ))); - No need of using sanitizing function. When used in displaying, just use escaping function
* Fixed: implement add_editor_style() properly
* Fixed: Remove this plugin territory code
* Fixed: Remove magone_lite_pagenav_index(). Please use alternative
* Fixed: Remove magone_lite_title_to_slug(). Use WP available function if needed.
* Fixed: Remove mb_strlen when it is already handled by core.

= 1.6 =
* Fixed: Wrong theme text domain
* Fixed: Show require-once info

= 1.2 =
* Fixed: remove condition so menu will have fallback if no menu exist
* Fixed: added condition for pingback <link>
* Fixed: use get_template_part() instead of get_header()
* Fixed: translate text and remove wrong home URL on 404 page
* Fixed: remove blank PHP tags and remove one credit link
* Fixed: follow get_option('date_format) to display comment date
* Fixed: slider must hide at default
* Fixed: remove wp_title() and use add_theme_support( 'title-tag' ) instead 
* Fixed: not hardcode date_time at any way, use get_option( 'date_format' ) instead
* Fixed: add clear div immediately after content
* Fixed: h6 is too small to read
* Fixed: remove Copy All button from pre
* Fixed: remove blog pagination information
* Fixed: gallery not display properly
* Fixed: admin bar not stick to top
* Fixed: has option to disable excerpt on top of post
* Fixed: removed all unused defines 
* Fixed: valid all W3 errors
* Fixed: hide sidebar and menu in print.css
* Fixed: remove things which affect login page
* Fixed: remove all get_post_meta()
* Fixed: escape all data

= 1.1 =
* Fixed: Change screenshot
* Fixed: Remove non-design related functionality, tinymce editor hooks, Cookies functions.
* Fixed: Removed none-use codes.
* Fixed: Replaced recreated functions with WordPress available functions
* Fixed: Added prefix to everything
* Fixed: Escaped and sanitize all user data / theme mod
* Fixed: Tested Backward 3 versions
* Fixed: Modified Readme.txt
* Fixed: Removed minified scripts

= 1.0 =
* Released: March 4, 2017

Initial release
