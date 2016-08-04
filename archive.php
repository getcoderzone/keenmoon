<?php
/**
 * The template for displaying Archive page.
 *
 * @package keenmoon
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
				<header class="page-header">
                <?php if ( is_category() ) {
                	echo '<h1 class="page-title">';
                  		single_cat_title();
                  	echo '</h1>';
                  } else { ?>
					<h1 class="page-title">
               		<span>
						<?php
							if ( is_tag() ) :
								single_tag_title();

							elseif ( is_author() ) :
								/* Queue the first post, that way we know
								 * what author we're dealing with (if that is the case).
								*/
								the_post();
								printf( __( 'Author: %s', 'keenmoon' ), '<span class="vcard">' . get_the_author() . '</span>' );
								/* Since we called the_post() above, we need to
								 * rewind the loop back to the beginning that way
								 * we can run the loop properly, in full.
								 */
								rewind_posts();

							elseif ( is_day() ) :
								printf( __( 'Day: %s', 'keenmoon' ), '<span>' . get_the_date() . '</span>' );

							elseif ( is_month() ) :
								printf( __( 'Month: %s', 'keenmoon' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

							elseif ( is_year() ) :
								printf( __( 'Year: %s', 'keenmoon' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								_e( 'Asides', 'keenmoon' );

							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								_e( 'Images', 'keenmoon');

							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								_e( 'Videos', 'keenmoon' );

							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								_e( 'Quotes', 'keenmoon' );

							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								_e( 'Links', 'keenmoon' );

							else :
								_e( 'Archives', 'keenmoon' );

							endif;
						?>
					</span></h1>
                  <?php } ?>
					<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif;
					?>

				</header><!-- .page-header -->

            <div class="article-container">

   				<?php global $post_i; $post_i = 1; ?>

   				<?php while ( have_posts() ) : the_post(); ?>

   					<?php get_template_part( 'content', 'archive' ); ?>

   				<?php endwhile; ?>

            </div>

			<?php if (function_exists("pagination")) {
			    pagination();
			} ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

		</div><!-- .content -->
		<?php 			
			if ($keenmoon_single_posts_layout == 'right_sidebar') {
				get_sidebar();
			}
		?>
	</div><!-- .row -->
</div> <!-- Container -->

<?php get_footer(); ?>