<?php get_header(); ?>
<main class="p-archive-news">
    <!-- fv -->
    <section class="p-archive-news__fv c-sub-fv">
        <?php get_template_part('template-parts/section', 'sub-fv'); ?>
    </section>

    <!-- メイン部分 -->
    <section class="p-archive-news__content">
        <!-- newsのリスト -->
         <div class="c-news-list__container c-news-list-container">
             <?php get_template_part('template-parts/loop/loop-news-list', null, ['modifier' => 'front-news']); ?>
         </div>
        <!-- サイドバー -->
        <?php get_template_part('template-parts/sidebar/sidebar-news'); ?>
    </section>
    
    <!-- ページネーション　pc用 -->
    <div class="c-news-list-container__pagenavi--pc u-desktop">
        <?php get_template_part('template-parts/section', 'pagenavi'); ?>
    </div>

    <!-- contact / faq -->
    <section class="p-section-wrapper">
        <?php get_template_part('template-parts/section', 'contact'); ?>
        <?php get_template_part('template-parts/section', 'faq'); ?>
    </section>

</main>
<?php get_footer(); ?>