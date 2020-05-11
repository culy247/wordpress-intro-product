<?php get_header();

	if(!(is_front_page())) {
		$flooring_page_show_title_area = get_post_meta(get_the_ID(), 'flooring_page_show_title_area', true);

		if($flooring_page_show_title_area != 'no'){
			get_template_part('titlebar');
		}
	}  ?>

  <!-- content  -->
	<main class="l-main row">
		<div class="main large-12 columns">
		  <?php if (have_posts()) :
       while (have_posts()) : the_post(); ?>
  			<article>
  				<div class="body field clearfix">
  					<?php the_content(); ?>
  				</div>
				<?php wp_link_pages(array('before' => '<div class="page-links">' . esc_html__('Pages:', 'flooring'), 'after' => '</div>')); ?>
  			</article>
      <?php endwhile;
      endif; ?>
<?php if (comments_open() && !is_front_page()){
                  comments_template( '', true );
                } ?>
		</div>
	</main>
	<!-- /content  -->

	<?php get_footer(); ?>