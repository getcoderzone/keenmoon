<?php 
/*
	Home Featured Post Widget
*/

class keenmoon_featured_post_widget Extends WP_Widget{
	private $post_types = array();
	function __construct(){
		parent::__construct(
			'keenmoon_featured_post_widget_id',
			__('KM: Home Featured Post', 'keenmoon'),
			array(
				'description' => __('This is a Home Page Featured Post Widget', 'keenmoon')
			)
		);
	}

	function form($instance){
		$instance = wp_parse_args( (array) $instance, array(
			'title' => 'Featured Post', 
			'h_featured_post_type' => 'post',
			'f_showposts' => '4',
			'h_show_featured_image' => 'on',
			'f_select_category' => '',
			'f_type' => 'latest',
			'f_length_excerpt' => '30',
			'f_read_more' => 'Read More'
		)
		);
		$title = $h_featured_post_type = $f_showposts = $f_select_category = $f_type = $h_show_featured_image = $f_length_excerpt = $f_read_more = '';
		if (isset($instance['title'])) {
			$title = $instance['title'];
		}
		if (isset($instance['h_featured_post_type'])) {
			$h_featured_post_type = $instance['h_featured_post_type'];
		}
		if(isset($instance['f_showposts'])){
			$f_showposts = $instance['f_showposts'];
		}
		if(isset($instance['f_select_category'])){
			$f_select_category = $instance['f_select_category'];
		}
		if (isset($instance['f_type'])) {
			$f_type = $instance['f_type'];
		}
		if (isset($instance['h_show_featured_image'])) {
			$h_show_featured_image = $instance['h_show_featured_image'];
		}
		if (isset($instance['f_length_excerpt'])) {
			$f_length_excerpt = $instance['f_length_excerpt'];
		}
		if (isset($instance['f_read_more'])) {
			$f_read_more = $instance['f_read_more'];
		}
		$this->post_types = get_post_types(array(
            '_builtin' => false,
        ) , 'names', 'or');

        $this->post_types['post'] = 'Post';
        $this->post_types['page'] = 'Page';
        ksort($this->post_types);

		?>
			<p>
				<label for="<?php $this->get_field_id('title');?>">Title:
					<input type="text" class="widefat" id="<?php echo $this->get_field_id('title')?>" name="<?php echo $this->get_field_name('title');?>" value="<?php echo esc_attr($title);?>">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('h_featured_post_type');?>">Post Type:
					<select name="<?php echo $this->get_field_name('h_featured_post_type');?>" id="<?php echo $this->get_field_id('h_featured_post_type')?>">
						<?php 
							foreach ($this->post_types as $key => $post_type) {
					            echo '<option value="' . $key . '"' . ($key == $h_featured_post_type ? " selected" : "") . '>' . $key . "</option>";
					        }
						?>
					</select>
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('f_showposts');?>">Number of posts to display:
					<input type="text"  id="<?php echo $this->get_field_id('f_showposts')?>" name="<?php echo $this->get_field_name('f_showposts');?>" value="<?php echo esc_attr($f_showposts);?>">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('h_show_featured_image'); ?>"> Show Featured  Image:
					<input type="checkbox" <?php checked( $h_show_featured_image, 'on' ); ?>  id="<?php echo $this->get_field_id('h_show_featured_image');?>" name="<?php echo $this->get_field_name('h_show_featured_image');?>" >
				</label>
			</p>
			<p>
				<input type="radio" <?php checked($f_type, 'latest') ?> id="<?php echo $this->get_field_id( 'f_type' ); ?>" name="<?php echo $this->get_field_name( 'f_type' ); ?>" value="latest"/><?php _e( 'Show Featured Posts', 'keenmoon' );?><br />
				<input type="radio" <?php checked($f_type,'category') ?> id="<?php echo $this->get_field_id( 'f_type' ); ?>" name="<?php echo $this->get_field_name( 'f_type' ); ?>" value="category"/><?php _e( 'Show posts from a category', 'keenmoon' );?><br />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('f_select_category');?>">Select category: 
					<?php wp_dropdown_categories( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'f_select_category' ), 'selected' => $f_select_category ) ); ?>
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('f_length_excerpt');?>">Post Content Length:
					<input type="text" class="widefat" id="<?php echo $this->get_field_id('f_length_excerpt');?>" name="<?php echo $this->get_field_name('f_length_excerpt');?>" value="<?php echo esc_attr($f_length_excerpt);?>">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('f_read_more');?>">Read More Text Change:
					<input type="text" class="widefat" id="<?php echo $this->get_field_id('f_read_more');?>" name="<?php echo $this->get_field_name('f_read_more');?>" value="<?php echo esc_attr($f_read_more);?>">
				</label>
			</p>
		<?php 
	}
	function widget($args, $instance){
		extract($args);
		extract($instance);
		$h_show_featured_image = '';
		if (isset($instance['h_featured_post_type'])) {
			$h_featured_post_type = $instance['h_featured_post_type'];
		}
		if (isset($instance['f_showposts'])) {
			$f_showposts = $instance['f_showposts'];
		}
		if (isset($instance['f_select_category'])) {
			$f_select_category = $instance['f_select_category'];
		}
		if (isset($instance['f_type'])) {
			$f_type = $instance['f_type'];
		}
		if (isset($instance['h_show_featured_image'])) {
			$h_show_featured_image = $instance['h_show_featured_image'];
		}
		if (isset($instance['f_length_excerpt'])) {
			$f_length_excerpt = $instance['f_length_excerpt'];
		}
		if (isset($instance['f_read_more'])) {
			$f_read_more = $instance['f_read_more'];
		}

		echo $args['before_widget'];
		echo $args['before_title'].$title.$args['after_title'];
		
		wp_reset_query();
        global $wp_query;
        $old_query = $wp_query;
        if ($f_type == 'latest') {
        	$FeaturedPost_query = new WP_Query(array(
	            'post_type' => $h_featured_post_type,
	            'showposts' => $f_showposts,
	            'featured' => 'yes',
	            'paged' => 1
        	));
        }
        else{
        	$FeaturedPost_query = new WP_Query(array(
	            'post_type' => $h_featured_post_type,
	            'showposts' => $f_showposts,
	            'featured' => 'yes',
	            'category__in' => $f_select_category,
	            'paged' => 1
        	));
        }

        echo '<div class="row">';
        while ($FeaturedPost_query->have_posts()) {
            $FeaturedPost_query->the_post();

		?>

			<div class="col-sm-6"> 
				<div class="latest-blog-item">
					<?php 
						if ($h_show_featured_image == 'on') {
							?>
								<figure>
									<?php 
										if ( has_post_thumbnail()) {
											the_post_thumbnail('large', array('class' => 'img-responsive')); 
										}
										else{
											?>
											<a href="<?php the_permalink();?>"><img class="img-responsive" alt="<?php the_title();?>" src="<?php echo get_template_directory_uri(); ?>/images/image-not-available.jpg"></a>
											<?php
										}
									?>
									<div class="lt-category"><?php keenmoon_colored_category(); ?></div>
								</figure>
							<?php
						}
					?>
					<a href="<?php the_permalink();?>">
						<h2>	
							<?php the_title();?>
						</h2>
					</a>
					<div class="author">
						<i class="fa fa-calendar"></i>
						<?php echo get_the_date(); ?> 
						&nbsp;-&nbsp;
						<i class="fa fa-user"></i> 
						By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo get_the_author(); ?>"><?php echo esc_html( get_the_author() ); ?></a>
					</div>
					<p><?php echo keenmoon_length_excerpt(''.$f_length_excerpt.'');?></p>
					<?php 
						if (!empty($f_read_more)) {
							?>
								<a class="bt-sm-default" href="<?php the_permalink();?>"><?php echo $f_read_more;?></a>
							<?php
						}
					?>
					
					<div class="lt-comment" >
						<i class="fa fa-comments"></i> 
						<?php comments_popup_link( 'No Comments', '1 Comment', '% Comments', 'comments-link', 'Comments Off' );?>
					</div>
				</div>
			</div>			

		<?php
		}
		echo '</div>';
        wp_reset_query();
        $wp_query = $old_query;
		echo $args['after_widget'];
	}
	function update($new_instance, $old_instance){
		$instance = $old_instance;
      	$instance['title'] = strip_tags($new_instance['title']);
      	$instance['h_featured_post_type'] = strip_tags($new_instance['h_featured_post_type']);
      	$instance['f_showposts'] = strip_tags($new_instance['f_showposts']);
		$instance['f_select_category'] = strip_tags($new_instance['f_select_category']);
		$instance['f_type'] = strip_tags($new_instance['f_type']);
		$instance['h_show_featured_image'] = strip_tags($new_instance['h_show_featured_image']);
		$instance['f_length_excerpt'] = strip_tags($new_instance['f_length_excerpt']);
		$instance['f_read_more'] = strip_tags($new_instance['f_read_more']);
		return $instance;
	}


}

?>