<?php

function magone_lite_related_path($path = '') {
	
	if ($path) {
		
	}
	return $path;
}

function magone_lite_blog_title() {	
	if (get_theme_mod('custom_logo', false)) {
		$blog_title = get_custom_logo();
	}
	else {
		$blog_title = '<a href="'.esc_url(home_url()).'" title="'.esc_attr(get_bloginfo( 'description')).'">';
		$blog_title .= get_bloginfo('name');
		$blog_title .= '</a>';
	}
	
	if (!is_home() && !is_front_page()) : ?>
		<h2 class="blog-title"><?php echo $blog_title; ?></h2>
	<?php else : ?>
		<h1 class="blog-title"><?php echo $blog_title; ?></h1>
	<?php endif;
}


function magone_lite_get_first_image_src_in_content($content = '', $size = 'medium') {
	$src = '';
	if (!($content)) {
		$content = get_the_content();
		if (!($content)) {
			global $post;
			if (is_object($post)) {
				if (property_exists($post, 'post_content')) {
					$content = $post->post_content;
				}
			}
		}
	}
	if ($content) {
		
		$start_image_tag = strpos($content, '<img ');
		if ($start_image_tag !== false) {
			
			// get image id first, if already in library, return match size src, 
			// else, return src only
			
			$start_class_1 = strpos($content, 'class="', $start_image_tag);
			$start_class_2 = strpos($content, 'class=\'', $start_image_tag);
			if (!($start_class_1 === false && $start_class_2 === false)) {
				
				$start_class = -1;
				if ($start_class_1 === false) {
					$start_class = $start_class_2;
				} else if ($start_class_2 === false) {
					$start_class = $start_class_1;
				} else if ($start_class_1 < $start_class_2) {
					$start_class = $start_class_1;
				} else {
					$start_class = $start_class_2;
				}
				
				if ($start_class != -1) {
					
					$offset_key = 'class="';
					$end_class_1 = strpos($content, '"', $start_class + strlen($offset_key));
					$end_class_2 = strpos($content, '\'', $start_class + strlen($offset_key));
					$end_class = -1;
					if ($end_class_1 === false) {
						$end_class = $end_class_2;
					} else if ($end_class_2 === false) {
						$end_class = $end_class_1;
					} else if ($end_class_1 < $end_class_2) {
						$end_class = $end_class_1;
					} else {
						$end_class = $end_class_2;
					}
					
					if ($end_class != -1) {
						
						$len = $end_class - ($start_class + strlen($offset_key));
						$cls = substr($content, $start_class + strlen($offset_key), $len);
						
						if ($cls && strpos($cls, 'wp-image-') !== false) {
							$cls = substr($cls, strpos($cls, 'wp-image-') + strlen('wp-image-'));
						}
						if (strpos($cls, ' ') !== false) {
							$cls = substr($cls, 0, strpos($cls, ' '));
						}
						if (strpos($cls, '\t') !== false) {
							$cls = substr($cls, 0, strpos($cls, '\t'));
						}
						
						if ($cls && is_numeric($cls)) {
							$src = wp_get_attachment_image_src((int)$cls, $size);
							if (is_array($src) && !empty($src)) {
								return $src[0];
							}
						}
					}
				}
			}
			
			
			
			$start_src_1 = strpos($content, 'src="', $start_image_tag);
			$start_src_2 = strpos($content, 'src=\'', $start_image_tag);
			if (!($start_src_1 === false && $start_src_2 === false)) {
				$start_src = -1;
				if ($start_src_1 === false) {
					$start_src = $start_src_2;
				} else if ($start_src_2 === false) {
					$start_src = $start_src_1;
				} else if ($start_src_1 < $start_src_2) {
					$start_src = $start_src_1;
				} else {
					$start_src = $start_src_2;
				}
				
				if ($start_src != -1) {
					$offset_key = 'src="';
					$end_src_1 = strpos($content, '"', $start_src + strlen($offset_key));
					$end_src_2 = strpos($content, '\'', $start_src + strlen($offset_key));
					$end_src = -1;
					if ($end_src_1 === false) {
						$end_src = $end_src_2;
					} else if ($end_src_2 === false) {
						$end_src = $end_src_1;
					} else if ($end_src_1 < $end_src_2) {
						$end_src = $end_src_1;
					} else {
						$end_src = $end_src_2;
					}
					
					if ($end_src != -1) {
						$len = $end_src - ($start_src + strlen($offset_key));
						return substr($content, $start_src + strlen($offset_key), $len);
					}
				}
			}
		}
	}
	
	if ($src) {
		return esc_url($src);
	}
	return '';
}
function magone_lite_is_slug_name_character($character) {
	$character = ord($character);
	if ($character >= ord('a') && 
		$character <= ord('z') ||
		$character >= ord('A') &&
		$character <= ord('Z') ||
		$character >= ord('0') &&
		$character <= ord('9') ||
		$character == ord('_') || 
		$character == ord('-')) {
		return true;
	}

	return false;
}
function magone_lite_get_vimeo_id($content = '') {
	$vimeo_id = '';
	
	if (strlen($content)) {		
		// search and get vimeo ID
		$key = '//player.vimeo.com/video/';
		$start = strpos($content, $key);		
		if ($start === false) {
			$key = 'vimeo.com/';
			$start = strpos($content, $key);
		}
		if ($start !== false) {
			for ($i = $start + strlen($key); $i < strlen($content); $i++) {
				if (!magone_lite_is_slug_name_character($content[$i])) {
					break;
				}
			}
			if ($i <= strlen($content)) {
				$vimeo_id = substr($content, $start + strlen($key), $i - ($start + strlen($key)));
				if (strlen($vimeo_id) > MAGONE_MAX_VIMEO_VIDEO_ID_LENGTH) {
					$vimeo_id = '';
				}
			}
		}
	}
	
	return $vimeo_id;
}
// http://stackoverflow.com/questions/1361149/get-img-thumbnails-from-vimeo
function magone_lite_get_vimeo_image_src_in_content($content = '', $size = 'small') {	
	$src = '';
	if ( strpos( $content, 'vimeo' ) === false ) {
		return '';
	}
	if ($size == 'thumbnail') {
		$size = 'small';
	} else if ($size == 'full') {
		$size = 'large';
	}
	
	
	if ($size && $content) {
		// search and get vimeo ID
		$vimeo_id = magone_lite_get_vimeo_id($content);
		if ($vimeo_id) {			
			$src = get_transient('vimeo_thumb-'.$vimeo_id);
			if ($src === false) {
				// load vimeo thumbnail via API
				$vimeo_thumb_xml = wp_remote_get(esc_url('http://vimeo.com/api/v2/video/'.$vimeo_id.'.php'), array( 
					'sslverify' => false, 
					'compress'    => false,
					'decompress'  => false,
					'timeout'	=> MAGONE_REMOTE_TIMEOUT));

				if ( !is_wp_error($vimeo_thumb_xml) ) {
					$hash = unserialize(wp_remote_retrieve_body($vimeo_thumb_xml));
					$src = $hash[0]['thumbnail_large'];	
					set_transient('vimeo_thumb-'.$vimeo_id, $src, 60*60*24*365);
					update_option('vimeo_thumb-'.$vimeo_id, $src);
				} else {
					$src = get_option('vimeo_thumb-'.$vimeo_id, '');
				}
			}
		}
	}
	
	if ($src) {
		return esc_url($src);
	}
	return '';
}


// http://stackoverflow.com/questions/2068344/how-to-get-thumbnail-of-youtube-video-link-using-youtube-api/2068371#2068371
/*
latest short format: http://youtu.be/NLqAF9hrVbY
iframe: http://www.youtube.com/embed/NLqAF9hrVbY
iframe (secure): https://www.youtube.com/embed/NLqAF9hrVbY
watch: http://www.youtube.com/watch?v=NLqAF9hrVbY
users: http://www.youtube.com/user/Scobleizer#p/u/1/1p3vcRhsYGo
ytscreeningroom: http://www.youtube.com/ytscreeningroom?v=NRHVzbJVx8I
any/thing/goes!: http://www.youtube.com/sandalsResorts#p/c/54B8C800269D7C1B/2/PPS-8DMrAn4
any/subdomain/too: http://gdata.youtube.com/feeds/api/videos/NLqAF9hrVbY
more params: http://www.youtube.com/watch?v=spDj54kf-vY&feature=g-vrec
query may have dot: http://www.youtube.com/watch?v=spDj54kf-vY&feature=youtu.be
nocookie domain: http://www.youtube-nocookie.com
 */
function magone_lite_get_youtube_id( $content = '' ) {
	$youtube_id = '';

	if ( strlen( $content ) ) {
		// search and get vimeo ID
		$key = '//www.youtube.com/embed/';
		$start = strpos( $content, $key );
		
		if ( false === $start ) {
			$key = 'youtube.com/watch?v=';
			$start = strpos( $content, $key );
		}
		
		if ( false === $start ) {
			$key = 'youtu.be/';
			$start = strpos( $content, $key );
		}
		if ( false === $start ) {
			$key = 'youtube.com/v/';
			$start = strpos( $content, $key );
		}
		
		if ( false === $start ) {
			$key = 'youtube-nocookie.com/embed/';
			$start = strpos( $content, $key );
		}
		
		if ( false !== $start ) {
			for ( $i = $start + strlen($key); $i < strlen($content); $i++ ) {
				if ( !magone_lite_is_slug_name_character( $content[$i] ) ) {
					break;
				}
			}
			if ( $i <= strlen( $content ) ) {
				$youtube_id = substr( $content, $start + strlen( $key ), $i - ( $start + strlen( $key ) ) );
				if ( strlen( $youtube_id ) > MAGONE_MAX_YOUTUBE_VIDEO_ID_LENGTH ) {
					$youtube_id = '';
				}
			}
		}
	}
	
	return $youtube_id;
}

function magone_lite_get_youtube_image_src_in_content($content = '', $size = 'thumbnail') {	
	$src = '';
	
	if ( strpos( $content, 'youtube' ) === false && strpos( $content, 'youtu.be' ) === false ) {
		return '';
	}
	
	if ($size && $content) {		
		// search and get vimeo ID
		$youtube_id = magone_lite_get_youtube_id( $content );
		if ($youtube_id) {
			$src = esc_url('http://img.youtube.com/vi/'.$youtube_id.'/hqdefault.jpg');
		}
	}
	if ($src) {
		return esc_url($src);
	}
	return '';
}

/*
 * Get the first image of post as SRC only
 */
function magone_lite_get_post_img_src($post_id = 0, $size = 'medium', $default_src = '') {
	$src = '';
	if (!$post_id) {
		$post_id = get_the_ID();
		if (!$post_id) {
			global $post;
			if (is_object($post)) {
				if (property_exists($post, 'ID')) {
					$post_id = $post->ID;
				}
			}
		}
	}
	
	if ($post_id) {
		if (has_post_thumbnail( $post_id ) ) {
			$post_thumbnail_id = get_post_thumbnail_id( $post_id );
			if ( $post_thumbnail_id ) {
				$image_attributes = wp_get_attachment_image_src( $post_thumbnail_id, $size );
				if ( is_array( $image_attributes ) && isset( $image_attributes[0] ) ) {
					$src = $image_attributes[0];
				}
			}
		}
		
		if ( ! $src ) {
			$content_post = get_post( $post_id );
			$content = $content_post->post_content;
			
			// search image in post
			$src = magone_lite_get_first_image_src_in_content( $content, $size );
			if ( ! $src ) {
				$src = magone_lite_get_vimeo_image_src_in_content( $content, $size );
			}
			if ( ! $src ) {
				$src = magone_lite_get_youtube_image_src_in_content($content, $size);
			}
		}
	}
	
	if ( ! $src && $default_src ) {
		if ( is_string( $default_src ) ) {
			$src = $default_src;
		}
		else {
			
			$src = esc_url(get_theme_mod( 'default_thumbnail_image', get_theme_file_uri('/assets/images/default-slider-thumbnail.jpg') ));
			if ( ! $src ) {				
				$src = get_theme_file_uri('/assets/images/default-slider-thumbnail.jpg');
			}
		}
	}
	if ($src) {
		return esc_url($src);
	}
	return '';
}

/*in case need optimize src*/
function magone_lite_get_post_image_optimize_src($attr) {
	if (isset($attr['src'])) {
		$attr['data-s'] = $attr['src'];
		$attr['src'] = '';
	}
	if (isset($attr['srcset'])) {
		$attr['data-ss'] = $attr['srcset'];
		unset($attr['srcset']);
	}		

	return $attr;
}

/*sizes: thumbnail, large, medium, full*/
function magone_lite_get_post_image( $post_id = 0, $size = 'thumbnail', $attr = NULL, $default_src = '', $optimize_src = false) {
	$html = '';
	$src = '';
	
	// validate post id
	if ( ! $post_id ) {
		$post_id = get_the_ID();
		if ( ! $post_id ) {
			global $post;
			if ( is_object( $post ) ) {
				if ( property_exists( $post, 'ID' ) ) {
					$post_id = $post->ID;
				}
			}
		}
	}
	
	// validate attr
	if ( !is_array( $attr ) ) {
		$attr = array();
	}
	
	if ( $post_id ) {
		$attr['alt'] = esc_attr( get_the_title( $post_id ) );
		
	}
	$src = magone_lite_get_post_img_src( $post_id, $size, $default_src );
	
	if ( $src ) {
		
		$src_id = (int) attachment_url_to_postid( $src );
		if ( $src_id ) {
			if ($optimize_src) {
				add_filter('wp_get_attachment_image_attributes', 'magone_lite_get_post_image_optimize_src');
			}
			
			$html = wp_get_attachment_image( $src_id, $size, false, $attr );
			
			if ($optimize_src) {
				remove_filter('wp_get_attachment_image_attributes', 'magone_lite_get_post_image_optimize_src');
			}
		} 
		else {
			// maybe external image or not in library
			$html = '<img src="' . esc_url( $src ) . '"';
			foreach ( $attr as $key => $value ) {
				$html .= ' ' . $key . '="' . esc_attr( $value ) . '"';
			}
			$html .= '/>';
		}		
	}
	
	return $html;
}


function magone_lite_substring($string, $start, $length = 150) {	
	mb_internal_encoding('UTF-8');
	mb_http_output('UTF-8');
	mb_http_input('UTF-8');
	mb_language('uni');
	mb_regex_encoding('UTF-8');
	
	return mb_substr($string, $start, $length);
	
}

/*Use this function inside loop
 * wrap = true mean wrap content by p tag
 * one_line = true mean remove all html tags in content
 */
function magone_lite_get_the_snippet($length = 150, $hellip = true) {
	
	
	$html = '';
	global $post;
	
	if ( is_object( $post ) ) {
		if ( property_exists( $post, 'post_excerpt' ) && $post->post_excerpt ) {
			$html = $post->post_excerpt;
		} else if ( property_exists ($post, 'post_content') && $post->post_content ){
			$html = $post->post_content;
		}
	}
	
	if ( ( !$html ) && get_the_content( '', false) ) {
		$html = get_the_content( '', false );
	}
	
	
	if ((!$html) && get_the_excerpt()) {
		$html = get_the_excerpt();
	}
	
	
	if ($html) {
//		$html = do_shortcode( $html ); // Can not use this because if a post has article shortcode in content, you will get forever loop of do_shortcode
		// use this instead:
		$html = str_replace(array('[dropcap]', '[/dropcap]', '[dropcap/]'), '', $html);
		$html = strip_shortcodes($html);
		$html = strip_tags( $html );
		if ( strlen( $html ) > $length ) {			
			$html = magone_lite_substring( $html, 0, $length );
		}
	}
	
	if ( $hellip ) {
		if ( is_string( $hellip ) ) {
			$html .= ' ' . $hellip . ' ';
		} else {
			$html .= ' ... ';
		}
	}
	
	return $html;
}
function magone_lite_remove_html_slashes($content) {
	return filter_var(stripslashes($content), FILTER_SANITIZE_SPECIAL_CHARS);
}
function magone_lite_safe_array_get($arr, $element, $default = '') {
	$value = $default;
	
	if (is_array($arr) && array_key_exists($element, $arr)) {
		$value = $arr[$element];
	}
	return $value;
}

function magone_lite_has_form_controls($str = '') {
	if (!$str) {
		return false;
	}
	if (strpos($str, '<form') !== false) {
		return true;
	}
	if (strpos($str, '<input') !== false) {
		return true;
	}
	if (strpos($str, '<textarea') !== false) {
		return true;
	}
	if (strpos($str, '<select') !== false) {
		return true;
	}
	if (strpos($str, '<option') !== false) {
		return true;
	}
	
	return false;
}

function magone_lite_get_server_request($key) {
	$value = '';
	if ($key) {
		if (isset($_GET[$key])) {
			$value = $_GET[$key];
		} else if (isset($_POST[$key])) {
			$value = $_POST[$key];
		}
	}
	return $value;
}

function magone_lite_is_IE() {
	return preg_match('/(?i)msie [5-8]/',$_SERVER['HTTP_USER_AGENT']);
}

function magone_lite_get_attachment_from_src($src = '') {
	$attachment_id = (int) attachment_url_to_postid($src); 
	
	if (!$attachment_id) {
		return false;
	}
	
	return wp_get_attachment_metadata($attachment_id);
}

function magone_lite_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}