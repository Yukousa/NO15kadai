<?php get_header(); ?>
<main>
  <section class="p-mv">
    <div class="p-mv__inner">
      <p class="p-mv__title l-inner" data-en="news">お知らせ</p>
    </div>
  </section>
  <nav class="p-breadcrumbs p-breadcrumbs--height" aria-label="breadcrumb">
    <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
  </nav>

  <div class="p-news l-inner">
    <?php
    $args = array(
      'post_type'      => 'news',
      'posts_per_page' => 10,
      'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
      'year'           => get_query_var('year'),       // ← 追加
      'monthnum'       => get_query_var('monthnum'),   // ← 追加
    );
    $news_query = new WP_Query($args);

    if ($news_query->have_posts()) :
    ?>
      <ul class="p-news__list p-news-list">
        <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
          <li class="p-news-list__item p-news-list-item">
            <div class="p-news-list-item__meta p-news-post__meta p-news-post-meta">
              <span class="p-news-post-meta__date"><?php echo get_the_date('Y.m.d'); ?></span>
              <?php
              $terms = get_the_terms(get_the_ID(), 'news_category');
              if ($terms && !is_wp_error($terms)) {
                echo '<span class="p-news-post-meta__category">' . esc_html($terms[0]->name) . '</span>';
              }
              ?>
            </div>
            <h2 class="p-news-list-item__title">
              <a href="<?php the_permalink(); ?>">
                <?php echo esc_html(wp_strip_all_tags(get_the_title())); ?>
              </a>
            </h2>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php
    endif;
    wp_reset_postdata();
    ?>

    <nav class="p-news__page-nation">
      <?php if (function_exists('wp_pagenavi')) : ?>
        <?php wp_pagenavi(array('query' => $news_query)); ?>
      <?php endif; ?>
    </nav>

    <aside class="p-news__sidebar">
      <?php get_template_part('template-parts/sections/section-news-sidebar'); ?>
    </aside>
  </div>
</main>

<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>