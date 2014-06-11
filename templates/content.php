<article <?php post_class('article-with-border'); ?>>

  <div class="row entry-summary">
    <div class="col-sm-4">
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small'); ?></a>
    </div>
    <div class="col-sm-8">
      <header>
        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      </header>
      <?php the_excerpt(); ?>
      <?php get_template_part('templates/entry-meta'); ?>
    </div>
  </div>
</article>
