<header class=" wd-menu3-header ">
	<div class="show-for-medium-up wd-menu3-logo">
		<?php
		$flooring_logo_path = flooring_get_option('flooring_logo_path', '') ?>
		<h1><a title="<?php echo esc_attr__('flooring','flooring') ?>" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php	if($flooring_logo_path != '') { ?>
				<img alt="<?php esc_attr__('logo','flooring') ?>" src="<?php echo esc_attr($flooring_logo_path) ?>">
				<?php }else{
					echo get_bloginfo("name");
				} ?>
			</a></h1>
	</div>
	<div class=" wd-menu3-nav">
		<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<li class="toggle-topbar menu-icon"><a href="#"><span><?php echo esc_html__('Menu','flooring') ?></span></a></li>
			</ul>
			<section class="top-bar-section">
				<?php wp_nav_menu(array('theme_location' => 'primary','walker' => new flooring_top_bar_walker,'fallback_cb' => 'flooring_main_menu_fallback'))  ?>
			</section>
		</nav>
	</div>
	<div class="show-for-large-up triongle"></div>
	<div class="show-for-large-up wd-menu3-social">
		<?php if(flooring_get_option('flooring_show_adress_bar') == '1'){ ?>
		<ul class="social-icons inline-list">
			<?php if (flooring_get_option('flooring_get_option') != ""): ?>
			<li class="facebook">
				<a href="<?php echo esc_url(flooring_get_option('flooring_facebook','')) ?>"><i class="fa fa-facebook"></i></a>
			</li>
			<?php endif;
			if (flooring_get_option('flooring_twitter') != ""): ?>
			<li class="twitter">
				<a href="<?php echo esc_url(flooring_get_option('flooring_twitter',''))?>"><i class="fa fa-twitter"></i></a>
			</li>
			<?php endif;
			if (flooring_get_option('flooring_google_plus') != ""): ?>
			<li class="googleplus">
				<a href="<?php echo esc_url(flooring_get_option('flooring_google_plus',''))?>"><i class="fa fa-google-plus"></i></a>
			</li>
           <?php endif; ?>
		</ul>
		<?php } ?>
	</div>

</header>