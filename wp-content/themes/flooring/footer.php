

	<section class="wd-footer">

		<div class="row animation-parent" data-animation-delay="180">

					<?php
						  $flooring_footer_columns = flooring_get_option('flooring_footer_columns','three _columns');
						  switch ($flooring_footer_columns) {
							  case "one_columns":
								  $column_one = 12;
								  break;
							  case "tow_a_columns":
								  $column_one = 4;
								  $column_tow = 8;
								  break;
							  case "tow_b_columns":
								  $column_one = 8;
								  $column_tow = 4;
								  break;
							  case "tow_c_columns":
								  $column_one = 6;
								  $column_tow = 6;
								  break;
							  default:
								  $column_one = 4;
								  $column_tow = 4;
								  $column_three = 4;
						  } ?>

	            <ul class="block large-<?php echo esc_attr($column_one) ?> medium-<?php echo esc_attr($column_one) ?> columns " >
	               <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : ?><?php endif; ?>
	            </ul>

						  <?php if($flooring_footer_columns == 'tow_a_columns' || $flooring_footer_columns == 'tow_b_columns' || $flooring_footer_columns == 'tow_c_columns' || $flooring_footer_columns == 'three_columns') {  ?>
		            <ul class="block large-<?php echo esc_attr($column_tow) ?> medium-<?php echo esc_attr($column_tow) ?> columns " >
		               <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : ?><?php endif; ?>
		            </ul>
						  <?php }  ?>

	            <?php if( $flooring_footer_columns == 'three_columns' ) {  ?>
		            <ul class="block large-<?php echo esc_attr($column_three) ?> medium-<?php echo esc_attr($column_three) ?> columns " >
		               <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer-3') ) : ?><?php endif; ?>
		            </ul>
	            <?php }  ?>

		</div>

		<footer class="wd-copyright">
			<div class="row">
				<div class="large-12 columns">
						<?php wp_nav_menu( array('theme_location' => 'footer','container_class' => 'copyright-menu', 'fallback_cb' => 'flooring_main_menu_fallback' )) ?>

				</div>
				<div class="copyright large-12 columns">
					<?php
						 $flooring_copyright = flooring_get_option('flooring_copyright','');
					?>
					<p>
						<?php echo html_entity_decode($flooring_copyright) ?>
					</p>
				</div>
			</div>
		</footer>
	</section>

<?php wp_footer() ?>
</body>
</html>
