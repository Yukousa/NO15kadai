<?php get_header(); ?>

<main class="p-front">
  <!-- fv -->
  <section class="p-front-fv">
    <!-- テキストアニメーション -->
    <div class="p-front-fv__text p-front-fv-text">
      <p class="p-front-fv-text__catch3">High quality code</p>
      <h2 class="p-front-fv-text__catch1">
        <span class="typing-part" data-text="スキル"></span>
        <span class="p-front-fv-text__catch1--small typing-part" data-text="だけじゃない"></span>
      </h2>
      <p class="p-front-fv-text__catch2 typing-part" data-text="パートナーに。"></p>
    </div>
    <!-- swiper -->
    <?php get_template_part('template-parts/swiper/front-fv-swiper'); ?>
    <!-- スクロールアニメーション -->
    <div class="p-front-fv__scroll p-front-fv-scroll">
      <span class="p-front-fv-scroll__text">scroll</span>
    </div>
  </section>

  <!-- works -->
  <section class="p-front__works p-front-works">
    <div class="p-front__works__title">
      <h2 class="c-heading01 c-heading01--front" data-en="works">実績</h2>
    </div>
    <!-- フロント works swiper -->
    <?php get_template_part('template-parts/swiper/front-works-swiper'); ?>

    <div class="p-front-works__readmore">
      <a href="#" class="c-readMore ">Read more<span class="c-arrow01_right"></span></a>
    </div>

  </section>

  <!-- pc時　2カラム 部分-->
  <section class="p-front__container p-front-container">
    <div class="p-front__container p-front-container">
      <!-- container テキスト -->
      <article class="p-front-container__content">

      </article>
      <div class="p-front-container__image">
        <img src="" alt="">
      </div>
      <article class="p-front-container__message">

      </article>
    </div>
    <aside class="p-front__voice">
      <div class="p-front__voice__readmore">
        <a href="#" class="c-readMore ">Read more<span class="c-arrow01_right"></span></a>
      </div>
    </aside>
  </section>

  <!-- フロント　service -->
  <section class="p-front__service p-front-service">
    <div class="p-front-service__header">
      <h2 class="c-heading01 c-heading01--white c-heading01--front-service" data-en="service">サービス</h2>
      <a href="/service/" class="c-readMore c-readMore--white">Read more<span class="c-arrow01_right c-arrow01_right--white"></span></a>
    </div>
    <div class="p-front-service__bgTextWrapper p-front-service-bgTextWrapper">
      <div class="p-front-service-bgText line1">
        <span class="line1-01">対応ソフトは？<span class="line1-02">得意分野は？</span><span class="line1-03">Figmaも対応できてる？</span></span>
        <span class="line1-01">対応ソフトは？<span class="line1-02">得意分野は？</span><span class="line1-03">Figmaも対応できてる？</span></span>
      </div>
      <div class="p-front-service-bgText line2">
        <span class="line2-01">得意分野は？ Figmaも対応できてる？</span><span class="line2-02">WordPressも大丈夫？</span><span class="line2-03">PHPのフォームは作れる？</span>
        <span class="line2-01">得意分野は？ Figmaも対応できてる？</span><span class="line2-02">WordPressも大丈夫？</span><span class="line2-03">PHPのフォームは作れる？</span>
      </div>
      <div class="p-front-service-bgText line3">
        <span class="line3-01">WordPressも大丈夫？<span class="line3-02">対応ソフトは？</span><span class="line3-03">得意分野は？</span></span>
        <span class="line3-01">WordPressも大丈夫？<span class="line3-02">対応ソフトは？</span><span class="line3-03">得意分野は？</span></span>
      </div>
      <div class="p-front-service-bgText line4">
        <span class="line4-01">PHPのフォームは作れる？</span>
        <span class="line4-01">PHPのフォームは作れる？</span>
      </div>
      <div class="p-front-service-bgText line5">
        <span class="line5-01">得意分野は？ Figmaも対応できてる？</span>
        <span class="line5-01">得意分野は？ Figmaも対応できてる？</span>
      </div>
      <div class="p-front-service-bgText line6">
        <span class="line6-01">対応ソフトは？ <span class="line6-02">得意分野は？</span></span>
        <span class="line6-01">対応ソフトは？ <span class="line6-02">得意分野は？</span></span>
      </div>
    </div>
  </section>

  <!-- profile -->
  <section class="p-front__profile p-front-profile">
    <a href="/profile/">
      <div class="p-front-profile__image">
        <div class="p-front-profile__overlay"></div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image08.png" alt="イメージ画像">
        <div class="p-front-profile__content p-front-profile-content">
          <h2 class="c-heading01 c-heading01--whiteCenter c-heading01--frontProfile" data-en="profile">経歴・職歴</h2>
          <p class="p-front-profile-content__text">ここにテキスト入れるここにテキスト入れるここにテキスト入れるここにテキスト入れるここにテキスト入れる</p>
        </div>
      </div>
    </a>
  </section>



  <!-- リンクバナー contact / faq -->
  <section class="p-section-wrapper">
    <?php get_template_part('template-parts/sections/section-contact'); ?>
    <?php get_template_part('template-parts/sections/section-faq'); ?>
  </section>
</main>

<?php get_footer(); ?>