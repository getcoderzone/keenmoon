<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package GetCoderZone
 * @subpackage keenmoon
 * @since keenmoon 1.0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-page-content">
		<?php if ( is_front_page() ) : ?>
			<header style="margin: -15px -15px 8px;" class="page-header">
				<h1 class="page-title">
					<?php the_title(); ?>
				</h1>
			</header>
		<?php else : ?>
			<header style="margin: -15px -15px 8px;" class="page-header">
				<h1 class="page-title">
					<?php the_title(); ?>
				</h1>
			</header>
		<?php endif; ?>
		<div class="entry-content clearfix">
			<?php the_content(); ?>
			<?php edit_post_link( __( 'Edit', 'keenmoon' ), '<span class="edit-link"><i class="fa fa-edit"></i>', '</span>' ); ?>
		</div>
	</div>
</article>