<?php get_header(); ?>

<main class="p-single-voice">
    <div class="p-single-voice__inner p-single-voice-inner l-inner">
        <!-- <h2 class="p-single-voice-inner__title">
            <?php echo nl2br(get_field('voice_heading')); ?>
        </h2> -->
        <div class="p-single-voice-inner__eye-catch">
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('full', [
                    'alt' => get_the_title(),
                    'loading' => 'lazy',
                    'width' => 1440,
                    'height' => 480,
                ]);
            } else {
                // 代替画像を指定する場合
                echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/images/default-eye-catch.jpg" alt="イメージ画像" width="1440" height="480" loading="lazy">';
            }
            ?>
        </div>
    </div>
    <!-- pc時　2カラム -->
    <section class="p-single-voice__wrapper">
        <div class="p-single-voice__content p-single-voice-content">
            <article class="p-single-voice-content__body p-single-voice-content-body">
                <!-- 投稿画面ACF -->
                <?php for ($i = 1; $i <= 2; $i++) : // セクション数に合わせてループ範囲を変更 
                ?>
                    <?php
                    $heading_top = get_field("section_post_heading_{$i}_top");
                    $heading_bottom = get_field("section_post_heading_{$i}_bottom");
                    $content = get_field("section_post_content_{$i}");
                    $image = get_field("section_post_image_{$i}");

                    if (empty($heading_top) && empty($heading_bottom) && empty($content) && empty($image)) {
                        continue;
                    }
                    ?>
                    <section class="c-single-content c-single-content--voice">
                        <div class="c-single-content__wrapper">
                            <h3 class="c-subtitle">
                                <?php if ($heading_top) : ?>
                                    <span class="c-subtitle--line1"><?php echo esc_html($heading_top); ?></span>
                                <?php endif; ?>
                                <?php if ($heading_bottom) : ?>
                                    <span class="c-subtitle--line2 c-heading02"><?php echo esc_html($heading_bottom); ?></span>
                                <?php endif; ?>
                            </h3>
                            <?php if ($content) : ?>
                                <div class="c-single-content__post">
                                    <?php echo nl2br(esc_html($content)); ?> </div>
                            <?php endif; ?>
                        </div>

                        <?php if ($image) : ?>
                            <div class="c-single-content__image">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            </div>
                        <?php endif; ?>
                    </section>
                <?php endfor; ?>
            </article>
            <!-- cssのスライダー -->
            <article class="p-single-voice-content-body__slider">
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
                </section>
            </article>
        </div>
        <!-- プロフィール -->
        <aside class="p-single-voice__profile p-single-voice-profile l-inner">
            <!-- 社長プロフィールのカード -->
            <div class="p-single-voice-profile__body">
                <div class="p-single-voice-profile__image">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/president01.png" alt="代表 田中 太郎の写真">
                </div>
                <div class="p-single-voice-profile__text">
                    <p class="p-single-voice-profile__text--company">株式会社 XXXXXX</p>
                    <p class="p-single-voice-profile__text--ja">田中 太郎</p>
                    <p class="p-single-voice-profile__text--ja2">代表 田中 太郎</p>
                    <p class="p-single-voice-profile__text--en">Tanaka Tarou</p>
                </div>
            </div>

            <a href="#" class="c-return c-return--single-voice">
                一覧に戻る<span class="c-arrow01_right"></span>
            </a>
        </aside>
    </section>

    <!-- 関連記事 Swiper -->
    <div class="p-single-voice__swiper">
        <?php get_template_part('template-parts/sections/section-related-swiper'); ?>
    </div>
</main>

<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>