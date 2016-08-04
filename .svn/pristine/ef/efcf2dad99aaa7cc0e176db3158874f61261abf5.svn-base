<?php

add_action( 'widgets_init', 'keenmoon_widgets_init');
/**
 * Function to register the widget areas(sidebar) and widgets.
 */
function keenmoon_widgets_init() {

   /**
    * Registering widget areas for front page
    */
   // Registering main right sidebar
   register_sidebar( array(
      'name'            => __( 'Right Sidebar', 'keenmoon' ),
      'id'              => 'keenmoon_right_sidebar',
      'description'     => __( 'Shows widgets at Right side.', 'keenmoon' ),
      'before_widget'   => '<aside id="%1$s" class="widget %2$s clearfix">',
      'after_widget'    => '</aside>',
      'before_title'    => '<h3 class="widget-title"><span>',
      'after_title'     => '</span></h3>'
   ) );
    // Registering main Home Widget
   register_sidebar( array(
      'name'            => __( 'Home Widget', 'keenmoon' ),
      'id'              => 'keenmoon_home_widget',
      'description'     => __( 'Shows widgets at Home Side.', 'keenmoon' ),
      'before_widget'   => '<aside id="%1$s" class="widget %2$s clearfix latest-blog">',
      'after_widget'    => '</aside>',
      'before_title'    => '<h3 class="widget-title">',
      'after_title'     => '</h3>'
   ) );
    // Registering Footer One Widget
   register_sidebar( array(
      'name'            => __( 'Footer Widget One', 'keenmoon' ),
      'id'              => 'keenmoon_footer_one',
      'description'     => __( 'Shows widgets at Footer Side.', 'keenmoon' ),
      'before_widget'   => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'    => '</aside>',
      'before_title'    => '<h3 class="widget-title"><span>',
      'after_title'     => '</span></h3>'
   ) );
   // Registering Footer Two Widget
   register_sidebar( array(
      'name'            => __( 'Footer Widget Two', 'keenmoon' ),
      'id'              => 'keenmoon_footer_two',
      'description'     => __( 'Shows widgets at Footer Side.', 'keenmoon' ),
      'before_widget'   => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'    => '</aside>',
      'before_title'    => '<h3 class="widget-title"><span>',
      'after_title'     => '</span></h3>'
   ) );
       // Registering Footer Three Widget
   register_sidebar( array(
      'name'            => __( 'Footer Widget Three', 'keenmoon' ),
      'id'              => 'keenmoon_footer_three',
      'description'     => __( 'Shows widgets at Footer Side.', 'keenmoon' ),
      'before_widget'   => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'    => '</aside>',
      'before_title'    => '<h3 class="widget-title"><span>',
      'after_title'     => '</span></h3>'
   ) );
   register_widget( "keenmoon_about_widget" );
   register_widget( "keenmoon_featured_posts_widget" );
   register_widget( "keenmoon_categories_list" );
   register_widget( "keenmoon_social_widget" );
   register_widget( "keenmoon_twitter_feed_widget" );
   register_widget( "keenmoon_flickr_widget" );
   register_widget( "keenmoon_featured_post_widget" );
   register_widget( "keenmoon_slider_widget" );
   
}

?>