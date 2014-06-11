<article <?php post_class('article-with-border'); ?>>

  <div class="row entry-summary">
    <div class="col-sm-4">
      <a href="<?php echo get_post_meta( get_the_ID(), 'Blogger Url', true ); ?>" target="_BLANK"><?php the_post_thumbnail('medium'); ?></a>
    </div>
    <div class="col-sm-8">
      <header>
        <h3 class="entry-title"><a href="<?php echo get_post_meta( get_the_ID(), 'Blogger Url', true ); ?>" target="_BLANK"><?php the_title(); ?></a></h2>
      </header>
      <?php
        $term_list = wp_get_post_terms(get_the_ID(), 'blogger_tags', array("fields" => "names"));
        foreach ($term_list as $item) {
      ?>
        <span class="blogger_tag"><?php echo $item ?></span>
      <?php
        }
      ?>
      <?php the_content(); ?>
    </div>
  </div>
</article>
