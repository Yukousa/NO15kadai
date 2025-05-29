<?php get_header(); ?>

<main class="p-message">
    <section class="p-message__fv c-sub-fv">
        <?php get_template_part('template-parts/section', 'sub-fv'); ?>
    </section>

    <!-- contact / faq -->
    <section class="p-section-wrapper">
        <?php get_template_part('template-parts/section', 'contact'); ?>
        <?php get_template_part('template-parts/section', 'faq'); ?>
    </section>

</main>

<?php get_footer(); ?>
