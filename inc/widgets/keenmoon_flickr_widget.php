<?php 

/**Keenmoon flickr Widget**/


class keenmoon_flickr_widget Extends WP_widget{
   function __construct(){
      parent::__construct(
         'keenmoon_flickr_widget_id',
         __('KM: Flickr Widget', 'keenmoon'),
         array(
            'description' => __('This is a Keenmoon Flickr Widget', 'keenmoon')
         )
      );
   }
   function  form($instance){
      $instance = wp_parse_args( (array) $instance, array(
         'title' => 'Flickr Photos', 
         'km_flickr_id' => '',
         'flickr_ordering_img' => 'latest',
         'size_of_image' => 'square',
         'flickr_image_width' => '325',
         'number_of_image' => '12',
         'flickr_image_margin' => '2'
      )
      );
 
      $title = $km_flickr_id = $flickr_ordering_img = $size_of_image = $flickr_image_width = $number_of_image = $flickr_image_margin = '';
      if (isset($instance['title'])) {
         $title = $instance['title'];
      }
      if (isset($instance['km_flickr_id'])) {
         $km_flickr_id = $instance['km_flickr_id'];
      }
      if(isset($instance['flickr_ordering_img'])){
         $flickr_ordering_img = $instance['flickr_ordering_img'];
      }
      if (isset($instance['size_of_image'])) {
         $size_of_image = $instance['size_of_image'];
      }
      if (isset($instance['flickr_image_width'])) {
         $flickr_image_width = $instance['flickr_image_width'];
      }
      if (isset($number_of_image)) {
         $number_of_image = $instance['number_of_image'];
      }
      if (isset($instance['flickr_image_margin'])) {
         $flickr_image_margin = $instance['flickr_image_margin'];
      }
      ?>
         <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title: 
               <input type="text" class="widefat" id="<?php echo $this->get_field_id('title')?>" name="<?php echo $this->get_field_name('title');?>" value="<?php echo esc_attr($title);?>">
            </label>
         </p>
         <p>
            <label for="<?php echo $this->get_field_id('km_flickr_id')?>">Flickr ID: 
               <input type="text" class="widefat" id="<?php echo $this->get_field_id('km_flickr_id');?>" name="<?php echo $this->get_field_name('km_flickr_id');?>" value="<?php echo esc_attr($km_flickr_id);?>" >
            </label>
            <span>You can <a target="_blank" href="http://idgettr.com/">Generate</a> your flickr ID</span>
         </p>
         <p>
            <label for="<?php echo $this->get_field_id('flickr_ordering_img');?>">Ordering your images
               <select name="<?php echo $this->get_field_name('flickr_ordering_img'); ?>" id="<?php echo $this->get_field_id('flickr_ordering_img') ?>">
                  <option <?php selected($flickr_ordering_img, 'latest');?> value="latest">Latest</option>
                  <option <?php selected($flickr_ordering_img, 'random');?> value="random">Random</option>
               </select>
            </label>
         </p>
         <p>
            <label for="<?php echo $this->get_field_id('size_of_image');?>">Size of your images:
               <select name="<?php echo $this->get_field_name('size_of_image') ?>" id="<?php echo $this->get_field_id('size_of_image');?>">
                  <option <?php selected($size_of_image,'square');?> value="square">Small Size</option>
                  <option <?php selected($size_of_image,'thumb');?>value="thumb">Thumbnail size</option>
                  <option <?php selected($size_of_image,'mid' );?>value="mid">Medium size</option>
               </select>
            </label>
         </p>
         <p>
            <label for="<?php echo $this->get_field_id('flickr_image_margin');?>">Image Margin
               <input type="text" class="widefat" id="<?php echo $this->get_field_id('flickr_image_margin');?>" name="<?php echo $this->get_field_name('flickr_image_margin');?>" value="<?php echo esc_attr($flickr_image_margin);?>">
            </label>
         </p>
         <p>
            <label for="<?php echo $this->get_field_id('flickr_image_width');?>">Width
               <input type="text" class="widefat" id="<?php echo $this->get_field_id('flickr_image_width');?>" name="<?php echo $this->get_field_name('flickr_image_width');?>" value="<?php echo esc_attr($flickr_image_width);?>">
            </label>
         </p>
         <p>
            <label for="<?php echo $this->get_field_id('number_of_image')?>">Number of images:
               <input type="text" class="widefat" id="<?php echo $this->get_field_id('number_of_image')?>" name="<?php echo $this->get_field_name('number_of_image'); ?>" value="<?php echo esc_attr($number_of_image);?>">
            </label>
         </p>
      <?php 
   }
   function widget($args, $instance){
      extract($args);
      extract($instance);
      if (isset($instance['km_flickr_id'])) {
         $km_flickr_id = $instance['km_flickr_id'];
      }
      if (isset($instance['flickr_ordering_img'])) {
         $flickr_ordering_img = $instance['flickr_ordering_img'];
      }
      if (isset($size_of_image['size_of_image'])) {
         $size_of_image = $instance['size_of_image'];
      }
      if (isset($instance['flickr_image_width'])) {
         $flickr_image_width = $instance['flickr_image_width'];
      }
      if (isset($instance['number_of_image'])) {
         $number_of_image = $instance['number_of_image'];
      }
      if (isset($instance['flickr_image_margin'])) {
         $flickr_image_margin = $instance['flickr_image_margin'];
      }
      echo $args['before_widget'];
      echo $args['before_title'].$title.$args['after_title'];

      ?>
         <style type="text/css"> 
            .flickrimg {padding:1px; margin:<?php echo $flickr_image_margin; ?>px;}
            #flickr_badge_wrapper {width:<?php echo $flickr_image_width;?>px;text-align:left}
         </style>

         <div id="flickr_badge_wrapper">
            <script type="text/javascript" src="http://www.flickr.com/badge_code.gne?count=<?php echo $number_of_image;?>&display=<?php echo $flickr_ordering_img; ?>&size=<?php echo $size_of_image;?>&nsid=<?php echo $km_flickr_id;?>&raw=1"></script>
         </div>
               
      <?php

      echo $args['after_widget'];


   }
   function update($new_instance, $old_instance){
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['km_flickr_id'] = strip_tags($new_instance['km_flickr_id']);
      $instance['flickr_ordering_img'] = strip_tags($new_instance['flickr_ordering_img']);
      $instance['size_of_image'] = strip_tags($new_instance['size_of_image']);
      $instance['flickr_image_width'] = strip_tags($new_instance['flickr_image_width']);
      $instance['number_of_image'] = strip_tags($new_instance['number_of_image']);
      $instance['flickr_image_margin'] = strip_tags($new_instance['flickr_image_margin']);
      return $instance;
   }

}