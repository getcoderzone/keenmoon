<?php
/**
 * Featured Posts widget
 */
class keenmoon_featured_posts_widget extends WP_Widget {

   function __construct() {
      $widget_ops = array( 'classname' => 'widget_featured_posts widget_featured_meta', 'description' =>__( 'Display latest posts or posts of specific category.' , 'keenmoon') );
      $control_ops = array( 'width' => 200, 'height' =>250 );
      parent::__construct( false,$name= __( 'KM: Featured Posts', 'keenmoon' ),$widget_ops);
   }

   function form( $instance ) {
      $tg_defaults['title'] = '';
      $tg_defaults['text'] = '';
      $tg_defaults['number'] = 4;
      $tg_defaults['type'] = 'latest';
      $tg_defaults['category'] = '';
      $instance = wp_parse_args( (array) $instance, $tg_defaults );
      $title = esc_attr( $instance[ 'title' ] );
      $text = esc_textarea($instance['text']);
      $number = $instance['number'];
      $type = $instance['type'];
      $category = $instance['category'];
      ?>

      <p>
         <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'keenmoon' ); ?></label>
         <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
      </p>
      <?php _e( 'Description','keenmoon' ); ?>
      <textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
      <p>
         <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e( 'Number of posts to display:', 'keenmoon' ); ?></label>
         <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
      </p>

      <p><input type="radio" <?php checked($type, 'latest') ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest"/><?php _e( 'Show latest Posts', 'keenmoon' );?><br />
       <input type="radio" <?php checked($type,'category') ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category"/><?php _e( 'Show posts from a category', 'keenmoon' );?><br /></p>

      <p>
         <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'keenmoon' ); ?>:</label>
         <?php wp_dropdown_categories( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'category' ), 'selected' => $category ) ); ?>
      </p>
      <?php
   }

   function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
      if ( current_user_can('unfiltered_html') )
         $instance['text'] =  $new_instance['text'];
      else
      $instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) );
      $instance[ 'number' ] = absint( $new_instance[ 'number' ] );
      $instance[ 'type' ] = $new_instance[ 'type' ];
      $instance[ 'category' ] = $new_instance[ 'category' ];

      return $instance;
   }

   function widget( $args, $instance ) {
      extract( $args );
      extract( $instance );

      global $post;
      $title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
      $text = isset( $instance[ 'text' ] ) ? $instance[ 'text' ] : '';
      $number = empty( $instance[ 'number' ] ) ? 4 : $instance[ 'number' ];
      $type = isset( $instance[ 'type' ] ) ? $instance[ 'type' ] : 'latest' ;
      $category = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';

      if( $type == 'latest' ) {
         $get_featured_posts = new WP_Query( array(
            'posts_per_page'        => $number,
            'post_type'             => 'post',
            'ignore_sticky_posts'   => true
         ) );
      }
      else {
         $get_featured_posts = new WP_Query( array(
            'posts_per_page'        => $number,
            'post_type'             => 'post',
            'category__in'          => $category
         ) );
      }
      echo $before_widget;
      ?>
      <?php
		if ( !empty( $title ) ) { echo '<h3 class="widget-title"><span>'. esc_html( $title ) .'</span></h3>'; }
		if( !empty( $text ) ) { ?> <p> <?php echo esc_textarea( $text ); ?> </p> <?php } ?>
		<div class="populer-post">
        <?php
         	while( $get_featured_posts->have_posts() ):$get_featured_posts->the_post();
            ?>
            <div class="populer-post-item">
				<div class="row">
					<div class="col-sm-4">
						<figure>
							<?php 
   							if ( has_post_thumbnail()) {
                           the_post_thumbnail('thumbnail', array('class' => 'img-responsive')); 
   							}
                        else{
                           ?>
                              <a href="<?php the_permalink();?>"><img class="img-reponsive" src="<?php echo get_template_directory_uri() .'/images/image-not-available.jpg'?>" alt="<?php echo the_title();?>"></a>
                           <?php
                        }
							?>
						</figure>
					</div>
					<div class="col-sm-8 populer-post-description">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
							<h4>
								<?php 
                           echo the_title();
								?>
							</h4>
						</a>
						<div class="author">
							<i class="fa fa-user"></i> By 			                        		
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo get_the_author(); ?>">
	                        <?php echo esc_html( get_the_author() ); ?>
	                        </a>
	                        <span class="comments"><i class="fa fa-comment"></i> 
		                    	<?php comments_popup_link( '0 Comments', '1 Comment', '% Comments' );?>
		                    </span>
						</div>
						<p><?php echo keenmoon_length_excerpt('8');?></p>
					</div>
				</div>
			</div>
        <?php
        endwhile;
        ?>
		</div>
        <?php
         // Reset Post Data
         wp_reset_query();
         ?>
      <!-- </div> -->
      <?php echo $after_widget;
      }
}