<?php get_header(); ?>

<main class="p-archive-voice">
  <!-- fv -->
  <section class="p-archive-voice__fv c-sub-fv">
    <!-- フロントページ以外のfv -->
    <?php get_template_part('template-parts/sections/section-sub-fv'); ?>
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

          <div class="c-archive-card">
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
  </section>


  <!-- リンクバナー contact / faq -->
  <section class="p-section-wrapper">
    <?php get_template_part('template-parts/sections/section-contact'); ?>
    <?php get_template_part('template-parts/sections/section-faq'); ?>
  </section>

</main>

<?php get_footer(); ?>