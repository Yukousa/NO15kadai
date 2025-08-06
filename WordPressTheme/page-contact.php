<?php get_header(); ?>

<main>
    <section class="p-mv">
        <div class="p-mv__inner">
            <h2 class="p-mv__title l-inner" data-en="contact">お問合せ</h2>
        </div>
    </section>
    <nav class="p-breadcrumbs" aria-label="breadcrumb">
        <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
    </nav>

    <section class="p-contact l-inner">
        <?php the_content(); ?>
    </section>
</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>