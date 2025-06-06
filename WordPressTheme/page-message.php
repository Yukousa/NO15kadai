<?php get_header(); ?>

<main class="p-message">
<section class="p-single-voice__fv c-sub-fv">
        <!-- フロントページ以外のfv -->
        <?php get_template_part('template-parts/sections/section-sub-fv'); ?>
    </section>

    <!-- リンクバナー contact / faq -->
    <section class="p-section-wrapper">
        <?php get_template_part('template-parts/sections/section-contact'); ?>
        <?php get_template_part('template-parts/sections/section-faq'); ?>
    </section>

</main>

<?php get_footer(); ?>
