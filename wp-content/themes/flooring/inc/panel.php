<?php


/*///////////////////////////////// Register Panel Scripts and Styles /////////////////////////////////////////*/
function flooring_admin_register($hook) {
	if($hook == 'appearance_page_flooring-theme-option') {
		wp_register_script('wd-admin-main', get_template_directory_uri() . '/inc/js/script.js',
			array('jquery', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-mouse', 'jquery-ui-tabs',
				'jquery-ui-droppable', 'jquery-ui-sortable'), false, false);
	}


	wp_register_style('themify-icons', get_template_directory_uri() . '/inc/themify-icons.css', array(), '20120208', 'all');
	wp_register_style('wd-style', get_template_directory_uri() . '/inc/css/style.css', array(), '20120208', 'all');

	$font_body_name = flooring_get_option('flooring_body_font_familly', 'Open Sans');
	$flooring_font_weight_style = flooring_get_option('flooring_body_font_style', '700');
	$flooring_main_text_font_subsets = flooring_get_option('flooring_main-text-font-subsets', 'latin');

	$font_header_name = flooring_get_option('flooring_head_font_familly', 'Open Sans');
	$flooring_heading_font_weight_style = flooring_get_option('flooring_heading-font-weight-style', '700');
	$flooring_heading_text_font_subsets = flooring_get_option('flooring_heading-text-font-subsets', 'latin');

	$flooring_navigation_font_familly = flooring_get_option('flooring_navigation_font_familly', 'Open Sans');
	$flooring_navigation_font_weight_style = flooring_get_option('flooring_navigation-font-weight-style', '700');
	$flooring_navigation_text_font_subsets = flooring_get_option('flooring_navigation-text-font-subsets', 'latin');
	$flooring_protocol = is_ssl() ? 'https' : 'http';


	wp_register_style('wd-google-fonts-body', $flooring_protocol . '://fonts.googleapis.com/css?family=' . $font_body_name . ':' . $flooring_font_weight_style . '&subset=' . $flooring_main_text_font_subsets, false, NULL, 'all');
	wp_register_style('wd-google-fonts-heading', $flooring_protocol . '://fonts.googleapis.com/css?family=' . $font_header_name . ':' . $flooring_heading_font_weight_style . '&subset=' . $flooring_heading_text_font_subsets, false, NULL, 'all');
	wp_register_style('wd-google-fonts-navigation', $flooring_protocol . '://fonts.googleapis.com/css?family=' . $flooring_navigation_font_familly . ':' . $flooring_navigation_font_weight_style . '&subset=' . $flooring_navigation_text_font_subsets, false, NULL, 'all');

	wp_register_style('wd-google-fonts', $flooring_protocol . '://fonts.googleapis.com/css?family=' . $font_body_name . ':' . $flooring_font_weight_style . '&subset=' . $flooring_main_text_font_subsets, false, NULL, 'all');

	if (isset($_GET['page']) && $_GET['page'] == 'option panel') {


	}
	wp_enqueue_script('wd-admin-main');
	wp_enqueue_style('themify-icons');
	wp_enqueue_style('wd-style');
	wp_enqueue_style('wd-google-fonts');
	wp_enqueue_style('wd-google-fonts-body');
	wp_enqueue_style('wd-google-fonts-heading');
	wp_enqueue_style('wd-google-fonts-navigation');

}

add_action('admin_enqueue_scripts', 'flooring_admin_register');


if (!function_exists('flooring_load_color_picker')) {
	add_action('load-widgets.php', 'flooring_load_color_picker');
	function flooring_load_color_picker() {
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');
	}
}


/*///////////////////////////////// Theme Options /////////////////////////////////////////*/
if (!function_exists('flooring_panel_option')) {
	add_action('admin_menu', 'flooring_panel_option');
	function flooring_panel_option() {

		add_theme_page('Flooring Theme Options', 'Flooring Theme Options', 'edit_theme_options', 'flooring-theme-option', 'flooring_theme_option');
		if (class_exists('RevSliderBase')) {
			add_theme_page('Import Demos Revsliders', 'Import Demos Revsliders', 'edit_theme_options', 'flooring-revslider', 'flooring_import_revslider');
		}
	}
}


if (!function_exists('flooring_theme_option')) {
	function flooring_theme_option() {

		wp_enqueue_media();


		wp_enqueue_script('wp-color-picker');
		wp_enqueue_style('wp-color-picker');


		wp_enqueue_script('colorpick', get_template_directory_uri() . "/js/bootstrap-colorpicker.min.js", array('jquery'));
		wp_enqueue_style('colorpick', get_template_directory_uri() . "/stylesheets/bootstrap-colorpicker.min.css");
		?>

		<?php


		if (!empty($_POST)) {

			$flooring_allowed_html_array = array(
				'a' => array(
					'href' => array(),
					'title' => array()
				),
				'br' => array(),
				'em' => array(),
				'strong' => array(),
			);
			// webdevia_initialize_options();

			// greenenergy_initialize_options();
			//-------------------General Setting-------------
			flooring_save_option('flooring_logo_path', esc_attr($_POST['flooring_logo_path']));

			flooring_save_option('flooring_bg_single_post_path', esc_attr($_POST['flooring_bg_single_post_path']));
			flooring_save_option('flooring_bg_single_page', esc_attr($_POST['flooring_bg_single_page']));
			flooring_save_option('google_map_key', esc_attr($_POST['google_map_key']));
			//-------------------Color Setting-------------
			flooring_save_option('flooring_primary_color', esc_attr($_POST['flooring_primary_color']));
			flooring_save_option('flooring_secondary_color', esc_attr($_POST['flooring_secondary_color']));
			flooring_save_option('flooring_nav_bg_color', esc_attr($_POST['flooring_nav_bg_color']));
			flooring_save_option('flooring_nav_color', esc_attr($_POST['flooring_nav_color']));
			flooring_save_option('flooring_nav_hover_color', esc_attr($_POST['flooring_nav_hover_color']));
			flooring_save_option('navigation_bg_color_sticky', esc_attr($_POST['navigation_bg_color_sticky']));
			flooring_save_option('navigation_color_sticky', esc_attr($_POST['navigation_color_sticky']));
			flooring_save_option('navigation_color_hover_sticky', esc_attr($_POST['navigation_color_hover_sticky']));
			flooring_save_option('footer_bg_color', esc_attr($_POST['footer_bg_color']));
			flooring_save_option('footer_text_color', esc_attr($_POST['footer_text_color']));



			//-------------------Social Icon-------------
			if (isset($_POST['flooring_show_min_cart'])) {
				flooring_save_option('flooring_show_min_cart', esc_attr($_POST['flooring_show_min_cart']));

			} else {
				flooring_save_option('flooring_show_min_cart', '');

			}


			if (isset($_POST['flooring_show_adress_bar'])) {
				flooring_save_option('flooring_show_adress_bar', esc_attr($_POST['flooring_show_adress_bar']));

		}else{
				flooring_save_option('flooring_show_adress_bar', '');
		}

			flooring_save_option('flooring_twitter', esc_attr($_POST['flooring_twitter']));
			flooring_save_option('flooring_facebook', esc_attr($_POST['flooring_facebook']));
			flooring_save_option('flooring_google_plus', esc_attr($_POST['flooring_google_plus']));
			flooring_save_option('flooring_phone', esc_attr($_POST['flooring_phone']));
			//-------------------Fonts Setting ---------------

			//------------------Custom css & js ---------------
			flooring_save_option('flooring_theme_custom_css', str_replace("\\", "", $_POST['flooring_theme_custom_css']));
			flooring_save_option('flooring_theme_custom_js', str_replace("\\", "", $_POST['flooring_theme_custom_js']));
			//-------------------Footer Setting-------------

			flooring_save_option('flooring_footer_columns', esc_attr($_POST['flooring_footer_columns']));
			flooring_save_option('flooring_footer_bg_path', esc_attr($_POST['flooring_footer_bg_path']));
			flooring_save_option('flooring_copyright', htmlentities(stripslashes(wp_kses($_POST['flooring_copyright'], $flooring_allowed_html_array))));

			flooring_save_option('flooring_body_font_familly', esc_attr($_POST['flooring_body_font_familly']));
			flooring_save_option('flooring_body_font_style', esc_attr($_POST['flooring_body_font_style']));
			flooring_save_option('flooring_main-text-font-subsets', esc_attr($_POST['flooring_main-text-font-subsets']));
			flooring_save_option('flooring_body_font_size', esc_attr($_POST['flooring_body_font_size']));
			$flooring_body_font_weight_list_content = '';
			if (isset($_POST['flooring_body_font_weight_list'])) {
				if (is_array($_POST['flooring_body_font_weight_list']) && count($_POST['flooring_body_font_weight_list']) > 0) {
					foreach ($_POST['flooring_body_font_weight_list'] as $lists)
						$flooring_body_font_weight_list_content .= $lists . ',';
					$flooring_body_font_weight_list_content = trim($flooring_body_font_weight_list_content, ',');
				} elseif (!is_array($_POST['flooring_body_font_weight_list'])) {
					$flooring_body_font_weight_list_content = $_POST['flooring_body_font_weight_list'];
				}
			}
			flooring_save_option('flooring_body_font_weight_list', sanitize_text_field($flooring_body_font_weight_list_content));

			flooring_save_option('flooring_head_font_familly', esc_attr($_POST['flooring_head_font_familly']));
			flooring_save_option('flooring_heading-font-weight-style', esc_attr($_POST['flooring_heading-font-weight-style']));
			flooring_save_option('flooring_heading-text-font-subsets', esc_attr($_POST['flooring_heading-text-font-subsets']));
			$flooring_heading_font_weight_list_content = '';
			if (isset($_POST['flooring_heading-font-weight-style-list'])) {
				if (is_array($_POST['flooring_heading-font-weight-style-list']) && count($_POST['flooring_heading-font-weight-style-list']) > 0) {
					foreach ($_POST['flooring_heading-font-weight-style-list'] as $lists)
						$flooring_heading_font_weight_list_content .= $lists . ',';
					$flooring_heading_font_weight_list_content = trim($flooring_heading_font_weight_list_content, ',');
				} elseif (!is_array($_POST['flooring_heading-font-weight-style-list'])) {
					$flooring_heading_font_weight_list_content = $_POST['flooring_heading-font-weight-style-list'];
				}
			}
			flooring_save_option('flooring_heading-font-weight-style-list', sanitize_text_field($flooring_heading_font_weight_list_content));

			flooring_save_option('flooring_navigation_font_familly', esc_attr($_POST['flooring_navigation_font_familly']));
			flooring_save_option('flooring_navigation-font-weight-style', esc_attr($_POST['flooring_navigation-font-weight-style']));
			flooring_save_option('flooring_navigation-text-font-subsets', esc_attr($_POST['flooring_navigation-text-font-subsets']));
			flooring_save_option('flooring_navigation_font_size', esc_attr($_POST['flooring_navigation_font_size']));
			$flooring_navigation_font_weight_list_content = '';
			if (isset($_POST['flooring_navigation-font-weight-style-list'])) {
				if (is_array($_POST['flooring_navigation-font-weight-style-list']) && count($_POST['flooring_navigation-font-weight-style-list']) > 0) {
					foreach ($_POST['flooring_navigation-font-weight-style-list'] as $lists)
						$flooring_navigation_font_weight_list_content .= $lists . ',';
					$flooring_navigation_font_weight_list_content = trim($flooring_navigation_font_weight_list_content, ',');
				} elseif (!is_array($_POST['flooring_navigation-font-weight-style-list'])) {
					$flooring_navigation_font_weight_list_content = $_POST['flooring_navigation-font-weight-style-list'];
				}
			}
			flooring_save_option('flooring_navigation-font-weight-style-list', sanitize_text_field($flooring_navigation_font_weight_list_content));


		} ?>


		<?php if (!empty($_POST)): ?>
			<div id="message" class="updated fade">
				<p> Configuration updated!! </p>
			</div>
		<?php endif; ?>


		<div class="panel-logo">
			<h2>Webdevia theme options</h2>
		</div>
		<div class="wd-cpanel">
			<form id="wd-Panel" method="POST" action="">
				<div id="tabs" class="ui-tabs-vertical ui-helper-clearfix">
					<ul>
						<li><a href="#tabs-0"><?php echo esc_html__('General Settings', 'flooring'); ?></a></li>
						<li><a href="#tabs-1"><?php echo esc_html__('Colors Setting', 'flooring'); ?></a></li>
						<li><a href="#tabs-2"><?php echo esc_html__('Social Icons', 'flooring'); ?></a></li>
						<li><a href="#tabs-3"><?php echo esc_html__('Fonts Settings', 'flooring'); ?></a></li>
						<li><a href="#tabs-4"><?php echo esc_html__('Custom css & js', 'flooring'); ?></a></li>
						<li><a href="#tabs-5"><?php echo esc_html__('Footer Settings', 'flooring'); ?></a></li>
						<?php if (class_exists('WebdeviaMainPlugin')) { ?>
							<li><a href="#tabs-6"><?php echo esc_html__('Demos Importer', 'flooring'); ?></a></li>
						<?php } ?>
					</ul>

					<!---------------------------------- General Setting ------------------------>
					<div id="tabs-0">
						<table class="form-table">
							<tbody>

							<tr>
								<td>
									<strong><?php echo esc_html__('Logo link', 'flooring'); ?></strong>
								</td>
								<?php

								$flooring_logo_path = flooring_get_option('flooring_logo_path', '');
								?>
								<td>
									<input type="text" name="flooring_logo_path" id="flooring_logo_path" value="<?php print esc_attr($flooring_logo_path) ?>"/>
									<input class="button" name="_unique_name_button" id="flooring_upload_btn" value="<?php echo esc_html__('Upload', 'flooring') ?>"/></br>
								</td>
								<td>
									<?php
									if (!empty($flooring_logo_path)): ?>
										<img src="<?php print esc_url($flooring_logo_path); ?>" style="max-height: 70px;"/> <?php endif;
									?>
								</td>
							</tr>


							<tr>
								<td>
									<strong><?php echo esc_html__('Background Title Bar for Single Post', 'flooring'); ?></strong>
								</td>
								<?php

								$flooring_bg_single_post_path = flooring_get_option('flooring_bg_single_post_path', '');
								?>
								<td>
									<input type="text" name="flooring_bg_single_post_path" id="flooring_bg_single_post_path" value="<?php print esc_attr($flooring_bg_single_post_path) ?>"/>
									<input class="button" name="_unique_name_button_single_post" id="flooring_upload_single_post" value="<?php echo esc_html__('Upload', 'flooring') ?>"/></br>
								</td>
								<td>
									<?php
									if (!empty($flooring_bg_single_post_path)): ?>
										<img src="<?php print esc_url($flooring_bg_single_post_path); ?>" style="max-height: 40px;"/> <?php endif;
									?>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__('Background Title Bar for pages', 'flooring'); ?></strong>
								</td>
								<?php

								$flooring_bg_single_page = flooring_get_option('flooring_bg_single_page', '');
								?>
								<td>
									<input type="text" name="flooring_bg_single_page" id="flooring_bg_single_page" value="<?php print esc_attr($flooring_bg_single_page) ?>"/>
									<input class="button" name="flooring_upload_title_page_bg" id="flooring_upload_title_page_bg" value="<?php echo esc_html__('Upload', 'flooring') ?>"/></br>
								</td>
								<td>
									<?php
									if (!empty($flooring_bg_single_page)): ?>
										<img src="<?php print esc_url($flooring_bg_single_page); ?>" style="max-height: 40px;"/> <?php endif;
									?>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__('Google Map Key', 'flooring'); ?></strong>
								</td>
								<?php

								$flooring_google_map_key = flooring_get_option('google_map_key', '');
								?>
								<td>
									<input type="text" name="google_map_key" id="google_map_key" value="<?php print esc_attr($flooring_google_map_key) ?>"/>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__('Show Cart', 'flooring'); ?></strong></td>
								<td>

									<input type="checkbox" <?php if (flooring_get_option('flooring_show_min_cart' ) == '1') echo 'checked'; ?>
									       name="flooring_show_min_cart" value="1" id="flooring_show_min_cart" class="cmn-toggle cmn-toggle-round"/>
									<label for="flooring_show_min_cart"></label></td>
							</tr>

							</tbody>
						</table>

					</div>

					<!---------------------------------- Color Setting ------------------------>
					<div id="tabs-1">
						<table class="form-table">
							<tbody>

							<tr>
								<td><strong><?php echo esc_html__('Primary Color:', 'flooring'); ?></strong></td>
								<td class='wd-color-picker'><?php $flooring_primary_color = flooring_get_option('flooring_primary_color', '');
									?>
									<input name="flooring_primary_color" type="text" value="<?php print esc_attr($flooring_primary_color); ?>" data-default-color="#83CA13">
									<span class="input-group-addon"><i></i></span>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__('Secondary Color:', 'flooring'); ?></strong></td>
								<td class='wd-color-picker'><?php $flooring_secondary_color = flooring_get_option('flooring_secondary_color', '');
									?>
									<input name="flooring_secondary_color" type="text" value="<?php print esc_attr($flooring_secondary_color); ?>" data-default-color="#2098D1">
									<span class="input-group-addon"><i></i></span>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__('Navigation background Color:', 'flooring'); ?></strong></td>
								<td class='wd-color-picker'><?php $flooring_nav_bg_color = flooring_get_option('flooring_nav_bg_color', '');
									?>
									<input name="flooring_nav_bg_color" type="text" value="<?php print esc_attr($flooring_nav_bg_color); ?>" data-default-color="#83CA13">
									<span class="input-group-addon"><i></i></span>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__('Menu Color:', 'flooring'); ?></strong></td>
								<td class='wd-color-picker'><?php $flooring_nav_color = flooring_get_option('flooring_nav_color', '');
									?>
									<input name="flooring_nav_color" type="text" value="<?php print esc_attr($flooring_nav_color); ?>" data-default-color="#83CA13">
									<span class="input-group-addon"><i></i></span>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__('Menu Active/Hover Color:', 'flooring'); ?></strong></td>
								<td class='wd-color-picker'><?php $flooring_nav_hover_color = flooring_get_option('flooring_nav_hover_color', '');
									?>
									<input name="flooring_nav_hover_color" type="text" value="<?php print esc_attr($flooring_nav_hover_color); ?>" data-default-color="#83CA13">
									<span class="input-group-addon"><i></i></span>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__('Navigation (sticky) background color', 'flooring'); ?></strong>
								</td>
								<td class='wd-color-picker'><?php $navigation_bg_color_sticky = flooring_get_option('navigation_bg_color_sticky'); ?>
									<input name="navigation_bg_color_sticky" type="text" value="<?php print esc_attr($navigation_bg_color_sticky); ?>" data-default-color="#C0392B">
									<span class="input-group-addon"><i></i></span>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__('Sticky Menu Color', 'flooring'); ?></strong>
								</td>
								<td class='wd-color-picker'><?php $navigation_color_sticky = flooring_get_option('navigation_color_sticky'); ?>
									<input name="navigation_color_sticky" type="text" value="<?php print esc_attr($navigation_color_sticky); ?>" data-default-color="#C0392B">
									<span class="input-group-addon"><i></i></span>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__('Sticky Active/Hover Color', 'flooring'); ?></strong>
								</td>
								<td class='wd-color-picker'><?php $navigation_color_hover_sticky = flooring_get_option('navigation_color_hover_sticky'); ?>
									<input name="navigation_color_hover_sticky" type="text" value="<?php print esc_attr($navigation_color_hover_sticky); ?>" data-default-color="#C0392B">
									<span class="input-group-addon"><i></i></span>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__('Footer Background Color', 'flooring'); ?></strong>
								</td>
								<td class='wd-color-picker'><?php $footer_bg_color = flooring_get_option('footer_bg_color'); ?>
									<input name="footer_bg_color" type="text" value="<?php print esc_attr($footer_bg_color); ?>" data-default-color="#383838">
									<span class="input-group-addon"><i></i></span>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__('Footer Text Color', 'flooring'); ?></strong>
								</td>
								<td class='wd-color-picker'><?php $footer_text_color = flooring_get_option('footer_text_color'); ?>
									<input name="footer_text_color" type="text" value="<?php print esc_attr($footer_text_color); ?>" data-default-color="#FFF">
									<span class="input-group-addon"><i></i></span>
								</td>
							</tr>

							</tbody>
						</table>
					</div>

					<!---------------------------------- Social Icon ------------------------>
					<div id="tabs-2">
						<table class="form-table">
							<tbody>
							<tr>
								<td><strong><?php echo esc_html__('Show Address Bar', 'flooring'); ?></strong></td>
								<td>

									<input type="checkbox" <?php if (flooring_get_option('flooring_show_adress_bar') == '1') print 'checked'; ?>
									       name="flooring_show_adress_bar" value="1" id="flooring_show_adress_bar" class="cmn-toggle cmn-toggle-round"/>
									<label for="flooring_show_adress_bar"></label></td>
							</tr>
							<?php
							$class_address_bar_items = (flooring_get_option('flooring_show_adress_bar') == '1') ? '' : 'hidden_item';
							?>
							<tr class="address_bar_item <?php echo esc_attr($class_address_bar_items); ?>">
								<td>
									<strong>Facebook</strong></td>
								<td>
									<input type="text" name="flooring_facebook" placeholder="<?php echo esc_html__('Your Facebook page link', 'flooring') ?>" value="<?php echo flooring_get_option('flooring_facebook', ''); ?>">
								</td>
							</tr>
							<tr class="address_bar_item <?php echo esc_attr($class_address_bar_items); ?>">
								<td>
									<strong>Twitter</strong></td>
								<td>
									<input type="text" name="flooring_twitter" placeholder="<?php echo esc_html__('Your Twitter page link', 'flooring') ?>" value="<?php echo flooring_get_option('flooring_twitter', ''); ?>">
								</td>
							</tr>
							<tr class="address_bar_item <?php echo esc_attr($class_address_bar_items); ?>">
								<td>
									<strong>Google +</strong></td>
								<td>
									<input type="text" name="flooring_google_plus" placeholder="<?php echo esc_html__('Your Google-plus page link', 'flooring') ?>" value="<?php echo flooring_get_option('flooring_google_plus', ''); ?>">
								</td>
							</tr>
							<tr class="address_bar_item <?php echo esc_attr($class_address_bar_items); ?>">
								<td>
									<strong>Phone Number</strong></td>
								<td>
									<input type="text" name="flooring_phone" placeholder="<?php echo esc_html__('Your Phone Number', 'flooring') ?>" value="<?php echo flooring_get_option('flooring_phone', ''); ?>">
								</td>
							</tr>
							</tbody>
						</table>
					</div>

					<!---------------------------------- Fonts Settings ------------------------>
					<div id="tabs-3">
						<table class="form-table">
							<tbody>
							<tr>
								<td>
									<strong><?php echo esc_html__('Main text font', 'flooring'); ?></strong>
								</td>
								<td>
									<?php $flooring_body_font_familly = flooring_get_option('flooring_body_font_familly');
									$flooring_fontArray = flooring_google_fonts_array();
									$selected_font = 'default';
									$selected_font_variants = $flooring_fontArray[0]['variants'];
									$selected_font_subsets = $flooring_fontArray[0]['subsets'];
									$selected_font_variants_weights = $flooring_fontArray[0]['variants'][0]['weight'];
									$selected_style = $flooring_fontArray[0]['variants'][0]['style'];
									$selected_weight = $flooring_fontArray[0]['variants'][0]['weight'][0];
									?>
									<table>
										<tbody>
										<tr>
											<td>
												<label for="flooring_body_font_familly"><?php echo esc_html__('Font family', 'flooring'); ?>
													:<br>
												</label>
											</td>
											<td>
												<select name="flooring_body_font_familly" id="flooring_body_font_familly" class="font_familly main_fonts" data-classes="main_fonts">
													<option value="Open Sans"><?php echo esc_html__('Open Sans', 'flooring'); ?></option>
													<?php foreach ($flooring_fontArray as $pititablo) {
														$font_name = $pititablo['name'];
														?>
														<option value="<?php echo esc_attr($font_name); ?>" <?php if (flooring_get_option('flooring_body_font_familly') == $font_name) {
															echo "selected='selected'";
															$selected_font = $font_name;
															$selected_font_variants = $pititablo['variants'];
															$selected_font_variants_weights = $pititablo['variants'][0]['weight'];
															$selected_font_subsets = $pititablo['subsets'];
														} ?> ><?php echo esc_attr($font_name); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_body_font_style"><?php echo esc_html__('Font style', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<select name="flooring_body_font_style" id="flooring_body_font_style" class="font_style main_fonts" data-classes="main_fonts">
													<?php
													if ($selected_font != 'default') {
														foreach ($selected_font_variants as $pititablo) {
															$font_style = $pititablo['style'];
															?>
															<option value="<?php echo esc_attr($font_style); ?>" <?php if (flooring_get_option('flooring_body_font_style') == $font_style) {
																echo "selected='selected'";
																$selected_font_variants_weights = $pititablo['weight'];
															} ?> ><?php echo esc_attr($font_style); ?></option>
														<?php }
													} else { ?>
														<option value="default"><?php echo esc_html__('Default', 'flooring'); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_body_font_weight"><?php echo esc_html__('Font weight', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<select name="flooring_body_font_weight" id="flooring_body_font_weight" class="font_weight main_fonts" data-classes="main_fonts">
													<?php
													if ($selected_font != 'default') {
														foreach ($selected_font_variants_weights as $pititablo) {
															$font_weight = $pititablo;
															?>
															<option value="<?php echo esc_attr($font_weight); ?>" <?php if (flooring_get_option('flooring_body_font_weight') == $font_weight)
																echo "selected='selected'"; ?> ><?php echo esc_attr(flooring_font_weight_name($font_weight)); ?></option>
														<?php }
													} else {
														for ($i = 100; $i < 1000; $i += 100) { ?>
															<option value="<?php echo esc_attr($i); ?>"><?php echo flooring_font_weight_name($i); ?></option>
														<?php }
													} ?>

												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_body_font_weight_list"><?php echo esc_html__('Font weights to load', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<select name="flooring_body_font_weight_list[]" class="font_weight_list main_fonts" data-classes="main_fonts" multiple style="height: 100%;">
													<?php
													$font_weight_list = explode(',', flooring_get_option('flooring_body_font_weight_list'));
													if ($selected_font != 'default') {
														foreach ($selected_font_variants as $style) {
															$style_flag = ($style['style'] == 'italic') ? 'i' : '';
															$style_name = ($style['style'] == 'italic') ? ' Italic' : '';
															$weighters = $style['weight'];
															for ($i = 0; $i < count($weighters); $i++) {
																$weights_touse = $weighters[$i] . $style_flag;
																$position = array_search($weights_touse, $font_weight_list);
																?>
																<option value="<?php echo esc_attr($weights_touse); ?>" <?php if ($position !== false)
																	echo "selected='selected'"; ?> ><?php echo esc_attr(flooring_font_weight_name($weighters[$i]) . ' ' . $style_name); ?></option>
																<?php
															}
															?>
														<?php }
													} else {
														for ($i = 100; $i < 1000; $i += 100) { ?>
															<option value="<?php echo esc_attr($i); ?>"><?php echo flooring_font_weight_name($i); ?></option>
														<?php }
													} ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_body_font_size"><?php echo esc_html__('Font size', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<input type="text" class="flooring_txt_big fonts_size main_fonts" name="flooring_body_font_size" placeholder="<?php echo esc_attr('example 12px', 'flooring'); ?>" value="<?php if (null !== flooring_get_option('flooring_body_font_size') && flooring_get_option('flooring_body_font_size') != '') {
													echo esc_attr(flooring_get_option('flooring_body_font_size'));
												} else {
													echo "12px";
												} ?>" data-classes="main_fonts">
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_main_text_lettre_spacing"><?php echo esc_html__('Lettre Spacing', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<?php
												$flooring_main_text_lettre_spacing = flooring_get_option('flooring_main_text_lettre_spacing');
												$flooring_main_text_lettre_spacing = (!empty($flooring_main_text_lettre_spacing)) ? flooring_get_option('flooring_main_text_lettre_spacing') : ''; ?>
												<input type="text" class="flooring_txt_big letter_spacing" name="flooring_main_text_lettre_spacing" placeholder="<?php echo esc_attr('example 1px', 'flooring') ?>" value="<?php echo esc_attr($flooring_main_text_lettre_spacing); ?>" data-classes="main_fonts">
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_main-text-font-subsets"><?php echo esc_html__('Font subsets', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<select id="flooring_main-text-font-subsets" name="flooring_main-text-font-subsets" class="font_subsets main_fonts" data-classes="main_fonts"><?php
													if ($selected_font != 'default') {
														foreach ($selected_font_subsets as $pititablo) {
															$font_subset = $pititablo;
															?>
															<option value="<?php echo esc_attr($font_subset); ?>" <?php if (flooring_get_option('flooring_main-text-font-subsets') == $font_subset)
																echo "selected='selected'"; ?> ><?php echo esc_attr($font_subset); ?></option>
														<?php }
													} else { ?>
														<option value="default"><?php echo esc_html__('Default', 'flooring'); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php echo esc_html__('Preview:', 'flooring'); ?> :</label>
											</td>
											<td> <?php $font_family = (flooring_get_option('flooring_body_font_familly') != "default") ? flooring_get_option('flooring_body_font_familly') : 'Open Sans'; ?>
												<p class="preview_result  main_fonts" <?php echo 'style="font-family: ' . $font_family . '; font-weight: ' . flooring_get_option('flooring_body_font_weight') . '; font-style: ' . flooring_get_option('flooring_body_font_style') . '; letter-spacing: ' . flooring_get_option('flooring_main_text_lettre_spacing') . ';';
												if (null !== flooring_get_option('flooring_body_font_size') && flooring_get_option('flooring_body_font_size') != '') {
													echo ';font-size: ' . flooring_get_option('flooring_body_font_size') . ';';
												} else {
													echo 'font-size:12px';
												}
												echo '"'; ?>><?php echo esc_html__('Sphinx of black quartz, judge my vow', 'flooring'); ?><br>
													<?php echo esc_html__('Sphinx of black quartz, judge my vow', 'flooring'); ?>
													<br><?php echo esc_html__('Sphinx of black quartz, judge my vow', 'flooring'); ?></p>
											</td>
										</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__('Head font family', 'flooring'); ?></strong>
								</td>
								<td>
									<?php
									$selected_font = 'default';
									$selected_font_variants = $flooring_fontArray[0]['variants'];
									$selected_font_subsets = $flooring_fontArray[0]['subsets'];
									$selected_font_variants_weights = $flooring_fontArray[0]['variants'][0]['weight'];
									$selected_style = $flooring_fontArray[0]['variants'][0]['style'];
									$selected_weight = $flooring_fontArray[0]['variants'][0]['weight'][0];
									?>
									<table>
										<tbody>
										<tr>
											<td>
												<label for="flooring_head_font_familly"><?php echo esc_html__('Font family', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<select name="flooring_head_font_familly" id="flooring_head_font_familly" class="font_familly heading_fonts" data-classes="heading_fonts">
													<option value="Open Sans"><?php echo esc_html__('Open Sans', 'flooring'); ?></option>
													<?php foreach ($flooring_fontArray as $pititablo) {
														$font_name = $pititablo['name'];
														?>
														<option value="<?php echo esc_attr($font_name); ?>" <?php if (flooring_get_option('flooring_head_font_familly') == $font_name) {
															echo "selected='selected'";
															$selected_font = $font_name;
															$selected_font_variants = $pititablo['variants'];
															$selected_font_variants_weights = $pititablo['variants'][0]['weight'];
															$selected_font_subsets = $pititablo['subsets'];
														} ?> ><?php echo esc_attr($font_name); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_head_font_style"><?php echo esc_html__('Font style', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<select name="flooring_head_font_style" id="flooring_head_font_style" class="font_style heading_fonts" data-classes="heading_fonts">
													<?php
													if ($selected_font != 'default') {
														foreach ($selected_font_variants as $pititablo) {
															$font_style = $pititablo['style'];
															?>
															<option value="<?php echo esc_attr($font_style); ?>" <?php if (flooring_get_option('flooring_head_font_style') == $font_style) {
																echo "selected='selected'";
																$selected_font_variants_weights = $pititablo['weight'];
															} ?> ><?php echo esc_attr($font_style); ?></option>
														<?php }
													} else { ?>
														<option value="default"><?php echo esc_html__('Default', 'flooring'); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_heading-font-weight-style"><?php echo esc_html__('Font weight', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<select name="flooring_heading-font-weight-style" id="flooring_heading-font-weight-style" class="font_weight heading_fonts" data-classes="heading_fonts">
													<?php
													if ($selected_font != 'default') {
														foreach ($selected_font_variants_weights as $pititablo) {
															$font_weight = $pititablo;
															?>
															<option value="<?php echo esc_attr($font_weight); ?>" <?php if (flooring_get_option('flooring_heading-font-weight-style') == $font_weight)
																echo "selected='selected'"; ?> ><?php echo esc_attr(flooring_font_weight_name($font_weight)); ?></option>
														<?php }
													} else {
														for ($i = 100; $i < 1000; $i += 100) { ?>
															<option value="<?php echo esc_attr($i); ?>"><?php echo esc_attr(flooring_font_weight_name($i)); ?></option>
														<?php }
													} ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_heading-font-weight-style-list"><?php echo esc_html__('Font weights to load', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<select name="flooring_heading-font-weight-style-list[]" class="font_weight_list main_fonts" data-classes="main_fonts" multiple style='height: 100%;'>
													<?php
													$font_weight_list = explode(',', flooring_get_option('flooring_heading-font-weight-style-list'));
													if ($selected_font != 'default') {
														foreach ($selected_font_variants as $style) {
															$style_flag = ($style['style'] == 'italic') ? 'i' : '';
															$style_name = ($style['style'] == 'italic') ? ' Italic' : '';
															$weighters = $style['weight'];
															for ($i = 0; $i < count($weighters); $i++) {
																$weights_touse = $weighters[$i] . $style_flag;
																$position = array_search($weights_touse, $font_weight_list);
																?>
																<option value="<?php echo esc_attr($weights_touse); ?>" <?php if ($position !== false)
																	echo "selected='selected'"; ?> ><?php echo esc_attr(flooring_font_weight_name($weighters[$i]) . ' ' . $style_name); ?></option>
																<?php
															}
															?>
														<?php }
													} else {
														for ($i = 100; $i < 1000; $i += 100) { ?>
															<option value="<?php echo esc_attr($i); ?>"><?php echo esc_attr(flooring_font_weight_name($i)); ?></option>
														<?php }
													} ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_head_font_size"><?php echo esc_html__('Font size', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<input type="text" class="flooring_txt_big fonts_size heading_fonts" name="flooring_head_font_size" placeholder="<?php echo esc_attr('example 12px', 'flooring'); ?>" value="<?php if (null !== flooring_get_option('flooring_head_font_size') && flooring_get_option('flooring_head_font_size') != '') {
													echo esc_attr(flooring_get_option('flooring_head_font_size'));
												} else {
													echo "12px";
												} ?>" data-classes="heading_fonts">
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_heading_text_lettre_spacing"><?php echo esc_html__('Lettre Spacing', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<?php
												$flooring_heading_text_lettre_spacing = flooring_get_option('flooring_heading_text_lettre_spacing');
												$flooring_heading_text_lettre_spacing = (!empty($flooring_heading_text_lettre_spacing)) ? flooring_get_option('flooring_heading_text_lettre_spacing') : ''; ?>
												<input type="text" class="flooring_txt_big letter_spacing" name="flooring_heading_text_lettre_spacing" placeholder="<?php echo esc_attr('example 1px', 'flooring'); ?>" value="<?php echo esc_attr($flooring_heading_text_lettre_spacing); ?>" data-classes="heading_fonts">
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_heading-text-font-subsets"><?php echo esc_html__('Font subsets', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<select id="flooring_heading-text-font-subsets" name="flooring_heading-text-font-subsets" class="font_subsets heading_fonts" data-classes="heading_fonts"><?php
													if ($selected_font != 'default') {
														foreach ($selected_font_subsets as $pititablo) {
															$font_subset = $pititablo;
															?>
															<option value="<?php echo esc_attr($font_subset); ?>" <?php if (flooring_get_option('flooring_heading-text-font-subsets') == $font_subset)
																echo "selected='selected'"; ?> ><?php echo esc_attr($font_subset); ?></option>
														<?php }
													} else { ?>
														<option value="default"><?php echo esc_html__('Default', 'flooring'); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php echo esc_html__('Preview:', 'flooring'); ?> :</label>
											</td>
											<td><?php $font_family = (flooring_get_option('flooring_body_font_familly') != "default") ? flooring_get_option('flooring_body_font_familly') : 'Open Sans'; ?>
												<p class="preview_result heading_fonts"
												   <?php echo 'style="font-family: ' . $font_family . '; font-weight: ' . flooring_get_option('flooring_heading-font-weight-style') . '; font-style: ' . flooring_get_option('flooring_head_font_style') . '; letter-spacing: ' . flooring_get_option('flooring_heading_text_lettre_spacing') . ';';
												   if (null !== flooring_get_option('flooring_head_font_size') && flooring_get_option('flooring_head_font_size') != '') {
													   echo ';font-size: ' . flooring_get_option('flooring_head_font_size') . ';';
												   } else {
													   echo 'font-size:12px';
												   } ?>;"><?php echo esc_html__('Sphinx of black quartz, judge my vow', 'flooring'); ?><br>
												<?php echo esc_html__('Sphinx of black quartz, judge my vow', 'flooring'); ?><br>
												<?php echo esc_html__('Sphinx of black quartz, judge my vow', 'flooring'); ?><br></p>
											</td>
										</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__('Navigation font family', 'flooring'); ?></strong>
								</td>
								<td>
									<?php
									$selected_font = 'default';
									$selected_font_variants = $flooring_fontArray[0]['variants'];
									$selected_font_subsets = $flooring_fontArray[0]['subsets'];
									$selected_font_variants_weights = $flooring_fontArray[0]['variants'][0]['weight'];
									$selected_style = $flooring_fontArray[0]['variants'][0]['style'];
									$selected_weight = $flooring_fontArray[0]['variants'][0]['weight'][0];
									?>
									<table>
										<tbody>
										<tr>
											<td>
												<label for="flooring_navigation_font_familly"><?php echo esc_html__('Font family', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<select name="flooring_navigation_font_familly" id="flooring_navigation_font_familly" class="font_familly navigation_fonts" data-classes="navigation_fonts">
													<option value="Open Sans"><?php echo esc_html__('Open Sans', 'flooring'); ?></option>
													<?php foreach ($flooring_fontArray as $pititablo) {
														$font_name = $pititablo['name'];
														?>
														<option value="<?php echo esc_attr($font_name); ?>" <?php if (flooring_get_option('flooring_navigation_font_familly') == $font_name) {
															echo "selected='selected'";
															$selected_font = $font_name;
															$selected_font_variants = $pititablo['variants'];
															$selected_font_variants_weights = $pititablo['variants'][0]['weight'];
															$selected_font_subsets = $pititablo['subsets'];
														} ?> ><?php echo esc_attr($font_name); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_navigation_font_style"><?php echo esc_html__('Font style', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<select name="flooring_navigation_font_style" id="flooring_head_font_style" class="font_style navigation_fonts" data-classes="navigation_fonts">
													<?php
													if ($selected_font != 'default') {
														foreach ($selected_font_variants as $pititablo) {
															$font_style = $pititablo['style'];
															?>
															<option value="<?php echo esc_attr($font_style); ?>" <?php if (flooring_get_option('flooring_navigation_font_style') == $font_style) {
																echo "selected='selected'";
																$selected_font_variants_weights = $pititablo['weight'];
															} ?> ><?php echo esc_attr($font_style); ?></option>
														<?php }
													} else { ?>
														<option value="default"><?php echo esc_html__('Default', 'flooring'); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label
													for="flooring_navigation-font-weight-style"><?php echo esc_html__('Font weight', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<select name="flooring_navigation-font-weight-style" id="flooring_navigation-font-weight-style" class="font_weight navigation_fonts" data-classes="navigation_fonts">
													<?php
													if ($selected_font != 'default') {
														foreach ($selected_font_variants_weights as $pititablo) {
															$font_weight = $pititablo;
															?>
															<option value="<?php echo esc_attr($font_weight); ?>" <?php if (flooring_get_option('flooring_navigation-font-weight-style') == $font_weight)
																echo "selected='selected'"; ?> ><?php echo esc_attr(flooring_font_weight_name($font_weight)); ?></option>
														<?php }
													} else {
														for ($i = 100; $i < 1000; $i += 100) { ?>
															<option value="<?php echo esc_attr($i); ?>"><?php echo esc_attr(flooring_font_weight_name($i)); ?></option>
														<?php }
													} ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_navigation-font-weight-style-list"><?php echo esc_html__('Font weights to load', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<select name="flooring_navigation-font-weight-style-list[]" class="font_weight_list main_fonts" data-classes="main_fonts" multiple style='height: 100%;'>
													<?php
													$font_weight_list = explode(',', flooring_get_option('flooring_navigation-font-weight-style-list'));
													if ($selected_font != 'default') {
														foreach ($selected_font_variants as $style) {
															$style_flag = ($style['style'] == 'italic') ? 'i' : '';
															$style_name = ($style['style'] == 'italic') ? ' Italic' : '';
															$weighters = $style['weight'];
															for ($i = 0; $i < count($weighters); $i++) {
																$weights_touse = $weighters[$i] . $style_flag;
																$position = array_search($weights_touse, $font_weight_list);
																?>
																<option value="<?php echo esc_attr($weights_touse); ?>" <?php if ($position !== false)
																	echo "selected='selected'"; ?> ><?php echo esc_attr(flooring_font_weight_name($weighters[$i]) . ' ' . $style_name); ?></option>
																<?php
															}
															?>
														<?php }
													} else {
														for ($i = 100; $i < 1000; $i += 100) { ?>
															<option value="<?php echo esc_attr($i); ?>"><?php echo esc_attr(flooring_font_weight_name($i)); ?></option>
														<?php }
													} ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_navigation_font_size"><?php echo esc_html__('Font size', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<input type="text" class="flooring_txt_big fonts_size navigation_fonts" name="flooring_navigation_font_size" placeholder="<?php echo esc_attr('example 12px', 'flooring'); ?>" value="<?php if (null !== flooring_get_option('flooring_navigation_font_size') && flooring_get_option('flooring_navigation_font_size') != '') {
													echo esc_attr(flooring_get_option('flooring_navigation_font_size'));
												} else {
													echo "12px";
												} ?>" data-classes="navigation_fonts">
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_navigation_text_lettre_spacing"><?php echo esc_html__('Lettre Spacing', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<?php
												$flooring_navigation_text_lettre_spacing = flooring_get_option('flooring_navigation_text_lettre_spacing');
												$flooring_navigation_text_lettre_spacing = (!empty($flooring_navigation_text_lettre_spacing)) ? flooring_get_option('flooring_navigation_text_lettre_spacing') : ''; ?>
												<input type="text" class="flooring_txt_big letter_spacing" name="flooring_navigation_text_lettre_spacing" placeholder="<?php echo esc_attr('example 1px', 'flooring'); ?>" value="<?php echo esc_attr($flooring_navigation_text_lettre_spacing); ?>" data-classes="navigation_fonts">
											</td>
										</tr>
										<tr>
											<td>
												<label for="flooring_navigation-text-font-subsets"><?php echo esc_html__('Font subsets', 'flooring'); ?>
													:</label>
											</td>
											<td>
												<select id="flooring_navigation-text-font-subsets" name="flooring_navigation-text-font-subsets" class="font_subsets navigation_fonts" data-classes="navigation_fonts"><?php
													if ($selected_font != 'default') {
														foreach ($selected_font_subsets as $pititablo) {
															$font_subset = $pititablo;
															?>
															<option value="<?php echo esc_attr($font_subset); ?>" <?php if (flooring_get_option('flooring_navigation-text-font-subsets') == $font_subset)
																echo "selected='selected'"; ?> ><?php echo esc_attr($font_subset); ?></option>
														<?php }
													} else { ?>
														<option value="default"><?php echo esc_html__('Default', 'flooring'); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php echo esc_html__('Preview:', 'flooring'); ?> :</label>
											</td>
											<td><?php $font_family = (flooring_get_option('flooring_body_font_familly') != "default") ? flooring_get_option('flooring_body_font_familly') : 'Open Sans'; ?>
												<p class="preview_result navigation_fonts"
												   <?php echo 'style="font-family: ' . $font_family . '; font-weight: ' . flooring_get_option('flooring_navigation-font-weight-style') . '; font-style: ' . flooring_get_option('flooring_navigation_font_style') . '; letter-spacing: ' . flooring_get_option('flooring_navigation_text_lettre_spacing') . ';';
												   if (null !== flooring_get_option('flooring_navigation_font_size') && flooring_get_option('flooring_navigation_font_size') != '') {
													   echo ';font-size: ' . flooring_get_option('flooring_navigation_font_size') . ';';
												   } else {
													   echo 'font-size:12px';
												   } ?>;"><?php echo esc_html__('Sphinx of black quartz, judge my vow', 'flooring'); ?><br>
												<?php echo esc_html__('Sphinx of black quartz, judge my vow', 'flooring'); ?><br>
												<?php echo esc_html__('Sphinx of black quartz, judge my vow', 'flooring'); ?><br></p>
											</td>
										</tr>
										</tbody>
									</table>
								</td>
							</tr>

							</tbody>
						</table>
					</div>

					<!---------------------------------- Custom css & js ------------------------>
					<div id="tabs-4">
						<table class="form-table">
							<tbody>
							<tr>
								<td>
									<strong><?php echo esc_html__('Custom css', 'flooring'); ?></strong>
								</td>
								<td>
									<textarea rows="10" cols="70" name="flooring_theme_custom_css" placeholder="<?php echo esc_html__('Put your style here', 'flooring') ?>"><?php echo flooring_get_option('flooring_theme_custom_css', ''); ?></textarea>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__('Custom JavaScript', 'flooring') ?></strong>
								</td>

								<td>
									<textarea rows="10" cols="70" name="flooring_theme_custom_js" placeholder="<?php echo esc_html__('Put your JavaScript here', 'flooring') ?>"><?php echo flooring_get_option('flooring_theme_custom_js', ''); ?></textarea>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
					<!---------------------------------- Footer Settings ------------------------>
					<div id="tabs-5">
						<table class="form-table">
							<tbody>
							<tr>
								<td><strong><?php echo esc_html__('Footer columns', 'flooring'); ?></strong></td>
								<td class="flooring_footer_columns">
									<?php $flooring_footer_columns = flooring_get_option('flooring_footer_columns', 'three_columns');

									?>
									<input type="radio" id="flooring_footer1" name="flooring_footer_columns" value="one_columns" checked="<?php if ($flooring_footer_columns == 'one_columns') {
										echo 'checked';
									} ?>"/>
									<label for="flooring_footer1" class="flooring_footer1 <?php if ($flooring_footer_columns == 'one_columns') {
										echo 'label_selected ';
									} ?>"></label>

									<input type="radio" id="flooring_footer2" name="flooring_footer_columns" value="tow_a_columns" checked="<?php if ($flooring_footer_columns == 'tow_a_columns') {
										echo 'checked';
									} ?>"/>
									<label for="flooring_footer2" class="flooring_footer2 <?php if ($flooring_footer_columns == 'tow_a_columns') {
										echo 'label_selected ';
									} ?>"></label>

									<input type="radio" id="flooring_footer3" name="flooring_footer_columns" value="tow_b_columns" checked="<?php if ($flooring_footer_columns == 'tow_b_columns') {
										echo 'checked';
									} ?>"/>
									<label for="flooring_footer3" class="flooring_footer3 <?php if ($flooring_footer_columns == 'tow_b_columns') {
										echo 'label_selected ';
									} ?>"></label>

									<input type="radio" id="flooring_footer4" name="flooring_footer_columns" value="tow_c_columns" checked="<?php if ($flooring_footer_columns == 'tow_c_columns') {
										echo 'checked';
									} ?>"/>
									<label for="flooring_footer4" class="flooring_footer4 <?php if ($flooring_footer_columns == 'tow_c_columns') {
										echo 'label_selected ';
									} ?>"></label>

									<input type="radio" id="flooring_footer5" name="flooring_footer_columns" value="three_columns" checked="<?php if ($flooring_footer_columns == 'three_columns') {
										echo 'checked';
									} ?>"/>
									<label for="flooring_footer5" class="flooring_footer5 <?php if ($flooring_footer_columns == 'three_columns') {
										echo 'label_selected';
									} ?>"></label>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__('Footer Background', 'flooring'); ?></strong>
								</td>
								<?php
								$flooring_footer_path = flooring_get_option('flooring_footer_bg_path', '');
								?>
								<td>
									<input type="text" name="flooring_footer_bg_path" id="flooring_footer_bg_path" value="<?php print esc_attr($flooring_footer_path) ?>"/>
									<input class="button" name="_flooring_upload_bg_btn" id="flooring_upload_bg_btn" value="<?php echo esc_html__('Upload', 'flooring') ?>"/></br>
								</td>
								<td>
									<?php
									if (!empty($flooring_footer_path)): ?>
										<img src="<?php print esc_url($flooring_footer_path); ?>" style="max-height: 70px;"/> <?php endif;
									?>
								</td>
							</tr>

							<tr>
								<td>
									<strong><?php echo esc_html__('Footer Copyright text', 'flooring'); ?></strong>
								</td>
								<td>
									<?php
									$flooring_copyright = flooring_get_option('flooring_copyright', ''); ?>
									<textarea class="flooring_txt_big" name="flooring_copyright" placeholder="<?php echo esc_html__('Footer Copyright text', 'flooring') ?>"><?php echo html_entity_decode($flooring_copyright); ?></textarea>
								</td>
							</tr>
							</tbody>
						</table>
					</div>

					<!---------------------------------- Wd Importer ------------------------>
					<?php
					if (class_exists('WebdeviaMainPlugin')) {
						?>
						<div id="tabs-6">
							<div id="wd-metaboxes-general" class="wrap wd-page wd-page-info" style="padding: 20px;background-color: #FFF;">
								<table class="form-table">
									<tbody>
									<tr>
										<td style="display: none;"></td>
										<td class="import-demo-screenshot" style="padding-left: 250px;">

											<em class="wd-field-description"><?php echo esc_html__('Select demo to import', 'flooring'); ?>
												: </em>
											<select name="Demo_selector" id="Demo_selector" class="form-control wd-form-element">
												<option value="demo-1">Demo 1</option>
												<option value="demo-2">Demo 2</option>
											</select><br>
											<label class="demo-1 demos_label" for="demo-1"></label>
											<label class="demo-2 demos_label" for="demo-2" style="display: none"></label>
										</td>
									</tr>
									<tr>
										<td style="display:none;">

										</td>
										<td style="padding-left: 250px;">
											<em class="wd-field-description"><?php echo esc_html__('Import Type', 'flooring'); ?> : </em>
											<select name="import_option" id="import_option" class="form-control wd-form-element">
												<option value=""><?php echo esc_html__('Please Select', 'flooring'); ?></option>
												<option value="complete_content"><?php echo esc_html__('All', 'flooring'); ?></option>
												<option value="content"><?php echo esc_html__('Content', 'flooring'); ?></option>
												<option value="widgets"><?php echo esc_html__('Widgets', 'flooring'); ?></option>
												<option value="options"><?php echo esc_html__('Options', 'flooring'); ?></option>
												<option value="menus"><?php echo esc_html__('Menus', 'flooring'); ?></option>
											</select>
										</td>
									</tr>
									<tr id="tr_import_attachments" style="display:none;">
										<td style="display: none;">
										</td>
										<td style="padding-left: 250px;">
											<p><?php echo esc_html__('Do you want to import media files?', 'flooring'); ?></p>
											<input type="checkbox" value="1" class="wd-form-element" name="import_attachments" id="import_attachments"/>
										</td>
									</tr>
									<tr id="tr_delete_menus" style="display:none;">
										<td style="display: none;">
										</td>
										<td style="padding-left: 250px;">
											<p><?php echo esc_html__('Do you want to delete all existing menus?', 'flooring'); ?></p>
											<input type="checkbox" value="1" class="wd-form-element" name="delete_menus" id="delete_menus"/>
										</td>
									</tr>
									<tr>
										<td style="display: none;">

										</td>
										<td style="padding-left: 250px;">
											<input type="submit" class="button button-primary" value="<?php echo esc_html__('Import', 'flooring'); ?>" name="import" id="import_demo_data"/>
											<img id="loading_gif" src="<?php echo get_template_directory_uri() . '/images/loading.gif'; ?>" style="margin-left:20px; display:none"/>
											<img id="OK_result" src="<?php echo get_template_directory_uri() . '/images/OK_result.png'; ?>" style="margin-left:20px; display:none"/>
											<img id="NOK_result" src="<?php echo get_template_directory_uri() . '/images/NOK_result.png'; ?>" style="margin-left:20px; display:none"/>
										</td>
									</tr>
									<tr>
										<td style="display: none;">
										</td>
										<td style="padding-left: 250px;">
											<span><?php esc_html_e('The import process may take some time. Please be patient.', 'flooring') ?> </span><br/>
											<div class="import_load">
												<div class="wd-progress-bar-wrapper html5-progress-bar">
													<div class="progress-bar-wrapper">
														<progress id="progressbar" value="0" max="100"></progress>
													</div>
													<div class="progress-value">0%</div>
													<div class="progress-bar-message"></div>
													<div class="error-message" style="color:#990000; font-weight:bold;"></div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td style="display: none;"></td>
										<td style="text-align: center;">
											<div class="alert alert-warning">
												<strong><?php esc_html_e('Important notes:', 'flooring') ?></strong>
												<ul>
													<li><?php esc_html_e('Please note that import process will take time needed to download all attachments from demo web site.', 'flooring'); ?></li>
													<li> <?php _e('If you plan to use shop, please install <b>WooCommerce</b> before you run import.', 'flooring') ?></li>
												</ul>
											</div>
										</td>
									</tr>
									</tbody>
								</table>
							</div>


							<script type="text/javascript">
								jQuery(document).ready(function () {
									jQuery(document).on('change', '#Demo_selector', function () {
										jQuery(".demos_label").hide();
										jQuery(".demos_label." + jQuery(this).val()).show();
									});
									jQuery(document).on('change', '#import_option', function () {
										if (jQuery(this).val() == 'content') {
											jQuery("#tr_import_attachments").show();
											jQuery("#tr_delete_menus").hide();
										} else if (jQuery(this).val() == 'widgets') {
											jQuery("#tr_import_attachments").hide();
											jQuery("#tr_delete_menus").hide();
										} else if (jQuery(this).val() == 'menus') {
											jQuery("#tr_import_attachments").hide();
											jQuery("#tr_delete_menus").show();
										} else if (jQuery(this).val() == 'complete_content') {
											jQuery("#tr_import_attachments").show();
											jQuery("#tr_delete_menus").show();
										} else {
											jQuery("#tr_import_attachments").hide();
											jQuery("#tr_delete_menus").hide();
										}
									});
									jQuery(document).on('click', '#import_demo_data', function (e) {
										e.preventDefault();

										if (jQuery("#import_option").val() == "") {
											alert('Please select Import Type.');
											return false;
										}
										if (confirm('Are you sure, you want to import Demo Data now?')) {
											jQuery('.import_load').css('display', 'block');
											var progressbar = jQuery('#progressbar');
											var import_opt = jQuery("#import_option").val();
											var import_expl = jQuery("#Demo_selector").val();
											var p = 0;

											jQuery('.progress-value').html((0) + '%');
											progressbar.val(0);
											jQuery('.progress-bar-message').html('');
											jQuery('.error-message').html('');
											jQuery('#loading_gif').css({display: "inline"});
											jQuery('#OK_result').css({display: "none"});
											jQuery('#NOK_result').css({display: "none"});
											if (import_opt == 'content') {
												for (var i = 1; i <= 10; i++) {
													var str;
													if (i < 10) str = 'demo-file-0' + i + '.xml';
													else str = 'demo-file-' + i + '.xml';
													jQuery.ajax({
														type: 'POST',
														url: ajaxurl,
														data: {
															action: 'flooring_dataImport',
															xml: str,
															example: import_expl,
															import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0)
														},
														success: function (data, textStatus, XMLHttpRequest) {
															console.log('Success!!' + data);
															p += 10;
															jQuery('.progress-value').html((p) + '%');
															progressbar.val(p);
															if (p == 90) {
																str = 'demo-file-10.xml';
																jQuery.ajax({
																	type: 'POST',
																	url: ajaxurl,
																	data: {
																		action: 'flooring_dataImport',
																		xml: str,
																		example: import_expl,
																		import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0)
																	},
																	success: function (data, textStatus, XMLHttpRequest) {
																		p += 10;
																		jQuery('.progress-value').html((p) + '%');
																		progressbar.val(p);
																		jQuery('.progress-bar-message').html('<div class="alert alert-success"><strong>Import is completed</strong></div>');
																		jQuery('#loading_gif').css({display: "none"});
																		jQuery('#OK_result').css({display: "inline"});
																	},
																	error: function (MLHttpRequest, textStatus, errorThrown) {
																		jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
																		jQuery('#loading_gif').css({display: "none"});
																		jQuery('#NOK_result').css({display: "inline"});
																	}
																});
															}
														},
														error: function (MLHttpRequest, textStatus, errorThrown) {
															jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
															jQuery('#loading_gif').css({display: "none"});
															jQuery('#NOK_result').css({display: "inline"});
															console.log('Error!!');
														}
													});
												}
											} else if (import_opt == 'widgets') {
												jQuery.ajax({
													type: 'POST',
													url: ajaxurl,
													data: {
														action: 'flooring_widgetsImport',
														example: import_expl
													},
													success: function (data, textStatus, XMLHttpRequest) {
														console.log('widgets imported');
														jQuery('.progress-value').html((100) + '%');
														progressbar.val(100);
														jQuery('.progress-bar-message').html('<div class="alert alert-success"><strong>Widgets import is completed</strong></div>');
														jQuery('#loading_gif').css({display: "none"});
														jQuery('#OK_result').css({display: "inline"});
													},
													error: function (MLHttpRequest, textStatus, errorThrown) {
														jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
														jQuery('#loading_gif').css({display: "none"});
														jQuery('#NOK_result').css({display: "inline"});
													}
												});
											} else if (import_opt == 'menus') {
												jQuery.ajax({
													type: 'POST',
													url: ajaxurl,
													data: {
														action: 'flooring_menuImport',
														example: import_expl,
														delete_menus: (jQuery("#delete_menus").is(':checked') ? 1 : 0)
													},
													success: function (data, textStatus, XMLHttpRequest) {
														console.log('Menus imported' + data);
														jQuery('.progress-value').html((100) + '%');
														progressbar.val(100);
														jQuery('.progress-bar-message').html('<div class="alert alert-success"><strong>Menus import is completed</strong></div>');
														jQuery('#loading_gif').css({display: "none"});
														jQuery('#OK_result').css({display: "inline"});
													},
													error: function (MLHttpRequest, textStatus, errorThrown) {
														jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
														jQuery('#loading_gif').css({display: "none"});
														jQuery('#NOK_result').css({display: "inline"});
													}
												});
											} else if (import_opt == 'options') {
												jQuery.ajax({
													type: 'POST',
													url: ajaxurl,
													data: {
														action: 'flooring_import_options',
														example: import_expl
													},
													success: function (data, textStatus, XMLHttpRequest) {
														console.log('options imported');
														jQuery('.progress-value').html((100) + '%');
														progressbar.val(100);
														jQuery('.progress-bar-message').html('<div class="alert alert-success"><strong>Options import is completed</strong></div>');
														jQuery('#loading_gif').css({display: "none"});
														jQuery('#OK_result').css({display: "inline"});
													},
													error: function (MLHttpRequest, textStatus, errorThrown) {
														jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
														jQuery('#loading_gif').css({display: "none"});
														jQuery('#NOK_result').css({display: "inline"});
													}
												});
											} else if (import_opt == 'complete_content') {
												for (var i = 1; i < 10; i++) {
													var str;
													if (i < 10) str = 'demo-file-0' + i + '.xml';
													else str = 'demo-file-' + i + '.xml';
													jQuery.ajax({
														type: 'POST',
														url: ajaxurl,
														data: {
															action: 'flooring_dataImport',
															xml: str,
															example: import_expl,
															import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0)
														},
														success: function (data, textStatus, XMLHttpRequest) {
															p += 7;
															jQuery('.progress-value').html((p) + '%');
															progressbar.val(p);
															if (p == 63) {
																str = 'demo-file-10.xml';
																jQuery.ajax({
																	type: 'POST',
																	url: ajaxurl,
																	data: {
																		action: 'flooring_dataImport',
																		xml: str,
																		example: import_expl,
																		import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0)
																	},
																	success: function (data, textStatus, XMLHttpRequest) {
																		p += 7;
																		jQuery('.progress-value').html((p) + '%');
																		progressbar.val(p);
																		jQuery('.progress-bar-message').append('<div class="alert alert-success">Content imported</div>');
																		jQuery.ajax({
																			type: 'POST',
																			url: ajaxurl,
																			data: {
																				action: 'flooring_import_options',
																				example: import_expl
																			},
																			success: function (data, textStatus, XMLHttpRequest) {
																				p += 7;
																				jQuery('.progress-value').html((p) + '%');
																				progressbar.val(p);
																				jQuery('.progress-bar-message').append('<div class="alert alert-success">Options imported</div>');
																				console.log('options imported');
																				jQuery.ajax({
																					type: 'POST',
																					url: ajaxurl,
																					data: {
																						action: 'flooring_widgetsImport',
																						example: import_expl
																					},
																					success: function (data, textStatus, XMLHttpRequest) {
																						p += 7;
																						jQuery('.progress-value').html((p) + '%');
																						progressbar.val(p);
																						jQuery('.progress-bar-message').append('<div class="alert alert-success">Widgets imported</div>');

																						str = 'menus.xml';
																						jQuery.ajax({
																							type: 'POST',
																							url: ajaxurl,
																							data: {
																								action: 'flooring_menuImport',
																								xml: str,
																								example: import_expl,
																								import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0),
																								delete_menus: (jQuery("#delete_menus").is(':checked') ? 1 : 0)
																							},
																							success: function (data, textStatus, XMLHttpRequest) {
																								p += 7;
																								jQuery('.progress-value').html((p) + '%');
																								progressbar.val(p);
																								jQuery('.progress-bar-message').append('<div class="alert alert-success">Menus imported</div>');
																								console.log("menu imported");
																								jQuery.ajax({
																									type: 'POST',
																									url: ajaxurl,
																									data: {
																										action: 'flooring_otherImport',
																										example: import_expl,
																										delete_menus: (jQuery("#delete_menus").is(':checked') ? 1 : 0)
																									},
																									success: function (data, textStatus, XMLHttpRequest) {
																										jQuery('.progress-value').html((100) + '%');
																										progressbar.val(100);
																										jQuery('.progress-bar-message').append('<div class="alert alert-success"><strong>Import is completed.</strong></div>');
																										jQuery('#loading_gif').css({display: "none"});
																										jQuery('#OK_result').css({display: "inline"});
																									},
																									error: function (MLHttpRequest, textStatus, errorThrown) {
																										jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
																										jQuery('#loading_gif').css({display: "none"});
																										jQuery('#NOK_result').css({display: "inline"});
																									}
																								});
																							},
																							error: function (MLHttpRequest, textStatus, errorThrown) {
																								jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
																								jQuery('#loading_gif').css({display: "none"});
																								jQuery('#NOK_result').css({display: "inline"});
																							}
																						});

																					},
																					error: function (MLHttpRequest, textStatus, errorThrown) {
																						jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
																						jQuery('#loading_gif').css({display: "none"});
																						jQuery('#NOK_result').css({display: "inline"});
																					}
																				});
																			},
																			error: function (MLHttpRequest, textStatus, errorThrown) {
																				jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
																				jQuery('#loading_gif').css({display: "none"});
																				jQuery('#NOK_result').css({display: "inline"});
																			}
																		});
																	},
																	error: function (MLHttpRequest, textStatus, errorThrown) {
																		jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
																		jQuery('#loading_gif').css({display: "none"});
																		jQuery('#NOK_result').css({display: "inline"});
																	}
																});
															}
														},
														error: function (MLHttpRequest, textStatus, errorThrown) {
															jQuery('.error-message').html(get_error_from_response(MLHttpRequest));
															jQuery('#loading_gif').css({display: "none"});
															jQuery('#NOK_result').css({display: "inline"});
														}
													});
												}


											}
										}
										return false;
									});
								});

								function get_error_from_response(response) {
									var responseText = response.responseText.replace('{', '');
									responseText = responseText.replace('}', '');
									var trainindIdArray = responseText.split(':');
									responseText = trainindIdArray[trainindIdArray.length - 1].replace('"', '').replace('"', '');
									return responseText;
								}
							</script>

						</div>
					<?php } ?>
				</div>
		</div>
		<div class="eight columns wp-core-ui">
			<p>
				<button type="submit" name="search" value="Update Options" class="button success button-primary"/>
				<?php echo esc_html__('Update Options', 'flooring'); ?></button></p>
		</div>
		</form>
		</div>


		<div style="clear: both;">
			<br/><br/><br/><br/><br/><br/>
		</div>


		<div class="wb-item">
			<div class="icon-themes">

			</div>
		</div>
		<?php
	}
}


if (!function_exists('flooring_import_revslider')) {
	function flooring_import_revslider() {

		wp_enqueue_media();

		wp_enqueue_script('wp-color-picker');
		wp_enqueue_style('wp-color-picker');


		wp_enqueue_script('colorpick', get_template_directory_uri() . "/js/bootstrap-colorpicker.min.js", array('jquery'));
		wp_enqueue_style('colorpick', get_template_directory_uri() . "/css/bootstrap-colorpicker.min.css");
		?>

		<div class="panel-logo">
			<h2>Voip Revsliders Import</h2>
		</div>
		<div class="wd-cpanel">
			<div id="wd-Panel" method="POST" action="">
				<div id="tabs" class="ui-tabs-vertical ui-helper-clearfix">
					<div id="tabs-7">
						<form action="<?php echo admin_url("admin-ajax.php"); ?>" enctype="multipart/form-data" method="post">
							<div id="wd-metaboxes-general" class="wrap wd-page wd-page-info" style="padding: 20px;background-color: #FFF;">
								<table class="form-table">
									<tbody>
									<tr>
										<td style="display:none;">
											<input type="hidden" name="action" value="revslider_ajax_action">
											<input type="hidden" name="client_action" value="import_slider_slidersview">
											<input type="hidden" name="nonce" value="<?php echo wp_create_nonce("revslider_actions"); ?>">
										</td>
										<td style="padding-left: 250px;">
											<?php _e("Choose the import file : You can select the demo file \"zip file\" inside the folder \"wp-content\\themes\\flooring\\inc\\revslider_import_files\\\" ", 'flooring'); ?>
											:
											<br><br>
											<input type="file" size="60" name="import_file" class="input_import_slider" id="input_import_slider"><br><br>

											<span style="font-weight: 700;"><?php esc_html_e("Note: styles templates will be updated if they exist!", 'flooring'); ?>
										</td>
									</tr>
									<tr>
										<td style="display: none;">
										</td>
										<td style="padding-left: 250px;"><?php esc_html_e("Custom Animations:", 'flooring'); ?><br><br>
											<input type="radio" name="update_animations" value="true" checked="checked"> <?php esc_html_e("overwrite", 'flooring'); ?>
											<input type="radio" name="update_animations" value="false" style="margin-left:30px;"> <?php esc_html_e("append", 'flooring'); ?>
											<br><br>
											<?php esc_html_e("Custom Navigations:", 'flooring'); ?><br><br>
											<input type="radio" name="update_navigations" value="true" checked="checked"> <?php esc_html_e("overwrite", 'flooring'); ?>
											<input type="radio" name="update_navigations" value="false" style="margin-left:30px;"> <?php esc_html_e("append", 'flooring'); ?>
											<br><br>
											<?php esc_html_e("Static Styles:", 'flooring'); ?><br><br>
											<input type="radio" name="update_static_captions" value="true"> <?php esc_html_e("overwrite", 'flooring'); ?>
											<input type="radio" name="update_static_captions" value="false" style="margin-left:30px;"> <?php esc_html_e("append", 'flooring'); ?>
											<input type="radio" name="update_static_captions" value="none" checked="checked" style="margin-left:30px;"> <?php esc_html_e("ignore", 'flooring'); ?>
										</td>
									</tr>
									<td style="display: none;">
									</td>
									<td style="padding-left: 250px;">
										<br>
										<input type="submit" class="button button-primary revblue tp-be-button" value="<?php esc_html_e("Import Slider", 'flooring'); ?>"><br>
									</td>
									</tr>
									</tbody>
								</table>
							</div>
						</form>
					</div>


					<script type="text/javascript">
						jQuery(document).ready(function () {
							jQuery(".revblue.tp-be-button").on('click', function (e) {
								if (jQuery("#input_import_slider").val() == '') {
									alert("Please select the revslider file");
									e.preventDefault();
									return false;
								}
							});
						});
					</script>
				</div>
			</div>
		</div>
		</div>


		<div style="clear: both;">
			<br/><br/><br/><br/><br/><br/>
		</div>


		<div class="wb-item">
			<div class="icon-themes">

			</div>
		</div>
		<?php
	}
}

function flooring_google_fonts_array() {
	$google_fonts = array(
		array(
			"name" => "ABeeZee",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Abel",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Abhaya Libre",
			"subsets" => array(
				"latin-ext",
				"sinhala",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array(
			"name" => "Abril Fatface",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Aclonica",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Acme",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Actor",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Adamina",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Advent Pro",
			"subsets" => array(
				"latin-ext",
				"latin",
				"greek"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Aguafina Script",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Akronim",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Aladin",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Aldrich",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Alef",
			"subsets" => array(
				"latin",
				"hebrew"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Alegreya",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Alegreya SC",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Alegreya Sans",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"100",
						"300",
						"400",
						"500",
						"700",
						"800",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"300",
						"400",
						"500",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Alegreya Sans SC",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"100",
						"300",
						"400",
						"500",
						"700",
						"800",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"300",
						"400",
						"500",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Alex Brush",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Alfa Slab One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Alice",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Alike",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Alike Angular",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Allan",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Allerta",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Allerta Stencil",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Allura",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Almendra",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Almendra Display",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Almendra SC",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Amarante",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Amaranth",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Amatic SC",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Amatica SC",
			"subsets" => array(
				"latin-ext",
				"latin",
				"hebrew"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Amethysta",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Amiko",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Amiri",
			"subsets" => array(
				"arabic",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Amita",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Anaheim",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Andada",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Andika",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Angkor",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Annie Use Your Telescope",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Anonymous Pro",
			"subsets" => array(
				"latin-ext",
				"latin",
				"greek",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Antic",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Antic Didone",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Antic Slab",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Anton",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Arapey",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Arbutus",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Arbutus Slab",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Architects Daughter",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Archivo Black",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Archivo Narrow",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Aref Ruqaa",
			"subsets" => array(
				"arabic",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Arima Madurai",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese",
				"tamil"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Arimo",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"hebrew",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Arizonia",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Armata",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Artifika",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Arvo",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Arya",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Asap",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"500",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"500",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Asar",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Asset",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Assistant",
			"subsets" => array(
				"latin",
				"hebrew"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array(
			"name" => "Astloch",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Asul",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Athiti",
			"subsets" => array(
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Atma",
			"subsets" => array(
				"latin-ext",
				"latin",
				"bengali"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Atomic Age",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Aubrey",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Audiowide",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Autour One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Average",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Average Sans",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Averia Gruesa Libre",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Averia Libre",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"300",
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Averia Sans Libre",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"300",
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Averia Serif Libre",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"300",
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Bad Script",
			"subsets" => array(
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Baloo",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Baloo Bhai",
			"subsets" => array(
				"latin-ext",
				"latin",
				"gujarati",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Baloo Bhaina",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese",
				"oriya"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Baloo Chettan",
			"subsets" => array(
				"latin-ext",
				"latin",
				"malayalam",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Baloo Da",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese",
				"bengali"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Baloo Paaji",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese",
				"gurmukhi"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Baloo Tamma",
			"subsets" => array(
				"latin-ext",
				"latin",
				"kannada",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Baloo Thambi",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese",
				"tamil"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Balthazar",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bangers",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Basic",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Battambang",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Baumans",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bayon",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Belgrano",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Belleza",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "BenchNine",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Bentham",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Berkshire Swash",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bevan",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bigelow Rules",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bigshot One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bilbo",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bilbo Swash Caps",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "BioRhyme",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"700",
						"800"
					)
				)
			)
		),
		array(
			"name" => "BioRhyme Expanded",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"700",
						"800"
					)
				)
			)
		),
		array(
			"name" => "Biryani",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Bitter",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Black Ops One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bokor",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bonbon",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Boogaloo",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bowlby One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bowlby One SC",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Brawler",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bree Serif",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bubblegum Sans",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bubbler One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Buda",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("300")
				)
			)
		),
		array(
			"name" => "Buenard",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Bungee",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bungee Hairline",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bungee Inline",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bungee Outline",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Bungee Shade",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Butcherman",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Butterfly Kids",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Cabin",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"500",
						"600",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Cabin Condensed",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Cabin Sketch",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Caesar Dressing",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Cagliostro",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Cairo",
			"subsets" => array(
				"arabic",
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"600",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Calligraffitti",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Cambay",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Cambo",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Candal",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Cantarell",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Cantata One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Cantora One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Capriola",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Cardo",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"greek"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Carme",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Carrois Gothic",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Carrois Gothic SC",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Carter One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Catamaran",
			"subsets" => array(
				"latin-ext",
				"latin",
				"tamil"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Caudex",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"greek"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Caveat",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Caveat Brush",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Cedarville Cursive",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ceviche One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Changa",
			"subsets" => array(
				"arabic",
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array(
			"name" => "Changa One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Chango",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Chathura",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"300",
						"400",
						"700",
						"800"
					)
				)
			)
		),
		array(
			"name" => "Chau Philomene One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Chela One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Chelsea Market",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Chenla",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Cherry Cream Soda",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Cherry Swash",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Chewy",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Chicle",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Chivo",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Chonburi",
			"subsets" => array(
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Cinzel",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Cinzel Decorative",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Clicker Script",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Coda",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"800"
					)
				)
			)
		),
		array(
			"name" => "Coda Caption",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("800")
				)
			)
		),
		array(
			"name" => "Codystar",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400"
					)
				)
			)
		),
		array(
			"name" => "Coiny",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese",
				"tamil"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Combo",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Comfortaa",
			"subsets" => array(
				"latin-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Coming Soon",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Concert One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Condiment",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Content",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Contrail One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Convergence",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Cookie",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Copse",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Corben",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Cormorant",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Cormorant Garamond",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Cormorant Infant",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Cormorant SC",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Cormorant Unicase",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Cormorant Upright",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Courgette",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Cousine",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"hebrew",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Coustard",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Covered By Your Grace",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Crafty Girls",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Creepster",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Crete Round",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Crimson Text",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"600",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Croissant One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Crushed",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Cuprum",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Cutive",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Cutive Mono",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Damion",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Dancing Script",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Dangrek",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "David Libre",
			"subsets" => array(
				"latin-ext",
				"latin",
				"hebrew",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"500",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Dawning of a New Day",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Days One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Dekko",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Delius",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Delius Swash Caps",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Delius Unicase",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Della Respira",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Denk One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Devonshire",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Dhurjati",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Didact Gothic",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Diplomata",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Diplomata SC",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Domine",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Donegal One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Doppio One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Dorsa",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Dosis",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array(
			"name" => "Dr Sugiyama",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Droid Sans",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Droid Sans Mono",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Droid Serif",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Duru Sans",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Dynalight",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "EB Garamond",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Eagle Lake",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Eater",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Economica",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Eczar",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array(
			"name" => "Ek Mukta",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array(
			"name" => "El Messiri",
			"subsets" => array(
				"arabic",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Electrolize",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Elsie",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Elsie Swash Caps",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Emblema One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Emilys Candy",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Engagement",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Englebert",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Enriqueta",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Erica One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Esteban",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Euphoria Script",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ewert",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Exo",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Exo 2",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Expletus Sans",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"500",
						"600",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Fanwood Text",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Farsan",
			"subsets" => array(
				"latin-ext",
				"latin",
				"gujarati",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Fascinate",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Fascinate Inline",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Faster One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Fasthand",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Fauna One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Federant",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Federo",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Felipa",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Fenix",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Finger Paint",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Fira Mono",
			"subsets" => array(
				"latin-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Fira Sans",
			"subsets" => array(
				"latin-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"300",
						"400",
						"500",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Fjalla One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Fjord One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Flamenco",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400"
					)
				)
			)
		),
		array(
			"name" => "Flavors",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Fondamento",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Fontdiner Swanky",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Forum",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Francois One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Frank Ruhl Libre",
			"subsets" => array(
				"latin-ext",
				"latin",
				"hebrew"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Freckle Face",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Fredericka the Great",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Fredoka One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Freehand",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Fresca",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Frijole",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Fruktur",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Fugaz One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "GFS Didot",
			"subsets" => array("greek"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "GFS Neohellenic",
			"subsets" => array("greek"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Gabriela",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Gafata",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Galada",
			"subsets" => array(
				"latin",
				"bengali"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Galdeano",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Galindo",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Gentium Basic",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Gentium Book Basic",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Geo",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Geostar",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Geostar Fill",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Germania One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Gidugu",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Gilda Display",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Give You Glory",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Glass Antiqua",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Glegoo",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Gloria Hallelujah",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Goblin One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Gochi Hand",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Gorditas",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Goudy Bookletter 1911",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Graduate",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Grand Hotel",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Gravitas One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Great Vibes",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Griffy",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Gruppo",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Gudea",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Gurajada",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Habibi",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Halant",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Hammersmith One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Hanalei",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Hanalei Fill",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Handlee",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Hanuman",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Happy Monkey",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Harmattan",
			"subsets" => array(
				"arabic",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Headland One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Heebo",
			"subsets" => array(
				"latin",
				"hebrew"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"300",
						"400",
						"500",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Henny Penny",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Herr Von Muellerhoff",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Hind",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Hind Guntur",
			"subsets" => array(
				"latin-ext",
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Hind Madurai",
			"subsets" => array(
				"latin-ext",
				"latin",
				"tamil"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Hind Siliguri",
			"subsets" => array(
				"latin-ext",
				"latin",
				"bengali"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Hind Vadodara",
			"subsets" => array(
				"latin-ext",
				"latin",
				"gujarati"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Holtwood One SC",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Homemade Apple",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Homenaje",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "IM Fell DW Pica",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "IM Fell DW Pica SC",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "IM Fell Double Pica",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "IM Fell Double Pica SC",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "IM Fell English",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "IM Fell English SC",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "IM Fell French Canon",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "IM Fell French Canon SC",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "IM Fell Great Primer",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "IM Fell Great Primer SC",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Iceberg",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Iceland",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Imprima",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Inconsolata",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Inder",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Indie Flower",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Inika",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Inknut Antiqua",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Irish Grover",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Istok Web",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Italiana",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Italianno",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Itim",
			"subsets" => array(
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Jacques Francois",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Jacques Francois Shadow",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Jaldi",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Jim Nightshade",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Jockey One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Jolly Lodger",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Jomhuria",
			"subsets" => array(
				"arabic",
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Josefin Sans",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"100",
						"300",
						"400",
						"600",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"300",
						"400",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Josefin Slab",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"100",
						"300",
						"400",
						"600",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"300",
						"400",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Joti One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Judson",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Julee",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Julius Sans One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Junge",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Jura",
			"subsets" => array(
				"latin-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600"
					)
				)
			)
		),
		array(
			"name" => "Just Another Hand",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Just Me Again Down Here",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Kadwa",
			"subsets" => array(
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Kalam",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Kameron",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Kanit",
			"subsets" => array(
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Kantumruy",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Karla",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Karma",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Katibeh",
			"subsets" => array(
				"arabic",
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Kaushan Script",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Kavivanar",
			"subsets" => array(
				"latin-ext",
				"latin",
				"tamil"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Kavoon",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Kdam Thmor",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Keania One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Kelly Slab",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Kenia",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Khand",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Khmer",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Khula",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array(
			"name" => "Kite One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Knewave",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Kotta One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Koulen",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Kranky",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Kreon",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Kristi",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Krona One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Kumar One",
			"subsets" => array(
				"latin-ext",
				"latin",
				"gujarati"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Kumar One Outline",
			"subsets" => array(
				"latin-ext",
				"latin",
				"gujarati"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Kurale",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "La Belle Aurore",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Laila",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Lakki Reddy",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Lalezar",
			"subsets" => array(
				"arabic",
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Lancelot",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Lateef",
			"subsets" => array(
				"arabic",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Lato",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"100",
						"300",
						"400",
						"700",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"300",
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "League Script",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Leckerli One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ledger",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Lekton",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Lemon",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Lemonada",
			"subsets" => array(
				"arabic",
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Libre Baskerville",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Libre Franklin",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Life Savers",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Lilita One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Lily Script One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Limelight",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Linden Hill",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Lobster",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Lobster Two",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Londrina Outline",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Londrina Shadow",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Londrina Sketch",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Londrina Solid",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Lora",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Love Ya Like A Sister",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Loved by the King",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Lovers Quarrel",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Luckiest Guy",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Lusitana",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Lustria",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Macondo",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Macondo Swash Caps",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Mada",
			"subsets" => array(
				"arabic",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Magra",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Maiden Orange",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Maitree",
			"subsets" => array(
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Mako",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Mallanna",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Mandali",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Marcellus",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Marcellus SC",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Marck Script",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Margarine",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Marko One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Marmelad",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Martel",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Martel Sans",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Marvel",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Mate",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Mate SC",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Maven Pro",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"500",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "McLaren",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Meddon",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "MedievalSharp",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Medula One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Meera Inimai",
			"subsets" => array(
				"latin",
				"tamil"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Megrim",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Meie Script",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Merienda",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Merienda One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Merriweather",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"300",
						"400",
						"700",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Merriweather Sans",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"300",
						"400",
						"700",
						"800"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"700",
						"800"
					)
				)
			)
		),
		array(
			"name" => "Metal",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Metal Mania",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Metamorphous",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Metrophobic",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Michroma",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Milonga",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Miltonian",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Miltonian Tattoo",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Miniver",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Miriam Libre",
			"subsets" => array(
				"latin-ext",
				"latin",
				"hebrew"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Mirza",
			"subsets" => array(
				"arabic",
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Miss Fajardose",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Mitr",
			"subsets" => array(
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Modak",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Modern Antiqua",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Mogra",
			"subsets" => array(
				"latin-ext",
				"latin",
				"gujarati"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Molengo",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Molle",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Monda",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Monofett",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Monoton",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Monsieur La Doulaise",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Montaga",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Montez",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Montserrat",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Montserrat Alternates",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Montserrat Subrayada",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Moul",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Moulpali",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Mountains of Christmas",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Mouse Memoirs",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Mr Bedfort",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Mr Dafoe",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Mr De Haviland",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Mrs Saint Delafield",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Mrs Sheppards",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Mukta Vaani",
			"subsets" => array(
				"latin-ext",
				"latin",
				"gujarati"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array(
			"name" => "Muli",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Mystery Quest",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "NTR",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Neucha",
			"subsets" => array(
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Neuton",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"700",
						"800"
					)
				)
			)
		),
		array(
			"name" => "New Rocker",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "News Cycle",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Niconne",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Nixie One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Nobile",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Nokora",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Norican",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Nosifer",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Nothing You Could Do",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Noticia Text",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Noto Sans",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Noto Serif",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Nova Cut",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Nova Flat",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Nova Mono",
			"subsets" => array(
				"latin",
				"greek"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Nova Oval",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Nova Round",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Nova Script",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Nova Slim",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Nova Square",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Numans",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Nunito",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Nunito Sans",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Odor Mean Chey",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Offside",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Old Standard TT",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Oldenburg",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Oleo Script",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Oleo Script Swash Caps",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Open Sans",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"300",
						"400",
						"600",
						"700",
						"800"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array(
			"name" => "Open Sans Condensed",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("300")
				),
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Oranienbaum",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Orbitron",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"500",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Oregano",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Orienta",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Original Surfer",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Oswald",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Over the Rainbow",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Overlock",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Overlock SC",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ovo",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Oxygen",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Oxygen Mono",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "PT Mono",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "PT Sans",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "PT Sans Caption",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "PT Sans Narrow",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "PT Serif",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "PT Serif Caption",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Pacifico",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Palanquin",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Palanquin Dark",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Paprika",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Parisienne",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Passero One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Passion One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Pathway Gothic One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Patrick Hand",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Patrick Hand SC",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Pattaya",
			"subsets" => array(
				"latin-ext",
				"latin",
				"thai",
				"cyrillic",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Patua One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Pavanam",
			"subsets" => array(
				"latin-ext",
				"latin",
				"tamil"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Paytone One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Peddana",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Peralta",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Permanent Marker",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Petit Formal Script",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Petrona",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Philosopher",
			"subsets" => array(
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Piedra",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Pinyon Script",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Pirata One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Plaster",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Play",
			"subsets" => array(
				"latin-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Playball",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Playfair Display",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Playfair Display SC",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Podkova",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Poiret One",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Poller One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Poly",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Pompiere",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Pontano Sans",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Poppins",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Port Lligat Sans",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Port Lligat Slab",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Pragati Narrow",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Prata",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Preahvihear",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Press Start 2P",
			"subsets" => array(
				"latin-ext",
				"latin",
				"greek",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Pridi",
			"subsets" => array(
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Princess Sofia",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Prociono",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Prompt",
			"subsets" => array(
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Prosto One",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Proza Libre",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array(
			"name" => "Puritan",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Purple Purse",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Quando",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Quantico",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Quattrocento",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Quattrocento Sans",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Questrial",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Quicksand",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Quintessential",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Qwigley",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Racing Sans One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Radley",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Rajdhani",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Rakkas",
			"subsets" => array(
				"arabic",
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Raleway",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Raleway Dots",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ramabhadra",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ramaraja",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Rambla",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Rammetto One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ranchers",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Rancho",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ranga",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Rasa",
			"subsets" => array(
				"latin-ext",
				"latin",
				"gujarati"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Rationale",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ravi Prakash",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Redressed",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Reem Kufi",
			"subsets" => array(
				"arabic",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Reenie Beanie",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Revalia",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Rhodium Libre",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ribeye",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ribeye Marrow",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Righteous",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Risque",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Roboto",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"100",
						"300",
						"400",
						"500",
						"700",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"300",
						"400",
						"500",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Roboto Condensed",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"300",
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Roboto Mono",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"100",
						"300",
						"400",
						"500",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"300",
						"400",
						"500",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Roboto Slab",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Rochester",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Rock Salt",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Rokkitt",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Romanesco",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ropa Sans",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Rosario",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Rosarivo",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Rouge Script",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Rozha One",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Rubik",
			"subsets" => array(
				"latin-ext",
				"latin",
				"hebrew",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"300",
						"400",
						"500",
						"700",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Rubik Mono One",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Rubik One",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ruda",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Rufina",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Ruge Boogie",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ruluko",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Rum Raisin",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ruslan Display",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Russo One",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ruthie",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Rye",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sacramento",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sahitya",
			"subsets" => array(
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Sail",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Salsa",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sanchez",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sancreek",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sansita One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sarala",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Sarina",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sarpanch",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Satisfy",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Scada",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Scheherazade",
			"subsets" => array(
				"arabic",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Schoolbell",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Scope One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Seaweed Script",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Secular One",
			"subsets" => array(
				"latin-ext",
				"latin",
				"hebrew"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sevillana",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Seymour One",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Shadows Into Light",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Shadows Into Light Two",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Shanti",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Share",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Share Tech",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Share Tech Mono",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Shojumaru",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Short Stack",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Shrikhand",
			"subsets" => array(
				"latin-ext",
				"latin",
				"gujarati"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Siemreap",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sigmar One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Signika",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Signika Negative",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Simonetta",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Sintony",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Sirin Stencil",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Six Caps",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Skranji",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Slabo 13px",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Slabo 27px",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Slackey",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Smokum",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Smythe",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sniglet",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"800"
					)
				)
			)
		),
		array(
			"name" => "Snippet",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Snowburst One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sofadi One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sofia",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sonsie One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sorts Mill Goudy",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Source Code Pro",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Source Sans Pro",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"200",
						"300",
						"400",
						"600",
						"700",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"600",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Source Serif Pro",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Space Mono",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Special Elite",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Spicy Rice",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Spinnaker",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Spirax",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Squada One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sree Krushnadevaraya",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sriracha",
			"subsets" => array(
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Stalemate",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Stalinist One",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Stardos Stencil",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Stint Ultra Condensed",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Stint Ultra Expanded",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Stoke",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400"
					)
				)
			)
		),
		array(
			"name" => "Strait",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sue Ellen Francisco",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Suez One",
			"subsets" => array(
				"latin-ext",
				"latin",
				"hebrew"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sumana",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Sunshiney",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Supermercado One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Sura",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Suranna",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Suravaram",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Suwannaphum",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Swanky and Moo Moo",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Syncopate",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Tangerine",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Taprom",
			"subsets" => array("khmer"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Tauri",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Taviraj",
			"subsets" => array(
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Teko",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Telex",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Tenali Ramakrishna",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Tenor Sans",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Text Me One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "The Girl Next Door",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Tienne",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Tillana",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array(
			"name" => "Timmana",
			"subsets" => array(
				"telugu",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Tinos",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"hebrew",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Titan One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Titillium Web",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"200",
						"300",
						"400",
						"600",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"600",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Trade Winds",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Trirong",
			"subsets" => array(
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Trocchi",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Trochut",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array("400")
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Trykker",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Tulpen One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ubuntu",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"300",
						"400",
						"500",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Ubuntu Condensed",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Ubuntu Mono",
			"subsets" => array(
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Ultra",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Uncial Antiqua",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Underdog",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Unica One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "UnifrakturCook",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("700")
				)
			)
		),
		array(
			"name" => "UnifrakturMaguntia",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Unkempt",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Unlock",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Unna",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "VT323",
			"subsets" => array(
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Vampiro One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Varela",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Varela Round",
			"subsets" => array(
				"latin",
				"hebrew"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Vast Shadow",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Vesper Libre",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"500",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Vibur",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Vidaloka",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Viga",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Voces",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Volkhov",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Vollkorn",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "italic",
					"weight" => array(
						"400",
						"700"
					)
				),
				array(
					"style" => "normal",
					"weight" => array(
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Voltaire",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Waiting for the Sunrise",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Wallpoet",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Walter Turncoat",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Warnes",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Wellfleet",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Wendy One",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Wire One",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Work Sans",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Yanone Kaffeesatz",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"200",
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Yantramanav",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"100",
						"300",
						"400",
						"500",
						"700",
						"900"
					)
				)
			)
		),
		array(
			"name" => "Yatra One",
			"subsets" => array(
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Yellowtail",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Yeseva One",
			"subsets" => array(
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Yesteryear",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		),
		array(
			"name" => "Yrsa",
			"subsets" => array(
				"latin-ext",
				"latin"
			),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array(
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array(
			"name" => "Zeyada",
			"subsets" => array("latin"),
			"variants" => array(
				array(
					"style" => "normal",
					"weight" => array("400")
				)
			)
		)
	);
	return $google_fonts;
}

function flooring_font_weight_name($weight) {
	switch ($weight) {
		case "100":
			return "Thin 100";
			break;
		case "200":
			return "Extra-Light 200";
			break;
		case "300":
			return "Light 300";
			break;
		case "400":
			return "Regular 400";
			break;
		case "500":
			return "Medium 500";
			break;
		case "600":
			return "Semi-Bold 600";
			break;
		case "700":
			return "Bold 700";
			break;
		case "800":
			return "Extra-Bold 800";
			break;
		case "900":
			return "Ultra-bold 900";
			break;
		default:
			return "";

	}

}