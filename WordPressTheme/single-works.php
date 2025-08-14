<?php get_header(); ?>
<main>

  <section class="p-mv p-mv--works">
    <div class="p-mv__inner">
      <p class="p-mv__title--post l-inner">
        <?php echo get_the_title(); ?>
      </p>
      <?php if (has_post_thumbnail()) : ?>
        <div class="p-mv__image p-mv__image--works">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>

    </div>
  </section>

  <article class="p-works">
    <div class="p-works__wrapper">
      <section class="p-works__post p-works-post l-inner">
        <div class="p-works-post__heading">
          <?php if (get_field('works_post__heading_1_top') || get_field('works_post__heading_1_bottom')) : ?>
            <?php if (get_field('works_post__heading_1_top')) : ?>
              <h2 class="p-works-post__title c-heading02 u-slide-up"><?php the_field('works_post__heading_1_top'); ?></h2>
            <?php endif; ?>
            <?php if (get_field('works_post__heading_1_bottom')) : ?>
              <h2 class="p-works-post__title c-heading02 c-heading02--black u-slide-left"><?php the_field('works_post__heading_1_bottom'); ?></h2>
            <?php endif; ?>
          <?php endif; ?>
        </div>
  
        <?php
        if (
          get_field('genre') || get_field('role_scope') || get_field('environment') ||
          get_field('period') || get_field('url') || get_field('client') || get_field('client_notes')
        ) : ?>
          <dl class="p-works-post__table">
            <?php if (get_field('genre')) : ?>
              <div class="p-works-post__table-item">
                <dt class="p-works-post__table-term">ジャンル</dt>
                <dd class="p-works-post__table-desc"><?php echo esc_html(get_field('genre')); ?></dd>
              </div>
            <?php endif; ?>
  
            <?php if (get_field('role_scope')) : ?>
              <div class="p-works-post__table-item">
                <dt class="p-works-post__table-term">担当と作業範囲</dt>
                <dd class="p-works-post__table-desc"><?php echo esc_html(get_field('role_scope')); ?></dd>
              </div>
            <?php endif; ?>
  
            <?php if (get_field('environment')) : ?>
              <div class="p-works-post__table-item">
                <dt class="p-works-post__table-term">制作環境と使用言語</dt>
                <dd class="p-works-post__table-desc"><?php echo esc_html(get_field('environment')); ?></dd>
              </div>
            <?php endif; ?>
  
            <?php if (get_field('period')) : ?>
              <div class="p-works-post__table-item">
                <dt class="p-works-post__table-term">制作期間</dt>
                <dd class="p-works-post__table-desc"><?php echo esc_html(get_field('period')); ?></dd>
              </div>
            <?php endif; ?>
  
            <?php if (get_field('url')) : ?>
              <div class="p-works-post__table-item">
                <dt class="p-works-post__table-term">URL</dt>
                <dd class="p-works-post__table-desc c-url-link">
                  <a href="<?php echo esc_url(get_field('url')); ?>" target="_blank" rel="noopener">
                    <?php echo esc_html(get_field('url')); ?>
                  </a>
                </dd>
              </div>
            <?php endif; ?>
  
            <?php if (get_field('client')) : ?>
              <div class="p-works-post__table-item">
                <dt class="p-works-post__table-term">クライアント情報</dt>
                <dd class="p-works-post__table-desc"><?php echo esc_html(get_field('client')); ?></dd>
              </div>
            <?php endif; ?>
  
            <?php if (get_field('client_notes')) : ?>
              <div class="p-works-post__table-item">
                <dt class="p-works-post__table-term">クライアントの意向と課題、制作経緯</dt>
                <dd class="p-works-post__table-desc"><?php echo esc_html(get_field('client_notes')); ?></dd>
              </div>
            <?php endif; ?>
          </dl>
        <?php endif; ?>
  
        <div class="p-works-post__heading">
          <?php if (get_field('works_post__heading_2_top') || get_field('works_post__heading_2_bottom')) : ?>
            <?php if (get_field('works_post__heading_2_top')) : ?>
              <h2 class="p-works-post__title c-heading02 u-slide-up"><?php the_field('works_post__heading_2_top'); ?></h2>
            <?php endif; ?>
            <?php if (get_field('works_post__heading_2_bottom')) : ?>
              <h2 class="p-works-post__title c-heading02 c-heading02--black u-slide-left"><?php the_field('works_post__heading_2_bottom'); ?></h2>
            <?php endif; ?>
          <?php endif; ?>
        </div>
  
  
        <div class="p-works-post__content">
          <?php the_content(); ?>
        </div>
  
        <nav class="p-works-post__navi c-single-page-nation">
          <?php if ($prev_post = get_previous_post(false)) : ?>
              <a href="<?php echo get_permalink($prev_post->ID); ?>" class="c-single-page-nation__prev">前の記事へ</a>  
          <?php endif; ?>  
          <?php if ($next_post = get_next_post(false)) : ?>
              <a href="<?php echo get_permalink($next_post->ID); ?>" class="c-single-page-nation__next">次の記事へ</a>
          <?php endif; ?>
        </nav>
      </section>
    <aside class="p-works__president p-works-president l-inner">
      <div class="p-works-president__body p-works-president-body">
        <div class="p-works-president-body__image">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/president01.png" alt="代表 田中 太郎の写真">
        </div>
        <div class="p-works-president-body__text">
          <p class="p-works-president-body__text--company">株式会社 XXXXXX</p>
        </div>
      </div>
      <div class="p-works-president__btn">
        <a href="/works/" class="c-btn02">一覧に戻る</a>
      </div>
    </aside>
    </div>

  </article>

  <div class="p-works__swiper">
    <?php get_template_part('template-parts/sections/section-related-swiper'); ?>
  </div>
</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>