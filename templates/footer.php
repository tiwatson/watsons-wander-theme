<footer class="content-info" role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 sidebar-footer-1">
        <?php dynamic_sidebar('sidebar-footer'); ?>
      </div>
      <div class="col-sm-4 sidebar-footer-2">
        <?php dynamic_sidebar('sidebar-footer-2'); ?>
      </div>
      <div class="col-sm-4 sidebar-footer-3">
        <?php dynamic_sidebar('sidebar-footer-3'); ?>
      </div>
    </div>


    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
  </div>
</footer>

<?php wp_footer(); ?>
