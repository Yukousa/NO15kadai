<?php get_header(); ?>
<main class="p-archive-news">
    <!-- fv -->
    <section class="p-archive-news__fv c-sub-fv">
        <?php get_template_part('template-parts/section', 'sub-fv'); ?>
    </section>

    <!-- メイン部分 -->
    <section class="p-archive-news__content p-archive-news-content">
        <!-- newsのリスト -->
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
        <?php get_template_part('template-parts/section', 'pagenavi'); ?>
    </div>

    <!-- contact / faq -->
    <section class="p-section-wrapper">
        <?php get_template_part('template-parts/section', 'contact'); ?>
        <?php get_template_part('template-parts/section', 'faq'); ?>
    </section>

</main>
<?php get_footer(); ?>