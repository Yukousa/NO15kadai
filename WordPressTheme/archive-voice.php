<?php get_header(); ?>

<main class="p-archive-voice">
  <section class="p-archive-voice__mv p-archive-voice-mv">
    <div class="p-archive-voice-mv_inner p-archive-voice-mv-inner">
      <div class="p-archive-voice-mv-inner__title">
        <h2 class="c-heading01 c-heading01--large03" data-en="voice">実績</h2>
      </div>
      <div class="p-archive-voice-mv__breadcrumbs">
        <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
      </div>
    </div>
  </section>

  <!-- メイン部分 -->
  <section class="p-archive-voice__container p-archive-voice-container">
    <?php if (have_posts()) : ?>
      <div class="p-archive-voice-container__post">
        <?php while (have_posts()) : the_post(); ?>
          <!-- 投稿記事 -->
          <?php
          $terms = get_the_terms(get_the_ID(), 'voice_category');
          $summary = get_field('voice_summary');
          ?>

          <div class="c-archive-card c-archive-card--voice ">
            <a href="<?php the_permalink(); ?>">
              <?php if ($terms && !is_wp_error($terms)) : ?>
                <span class="c-archive-card__label"><?php echo esc_html($terms[0]->name); ?></span>
              <?php endif; ?>

              <div class="c-archive-card__image">
                <?php the_post_thumbnail('large'); ?>
              </div>

              <div class="c-archive-card__summary">
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
    <div class="p-archive-voice__pagenavi">
      <?php if (function_exists('wp_pagenavi')) : ?>
        <?php wp_pagenavi(); ?>
      <?php endif; ?>
    </div>
  </section>

</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>