<?php get_header(); ?>

<main class="p-front">
  <!-- fv -->
  <section class="p-front-fv">
    <!-- テキストアニメーション -->
    <div class="p-front-fv__text p-front-fv-text">
      <p class="p-front-fv-text__catch3">High quality code</p>
      <h2 class="p-front-fv-text__catch1">
        <span class="typing-part" data-text="スキル"></span>
        <span class="p-front-fv-text__catch1--small typing-part" data-text="だけじゃない"></span>
      </h2>
      <p class="p-front-fv-text__catch2 typing-part" data-text="パートナーに。"></p>
    </div>
    <!-- swiper -->
    <?php get_template_part('template-parts/swiper/front-fv-swiper'); ?>
    <!-- スクロールアニメーション -->
    <div class="p-front-fv__scroll p-front-fv-scroll">
      <span class="p-front-fv-scroll__text">scroll</span>
    </div>
  </section>

  <!-- works -->
  <section class="p-front__works p-front-works">
    <div class="p-front-works__title">
      <a href="/works/">
        <h2 class="c-heading01 c-heading01--front" data-en="works">実績</h2>
      </a>
    </div>
    <!-- フロント works swiper -->
    <?php get_template_part('template-parts/swiper/front-works-swiper'); ?>

    <div class="p-front-works__readMore">
      <a href="/works/" class="c-readMore ">Read more<span class="c-arrow01_right"></span></a>
    </div>
  </section>

  <!-- pc時　2カラム 部分-->
  <section class="p-front__container p-front-container">
    <!-- voice pc時 メイン部分　 -->
    <div class="p-front-container__wrapper p-front-container-wrapper">
      <!-- container テキスト -->
      <article class="p-front-container__content p-front-container-content">
        <p class="p-front-container-content__text">丁寧な作業とコミュニケーションで</p>
        <p class="c-subtitle--line2">ハイクオリティなコードを納品。</p>
        <p class="p-front-container-content__text">ここにテキストここにテキストここにテキスト<br>ここにテキストここにテキスト</p>
        <p class="c-subtitle--line2">ここにテキストここにテキスト</p>
        <p class="p-front-container-content__text">ここにテキストここにテキストここにテキスト<br>ここにテキストここにテキスト</p>
        <p class="p-front-container-content__text">ここにテキストここにテキスト</p>
        <p class="c-subtitle--line2">ここにテキスト</p>
      </article>
      <!-- 画像 -->
      <div class="p-front-container__image">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image20.png" alt="画像の説明"> </ｄ>
      </div>
      <!-- message -->
      <article class="p-front-container__message p-front-container-message">
        <div class="p-front-container-message__title">
          <a href="/message/">
            <h2 class="c-heading01 c-heading01--front" data-en="message">メッセージ</h2>
          </a>
        </div>
        <!-- sp 非表示 -->
        <div class="p-front-container-message__wrapper p-front-container-message-wrapper u-desktop">
          <p class="p-front-container-message-wrapper__text">丁寧な作業とコミュニケーションで</p>
          <p class="c-subtitle--line2">ハイクオリティなコードを納品。</p>
          <div class="p-front-container-message-wrapper__readMore">
            <a href="/message/" class="c-readMore">Read more<span class="c-arrow01_right"></span></a>
          </div>
        </div>
        <!-- 画像エリア -->
        <div class="p-front-container-message__inner p-front-container-message-inner">
          <div class="p-front-container-message-inner__bgGray"></div>
          <div class="p-front-container-message-inner__image">
            <div class="p-front-container-message-inner__image-01">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/president01.png" alt="画像の説明">
            </div>
            <!-- 背景の動く文字レイヤー -->
            <div class="p-front-container-message-inner__text">
              <p>CODO</p>
              <span class="p-front-container-message-inner__text-second">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/assist.png" alt="画像の説明">
              </span>
            </div>
            <div class="p-front-container-message-inner__image-02">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image06.png" alt="画像の説明">
            </div>
            <div class="p-front-container-message-inner__image-03">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image07.png" alt="画像の説明">
            </div>
          </div>
        </div>
      </article>

    </div>
    <!-- voice pc時　サイドバー　 -->
    <aside class="p-front__voice p-front-voice">
      <div class="p-front-voice__title">
        <a href="/voice/">
          <h2 class="c-heading01 c-heading01--front" data-en="voice">お客様の声</h2>
        </a>
      </div>
      <!-- voice 記事のリスト -->
      <div class="p-front-voice__list p-front-voice-list">
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
            <div class="p-front-voice-list__item p-front-voice-list-item" data-index="<?php echo $index; ?>">
              <?php get_template_part('template-parts/cards/card-front-voice'); ?>
            </div>
        <?php
          endwhile;
          wp_reset_postdata();
        else :          echo '<p>まだ投稿がありません。</p>';
        endif;
        ?>
      </div>

      <div class="p-front-voice__readmore">
        <a href="/voice/" class="c-readMore ">Read more<span class="c-arrow01_right"></span></a>
      </div>

    </aside>
  </section>

  <!-- フロント　service -->
  <section class="p-front__service p-front-service">
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
  <section class="p-front__profile p-front-profile">
    <a href="/profile/">
      <div class="p-front-profile__image">

        <picture>
          <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/image11.png" alt="イメージ画像" media="(max-width: 768px)">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image26.png" alt="イメージ画像">
        </picture>


        <div class="p-front-profile__overlay"></div>
        <div class="p-front-profile__content p-front-profile-content">
          <h2 class="c-heading01 c-heading01--whiteCenter c-heading01--front-profile" data-en="profile">経歴・職歴</h2>
          <p class="p-front-profile-content__text">ここにテキスト入れるここにテキスト入れるここにテキスト入れるここにテキスト入れるここにテキスト入れる</p>
        </div>
      </div>
    </a>
  </section>

  <!-- フロント　news -->
  <section class="p-front-news">
    <div class="p-front-news__inner p-front-news-inner">
      <div class="p-front-news-inner__titleArea">

        <div class="p-front-news-inner__title">
          <a href="/news/">
            <h2 class="c-heading01 c-heading01--lineWhite" data-en="news">お知らせ</h2>
          </a>
        </div>
        <div class="p-front-news__readmore p-front-news__readmore--desktop">
          <a href="/news/" class="c-readMore">Read more<span class="c-arrow01_right"></span></a>
        </div>
      </div>
      <!-- newsのリスト -->
      <div class="p-front-news-inner__content p-front-news-inner-content">



      
        <?php get_template_part('template-parts/loop/loop-news-list', null, ['modifier' => 'frontNews']); ?>
      </div>
    </div>
    <div class="p-front-news__readmore u-mobile">
      <a href="/news/" class="c-readMore">Read more<span class="c-arrow01_right"></span></a>
    </div>
  </section>

  <!-- リンクバナー contact / faq -->
  <section class="p-section-banner">
    <?php get_template_part('template-parts/sections/section-contact'); ?>
    <?php get_template_part('template-parts/sections/section-faq'); ?>
  </section>
</main>

<?php get_footer(); ?>