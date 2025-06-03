<?php get_header(); ?>

<main class="p-single-voice">
    <!-- fv -->
    <section class="p-single-voice__fv c-sub-fv">
        <!-- フロントページ以外のfv -->
        <?php get_template_part('template-parts/sections/section-sub-fv'); ?>
    </section>

    <!-- pc時　2カラム -->
    <section class="p-single-voice__wrapper">
        <div class="p-single-voice__content p-single-voice-content">
            <!-- 本文 -->
            <article class="p-single-voice-content__body p-single-voice-content-body">
                <!-- 投稿画面ACFのループ -->
                <?php
                $args = array(
                    'post_type'     => 'voice',
                    'taxonomy'      => 'voice_category',
                    'posts_per_page' => 6,
                    'summary_field' => 'voice_summary',
                );
                get_template_part('template-parts/loop/loop-post-content', null, $args);
                ?>
                <!-- singleページ用ページネーション -->
                <?php get_template_part('template-parts/sections/section-single-page-nation'); ?>
            </article>

            <!-- cssのスライダー -->
            <article class="p-single-voice-content-body__slider">
                <?php get_template_part('template-parts/sections/section-css-slide'); ?>
            </article>
        </div>
        <!-- プロフィール -->
        <aside class="p-single-voice__profile p-single-voice-profile">
            <!-- 社長プロフィールのカード -->
            <?php
            set_query_var('hide_back_button', true);
            get_template_part('template-parts/cards/card-president-profile');
            ?>

            <a href="#" class="c-return c-return--single-voice u-desktop">
                一覧に戻る<span class="c-arrow01_right"></span>
            </a>


        </aside>
    </section>

    <!-- 関連記事 Swiper -->
    <div class="p-single-voice__slider">
        <?php get_template_part('template-parts/swiper/related-swiper'); ?>
    </div>

    <!-- リンクバナー contact / faq -->
    <section class="p-section-wrapper">
        <?php get_template_part('template-parts/sections/section-contact'); ?>
        <?php get_template_part('template-parts/sections/section-faq'); ?>
    </section>

</main>


<?php get_footer(); ?>