<?php get_header(); ?>
<main>
  <div class="p-works">
    <div class="p-works__mv">
      <h2 class="p-works-post__title l-inner">
        <?php echo get_the_title(); ?>
      </h2>
      <?php if (has_post_thumbnail()) : ?>
        <div class="p-works-mv__thumbnail">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>
    </div>

    <div class="p-works__inner">
      <article class="p-works__post p-works-post l-inner">
        <div class="p-works-post__heading">
          <?php if (get_field('works_post__heading_1_top') || get_field('works_post__heading_1_bottom')) : ?>
            <?php if (get_field('works_post__heading_1_top')) : ?>
              <h3 class="p-works-post__heading-top c-heading02--up"><?php the_field('works_post__heading_1_top'); ?></h3>
            <?php endif; ?>
            <?php if (get_field('works_post__heading_1_bottom')) : ?>
              <h3 class="p-works-post__heading-bottom c-heading02--left"><span><?php the_field('works_post__heading_1_bottom'); ?></span></h3>
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
              <h3 class="p-works-post__heading-top c-heading02--up"><?php the_field('works_post__heading_2_top'); ?></h3>
            <?php endif; ?>
            <?php if (get_field('works_post__heading_2_bottom')) : ?>
              <h3 class="p-works-post__heading-bottom c-heading02--left"><span><?php the_field('works_post__heading_2_bottom'); ?></span></h3>
            <?php endif; ?>
          <?php endif; ?>
        </div>


        <div class="p-works-post__content">
          <?php the_content(); ?>
        </div>

        <nav class="p-works-post__navi c-single-page-nation">
          <?php if ($prev_post = get_previous_post(false)) : ?>
            <div class="c-single-page-nation__prev">
              <a href="<?php echo get_permalink($prev_post->ID); ?>" class="c-single-page-nation__link">
                <div class="c-arrow02__right"></div>
                <span>前の記事へ</span>
              </a>
            </div>
          <?php endif; ?>

          <?php if ($next_post = get_next_post(false)) : ?>
            <div class="c-single-page-nation__next">
              <a href="<?php echo get_permalink($next_post->ID); ?>" class="c-single-page-nation__link">
                <span>次の記事へ</span>
                <div class="c-arrow02__left"></div>
              </a>
            </div>
          <?php endif; ?>
        </nav>
      </article>

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
          <a href="/works/" class="c-return c-return--works">
            一覧に戻る<span class="c-arrow01__right c-arrow01__right--large"></span>
          </a>
        </div>
      </aside>
    </div>

    <div class="p-works__swiper">
      <?php get_template_part('template-parts/sections/section-related-swiper'); ?>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>