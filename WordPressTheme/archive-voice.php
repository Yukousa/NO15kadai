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
          <?php get_template_part('template-parts/cards/card-archive'); ?>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    <!-- ページネーション -->
    <div class="p-archive-voice__pagenavi">
      <?php get_template_part('template-parts/sections/section-pagenavi'); ?>
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