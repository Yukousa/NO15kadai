<?php get_header(); ?>
<main class="p-archive-news">
  <section class="p-archive-news__mv p-archive-news-mv">
    <div class="p-archive-news-mv__inner p-archive-news-mv-inner l-inner">
      <div class="p-archive-news-mv-inner__title">
        <h3 class="c-heading01 c-heading01--large03" data-en="news">お知らせ</h3>
      </div>
      <div class="p-archive-news-mv-inner__breadcrumbs">
        <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
      </div>
    </div>
  </section>

  <section class="p-archive-news__wrapper p-archive-news-wrapper l-inner">
    <div class="p-archive-news-wrapper__list p-archive-news-wrapper-list">
      <?php
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;

      $args = [
        'post_type'      => 'news',
        'posts_per_page' => 10,
        'paged'          => $paged,
      ];
      $news_query = new WP_Query($args);
      if ($news_query->have_posts()) :
        while ($news_query->have_posts()) : $news_query->the_post();
      ?>

      <div class="p-archive-news-wrapper-list__item">
        <a href="<?php the_permalink(); ?>" class="c-news-list">
          <div class="c-news-list__post c-news-list-post">
            <div class="c-news-list__meta">
              <span class="c-news-list__meta--date"><?php echo get_the_date('Y.m.d'); ?></span>

              <?php
              $terms = get_the_terms(get_the_ID(), 'news_category');
              if (!empty($terms) && !is_wp_error($terms)) :
              ?>
                <span class="c-news-list__meta--category">
                  <?php foreach ($terms as $term) : ?>
                    <span class="c-news-list__meta--category-name"><?php echo esc_html($term->name); ?></span>
                  <?php endforeach; ?>
                </span>
              <?php endif; ?>
            </div>
            <h3 class="c-news-list__post-title">
              <?php echo esc_html(get_the_title()); ?>
            </h3>
          </div>
        </a>
      </div>
        <?php
        endwhile;
        wp_reset_postdata();
      else :
        ?>
        <p class="c-news-list__none">まだ投稿がありません。</p>
      <?php endif; ?>

      <div class="c-news-list__pagenavi--sp u-mobile">
        <?php if (function_exists('wp_pagenavi')) : ?>
          <?php wp_pagenavi(); ?>
        <?php endif; ?>
      </div>
    </div>

    <aside class="p-archive-news-wrapper__sidebar">
      <?php get_template_part('template-parts/sections/section-news-sidebar'); ?>
    </aside>
  </section>

  <!-- ページネーション　pc用 -->
  <div class="p-archive-news__pagenavi--pc u-desktop">
    <?php if (function_exists('wp_pagenavi')) : ?>
      <?php wp_pagenavi(); ?>
    <?php endif; ?>
  </div>


</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>