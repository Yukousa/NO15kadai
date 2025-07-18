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
        <a href="#contact" id="js-mail-link" class="p-header-inner-btn__mail">
          <span class="p-header-inner-btn__mail-image">
            <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="2" y="1" width="18.5568" height="13.2273" stroke="currentColor" stroke-width="2" />
              <path d="M1.38062 1.38086L11.2783 8.61381L21.1761 1.38086" stroke="currentColor" stroke-width="2" vector-effect="non-scaling-stroke" />
            </svg>
          </span>
          contact
        </a>
        <button class="p-header-inner-btn__hamburger js-hamburger u-mobile" aria-label="グローバルメニューを開く">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </div>

  </header>