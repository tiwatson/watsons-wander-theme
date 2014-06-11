<?php
/*
Template Name: Blogs We Love
*/
?>

<?php get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/content-page', get_post_format()); ?>

<br/>


<?php
  query_posts( array( 'post_type' => 'blogger', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' ) );
  while (have_posts()) : the_post();
    get_template_part('templates/content-blogger', get_post_format());
  endwhile;
?>
