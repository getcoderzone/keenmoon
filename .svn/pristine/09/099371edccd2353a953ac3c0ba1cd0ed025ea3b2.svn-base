<?php
/**
 * About Me widget
 */
class keenmoon_about_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function keenmoon_about_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'keenmoon_about_widget', 'description' => __('A widget that displays an About
		widget', 'keenmoon') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'keenmoon_about_widget' );

		/* Create the widget. */
		parent::__construct( 'keenmoon_about_widget', __('KM: About Me', 'keenmoon'), $widget_ops, $control_ops );

		add_action('admin_enqueue_scripts', array($this, 'keenmoon_upload_scripts'));
	}
	public function keenmoon_upload_scripts()
	{
	    wp_enqueue_script('media-upload');
	    wp_enqueue_script('thickbox');
	    wp_enqueue_style('thickbox');
	    wp_enqueue_script('keenmoon_upload_media_widget', get_template_directory_uri() . '/js/upload-media.js', array('jquery'));
	}


	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$about_me_twiiter = "";
		$title = apply_filters('widget_title', $instance['title'] );
		if (isset($instance['image'])) {
			$image = $instance['image'];
		}
		if (isset($instance['description'])) {
			$description = $instance['description'];
		}
		if (isset($instance['about_me_facebook'])) {
			$about_me_facebook = $instance['about_me_facebook'];
		}
		if (isset($instance['about_me_twiiter'])) {
			$about_me_twiiter = $instance['about_me_twiiter'];
		}
		if (isset($instance['about_me_linkedin'])) {
			$about_me_linkedin = $instance['about_me_linkedin'];
		}
		if (isset($instance['about_me_google_plus'])) {
			$about_me_google_plus = $instance['about_me_google_plus'];
		}
		if (isset($instance['about_me_youtube'])) {
			$about_me_youtube = $instance['about_me_youtube'];
		}
		if (isset($instance['readMore'])) {
			$readMore = $instance['readMore'];
		}
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
			<div class="about-me text-center">
				
				<?php if($instance['image']) {
					?>
					<img class="img-responsive" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" />
					<?php
					}
					else{
						?>
						<img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/me.jpg" alt="Jonh Due" />
						<?php
					}
				?>
				
				<ul class="about-me-social">
					<?php if(!empty($instance['about_me_facebook'])) : ?>
						<li><a href="<?php echo esc_url($about_me_facebook);?>"><i class="fa fa-facebook"></i></a></li>
					<?php endif; ?>

					<?php if(!empty($instance['about_me_twitter'])) : ?>
						<li><a href="<?php echo esc_url($about_me_twitter);?>"><i class="fa fa-twitter"></i></a></li>
					<?php endif; ?>

					<?php if(!empty($instance['about_me_linkedin'])) : ?>
						<li><a href="<?php echo esc_url($about_me_linkedin);?>"><i class="fa fa-linkedin"></i></a></li>
					<?php endif; ?>

					<?php if(!empty($instance['about_me_google_plus'])) : ?>
						<li><a href="<?php echo esc_url($about_me_google_plus);?>"><i class="fa fa-google-plus"></i></a></li>
					<?php endif; ?>

					<?php if(!empty($instance['about_me_youtube'])) : ?>
						<li><a href="<?php echo esc_url($about_me_youtube);?>"><i class="fa fa-youtube"></i></a></li>
					<?php endif; ?>
				</ul>
				<?php if($description) : ?>
					<p><?php echo esc_attr($description); ?></p>
				<?php endif; ?>	
				<?php if (!empty($instance['readMore'])) : ?>
						<a class="bt-md-default" href="<?php echo esc_url($readMore); ?>">Read More</a>
				<?php endif; ?>	

				
			</div>
			
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['image'] = strip_tags( $new_instance['image'] );
		$instance['description'] = strip_tags( $new_instance['description'] );
		$instance['about_me_facebook'] = strip_tags( $new_instance['about_me_facebook'] );
		$instance['about_me_twitter'] = strip_tags( $new_instance['about_me_twitter'] );
		$instance['about_me_linkedin'] = strip_tags( $new_instance['about_me_linkedin'] );
		$instance['about_me_google_plus'] = strip_tags( $new_instance['about_me_google_plus'] );
		$instance['about_me_youtube'] = strip_tags( $new_instance['about_me_youtube'] );
		$instance[ 'readMore' ] = strip_tags( $new_instance[ 'readMore' ] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('About Me', 'keenmoon'), 'image' => '', 'description' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		$image = $about_me_facebook = $about_me_twitter = $about_me_linkedin = $about_me_google_plus = $about_me_youtube = $readMore = '';

        if(isset($instance['image']))
        {
            $image = $instance['image'];
        }
        if ( isset( $instance[ 'about_me_facebook' ] )) {
            $about_me_facebook = $instance[ 'about_me_facebook' ];
        }
        if ( isset( $instance[ 'about_me_twitter' ] )) {
            $about_me_twitter = $instance[ 'about_me_twitter' ];
        }
        if ( isset( $instance[ 'about_me_linkedin' ] )) {
            $about_me_linkedin = $instance[ 'about_me_linkedin' ];
        }
        if ( isset( $instance[ 'about_me_google_plus' ] )) {
            $about_me_google_plus = $instance[ 'about_me_google_plus' ];
        }
        if ( isset( $instance[ 'about_me_youtube' ] )) {
            $about_me_youtube = $instance[ 'about_me_youtube' ];
        }

        if ( isset( $instance[ 'readMore' ] )) {
            $readMore = $instance[ 'readMore' ];
        }

		?>



		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e('Title:', 'keenmoon') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" />
		</p>
		
		<!-- Image url -->
        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:', 'keenmoon' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat about_me_img" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button button button-primary left" type="button" value="Upload Image" />
        </p>

		<!-- Description -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'description' )); ?>"><?php _e('About me text:', 'keenmoon') ?></label>
			<textarea id="<?php echo esc_attr($this->get_field_id( 'description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'description' )); ?>" style="width:95%;" rows="6"><?php echo esc_attr($instance['description']); ?></textarea>
		</p>
		
		<!-- Social Icon-->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'about_me_facebook' )); ?>"><?php _e('Facebook:', 'keenmoon') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'about_me_facebook' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'about_me_facebook' )); ?>"  class="widefat" value="<?php echo esc_url($about_me_facebook);?>" >
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'about_me_twitter' )); ?>"><?php _e('Twitter:', 'keenmoon') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'about_me_twitter' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'about_me_twitter' )); ?>"  class="widefat" value="<?php echo esc_url($about_me_twitter);?>" >
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'about_me_linkedin' )); ?>"><?php _e('Linkedin:', 'keenmoon') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'about_me_linkedin' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'about_me_linkedin' )); ?>"  class="widefat" value="<?php echo esc_url($about_me_linkedin);?>" >
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'about_me_google_plus' )); ?>"><?php _e('Google Plus:', 'keenmoon') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'about_me_google_plus' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'about_me_google_plus' )); ?>"  class="widefat" value="<?php echo esc_url($about_me_google_plus);?>" >
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'about_me_youtube' )); ?>"><?php _e('Youtube:', 'keenmoon') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'about_me_youtube' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'about_me_youtube' )); ?>"  class="widefat" value="<?php echo esc_url($about_me_youtube); ?>" >
		</p>


		<!-- Read More -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'readMore' )); ?>"><?php _e('Read More Link:', 'keenmoon') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'readMore' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'readMore' )); ?>"  class="widefat" value="<?php echo esc_url($readMore);?>" >
		</p>


	<?php
	}
}