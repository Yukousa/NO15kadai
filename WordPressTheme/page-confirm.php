<?php
/*
Template Name: Contact Confirm
*/
get_header(); ?>

<main>
<section class="p-mv">
        <div class="p-mv__inner">
            <h2 class="p-mv__title l-inner" data-en="contact">お問合せ</h2>
        </div>
    </section>
    <nav class="p-breadcrumbs" aria-label="breadcrumb">
        <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
    </nav>

    <div class="p-contact l-inner">
        <p class="p-contact__text">お問合せ内容確認</p>
        <?php the_content(); ?>
    </div>
</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>