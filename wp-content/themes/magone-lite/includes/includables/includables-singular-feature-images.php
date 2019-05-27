<?php if (has_post_thumbnail()) : ?>
<p class="post-feature-media-wrapper">
	<?php 	
		the_post_thumbnail( 'full', array(
			'alt' => $p->title_attr, 
			'title' => $p->title_attr,
		) );	
	?>
</p>
<?php
endif;