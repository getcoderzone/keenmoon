<?php
/**
 * This is a Single page Section.
 *
 * @package GetCoderZone
 * @subpackage keenmoon
 * @since keenmoon 1.0.1
 */
?>

<?php get_header(); ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        	<?php 
        		$keenmoon_single_posts_layout = get_theme_mod('keenmoon_single_posts_layout', 'right_sidebar');
        	?>
        	<?php 
        		if ($keenmoon_single_posts_layout == 'left_sidebar') {
					get_sidebar();
				}
        	?>
            <!-- Blog Post Content Column -->
            <?php 
            	if ($keenmoon_single_posts_layout == 'no_sidebar_full_width') {
					echo '<div class="col-md-12 content">';
				}
				else{
					echo '<div class="col-md-8 content">';
				}
            ?>
            
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>

					<?php endwhile; ?>
					
				<?php else : ?>

				<?php get_template_part( 'no-results', 'none' ); ?>

				<?php endif; ?>

			</div>			
			<?php 			
				if ($keenmoon_single_posts_layout == 'right_sidebar') {
					get_sidebar();
				}
			?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
<?php get_footer();?>
