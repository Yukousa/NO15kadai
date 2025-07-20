<?php get_header(); ?>

<main>
    <?php
    $custom_404 = get_page_by_path('404-page'); 
    if ($custom_404) {
        echo apply_filters('the_content', $custom_404->post_content);
    }
    ?>

</main>

<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>