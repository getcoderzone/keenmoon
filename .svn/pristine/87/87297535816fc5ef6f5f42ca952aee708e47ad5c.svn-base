<?php 
/**
 * KeenMoon Twitter Feed Widget
 */

class keenmoon_twitter_feed_widget extends WP_Widget{
	public function __construct(){
		parent::__construct(
			'keenmoon_twitter_feed_widget_id',
			__('KM: Twitter Feed', 'keenmoon'),
			array(
				'description' => __('This is a KM Twitter Feed Widget', 'keenmoon')
			)
		);
	}
	function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 
				'title' => 'Twitter Feed',
				'twitter_widget_id' => '600720083413962752',
				'twitter_url' => 'https://twitter.com/TwitterDev',
				'twitter_feed_width' => '300',
				'twitter_feed_height' => '300'
			) 
		);
		$title = $twitter_widget_id  = $twitter_url = $twitter_feed_width = $twitter_feed_height = '';
		if(isset($instance['title'])){
			$title = $instance['title'];
		}
		if (isset($instance['twitter_widget_id'])) {
			$twitter_widget_id = $instance['twitter_widget_id'];
		}
		if (isset($instance['twitter_url'])) {
			$twitter_url = $instance['twitter_url'];
		}
		if (isset($instance['twitter_feed_width'])) {
			$twitter_feed_width = $instance['twitter_feed_width'];
		}
		if (isset($twitter_feed_height)) {
			$twitter_feed_height = $instance['twitter_feed_height'];
		}

		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"> Title:
					<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title);?>" class="widefat" type="text">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('twitter_widget_id')?>">Twitter Widget ID:
					<input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter_widget_id');?>" name="<?php echo $this->get_field_name('twitter_widget_id')?>" value="<?php echo esc_attr($twitter_widget_id);?>">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('twitter_url');?>">Twitter Feed URL:
					<input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter_url');?>" name="<?php echo $this->get_field_name('twitter_url')?>" value="<?php echo esc_url($twitter_url);?>">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('twitter_feed_width');?>">Twitter Feed Width:
					<input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter_feed_width')?>" name="<?php echo $this->get_field_name('twitter_feed_width');?>" value="<?php echo esc_attr($twitter_feed_width);?>">
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('twitter_feed_height'); ?>">Twitter Feed Height:
					<input type="text" class="widefat" id="<?php $this->get_field_id('twitter_feed_height'); ?>" name="<?php echo $this->get_field_name('twitter_feed_height'); ?>" value="<?php echo esc_attr($twitter_feed_height); ?>">
				</label>
			</p>
		<?php

	} 
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['twitter_widget_id'] = strip_tags($new_instance['twitter_widget_id']);
		$instance['twitter_url'] = strip_tags($new_instance['twitter_url']);
		$instance['twitter_feed_width'] = strip_tags($new_instance['twitter_feed_width']);
		$instance['twitter_feed_height'] = strip_tags($new_instance['twitter_feed_height']);
		return $instance;

	}
	function widget($args, $instance){
		extract($args);
		if (isset($instance['title'])) {
			$title = $instance['title'];
		}
		if (isset($instance['twitter_widget_id'])) {
			$twitter_widget_id = $instance['twitter_widget_id'];
		}
		if (isset($instance['twitter_url'])) {
			$twitter_url = $instance['twitter_url'];
		}
		if (isset($instance['twitter_feed_width'])) {
			$twitter_feed_width = $instance['twitter_feed_width'];
		}
		if (isset($instance['twitter_feed_height'])) {
			$twitter_feed_height = $instance['twitter_feed_height'];
		}
		echo $args['before_widget'];
		echo $args['before_title'].$title.$args['after_title'];
		?>
		<div class="twitter-feed text-center">
			<a class="twitter-timeline"
				data-widget-id="<?php echo esc_attr($twitter_widget_id);?>"
				href="<?php echo esc_url($twitter_url);?>"
				width="<?php echo esc_attr($twitter_feed_width); ?>"
				height="<?php echo esc_attr($twitter_feed_height) ;?>">
			</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>

		<?php
		echo $args['after_widget'];
	}
}
?>