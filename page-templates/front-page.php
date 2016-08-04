<?php
/**
 * Template Name: Front Page
 *
 * @package GetCoderZone
 * @subpackage keenmoon
 * @since keenmoon 1.0.1
 */

?>
<?php get_header(); ?>
    <div class="container">
        <div class="row">
        	<?php 
        		$keenmoon_front_page_full_wide = get_theme_mod('keenmoon_front_page_full_wide','0');
        	?>
        	<div class="col-md-<?php if ($keenmoon_front_page_full_wide == 1) {echo "12";}else{echo "8";}?>">
	            <?php 
	               if( is_active_sidebar( 'keenmoon_home_widget' ) ) {
	                  dynamic_sidebar('keenmoon_home_widget');
	               }
	            ?>
          	</div>
          	<?php
          		if ($keenmoon_front_page_full_wide == 1) {
          			echo '';
          		}
          		else{
          			get_sidebar();
          		}
          	?>
		</div><!-- #row -->
	</div><!-- #container -->
<?php get_footer(); ?>