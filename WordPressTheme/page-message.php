<?php get_header(); ?>

<main class="p-message">
    <section class="p-message__fv c-sub-fv">
        <!-- フロントページ以外のfv -->
        <?php get_template_part('template-parts/sections/section-sub-fv'); ?>
    </section>
    <!-- 本文１　pc２カラム -->
    <section class="p-message__container p-message-container">
        <!-- 本文１ -->
        <article class="p-message-container__body p-message-container-body">
            <!-- 本文１　タイトル -->
            <h3 class="c-subtitle">
                <span class="c-subtitle--line1"><?php the_field('section_heading_1_top'); ?></span>
                <span class="c-subtitle--line2 c-heading02"><?php the_field('section_heading_1_bottom'); ?></span>
            </h3>
            <!-- 本文１　テキスト -->
            <div class="p-message-container-body__text"><?php the_field('section_content_1'); ?></div>
            <!-- 本文１　画像 -->
            <?php $image1 = get_field('section_image_1'); ?>
            <?php if ($image1): ?>
                <div class="p-message-container-body__image">
                    <img src="<?php echo esc_url($image1['url']); ?>" alt="">
                </div>
            <?php endif; ?>
        </article>
        <!-- 代表プロフィール -->
        <article class="p-message-container__profile p-message-container-profile">
                <div class="p-message-container-profile__body">
                    <div class="p-message-container-profile__image">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/president01.png" alt="代表 田中 太郎の写真">
                    </div>
                    <div class="p-message-container-profile__text">
                        <p class="p-message-container-profile__text--company">株式会社 XXXXXX</p>
                        <p class="p-message-container-profile__text--ja">代表 田中 太郎</p>
                        <p class="p-message-container-profile__text--en">Tanaka Taro</p>
                    </div>
                </div>
        </article>
    </section>

    <!-- スライダー -->
    <article class="p-message__slider">
<!-- template-parts/section-slide.php -->
<section class="c-slide">
  <div class="c-slide-track">
    <div class="c-slide-item">
      <div class="c-slide-row1">
        <div class="c-slide-image1">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image11.png" alt="WORKイメージ">
        </div>
        <div class="c-slide-image2">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image19.png" alt="WORKイメージ">
        </div>
      </div>
      <div class="c-slide-row2">
        <div class="c-slide-image3">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image04.png" alt="WORKイメージ">
        </div>
        <div class="c-slide-image4">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image12.png" alt="WORKイメージ">
        </div>
      </div>
    </div>

    <!-- クローンをつなげて無限ループ感を出す -->
    <div class="c-slide-item">
      <div class="c-slide-row1">
        <div class="c-slide-image1">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image11.png" alt="WORKイメージ">
        </div>
        <div class="c-slide-image2">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image19.png" alt="WORKイメージ">
        </div>
      </div>
      <div class="c-slide-row2">
        <div class="c-slide-image3">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image04.png" alt="WORKイメージ">
        </div>
        <div class="c-slide-image4">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image12.png" alt="WORKイメージ">
        </div>
      </div>
    </div>
  </div>
</section>    </article>

    <!-- 本文2 -->
    <section class="p-message__container p-message-container">
        <article class="p-message-container__body p-message-container__body--02 p-message-container-body">
            <!-- 本文１　タイトル -->
            <h3 class="c-subtitle">
                <span class="c-subtitle--line1"><?php the_field('section_heading_2_top'); ?></span>
                <span class="c-subtitle--line2 c-heading02"><?php the_field('section_heading_2_bottom'); ?></span>
            </h3>
            <!-- 本文１　テキスト -->
            <div class="p-message-container-body__text"><?php the_field('section_content_2'); ?></div>
            <!-- 本文１　画像 -->
            <?php $image2 = get_field('section_image_2'); ?>
            <?php if ($image2): ?>
                <div class="p-message-container-body__image">
                    <img src="<?php echo esc_url($image1['url']); ?>" alt="">
                </div>
            <?php endif; ?>
        </article>
    </section>

</main>
<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>