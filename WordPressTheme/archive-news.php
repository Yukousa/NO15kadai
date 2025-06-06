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
             <?php get_template_part('template-parts/loop/loop-news-list', null, ['modifier' => 'front-news']); ?>
         </div>
        <!-- サイドバー -->
         <div class="p-archive-news-content__sidebar">
             <?php get_template_part('template-parts/sidebar/sidebar-news'); ?>
         </div>
    </section>
    
    <!-- ページネーション　pc用 -->
    <div class="p-archive-news__pagenavi--pc u-desktop">
        <?php get_template_part('template-parts/sections/section-pagenavi'); ?>
    </div>

    <!-- リンクバナー contact / faq -->
    <section class="p-section-wrapper">
        <?php get_template_part('template-parts/sections/section-contact'); ?>
        <?php get_template_part('template-parts/sections/section-faq'); ?>
    </section>

</main>
<?php get_footer(); ?>