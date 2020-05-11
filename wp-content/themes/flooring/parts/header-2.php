<header class='l-header creative-layout'>
	<div class="top-bar-container contain-to-grid sticky <?php
	$flooring_page_show_title_area = get_post_meta(get_the_ID(), 'flooring_page_show_title_area', true);

	if($flooring_page_show_title_area == 'no'){
		echo 'header-no-titlebar';
	}
	?>">
		<nav class="top-bar">
			<ul class="title-area">
				<li class="name">
					<?php
					$flooring_logo_path = flooring_get_option('flooring_logo_path', '') ?>
					<h1>
						<a title="<?php echo bloginfo("name"); ?>" rel="home" href="<?php echo esc_url(home_url('/')); ?>">
							<?php	if($flooring_logo_path != '') { ?>
								<img alt="<?php esc_attr__('logo','flooring') ?>" src="<?php echo esc_url($flooring_logo_path) ?>">
							<?php }else{
								echo get_bloginfo("name");
							} ?>
						</a>
					</h1>
				</li>
				<li class="toggle-topbar menu-icon">
					<a href="#"><span><?php echo esc_html__('Menu', 'flooring') ?></span></a>
				</li>
			</ul>
			<section class="creative top-bar-section right">
				<div class="show-for-meduim-up creative-social">
					<?php if (flooring_get_option('flooring_show_adress_bar') == '1') { ?>
						<ul class="social-icons inline-list">
							<?php if (flooring_get_option('flooring_phone', '') != '') {
								?>
								<li class="call"><?php echo esc_html__('Call us:', 'flooring') ?>
									<span><?php echo flooring_get_option('flooring_phone', '') ?></span></li>
								<?php
							} ?>

							<?php if (flooring_get_option('flooring_facebook') != ""): ?>
								<li class="facebook">
									<a href="<?php echo esc_url(flooring_get_option('flooring_facebook', '')) ?>"><i class="fa fa-facebook"></i></a>
								</li>
							<?php endif;
							if (flooring_get_option('flooring_twitter') != ""): ?>
								<li class="twitter">
									<a href="<?php echo esc_url(flooring_get_option('flooring_twitter', '')) ?>"><i class="fa fa-twitter"></i></a>
								</li>
							<?php endif;
							if (flooring_get_option('flooring_google_plus') != ""): ?>
								<li class="googleplus">
									<a href="<?php echo esc_url(flooring_get_option('flooring_google_plus', '')) ?>"><i class="fa fa-google-plus"></i></a>
								</li>
							<?php endif;
							if (flooring_get_option('flooring_show_min_cart') == '1'):
								?>
								<li>
									<div class="show-cart-btn">
                    <span
	                    class="min-cart-count"></span>
										<div class="hidden-cart" style="display: none;">
											<?php the_widget('WC_Widget_Cart'); ?>
										</div>
									</div>
								</li>
								<?php
							endif;
							?>
						</ul>
					<?php } ?>
				</div>
				<?php wp_nav_menu(array('theme_location' => 'primary', 'walker' => new flooring_top_bar_walker, 'fallback_cb' => 'flooring_main_menu_fallback')) ?>
			</section>
		</nav>

	</div>

</header>