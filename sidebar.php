<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package GetCoderZone
 * @subpackage keenmoon
 * @since keenmoon 1.0.1
 */
?>
<div class="col-md-4 sidebar">

	<?php 
	if (is_active_sidebar( 'keenmoon_right_sidebar' ) ) {
		dynamic_sidebar('keenmoon_right_sidebar');
	}
	if ( ! is_active_sidebar( 'keenmoon_right_sidebar' ) ) {
		the_widget( 'WP_Widget_Recent_Posts' );
		the_widget( 'WP_Widget_Archives' );
		the_widget( 'WP_Widget_Meta' );
	}

	?>

</div>