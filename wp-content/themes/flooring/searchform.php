<?php
/**
 * The template for displaying search forms in flooring
 *
 */
?>

<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="searchform" id="searchform" method="get">
				<div>
					
					<input type="text" id="s" name="s" value="" placeholder="<?php echo esc_attr__( 'Search', 'flooring' ); ?>">
					<input type="submit" value="<?php echo esc_html__('Search','flooring') ?>" id="searchsubmit">
				</div>
</form>