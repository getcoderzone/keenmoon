<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Shafiqul Islam">
    <?php 
    	$keenmoon_favicon_icon = get_theme_mod('keenmoon_favicon_icon');
    	if (!empty($keenmoon_favicon_icon)) {
    		?>
    			<link href="<?php echo $keenmoon_favicon_icon; ?>" rel="shortcut icon" type="image/x-icon" />
    		<?php
    	}
    ?>
	<?php wp_head();?>
</head>

<body <?php body_class(); ?>>
    <!-- Header -->
	<header>
		<div class="container">
			<div class="logo pull-left"> 
				<?php 
					if (get_theme_mod('keenmoon_header_logo_placement', 'header_text_only') == 'header_logo_only') {
						?>
							<div id="header-logo-image">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url(get_theme_mod('keenmoon_logo')); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
							</div><!-- #header-logo-image -->
						<?php
					}
					if (get_theme_mod('keenmoon_header_logo_placement', 'header_text_only') == 'header_text_only') {
						?>
							<h1 id="site-title">
   								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
   							</h1>
   							<p class="site-description"><?php echo get_bloginfo( 'description', 'display'); ?></p>
						<?php
					}
				?>
			</div>
			<div class="top-menu pull-right">
				<?php 
					$top_menu_walker = new Top_Nav_walker();
					if ( has_nav_menu( 'top-menu' ) ) {
			          $top_nav_defaults = array(
							'theme_location'  => 'top-menu',
							'menu'            => '',
							'container'       => 'div',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'menu',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => $top_menu_walker
						);
						wp_nav_menu( $top_nav_defaults );
			       	}
				?>
			</div>
		</div>
	</header>

	<?php 	
		// Filter wp_nav_menu() to add additional links and other output
		if (get_theme_mod('keenmoon_search_icon_in_menu', '1' ) == 1) {
			add_filter('wp_nav_menu_items','keenmoon_nav_menu_items_search', 10, 2);
			function keenmoon_nav_menu_items_search( $items, $args ) {
			    if( $args->theme_location == 'primary')  {
			        $items .=  '<li class="search_menu"><a href="javascript:void(0)" class="search-header"><i class="fa fa-search"></i></a></li>';
				} 
			    return $items;
			}
		}
		if (get_theme_mod('keenmoon_home_icon_display', '1' ) == 1) {
			function keenmoon_nav_menu_items($items) {

					$homelink = '<li class="home"><a href="' . home_url( '/' ) . '">' . '<i class="fa fa-home"></i>' . '</a></li>';
					$items = $homelink . $items;
				
				return $items;
			}
			add_filter( 'wp_nav_menu_items', 'keenmoon_nav_menu_items',10,2 );
		}
	?>
	<div class="main-menu-wapper">
		<div class="container">
	
				<div id="main-navigation">
					<div id="head-mobile"></div>
					<div class="button"></div>
					<?php 
				        if ( has_nav_menu( 'primary' ) ) {
				          wp_nav_menu( array(
				          	'theme_location' => 'primary', 
							'container' => false, 
				          	'items_wrap'      => '<ul>%3$s</ul>' ) );
				       	}
						else {
							echo "<h5>Add Primary Menu</h5>";
						}
					?>
				</div>
		
		</div>
		
	</div>
	<div class="container">
		<div class="search-bar">
			<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
				<a href="javascript:void(0)" class="search-header"><i class="fa fa-times"></i></a>
			    <input type="search" class="search-field" placeholder="<?php echo __( 'SEARCH...', 'keenmoon' ) ?>" value="<?php echo get_search_query() ?>" name="s" />
			    <button class="search-submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>