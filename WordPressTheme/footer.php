<footer class="p-footer">

  <div class="p-footer__inner p-footer-inner">
    <div class="p-footer-inner__wrapper p-footer-inner-wrapper">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="p-footer-inner-wrapper__title">
        <?php bloginfo('name'); ?>
      </a>

      <ul class="p-footer-inner-wrapper__sns p-footer-inner-wrapper-sns">
        <li class="p-footer-inner-wrapper-sns__item">
          <a href="https://line.me/" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/line02.png" alt="LINE" width="30" height="28" loading="lazy">
          </a>
        </li>
        <li class="p-footer-inner-wrapper-sns__item p-footer-inner-wrapper-sns__item--x">
          <a href="https://twitter.com/" target="_blank"  rel="noopener noreferrer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/x.png" alt="X" width="27" height="25" loading="lazy">
          </a>
        </li>
        <li class="p-footer-inner-wrapper-sns__item p-footer-inner-wrapper-sns__item--instagram">
          <a href="https://www.instagram.com/" target="_blank"  rel="noopener noreferrer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt="Instagram" width="27" height="26" loading="lazy">
          </a>
        </li>
        <li class="p-footer-inner-wrapper-sns__item p-footer-inner-wrapper-sns__item--facebook">
          <a href="https://www.facebook.com/?locale=ja_JP" target="_blank"  rel="noopener noreferrer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" alt="facebook" width="14" height="28" loading="lazy">
          </a>
        </li>
      </ul>


      <div class="p-footer-inner-wrapper__privacy">
        <a href="<?php echo esc_url(home_url('/privacy/')); ?>" target="_blank"  rel="noopener noreferrer" target="_blank">プライバシーポリシー</a>
      </div>
    </div>
    <?php
    wp_nav_menu(array(
      'theme_location' => 'footer',
      'container' => 'nav',
      'container_class' => 'p-footer-nav',
      'menu_class' => 'p-footer-nav__list',
      'walker' => new BEM_Walker_Nav_Menu(),
      'bem_base_class' => 'p-footer-nav',
    ));

    ?>
  </div>

  <p class="p-footer__copyright">©2024&nbsp;&nbsp;<?php bloginfo('name'); ?></p>

</footer>
<?php wp_footer(); ?>
</body>

</html>