<?php
  query_posts( array( 'post_type' => 'amazon_product', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' ) );
  while (have_posts()) : the_post();
    get_template_part('templates/content-amazon-product', get_post_format());
  endwhile;
?>
