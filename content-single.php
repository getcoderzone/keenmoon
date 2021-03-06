<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package GetCoderZone
 * @subpackage keenmoon
 * @since keenmoon 1.0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <div class="article-content clearfix">
   <div class="blog-item">
      <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
      <?php 
         if ( has_post_thumbnail() && !empty($large_image_url)) { 

         ?>
         <figure>
            <div class="gallery clearfix">
               <a title="<?php echo the_title();?>" rel="prettyPhoto" href="<?php echo $large_image_url[0]; ?>"><img class="img-responsive" alt="<?php the_title();?>" src="<?php echo $large_image_url[0]; ?>"></a>
            </div>
            <div class="lt-category"><?php keenmoon_colored_category(); ?></div>
         </figure>
      <?php } ?>
      <h2><?php the_title();?></h2>
      <div class="author">
         <i class="fa fa-calendar"></i>
         <?php echo get_the_date(); ?> 
         &nbsp;-&nbsp;
         <i class="fa fa-user"></i> 
         <?php echo __('By','keenmoon')?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo get_the_author(); ?>"><?php echo esc_html( get_the_author() ); ?></a>&nbsp;
         <?php edit_post_link( __( 'Edit', 'keenmoon' ), '<span class="edit-link"><i class="fa fa-edit"></i>', '</span>' ); ?>
      </div>
      <?php the_content();?>
      <p><?php the_tags( '<i class="fa fa-tags"></i> Tags: ', ', ', '<br />' ); ?></p>
      <?php 
         wp_link_pages( array(
            'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.__( 'Pages:', 'keenmoon' ),
            'after'             => '</div>',
            'link_before'       => '<span>',
            'link_after'        => '</span>'
         ) );
      ?>
      <?php get_template_part( 'navigation', 'single' ); ?>
      <?php if(is_single()){ ?>
      <div class="related-post-wapper">
               <?php 
                  $orig_post = $post;
                  global $post;
                  $tags = wp_get_post_tags($post->ID);
                    
                  if ($tags) {
                  $tag_ids = array();
                  foreach($tags as $individual_tag) {$tag_ids[] = $individual_tag->term_id;}
                  $args=array(
                  'tag__in' => $tag_ids,
                  'post__not_in' => array($post->ID),
                  'posts_per_page'=>12 // Number of related posts to display.

                   );
                  echo '<h3>'.__('Related Post', 'keenmoon').'</h3>';
                  
                  echo '<div class="related-post">';
                   $my_query = new wp_query( $args );
                
                   while( $my_query->have_posts() ) {
                   $my_query->the_post();
                   ?>
                     <div class="latest-blog-item">
                           <figure>
                              <?php 
                                 if ( has_post_thumbnail() ) {
                                    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
                                    ?>
                                       <a href="<?php the_permalink();?>"><img class="img-responsive" alt="<?php the_title();?>" src="<?php echo $large_image_url[0]; ?>"></a>
                                    <?php
                                 }
                                 else{
                                    ?>
                                    <a href="<?php the_permalink();?>"><img class="img-responsive" alt="<?php the_title();?>" src="<?php echo get_template_directory_uri(); ?>/images/image-not-available.jpg"></a>
                                    <?php
                                 }
                              ?>
                              <div class="lt-category"><?php keenmoon_colored_category(); ?></div>
                           </figure>
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
                           <p><?php echo keenmoon_length_excerpt('30');?></p>
                           <a class="bt-sm-default" href="<?php the_permalink();?>"><?php echo __('Read More', 'keenmoon');?></a>
                           <div class="lt-comment" >
                              <i class="fa fa-comments"></i> 
                              <?php comments_popup_link( 'No Comments', '1 Comment', '% Comments', 'comments-link', 'Comments Off' );?>
                           </div>
                     </div> 
                    
                   <?php }
                   echo '</div>';
                   }
                   $post = $orig_post;
                   wp_reset_query();
               ?>
         </div>
      <?php }?>
      <div class="blog-comment">
         <?php 
            if ( comments_open() || '0' != get_comments_number() )
            comments_template(); 
         ?>  
      </div>    
   </div>
</div>
</article>