<?php
/**
 * Theme Page Section for our theme.
 *
 * @package keenmoon
 * @subpackage keenmoon
 * @since keenmoon 1.0.1
 */
?>

<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-md-8 content">
            	<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page' ); ?>
					<?php endwhile; ?>
				<?php else : ?>

				<?php get_template_part( 'no-results', 'none' ); ?>

				<?php endif; ?>
			</div><!-- #content -->
			<?php get_sidebar();?>
		</div><!-- #row -->
	</div><!-- #container -->
<?php get_footer(); ?>