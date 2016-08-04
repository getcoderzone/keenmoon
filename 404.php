<?php
/**
 * The template for displaying 404 pages (Page Not Found).
 *
 * @package GetCoderZone
 * @subpackage keenmoon
 * @since keenmoon 1.0.1
 */
?>

<?php get_header(); ?>
	<div class="container">
		<div class="page-content">
			<section class="error-404 not-found text-center">
				<h1 class="404">404</h1>
				<p class="error-text"><?php echo __('Sorry, we could not found the page you are looking for!<br>Please search using the below form again.', 'keenmoon'); ?></p>

				<div class="row">
					<div class="col-sm-4 col-sm-offset-4">
						<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
						    <label>
						        <input type="search" class="search-field"
						            placeholder="<?php echo __( 'SEARCH...', 'keenmoon' ) ?>"
						            value="<?php echo get_search_query() ?>" name="s"
						            title="<?php echo __( 'Search for:', 'keenmoon' ) ?>" />
						    </label>
						</form>
						<a class="go-to-home-page" href="<?php echo home_url();?>"><h4><?php echo __('Go To Home Page', 'keenmoon')?></h4></a>
					</div>
				</div>
				
			</section>
		</div><!-- .page-content -->
	</div><!-- #container -->

<?php get_footer(); ?>