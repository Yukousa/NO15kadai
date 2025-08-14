<?php get_header(); ?>

<main>

  <section class="p-mv">
    <div class="p-mv__inner">
      <p class="p-mv__title c-heading01 c-heading01--large03" data-en="works">実績</p>
    </div>
  </section>
  <nav class="p-breadcrumbs p-breadcrumbs--height" aria-label="breadcrumb">
    <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
  </nav>




  <section class="p-works__content p-works-content l-inner">
    <?php if (have_posts()) : ?>
      <ul class="p-works-content__post p-works-content-post">
        <?php while (have_posts()) : the_post(); ?>
          <?php
          $terms = get_the_terms(get_the_ID(), 'works_category');
          $lead = get_field('post-lead');
          ?>

          <li class="p-works-content-post__card c-card01 c-card01--works">
            <a href="<?php the_permalink(); ?>">
              <?php if ($terms && !is_wp_error($terms)) : ?>
                <span class="c-card01__label c-card01__label--works">
                  <?php echo esc_html($terms[0]->name); ?>
                </span>
              <?php endif; ?>

              <div class="c-card01__image">
                <?php the_post_thumbnail('large'); ?>
              </div>

              <div class="c-card01__lead c-card01__lead--works">
                <?php if ($lead) : ?>
                  <p class="c-card01__lead-text"><?php echo esc_html($lead); ?></p>
                <?php endif; ?>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>
    <div class="p-works-content__pagenavi">
      <?php if (function_exists('wp_pagenavi')) : ?>
        <?php wp_pagenavi(); ?>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>