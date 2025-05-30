<div class="c-news-list">
    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    // フロントページ3件、アーカイブページ10件
    $posts_per_page = is_front_page() ? 3 : 10;

    $args = [
        'post_type'      => 'news',
        'posts_per_page' =>  $posts_per_page,
        'paged'          => $paged,

    ];
    $news_query = new WP_Query($args);
    if ($news_query->have_posts()) :
        while ($news_query->have_posts()) : $news_query->the_post();
    ?>
            <article class="c-news-list__post c-news-list-post">
                <!-- 投稿日時とカテゴリー -->
                <?php get_template_part('template-parts/section', 'meta'); ?>

                <!-- 記事タイトル -->
                <h3 class="c-news-list-post__title<?php echo isset($args['modifier']) ? ' c-news-list-container-content-post__title--' . esc_attr($args['modifier']) : ''; ?>"> <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_title()); ?></a>
                </h3>
            </article>
        <?php
        endwhile;
        wp_reset_postdata();
    else :
        ?>
        <p class="c-news-list__none">まだ投稿がありません。</p>
    <?php endif; ?>

    <!-- ページネーション　SP用 -->
    <div class="c-news-list__pagenavi--sp u-mobile">
        <?php get_template_part('template-parts/section', 'pagenavi'); ?>
    </div>
</div>