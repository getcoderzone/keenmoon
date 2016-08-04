<?php

/**
 * Keen Moon Theme Customizer
 *
 * @package GetCoderZone
 * @subpackage keenmoon
 * @since keenmoon 1.0.1
 */

function keenmoon_customizer_theme($keenmoon_customize){


   // Start of the Header Options
   $keenmoon_customize->add_panel('keenmoon_header_options', array(
      'capabitity' => 'edit_theme_options',
      'description' => __('Change the Header Settings from here as you want', 'keenmoon'),
      'priority' => 500,
      'title' => __('Header Options', 'keenmoon')
   ));


   // home icon enable/disable in primary menu
   $keenmoon_customize->add_section('keenmoon_home_icon_display_section', array(
      'title' => __('Show Home Icon', 'keenmoon'),
      'panel' => 'keenmoon_header_options'
   ));

   $keenmoon_customize->add_setting('keenmoon_home_icon_display', array(
      'priority' => 3,
      'default' => 1,
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'keenmoon_checkbox_sanitize'
   ));

   $keenmoon_customize->add_control('keenmoon_home_icon_display', array(
      'type' => 'checkbox',
      'label' => __('Check to show the home icon in the primary menu', 'keenmoon'),
      'section' => 'keenmoon_home_icon_display_section',
      'settings' => 'keenmoon_home_icon_display'
   ));

   // primary sticky menu enable/disable
   $keenmoon_customize->add_section('keenmoon_primary_sticky_menu_section', array(
      'title' => __('Sticky Menu', 'keenmoon'),
      'panel' => 'keenmoon_header_options'
   ));

   $keenmoon_customize->add_setting('keenmoon_primary_sticky_menu', array(
      'priority' => 4,
      'default' => 1,
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'keenmoon_checkbox_sanitize'
   ));

   $keenmoon_customize->add_control('keenmoon_primary_sticky_menu', array(
      'type' => 'checkbox',
      'label' => __('Check to Enable the sticky behavior of the primary menu', 'keenmoon'),
      'section' => 'keenmoon_primary_sticky_menu_section',
      'settings' => 'keenmoon_primary_sticky_menu'
   ));

   // search icon in menu enable/disable
   $keenmoon_customize->add_section('keenmoon_search_icon_in_menu_section', array(
      'title' => __('Search Icon', 'keenmoon'),
      'panel' => 'keenmoon_header_options'
   ));

   $keenmoon_customize->add_setting('keenmoon_search_icon_in_menu', array(
      'priority' => 5,
      'default' => 1,
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'keenmoon_checkbox_sanitize'
   ));

   $keenmoon_customize->add_control('keenmoon_search_icon_in_menu', array(
      'type' => 'checkbox',
      'label' => __('Check to display the Search Icon in the primary menu', 'keenmoon'),
      'section' => 'keenmoon_search_icon_in_menu_section',
      'settings' => 'keenmoon_search_icon_in_menu'
   ));


   // logo upload options
   $keenmoon_customize->add_section('keenmoon_header_logo', array(
      'priority' => 1,
      'title' => __('Header Logo', 'keenmoon'),
      'panel' => 'keenmoon_header_options'
   ));

   $keenmoon_customize->add_setting('keenmoon_logo', array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'esc_url_raw'
   ));

   $keenmoon_customize->add_control(new wp_customize_Image_Control($keenmoon_customize, 'keenmoon_logo', array(
      'label' => __('Upload logo for your header', 'keenmoon'),
      'section' => 'keenmoon_header_logo',
      'setting' => 'keenmoon_logo'
   )));

   $keenmoon_customize->add_setting('keenmoon_header_logo_placement', array(
      'default' => 'header_text_only',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'keenmoon_show_radio_saniztize'
   ));

   $keenmoon_customize->add_control('keenmoon_header_logo_placement', array(
      'type' => 'radio',
      'label' => __('Choose the option that you want', 'keenmoon'),
      'section' => 'keenmoon_header_logo',
      'choices' => array(
         'header_logo_only' => __('Header Logo Only', 'keenmoon'),
         'header_text_only' => __('Header Text Only', 'keenmoon')
      )
   ));

   /* Top Menu Color*/
   $keenmoon_customize->add_section('keenmoon_topMenu_color_setting', array(
      'priority' => 1,
      'title' => __('Top Menu Color Settings', 'keenmoon'),
      'panel' => 'keenmoon_header_options'
   ));

   $i = 1;
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
   if (!empty($items)) {
      foreach ($items as $top_nav_value) {

         
         $keenmoon_customize->add_setting('keenmoon_topnav_color_'.$top_nav_value->ID, array(
            'default' => '#52b3e6',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'keenmoon_color_option_hex_sanitize',
            'sanitize_js_callback' => 'keenmoon_color_escaping_option_sanitize'
         ));
         
         $keenmoon_customize->add_control(new WP_Customize_Color_Control($keenmoon_customize, 'keenmoon_topnav_color_'.$top_nav_value->ID, array(
            'label' => sprintf(__('%s', 'keenmoon'), $top_nav_value->title.' Menu Color'),
            'section' => 'keenmoon_topMenu_color_setting',
            'settings' => 'keenmoon_topnav_color_'.$top_nav_value->ID,
            'priority' => $i
         )));

         $keenmoon_customize->add_setting('keenmoon_topnav_icon_'.$top_nav_value->ID, array(
            'default' => 'fa-home',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'keenmoon_color_option_hex_sanitize',
            'sanitize_js_callback' => 'keenmoon_color_escaping_option_sanitize'
         ));
         $keenmoon_customize->add_control('keenmoon_topnav_icon_'.$top_nav_value->ID, array(
            'label' => sprintf(__('%s', 'keenmoon'), $top_nav_value->title.' Menu Icon'),
            'description' => __( 'Choice <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">Font Awesome Icon</a>', 'keenmoon' ),
            'section' => 'keenmoon_topMenu_color_setting',
            'settings' => 'keenmoon_topnav_icon_'.$top_nav_value->ID,
            'priority' => $i
         ));
         $i++;
      }
   }
   

   // Start of the Design Options
   $keenmoon_customize->add_panel('keenmoon_design_options', array(
      'capabitity' => 'edit_theme_options',
      'description' => __('Change the Design Settings from here as you want', 'keenmoon'),
      'priority' => 505,
      'title' => __('Design Options', 'keenmoon')
   ));



   // // Background Images upload options
   // $keenmoon_customize->add_section('keenmoon_body_bg_images', array(
   //    'priority' => 1,
   //    'title' => __('Body Background Image', 'keenmoon'),
   //    'panel' => 'keenmoon_design_options'
   // ));

   // $keenmoon_customize->add_setting('keenmoon_body_images', array(
   //    'default' => '',
   //    'capability' => 'edit_theme_options',
   //    'sanitize_callback' => 'esc_url_raw'
   // ));

   // $keenmoon_customize->add_control(new wp_customize_Image_Control($keenmoon_customize, 'keenmoon_body_images', array(
   //    'label' => __('Upload Your Background Images', 'keenmoon'),
   //    'section' => 'keenmoon_body_bg_images',
   //    'setting' => 'keenmoon_body_images'
   // )));

   // Upload Favicon Icon
   $keenmoon_customize->add_section('keenmoon_favicon_icon_section', array(
      'priority' => 2,
      'title' => __('Favicon Icon', 'keenmoon'),
      'panel' => 'keenmoon_design_options'
   ));

   $keenmoon_customize->add_setting('keenmoon_favicon_icon', array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'esc_url_raw'
   ));

   $keenmoon_customize->add_control(new wp_customize_Image_Control($keenmoon_customize, 'keenmoon_favicon_icon', array(
      'label' => __('Upload Your Favicon Icon', 'keenmoon'),
      'section' => 'keenmoon_favicon_icon_section',
      'setting' => 'keenmoon_favicon_icon'
   )));

   // primary color options
   $keenmoon_customize->add_section('keenmoon_primary_color_setting', array(
      'panel' => 'keenmoon_design_options',
      'priority' => 7,
      'title' => __('Primary color option', 'keenmoon')
   ));

   $keenmoon_customize->add_setting('keenmoon_primary_color', array(
      'default' => '#00ACE7',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'keenmoon_color_option_hex_sanitize',
      'sanitize_js_callback' => 'keenmoon_color_escaping_option_sanitize'
   ));

   $keenmoon_customize->add_control(new wp_customize_Color_Control($keenmoon_customize, 'keenmoon_primary_color', array(
      'label' => __('This is a Primary Color Whole Page. Choose a color to match your site', 'keenmoon'),
      'section' => 'keenmoon_primary_color_setting',
      'settings' => 'keenmoon_primary_color'
   )));

   // primary hover color options
   $keenmoon_customize->add_section('keenmoon_primary_color_hover_setting', array(
      'panel' => 'keenmoon_design_options',
      'priority' => 7,
      'title' => __('Primary Hover color', 'keenmoon')
   ));

   $keenmoon_customize->add_setting('keenmoon_primary_color_hover', array(
      'default' => '#533A71',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'keenmoon_color_option_hex_sanitize',
      'sanitize_js_callback' => 'keenmoon_color_escaping_option_sanitize'
   ));

   $keenmoon_customize->add_control(new wp_customize_Color_Control($keenmoon_customize, 'keenmoon_primary_color_hover', array(
      'label' => __('This is a Primary Hover Color', 'keenmoon'),
      'section' => 'keenmoon_primary_color_hover_setting',
      'settings' => 'keenmoon_primary_color_hover'
   )));

   // Front Page Setting
   $keenmoon_customize->add_section('keenmoon_front_page_setting', array(
      'panel' => 'keenmoon_design_options',
      'priority' => 9,
      'title' => __('Front Page Setting', 'keenmoon')
   ));
   $keenmoon_customize->add_setting('keenmoon_front_page_full_wide', array(
      'priority' => 5,
      'default' => 0,
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'keenmoon_checkbox_sanitize'
   ));

   $keenmoon_customize->add_control('keenmoon_front_page_full_wide', array(
      'type' => 'checkbox',
      'label' => __('Front Page Full Wide', 'keenmoon'),
      'section' => 'keenmoon_front_page_setting',
      'settings' => 'keenmoon_front_page_full_wide'
   ));

   // Radio Image Layout
   class keenmoon_Image_Radio_Control extends WP_Customize_Control {

      public function render_content() {

         if ( empty( $this->choices ) )
            return;

         $name = '_customize-radio-' . $this->id;

         ?>
         <style>
            a.theme-link-btn {
              background: #00ace7 none repeat scroll 0 0;
              color: #fff;
              display: block;
              font-size: 18px;
              padding: 8px;
              text-align: center;
            }
            a.theme-link-btn:hover{
               background: #000;
            }
            #keenmoon-img-container .keenmoon-radio-img-img {
               border: 3px solid #DEDEDE;
               margin: 0 5px 5px 0;
               cursor: pointer;
               border-radius: 3px;
               -moz-border-radius: 3px;
               -webkit-border-radius: 3px;
            }
            #keenmoon-img-container .keenmoon-radio-img-selected {
               border: 3px solid #AAA;
               border-radius: 3px;
               -moz-border-radius: 3px;
               -webkit-border-radius: 3px;
            }
            ul#keenmoon-img-container li {
              display: inline-block !important;
            }
            ul#keenmoon-img-container li label {
              margin-left: 15px;
            }
            input[type=checkbox]:before {
               content: '';
               margin: -3px 0 0 -4px;
            }
         </style>
         <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
         <ul class="controls" id = 'keenmoon-img-container'>
         <?php
            foreach ( $this->choices as $value => $label ) :
               $class = ($this->value() == $value)?'keenmoon-radio-img-selected keenmoon-radio-img-img':'keenmoon-radio-img-img';
               ?>
               <li style="display: inline;">
               <label>
                  <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                  <img src = '<?php echo esc_html( $label ); ?>' class = '<?php echo $class; ?>' />
               </label>
               </li>
               <?php
            endforeach;
         ?>
         </ul>
         <script type="text/javascript">

            jQuery(document).ready(function($) {
               $('.controls#keenmoon-img-container li img').click(function(){
                  $('.controls#keenmoon-img-container li').each(function(){
                     $(this).find('img').removeClass ('keenmoon-radio-img-selected') ;
                  });
                  $(this).addClass ('keenmoon-radio-img-selected') ;
               });
            });

         </script>
         <?php
      }
   }
   // default layout for single posts
   $keenmoon_customize->add_section('keenmoon_single_posts_layout_setting', array(
      'priority' => 9,
      'title' => __('Single & Blog Post Layout', 'keenmoon'),
      'panel'=> 'keenmoon_design_options'
   ));

   $keenmoon_customize->add_setting('keenmoon_single_posts_layout', array(
      'default' => 'right_sidebar',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'keenmoon_layout_sanitize'
   ));

   $keenmoon_customize->add_control(new keenmoon_Image_Radio_Control($keenmoon_customize, 'keenmoon_single_posts_layout', array(
      'type' => 'radio',
      'label' => __('Single & Blog Post Layout', 'keenmoon'),
      'section' => 'keenmoon_single_posts_layout_setting',
      'settings' => 'keenmoon_single_posts_layout',
      'choices' => array(
         'right_sidebar' => KEENMOON_THEME_URL . '/images/admin/right-sidebar.png',
         'left_sidebar' => KEENMOON_THEME_URL . '/images/admin/left-sidebar.png',
         'no_sidebar_full_width' => KEENMOON_THEME_URL . '/images/admin/no-sidebar-full-width-layout.png'
      )
   )));
   // Blog Post Style 
   $keenmoon_customize->add_section('keenmoon_blog_post_style_setting', array(
      'priority' => 9,
      'title' => __('Blog Post Layout Style', 'keenmoon'),
      'panel'=> 'keenmoon_design_options'
   ));

   $keenmoon_customize->add_setting('keenmoon_blog_post_style', array(
      'default' => 'blog_post_style_1',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'keenmoon_blog_style_sanitize'
   ));

   $keenmoon_customize->add_control(new keenmoon_Image_Radio_Control($keenmoon_customize, 'keenmoon_blog_post_style', array(
      'type' => 'radio',
      'label' => __('Blog Post Layout Style', 'keenmoon'),
      'section' => 'keenmoon_blog_post_style_setting',
      'settings' => 'keenmoon_blog_post_style',
      'choices' => array(
         'blog_post_style_1' => KEENMOON_THEME_URL . '/images/admin/blog_post_style_1.png',
         'blog_post_style_2' => KEENMOON_THEME_URL . '/images/admin/blog_post_style_2.png'
      )
   )));

   // custom CSS setting
   class keenmoon_Custom_CSS_Control extends wp_customize_Control {

      public $type = 'custom_css';

      public function render_content() {
      ?>
         <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
         </label>
      <?php
      }

   }

   $keenmoon_customize->add_section('keenmoon_custom_css_setting', array(
      'priority' => 10,
      'title' => __('Custom CSS', 'keenmoon'),
      'panel' => 'keenmoon_design_options'
   ));

   $keenmoon_customize->add_setting('keenmoon_custom_css', array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
      'sanitize_js_callback' => 'wp_filter_nohtml_kses'
   ));

   $keenmoon_customize->add_control(new keenmoon_Custom_CSS_Control($keenmoon_customize, 'keenmoon_custom_css', array(
      'label' => __('Write your custom css', 'keenmoon'),
      'section' => 'keenmoon_custom_css_setting',
      'settings' => 'keenmoon_custom_css'
   )));
   // End of the Design Options

   

   // Category Color Options
   $keenmoon_customize->add_panel('keenmoon_category_color_panel', array(
      'priority' => 535,
      'title' => __('Category Color Options', 'keenmoon'),
      'capability' => 'edit_theme_options',
      'description' => __('Change the color of each category items as you want.', 'keenmoon')
   ));

   $keenmoon_customize->add_section('keenmoon_category_color_setting', array(
      'priority' => 1,
      'title' => __('Category Color Settings', 'keenmoon'),
      'panel' => 'keenmoon_category_color_panel'
   ));

   $i = 1;
   $args = array(
       'orderby' => 'id',
       'hide_empty' => 0
   );
   $categories = get_categories( $args );
   $wp_category_list = array();
   foreach ($categories as $category_list ) {
      $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;

      $keenmoon_customize->add_setting('keenmoon_category_color_'.get_cat_id($wp_category_list[$category_list->cat_ID]), array(
         'default' => '#52B3E6',
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'keenmoon_color_option_hex_sanitize',
         'sanitize_js_callback' => 'keenmoon_color_escaping_option_sanitize'
      ));

      $keenmoon_customize->add_control(new wp_customize_Color_Control($keenmoon_customize, 'keenmoon_category_color_'.get_cat_id($wp_category_list[$category_list->cat_ID]), array(
         'label' => sprintf(__('%s', 'keenmoon'), $wp_category_list[$category_list->cat_ID] ),
         'section' => 'keenmoon_category_color_setting',
         'settings' => 'keenmoon_category_color_'.get_cat_id($wp_category_list[$category_list->cat_ID]),
         'priority' => $i
      )));
      $i++;
   }

   // Footer Copyright  Panel
   $keenmoon_customize->add_panel('keenmoon_footer_panel', array(
      'priority' => 535,
      'title' => __('Footer Section', 'keenmoon'),
      'capability' => 'edit_theme_options',
      'description' => __('This is a Footer Section', 'keenmoon')
   ));

   // Footer Copyright  Text
   $keenmoon_customize->add_section('keenmoon_copyright_section', array(
      'title' => __('Copyright Text', 'keenmoon'),
      'panel' => 'keenmoon_footer_panel'
   ));

   $keenmoon_customize->add_setting('keenmoon_copyright_display', array(
      'priority' => 3,
      'capability' => 'edit_theme_options'
   ));

   $keenmoon_customize->add_control('keenmoon_copyright_display', array(
      'type' => 'textarea',
      'label' => __('Change To Footer Copyright Text', 'keenmoon'),
      'section' => 'keenmoon_copyright_section',
      //'settings' => 'keenmoon_copyright_display'
   ));

   //adding setting for footer background color
   $keenmoon_customize->add_section('keenmoon_bg_color_section', array(
      'title' => __('Background Color', 'keenmoon'),
      'panel' => 'keenmoon_footer_panel'
   ));
   $keenmoon_customize->add_setting(
      'keenmoon_copyright_bg_color', 
      array(
      'default'        => '#222222',
   ) );
   $keenmoon_customize->add_control( new WP_Customize_Color_Control( $keenmoon_customize, 'keenmoon_copyright_bg_color', array(
      'label'   => 'Footer Color Setting',
      'section' => 'keenmoon_bg_color_section',
      'settings'   => 'keenmoon_copyright_bg_color',
   )));



   // Keenmoon Theme important links started
   class KEENMOON_Important_Links extends WP_Customize_Control {

      public $type = "keenmoon-important-links";

      public function render_content() {
         //Add Theme instruction, Support Forum, Demo Link
         $important_links = array(
               'documentation' => array(
               'link' => esc_url('http://shafiqul.info/demo/keenmoon/documentation'),
               'text' => __('Documentation', 'keenmoon'),
            ),
               'support' => array(
               'link' => esc_url('http://shafiqul.info/'),
               'text' => __('Support', 'keenmoon'),
            ),
               'demo' => array(
               'link' => esc_url('http://shafiqul.info/demo/keenmoon/'),
               'text' => __('View Demo', 'keenmoon'),
            )
         );
         foreach ($important_links as $important_link) {
            echo '<p><a class="theme-link-btn" target="_blank" href="' . $important_link['link'] . '" >' . esc_attr($important_link['text']) . ' </a></p>';
         }
      }

   }

   $keenmoon_customize->add_section('keenmoon_important_links', array(
      'priority' => 700,
      'title' => __('Keenmoon Theme Important Links', 'keenmoon'),
   ));

   /**
    * This setting has the dummy Sanitizaition function as it contains no value to be sanitized
    */
   $keenmoon_customize->add_setting('keenmoon_important_links', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'keenmoon_links_sanitize'
   ));

   $keenmoon_customize->add_control(new KEENMOON_Important_Links($keenmoon_customize, 'important_links', array(
      'label' => __('Important Links', 'keenmoon'),
      'section' => 'keenmoon_important_links',
      'settings' => 'keenmoon_important_links'
   )));
   // Keenmoon Theme Important Links Ended

   // sanitization works
   // radio button sanitization

   function keenmoon_show_radio_saniztize($input) {
      $valid_keys = array(
         'header_logo_only' => __('Header Logo Only', 'keenmoon'),
         'header_text_only' => __('Header Text Only', 'keenmoon')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }

   function keenmoon_layout_sanitize($input) {
      $valid_keys = array(
         'right_sidebar' => KEENMOON_THEME_URL . '/images/admin/right-sidebar.png',
         'left_sidebar' => KEENMOON_THEME_URL . '/images/admin/left-sidebar.png',
         'no_sidebar_full_width' => KEENMOON_THEME_URL . '/images/admin/no-sidebar-full-width-layout.png'
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }
   function keenmoon_blog_style_sanitize($input) {
      $valid_keys = array(
         'blog_post_style_1' => KEENMOON_THEME_URL . '/images/admin/blog_post_style_1.png',
         'blog_post_style_2' => KEENMOON_THEME_URL . '/images/admin/blog_post_style_2.png'
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }


   // color sanitization
   function keenmoon_color_option_hex_sanitize($color) {
      if ($unhashed = sanitize_hex_color_no_hash($color))
         return '#' . $unhashed;

      return $color;
   }

   function keenmoon_color_escaping_option_sanitize($input) {
      $input = esc_attr($input);
      return $input;
   }

   // checkbox sanitization
   function keenmoon_checkbox_sanitize($input) {
      if ( $input == 1 ) {
         return 1;
      } else {
         return '';
      }
   }

   // sanitization of links
   function keenmoon_links_sanitize() {
      return false;
   }
}
add_action('customize_register','keenmoon_customizer_theme');

