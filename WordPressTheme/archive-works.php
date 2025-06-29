<?php get_header(); ?>

<main class="p-archive-works">
  <section class="p-archive-works__mv p-archive-works-mv">
    <div class="p-archive-works-mv_inner p-archive-works-mv-inner">
      <div class="p-archive-works-mv-inner__title">
        <h2 class="c-heading01 c-heading01--large03" data-en="works">実績</h2>
      </div>
      <div class="p-archive-works-mv__breadcrumbs">
        <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
      </div>
    </div>
  </section>

  <!-- メイン部分 -->
  <section class="p-archive-works__container p-archive-works-container l-inner">
    <?php if (have_posts()) : ?>
      <div class="p-archive-works-container__post">
        <?php while (have_posts()) : the_post(); ?>
          <!-- 投稿記事 -->
          <?php
          $terms = get_the_terms(get_the_ID(), 'works_category');
          $summary = get_field('works_summary');
          ?>

          <div class="c-archive-card c-archive-card--works">
            <a href="<?php the_permalink(); ?>">
              <?php if ($terms && !is_wp_error($terms)) : ?>
                <span class="c-archive-card__label c-archive-card__label--works "><?php echo esc_html($terms[0]->name); ?></span>
              <?php endif; ?>

              <div class="c-archive-card__image">
                <?php the_post_thumbnail('large'); ?>
              </div>

              <div class="c-archive-card__summary c-archive-card__summary--works">
                <?php if ($summary) : ?>
                  <p class="c-archive-card__summary-text"><?php echo esc_html($summary); ?></p>
                <?php endif; ?>
              </div>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    <!-- ページネーション -->
    <div class="p-archive-works__pagenavi">
      <?php if (function_exists('wp_pagenavi')) : ?>
        <?php wp_pagenavi(); ?>
      <?php endif; ?>
    </div>
  </section>
  </section>


</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>