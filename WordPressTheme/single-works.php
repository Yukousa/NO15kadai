<?php get_header(); ?>

<main class="p-single-works">
    <!-- fv -->
    <section class="p-single-works__fv c-sub-fv">
        <!-- フロントページ以外のfv -->
        <?php get_template_part('template-parts/sections/section-sub-fv'); ?>
    </section>

    <!-- pc時　2カラム -->
    <section class="p-single-works__wrapper">
        <div class="p-single-works__content p-single-works-content">
            <!-- 本文 -->
            <article class="p-single-works-content__body p-single-works-content-body">
                <!-- 記事タイトル -->
                <h3 class="p-single-works-content-body__title">
                    <?php echo nl2br(get_field('works_heading')); ?>
                </h3>


                <!-- 投稿画面ACFのループ -->
                <?php
                $args = array(
                    'post_type'     => 'works',
                    'taxonomy'      => 'works_category',
                    'posts_per_page' => 6,
                    'summary_field' => 'works_summary',
                );
                get_template_part('template-parts/loop/loop-post-content', null, $args);
                ?>
                <!-- singleページ用ページネーション -->
                <?php get_template_part('template-parts/sections/section-single-page-nation'); ?>
            </article>

        </div>
        <!-- プロフィール -->
        <aside class="p-single-works__profile p-single-works-profile">
            <!-- 社長プロフィールのカード -->
            <?php
            set_query_var('hide_back_button', true);
            get_template_part('template-parts/cards/card-president-profile');
            ?>

            <a href="#" class="c-return c-return--single-works">
                一覧に戻る<span class="c-arrow01_right c-arrow01_right--large"></span>
            </a>
        </aside>
    </section>

    <!-- 関連記事 Swiper -->
    <div class="p-single-works__slider">
        <?php get_template_part('template-parts/swiper/related-swiper'); ?>
    </div>

    <!-- リンクバナー contact / faq -->
    <section class="p-section-wrapper">
        <?php get_template_part('template-parts/sections/section-contact'); ?>
        <?php get_template_part('template-parts/sections/section-faq'); ?>
    </section>

</main>


<?php get_footer(); ?>