<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

<div class="container container-top">
  <div class="row">
    <div class="col-l <?php echo roots_main_class(); ?>">
    </div>
    <?php if (roots_display_sidebar()) : ?>
      <div class="col-r <?php echo roots_sidebar_class(); ?>">
        <img src="/wp-content/themes/watsons-wander-theme/assets/img/rig_profile.png" height="25">
      </div>
    <?php endif; ?>
  </div>
</div>



  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

  <div class="wrap container" role="document">
    <div class="content row">
      <main class="main col-l <?php echo roots_main_class(); ?>" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar col-r <?php echo roots_sidebar_class(); ?>" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
