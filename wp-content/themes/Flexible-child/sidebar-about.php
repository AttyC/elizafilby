  <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
  <div id="books-sidebar" class="primary-sidebar widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-2' ); ?>

        <?php get_template_part('buy-book', 'page'); ?>

  </div><!-- #primary-sidebar -->
  <?php endif; ?>

