<?php get_header(); ?>

<main class="p-archive-voice">
    <section class="p-archive-voice__fv c-sub-fv">
        <?php get_template_part('template-parts/section', 'sub-fv'); ?>
    </section>

    <!-- contact / faq -->
    <section class="p-section-wrapper">
        <?php get_template_part('template-parts/section', 'contact'); ?>
        <?php get_template_part('template-parts/section', 'faq'); ?>
    </section>

</main>

<?php get_footer(); ?>