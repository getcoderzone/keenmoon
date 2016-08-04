<?php 
/**
 * KeenMoon Slider Widget
 */

class keenmoon_slider_widget extends WP_Widget{

	public function __construct(){
		parent::__construct(
			'keenmoon_slider_widget_id',
			__('KM: Home Slider Widget', 'keenmoon'),
			array(
				'discription' => __('This is a Keenmoon slider widget', 'keenmoon')
			)
		);
	}
	public function form($instance){
		$instance = wp_parse_args( (array) $instance, array( 
			'slider_post_type' => 'post',
			'slider_showposts' => '4',
			'slider_select_category' => '',
			'slider_type' => 'latest',
			'slider_length_excerpt' => '30',
			'slider_read_more' => 'Read More'
		)
		);
		$slider_post_type = $slider_showposts = $slider_select_category = $slider_type = $slider_length_excerpt = $slider_read_more = '';
		if (isset($instance['slider_post_type'])) {
			$slider_post_type = $instance['slider_post_type'];
		}
		if(isset($instance['slider_showposts'])){
			$slider_showposts = $instance['slider_showposts'];
		}
		if(isset($instance['slider_select_category'])){
			$slider_select_category = $instance['slider_select_category'];
		}
		if (isset($instance['slider_type'])) {
			$slider_type = $instance['slider_type'];
		}
		if (isset($instance['slider_length_excerpt'])) {
			$slider_length_excerpt = $instance['slider_length_excerpt'];
		}
		if (isset($instance['slider_read_more'])) {
			$slider_read_more = $instance['slider_read_more'];
		}
		$this->post_types = get_post_types(array(
            '_builtin' => false,
        ) , 'names', 'or');

        $this->post_types['post'] = 'Post';
        $this->post_types['page'] = 'Page';
        ksort($this->post_types);

		?>
			<p>
				<label for="<?php echo $this->get_field_id('slider_post_type');?>">Post Type:
					<select name="<?php echo $this->get_field_name('slider_post_type');?>" id="<?php echo $this->get_field_id('slider_post_type')?>">
						<?php 
							foreach ($this->post_types as $key => $post_type) {
					            echo '<option value="' . $key . '"' . ($key == $slider_post_type ? " selected" : "") . '>' . $key . "</option>";
					        }
						?>
					</select>
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('slider_showposts');?>">Number of posts to display:
					<input type="text"  id="<?php echo $this->get_field_id('slider_showposts')?>" name="<?php echo $this->get_field_name('slider_showposts');?>" value="<?php echo esc_attr($slider_showposts);?>">
				</label>
			</p>
			<p>
				<input type="radio" <?php checked($slider_type, 'latest') ?> id="<?php echo $this->get_field_id( 'slider_type' ); ?>" name="<?php echo $this->get_field_name( 'slider_type' ); ?>" value="latest"/><?php _e( 'Show Featured Posts', 'keenmoon' );?><br />
				<input type="radio" <?php checked($slider_type,'category') ?> id="<?php echo $this->get_field_id( 'slider_type' ); ?>" name="<?php echo $this->get_field_name( 'slider_type' ); ?>" value="category"/><?php _e( 'Show posts from a category', 'keenmoon' );?><br />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('slider_select_category');?>">Select category: 
					<?php wp_dropdown_categories( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'slider_select_category' ), 'selected' => $slider_select_category ) ); ?>
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('slider_length_excerpt');?>">Post Content Length:
					<input type="text" class="widefat" id="<?php echo $this->get_field_id('slider_length_excerpt');?>" name="<?php echo $this->get_field_name('slider_length_excerpt');?>" value="<?php echo esc_attr($slider_length_excerpt);?>">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('slider_read_more');?>">Read More Text Change:
					<input type="text" class="widefat" id="<?php echo $this->get_field_id('slider_read_more');?>" name="<?php echo $this->get_field_name('slider_read_more');?>" value="<?php echo esc_attr($slider_read_more);?>">
				</label>
			</p>
		<?php 
	}
	public function widget($args, $instance){
		extract($args);

		if (isset($instance['slider_post_type'])) {
			$slider_post_type = $instance['slider_post_type'];
		}
		else{
			$slider_post_type = 'post';
		}
		if (isset($instance['slider_showposts'])) {
			$slider_showposts = $instance['slider_showposts'];
		}
		else{
			$slider_showposts = '5';
		}
		if (isset($instance['slider_select_category'])) {
			$slider_select_category = $instance['slider_select_category'];
		}
		if (isset($instance['slider_type'])) {
			$slider_type = $instance['slider_type'];
		}
		else{
			$slider_type = 'latest';
		}
		if (isset($instance['slider_length_excerpt'])) {
			$slider_length_excerpt = $instance['slider_length_excerpt'];
		}
		else{
			$slider_length_excerpt = '30';
		}
		if (isset($instance['slider_read_more'])) {
			$slider_read_more = $instance['slider_read_more'];
		}
		else{
			$slider_read_more = 'Read More';
		}

		echo $args['before_widget'];
		
		wp_reset_query();
        global $wp_query;
        $old_query = $wp_query;
        if ($slider_type == 'latest') {
        	$SliderPost_query = new WP_Query(array(
	            'post_type' => $slider_post_type,
	            'showposts' => $slider_showposts,
	            'featured' => 'yes',
	            'paged' => 1
        	));
        }
        else{
        	$SliderPost_query = new WP_Query(array(
	            'post_type' => $slider_post_type,
	            'showposts' => $slider_showposts,
	            'featured' => 'yes',
	            'category__in' => $slider_select_category,
	            'paged' => 1
        	));
        }

        echo '<div id="slider">';
        while ($SliderPost_query->have_posts()) {
            $SliderPost_query->the_post();
		?>
			<div class="item">
				<?php 
					if ( has_post_thumbnail()) {
						the_post_thumbnail('large', array('class' => 'img-responsive')); 
					}
					else{
						?>
						<img class="img-responsive"  alt="<?php the_title();?>" src="<?php echo get_template_directory_uri(); ?>/images/post-slider-image-not-available.jpg">
						<?php
					}
				?>
				<div class="slider-caption">
					<a class="title" href="<?php the_permalink();?>"><?php the_title();?></a>
					<p><?php echo keenmoon_length_excerpt(''.$slider_length_excerpt.'');?></p>
					<a class="bt-md-default" href="<?php the_permalink();?>"><?php echo $slider_read_more;?></a>
				</div>
			</div>	
		<?php 
		}
		echo '</div>';
        wp_reset_query();
        $wp_query = $old_query;
		echo $args['after_widget'];
	}

	public function update($new_instance, $old_instance){
		$instance = $old_instance;

      	$instance['slider_post_type'] = strip_tags($new_instance['slider_post_type']);
      	$instance['slider_showposts'] = strip_tags($new_instance['slider_showposts']);
		$instance['slider_select_category'] = strip_tags($new_instance['slider_select_category']);
		$instance['slider_type'] = strip_tags($new_instance['slider_type']);
		$instance['slider_length_excerpt'] = strip_tags($new_instance['slider_length_excerpt']);
		$instance['slider_read_more'] = strip_tags($new_instance['slider_read_more']);
		return $instance;
	}


}
?>