<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package keenmoon
 * @subpackage keenmoon
 * @since keenmoon 1.0.1
 */
?>

<?php get_header(); ?>
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

                  <header class="page-header">
                     <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'keenmoon' ), get_search_query() ); ?></h1>
                  </header><!-- .page-header -->

      				<div class="article-container">

                     <?php global $post_i; $post_i = 1; ?>

                     <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', 'archive' ); ?>

                     <?php endwhile; ?>

                  </div>

                  <?php get_template_part( 'navigation', 'archive' ); ?>

               <?php else : ?>

                  <?php get_template_part( 'no-results', 'archive' ); ?>

               <?php endif; ?>
      		</div><!-- #content -->
            <?php 			
   				if ($keenmoon_single_posts_layout == 'right_sidebar') {
   					get_sidebar();
   				}
			   ?>
      </div><!-- #row -->
   </div><!-- #container -->
<?php get_footer(); ?>