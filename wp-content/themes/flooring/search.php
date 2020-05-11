<?php get_header();

get_template_part( 'parts/titlebar' ); ?>

	<main id="l-main" class="row ">
		<div class="large-9 main columns search-result">
			<?php if ( have_posts() ) { ?>
				<?php while ( have_posts() ) {
					the_post(); ?>
					<article <?php post_class(); ?>>
						<div class="result">
							<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

							<div class="body">
								<?php echo wp_trim_words(do_shortcode(get_the_content()) , 30 ); ?>
							</div>
						</div>

					</article>
				<?php } ?>
				<div class="wd-pagination">
				<?php
				global $wp_query;

				$big = 999999999;
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages,

				) );
				?>
        </div>
		<?php 	}else {

				if ( is_search() ) {
                    ?>
					<div class="no-result large-push-3 large-6">
						<p><?php echo esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'flooring' ); ?></p>
						<?php get_search_form(); ?>
					</div>

				<?php }else { ?>
					<div class="no-result large-push-3 large-6">
						<p><?php echo esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'flooring' ); ?></p>
						<?php get_search_form(); ?>
					</div>
					<?php
				}
	    }
			 ?>
		</div>
		<?php get_sidebar(); ?>
	</main>

<?php get_footer(); ?>