<?php get_header(); ?>

<main class="p-single-news">
    <!-- fv -->
    <section class="p-single-news__fv c-sub-fv">
        <?php get_template_part('template-parts/section', 'sub-fv'); ?>
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
            <?php get_template_part('template-parts/sidebar/sidebar-news'); ?>
        </div>

    </section>

    <!-- contact / faq -->
    <section class="p-section-wrapper">
        <?php get_template_part('template-parts/section', 'contact'); ?>
        <?php get_template_part('template-parts/section', 'faq'); ?>
    </section>

</main>


<?php get_footer(); ?>