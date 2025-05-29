<?php get_header(); ?>

<main>
    <section class="p-404">
        <p class="p-404__main">404 NOT FOUND</p>
        <p class="p-404__sub">お探しのページが見つかりませんでした。<br>削除された可能性があります。</p>

        <a href="#" class="p-404__return">TOPへ戻る</a>
    </section>

    <!-- contact / faq -->
    <section class="p-section-wrapper">
        <?php get_template_part('template-parts/section', 'contact'); ?>
        <?php get_template_part('template-parts/section', 'faq'); ?>
    </section>
</main>


<?php get_footer(); ?>