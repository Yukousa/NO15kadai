<?php get_header(); ?>
<main class="p-news">
    <div class="p-news__inner l-inner">
        <section class="p-news__mv p-news-mv">
            <div class="p-news-mv__inner">
                <div class="p-news-mv__title">
                    <p class="p-news-mv__title c-heading01 c-heading01--large03" data-en="news">お知らせ</p>
                </div>
                <div class="p-news-mv__breadcrumbs">
                    <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
                </div>
            </div>
        </section>

        <div class="p-news__wrapper">
            <article class="p-news__post p-news-post">
                <div class="p-news-post__header">
                    <h2 class="p-news-post__title"><?php the_title(); ?></h2>

                    <div class="p-news-post__meta p-news-post-meta">
                        <span class="p-news-post-meta__date"><?php echo get_the_date('Y.m.d'); ?></span>
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'news_category');
                        if ($terms && !is_wp_error($terms)) {
                            echo '<span class="p-news-post-meta__category">' . esc_html($terms[0]->name) . '</span>';
                        }
                        ?>
                    </div>
                </div>

                <div class="p-news-post__thumbnail">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php endif; ?>
                </div>

                <div class="p-news-post__content">
                    <?php the_content(); ?>
                </div>
            </article>

            <div class="p-news__return">
                <a href="<?php echo esc_url(get_post_type_archive_link('news')); ?>" class="c-return">
                    一覧に戻る<span class="c-arrow01__right"></span>
                </a>
            </div>

            <aside class="p-news__sidebar">
                <?php get_template_part('template-parts/sections/section-news-sidebar'); ?>
            </aside>
        </div>
    </div>
</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>