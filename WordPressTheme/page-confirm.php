<?php
/*
Template Name: Contact Confirm
*/
get_header(); ?>

<main class="p-contact">
    <section class="p-contact__mv p-contact-mv l-inner">
        <div class="p-contact-mv_inner p-contact-mv-inner">
            <div class="p-contact-mv-inner__title">
                <h2 class="c-heading01 c-heading01--large03" data-en="contact">お問い合わせ</h2>
            </div>
            <div class="p-contact-mv-inner__breadcrumbs">
                <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
            </div>
        </div>
    </section>

    <div class="p-contact__inner l-inner">
        <p class="p-contact__inner--text">お問合せ内容確認</p>
        <?php the_content(); ?>
    </div>
</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>