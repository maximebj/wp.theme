  <div class="footer">
    <div class="wrapper">
      <p class="footer__title"><?php the_field('stay_tuned', 'options'); ?></p>
      <?php wp_nav_menu( array('theme_location' => 'footer', 'container' => false, 'menu_class' => 'menu')); ?>
    </div>
  </div>

  <?php wp_footer(); ?>

  <!-- Google Analytics -->

</body>
</html>