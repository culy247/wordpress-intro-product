<?php 

if ( is_active_sidebar( 'sidebar' ) ) : ?>
		<aside class="large-3 sidebar-second columns sidebar">
			<?php dynamic_sidebar( 'sidebar' ); ?>
		</aside><!-- #secondary -->
	<?php endif;