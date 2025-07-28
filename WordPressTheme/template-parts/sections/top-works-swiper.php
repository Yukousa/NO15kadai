    <!-- フロント works swiper -->
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
        <div class="swiper p-top-works__swiper p-top-works-swiper">
          <div class="swiper-wrapper">
            <?php while ($works_query->have_posts()) : $works_query->the_post(); ?>
              <div class="swiper-slide">
                <a href="<?php the_permalink(); ?>" class="p-top-works-swiper__card p-top-works-swiper-card">
                  <?php
                  // worksカテゴリー取得
                  $terms = get_the_terms(get_the_ID(), 'works_category');
                  ?>
                  <?php if ($terms && !is_wp_error($terms)) : ?>
                    <span class="p-top-works-swiper-card__label"><?php echo esc_html($terms[0]->name); ?></span>
                  <?php endif; ?>

                  <div class="p-top-works-swiper-card__image">
                    <?php the_post_thumbnail('large'); ?>
                  </div>

                  <div class="p-top-works-swiper-card__summary">
                    <?php if ($summary = get_field('works_summary')) : ?>
                      <p class="p-top-works-swiper-card__summary-text"><?php echo esc_html($summary); ?></p>
                    <?php endif; ?>
                  </div>
                </a>
              </div>
            <?php endwhile; ?>
          </div>
          <!-- Swiperナビゲーション -->
          <div class="p-top-works-swiper__nav">
            <button class="p-top-works-swiper-nav__prev" aria-label="前へ"></button>
            <button class="p-top-works-swiper-nav__next" aria-label="次へ"></button>
          </div>

        </div>
        <?php wp_reset_postdata(); ?>
    <?php
      endif;
    }
    ?>
