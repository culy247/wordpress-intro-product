<article <?php post_class(); ?>>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				
				<?php  the_post_thumbnail('flooring_blog-thumb');  ?>
				
			</a>
		</div>
		<div class="post-left">
			<div class="day">
				<?php echo get_the_date('d') ?>
			</div>
			<div class="month">
				<?php echo get_the_date('M') ?>
			</div>
		</div>
		<div class="post-right">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
			<ul class="post-infos clearfix">
				<li>
					<?php echo esc_html__('By:','flooring') ?> <a href="<?php the_author_link() ?>" ><?php the_author() ?></a>
				</li>
				
				<?php if(has_tag()){ ?>
					<li class="tag"> <?php the_tags(); ?></li>
				<?php } ?>
				<li class="category">
                    <?php echo esc_html__('Category:','flooring') ?> <?php  the_category(', '); ?>
				</li>
				<li class="comment-count">
                    <a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '% responses' ); echo esc_html__(' comment', 'flooring') ?></a>
				</li>
			</ul>
			<div class="blog-body clearfix">
				<p><?php echo wp_trim_words( get_the_content(), 70 ); ?></p>
					<a href="<?php the_permalink(); ?>" class="read-more-link"><?php esc_html_e('Read more', 'flooring') ?> &#8594;</a>
			
			</div>
		</div>
</article>
	
