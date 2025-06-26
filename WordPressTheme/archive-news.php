<?php get_header(); ?>
<main class="p-archive-news">
    <!-- fv -->
    <section class="p-single-voice__fv c-sub-fv">
        <!-- フロントページ以外のfv -->
        <?php get_template_part('template-parts/sections/section-sub-fv'); ?>
    </section>

    <!-- メイン部分 -->
    <section class="p-archive-news__content p-archive-news-content">
        <!-- 投稿記事のリスト -->
         <div class="p-archive-news-content__list">
         <div class="c-news-list">
  <?php
  $paged = get_query_var('paged') ? get_query_var('paged') : 1;

  $args = [
    'post_type'      => 'news',
    'posts_per_page' => 10,
    'paged'          => $paged,
  ];
  $news_query = new WP_Query($args);
  if ($news_query->have_posts()) :
    while ($news_query->have_posts()) : $news_query->the_post();
  ?>
      <a href="<?php the_permalink(); ?>" class="c-news-list__link">
        <article class="c-news-list__post c-news-list-post">
          <div class="c-meta">
            <span class="c-meta__date"><?php echo get_the_date('Y.m.d'); ?></span>

            <?php
            $terms = get_the_terms(get_the_ID(), 'news_category');
            if (!empty($terms) && !is_wp_error($terms)) :
            ?>
              <span class="c-meta__category">
                <?php foreach ($terms as $term) : ?>
                  <span class="c-meta__category-name"><?php echo esc_html($term->name); ?></span>
                <?php endforeach; ?>
              </span>
            <?php endif; ?>
          </div>
          <h3 class="c-news-list-post__title">
            <?php echo esc_html(get_the_title()); ?>
          </h3>
        </article>
      </a>
    <?php
    endwhile;
    wp_reset_postdata();
  else :
    ?>
    <p class="c-news-list__none">まだ投稿がありません。</p>
  <?php endif; ?>

  <div class="c-news-list__pagenavi--sp u-mobile">
    <?php if (function_exists('wp_pagenavi')) : ?>
      <?php wp_pagenavi(); ?>
    <?php endif; ?>
  </div>
</div>
         </div>
        <!-- サイドバー -->
         <div class="p-archive-news-content__sidebar">
         <aside class="c-news-sidebar">
    <!-- カテゴリー -->
    <div class="c-news-sidebar__category c-news-sidebar-category">
        <h3 class="c-heading01 c-heading01--sidebar" data-en="category">カテゴリー</h3>
        <?php
        $terms = get_terms([
            'taxonomy' => 'news_category',
            'hide_empty' => false, // 投稿が0件のカテゴリも表示するなら false
        ]);

        if (!empty($terms) && !is_wp_error($terms)) :
        ?>
            <ul class="c-news-sidebar__list c-news-sidebar-list">
                <?php foreach ($terms as $term) : ?>
                    <li class="c-news-sidebar-list__item c-news-sidebar-list-item">
                        <a href="<?php echo esc_url(get_term_link($term)); ?>" class="c-news-sidebar-list-item__link">
                            <?php echo esc_html($term->name); ?>
                            <span class="c-news-sidebar-list-item__link--arrow"></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <!-- アーカイブ -->
    <div class="c-news-sidebar__archive c-news-sidebar-archive">
        <h3 class="c-heading01 c-heading01--sidebar" data-en="archive">アーカイブ</h3>
        <ul class="c-news-sidebar__list c-news-sidebar-list">
            <?php
            global $wpdb;

            $results = $wpdb->get_results("
                            SELECT DISTINCT
                            YEAR(post_date) AS year,
                            MONTH(post_date) AS month
                            FROM {$wpdb->posts}
                            WHERE post_type = 'news'
                                AND post_status = 'publish'
                                AND post_date != '0000-00-00 00:00:00'
                            ORDER BY post_date DESC
                        ");

            if ($results) {
                foreach ($results as $result) {
                    $year  = $result->year;
                    $month = zeroise($result->month, 2);
                    $label = sprintf('%d年%d月', $year, $result->month);
                    $url   = home_url("/news/{$year}/{$month}/");

                    echo '
                                    <li class="c-news-sidebar-list__item c-news-sidebar-list-item">
                                        <a href="' . esc_url($url) . '" class="c-news-sidebar-list-item__link">
                                            <span class="c-news-sidebar-list-item__link--text">' . esc_html($label) . '</span>
                                            <span class="c-news-sidebar-list-item__link--arrow"></span>
                                        </a>
                                    </li>
                                ';
                }
            }
            ?>
        </ul>
    </div>
</aside>         </div>
    </section>
    
    <!-- ページネーション　pc用 -->
    <div class="p-archive-news__pagenavi--pc u-desktop">
    <?php if (function_exists('wp_pagenavi')) : ?>
  <?php wp_pagenavi(); ?>
<?php endif; ?>
    </div>


</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>