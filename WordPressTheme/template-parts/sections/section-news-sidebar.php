<div class="p-news-sidebar__inner">
    <!-- カテゴリー -->
    <section class="p-news-sidebar__category p-news-sidebar-category">
        <h3 class="p-news-sidebar__category c-heading01 c-heading01--news" data-en="category">カテゴリー</h3>
        <ul class="p-news-sidebar__list p-news-sidebar-list">
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'news_category',
                'hide_empty' => true,
            ));

            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    echo '<li class="p-news-sidebar-list__item p-news-sidebar-list-item">
                      <a href="' . esc_url(get_term_link($term)) . '" class="p-news-sidebar-list-item__link">
                        ' . esc_html($term->name) . '
                        <span class="p-news-sidebar-list-item__link--arrow"></span>
                      </a>
                    </li>';
                }
            }
            ?>
        </ul>
    </section>

    <!-- アーカイブ -->
    <section class="p-news-sidebar__archive p-news-sidebar-archive">
        <h3 class="c-heading01 c-heading01--news" data-en="archive">アーカイブ</h3>
        <ul class="p-news-sidebar__list p-news-sidebar-list">
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

                    echo '<li class="p-news-sidebar-list__item p-news-sidebar-list-item">
                            <a href="' . esc_url($url) . '" class="p-news-sidebar-list-item__link">
                                <span class="p-news-sidebar-list-item__link--text">' . esc_html($label) . '</span>
                                <span class="p-news-sidebar-list-item__link--arrow"></span>
                            </a>
                        </li>';
                }
            }
            ?>
        </ul>
    </section>
</div>