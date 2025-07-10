<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="robots" content="noindex,nofollow" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header class="p-header">
    <div class="p-header__inner p-header-inner">
      <!-- ロゴ -->
      <h1 class="p-header-inner__siteTitle">
        <a href="<?php echo esc_url(home_url('/')); ?>">
          <?php bloginfo('name'); ?>
        </a>
      </h1>

      <!-- 共通ナビゲーション（PC常時表示 / SPはドロワー展開） -->
      <nav class="p-header-inner__nav p-header-inner-nav js-drawer">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'global',
          'container' => false,
          'menu_class' => 'p-header-inner-nav-list',
          'walker' => new BEM_Walker_Nav_Menu(),
          'bem_base_class' => 'p-header-inner-nav',
        ));
        ?>
      </nav>

      <!-- メールボタン＋ハンバーガー -->
      <div class="p-header-inner__btn p-header-inner-btn">
        <a href="#contact" class="p-header-inner-btn__mail">
          <div class="p-header-inner-btn__mail-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact.png" alt="お問合せメールのアイコン" width="27" height="20" loading="lazy">
          </div>
          <span class="p-header-inner-btn__mailText u-desktop">contact</span>
        </a>

        <!-- ハンバーガー（SPのみ） -->
        <button class="p-header-inner-btn__hamburger js-hamburger u-mobile" aria-label="グローバルメニューを開く">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </div>

  </header>