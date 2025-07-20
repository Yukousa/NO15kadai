<?php get_header(); ?>

<main class="p-front">
  <?php
  echo apply_filters('the_content', get_the_content());
  ?>
</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>