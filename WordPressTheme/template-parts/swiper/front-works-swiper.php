<?php
// フロントページでのみ実行
if (is_front_page()) {
  // クエリの引数設定
  $works_args = [
    'post_type'      => 'works',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ];

  $works_query = new WP_Query($works_args);

  if ($works_query->have_posts()) :
?>
    <div class="swiper p-front-works__swiper p-front-works-swiper">
      <div class="swiper-wrapper">
        <?php while ($works_query->have_posts()) : $works_query->the_post(); ?>
          <div class="swiper-slide">
            <?php get_template_part('template-parts/cards/card-front-works-swiper'); ?>
          </div>
        <?php endwhile; ?>
      </div>
      <!-- Swiperナビゲーション -->
      <div class="p-front-works-swiper__nav">
        <button class="p-front-works-swiper-nav__prev c-arrow01_left" aria-label="前へ"></button>
        <button class="p-front-works-swiper-nav__next c-arrow01_right" aria-label="次へ"></button>
      </div>

    </div>

    <?php wp_reset_postdata(); ?>
<?php
  endif;
}
?>