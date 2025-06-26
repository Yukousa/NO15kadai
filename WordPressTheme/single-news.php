<?php get_header(); ?>

<main class="p-single-news">
    <!-- fv -->
    <section class="p-single-voice__fv c-sub-fv">
        <!-- フロントページ以外のfv -->
        <?php get_template_part('template-parts/sections/section-sub-fv'); ?>
    </section>
    <!-- メイン部分 -->
    <section class="p-single-news__content p-single-news-content">
        <!-- newsの投稿記事 -->
        <div class="p-single-news-content__post p-single-news-content-post">
            <!-- 記事タイトル -->
            <h2 class="p-single-news-content-post__title"><?php echo esc_html(get_the_title()); ?></h2>
            <!-- 投稿日時とカテゴリー -->
            <div class="p-single-news-content-post__meta">
                <?php get_template_part('template-parts/section', 'meta'); ?>
            </div>
            <!-- アイキャッチ画像 -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="p-single-news-content-post__image">
                    <?php the_post_thumbnail('large');
                    ?>
                </div>
            <?php endif; ?>
            <!-- 記事本文 -->
            <div class="p-single-news-content-post__text">
                <?php the_content(); ?>
            </div>
            <!-- 一覧に戻る -->
            <a href="#" class="c-return c-return--single-news">
                一覧に戻る<span class="c-arrow01_right"></span>
            </a>
        </div>

        <!-- サイドバー -->
        <div class="p-single-news-content__sidebar">
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
</aside>        </div>

    </section>
    <!-- リンクバナー contact / faq -->
    <section class="p-section-wrapper">
        <?php get_template_part('template-parts/sections/section-contact'); ?>
        <?php get_template_part('template-parts/sections/section-faq'); ?>
    </section>

</main>

<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>