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
         <div class="row">
            <?php 
              if ( has_post_thumbnail()) { 

              ?>
              <div class="col-md-6">
                <figure>
                   <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
                   <div class="lt-category"><?php keenmoon_colored_category(); ?></div>
                </figure>
              </div>
            <?php } ?>
            <div class="col-md-<?php if(empty($large_image_url)){echo "12";}else{echo "6";} ?>">
                 <a href="<?php the_permalink();?>"><h2><?php the_title(); ?></h2></a>
                 <div class="author">
                     <i class="fa fa-calendar"></i> <?php echo get_the_date(); ?> &nbsp;-&nbsp;
                     <i class="fa fa-user"></i> 
                     By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo get_the_author(); ?>"><?php echo esc_html( get_the_author() ); ?></a>&nbsp;&nbsp;
                  </div>
                  <?php echo main_get_excerpt();?><br/><br/>
                  <a class="bt-sm-default" href="<?php the_permalink();?>">Continue Reading</a>
                  <div class="lt-comment">
                     <i class="fa fa-comments"></i> 
                     <?php comments_popup_link( 'No Comments', '1 Comment', '% Comments', 'comments-link', 'Comments Off' );?>
                  </div>
             </div>
         </div>
      </div>
   </div>

</article>