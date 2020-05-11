<?php
if (!function_exists('wd_icon_text')) {
	function wd_icon_text($atts, $content = null) {

		extract(shortcode_atts(array(
			'title' => '',
			'icon' => '',
			'layout' => '-style1',
			'extra_classes' => '',
			'image_checkbox' => '',
			'image' => '',
			'icon_txt_url' => '#',
			'css_animation' => 'no',
		), $atts));


		$img_size = "";
		$thumb_size = "thumbnail";
		$post_thumbnail = "";

		$animation_classes = "";
		$data_animated = "";

		if (($css_animation != 'no')) {
			$animation_classes = " animated ";
			$data_animated = "data-animated=$css_animation";
		}

		$icon_txt_target = '';
		if ($icon_txt_url != "#") {
			$href = vc_build_link($icon_txt_url);
			$icon_txt_url = $href['url'];
			$icon_txt_target = (isset($href['target']) && $href['target'] != '') ? ' target=' . $href['target'] : '';
		}

		ob_start(); ?>

		<div class="wd-section-text-icon">
			<?php if ($icon_txt_url != '' && $icon_txt_url != '#') { ?>
			<a href="<?php esc_attr_e($icon_txt_url); ?>"<?php esc_attr_e($icon_txt_target); ?>>
				<?php } ?>
				<div class="wd-text-icon<?php echo esc_attr($layout) . ' ' . esc_attr($animation_classes) . ' ' . esc_attr($extra_classes); ?>" <?php echo esc_attr($data_animated); ?>>
					<div class="box-icon">
						<?php if ($image_checkbox == 'yes') { ?>
							<?php
							$img_id = preg_replace('/[^\d]/', '', $image);
							$img = wp_get_attachment_image_src($img_id, 'flooring_portfolio');
							$srcset = wp_get_attachment_image_srcset($img_id, array(380, 254));
							?>
							<?php
							$slug = get_post_field('post_name', $img_id);
							?>
							<img src="<?php echo $img[0] ?>"
							     srcset="<?php echo $srcset ?>" alt="<?php echo $slug ?>"/>
						<?php } else { ?>
							<i class="fa <?php echo $icon; ?>"></i>
						<?php } ?>
					</div>
					<div class="box-description">
						<h3><?php echo $title; ?></h3>
						<p>
							<?php echo $content; ?>
						</p>
					</div>
				</div>
				<?php if ($icon_txt_url != '' && $icon_txt_url != '#') { ?>
			</a>
		<?php } ?>
		</div>


		<?php return ob_get_clean();
	}

	add_shortcode('wd_icon_text', 'wd_icon_text');
}
?>