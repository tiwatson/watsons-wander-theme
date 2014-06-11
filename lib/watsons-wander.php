<?php

function roots_widgets_init_2() {

  register_sidebar(array(
    'name'          => __('Footer 2', 'roots'),
    'id'            => 'sidebar-footer-2',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer 3', 'roots'),
    'id'            => 'sidebar-footer-3',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
}
add_action('widgets_init', 'roots_widgets_init_2');


add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
//add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
// Removes attached image sizes as well
add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
function remove_thumbnail_dimensions( $html ) {
  //$html = preg_replace('/(?:<img.*)((width|height)="\d*"\s)(?:\/>|>)/', "", $html);
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );

  //$html = preg_replace( '/dev\/assets/', "com/assets", $html );

    return $html;
}


?>


<?php

/** Add our function to the widgets_init hook. **/
add_action( 'widgets_init', 'be_popular_load_widgets' );
function be_popular_load_widgets() {
  register_widget( 'BE_Popular_Widget' );
}

/** Define the Widget as an extension of WP_Widget **/
class BE_Popular_Widget extends WP_Widget {
  function BE_Popular_Widget() {
    /* Widget settings. */
    $widget_ops = array( 'classname' => 'widget_popular', 'description' => 'Displays most popular posts by comment count' );

    /* Widget control settings. */
    $control_ops = array( 'id_base' => 'popular-widget' );

    /* Create the widget. */
    $this->WP_Widget( 'popular-widget', 'Popular Posts', $widget_ops, $control_ops );
  }


  function widget( $args, $instance ) {
    extract( $args );

    echo $before_widget;

    if( !empty( $instance['title'] ) ) echo $before_title . $instance['title'] . $after_title;

    $post_ids = explode(',', $instance['post_ids']);
    $loop_args = array(
      'post__in' => $post_ids
    );

    $loop = new WP_Query( $loop_args );


    if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post(); global $post;

      if( 0 == $loop->current_post )
        echo '<p class="post-list-img first">';
      else
        echo '<p class="post-list-img">';
      echo '<a class="image" href="' . get_permalink() . '">' . get_the_post_thumbnail($post->ID, '100x100_hard') . '</a>';
      echo '<a class="title" href="' . get_permalink() . '">' . get_the_title() . '</a>';
      //echo '<span class="meta">' . get_comments_number() . ' Comments</span>';
      echo '<span class="meta">' . get_the_date() . '</span>';
      echo '<span class="meta">' . get_post_meta( $post->ID, 'location', true ) . '</span>';
      echo '</p>';

    endwhile; endif; wp_reset_query();

    echo $after_widget;
  }

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    /* Strip tags (if needed) and update the widget settings. */
    $instance['title'] = esc_attr( $new_instance['title'] );
    $instance['post_ids'] = $new_instance['post_ids'];
    return $instance;
  }

  function form( $instance ) {
    /* Set up some default widget settings. */
    $defaults = array( 'title' => '', 'post_ids' => '' );
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br/>
    <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'post_ids' ); ?>">Post Ids: (limit 4)</label>
    <input id="<?php echo $this->get_field_id( 'post_ids' ); ?>" name="<?php echo $this->get_field_name( 'post_ids' ); ?>" value="<?php echo $instance['post_ids']; ?>" />
    </p>

    <?php
  }

}


/** Add our function to the widgets_init hook. **/
add_action( 'widgets_init', 'ww_recent_load_widgets' );
function ww_recent_load_widgets() {
  register_widget( 'WW_Recent_Widget' );
}

/** Define the Widget as an extension of WP_Widget **/
class WW_Recent_Widget extends WP_Widget {
  function WW_Recent_Widget() {
    /* Widget settings. */
    $widget_ops = array( 'classname' => 'widget_recent', 'description' => 'Displays most recent posts' );

    /* Widget control settings. */
    $control_ops = array( 'id_base' => 'recent-widget' );

    /* Create the widget. */
    $this->WP_Widget( 'recent-widget', 'Recent Posts + IMGS', $widget_ops, $control_ops );
  }


  function widget( $args, $instance ) {
    extract( $args );

    echo $before_widget;

    if( !empty( $instance['title'] ) ) echo $before_title . $instance['title'] . $after_title;

    $loop_args = array(
      'post_type' => 'post',
      'posts_per_page' => '5'
    );

    $loop = new WP_Query( $loop_args );


    if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post(); global $post;

      if( 0 == $loop->current_post )
        echo '<p class="post-list-img first">';
      else
        echo '<p class="post-list-img">';
      echo '<a class="image" href="' . get_permalink() . '">' . get_the_post_thumbnail($post->ID, '100x100_hard') . '</a>';
      echo '<a class="title" href="' . get_permalink() . '">' . get_the_title() . '</a>';
      //echo '<span class="meta">' . get_comments_number() . ' Comments</span>';
      echo '<span class="meta">' . get_the_date() . '</span>';
      echo '<span class="meta">' . get_post_meta( $post->ID, 'location', true ) . '</span>';
      echo '</p>';

    endwhile; endif; wp_reset_query();

    echo $after_widget;
  }

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    /* Strip tags (if needed) and update the widget settings. */
    $instance['title'] = esc_attr( $new_instance['title'] );
    return $instance;
  }

  function form( $instance ) {
    /* Set up some default widget settings. */
    $defaults = array( 'title' => '');
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br/>
    <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
    </p>

    <?php
  }
}




/** Add our function to the widgets_init hook. **/
add_action( 'widgets_init', 'ww_bwl_load_widgets' );
function ww_bwl_load_widgets() {
  register_widget( 'WW_bwl_Widget' );
}

/** Define the Widget as an extension of WP_Widget **/
class WW_bwl_Widget extends WP_Widget {
  function WW_bwl_Widget() {
    /* Widget settings. */
    $widget_ops = array( 'classname' => 'widget_bwl', 'description' => 'Displays random travel blogs' );

    /* Widget control settings. */
    $control_ops = array( 'id_base' => 'bwl-widget' );

    /* Create the widget. */
    $this->WP_Widget( 'bwl-widget', 'Travel Blogs + IMGS', $widget_ops, $control_ops );
  }


  function widget( $args, $instance ) {
    extract( $args );

    echo $before_widget;

    if( !empty( $instance['title'] ) ) echo $before_title . $instance['title'] . $after_title;

    $loop_args = array(
      'post_type' => 'blogger',
      'posts_per_page' => '3',
      'orderby' => 'rand'
    );

    $loop = new WP_Query( $loop_args );


    if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post(); global $post;

      if( 0 == $loop->current_post )
        echo '<p class="post-list-img first">';
      else
        echo '<p class="post-list-img">';
      echo '<a class="image" href="' . get_post_meta( $post->ID, 'Blogger Url', true ) . '">' . get_the_post_thumbnail($post->ID, '100x100_hard') . '</a>';
      echo '<a class="title" href="' . get_post_meta( $post->ID, 'Blogger Url', true ) . '">' . get_the_title() . '</a>';
      echo '<span class="meta">' . get_post_meta( $post->ID, 'Blogger Url', true ) . '</span>';
      echo '</p>';

    endwhile; endif; wp_reset_query();

    echo '<div class="post-list-words">' . $instance['words'] . '</div>';
    echo $after_widget;
  }

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    /* Strip tags (if needed) and update the widget settings. */
    $instance['title'] = esc_attr( $new_instance['title'] );
    $instance['words'] = $new_instance['words'];
    return $instance;
  }

  function form( $instance ) {
    /* Set up some default widget settings. */
    $defaults = array( 'title' => '', 'words' => '');
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br/>
    <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'words' ); ?>">Words:</label><br/>
    <input id="<?php echo $this->get_field_id( 'words' ); ?>" name="<?php echo $this->get_field_name( 'words' ); ?>" value="<?php echo $instance['words']; ?>" />
    </p>
    <p>Don't be using no double quotes in the words you hear?</p>

    <?php
  }
}
