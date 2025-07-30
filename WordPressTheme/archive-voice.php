<?php get_header(); ?>

<main>
  <div class="p-voice">
    <div class="p-voice__mv p-voice-mv">
      <div class="p-voice-mv_inner p-voice-mv-inner l-inner">
        <div class="p-voice-mv__title">
          <h2 class="p-voice-mv__title c-heading01 c-heading01--large03" data-en="voice">お客様の声</h2>
        </div>
        <div class="p-voice-mv__breadcrumbs">
          <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
        </div>
      </div>
    </div>

    <div class="p-voice-container__wrapper l-inner">
      <?php if (have_posts()) : ?>
        <ul class="p-voice-container__post">
          <?php while (have_posts()) : the_post(); ?>
            <?php
            $terms = get_the_terms(get_the_ID(), 'voice_category');
            $lead = get_field('post-lead');
            ?>
            <li class="c-card01 c-card01--voice">
              <a href="<?php the_permalink(); ?>">
                <?php if ($terms && !is_wp_error($terms)) : ?>
                  <span class="c-card01__label c-card01__label--voice">
                    <?php echo esc_html($terms[0]->name); ?>
                  </span>
                <?php endif; ?>

                <div class="c-card01__image">
                  <?php the_post_thumbnail('large'); ?>
                </div>

                <div class="c-card01__lead c-card01__lead--voice">
                  <?php if ($lead) : ?>
                    <p class="c-card01__lead-text"><?php echo esc_html( wp_strip_all_tags( $lead, true ) ); ?></p>
                  <?php endif; ?>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php endif; ?>

      <div class="p-voice-container__pager">
        <?php if (function_exists('wp_pagenavi')) : ?>
          <?php wp_pagenavi(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>