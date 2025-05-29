<?php get_header(); ?>

<main>
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

  <!-- contact / faq -->
  <section class="p-section-wrapper">
    <?php get_template_part('template-parts/section', 'contact'); ?>
    <?php get_template_part('template-parts/section', 'faq'); ?>
  </section>

</main>

<?php get_footer(); ?>