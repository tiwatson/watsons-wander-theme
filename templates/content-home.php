<article <?php post_class('article-with-border'); ?>>
  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
    <?php get_template_part('templates/entry-meta'); ?>
  </div>
</article>
