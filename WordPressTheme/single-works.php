<?php get_header(); ?>

<main class="p-single-works">
    <!-- fv -->
    <section class="p-single-works__fv c-sub-fv">
        <!-- フロントページ以外のfv -->
        <?php get_template_part('template-parts/sections/section-sub-fv'); ?>
    </section>
    <!-- 記事タイトル -->
    <h3 class="p-single-works-content-body__title">
        <?php echo nl2br(get_field('works_heading')); ?>
    </h3>

    <!-- pc時　2カラム -->
    <section class="p-single-works__wrapper">
        <div class="p-single-works__content p-single-works-content">
            <!-- 本文 -->
            <article class="p-single-works-content__body p-single-works-content-body">
    <!-- 投稿画面ACFのループ -->
    <?php for ($i = 1; $i <= 10; $i++) :
        $heading_top = get_field("section_heading_{$i}_top");
        $heading_bottom = get_field("section_heading_{$i}_bottom");
        $content = get_field("section_content_{$i}");
        $image = get_field("section_image_{$i}");

        if (empty($heading_top) && empty($heading_bottom) && empty($content) && empty($image)) {
            continue;
        }
    ?>
        <section class="c-single-content">
            <div class="c-single-content__wrapper">
                <h3 class="c-subtitle">
                    <?php if ($heading_top) : ?>
                        <span class="c-subtitle--line1"><?php echo esc_html($heading_top); ?></span>
                    <?php endif; ?>
                    <?php if ($heading_bottom) : ?>
                        <span class="c-subtitle--line2 c-heading02"><?php echo esc_html($heading_bottom); ?></span>
                    <?php endif; ?>
                </h3>

                <?php if ($content) : ?>
                    <div class="c-single-content__post">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($image) : ?>
                <div class="c-single-content__image">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                </div>
            <?php endif; ?>
        </section>
    <?php endfor; ?>

    <!-- singleページ用ページネーション -->
    <div class="p-single-works-content-body__page-nation">
        <nav class="c-single-page-nation">
            <?php
            $prev_post = get_previous_post(false);
            if ($prev_post) :
            ?>
                <div class="c-single-page-nation__prev">
                    <a href="<?php echo get_permalink($prev_post->ID); ?>" class="c-single-page-nation__link">
                        <div class="c-arrow02_right"></div>
                        <span>前の記事へ</span>
                    </a>
                </div>
            <?php endif; ?>

            <?php
            $next_post = get_next_post(false);
            if ($next_post) :
            ?>
                <div class="c-single-page-nation__next">
                    <a href="<?php echo get_permalink($next_post->ID); ?>" class="c-single-page-nation__link">
                        <span>次の記事へ</span>
                        <div class="c-arrow02_left"></div>
                    </a>
                </div>
            <?php endif; ?>
        </nav>
    </div>
</article>

        </div>
        <!-- プロフィール -->
        <aside class="p-single-works__profile p-single-works-profile">
            <!-- 社長プロフィールのカード -->
            <div class="p-single-works-profile__body">
                <div class="p-single-works-profile__image">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/president01.png" alt="代表 田中 太郎の写真">
                </div>
                <div class="p-single-works-profile__text">
                    <p class="p-single-works-profile__text--company">株式会社 XXXXXX</p>
                    <p class="p-single-works-profile__text--ja">代表 田中 太郎</p>
                    <p class="p-single-works-profile__text--en">Tanaka Taro</p>
                </div>
            </div>

            <a href="#" class="c-return c-return--single-works">
                一覧に戻る<span class="c-arrow01_right c-arrow01_right--large"></span>
            </a>
        </aside>
    </section>

    <!-- 関連記事 Swiper -->
    <div class="p-single-works__slider">
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
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'works_category');
                                $summary = get_field('works_summary');
                                ?>

                                <a href="<?php the_permalink(); ?>" class="c-related-swiper-card">
                                    <?php if ($terms && !is_wp_error($terms)) : ?>
                                        <span class="c-related-swiper-card__label"><?php echo esc_html($terms[0]->name); ?></span>
                                    <?php endif; ?>

                                    <div class="c-related-swiper-card__image">
                                        <?php the_post_thumbnail('large'); ?>
                                    </div>

                                    <div class="c-related-swiper-card__summary">
                                        <?php if ($summary) : ?>
                                            <p class="c-related-swiper-card__summary-text"><?php echo esc_html($summary); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </a>
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
    </div>


</main>

<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>