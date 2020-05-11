<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
	<!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta content="ie=edge, chrome=1" http-equiv="x-ua-compatible" />
		<meta http-equiv="ImageToolbar" content="false" />
		<meta name="viewport" content="width=device-width" />
		<?php if(flooring_get_option('webdevia_favicon_icon_path','')!= '') { ?>
		 <link rel="shortcut icon" href="<?php echo flooring_get_option('webdevia_favicon_icon_path',''); ?>" />
		<?php } ?>
	<?php wp_head(); ?>
	</head>
	<body>
		


  	<div class="corp">
		<div class="row">
			<section class="oops">
				<h2><?php esc_html_e('Oops!!','flooring'); ?></h2>
			</section>
			<section>
				<p class="message">
					<?php esc_html_e('It looks like that page no longer exists. Would you like to go to','flooring'); ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><strong><?php echo esc_html__('Homepage','flooring'); ?></strong></a>  <?php echo esc_html__('instead?','flooring'); ?>
				</p>
			</section>
			<section class="large-6 columns">
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="serch" method="get">
					   <input type="text" class="text-input" id="s" name="s" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
					   <input  type="submit" class="submit-input" value="<?php echo esc_html__('serch','flooring') ?>">
				    </form>
			</section>
		</div>	
	</div>
	<div class="oops-footer">
		<ul class="row social-icons accent inline-list">
					<?php if (flooring_get_option('flooring_facebook','') != ""): ?>
						<li class="facebook">
							<a href="http://www.facebook.com/<?php echo flooring_get_option('flooring_facebook', ''); ?>"><i class="fa fa-facebook"></i></a>
						</li>
					<?php endif ?>
					<?php if (flooring_get_option('flooring_twitter','') != ""): ?>
						<li class="twitter">
							<a href="https://www.twitter.com/<?php echo flooring_get_option('flooring_twitter', ''); ?>"><i class="fa fa-twitter"></i></a>
						</li>
					<?php endif ?>
					<?php if (flooring_get_option('flooring_google_plus','') != ""): ?>
						<li class="twitter">
							<a href="https://google-plus.com/<?php echo flooring_get_option('flooring_google_plus', ''); ?>"><i class="fa fa-google"></i></a>
						</li>
					<?php endif ?>
					
				</ul>
	</div>

	<?php wp_footer(); ?> 
</body>
</html>