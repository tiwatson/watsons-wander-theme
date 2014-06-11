<div class="entry-meta">
  <time class="published" datetime="<?php echo get_the_time('c'); ?>">
    <?php echo get_the_date('F'); ?>
    <?php echo get_the_date('j'); ?>,
    <?php echo get_the_date('Y'); ?>
  </time>
  <span class="pipe">|</span>
  <?php if ( get_post_meta( get_the_ID(), 'location', true ) ) : ?>
    <?php echo get_post_meta( get_the_ID(), 'location', true ); ?>
    <span class="pipe">|</span>
  <?php endif; ?>
  <a href="<?php the_permalink(); ?>#comments"><?php comments_number(); ?></a>

</div>
