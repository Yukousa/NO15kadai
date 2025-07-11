<?php get_header(); ?>

<main>
    <section class="p-404">
        <p class="p-404__main">404 NOT FOUND</p>
        <p class="p-404__sub">お探しのページが見つかりませんでした。<br>削除された可能性があります。</p>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="p-404__return">TOPへ戻る</a>
    </section>

</main>

<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>