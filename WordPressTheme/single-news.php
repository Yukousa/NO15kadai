<?php get_header(); ?>
<main>
    <section class="p-mv">
        <div class="p-mv__inner">
            <h2 class="p-mv__title l-inner" data-en="news">お知らせ</h2>
        </div>
    </section>
    <nav class="p-breadcrumbs p-breadcrumbs--height" aria-label="breadcrumb">
        <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
    </nav>
    <div class="p-news l-inner">
        <article class="p-news__inner">
            <section class="p-news__post p-news-post">
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
            </section>
    
            <div class="p-news__return">
                <a href="<?php echo esc_url(get_post_type_archive_link('news')); ?>" class="c-return">
                    一覧に戻る<span class="c-arrow01__right"></span>
                </a>
            </div>
        </article>    
        <aside class="p-news__sidebar">
            <?php get_template_part('template-parts/sections/section-news-sidebar'); ?>
        </aside>
    </div>
</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>