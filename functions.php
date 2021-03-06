<?php 

if ( ! isset( $content_width ) ) $content_width = 900;

add_action( 'after_setup_theme', 'keenmoon_setup' );
/**
 * All setup functionalities.
 *
 * @since 1.0.1
 */
if( !function_exists( 'keenmoon_setup' ) ) :
function keenmoon_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'keenmoon', get_template_directory() . '/languages' );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );
	

	// Registering navigation menu.
	register_nav_menu( 'primary', __( 'Primary Menu', 'keenmoon' ) );
	register_nav_menu( 'top-menu', __( 'Top Menu', 'keenmoon' ) );

	// Cropping the images to different sizes to be used in the theme
	add_image_size( 'keenmoon-highlighted-post', 392, 272, true );
	add_image_size( 'keenmoon-featured-post-medium', 390, 205, true );
	add_image_size( 'keenmoon-featured-post-small', 150, 150, true );
	add_image_size( 'keenmoon-featured-image', 800, 445, true );


	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*<title> tag*/
	add_theme_support('title-tag');


	// Enable support for Post Formats.
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'chat', 'audio', 'status' ) );

	// Adding excerpt option box for pages as well
	add_post_type_support( 'page', 'excerpt' );


	add_theme_support( 'custom-header' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'keenmoon_custom_background_args', array(
		'default-image'      => '',
		'default-attachment' => 'fixed',
	) ) );

	add_editor_style( array( 'css/editor-style.css') );
   /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
   // Add theme support for Featured Images
   add_theme_support('html5', array(
       'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
   ));



}
endif;

//Add Widget Area Shortcode
add_filter('widget_text',  'do_shortcode');

function keenmoon_script(){
	wp_enqueue_style( 'keenmoon-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '1.0.1' );
	wp_enqueue_style( 'keenmoon-font-awesome.min', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0.1' );
	wp_enqueue_style( 'keenmoon-owl.carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.0.1' );
	wp_enqueue_style( 'keenmoon-prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css', array(), '1.0.1' );
	wp_enqueue_style( 'social-font', get_template_directory_uri() . '/css/social-font.css', array(), '1.0.1' );
	wp_enqueue_style( 'social-style', get_template_directory_uri() . '/css/social-style.css', array(), '1.0.1' );
	wp_enqueue_style( 'keenmoon-css', get_stylesheet_uri() );
	wp_enqueue_script('jQuery');
	wp_enqueue_script( 'keenmoon-bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '1.0.1', true );
	wp_enqueue_script( 'keenmoon-prettyPhoto-js', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array( 'jquery' ), '1.0.1', true );
	wp_enqueue_script( 'keenmoon-owl.carousel', get_template_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ), '1.0.1', true );
	wp_enqueue_script( 'keenmoon-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0.1', true );
	if (get_theme_mod('keenmoon_primary_sticky_menu', '1') == 1) {
		wp_enqueue_script( 'keenmoon-sticky-menu', get_template_directory_uri() . '/js/sticky-menu.js', array( 'jquery' ), '1.0.1', true );
	}
	
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

}

add_action('wp_enqueue_scripts', 'keenmoon_script');




require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/top-nav-walker.php';
require get_template_directory() . '/inc/widget.php';


/*
 * Top Nav Menu Color Options
 */
if ( ! function_exists( 'topnav_color' ) ) :
function topnav_color( $wp_topnav_id ) {
   $args = array(
     'order'                  => 'ASC',
     'orderby'                => 'menu_order',
     'post_type'              => 'nav_menu_item',
     'post_status'            => 'publish',
     'output'                 => ARRAY_A,
     'output_key'             => 'menu_order',
     'nopaging'               => true,
     'update_post_term_cache' => false 
   ); 
  	$items = wp_get_nav_menu_items('top-menu',$args); 

   	foreach ($items as $top_nav_value) {
      $color = get_theme_mod('keenmoon_topnav_color_'.$wp_topnav_id);
      return $color;
   	}
}
endif;

if ( ! function_exists( 'topnav_icon' ) ) :
function topnav_icon($top_nav_id) {
   $args = array(
     'order'                  => 'ASC',
     'orderby'                => 'menu_order',
     'post_type'              => 'nav_menu_item',
     'post_status'            => 'publish',
     'output'                 => ARRAY_A,
     'output_key'             => 'menu_order',
     'nopaging'               => true,
     'update_post_term_cache' => false 
   ); 
  	$items = wp_get_nav_menu_items('top-menu',$args); 
   	foreach ($items as $top_nav_value) {
		$top_nav_icon = get_theme_mod('keenmoon_topnav_icon_'.$top_nav_id, 'fa-home');
		return $top_nav_icon;
   	}
}
endif;




function keenmoon_inline_css(){
	$args = array(
		'order'                  => 'ASC',
		'orderby'                => 'menu_order',
		'post_type'              => 'nav_menu_item',
		'post_status'            => 'publish',
		'output'                 => ARRAY_A,
		'output_key'             => 'menu_order',
		'nopaging'               => true,
		'update_post_term_cache' => false 
	); 
  	$items = wp_get_nav_menu_items('top-menu',$args); 
	?>
		<style>
			<?php foreach ($items as $top_nav_value) { ?>
			.top-menu ul > li<?php echo "#menu-item-".$top_nav_value->ID;?> a i.<?php echo topnav_icon($top_nav_value->ID)?>{
			  background: <?php echo get_theme_mod('keenmoon_topnav_color_'.$top_nav_value->ID, '#52b3e6');?>;
			}
			<?php }
			?>
		</style>
	<?php
}

add_action('wp_head','keenmoon_inline_css' );


add_filter( 'post_thumbnail_html', 'keenmoon_post_image_html', 10, 3 );

function keenmoon_post_image_html( $html, $post_id, $post_image_id ) {
	$html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . $html . '</a>';
	return $html;
}


function keenmoon_length_excerpt($word_count_limit) {
    $content = wp_strip_all_tags(get_the_content() , true );
    echo wp_trim_words($content, $word_count_limit);
}

//Tag Cloud Filter Hook
function keenmoon_widget_tag_cloud_args( $args ) {
	$args['number'] = 20;
	$args['largest'] = 16;
	$args['smallest'] = 10;
	$args['unit'] = 'px';
	return $args;
}
add_filter('widget_tag_cloud_args', 'keenmoon_widget_tag_cloud_args' );


//Comments
if ( ! function_exists( 'keenmoon_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function keenmoon_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'keenmoon' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'keenmoon' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="author-comment">
			<div class="author-details">
				<header class="comment-meta comment-author vcard">
					<div class="author-img">
	                  <?php echo get_avatar( $comment, 74 ); ?>
	                </div>
	                <div class="a-name">
	                  <div class="author-name">
	                  	<div class="comment-author-link"><i class="fa fa-user"></i>
							<?php echo get_comment_author_link();?>
	                  	</div>

	                  </div>
	                  <div class="comment-date">
	                  	<div class="comment-date-time"><i class="fa fa-calendar-o"></i> 
	                  		<?php echo get_comment_date().' at '.get_comment_time();?>
	                  	</div>
	                  	<?php 
							printf( '<a class="comment-permalink" href="%1$s"><i class="fa fa-link"></i> Permalink </a>', esc_url( get_comment_link( $comment->comment_ID ) ) );
							edit_comment_link();
	                  	?>
	                  </div>
	                </div>
				</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'keenmoon' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<div href="#" class="bt-sm-default"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'keenmoon' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
			</section><!-- .comment-content -->
        	</div>
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;


//Main Blog Post Excerpt
function main_get_excerpt(){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 200);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	$excerpt = $excerpt.'[...]';
	return $excerpt;
}
//Pagination 
function pagination($pages = '', $range = 8)
{  
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><ul><span>Page ".$paged." of ".$pages."</span>";
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li class=\"active\">".$i."</li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
             }
         }
         echo "</ul></div>\n";
     }
}



/*
 * Category Color Options
 */
if ( ! function_exists( 'keenmoon_category_color' ) ) :
function keenmoon_category_color( $wp_category_id ) {
   $args = array(
      'orderby' => 'id',
      'hide_empty' => 0
   );
   $category = get_categories( $args );
   foreach ($category as $category_list ) {
      $color = get_theme_mod('keenmoon_category_color_'.$wp_category_id);
      return $color;
   }
}
endif;
/**************************************************************************************/


/*
 * Category Color for widgets and other
 */
if ( !function_exists('keenmoon_colored_category') ) :
   function keenmoon_colored_category() {
      global $post;
      $categories = get_the_category();
      $separator = '&nbsp;';
      $output = '';
      if($categories) {
         foreach($categories as $category) {
            $color_code = keenmoon_category_color(get_cat_id($category->cat_name));
            if (!empty($color_code)) {
               $output .= '<a href="'.get_category_link( $category->term_id ).'" style="background:' . keenmoon_category_color(get_cat_id($category->cat_name)) . '" rel="category tag">'.$category->cat_name.'</a>'.$separator;
            } else {
               $output .= '<a href="'.get_category_link( $category->term_id ).'"  rel="category tag">'.$category->cat_name.'</a>'.$separator;
            }
        }
        echo trim($output, $separator);
      }
   }
endif;

/**************************************************************************************/
// Custom CSS
add_action('wp_head', 'keenmoon_custom_css');
/**
 * Hooks the Custom Internal CSS to head section
 */
function keenmoon_custom_css() {
	$keenmoon_internal_css = '';
	$primary_color = get_theme_mod('keenmoon_primary_color','#00ACE7');
	$keenmoon_copyright_bg_color = get_theme_mod('keenmoon_copyright_bg_color', '#222222' );
	$primary_color_hover = get_theme_mod('keenmoon_primary_color_hover', '#533A71' );
	$header_image = get_header_image();
	if(!empty($header_image)){
		$keenmoon_internal_css .='header{background: #fff url('.$header_image.') repeat scroll 0 0}';
	}
	if ($primary_color != '#00ACE7' || $keenmoon_copyright_bg_color != '#222222' || $primary_color_hover != '#533A71') {
		$keenmoon_internal_css .='
			a:active, a:hover{color: '.$primary_color_hover.'}
			.main-menu-wapper{background:'.$primary_color.'}
			button, input[type="reset"], input[type="button"], input[type="submit"] {background:'.$primary_color.'}
			.search-bar form.search-form button {background:'.$primary_color.'}
			.search-bar form.search-form a.search-header {background:'.$primary_color.'}
			.bt-sm-default, .bt-md-default, input.bt-md-default {background:'.$primary_color.'}
			.latest-blog > h3.widget-title {background:'.$primary_color.'}
			.related-post-wapper > h3 {background:'.$primary_color.'}
			.related-post .owl-buttons .owl-next i.fa, .related-post .owl-buttons .owl-prev i.fa{background:'.$primary_color.'}
			.content > h2 {background:'.$primary_color.'}
			.breadcrumb a { color: '.$primary_color.' }
			.breadcrumb-arrow li a { background-color: '.$primary_color.';border: 1px solid '.$primary_color.';}
			.breadcrumb-arrow li:first-child a {background-color: '.$primary_color.';border: 1px solid '.$primary_color.';}
			.breadcrumb-arrow li:first-child a {background-color: '.$primary_color.';}
			.breadcrumb-arrow li:first-child a::before, .breadcrumb-arrow li:first-child a::before {border-left-color: '.$primary_color.';}
			.breadcrumb-arrow li a:before{border-left-color: '.$primary_color.';}
			h1.page-title {background:'.$primary_color.'}
			.edit-link {background:'.$primary_color.'}
			.pagination ul li a {background:'.$primary_color.'}
			h3.comments-title {background:'.$primary_color.'}
			#comments form#commentform p input.submit {background:'.$primary_color.'}
			.sidebar h3.widget-title {background:'.$primary_color.'}
			.widget_categories ul li a::before {background:'.$primary_color.'}
			.widget_categories ul li a:hover span{background:'.$primary_color.'}
			.footer-widget{border-top: 4px solid '.$primary_color.';}
			.footer-widget h3.widget-title::after {border-bottom: 4px solid '.$primary_color.';}
			.wpcf7 input.wpcf7-submit {background:'.$primary_color.'}
			ul.about-me-social > li > a i.fa{background:'.$primary_color.'}
			#back-top a .fa.fa-chevron-up{background:'.$primary_color.'}
			footer{background:'.$keenmoon_copyright_bg_color.';color:#fff;}
			.logo h1#site-title a{color: '.$primary_color.';}
			input[type="reset"]:hover::before, input[type="button"]:hover::before, input[type="submit"]:hover::before, button:hover::before {background:'.$primary_color_hover.'}
			
			.top-menu ul > li.active > a span{color: '.$primary_color_hover.';}
			.top-menu ul > li > a span:hover{color: '.$primary_color_hover.';}
			.top-menu ul > li > a i:hover {  background: '.$primary_color_hover.' !important;  border:5px solid '.$primary_color_hover.' !important;}
			.owl-buttons .owl-next i.fa:hover, .owl-buttons .owl-prev i.fa:hover{color: '.$primary_color_hover.';}
			.search-bar form.search-form button:hover, .search-bar form.search-form a.search-header:hover{background:'.$primary_color_hover.';}
			.slider-caption > a.title:hover{color: '.$primary_color_hover.';}
			.latest-blog-item > a h2:hover{color: '.$primary_color_hover.';}
			.author > a:hover {color: '.$primary_color_hover.';}
			.blog-item a:hover h2{color: '.$primary_color_hover.';}
			.pagination ul li a:hover {background:'.$primary_color_hover.';}
			.pagination ul li.active{background:'.$primary_color_hover.';}
			#comments form#commentform p input.submit:hover{background:'.$primary_color_hover.';}
			ul.about-me-social > li > a i.fa:hover{background:'.$primary_color_hover.';}
			.widget_categories ul li a:hover::before {background:'.$primary_color_hover.';}
			.widget_categories ul li a:hover{color:'.$primary_color_hover.';}
			.widget_categories ul li a .badge{background:'.$primary_color_hover.';}
			#back-top a .fa.fa-chevron-up:hover{background:'.$primary_color_hover.';}
			.tagcloud > a:hover{background:'.$primary_color_hover.';border: 1px solid '.$primary_color_hover.';}
			#main-navigation ul li a:hover{background:'.$primary_color_hover.'}
			#main-navigation ul ul li{background:'.$primary_color_hover.'}
			#main-navigation ul li.current-menu-item a{background:'.$primary_color_hover.'}
			#main-navigation ul li.current_page_parent ul li.current-menu-item > a{background:'.$primary_color.'}
			.bt-sm-default:hover::before, .bt-sm-default:focus::before, .bt-sm-default:active::before, .bt-md-default:hover::before, .bt-md-default:focus::before, .bt-md-default:active::before, input.bt-md-default:hover::before, input.bt-md-default:focus::before, input.bt-md-default:active::before{background:'.$primary_color_hover.'}
			.bt-sm-default::before, .bt-md-default::before, input.bt-md-default::before{background:'.$primary_color_hover.'}
			#main-navigation ul ul li a{background:'.$primary_color_hover.'}
			#main-navigation ul ul li a:hover{background:'.$primary_color.'}
			@media screen and (max-width:767px){}


		}
		';
	}

	if( !empty( $keenmoon_internal_css ) ) {
		echo '<!-- '.get_bloginfo('name').' Internal Styles -->';
		?>
			<style type="text/css">
				<?php echo $keenmoon_internal_css; ?>
			</style>
		<?php
	}

	$keenmoon_custom_css = get_theme_mod( 'keenmoon_custom_css', '' );
	if( !empty( $keenmoon_custom_css ) ) {
		echo '<!-- '.get_bloginfo('name').' Custom Styles -->';
		?>
			<style type="text/css"><?php echo $keenmoon_custom_css; ?></style>
		<?php
	}
}

// Define URL Location
define( 'KEENMOON_THEME_URL', get_template_directory_uri() );

//Custom Widgets 
require_once get_template_directory()  . '/inc/widgets/about_me_widget.php';
require_once get_template_directory()  . '/inc/widgets/featured_post_widget.php';
require_once get_template_directory()  . '/inc/widgets/keenmoon_categories_list_widget.php';
require_once get_template_directory()  . '/inc/widgets/keenmoon_social_icon_widget.php';
require_once get_template_directory()  . '/inc/widgets/keenmoon_twitter_feed.php';
require_once get_template_directory()  . '/inc/widgets/keenmoon_flickr_widget.php';
require_once get_template_directory()  . '/inc/widgets/keenmoon_home_featured_widget.php';
require_once get_template_directory()  . '/inc/widgets/keenmoon_slider_widget.php';
