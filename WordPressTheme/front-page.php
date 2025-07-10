<?php get_header(); ?>

<main class="p-front">
  <!-- fv -->
  <section class="p-front-fv">
    <div class="p-front-fv__text p-front-fv-text">
      <p class="p-front-fv-text__catch3">High quality code</p>
      <h2 class="p-front-fv-text__catch1">
        <span class="typing-part" data-text="スキル"></span>
        <span class="p-front-fv-text__catch1--small typing-part" data-text="だけじゃない"></span>
      </h2>
      <p class="p-front-fv-text__catch2 typing-part" data-text="パートナーに。"></p>
    </div>
    <!-- swiper -->
    <div class="swiper p-front-fv-swiper js-front-fv-swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fv-top01.png" alt="イメージ画像" width="1440" height="750" loading="lazy">
        </div>
        <div class="swiper-slide">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fv-top02.png" alt="イメージ画像" width="1440" height="750" loading="lazy">
        </div>
        <div class="swiper-slide">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fv-top03.png" alt="イメージ画像" width="1440" height="750" loading="lazy">
        </div>
      </div>
    </div>
    <!-- スクロールアニメーション -->
    <div class="p-front-fv__scroll p-front-fv-scroll">
      <span class="p-front-fv-scroll__text">scroll</span>
    </div>
  </section>

  <!-- works -->
  <section class="p-front-works js-front-works">
    <div class="p-front-works__title">
      <a href="/works/">
        <h2 class="c-heading01" data-en="works">実績</h2>
      </a>
    </div>

    <!-- フロント works swiper -->
    <?php
    // フロントページでのみ実行
    if (is_front_page()) {
      // クエリの引数設定
      $works_args = [
        'post_type'      => 'works',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
      ];

      $works_query = new WP_Query($works_args);

      if ($works_query->have_posts()) :
    ?>
        <div class="swiper p-front-works__swiper p-front-works-swiper">
          <div class="swiper-wrapper">
            <?php while ($works_query->have_posts()) : $works_query->the_post(); ?>
              <div class="swiper-slide">
                <a href="<?php the_permalink(); ?>" class="p-front-works-swiper__card p-front-works-swiper-card">
                  <?php
                  // worksカテゴリー取得
                  $terms = get_the_terms(get_the_ID(), 'works_category');
                  ?>
                  <?php if ($terms && !is_wp_error($terms)) : ?>
                    <span class="p-front-works-swiper-card__label"><?php echo esc_html($terms[0]->name); ?></span>
                  <?php endif; ?>

                  <div class="p-front-works-swiper-card__image">
                    <?php the_post_thumbnail('large'); ?>
                  </div>

                  <div class="p-front-works-swiper-card__summary">
                    <?php if ($summary = get_field('works_summary')) : ?>
                      <p class="p-front-works-swiper-card__summary-text"><?php echo esc_html($summary); ?></p>
                    <?php endif; ?>
                  </div>
                </a>
              </div>
            <?php endwhile; ?>
          </div>
          <!-- Swiperナビゲーション -->
          <div class="p-front-works-swiper__nav">
            <button class="p-front-works-swiper-nav__prev" aria-label="前へ"></button>
            <button class="p-front-works-swiper-nav__next" aria-label="次へ"></button>
          </div>

        </div>
        <?php wp_reset_postdata(); ?>
    <?php
      endif;
    }
    ?>
    <div class="p-front-works__readMore">
      <a href="/works/" class="c-readMore ">Read more<span class="c-arrow01_right"></span></a>
    </div>
  </section>

  <!-- pc時　2カラム 部分-->
  <section class="p-front-content">
    <div class="p-front-content__wrapper p-front-content-wrapper">
      <div class="p-front-content-wrapper__block1 p-front-content-wrapper-block1">
        <article class="p-front-content-wrapper-block1__paragraph p-front-content-wrapper-block1--paragraph">
          <p class="c-doubleHeadline">丁寧な作業とコミュニケーションで
            <span class="c-doubleHeadline--line2">ハイクオリティなコードを納品。</span>
          </p>
          <p class="c-doubleHeadline">ここにテキストここにテキストここにテキスト<br>ここにテキストここにテキスト
            <span class="c-doubleHeadline--line2">ここにテキストここにテキスト</span>
          </p>
          <p class="c-doubleHeadline">ここにテキストここにテキストここにテキスト<br>ここにテキストここにテキスト</p>
          <p class="c-doubleHeadline">ここにテキストここにテキスト
            <span class="c-doubleHeadline--line2">ここにテキスト</span>
          </p>
        </article>
        <div class="p-front-content-wrapper-block1__image">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image20.png" alt="画像の説明" width="950" height="440" loading="lazy">
        </div>
        <!-- message -->
        <article class="p-front-content-wrapper-block1__message p-front-content-wrapper-block1-message">
          <div class="p-front-content-wrapper-block1-message__title">
            <a href="/message/">
              <h2 class="c-heading01" data-en="message">メッセージ</h2>
            </a>
          </div>
          <!-- sp 非表示 -->
          <div class="p-front-content-wrapper-block1-message__text p-front-content-wrapper-block1-message-text u-desktop">
            <p class="c-doubleHeadline">丁寧な作業とコミュニケーションで
              <span class="c-doubleHeadline--line2">ハイクオリティなコードを納品。</span>
            </p>
            <div class="p-front-content-wrapper-block1-message-text__readMore">
              <a href="/message/" class="c-readMore">Read more<span class="c-arrow01_right"></span></a>
            </div>
          </div>
          <!-- 画像エリア -->
          <div class="p-front-content-wrapper-block1-message__inner p-front-content-wrapper-block1-message-inner">
            <div class="p-front-content-wrapper-block1-message-inner__bgGray"></div>
            <div class="p-front-content-wrapper-block1-message-inner__image p-front-content-wrapper-block1-message-inner-image">
              <div class="p-front-content-wrapper-block1-message-inner-image__image01">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/president01.png" alt="会社代表" width="938" height="502" loading="lazy">
              </div>
              <!-- 背景の動く文字レイヤー -->
              <div class="p-front-content-wrapper-block1-message-inner__text">
                <p>CODO</p>
                <span class="p-front-content-wrapper-block1-message-inner__text-second">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/assist.png" alt="assist" width="620" height="111" loading="lazy">
                </span>
              </div>
              <div class="p-front-content-wrapper-block1-message-inner__image02">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image06.png" alt="イメージ画像" width="724" height="388" loading="lazy">
              </div>
              <div class="p-front-content-wrapper-block1-message-inner__image03">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image07.png" alt="イメージ画像" width="625" height="285" loading="lazy">
              </div>
            </div>
          </div>
        </article>
      </div>
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


  <!-- フロント　service -->
  <section class="p-front-service">
    <div class="p-front-service__header p-front-service-header">
      <div class="p-front-service-header__title">
        <a href="/service/">
          <h2 class="c-heading01 c-heading01--white" data-en="service">サービス</h2>
        </a>
      </div>
      <div class="p-front-service-header__readMore">
        <a href="/service/" class="c-readMore c-readMore--white">Read more<span class="c-arrow01_right c-arrow01_right--white"></span></a>
      </div>
    </div>
    <div class="p-front-service__bgTextWrapper p-front-service-bgTextWrapper">
      <div class="p-front-service-bgText line1">
        <span class="line1-01">対応ソフトは？<span class="line1-02">得意分野は？</span><span class="line1-03">Figmaも対応できてる？</span></span>
        <span class="line1-01">対応ソフトは？<span class="line1-02">得意分野は？</span><span class="line1-03">Figmaも対応できてる？</span></span>
      </div>
      <div class="p-front-service-bgText line2">
        <span class="line2-01">得意分野は？ Figmaも対応できてる？</span><span class="line2-02">WordPressも大丈夫？</span><span class="line2-03">PHPのフォームは作れる？</span>
        <span class="line2-01">得意分野は？ Figmaも対応できてる？</span><span class="line2-02">WordPressも大丈夫？</span><span class="line2-03">PHPのフォームは作れる？</span>
      </div>
      <div class="p-front-service-bgText line3">
        <span class="line3-01">WordPressも大丈夫？<span class="line3-02">対応ソフトは？</span><span class="line3-03">得意分野は？</span></span>
        <span class="line3-01">WordPressも大丈夫？<span class="line3-02">対応ソフトは？</span><span class="line3-03">得意分野は？</span></span>
      </div>
      <div class="p-front-service-bgText line4">
        <span class="line4-01">PHPのフォームは作れる？</span>
        <span class="line4-01">PHPのフォームは作れる？</span>
      </div>
      <div class="p-front-service-bgText line5">
        <span class="line5-01">得意分野は？ Figmaも対応できてる？</span>
        <span class="line5-01">得意分野は？ Figmaも対応できてる？</span>
      </div>
      <div class="p-front-service-bgText line6">
        <span class="line6-01">対応ソフトは？ <span class="line6-02">得意分野は？</span></span>
        <span class="line6-01">対応ソフトは？ <span class="line6-02">得意分野は？</span></span>
      </div>
    </div>
  </section>
  <!-- profile -->
  <section class="p-front-profile">
    <a href="/profile/">
      <div class="p-front-profile__image">
        <picture>
          <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/image11.png" media="(max-width: 768px)">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image26.png" alt="イメージ画像" width="1240" height="343" loading="lazy">
        </picture>
        <div class="p-front-profile__overlay"></div>
        <div class="p-front-profile__content p-front-profile-content">
          <h2 class="c-heading01 c-heading01--white" data-en="profile">経歴・職歴</h2>
          <p class="p-front-profile-content__text">ここにテキスト入れるここにテキスト入れるここにテキスト入れるここにテキスト入れるここにテキスト入れる</p>
        </div>
      </div>
    </a>
  </section>
  <!-- フロント　news -->
  <section class="p-front-news">
    <div class="p-front-news__inner p-front-news-inner">
      <div class="p-front-news-inner__titleArea p-front-news-inner-titleArea">
        <div class="p-front-news-inner-titleArea__title">
          <a href="/news/">
            <h2 class="c-heading01" data-en="news">お知らせ</h2>
          </a>
        </div>
        <div class="p-front-news-inner-titleArea__readmore u-desktop">
          <a href="/news/" class="c-readMore">Read more<span class="c-arrow01_right"></span></a>
        </div>
      </div>
      <!-- newsのリスト -->
      <div class="p-front-news-inner__content p-front-news-inner-content">
        <div class="p-front-news-inner-content__list p-front-news-inner-content-list<?php echo $modifier; ?>">
          <?php
          $is_front = is_front_page();

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
              <div class="p-front-news-inner-content-list__link p-front-news-inner-content-list-link">
                <a href="<?php the_permalink(); ?>">
                  <div class="p-front-news-inner-content-list-link__meta p-front-news-inner-content-list-link-meta">
                    <span class="p-front-news-inner-content-list-link-meta__date"><?php echo get_the_date('Y.m.d'); ?></span>

                    <?php
                    $terms = get_the_terms(get_the_ID(), 'news_category');
                    if (!empty($terms) && !is_wp_error($terms)) :
                    ?>
                      <span class="p-front-news-inner-content-list-link-meta__category">
                        <?php foreach ($terms as $term) : ?>
                          <span class="p-front-news-inner-content-list-link-meta__category-name"><?php echo esc_html($term->name); ?></span>
                        <?php endforeach; ?>
                      </span>
                    <?php endif; ?>
                  </div>
                  <h3 class="p-front-news-inner-content-list-link-post__title">
                    <?php echo esc_html(get_the_title()); ?>
                  </h3>
                </a>
              </div>
            <?php
            endwhile;
            wp_reset_postdata();
          else :
            ?>
            <p class="p-front-news-inner-content-list__none">まだ投稿がありません。</p>
          <?php endif; ?>
          <div class="p-front-news-inner-content-list__pagenavi--sp u-mobile">
            <?php if (function_exists('wp_pagenavi')) : ?>
              <?php wp_pagenavi(); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="p-front-news-inner__readmore u-mobile">
      <a href="/news/" class="c-readMore">Read more<span class="c-arrow01_right"></span></a>
    </div>
  </section>
</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>