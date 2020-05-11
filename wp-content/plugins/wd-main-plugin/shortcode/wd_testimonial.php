<?php
function wd_testimonial($atts) {

	extract(shortcode_atts(array(

		'itemperpage' => 10,
		'font_color' => "#fff",
		'css_animation' => 'no'

	), $atts));

	$animation_classes = "";
	$data_animated = "";
	if (($css_animation != 'no')) {
		$animation_classes = " animated ";
		$data_animated = "data-animated=$css_animation";
	}

	ob_start(); ?>


	<div class="<?php echo esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
		<div class="owl-testimonail wd-testimonail" style="<?php if($font_color != '') echo 'color:'.$font_color.';' ?>">
			<?php $loop = new WP_Query(array('post_type' => 'testimonials', 'posts_per_page' => $itemperpage));
			while ($loop->have_posts()) : $loop->the_post(); ?>
				<div>
					<blockquote>
						<?php
						the_excerpt();

						if (has_post_thumbnail()) {
							the_post_thumbnail( array(70, 70) );
						} ?>
						<cite><?php the_title(); ?></cite>
						<div class="job-title"><?php get_post_meta(get_the_ID(), 'job_title', true) ?></div>
					</blockquote>
				</div>
			<?php endwhile; ?>
		</div>
	</div>


	<?php return ob_get_clean();
}

add_shortcode('wd_testimonial', 'wd_testimonial');