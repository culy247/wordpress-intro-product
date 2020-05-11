<div class="wd-title-bar">
		<div class="row">
			<div class="large-12 columns wd-title-section_l">
				<?php
				if (flooring_is_blog()){
					$page_for_posts = get_option( 'page_for_posts' ); ?>
					<?php if($page_for_posts != 0){ ?>
					<h2><?php echo get_the_title($page_for_posts); ?></h2>
					<?php }else{
						?>
						<h2><?php echo esc_html__('Blog','flooring') ?></h2>
						<?php
					} ?>
					<h5><?php echo esc_html__('Our Latest Blog Posts','flooring') ?></h5>
				  <?php
				}elseif(is_search()){ ?>
					<h2><?php echo esc_html__('Search Result of', 'flooring') .': '. esc_html( get_search_query( false ) ) ?></h2>
					<?php
				}else {
					the_title( '<h2>', '</h2>' );
				} ?>
			</div>
			
		</div>
	</div>