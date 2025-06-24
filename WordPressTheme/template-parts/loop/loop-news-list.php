<?php
$is_front = is_front_page();
$modifier = $is_front ? ' c-news-list--front' : '';
$link_modifier = $is_front ? ' c-news-list__link--front' : '';
?>

<div class="c-news-list<?php echo $modifier; ?>">
  <?php
  $paged = get_query_var('paged') ? get_query_var('paged') : 1;
  $posts_per_page = $is_front ? 3 : 10;

  $args = [
      'post_type'      => 'news',
      'posts_per_page' => $posts_per_page,
      'paged'          => $paged,
  ];
  $news_query = new WP_Query($args);
  if ($news_query->have_posts()) :
      while ($news_query->have_posts()) : $news_query->the_post();
  ?>
    <a href="<?php the_permalink(); ?>" class="c-news-list__link<?php echo $link_modifier; ?>">
      <article class="c-news-list__post c-news-list-post">
        <?php get_template_part('template-parts/sections/section-meta'); ?>
        <h3 class="c-news-list-post__title">
          <?php echo esc_html(get_the_title()); ?>
        </h3>
      </article>
    </a>
  <?php
      endwhile;
      wp_reset_postdata();
  else :
  ?>
    <p class="c-news-list__none">まだ投稿がありません。</p>
  <?php endif; ?>

  <div class="c-news-list__pagenavi--sp u-mobile">
    <?php get_template_part('template-parts/sections/section-pagenavi'); ?>
  </div>
</div>
