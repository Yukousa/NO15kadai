<?php get_header(); ?>

<main class="p-message">
  <section class="p-message__mv p-message-mv">
    <div class="p-message-mv__title">
      <h2 class="c-heading01 c-heading01--mv" data-en="message">メッセージ</h2>
    </div>
    <div class="p-message-mv__image">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/image05.png" alt="" class="" width="" height="" loading="lazy">
    </div>
    <div class="p-message-mv__breadcrumbs">
      <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
    </div>
  </section>

  <!-- 本文１　pc２カラム -->
  <section class="p-message__container01 p-message-container01 l-inner">
    <article class="p-message-container01__body p-message-container01-body">
      <h3 class="c-doubleHeadline">
        丁寧な作業とコミュニケーションで
        <span class="c-doubleHeadline--line2">ハイクオリティなコードを納品。</span>
      </h3>
      <p class="p-message-container01-body__text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る
      </p>
      <p class="p-message-container01-body__text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
    </article>
    <div class="p-message-container01__profile p-message-container01-profile">
      <div class="p-message-container01-profile__image">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/president01.png" alt="会社代表画像" width="320" height="210" loading="lazy">
      </div>
      <p class="p-message-container01-profile__name--ja">田中 太郎</p>
      <p class="p-message-container01-profile__name--en">Tanaka Taro</p>
    </div>
  </section>

  <!-- スライダー -->
  <section class="p-message__slider">
    <div class="c-slide">
      <div class="c-slide-track">
        <div class="c-slide-item">
          <div class="c-slide-row1">
            <div class="c-slide-image1">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image11.png" alt="WORKイメージ">
            </div>
            <div class="c-slide-image2">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image19.png" alt="WORKイメージ">
            </div>
          </div>
          <div class="c-slide-row2">
            <div class="c-slide-image3">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image04.png" alt="WORKイメージ">
            </div>
            <div class="c-slide-image4">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image12.png" alt="WORKイメージ">
            </div>
          </div>
        </div>

        <!-- クローンをつなげて無限ループ感を出す -->
        <div class="c-slide-item">
          <div class="c-slide-row1">
            <div class="c-slide-image1">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image11.png" alt="WORKイメージ">
            </div>
            <div class="c-slide-image2">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image19.png" alt="WORKイメージ">
            </div>
          </div>
          <div class="c-slide-row2">
            <div class="c-slide-image3">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image04.png" alt="WORKイメージ">
            </div>
            <div class="c-slide-image4">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image12.png" alt="WORKイメージ">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="p-message__container02 p-message-container02 l-inner">
    <article class="p-message-container02__body p-message-container02-body">
      <h3 class="c-doubleHeadline">
        丁寧な作業とコミュニケーションで
        <span class="c-doubleHeadline--line2">ハイクオリティなコードを納品。</span>
      </h3>
      <p class="p-message-container02-body__text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る
      </p>
      <p class="p-message-container02-body__text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
    </article>
  </section>

</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>