<?php if ($p->args['show_comment']): 
	
		
	?><a class="post-meta post-meta-comments" href="#comments"><?php
		?><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); 
	?></a><?php
	
endif;