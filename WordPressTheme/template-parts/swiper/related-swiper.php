<?php
// シングルページのみ処理（安全対策として明示的に）
if (is_singular(['works', 'voice'])) {

  $post_type = get_post_type(); // 現在の投稿タイプ

  // 投稿タイプに応じた設定
  if ($post_type === 'voice') {
    $taxonomy = 'voice_category';
    $summary_field = 'voice_summary';
  } else {
    $taxonomy = 'works_category';
    $summary_field = 'works_summary';
  }

  // 現在の投稿のターム取得
  $term_ids = [];
  $terms = get_the_terms(get_the_ID(), $taxonomy);
  if ($terms && !is_wp_error($terms)) {
    $term_ids = wp_list_pluck($terms, 'term_id');
  }

  // クエリの引数設定
  $related_args = [
    'post_type'      => $post_type,
    'posts_per_page' => 10,
    'post__not_in'   => [get_the_ID()],
    'orderby'        => 'date',
    'order'          => 'DESC',
  ];

  // 同じタクソノミーに属する投稿だけに絞る
  if (!empty($term_ids)) {
    $related_args['tax_query'] = [
      [
        'taxonomy' => $taxonomy,
        'field'    => 'term_id',
        'terms'    => $term_ids,
      ],
    ];
  }

  // クエリ実行
  $related_query = new WP_Query($related_args);

  if ($related_query->have_posts()) :
?>
    <div class="swiper c-swiper-related">
      <div class="swiper-wrapper">
        <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
          <div class="swiper-slide">
            <!-- 投稿記事カード -->
            <?php get_template_part('template-parts/cards/card-post'); ?>
          </div>
        <?php endwhile; ?>
      </div>
    </div>

    <!-- Swiperナビゲーション -->
    <nav class="c-swiper-related__nav c-swiper-related-nav">
      <div class="c-swiper-related-nav__prev">
        <div class="c-arrow-svg">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="16 4 8 12 16 20" />
          </svg>
        </div>
      </div>
      <div class="c-swiper-related-nav__next">
        <div class="c-arrow-svg c-arrow-svg--left">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="8 4 16 12 8 20" />
          </svg>
        </div>
      </div>
    </nav>
    <?php wp_reset_postdata(); ?>
<?php
  endif;
}
?>