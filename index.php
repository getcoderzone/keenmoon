<?php
/**
 * This is a Index page Section.
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
                <div class="article-container">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post();
                            $keenmoon_blog_post_style = get_theme_mod('keenmoon_blog_post_style'); 
                            if($keenmoon_blog_post_style == 'blog_post_style_2'){
                                get_template_part( 'content', 'main' );
                            }
                            else{
                                get_template_part('content');
                            }
                             
                        endwhile; ?>
                    <?php else : ?>

                    <?php get_template_part( 'no-results', 'none' ); ?>

                    <?php endif; ?>
                </div>
                <?php if (function_exists("pagination")) {
                    pagination();
                } ?>
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
