<?php get_header(); ?>

<main class="p-contact">
    <section class="p-contact__mv p-contact-mv l-inner">
        <div class="p-contact-mv_inner p-contact-mv-inner">
            <div class="p-contact-mv-inner__title">
                <h2 class="c-heading01 c-heading01--large03" data-en="contact">お問い合わせ</h2>
            </div>
            <div class="p-contact-mv-inner__breadcrumbs">
                <?php get_template_part('template-parts/sections/section-breadcrumbs'); ?>
            </div>
        </div>
    </section>

    <section class="p-front-content">
    <div class="p-front-content__wrapper p-front-content-wrapper">
      <!-- voice pc時　サイドバー　 -->
      <aside class="p-front-content-wrapper__block2 p-front-content-wrapper-block2">
        <div class="p-front-content-wrapper-block2__voice p-front-content-wrapper-block2-voice">
          <div class="p-front-content-wrapper-block2-voice__title">
            <a href="/voice/">
              <h2 class="c-heading01 c-heading01--sidebar" data-en="voice">お客様の声</h2>
            </a>
          </div>
          <!-- voice 記事のリスト -->
          <div class="p-front-content-wrapper-block2-voice__list p-front-content-wrapper-block2-voice-list">
            <?php
            $args = array(
              'post_type'      => 'voice',
              'posts_per_page' => 6,
            );
            $the_query = new WP_Query($args);

            $index = 0;
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post();
                $index++;
            ?>
                <div class="p-front-content-wrapper-block2-voice-list__item p-front-content-wrapper-block2-voice-list-item" data-index="<?php echo $index; ?>">
                  <a href="<?php the_permalink(); ?>" class="p-front-content-wrapper-block2-voice-list-item__card p-front-content-wrapper-block2-voice-list-item-card">
                    <?php
                    // voiceカテゴリー取得
                    $terms = get_the_terms(get_the_ID(), 'voice_category');
                    ?>
                    <?php if ($terms && !is_wp_error($terms)) : ?>
                      <span class="p-front-content-wrapper-block2-voice-list-item-card__label"><?php echo esc_html($terms[0]->name); ?></span>
                    <?php endif; ?>

                    <div class="p-front-content-wrapper-block2-voice-list-item-card__image">
                      <?php the_post_thumbnail('large'); ?>
                    </div>

                    <div class="p-front-content-wrapper-block2-voice-list-item-card__summary">
                      <?php if ($summary = get_field('voice_summary')) : ?>
                        <p class="p-front-content-wrapper-block2-voice-list-item-card__text"><?php echo esc_html($summary); ?></p>
                      <?php endif; ?>
                    </div>
                  </a>
                </div>
            <?php
              endwhile;
              wp_reset_postdata();
            else :          echo '<p>まだ投稿がありません。</p>';
            endif;
            ?>
          </div>

          <div class="p-front-content-wrapper-block2-voice__readmore">
            <a href="/voice/" class="c-readMore ">Read more<span class="c-arrow01_right"></span></a>
          </div>
        </div>
      </aside>
    </div>
  </section>
</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>