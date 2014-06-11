<?php while (have_posts()) : the_post(); ?>
  <?php
    if( $wp_query->current_post == 3 ) {
      display_amazon_product('content');
    }
  ?>
  <?php if( $wp_query->current_post == 0 && !is_paged() ) { ?>
    <?php get_template_part('templates/content-home', get_post_format()); ?>
  <?php } else { ?>
    <?php get_template_part('templates/content', get_post_format()); ?>
  <?php } ?>
<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
