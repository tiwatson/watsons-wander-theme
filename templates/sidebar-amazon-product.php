<?php
  $amazon_product_url = "http://www.amazon.com/gp/product/" . get_post_meta( get_the_ID(), 'Amazon Product ASIN', true ) . "?tag=watswand-20";
?>


<div class="amazon-callout-sidebar">
  <a href="<?php echo $amazon_product_url ?>" class="pull-left" target="_blank"><?php the_post_thumbnail('100x100', array('class' => 'media-object')); ?></a>
  <h4><a href="<?php echo $amazon_product_url ?>" target="_blank"><?php the_title(); ?></a></h4>
  <?php the_content(); ?>
  <h4 class="pricing"><?php echo get_post_meta( get_the_ID(), 'Amazon Product Price', true ) ?></h4>
  <a href="<?php echo $amazon_product_url ?>" target="_blank"><img src="/wp-content/themes/watsons-wander-theme/assets/img/amazon/l2.gif" width="176" height="28"></a>
  <div class="disclaimer">
    Every purchase helps support this blog
  </div>

</div>


