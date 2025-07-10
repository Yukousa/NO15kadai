<?php get_header(); ?>
<main class="p-archive-news">
  <section class="p-archive-news__mv p-archive-news-mv">
    <div class="p-archive-news-mv__inner p-archive-news-mv-inner l-inner">
      <div class="p-archive-news-mv-inner__title">
        <h2 class="c-heading01 c-heading01--large03" data-en="news">お知らせ</h2>
      </div>
      <div class="p-archive-news-mv-inner__breadcrumbs">
        <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
      </div>
    </div>
  </section>

  <section class="p-archive-news__wrapper p-archive-news-wrapper l-inner">
    <div class="p-archive-news-wrapper__list p-archive-news-wrapper-list">
      <?php if (have_posts()) : ?>
        <ul class="p-archive-news-wrapper__list p-archive-news-wrapper-list">
          <?php while (have_posts()) : the_post(); ?>
            <li class="p-archive-news-wrapper-list__item">
              <a href="<?php the_permalink(); ?>"  class="c-news-list">
                <div class="c-news-list__meta">
                  <span class="c-news-list__meta--date"><?php echo get_the_date('Y.m.d'); ?></span>
                  <?php
                  $terms = get_the_terms(get_the_ID(), 'news_category');
                  if ($terms && !is_wp_error($terms)) :
                    foreach ($terms as $term) :
                      echo '<span class="c-news-list__meta--category-name">' . esc_html($term->name) . '</span>';
                    endforeach;
                  endif;
                  ?>
                </div>
                <div class="c-news-list__post-title"><?php the_title(); ?></div>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php else : ?>
        <p>現在、投稿はありません。</p>
      <?php endif; ?>

      <!-- ページネーション　pc用 -->
      <div class="p-archive-news__pagenavi--pc u-desktop">
        <?php if (function_exists('wp_pagenavi')) : ?>
          <?php wp_pagenavi(); ?>
        <?php endif; ?>
      </div>
      <div class="p-single-news-wrapper-inner-content__btn">
        <a href="/news/" class="c-return c-return--single-news">
          一覧に戻る<span class="c-arrow01_right"></span>
        </a>
      </div>

    </div>
    <aside class="p-archive-news-wrapper__sidebar">
      <?php get_template_part('template-parts/sections/section-news-sidebar'); ?>
    </aside>
  </section>

</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>